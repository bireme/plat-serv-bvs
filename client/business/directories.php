<?php
/**
 * Business directories handle
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
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
switch($_REQUEST["task"]){
    case "list":
        $result = DocsCollection::listDirs($_SESSION["userTK"]);        
        $response["values"] = $result;
        if ($result != false){
            $response["status"] = true;
        }
    break;
    case "add":
        if ($_REQUEST["mode"] == "persist"){
            $result = DocsCollection::addDir($_SESSION["userTK"],$_REQUEST["directoryName"]);
            $response["values"] = $result;
            if ($result != false){
                $response["status"] = true;
            }
        }
    break;
    case "edit":
        $responseDirName["status"] = false;
        $result = DocsCollection::getDirName($_SESSION["userTK"],$_REQUEST["directory"]);
        if ($result === true){
            $responseDirName["status"] = true;
        }
        $responseDirName["values"] = $result;
        if ($_REQUEST["mode"] == "persist"){
            $result = DocsCollection::editDir($_SESSION["userTK"],$_REQUEST["directory"],$_REQUEST["directoryName"]);
            $response["values"] = $result;

            if ($result != false){
                $response["status"] = true;
            }
        }
    break;
    case "delete":
        $responseGetDirName["status"] = false;
        $responseListDirs["status"] = false;
        $resultListDirs   = DocsCollection::listDirs($_SESSION["userTK"]);
        $resultGetDirName = DocsCollection::getDirName($_SESSION["userTK"],$_REQUEST["directory"]);
        if ($resultGetDirName != false){
            $responseGetDirName["status"] = true;
        }
        $responseGetDirName["values"] = $resultGetDirName;
        if ($resultListDirs != false){
            $responseListDirs["status"] = true;
        }
        $responseListDirs["values"] = $resultListDirs;

        //$response["status"] = false;
        if ($_REQUEST["mode"] == "delete"){
            $result = DocsCollection::remDir($_SESSION["userTK"],$_REQUEST["removeDir"]);
            $response["values"] = $result;
        }elseif ($_REQUEST["mode"] == "move" ){
            $result = DocsCollection::moveAllToAnotherDirectory($_SESSION["userTK"], $_REQUEST["moveToDirectory"], $_REQUEST["removeDir"]);
            $response["values"] = $result;
        }
        if ($result != false){
            $response["status"] = true;
        }
    break;
    case "movedoc":
        $docsrc = base64_decode($_REQUEST['docsrc']);
        $resultDoc = DocsCollection::getDoc($_SESSION["userTK"],$_REQUEST['document'],$docsrc);

        $resultListDirs = DocsCollection::listDirs($_SESSION["userTK"]);
        if ($resultListDirs != false){
            $responseListDirs["status"] = true;
        }
        $responseListDirs["values"] = $resultListDirs;

        if ($_REQUEST["mode"] == "persist"){
            $result = DocsCollection::moveDocToAnotherDirectory($_SESSION["userTK"], $_REQUEST["fromDirectory"], $_REQUEST["moveToDirectory"], $_REQUEST["document"]);
            $response["values"] = $result;
            if ($result != false){
                $response["status"] = true;
            }
        }
    break;
    case "publish":
        $result = DocsCollection::toggleDirPublicStatus($_SESSION["userTK"],
            $_REQUEST["directory"]);

        if ($result != false){
                $response["status"] = true;
        }
    break;
    case "nopublish":
        $result = DocsCollection::toggleDirNoPublicStatus($_SESSION["userTK"],
            $_REQUEST["directory"]);

        if ($result != false){
                $response["status"] = true;
        }
    break;
    default:
        die("default");
    break;
}
?>
