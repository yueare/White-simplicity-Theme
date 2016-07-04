/*
	SuperBox v1.0.0
	by Todd Motto: http://www.toddmotto.com
	Latest version: https://github.com/toddmotto/superbox
	
	Copyright 2013 Todd Motto
	Licensed under the MIT license
	http://www.opensource.org/licenses/mit-license.php

	SuperBox, the lightbox reimagined. Fully responsive HTML5 image galleries.
*/
function loaded()
{

 
    $('#colorfulPulse').css("display","none");
    $('.superbox-current-img').css("display","");
  	
}

;(function($) {
		
	$.fn.SuperBox = function(options) {
		
		var loader        = $('<div id="colorfulPulse"><span class="item-1"></span><span class="item-2"></span><span class="item-3"></span><span class="item-4"></span><span class="item-5"></span><span class="item-6"></span><span class="item-7"></span>');
		var superbox      = $('<div class="superbox-show"></div>');
		var superboximg   = $('<img onload="loaded()" src="" class="superbox-current-img" style="display:none">');
		var superboxclose = $('<div class="superbox-close"></div>');
		
		superbox.append(loader).append(superboximg).append(superboxclose);
		
		return this.each(function() {
			//打开大图
			$('.superbox-list').click(function() {

				 $('#colorfulPulse').css("display","block");
 				$('.superbox-current-img').css("display","none");
				var currentimg = $(this).find('.superbox-img');
				var imgData = currentimg.data('img');
				superboximg.attr('src', imgData);
				
				if($('.superbox-current-img').css('opacity') == 0) {
					$('.superbox-current-img').animate({opacity: 1});
				}
				
				if ($(this).next().hasClass('superbox-show')) {
					superbox.toggle();
				} else {
					superbox.insertAfter(this).css('display', 'block');
				}
				
				$('html, body').animate({
					scrollTop:superbox.position().top - currentimg.width()
				}, 'medium');

				

			});
					
			//关闭大图	
			$('.superbox').on('click', '.superbox-close', function() {
				$('.superbox-current-img').animate({opacity: 0}, 200, function() {
					$('.superbox-show').slideUp();
				});

			});

			
			
			
		});
	};
})(jQuery);