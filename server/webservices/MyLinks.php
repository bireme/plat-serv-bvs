<?php
/**
 * Server Side webservices for user links collection
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
require_once(dirname(__FILE__)."/../classes/LinksDAO.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Add a Link to the user account
 *
 * @param string $userTK user hash
 * @param string $linkXML XML based on xmlNews.xsd
 * @return boolean
 */
function addLink($userTK,$linkXML){
    $retObjLink = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkXML' => $linkXML);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        /* get an array of links objects */
        $arrObjLink = LinksDAO::getLinkFromXML($retParams['linkXML']);

        foreach($arrObjLink as $objLink){
            /* add each document */
            $retObjLink = LinksDAO::addLink($retParams['userTK']['userID'],$objLink);
        }

    }
    return $retObjLink;
}

/**
 * Remove a link from user account
 *
 * @param string $userTK user hash
 * @param int $linkID
 * @return boolean
 */
function removeLink($userTK,$linkID){
    $retObjLink = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkID' => $linkID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $retObjLink = LinksDAO::removeLink($retParams['userTK']['userID'],$retParams['linkID']);
    }
    return $retObjLink;
}

/**
 * Return a link metadata
 *
 * @param string $userTK user hash
 * @param int $linkID
 * @return false|array Array with links metadata
 */
function getLink($userTK,$linkID){
    $linkItem = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkID' => $linkID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $linkItem = LinksDAO::getLink($retParams['userTK']['userID'],$retParams['linkID']);
    }

    foreach($linkItem as $key => $value){
        foreach($value as $keySec => $valueSec){
            $linkItem[$key][$keySec] = htmlspecialchars($valueSec);
        }
    }

    return $linkItem;
}

/**
 * Return a link list from a specific user.
 *
 * @param string $userTK user hash
 * @param args $params array([date,rate])
 * @param int $from start register
 * @param int $count total of registers
 * @return false|array Array with news list metadata
 */
function getLinkList($userTK, $args){
    $linkList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $linkList = LinksDAO::getLinkList($retParams['userTK']['userID'],$args);
    }

    foreach($linkList as $key => $value){
        foreach($value as $keySec => $valueSec){
            $linkList[$key][$keySec] = htmlspecialchars($valueSec);
        }
    }

    return $linkList;
}

/**
 * Return a link list with the parameter InHome=1
 *
 * @param string $userTK user hash
 * @return false|array Array with news list metadata
 */
function getInHomeLinks($userTK,$linkID){}

/**
 * Return the total user links
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalItens($userTK){
    $linkList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $linkList = LinksDAO::getTotalItens($retParams['userTK']['userID']);
    }
	return $linkList;
}

 /**
  * Update the new and the new metadata
  *
  * @param string $userTK user hash
  * @param int $linkID Link to be updated
  * @param string $linkXML XML with links metadata based on xmlLinks.xsd
  * @return boolean
  */
function updateLink($userTK,$linkID,$linkXML){
    $retObjLink = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkID' => $linkID,
                    'linkXML' => $linkXML);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        
        /* get an array of links objects */
        $arrObjLink = LinksDAO::getLinkFromXML($retParams['linkXML']);
        foreach($arrObjLink as $objLink){
            /* add each document */
            $retObjLink = LinksDAO::updateLink($retParams['userTK']['userID'],$retParams['linkID'],$objLink);
        }
    }
    return $retObjLink;
}

/**
 * Changes the value of rate attribute
 *
 * @param string $userTK user hash
 * @param int $linkID
 * @param int $linkRate [0|1|2|3]
 * @return booleand
 */
function updateLinkRate($userTK,$linkID,$linkRate){
    $linkList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkID' => $linkID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $linkList = LinksDAO::updateLinkRate($retParams['userTK']['userID'],$retParams['linkID'],$linkRate);
    }
	return $linkList;
}

/**
 * Changes the value of the attribute home to 0
 *
 * @param string $userTK user hash
 * @param int $linksID
 * @return boolean
 */
 function deleteFromHome($userTK,$linkID){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkID' => $linkID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = LinksDAO::deleteFromHome($retParams['userTK']['userID'],$retParams['linkID']);
    }
	return $result;
 }

/**
 * Changes the value of the attibute home to 1
 *
 * @param string $userTK user hash
 * @param int $linkID
 * @return boolean
 */
function addInHome($userTK,$linkID){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'linkID' => $linkID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = LinksDAO::addInHome($retParams['userTK']['userID'],$retParams['linkID']);
    }
	return $result;
}

/**
 * Return the number of pages from a record set.
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalPages($userTK){
    $result = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = LinksDAO::getTotalPages($retParams['userTK']['userID'],DOCUMENTS_PER_PAGE);
    }
	return $result;
}
?>
