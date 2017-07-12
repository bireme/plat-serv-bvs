        <!-- footer content -->
        <footer>
          <div>
            <?=FOOTER_MESSAGE?>
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
    <!-- bootstrap-daterangepicker -->
    <script src="<?=RELATIVE_PATH?>/vendors/moment/moment.min.js"></script>
    <script src="<?=RELATIVE_PATH?>/vendors/datepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/build/js/custom.js"></script>
    <!-- Translations Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/texts.js"></script>
    <!-- Theme Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/functions.js"></script>
    <!-- Main Scripts -->
    <script src="<?=RELATIVE_PATH?>/js/scripts.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript">
      $(document).ready(function() {
        var max = moment();
        var min = moment().subtract(100, 'years');

        var regional = [];
        regional["pt"] = {
            daysOfWeek: [ "Do", "2ª", "3ª", "4ª", "5ª", "6ª", "Sa" ],
            monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
        };
        regional["es"] = {
            daysOfWeek: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        };
        regional["en"] = {
            daysOfWeek: [ "Su", "Mo", "Tu", "We", "Th", "Fr", "Sa" ],
            monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]
        };

        $('#birthday').daterangepicker({
          maxDate: max,
          minDate: min,
          format: 'DD/MM/YYYY',
          locale: regional[LANG],
          singleDatePicker: true,
          showDropdowns: true,
          calender_style: "picker_2"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#birthday').on('keydown', function (e) {
            e.preventDefault();
            return false;
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- Validator -->
    <script type="text/javascript">
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
        validator.texts.radio           = labels[LANG]['RADIO'];
        validator.texts.date            = labels[LANG]['DATA'];
        validator.texts.time            = labels[LANG]['TIME'];
        validator.texts.checked         = labels[LANG]['CHECKED'];

        document.forms['cadastro'].addEventListener('blur', function(e){
            if ( !$(e.target).is('#birthday') )
                validator.checkField.call(validator, e.target);
        }, true);

        document.forms['cadastro'].addEventListener('input', function(e){
            validator.checkField.call(validator, e.target);
        }, true);

        document.forms['cadastro'].addEventListener('change', function(e){
            validator.checkField.call(validator, e.target);
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