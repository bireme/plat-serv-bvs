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
            $objUser->setProfessionalArea($res[0]['professionalArea']);
            $objUser->setLinkedin($res[0]['linkedin']);
            $objUser->setResearchGate($res[0]['researchGate']);
            $objUser->setOrcid($res[0]['orcid']);
            $objUser->setOrcidData($res[0]['orcidData']);
            $objUser->setResearcherID($res[0]['researcherID']);
            $objUser->setLattes($res[0]['lattes']);
            $objUser->setBirthday($res[0]['birthday']);
            $objUser->setAcceptMail($res[0]['accept_mail']);
            $objUser->setAgreementDate($res[0]['agreement_date']);
            $objUser->setAvatar($res[0]['avatar']);
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

        if ( $active && ( empty($source) || 'ldap' == $source || 'e-blueinfo' == $source ) ) {
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
                                                 professionalArea,
                                                 userEmail,
                                                 linkedin,
                                                 researchGate,
                                                 orcid,
                                                 orcidData,
                                                 researcherID,
                                                 lattes,
                                                 birthday,
                                                 avatar,
                                                 agreement_date,
                                                 accept_mail,
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
                                                $objUser->getProfessionalArea()."','".
                                                $objUser->getEmail()."','".
                                                $objUser->getLinkedin()."','".
                                                $objUser->getResearchGate()."','".
                                                $objUser->getOrcid()."','".
                                                $objUser->getOrcidData()."','".
                                                $objUser->getResearcherID()."','".
                                                $objUser->getLattes()."','".
                                                $objUser->getBirthday()."','".
                                                $objUser->getAvatar()."','".
                                                $objUser->getAgreementDate()."','".
                                                $objUser->getAcceptMail()."','".
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

                if ( $result === false )
                    $retValue = false;
                elseif ( !$active )
                    $res = UserDAO::sendUserConfirm($objUser, 'user');
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
                            professionalArea ='".$objUser->getProfessionalArea()."',
                            linkedin ='".$objUser->getLinkedin()."',
                            researchGate ='".$objUser->getResearchGate()."',
                            orcid ='".$objUser->getOrcid()."',
                            researcherID ='".$objUser->getResearcherID()."',
                            lattes ='".$objUser->getLattes()."',
                            birthday ='".$objUser->getBirthday()."',
                            avatar ='".$objUser->getAvatar()."',
                            accept_mail ='".$objUser->getAcceptMail()."',
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
                    WHERE userID = '".trim($userID)."'
                    OR sysUID = '".trim($userID)."'" ;

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
     * Check if the user is active
     *
     * @param string $userID user ID
     * @return boolean
     */
    public static function isActive($userID){
        global $_conf;
        $retValue = false;
        $strsql = "SELECT count(userID) FROM users
                    WHERE userID = '".trim($userID)."'
                    AND active = '1'";

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
     * Set active field data
     *
     * @param string $userID User ID
     * @param string $active Active data
     * @return boolean
     */
    public static function setActive($userID, $active){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID($userID);

        if ( $sysUID ) {
            $strsql = "UPDATE users
                    SET active = '".$active."'
                    WHERE sysUID = '".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( $result !== false ) $retValue = true;
        }

        return $retValue;
    }

    /**
     * Set user accept mail
     *
     * @param string $userID User ID
     * @param int $value Accept mail value
     * @return boolean
     */
    public static function setAcceptMail($userID, $value){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID($userID);

        if ( $sysUID ) {
            $strsql = "UPDATE users
                    SET accept_mail = '".$value."'
                    WHERE sysUID = '".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( $result !== false ) $retValue = true;
        }

        return $retValue;
    }

    /**
     * Check user confirmation
     *
     * @param string $userEmail user email
     * @param string $userKey user key
     * @param string $action user action
     * @return boolean
     */
    public static function userConfirm($userEmail, $userKey, $action){
        global $_conf;
        $res = false;
        $retValue = false;

        $sysUID = self::getSysUID(trim($userEmail));

        if ( $sysUID ) {
            $strsql = "SELECT * FROM `userConfirm`
                        WHERE `sysUID` = '".$sysUID."'
                        AND `key` = '".$userKey."'
                        AND `action` = '".$action."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if( $result[0]['key'] ) {
                $strsql = "UPDATE users u, userConfirm uc
                        SET u.active = '1',
                        uc.confirmation_date = '".date('Y-m-d H:i:s')."'
                        WHERE u.sysUID = '".$sysUID."'
                        AND uc.sysUID = '".$sysUID."'
                        AND uc.action = '".$action."'";

                try{
                    $_db = new DBClass();
                    $res = $_db->databaseQuery($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }
        } else {
            $strsql = "SELECT * FROM `userConfirm`
                        WHERE `email` = '".$userEmail."'
                        AND `key` = '".$userKey."'
                        AND `action` = '".$action."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if( $result[0]['key'] ) {
                $strsql = "UPDATE userConfirm
                        SET confirmation_date = '".date('Y-m-d H:i:s')."'
                        WHERE email = '".$userEmail."'
                        AND action = '".$action."'";

                try{
                    $_db = new DBClass();
                    $res = $_db->databaseQuery($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }
        }

        if ( $res !== false ) $retValue = true;

        return $retValue;
    }

    /**
     * Add user confirmation data
     *
     * @param string $email user email
     * @param string $key user key
     * @param string $date
     * @param string $action user action
     * @param string $type user type
     * @return boolean
     */
    public static function addUserConfirm($email, $key, $date, $action, $type=''){
        global $_conf;
        $retValue = false;
        $sysUID = false;

        if ( 'LDAP' == $type ) {
            $sysUID = true;

            $strsql = "INSERT INTO `userConfirm` (`key`,`email`,`creation_date`,`action`)
                              VALUES ('$key','$email','$date','$action')";
        } else {
            $sysUID = self::getSysUID($email);

            $strsql = "INSERT INTO `userConfirm` (`sysUID`,`key`,`email`,`creation_date`,`action`)
                              VALUES ('$sysUID','$key','$email','$date','$action')";
        }

        if ( $sysUID ) {
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
     * @param string $action user action
     * @param string $mode user type
     * @return boolean
     */
    public static function deleteUserConfirm($email, $action, $type=''){
        global $_conf;
        $result = 0;
        $retValue = false;
        $sysUID = false;

        if ( 'LDAP' == $type ) {
            $sysUID = true;

            $strsql = "DELETE FROM `userConfirm`
                WHERE `email` = '".$email."'
                AND `action` = '".$action."'";
        } else {
            $sysUID = self::getSysUID($email);

            $strsql = "DELETE FROM `userConfirm`
                WHERE `sysUID` = '".$sysUID."'
                AND `action` = '".$action."'";
        }

        if ( $sysUID ) {
            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $retValue = ($result !== 0) ? true : false;
        }

        return $retValue;
    }

    /**
     * Send user confirmation
     *
     * @param object $objUser User object
     * @param string $action User action
     * @return boolean
     */
    public static function sendUserConfirm($objUser, $action){
        $retValue = false;
        $email = $objUser->getEmail();
        $date = date('Y-m-d H:i:s');
                     
        //create a random key
        $key = md5(uniqid(mt_rand(), true));
        $deleteConfirm = self::deleteUserConfirm($email,$action);
        $addConfirm = self::addUserConfirm($email,$key,$date,$action);

        if($addConfirm !== false){
            $to = array($email);
            $tpl = str_replace('#LANG#', $_SESSION['lang'], EMAIL_CONFIRMATION_TEMPLATE);
            $home = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . RELATIVE_PATH . '/controller/authentication';
            $body = str_replace('#SITE#',
                $_SERVER['HTTP_HOST'],
                file_get_contents($tpl));
            $body = str_replace('#USERNAME#', $objUser->getFirstName(), $body);
            $body = str_replace('#HOME#', base64_encode($home), $body);
            $body = str_replace('#EMAIL#', $email, $body);
            $body = str_replace('#KEY#', $key, $body);
            $body = str_replace('#LANG#', $_SESSION['lang'], $body);
            $text = explode('[DELIMITER]', $body);
            $sendMail = Mailer::sendMail($text[0], $text[1], CONFIRM_USER_EMAIL_SUBJECT.$objUser->getFirstName(), $to);

            $retValue = true;
        }

        return $retValue;
    }

    /**
     * Send new pass confirmation
     *
     * @param string $userEmail User email
     * @param string $action User action
     * @return boolean
     */
    public static function sendNewPassConfirm($userEmail, $action){
        $retValue = false;
        $addConfirm = false;
        $name = '';
        $email = $userEmail;
        $date = date('Y-m-d H:i:s');

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($email,'@'),1);

        if ( ($userDomain != 'bireme.org') && ($userDomain != 'scielo.org') ) {
            $isInLDAP = LDAP::isUser($email);
            $isInServPlat = self::isUser($email);

            if ( $isInServPlat && self::isActive($email) ) {
                $user = self::getUser($email);
                $name = $user->getFirstName();
                $key = md5(uniqid(mt_rand(), true));
                $deleteConfirm = self::deleteUserConfirm($email,$action);
                $addConfirm = self::addUserConfirm($email,$key,$date,$action);
            } elseif ( $isInLDAP ) {
                $key = md5(uniqid(mt_rand(), true));
                $deleteConfirm = self::deleteUserConfirm($email,$action,'LDAP');
                $addConfirm = self::addUserConfirm($email,$key,$date,$action,'LDAP');
            }

            if ( $addConfirm ) {
                $to = array($email);
                $tpl = str_replace('#LANG#', $_SESSION['lang'], NEW_PASS_CONFIRMATION_TEMPLATE);
                $home = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . RELATIVE_PATH . '/controller/authentication';
                $body = str_replace('#SITE#',
                    $_SERVER['HTTP_HOST'],
                    file_get_contents($tpl));
                $body = str_replace('#USERNAME#', $name, $body);
                $body = str_replace('#HOME#', base64_encode($home), $body);
                $body = str_replace('#EMAIL#', $email, $body);
                $body = str_replace('#KEY#', $key, $body);
                $body = str_replace('#LANG#', $_SESSION['lang'], $body);
                $text = explode('[DELIMITER]', $body);
                $sendMail = Mailer::sendMail($text[0], $text[1], CONFIRM_NEW_PASS_SUBJECT.$name, $to);

                $retValue = true;
            }
        }else{
            $retValue = 'DomainNotPermitted';
        }

        return $retValue;
    }

    /**
     * Set user source
     *
     * @param string $userID User ID
     * @param string $source User source
     * @return boolean
     */
    public static function setSource($userID, $source){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID($userID);

        if ( $sysUID ) {
            $strsql = "UPDATE users
                    SET userSource = '".$source."'
                    WHERE sysUID = '".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( $result !== false ) $retValue = true;
        }

        return $retValue;
    }

    /**
     * Set user last login
     *
     * @param string $userID User ID
     * @return boolean
     */
    public static function setLastLogin($userID){
        global $_conf;
        $retValue = false;

        $sysUID = self::getSysUID($userID);

        if ( $sysUID ) {
            $strsql = "UPDATE users
                    SET last_login = '".date('Y-m-d H:i:s')."'
                    WHERE sysUID = '".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( $result !== false ) $retValue = true;
        }

        return $retValue;
    }

    /**
     * Get user last login
     *
     * @param string $userID user ID
     * @return string|boolean
     */
    public static function getLastLogin($userID){
        global $_conf;
        $retValue = false;
        $strsql = "SELECT last_login FROM users
                    WHERE userID = '".trim($userID)."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['last_login']){
            $retValue = $res[0]['last_login'];
        }

        return $retValue;
    }

    /**
     * Change user password
     *
     * @param string $userID
     * @param string $oldPassword
     * @param string $newPassword
     * @return boolean
     */
    public static function changePassword($userID, $oldPassword, $newPassword){
        global $_conf;
        $retValue = false;
        $retStats = false;

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($userID,'@'),1);

        if ( ($userDomain != 'bireme.org') && ($userDomain != 'scielo.org') ) {
            if(self::isUser($userID)){

                if ( LDAPAuthenticator::authenticateUser($userID, $oldPassword) ) {

                    $connConfig = ToolsAuthentication::configLDAPConnection($userID);

                    $userAttributes['userPassword'] = $newPassword;
                    $userAttributes['cn'] = $userID; /* mandatory */

                    try{
                        $retStats = LDAP::update($connConfig, $userAttributes);
                    }catch(Exception $e){
                        $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                        $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                        throw $e;
                    }

                    if ( $retStats !== false ) {
                        $retValue = true;
                        $newToken = Token::makeUserTK($userID,$newPassword,'ldap');
                        $_SESSION['userTK'] = $newToken;
                        setcookie("userTK", $_SESSION["userTK"], 0, '/', COOKIE_DOMAIN_SCOPE);
                    }
                } else {
                    $retValue = 'invalidpass';
                }
            }
        }else{
            $retValue = 'DomainNotPermitted';
        }

        return $retValue;
    }

    /**
     * Create and set a random password
     *
     * @param string $userID
     * @param string $userSource
     * @return boolean
     */
    public static function createNewPassword($userID,$userSource=''){
        global $_conf;
        $name = '';
        $retValue = false;
        $retStats = false;

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($userID,'@'),1);

        if ( ($userDomain != 'bireme.org') && ($userDomain != 'scielo.org') ) {
            $isInLDAP = LDAP::isUser($userID);
            $isInServPlat = self::isUser($userID);

            if ( $isInServPlat || $isInLDAP ) {
                if ( $isInServPlat ) {
                    $user = self::getUser($userID);
                    $name = $user->getFirstName();
                }

                $connConfig = ToolsAuthentication::configLDAPConnection($userID);

                /* generating a new password */
                $userAttributes['userPassword'] = substr(md5(mt_rand()),0,8);
                $userAttributes['cn'] = $userID; /* mandatory */

                try{
                    $retStats = LDAP::update($connConfig, $userAttributes);
                }catch(Exception $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                    throw $e;
                }

                $template = ( 'e-blueinfo' == $userSource ) ? EMAIL_EBLUEINFO_TEMPLATE : EMAIL_NEWPASSWORD_TEMPLATE;
                $subject  = ( 'e-blueinfo' == $userSource ) ? EBLUEINFO_EMAIL_SUBJECT : NEW_PASSWORD_EMAIL_SUBJECT;
                $fromMail = ( 'e-blueinfo' == $userSource ) ? EBLUEINFO_EMAIL_FROM : EMAIL_FROM;
                $fromName = ( 'e-blueinfo' == $userSource ) ? EBLUEINFO_EMAIL_FROMNAME : EMAIL_FROMNAME;

                if($retStats !== false){
                    $to = array($userID);
                    $tpl = str_replace('#LANG#', $_SESSION['lang'], $template);
                    $body = str_replace('[PASSWORD]',
                        $userAttributes['userPassword'],
                        file_get_contents($tpl));
                    $body = str_replace('[USER]', $userID, $body);
                    $body = str_replace('[USERNAME]', $name, $body);
                    $body = str_replace('[LANG]', $_SESSION['lang'], $body);
                    $text = explode('[DELIMITER]', $body);
                    $retValue = Mailer::sendMail($text[0], $text[1], $subject, $to, $fromMail, $fromName);
                }
            }
        }else{
            $retValue = 'DomainNotPermitted';
        }

        return $retValue;
    }

    public static function removeUser($userID, $reason, $details){
        global $_conf;
        $result = false;
        $sysUID = self::getSysUID($userID);
        $user   = self::getUser($userID);

        if ( $sysUID ) {
            $strsqlA = "DELETE FROM suggestions WHERE userID = '".$userID."'";
            $strsqlB = "DELETE FROM dataHistory WHERE sysUID = '".$sysUID."'";
            $strsqlC = "DELETE FROM directories WHERE sysUID = '".$sysUID."'";
            $strsqlD = "DELETE FROM profiles    WHERE sysUID = '".$sysUID."'";
            $strsqlE = "DELETE FROM userConfirm WHERE sysUID = '".$sysUID."'";
            $strsqlF = "DELETE FROM userLinks   WHERE sysUID = '".$sysUID."'";
            $strsqlG = "DELETE FROM userShelf   WHERE sysUID = '".$sysUID."'";
            $strsqlH = "DELETE FROM users       WHERE sysUID = '".$sysUID."'";

            try{
                $_db = new DBClass();

                $resultA = $_db->databaseExecUpdate($strsqlA);
                $resultB = $_db->databaseExecUpdate($strsqlB);
                $resultC = $_db->databaseExecUpdate($strsqlC);
                $resultD = $_db->databaseExecUpdate($strsqlD);
                $resultE = $_db->databaseExecUpdate($strsqlE);
                $resultF = $_db->databaseExecUpdate($strsqlF);
                $resultG = $_db->databaseExecUpdate($strsqlG);
                $resultH = $_db->databaseExecUpdate($strsqlH);

                $result = true;
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        }

        if ( $result ) {
            $firstname = $user->getFirstName($res[0]['userFirstName']);
            $lastname  = $user->getLastName($res[0]['userLastName']);
            $email     = $user->getEmail($res[0]['userEmail']);
            $gender    = $user->getGender($res[0]['userGender']);
            $country   = $user->getCountry($res[0]['userCountry']);
            $source    = $user->getSource($res[0]['userSource']);
            $degree    = $user->getDegree($res[0]['userDegree']);
            $prof_area = $user->getProfessionalArea($res[0]['professionalArea']);

            $strsql = "
                INSERT INTO `usersDeleted` (`firstname`,`lastname`,`email`,`gender`,`degree`,`professional_area`,`sysUID`,`userID`,`country`,`source`,`reason`,`details`)
                VALUES ('$firstname','$lastname','$email','$gender','$degree','$prof_area','$sysUID','$userID','$country','$source','$reason','$details')";

                try{
                    $_db = new DBClass();
                    $res = $_db->databaseExecInsert($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
        }
        
        return $result;
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

    public static function getUserID($sysUID){
        global $_conf;

        $strsql = "SELECT userID FROM users WHERE sysUID = '".$sysUID."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $res[0]['userID'] ? $res[0]['userID'] : false;
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
            $requestURI = ORCID_API . urlencode($orcid) . '/works';
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
                    SET orcidData = '".$content."'
                    WHERE userID = '".$userID."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if ( $res !== false ) {
            $retValue = $assoc ? json_decode($content, true) : true;
        }

        return $retValue;
    }
}
?>
