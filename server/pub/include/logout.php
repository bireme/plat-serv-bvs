<?php
/**
 * Business logout
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
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
setcookie('userTK','',time() -3600,'/',COOKIE_DOMAIN_SCOPE);
$send_cookie = 'logout'; // remove cookie from .bvs.br

session_start();
$_SESSION['lang'] = $tmplang;
$_SESSION['skin'] = $tmpskin;
$_SESSION['data'] = $tmpdata;
?>