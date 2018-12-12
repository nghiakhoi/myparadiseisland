function getOsVersion() {
    var agent = window.navigator.userAgent,
        start = agent.indexOf( 'OS ' );

    if ( /iphone|ipod|ipad|iPhone|iPod|iPad/.test( agent ) && start > -1 ) {
        return window.Number( agent.substr( start + 3, 3 ).replace( '_', '.' ) );
    } else {
        return 0;
    };
};
function getAndroidVersion() {
    var agent = window.navigator.userAgent,
        start = agent.indexOf( 'Android ' );

    if ( start > -1 ) {
        return window.Number( agent.substr( start + 8, 3 ).replace( '_', '.' ) );
    } else {
        return 0;
    };
};

function changeOrientation(){
	$(window).trigger('resize');
}

window.onorientationchange = function() {
	setTimeout(changeOrientation, 500);
}

$(document).ready(function(){

	window.scrollTo(0, 1);

	if (!disable_fixed_height) {
		if (getOsVersion() >= 5 || getOsVersion() == 0) {
			$(window).resize(function () {
				var header_height = 42;
				var height_product_bar = $("#bar-product-buy").height();
				if (height_product_bar > 0) {
					$('#page_content').css('overflow', 'hidden');
					$('.nav_footer').css('display', 'none');
					$('.box_adress').css('display', 'none');
					$('.footer').css('display', 'none');
				}
				var view_port_height = window.innerHeight;
				// var view_nav_footer = $('.nav_footer').height();
				// var view_box_adress = $('.box_adress').height();
				// var view_footer = $('.footer').height();

				$('body').css('height', view_port_height + 'px');
				$('#page_content').css('height', (view_port_height - header_height) + 'px');

				$('#main_content_product').css('height', (view_port_height - height_product_bar - header_height) + 'px');

				if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
					var viewportmeta = document.querySelector('meta[name="viewport"]');
					if (viewportmeta) {
						viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
						document.body.addEventListener('gesturestart', function () {
							viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
						}, true);
					}
				}

				// alert('debug');
			});
			$(window).trigger('resize');
		} else if (getAndroidVersion() < 3 && getAndroidVersion() > 0) {
			$("body").css("overflow", "auto");
			$("#temp_page").css("position", "relative");
			$("#temp_page").css('z-index', 99);

		} else {
			$("body").css("overflow", "auto");
			$("#temp_page").css("position", "relative");
			$("#sidr-left, #sidr-right").css({
	//            'overflow': 'auto',
				'height': '10000px',
				'position': 'fixed',
				// 'margin-left': '-260px',
				'z-index': 99
			});
			if ($("#bar-product-buy").length > 0) {
				var bar_product_buy = $("#bar-product-buy").clone();
				bar_product_buy.css("margin-bottom", 0);
				$(".product-details").after(bar_product_buy);
			}
		}
	} else {
		$("#temp_page").css("position", "relative");
		// $("#temp_page").css("overflow-y", "scroll");
		$("#temp_page").css("-webkit-overflow-scrolling", "touch");
	}


    $('.home-select-city select, .box_choose_city select').customSelect();

    $('.icon-menu').sidr({
        name: 'sidr-left',
        side: 'left' // By default
    });
    $('.icon-account').sidr({
        name: 'sidr-right',
        side: 'right'
    });

    $("#header-city-form select").change(function() {
        $("#header-city-form").submit();
    });

    $("form[name='subscribe_form_first'] select").change(function() {
        $("form[name='subscribe_form_first']").submit();
    });

    //Init countdown for deal time
    if($('.product_timeout .key').length){
        $('.product_timeout .key').each(function(){
            $(this).countdown({
                until: $(this).attr('rel') - server_time,
                format: 'HMS',
                layout: '{hn}:{mn}:{sn}',
                expiryText: 'hết hạn'
            });
        });
    }

    //Init countdown for deal time
    if($(".box_times .remain_times").length){
        $(".box_times .remain_times").countdown({
                until: $(".box_times .remain_times").attr('rel'),
                format: 'HMS',
                layout: '<span>{hn}</span>:<span>{mn}</span>:<span>{sn}</span> ',
                expiryText: 'Hết Hạn'
        });
    }

    //Click change city on top page
    $("#choose").click(function () {
        $(".choose_city").slideToggle();
    })

    //Click on service menu
    $("#choose-service").click(function () {
        var status = ($(".listmenu").is(':hidden'));
        if(status) {
            $(".back-opacity").slideDown('fast');
        } else {
            $(".back-opacity").slideUp('fast');
        }

        $(".listmenu").slideToggle();
        $(".listmenu1").hide();
	$(".listmenu2").hide();
    })

    //Click on product menu
    $("#choose-product").click(function () {
        var status = ($(".listmenu1").is(':hidden'));
        if(status) {
            $(".back-opacity").slideDown('fast');
        } else {
            $(".back-opacity").slideUp('fast');
        }
        $(".listmenu1").slideToggle();
        $(".listmenu").hide();
	$(".listmenu2").hide();
    })

    //Click on product menu
    $("#choose-fashion").click(function () {
        var status = ($(".listmenu2").is(':hidden'));
        if(status) {
            $(".back-opacity").slideDown('fast');
        } else {
            $(".back-opacity").slideUp('fast');
        }
        $(".listmenu2").slideToggle();
	$(".listmenu1").hide();
        $(".listmenu").hide();
    })

    //Lazy load images on list deal page
    if($(".product_image img.lazy").length) {
        $(".product_image img.lazy").lazyload({
                effect: "fadeIn",
                effectspeed: 180
        });
    }

    $(".lazy").lazyload({
        effect: "fadeIn",
        effectspeed: 180,
        threshold: 900,
        container: "#page_content"
    }).removeClass("lazy");

    $(document).ajaxStop(function(){
        $(".lazy").lazyload({
            effect: "fadeIn",
            effectspeed: 180,
            threshold: 900,
            container: "#page_content"
        }).removeClass("lazy");
    });

    //Change tab in deal detail page
    $(".tab_desc li a").each(function(){
        $(this).click(function(){
            $(".tab_desc li a").removeClass("current");
            $(this).addClass("current");

            $(".tab").hide();
            $("#" + $(this).attr('id') + "c").show();
        })
    })

    //See more detail in deal detail page
    var backDetail = "";
    $("#see_more").click(function(){
        $(".box1").hide();
        $(".deal-content").fadeIn("slow");
        backDetail = $(".bt_back").attr("href");

        $(".bt_back").attr("href", "javascript:;")
        $(".bt_back").click(function(){
            $(".box1").fadeIn("slow");
            $(".deal-content").hide();
            $(".bt_back").unbind('click');
            $(".bt_back").attr("href", backDetail);
            return false;
        })
    });

    //Show sku
    $(".sku_buy").click(function(){
        $(".anpha_sku").slideDown();
    });

    //Close sku
    $(".sku_close").click(function(){
        $(".anpha_sku").slideUp();
    });

    if($("#subscribe_form_footer").length) {
        $("#btn_register_email").click(function() {
            var email = $("#subscr_email_footer").val();
            if (email == '' || !fn_is_valid_email(email)) {
                    $("#register_error").html("Vui lòng nhập địa chỉ email hợp lệ.");
            }
            else {
                    $("form[name='subscribe_form_footer']").submit();
            }
            return false;
        });
    }

    $(".rslides").responsiveSlides({
		auto: false,
        nav: true
    });

    $('#accordion').accordion({
        header: 'h3',
        active: 4,
        alwaysOpen: false,
        autoheight: false,
        animated: false
    });

//    if($(".slide").length){
//        $("<img/>").attr("src",$(".slide:eq(0)").attr('src')).appendTo(".dealSlide");
//        $(".dealSlide img").hide();
//        $(".dealSlide img").fadeIn(1000);
//        $(".slide:eq(0)").addClass("activeSlide");
//
//        setInterval('nextSlide()',5000);
//
//        if($(".slide").length == 1) {
//            $(".icon_prove").hide();
//            $(".icon_next").hide();
//        }
//    }

    initGoTop();

	$(".login-social").click(function() {
		login_social_new_window($(this).attr('href'));
		return false;
	});

    $("#page_content").touchwipe({
        wipeLeft: function() {
            if ($("#sidr-left").css("display") == "block") {
                 $('.icon-menu').trigger('click');
            }
        },
        wipeRight: function() {
            if ($("#sidr-right").css("display") == "block") {
                $('.icon-account').trigger('click');
            }
        },
        min_move_x: 20,
		min_move_y: 20,
		preventDefaultEvents: false
    });


});

function closeOpenID(){
    if($('.rpxnow_lightbox').is(":visible")) {
        $('.rpxnow_lightbox').click(function(){
            $('.rpxnow_lightbox').hide();
        })
    } else {
        $('.rpxnow_lightbox').show();
    }
}

/*
function preSlide() {
    var numOfImg = $(".slide").length;
    if(numOfImg > 1) {
        var curObj = $(".activeSlide");
        var prevOjb = $(".activeSlide").prev();

        if(!prevOjb.length) {
            prevOjb =  $(".slide").eq(parseInt(numOfImg) - 1);
        }

        curObj.removeClass("activeSlide")
        $(".dealSlide img").animate({right: '-=3000'}, 500, function(){
            prevOjb.addClass("activeSlide");
            $(".dealSlide").html('');
            $("<img/>").attr("src",prevOjb.attr('src')).appendTo(".dealSlide");
            $(".dealSlide img").hide();
            $(".dealSlide img").fadeIn(1000);
        });



    }
}*/

/*
function nextSlide() {
    var numOfImg = $(".slide").length;
    if(numOfImg > 1) {
        var curObj = $(".activeSlide");
        var nextOjb = $(".activeSlide").next();

        if(!nextOjb.length) {
            nextOjb =  $(".slide").eq(0);
        }

        curObj.removeClass("activeSlide");
        $(".dealSlide img").animate({left: '-=3000'}, 500, function(){
            nextOjb.addClass("activeSlide");
            $(".dealSlide").html('');
            $("<img/>").attr("src",nextOjb.attr('src')).appendTo(".dealSlide");
            $(".dealSlide img").hide();
            $(".dealSlide img").fadeIn(1000);
        });


    }
}
*/

/*
 * Only allow type integer
 */
function checkNumInt(e)
{
    if (window.event)
        keycode = window.event.keyCode;
    else if (e)
        keycode = e.which;
    if (keycode>31 && (keycode < 48 || keycode > 57))
    {
        e.cancelBubble = true
        e.preventDefault? e.preventDefault() : e.returnValue = false;
    }
}

/*
 * Check email validate
 */
function fn_is_valid_email(email){
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return filter.test(email);
}

function initGoTop() {
     var scroll_timer;
//     $(window).scroll(function () {
//        window.clearTimeout(scroll_timer);
//        scroll_timer = window.setTimeout(function () {
//            if($(window).scrollTop() <= 10){
//                $(".bt_to_top").fadeOut(500);
//            } else {
//                $(".bt_to_top").fadeIn(500);
//            }
//        }, 100);
//    });

//	var nav_footer = $(".nav_footer").height();
//	var box_adress = $(".box_adress").height();
//	$('#main_content_product').scroll(function() {
//		if($(this)[0].scrollHeight - $(this).scrollTop() == $(this).outerHeight()) {
//			$(this).css("overflow-y", "hidden")
//		}
//	});

	$('#page_content').scroll(function() {
		window.clearTimeout(scroll_timer);
		scroll_timer = window.setTimeout(function() {
			if ($('#page_content').scrollTop() <= 10) {
				$(".bt_to_top").fadeOut(500);
//				$("#main_content_product").css("overflow-y", "scroll");
			} else {
				$(".bt_to_top").fadeIn(500);
//				$("#main_content_product").css("overflow-y", "hidden");
			}
		}, 100);
//		if ($('#page_content').scrollTop() <= 10) {
//			$("#main_content_product").css("overflow-y", "scroll");
//		}
//		else {
//			$("#main_content_product").css("overflow-y", "hidden");
//		}
	});

    $(".bt_to_top").click(function(){
		$('#page_content').animate({ scrollTop: 0 }, 'normal');
        $('html, body').animate({ scrollTop: 0 }, 'normal');
    })
}

//---------------------------------------------------------------
/**
 *
 * @param {Object} social
 */
function login_social_new_window(social)
{
	// open popup window
	var height = 500;
	var width = 800;

	social_new_window = window.open('/?dispatch=auth.socialconnect&social='+social, 'hotdeal.vn-connect-social', 'location=yes,status=yes,resizable=true,width=' + width + ',height=' + height);

	// focus popup
	social_new_window.window.focus();

	// close popup window and refresh page for access token
	popupMonitor = window.setTimeout(checkPopup, 500);

}

function checkPopup() {
	if(false == social_new_window.closed)
	{
		social_new_window.window.focus();
		popupMonitor = window.setTimeout(checkPopup, 500);
	}
	else
	{
		//this.window.location.reload();
		window.clearInterval();
	}
}

function check_popup_close() {
	this.window.location.reload();
}