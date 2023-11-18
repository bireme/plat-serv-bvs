<?php

include_once("config.php");

if ( array_key_exists('origin', $_REQUEST) || array_key_exists('iahx', $_REQUEST) ) {
    $params = array_filter($_REQUEST);
    $redirectURL .= "?".http_build_query($params);
}

$loginURL = $helper->getLoginUrl($redirectURL, $permissions);

header("location:$loginURL");

?>