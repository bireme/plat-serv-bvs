<?php
/**
 * Client Side webservices for user profiles collection
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
class MyProfiles {

    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/MyProfiles.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * Add a Profile to the user account
     * @param <type> $profile
     * @return <type>
     */
    public static function addProfile($userTK,$profilesXML){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addProfile($userTK,$profilesXML);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Remove a Profile from user account
     * @param <type> $profile
     * @return <type>
     */
    public static function removeProfile($userTK,$profileID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->removeProfile($userTK,$profileID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a Profile metadata
     * @param <type> $profile
     * @return <type>
     */
    public static function getProfile($userTK,$profileID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getProfile($userTK,$profileID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a profile list from a specific user.
     * @param <obj> $profile
     * @param <number> $from start register
     * @param <number> $count total of registers
     * @param <oarams> $params array([date,rate])
     * @return <array>
     */
    public static function getProfileList($userTK, $params, $from=0, $count=-1){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getProfileList($userTK,
                $params, $from=0, $count=-1);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a profile list with the parameter InHome=1
     * @param <obj> $profile
     * @return <array>
     */
    public static function getInHomeProfiles($userTK,$profileID){}

    /**
     * Return a profile list with the parameter InHome=1
     * @param <obj> $profile
     * @return <array>
     */
    public static function getTotalItens($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalItens($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

     /**
      * Update the profile and the profile metadata
      * @param <String> $userTK Hash user identification
      * @param <number> $profileID profile to be updated
      * @param <String> $profile XML with new profile metadata
      * @return <boolean>
      */
    public static function updateProfile($userTK,$profileID,$profileXML){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateProfile($userTK,
                $profileID, $profileXML);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Changes the value of rate attribute
     * @param <obj> $profile
     * @return <boolean>
     */
    public static function updateProfileRate($userTK,$profileID,$profileRate){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateProfileRate($userTK,
                $profileID, $profileRate);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
    /**
     * Changes the value of the attribute home to 0
     * @param <obj> $profile
     * @return <true>
     */
    public static function deleteFromHome($userTK,$profileID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->deleteFromHome($userTK,$profileID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Changes the value of the attibute home to 1
     * @param <type> $profile
     * @return <type>
     */
    public static function addInHome($userTK,$profileID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addInHome($userTK,$profileID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getTotalPages($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalPages($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
}
?>