<!DOCTYPE html>
<html>
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
    <meta charset="<?php echo CHARSET; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="pragma" content="no-cache" />  
    <meta name="robots" content="all" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="generator" content="BVSServices <?php echo VERSION; ?>" />

    <title><?php echo MY_VHL.' - '.$DocTitle; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/favicon.png" sizes="192x192">
    <!-- Materialize -->
    <link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/materialize.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap+Condensed&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <!-- <link href="<?php echo RELATIVE_PATH; ?>/vendors/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"> -->
    <!-- Theme Style -->
    <link href="<?php echo RELATIVE_PATH; ?>/css/<?php echo $_SESSION["skin"]; ?>/style-eblueinfo.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript">
        var LANG = "<?php echo $_SESSION['lang'] ? $_SESSION['lang'] : DEFAULT_LANG; ?>";
    </script>

    <?php if ( !empty(GOOGLE_ANALYTICS) ) : ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');

        if (navigator.userAgent.indexOf('gonative') > -1) {
            __gaTracker('create', '<?php echo APP_GOOGLE_ANALYTICS; ?>', 'auto');
            __gaTracker('send', 'pageview');
            __gaTracker('set', 'userId', '<?php echo $_SESSION["sysUID"]; ?>'); // Set the user ID using signed-in user_id.
        } else {
            __gaTracker('create', '<?php echo GOOGLE_ANALYTICS; ?>', 'auto');
            __gaTracker('send', 'pageview');
            __gaTracker('set', 'userId', '<?php echo $_SESSION["sysUID"]; ?>'); // Set the user ID using signed-in user_id.
        }
    </script>
    <?php endif; ?>
  </head>
  <body>
    <header id="brand">
      <a href="https://sites.teste.bvsalud.org/e-blueinfo/"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-eblueinfo.png" alt="" class="responsive-img"></a>
    </header>