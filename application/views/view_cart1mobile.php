<?php session_start();
$_SESSION['phivanchuyen']=0;
$_SESSION['thanhtien']=$this->cart->total();
$_SESSION['tongtientam1']=$this->cart->total();
//echo $_SESSION['tongtientam1'];
?>

<script>


$(document).ready(
            function() {
                $(".menu ul li a#m3").attr("class","hovermenutop3");
				
				$("#tinhthanh").change(function(){
				
				 c = $("#tinhthanh").val();
	$("#txtHintvanchuyen").load('<?php echo base_url();?>index.php/ajax/ajax_level4/?vanchuyen='+c);
	$("#txtHinttongtien").load('<?php echo base_url();?>index.php/ajax/ajax_level41/?vanchuyen='+c);
	
	
}); 
				
				$(".refresh").on('change', function(){ 
				
				
				b=$(this).attr("name");
				d=$(this).attr("maso");
				
				a=$(this).val();
				
				c=$('.id'+d).val();
				$.ajax({
	  
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level13/",
         data : { 
		 soluong : a,
		 iddong : b,
		 id : c,
                    },
         success: function(result){
		 
		 $('#txtHint'+b).fadeOut(100).html(result).fadeIn(500);
		 $('#txtHint1'+b).fadeOut(100).html(result).fadeIn(500);
		$.ajax({
		
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level16/",
         data : { 
		 vanchuyen : $("#tinhthanh").val(),
                    },
         success: function(result){
		 
		 
		$('#txtHinttotal').fadeOut(100).html(result).fadeIn(500);
		   
         }
      });
		   
         }
      });
	  
	  
	  
	  
			});
			
			$(".refreshsize").on('change', function(){ 
				
				
				b=$(this).attr("name");
				d=$(this).attr("maso");
				
				a=$(this).val();
				
				c=$('.id'+d).val();
				$.ajax({
	  
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level13size/",
         data : { 
		 sizechon : a,
		 iddong : b,
		 id : c,
                    },
         success: function(result){
		 
		   
         }
      });
	  
	  
	  
	  
			});
            
            });

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

<div id="wrapper">
        <div class="container">
    <div class="order-bill">
    <div class="bgbar"></div>
        <div class="inner">
            <div class="container">
                <div class="ajax_list_product">
            

    <div class="table-cart">
      <table cellspacing="0" cellpadding="0">
          <thead>
          <tr>
              <th><p class="title"><span>THÔNG TIN GIỎ HÀNG</span></p></th>
              <th>ĐƠN GIÁ</th>
              <th>SỐ LƯỢNG</th>
              <th>THÀNH TIỀN</th>
          </tr>
		 </thead>
        <tbody>	
				<?php $dem=0; foreach ($info2 as $items){ ?>		
			<tr>
				<td class="td_product_info">
                    <div class="thumb">
					<img alt="<?php echo $items['name'];?>" src="<?php echo base_url();?>uploads/<?php echo $items['hinhanh'];?>"><a  title="" href="<?php echo base_url()."cgiohangno/del/".$items['rowid'];?>" class="delete">Xóa</a></div>
                    <div class="caption">
                        <p class="name"><a title="" ><?php echo $items['name'];?></a></p>
                        <div class="prdoption">
                            <div class="item col-md-8">
                                                                <div class="col-md-4">
                                <label>Lựa chọn:</label>
                                </div>
                                <div class="col-md-8">
                                <select  class="form-control refreshsize" maso="<?php echo $items['id']?>" id="size<?php echo $items['rowid']?>" name="<?php echo $items['rowid']?>">
                                    
									<?php  $size=explode(",", $items['size']); 
	for($k=0;$k<count($size);$k++)
	{
	$sizechontam=$items['options']['sizechon'];
	if($sizechontam==$size[$k])
	{
?>

<option selected="selected" value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php
		
	}
	else
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}}?>
									
									</select>
                                </div>
                                                            </div>
                        </div>
                    </div>
                    <div class="mcaption">
                        <div class="prdoption">
                            <div class="item"><label>Lựa chọn:</label>
							
                            <select class="form-control option_0" >
                              
							<?php  $size=explode(",", $items['size']); 
	for($k=0;$k<count($size);$k++)
	{
	$sizechontam=$items['options']['sizechon'];
	if($sizechontam==$size[$k])
	{
?>

<option selected="selected" value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php
		
	}
	else
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}}?>
							  
							  </select>
                                                                </div>
                        </div>
                        <div class="calc">
                            <label>SL:</label>
							<input type="hidden" maxlength="2" id="iddong<?php echo $items['rowid']?>" name="iddong<?php echo $items['rowid']?>" onkeypress="return isNumberKey1(event)" value="<?php echo $items['qty'];?>" class="cart_quantity_input form-control grey iddong<?php echo $items['rowid']?>" size="2">
							<input class="id<?php echo $items['id']?>" type='hidden'  value="<?php echo $items['id']?>" />
                            <select  class="sl_body_giohang form-control qty_0 refresh iddong<?php echo $items['rowid']?>" id="iddong<?php echo $items['rowid']?>" name="<?php echo $items['rowid']?>" maso="<?php echo $items['id']?>">
                                <?php for($i=1;$i<=10;$i++){
									if($items['qty']==$i){
									?>
								
								<option selected="selected" value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php } else{ ?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php }}?>
						</select>x<span class="price"><?php echo number_format($items['price'],"0",",",".");?>đ</span> &nbsp;= &nbsp;<div class="sum" style="display:inline;" id="txtHint1<?php echo $items['rowid']?>"><span class="product_price"><?php echo number_format($items['subtotal'],"0",",","."); ?>&nbsp;đ</span> </div></span>
                        </div>
                    </div>
				</td>
                <td><div class="price product_price"><?php echo number_format($items['price'],"0",",",".");?>đ</div></td>
				<td>
				<input type="hidden" maxlength="2" id="iddong<?php echo $items['rowid']?>" name="iddong<?php echo $items['rowid']?>" onkeypress="return isNumberKey1(event)" value="<?php echo $items['qty'];?>" class="cart_quantity_input form-control grey iddong<?php echo $items['rowid']?>" size="2">
				<input class="id<?php echo $items['id']?>" type='hidden'  value="<?php echo $items['id']?>" />
					<select  class="sl_body_giohang form-control qty_0 refresh iddong<?php echo $items['rowid']?>" id="iddong<?php echo $items['rowid']?>" name="<?php echo $items['rowid']?>" maso="<?php echo $items['id']?>">
						
						<?php for($i=1;$i<=10;$i++){
									if($items['qty']==$i){
									?>
								
								<option selected="selected" value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php } else{ ?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php }}?>
						
					</select>
				</td>
				<td class="td_total_price"> 
				<input type="hidden" name="tongtientam1" value="<?php echo $_SESSION['tongtientam1'];?>" />
				
				<div class="sum" id="txtHint<?php echo $items['rowid']?>"><span class="product_price"><?php echo number_format($items['subtotal'],"0",",","."); ?>&nbsp;đ</span> </div>
				
				</td>
				</tr>
						<?php }?>
		
			        </tbody>
        </table>
         <div class="bottom">
            <a title="" href="<?php echo base_url();?>" class="button-2"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
            <div class="support"><strong>Hỗ trợ mua hàng</strong>0979.807.668</div>
        </div>

        </div>

    </div>

    </div>
    <form name="frm_cart_checkout" action="" method="POST">
        <div class="buyer-info row">
            <div class="col-lg-7 block">
                <p class="title"><span>Thông tin cá nhân</span></p>

                <div class="form">
                    <div class="form-group ">
                        <label class="field-name">Họ và tên <span class="req">*</span>:</label>
                        <div class="input-container "><input type="text" value="" id="p_order_user_name" name="hoten" class="form-control" required="required" ></div>
                    </div>
                                        <div class="form-group ">
                        <label class="field-name">Điện thoại di động <span class="req">*</span>:</label>
                        <div class="input-container"><input type="text" onKeyPress="return isNumberKey(event)" value="" id="p_order_user_phone" name="dienthoai" class="form-control" required="required"></div>
                    </div>
                                        <div class="form-group ">
                        <label class="field-name">Số nhà/Thôn: <span class="req">*</span>:</label>
                        <div class="input-container"><input type="text" value="" id="p_order_user_address_street" name="sonha" class="form-control " ></div>
                    </div>
										<div class="form-group ">
                        <label class="field-name">Đường/Xóm: <span class="req">*</span>:</label>
                        <div class="input-container"><input type="text" value="" id="p_order_user_address_street" name="duong" class="form-control" ></div>
                    </div>
                                        <div class="form-group">
                        <div class="col ">
                            <label class="field-name">Thành phố <span class="req">*</span>:</label>
                            <select class="form-control " id="tinhthanh" onchange="laytinhthanh(this.value)" required="required" name="tinhthanh">
                                
								<option value="">- Chọn Tỉnh/Thành -</option>
<?php foreach($tinhthanh as $tinhthanh1){ ?>
<option value="<?php echo $tinhthanh1['provinceid'];?>"><?php echo $tinhthanh1['provincename'];?></option>
<?php }?>
								
							</select>
                        </div>
						<div id="txtHint2">
                        <div class="col ">
                            <label class="field-name">Quận huyện <span class="req">*</span>:</label>
                            <select class="form-control " id="quanhuyen" name="quanhuyen" required="required" onchange="layphuongxa(this.value)">
								<option value="">- Chọn Quận/Huyện -</option>
							</select>
                        </div>
						
						<div id="txtHint3">
                        <div class="col ">
                            <label class="field-name">Phường xã <span class="req">*</span>:</label>
                            <select class="form-control " id="phuongxa" name="phuongxa" required="required">
								<option value="">- Chọn Phường/Xã -</option>
							</select>
                        </div>
						</div>
						</div>
                    </div>
                    <div class="form-group">
                        <label class="field-name">Ghi chú</label>
                        <div class="input-container"><textarea name="ghichu" cols="1" rows="1"></textarea></div>
                    </div>
                    <div class="note">
                        <p>* Miễn phí giao hàng tại TPHCM.</p>
                        <p class="req">* Miễn phí vận chuyển toàn quốc</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-5 block">
                <p class="title"><span>Hoàn tất thanh toán</span></p>
                <div class="total-info">
                    <p><span>Tổng tiền</span><span><b id="txtHinttotal" class="cart_total_price">
					<input type="hidden" name="tongtientam1" value="<?php echo $_SESSION['tongtientam1'];?>" />
					<?php echo number_format($this->cart->total(),"0",",","."); ?>
					
					</b>đ</span></p>
                  
                </div>
                <div class="form-group form-footer">
                    <input type="submit" class="btn btn-default" name="ok" value="Đặt hàng">
                </div>
            </div>
        </div>
    </form>

 
            </div>
        </div>
    </div>
</div>