<!DOCTYPE html>
<html>
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
    <meta charset="<?=CHARSET?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="robots" content="all" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="generator" content="MyVHL <?=VERSION?>" />

    <?php if ( $public ) : ?>
    <meta property="og:title" content="<?php echo $resultUserDir['dirName']; ?>" /> 
    <meta property="og:description" content="<?php echo $trans->getTrans($_REQUEST['action'],'SHARED_COLLECTION_DESC'); ?>" />
    <meta property="og:image" content="<?php echo RELATIVE_PATH; ?>/images/default/logo-md-<?=$_SESSION["lang"]?>.png" />
    <?php endif; ?>

    <?php if ( 'authentication' == $_REQUEST['action'] ) : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL'); ?></title>
    <?php elseif ( $public ) : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL').' - '.$resultUserDir['userFirstName'].' '.$resultUserDir['userLastName'].' - '.$resultUserDir['dirName'].' ('.$trans->getTrans($_REQUEST['action'],'SHARED_COLLECTION').')'; ?></title>
    <?php else : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL').' - '.$trans->getTrans($_REQUEST['action'],'FEATURE'); ?></title>
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/favicon.png" sizes="192x192">
    <!-- Materialize -->
    <link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/materialize.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <!-- <link href="<?php echo RELATIVE_PATH; ?>/vendors/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"> -->
    <!-- Intro.js -->
    <link href="<?php echo RELATIVE_PATH; ?>/vendors/introjs/introjs.css" type="text/css" rel="stylesheet">
    <!--link href="<?php echo RELATIVE_PATH; ?>/vendors/introjs/themes/introjs-royal.css" type="text/css" rel="stylesheet"-->
    <!-- Datatables -->
    <link href="<?php echo RELATIVE_PATH; ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo RELATIVE_PATH; ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Slick Style -->
    <link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/slick.css">
    <!-- Slick Theme Style -->
    <link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/slick-theme.css">
    <!-- Theme Style -->
    <link href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/style.css" type="text/css" rel="stylesheet" />

    <?php if ( strpos($_SERVER['HTTP_USER_AGENT'], 'gonative') !== false ) : ?>
    <!-- App Style -->
    <link href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/app.css" type="text/css" rel="stylesheet" />
    <?php endif; ?>

    <style type="text/css">@import url('<?php echo RELATIVE_PATH; ?>/vendors/introjs/themes/introjs-royal.css') (max-width: 768px);</style>

    <!-- Intro.js -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/introjs/intro.js"></script>

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

    <?php
        if ( $send_cookie ) {
            if ( 'logout' === $send_cookie ) {
                UserData::sendCookie(); // remove cookie from .bvs.br
            } else {
                UserData::sendCookie($_SESSION["userTK"]); // send cookie to .bvs.br
                
                echo '<script language="javascript">';
                echo 'window.parent.location = window.parent.location.pathname;';
                echo '</script>';
                exit;
            }
        }
    ?>

    <?php if ( ! empty(GOOGLE_ANALYTICS) || ! empty(APP_GOOGLE_ANALYTICS) ) : ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');

        if (navigator.userAgent.indexOf('gonative') > -1) {
            __gaTracker('create', '<?php echo APP_GOOGLE_ANALYTICS; ?>', 'auto');
            __gaTracker('send', 'pageview');
        } else {
            __gaTracker('create', '<?php echo GOOGLE_ANALYTICS; ?>', 'auto');
            __gaTracker('send', 'pageview');
        }
    </script>
    <?php endif; ?>

    <?php $body_class = ( !$_SESSION['userTK'] && !$public ) ? 'bodyLogin' : ''; ?>
    <?php $lang_class = ( $_SESSION['lang'] ) ? 'body_'.$_SESSION['lang'] : 'body_pt'; ?>
  </head>
  <body id="body" class="<?php echo $lang_class; ?> <?php echo $body_class; ?> <?php echo $_COOKIE['color']; ?>">