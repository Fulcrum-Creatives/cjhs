(function($) {
	$(document).ready( function() {
		var $options = $('.options a');
		$options.click(function(event){
			event.preventDefault();
			$('.options').find('.sele').removeClass('sele');
			$(this).addClass('sele');
			$refine = $('.search-site .refine');
			$refine.val($(this).attr('data-refine'));
		});
		$('.search-submit').click(function(event){
			event.preventDefault();
			$('.search-site .searchform').submit();
		});			    
	});
})(jQuery);