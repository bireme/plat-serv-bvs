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
    <!-- Validator Form -->
    <script src="<?php echo RELATIVE_PATH; ?>/vendors/validator/validator.js"></script>
    <!-- jQuery Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="<?php echo RELATIVE_PATH; ?>/vendors/iCheck/icheck.min.js"></script> -->
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo RELATIVE_PATH; ?>/vendors/moment/moment.min.js"></script>
    <script src="<?php echo RELATIVE_PATH; ?>/vendors/datepicker/daterangepicker.js"></script>
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
    <!-- reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $_SESSION['lang']; ?>'></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#remove-account').on('click', function(e) {
                e.preventDefault();
                $('#removeaccount').submit();
            })
        });

        if (navigator.userAgent.indexOf('gonative') > -1) {
            $('#recaptcha').removeAttr('disabled');
        }

        function recaptchaCallback() {
            $('#recaptcha').removeAttr('disabled');
        };
    </script>

    <!-- Datepicker -->
    <script type="text/javascript">
      $(document).ready(function() {
        var max = moment();
        var min = moment().subtract(100, 'years');
        var maxYear = new Date(max).getFullYear();
        var minYear = new Date(min).getFullYear();

        var regional = [];
        regional["pt"] = {
            months: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
            monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
            weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
            // weekdaysAbbrev: [ "Do", "2ª", "3ª", "4ª", "5ª", "6ª", "Sa" ],
            today: 'Hoje',
            clear: 'Limpar',
            cancel: 'Sair',
            done: 'Confirmar',
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
        };
        regional["es"] = {
            months: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
            monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'Mayo', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
            weekdaysShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
            today: 'Hoy',
            clear: 'Limpiar',
            cancel: 'Salir',
            done: 'Confirmar',
            labelMonthNext: 'Proximo mes',
            labelMonthPrev: 'Mes anterior',
            labelMonthSelect: 'Seleccione un mes',
            labelYearSelect: 'Seleccione um año',
        };
        regional["en"] = {
            months: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
            monthsShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
            weekdaysShort: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
            today: 'Today',
            clear: 'Clear',
            cancel: 'Cancel',
            done: 'Done',
            labelMonthNext: 'Next month',
            labelMonthPrev: 'Previous month',
            labelMonthSelect: 'Select a month',
            labelYearSelect: 'Select a year',
        };

        $('#birthday').datepicker({
            i18n: regional[LANG],
            format: 'dd/mm/yyyy',
            container: 'body',
            maxDate: new Date(max),
            minDate: new Date(minYear, 0, 1),
            yearRange: [minYear, maxYear],
        });

        // $('#birthday').on('keydown', function (e) {
        //     e.preventDefault();
        //     return false;
        // });
      });
    </script>
    <!-- /Datepicker -->

    <script type="text/javascript">
        $("#cadastro").validate({
            rules: {
                firstName: {
                    required: true,
                    maxlength: 150
                },
                lastName: {
                    required: true,
                    maxlength: 150
                },
                user: {
                    required: true,
                    email: true
                },
                confirmUser: {
                    required: true,
                    email: true,
                    equalTo: "#user"
                },
                lattes: {
                    url: true
                },
                linkedin: {
                    url: true
                },
                researchGate: {
                    url: true
                },
                country: "required",
                degree: "required",
                profArea: "required",
                gender: "required",
                birthday: "required",
                terms: "required",
            },
            messages: {
                firstName: {
                    required: labels[LANG]['EMPTY'],
                    maxlength: labels[LANG]['LONG']
                },
                lastName: {
                    required: labels[LANG]['EMPTY'],
                    maxlength: labels[LANG]['LONG']
                },
                user: {
                    required: labels[LANG]['EMPTY'],
                    email: labels[LANG]['EMAIL']
                },
                confirmUser: {
                    required: labels[LANG]['EMPTY'],
                    email: labels[LANG]['EMAIL'],
                    equalTo: labels[LANG]['EMAIL_REPEAT']
                },
                lattes: {
                    url: labels[LANG]['URL']
                },
                linkedin: {
                    url: labels[LANG]['URL']
                },
                researchGate: {
                    url: labels[LANG]['URL']
                },
                country: labels[LANG]['SELECT'],
                degree: labels[LANG]['SELECT'],
                profArea: labels[LANG]['SELECT'],
                gender: labels[LANG]['SELECT'],
                birthday: labels[LANG]['EMPTY'],
                terms: labels[LANG]['CHECKED'],
            },
            // errorClass: "invalid form-error error",
            errorElement : 'div',
            errorPlacement: function(error, element) {
              var placement = $(element).data('error');
              if (placement) {
                $(placement).append(error)
              } else {
                if ( "terms" == element.attr("name") ) {
                  error.insertAfter("#"+element.attr("name"));
                } else {
                  error.insertAfter(element);
                }
              }
            }
        });
    </script>

    <script type="text/javascript">
        $("#changepass").validate({
            rules: {
                oldPassword: {
                    required: true,
                    minlength: 8,
                    maxlength: 40
                },
                newPassword: {
                    required: true,
                    minlength: 8,
                    maxlength: 40
                },
                confirmPassword: {
                    required: true,
                    equalTo: "#newPassword"
                },
            },
            messages: {
                oldPassword: {
                    required: labels[LANG]['EMPTY'],
                    minlength: labels[LANG]['SHORT'],
                    maxlength: labels[LANG]['LONG']
                },
                newPassword: {
                    required: labels[LANG]['EMPTY'],
                    minlength: labels[LANG]['SHORT'],
                    maxlength: labels[LANG]['LONG']
                },
                confirmPassword: {
                    required: labels[LANG]['EMPTY'],
                    equalTo: labels[LANG]['PASSWORD_REPEAT']
                },
            },
            // errorClass: "invalid form-error error",
            errorElement : 'div',
            errorPlacement: function(error, element) {
              var placement = $(element).data('error');
              if (placement) {
                $(placement).append(error)
              } else {
                error.insertAfter(element);
              }
            }
        });
    </script>

    <?php if ( $_SESSION['userTK'] ) : ?>
    <script type="text/javascript" src="/app/js/<?php echo $_SESSION['lang']; ?>/menu.<?php echo $_SESSION['lang']; ?>.js"></script>
    <?php else : ?>
    <script type="text/javascript" src="/app/js/<?php echo $_SESSION['lang']; ?>/main.menu.<?php echo $_SESSION['lang']; ?>.js"></script>
    <?php endif; ?>
  </body>
</html>