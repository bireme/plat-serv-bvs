<?php
/**
 * Server Side webservices for user authentication
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
require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../config.ldap.php");
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/User.php");
require_once(dirname(__FILE__)."/../classes/UserDAO.php");
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* 
 * 
 * Remove the line above after the user migration phase and uncomment the line
 * bellow
 */
//require_once(dirname(__FILE__)."/../classes/LDAPAuthenticator.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Authenticate user on services platform
 *
 * @param string $userID User mail
 * @param string $userPass User password
 * @return boolean
 */
function loginUser($userID,$userPass,$socialMedia){

    $retValue = false;

    /* decrypt login params */
    $dUserID = Crypt::decrypt($userID, CRYPT_PUBKEY);
    $dUserPass = Crypt::decrypt($userPass, CRYPT_PUBKEY);

    if(!empty($dUserID) && !empty($dUserPass)){
        $response = ToolsAuthentication::authenticateUser($dUserID ,$dUserPass, $socialMedia);

        if ($response["status"] === true){
            $objUser = UserDAO::getUser($response["userID"]);
            $retValue['userID'] = $objUser->getID();
            $retValue['userFirstName'] = $objUser->getFirstName();
            $retValue['userLastName'] = $objUser->getLastName();              
            $retValue['userMail'] = $objUser->getEmail();
            $retValue['avatar'] = $objUser->getAvatar();
            $retValue['source'] = $response["source"];
            $retValue['visited'] = $response["visited"];
            $retValue['userTK'] = Token::makeUserTK($objUser->getID(),$dUserPass,$response['source']);
        }else{
            $retValue = array(); /* redeclare the variable */
            $retValue = $response;
        }
    }
    return $retValue;
}

/**
 * Create new password
 *
 * @param srting $userID
 * @return boolean
 */
function createNewPassword($userID){

    $retValue = false;

    $dUserID = Crypt::decrypt($userID, CRYPT_PUBKEY);

    if(!empty($dUserID)){        
        $retValue = UserDAO::createNewPassword($dUserID);
    }

    return $retValue;
}

/**
 * Fetch user data
 *
 * @param string $userTK User token
 * @return array|boolean
 */
function getUserData($userTK){
    $retValue = false;

    $params = array('userTK' => $userTK);

    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();

        $objUser = UserDAO::getUser($retParams['userTK']['userID']);

        if($objUser){
            $retValue = array(); /* redeclare the variable */

            $retValue['userFirstName']=$objUser->getFirstName();
            $retValue['userLastName']=$objUser->getLastName();
            $retValue['userMail']=$objUser->getEmail();
            $retValue['source']=$objUser->getSource();
            $retValue['avatar']=$objUser->getAvatar();
            $retValue['agreement_date']=$objUser->getAgreementDate();
            $retValue['professional_area']=$objUser->getProfessionalArea();
        }
    }
    return $retValue;
}
?>
