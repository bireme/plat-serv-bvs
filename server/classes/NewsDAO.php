<?php
/**
 * User NewsDAO Class
 *
 * Handle users news
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
require_once(dirname(__FILE__)."/News.php");
require_once(dirname(__FILE__)."/UserDAO.php");
/**
 * News DAO class
 */
class NewsDAO {

    /**
     * Add user news to the database
     *
     * @param string $userID user mail
     * @param object $news new object
     * @return array
     */
    public static function addNews($userID,$news){

        $result = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            if(! self::newsExist($userID,$news)){
                $strsql = "INSERT INTO userNews (sysUID, name, url, description, inHome)
                    VALUES ('".$sysUID."','".$news->getName()."','".$news->getUrl()."',
                    '".$news->getDescription()."',".$news->getInHome().")";

                try{
                    $_db = new DBClass();
                    $result = $_db->databaseExecInsert($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }
            if ($result !== null){
                $result = true;
            }
        }

        return $result;
    }

    /**
     * Remove user news
     *
     * @param string $userID user mail
     * @param int $newsID
     * @return boolean
     */
    public static function removeNews($userID,$newsID){

        $result = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "DELETE FROM userNews WHERE newsID=".$newsID." and
                sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0){
                $result = true;
            }
        }
        return $result;
    }

    /**
     * Get a specific news metadata
     *
     * @param string $userID user mail
     * @param int $newsID
     * @return boolean|array news record set
     */
    public static function getNews($userID,$newsID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "SELECT * FROM userNews WHERE newsID=".$newsID." and
                sysUID='".$sysUID."'";

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
     * Get user news list
     *
     * @param string $userID user mail
     * @param array $params [sort=>rate|date]
     * @param int $from
     * @param int $count
     * @return boolean|array news record set
     */
    public static function getNewsList($userID, $params){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);
        $count = DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if($sysUID){

            switch ($params["sort"]){
                case "rate":
                    $sort = "rate desc";
                    break;
                case "date":
                    $sort = "newsID desc";
                    break;
                default:
                    $sort = "rate desc";
                    break;
            }

            $strsql = "SELECT * FROM userNews
                WHERE sysUID='".$sysUID."' order by ".$sort;

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

            if (count($result) !== 0 ){
                $retValue = $result;
            }
        }

        return $retValue;
    }

    /**
     * Get a news list that is defined to be shown in a highlight portlet
     *
     * @param string $userID user mail
     * @return boolean|array news record set
     */
    public static function getInHomeNews($userID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){


            $strsql = "SELECT * FROM userNews
                WHERE sysUID='".$sysUID."' and
                inHome=1 order by rate desc";

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
     * Verify if a news name already exist in the database
     *
     * @param string $userID user mail
     * @param object $news
     * @return boolean
     */
    public static function newsExist($userID,$news){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "SELECT * FROM userNews
                WHERE name='".$news->getName()."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if(count($result) > 0){
                $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Get the total pages from a record set if using pagination. The number of
     * registers per page are configured in the config.php file
     *
     * @param string $userID user mail
     * @return boolean|int int > 0
     */
    public static function getTotalItens($userID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "SELECT count(*) as total FROM userNews
                WHERE sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result[0]["total"] !== 0 ){
                $retValue = $result[0]['total'];
            }
        }

        return $retValue;
    }

    /**
     * Update user news metadata
     *
     * @param string $userID user mail
     * @param int $newsID
     * @param object $news
     * @return boolean
     */
    public static function updateNews($userID,$newsID,$news){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "UPDATE userNews set name='".$news->getName()."',
                url='".$news->getUrl()."',
                description='".$news->getDescription()."',
                inHome=".$news->getInHome()."
                WHERE newsID=".$newsID." and sysUID='".$sysUID."'";

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
     * Update news rate value
     *
     * @param string $userID user mail
     * @param int $newsID
     * @param int $newRate [0|1|2|3]
     * @return boolean
     */
	public static function UpdateNewsRate($userID,$newsID,$newRate){

            $retValue = false;

            $sysUID = UserDAO::getSysUID($userID);

            if($sysUID){

                $strsql = "Update userNews SET rate=".$newRate."
                    WHERE newsID=".$newsID." and
                    sysUID='".$sysUID."'";

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
     * Change the flag that show the news in a highlight portlet
     *
     * @param string $userID user mail
     * @param int $newsID
     * @return boolean
     *
     */
    public static function deleteFromHome($userID,$newsID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "Update userNews SET inHome=0
                WHERE newsID=".$newsID." and sysUID='".$sysUID."'";

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
     * Change the flag that show the news in a highlight portlet
     *
     * @param string $userID user mail
     * @param int $newsID
     * @return boolean
     */
    public static function addInHome($userID,$newsID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "Update userNews SET inHome=1
                WHERE newsID=".$newsID." and sysUID='".$sysUID."'";

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
     * Get the total pages from a record set if using pagination. The number of
     * registers per page are configured in the config.php file
     *
     * @param string $userID user mail
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalPages($userID,$itensPerPage){        
        $total = self::getTotalItens($userID);
        return ceil($total/$itensPerPage);
    }

    /**
     * Get an array of document objects from an XML string
     *
     * @param string $xmlDoc
     * @return mixed
     */
    public static function getNewsFromXML($xmlNews){
        /* load simpleXML object */
        $xml = simplexml_load_string($xmlNews);

        if($xml){
            /* array of new objects */
            $arrObjNews = array();

            foreach($xml->doc as $newsElem){
                /* instantiate a new new object */
                $objNews = new News();

                foreach($newsElem->field as $fieldOcc){
                    switch((string)$fieldOcc['name']){
                        case 'news_url':
                            $objNews->setUrl((string)$fieldOcc);
                            break;
                        case 'news_description':
                            $objNews->setDescription((string)$fieldOcc);
                            break;
                        case 'news_rate':
                            $objNews->setRate((string)$fieldOcc);
                            break;
                        case 'news_in_home':
                            $objNews->setInHome((string)$fieldOcc);
                            break;
                        case 'news_name':
                            $objNews->setName((string)$fieldOcc);
                            break;
                    }
                }
                /* append the new object array */
                $arrObjNews[] = $objNews;
                unset($objNews);
            }
            $retValue = $arrObjNews;
        }
        return $retValue;
    }
}
?>