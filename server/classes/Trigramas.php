<?php
/**
 * Trigramas interface
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

require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/referenceFormat.php");
require_once(dirname(__FILE__)."/Verifier.php");

class Trigramas {
	
    function Trigramas(){}
    
    /**
     * List Trigramas Similars by $docID
     *
     * @param string $string
     * @return string XML
     */
    static function getSimilarsByID($docID){
        $xml=utf8_encode(file_get_contents(TRIGRAMAS_SIMILARS_ID.$docID));
        return $xml;
    }

    /**
     * List Trigramas Similars by String
     *
     * @param string $string
     * @return string XML
     */
    static function getSimilarsByString($string){
        $xml=utf8_encode(file_get_contents(TRIGRAMAS_SIMILARS_STRING.$string));
        return $xml;
    }

    /**
     * List Trigramas Cited by $docID
     *
     * @param string $string
     * @return string XML
     */
    static function getCitedByID($docID){
        $xml=utf8_encode(file_get_contents(TRIGRAMAS_CITED_ID.$docID));
        return $xml;
    }

    /**
     * List Trigramas Similars by String
     *
     * @param string $string
     * @param string $mode Information source LILACS.org|SciELO.org
     * @return Array
     */
    static function getSimilarsByStringArr($string,$mode){
        $mode = empty($mode)? DEFAULT_TRIGRAMAS_MODE : $mode;
        $similarStr = str_replace("#COLLECTION_MODE#",$mode,
            TRIGRAMAS_SIMILARS_STRING);
        $arrParams['trigramasXMLTMP'] = utf8_encode(
            file_get_contents($similarStr.$string));

        $validate = new Verifier($arrParams);

        if($retVerifier = $objVerifier->canPass()){
            $refArr = self::xmlToArray($arrParams['trigramasXML']);
            $result = ReferenceFormat::ISOFormat($refArr);
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * List Trigramas Similars by String
     *
     * @param string $string
     * @param string $mode Information source LILACS.org|SciELO.org
     * @return Formated reference in ISO Format
     */
    static function getSimilarsByStringISO($string,$mode){
        $mode = empty($mode)? DEFAULT_TRIGRAMAS_MODE : $mode;
        $similarStr = str_replace("#COLLECTION_MODE#",$mode,
            TRIGRAMAS_SIMILARS_STRING);
        
        $arrParams['trigramasXML'] = utf8_encode(
            file_get_contents($similarStr.urlencode($string)));

        $objVerifier = new Verifier($arrParams);

        $retVerifier = $objVerifier->canPass();

        if($retVerifier){
            $refArr = self::xmlToArray($arrParams['trigramasXML']);
            $result = ReferenceFormat::ISOFormat($refArr);
        }else{
            $result = false;
        }
        return $result;
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

        $xml = simplexml_load_string($xmlProfile,'SimpleXMLElement',
            LIBXML_NOCDATA);

        if($xml){
            /* array of profile objects */
            $arrProfile = array();

            foreach($xml->request->trigrams->similarlist->similar as $similarElem){
               $similar = (array) $similarElem;
               $docElem = $similarElem->add->doc;
               foreach($docElem->field as $fieldOcc){
                   if ((string)$fieldOcc['name'] == "id"){
                    $ID = (string)$fieldOcc;
                    break;
                   }
               }
               $arrProfile[$ID]["similarity"][] = $similar["@attributes"]["s"];

               foreach($docElem->field as $fieldOcc){
                   $fname=(string)$fieldOcc['name'];
                   $arrProfile[$ID][$fname][] = (string) $fieldOcc;
               }
            }
            $result = $arrProfile;
        }
        return $result;
    }
}
?>
