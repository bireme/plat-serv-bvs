<?php
/**
 * Business widgets handle
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/Authentication.php");
require_once(dirname(__FILE__)."/../classes/MyLinks.php");
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");
require_once(dirname(__FILE__)."/../classes/MyProfiles.php");
require_once(dirname(__FILE__)."/../classes/SimilarDocs.php");
require_once(dirname(__FILE__)."/../classes/Tracking.php");
require_once(dirname(__FILE__)."/../../logs/functions.php");
require_once(dirname(__FILE__)."/../../server/pub/include/professionalAreaLibrary.php");

$params["widget"] = true;
$params["count"]  = WIDGETS_ITEMS_LIMIT;

// My Collections widget
$collections = DocsCollection::listDocs( $_SESSION['userTK'], null, $params );
$collections = Generic::unique_list_docs($collections, 'docID');
$totalCollections = DocsCollection::getTotalDocs( $_SESSION["userTK"], null, true );

// My Links widget
$links = MyLinks::getLinkList( $_SESSION["userTK"], $params );
$totalLinks = MyLinks::getTotalItens( $_SESSION["userTK"] );

// Profile Documents widget
$profiles = MyProfiles::getProfileList( $_SESSION["userTK"], $params );
$totalProfiles = MyProfiles::getTotalItens( $_SESSION["userTK"] );

// Recent Activities widget
//$params["sort"] = 'date';
$dataHistory = Tracking::getTraceList( $_SESSION["userTK"], $params );

// Suggested Documents widget
$suggestedDocs = SimilarDocs::getRelatedDocs( $_SESSION["userTK"], $_COOKIE["related"] );

// Highlights widget
$highlights = Slider::get_highlights();

// Events widget
$data = Authentication::getUserData($_SESSION["userTK"]);
$query_pt = $professionalArea['pt'][$data['professional_area']];
$query_es = $professionalArea['es'][$data['professional_area']];
$query_en = $professionalArea['en'][$data['professional_area']];
$query = '(' . $query_pt . ' OR ' . $query_es . ' OR ' . $query_en . ')';
$events = Events::get_events($query);
$multimedia = Multimedia::get_media($query);

// My Searches widget
$obj = new MySearches($_SESSION["userTK"]);
$retParams = $obj->getParams();
$searches = $obj->getSearchList($retParams['userID'], $params);
?>
