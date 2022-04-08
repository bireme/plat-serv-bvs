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
     * @param int $profileID Profile ID
     * @param string $profileName Profile name
     * @param array $similars
     * @return boolean
     */
    public static function addProfileDocs($userID,$profileID,$profileName,$similars){
        global $_conf;
        $result = null;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            foreach ($similars as $order => $similar) {
                $title = self::getSimilarDocTitle($similar);
                $docURL = self::generateSimilarDocURL($similar['id']);
                $authors = self::getSimilarDocAuthors($similar['au']);

                $strsql = "INSERT INTO suggestions(`docID`,
                                                   `profileID`,
                                                   `profile`,
                                                   `authors`,
                                                   `docURL`,
                                                   `title`,
                                                   `userID`,
                                                   `order`,
                                                   `creation_date`)
                                    VALUES ('".$similar['id']."','".
                                               $profileID."','".
                                               $profileName."','".
                                               $authors."','".
                                               $docURL."','".
                                               $title."','".
                                               $userID."','".
                                               $order."','".
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
     * @param int $profileID Profile ID
     * @param string $profileName Profile name
     * @return boolean
     */
    public static function deleteProfileDocs($userID,$profileID,$profileName){
        global $_conf;
        $result = 0;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            $strsql = "DELETE FROM suggestions
                WHERE userID = '".$userID."'
                AND profileID = '".$profileID."'
                AND profile = '".$profileName."'";

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
     * @param int $profileID Profile ID
     * @param array $params
     * @return array
     */
    public static function getSimilarsDocs($userID,$profileID,$params){
        global $_conf;
        $retValue = false;
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $sysUID = UserDAO::getSysUID($userID);

        $strsql = "SELECT profileStatus FROM profiles
            WHERE sysUID = '".$sysUID."'
            AND profileID='".$profileID."'";

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
                    WHERE userID = '".$userID."'
                    AND profileID = '".$profileID."'";

                if($count > 0){
                    $strsql .= " ORDER BY `order` LIMIT $from,$count";
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
     * @param int $profileID Profile ID
     * @param string $profileName Profile name
     * @param string $string
     * @param boolean $skip
     * @return boolean
     */
    public static function addProfile($userID,$profileID,$profileName,$string,$skip=false){
        $result = false;
        $status = 'on';

        $similar = str_replace("#PSID#",$userID,SIMDOCS_ADD_PROFILE);
        $similar = str_replace("#PROFILE#",urlencode($profileName),$similar);

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

        if(!$skip){
            if($xml){
                $similars = self::getSimilars($userID,$profileName,null);

                if ( $similars ) {
                    if ( 'none' == $similars )
                        $status = 'none';
                    else
                        $result = self::addProfileDocs($userID,$profileID,$profileName,$similars);
                } else {
                    $status = 'off';
                }
            } else {
                $status = 'off';
            }

            $sysUID = UserDAO::getSysUID($userID);

            $strsql = "UPDATE profiles set profileStatus='".$status."' WHERE profileID='".$profileID."' and sysUID='".$sysUID."'";

            try{
                $_db = new DBClass();
                $res = $_db->databaseExecUpdate($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }
        }

        if ( 'off' == $status || !$xml ) {
            // Logging class initialization
            $log = new Logging();
            // Log filename
            $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
            // Run logging
            $log->lrun($userID, $logFile, __METHOD__);
        }

        return $result;
    }

    /**
     * Delete profile in SimilarDocs service
     *
     * @param string $userID User ID
     * @param int $profileID Profile ID
     * @param string $profileName Profile name
     * @param boolean $skip
     * @return boolean
     */
    public static function deleteProfile($userID,$profileID,$profileName,$skip=false){
        $result =  false;

        $similar = str_replace("#PSID#",$userID,SIMDOCS_DELETE_PROFILE);
        $similar = str_replace("#PROFILE#",urlencode($profileName),$similar);

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

        if($xml){
            if(!$skip){
                $result = self::deleteProfileDocs($userID,$profileID,$profileName);
            }
        } else {
            // Logging class initialization
            $log = new Logging();
            // Log filename
            $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
            // Run logging
            $log->lrun($userID, $logFile, __METHOD__);
        }

        return $result;
    }

    /**
     * Get profiles in SimilarDocs service
     *
     * @param string $userID User ID
     * @return boolean|array
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

        if($content){
            $result = self::xmlToArray($content);

            if( array_key_exists('profile', $result) && count($result) > 0 ){
                if( array_key_exists( 0, $result['profile'] ) )
                    $retValue = $result['profile'];
                else
                    $retValue = array_values($result);
            }
        } else {
            // Logging class initialization
            $log = new Logging();
            // Log filename
            $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
            // Run logging
            $log->lrun($userID, $logFile, __METHOD__);
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
        } else {
            // Logging class initialization
            $log = new Logging();
            // Log filename
            $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
            // Run logging
            $log->lrun($userID, $logFile, __METHOD__);
        }

        return $retValue;
    }

    /**
     * Add suggested documents
     *
     * @param string $userID User ID
     * @param array $suggestions
     * @param string $prefix
     * @return array
     */
    public static function addSuggestedDocs($userID,$suggestions,$prefix='SD'){
        $retValue = false;

        if ($suggestions && is_array($suggestions) && count($suggestions) > 0) {
            $sep = '$';
            $prefix .= $sep;
            $date = date('Ymd');
            $profiles = self::getProfiles($userID);

            foreach ($profiles as $profile) {
                if ($prefix === substr($profile['name'], 0, 3)) {
                    $deleteProfile = self::deleteProfile($userID,0,$profile['name'],true);
                }
            }

            $deleteSuggestedDocs = self::deleteSuggestedDocs($userID,$prefix);

            foreach ($suggestions as $suggestion) {
                $prefix = $prefix . $date . $sep;
                $profile = $prefix . md5($suggestion);
                $addProfile = self::addProfile($userID,0,$profile,$suggestion);
            }

            $retValue = true;
        }

        return $retValue;
    }

    /**
     * Delete suggested documents
     *
     * @param string $userID User ID
     * @param string $prefix
     * @return array
     */
    public static function deleteSuggestedDocs($userID,$prefix='SD'){
        global $_conf;
        $result = 0;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if($is_user){
            $strsql = "DELETE FROM suggestions
                WHERE userID = '".$userID."' and profileID = 0 and profile LIKE BINARY '".$prefix."%'";

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
     * @param array $params
     * @param string $prefix
     * @param boolean $update
     * @return array
     */
    public static function getSuggestedDocs($userID,$params,$prefix='SD',$update=false){
        global $_conf;
        $retValue = false;
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if ($update) {
            $sep = '$';
            $prefix .= $sep;
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
                        $data = explode($sep, $profile['name']);
                        $sentence = $profile['content'];

                        // Update suggested documents if last modification date is older than 1 day
                        if(strtotime($data[1]) < strtotime('-1 day')){
                            $prefix = $prefix . $date . $sep;
                            $profileName = $prefix . md5($sentence);

                            $deleteProfile = self::deleteProfile($userID,0,$profile['name']);
                            $addProfile = self::addProfile($userID,0,$profileName,$sentence);
                        }
                    }
                }
            }
        }

        $strsql = "SELECT * FROM suggestions
            WHERE userID = '".$userID."' and profileID = 0 and profile LIKE BINARY '".$prefix."%' ORDER BY `order`";

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

        if ( count($result) !== 0 ){
            $retValue = $result;
        }

        return $retValue;
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
        $orcidWorks = $orcidData['group'];
        
        $works = array();

        // Update ORCID data
        if ( $orcidData && !$orcidWorks ) {
            $harvest = UserDAO::fillOrcidData($userID, $userData->getOrcid());

            if ( $harvest ) {
                $orcidData = json_decode($userData->getOrcidData(),true);
                $orcidWorks = $orcidData['group'];
            }
        }

        if ( $orcidWorks ) {
            $orcidWork = array_slice($orcidWorks, $from, $count);
            foreach ($orcidWork as $work) {
                $code = $work['work-summary'][0]['put-code'];
                $title = $work['work-summary'][0]['title']['title']['value'];

                $url = $work['url']['value'];
                if ( empty( $url ) ) {
                    $doi = '';
                    $identifiers = $work['external-ids']['external-id'];

                    foreach ( $identifiers as $identifier ) {
                        if ( 'doi' == $identifier['external-id-type'] ) {
                            $doi = 'http://dx.doi.org/'.$identifier['external-id-value'];
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
                $w['title']    = $title ? $title : '';
                $w['docURL']   = $url ? $url : '';
                $w['authors']  = $authors ? $authors : '';

                $works[$code] = $w;
            }
        }

        $result = ( !empty( $works ) ) ? $works : false;
        
        return $result;
    }

    /**
     * Get related documents
     *
     * @param string $string
     * @return boolean|array
     */
    public static function getRelatedDocs($string){
        $retValue = false;
        $similars = self::adhocSimilarDocs($string);

        if ( $similars ) {
            if ( 'none' != $similars ) {
                $retValue = array();

                foreach ($similars as $similar) {
                    $title = self::getSimilarDocTitle($similar);

                    if ( strtolower(rtrim($title, '.')) == strtolower(rtrim($string, '.')) )
                        continue;

                    $docURL  = self::generateSimilarDocURL($similar['id']);
                    $authors = self::getSimilarDocAuthors($similar['au']);

                    $record = array();
                    $record['title']   = $title;
                    $record['docURL']  = $docURL;
                    $record['authors'] = $authors;

                    $retValue[] = $record;
                }

                $retValue = self::unique_key($retValue, 'title');
                $retValue = array_slice($retValue, 0, RELATED_DOCUMENTS_LIMIT);
            }
        }

        return $retValue;
    }

    /**
     * List related documents from SimilarDocs service
     *
     * @param string $string
     * @return array
     */
    public static function adhocSimilarDocs($string){
        $retValue = false;
        $count = (int) DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];
        $request = SIMDOCS_GET_RELATED.urlencode($string);

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", array(
                                'Content-type: text/html,application/xhtml+xml,application/xml'
                            ))
            )
        );

        $context = stream_context_create($opts);
        $content = utf8_encode(@file_get_contents($request,false,$context));

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
        } else {
            // Logging class initialization
            $log = new Logging();
            // Log filename
            $logFile = '../../logs/SimilarDocs/'.date('Ymd').'+servplat.log';
            // Run logging
            $log->lrun($userID, $logFile, __METHOD__);
        }

        return $retValue;
    }

    /**
     * Get the total number of similar documents
     *
     * @param string $userID User ID
     * @param int $profileID Profile ID
     * @return boolean|int
     */
    public static function getTotalSimilarsDocs($userID,$profileID){
        global $_conf;
        $retValue = false;
      
        $strsql = "SELECT count(*) as total FROM suggestions
            WHERE userID = '".$userID."' and profileID = '".$profileID."'";

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
     * @param int $profileID Profile ID
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalSimilarsDocsPages($userID, $profileID, $itensPerPage){
        $total = self::getTotalSimilarsDocs($userID,$profileID);
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
            $orcidWorks =  $orcidData['group'];
            
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
     * Get the Google Scholar links
     *
     * @param string $userID User ID
     * @param int $putcode ORCID document ID
     * @param string $gslink Google Scholar link
     * @return boolean|array
     */
    public static function getGoogleScholarLinks($userID,$putcode,$gslink){
        global $_conf;
        $retValue = false;

        $is_user = UserDAO::isUser($userID);

        if ( $is_user ) {
            $strsql = "SELECT * FROM orcidGoogleScholar
                                WHERE put_code = '".$putcode."'";

            try{
                $_db = new DBClass();
                $result = $_db->databaseQuery($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

            if ( count($result) !== 0 ){
                $retValue = $result;
            } elseif ( $gslink ) {
                $gs_links = self::get_cited_related($gslink);

                if ( !empty($gs_links) ) {
                    $strsql = "INSERT INTO orcidGoogleScholar(`put_code`,
                                                              `cited_url`,
                                                              `related_url`)
                                        VALUES ('".$putcode."','".
                                                   $gs_links['cited_url']."','".
                                                   $gs_links['related_url']."')";

                    try{
                        $_db = new DBClass();
                        $res = $_db->databaseExecInsert($strsql);
                    }catch(DBClassException $e){
                        $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                        $logger->log($e->getMessage(),PEAR_LOG_EMERG);
                    }
                }

                if ( $res !== null ) {
                    $retValue = $gs_links;
                }
            }
        }

        return $retValue;
    }

    /**
     * Get the Google Scholar links by web scraping
     *
     * @param string $src Google Scholar link
     * @return array
     */
    public static function get_cited_related($src) {
        $links = [];
        $cited_url = '';
        $related_url = '';

        if ( $src ){
            $doc = new DOMDocument();
            @$doc->loadHTMLFile($src);

            $xpath = new DOMXpath($doc);
            $articles = $xpath->query('//div[@class="gs_fl"]');

            foreach($articles as $article) {
                $elements = $article->getElementsByTagName("a");

                foreach($elements as $item) {
                    $href = $item->getAttribute("href");
                    // $text = trim(preg_replace("/[\r\n]+/", " ", $item->nodeValue));

                    if ( strpos($href,'cites=') !== false ) {
                        $cited_url = $href;
                    } elseif ( strpos($href,'related:') !== false ) {
                        $related_url = $href;
                    }
                }

                break;
            }

            if ( !empty($cited_url) || !empty($related_url) ) {
                $links[] = [
                    'cited_url'   => $cited_url,
                    'related_url' => $related_url
                ];
            }
        }

        return $links;
    }

    /**
     * Convert XML to Array
     *
     * @param string $xmlProfile
     * @return array
     */
    public static function xmlToArray($xmlProfile){
        /* load simpleXML object */
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
        $authors = ( is_array($authors) ) ? implode("; ", array_filter($authors)) : $authors;
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

        if ( array_key_exists('ti_'.$_SESSION['lang'], $similar) ) {
            $key = 'ti_'.$_SESSION['lang'];
            $title = $similar[$key];
        } elseif ( array_key_exists('ti_en', $similar) ) {
            $title = $similar['ti_en'];
        } elseif ( array_key_exists('ti_es', $similar) ) {
            $title = $similar['ti_es'];
        } elseif ( array_key_exists('ti_pt', $similar) ) {
            $title = $similar['ti_pt'];
        } elseif ( array_key_exists('ti', $similar) ) {
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
            $similar = array_filter( $similar, function($key){
                return strpos($key, 'ti_') === 0;
            }, ARRAY_FILTER_USE_KEY );

            if ( !empty($similar) ) $title = array_shift($similar);
        }
        
        return CharTools::mysql_escape_mimic($title);
    }

    /**
     * Remove duplicate values from an array by key
     *
     * @param array $arr
     * @param string $keyname
     * @return array $array
     */
    public static function unique_key($arr, $keyname){
        $array = array();

        foreach ( $arr as $key => $value ) {
            if ( !isset($array[$value[$keyname]]) ){
                $array[$value[$keyname]] = $value;
            }
        }

        $array = array_values($array);

        return $array;
    }
}
?>
