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
    <script src="<?=RELATIVE_PATH?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=RELATIVE_PATH?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Form Validator -->
    <script src="<?=RELATIVE_PATH?>/js/gen_validatorv31.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/build/js/custom.min.js"></script>
    <!-- Translations Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/texts.js"></script>
    <!-- Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/functions.js"></script>
    <!-- Main Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/scripts.js"></script>
  </body>
</html>