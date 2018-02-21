<?php
/**
 * User SearchDAO Class
 *
 * Handle users search results
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__).'/../include/DAO.inc.php');
require_once(dirname(__FILE__)."/Search.php");
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/Tracking.php");

class SearchDAO {
    /**
     * Add a new RSS
     *
     * @param string $userID user id
     * @param object $objSearch
     * @return boolean
     */
    public static function addRSS($userID,$objSearch){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if(!self::rss_exists($sysUID, $objSearch->getName())){
            $parse = self::parseRSS($userID, null, $objSearch->getURL());
            $image = ($parse["channel"]["image"]["url"]) ? $parse["channel"]["image"]["url"] : '';

            $strsql = "INSERT INTO searchResults(sysUID,
                                            url,
                                            name,
                                            image,
                                            creation_date)
                                VALUES ('".$sysUID."','".
                                           $objSearch->getURL()."','".
                                           $objSearch->getName()."','".
                                           $image."','".
                                           date("Y-m-d H:i:s")."')";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        } else {
            $retValue = "exists";
        }

        if ( $result ) {
            $trace = Tracking::addTrace( $userID, 'rss', 'add', $objSearch->getName() );
            $retValue = true;
        }

        return $retValue;
    }

    /**
     * update an existing RSS
     *
     * @param string $userID user id
     * @param int $rssID
     * @param object $objSearch
     * @return boolean
     */
	public static function updateRSS($userID,$rssID,$objSearch){
            $retValue = false;
            $sysUID = UserDAO::getSysUID($userID);

            $parse = self::parseRSS($userID, null, $objSearch->getURL());
            $image = ($parse["channel"]["image"]["url"]) ? $parse["channel"]["image"]["url"] : '';

            $strsql = "UPDATE searchResults SET name='".$objSearch->getName()."',
                        url='".$objSearch->getURL()."',
                        image='".$image.
                        "' WHERE id=".$rssID." and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0){
                $trace = Tracking::addTrace( $userID, 'rss', 'update', $objSearch->getName() );
                $retValue = true;
            }

            return $retValue;
	}

    /**
     * get user RSS list
     *
     * @param string $userID user id
     * @param array $params
     * @return array object
     */
    public static function getRSSList($userID, $params){
        global $_conf;
        $retValue = false;
        $sysUID = UserDAO::getSysUID($userID);

        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : RSS_DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];
        
        $strsql = "SELECT * FROM  searchResults
            WHERE sysUID = '".$sysUID."'
            ORDER BY id DESC";

        if( $count > 0 ) {
            $strsql .= " LIMIT $from,$count";
        }

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if ( count($result) !== 0 ){
            $retValue = $result;
        }

        return $retValue;
    }

    /**
     * get one specified user RSS
     *
     * @param string $userID user id
     * @param int $rssID
     * @return array object
     */
    public static function getRSS($userID,$rssID){
        $retValue = false;
        $sysUID = UserDAO::getSysUID($userID);

        $strsql = "SELECT * FROM searchResults
            WHERE sysUID = '".$sysUID."' and
            id = '".$rssID."'";

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if ( count($result) !== 0 ) {
            $retValue = $result;
        }

        return $retValue;
    }

    /**
     * Return the total of RSSs in a specified user account
     *
     * @param string $userID user mail
     * @return boolean|int
     */
    public static function getTotalItens($userID){
        $retValue = false;
        $sysUID = UserDAO::getSysUID($userID);

        if ( $sysUID ) {
            $strsql = "SELECT count(*) as total FROM searchResults
                WHERE sysUID='".$sysUID."'";

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
     * Returns the number of pages from a range of RSSs.
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
     * Remove an user RSS
     *
     * @param string $userID user mail
     * @param int $rssID
     * @return boolean
     */
    public static function removeRSS($userID,$rssID){
        $retValue = false;
        $sysUID = UserDAO::getSysUID($userID);
        $objSearch = self::getRSS( $userID, $rssID );

        $strsql = "DELETE FROM searchResults
            WHERE id = ".$rssID." and sysUID = '".$sysUID."'";

        try{
            $_db = new DBClass();
            $result = $_db->databaseExecUpdate($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if ($result !== 0){
            $trace = Tracking::addTrace( $userID, 'rss', 'remove', $objSearch[0]['name'] );
            $retValue = true;
        }
        
        return $result;
    }

    /**
     * Check if the RSS exists
     *
     * @param int $sysUID user ID
     * @param string $name
     * @return boolean
     */
    public static function rss_exists($sysUID,$name){
        $retValue = false;

        $strsql = "SELECT count(id) FROM searchResults
            WHERE sysUID = '".$sysUID."'
            AND name = '".trim($name)."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['count(id)'] == 1){
            $retValue = true;
        }

        return $retValue;
    }
    
    /**
     * Get an array of document objects from an XML string
     *
     * @param string $xml
     * @return mixed
     */
    public static function getRSSFromXML($xml){
        $retValue = false;

        /* load simpleXML object */
        $xml = simplexml_load_string($xml);

        if($xml){
            /* array of profile objects */
            $arrObjProfile = array();

            foreach($xml->doc as $elem){
                /* instantiate a new profile object */
                $objSearch = new Search();

                foreach($elem->field as $fieldOcc){
                    switch((string)$fieldOcc['name']){
                        case 'name':
                            $objSearch->setName((string)$fieldOcc);
                            break;
                        case 'url':
                            $objSearch->setURL((string)$fieldOcc);
                            break;
                    }
                }

                /* append the link object array */
                $arrObjSearch[] = $objSearch;

                unset($objSearch);
            }

            $retValue = $arrObjSearch;
        }

        return $retValue;
    }

    /**
     * Parse RSS to Array
     *
     * @param string $userID user id
     * @param int $rssID
     * @param string $url
     * @return boolean|array
     */
    public static function parseRSS($userID,$rssID,$url=''){
        if ( empty($url) ) {
            $rss = self::getRSS($userID, $rssID);
            $url = $rss[0]['url'];
        }

        /* load simpleXML object */
        $xml = @file_get_contents($url);
        $xml = simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA);
        $json = json_encode($xml);
        $result = json_decode($json,true);

        return $result;
    }
}
?>
