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
require_once(dirname(__FILE__)."/UserDAO.php");
require_once(dirname(__FILE__)."/Verifier.php");

class SimilarDocs {
	
    function SimilarDocs(){}

    /**
     * Add profile in SimiliarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param string $string
     * @return boolean
     */
    static function addProfile($userID,$profile,$string){
        $similiar = str_replace("#PSID#",$userID,SIMDOCS_ADD_PROFILE);
        $similiar = str_replace("#PROFILE#",$profile,$similiar);
        
        $xml = utf8_encode(file_get_contents($similiar.urlencode($string)));

        if($xml){
            $xml = simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA);
            $result = (string)$xml;
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * Delete profile in SimiliarDocs service
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return boolean
     */
    static function deleteProfile($userID,$profile){
        $similiar = str_replace("#PSID#",$userID,SIMDOCS_DELETE_PROFILE);
        $similiar = str_replace("#PROFILE#",$profile,$similiar);
        
        $content = utf8_encode(file_get_contents($similiar));

        if($content){
            $xml = simplexml_load_string($content,'SimpleXMLElement',LIBXML_NOCDATA);
            $result = (string)$xml;
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * Get profiles in SimiliarDocs service
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
     * List similars documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @param array $params
     * @return array
     */
    static function getSimilarsDocs($userID,$profile,$params){
        $count = (int) DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $similiar = str_replace("#PSID#",$userID,SIMDOCS_SIMILARS_STRING);
        $similiar = str_replace("#PROFILE#",$profile,$similiar);
        
        $content = utf8_encode(file_get_contents($similiar));

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
     * @param array $params
     * @return array
     */
    static function getSuggestedDocs($userID,$params){
        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        $prefix = 'SD$';
        $suggestedDocs = array();
        $profiles = self::getProfiles($userID);

        foreach ($profiles as $profile) {
            if ($prefix === substr($profile['name'], 0, 3)) {
                $similars = self::getSimilarsDocs($userID,$profile['name']);
/*
                foreach ($similars as $key => $value)
                    $similars[$key]['reference'] = $profile['content'];
*/
                $suggestedDocs = array_unique( array_merge( $suggestedDocs, $similars ) );
            }
        }

        $result = $suggestedDocs ? array_slice($suggestedDocs, $from, $count) : false;

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
     * Get the total number of similars documents
     *
     * @param string $userID User ID
     * @param string $profile Profile name
     * @return array
     */
    static function getTotalSimilarsDocs($userID,$profile){
        $retValue = false;

        $similiar = str_replace("#PSID#",$userID,SIMDOCS_SIMILARS_STRING);
        $similiar = str_replace("#PROFILE#",$profile,$similiar);
        
        $content = utf8_encode(file_get_contents($similiar));

        if($content){
            $result = self::xmlToArray($content);
            $retValue = ( array_key_exists('document', $result) ) ? count($result['document']) : false;
        }

        return $retValue;
    }

    /**
     * Get the total pages from similars documents set if using pagination. The number of
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
     * @return false|int int > 0
     */
    public static function getTotalSuggestedDocs($userID){
        $prefix = 'SD$';
        $suggestedDocs = array();
        $profiles = self::getProfiles($userID);

        foreach ($profiles as $profile) {
            if ($prefix === substr($profile['name'], 0, 3)) {
                $similars = self::getSimilarsDocs($userID,$profile['name']);
                $suggestedDocs = array_unique( array_merge( $suggestedDocs, $similars ) );
            }
        }

        $result = $suggestedDocs ? count($suggestedDocs) : false;

        return $result;
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
