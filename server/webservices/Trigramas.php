<?php
/**
 * Server Side webservices for trigramas service
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
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/Trigramas.php");


/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * list Trigramas Similars by String
 *
 * @param string $string
 * @return string XML
 */
function getSimilarsByString($string){
    $xml = Trigramas::getSimilarsByString($string);
    return $xml;
}

/**
 * list Trigramas Similars by String
 *
 * @param string $string
 * @return Array
 */
function getSimilarsByStringArr($string,$mode){
    $result = Trigramas::getSimilarsByStringArr($string,$mode);
    return $result;
}

/**
 * list Trigramas Similars by String
 *
 * @param string $string
 * @return Formated reference in ISO Format
 */
function getSimilarsByStringISO($string,$mode){
    $result = Trigramas::getSimilarsByStringISO($string,$mode);
    return $result;
}

/**
 * list Trigramas Similars by String
 *
 * @param string $string
 * @return string XML
 */
function getSimilarsByID($docID){
    $xml = Trigramas::getSimilarsByID($docID);
    return $xml;
}

/**
 * list Trigramas Similars by String
 * 
 * @param string $string
 * @return string XML
 */
function getCitedByID($docID){
    $xml = Trigramas::getCitedByID($docID);
    return $xml;
}
?>
