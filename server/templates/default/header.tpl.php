<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
    <meta charset="<?=CHARSET?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="pragma" content="no-cache" />  
    <meta name="robots" content="all" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="generator" content="BVSServices <?=VERSION?>" />

    <title><?php echo MY_VHL.' - '.$DocTitle; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- Bootstrap -->
    <link href="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=RELATIVE_PATH?>/vendors/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=RELATIVE_PATH?>/vendors/iCheck/skins/flat/green.css" type="text/css" rel="stylesheet">
    <!-- Theme Login Style -->
    <link href="<?=RELATIVE_PATH?>/css/<?=$_SESSION["skin"]?>/login.css" type="text/css" rel="stylesheet" />
    <!-- Theme Layout Style -->
    <link href="<?=RELATIVE_PATH?>/css/<?=$_SESSION["skin"]?>/layout.css" type="text/css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="<?=RELATIVE_PATH?>/build/css/custom.min.css" type="text/css" rel="stylesheet">
    <!-- Theme Style -->
    <link href="<?=RELATIVE_PATH?>/css/<?=$_SESSION["skin"]?>/style.css" type="text/css" rel="stylesheet" />

    <?php
        $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');

        // Profile page link
        $profile_page = SERVICES_PLATFORM_DOMAIN . "/pub/userData.php?userTK=" . urlencode($_SESSION["userTK"]) . "&c=" . $b64HttpHost;

        // Password page link
        $password_page = "";
        if ( empty($_SESSION["source"]) || 'ldap' == $_SESSION["source"] ) {
            $password_page = SERVICES_PLATFORM_DOMAIN . "/pub/changePassword.php?userTK=" . urlencode($_SESSION["userTK"]) . "&c=" . $b64HttpHost;
        }

        // My VHL tour link
        if ( 'menu' == $_REQUEST["action"] ) {
            $tour = RELATIVE_PATH . "/controller/authentication/?tour=true";
        } else {
            $tour = RELATIVE_PATH . "/controller/" . $_REQUEST['action'] . "/control/business/?multipage=true";
        }
    ?>

    <script type="text/javascript">
        var MY_VHL_DOMAIN = window.location.protocol + '//' + window.location.hostname;
        var LANG = "<?php echo $_SESSION['lang'] ? $_SESSION['lang'] : DEFAULT_LANG; ?>";
        var TOUR = MY_VHL_DOMAIN + "<?php echo $tour; ?>";
        var PROFILE_PAGE = "<?php echo $profile_page; ?>";
        var PASSWORD_PAGE = "<?php echo $password_page; ?>";
    </script>

    <?php if ( !empty(GOOGLE_ANALYTICS) ) : ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');

        __gaTracker('create', '<?php echo GOOGLE_ANALYTICS; ?>', 'auto');
        __gaTracker('send','pageview');
    </script>
    <?php endif; ?>

    <?php $lang_class = ( $_SESSION['lang'] ) ? 'body_'.$_SESSION['lang'] : 'body_pt'; ?>
  </head>
  <body class="nav-md <?php echo $lang_class; ?>">
    <div class="container body">
      <div class="main_container">