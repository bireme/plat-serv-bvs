<?php
/**
 * Server Side webservices for user search results
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
require_once(dirname(__FILE__)."/../classes/SearchDAO.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Add a search result to the user account
 *
 * @param string $userTK user hash
 * @param string $xml
 * @return boolean
 */
function addRSS($userTK,$xml){
    $retObjSearch = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'searchXML' => $xml);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        /* get an array of search result objects */
        $arrObjSearch = SearchDAO::getRSSFromXML($retParams['searchXML']);

        foreach($arrObjSearch as $objSearch){
            $retObjSearch = SearchDAO::addRSS($retParams['userTK']['userID'], $objSearch);
        }
    }

    return $retObjSearch;
}

/**
 * Remove a search result from user account
 *
 * @param string $userTK user hash
 * @param int $rssID
 * @return boolean
 */
function removeRSS($userTK,$rssID){
    $retObjSearch = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'rssID' => $rssID);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retObjSearch = SearchDAO::removeRSS($retParams['userTK']['userID'], $retParams['rssID']);
    }

    return $retObjSearch;
}

/**
 * Return a search result metadata
 *
 * @param string $userTK user hash
 * @param int $rssID
 * @return array object Profile
 */
function getRSS($userTK,$rssID){
    $searchResult = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'rssID' => $rssID);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $searchResult = SearchDAO::getRSS($retParams['userTK']['userID'], $retParams['rssID']);
    }

    return $searchResult;
}

/**
 * Return a search results list from a specific user.
 * @param string $userTK user hash
 * @param array $args
 * @return false|array record set with user profiles
 */
function getRSSList($userTK,$args){
    $searchResultsList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $searchResultsList = SearchDAO::getRSSList($retParams['userTK']['userID'], $args);
    }

    return $searchResultsList;
}

/**
 * Update the search result metadata
 *
 * @param string $userTK user hash
 * @param int $rssID
 * @param string $xml
 * @return boolean
 */
function updateRSS($userTK,$rssID,$xml){
    $retObjSearch = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'rssID' => $rssID,
                    'searchXML' => $xml);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $arrObjSearch = SearchDAO::getRSSFromXML($retParams['searchXML']);

        foreach($arrObjSearch as $objSearch){
            $retObjSearch = SearchDAO::updateRSS($retParams['userTK']['userID'], $retParams['rssID'], $objSearch);
        }
    }

    return $retObjSearch;
}

/**
 * Parse RSS to Array
 * @param string $userTK user hash
 * @param int $rssID
 * @return false|array
 */
function parseRSS($userTK,$rssID){
    $searchItems = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'rssID' => $rssID);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $searchItems = SearchDAO::parseRSS($retParams['userTK']['userID'], $retParams['rssID']);
    }

    return $searchItems;
}

/**
 * Returns the number of pages from a range of search results
 *
 * @param string $userTK user hash
 * @return <type>
 */
function getTotalPages($userTK){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = SearchDAO::getTotalPages($retParams['userTK']['userID'],RSS_DOCUMENTS_PER_PAGE);
    }

    return $result;
}
?>
