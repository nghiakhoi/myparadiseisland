$(function() {
    var action;
    $(".number-spinner a").on('click', function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('a').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                input.val(parseInt(input.val())+1);
            }else{
                btn.prop("disabled", true);
            }
            //action = setInterval(function(){
            //    if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
            //        input.val(parseInt(input.val())+1);
            //    }else{
            //        btn.prop("disabled", true);
            //        clearInterval(action);
            //    }
            //}, 50);
    	} else {
            if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                input.val(parseInt(input.val())-1);
            }else{
                btn.prop("disabled", true);
            }
            //action = setInterval(function(){
            //    if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
            //        input.val(parseInt(input.val())-1);
            //    }else{
            //        btn.prop("disabled", true);
            //        clearInterval(action);
            //    }
            //}, 50);
    	}
    });
});
function productsSlider() {
    $(".product-detail .products ul.slider").each(function(){
		var w = $("li",this).first().outerWidth();
		if (($(window).width() > 1200) ){
		}
		if (($(window).width() < 1200)&&($(window).width() > 992)) {
			if ($("li",this).length > 4) {				
				 slider = $(this).bxSlider({	
					slideWidth: w,
					slideMargin: 0,	
					minSlides: 1,
 					maxSlides: 4,
					pager: false,
					moveSlides:1,
					hideControlOnEnd: true,
					infiniteLoop: false
				});	
				
			}
		}
		if (($(window).width() < 992)&&($(window).width() > 767)) {
			if ($("li",this).length > 3) {				
				 slider = $(this).bxSlider({	
					slideWidth: w,
					slideMargin: 0,	
					minSlides: 1,
 					maxSlides: 3,
					pager: false,
					moveSlides:1,
					hideControlOnEnd: true,
					infiniteLoop: false
				});	
				
			}
		}
		if (($(window).width() < 768)) {
			if ($("li",this).length > 2) {				
				 slider = $(this).bxSlider({	
					slideWidth: w,
					slideMargin: 0,	
					minSlides: 1,
 					maxSlides: 2,
					pager: false,
					moveSlides:1,
					hideControlOnEnd: true,
					infiniteLoop: false
				});	
			}
		}
		
	});	
}
  
function thumbsSlider() {
    $(".product-detail .photo .thumbs ul").each(function(){		
		if (($(window).width() > 992)) {
			if ($("li",this).length > 5) {				
				slider = $(this).bxSlider({	
					slideWidth: 60,
					slideMargin: 10,	
					minSlides: 1,
 					maxSlides: 5,
					pager: false,
					moveSlides:1,
					hideControlOnEnd: true,
					infiniteLoop: false
				});	 
			}
		}
		if (($(window).width() < 992)) {
			if ($("li",this).length > 3) {				
				slider = $(this).bxSlider({	
					mode: 'vertical',
					slideWidth: 60,
					slideMargin: 10,	
					minSlides: 1,
 					maxSlides: 5,
					pager: false,
					moveSlides:1,
					hideControlOnEnd: true,
					infiniteLoop: false
				});	 
			}
		}		
	});	
}
jQuery(document).ready(function($){
	jQuery('#header .topbar .right .block').each(function(){
		jQuery(this).children("a").hover (function() {
			jQuery(this).addClass('hover');
			jQuery(this).next().css("display","block").stop().animate({
					'opacity': 1
				}, 150);				
		});
		jQuery(this).mouseleave (function() {
			jQuery(this).children("a").removeClass('hover');
			jQuery(this).children("a").next().css("display","none").stop().animate({
					'opacity': 0
				}, 150);				
		});						
	});
	jQuery('#nav  ul  li').each(function(){
		if (jQuery("ul",this).length) {
			jQuery(this).children("a").addClass("item-haschild")
		}
		jQuery('#nav  > ul > li').children("a").hover (function() {
			jQuery(this).addClass('hover');
			jQuery(this).next().css("display","block").stop().animate({
					'opacity': 1
				}, 150);				
		});
		jQuery('#nav  > ul > li').mouseleave (function() {
			jQuery(this).children("a").removeClass('hover');
			jQuery(this).children("a").next().css("display","none").stop().animate({
					'opacity': 0
				}, 150);				
		});			
		jQuery("ul > li > a",this).click (function() {
			jQuery(this).toggleClass('hover');		
			jQuery(this).next().slideToggle();	
		});						
	});
	jQuery('#header .navbar .search').each(function(){
		jQuery(".btnshowsearch",this).click (function() {	
			if(jQuery('#nav').hasClass('in')) {
				jQuery('#nav').removeClass('in')
			}		
			jQuery(this).next().slideToggle();
		});				
	});
	jQuery('.navbar .navbar-toggle').each(function(){
		jQuery(this).click (function() {	
			if(jQuery('#header .navbar .search .inner').is(':visible')) {
				jQuery('#header .navbar .search .inner').hide();
			}	
			var text = jQuery(this).next('span').text();
			jQuery(this).next('span').text(text == "ĐÓNG" ? "DANH MỤC SẢN PHẨM" : "ĐÓNG");	
		});		
	});	
	jQuery('.feature-adv .slider ul').each(function(){
		if (jQuery("li",this).length > 1) {		
			jQuery("li",this).css("display","block") ;	
			slider = $(this).bxSlider({											
				pager: false,
				controls: true,
				moveSlides:1,
				hideControlOnEnd: true,
				infiniteLoop: false,
				auto: false			
			});	
		}
	});
	jQuery('#main').each(function(){
    	jQuery(this).css("min-height",jQuery(window).height()-jQuery('#footer').outerHeight()-jQuery('#header').outerHeight())	;	
  	});
	jQuery('.product-detail .photo').each(function(){
		
		$('.thumbs li a',this).click(function(e){
			e.preventDefault();
			var url = $(this).attr("href");
			$(".product-detail .photo .preview img").attr("src",url)
		})
	});
	productsSlider();
	thumbsSlider();
});
jQuery(window).resize(function() { 
	$(".product-detail .products").each(function(){
		if ($(this).has('.bx-wrapper')){
			$(".bx-viewport",this).find('*').removeAttr("style");
			$(".bx-viewport",this).find('*').removeAttr("aria-hidden");
			var html = $(".bx-viewport",this).html();
			$(".bx-wrapper",this).remove();
			$(this).html(html);
			
		}
	});	
	productsSlider();
	$(".product-detail .photo .thumbs .inner").each(function(){
		if ($(this).has('.bx-wrapper')){
			$(".bx-viewport",this).find('*').removeAttr("style");
			$(".bx-viewport",this).find('*').removeAttr("aria-hidden");
			var html = $(".bx-viewport",this).html();
			$(".bx-wrapper",this).remove();
			$(this).html(html);
			
		}
	});	
	thumbsSlider();
	jQuery('#main').each(function(){
    	jQuery(this).css("min-height",jQuery(window).height()-jQuery('#footer').outerHeight()-jQuery('#header').outerHeight())	;	
  	});
});

