<?php
/**
 * Business logout
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

$tmplang = $_SESSION['lang'];
$tmpskin = $_SESSION['skin'];
$tmpdata = $_SESSION['data'];

/* destroy session data */
session_destroy();
$_SESSION = array();
setcookie('userID','',time() -3600,'/',COOKIE_DOMAIN_SCOPE);
setcookie('userTK','',time() -3600,'/',COOKIE_DOMAIN_SCOPE);
setcookie('userData','',time() -3600,'/',COOKIE_DOMAIN_SCOPE);

session_start();
$_SESSION['lang'] = $tmplang;
$_SESSION['skin'] = $tmpskin;
$_SESSION['data'] = $tmpdata;
?>