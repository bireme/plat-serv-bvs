<?php
/**
 * Shelf Data Access Object
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
require_once(dirname(__FILE__)."/Shelf.php");
require_once(dirname(__FILE__)."/DocumentDAO.php");
require_once(dirname(__FILE__)."/UserDirectoryDAO.php");
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/Tracking.php");

class ShelfDAO {

    /**
     * Add a new shelf item
     *
     * @param object $shelf Shelf object
     * @return boolean
     */
	public static function addDocToShelf($shelf){
        
        $sysUID = UserDAO::getSysUID($shelf->getUserID());

        /* get directory and document objects */
        $objUserDirectory = $shelf->getDir();
        $objDocument = $shelf->getDocument();

        /* to add a document to the incoming folder, $dirID may be 0 */
        if(empty($objUserDirectory)){
            $dirID = '0';
        }else{
            $dirID = $objUserDirectory[0]->getDirID();
        }

        $retValue = false;
        
        if(!self::isInShelf($shelf)){
            if($shelf->getCitedStat()){
			$citedStat = $shelf->getCitedStat();
            }else{
                $citedStat = 0;
            }
            if($shelf->getAccessStat()){
                $accessStat = $shelf->getAccessStat();
            }else{
                $accessStat = 0;
            }
            $strsql = "INSERT INTO
                                userShelf
                                    (userDirID,
                                    sysUID,
                                    docID,
                                    insertDate,
                                    visible)
                                VALUES (
                                    '".$dirID."',
                                    '".$sysUID."',
                                    '".$objDocument->getDocID()."',
                                    '".date('Y-m-d H:i:s')."',
                                    '1')";           
            
            
            try{
                $_db = new DBClass();
                $insertID = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){            
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
            
            if(!is_array($insertID)){
                $trace = Tracking::addTrace( $shelf->getUserID(), 'collection', 'add', $objDocument->getDocTitle() );
                $retValue = true;
            }
        }else{
    	    $retValue = true;
    	}

        return $retValue;
	}

    /**
     * Update shelf item attributes
     *
     * @param object $shelf Shelf object
     * @return boolean
     */
    public static function UpdateDocumentInShelf($shelf){

        $sysUID = UserDAO::getSysUID($shelf->getUserID());

        /* get document object */
        $objDocument = $shelf->getDocument();

        /* default return value */
        $retValue = false;

        $strsql = "UPDATE userShelf SET ";
        if(($shelf->getCitedStat() === 0) || ($shelf->getCitedStat() === 1))
        {
                $strsql .= "citedStat = '".$shelf->getCitedStat()."'";
        }
        if(($shelf->getAccessStat() ===0) || ($shelf->getAccessStat() ===1)){
                $strsql .= "accessStat = '".$shelf->getAccessStat()."'";
        }
        if(($shelf->getVisible() === 0) || ($shelf->getVisible() === 1)){
                $strsql .= "visible = '".$shelf->getVisible()."'";
        }
        $strsql .= " WHERE sysUID = '".$sysUID."' AND
                     docID = '".$objDocument->getDocID()."'";
        
        try{
            $_db = new DBClass();
            $res = $_db->databaseExecUpdate($strsql);
        }catch(DBClassException $e){            
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res > 0){
            $retValue = true;
        }
        return $retValue;
    }

    /**
     * Update document rate
     *
     * @param string $userID User ID
     * @param int $docID Document ID
     * @param int $docRank Document rank value
     * @return boolean
     */
    public static function UpdateDocumentRate($userID,$docID,$docRank){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $retValue = false;
                $strsql = "Update userShelf SET rate=".$docRank."
                    WHERE sysUID = '".$sysUID."' AND
                        docID = '".$docID."'";

            try{
                $_db = new DBClass();
                $res = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if($res > 0){
                $retValue = true;
            }
        }
        return $retValue;
    }

    /**
     * Remove a shelf item
     *
     * @param string $userID User ID
     * @param int $docID Document ID
     * @return boolean
     */
    public static function remDocFromShelf($userID,$docID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $shelf = self::getShelfItem( $userID, $docID );
            $doc = $shelf->getDocument();

            $strsql = "DELETE FROM userShelf
                WHERE sysUID = '".$sysUID."' AND docID = '".$docID."'";

            try{
                $_db = new DBClass();
                $res = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if($res > 0){
                $trace = Tracking::addTrace( $userID, 'collection', 'remove', $doc->getDocTitle() );
                $retValue = true;
            }
        }

        return $retValue;
    }


    /**
     * Get a shelf item
     * 
     * @param string $userID User ID
     * @param int $docID Document ID
     * @return object shelf
     */
    public static function getShelfItem($userID,$docID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "SELECT * FROM userShelf, documents
                WHERE userShelf.sysUID = '".$sysUID."' and
                documents.docID = '".$docID."' and
                userShelf.docID = documents.docID";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $document = new Document();
            $document->setDocID($result[0]['docID']);
            $document->setDocURL($result[0]['url']);
            $document->setDocTitle($result[0]['title']);
            $document->setSerial($result[0]['serial']);
            $document->setVolume($result[0]['volume']);
            $document->setNumber($result[0]['number']);
            $document->setSuppl($result[0]['suppl']);
            $document->setYear($result[0]['year']);
            $document->setAuthors($result[0]['authors']);
            $document->setKeywords($result[0]['keywords']);

            $objUserDirectoryDAO = UserDirectoryDAO::getDir($result[0]['sysUID'],
                $result[0]['userDirID']);

            $shelf = new Shelf();
            $shelf->setShelfID($result[0]['shelf_id']);
            $shelf->setCitedStat($result[0]['cited_stat']);
            $shelf->setAccessStat($result[0]['access_stat']);
            $shelf->setUserID($result[0]['userID']);
            $shelf->setVisible($result[0]['visible']);
            $shelf->setRate($result[0]['rate']);
            $shelf->setDir($objUserDirectoryDAO);
            $shelf->setDocument($document);

            $retValue = $shelf;
        }
        return $retValue;
    }

    /**
     * List items in shelf
     *
     * @param object $shelf Shelf object
     * @param array $params Assoc. array of parameters. Keys: page|sort
     * @return array object Shelf
     */
    public static function listDocs($shelf, $params){
        $result = false;

        $sysUID = UserDAO::getSysUID($shelf->getUserID());

        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];
        $objUserDirectory = $shelf->getDir();
        
        if($objUserDirectory){
            $dirID = $objUserDirectory[0]->getDirID();
        }

        if (isset($dirID)){
            if ($dirID == 0){
                $filter = " and userShelf.userDirID=0";
            }else{
                $filterTb = ", directories";
                $filter = " and userShelf.userDirID=directories.dirID
                    and userShelf.userDirID=".$dirID;
            }
        }else{
            $filter = ( !$params["widget"] ) ? " and userShelf.userDirID=0" : "";
        }

        switch ($params["sort"]){
            case "rate":
                $sort = "rate desc";
            break;
            case "date":
                $sort = "insertDate desc";
            break;
            default:
                $sort = "insertDate desc";
            break;
        }

        $strsql = "SELECT * FROM userShelf, documents".$filterTb."
            WHERE userShelf.sysUID = '".$sysUID."' and
                  userShelf.docID = documents.docID and
                  userShelf.visible = 1 ".$filter."
            order by userShelf.".$sort;

        if($count > 0){
            $strsql .= " LIMIT $from,$count";
        }

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){            
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        return $result;
    }

    /**
     * Check if a shelf exists
     *
     * @param object $shelf Shelf object
     * @return boolean
     */
    public static function isInShelf($shelf){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($shelf->getUserID());

        $objDocument = $shelf->getDocument();
        
        $strsql = "SELECT * FROM userShelf
            WHERE sysUID = '".$sysUID."' and
            docID ='".$objDocument->getDocID()."'";

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){            
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }
        
        if (count($result) === 0 ){
            return false;
        }else{
            return true;
        }
    }

    /*
    *implementar
    */
	public static function hasAlerts($shelf){}

    /**
     * Return the list of items that have been marked to get alert when Cited
     *
     * @param string $userID
     * @return array
     */
    public static function getCitedAlertList($userID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "SELECT * FROM userShelf, documents
                WHERE sysUID = '".$sysUID."' and
                userShelf.docID = documents.docID and userShelf.citedStat = 1";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if (count($result) !== 0 ){
                $retValue = $result;
            }
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
    public static function deleteCitedAlert($userID,$docID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "UPDATE userShelf set citedStat=0
                where docId='".$docID."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0 ){
                $retValue = true;
            }
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
    public static function enableCitedAlert($userID,$docID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "UPDATE userShelf set citedStat=1
                where docId='".$docID."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0 ){
                $retValue = true;
            }
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
    public static function deleteAccessAlert($userID,$docID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "UPDATE userShelf set accessStat=0
                where docId='".$docID."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0 ){
                $retValue = true;
            }
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
    public static function enableAccessAlert($userID,$docID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "UPDATE userShelf set accessStat=1
                where docId='".$docID."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0 ){
                $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Return the list of items that have been market to get access stat
     *
     * @param string $userID
     * @return boolean|array
     */
    public static function getAccessedAlertList($userID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "SELECT * FROM userShelf, documents
                WHERE userShelf.sysUID = '".$sysUID."' and userShelf.docID = documents.docID
                and userShelf.accessStat = 1";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }


            if (count($result) !== 0 ){
                $retValue = $result;
            }
        }

        return $retValue;
    }

    /**
     * Get total items
     *
     * @param object $shelf
     * @return int|boolean
     */
    public static function getTotalItens($userID, $dirID){
        $retValue = false;
        $filter = "";
        $sysUID = UserDAO::getSysUID($userID);
        
        if ( $sysUID ) {
            if(isset($dirID)){
                $filter = " and userDirID=".$dirID;
            }

            $strsql = "SELECT count(*) as total FROM userShelf
                WHERE sysUID ='".$sysUID."' AND visible = 1 ".$filter ;

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $retValue = isset( $result[0]['total'] ) ? $result[0]['total'] : false;
        }

        return $retValue;
    }

    /**
     * Get the total pages from a record set if using pagination. The number of
     * registers per page are configured in the config.php file
     *
     * @param object $shelf
     * @return int
     */
    public static function getTotalPages($userID, $dirID){
        $total = self::getTotalItens($userID, $dirID);
        return ceil ($total/DOCUMENTS_PER_PAGE);
    }

    /**
     * Move directory's content to another directory
     *
     * @param object $shelf
     * @param int $removeDir
     * @return boolean
     */
    public static function moveAllToAnotherDirectory($shelf,$removeDir){

        $sysUID = UserDAO::getSysUID($shelf->getUserID());

        $strsql = "Update userShelf SET userDirID=".$shelf->getDir()."
            WHERE sysUID = '".$sysUID."' and userDirID=".$removeDir;

        try{
            $_db = new DBClass();
            $result = $_db->databaseExecUpdate($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        $userDirectoryDAO = new UserDirectoryDAO();
        $directory = new UserDirectory();
        $directory->setDirID($removeDir);
        $directory->setUserID($shelf->getUserID());
        $result = $userDirectoryDAO->remDir($directory);

        return $result;
    }

    /**
     * Move a specific document to another directory
     *
     * @param string $userID
     * @param int $fromDirID
     * @param int $toDirID
     * @param int $docID
     * @return boolean
     */
    public static function moveDocToAnotherDirectory($userID,$fromDirID,$toDirID,$docID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "Update userShelf SET userDirID=".$toDirID."
                WHERE userDirID=".$fromDirID." and docID= '".$docID."'
                and sysUID = '".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0 ){
                $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Delete all documents from a given directory
     *
     * @param object $shelf
     * @param int $removeDir
     * @return int Affected rows
     */
    public static function deleteAllOfDirectory($shelf,$removeDir){
        /*
         * fixme: return MySQL affected rows??!?!
         * reporter: Gustavo Fonseca (gustavo.fonseca@bireme.org)
         * date: 20090731
         */
        $sysUID = UserDAO::getSysUID($shelf->getUserID());

        $strsql = "DELETE FROM userShelf
            WHERE sysUID = '".$sysUID."' AND dirID = ".$removeDir;

        try{
            $_db = new DBClass();
            $result = $_db->databaseExecUpdate($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $result;
    }
}

?>
