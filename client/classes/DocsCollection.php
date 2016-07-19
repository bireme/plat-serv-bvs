<?php
/**
 * Client Side webservices interface for document collection
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
class DocsCollection {

    public static function listDocs($userTK,$dirID=null,$params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->listDocs($userTK,$dirID,$params);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    function getTotalDocs($userTK,$dirID=null){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTotalDocs($userTK,$dirID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function addDoc($userTK,$xmlDoc){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addDoc($userTK,$xmlDoc);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function remDoc($userTK,$docID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->remDoc($userTK,$docID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getAccessAlertList($userTK){
        $retValue = false;
        
        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getAccessAlertList($userTK);        
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

/**
 * Turn off the citation alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function deleteCitedAlert($userTK,$docID){
    $retValue = false;

    try{
        $objSoapClient = self::getSoapClient();
        $retValue = $objSoapClient->deleteCitedAlert($retParams['userTK']['userID'],$docID);
    }catch(Exception $e){
        $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
        $logger->log($e->getMessage(),PEAR_LOG_EMERG);
    }

    return $retValue;
}

/**
 * Turn on the citation alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function enableCitedAlert($userTK,$docID){
    $retValue = false;
    
    try{
        $objSoapClient = self::getSoapClient();
        $retValue = $objSoapClient->enableCitedAlert($retParams['userTK']['userID'],$docID);
    }catch(Exception $e){
        $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
        $logger->log($e->getMessage(),PEAR_LOG_EMERG);
    }

    return $retValue;
}

/**
 * Turn off the access alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function deleteAccessAlert($userTK,$docID){
    $retValue = false;

    try{
        $objSoapClient = self::getSoapClient();
        $retValue = $objSoapClient->deleteAccessAlert($retParams['userTK']['userID'],$docID);
    }catch(Exception $e){
        $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
        $logger->log($e->getMessage(),PEAR_LOG_EMERG);
    }

    return $retValue;
}

/**
 * Turn on the access alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function enableAccessAlert($userTK,$docID){
    $retValue = false;

    try{
        $objSoapClient = self::getSoapClient();
        $retValue = $objSoapClient->enableAccessAlert($retParams['userTK']['userID'],$docID);
    }catch(Exception $e){
        $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
        $logger->log($e->getMessage(),PEAR_LOG_EMERG);
    }

    return $retValue;
}


    public static function getCitedAlertList($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getCitedAlertList($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function updDocRank($userTK,$docID,$rankValue){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->updDocRank($userTK,$docID,$rankValue);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function listDirs($userTK){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->listDirs($userTK);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function addDir($userTK,$dirName){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->addDir($userTK,$dirName);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function remDir($userTK,$dirID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->remDir($userTK,$dirID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function moveAllToAnotherDirectory($userTK,$toDirID,$removeDirID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->moveAllToAnotherDirectory($userTK,
                $toDirID,$removeDirID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function moveDocToAnotherDirectory($userTK,$fromDirID,$toDirID,$docID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->moveDocToAnotherDirectory($userTK,$fromDirID,$toDirID,$docID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }
    
    public static function editDir($userTK,$dirID,$dirName){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->editDir($userTK,$dirID,$dirName);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function getDirName($userTK,$dirID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getDirName($userTK,$dirID);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    public static function toggleDirPublicStatus($userTK, $dirID){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->toggleDirPublicStatus($userTK, $dirID);
        }catch (Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/DocsCollection.php',
                                           'uri'=>'http://test-uri/'));
    }
}
?>
