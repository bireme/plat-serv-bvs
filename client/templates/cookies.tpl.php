<?php
    $userData = '';

    if ( isset($_SESSION["userTK"]) && !empty($_SESSION["userTK"]) ) {
        unset($userData);
        $userData = array();
        $userData['firstName'] = $_SESSION["userFirstName"];
        $userData['lastName'] = $_SESSION["userLastName"];
        $userData['email'] = $_SESSION["userMail"];
        $userData['source'] = $_SESSION["source"];

        // Facebook data
        if ( isset($_SESSION["fb_data"]) && !empty($_SESSION["fb_data"]) )
            $userData['fb_data'] = $_SESSION["fb_data"];

        // Google data
        if ( isset($_SESSION["google_data"]) && !empty($_SESSION["google_data"]) )
            $userData['google_data'] = $_SESSION["google_data"];

        $userData = base64_encode(json_encode($userData));
    }
?>

<!-- setting cookies to other domains -->
<img src="<?php echo BVS_COOKIE_DOMAIN; ?>/cookies.php?userData=<?php echo $userData; ?>" style="display: none;" />
<!-- setting cookies to others domains ends -->
