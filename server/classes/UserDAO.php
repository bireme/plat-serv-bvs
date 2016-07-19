<?php
/**
 * User Data Access Object
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Fabio Batalha C. Santos (fabio.santos@bireme.org)
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

require_once(dirname(__FILE__).'/../include/DAO.inc.php');
require_once(dirname(__FILE__)."/User.php");
require_once(dirname(__FILE__)."/ProfileDAO.php");
require_once(dirname(__FILE__)."/LDAP.php");
require_once(dirname(__FILE__)."/LDAPAuthenticator.php");
require_once(dirname(__FILE__)."/ToolsAuthentication.php");
require_once(dirname(__FILE__)."/Tools.php");

class UserDAO {

    /**
     * Load a specific user
     *
     * @param string $userID
     * @return object User object
     */
    public static function getUser($userID){
        $retValue = false;
        $strsql = "SELECT *
                    FROM users
                    WHERE userID = '".$userID."'" ;

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['userID']){
            $objUser = new User();            
            $objUser->setID($res[0]['userID']);
            $objUser->setFirstName($res[0]['userFirstName']);
            $objUser->setLastName($res[0]['userLastName']);
            $objUser->setEmail($res[0]['userEmail']);
            $objUser->setGender($res[0]['userGender']);
            $objUser->setAffiliation($res[0]['userAffiliation']);
            $objUser->setCountry($res[0]['userCountry']);
            $objUser->setSource($res[0]['userSource']);
            $objUser->setDegree($res[0]['userDegree']);
            $objUser->setProfile(ProfileDAO::getProfileList($objUser->getID()));

            $retValue = $objUser;
        }
        return $retValue;
    }

    /**
     * Add a new user
     *
     * @param object $objUser User object
     * @return boolean
     */
    public static function addUser($objUser){
        $retValue = true;
        $canInsert = true;
       
        /* add user to LDAP */
        $attrs = array('cn' => $objUser->getID(),
                       'userPassword' => (string)$objUser->getPassword(),
                       'mail' => $objUser->getEmail(),
                       'givenName' => $objUser->getFirstName()
                       .' '.$objUser->getLastName());

        $connConfig = ToolsAuthentication::configLDAPConnection($objUser->getID());
        /* try to add the entry to LDAP */
        try{
            LDAP::add($connConfig, $attrs);
        }catch(Exception $e){
            if($e->getCode() != 500){ /* duplicated entry */
                $canInsert = false;
                $retValue = false;

                /* system log */
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
            
        }
     
        /* if the user does not exist in SP database */
        if(!self::isUser($objUser->getID())){
            if($canInsert === true){

                $strsql =  "INSERT INTO users ( userID,
                                                 userFirstName,
                                                 userLastName,
                                                 userGender,
                                                 userAffiliation,
                                                 userCountry,
                                                 userSource,
                                                 userDegree,
                                                 userEmail,
                                                 userPassword )
                                     VALUES ('".$objUser->getID(). "','".
                                                $objUser->getFirstName(). "','".
                                                $objUser->getLastName(). "','".
                                                $objUser->getGender()."','".
                                                $objUser->getAffiliation()."','".
                                                $objUser->getCountry()."','".
                                                $objUser->getSource()."','".
                                                $objUser->getDegree()."','".
                                                // empty password
                                                $objUser->getEmail(). "',''";
                $strsql .= ")";

                try{
                    $_db = new DBClass();
                    $insertID = $_db->databaseExecInsert($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }

                if ($res === false ){
                    $retValue = false;
                }
            }else{
                $retValue = false;
            }
        }
        return $retValue;
    }

    /**
     * Update user's attributes
     *
     * @param object $objUser User object
     * @return boolean
     */
    public static function updateUser($objUser, $updUserID=false){

        $retValue = false;

        if(self::isUser($objUser->getID()) === true){

            $strsql = "UPDATE users SET
                            userFirstName ='".$objUser->getFirstName()."',
                            userLastName ='".$objUser->getLastName()."',
                            userGender ='".$objUser->getGender()."',
                            userEmail ='".$objUser->getEMail()."',
                            userAffiliation ='".$objUser->getAffiliation()."',
                            userCountry ='".$objUser->getCountry()."',
                            userSource ='".$objUser->getSource()."',
                            userDegree ='".$objUser->getDegree()."'";

            /*  check if the password will be updated */

            if($updUserID == false){

                $strsql .= " WHERE userID ='".$objUser->getID()."'";

            }else{

                $isInServPlat = UserDAO::isUser($updUserID);
                if($isInServPlat && ($updUserID != $objUser->getEMail())){
                    throw new Exception('user already exists', 502);
                }

                $sysUID = self::getSysUID($objUser->getID());

                if($sysUID){
                    $strsql .= " , userID = '" . $updUserID .
                        "' WHERE sysUID = " . $sysUID;
                }

            }

            try{
                $_db = new DBClass();
                $res = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($res !== false ){
                $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Check if the user exists
     *
     * @param string $userID user ID
     * @return boolean
     */
    public static function isUser($userID){
        $retValue = false;
        $strsql = "SELECT count(userID) FROM users
                    WHERE userID = '".trim($userID)."'" ;

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['count(userID)'] >= 1){
            $retValue = true;
        }
        return $retValue;
    }
    
    public static function changePassword(){}

    /**
     * Create and set a random password
     *
     * @param string $userID
     * @return boolean
     */
    public static function createNewPassword($userID){
        $retValue = false;

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($userID,'@'),1);

        if(($userDomain != 'bireme.org') or ($userDomain != 'scielo.org')){
            if(self::isUser($userID)){

                $connConfig = ToolsAuthentication::configLDAPConnection($userID);

                /* generating a new password */
                $userAttributes['userPassword'] = substr(md5(rand()),0,7);
                $userAttributes['cn'] = $userID; /* mandatory */

                try{
                    $retStats = LDAP::update($connConfig, $userAttributes);
                }catch(Exception $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                    throw $e;
                }

                if($retStats !== false){
                    $to = array($userID);
                    $body = str_replace('[PASSWORD]',
                        $userAttributes['userPassword'],
                        file_get_contents(EMAIL_NEWPASSWORD_TEMPLATE));
                    $retValue = Mailer::sendMail($body,
                        "New BVS network password",$to);
                }
            }
        }else{
            $retValue = array('status' => 'DomainNotPermitted');
        }
        return $retValue;
    }

    public static function getSysUID($userID){

        $strsql = "SELECT sysUID FROM users WHERE userID = '".$userID."'" ;

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $res[0]['sysUID']?$res[0]['sysUID']:false;
    }

    /**
     * 
     * @param string $sguID
     * @return
     */
    public static function isMigrated($sguID){
        $retValue = false;

        $strsql = "SELECT count(sysUID) FROM users WHERE sguID = '" . $sguID ."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['count(sysUID)'] == 1){
            $retValue = true;
        }
        return $retValue;
    }

    /**
     *  Get the total count of users
     *
     * @param boolean $migrated Counts only the migrated users
     * @param string $domain Domain name
     * @return boolean|integer
     */
    public static function getUsersCount($migrated=false, $domain=null){
        $retValue = false;

        $strsql= 'SELECT count(*) as total FROM users';

        if(!empty($domain)){
            $strsql .=" WHERE userID like '%@".$domain."'";
        }

        if($migrated){
            $lOperator = !empty($domain)?' AND ':' WHERE ';
            $strsql .= $lOperator . "sguID IS NOT NULL";
        }

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['total'] >= 0){
            $retValue =$res[0]['total'];
        }
        return $retValue;
    }
}
?>
