<?php
/**
 * Central include file
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

/* 
 * This File is included in the  beginning of the display and request php.
 * Do not put code in this file.
 * Put only required files that are necessary to be included in the beginning of the display and request php.
 */
require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/errorLevel.php");
require_once(dirname(__FILE__)."/queryStringParser.php");
//All Codes that use $_REQUEST values need to be below the "queryStringParser.php"
require_once(dirname(__FILE__)."/../lib/libLog/Log.php");
require_once(dirname(__FILE__)."/sessionHandler.php");
require_once(dirname(__FILE__)."/functions.php");
require_once(dirname(__FILE__)."/translationsStart.php");
require_once(dirname(__FILE__)."/../classes/Tools.php");
?>
