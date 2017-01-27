<?php
/**
 * Client Side webservices for SimilarDocs service
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
class SimilarDocs {
    
    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/SimilarDocs.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * Add profile in SimiliarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param string $string
     * @return boolean
     */
    public static function addProfile($userID,$profile,$string){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addProfile($userID,$profile,$string);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * Delete profile in SimiliarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return boolean
     */
    public static function deleteProfile($userID,$profile){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->deleteProfile($userID,$profile);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * List similars documents
     *
     * @param string $userTK User hash
     * @param string $profile Profile name
     * @return array
     */
    public static function getSimilarsDocs($userTK,$profile){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSimilarsDocs($userTK,$profile);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * List suggested documents
     *
     * @param string $userTK User hash
     * @return array
     */
    public static function getSuggestedDocs($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSuggestedDocs($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * List ORCID works
     *
     * @param string $userTK User hash
     * @param array $params
     * @return array
     */
    public static function getOrcidWorks($userTK,$params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getOrcidWorks($userTK,$params);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

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