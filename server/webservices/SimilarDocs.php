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
 * @param string $profile Profile name
 * @param string $string
 * @return boolean
 */
function addProfile($userTK,$profile,$string){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::addProfile($retParams['userTK']['userID'],$profile,$string);
    }
    return $result;
}

/**
 * Delete profile in SimilarDocs service
 *
 * @param string $userTK User hash
 * @param string $profile Profile name
 * @return boolean
 */
function deleteProfile($userTK,$profile){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::deleteProfile($retParams['userTK']['userID'],$profile);
    }
    return $result;
}

/**
 * List similars documents
 *
 * @param string $userTK User hash
 * @param string $profile Profile name
 * @param array $args
 * @return array
 */
function getSimilarsDocs($userTK,$profile,$args){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::getSimilarsDocs($retParams['userTK']['userID'],$profile,$args);
    }
    return $result;
}

/**
 * Add suggested documents profiles
 *
 * @param string $userTK User hash
 * @param array $suggestions
 * @return array
 */
function addSuggestedDocsProfiles($userTK,$suggestions){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::addSuggestedDocsProfiles($retParams['userTK']['userID'],$suggestions);
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
        $retParams = $objVerifier->getParams();
        $result = SimilarDocs::getRelatedDocs($retParams['userTK']['userID'],$string);
    }
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
 * @return int
 */
function getTotalSimilarsDocs($userTK,$profile){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalSimilarsDocs($retParams['userTK']['userID'],$profile);
    }
    return $result;
}

/**
 * Return the number of pages from similars documents.
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalSimilarsDocsPages($userTK,$profile){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SimilarDocs::getTotalSimilarsDocsPages($retParams['userTK']['userID'],$profile,DOCUMENTS_PER_PAGE);
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
