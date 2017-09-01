<?php
/**
 * Session handle file
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
session_start();

if ( preg_match(REGEXP_SKIN, $_REQUEST["skin"]) ){
    $_SESSION["skin"] = $_REQUEST["skin"];
}
if ( preg_match(REGEXP_LANGUAGE, $_REQUEST["lang"]) ){
    $_SESSION["lang"] = $_REQUEST["lang"];
}

if ( !isset($_SESSION["lang"]) || empty($_SESSION["lang"]) ){
    $_SESSION["lang"] = DEFAULT_LANG;
}
if ( !isset($_SESSION["skin"]) || empty($_SESSION["skin"]) ){
    $_SESSION["skin"] = DEFAULT_SKIN;
}

if ( isset($_REQUEST['data']) && !empty($_REQUEST['data']) )
    $_SESSION['data'] = json_decode(urldecode($_REQUEST['data']));
?>