<?php
/**
 * Parser for the query string that cames in simple URL mode.
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
$queryString = strpos($_SERVER['REQUEST_URI'],'controller');
$queryString = substr($_SERVER['REQUEST_URI'],$queryString
    ,strlen($_SERVER['REQUEST_URI']));
$queryString = explode("/",$queryString);

for ($i=0 ; $i<count($queryString) ; $i++){
    if ($i === 0){
        $_REQUEST["action"]=$queryString[$i+1];
    }else{
        if ($i % 2 === 0){
            $_REQUEST[$queryString[$i]]=$queryString[$i+1];
        }
    }
}

if ( !isset($_REQUEST["control"]) ) {
    $control = "view";
} else {
    $control = $_REQUEST["control"];
}

if ( isset($_REQUEST["task"]) || 'public' == $_REQUEST["task"] ) {
    $public = $_REQUEST["task"];
} else {
    $public = FALSE;
}
?>