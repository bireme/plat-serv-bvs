<?php
/**
 * Class responsible to handler the authentication workflow in the migration
 * from SGU to LDAP. This class needs to be used only in the migration period.
 * Once the users were migrated this class must be discarded.
 *
 * Documentation of migration workflow in:
 * http://reddes.bvsalud.org/bireme/plat-serv-bvs/wiki/SguToLdap
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


require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../config.ldap.php");
require_once(dirname(__FILE__)."/LDAP.php");
require_once(dirname(__FILE__)."/LDAPAuthenticator.php");
require_once(dirname(__FILE__)."/User.php");
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/Tools.php");
require_once(dirname(__FILE__).'/../include/DAO.inc.php');

/**
 * This class is responsible to give resources to implement the authentication
 * workflow.
 */
class ToolsAuthentication {

    public static $LDAPCONNECTIONCONFIG = null;
    
    /**
     * Authenticate user against LDAP.
     *
     * @param String $userID
     * @param String $userPass
     * @return Boolean
     */
    public static function authenticateUser($userID, $userPass, $userDataConfirmation=null, $newUserID=null){

        if (LDAPAuthenticator::authenticateUser($userID, $userPass) === true){

            $result["source"] = "ldap";
            $result["status"] = true;
            $result["userID"] = $userID;

            /* if the user exists in ldap, but does not exist in SP database */
            if(!UserDAO::isUser($userID)){

                $objUser = new User();
                $objUser->setID($userID);                
                $objUser->setEmail($userID);
                $objUser->setFirstName($userID);
                $objUser->setPassword($userPass);

                $addResult = UserDAO::addUser($objUser);

                $result["userDataStatus"] = false; /* need to complete user data */
            }
        }else{
            //user not exists
            $result["status"] = false;
        }
        return $result;
       
    }

    /**
     * Verify if the user mail is valid
     *
     */
    public static function isValidMail($userID){
        
        if( preg_match(REGEXP_EMAIL, $userID )){
            $retValue = true;
        }else{
            $retValue = false;
        }
        return $retValue;
    }

    /**
     * Configure the array LDAPCONNECTION using the hostname from the user mail.
     *
     * @param string $userID User mail "accepts only email"
     */
    public static function configLDAPConnection($userID){
       $retValue = false;

        global $LDAPSERVERS;

        $userDomain = substr(stristr($userID,'@'),1);

        if(trim($userDomain) != ""){
            if(array_key_exists($userDomain,$LDAPSERVERS)){
                $retValue = $LDAPSERVERS[$userDomain];
            }else{
                $retValue = $LDAPSERVERS["public"];
            }
        }else{
            $retValue = $LDAPSERVERS["public"];
        }

        return $retValue;
    }    
}


/**
 * This class is responsible to give resources to implement the register
 * workflow.
 */
class ToolsRegister {

    public static $LDAPCONNECTIONCONFIG = null;

    /**
     * Authenticate user before register.
     *
     * @param String $userID
     * @param String $userPass
     * @return Boolean
     */
    public static function authenticateRegisteringUser($objUserArg){
        if (LDAPAuthenticator::authenticateUser($objUserArg->getID(),
            $objUserArg->getPassword()) === true){
            $result["source"] = "ldap";
            $result["userID"] = $objUserArg->getID();
            /* if the user exists in ldap, but does not exist in SP database */
            if(!UserDAO::isUser($objUserArg->getID())){
                $addResult = UserDAO::addUser($objUserArg);
                if($addResult === true){
                    $result["status"] = true;
                }else{
                    $result["status"] = false;
                }                
            }else{
                $result["status"] = false;
                $result["error"] = "userexists";
            }
        }else{
            $mailUserID = $objUserArg->getID();
            $isInLDAP = LDAP::isUser($mailUserID);
            $isInServPlat = UserDAO::isUser($mailUserID);
            if($isInLDAP && $isInServPlat){
                // User already exists in LDAP and SP, can be logged in.
                $result["status"] = false;
                $result["error"] = "userexists";
            }else{ /* add user */
                $objUserArg->setID($mailUserID);
                $addResult = UserDAO::addUser($objUserArg);
                if($addResult === true){
                    $result["userID"] = $objUserArg->getID();
                    $result["status"] = true;
                }else{
                    $result["status"] = false;
                }
            }
        }
        return $result;

    }

    /**
     * Verify if the user mail is valid
     *
     */
    public static function isValidMail($userID){
        if( preg_match(REGEXP_EMAIL, $userID )){
            $retValue = true;
        }else{
            $retValue = false;
        }
        return $retValue;
    }

    /**
     * Configure the array LDAPCONNECTION using the hostname from the user mail.
     *
     * @param string $userID User mail "accepts only email"
     */
    public static function configLDAPConnection($userID){
       $retValue = false;
        global $LDAPSERVERS;
        $userDomain = substr(stristr($userID,'@'),1);
        if(trim($userDomain) != ""){
            if(array_key_exists($userDomain,$LDAPSERVERS)){
                $retValue = $LDAPSERVERS[$userDomain];
            }else{
                $retValue = $LDAPSERVERS["public"];
            }
        }else{
            $retValue = $LDAPSERVERS["public"];
        }
        return $retValue;
    }
}
?>
