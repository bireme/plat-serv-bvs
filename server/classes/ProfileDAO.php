<?php
/**
 * User ProfileDAO Class
 *
 * Handle users profiles
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
require_once(dirname(__FILE__)."/Profile.php");
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/SimilarDocs.php");
require_once(dirname(__FILE__)."/Tracking.php");

class ProfileDAO {
    /**
     * Aadd a new profile
     *
     * @param object $objProfile Profile object
     * @return boolean
     */
    public static function addProfile($userID,$objProfile){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        if(!self::isProfile($objProfile->getProfileID(),$objProfile->getProfileName())){
            if ($objProfile->getProfileDefault() == 1){
                $strsql = "UPDATE profiles set profileDefault=0
                             WHERE sysUID='".$sysUID."'";
                try{
                    $_db = new DBClass();
                    $result = $_db->databaseExecUpdate($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }
            
            $strsql = "INSERT INTO profiles(sysUID,
                                            profileText,
                                            profileName,
                                            creationDate,
                                            profileDefault)
                                VALUES ('".$sysUID."','".
                                           $objProfile->getProfileText()."','".
                                           $objProfile->getProfileName()."','".
                                           date("Y-m-d H:i:s")."','".
                                           $objProfile->getProfileDefault()."')";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        }

        if ($result !== null){
            $similarDocs = SimilarDocs::addProfile( $userID, $objProfile->getProfileName(), $objProfile->getProfileText() );
            $trace = Tracking::addTrace( $userID, 'profile', 'add', $objProfile->getProfileName() );
            $retValue = true;
        }

        return $retValue;
    }

    /**
     * update an existing profile
     *
     * @param object $objProfile Profile object
     * @return boolean
     */
	public static function updateProfile($userID,$profileID,$profile){

            $retValue = false;

            $sysUID = UserDAO::getSysUID($userID);

            if ($profile->getProfileDefault() == 1){
                $strsql = "UPDATE profiles set profileDefault=0
                           WHERE sysUID='".$sysUID."'";
                try{
                    $_db = new DBClass();
                    $result = $_db->databaseExecUpdate($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }

            $strsql = "UPDATE profiles set profileName='".$profile->getProfileName().
                        "', profileText='".$profile->getProfileText().
                        "', profileStatus='".$profile->getProfileStatus().
                        "', profileDefault='".$profile->getProfileDefault().
                        "' WHERE profileID=".$profileID." and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ($result !== 0){
                $similarDocs = SimilarDocs::addProfile( $userID, $profile->getProfileName(), $profile->getProfileText() );
                $trace = Tracking::addTrace( $userID, 'profile', 'update', $profile->getProfileName() );
                $retValue = true;
            }

            return $retValue;
	}

    /**
     * get user's profiles
     *
     * @param string $userID user id
     * @return array object Profile
     */
    public static function getProfileList($userID, $params, $from=0, $count=-1){
        global $_conf;
        $retValue = false;
        $sysUID = UserDAO::getSysUID($userID);
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : $count;
        $strsql = "SELECT * FROM  profiles
            WHERE sysUID = '".$sysUID."'";

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

        return $retValue;
    }

    /**
     * get one specified user profile
     *
     * @param string $userID user id
     * @param string $profileID profile id
     * @return array object Profile
     */
    public static function getProfile($userID,$profileID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        $strsql = "SELECT * FROM  profiles
            WHERE sysUID = '".$sysUID."' and
            profileID='".$profileID."'";

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

        return $retValue;
    }

    /**
     * Return the total of profiles in a specified user account
     *
     * @param string $userID user mail
     * @return boolean|int
     */
    public static function getTotalItens($userID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);
      
        $strsql = "SELECT count(*) as total FROM profiles
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

        return $retValue;
    }

    /**
     * Returns the number of pages from a range of profiles.
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
     * Remove an user profile
     *
     * @param string $userID user mail
     * @param int $linkID
     * @return boolean
     */
    public static function removeProfile($userID,$profileID){
        $retValue = false;

        $sysUID = UserDAO::getSysUID($userID);

        $profile = self::getProfile( $userID, $profileID );

        $strsql = "DELETE FROM profiles
            WHERE profileID=".$profileID." and sysUID='".$sysUID."'";

        try{
            $_db = new DBClass();
            $result = $_db->databaseExecUpdate($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if ($result !== 0){
            $similarDocs = SimilarDocs::deleteProfile( $userID, $profile[0]['profileName'] );
            $trace = Tracking::addTrace( $userID, 'profile', 'remove', $profile[0]['profileName'] );
            $retValue = true;
        }
        
        return $result;
    }

    /**
     * Check if the profile exists
     *
     * @param integer $profileID profile ID
     * @param string $profileName profile name
     * @return boolean
     */
    public static function isProfile($profileID,$profileName){
        $retValue = false;

        $strsql = "SELECT count(profileID) FROM  profiles
            WHERE profileID = '".trim($profileID)."' OR profileName = '".$profileName."'";

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['count(profileID)'] == 1){
            $retValue = true;
        }

        return $retValue;
    }
    /**
     * Get an array of document objects from an XML string
     *
     * @param string $xmlDoc
     * @return mixed
     */
    public static function getProfileFromXML($xmlProfile){
        /* load simpleXML object */
        $xml = simplexml_load_string($xmlProfile);

        if($xml){
            /* array of profile objects */
            $arrObjProfile = array();

            foreach($xml->doc as $profileElem){
                /* instantiate a new profile object */
                $objProfile = new Profile();
                foreach($profileElem->field as $fieldOcc){
                    switch((string)$fieldOcc['name']){
                        case 'profile_text':
                            $objProfile->setProfileText((string)$fieldOcc);
                            break;
                        case 'profile_name':
                            $objProfile->setProfileName((string)$fieldOcc);
                            break;
                        case 'profile_status':
                            $objProfile->setProfileStatus((string)$fieldOcc);
                            break;
                        case 'profile_default':
                            $objProfile->setProfileDefault((int)$fieldOcc);
                            break;
                    }
                }
                /* append the link object array */
                $arrObjProfile[] = $objProfile;
                unset($objProfile);
            }
            $retValue = $arrObjProfile;
        }
        return $retValue;
    }
}
?>