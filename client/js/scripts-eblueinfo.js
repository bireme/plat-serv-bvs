//  --------------------------------- Text
$(document).ready(function() {
  M.updateTextFields();
});
//  --------------------------------- Select
$('select').formSelect();
$.validator.setDefaults({
  ignore: []
});
//  --------------------------------- Modal
$(document).ready(function(){
  $('.modal').modal();
});
//  --------------------------------- Modal
$(document).ready(function(){
  $('.sidenav').sidenav();
});
//  --------------------------------- Accordion
$(document).ready(function(){
  $('.collapsible').collapsible();
});
//  --------------------------------- Nav
$(document).ready(function(){
  $('.sidenav').sidenav();
});
//  --------------------------------- Cores
var cor = $.cookie('cor'); // carrega cookie da cor
// Ao Abrir a pagina  
$( window ).on( "load", function() {
  $corSelecionada = cor;
  if(cor != ''){ // ser for diferente de vazio adiciona cor
    $('body').addClass($corSelecionada);
  }else{ // se for igual vazio remover cores
    $('body').removeClass("bgColor1 + bgColor2");
  }
});
//  --------------------------------- Data Picker
$('.datepicker').datepicker();
//  --------------------------------- Tradução DataPicker (calendário)
$(function() {
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
});
//  --------------------------------- Validação
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
        country: "required",
        birthday: "required",
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
        country: labels[LANG]['SELECT'],
        birthday: labels[LANG]['EMPTY'],
    },
    // validClass: "valid",
    errorClass: 'invalid error',
    errorElement : 'div',
    errorPlacement: function(error, element) {
        error.appendTo(element.parent());
    }
});