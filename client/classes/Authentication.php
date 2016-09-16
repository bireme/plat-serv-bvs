<?php
/**
 * Client Side webservices for user authentication
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

/**
 * Authenticate user on services platform
 *
 * @param string $userID User mail
 * @param string $userPass User password
 * @return boolean
 */
class Authentication {
    public static function loginUser($userID,$userPass,$socialMedia){
        $result = false;

        if(!empty($userID) && !empty($userPass)){
            /* encrypt login params using a public key */
            $cUserID = Crypt::encrypt(trim($userID));
            $cUserPass = Crypt::encrypt(trim($userPass));

            try{
                $objSoapClient = new SoapClient(null,
                    array('location'=>SERVICES_PLATFORM_SERVER.'/Authentication.php',
                        'uri'=>'http://test-uri/'));

                $result = $objSoapClient->loginUser($cUserID,$cUserPass,$socialMedia);
            }catch(Exception $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
            
        }
        return $result;
    }

    /**
     * Create a random password and notify user by mail
     *
     * @param string $userID
     */
    public static function createNewPassword($userID){
        $retValue = false;
        
        $cUserID = Crypt::encrypt(trim($userID));
        
        if(!empty($cUserID)){
            try{
                $objSoapClient = new SoapClient(null,
                    array('location'=>SERVICES_PLATFORM_SERVER.'/Authentication.php',
                        'uri'=>'http://test-uri/'));

                $retValue = $objSoapClient->createNewPassword($cUserID);
            }catch(Exception $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
            
        }

        return $retValue;
    }

    public static function getUserData($userTK){
        $retValue = false;

        try{
            $objSoapClient = new SoapClient(null,
                        array('location'=>SERVICES_PLATFORM_SERVER.'/Authentication.php',
                            'uri'=>'http://test-uri/'));
            $retValue = $objSoapClient->getUserData($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
}
?>
