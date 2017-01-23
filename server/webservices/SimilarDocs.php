<?php
/**
 * Server Side webservices for SimilarDocs service
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/SimilarDocs.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Add profile in SimiliarDocs service
 *
 * @param string $userID User ID
 * @param string $profile Profile name
 * @param string $string
 * @return boolean
 */
function addProfile($userID,$profile,$string){
    $result = SimilarDocs::addProfile($userID,$profile,$string);
    return $result;
}

/**
 * Delete profile in SimiliarDocs service
 *
 * @param string $userID User ID
 * @param string $profile Profile name
 * @return boolean
 */
function deleteProfile($userID,$profile){
    $result = SimilarDocs::deleteProfile($userID,$profile);
    return $result;
}

/**
 * List similars documents
 *
 * @param string $userTK User hash
 * @param string $profile Profile name
 * @return array
 */
function getSimilarsDocs($userTK,$profile){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::getSimilarsDocs($retParams['userTK']['userID'],$profile);
    }
    return $result;
}
?>
