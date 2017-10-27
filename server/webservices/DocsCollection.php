<?php
/**
 * Server Side webservices for document collection
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
require_once(dirname(__FILE__)."/../classes/UserDAO.php");
require_once(dirname(__FILE__)."/../classes/UserDirectory.php");
require_once(dirname(__FILE__)."/../classes/UserDirectoryDAO.php");
require_once(dirname(__FILE__)."/../classes/Shelf.php");
require_once(dirname(__FILE__)."/../classes/ShelfDAO.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();


/**
 * list user documents
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $dirID mcrypt(dirID)
 * @return string XML 
 */
function listDocs($userTK,$dirID=null,$filter=null){
    $retValue = false;

    /* parameter validation */    
    $params = array('userTK' => $userTK);
    if(isset($dirID)){$params['dirID'] = $dirID;}
    $objVerifier = new Verifier($params);
    
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        
        $objShelf = new Shelf();
        if(isset($dirID)){
            $objUserDirectory = UserDirectoryDAO::getDir($retParams['userTK']['userID'],$dirID);
            $objShelf->setDir($objUserDirectory);
        }
        $objShelf->setUserID($retParams['userTK']['userID']);
        $retValue = ShelfDAO::listDocs($objShelf,$filter);
    }  
    return $retValue;
}

function listPublicDocs($userID,$dirID=null,$filter=null){
    $retValue = false;
    $userID = base64_decode($userID);
    $is_user = UserDAO::isUser($userID);
    
    if ( $is_user ) {        
        $objShelf = new Shelf();

        if ( isset($dirID) ) {
            $objUserDirectory = UserDirectoryDAO::getDir($userID,$dirID);
            $objShelf->setDir($objUserDirectory);
        }

        $objShelf->setUserID($userID);
        $retValue = ShelfDAO::listDocs($objShelf,$filter);
    }

    return $retValue;
}

function getTotalDocs($userTK,$dirID=null,$widget=false){
    $retValue = false;

    $dirID = empty($dirID) ? 0 : $dirID;

    /* parameter validation */
    $params = array('userTK' => $userTK, 'dirID' => $dirID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        if ( !$widget ) {
            $retValue['items'] = ShelfDAO::getTotalItens($retParams['userTK']['userID'],$retParams['dirID']);
            $retValue['pages'] = ShelfDAO::getTotalPages($retParams['userTK']['userID'],$retParams['dirID']);
        } else {
            $retValue = ShelfDAO::getTotalItens($retParams['userTK']['userID'], null);
        }
    }

    return $retValue;
}

function getTotalPublicDocs($userID,$dirID=null){
    $retValue = false;
    $dirID = empty($dirID) ? 0 : $dirID;
    $userID = base64_decode($userID);
    $is_user = UserDAO::isUser($userID);

    if ( $is_user ) {
        $retValue['items'] = ShelfDAO::getTotalItens($userID,$dirID);
        $retValue['pages'] = ShelfDAO::getTotalPages($userID,$dirID);
    }

    return $retValue;
}

/**
 * Add new document
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $appID mcrypt(source id) necessita implementacao
 * @param string $xmlDoc document matadata
 * @return string XML
 */
function addDoc($userTK,$xmlDoc){
    $retValue = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'xmlDoc' => $xmlDoc);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        
        /* get an array of document objects */
        $arrObjDocument = DocumentDAO::getDocsFromXML($xmlDoc);

        foreach($arrObjDocument as $objDocument){
            /* add each document */
            $retObjDocument = DocumentDAO::addDoc($objDocument);

            if($retObjDocument){
                /* add each document to shelf */
                $objShelf = new Shelf();
                $objShelf->setDocument($retObjDocument);
                $objShelf->setUserID($retParams['userTK']['userID']);

                $retValue = ShelfDAO::addDocToShelf($objShelf);
            }
        }
    }    
    return $retValue;
}

/**
 * Remove document
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $docID mcrypt(docID)
 * @return string XML
 */
function remDoc($userTK,$docID){
    $retValue = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK,
                    'docID' =>$docID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
     
        $retValue = ShelfDAO::remDocFromShelf($retParams['userTK']['userID'],$retParams['docID']);
    }
    return $retValue;
}

/**
 * move document
 * @param string $userTK mcrypt(userID+password)
 * @param string $docID mcrypt(docID)
 * @param string $dirID mcrypt(dirID)
 * @return string XML
 */
/*
function movDoc($userTK,$docID,$dirID){
    return false;
}
*/

/**
 * Returns an Array with the documents with accessStat = 1
 * @param <String> $userTK
 * @return <Boolean>
 */
function getAccessAlertList($userTK){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::getAccessedAlertList($retParams['userTK']['userID']);
    }
    
    return $retValue;
}

/**
 * Turn off the citation alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function deleteCitedAlert($userTK,$docID){
    $retValue = false;
    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::deleteCitedAlert($retParams['userTK']['userID'],$docID);
    }

    return $retValue;
}

/**
 * Turn on the citation alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function enableCitedAlert($userTK,$docID){
    $retValue = false;
    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::enableCitedAlert($retParams['userTK']['userID'],$docID);
    }

    return $retValue;
}

/**
 * Turn off the access alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function deleteAccessAlert($userTK,$docID){
    $retValue = false;
    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::deleteAccessAlert($retParams['userTK']['userID'],$docID);
    }

    return $retValue;
}

/**
 * Turn on the access alerts
 *
 * @param string $userID User ID
 * @param int $docID Document ID
 * @return boolean
 */
function enableAccessAlert($userTK,$docID){
    $retValue = false;
    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::enableAccessAlert($retParams['userTK']['userID'],$docID);
    }

    return $retValue;
}

/**
 * Returns an Array with the documents with citedStat = 1
 * @param <type> $userTK
 * @return <type>
 *
 */
function getCitedAlertList($userTK){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::getCitedAlertList($retParams['userTK']['userID']);
    }
    return $retValue;
}

/**
 * Update document rank
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $docID mcrypt(docID)
 * @param string $srcID mcrypt(srcID)
 * @param int $rankValue document rank value
 * @return string XML
 */
function updDocRank($userTK,$docID,$rankValue){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK,
                    'docID' => $docID,
                    'rankValue' => $rankValue);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::UpdateDocumentRate($retParams['userTK']['userID'],$retParams['docID'],$rankValue);
    }
    return $retValue;
}

/**
 * List user directories
 *
 * @param string $userTK mcrypt(userID+password)
 * @return string XML
 */
function listDirs($userTK){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
    
        $objUserDirectory = new UserDirectory();

        $objUserDirectory->setUserID($retParams['userTK']['userID']);
        $retValue = UserDirectoryDAO::listDirs($objUserDirectory);
    }
    return $retValue;
}

function listPublicDirs($userID){
    $retValue = false;
    $userID = base64_decode($userID);
    $is_user = UserDAO::isUser($userID);

    if ( $is_user ) {    
        $objUserDirectory = new UserDirectory();
        $objUserDirectory->setUserID($userID);
        $retValue = UserDirectoryDAO::listDirs($objUserDirectory);
    }

    return $retValue;
}

/**
 * Add new directory
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $dirName directory name
 */
function addDir($userTK,$dirName){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK,
                    'dirName' => $dirName);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $objUserDirectory = new UserDirectory();

        $objUserDirectory->setUserID($retParams['userTK']['userID']);
        $objUserDirectory->setDirName($retParams['dirName']);
    
        $retValue = UserDirectoryDAO::addDir($objUserDirectory);
    }
    return $retValue;
}

function moveAllToAnotherDirectory($userTK,$toDirID,$removeDirID){
    $params = array('userTK' => $userTK,
                    'removeDirID' => $removeDirID,
                    'dirID' => $toDirID);
    
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $objShelf= new Shelf();
        $objShelf->setUserID($retParams['userTK']['userID']);
        $objShelf->setDir($retParams['dirID']);
        $retValue = ShelfDAO::moveAllToAnotherDirectory($objShelf,$retParams['removeDirID']);

    }

    return $retValue;
}

/**
 * Move a document from one Directory to Another
 *
 * @param <string> $userTK
 * @param <integer> $fromDirID
 * @param <integer> $toDirID
 * @param <integer> $docID
 */
function moveDocToAnotherDirectory($userTK,$fromDirID,$toDirID,$docID){
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);
    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        $retValue = ShelfDAO::moveDocToAnotherDirectory($retParams['userTK']['userID'],$fromDirID,$toDirID,$docID);
    }

    return $retValue;
}

/**
 * remove directory
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $dirID mcrypt(dirID)
 * @return string XML
 */
function remDir($userTK,$dirID){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK,
                    'dirID' => $dirID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $objUserDirectory = new UserDirectory();

        $objUserDirectory->setUserID($retParams['userTK']['userID']);
        $objUserDirectory->setDirID($retParams['dirID']);
        $retValue = UserDirectoryDAO::remDir($objUserDirectory);
    }
    return $retValue;
}

/**
 * Edit directory
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $dirID mcrypt(dirID)
 * @param string $dirName directory name
 */
function editDir($userTK,$dirID,$dirName){
    $retValue = false;

    /* parameter validation */
    $params = array('userTK' => $userTK,
                    'dirID' => $dirID,
                    'dirName' => $dirName);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $objUserDirectory = new UserDirectory();

        $objUserDirectory->setUserID($retParams['userTK']['userID']);
        $objUserDirectory->setDirID($retParams['dirID']);
        $objUserDirectory->setDirName($retParams['dirName']);
        $retValue = UserDirectoryDAO::editDir($objUserDirectory);
    }
    return $retValue;
}

/**
 * Get directory name
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $dirID mcrypt(dirID)
 * @param string $dirName directory name
 */
function getDirName($userTK,$dirID){
    $retValue = false;

    $params = array('userTK' => $userTK,
                    'dirID' => $dirID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $objUserDirectory = new UserDirectory();

        $objUserDirectory->setUserID($retParams['userTK']['userID']);
        $objUserDirectory->setDirID($retParams['dirID']);
        $retValue = UserDirectoryDAO::getDirName($objUserDirectory);
    }
    return htmlspecialchars($retValue);
}

function getPublicDirName($userID,$dirID){
    $retValue = false;
    $userID = base64_decode($userID);
    $is_user = UserDAO::isUser($userID);

    if ( $is_user ) {
        $objUserDirectory = new UserDirectory();
        $objUserDirectory->setUserID($userID);
        $objUserDirectory->setDirID($dirID);
        
        $retValue = UserDirectoryDAO::getDirName($objUserDirectory);
    }

    return htmlspecialchars($retValue);
}

/**
 * Set directory public status
 *
 * @param string $userTK mcrypt(userID+password)
 * @param string $dirID Directory ID
 * @param boolean $status Public status
 */
function toggleDirPublicStatus($userTK, $dirID){
    $retValue = false;
    
    $params = array('userTK' => $userTK,
                    'dirID' => $dirID);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();
        
        $objUserDirectory = UserDirectoryDAO::getDir($retParams['userTK']['userID'],
            $retParams['dirID']);        
        $objUserDirectory[0]->setPublic(!$objUserDirectory[0]->getPublic());
        
        $retValue = UserDirectoryDAO::setPublic($objUserDirectory[0]);
    }
    return $retValue;
}
?>
