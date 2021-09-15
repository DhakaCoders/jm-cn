(function($) {

var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
if($("ul.slick-dots li").length == 1){
   $("ul.slick-dots").hide();
}
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};
if($('.mHc6').length){
  $('.mHc6').matchHeight();
};
$(window).load(function() {
//matchHeightCol
  if($('.mHc').length){
    $('.mHc').matchHeight();
  };
  if($('.mHc1').length){
    $('.mHc1').matchHeight();
  };
  if($('.mHc2').length){
    $('.mHc2').matchHeight();
  };
  if($('.mHc3').length){
    $('.mHc3').matchHeight();
  };
  if($('.mHc4').length){
    $('.mHc4').matchHeight();
  };
  if($('.mHc5').length){
    $('.mHc5').matchHeight();
  };
  if($('.mHc6').length){
    $('.mHc6').matchHeight();
  };
});

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
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
}





/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


//Hidden Bar Menu Config
function hiddenBarMenuConfig() {
  var menuWrap = $('.hidden-bar .side-menu');
  // appending expander button
  menuWrap.find('.dropdown').children('a').append(function () {
    return '<button type="button" class="btn expander"><i class="icon fa fa-angle-down"></i></button>';
  });
  // hidding submenu
  menuWrap.find('.dropdown').children('ul').hide();
  // toggling child ul
  menuWrap.find('.btn.expander').each(function () {
    $(this).on('click', function () {
      $(this).parent() // return parent of .btn.expander (a)
        .parent() // return parent of a (li)
          .children('ul').slideToggle();

      // adding class to expander container
      $(this).parent().toggleClass('current');
      // toggling arrow of expander
      $(this).find('i').toggleClass('fa-angle-up fa-angle-down');

      return false;

    });
  });
}

hiddenBarMenuConfig();


//Custom Scroll for Hidden Sidebar
if ($('.hidden-bar-wrapper').length) {
  
  $('.hidden-bar-closer,.menu-backdrop').on('click', function () {
    $('.hidden-bar,body').removeClass('visible-sidebar');
  });
  $(document).keydown(function(e){
        if(e.keyCode == 27) {
            $('.hidden-bar,body').removeClass('visible-sidebar');
        }
    });
  $('.hidden-bar-opener').on('click', function () {
    $('.hidden-bar,body').addClass('visible-sidebar');
  });
}


if( $('.contact-form-wrp').length ){
  $('.contact-form-wrp .wpforms-container .wpforms-form .wpforms-submit-container button').on('click', function(){
    $('.wpforms-field input[required],.wpforms-field select[required]').parents('.wpforms-field').addClass('wpforms-has-error');
    $('.wpforms-field input[required],.wpforms-field select[required]').addClass('wpforms-error');
  });
}


if( $('.wpforms-error').length ){
  $('.wpforms-error').on('click', function(){
    $(this).parents('.wpforms-field').removeClass('wpforms-has-error');
  });
}

$('.wpforms-field-select select').select2();
$('.select-2-cntlr').select2();

var windowWidth = $(window).width();
var containerWidth = $('.container').width();
var containerOffset = (windowWidth - containerWidth);
var containerOffsetRgt = containerOffset / 2;
var content = $('.jm-welcome-rgt').width();
var imgWidth = (containerOffsetRgt + content + 15);

$('.jm-welcome-rgt-img-ctlr').css("width", imgWidth);

var conHeight = $('.jm-welcome-lft-des').height();
var conInnerHeight = conHeight;
$('.jm-welcome-rgt-img').css('height', conInnerHeight);

$(window).resize(function(){
  var windowWidth = $(window).width();
  var containerWidth = $('.container').width();
  var containerOffset = (windowWidth - containerWidth);
  var containerOffsetRgt = containerOffset / 2;
  var content = $('.jm-welcome-rgt').width();
  var imgWidth = (containerOffsetRgt + content + 15);
  $('.jm-welcome-rgt-img-ctlr').css("width", imgWidth);

  var conHeight = $('.jm-welcome-lft-des').height();
  var conInnerHeight = (conHeight - 99);
  $('.jm-welcome-rgt-img').css('height', conInnerHeight);
});


if( $('.hmBnrSlider').length ){
  $('.hmBnrSlider').slick({
    dots: true,
    infinite: false,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 4000,
    speed: 700,
    slidesToShow: 1,
    slidesToScroll: 1
  });
}


})(jQuery);