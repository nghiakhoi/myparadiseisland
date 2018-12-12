/*process scroll*/
var window_scroll_top = 0;
var window_height = 0;
var div_body_offset_left = 0;
var div_body_offset_right = 0;
var div_body_offset_top = 0; 
var window_height_margin = 0;
var window_scroll_top_margin = 0;
var main_menu_scroll_top = 0;
var cur_path = window.location.href;
var is_clean_scroll = 0;
$(window).load(function() {
	$('.img_over').height($('#chitiet_tabs').height());

});
$(document).mouseup(function (e) {
    var container = $(".tab_bottom_section");

    if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                $('.tab_content').hide();
				$('.tab_name').show();
            }
});

$(document).ready(function() {
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
    //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0 ,
            }, scroll_top_duration
        );
    });

    $('.editor img').attr('style', '');
    $('.editor table').stacktable();
    $('.btn_capnhat').click(function(){
        $("#frm_lienhe").submit();
    });
	if((cur_path.indexOf("gio-hang") != -1))
	{
		is_clean_scroll = 1;
		$('.div_info_scroll').hide();
		$('.tab_bottom_section').attr('style', 'display: none');
	}

	$('.tab_name_full').click(function(){
		$(this).parent().parent().attr('style', '');
		$(this).parent().parent().find('.tab_name').show();
		$(this).parent().hide();
	});
	$('.tab_name').click(function(){
		$('.tab_content').hide();
		$('.tab_name').show();
		$('.tab_bottom').removeAttr('style');
		var content = $(this).parent().find('.tab_content');
		if(content.length != 0)
		{
			content.show();
			$(this).parent().attr('style', 'z-index: 1');
			$(this).hide();
		}
	});
	
	$('select[name=product_order_by]').change(function(){
		$(this).parents('form').submit();
	});

	
	/* Search */
	$('#txtsearch').keydown(function(e) {
		if (e.keyCode == 13) {
			$('.btnsearch').trigger("click");
		}
	});
	$('.btnsearch').click(function(){
		var keyword = $('#txtsearch').val();
			if(keyword.length < 2)
			{
				
				alert("Từ khóa quá ngắn. Xin nhập thêm.");
				$("#txtsearch").focus();
				return false;		
			}else{
				if(keyword){
					
					keyword = keyword.replace(/\s+/g,' ').replace(/\s+/g,'-');
					keyword = "/" + keyword;
				}else{
					
					keyword="";
					
				}
			}
			var category_se = $('.ul_header_search');
			var url_search = category_se.attr('role');

			if(url_search !== undefined && url_search != "")
			{
				url_search = base_url + "/#/" + url_search + keyword + ".html";	
			}
			else{
				url_search = base_url + "/#" + keyword + ".html";	;	
			}
		
		
			window.location = url_search;
	
	});
    $(".p_address_region_id").on('change',function(){
        var region_id = $(this).val();
        $(".p_address_region_id").val(region_id);
    });
    $(".p_address_city_id").on('change', function(){
        var city_id = $(this).val();
        var act = "checkout";
        var url = base_url + "/city-change.html";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                city_id: city_id,
                act: act
            },
            success:function(data){
                data = $.parseJSON(data);

                $(".p_address_dist_id").html(data.list_dist1);
                $(".p_address_region_id").html(data.list_region1);
                $('.giohang_fee_cod').html(data.fee_cod.fee_code_display);
                $('.giohang_total_price').html(data.fee_cod.giohang_total_price_display);
            }

        });
    });
    $(".p_address_dist_id").on('change',function(){
        var dist_id = $(this).val();
        var city_id = $('.p_address_city_id').val();
        var act = "checkout";
        var url = base_url + "/dist-change.html";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                city_id: city_id,
                dist_id: dist_id,
                act: act
            },
            success:function(data){
                data = $.parseJSON(data);

                $(".p_address_region_id").html(data.list_region1);
                $('.giohang_fee_cod').html(data.fee_cod.fee_code_display);
                $('.giohang_total_price').html(data.fee_cod.giohang_total_price_display);
            }

        });
    });
});
$(window).resize(function(){

});
/*End scroll*/

function processSlide()
{
	var img_main = $('.product-slide-main img');
	$('.slide-img-thumb').live('hover', function(){
		$('.product-slide-list li').removeClass('selected');

		img_main.attr('src', $(this).find('img').attr('src'));
		$(this).addClass('selected');

	});
	

	
}

var total_page_viewed = 1;
var viewed_page_cur = 1;
var total_page_cart_scroll = 1;
var viewed_page_cur_cart_scroll = 1;
var display_cart = 0;
var img_loading = '<img src="'+ base_url +'/static/images/loading_ajax.gif"/>';
function init_component_ajax()
{
	$.post(base_url + "/ajax/ajax_component_cache", function( data ) {
		var ajax_component = jQuery.parseJSON(data);
		var cart = ajax_component.cart_ajax_return;
		var user_info = ajax_component.user_info_ajax_return;
		init_cart_head(cart);
		init_user_login(user_info);
		init_cart_scroll(cart);
		//if(is_clean_scroll == 0)
		//{
		//	var total_product_viewed = ajax_component.total_product_viewed_ajax_return;
		//	init_product_viewed(total_product_viewed, list_product_viewed);
		//}
		
	});
}
function init_cart_head(cart)
{
	if(cart != undefined)
	{
		var total= cart.total;
		var list_product = cart.list_product;
		var html_list_product = '';
		if(total != undefined)
		{
			if(total.total_qty > 0)
			{
				$.each(list_product, function(index, value){

					html_list_product += '<li>\
						<div class="thumb">\
			                  <a href="' + value.product_link + '" target="_blank">\
			                  <img title="'+ value.product_name + '" alt="' + value.product_name + '" src="' + value.product_img + '" width="44px" height="44px">\
			                  </a>\
			            </div>\
			            <div class="caption">\
			              <p class="name">\
			                  <a href="' + value.product_link + '" target="_blank">'+value.product_name+'</a>\
			              </p>\
			              <p>Đơn giá: ' + value.product_price_display + 'đ</p>\
			              <p>Số lượng: ' + value.product_qty + '</p>\
			              <a class="i-delete" href="#" title="" onclick="removeItemCart(0,' + value.product_id + ')">Xóa</a>\
			            </div>\
			            </li>';

				});
                html_list_product = '<ul class="list">' + html_list_product + '</ul>';
				html_total = '<div class="bottom">\
								<div class="total">Tổng cộng: <strong>' + total.total_price_display +'đ</strong></div>\
							  <div class="button"><a class="button-1" href="'+base_url+'/gio-hang.html" title="">Thanh toán<span><i class="fa fa-angle-right"></i></span></a></div>\
							</div>';
				$('.shopinbag').html(html_list_product + html_total);
			}
		}
		if(total == undefined || total.total_qty == 0)
		{
			$('.shopinbag').html('<p>Giỏ hàng đang rỗng</p>');
			$('.cart_head_total_qty').html('0');	
		}
	}else{
		$('.shopinbag').html('<p>Giỏ hàng đang rỗng</p>');
		$('.cart_head_total_qty').html('0');	
	}

}
function init_cart_scroll(cart)
{

    if(cart != undefined) {

        var total = cart.total;
        var list_product = cart.list_product;
        var html_list_product = '';

        if(total != undefined) {

            if (total.total_qty > 0) {
                display_cart = 1;
                var total_product_cart = total.total_qty;
                total_page_cart_scroll = Math.ceil(total_product_cart / 4);
                var html_page = '<div class="viewed_page">\
				<span class="viewed_total_page">\
					<font class="viewed_page_cur">' + viewed_page_cur_cart_scroll + '</font>/<font class="viewed_total_page_cur">' + total_page_viewed + '</font>\
				</span>\
					<a class="page_pre_viewed nav_page_viewed" href="javascript:void(0)"><i class="fa fa-caret-left"></i></a>\
					<a class="page_next_viewed nav_page_viewed" href="javascript:void(0)"><i class="fa fa-caret-right"></i></a>\
				</div>\
				<div class="clear"></div>';
                var html_product_viewed = '';
                var html_list_ul = '';
                var i_temp = 0;
                var i_page = 1;
                $.each(list_product, function (index, value) {

                    var html_li = '<li>\
						<a class="viewed_thumb" href="' + value.product_link + '" target="_blank">\
							<img width="85" height="85" src="' + value.product_img + '"/>\
						</a>\
						<div class="viewed_info">\
							<p class="viewed_title">\
								<a href="' + value.product_link + '" target="_blank">\
									' + value.product_id + '-' + value.product_name + '\
								</a>\
							</p>\
							<p class="viewed_offer_price">\
								' + value.product_price_display + 'đ\
							</p>\
						</div>\
						</li>';
                    i_temp++;

                    html_product_viewed += html_li;
                    if (i_temp % 4 == 0 && i_page < total_page_cart_scroll) {

                        html_list_ul += '<ul class="ul_product_viewed_' + i_page + '" style="display:none">' + html_product_viewed + '</ul>';
                        i_page++;
                        html_product_viewed = '';

                    } else {
                        if (i_page == total_page_cart_scroll) {

                            if (i_temp == total_product_cart)
                                html_list_ul += '<ul class="ul_product_viewed_' + i_page + '" style="display:none">' + html_product_viewed + '</ul>';
                        }
                    }


                });

                if (total_product_cart > 0) {
                    if (total_page_cart_scroll > 1) {
                        html_list_ul = html_list_ul + html_page;
                    }

                    $('.cart_scroll .list_product').html(html_list_ul);
                    $('.viewed_page_cur').html(viewed_page_cur_cart_scroll);
                    $('.ul_product_viewed_1').show();
                } else {
                    $('.cart_scroll .list_product').html('');
                }
            }
        }
    }else{

    }

}
function init_product_viewed(total, list_product_viewed)
{
	if(list_product_viewed != undefined)
	{

	var total_product_viewed = total;
		total_page_viewed = Math.ceil(total_product_viewed/4);
		var html_page = '<div class="viewed_page">\
				<span class="viewed_total_page">\
					<font class="viewed_page_cur">' + viewed_page_cur + '</font>/<font class="viewed_total_page_cur">' + total_page_viewed + '</font>\
				</span>\
					<a class="page_pre_viewed nav_page_viewed" href="javascript:void(0)"><i class="fa fa-caret-left"></i></a>\
					<a class="page_next_viewed nav_page_viewed" href="javascript:void(0)"><i class="fa fa-caret-right"></i></a>\
				</div>\
				<div class="clear"></div>';
		var html_product_viewed = '' ;
		var html_list_ul = '';
		var i_temp = 0;
		var i_page = 1;
		$.each(list_product_viewed, function(index, value){
			var html_li = '<li>\
						<a class="viewed_thumb" href="' + value.product_link + '" target="_blank">\
							<img width="85" height="85" src="' + value.product_img + '"/>\
						</a>\
						<div class="viewed_info">\
							<p class="viewed_title">\
								<a href="' + value.product_link + '" target="_blank">\
									' + value.product_id + '-' + value.product_name + '\
								</a>\
							</p>\
							<p class="viewed_normal_price">\
								' + value.product_price_normal_display + 'đ\
							</p>\
							<p class="viewed_offer_price">\
								' + value.product_price_display + 'đ\
							</p>\
						</div>\
						</li>';
			i_temp ++;
			html_product_viewed += html_li;
			if(i_temp%4 == 0 && i_page < total_page_viewed)
			{
				html_list_ul += '<ul class="ul_product_viewed_'+ i_page + '" style="display:none">' + html_product_viewed + '</ul>';
				i_page++;
				html_product_viewed = '';
			
			}else{
				
				if(i_page == total_page_viewed)
				{
				
					if(i_temp == total_product_viewed)
					html_list_ul += '<ul class="ul_product_viewed_'+ i_page + '" style="display:none">' + html_product_viewed + '</ul>';
				}
			}

		
		});
		if(total_product_viewed > 0)
		{
			if(total_page_viewed > 1){
				html_list_ul = html_list_ul + html_page;
			}
			$('.product_viewed .list_product').html(html_list_ul);
			$('.viewed_page_cur').html(viewed_page_cur);
			$('.ul_product_viewed_1').show();
		}else{
			$('.product_viewed .list_product').html('');
		}
        if(display_cart == 1)
        {
            $('.product_viewed .list_product').hide();
        }
	}

}

function init_user_login(user_info)
{
	$('.user_name_display').html(img_loading);
	var html_login = $('.expandlogin').html();
	var html_logged = $('.logged').html();
    var userDisplay = $('.user_name_display');
	if(user_info != undefined)
	{
        userDisplay.html('Chào, ' + user_info.user_name);
        userDisplay.attr('href', base_url + '/tai-khoan/thong-tin-tai-khoan.html');
		$('.expandlogin').remove();
	}else{
        userDisplay.html('Đăng nhập');
        userDisplay.attr('href', '#');
		$('.expandlogin').html(html_login);
	}
}
function process_product_viewed(init , act)
{
	if(init)
	{

		$.post( base_url + "/product/product_viewed", function( data ) {
			var list_product_viewed = jQuery.parseJSON(data);
			
			var total_product_viewed = Object.keys(list_product_viewed).length;
		total_page_viewed = Math.ceil(total_product_viewed/4);
		var html_page = '<div class="viewed_page">\
				<span class="viewed_total_page">\
					<font class="viewed_page_cur">' + viewed_page_cur + '</font>/<font class="viewed_total_page_cur">' + total_page_viewed + '</font>\
				</span>\
					<a class="page_pre_viewed nav_page_viewed" href="javascript:void(0)"><i class="fa fa-caret-left"></i></a>\
					<a class="page_next_viewed nav_page_viewed" href="javascript:void(0)"><i class="fa fa-caret-right"></i></a>\
				</div>\
				<div class="clear"></div>';
		var html_product_viewed = '' ;
		var html_list_ul = '';
		var i_temp = 0;
		var i_page = 1;
		$.each(list_product_viewed, function(index, value){
			var html_li = '<li>\
						<a class="viewed_thumb" href="' + value.product_link + '">\
							<img width="85" height="85" src="' + value.product_img + '"/>\
						</a>\
						<div class="viewed_info">\
							<p class="viewed_title">\
								<a href="' + value.product_link + '">\
									' + value.product_id + '-' + value.product_name + '\
								</a>\
							</p>\
							<p class="viewed_normal_price">\
								' + value.product_price_normal_display + 'đ\
							</p>\
							<p class="viewed_offer_price">\
								' + value.product_price_display + 'đ\
							</p>\
						</div>\
						</li>';
			i_temp ++;
			html_product_viewed += html_li;
			if(i_temp%4 == 0 && i_page < total_page_viewed)
			{
				html_list_ul += '<ul class="ul_product_viewed_'+ i_page + '" style="display:none">' + html_product_viewed + '</ul>';
				i_page++;
				html_product_viewed = '';
			}else{
				if(i_page == total_page_viewed)
				{
					if(i_temp == total_product_viewed)
					html_list_ul += '<ul class="ul_product_viewed_'+ i_page + '" style="display:none">' + html_product_viewed + '</ul>';
				}
			}

		
		});
		if(total_product_viewed > 0)
		{
			$('.product_viewed .list_product').html(html_list_ul + html_page);
			$('.viewed_page_cur').html(viewed_page_cur);
			$('.ul_product_viewed_1').show();
		}else{
			$('.product_viewed .list_product').html('');
		}
		

		});
		
		
	}else{
		if(act == 'next'){
			if(viewed_page_cur < total_page_viewed)
			{
				$('.ul_product_viewed_' + viewed_page_cur +'').hide();
				viewed_page_cur++;
				$('.ul_product_viewed_'+viewed_page_cur+'').show();
				$('.viewed_page_cur').html(viewed_page_cur);
			}

		}else{
			if(viewed_page_cur > 1)
			{
				$('.ul_product_viewed_' + viewed_page_cur + '').hide();
				viewed_page_cur--;
				$('.ul_product_viewed_' + viewed_page_cur + '').show();
				$('.viewed_page_cur').html(viewed_page_cur);
			}

		}
	}
}
function getURLVar(key) {
	var value = [];
	
	var query = String(document.location).split('?');
	
	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');
			
			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}
		
		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
} 

Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};
function sub_email(gender){
	var email = $('.inp_email_sub').val();
	if(!isValidEmailAddress(email))
	{
		$('.email_sub_msg').removeClass('msg_error').removeClass('msg_success');
		$('.email_sub_msg').addClass('msg_error').text('Email không đúng!');
		$('.email_sub_msg').show();
		return;
	}
	$.post(base_url + "/ajax/email_sub", {email: email, gender: gender},function(data) {	
		var data = jQuery.parseJSON(data);
		if(!data['error'])
		{
			$('.email_sub_msg').removeClass('msg_error').removeClass('msg_success');
			$('.email_sub_msg').addClass('msg_success').text(data['msg_error']);
			$('.email_sub_msg').show();
			$('.inp_email_sub').val('');
		}else{
			$('.email_sub_msg').removeClass('msg_error').removeClass('msg_success');
			$('.email_sub_msg').addClass('msg_error').text(data['msg_error']);
			$('.email_sub_msg').show();
		}
	});
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
function addToCart(product_id, qty, option) {
    qty = typeof(qty) != 'undefined' ? qty : 1;
    option =  typeof(option) != 'undefined' ? option : "";
    var url = "";
    if(jQuery.isNumeric(qty))
    {
        if(qty >= 1)
        {
            url = base_url + '/gio-hang/them-san-pham.html';

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    product_id: product_id,
                    item_qty_se: qty,
                    item_option_se: option,
                    act: "plus",
                    type_view: "total_price"
                },
                success:function(data){
                    $('#cart').html(data);
                    window.location = base_url + "/gio-hang.html";
                }

            });
        }else{
            alert("Xin nhập đúng số lượng 1");
        }

    }else{
        alert("Xin nhập đúng số lượng");
    }
}
function removeItemCart(key, product_id){
    var url = base_url + '/gio-hang/them-san-pham.html';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            product_id:product_id,
            key: key,
            item_qty_se: 0,
            act: "remove",
            type_view: "view_cart"

        },
        success:function(data){
            data = $.parseJSON(data);
            $('.shopinbag').html(data.cart_head);
        }
    });
}

