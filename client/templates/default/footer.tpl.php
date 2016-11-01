        <?php if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] != 'authentication' ) : ?>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        <?php endif; ?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=RELATIVE_PATH?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=RELATIVE_PATH?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Form Validator -->
    <script src="<?=RELATIVE_PATH?>/js/gen_validatorv31.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/build/js/custom.min.js"></script>
  </body>
</html>