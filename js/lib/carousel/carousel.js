/*---------------------------------------------------------
 * Topy Carousel
---------------------------------------------------------*/
(function( $ ) {
  'use strict';
  $(function() {
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav',
      adaptiveHeight: true,
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 770,
          settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          asNavFor: '.slider-for',
          dots: false,
          centerMode: true,
          focusOnSelect: true,
          }
        }
      ]
    });
  });
})( jQuery );
 