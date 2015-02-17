(function($) {
	$(document).ready( function() {
	   
	   
	   $("#menu-cjhs-menu > li:not('.current-menu-item,.current-menu-parent')").click(function(event){
			var subMenu = $(this).find('ul');
			if(subMenu.length > 0)
			{
				event.preventDefault();
				if(subMenu.css('display') == 'none')
				{					
					
					// Find other open menus
					var selectedMenu = $(".cjhs-menu-selected ul");
					var subHeight = subMenu.height();
					$(this).addClass('cjhs-menu-selected')
					//subMenu.show();
					subMenu.css({'height':'0'}).show().stop().animate({
						height: subHeight
					  },300, function() {
					    // Animation complete.
					    
					    if(selectedMenu.length > 0){					    
						    selectedMenu.stop().animate({
								height: '0px'
							  }, 150, function() {
							  	$(this).hide();
							  	//$(this).attr('style','');
							    $(this).css({'height':'auto'});
							    $(this).parent().removeClass('cjhs-menu-selected')
	
							    // Animation complete.
							});
						}		
					});				
				}
				else
				{
					
					var subHeight = subMenu.height();
					//subMenu.show();
					subMenu.stop().animate({
						height: '0px'
					  }, 150, function() {
					  	$(this).hide();
					    $(this).css({'height':'auto'});
					    $(this).parent().removeClass('cjhs-menu-selected')
					    // Animation complete.
					});						
				}
			}
	   });
	   
	   $('#menu-cjhs-menu li ul').click(function(event){
		  	event.stopPropagation(); 
	   });
	   
	   
	   
		// Add fancybox to event images
		$('.attachment-full, .attachment-medium, .attachment-thumbnail').addClass('align-none').parent().addClass('fancybox-img');
				
		
		// Add fancybox to Oral history side images
		$('.oral_histories').find('.attachment-medium').parent().attr('rel','o_gallery');
		$('.oral_histories').find('.attachment-full').parent().attr('rel','o_gallery');

		$('.attachment-146x146').addClass('align-none').parent().addClass('fancybox-img').attr('rel','o_gallery');
	   

	   // Fancy box for images throughout site
	  	
			$(".fancybox-img").fancybox({
				padding : 0,
				fitToView	: true,
				autoSize	: true,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none',
				helpers : {
			        title: {
			            type: 'outside'
			        }
			    }			
			});
			
			$(".fancybox-tout").fancybox({
			padding : 0,
			maxWidth	: 900,
			maxHeight	: 2000,
			fitToView	: false,
			width		: '70%',
			height		: '90%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
				    
		
		
					   
	   /*
$(".entry-content img").fancybox({
			padding : 0
		});
*/

	  
	   /*
$('.feature-slider a').click(function(e) {
	        $('.featured-posts section.featured-post').css({
	            opacity: 0,
	            visibility: 'hidden'
	        });
	        $(this.hash).css({
	            opacity: 1,
	            visibility: 'visible'
	        });
	        $('.feature-slider a').removeClass('active');
	        $(this).addClass('active');
	        e.preventDefault();
	    });
*/
	    
	});
})(jQuery);