<?php
/**
 * Server Side webservices for user profiles collection
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
require_once(dirname(__FILE__)."/../classes/ProfileDAO.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");
/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Add a Profile to the user account
 *
 * @param string $userTK user hash
 * @param string $profile XML Format based on xmlProfile.xsd
 * @return boolean
 */
function addProfile($userTK,$profileXML){
    $retObjProfile = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'profileXML' => $profileXML);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        /* get an array of profiles objects */
        $arrObjProfile = ProfileDAO::getProfileFromXML($retParams['profileXML']);

        foreach($arrObjProfile as $objProfile){
            /* add each document */
            $retObjProfile = ProfileDAO::addProfile($retParams['userTK']['userID'],$objProfile);
        }

    }
    return $retObjProfile;
}

/**
 * Remove a Profile from user account
 *
 * @param string $userTK user hash
 * @param string $profile XML Format based on xmlProfile.xsd
 * @return boolean
 */
function removeProfile($userTK,$profileID){
    $retObjProfile = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'profileID' => $profileID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $retObjProfile = ProfileDAO::removeProfile($retParams['userTK']['userID'],$retParams['profileID']);
    }
    return $retObjProfile;
}

/**
 * Return a Profile metadata
 *
 * @param string $userTK user hash
 * @param int $profileID
 * @return array object Profile
 */
function getProfile($userTK,$profileID){
    $profileItem = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'profileID' => $profileID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $profileItem = ProfileDAO::getProfile($retParams['userTK']['userID'],$retParams['profileID']);
    }

    return $profileItem;
}

/**
 * Return the total of profiles in a specified user account
 *
 * @param string $userTK user hash
 * @return false|int
 */
function getTotalItens($userTK){
    $profileList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $profileList = ProfileDAO::getTotalItens($retParams['userTK']['userID']);
    }
	return $profileList;
}

/**
 * Return a profile list from a specific user.
 * @param string $userTK user hash
 * @param array $args array([date,rate])
 * @param int $from start register
 * @param int $count total of registers
 * @return false|array record set with user profiles
 */
function getProfileList($userTK, $args, $from=0, $count=-1){
    $profileList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $profileList = ProfileDAO::getProfileList($retParams['userTK']['userID'],$args,$from,$count);
    }
    return $profileList;
}
 /**
  * Update the profile and the profile metadata
  *
  * @param string $userTK user hash
  * @param int $profileID profile to be updated
  * @param string $profile XML with new profile metadata
  * @return boolean
  */
function updateProfile($userTK,$profileID,$profileXML){
    $retObjLink = false;
    /*  parameter validation */
    //return $userTK;
    $params = array('userTK' => $userTK,
                    'profileID' => $profileID,
                    'profileXML' => $profileXML);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        /* get an array of links objects */
        $arrObjProfile = ProfileDAO::getProfileFromXML($retParams['profileXML']);
        foreach($arrObjProfile as $objProfile){
            /* add each document */
            $retObjProfile = ProfileDAO::updateProfile($retParams['userTK']['userID'],$retParams['profileID'],$objProfile);
        }
    }
    return $retObjProfile;
}

/**
 * Returns the number of pages from a range of profiles.
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
        $result = ProfileDAO::getTotalPages($retParams['userTK']['userID'],DOCUMENTS_PER_PAGE);
    }
	return $result;
}
?>
