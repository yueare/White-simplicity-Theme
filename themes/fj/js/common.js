$(function(){
	$('.btn-toggle').click(function(){
		var toggle = '.'+$(this).data('toggle')+'-panel';
		if($(toggle).hasClass('active')){
			
			$(toggle).addClass('active').slideToggle(150);
			
		}else{
			
			//$(toggle).addClass('active').siblings().removeClass('active');
			


			$(toggle).removeClass('active').slideToggle(150);

	
		}
		return false;
	});
	
	//微博分享
	$('.btn-share').click(function(){
		var that = $(this).parent();
		var url = "http://service.weibo.com/share/share.php?url="+encodeURIComponent(that.data('url'))+"&title=" + encodeURIComponent(that.data('title')+' '+that.data('desc')) + "&appkey=1343713053";
		url!=='' ? window.open(url, "_blank") : '';
		return false;
	});
	$('.nav-about').click(function(){
		showOverlay('about');
	});
	$('.btn-menu').click(function(){
		showOverlay('menu');
	});
	$('#overlay-close').click(function(){
		showOverlay();
	});
	$('#scroll .scroll-up').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 180);
        return false;
	});
	
	$(window).bind("scroll", backToTopFun);
	backToTopFun();
	
});
function showOverlay(name){
	if($('#wrapper').hasClass('overlay-open') || (name === undefined)){
		$('#wrapper').removeClass('overlay-open');
		$('#overlay').removeClass('open');
		$('#overlay').find('.overlay-layer').hide();
		$('html').removeClass('overflow');
	}else{
		$('html').addClass('overflow');
		$('#overlay').addClass('open');
		$('#wrapper').addClass('overlay-open');
		$('#overlay').find('#overlay-'+name).show();
	}
}
//返回顶部按钮的显示
function backToTopFun() {
    var st = $(document).scrollTop(), winh = $(window).height(),backToTopEle = $('#scroll');
    (st > 120)? backToTopEle.show(): backToTopEle.hide();
    //IE6下的定位
    if (!window.XMLHttpRequest) {
        backToTopEle.css("top", st + winh - 166);
    }
}
// 消息框
function dalert(msg,type,time){
	type = type === undefined ? 'success' : 'error';
	time = time === undefined ? (type=='success' ? 1500 : 3000) : time;
	var html = '<div class="dialog '+type+'">'+msg+'</div>';
	$(html).appendTo($('body')).fadeIn(300,function(){
		setTimeout(function(){
			$('body > .dialog').remove();
		},1500);
	});
}
//设置内容图片居中
function setImgCenter(){
	var imgs = $('.post-content img');
	if(imgs.length>0){
		$.each(imgs,function(k,v){
			$(v).addClass('aligncenter');
		});
	}
}