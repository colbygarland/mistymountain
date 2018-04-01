jQuery(window).bind("load", function() {
  'use strict';
  jQuery(function($) {

    // for lightbox for pictures
    $('.venobox').venobox();

    //Double Click to open parent menu item in mobile
    $('ul.mobile-menu>li>a').click(function(e){
      if( $(this).hasClass('go') || $(this).next('ul.children').length < 1 ){
        return;
      }else{
        e.preventDefault();
        $(this).addClass('go');
      }
    });

    $('.photo-slider').slick({
      infinite: true,
      adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 10000,
      dots: true
    });

  });
});
