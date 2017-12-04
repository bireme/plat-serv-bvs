<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

// Importação do autoload do composer
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/../server/classes/Tools.php';

$userTK = isset($_REQUEST['userTK'])?$_REQUEST['userTK']:false;

if ( $userTK ) {
    $log = array();
    $data = array();

    $tz_variation = date('Z') * 1000;
    $timestamp = new MongoDB\BSON\UTCDateTime(intval(microtime(true) * 1000 + $tz_variation));

    $userData = Token::unmakeUserTK($userTK, true);
/*
    $tz = new DateTimeZone('America/Sao_Paulo'); // Change Timezone
    //$date = date("Y-m-d h:i:sa"); // Current Date
    //$utcdatetime = new MongoDB\BSON\UTCDateTime(strtotime($date)*1000);
    $utcdatetime = new MongoDB\BSON\UTCDateTime(intval(microtime(true)*1000));
    $datetime = $utcdatetime->toDateTime();
    $datetime->setTimezone($tz); // Set Timezone
    $timestamp = $datetime->format(DATE_ATOM); // (example: 2005-08-15T15:52:01+00:00)
*/
    $log['userID'] = $userData['userID'];
    $log['date'] = date('Y-m-d H:i:s');
    $log['timestamp'] = $timestamp;
    $log['ip'] = isset($_REQUEST['ip'])?$_REQUEST['ip']:'';
    $log['lang'] = isset($_REQUEST['lang'])?$_REQUEST['lang']:'';
    $log['site'] = isset($_REQUEST['site'])?$_REQUEST['site']:'';
    $log['query'] = !empty($_REQUEST['query'])?$_REQUEST['query']:'*';
    $log['index'] = !empty($_REQUEST['index'])?$_REQUEST['index']:'*';
    $log['where'] = !empty($_REQUEST['where'])?$_REQUEST['where']:'*';
    $log['filter'] = !empty($_REQUEST['filter'])?$_REQUEST['filter']:'';
    $log['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';
    $log['output'] = isset($_REQUEST['output'])?$_REQUEST['output']:'';
    $log['referer'] = isset($_REQUEST['referer'])?$_REQUEST['referer']:'';
    $log['session'] = isset($_REQUEST['session'])?$_REQUEST['session']:'';
    $log['format'] = isset($_REQUEST['format'])?$_REQUEST['format']:'';
    $log['sort'] = isset($_REQUEST['sort'])?$_REQUEST['sort']:'';
    $log['pub'] = 1;

    // Conexão ao banco de dados, porta padrão 27017
    $client = new MongoDB\Client(MONGODB_SERVER);

    // Retorna uma referência a coleção "logs" do banco "servicesplatform"
    $collection = $client->servicesplatform->logs;

    // Insere uma nova linha de log
    $result = $collection->insertOne( $log );

    // Retorna o ID do log inserido
    die($result->getInsertedId());
}

?>