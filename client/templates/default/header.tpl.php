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
        <meta property="og:title" content="<?php echo $resultDirName; ?>" /> 
        <meta property="og:description" content="" />
        <meta property="og:image" content="<?=RELATIVE_PATH?>/images/default/logo-md-<?=$_SESSION["lang"]?>.png" />
    <?php endif; ?>

    <?php if ( 'authentication' != $_REQUEST['action'] ) : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL').' - '.$trans->getTrans($_REQUEST['action'],'FEATURE'); ?></title>
    <?php else : ?>
    <title><?php echo $trans->getTrans('authentication','MY_VHL'); ?></title>
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

    <script type="text/javascript">
        var LANG = "<?php echo $_SESSION['lang'] ? $_SESSION['lang'] : DEFAULT_LANG; ?>";
    </script>

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