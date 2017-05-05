<?php

include_once("config.php");

if ( array_key_exists('origin', $_REQUEST) || array_key_exists('iahx', $_REQUEST) )
    $redirectURL .= "?".http_build_query($_REQUEST);

$loginURL = $helper->getLoginUrl($redirectURL, $permissions);

header("location:$loginURL");

?>