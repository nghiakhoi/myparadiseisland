<?php session_start();
$_SESSION['phivanchuyen']=0;
$_SESSION['thanhtien']=$this->cart->total();
$_SESSION['tongtientam1']=$this->cart->total();
//echo $_SESSION['tongtientam1'];
?>
<script>


$(document).ready(
            function() {
                
                 $("#soluong").change(function(){
				 a = $("#soluong").val();
				 b = <?php foreach($info2 as $key) echo $key['price'];?>;
				 c = $("#tinhthanh").val();
	$("#txtHint1").load('<?php echo base_url();?>index.php/ajax/ajax_level4/?soluong='+a+'&'+'dongia='+b+'&'+'vanchuyen='+c);
	
});   

$("#tinhthanh").change(function(){
				 a = $("#soluong").val();
				 b = <?php foreach($info2 as $key) echo $key['price'];?>;
				 c = $("#tinhthanh").val();
	$("#txtHint1").load('<?php echo base_url();?>index.php/ajax/ajax_level4/?soluong='+a+'&'+'dongia='+b+'&'+'vanchuyen='+c);
	$("#txtHint4").load('<?php echo base_url();?>index.php/ajax/ajax_level8/?vanchuyen='+c);
	
});   
 
$("#thaydoithongtin").click(function(){
	$("#step_three").addClass("anthanhtoan");			 
	
	
});  


	
$( ".chon" ).on({
click: function() {
$( '.test' ).removeClass( "dobong" );
$( this ).toggleClass( "dobong" );
}
});
                
            });

</script>



<script>
function showUser() {
	var giatri1 = document.getElementById('soluong').value;
	var giatri2 = document.getElementById('iddong').value;
	var p1="soluong="+giatri1;
	var p2="iddong="+giatri2;
	var p=p1+"&"+p2;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level3/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>

<script>
function laytinhthanh() {
	var giatri1 = document.getElementById('tinhthanh').value;
	
	var p1="tinhthanh="+giatri1;
	
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level6/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p1);
}


</script>

<script>
function layphuongxa() {
	var giatri1 = document.getElementById('quanhuyen').value;
	
	var p1="quanhuyen="+giatri1;
	
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level7/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p1);
}


</script>

<script>
function showUser1() {
	var giatri1 = document.getElementById('soluong').value;
	var giatri2 = document.getElementById('iddong').value;
	var p1="soluong="+giatri1;
	var p2="iddong="+giatri2;
	var z=p1+"&"+p2;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("chinhsua").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level5',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(z);
}


</script>



	

	
<div class="margin">
<div class="content-helper clear"> 

<div class="detail-breadcrumb">
<div class="detail-breadcrumb-inner">
<div class="row">
<div class="span6">
<div class="breadcrumbs breadcrumb">

</div>
</div>
<div class="span6" style="margin-top:-px;">
<div class="yahoo" style="float: right; margin-left: 10px; ">
<a href="ymsgr:sendim?hnghiakhoi" style="color: #333;"><img class="yahoo-icon" src="images/online-yahoo.gif" org-src="http://opi.yahoo.com/online?u=hnghiakhoi&t=5" alt="" style="vertical-align: -1px;margin-right: 4px;">Hỗ trợ 1</a>
<a href="ymsgr:sendim?hnghiakhoi" style="padding-left: 7px;color: #000;"><img class="yahoo-icon" src="images/online-yahoo.gif" org-src="http://opi.yahoo.com/online?u=hnghiakhoi&t=5" alt="" style="vertical-align: -1px;margin-right: 4px;">Hỗ trợ 2</a>
</div>
<div class="phone">
<strong>093 882 9969</strong>
</div>

</div>
</div>
</div>
</div>

<h1 class="mainbox-title"><span><span class="secure-page-title"><a name="p1"></a>Thanh toán</span></span></h1>   
<div class="central-column" style="width:100%; max-width:996px">        
<div class="central-content">
<div class="cm-notification-container"></div>
<div class="mainbox-container" style="margin-top:200px;">

<div class="mainbox-body">

<div class="disable-menu-top">&nbsp;</div>





<div class="checkout-steps clear cm-save-fields" id="checkout_steps">
<div style="border: 1px solid #DDDDDD; margin-left:-12px; float:left; width:103%; " class="bg_step_row_first "  id="step_one">											
<div class="per_step_row2 float-left">
<h2 class="step-title">
<span class="float-left">1.</span>
<span>Deal có trong Đơn hàng</span>
</h2>
<div  class="">
<div class="clear">
<div class="order_product float-left">

<?php //print_r($info2);?>
<?php foreach ($info2 as $items){?>
<div>
<div class="cart_product_item">
<div class="float-left product_thumb">
<img  src="<?php echo base_url();?>uploads/<?php echo $items['hinhanh'];?>" width="126" height="126" alt="Bếp Hồng Ngoại Fujicook HC68"  border="0" />								
</div>
<div class="order_product_shortname float-left">
<table width="100%" height="126px" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<a class="product-title"><?php echo $items['name'];?></a>
</td>
</tr>
</table>					
</div>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_code">
<label>Mã sản phẩm : </label>
<span class="float-right"><?php echo $items['masp'];?></span>
</div>
</div>
<div class="cart_info_order_field">
<div class="order_product_price">
<label>Giá bán : </label>
<span class="float-right"><?php echo number_format($items['price'],"0",",",".");?></span>
</div>
</div>



<div class="cart_info_order_field">
<div class="order_product_quantity">

<label>Số lượng: </label>
<div id="step_three_block_cart">

<span id="wrap_button_cart" class="button-submit hidden"><input id="button_cart_update_1840518512" type="submit" name="dispatch[checkout.update]" value="Cập nhật"></span>
<div class="quantity cm-reload-" id="quantity_update_" style="display: inline;">
<input type='hidden' id="iddong" name='<?php $i=1; echo $i."[rowid]" ?>' value="<?php echo $items['rowid']?>" />
<select onchange="showUser(this.value)" name="soluong" id="soluong" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">
<?php for($j=1;$j<=10;$j++)
		{
?>
<option value="<?php echo $j;?>" <?php if($items['qty']==$j) echo 'selected="selected"';?>><?php echo $j;?></option>

<?php }?>
</select>

<!--quantity_update_-->
</div>
<!--step_three_block_cart--></div>
									</div>
</div>
<div id="txtHint">
<div class="cart_info_order_field">
<div class="order_product_quantity">
<label>Thành tiền:</label>
<span class="float-right"><strong id="tongtien"><?php $_SESSION['tongtientam']=$this->cart->total(); echo number_format($_SESSION['tongtientam'],"0",",",".");?>&nbsp;VNĐ</strong></span>
</div>
</div>
</div>




<div style="margin-bottom: 20px;display: inline-block;"></div>
<div class="clear"></div>	
<?php }?>	
</div>	                
</div>
</div>	</div>

<?php 
		//echo $info['idkhach'];
		if(!isset($info['username']))
		{
		?>
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
		
		<?php
		
		$this->load->view("vdangnhapuser");
		
		}
		
		else if(isset($info['username']))
		{
		
		?> 
<form class="cm-ajax cm-ajax-force"  action="" method="post">
<div class="per_step_row2" id="step_two">
<h2 class="step-title">
<span class="float-left">2.</span>
<img src="<?php base_url();?>images/icon_step_close.gif" width="19" height="17" border="0" alt="" class="float-right" />
<span>Địa chỉ giao hàng</span>
</h2>

<div id="chinhsua">
<div id="step_two_body" class="step-body-active cm-skip-save-fields" style="border-right:1px solid #dddddd;border-left:1px solid #dddddd; box-shadow: 1px 1px 10px; min-height:450px; height:auto;">
	
<div>

<div class="clear">
<div class="input_info_privite"> Vui lòng nhập thông tin của bạn </div>
<div class="float-left">
<div class="form-field">
<label class="hidden cm-profile-field cm-required " for="elm_30">Họ tên:</label>
<input id="elm_30" class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_30');" value="<?php echo $info['hoten'];?>" size="32" name="hoten" placeholder="Họ tên">
</div>
<div class="form-field">
<input class="input-text " type="text" disabled="disabled" value="<?php echo $info['email'];?>" size="32">
</div>

<div class="form-field">
<label class="hidden cm-profile-field cm-required  cm-location-shipping" for="tinhthanh">Tỉnh/Thành:</label>

<select id="tinhthanh" style="min-width:200px" name="tinhthanh" onchange="laytinhthanh(this.value)">
<option value="">- Chọn Tỉnh/Thành -</option>
<?php foreach($tinhthanh as $tinhthanh1){ ?>
<option value="<?php echo $tinhthanh1['provinceid'];?>"><?php echo $tinhthanh1['provincename'];?></option>
<?php }?>
</select>
</div>

<div id="txtHint2">
<div class="form-field">
<label class="hidden cm-profile-field cm-required  cm-location-shipping" for="quanhuyen">Quận/Huyện:</label>

<select id="quanhuyen" style="min-width:200px" name="quanhuyen" onchange="layphuongxa(this.value)">
<option value="">- Chọn Quận/Huyện -</option>

</select>
</div>
<div id="txtHint3">
<div class="form-field">
<label class="hidden cm-profile-field cm-required  cm-location-shipping" for="phuongxa">Phường/Xã:</label>

<select id="phuongxa" style="min-width:200px" name="phuongxa">
<option value="">- Chọn Phường/Xã -</option>

</select>
</div>	
</div>
</div>

<div class="form-field">
<label class="hidden cm-profile-field " >Số nhà:</label>
<input id="elm_32"  class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_32');" value="" size="32" name="sonha" placeholder="Số nhà">
</div>

<div class="form-field">
<label class="hidden cm-profile-field " >Đường:</label>
<input id="elm_33"  class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_33');" value="" size="32" name="duong" placeholder="Đường">
</div>

<div class="form-field">
<label class="hidden cm-profile-field cm-required " for="elm_31">Điện thoại:</label>
<input id="elm_31" onKeyPress="return isNumberKey(event)" class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_31');" value="" size="32" name="dienthoai" placeholder="Điện thoại">
</div>
</div>
</div>



</div>
</div>
</div>


<!--step_two--></div>


<div class="order_shipping_method float-left per_step_row" style="margin-left:18px;">
<h2 class="step-title">
<span class="float-left">3.</span>
<span class="title"
>Thanh toán và vận chuyển</span>
</h2>
<div class="per_step_row_body ">
<label></label>
<label class="title_select_method">Hình thức giao hàng</label>
<div id="txtHint4">
<div class="overflow-hidden " id="shipping_rates_list">
<input type="radio" class="valign" name="shipping_ids[]" value="11" id="sh_11" checked="checked" onclick="jQuery.ajaxRequest('/index.php?dispatch=checkout.order_info&amp;shipping_id=11', {method: 'POST', cache: false, result_ids: 'checkout_steps'});" />
<label style="width:221px;" id="shipping_method_11_label" for="sh_11" class="valign strong">Chuyển phát nhanh từ TPHCM với giá <?php if(isset($_SESSION['phivanchuyen'])) echo number_format($_SESSION['phivanchuyen'],"0",",","."); else echo "0";?> VNĐ
<br>
<b>Thời gian vận chuyển: <br><span style="color:yellow;">0</span></b>
</label>
<!--shipping_rates_list--></div>
</div>
<div class="bottom_line_methods" style="margin-left:-6px;">&nbsp;</div>		
<label></label>
<label class="title_select_method method_power_by_onpay">
<span class="float-left">Hình thức thanh toán</span>
<span class="power_by_onepay"></span>
</label>
<div class="clear-both"></div>
<div id="payments_summary">
<table cellpadding="0" cellspacing="0" border="0" id="list_payment_methods" width="100%">
<tr>
<td>
<input type="radio" id="payment_method_13" 										   class="radio" onclick="jQuery.ajaxRequest('/index.php?dispatch=checkout.order_info&amp;payment_id=13', {method: 'POST', cache: false, result_ids: 'checkout_steps'});" 
name="payment_id" value="13" 
checked="checked"
/>
</td>
<td>
<label id="payment_method_6_label" for="payment_method_13"  class="strong 6 6">Thanh toán tiền mặt (miễn phí)</label></td>
<td>&nbsp;</td>
<td></td>
</tr>


</table>
<!--payments_summary--></div>

<div class="bottom_line_methods" style="margin-left:-6px;">&nbsp;</div>		
<label></label>

<label class="title_select_method method_power_by_onpay" >Chọn mẫu:</label>
<span style="display:block;">


<?php $mau=explode("|", $info1['mau']); 
	for($j=0;$j<count($mau);$j++)
	{
	
	if($j==0)
	{
	?>
	
	<label style="float:left;width:58px;margin-right:10px;height:53px;margin-bottom:10px;" class="chon test dobong">

<span class="label" style="background-image:url('./uploads/<?php echo $mau[$j];?>');width:50px;height:50px;background-size:cover;"><input checked="true" style="display:none;" type="radio" value="<?php echo $mau[$j];?>" name="mau" id="mau"> </span>
</label>
	
	<?php }else{
	
	if($mau[$j]!=null)
	{
?>
<label style="float:left;width:58px;margin-right:10px;height:53px;margin-bottom:10px;" class="chon test ">

<span class="label" style="background-image:url('./uploads/<?php echo $mau[$j];?>');width:50px;height:50px;background-size:cover;"><input style="display:none;" type="radio" value="<?php echo $mau[$j];?>" name="mau" id="mau"> </span>
</label>
<?php }else break;}}?>







</span>

<div class="bottom_line_methods" style="margin-left:-6px;">&nbsp;</div>		
<label></label>

<label class="title_select_method method_power_by_onpay">Chọn size: </label>
<div id="step_three_block_cart">

<span id="wrap_button_cart" class="button-submit hidden"><input id="button_cart_update_1840518512" type="submit" name="dispatch[checkout.update]" value="Cập nhật"></span>
<div class="quantity cm-reload-" id="quantity_update_" style="display: inline;">
<input type='hidden' id="iddong" name='<?php $i=1; echo $i."[rowid]" ?>' value="<?php echo $items['rowid']?>" />
<select  name="size" id="size" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">
<?php $size=explode(",", $info1['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}?>
</select>

<!--quantity_update_-->
</div>
<!--step_three_block_cart--></div>

	    		
</div>
</div>
	

<div id="step_three" class="checkout_comment_and_place_order " style="width:991px;">    
<div class="clear bg_step_row_bottom_nd"></div>
<div id="step_three_body" class="">
<div class="clear">

<input type="hidden" name="update_step" value="step_three"/>
<input type="hidden" name="next_step" value="step_four"/>
<input type="hidden" name="result_ids" value="checkout_steps,checkout_cart"/>
<div class="buttons-container hidden">
<span id="wrap_step_three_but"  class="button-submit"><input id="step_three_but"  type="submit" name="dispatch[checkout.update_steps]"  value="Tiếp tục" /></span>
</div>

<div class="clear" style="margin-top: 10px;"></div>
<div class="pay_comment_info pay_comment_info_tmp">

<div class="clear">
<p style="clear:both">Nếu bạn có thông tin cần Deal Hàng Việt lưu ý, xin hãy nhập nó vào đây:</p>
<textarea class="customer-notes" name="ghichu"  style="min-height:15px;"></textarea>
</div>
<div class="buttons-container right clear-both" style="display: none">						
<span id="wrap_place_order" class="button-submit">
<input id="place_order" class="order-place-disabled" type="button" name="dispatch[checkout.place_order]" value="Đặt hàng" disabled="" />
</span>
</div>

</div>

<div id="txtHint1">
<div class="order_total_info canhchinhle">	    
<div class="clear">
<ul class="order_total_info_nd" style="">
<li class="subtotal">
<label>Thành tiền:</label>

<span style="margin-top:-14px;"><?php $_SESSION['tongtientam']=$this->cart->total(); echo number_format($_SESSION['tongtientam'],"0",",",".");?>&nbsp;VNĐ</span>
</li>
<li id="payment_shipping_fee_line">
<input type="hidden" name="phivanchuyen" value="<?php if(isset($_SESSION['phivanchuyen'])) echo $_SESSION['phivanchuyen']; else echo "0";?>"  />

<label title="" class="">Phí vận chuyển:</label>
<span style="margin-top:-14px;"><?php if(isset($_SESSION['phivanchuyen'])) echo number_format($_SESSION['phivanchuyen'],"0",",","."); else echo "0";?>&nbsp;VNĐ</span>
</li>
<li class="total" style="border-top:1px solid #dddddd;">
<label style="padding-top:5px; margin-top:5px;">Tổng số tiền:</label>
<input type="hidden" name="tongtientam1" value="<?php echo $_SESSION['tongtientam1'];?>" />
<span style="margin-top:-20px; color:#ed1b24 !important; padding-top:5px; font-size:22px; font-weight:bold;"><?php  echo number_format($_SESSION['tongtientam1'],"0",",",".");?>&nbsp;VNĐ</span>
</li>
</ul>
</div>
</div>
</div>


<div class="clear-both right btn_place_order_submit">

<span id="wrap_place_order" class="button-submit btn_place_order_2" style="float: right;">
<input type="submit" name="ok" value="Đặt hàng" >
</span>
<div class="clear"></div>
</div>
</div>
</div>
<!--step_three--></div>		
<?php }?>
</form>

</div>
<!--step_one--></div>	

<!--checkout_steps--></div>
									
<div class="clear"></div>
	
<!--checkout_steps--></div>

</div>
</div>  
</div>
</div> 