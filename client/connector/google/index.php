<?php
include_once("config.php");
include_once(dirname(__FILE__)."/../../lib/libLog/Log.php");
include_once(dirname(__FILE__)."/../../classes/Tools.php");
include_once(dirname(__FILE__)."/../../classes/Authentication.php");

if ( $_REQUEST['error'] && $_REQUEST['error'] == 'access_denied' ) {
    header("location:".$homeUrl."?".http_build_query($_REQUEST));
    exit;
}

if(isset($_REQUEST['code'])){
	$gClient->authenticate();
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
	exit;
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	$userProfile['social_media'] = 'google';

	$result = Authentication::loginUser($userProfile['email'],$userProfile['id'], $userProfile);
    if (($result["status"] !== false) and ($result !== false)){
    	$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
		$_SESSION['token'] = $gClient->getAccessToken();
        $_SESSION["userTK"] = $result["userTK"];
        $_SESSION["userFirstName"] = $result["userFirstName"];
        $_SESSION["userLastName"] = $result["userLastName"];
        $_SESSION["userMail"] = $result["userMail"];
        //$response["status"] = true;
        //$response["values"] = $result;
        setcookie("userTK", $result["userTK"], 0, '/');
    }

	header("location:$homeUrl");
	exit;
} else {
	$authUrl = $gClient->createAuthUrl();
	header("location:$authUrl");
	exit;
}
?>