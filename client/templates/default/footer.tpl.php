        <?php if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] != 'authentication' ) : ?>
        <!-- footer content -->
        <footer>
          <div>
            <?=$trans->getTrans('menu','FOOTER_MESSAGE')?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        <?php endif; ?>
      </div>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <!-- Custom Theme Scripts -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/build/js/custom.js"></script>
    <!-- Translations Scripts -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/js/texts.js"></script>
    <!-- Theme Scripts -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/js/functions.js"></script>
    <!-- Main Scripts -->
    <script type="text/javascript" src="<?=RELATIVE_PATH?>/js/scripts.js"></script>
  </body>
</html>