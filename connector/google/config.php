<?php

session_start();

include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");

/**
 * Google Project API Credentials
**/
$clientID = '1068105932022-0c09juckvbqn1vrefnlotue344luhpqg.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'BlOH2s_54N5KTlf1vWTpUk_o'; //Google CLIENT SECRET
$redirectURL = 'http://platserv2.teste.bvsalud.org/connector/google/';  //return url (url to script)
$homeURL = 'http://platserv2.teste.bvsalud.org/client/controller/authentication/';  //return to home

/**
 * Google Client Configuration
**/
$gClient = new Google_Client();
$gClient->setApplicationName('BIREME - Services Platform');
$gClient->setClientId($clientID);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$scopes = array(
    //"https://www.googleapis.com/auth/plus.me",
    "https://www.googleapis.com/auth/plus.login",
    "https://www.googleapis.com/auth/userinfo.email",
    "https://www.googleapis.com/auth/userinfo.profile",
);

$gClient->setScopes($scopes);

$google_oauthV2 = new Google_Oauth2Service($gClient);

?>
