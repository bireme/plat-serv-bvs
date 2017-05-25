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
    <script src="<?=RELATIVE_PATH?>/vendors/validator/validator.js"></script>
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
        // initialize the validator
        var validator = new FormValidator();

        // initialize the validator function
        validator.texts.invalid         = labels[LANG]['INVALID'];
        validator.texts.empty           = labels[LANG]['EMPTY'];
        validator.texts.short           = labels[LANG]['SHORT'];
        validator.texts.long            = labels[LANG]['LONG'];
        validator.texts.number_min      = labels[LANG]['NUMBER_MIN'];
        validator.texts.number_max      = labels[LANG]['NUMBER_MAX'];
        validator.texts.url             = labels[LANG]['URL'];
        validator.texts.number          = labels[LANG]['NUMBER'];
        validator.texts.email           = labels[LANG]['EMAIL'];
        validator.texts.email_repeat    = labels[LANG]['EMAIL_REPEAT'];
        validator.texts.password_repeat = labels[LANG]['PASSWORD_REPEAT'];
        validator.texts.no_match        = labels[LANG]['NO_MATCH'];
        validator.texts.complete        = labels[LANG]['COMPLETE'];
        validator.texts.select          = labels[LANG]['SELECT'];
        validator.texts.date            = labels[LANG]['DATA'];
        validator.texts.time            = labels[LANG]['TIME'];
        validator.texts.checked         = labels[LANG]['CHECKED'];

        document.forms['cadastro'].addEventListener('blur', function(e){
            validator.checkField.call(validator, e.target)
        }, true);

        document.forms['cadastro'].addEventListener('input', function(e){
            validator.checkField.call(validator, e.target);
        }, true);

        document.forms['cadastro'].addEventListener('change', function(e){
            validator.checkField.call(validator, e.target)
        }, true);

        document.forms['cadastro'].onsubmit = function(e){
            var submit = true,
                validatorResult = validator.checkAll(this);

            console.log(validatorResult);
            return !!validatorResult.valid;
        };

        // $('.multi.required').on('keyup blur', 'input', function(){
        //     var field = validator.checkField.call( validator, this).siblings('[required]')[0] );
        // });
    </script>
  </body>
</html>