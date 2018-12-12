<div class="margin">
<div class="content-helper clear">    
<div class="central-column">        
<div class="central-content">
<div class="cm-notification-container"></div>
<div class="mainbox-container">
<div class="mainbox-body">



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

<div id="content_general">
<h1>Đăng ký</h1>
<p class="mandatory-fields">Thông tin có <span class="required">*</span> là bắt buộc nhập, cần phải nhập.</p>
<form name="profile_form" action="<?php echo base_url();?>verify/dangkyuser" method="post">
<input id="selected_section" type="hidden" value="general" name="selected_section"/>
<input id="default_card_id" type="hidden" value="" name="default_cc"/>
<input type="hidden" name="profile_id" value="" />
<div class="border">
<div class="subheaders-group">
<br />
<h2 class="subheader">
Thông tin tài khoản
</h2>


<div class="form-field">
<label for="elm_150" class="cm-profile-field cm-required " style="margin-left:100px;">Tên đăng nhập:</label>
<input type="text" id="elm_150" name="tendangnhap" size="32" value="" class="input-text cm-skip-avail-switch"  onblur="clear_space('elm_150');"  />  
</div>

<div class="form-field">
<label for="password1" class="cm-required cm-password" style="margin-left:100px;">Mật khẩu:</label>
<div class="input-prepend">

<input type="password" id="password1" name="password" size="32" maxlength="32" value="" class="input-text cm-autocomplete-off" />
</div>
</div>
<div class="form-field">
<label for="password2" class="cm-required cm-password" style="margin-left:100px;">Nhập lại mật khẩu:</label>
<div class="input-prepend">

<input type="password" id="password2" name="password2" size="32" maxlength="32" value="" class="input-text cm-autocomplete-off" />
</div>
</div>

<div class="form-field">
<label for="email" class="cm-required cm-email cm-trim" style="margin-left:100px;">Email:</label>
<div class="input-prepend" >

<input type="text" id="email" name="email" size="32" maxlength="128" value="" class="input-text" />
</div>
</div>

<div class="form-field">
<label for="ngaysinh" class="cm-required" style="margin-left:100px;">Ngày sinh:</label>
<div class="input-prepend">

<input type="text" rev="ngaysinh" id="ngaysinh" name="ngaysinh" class="input-text-medium cm-calendar" value=""  size="10" />
<span class="add-on" style="border-radius:0 4px 4px 0;;"><i class="icon-calendar cm-external-focus calendar-but valign" rev="ngaysinh" title="Lịch" alt="Lịch"></i></span>
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
			
			dateFormat: 'dd/mm/yy'
		};

if (jQuery.ua.browser == 'Internet Explorer') {
	$(window).load(function(){
		$('#ngaysinh').datepicker(config);
	});
} else {
	$('#ngaysinh').datepicker(config);
}
//]]>
</script></div>            
<div class="form-field">
<label for="elm_42" class="cm-profile-field  " style="margin-left:100px;">Giới tính:</label>
<select id="elm_42" class="" name="gioitinh">
<option value="2">--</option>
<option  value="0">Nam</option>
<option  value="1">Nữ</option>
</select>
</div>
<br />
<h2 class="subheader">
Thông tin giao hàng
</h2>
<div class="form-field">
<label for="elm_15" class="cm-profile-field cm-required " style="margin-left:100px;">Họ tên:</label>
<input type="text" id="elm_15" name="hoten" size="32" value="" class="input-text cm-skip-avail-switch"  onblur="clear_space('elm_15');"  />  
</div>
<div class="form-field">
<label for="elm_50" class="cm-profile-field cm-required " style="margin-left:100px;">Tỉnh / Thành:</label>
<input type="text" id="elm_50" name="tinhthanh" size="32" value="" class="input-text cm-skip-avail-switch"    />  
</div>
<div class="form-field">
<label for="elm_51" class="cm-profile-field cm-required " style="margin-left:100px;">Quận / Huyện:</label>
<input type="text" id="elm_51" name="quanhuyen" size="32" value="" class="input-text cm-skip-avail-switch"    />  
</div>
<div class="form-field">
<label for="elm_52" class="cm-profile-field cm-required " style="margin-left:100px;">Phường / Xã:</label>
<input type="text" id="elm_52" name="phuongxa" size="32" value="" class="input-text cm-skip-avail-switch"    />  
</div>
<div class="form-field">
<label for="elm_53" class="cm-profile-field cm-required " style="margin-left:100px;">Số nhà:</label>
<input type="text" id="elm_53" name="sonha" size="32" value="" class="input-text cm-skip-avail-switch"    />  
</div>
<div class="form-field">
<label for="elm_54" class="cm-profile-field cm-required " style="margin-left:100px;">Đường:</label>
<input type="text" id="elm_54" name="duong" size="32" value="" class="input-text cm-skip-avail-switch"    />  
</div>

<div class="form-field">
<label for="elm_55" class="cm-profile-field cm-required  " style="margin-left:100px;">Điện thoại:</label>
<input type="text" onKeyPress="return isNumberKey(event)" id="elm_55" name="dienthoai" size="32" value="" class="input-text cm-skip-avail-switch"  onblur="clear_space('elm_31');"  />  
</div>

<script type="text/javascript">
		$(document).ready(function() {
			$("#elm_25").change(function() {
				$(".register_mail").attr("disabled", "disabled");
				if ($(this).val() == 437) {
					$("#register_mail_2").removeAttr("disabled");
				} else if ($(this).val() == 440) {
					$("#register_mail_3").removeAttr("disabled");
				}
			});
		});
	</script>
<input type="hidden" name="newsletter_format" value="2" />
<div class="buttons-container center">
<span   class="button-submit"><input   type="submit" name="dangky"  value="Đăng ký" /></span>
</div>
</div>
</div>
</form>
</div>
</div>
</div>  
</div>
</div>  
<div class="bottom clear-both">
<div class="wysiwyg-content">
<div style="background: #FFF; margin-top: 20px;" class="fb-like-box" data-href="http://www.facebook.com/dealhangviet" data-height="220" data-width="995" data-show-faces="true" data-stream="false" data-border-color="white" data-header="true"></div>
</div><div class="wysiwyg-content">
<div class="hidden"><a rel="publisher" href="https://plus.google.com/+hotdeal/">Find us on Google+</a></div>
</div>
</div>
</div>
</div>	
