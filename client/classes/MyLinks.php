<?php
/**
 * Client Side webservices for user links collection
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
class MyLinks {

    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/MyLinks.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * Add a Link to the user account
     * @param <type> $link
     * @return <type>
     */
    public static function addLink($userTK,$linksXML){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addLink($userTK,$linksXML);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Remove a Link from user account
     * @param <type> $link
     * @return <type>
     */
    public static function removeLink($userTK,$linkID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->removeLink($userTK,$linkID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a Link metadata
     * @param <type> $link
     * @return <type>
     */
    public static function getLink($userTK,$linkID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getLink($userTK,$linkID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a link list from a specific user.
     * @param <obj> $link
     * @param <number> $from start register
     * @param <number> $count total of registers
     * @param <oarams> $params array([date,rate])
     * @return <array>
     */
    public static function getLinkList($userTK, $params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getLinkList($userTK,
                $params, $from=0, $count=-1);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Return a link list with the parameter InHome=1
     * @param <obj> $link
     * @return <array>
     */
    public static function getInHomeLinks($userTK,$linkID){}

    /**
     * Return a link list with the parameter InHome=1
     * @param <obj> $link
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
      * Update the link and the link metadata
      * @param <String> $userTK Hash user identification
      * @param <number> $linkID link to be updated
      * @param <String> $link XML with new link metadata
      * @return <boolean>
      */
    public static function updateLink($userTK,$linkID,$linkXML){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateLink($userTK,$linkID,$linkXML);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Changes the value of rate attribute
     * @param <obj> $link
     * @return <boolean>
     */
    public static function updateLinkRate($userTK,$linkID,$linkRate){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updateLinkRate($userTK,
                $linkID,$linkRate);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
    /**
     * Changes the value of the attribute home to 0
     * @param <obj> $link
     * @return <true>
     */
    public static function deleteFromHome($userTK,$linkID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->deleteFromHome($userTK,$linkID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    /**
     * Changes the value of the attibute home to 1
     * @param <type> $link
     * @return <type>
     */
    public static function addInHome($userTK,$linkID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addInHome($userTK,$linkID);
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