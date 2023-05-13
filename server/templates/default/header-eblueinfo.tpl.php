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
  </head>
  <body>
    <header id="brand">
      <a href="<?php echo $callerURL; ?>"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-eblueinfo.png" alt="" class="responsive-img"></a>
    </header>