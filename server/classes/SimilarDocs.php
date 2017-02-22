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
    static function addProfileDocs($userID,$profile,$similars){
        global $_conf;
        $result = null;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            foreach ($similars as $similar) {
                $strsql = "INSERT INTO suggestions(docID,
                                            profile,
                                            authors,
                                            docURL,
                                            title,
                                            userID,
                                            creation_date)
                                    VALUES ('".$similar['id']."','".
                                               $profile."','".
                                               implode("; ", $similar["au"])."','".
                                               $similar['ur']."','".
                                               implode(" / ", $similar["ti"])."','".
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
    static function deleteProfileDocs($userID,$profile){
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
    static function getSimilarsDocs($userID,$profile,$params){
        global $_conf;
        $retValue = false;
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

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
            $retValue = $result;
        }

        return $result;
    }

    /**
     * Add profile in SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param string $string
     * @return boolean
     */
    static function addProfile($userID,$profile,$string){
        $result = false;

        $similar = str_replace("#PSID#",$userID,SIMDOCS_ADD_PROFILE);
        $similar = str_replace("#PROFILE#",$profile,$similar);
        
        $xml = utf8_encode(file_get_contents($similar.urlencode($string)));
        $xml = simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA);
        $xml = (string)$xml;
        
        if($xml){
            $similars = self::getSimilars($userID,$profile);
            $result = self::addProfileDocs($userID,$profile,$similars);
        }

        return $result;
    }

    /**
     * Delete profile in SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return boolean
     */
    static function deleteProfile($userID,$profile){
        $similar = str_replace("#PSID#",$userID,SIMDOCS_DELETE_PROFILE);
        $similar = str_replace("#PROFILE#",$profile,$similar);
        
        $xml = utf8_encode(file_get_contents($similar));
        $xml = simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA);
        $xml = (string)$xml;

        if($xml){
            $result = self::deleteProfileDocs($userID,$profile);
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * Get profiles in SimilarDocs service
     *
     * @param string $userID User ID
     * @return boolean
     */
    static function getProfiles($userID){
        $profiles = str_replace("#PSID#",$userID,SIMDOCS_GET_PROFILES);        
        $content = utf8_encode(file_get_contents($profiles));

        if($content){
            $result = self::xmlToArray($content);
            $result = ( array_key_exists('profile', $result) ) ? $result['profile'] : false;
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * List similar documents from SimilarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $params
     * @return array
     */
    static function getSimilars($userID,$profile,$params){
        $count = (int) DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $similar = str_replace("#PSID#",$userID,SIMDOCS_SIMILARS_STRING);
        $similar = str_replace("#PROFILE#",$profile,$similar);
        
        $content = utf8_encode(file_get_contents($similar));

        if($content){
            $result = self::xmlToArray($content);
            $result = ( array_key_exists('document', $result) ) ? array_slice($result['document'], $from, $count) : false;
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * Add suggested documents profiles
     *
     * @param string $userID User ID
     * @param array $suggestions
     * @return array
     */
    static function addSuggestedDocsProfiles($userID,$suggestions){
        $retValue = false;

        if ($suggestions && is_array($suggestions)) {
            $prefix = 'SD$';
            $date = date('Ymd');
            $profiles = self::getProfiles($userID);

            foreach ($profiles as $profile) {
                if ($prefix === substr($profile['name'], 0, 3)) {
                    $deleteProfile = self::deleteProfile($userID,$profile['name']);
                }
            }

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
     * List suggested documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $params
     * @return array
     */
    static function getSuggestedDocs($userID,$params,$update=false){
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

                        // Update suggested documents if last modification date is older than 30 days 
                        if(strtotime($data[1]) < strtotime('-30 days')){
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
    static function getOrcidWorks($userID,$params){
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
    static function xmlToArray($xmlProfile){
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
}
?>
