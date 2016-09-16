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
        /* check users from Social Medias */
        if ( isset($socialMedia) && !empty($socialMedia) && is_array($socialMedia) ) {

            $result["source"] = $socialMedia['social_media'];
            $result["status"] = true;
            $result["userID"] = $dUserID;

            /* if the user does not exist in SP database */
            if(!UserDAO::isUser($dUserID)){
                $name = array( 'facebook' => 'first_name', 'google' => 'given_name' );
                $name = $name[$socialMedia['social_media']];
                $surname = array( 'facebook' => 'last_name', 'google' => 'family_name' );
                $surname = $surname[$socialMedia['social_media']];

                $objUser = new User();
                $objUser->setID($socialMedia['email']);
                $objUser->setFirstName($socialMedia[$name]);
                $objUser->setLastName($socialMedia[$surname]);
                $objUser->setEmail($socialMedia['email']);
                $objUser->setPassword($dUserPass);

                $addResult = UserDAO::addUser($objUser);
                $result["userDataStatus"] = false; /* need to complete user data */

            }

            $response = $result;

        } else {
            $response = ToolsAuthentication::authenticateUser($dUserID ,$dUserPass);
        }

        if ($response["status"] === true){
            $objUser = UserDAO::getUser($response["userID"]);
            $retValue['userFirstName']=$objUser->getFirstName();
            $retValue['userLastName']=$objUser->getLastName();              
            $retValue['userMail']=$objUser->getEmail();

            if ( $socialMedia['social_media'] )
                $retValue['userTK']=Token::makeUserTK($objUser->getID(),$dUserPass,$socialMedia['social_media']);
            else
                $retValue['userTK']=Token::makeUserTK($objUser->getID(),$dUserPass);
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
        }
    }
    return $retValue;
}
?>
