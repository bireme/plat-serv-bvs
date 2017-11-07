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
 * Add profile in SimilarDocs service
 *
 * @param string $userTK User hash
 * @param int $profileID Profile ID
 * @param string $profileName Profile name
 * @param string $string
 * @return boolean
 */
function addProfile($userTK,$profileID,$profileName,$string){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::addProfile($retParams['userTK']['userID'],$profileID,$profileName,$string);
    }
    return $result;
}

/**
 * Delete profile in SimilarDocs service
 *
 * @param string $userTK User hash
 * @param int $profileID Profile ID
 * @param string $profileName Profile name
 * @return boolean
 */
function deleteProfile($userTK,$profileID,$profileName){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::deleteProfile($retParams['userTK']['userID'],$profileID,$profileName);
    }
    return $result;
}

/**
 * List similars documents
 *
 * @param string $userTK User hash
 * @param int $profileID Profile ID
 * @param array $args
 * @return array
 */
function getSimilarsDocs($userTK,$profileID,$args){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::getSimilarsDocs($retParams['userTK']['userID'],$profileID,$args);
    }
    return $result;
}

/**
 * Add suggested documents
 *
 * @param string $userTK User hash
 * @param array $suggestions
 * @return array
 */
function addSuggestedDocs($userTK,$suggestions){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::addSuggestedDocs($retParams['userTK']['userID'],$suggestions);
    }
    return $result;
}

/**
 * List suggested documents
 *
 * @param string $userTK User hash
 * @param array $args
 * @param boolean $update
 * @return array
 */
function getSuggestedDocs($userTK,$args,$update){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::getSuggestedDocs($retParams['userTK']['userID'],$args,$update);
    }
    return $result;
}

/**
 * List ORCID works
 *
 * @param string $userTK User hash
 * @param array $args
 * @return array
 */
function getOrcidWorks($userTK,$args){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::getOrcidWorks($retParams['userTK']['userID'],$args);
    }
    return $result;
}

/**
 * Get related documents
 *
 * @param string $userTK User hash
 * @param string $string
 * @return boolean|array
 */
function getRelatedDocs($userTK,$string){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $result = SimilarDocs::getRelatedDocs($string);
    }
    return $result;
}

/**
 * Get public related documents
 *
 * @param string $string
 * @return boolean|array
 */
function getPublicRelatedDocs($string){
    $result = SimilarDocs::getRelatedDocs($string);
    return $result;
}

/**
 * Return the total number of ORCID works
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalOrcidWorks($userTK){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalOrcidWorks($retParams['userTK']['userID']);
    }
    return $result;
}

/**
 * Return the number of pages from ORCID works
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalOrcidWorksPages($userTK){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalOrcidWorksPages($retParams['userTK']['userID'],DOCUMENTS_PER_PAGE);
    }
    return $result;
}

/**
 * Return the total number of similars documents
 *
 * @param string $userTK user hash
 * @param int $profileID Profile ID
 * @return int
 */
function getTotalSimilarsDocs($userTK,$profileID){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalSimilarsDocs($retParams['userTK']['userID'],$profileID);
    }
    return $result;
}

/**
 * Return the number of pages from similars documents.
 *
 * @param string $userTK user hash
 * @param int $profileID Profile ID
 * @return int
 */
function getTotalSimilarsDocsPages($userTK,$profileID){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalSimilarsDocsPages($retParams['userTK']['userID'],$profileID,DOCUMENTS_PER_PAGE);
    }
    return $result;
}

/**
 * Return the total number of suggested documents
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalSuggestedDocs($userTK){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalSuggestedDocs($retParams['userTK']['userID']);
    }
    return $result;
}

/**
 * Return the number of pages from suggested documents.
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalSuggestedDocsPages($userTK){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalSuggestedDocsPages($retParams['userTK']['userID'],DOCUMENTS_PER_PAGE);
    }
    return $result;
}
?>
