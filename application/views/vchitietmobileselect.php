<div class="main">
<div class="cm-notification-container"></div>
<div class="mainbox-container">
<div class="mainbox-body">
<h2 class="page-section products-sku-title">Chọn mẫu sản phẩm</h2>
<div class="clear"></div>
<div style="padding-top:0;" class="main_content">
<div class="box1">
<div class="box_sku">

<?php $mau=explode("|", $chitietsp['mau']); 
	for($j=0;$j<count($mau);$j++)
	{
	
	if($j==0)
	{
	?>

<div class="box_deal">
<form class="cm-disable-empty-files" enctype="multipart/form-data"  method="post" action="<?php echo base_url();?>dat-hang-mobile/<?php echo $chitietsp['stt'];?>.html">

<div class="col">
<img height="91" width="91" border="0"  alt="" data-original="<?php echo base_url();?>uploads/<?php echo $mau[$j];?>" src="<?php echo base_url();?>uploads/<?php echo $mau[$j];?>" id="det_img_142052" class="" style="display: inline; visibility: visible;"> </div>
<input type="hidden" name="mauchon" value="<?php echo $mau[$j];?>" />
<div class="cor">
<div class="shortname_color p5b font14" style="color: #ececec !important;font-family: tahoma;"><?php echo $chitietsp['tensp'];?></div>
<div class="b1">
<p class="sell-price text_bo font16" style="color: #fff000;font-family: tahoma;font-size: 15px;"><?php echo number_format($chitietsp['giagiam'],"0",",",".");?>&nbsp;VNĐ</p>

<p class="number_bought font13" style="color: #ececec !important;font-family: tahoma;display:inline;">Size: </p>
<select   name="sizechon" id="sizechon" style="font-size: 16px; padding: 4px 8px;margin:5px 0px;" class="change_quantity" rel="1159000">

<?php  $size=explode(",", $chitietsp['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}?>
</select>
</div>
<div class="b2">
<input type="submit" value="Mua" name="" id="button_cart_142052" class="bt_selecthang pointer">
</div>
<div class="cb"></div>
</div>
<div class="cb"></div>
</form>
</div>

<?php }else{
	
	if($mau[$j]!=null)
	{
?>

<div class="box_deal">
<form class="cm-disable-empty-files" enctype="multipart/form-data"  method="post" action="<?php echo base_url();?>dat-hang-mobile/<?php echo $chitietsp['stt'];?>.html">

<div class="col">
<img height="91" width="91" border="0"  alt="" data-original="<?php echo base_url();?>uploads/<?php echo $mau[$j];?>" src="<?php echo base_url();?>uploads/<?php echo $mau[$j];?>" id="det_img_142052" class="" style="display: inline; visibility: visible;"> </div>
<input type="hidden" name="mauchon" value="<?php echo $mau[$j];?>" />
<div class="cor">
<div class="shortname_color p5b font14" style="color: #ececec !important;font-family: tahoma;"><?php echo $chitietsp['tensp'];?></div>
<div class="b1">
<p class="sell-price text_bo font16" style="color: #fff000;font-family: tahoma;font-size: 15px;"><?php echo number_format($chitietsp['giagiam'],"0",",",".");?>&nbsp;VNĐ</p>

<p class="number_bought font13" style="color: #ececec !important;font-family: tahoma;display:inline;">Size: </p>
<select   name="sizechon" id="sizechon" style="font-size: 16px; padding: 4px 8px;margin:5px 0px;" class="change_quantity" rel="1159000">

<?php  $size=explode(",", $chitietsp['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}?>
</select>
</div>
<div class="b2">
<input type="submit" value="Mua" name="" id="button_cart_142052" class="bt_selecthang pointer">
</div>
<div class="cb"></div>
</div>
<div class="cb"></div>
</form>
</div>

<?php }else break;}}?>

</div>
</div>
</div>
</div>
</div>
</div>