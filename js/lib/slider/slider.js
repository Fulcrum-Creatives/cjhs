$(window).load(function(){
    $('#nivoslider-1359').nivoSlider({
        effect: 'sliceUpDownLeft',
        animSpeed: 800,
        pauseTime: 8000,
        randomStart: true,
        startSlide: 'rand',
        directionNav: false,
        controlNav: false,
        controlNavThumbs: false,
        pauseOnHover: false,
        manualAdvance: false,
        afterLoad: function(){
            var link = $('#nivoslider-1359').data('nivo:vars').currentImage.attr('data-link');
            $('.slider-clone a').attr('href', link);
            var title = $('#nivoslider-1359').data('nivo:vars').currentImage.attr('title');
            $('.slider-clone a').attr('title', title);
        },
        afterChange: function(){
            var link = $('#nivoslider-1359').data('nivo:vars').currentImage.attr('data-link');
            $('.slider-clone a').attr('href', link);
            var title = $('#nivoslider-1359').data('nivo:vars').currentImage.attr('title');
            $('.slider-clone a').attr('title', title);
        }
        
    });
});