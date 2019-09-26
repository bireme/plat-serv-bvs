<?php
/**
 * Business Authentication
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
require_once(dirname(__FILE__)."/../classes/Authentication.php");
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "authenticate";
}

$response["status"] = false;
$params["sort"] = $_REQUEST["sort"];
$origin = ( $_REQUEST["origin"] ) ? $_REQUEST["origin"] : '';
$iahx = ( $_REQUEST['iahx'] ) ? $_REQUEST['iahx'] : base64_encode('portal');
$label = $trans->getTrans("mysearches", 'ORIGIN_SITE');

$token = false;
$send_cookie = false;

if ( strpos(base64_decode($iahx), VHL_SEARCH_PORTAL_DOMAIN) !== false ) {
    $chunks = explode('/', base64_decode($iahx));
    $chunks = array_values(array_filter($chunks));

    if ( count($chunks) > 2 && !empty($chunks[2]) ) {
        $label = strtoupper($chunks[2]);
        $label = $trans->getTrans("mysearches", $label);

        if ( strpos($label, 'translate_') !== false )
            $label = $trans->getTrans("mysearches", 'ORIGIN_SITE');
    }
}

switch($_REQUEST["task"]){
    case "authenticate":
        if ( !isset($_SESSION["userTK"]) || empty($_SESSION["userTK"])){
            $userID = $_REQUEST["userID"];
            $userPass =  $_REQUEST["userPass"];

            if ( isset($_COOKIE["userTK"]) && !empty($_COOKIE["userTK"]) ) {
                $token = Token::unmakeUserTK($_COOKIE["userTK"], true);

                if ( $token ) {
                    $userID = $token["userID"];
                    $userPass = $token["userPass"];
                }
            }

            $result = Authentication::loginUser($userID,$userPass);

            if (($result["status"] !== false) && ($result !== false)){
                $_SESSION["sysUID"] = $result["sysUID"];
                $_SESSION["userTK"] = $result["userTK"];
                $_SESSION["userID"] = $result["userID"];
                $_SESSION["userFirstName"] = $result["userFirstName"];
                $_SESSION["userLastName"] = $result["userLastName"];
                $_SESSION["userMail"] = $result["userMail"];
                $_SESSION["source"] = $result["source"];
                $_SESSION["avatar"] = $result["avatar"];
                $_SESSION["visited"] = $result["visited"];
                $_SESSION["iahx"] = base64_decode($iahx);
                $response["status"] = true;
                $response["values"] = $result;

                // send cookie to .bvs.br
                $send_cookie = true;
                $remember_me = ( $_REQUEST['remember_me'] || $token ) ? time() + (10 * 365 * 24 * 60 * 60) : 0;
                // send cookie to .bvsalud.org
                $cookie = UserData::sendCookie($result["userTK"], true);
                setcookie("userData", $cookie, $remember_me, '/', COOKIE_DOMAIN_SCOPE);
                setcookie("userTK", $result["userTK"], $remember_me, '/', COOKIE_DOMAIN_SCOPE);
                setcookie("userID", $result["sysUID"], $remember_me, '/', COOKIE_DOMAIN_SCOPE);

                // SSO LOGIN
                if(ENABLE_SSO_LOGIN){
                    if(!empty($origin)){
                        $originURL = base64_decode($origin);

                        if(strpos($originURL,"?"))
                            $redirectCommand = $originURL."&spauth=true";
                        else
                            $redirectCommand = $originURL."?spauth=true";

                        UserData::sendCookie($result["userTK"]); // send cookie to .bvs.br

                        echo '<script language="javascript">';
                        echo 'window.open("'.$redirectCommand.'","_parent")';
                        echo '</script>';
                        exit;
                    }
                }
            }else{
                $response["status"] = false;
                $response["values"] = $result;
            }

            if($response['values']['idConfirmation'] === true){
                if(!empty($origin)){
                    $ssoParams = '/origin/'.$origin;
                }

                header('Location: '. RELATIVE_PATH .
                    '/controller/mig_id_confirmation/userTK/'.
                    base64_encode($response['values']['tmpTK']).'/userID/'.
                    base64_encode($response['values']['userID']).$ssoParams);

                exit();
            }
        }
    break;
    default:break;
}

/* Redirect To */
if(!empty($origin) and empty($_SESSION["userTK"]) and $control != "home"){
    if($response["status"] === false){
        $state = "false";
        $originURL = base64_decode($origin);

        if ( $_REQUEST['error'] == 'access_denied' )
            $state = $_REQUEST['error'];

        if(strpos($originURL,"?")){
            $redirectCommand = ($originURL."&status=$state");
        }else{
            $redirectCommand = ($originURL."?status=$state");
        }

        echo '<script language="javascript">';
        echo 'window.open("'.$redirectCommand.'","_parent")';
        echo '</script>';
        exit;
    }
}

/* Reload user data  */
if(!empty($_SESSION["userTK"])){
    $result = Authentication::getUserData($_SESSION["userTK"]);

    if ($result != false){
        $_SESSION["userFirstName"] = $result["userFirstName"];
        $_SESSION["userLastName"] = $result["userLastName"];
        $_SESSION["userMail"] = $result["userMail"];
        $_SESSION["source"] = $result["source"];
        $_SESSION["avatar"] = $result["avatar"];
    }

    if ( $_SESSION['data'] ) {
        $data = (array) $_SESSION['data'];

        extract($data);

        $url = htmlspecialchars($url);
        $source = htmlspecialchars($source);
        $author = htmlspecialchars($author);
        $title = htmlspecialchars($title);

$xmlDoc=<<<XML
<?xml version='1.0'?>
<docs>
    <doc>
        <field name="doc_id">{$id}</field>
        <field name="doc_url">{$url}</field>
        <field name="src_id">{$source}</field>
        <field name="au">{$author}</field>
        <field name="title">{$title}</field>
    </doc>
</docs>
XML;

        $result = DocsCollection::addDoc($_SESSION["userTK"], $xmlDoc);

        if ( $result ) {
            unset($_SESSION['data']);
            
            if ( $_SESSION['visited'] ) {
                header('Location: '.RELATIVE_PATH.'/controller/mydocuments/control/business');
            }
        }
    }
}
?>