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
     * Load a specific BIREME Accounts user
     *
     * @param string $userID
     * @return object User object
     */
    public static function getAccountsUser($userID, $userPass){
        global $_conf;
        $retValue = false;
        $strsql = "SELECT *
                    FROM auth_user
                    WHERE username = '".$userID."'
                      OR email = '".$userID."'";

        try{
            $_db = new AccountsDBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(AccountsDBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['password']){
            $passChunks = explode('$', $res[0]['password']);
            $iterations = $passChunks[1];
            $salt = $passChunks[2];
            $hash = $passChunks[3];

            if ( function_exists( 'hash_pbkdf2' ) )
                $pbkdf2 = base64_encode(hash_pbkdf2("sha256", $userPass, $salt, $iterations, 32, true));
            else
                $pbkdf2 = base64_encode(Crypt::hash_pbkdf2("sha256", $userPass, $salt, $iterations, 32, true));

            if($hash == $pbkdf2){
                $objUser = new User();
                $objUser->setID($res[0]['username']);
                $objUser->setFirstName($res[0]['first_name']);
                $objUser->setLastName($res[0]['last_name']);
                $objUser->setEmail($res[0]['email']);
                $objUser->setPassword($userPass);
                $objUser->setSource('bireme_accounts');

                $retValue = $objUser;
            }
        }
        return $retValue;
    }

    /**
     * Load a specific user
     *
     * @param string $userID
     * @return object User object
     */
    public static function getUser($userID){
        global $_conf;
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
            $objUser->setLinkedin($res[0]['linkedin']);
            $objUser->setResearchGate($res[0]['researchGate']);
            $objUser->setOrcid($res[0]['orcid']);
            $objUser->setOrcidData($res[0]['orcidData']);
            $objUser->setResearcherID($res[0]['researcherID']);
            $objUser->setLattes($res[0]['lattes']);
            $objUser->setAgreementDate($res[0]['agreement_date']);
            $objUser->setProfile(ProfileDAO::getProfileList($objUser->getID()));

            $retValue = $objUser;
        }

        return $retValue;
    }

    /**
     * Add a new user
     *
     * @param object $objUser User object
     * @param int $active
     * @return boolean
     */
    public static function addUser($objUser, $active=0){
        global $_conf;
        $retValue = true;
        $canInsert = true;

        $source = $objUser->getSource() ? $objUser->getSource() : '';

        if ( $active && ( empty($source) || 'ldap' == $source ) ) {

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

        }

        /* if the user does not exist in SP database */
        if(!self::isUser($objUser->getID())){
            if($canInsert === true){

                $strsql = "INSERT INTO users ( userID,
                                                 userFirstName,
                                                 userLastName,
                                                 userGender,
                                                 userAffiliation,
                                                 userCountry,
                                                 userSource,
                                                 userDegree,
                                                 userEmail,
                                                 linkedin,
                                                 researchGate,
                                                 orcid,
                                                 orcidData,
                                                 researcherID,
                                                 lattes,
                                                 agreement_date,
                                                 active,
                                                 userPassword )
                                     VALUES ('".$objUser->getID()."','".
                                                $objUser->getFirstName()."','".
                                                $objUser->getLastName()."','".
                                                $objUser->getGender()."','".
                                                $objUser->getAffiliation()."','".
                                                $objUser->getCountry()."','".
                                                $objUser->getSource()."','".
                                                $objUser->getDegree()."','".
                                                $objUser->getEmail()."','".
                                                $objUser->getLinkedin()."','".
                                                $objUser->getResearchGate()."','".
                                                $objUser->getOrcid()."','".
                                                $objUser->getOrcidData()."','".
                                                $objUser->getResearcherID()."','".
                                                $objUser->getLattes()."','".
                                                $objUser->getAgreementDate()."','".
                                                $active."',''";
                                                // empty password
                $strsql .= ")";

                try{
                    $_db = new DBClass();
                    $result = $_db->databaseExecInsert($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }

                if ($result === false ){
                    $retValue = false;
                } else {
                    if ( !$active ) { //
                        $sysUID = $result;
                        $email = $objUser->getEmail();
                        $date = date('Y-m-d H:i:s');
                                     
                        //create a random key
                        $key = md5(uniqid(mt_rand(), true));

                        $deleteConfirm = self::deleteUserConfirm($email);

                        $addConfirm = self::addUserConfirm($email,$key,$date);

                        if($addConfirm !== false){
                            $to = array($email);
                            $home = $_SERVER['HTTP_HOST'] . RELATIVE_PATH . '/controller/authentication';
                            $body = str_replace('#SITE#',
                                $_SERVER['HTTP_HOST'],
                                file_get_contents(EMAIL_CONFIRMATION_TEMPLATE));
                            $body = str_replace('#USERNAME#', $objUser->getFirstName(), $body);
                            $body = str_replace('#HOME#', base64_encode($home), $body);
                            $body = str_replace('#EMAIL#', $email, $body);
                            $body = str_replace('#KEY#', $key, $body);
                            $sendMail = Mailer::sendMail($body,
                                "New Services Platform User: ".$objUser->getFirstName(),$to);
                        }
                    }
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
        global $_conf;
        $retValue = false;

        if(self::isUser($objUser->getID()) === true){

            $strsql = "UPDATE users SET
                            userFirstName ='".$objUser->getFirstName()."',
                            userLastName ='".$objUser->getLastName()."',
                            userGender ='".$objUser->getGender()."',
                            userAffiliation ='".$objUser->getAffiliation()."',
                            userCountry ='".$objUser->getCountry()."',
                            userSource ='".$objUser->getSource()."',
                            userDegree ='".$objUser->getDegree()."',
                            linkedin ='".$objUser->getLinkedin()."',
                            researchGate ='".$objUser->getResearchGate()."',
                            orcid ='".$objUser->getOrcid()."',
                            researcherID ='".$objUser->getResearcherID()."',
                            lattes ='".$objUser->getLattes()."',
                            agreement_date ='".$objUser->getAgreementDate()."'";

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
                    $strsql .= ", userID = '" . $updUserID .
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

            if ( $res !== false ){
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
        global $_conf;
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

    /**
     * Check user confirmation
     *
     * @param string $userEmail user email
     * @param string $userKey user key
     * @return boolean
     */
    public static function userConfirmation($userEmail, $userKey){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID(trim($userEmail));

        if ( $sysUID ) {
            $strsql = "SELECT * FROM `userConfirm`
                        WHERE `sysUID` = '".$sysUID."'
                        AND `key` = '".$userKey."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if( $result[0]['key'] ) {
                $strsql = "UPDATE users
                        SET active = '1',
                        confirmation_date = '".date('Y-m-d H:i:s')."'
                        WHERE sysUID = '".$sysUID."'";

                try{
                    $_db = new DBClass();
                    $res = $_db->databaseQuery($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }

                if ( $res !== false ) $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Add user confirmation data
     *
     * @param string $email user email
     * @param string $key user key
     * @param string $date
     * @return boolean
     */
    public static function addUserConfirm($email, $key, $date){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID($email);

        if ( $sysUID ) {
            $strsql = "INSERT INTO `userConfirm` VALUES ('$sysUID','$key','$email','$date')";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( $result !== false ) $retValue = true;
        }

        return $retValue;
    }

    /**
     * Delete user confirmation data
     *
     * @param string $email user email
     * @return boolean
     */
    public static function deleteUserConfirm($email){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID($email);

        if ( $sysUID ) {
            $strsql = "DELETE FROM `userConfirm` WHERE `sysUID` = '".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( $result ) $retValue = true;
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
        global $_conf;
        $retValue = false;

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($userID,'@'),1);

        if(($userDomain != 'bireme.org') or ($userDomain != 'scielo.org')){
            if(self::isUser($userID)){

                $connConfig = ToolsAuthentication::configLDAPConnection($userID);

                /* generating a new password */
                $userAttributes['userPassword'] = substr(md5(mt_rand()),0,7);
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
        global $_conf;

        $strsql = "SELECT sysUID FROM users WHERE userID = '".$userID."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $res[0]['sysUID'] ? $res[0]['sysUID'] : false;
    }

    /**
     * 
     * @param string $sguID
     * @return
     */
    public static function isMigrated($sguID){
        global $_conf;
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
        global $_conf;
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

        if(isset($res) && $res[0]['total'] >= 0){
            $retValue = $res[0]['total'];
        }
        return $retValue;
    }

    /**
     * Fill ORCID API data
     *
     * @param string $userID User ID
     * @param string $orcid ORCID ID
     * @param boolean $assoc Return associative array with ORCID API data
     * @return object boolean|array
     */
    public static function fillOrcidData($userID, $orcid, $assoc=false){
        global $_conf;
        $retValue = false;
        $content = '';

        if ( $userID && $orcid ) {
            $requestURI = ORCID_API . urlencode($orcid) . '/orcid-profile';
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Accept: application/orcid+json\r\n"
                )
            );
            $context = stream_context_create($opts);
            $content = file_get_contents($requestURI,false,$context);
            $content = CharTools::mysql_escape_mimic($content);
        }

        $strsql = "UPDATE users
                    SET orcidData ='".$content."'
                    WHERE userID ='".$userID."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if ( $res !== false )
            $retValue = $assoc ? json_decode($content, true) : true;

        return $retValue;
    }
}
?>
