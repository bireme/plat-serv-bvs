<?php
/**
 * Business my news handle
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
require_once(dirname(__FILE__)."/../classes/MyNews.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

switch($_REQUEST["task"]){
    case "list":
        //$paginationData = MyLinks::getTotalItens($_SESSION["userTK");
        $paginationData['pages'] = MyNews::getTotalPages($_SESSION["userTK"]);

        $objPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);

        $params['page'] = $objPaginator->getCurrentPage();
        $result = MyNews::getNewsList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;        
    break;
    case "add":
        $inHome = ($_REQUEST["newsInHome"]=="on")?"1":"0";
        $xml  = '<docs>';
        $xml .= '    <doc>';
        $xml .= '        <field name="news_description">'.htmlspecialchars($_REQUEST["newsDescription"]).'</field>';
        $xml .= '        <field name="news_in_home">'.$inHome.'</field>';
        $xml .= '        <field name="news_name">'.htmlspecialchars($_REQUEST["newsName"]).'</field>';
        $xml .= '        <field name="news_rate">0</field>';
        $xml .= '        <field name="news_url">'.htmlspecialchars($_REQUEST["newsUrl"]).'</field>';
        $xml .= '     </doc>';
        $xml .= '</docs>';
        $result = MyNews::addNews($_SESSION["userTK"],$xml);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "edit":
        $response["status"] = null;
        if ($_REQUEST["persist"] == true){
            $inHome = ($_REQUEST["newsInHome"]=="on")?"1":"0";
            $xml  = '<docs>';
            $xml .= '    <doc>';
            $xml .= '        <field name="news_url">'.htmlspecialchars($_REQUEST["newsUrl"]).'</field>';
            $xml .= '        <field name="news_description">'.htmlspecialchars($_REQUEST["newsDescription"]).'</field>';
            $xml .= '        <field name="news_name">'.htmlspecialchars($_REQUEST["newsName"]).'</field>';
            $xml .= '        <field name="news_rate">0</field>';
            $xml .= '        <field name="news_in_home">'.$inHome.'</field>';
            $xml .= '     </doc>';
            $xml .= '</docs>';
            $result = MyNews::updateNews($_SESSION["userTK"],$_REQUEST["news"],$xml);
            $response["status"] = true;
        }else{
            $result = MyNews::getNews($_SESSION["userTK"],$_REQUEST["news"]);
        }
        $response["values"] = $result[0];
    break;
    case "delete":
        $result = MyNews::removeNews($_SESSION["userTK"],$_REQUEST["news"]);
        $result = MyNews::getNewsList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "inhome":
        $result = MyNews::addInHome($_SESSION["userTK"],$_REQUEST["news"]);
        $result = MyNews::getNewsList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "notinhome":
        $result = MyNews::deleteFromHome($_SESSION["userTK"],$_REQUEST["news"]);
        $result = MyNews::getNewsList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "rate":
        $result = MyNews::updateNewsRate($_SESSION["userTK"],$_REQUEST["news"],$_REQUEST["grade"]);
        $result = MyNews::getNewsList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
