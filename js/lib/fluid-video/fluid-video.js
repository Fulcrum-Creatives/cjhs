/*---------------------------------------------------------
 * Fluid Video
---------------------------------------------------------*/
(function ( $ ) {
    'use strict';
		$(function() {
	    var $allVideos = $('iframe[src^="//player.vimeo.com"], iframe[src^="//www.youtube.com"], object, embed'),
	    $fluidEl = $('figure');
	    $allVideos.wrapAll('<div class="video-wrapper"></div>');
		$allVideos.each(function() {
			$(this).wrap('div class="video-wrapper"');
			$(this).attr('data-aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
		});
		$(window).resize(function() {
			var newWidth = $fluidEl.width();
			$allVideos.each(function() {
				var $el = $(this);
			    $el.width(newWidth).height(newWidth * $el.attr('data-aspectRatio'));
			});
		}).resize();
	});
}(jQuery));