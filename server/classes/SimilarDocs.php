<?php
/**
 * SimilarDocs interface
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__).'/../include/DAO.inc.php');
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/Verifier.php");

class SimilarDocs {
	
    function SimilarDocs(){}

    /**
     * Add documents from SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $similars
     * @return boolean
     */
    public static function addProfileDocs($userID,$profile,$similars){
        global $_conf;
        $result = null;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            foreach ($similars as $similar) {
                $title = self::getSimilarDocTitle($similar);
                $docURL = self::generateSimilarDocURL($similar['id']);
                $authors = self::getSimilarDocAuthors($similar['au']);

                $strsql = "INSERT INTO suggestions(docID,
                                            profile,
                                            authors,
                                            docURL,
                                            title,
                                            userID,
                                            creation_date)
                                    VALUES ('".$similar['id']."','".
                                               $profile."','".
                                               $authors."','".
                                               $docURL."','".
                                               $title."','".
                                               $userID."','".
                                               date("Ymd")."')";

                try{
                    $_db = new DBClass();
                    $result = $_db->databaseExecInsert($strsql);
                }catch(DBClassException $e){
                    $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                    $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                }
            }

            $retValue = ($result !== null) ? true : false;
        }

        return $retValue;
    }

    /**
     * Delete documents from SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return boolean
     */
    public static function deleteProfileDocs($userID,$profile){
        global $_conf;
        $result = 0;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            $strsql = "DELETE FROM suggestions
                WHERE userID = '".$userID."' and profile = '".$profile."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $retValue = ($result !== 0) ? true : false;
        }

        return $retValue;
    }

    /**
     * List similar documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $params
     * @return array
     */
    public static function getSimilarsDocs($userID,$profile,$params){
        global $_conf;
        $retValue = false;
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $sysUID = UserDAO::getSysUID($userID);

        $strsql = "SELECT profileStatus FROM profiles
            WHERE sysUID = '".$sysUID."' and
            profileName='".$profile."'";

        try{
            $_db = new DBClass();
            $result = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }



        if ( $result ) {
            unset($retValue);
            $retValue =  array();
            $retValue['status'] = $result[0]['profileStatus'];

            if ( 'on' == $result[0]['profileStatus'] ) {
                $strsql = "SELECT * FROM  suggestions
                    WHERE userID = '".$userID."' and profile = '".$profile."'";

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
                    $retValue['similars'] = $result;
                }
            }
        }

        return $retValue;
    }

    /**
     * Add profile in SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param string $string
     * @param boolean $skip
     * @return boolean
     */
    public static function addProfile($userID,$profile,$string,$skip=false){
        $result = false;
        $status = 'on';

        $similar = str_replace("#PSID#",$userID,SIMDOCS_ADD_PROFILE);
        $similar = str_replace("#PROFILE#",urlencode($profile),$similar);

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", array(
                                'Content-type: text/html,application/xhtml+xml,application/xml'
                            ))
            )
        );

        $context = stream_context_create($opts);
        
        $xml = utf8_encode(@file_get_contents($similar.urlencode($string),false,$context));
        $xml = simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA);
        $xml = (string)$xml;

        // Logging class initialization
        $log = new Logging();
        // Log filename
        $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
        // Run logging
        $log->lrun($userID, $logFile, __METHOD__);

        if(!$skip){
            if($xml){
                $similars = self::getSimilars($userID,$profile);

                if ( $similars ) {
                    if ( 'none' == $similars )
                        $status = 'none';
                    else
                        $result = self::addProfileDocs($userID,$profile,$similars);
                } else {
                    $status = 'off';
                }
            } else {
                $status = 'off';
            }

            $sysUID = UserDAO::getSysUID($userID);

            $strsql = "UPDATE profiles set profileStatus='".$status."' WHERE profileName='".$profile."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $res = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        }

        return $result;
    }

    /**
     * Delete profile in SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param boolean $skip
     * @return boolean
     */
    public static function deleteProfile($userID,$profile,$skip=false){
        $result =  false;

        $similar = str_replace("#PSID#",$userID,SIMDOCS_DELETE_PROFILE);
        $similar = str_replace("#PROFILE#",urlencode($profile),$similar);

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", array(
                                'Content-type: text/html,application/xhtml+xml,application/xml'
                            ))
            )
        );

        $context = stream_context_create($opts);
        
        $xml = utf8_encode(@file_get_contents($similar,false,$context));
        $xml = simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA);
        $xml = (string)$xml;

        // Logging class initialization
        $log = new Logging();
        // Log filename
        $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
        // Run logging
        $log->lrun($userID, $logFile, __METHOD__);

        if(!$skip){
            if($xml){
                $result = self::deleteProfileDocs($userID,$profile);
            }
        }

        return $result;
    }

    /**
     * Get profiles in SimilarDocs service
     *
     * @param string $userID User ID
     * @return boolean
     */
    public static function getProfiles($userID){
        $retValue = false;
        $profiles = str_replace("#PSID#",$userID,SIMDOCS_GET_PROFILES);

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", array(
                                'Content-type: text/html,application/xhtml+xml,application/xml'
                            ))
            )
        );

        $context = stream_context_create($opts);        
        $content = utf8_encode(@file_get_contents($profiles,false,$context));

        // Logging class initialization
        $log = new Logging();
        // Log filename
        $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
        // Run logging
        $log->lrun($userID, $logFile, __METHOD__);

        if($content){
            $result = self::xmlToArray($content);

            if( array_key_exists('profile', $result) && count($result) > 0 ){
                if( array_key_exists( 0, $result['profile'] ) )
                    $retValue = $result['profile'];
                else
                    $retValue = array_values($result);
            }
        }

        return $retValue;
    }

    /**
     * List similar documents from SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $params
     * @return array
     */
    public static function getSimilars($userID,$profile,$params){
        $retValue = false;
        $count = (int) DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $similar = str_replace("#PSID#",$userID,SIMDOCS_SIMILARS_STRING);
        $similar = str_replace("#PROFILE#",urlencode($profile),$similar);

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", array(
                                'Content-type: text/html,application/xhtml+xml,application/xml'
                            ))
            )
        );

        $context = stream_context_create($opts);
        $content = utf8_encode(@file_get_contents($similar,false,$context));

        // Logging class initialization
        $log = new Logging();
        // Log filename
        $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
        // Run logging
        $log->lrun($userID, $logFile, __METHOD__);

        if($content){
            $result = self::xmlToArray($content);

            if( array_key_exists('document', $result) && count($result) > 0 ){
                if( array_key_exists( 0, $result['document'] ) )
                    $retValue = array_slice($result['document'], $from, $count);
                else
                    $retValue = array_values($result);
            } else {
                $retValue = 'none';
            }
        }

        return $retValue;
    }

    /**
     * Add suggested documents profiles
     *
     * @param string $userID User ID
     * @param array $suggestions
     * @return array
     */
    public static function addSuggestedDocsProfiles($userID,$suggestions){
        $retValue = false;

        if ($suggestions && is_array($suggestions) && count($suggestions) > 0) {
            $prefix = 'SD$';
            $date = date('Ymd');
            $profiles = self::getProfiles($userID);

            foreach ($profiles as $profile) {
                if ($prefix === substr($profile['name'], 0, 3)) {
                    $deleteProfile = self::deleteProfile($userID,$profile['name'],true);
                }
            }

            $deleteSuggestedDocs = self::deleteSuggestedDocs($userID);

            foreach ($suggestions as $suggestion) {
                $prefix = $prefix . $date . '$';
                $profile = $prefix . md5($suggestion);
                $addProfile = self::addProfile($userID,$profile,$suggestion);
            }

            $retValue = true;
        }

        return $retValue;
    }

    /**
     * Delete suggested documents
     *
     * @param string $userID User ID
     * @return array
     */
    public static function deleteSuggestedDocs($userID){
        global $_conf;
        $result = 0;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            $strsql = "DELETE FROM  suggestions
                WHERE userID = '".$userID."' and profile LIKE BINARY 'SD$%'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            $retValue = ($result !== 0) ? true : false;
        }

        return $retValue;
    }

    /**
     * List suggested documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $params
     * @return array
     */
    public static function getSuggestedDocs($userID,$params,$update=false){
        global $_conf;
        $retValue = false;
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if ($update) {
            $prefix = 'SD$';
            $date = date('Ymd');
            $profiles = self::getProfiles($userID);
/*
            $profiles = array_map(function($arr) {
                return $arr[key];
            }, $profiles);
*/
            if ($profiles) {
                foreach ($profiles as $profile) {
                    if ($prefix === substr($profile['name'], 0, 3)) {
                        $data = explode('$', $profile['name']);
                        $sentence = $profile['content'];

                        // Update suggested documents if last modification date is older than 7 days 
                        if(strtotime($data[1]) < strtotime('-1 week')){
                            $prefix = $prefix . $date . '$';
                            $profileName = $prefix . md5($sentence);

                            $deleteProfile = self::deleteProfile($userID,$profile['name']);
                            $addProfile = self::addProfile($userID,$profileName,$sentence);
                        }
                    }
                }
            }
        }

        $strsql = "SELECT * FROM  suggestions
            WHERE userID = '".$userID."' and profile LIKE BINARY 'SD$%'";

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

        return $result;
    }

    /**
     * List ORCID works
     *
     * @param string $userID User ID
     * @param array $params
     * @return array
     */
    public static function getOrcidWorks($userID,$params){
        $count = (int) DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $userData = UserDAO::getUser($userID);
        $orcidData = json_decode($userData->getOrcidData(),true);
        $orcidWorks =  $orcidData['orcid-profile']['orcid-activities']['orcid-works']['orcid-work'];

        $works = array();

        if ( $orcidWorks ) {
            $orcidWork = array_slice($orcidWorks, $from, $count);
            foreach ($orcidWork as $work) {
                $title = $work['work-title']['title']['value'];

                $url = $work['url']['value'];
                if ( empty( $url ) ) {
                    $doi = '';
                    $identifiers = $work['work-external-identifiers']['work-external-identifier'];

                    foreach ( $identifiers as $identifier ) {
                        if ( 'DOI' == $identifier['work-external-identifier-type'] ) {
                            $doi = 'http://dx.doi.org/'.$identifier['work-external-identifier-id']['value'];
                            break;
                        }
                    }

                    $url = $doi;
                }

                $authors = array();
                $contributors = $work['work-contributors']['contributor'];
                foreach ( $contributors as $contributor ) {
                    $authors[] = $contributor['credit-name']['value'];
                }

                $w = array();
                $w['title'] = $title ? $title : '';
                $w['docURL'] = $url ? $url : '';
                $w['authors'] = $authors ? $authors : '';

                $works[] = $w;
            }
        }

        $result = !empty( $works ) ? $works : false;
        
        return $result;
    }

    /**
     * Get related documents
     *
     * @param string $userID User ID
     * @param string $string
     * @return boolean|array
     */
    public static function getRelatedDocs($userID,$string){
        $retValue = false;
        $profile = md5('SIMILARS');
      
        $addProfile = self::addProfile($userID,$profile,$string,true);
        $similars = self::getSimilars($userID,$profile);

        if ( $similars ) {
            if ( 'none' != $similars ) {
                $retValue = array();

                foreach ($similars as $similar) {                    
                    $title   = self::getSimilarDocTitle($similar);

                    if ( strtolower(rtrim($title, '.')) == strtolower(rtrim($string, '.')) )
                        continue;

                    $docURL  = self::generateSimilarDocURL($similar['id']);
                    $authors = self::getSimilarDocAuthors($similar['au']);

                    $record = array();
                    $record['title']   = $title;
                    $record['docURL']  = $docURL;
                    $record['authors'] = $authors;

                    $retValue[] = $record;

                    if ( count($retValue) == RELATED_DOCUMENTS_LIMIT ) break;
                }                
            }
        }

        return $retValue;
    }

    /**
     * Get the total number of similar documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return boolean|int
     */
    public static function getTotalSimilarsDocs($userID,$profile){
        global $_conf;
        $retValue = false;
      
        $strsql = "SELECT count(*) as total FROM suggestions
            WHERE userID = '".$userID."' and profile = '".$profile."'";

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
     * Get the total pages from similar documents set if using pagination. The number of
     * registers per page is configured in the config.php file
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalSimilarsDocsPages($userID, $profile, $itensPerPage){
        $total = self::getTotalSimilarsDocs($userID,$profile);
        return ceil($total/$itensPerPage);
    }
    
    /**
     * Get the total number of ORCID works
     *
     * @param string $userID User ID
     * @return false|int int > 0
     */
    public static function getTotalOrcidWorks($userID){
        $retValue = false;

        if($userID){
            $userData = UserDAO::getUser($userID);
            $orcidData = json_decode($userData->getOrcidData(),true);
            $orcidWorks =  $orcidData['orcid-profile']['orcid-activities']['orcid-works']['orcid-work'];
            
            $retValue = count($orcidWorks);
        }

        return $retValue;
    }

    /**
     * Get the total pages from ORCID works set if using pagination. The number of
     * registers per page is configured in the config.php file
     *
     * @param string $userID User ID
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalOrcidWorksPages($userID, $itensPerPage){
        $total = self::getTotalOrcidWorks($userID);
        return ceil($total/$itensPerPage);
    }

    /**
     * Get the total number of suggested documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return boolean|int
     */
    public static function getTotalSuggestedDocs($userID){
        global $_conf;
        $retValue = false;
      
        $strsql = "SELECT count(*) as total FROM suggestions
            WHERE userID = '".$userID."' and profile LIKE BINARY 'SD$%'";

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
     * Get the total pages from suggested documents set if using pagination. The number of
     * registers per page is configured in the config.php file
     *
     * @param string $userID User ID
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalSuggestedDocsPages($userID, $itensPerPage){
        $total = self::getTotalSuggestedDocs($userID);
        return ceil($total/$itensPerPage);
    }

    /**
     * Convert XML to Array
     *
     * @param string $xmlProfile
     * @return array
     */
    public static function xmlToArray($xmlProfile){
        /* load simpleXML object */
        $xmlProfile = str_replace("&lt;","<",$xmlProfile);
        $xmlProfile = str_replace("&gt;",">",$xmlProfile);
        $xmlProfile = str_replace("&quot;","\"",$xmlProfile);
        $xmlProfile = utf8_decode($xmlProfile);

        $xml = simplexml_load_string($xmlProfile,'SimpleXMLElement',LIBXML_NOCDATA);
        $json = json_encode($xml);
        $result = json_decode($json,true);

        return $result;
    }

    /**
     * Generate the similar document URL
     *
     * @param string $docID
     * @return string $docURL Similar document URL
     */
    public static function generateSimilarDocURL($docID){
        $docURL = VHL_SEARCH_PORTAL_DOMAIN."/portal/resource/".DEFAULT_LANG."/".$docID;
        return $docURL;
    }

    /**
     * Get the similar document authors
     *
     * @param string|array $authors
     * @return string $authors Similar document authors
     */
    public static function getSimilarDocAuthors($authors){
        $authors = ( is_array($authors) ) ? implode("; ", $authors) : $authors;
        return CharTools::mysql_escape_mimic($authors);
    }

    /**
     * Get the similar document title
     *
     * @param array $similar
     * @return string $title Similar document title
     */
    public static function getSimilarDocTitle($similar){
        $key = '';
        $title = '';

        if ( array_key_exists('ti', $similar) ) {
            if ( is_array($similar['ti']) )
                $title = $similar['ti'][0];
            else
                $title = $similar['ti'];
        } elseif ( array_key_exists('la', $similar) ) {
            if ( is_array($similar['la']) )
                $key = 'ti_'.$similar['la'][0];
            else
                $key = 'ti_'.$similar['la'];

            if ( array_key_exists($key, $similar) ) $title = $similar[$key];
        }

        if ( empty($title) ) {
            if ( array_key_exists('ti_'.DEFAULT_LANG, $similar) ) {
                $key = 'ti_'.DEFAULT_LANG;
                $title = $similar[$key];
            } else {
                $similar = array_filter( $similar, function($key){
                    return strpos($key, 'ti_') === 0;
                }, ARRAY_FILTER_USE_KEY );

                if ( !empty($similar) ) $title = array_shift($similar);
            }
        }
        
        return CharTools::mysql_escape_mimic($title);
    }
}
?>