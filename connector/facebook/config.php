<?php

session_start();

include_once("src/autoload.php"); // include Facebook SDK

$appID = '169213043519222'; // Facebook App ID
$appSecret = '4f49bf713eb773dedf99df355fb79626'; // Facebook App Secret
$redirectURL = 'http://platserv2.teste.bvsalud.org/connector/facebook/callback.php'; // return url (url to script)
$homeURL = 'http://platserv2.teste.bvsalud.org/client/controller/authentication/'; // return to home
$permissions = ['email', 'public_profile', 'user_friends']; // Optional permissions

$fb = new Facebook\Facebook([
    'app_id' => $appID,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

?>
