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

    <?php if ( $public ) : ?>
    <meta property="og:title" content="<?php echo $resultUserDir['dirName']; ?>" /> 
    <meta property="og:description" content="<?php echo $trans->getTrans($_REQUEST['action'],'SHARED_COLLECTION_DESC'); ?>" />
    <meta property="og:image" content="<?=RELATIVE_PATH?>/images/default/logo-md-<?=$_SESSION["lang"]?>.png" />
    <?php endif; ?>

    <?php if ( 'authentication' == $_REQUEST['action'] ) : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL'); ?></title>
    <?php elseif ( $public ) : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL').' - '.$resultUserDir['userFirstName'].' '.$resultUserDir['userLastName'].' - '.$resultUserDir['dirName'].' ('.$trans->getTrans($_REQUEST['action'],'SHARED_COLLECTION').')'; ?></title>
    <?php else : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL').' - '.$trans->getTrans($_REQUEST['action'],'FEATURE'); ?></title>
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- Bootstrap -->
    <link href="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=RELATIVE_PATH?>/vendors/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <!-- Intro.js -->
    <link href="<?=RELATIVE_PATH?>/vendors/introjs/introjs.css" type="text/css" rel="stylesheet">
    <!--link href="<?=RELATIVE_PATH?>/vendors/introjs/themes/introjs-royal.css" type="text/css" rel="stylesheet"-->
    <!-- Datatables -->
    <link href="<?=RELATIVE_PATH?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?=RELATIVE_PATH?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Theme Login Style -->
    <link href="<?=RELATIVE_PATH?>/css/<?=$_SESSION["skin"]?>/login.css" type="text/css" rel="stylesheet" />
    <!-- Theme Layout Style -->
    <link href="<?=RELATIVE_PATH?>/css/<?=$_SESSION["skin"]?>/layout.css" type="text/css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="<?=RELATIVE_PATH?>/build/css/custom.min.css" type="text/css" rel="stylesheet">
    <!-- Theme Style -->
    <link href="<?=RELATIVE_PATH?>/css/<?=$_SESSION["skin"]?>/style.css" type="text/css" rel="stylesheet" />

    <style type="text/css">@import url('<?=RELATIVE_PATH?>/vendors/introjs/themes/introjs-royal.css') (max-width: 768px);</style>

    <!-- Intro.js -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/introjs/intro.js"></script>

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

    <?php if ( !empty(GOOGLE_ANALYTICS) ) : ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');

        __gaTracker('create', '<?php echo GOOGLE_ANALYTICS; ?>', 'auto');
        __gaTracker('send', 'pageview');
    </script>
    <?php endif; ?>

    <?php $body_class = ( !$_SESSION['userTK'] && !$public ) ? 'main_page' : ''; ?>
    <?php $lang_class = ( $_SESSION['lang'] ) ? 'body_'.$_SESSION['lang'] : 'body_pt'; ?>
  </head>
  <body id="body" class="nav-md <?php echo $lang_class; ?> <?php echo $body_class; ?>">
    <div class="container body">
      <div class="main_container">