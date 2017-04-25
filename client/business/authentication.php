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

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "authenticate";
}

$response["status"] = false;
$params["sort"] = $_REQUEST["sort"];
$lang = ( $_SESSION["lang"] ) ? $_SESSION["lang"] : DEFAULT_LANG;
$origin = ( $_REQUEST["origin"] ) ? $_REQUEST["origin"] : '';

switch($_REQUEST["task"]){
    case "authenticate":
        if (empty($_SESSION["userTK"])){
            $result = Authentication::loginUser($_REQUEST["userID"],$_REQUEST["userPass"]);
            if (($result["status"] !== false) and ($result !== false)){
                $_SESSION["userTK"] = $result["userTK"];
                $_SESSION["userFirstName"] = $result["userFirstName"];
                $_SESSION["userLastName"] = $result["userLastName"];
                $_SESSION["userMail"] = $result["userMail"];
                $_SESSION["source"] = $result["source"];
                $response["status"] = true;
                $response["values"] = $result;
                setcookie("userTK", $result["userTK"], 0, '/', COOKIE_DOMAIN_SCOPE);
                Cookie::sendCookie($result["userTK"]);

                // SSO LOGIN
                if(ENABLE_SSO_LOGIN){
                  if(!empty($origin)){
                      $originURL = base64_decode($origin);

                      if(strpos($originURL,"?")){
                          //$redirectCommand = ($originURL."&userID=".$result["userTK"]."&firstName=".$_SESSION["userFirstName"]."&lastName=".$_SESSION["userLastName"]."&email=".$_SESSION["userMail"]."&lang=".$lang);
                          $redirectCommand = ($originURL."&userID=".$result["userTK"]."&source=".$result["source"]."&lang=".$lang);
                      }else{
                          //$redirectCommand = ($originURL."?userID=".$result["userTK"]."&firstName=".$_SESSION["userFirstName"]."&lastName=".$_SESSION["userLastName"]."&email=".$_SESSION["userMail"]."&lang=".$lang);
                          $redirectCommand = ($originURL."?userID=".$result["userTK"]."&source=".$result["source"]."&lang=".$lang);
                      }

                      echo '<script language="javascript">';
                      echo 'window.open("'.$redirectCommand.'","_parent")';
                      echo '</script>';
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
                header('Location:'. RELATIVE_PATH .
                    '/controller/mig_id_confirmation/userTK/'.
                    base64_encode($response['values']['tmpTK']).'/userID/'.
                    base64_encode($response['values']['userID']).$ssoParams);
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
    }
}
?>