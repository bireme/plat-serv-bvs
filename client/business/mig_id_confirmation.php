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
    $_REQUEST["task"] = "migrationConfirm";
}

$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

switch($_REQUEST["task"]){
    case "migrationConfirm":
        if ($_SESSION["userTK"] === null){
            $result = Authentication::migrateUser($_REQUEST['tmpTK'], $_REQUEST["userID"]);
            if ($result != false){
                $_SESSION["userTK"] = $result["userTK"];
                $_SESSION["userFirstName"] = $result["userFirstName"];
                $_SESSION["userLastName"] = $result["userLastName"];
                $_SESSION["userMail"] = $result["userMail"];
                $response["status"] = true;
                $response["values"] = $result;
                setcookie("userTK", $result["userTK"], 0, '/', COOKIE_DOMAIN_SCOPE);
            }else{
                $response["status"] = false;
                $response["values"] = $result;
            }
        }
    break;
    default:break;
}
?>