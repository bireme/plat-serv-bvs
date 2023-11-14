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
    <!-- Feedback Style -->
    <link href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/feedback.css" type="text/css" rel="stylesheet" />
    <!-- Placeholder Style -->
    <link href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/placeholder.css" type="text/css" rel="stylesheet" />

    <?php if ( strpos($_SERVER['HTTP_USER_AGENT'], 'gonative') !== false ) : ?>
    <!-- App Style -->
    <link href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/app.css" type="text/css" rel="stylesheet" />
    <?php endif; ?>

    <!-- Intro.js -->
    <!-- <style type="text/css">@import url('<?php echo RELATIVE_PATH; ?>/vendors/introjs/themes/introjs-royal.css') (max-width: 768px);</style> -->
    <!-- <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/introjs/intro.js"></script> -->

    <?php
        $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');

        // Profile page link
        $profile_page = SERVICES_PLATFORM_DOMAIN . "/pub/userData.php?userTK=" . urlencode($_SESSION["userTK"]) . "&c=" . $b64HttpHost;

        // Password page link
        $password_page = "";
        if ( empty($_SESSION["source"]) || ('default' == $_SESSION["source"] || 'ldap' == $_SESSION["source"]) ) {
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

    <?php if ( strpos($_SERVER['HTTP_USER_AGENT'], 'gonative') !== false ) : ?>
        <?php if ( !empty(APP_GOOGLE_ANALYTICS) ) : ?>
            <?php foreach (APP_GOOGLE_ANALYTICS as $ga_code) : ?>
                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_code; ?>"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());
                    gtag('config', '<?php echo $ga_code; ?>');
                </script>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php else : ?>
        <?php if ( !empty(GOOGLE_ANALYTICS) ) : ?>
            <?php foreach (GOOGLE_ANALYTICS as $ga_code) : ?>
                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_code; ?>"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());
                    gtag('config', '<?php echo $ga_code; ?>');
                </script>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php $body_class   = ( !$_SESSION['userTK'] ) ? 'bodyLogin' : ''; ?>
    <?php $public_class = ( $public ) ? 'public-col' : ''; ?>
    <?php $lang_class   = ( $_SESSION['lang'] ) ? 'body_'.$_SESSION['lang'] : 'body_pt'; ?>
  </head>
  <body id="body" class="<?php echo $lang_class; ?> <?php echo $body_class; ?> <?php echo $public_class; ?> <?php echo $_COOKIE['color']; ?>">