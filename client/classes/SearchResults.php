<?php
/**
 * Client Side webservices for user search results
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
class SearchResults {

    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/SearchResults.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * Add a search result to the user account
     * @param <String> $userTK Hash user identification
     * @param <String> $xml XML with new search results metadata
     * @return <type>
     */
    public static function addRSS($userTK,$xml){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addRSS($userTK,$xml);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Remove a search result from user account
     * @param <String> $userTK Hash user identification
     * @param <number> $rssID
     * @return <type>
     */
    public static function removeRSS($userTK,$rssID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->removeRSS($userTK,$rssID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a search result metadata
     * @param <String> $userTK Hash user identification
     * @param <number> $rssID
     * @return <type>
     */
    public static function getRSS($userTK,$rssID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getRSS($userTK, $rssID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a search results list from a specific user.
     * @param <String> $userTK Hash user identification
     * @param <array> $params
     * @return <array>
     */
    public static function getRSSList($userTK,$params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getRSSList($userTK, $params);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
      * Update the search result metadata
      * @param <String> $userTK Hash user identification
      * @param <number> $rssID
      * @param <String> $xml
      * @return <boolean>
      */
    public static function updateRSS($userTK,$rssID,$xml){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateRSS($userTK, $rssID, $xml);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
      * Parse RSS to Array
      * @param <String> $userTK Hash user identification
      * @param <number> $rssID
      * @return <array>
      */
    public static function parseRSS($userTK,$rssID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->parseRSS($userTK, $rssID);
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