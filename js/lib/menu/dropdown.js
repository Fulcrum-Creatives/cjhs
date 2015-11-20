/*---------------------------------------------------------
 * Menu
---------------------------------------------------------*/
(function ( $ ) {
    "use strict";
    $(function () {
        $("#menu__icon").click(function(){
            $(".header__menu").stop().slideToggle({queue: false});
        });
        if($(window).width() >= 860) {
            $(".header__menu").show();
        }
        if($(window).width() <= 860) {
            $(".header__menu").hide();
        }
        function menuDesk() {
            if($(window).width() >= 860) {
                $(".header__menu").show();
            }
            if($(window).width() <= 860) {
                $(".header__menu").hide();
            }
        }
        $(window).resize(function() {
            menuDesk();
        });
        $('.mobile-nav ul li .menu-item-has-children').click(function(){
            $(this).find('.sub-menu').slideToggle();
        });
        $("#nav__menu li:nth-child(3)").addClass('sub-break');
        $('#nav__menu li').hover(
        function(){
            $(this).children('.sub-menu').stop(true, false).delay(300).slideDown(300);
        },
        function(){
            $(this).children('.sub-menu').stop(true, false).delay(300).slideUp(300, function(){
                $(this).removeAttr('style');
            });
        });
    });
}(jQuery));