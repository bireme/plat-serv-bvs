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
require_once(dirname(__FILE__)."/../classes/MyLinks.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}

$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

switch($_REQUEST["task"]){
    case "list":
        //$paginationData = MyLinks::getTotalItens($_SESSION["userTK");
        $paginationData['pages'] = MyLinks::getTotalPages($_SESSION["userTK"]);

        $objPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);

        $params['page'] = $objPaginator->getCurrentPage();
        $result = MyLinks::getLinkList($_SESSION["userTK"],$params);
        $response["values"] = $result;

        $response["status"] = true;        
    break;
    case "add":
        $inHome = ($_REQUEST["linkInHome"]=="on")?"1":"0";
        $xml  = '<docs>';
        $xml .= '    <doc>';
        $xml .= '        <field name="link_url">'.htmlspecialchars($_REQUEST["linkUrl"]).'</field>';
        $xml .= '        <field name="link_description">'.htmlspecialchars($_REQUEST["linkDescription"]).'</field>';
        $xml .= '        <field name="link_name">'.htmlspecialchars($_REQUEST["linkName"]).'</field>';
        $xml .= '        <field name="link_rate">0</field>';
        $xml .= '        <field name="link_in_home">'.$inHome.'</field>';
        $xml .= '     </doc>';
        $xml .= '</docs>';
        $result = MyLinks::addLink($_SESSION["userTK"],$xml);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "edit":
        $response["status"] = null;
        if ($_REQUEST["persist"] == true){
            $inHome = ($_REQUEST["linkInHome"]=="on")?"1":"0";
            $xml  = '<docs>';
            $xml .= '    <doc>';
            $xml .= '        <field name="link_url">'.htmlspecialchars($_REQUEST["linkUrl"]).'</field>';
            $xml .= '        <field name="link_description">'.htmlspecialchars($_REQUEST["linkDescription"]).'</field>';
            $xml .= '        <field name="link_name">'.htmlspecialchars($_REQUEST["linkName"]).'</field>';
            $xml .= '        <field name="link_rate">0</field>';
            $xml .= '        <field name="link_in_home">'.$inHome.'</field>';
            $xml .= '     </doc>';
            $xml .= '</docs>';
            $result = MyLinks::updateLink($_SESSION["userTK"],$_REQUEST["link"],$xml);
            $response["status"] = true;
        }else{
            $result = MyLinks::getLink($_SESSION["userTK"],$_REQUEST["link"]);
        }
        $response["values"] = $result[0];
    break;
    case "delete":
        $result = MyLinks::removeLink($_SESSION["userTK"],$_REQUEST["link"]);
        $result = MyLinks::getLinkList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "inhome":
        $result = MyLinks::addInHome($_SESSION["userTK"],$_REQUEST["link"]);
        $result = MyLinks::getLinkList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "notinhome":
        $result = MyLinks::deleteFromHome($_SESSION["userTK"],$_REQUEST["link"]);
        $result = MyLinks::getLinkList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "rate":
        $result = MyLinks::updateLinkRate($_SESSION["userTK"],$_REQUEST["link"],$_REQUEST["grade"]);
        $result = MyLinks::getLinkList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
