<?php
include_once("config.php");
include_once(dirname(__FILE__)."/../../lib/libLog/Log.php");
include_once(dirname(__FILE__)."/../../classes/Tools.php");
include_once(dirname(__FILE__)."/../../classes/Authentication.php");

//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));

    if ( $_REQUEST['error'] && $_REQUEST['error'] == 'access_denied' ) {
        header("location:".$homeurl."?".http_build_query($_REQUEST));
        exit;
    } else {
        header("location:$loginUrl");
        exit;
    }
}else{
	$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
    $userProfile['social_media'] = 'facebook';

    $result = Authentication::loginUser($userProfile['email'],$userProfile['id'], $userProfile);
    if (($result["status"] !== false) and ($result !== false)){
        $_SESSION['fb_data'] = $userProfile; // Storing Facebook User Data in Session
        $_SESSION["userTK"] = $result["userTK"];
        $_SESSION["userFirstName"] = $result["userFirstName"];
        $_SESSION["userLastName"] = $result["userLastName"];
        $_SESSION["userMail"] = $result["userMail"];
        //$response["status"] = true;
        //$response["values"] = $result;
        setcookie("userTK", $result["userTK"], 0, '/');
    }

    header("location:$homeurl");
    exit;
}
?>