<?php
/**
 * Client Side webservices for user news collection
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
class MyNews {

    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/MyNews.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * Add a New to the user account
     * @param <type> $new
     * @return <type>
     */
    public static function addNews($userTK,$newsXML){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addNews($userTK,$newsXML);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Remove a New from user account
     * @param <type> $new
     * @return <type>
     */
    public static function removeNews($userTK,$newsID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->removeNews($userTK,$newsID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a New metadata
     * @param <type> $new
     * @return <type>
     */
    public static function getNews($userTK,$newsID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getNews($userTK,$newsID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a new list from a specific user.
     * @param <obj> $new
     * @param <number> $from start register
     * @param <number> $count total of registers
     * @param <oarams> $params array([date,rate])
     * @return <array>
     */
    public static function getNewsList($userTK, $params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getNewsList($userTK, $params);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a new list with the parameter InHome=1
     * @param <obj> $new
     * @return <array>
     */
    public static function getInHomeNews($userTK,$newsID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getInHomeNews($userTK,$newsID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a new list with the parameter InHome=1
     * @param <obj> $new
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
      * Update the new and the new metadata
      * @param <String> $userTK Hash user identification
      * @param <number> $newsID new to be updated
      * @param <String> $new XML with new new metadata
      * @return <boolean>
      */
    public static function updateNews($userTK,$newsID,$newXML){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateNews($userTK,$newsID,$newXML);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Changes the value of rate attribute
     * @param <obj> $new
     * @return <boolean>
     */
    public static function updateNewsRate($userTK,$newsID,$newRate){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateNewsRate($userTK,$newsID,$newRate);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
    /**
     * Changes the value of the attribute home to 0
     * @param <obj> $new
     * @return <true>
     */
    public static function deleteFromHome($userTK,$newsID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->deleteFromHome($userTK,$newsID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Changes the value of the attibute home to 1
     * @param <type> $new
     * @return <type>
     */
    public static function addInHome($userTK,$newsID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addInHome($userTK,$newsID);
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