<?php
    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'width'          => '10px',
						'class'        => 'inputbox',
                    );
    $password = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'class'        => 'inputbox',
                    );
    $submit = array(
                        "name"=>"ok",
                        "value"=>"Đăng Nhập",
						'class'        => 'button',
                    );
?>


		
<div class="step_row_first_login">
<div class="step_one_content_padding" style="height:452px;">
<span   class="button-submit-action"><a href="<?php echo base_url();?>cgiohangno" target="_parent"><input   type="button"   value="Không có tài khoản? ĐẶT HÀNG NGAY không cần tài khoản!!!" /></a></span>
<div id="step_one_body" class="step-body-active" style="height:250px;">
<div id="step_one_login">
<div class="clear">

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
<form  action="<?php echo base_url();?>verify/loginuser" method="post">

<div class="form-field">	
<label for="login_checkout" class="cm-required cm-trim cm-email">Tài khoản:</label>
<input type="text"  name="username" size="30" value="" class="input-text cm-focus" placeholder="Tài khoản" />
</div>
<div class="form-field">
<label for="psw_checkout" class="cm-required">Mật khẩu:</label>
<input type="password"  name="password" size="30" value="" class="input-text password" placeholder="Mật khẩu" />
</div>

<div class="clear" style="float: left;">
<div class="float-left clear-both btn_login_checkout">
<span   class="button-submit-action"><input   type="submit" name="ok"  value="Đăng nhập" /></span>
</div>

</div>
</div>
<div class="clear-both checkout-not-account">
<label class="float-left checkout-title-not-account">Chưa có tài khoản</label>
<span class="btn-checkout-register float-right">
<a href="<?php echo base_url();?>ctrangchu/dangky" class="">Đăng ký</a>
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

</div>
</div>		