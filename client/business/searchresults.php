<?php
/**
 * Business search results handle
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");
require_once(dirname(__FILE__)."/../classes/SearchResults.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}

$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

$docsFolders = DocsCollection::listDirs($_SESSION["userTK"]);

switch($_REQUEST["task"]){
    case "list":
        /* paginator */
        $paginationData['pages'] = SearchResults::getTotalPages($_SESSION["userTK"]);
        $objPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
        $params['page'] = $objPaginator->getCurrentPage();

        $result = SearchResults::getRSSList( $_SESSION["userTK"], $params );
        $response["values"] = $result;
        $response["status"] = true;

        $result = SearchResults::getRSS($_SESSION["userTK"], $_REQUEST["rss"]);
        $responseSearch["values"] = $result;
        $responseSearch["status"] = true;

        $result = SearchResults::parseRSS($_SESSION["userTK"], $_REQUEST["rss"]);
        $items = array_slice($result["channel"]["item"], 0, SEARCH_RESULTS_LIMIT);
        $responseSearchItems["values"] = $result;
        $responseSearchItems["status"] = true;
    break;
    case "add":
        $xml  = '<docs>';
        $xml .= '    <doc>';
        $xml .= '        <field name="name">'.htmlspecialchars($_REQUEST["name"]).'</field>';
        $xml .= '        <field name="url">'.htmlspecialchars($_REQUEST["url"]).'</field>';
        $xml .= '     </doc>';
        $xml .= '</docs>';

        $result = SearchResults::addRSS($_SESSION["userTK"], $xml);

        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "edit":
        $response["status"] = null;

        if ( $_REQUEST["persist"] ) {
            $xml  = '<docs>';
            $xml .= '    <doc>';
            $xml .= '        <field name="name">'.htmlspecialchars($_REQUEST["name"]).'</field>';
            $xml .= '        <field name="url">'.htmlspecialchars($_REQUEST["url"]).'</field>';
            $xml .= '     </doc>';
            $xml .= '</docs>';

            $result = SearchResults::updateRSS($_SESSION["userTK"], $_REQUEST["rss"], $xml);

            $response["status"] = true;
        } else {
            $result = SearchResults::getRSS($_SESSION["userTK"], $_REQUEST["rss"]);
        }

        $response["values"] = $result[0];
    break;
    case "delete":
        $result = SearchResults::removeRSS($_SESSION["userTK"], $_REQUEST["rss"]);
        $result = SearchResults::getRSSList( $_SESSION["userTK"], $params );
        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
