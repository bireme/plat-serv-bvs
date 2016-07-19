<?php
/**
 * User directories Data Access Object
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
require_once(dirname(__FILE__)."/UserDirectory.php");
require_once(dirname(__FILE__)."/UserDAO.php");

class UserDirectoryDAO {

    /**
     * Create a new user's directory
     *
     * @param object $directory Directory object
     * @return mixed If success returns a directory object, else returns false
     */
    public static function addDir($directory){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($directory->getUserID());

        if(!self::directoryExist($directory)){
            $strsql = "INSERT INTO
                        directories
                            (name,offline,sysUID)
                        VALUES (
                            '".$directory->getDirName()."',0,
                            '".$sysUID."')";

            try{
                $_db = new DBClass();
                $dirID = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $retValue = self::getDir($directory->getUserID(), $dirID);

        }else{
            $resListDir = self::listDirs($directory);

            foreach($resListDir as $key => $element){
                if($element['name'] == $directory->getDirName()){
                    $retValue = $element;
                    break;
                }
            }
        }

        return $retValue;
    }

   /**
    * Remove a user's directory
    *
    * @param object $directory Directory object
    * @return integer $sucess 1 em caso de sucesso, 0 em caso de erro
    */
    public static function remDir($directory){

        $sysUID = UserDAO::getSysUID($directory->getUserID());

        $strsqlA = "DELETE FROM userShelf 
                       WHERE userDirID = ".$directory->getdirID()." and
                       sysUID='".$sysUID."'";
		$strsqlB = "DELETE FROM directories 
                       WHERE dirID = ".$directory->getdirID()." and
                       sysUID='".$sysUID."'";
        
        try{
            $_db = new DBClass();
            $resultA = $_db->databaseExecUpdate($strsqlA);
            $resultB = $_db->databaseExecUpdate($strsqlB);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

		return true;
	}

	
    /**
     * Get an specific user directory
     *
     * @param string $userID
     * @param int $dirID
     * @return object UserDirectory
     */
    public static function getDir($userID,$dirID){

        $sysUID = UserDAO::getSysUID($userID);

        if($sysUID){
            $strsql = "SELECT * FROM directories
                           WHERE sysUID = '".$sysUID."' and
                           dirID = ".$dirID." and offline = 0";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $directoryItem = array();
            for($i = 0; $i < count($result); $i++)
            {
                $directory = new UserDirectory();
                $directory->setdirID($result[$i]['dirID']);
                $directory->setDirName($result[$i]['name']);
                $directory->setOffline($result[$i]['offline']);
                $directory->setUserID($result[$i]['userID']);
                $directory->setPublic($result[$i]['public']);
                
                array_push($directoryItem, $directory);
            }
            return $directoryItem;
        }else{
            return false;
        }
    }

    /**
     * Get a directory name
     *
     * @param object Directory
     * @return string|boolean
     */
    public static function getDirName($directory){
        /*
         * fixme: The UserDirectory class already returns this attribute
         * reporter: Gustavo Fonseca (gustavo.fonseca@bireme.org)
         * date: 20090730
         */
        $sysUID = UserDAO::getSysUID($directory->getUserID());

        $strsql = "select * from directories
              where sysUID = '".$sysUID."' and dirID = ".$directory->getDirID();

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        $result = $result[0]['name'];

        if (count($result) > 0 ){
            return $result;
        }else{
            return false;
        }
    }

    /**
     * List user's directories
     *
     * @param object $directory User Directory object
     * @return boolean|array
     */
    public static function listDirs($directory){

        $sysUID = UserDAO::getSysUID($directory->getUserID());

        $strsql = "SELECT * FROM directories
            WHERE sysUID = '".$sysUID."' and offline = 0 order by name";

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if (count($result) > 0 ){
            return $result;
        }else{
            return false;
        }
    }

    /**
     * Check if directory exists
     *
     * @param object $directory User Directory object
     * @return boolean
     */
    public static function directoryExist($directory){

        $sysUID = UserDAO::getSysUID($directory->getUserID());

        $strsql = "SELECT * FROM directories
            WHERE name = '".$directory->getDirName()."' and
                sysUID ='".$sysUID."'";

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if(count($result) > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Edit directory's name
     *
     * @param object $directory User Directory object
     * @return int MySQL affected rows
     */
    public static function editDir($directory){
        /*
         * fixme: update userID attribute??!! Think this method should be called
         *            renameDir or something like that
         *        return MySQL affected rows does not make sense 
         * reporter: Gustavo Fonseca (gustavo.fonseca@bireme.org)
         * date: 20090730
         */
        $sysUID = UserDAO::getSysUID($directory->getUserID());

        $strsql = "UPDATE directories set name='".$directory->getDirName()."',
            sysUID='".$sysUID."'
            WHERE dirID=".$directory->getdirID();

        try{
            $_db = new DBClass();
            $result = $_db->databaseExecUpdate($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $result;
    }

    /**
     * Set directory status public
     *
     * @param object $directory User Directory object
     * @return int MySQL affected rows
     */
    public static function setPublic($directory){

        $sysUID = UserDAO::getSysUID($directory->getUserID());

        $strsql = "UPDATE directories set public = '".$directory->getPublic()."'
            WHERE sysUID='".$sysUID."' and dirID=".$directory->getdirID();

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