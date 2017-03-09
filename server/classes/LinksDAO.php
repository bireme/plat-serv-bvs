<?php
/**
 * User LinksDAO Class
 *
 * Handle users links
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
require_once(dirname(__FILE__)."/Links.php");
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/Tracking.php");

/**
 * Links DAO Class
 *
 * This class is responsible to handle the business side of the user links
 * service.
 */
class LinksDAO {

    /**
     * Add a link to the database
     * @param string $userID user mail
     * @param object $link
     */
    public static function addLink($userID,$link){
        $result = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            if(! self::linkExist($userID,$link)){
                $strsql = "INSERT INTO
                                    userLinks
                                        (sysUID, name, url, description, inHome)
                                    VALUES (
                                        '".$sysUID."','".$link->getName()."','".$link->getUrl()."',
                                        '".$link->getDescription()."',".$link->getInHome().")";

                try{
                    $_db = new DBClass();
                    $result = $_db->databaseExecInsert($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }
            if ($result === null){
                $result = false;
            }else{
                $trace = Tracking::addTrace( $userID, 'link', 'add', $link->getName() );
                $result = true;
            }
        }

        return $result;
    }

    /**
     * Remove a link from the database
     *
     * @param string $userID user mail
     * @param int $linkID
     * @return boolean
     */
    public static function removeLink($userID,$linkID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $link = self::getLink($userID,$linkID);

            $strsql = "DELETE FROM userLinks WHERE linkID=".$linkID." and
            sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result === 0){
                $retValue = false;
            }else{
                $trace = Tracking::addTrace( $userID, 'link', 'remove', $link[0]['name'] );
                $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Get a link metadata from the database
     *
     * @param string $userID user mail
     * @param int $linkID
     * @return boolean|array
     */
	public static function getLink($userID,$linkID){
            $retValue = false;

            $sysUID = UserDAO::getSysUID($userID);

            if($sysUID){
                $strsql = "SELECT * FROM userLinks WHERE linkID=".$linkID." and
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
     * Get a list of links metadata from a specific user
     *
     * @param string $userID user mail
     * @param array $params [sort=>rate|date]
     * @param int $from used by pagination
     * @param int $count used by pagination
     * @return array result set from select query
     *
     */
    public static function getLinkList($userID, $params){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if($sysUID){
            switch ($params["sort"]){
                case "rate":
                    $sort = "rate desc";
                    break;
                case "date":
                    $sort = "linkID desc";
                    break;
                default:
                    $sort = "rate desc";
                    break;
            }

            $strsql = "SELECT * FROM userLinks WHERE
                sysUID='".$sysUID."' order by ".$sort;

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
     * Get user links that are checked to be shown in a highlight portlet
     *
     * @param string $userID user mail
     * @return boolean|array record set from a link register.
     */
    public static function getInHomeLinks($userID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){

            $strsql = "SELECT * FROM userLinks WHERE
                sysUID='".$sysUID."' and inHome=1 order by rate desc";

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
     * Verify if a link name already exists
     *
     * @param string $userID user mail
     * @param object $link
     * @return boolean
     */
    public static function linkExist($userID,$link){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "SELECT * FROM userLinks WHERE 
                name='".$link->getName()."' and sysUID='".$sysUID."'";

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
     * Get the total number of links from a specific user
     *
     * @param string $userID user mail
     * @return false|int int > 0
     */
    public static function getTotalItens($userID){
        $retValue = false;
        $sysUID = UserDAO::getSysUID($userID);

        if( $sysUID ) {
            $strsql = "SELECT count(*) as total FROM userLinks
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
     * Get the total pages from a record set if using pagination. The number of
     * registers per page is configured in the config.php file
     *
     * @param string $userID user mail
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalPages($userID,$itensPerPage){
        $_db = new DBClass();
        $total = self::getTotalItens($userID);
        return ceil($total/$itensPerPage);
    }

    /**
     * Update a link metadata
     *
     * @param string $userID user mail
     * @param int $linkID
     * @param object $link
     * @return boolean
     */
    public static function updateLink($userID,$linkID,$link){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "UPDATE userLinks set name='".$link->getName()."',
                url='".$link->getUrl()."',
                description='".$link->getDescription()."',
                inHome=".$link->getInHome()."
                WHERE linkID=".$linkID." and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0 ){
                $trace = Tracking::addTrace( $userID, 'link', 'update', $link->getName() );
                $retValue = true;
            }
        }

        return $retValue;
    }

    /**
     * Update link rate
     *
     * @param string $userID user mail
     * @param int $linkID
     * @param int $linkRate [0|1|2|3]
     * @return boolean
     */
    public static function UpdateLinkRate($userID,$linkID,$linkRate){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "Update userLinks SET rate=".$linkRate."
                WHERE linkID=".$linkID." and sysUID='".$sysUID."'";

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
     * Change the flag that show the link in a highlight portlet
     *
     * @param string $userID user mail
     * @param int $linkID
     * @return boolean
     */
    public static function deleteFromHome($userID,$linkID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "Update userLinks SET inHome=0
                WHERE linkID=".$linkID." and sysUID='".$sysUID."'";

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
     * Change a link flag to define that the link should be shown in a
     * highligh portlet
     *
     * @param string $userID user mail
     * @param int $linkID
     * @return boolean
     */
    public static function addInHome($userID,$linkID){

        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "Update userLinks SET inHome=1
                WHERE linkID=".$linkID." and sysUID='".$sysUID."'";

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
     * Get an array of document objects from an XML string
     *
     * @param string $xmlDoc
     * @return mixed
     */
    public static function getLinkFromXML($xmlLink){
        /* load simpleXML object */
        $xml = simplexml_load_string($xmlLink);

        if($xml){
            /* array of link objects */
            $arrObjLink = array();

            foreach($xml->doc as $linkElem){
                /* instantiate a new link object */
                $objLink = new Links();

                foreach($linkElem->field as $fieldOcc){
                    switch((string)$fieldOcc['name']){
                        case 'link_url':
                            $objLink->setUrl((string)$fieldOcc);
                            break;
                        case 'link_description':
                            $objLink->setDescription((string)$fieldOcc);
                            break;
                        case 'link_rate':
                            $objLink->setRate((string)$fieldOcc);
                            break;
                        case 'link_in_home':
                            $objLink->setInHome((string)$fieldOcc);
                            break;
                        case 'link_name':
                            $objLink->setName((string)$fieldOcc);
                            break;
                    }
                }
                /* append the link object array */
                $arrObjLink[] = $objLink;
                unset($objLink);
            }
            $retValue = $arrObjLink;
        }
        return $retValue;
    }
}
?>