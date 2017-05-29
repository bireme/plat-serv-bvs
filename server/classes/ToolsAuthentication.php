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
    public static function authenticateUser($userID, $userPass, $socialMedia, $userDataConfirmation=null, $newUserID=null){
        if ( SocialNetwork::validateObjUser( $socialMedia ) === true ) { /* check users from Social Medias */

            $result["source"] = $socialMedia['social_media'];
            $result["status"] = true;
            $result["userID"] = $userID;

            /* if the user does not exist in SP database */
            if(!UserDAO::isUser($userID)){
                $name = array( 'facebook' => 'first_name', 'google' => 'given_name' );
                $name = $name[$socialMedia['social_media']];
                $surname = array( 'facebook' => 'last_name', 'google' => 'family_name' );
                $surname = $surname[$socialMedia['social_media']];

                $objUser = new User();
                $objUser->setID($socialMedia['email']);
                $objUser->setFirstName($socialMedia[$name]);
                $objUser->setLastName($socialMedia[$surname]);
                $objUser->setEmail($socialMedia['email']);
                $objUser->setPassword($userPass);
                $objUser->setSource($socialMedia['social_media']);

                $addResult = UserDAO::addUser($objUser, 1);
                $result["userDataStatus"] = false; /* need to complete user data */
            }

        } elseif ( $user = UserDAO::getAccountsUser($userID, $userPass) ) { /* check users from BIREME Acccounts */

            $result["source"] = "bireme_accounts";
            $result["status"] = true;
            $result["userID"] = $user->getID();

            /* if the user exists in BIREME Accounts, but does not exist in SP database */
            if(!UserDAO::isUser($user->getID())){
                $name = $user->getFirstName();

                if ( !isset($name) || empty($name) )
                    $name = $user->getID();

                $user->setFirstName($name);

                $addResult = UserDAO::addUser($user, 1);
                $result["userDataStatus"] = false; /* need to complete user data */
            }

        } elseif ( LDAPAuthenticator::authenticateUser($userID, $userPass) === true ) {

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

                $addResult = UserDAO::addUser($objUser, 1);
                $result["userDataStatus"] = false; /* need to complete user data */
            }
        }else{
            //user not exists
            $result["status"] = false;
        }

        if ( $result["status"] ) { // Set user's last login
            $ll = UserDAO::setLastLogin($userID);
        }

        return $result;
    }

    /**
     * Verify if the user mail is valid
     *
     */
    public static function isValidMail($userID){
        if( filter_var($userID, FILTER_VALIDATE_EMAIL) ){
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
        if( filter_var($userID, FILTER_VALIDATE_EMAIL) ){
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
