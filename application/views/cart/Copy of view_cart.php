		
		
		
<div class="margin">
<div class="content-helper clear">    
<div class="central-column" style="width:100%; max-width:996px">        
<div class="central-content">
<div class="cm-notification-container"></div>
<div class="mainbox-container">
<h1 class="mainbox-title"><span><span class="secure-page-title">Thanh toán</span></span></h1>
<div class="mainbox-body">
<script type="text/javascript" src="/js/exceptions.js"></script>
<script type="text/javascript" src="/js/cc_validator.js"></script>
<div class="disable-menu-top">&nbsp;</div>
<h1>Thanh toán</h1>
<script type="text/javascript">
    //<![CDATA[
	//]]>
</script>
<a name="checkout_top"></a>
<script type="text/javascript">
//<![CDATA[

var default_country = 'VN';


var zip_validators = {
	US: {
		regex: /^(\d{5})(-\d{4})?$/,
		format: '01342 (01342-5678)'
	},
	CA: {
		regex: /^(\w{3} ?\w{3})$/,
		format: 'K1A OB1 (K1AOB1)'
	}
}


var states = new Array();

//]]>
</script>
<script type="text/javascript" src="/js/profiles_scripts.js"></script>
<div class="checkout-steps clear cm-save-fields" id="checkout_steps">
<div style="border: 1px solid #DDDDDD; margin-top:5px; float:left" class="bg_step_row_first "  id="step_one">											
<div class="per_step_row2 float-left">
<h2 class="step-title">
<span class="float-left">1.</span>
<span>Deal có trong Đơn hàng</span>
</h2>
<div  class="">
<div class="clear">
<div class="order_product float-left">
<div>
<div class="cart_product_item">
<div class="float-left product_thumb">
<img  class="  "   id="det_img_627740075" src="http://images.hotdeals.vn/images/thumbnails/524/126/126/98102_0_feature_1.jpg" width="126" height="126" alt="Bếp Hồng Ngoại Fujicook HC68"  border="0" />								
</div>
<div class="order_product_shortname float-left">
<table width="100%" height="126px" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<a class="product-title">Bếp Hồng Ngoại Fujicook HC68</a>
</td>
</tr>
</table>					
</div>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_code">
<label>Mã SKU : </label>
<span class="float-right">98102</span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_price">
<label>Giá bán : </label>
<span class="float-right">1.159.000 VNĐ</span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_price">
<label>Giảm giá : </label>
<span class="float-right">0 VNĐ</span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_quantity">
<form name="step_three_block_cart_form" class="cm-ajax" action="/ho-chi-minh/" method="post" enctype="multipart/form-data">
<label>Số lượng: </label>
<div id="step_three_block_cart">
<input type="hidden" name="redirect_mode" value="checkout" />
<input type="hidden" name="result_ids" value="checkout_steps" />
<input type="hidden" name="cart_step" value="4" />
<span id="wrap_button_cart" class="button-submit hidden"><input id="button_cart_update_1840518512" type="submit" name="dispatch[checkout.update]" value="Cập nhật"></span>
<div class="quantity cm-reload-" id="quantity_update_" style="display: inline;">
<input type="hidden" name="cart_products[1840518512][product_id]" value="98102" />
<select name="cart_products[1840518512][amount]" id="amount_1840518512" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
<input type="hidden" value="1" id="txt_qty_tmp_1840518512" />
<!--quantity_update_-->
</div>
<!--step_three_block_cart--></div>
</form>										</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_quantity">
<label>Thành tiền:</label>
<span class="float-right"><strong>1.159.000&nbsp;VNĐ</strong></span>
</div>
</div>
<div style="margin-bottom: 20px;display: inline-block;"></div>
<div class="clear"></div>		
</div>	                
</div>
</div>	</div>
<div class="per_step_row2 float-left">
<h2 class="step-title">
<span class="float-left">2.</span>
<span>Địa chỉ giao hàng</span>
</h2>
</div>
<div class="order_shipping_method float-left per_step_row">
<h2 class="step-title">
<span class="float-left">3.</span>
<span class="title">Thanh toán và vận chuyển</span>
</h2>
</div>
<div class="step_row_first_login">
<div class="step_one_content_padding">
<div id="step_one_body" class="step-body-active">
<div id="step_one_login">
<div class="clear">
<script type="text/javascript">
//<![CDATA[

function fn_switch_checkout_type(status)
{
			
		if (status == true) {
			$('#step_one_register').show();
		} else {
			$('#step_one_anonymous_checkout').show();
		}
		$('#step_one_login').hide();
		
	}
//]]>
</script>
<table cellpadding="0" cellspacing="0" border="0" class="login-table">
<tr valign="top">
<td colspan="2">
<div class="step_one_login_title">
Bạn cần đăng nhập trước khi thanh toán
</div>
</td>
</tr>
<tr valign="top">
<td width="50%" class="login-form">
<div>
<form name="step_one_login_form" action="/ho-chi-minh/" method="post">
<input type="hidden" name="form_name" value="step_one_login_form" />
<input type="hidden" name="return_url" value="index.php?dispatch=checkout.checkout" />
<div class="form-field">	
<label for="login_checkout" class="cm-required cm-trim cm-email">Email:</label>
<input type="text" id="login_checkout" name="user_login" size="30" value="" class="input-text cm-focus" placeholder="Email" />
</div>
<div class="form-field">
<label for="psw_checkout" class="cm-required">Mật khẩu:</label>
<input type="password" id="psw_checkout" name="password" size="30" value="" class="input-text password" placeholder="Mật khẩu" />
</div>
<div class="float-left">
<input style="margin-top: -1px" class="valign checkbox" type="checkbox" name="remember_me" id="remember_me_checkout" value="Y" checked="checked" />
<label style="font-size: 12px" for="remember_me_checkout" class="valign">Nhớ trạng thái đăng nhập</label>
</div>
<div class="clear" style="float: left;">
<div class="float-left clear-both btn_login_checkout">
<span   class="button-submit-action"><input   type="submit" name="dispatch[auth.login]"  value="Đăng nhập" /></span>
</div>
<div class="float-left" style="clear:both;">
<div class="box-social" style="width: 244px; border-radius: 4px; padding-bottom: 2px;">
<span class="social-title" style="margin-right: 25px;">Hoặc bằng tài khoản</span>
<a href="#" class="login-social social-facebook" id="login-facebook" style="padding-right: 4px !important;">&nbsp;</a>
<a href="#" class="login-social social-google" id="login-google" style="padding-right: 4px !important;">&nbsp;</a>
<a href="#" class="login-social social-yahoo" id="login-yahoo" style="padding-right: 4px !important;">&nbsp;</a>
</div>
</div>
</div>
<div class="clear-both checkout-not-account">
<label class="float-left checkout-title-not-account">Chưa có tài khoản</label>
<span class="btn-checkout-register float-right">
<a href="/thanh-toan?login_type=register" onclick="jQuery.processNotifications(); fn_switch_checkout_type(true); return false;" class="">Đăng ký</a>
</span>
</div>
</form>
</div>
</td>
<td width="50%" class="box-login-social">
<div class="clear-both title-login-with-social">Hoặc đăng nhập bằng</div>
<a class="login-social" id="login-facebook" href="#">
<div class="login-with-fb">
Tài khoản Facebook
</div>
</a>
<a class="login-social" id="login-google" href="#">
<div class="login-with-gplus">
Tài khoản Google
</div>
</a>
<a class="login-social" id="login-yahoo" href="#">
<div class="login-with-yahoo">
Tài khoản Yahoo
</div>
</a>
<div class="clear-both"></div>
</td>
</tr>
</table>					</div>
</div>
<div id="step_one_register" class="width50 hidden">
<div class="step_one_login_title">
Đăng ký tài khoản mới
</div>
<form name="step_one_register_form" class="cm-ajax" action="/ho-chi-minh/" method="post">
<input type="hidden" name="result_ids" value="checkout_steps,sign_io,checkout_cart" />
<input type="hidden" name="return_to" value="checkout" />
<input type="hidden" name="user_data[register_at_checkout]" value="Y" />
<div class="form-field">
<label for="email" class="cm-required cm-email cm-trim">Email:</label>
<div class="input-prepend">
<span class="add-on"><i class="icon-envelope"></i></span>
<input type="text" id="email" name="user_data[email]" size="32" maxlength="128" value="" class="input-text" />
</div>
</div>
<div class="form-field">
<label for="password1" class="cm-required cm-password">Mật khẩu:</label>
<div class="input-prepend">
<span class="add-on"><i class="icon-lock"></i></span>
<input type="password" id="password1" name="user_data[password1]" size="32" maxlength="32" value="" class="input-text cm-autocomplete-off" />
</div>
</div>
<div class="form-field">
<label for="password2" class="cm-required cm-password">Nhập lại mật khẩu:</label>
<div class="input-prepend">
<span class="add-on"><i class="icon-lock"></i></span>
<input type="password" id="password2" name="user_data[password2]" size="32" maxlength="32" value="" class="input-text cm-autocomplete-off" />
</div>
</div>
<div class="form-field">
<label for="birthday" class="cm-required">Ngày sinh:</label>
<div class="input-prepend">
<span class="add-on"><i class="icon-calendar cm-external-focus calendar-but valign" rev="birthday" title="Lịch" alt="Lịch"></i></span>
<input type="text" id="birthday" name="user_data[birthday]" class="input-text-medium cm-calendar" value=""  size="10" />
</div>
<script type="text/javascript">
//<![CDATA[

var config = {};
config = {
			changeMonth: true,
			duration: 'fast',
			changeYear: true,
			numberOfMonths: 1,
			selectOtherMonths: true,
			showOtherMonths: true,
			firstDay: 1,
			dayNames: ['CN', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
			monthNamesShort: ['Thg 1', 'Thg 2', 'Thg 3', 'Thg 4', 'Thg 5', 'Thg 6', 'Thg 7', 'Thg 8', 'Thg 9', 'Thg 10', 'Thg 11', 'Thg 12'],
			yearRange: '1902:2014',
			dateFormat: 'dd/mm/yy'
		};

if (jQuery.ua.browser == 'Internet Explorer') {
	$(window).load(function(){
		$('#birthday').datepicker(config);
	});
} else {
	$('#birthday').datepicker(config);
}
//]]>
</script></div>					
<div class="form-field">
<label for="elm_42" class="cm-profile-field  ">Giới tính:</label>
<select id="elm_42" class="" name="user_data[fields][42]">
<option value="">--</option>
<option  value="1">Nam</option>
<option  value="2">Nữ</option>
</select>
</div>
<div class="buttons-container margin-top clear-both btn-submit-register">
<span   class="button-submit"><input   type="submit" name="dispatch[checkout.add_profile]"  value="Tiếp tục" /></span>
&nbsp;hoặc&nbsp; 
<span class="button-tool"><a href="/thanh-toan" onclick="$('#step_one_register').hide(); $('#step_one_login').show(); return false;"  class="">Hủy bỏ</a></span>
</div>
</form>
</div>
</div>
</div>
</div>
<!--step_one--></div>		
<div style="border: 1px solid #DDDDDD; margin-top:5px; float:left" class="bg_step_row hidden">											<div class="per_step_row2 float-left"><h2 class="step-title">
<span class="float-left">1.</span>
<span>Deal có trong Đơn hàng</span>
</h2>
<div id="step_four_body" class="hidden">
<div class="clear">
<div class="order_product float-left">
<div>
<div class="cart_product_item">
<div class="float-left product_thumb">
<img  class="  "   id="det_img_1692129303" src="http://images.hotdeals.vn/images/thumbnails/524/126/126/98102_0_feature_1.jpg" width="126" height="126" alt="Bếp Hồng Ngoại Fujicook HC68"  border="0" />								
</div>
<div class="order_product_shortname float-left">
<table width="100%" height="126px" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<a class="product-title">Bếp Hồng Ngoại Fujicook HC68</a>
</td>
</tr>
</table>					
</div>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_code">
<label>Mã SKU : </label>
<span class="float-right">98102</span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_price">
<label>Giá bán : </label>
<span class="float-right">1.159.000 VNĐ</span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_price">
<label>Giảm giá : </label>
<span class="float-right">0 VNĐ</span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_quantity">
<form name="step_three_block_cart_form" class="cm-ajax" action="/ho-chi-minh/" method="post" enctype="multipart/form-data">
<label>Số lượng: </label>
<div id="step_three_block_cart">
<input type="hidden" name="redirect_mode" value="checkout" />
<input type="hidden" name="result_ids" value="checkout_steps" />
<input type="hidden" name="cart_step" value="4" />
<span id="wrap_button_cart" class="button-submit hidden"><input id="button_cart_update_1840518512" type="submit" name="dispatch[checkout.update]" value="Cập nhật"></span>
<div class="quantity cm-reload-" id="quantity_update_" style="display: inline;">
<input type="hidden" name="cart_products[1840518512][product_id]" value="98102" />
<select name="cart_products[1840518512][amount]" id="amount_1840518512" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
<input type="hidden" value="1" id="txt_qty_tmp_1840518512" />
<!--quantity_update_-->
</div>
<!--step_three_block_cart--></div>
</form>										</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_quantity">
<label>Thành tiền:</label>
<span class="float-right"><strong>1.159.000&nbsp;VNĐ</strong></span>
</div>
</div>
<div style="margin-bottom: 20px;display: inline-block;"></div>
<div class="clear"></div>		
</div>	                
</div>
</div></div>
<div class="per_step_row2" id="step_two">
<h2 class="step-title">
<span class="float-left">2.</span>
<span>Địa chỉ giao hàng</span>
</h2>
<div id="step_two_body" class="step-body hidden cm-skip-save-fields">
<div>
<form name="step_two_billing_address" class="cm-ajax cm-ajax-force" action="/ho-chi-minh/" method="get">
<input type="hidden" name="update_step" value="step_two" />
<input type="hidden" name="next_step" value="step_three" />
<input type="hidden" name="result_ids" value="checkout_steps,sign_io,checkout_cart" />
<input type="hidden" name="dispatch" value="checkout.checkout" />
<div class="step-complete-wrapper multiple-profiles">
<input type="hidden" id="profile_name" name="user_data[profile_name]" value="Main" />
</div>
<div class="step-complete-wrapper clear">
<strong class="float-left">Địa chỉ giao hàng: &nbsp;</strong>
<div class="overflow-hidden shipping-address">
</div>
</div>
</form>
</div>
</div>
<!--step_two--></div>		
<div class="order_shipping_method float-left per_step_row">
<h2 class="step-title">
<span class="float-left">3.</span>
<span class="title"
>Thanh toán và vận chuyển</span>
</h2>
<div class="per_step_row_body hidden">
<label></label>
<label class="title_select_method">Chọn hình thức giao hàng</label>
<script type="text/javascript">
	//<![CDATA[
	function fn_calculate_total_shipping_cost() {
		params = [];
		parents = $('#shipping_rates_list');
		radio = $(':radio:checked', parents);

		jQuery.each(radio, function(id, elm) {
			params.push({name: elm.name, value: elm.value});
		});

		url = fn_url('checkout.calculate_total_shipping_cost');

		for (i in params) {
			url += '&' + params[i]['name'] + '=' + escape(params[i]['value']);
		}

		jQuery.ajaxRequest(url, {
			result_ids: 'shipping_rates_list',
			method: 'post'
		});
	}
	//]]>
	</script>
<div class="overflow-hidden " id="shipping_rates_list">
<p>
Giao hàng miễn phí                                        </p>
<!--shipping_rates_list--></div>
<div class="bottom_line_methods">&nbsp;</div>		
<label></label>
<label class="title_select_method method_power_by_onpay">
<span class="float-left">Chọn hình thức thanh toán</span>
<span class="power_by_onepay"></span>
</label>
<div class="clear-both"></div>
<div id="payments_summary">
<table cellpadding="0" cellspacing="0" border="0" id="list_payment_methods" width="100%">
<tr>
<td>
<input type="radio" id="payment_method_6" 										   class="radio" onclick="jQuery.ajaxRequest('/index.php?dispatch=checkout.order_info&amp;payment_id=6', {method: 'POST', cache: false, result_ids: 'checkout_steps'});" 
name="payment_id" value="6" 
/>
</td>
<td>
<label id="payment_method_6_label" for="payment_method_6">Thanh toán tiền mặt (miễn phí)</label></td>
<td>&nbsp;</td>
<td></td>
</tr>
<tr>
<td>
<input type="radio" id="payment_method_13" 										   class="radio" onclick="jQuery.ajaxRequest('/index.php?dispatch=checkout.order_info&amp;payment_id=13', {method: 'POST', cache: false, result_ids: 'checkout_steps'});" 
name="payment_id" value="13" 
checked="checked"
/>
</td>
<td>
<label id="payment_method_13_label" for="payment_method_13"  class="strong 13 13">Thẻ ATM ngân hàng nội địa (miễn phí)</label></td>
<td>&nbsp;</td>
<td></td>
</tr>
<tr>
<td>
<input type="radio" id="payment_method_14" 										   class="radio" onclick="jQuery.ajaxRequest('/index.php?dispatch=checkout.order_info&amp;payment_id=14', {method: 'POST', cache: false, result_ids: 'checkout_steps'});" 
name="payment_id" value="14" 
/>
</td>
<td>
<label id="payment_method_14_label" for="payment_method_14">Thẻ Visa/Master Card (miễn phí)</label></td>
<td>&nbsp;</td>
<td></td>
</tr>
<tr>
<td>
<input type="radio" id="payment_method_12" 										   class="radio" onclick="jQuery.ajaxRequest('/index.php?dispatch=checkout.order_info&amp;payment_id=12', {method: 'POST', cache: false, result_ids: 'checkout_steps'});" 
name="payment_id" value="12" 
/>
</td>
<td>
<label id="payment_method_12_label" for="payment_method_12">Chuyển khoản ngân hàng</label></td>
<td>&nbsp;</td>
<td></td>
</tr>
</table>
<!--payments_summary--></div>	    		
</div>
</div>		
</div>									
<div class="clear"></div>
<div id="step_three step-title" class="checkout_comment_and_place_order hidden">    
<div class="clear bg_step_row_bottom_nd"></div>
<div id="step_three_body" class="hidden">
<div class="clear">
</div>
</div>
<!--step_three--></div>		
<!--checkout_steps--></div>
<script type="text/javascript" language="javascript">
	//<![CDATA[
		var container = {};
		container = $('.error-box-container');
		
		if (!container.length) {
			container = $('.notification-content');
		}
		if (container.length) {
			$.scrollToElm(container);
		} else {
			$.scrollToElm($('.step-container-active'));
		}
	//]]>
	</script>
</div>
</div>  
</div>
</div>  
</div>
</div>	

	