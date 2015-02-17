




(function($) {
	
		
	var $pullRight;
	var $pullLeft;
	var letters = {};
	var lettersCount = 0;
		
	$(document).ready( function() {

		$pullRight = $('.oral-history-entry .pull-right');
		$pullLeft = $('.oral-history-entry .pull-left');
		$pullRight.show();
		$pullLeft.show();
		splitAll();
		
		
	});
	
	var splitAll = function(){
		
		//var split = 
		letters = $('.oral-history-entry li');
		var split = letters.length / 2;
		//var split = Math.ceil(letters.length / 2);

		var x = 0;
		$.each(letters,function(index,value){
				//$(this).removeClass('hide');
				if(x >= split){
					$pullRight.append($(this));
				}else{
					$pullLeft.append($(this));
				}
				x++;
				
				
		});
		$('.oral-history-entry .pull-default').remove();
	};
	
		
})(jQuery);