<?php
/**
 * Client Side webservices for trigramas service
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
class Trigramas {
    
    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/Trigramas.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * list Trigramas Similars by $docID
     *
     * @param string $string
     * @return string XML
     */
    public static function getSimilarsByID($docID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSimilarsByID($docID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * list Trigramas Similars by String
     *
     * @param string $string
     * @return string XML
     */
    public static function getSimilarsByString($string){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSimilarsByString($string);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * list Trigramas Similars by String
     *
     * @param string $string
     * @param string $mode [lilacs|scielo]
     * @return Array
     */
    public static function getSimilarsByStringArr($string,$mode ){
        $retValue = false;

        try{
            $mode = empty($mode)? $mode=DEFAULT_TRIGRAMAS_MODE : $mode;
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSimilarsByStringArr($string,$mode);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * list Trigramas Similars by String
     *
     * @param string $string
     * @return Formated reference in ISO Format
     */
    public static function getSimilarsByStringISO($string,$mode ){
        $retValue = false;

        try{
            $mode = empty($mode)? $mode=DEFAULT_TRIGRAMAS_MODE : $mode;
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getSimilarsByStringISO($string,$mode);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }

    /**
     * list Trigramas Cited by $docID
     *
     * @param string $string
     * @return string XML
     */
    public static function getCitedByID($docID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getCitedByID($docID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $retValue;
    }
}
?>