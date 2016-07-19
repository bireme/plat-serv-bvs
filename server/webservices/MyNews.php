<?php
/**
 * Server Side webservices for user news collection
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
require_once(dirname(__FILE__)."/../classes/NewsDAO.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Add a New to the user account
 *
 * @param string $userTK user hash
 * @param string $newsXML XML based on xmlNews.xsd
 * @return boolean
 */
function addNews($userTK,$newsXML){
    $retObjNews = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsXML' => $newsXML);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        /* get an array of news objects */
        $arrObjNews = NewsDAO::getNewsFromXML($retParams['newsXML']);
        foreach($arrObjNews as $objNews){
            /* add each news */
            $retObjNews = NewsDAO::addNews($retParams['userTK']['userID'],$objNews);
        }
    }
    return $retObjNews;
}

/**
 * Remove a news from user account
 *
 * @param string $userTK user hash
 * @param int $newsID
 * @return booleand
 */
function removeNews($userTK,$newsID){
    $retObjNews = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsID' => $newsID);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retObjNews = NewsDAO::removeNews($retParams['userTK']['userID'],$retParams['newsID']);
    }
    return $retObjNews;
}

/**
 * Return a news metadata
 * 
 * @param string $userTK user hash
 * @param int $newsID
 * @return false|array Array with news metadata
 */
function getNews($userTK,$newsID){
    $newsItem = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsID' => $newsID);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $newsItem = NewsDAO::getNews($retParams['userTK']['userID'],$retParams['newsID']);
    }

    foreach($newsItem as $key => $value){
        foreach($value as $keySec => $valueSec){
            $newsItem[$key][$keySec] = htmlspecialchars($valueSec);
        }
    }

    return $newsItem;
}

/**
 * Return a news list from a specific user.
 *
 * @param string $userTK user hash
 * @param args $params array([date,rate])
 * @param int $from start register
 * @param int $count total of registers
 * @return false|array Array with news list metadata
 */
function getNewsList($userTK, $args){
    $newsList = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $newsList = NewsDAO::getNewsList($retParams['userTK']['userID'], $args);
    }

    foreach($newsList as $key => $value){
        foreach($value as $keySec => $valueSec){
            $newsList[$key][$keySec] = htmlspecialchars($valueSec);
        }
    }

    return $newsList;
}

/**
 * Return a news list with the parameter InHome=1
 *
 * @param string $userTK user hash
 * @return false|array Array with news list metadata
 */
function getInHomeNews($userTK){
    $newsList = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $newsList = NewsDAO::getInHomeNews($retParams['userTK']['userID']);
    }
    return $newsList;
}

/**
 * Return the total user news
 *
 * @param string $userTK user hash
 * @return int
 */
function getTotalItens($userTK){
    $newsList = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $newsList = NewsDAO::getTotalItens($retParams['userTK']['userID']);
    }
	return $newsList;
}

 /**
  * Update the new and the new metadata
  *
  * @param string $userTK user hash
  * @param int $newsID News to be updated
  * @param string $news XML with news metadata based on xmlNews.xsd
  * @return boolean
  */
function updateNews($userTK,$newsID,$newsXML){
    $retObjNews = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsID' => $newsID,
                    'newsXML' => $newsXML);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        /* get an array of news objects */
        $arrObjNews = NewsDAO::getNewsFromXML($retParams['newsXML']);
        foreach($arrObjNews as $objNews){
            /* add each document */
            $retObjNews = NewsDAO::updateNews($retParams['userTK']['userID'],$retParams['newsID'],$objNews);
        }
    }
    return $retObjNews;
}

/**
 * Changes the value of rate attribute
 *
 * @param string $userTK user hash
 * @param int $newsID
 * @param int $newsRate [0|1|2|3]
 * @return boolean
 */
function updateNewsRate($userTK,$newsID,$newsRate){
    $newsList = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsID' => $newsID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $newsList = NewsDAO::updateNewsRate($retParams['userTK']['userID'],$retParams['newsID'],$newsRate);
    }
	return $newsList;
}
/**
 * Changes the value of the attribute home to 0
 *
 * @param string $userTK user hash
 * @param int $newsID
 * @return boolean
 */
 function deleteFromHome($userTK,$newsID){
    $result = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsID' => $newsID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $result = NewsDAO::deleteFromHome($retParams['userTK']['userID'],$retParams['newsID']);
    }
	return $result;
 }

/**
 * Changes the value of the attibute home to 1
 *
 * @param string $userTK user hash
 * @param int $newsID
 * @return boolean
 */
function addInHome($userTK,$newsID){
    $result = false;
    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'newsID' => $newsID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $result = NewsDAO::addInHome($retParams['userTK']['userID'],$retParams['newsID']);
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
        $result = NewsDAO::getTotalPages($retParams['userTK']['userID'],DOCUMENTS_PER_PAGE);
    }
	return $result;
}
?>
