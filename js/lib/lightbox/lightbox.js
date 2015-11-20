(function( $ ) {
    'use strict';

    $(function() {
        $(".fancybox, .gallery-item .gallery-icon a").fancybox({
            helpers : {
                title: {
                    type: 'inside'
                }
            }
        });
    });

    $(function() {
        $('.fancybox-audio').fancybox({
            autoSize: false,
            minHeight: 30,
            width: 377,
            height: 10,
            scrolling: 'no',
            arrows: false
        });
    });

    $(function() {
        $('.fancybox-img').fancybox({
            autoSize: false,
            minHeight: 30,
            width: 487,
            height: 10,
            scrolling: 'no',
            arrows: false,
            helpers : {
                title: {
                    type: 'inside'
                }
            }
        });
    });

    $(function() {
        $('.fancybox--iframe').fancybox({
            type: 'iframe',
            scrollOutside: false,
            //minHeight: 650,
            width: 900,
            arrows: false
        });
        
    });

})( jQuery );