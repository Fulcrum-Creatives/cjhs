(function( $ ) {
	'use strict';

	 $(function() {
	 	// Dropdown Init
	 	$('.nav').smartmenus({
			'hideFunction': function($ul, complete) { $ul.slideUp(250, complete); },
			'showFunction': function($ul, complete) { $ul.slideDown(250, complete); },
			'subIndicators': false,
			'keepInViewport': true
		});
		// Asseccibility Init
		$('.nav').setup_navigation();
	 	$('.widget-area__infobox').on( 'hover', function() {
	 		console.log('test');
		   $(this).siblings('.infobox-item--heading').addClass('header-hover');
		}, function() {
		   $(this).siblings('.infobox-item--heading').removeClass('header-hover');
		});
	 });
})( jQuery );