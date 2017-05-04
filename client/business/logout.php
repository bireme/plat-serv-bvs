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
/* destroy session data */
session_destroy();
$_SESSION = array();
setcookie('userTK','',time() -3600,'/',COOKIE_DOMAIN_SCOPE);
UserData::sendCookie();
?>