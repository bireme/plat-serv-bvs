<?php
/**
 * Business my documents handle
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

$params["sort"]=$_REQUEST["sort"];

switch($_REQUEST["task"]){
    case "list":
        $response["status"] = false;
        $responseListDirs["status"] = false;
        
        /* paginator */
        $paginationData = DocsCollection::getTotalDocs($_SESSION["userTK"],
            $_REQUEST["directory"]);
        $objPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);

        $params['page'] = $objPaginator->getCurrentPage();
        $result = DocsCollection::listDocs($_SESSION["userTK"],
            $_REQUEST["directory"],$params);

        $resultListDirs = DocsCollection::listDirs($_SESSION["userTK"]);

        if (($_REQUEST["directory"] != null) and ($_REQUEST["directory"] != 0)){
            $resultDirName = DocsCollection::getDirName($_SESSION["userTK"],
                $_REQUEST["directory"]);
        }

        if ($result != false){
            $response["status"] = true;
        }
        if ($resultListDirs != false){
            $responseListDirs["status"] = true;
        }
        $response["values"] = $result;
        $directoryName = $result[0]["name"];
        $responseListDirs["values"] = $resultListDirs;   

        /* is the current dir public? */
        $shallBreak = false;
        foreach($responseListDirs['values'] as $arrDirKey => $arrDirValue){            
            foreach($arrDirValue as $dirAttKey => $dirAttValue){                
                if(($dirAttKey == 'dirID') && ($dirAttValue == $_REQUEST["directory"])){
                    $currDirIndex = (string)$arrDirKey;
                    $shallBreak = true;
                    break;
                }
            }
            if($shallBreak){
                break;
            }
        }
        unset($shallBreak);
        $isCurrDirPublic = $responseListDirs['values'][$currDirIndex]['public']!= 0 ? true : false;
//        var_dump($paginationData);
//        echo 'Page: ' . (string)$_REQUEST['page'];
    break;
    case "removedoc":
        $response["status"] = false;
        $responseListDirs["status"] = false;
        $result = DocsCollection::remDoc($_SESSION["userTK"],$_REQUEST["document"]);
        
        $result = DocsCollection::listDocs($_SESSION["userTK"],$_REQUEST["directory"],$params);
        $resultListDirs = DocsCollection::listDirs($_SESSION["userTK"]);

        if (($_REQUEST["directory"] != null) and ($_REQUEST["directory"] != 0)){
            $resultDirName = DocsCollection::getDirName($_SESSION["userTK"],$_REQUEST["directory"]);
        }

        if ($result != false){
            $response["status"] = true;
        }
        if ($resultListDirs != false){
            $responseListDirs["status"] = true;
        }
        $response["values"] = $result;
        $directoryName = $result[0]["name"];
        $responseListDirs["values"] = $resultListDirs;
    break;
    case "rate":
        $response["status"] = false;
        $responseListDirs["status"] = false;
        $result = DocsCollection::updDocRank($_SESSION["userTK"],$_REQUEST["document"],$_REQUEST["grade"]);

        $result = DocsCollection::listDocs($_SESSION["userTK"],$_REQUEST["directory"],$params);
        $resultListDirs = DocsCollection::listDirs($_SESSION["userTK"]);

        if (($_REQUEST["directory"] != null) and ($_REQUEST["directory"] != 0)){
            $resultDirName = DocsCollection::getDirName($_SESSION["userTK"],$_REQUEST["directory"]);
        }

        if ($result != false){
            $response["status"] = true;
        }
        if ($resultListDirs != false){
            $responseListDirs["status"] = true;
        }
        $response["values"] = $result;
        $directoryName = $result[0]["name"];
        $responseListDirs["values"] = $resultListDirs;

        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
