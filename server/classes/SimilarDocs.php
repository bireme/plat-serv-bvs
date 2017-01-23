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
        $similarStr = str_replace("#PSID#",$userID,SIMDOCS_ADD_PROFILE);
        $similarStr = str_replace("#PROFILE#",$profile,SIMDOCS_ADD_PROFILE);
        
        $xml = utf8_encode(file_get_contents($similarStr.urlencode($string)));

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
        $similarStr = str_replace("#PSID#",$userID,SIMDOCS_DELETE_PROFILE);
        $similarStr = str_replace("#PROFILE#",$profile,SIMDOCS_DELETE_PROFILE);
        
        $content = utf8_encode(file_get_contents($similarStr));

        if($content){
            $xml = simplexml_load_string($content,'SimpleXMLElement',LIBXML_NOCDATA);
            $result = (string)$xml;
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
     * @return array
     */
    static function getSimilarsDocs($userID,$profile){
        $similarStr = str_replace("#PSID#",$userID,SIMDOCS_SIMILARS_STRING);
        $similarStr = str_replace("#PROFILE#",$profile,SIMDOCS_SIMILARS_STRING);
        
        $content = utf8_encode(file_get_contents($similarStr));

        if($content){
            $result = self::xmlToArray($content);
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

        $xml = simplexml_load_string($xmlProfile,'SimpleXMLElement',LIBXML_NOCDATA);

        if($xml){
            /* array of profile objects */
            $arrProfile = array();

            foreach($xml->document as $document){
                foreach($document as $fieldOcc){
                    if ($fieldOcc->getName() == "id"){
                        $ID = (string)$fieldOcc;
                        break;
                    }
                }

                foreach($document as $fieldOcc){
                    $fname = $fieldOcc->getName();
                    $arrProfile[$ID][$fname][] = (string)$fieldOcc;
                }
            }

            $result = $arrProfile;
        }
        return $result;
    }
}
?>
