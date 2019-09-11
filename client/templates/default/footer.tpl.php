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
    <!-- Datatables -->
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?php echo RELATIVE_PATH; ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
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

    <?php $actions = array( 'menu', 'mydocuments', 'mysearches' ); ?>
    
    <?php if ( $_SESSION['userTK'] ) : ?>
    <script type="text/javascript" src="/app/js/<?php echo $_SESSION['lang']; ?>/menu.<?php echo $_SESSION['lang']; ?>.js"></script>
    <?php else : ?>
    <script type="text/javascript" src="/app/js/<?php echo $_SESSION['lang']; ?>/main.menu.<?php echo $_SESSION['lang']; ?>.js"></script>
    <?php endif; ?>
  </body>
</html>