<?php
/**
 * Business Authentication
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
require_once(dirname(__FILE__)."/../classes/Authentication.php");

if ($_SESSION["userTK"] === null){    
    $response = Authentication::createNewPassword($_REQUEST["userID"]);
}
?>