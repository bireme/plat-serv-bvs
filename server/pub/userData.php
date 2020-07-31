<?php

ob_start("ob_gzhandler");

session_start();

require_once(dirname(__FILE__)."/include/includes.php");
require_once(dirname(__FILE__)."/include/degreeLibrary.php");
require_once(dirname(__FILE__)."/include/professionalAreaLibrary.php");
require_once(dirname(__FILE__)."/include/countriesLibrary.php");
require_once(dirname(__FILE__)."/translations.php");
require_once(dirname(__FILE__)."/../classes/User.php");
require_once(dirname(__FILE__)."/../classes/UserDAO.php");
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

if ( empty($_SESSION['userTK']) && !empty($_GET['userTK']) )
    header("Location: ".RELATIVE_PATH."/controller/authentication");

$src = $_SESSION['source'] ? $_SESSION['source'] : false;

if(!empty($_GET['userTK'])){
    if ( $src && 'bireme_accounts' == $src )
        $arrUserData = Token::unmakeUserTK($_GET['userTK'], true);
    else
        $arrUserData = Token::unmakeUserTK($_GET['userTK']);
}

$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;

/* variaveis do formulario */
$userID = isset($arrUserData) ? $arrUserData['userID'] : '';

$firstName = !empty($_REQUEST['firstName']) ? $_REQUEST['firstName'] : false;
$lastName = !empty($_REQUEST['lastName']) ? $_REQUEST['lastName'] : false;
$gender = !empty($_REQUEST['gender']) ? $_REQUEST['gender'] : false;
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : false;
$user = !empty($_REQUEST['user']) ? $_REQUEST['user'] : false;
$profilesTexts = !empty($_REQUEST['profiletext']) ? $_REQUEST['profiletext'] : false;
$profilesNames = !empty($_REQUEST['profilename']) ? $_REQUEST['profilename'] : false;
$profilesIDs = !empty($_REQUEST['profileid']) ? $_REQUEST['profileid'] : false;
$grauFormacao = !empty($_REQUEST['degree']) ? $_REQUEST['degree'] : false;
$areaAtuacao = !empty($_REQUEST['profArea']) ? $_REQUEST['profArea'] : false;
$area = !empty($_REQUEST['degree']) ? $_REQUEST['degree'] : false;
$afiliacao = !empty($_REQUEST['afiliacao']) ? $_REQUEST['afiliacao'] : false;
$country = !empty($_REQUEST['country']) ? $_REQUEST['country'] : false;
$source = !empty($_REQUEST['source']) ? $_REQUEST['source'] : $src;
$linkedin = !empty($_REQUEST['linkedin']) ? $_REQUEST['linkedin'] : false;
$researchGate = !empty($_REQUEST['researchGate']) ? $_REQUEST['researchGate'] : false;
$orcid = !empty($_REQUEST['orcid']) ? $_REQUEST['orcid'] : false;
$researcherID = !empty($_REQUEST['researcherID']) ? $_REQUEST['researcherID'] : false;
$lattes = !empty($_REQUEST['lattes']) ? $_REQUEST['lattes'] : false;
$terms = !empty($_REQUEST['terms']) ? $_REQUEST['terms'] : false;
$acceptMail = !empty($_REQUEST['accept_mail']) ? $_REQUEST['accept_mail'] : 0;
$acao = !empty($_REQUEST['acao']) ? $_REQUEST['acao'] : 'default';
$userKey = !empty($_REQUEST['key']) ? $_REQUEST['key'] : false;
$ut = !empty($_REQUEST['ut']) ? $_REQUEST['ut'] : false;
$theme = !empty($_REQUEST['theme']) ? $_REQUEST['theme'] : false;
$msg = null; /* system messages */
$birthday = false;

$avatar = ( $_FILES['avatar']['name'] ) ? UserData::avatar_upload($userID, $_FILES['avatar']) : false;

if ( $avatar ) {
    $_SESSION['avatar'] = $avatar;
}

if ( !empty($_REQUEST['birthday']) ) {
    $birthday = str_replace('/', '-', $_REQUEST['birthday']);
    $birthday = date("Y-m-d", strtotime($birthday));
}

switch($acao){
    case "gravar":
        $usr = new User();
        $usr->setFirstName($firstName);
        $usr->setLastName($lastName);
        $usr->setGender($gender);
        $usr->setID($user);
        $usr->setEmail($user);
        $usr->setAffiliation($afiliacao);
        $usr->setCountry($country);
        $usr->setSource($source);
        $usr->setDegree($grauFormacao);
        $usr->setProfessionalArea($areaAtuacao);
        $usr->setLinkedin($linkedin);
        $usr->setResearchGate($researchGate);
        $usr->setOrcid($orcid);
        $usr->setResearcherID($researcherID);
        $usr->setLattes($lattes);
        $usr->setBirthday($birthday);
        $usr->setAgreementDate($terms);
        $usr->setAcceptMail($acceptMail);

        if ( $avatar ) {
            $usr->setAvatar($avatar);
        }

        if(Verifier::chkObjUser($usr)){
            $migrationResult = ToolsRegister::authenticateRegisteringUser($usr);
        }

        if ($migrationResult["status"] === true) {
            $response["status"] = true;

            if ( 'e-blueinfo' == $usr->getSource() ) {
                header('Location: '.rtrim($callerURL, '/').'/?status='.$migrationResult["error"]);
            }

            if ($migrationResult["error"] === "userconfirmed")
                $response["msg"] = USER_ADD_CONFIRMED;
            else
                $response["msg"] = USER_SEND_CONFIRMATION;

            $retValue = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
        } elseif ($migrationResult["status"] === false && $migrationResult["error"] === "userexists") {
            $response["msg"] = USER_EXISTS;
            $response["status"] = false;
        } else {
            $response["msg"] = USER_ADD_ERROR;
            $response["status"] = false;
        }

        break;
    case "atualizar":
        $usr = UserDAO::getUser($userID);

        $usr->setID($userID);
        $usr->setFirstName($firstName);
        $usr->setLastName($lastName);
        $usr->setGender($gender);
        $usr->setDegree($grauFormacao);
        $usr->setProfessionalArea($areaAtuacao);
        $usr->setAffiliation($afiliacao);
        $usr->setCountry($country);
        $usr->setSource($source);
        $usr->setLinkedin($linkedin);
        $usr->setResearchGate($researchGate);
        $usr->setOrcid($orcid);
        $usr->setResearcherID($researcherID);
        $usr->setLattes($lattes);
        $usr->setBirthday(date("Y-m-d", strtotime($birthday)));
        $usr->setAgreementDate($terms);
        $usr->setAcceptMail($acceptMail);

        if ( $avatar ) {
            $usr->setAvatar($avatar);
        }

        if(Verifier::chkObjUser($usr)){
            $result = UserDAO::updateUser($usr);
        }

        if($result === true){
            $response["msg"] = USER_UPDATED;
            $response["status"] = true;
            $retValue = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
        }else{
            $response["msg"] = USER_UPDATE_ERROR;
            $response["status"] = false;
        }

        break;
    case "confirmar":
        $result = UserDAO::userConfirm($email, $userKey, 'user');

        if($result === true){
            $usr = UserDAO::getUser(trim($email));
            $addUser = UserDAO::addUser($usr, 1);

            if( $addUser ) {
                $response["msg"] = USER_CONFIRMED;
                $response["status"] = true;
                $retValue = UserDAO::createNewPassword($usr->getID());
                $retValue = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
            }
        }else{
            $response["msg"] = USER_CONFIRMATION_ERROR;
            $response["status"] = false;
        }

        break;
    case "alertas":
        if ( $ut ) {
            $data = Token::unmakeUserTK($ut, true);
            $result = UserDAO::setAcceptMail($data['userID'], 0);

            if($result === true){
                $response["msg"] = UNSUBSCRIBE_MAIL_SUCCESS;
                $response["status"] = true;
            }else{
                $response["msg"] = UNSUBSCRIBE_MAIL_ERROR;
                $response["status"] = false;
            }
        }

        break;
}

if(!empty($userID)){
    $isUser = UserDAO::isUser($userID);
    if($isUser){
        $usr = UserDAO::getUser($userID);
        $_SESSION["userFirstName"] = $usr->getFirstName();
        $_SESSION["userLastName"] = $usr->getLastName();
    }
}else{
    if ( !$usr ) $usr = new User();
}

$DocTitle = $isUser?UPDATE_USER_TITLE:REGISTER_NEW_USER_TITLE;

if ( $isUser ) {
    require_once(dirname(__FILE__)."/profile.php");
} else {
    if ( $theme && 'e-blueinfo' == $theme )
        require_once(dirname(__FILE__)."/register-eblueinfo.php");
    else
        require_once(dirname(__FILE__)."/register.php");
}

?>