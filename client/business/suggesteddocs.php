<?php
/**
 * Business suggested documents handle
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
require_once(dirname(__FILE__)."/../classes/MyProfiles.php");
require_once(dirname(__FILE__)."/../classes/SimilarDocs.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

$docsFolders = DocsCollection::listDirs($_SESSION["userTK"]);
$profiles = MyProfiles::getProfileList($_SESSION["userTK"],$params);

switch($_REQUEST["task"]){
    case "list":
        $paginationData['pages'] = SimilarDocs::getTotalSuggestedDocsPages($_SESSION["userTK"]);
        $sdPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
        $params['page'] = $sdPaginator->getCurrentPage();

        $suggestedDocs = SimilarDocs::getSuggestedDocs( $_SESSION["userTK"], $params );
        $responseDocs["values"] = $suggestedDocs;
        $responseDocs["status"] = true;
    break;
    case "reference":
        switch($_REQUEST["type"]){
            case "mydocuments":
                $folder = $_REQUEST["folder"] ? $_REQUEST["folder"] : 0;

                $paginationData = DocsCollection::getTotalDocs($_SESSION["userTK"],$folder);
                $objPaginator = new Paginator($paginationData['pages'],
                    !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
                $params['page'] = $objPaginator->getCurrentPage();

                $collections = DocsCollection::listDocs( $_SESSION['userTK'], $folder, $params );
                $response["values"] = $collections;
                $response["status"] = true;
            break;
            case "myprofiledocuments":
                $similarDocs = false;
                $profile = $_REQUEST["profile"] ? $_REQUEST["profile"] : 0;
                $result = MyProfiles::getProfile($_SESSION["userTK"], $profile);

                if ( $result ) {
                    $paginationData['pages'] = SimilarDocs::getTotalSimilarsDocsPages($_SESSION["userTK"],$result[0]["profileID"]);
                    $objPaginator = new Paginator($paginationData['pages'],
                    !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
                    $params['page'] = $objPaginator->getCurrentPage();

                    $similarDocs = SimilarDocs::getSimilarsDocs( $_SESSION["userTK"], $result[0]["profileID"], $params );
                }

                $response["values"] = $similarDocs['similars'];
                $response["status"] = true;
            break;
            case "orcidworks":
                $paginationData['pages'] = SimilarDocs::getTotalOrcidWorksPages($_SESSION["userTK"]);
                $objPaginator = new Paginator($paginationData['pages'],
                    !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
                $params['page'] = $objPaginator->getCurrentPage();

                $orcidWorks = SimilarDocs::getOrcidWorks( $_SESSION["userTK"], $params );
                $response["values"] = $orcidWorks;
                $response["status"] = true;
            break;
        }
    break;
    case "suggestions":
        $suggestions = false;

        if ( $_REQUEST['suggestions'] ) {
            if ( $_REQUEST['prefix'] )
                $suggestions = SimilarDocs::addSuggestedDocs($_SESSION["userTK"],$_REQUEST['suggestions'],$_REQUEST['prefix']);
            else
                $suggestions = SimilarDocs::addSuggestedDocs($_SESSION["userTK"],$_REQUEST['suggestions']);
        }

        if ( $suggestions )
            die('default');
        else
            die('error');
    break;
    case "related":
        $related = SimilarDocs::getRelatedDocs($_SESSION["userTK"],$_REQUEST['sentence']);
        die(json_encode($related));
    break;
    case "public":
        $public_related = SimilarDocs::getPublicRelatedDocs($_REQUEST['sentence']);
        
        if ( $public_related ) {
            die(json_encode($public_related));
        } else {
            die("default");
        }
    break;
    default:
        die("default");
    break;
}
?>
