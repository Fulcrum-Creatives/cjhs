(function( $ ) {
  'use strict';
  // Tout Sidebar Item Hover
  $(function() {
    $('.widget-area__infobox a').hover(function() {
       $(this).siblings('.infobox-item--heading').addClass('header-hover');
    }, function() {
       $(this).siblings('.infobox-item--heading').removeClass('header-hover');
    });
    $('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap('<div class="video__wrapper"/>');
    // Google Form
    /*var googleForm = '<input type="text" id="q" class="wpas-text " value="" name="q" placeholder="Search the CJHS Website">';
    $('#search_query').get(0).type='hidden';
    $('#wpas-search_query').append(googleForm);
    $('#q').bind('change', function() {  
      $(this).val(function(i, val) {  
        $('#search_query').val(val);  
        return val;  
      });  
    });*/ 
  });

})( jQuery );