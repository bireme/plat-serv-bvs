<?php

include_once("config.php");
include_once($_SERVER['DOCUMENT_ROOT']."/client/lib/libLog/Log.php");
include_once($_SERVER['DOCUMENT_ROOT']."/client/classes/Tools.php");
include_once($_SERVER['DOCUMENT_ROOT']."/client/classes/Authentication.php");

try {
    $accessToken = $helper->getAccessToken();
} catch(FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
    // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();

    if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (FacebookSDKException $e) {
            echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
            exit;
        }
    }

    // Sets the default fallback access token so we don't have to pass it to each request
    $fb->setDefaultAccessToken($accessToken);

    try {
        $response = $fb->get('/me?fields=id,first_name,last_name,email,gender,locale,picture');
        $userNode = $response->getGraphUser();
        $userData = $response->getDecodedBody();
        $userData['social_media'] = 'facebook';
    } catch(FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if (isset($userData)) {
        $result = Authentication::loginUser($userData['email'], $userData['id'], $userData);

        if (($result["status"] !== false) and ($result !== false)){
            $iahx = ( $_REQUEST['iahx'] ) ? $_REQUEST['iahx'] : base64_encode('portal');

            // $_SESSION['fb_access_token'] = (string) $accessToken;
            $_SESSION['fb_data'] = $userData; // Storing Facebook User Data in Session
            $_SESSION["sysUID"] = $result["sysUID"];
            $_SESSION["userTK"] = $result["userTK"];
            $_SESSION["userID"] = $result["userID"];
            $_SESSION["userFirstName"] = $result["userFirstName"];
            $_SESSION["userLastName"] = $result["userLastName"];
            $_SESSION["userMail"] = $result["userMail"];
            $_SESSION["source"] = $result["source"];
            $_SESSION["visited"] = $result["visited"];
            $_SESSION["iahx"] = base64_decode($iahx);

            $cookie = UserData::getData($result["userTK"]);
            setcookie("userData", $cookie, 0, '/', COOKIE_DOMAIN_SCOPE);
            setcookie("userTK", $result["userTK"], 0, '/', COOKIE_DOMAIN_SCOPE);
            setcookie("userID", $result["sysUID"], 0, '/', COOKIE_DOMAIN_SCOPE);
        }
    }

    if ( isset($_REQUEST['origin']) && !empty($_REQUEST['origin']) ) {
        $origin = 'origin/'.$_REQUEST['origin'];
        $homeURL .= $origin;

        echo '<script language="javascript">';
        echo 'window.open("'.$homeURL.'","_parent")';
        echo '</script>';
        exit;
    }

    echo '<script language="javascript">';
    echo 'window.open("'.$homeURL.'","_parent")';
    echo '</script>';
    exit;
} else {
    if ($helper->getError() || $helper->getErrorCode()) {
        if ( isset($_REQUEST['origin']) && !empty($_REQUEST['origin']) ) {
            $origin = 'origin/'.$_REQUEST['origin'].'/';
            $homeURL .= $origin;
        }

        header("location:".$homeURL."?".http_build_query($_REQUEST));
        exit;
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
        exit;
    }
}

?>
