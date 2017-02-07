<?php
/**
 * Business ORCID works handle
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/SimilarDocs.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

switch($_REQUEST["task"]){
    case "list":
        $paginationData['pages'] = SimilarDocs::getTotalOrcidWorksPages($_SESSION["userTK"]);
        $objPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
        $params['page'] = $objPaginator->getCurrentPage();

        $result = SimilarDocs::getOrcidWorks( $_SESSION["userTK"], $params );
        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
