<?php

include_once("config.php");

if ( isset($_REQUEST['origin']) && !empty($_REQUEST['origin']) )
    $redirectURL .= '?origin='.$_REQUEST['origin'];

$loginURL = $helper->getLoginUrl($redirectURL, $permissions);

header("location:$loginURL");

?>