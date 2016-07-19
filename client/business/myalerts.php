<?php
/**
 * Business my alerts handle
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
require_once(dirname(__FILE__)."/../classes/MyAlerts.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;

switch($_REQUEST["task"]){
    case "list":
        $result["accessList"] = MyAlerts::getAccessAlertList($_SESSION["userTK"]);
        $result["citedList"] = MyAlerts::getCitedAlertList($_SESSION["userTK"]);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "access":
        $result["accessList"] = MyAlerts::getAccessAlertList($_SESSION["userTK"]);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "cited":
        $result["citedList"] = MyAlerts::getCitedAlertList($_SESSION["userTK"]);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "deleteaccess":
        $result = MyAlerts::deleteAccessAlert($_SESSION["userTK"],$_REQUEST["alert"]);
        $result = null;
        $result["accessList"] = MyAlerts::getAccessAlertList($_SESSION["userTK"]);
        $result["citedList"] = MyAlerts::getCitedAlertList($_SESSION["userTK"]);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "deletecited":
        $result = MyAlerts::deleteCitedAlert($_SESSION["userTK"],$_REQUEST["alert"]);
        $result = null;
        $result["accessList"] = MyAlerts::getAccessAlertList($_SESSION["userTK"]);
        $result["citedList"] = MyAlerts::getCitedAlertList($_SESSION["userTK"]);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
