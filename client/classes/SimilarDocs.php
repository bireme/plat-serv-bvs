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
     * Add profile in SimilarDocs service
     *
     * @param string $userTK User hash
     * @param int $profileID Profile ID
     * @param string $profileName Profile name
     * @param string $string
     * @return boolean
     */
    public static function addProfile($userTK,$profileID,$profileName,$string){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addProfile($userTK,$profileID,$profileName,$string);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * Delete profile in SimilarDocs service
     *
     * @param string $userTK User hash
     * @param int $profileID Profile ID
     * @param string $profileName Profile name
     * @return boolean
     */
    public static function deleteProfile($userTK,$profileID,$profileName){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->deleteProfile($userTK,$profileID,$profileName);
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
     * @param int $profileID Profile ID
     * @return array
     */
    public static function getSimilarsDocs($userTK,$profileID,$params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSimilarsDocs($userTK,$profileID,$params);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * Add suggested documents
     *
     * @param string $userTK User hash
     * @param array $suggestions
     * @return array
     */
    public static function addSuggestedDocs($userTK,$suggestions){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addSuggestedDocs($userTK,$suggestions);
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
     * @param array $params
     * @param boolean $update
     * @return array
     */
    public static function getSuggestedDocs($userTK,$params,$update){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSuggestedDocs($userTK,$params,$update);
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

    /**
     * Get related documents
     *
     * @param string $userTK User hash
     * @param string $string
     * @return boolean|array
     */
    public static function getRelatedDocs($userTK,$string){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getRelatedDocs($userTK,$string);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * Get public related documents
     *
     * @param string $string
     * @return boolean|array
     */
    public static function getPublicRelatedDocs($string){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getPublicRelatedDocs($string);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    public static function getTotalOrcidWorks($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalOrcidWorks($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getTotalOrcidWorksPages($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalOrcidWorksPages($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getTotalSimilarsDocs($userTK,$profileID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalSimilarsDocs($userTK,$profileID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getTotalSimilarsDocsPages($userTK,$profileID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalSimilarsDocsPages($userTK,$profileID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getTotalSuggestedDocs($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalSuggestedDocs($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getTotalSuggestedDocsPages($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalSuggestedDocsPages($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getGoogleScholarLinks($userTK,$putcode,$gslink){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getGoogleScholarLinks($userTK,$putcode,$gslink);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
}
?>