<?php

include_once("config.php");

$loginURL = $helper->getLoginUrl($redirectURL, $permissions);

header("location:$loginURL");

?>