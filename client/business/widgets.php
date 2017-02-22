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
require_once(dirname(__FILE__)."/../classes/MyLinks.php");
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");
require_once(dirname(__FILE__)."/../classes/MyProfiles.php");
require_once(dirname(__FILE__)."/../classes/SimilarDocs.php");
require_once(dirname(__FILE__)."/../classes/Tracking.php");
require_once(dirname(__FILE__)."/../../logs/functions.php");

$params["widget"] = true;

// My Collections widget
$collections = DocsCollection::listDocs( $_SESSION['userTK'], null, $params );
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
$suggestedDocs = SimilarDocs::getSuggestedDocs( $_SESSION["userTK"], $params, true );

// My Searches widget
$obj = new MySearches($_SESSION["userTK"]);
$retParams = $obj->getParams();
$searches = $obj->getSearchList($retParams['userID'], $params);
?>
