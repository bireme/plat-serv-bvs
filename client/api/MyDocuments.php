<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");

parse_str(ltrim($_REQUEST['favorites'], '?'));

if ( $userID && !filter_var($userID, FILTER_VALIDATE_EMAIL) ) {
    $params["widget"] = true;
    $params["count"]  = -1;

    $docs = DocsCollection::listPublicDocs( base64_encode($userID), null, $params );

    if ( count($docs) ) {
        if ( $source && 'e-blueinfo' == $source ) {
            $docs = array_filter($docs, function($doc) {
                return strpos($doc['srcID'], 'e-blueinfo') !== false; }
            );
        }

        $func = function($value) {
            unset($value['sysUID']);
            return $value;
        };
        
        $docs = array_map($func, $docs);
        $result = array('total' => count($docs));
        $result['docs'] = $docs;

        // set response code - 200 OK
        http_response_code(200);
        die(json_encode($result));
    } else {
        // set response code - 404 Not found
        http_response_code(404);      
        die(json_encode(array("message" => "no documents found")));
    }
} else {
    die(json_encode(array("message" => "invalid parameters")));
}

?>
