<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

// Importação do autoload do composer
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/../server/classes/Tools.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
    <body>

<?php

$userTK = isset($_REQUEST['userTK'])?$_REQUEST['userTK']:false;

if ( $userTK ) {
    $log = array();
    $data = array();

    $userData = Token::unmakeUserTK($userTK);

    $log['userID'] = $userData['userID'];
    $log['date'] = date('Y-m-d H:i:s');
    $log['ip'] = isset($_REQUEST['ip'])?$_REQUEST['ip']:'';
    $log['lang'] = isset($_REQUEST['lang'])?$_REQUEST['lang']:'';
    $log['col'] = isset($_REQUEST['col'])?$_REQUEST['col']:'';
    $log['site'] = isset($_REQUEST['site'])?$_REQUEST['site']:'';
    $log['query'] = !empty($_REQUEST['query'])?$_REQUEST['query']:'*';
    $log['index'] = !empty($_REQUEST['index'])?$_REQUEST['index']:'*';
    $log['where'] = !empty($_REQUEST['where'])?$_REQUEST['where']:'*';
    $log['filter'] = !empty($_REQUEST['filter'])?$_REQUEST['filter']:'*';
    $log['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';
    $log['output'] = isset($_REQUEST['output'])?$_REQUEST['output']:'';
    $log['referer'] = isset($_REQUEST['referer'])?$_REQUEST['referer']:'';
    $log['session'] = isset($_REQUEST['session'])?$_REQUEST['session']:'';
    $log['format'] = isset($_REQUEST['format'])?$_REQUEST['format']:'';
    $log['sort'] = isset($_REQUEST['sort'])?$_REQUEST['sort']:'';

    // Conexão ao banco de dados, porta padrão 27017
    $client = new MongoDB\Client();

    // Retorna uma referência a coleção "logs" do banco "servicesplatform"
    $collection = $client->servicesplatform->logs;

    // Insere uma nova linha de log
    $result = $collection->insertOne( $log );

    // Retorna o ID do log inserido
    die($result->getInsertedId());
    
    //$result = $collection->find( array( 'userID' => $log['userID'], ) );

    // foreach ($result as $entry) {
    //     $data[] = $entry;
    // }

    //$result = $collection->deleteMany( array( 'userID' => $log['userID'], ) );

    //echo "<pre>"; print_r($data); echo "</pre>"; die();
}

if ( isset( $_GET['debug'] ) && 'true' == $_GET['debug'] ) {
    $data = array();
    $client = new MongoDB\Client();
    $collection = $client->servicesplatform->logs;
    $result = $collection->find();

    foreach ($result as $entry) {
        //$data[] = $entry;
        echo "<pre>";
        foreach ($entry as $key => $value) {
            echo $key . ': ' . $value . PHP_EOL;
        }
        echo "</pre>" . PHP_EOL;
    }

    //echo "<pre>"; print_r($data); echo "</pre>";
    
    //$result = $collection->drop();
}

?>

    </body>
</html>