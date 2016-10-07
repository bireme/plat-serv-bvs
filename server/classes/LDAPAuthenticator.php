<?php
/**
 * LDAP Authenticator Class
 *
 * Authenticate users using the connecion created in LDAP Class.
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
require_once(dirname(__FILE__).'/../include/DAO.inc.php');

/**
 * LDAPAuthenticator Class
 */
class LDAPAuthenticator {

    public static $LDAPCONNECTIONCONFIG = null;
    /**
     * Authenticate user
     *
     * @param String $userID
     * @param String $userPass
     * @return Boolean
     */
    public static function authenticateUser($userID, $userPass){
        global $_conf;
        $retValue = false;

        $userDomain = substr(stristr($userID,'@'),1);

        if(($userDomain == 'bireme.org') or ($userDomain == 'scielo.org')){
            $connConfig = self::configLDAPConnection($userID);
            $userID = self::formatUserID($userID);

            try{
                $ldapConn = LDAP::connect($connConfig, $userID, $userPass);
                $retValue = is_object($ldapConn)?true:false;
            }catch(Exception $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        }else{
            try{                
                $retValue = LDAP::validateExternalUser($userID, $userPass);
            }catch(Exception $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        }

        return $retValue;
    }

    /**
     * Responsible to fix the userID, once the user name in LDAP could just use
     * the username without the domain. eg:
     * In BIREME LDAP the user name is user.name and not user.name@bireme.br so
     * this Method will config the user name to be validate agains the LDAP
     * according to the LDAP Configuration.
     *
     * @param String $userID
     * @param String $userPass
     * @return Boolean
     */
    public static function formatUserID($userID){

        $connConfig = self::configLDAPConnection($userID);

        if($connConfig["USERID_FULL"] === false){
            // getting on the content before the @
            $userID = substr($userID,0,stripos($userID,'@'));
        }
        return $userID;
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
