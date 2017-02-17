        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=RELATIVE_PATH?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=RELATIVE_PATH?>/vendors/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="<?=RELATIVE_PATH?>/vendors/nprogress/nprogress.js"></script>
    <!-- Validator Form -->
    <script src="<?=RELATIVE_PATH?>/vendors/validator/validator.min.js"></script>
    <!-- iCheck -->
    <script src="<?=RELATIVE_PATH?>/vendors/iCheck/icheck.min.js"></script>

    <!-- i18n Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/i18n.js"></script>
    <!-- Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/scripts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/build/js/custom.min.js"></script>
    <!-- Main Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/include.js"></script>

    <!-- Validator -->
    <script>
      // initialize the validator function
      validator.message.invalid         = labels[LANG]['INVALID'];
      validator.message.empty           = labels[LANG]['EMPTY'];
      validator.message.min             = labels[LANG]['MIN'];
      validator.message.max             = labels[LANG]['MAX'];
      validator.message.number_min      = labels[LANG]['NUMBER_MIN'];
      validator.message.number_max      = labels[LANG]['NUMBER_MAX'];
      validator.message.url             = labels[LANG]['URL'];
      validator.message.number          = labels[LANG]['NUMBER'];
      validator.message.email           = labels[LANG]['EMAIL'];
      validator.message.email_repeat    = labels[LANG]['EMAIL_REPEAT'];
      validator.message.password_repeat = labels[LANG]['PASSWORD_REPEAT'];
      validator.message.repeat          = labels[LANG]['REPEAT'];
      validator.message.complete        = labels[LANG]['COMPLETE'];
      validator.message.select          = labels[LANG]['SELECT'];
      validator.message.date            = labels[LANG]['DATA'];

      // validate a field on "blur" event, a 'select' on 'change' event & a '.required' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validating
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
  </body>
</html>