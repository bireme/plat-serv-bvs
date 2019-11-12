//  --------------------------------- menu float
$('.fixed-action-btn').floatingActionButton({
	hoverEnabled: false
});
//  --------------------------------- navbar responsive
$('.sidenav').sidenav();
//  --------------------------------- Dropdown
$(".dropdown-trigger").dropdown();
$("div.tituloDropdown .dropdown-trigger").dropdown({'hover':'true'});
//  --------------------------------- Collapse
$('.collapsible').collapsible();
// expandir (nao funcinou)
var elem = document.querySelector('.collapsible.expandable');
var instance = M.Collapsible.init(elem, {
	accordion: false
});
//  --------------------------------- slider
$('.slider').slider();
//  --------------------------------- Modal
$('.modal').modal();
//  --------------------------------- tabs
$('.tabs').tabs({
	swipeable : true,
	responsiveThreshold : 1920
});
//  --------------------------------- tooltips
$('.tooltipped').tooltip();
//  --------------------------------- Form
$(document).ready(function() {
	$('input#input_text, textarea#textarea2').characterCounter();
});
//  --------------------------------- Dropdown
$(".dropdown-button").dropdown();
//  --------------------------------- Select
$('select').formSelect();
$("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
//  --------------------------------- Input File
$('input#input_text, textarea#textarea2').characterCounter();
//  --------------------------------- Carousel
$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: true
});
/*****************************************************
******************************************************
            Fim de Scripts Materialize
******************************************************
*****************************************************/
//  --------------------------------- Cores
var theme = $.cookie('color'); // carrega cookie da cor
// Ao clicar tema Default
$('#default-theme').click(function(){
  $.cookie("color","",{ path: '/', expires: 365 * 10 }); // seta cor vazia
  $('body').removeClass('bgColor1 + bgColor2'); // remover classes de cores
});
// Ao clicar tema Dark
$('#dark-theme').click(function(){
  $.cookie("color","bgColor1",{ path: '/', expires: 365 * 10 }); //seta cor 1
  $('body').addClass('bgColor1'); // insere no body cor selecionada (1)
  $('body').removeClass('bgColor2'); // remover segunda cor
});
// Ao clicar tema Green
$('#green-theme').click(function(){
  $.cookie("color","bgColor2",{ path: '/', expires: 365 * 10 }); // seta cor 2
  $('body').addClass('bgColor2'); // insere no body cor selecionada (2)
  $('body').removeClass('bgColor1'); // remover primeira cor
});
//  --------------------------------- Fechar
$('#btnClose').click(function(){
  $('#interessar').slideToggle();
  $('#btnClose i').toggleClass('btnClose2');

  // Toggle cookie value
  if($.cookie('hide_info') === 'on') {
    $.cookie('hide_info', 'off',{ path: '/', expires: 365 * 10 });
  } else {
    $.cookie('hide_info', 'on',{ path: '/', expires: 365 * 10 });
  }
});
/*
$(function(){
  // Toggle cookie value
  if($.cookie('hide_info') === 'on') {
    $('#interessar').hide();
    $('#btnClose i').addClass('btnClose2');
  } else {
    $('#interessar').show();
    $('#btnClose i').removeClass('btnClose2');
  }
});
*/
//  --------------------------------- Banner Slick
$(function(){
  $('.bannerHome').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },   
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
});
//  --------------------------------- Limite Título Modal
$(document).ready(function() {
  $('input.formTitulo').characterCounter();
});
//  --------------------------------- Dismiss Button
$('.dismiss').click(function(){
  $(this).parent().hide();
})
//  --------------------------------- Dismiss Button
$('input[type=radio][name=reason]').change(function() {
    if (this.value == 'OTHER') {
        $('#details').parent().show();
    } else {
        $('#details').parent().hide();
    }
});
//  --------------------------------- Tutorial Modal
$( document ).on('click', 'a.modal-video', function(){
    var title = $(this).find('b.video-title').text();
    var video = $(this).data('video');
    $('#modal-video-title').text(title);
    $('#modal-video').find('iframe').attr('src', video);
});
$("#modal-video").modal({
    dismissible: true,
    onCloseEnd: function() {
        $('#modal-video-title').text('');
        $('#modal-video').find('iframe').attr('src', '');
    }
});

// Resize reCAPTCHA to fit width of container
// Since it has a fixed width, we're scaling
// using CSS3 transforms
// ------------------------------------------
// captchaScale = containerWidth / elementWidth

function scaleCaptcha(elementWidth) {
  // Width of the reCAPTCHA element, in pixels
  var reCaptchaWidth = 304;
  // Get the containing element's width
  var containerWidth = $('.recaptcha').width();
  
  // Only scale the reCAPTCHA if it won't fit
  // inside the container
  if(reCaptchaWidth > containerWidth) {
    // Calculate the scale
    var captchaScale = containerWidth / reCaptchaWidth;
    // Apply the transformation
    $('.g-recaptcha').css({
      'transform':'scale('+captchaScale+')',
      'transform-origin':'0 0'
    });
  }
}

/*
$(function() { 
 
  // Initialize scaling
  scaleCaptcha();
  
  // Update scaling on window resize
  // Uses jQuery throttle plugin to limit strain on the browser
  $(window).resize( $.throttle( 100, scaleCaptcha ) );
  
});
*/