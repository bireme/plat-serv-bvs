<?php
/**
 * Business my links handle
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
require_once(dirname(__FILE__)."/../../logs/functions.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

switch($_REQUEST["task"]){
    case "list":
        $obj = new MySearches($_SESSION["userTK"]);
        $retParams = $obj->getParams();
        $paginationData['pages'] = $obj->getTotalPages($retParams['userID'], DOCUMENTS_PER_PAGE);

        $objPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);

        $params['page'] = $objPaginator->getCurrentPage();
        $result = $obj->getSearchList($retParams['userID'], $params);
        $response["values"] = $result;

        $response["status"] = true;        
    break;
    default:
        die("default");
    break;
}
?>
