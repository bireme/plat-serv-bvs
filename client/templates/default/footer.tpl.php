    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Materialize -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/materialize.min.js"></script>
    <!-- Slick -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/slick.js"></script>
    <!-- Custom Theme Scripts -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/build/js/custom.js"></script>
    <!-- Translations Scripts -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/texts.js"></script>
    <!-- Theme Scripts -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/functions.js"></script>
    <!-- Main Scripts -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/scripts.js"></script>
    <!-- Cookie Scripts -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/cookie.js"></script>
    <!-- Main Scripts -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/js/main.js"></script>
    <!-- jQuery Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <?php $actions = array( 'menu', 'mydocuments', 'mysearches' ); ?>
    <?php if ( $_SESSION['userTK'] && in_array($_REQUEST['action'], $actions) ) : ?>
    <script type="text/javascript">
        var start;
        var end;
        var time;
        var seconds;
        $(window).on('focus', function(e) {
            if ( start ) {
                // later record end time
                end = new Date().getTime();
                // time difference in ms
                time = end - start;
                // strip the ms
                time /= 1000;
                // get seconds (Original had 'round' which incorrectly counts 0:28, 0:29, 1:30 ... 1:59, 1:0)
                seconds = Math.round(time % 60);
/*
                // remove seconds from the date
                time = Math.floor(time / 60);
                // get minutes
                var minutes = Math.round(time % 60);
                // remove minutes from the date
                time = Math.floor(time / 60);
                // get hours
                var hours = Math.round(time % 24);
                // remove hours from the date
                time = Math.floor(time / 24);
                // the rest of time is number of days
                var days = time ;
*/
                if ( seconds >= 10 ) {
                    window.location.reload();
                }
            }
        }).blur(function(e) {
            // record start time
            start = new Date().getTime();
        });
    </script>
    <?php endif; ?>
    
    <?php if ( $_SESSION['userTK'] ) : ?>
    <script type="text/javascript" src="/app/js/<?php echo $_SESSION['lang']; ?>/menu.<?php echo $_SESSION['lang']; ?>.js"></script>
    <?php else : ?>
    <script type="text/javascript" src="/app/js/<?php echo $_SESSION['lang']; ?>/main.menu.<?php echo $_SESSION['lang']; ?>.js"></script>
    <?php endif; ?>
  </body>
</html>