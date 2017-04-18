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

                // SSO LOGIN
                if(ENABLE_SSO_LOGIN){
                  if($_REQUEST["origin"] != ""){
                      $origin = base64_decode($_REQUEST["origin"]);

                      if(strpos($origin,"?")){
                          //$redirectCommand = ($origin."&userID=".$result["userTK"]."&firstName=".$_SESSION["userFirstName"]."&lastName=".$_SESSION["userLastName"]."&email=".$_SESSION["userMail"]."&lang=".$lang);
                          $redirectCommand = ($origin."&userID=".$result["userTK"]."&lang=".$lang);
                      }else{
                          //$redirectCommand = ($origin."?userID=".$result["userTK"]."&firstName=".$_SESSION["userFirstName"]."&lastName=".$_SESSION["userLastName"]."&email=".$_SESSION["userMail"]."&lang=".$lang);
                          $redirectCommand = ($origin."?userID=".$result["userTK"]."&lang=".$lang);
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
                if($_REQUEST["origin"] != ""){
                    $ssoParams = '/origin/'.$_REQUEST['origin'];
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
if($_REQUEST["origin"] != "" and empty($_SESSION["userTK"])){
    if($response["status"] === false){
        $state = "false";
        $origin = base64_decode($_REQUEST["origin"]);

        if ( $_REQUEST['error'] == 'access_denied' )
            $state = $_REQUEST['error'];

        if(strpos($origin,"?")){
            $redirectCommand = ($origin."&status=$state");
        }else{
            $redirectCommand = ($origin."?status=$state");
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