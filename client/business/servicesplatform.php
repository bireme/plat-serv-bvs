<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}

$userTK = isset($_REQUEST['userTK'])?$_REQUEST['userTK']:false;

if($userTK){

    switch($_REQUEST["task"]){
        case "addDoc":
            $url = htmlspecialchars($_REQUEST['url']);
            $source = htmlspecialchars($_REQUEST['source']);
            $author = htmlspecialchars($_REQUEST['author']);
            $title = htmlspecialchars($_REQUEST['title']);

$xmlDoc=<<<XML
<?xml version='1.0'?>
<docs>
    <doc>
        <field name="doc_id">{$_REQUEST['id']}</field>
        <field name="doc_url">{$url}</field>
        <field name="src_id">{$source}</field>
        <field name="au">{$author}</field>
        <field name="title">{$title}</field>
    </doc>
</docs>
XML;

            $retValue = DocsCollection::addDoc($userTK,$xmlDoc);
            
            die($retValue);
        break;
        default:
            die("default");
        break;
    }

} else {
    die("default");
}

?>
