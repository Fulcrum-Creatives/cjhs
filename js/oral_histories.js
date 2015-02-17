
(function($) {
	
	// Cookies
	var JSCookieInit = function JSCookiesInit() {
	window.JSCookie={set:function(n,v,days){var e="",d;if(days){d=new Date;d.setTime(d.getTime()+days*864E5);e="; expires="+d.toGMTString()}document.cookie=n+"="+v+e+"; path=/"},get:function(n){var match=n+"=",c="",ca=document.cookie.split(";"),i;for(i=0;i<ca.length,c=ca[i];i++)if(c.indexOf(match)!==-1)return c.substring(match.length,c.length);return null},del:function(n){this.set(n,"",-1)}};
	};

	JSCookieInit();
	
	var oNavSele;
	var oNavSets = {
		af : ['a','b','c','d','e','f'],
		gl : ['g','h','i','j','k','l'],
		mr : ['m','n','o','p','q','r'],
		sz : ['s','t','u','v','w','x','y','z']
	}
	
	var $pullRight;
	var $pullLeft;
	var letters = {};
	var lettersCount = 0;
		
	$(document).ready( function() {

		$pullRight = $('.pull-right');
		$pullLeft = $('.pull-left');
		loadLetters();
		checkNavSele();
		
		
		sortNav(getCustomSplit());  
		
		
		$('.o-nav a').click(function(event){
			event.preventDefault();
			oNavSele = $(this).data('osection');
			sortNav($(this).data('osplit'));
			$('.o-nav .sele').removeClass('sele');
			$(this).addClass('sele');
			
			JSCookie.set('oNavSele', oNavSele , 300);
			JSCookie.set('oNavCustomSplit', $(this).data('osplit'), 300);

		});	   
	
	});
	
	var getCustomSplit = function(){
	
		var oNavCustomSplit = JSCookie.get('oNavCustomSplit')
		if( oNavCustomSplit === null ){
			return 0;
		}else{
			return oNavCustomSplit.slice(1);
		}
	}
	
	var checkNavSele = function(){
		var oNavCookie = JSCookie.get('oNavSele');
		if( oNavCookie === null ){
			oNavSele = 'all'
		}else{
			if( oNavCookie.substr(0,1) == '=' ){
				oNavSele = oNavCookie.slice(1);
			}else{
				oNavSele = oNavCookie;
			}
		}
		
		$('.o-nav .sele').removeClass('sele');
		$('[data-osection="'+oNavSele+'"]').addClass('sele');

	};
	
	
	var sortNav = function(customSplit){
		if($('.letter').is(':visible')){
			$.each(letters,function(){
				$(this).addClass('hide');
			});
		}
		if(oNavSele == 'all'){
			splitAll();
		}else{
			splitSection(customSplit);
		}
	};
	
	
	var loadLetters = function(){
		$('.letter').each(function(index,value){
				//console.log('INDEX: %s',index);
				//console.log('Val; %s', $(this).data('letter'));
				letters[$(this).data('letter')] = $(this);	
				lettersCount++;
		});
	}
	
	var splitAll = function(){
		
		//var split = Math.ceil(lettersCount / 2);
		var split = 10;
		var x = 0;
		$.each(letters,function(index,value){
				$(this).removeClass('hide');
				if(x > split){
					$pullRight.append($(this));
				}else{
					$pullLeft.append($(this));
				}
				x++;
				
				
		});
	};
	
	var splitSection = function(customSplit){
		var sectionSet = new Array();
		$.each(oNavSets[oNavSele],function(index,value){
			if(value in letters){
				sectionSet.push(value);
			}
		});
		
		var split;
				
		if(customSplit > 0){
			split = customSplit;
		}else{
			split = Math.ceil(sectionSet.length / 2);	
		} 
		
		
		$.each(sectionSet,function(index,value){
			letters[value].removeClass('hide');
			if(index >= split){
					$pullRight.append(letters[value]);
				}else{
					$pullLeft.append(letters[value]);
				}

		});
	};	
	
})(jQuery);