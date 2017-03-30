<?php
include_once("config.php");
include_once($_SERVER['DOCUMENT_ROOT']."/client/lib/libLog/Log.php");
include_once($_SERVER['DOCUMENT_ROOT']."/client/classes/Tools.php");
include_once($_SERVER['DOCUMENT_ROOT']."/client/classes/Authentication.php");

if ( $_REQUEST['error'] && $_REQUEST['error'] == 'access_denied' ) {
    header("location:".$homeURL."?".http_build_query($_REQUEST));
    exit;
}

if(isset($_REQUEST['code'])){
	$gClient->authenticate($_REQUEST['code']);
	$_SESSION['google_access_token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
	exit;
}

if (isset($_SESSION['google_access_token'])) {
	$gClient->setAccessToken($_SESSION['google_access_token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	$userProfile['social_media'] = 'google';

	$result = Authentication::loginUser($userProfile['email'],$userProfile['id'], $userProfile);
    if (($result["status"] !== false) and ($result !== false)){
    	$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
        $_SESSION["userTK"] = $result["userTK"];
        $_SESSION["userFirstName"] = $result["userFirstName"];
        $_SESSION["userLastName"] = $result["userLastName"];
        $_SESSION["userMail"] = $result["userMail"];
        //$response["status"] = true;
        //$response["values"] = $result;
        setcookie("userTK", $result["userTK"], 0, '/');
    }

	header("location:$homeURL");
	exit;
} else {
	$authURL = $gClient->createAuthUrl();
	header("location:$authURL");
	exit;
}
?>