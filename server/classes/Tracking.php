<?php
/**
 * User Tracking Class
 *
 * Handle users data history
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
require_once(dirname(__FILE__)."/UserDAO.php");

/**
 * Tracking Class
 *
 * This class is responsible to handle the tracking of the user actions.
 */
class Tracking {

    /**
     * Add trace to the database
     * @param string $userID user mail
     * @param string $type content type
     * @param string $action user event
     * @param string $target content title
     * @return boolean
     */
    public static function addTrace($userID,$type,$action,$target){
        $result = false;

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "INSERT INTO
                                dataHistory
                                    (sysUID,
                                    datetime,
                                    type,
                                    action,
                                    target)
                                VALUES (
                                    '".$sysUID."',
                                    '".date('Y-m-d H:i:s')."',
                                    '".strtoupper($type)."',
                                    '".strtoupper($action)."',
                                    '".$target."')";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result === null){
                $result = false;
            }else{
                $result = true;
            }
        }

        return $result;
    }

    /**
     * Get a list of data history from a specific user
     *
     * @param string $userID user mail
     * @param array $params [sort=>rate|date]
     * @return array result set from select query
     *
     */
    public static function getTraceList($userID, $params){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if($sysUID){
            switch ($params["sort"]){
                case "date":
                    $sort = "traceID";
                    break;
                default:
                    $sort = "traceID desc";
                    break;
            }

            $strsql = "SELECT * FROM dataHistory WHERE
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
}
?>