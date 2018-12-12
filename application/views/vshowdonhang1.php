<div class="container-fluid">
<div id="content-wrapper" class="row-fluid">
<div class="span12">
<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1 class="pull-left">
                
                <span>Đơn Hàng</span>
            </h1>
           
        </div>
    </div>
</div>

<div class="row-fluid">
<div style="margin-bottom:0;" class="span12 box bordered-box orange-border">
<div class="box-header blue-background">
    <div class="title">Danh sách đơn hàng</div>
    
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<div role="grid" class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
<div class="row-fluid">
<div class="span12 text-right"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label></div></div></div><table style="margin-bottom:0;" class="data-table table table-bordered table-striped dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="
        Name
    : activate to sort column descending">
        Mã đơn hàng
    </th>
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 304px;" aria-label="
        E-mail
    : activate to sort column ascending">
        Tên khách hàng
    </th>
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 304px;" aria-label="
        Status
    : activate to sort column ascending">
        Phone
    </th>
	
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 204px;" aria-label="
        Status
    : activate to sort column ascending">
        Ngày đặt
    </th>
	
	
	
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 304px;" aria-label="
        Status
    : activate to sort column ascending">
        Tổng tiền
    </th>
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 143px;" aria-label=": activate to sort column ascending">Tùy chọn</th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php $dem=0; foreach($users as $item)
					{
					
					?>

					
					
<tr class="odd" data-toggle="modal" data-target="#haha<?php echo $item['idhoadon'];?>">
    <td class="  sorting_1"><?php echo $item['idhoadon'];?></td>
    <td class=" "><?php echo $item['tenkhach'];?></td>
	<td class=" "><?php echo $item['phone'];?></td>
	<td class=" "><?php echo $item['ngaydat'];?></td>
	
	<td class=" "><span style="color:#009900;font-weight:bold;"><?php echo number_format($item['tongtien'],"0",",",".");?></span></td>
    
    <td class=" ">
        <div class="text-right">
            <a href="#haha<?php echo $item['idhoadon'];?>" class="btn btn-success btn-mini">
                <i class="icon-edit"></i>
            </a>
            <a href="<?php echo base_url();?>cadmin/xoasanpham/<?php echo $item['stt'];?>" onclick="return confirm('Chắc chắn muốn xóa sản phẩm này?  ');" class="btn btn-danger btn-mini">
                <i class="icon-remove"></i>
            </a>
        </div>
		
		
		<!-- Modal -->
<div id="haha<?php echo $item['idhoadon'];?>" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">Ðóng</a>
		<h2 style="text-align:center;">Sửa đơn hàng <?php echo $item['idhoadon'];?></h2>
		<div style="">
		<?php  foreach($info1 as $key)
		{
			if($key['stt']==$item['stt'])
			{
			$mau=explode("|", $key['mau']);
			$demhinh=0;
			foreach($mau as $mau1)
			{
			if($mau1==$item['mauchon']&&$mau1!="")
			{
		?>
		<script>
function showUserx<?php echo $dem;?><?php echo $demhinh;?>() {
	var giatri1 = document.getElementById('idhoadon<?php echo $dem;?>').value;
	var giatri2 = document.getElementById('mau<?php echo $dem;?><?php echo $demhinh;?>').value;
	
	
	var p1="idhoadon="+giatri1;
	var p2="mau="+giatri2;
	
	
	
	var p=p1+"&"+p2;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      location.reload();
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level10/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>
		
		<div style="float:left;position:relative;"><span  style="background-image:url('../uploads/<?php echo $mau1;?>');display:block;float:left;margin-right:30px;margin-top:10px;width:100px;height:100px;background-size:cover;"><input style="display:none;" type="radio" value="<?php echo $mau1;?>" name="mau<?php echo $dem;?><?php echo $demhinh;?>" id="mau<?php echo $dem;?><?php echo $demhinh;?>"> </span>
		<br/><input style="width:100px; margin-right:10px;" type="submit" onclick="showUserx<?php echo $dem;?><?php echo $demhinh;?>();" id="sua<?php echo $dem;?>" name="sua<?php echo $dem;?>" value="Chọn" />
		</div>
		
		<?php }
			else if($mau1!=$item['mauchon']&&$mau1!="")
			{
		
		?>
		<script>
function showUserx<?php echo $dem;?><?php echo $demhinh;?>() {
	var giatri1 = document.getElementById('idhoadon<?php echo $dem;?>').value;
	var giatri2 = document.getElementById('mau<?php echo $dem;?><?php echo $demhinh;?>').value;
	
	
	var p1="idhoadon="+giatri1;
	var p2="mau="+giatri2;
	
	
	
	var p=p1+"&"+p2;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      location.reload();
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level10/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>

		<div style="float:left;position:relative;"><span  style="background-image:url('../uploads/<?php echo $mau1;?>');display:block;float:left;margin-right:30px;margin-top:10px;width:100px;height:100px;background-size:cover;"><input style="display:none;" type="radio" value="<?php echo $mau1;?>" name="mau<?php echo $dem;?><?php echo $demhinh;?>" id="mau<?php echo $dem;?><?php echo $demhinh;?>"> </span>
		<br/><input style="width:100px; margin-right:10px;" type="submit" onclick="showUserx<?php echo $dem;?><?php echo $demhinh;?>();" id="sua<?php echo $dem;?>" name="sua<?php echo $dem;?>" value="Chọn" />
		</div>
		<?php }$demhinh++;}}}?>
		</div>			
		<div class="subsua" style="text-align:center;clear:both;">
		
		
		<script>
function showUserx<?php echo $dem;?>() {
	var giatri1 = document.getElementById('idhoadon<?php echo $dem;?>').value;
	var giatri2 = document.getElementById('size<?php echo $dem;?>').value;
	var giatri3 = document.getElementById('tenkhach<?php echo $dem;?>').value;
	var giatri4 = document.getElementById('phone<?php echo $dem;?>').value;
	var giatri5 = document.getElementById('diachi<?php echo $dem;?>').value;
	var giatri6 = document.getElementById('soluong<?php echo $dem;?>').value;
	var giatri7 = document.getElementById('dongia<?php echo $dem;?>').value;
	var giatri8 = document.getElementById('vanchuyen<?php echo $dem;?>').value;
	var giatri9 = document.getElementById('tongtien<?php echo $dem;?>').value;
	var giatri10 = document.getElementById('chieucao<?php echo $dem;?>').value;
	var giatri11 = document.getElementById('cannang<?php echo $dem;?>').value;
	
	var p1="idhoadon="+giatri1;
	var p2="size="+giatri2;
	var p3="tenkhach="+giatri3;
	var p4="phone="+giatri4;
	var p5="diachi="+giatri5;
	var p6="soluong="+giatri6;
	var p7="dongia="+giatri7;
	var p8="vanchuyen="+giatri8;
	var p9="tongtien="+giatri9;
	var p10="chieucao="+giatri10;
	var p11="cannang="+giatri11;
	
	
	var p=p1+"&"+p2+"&"+p3+"&"+p4+"&"+p5+"&"+p6+"&"+p7+"&"+p8+"&"+p9+"&"+p10+"&"+p11;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      location.reload();
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level9/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>
		
					
					<script>


$(document).ready(
            function() {
             
                 
$( "#soluong<?php echo $dem;?>" ).change(function() {
var soluong = parseFloat($('#soluong<?php echo $dem;?>').val()); 
var dongia = parseFloat($('#dongia<?php echo $dem;?>').val()); 
var vanchuyen = parseFloat($('#vanchuyen<?php echo $dem;?>').val()); 
var tongtien = parseFloat(( soluong * dongia ) + vanchuyen); 
$( "#tongtien<?php echo $dem;?>" ).val(tongtien);

});

$( "#dongia<?php echo $dem;?>" ).change(function() {
var soluong = parseFloat($('#soluong<?php echo $dem;?>').val()); 
var dongia = parseFloat($('#dongia<?php echo $dem;?>').val()); 
var vanchuyen = parseFloat($('#vanchuyen<?php echo $dem;?>').val()); 
var tongtien = parseFloat(( soluong * dongia ) + vanchuyen); 
$( "#tongtien<?php echo $dem;?>" ).val(tongtien);

});

$( "#vanchuyen<?php echo $dem;?>" ).change(function() {
var soluong = parseFloat($('#soluong<?php echo $dem;?>').val()); 
var dongia = parseFloat($('#dongia<?php echo $dem;?>').val()); 
var vanchuyen = parseFloat($('#vanchuyen<?php echo $dem;?>').val()); 
var tongtien = parseFloat(( soluong * dongia ) + vanchuyen); 
$( "#tongtien<?php echo $dem;?>" ).val(tongtien);

});

$( "#sua<?php echo $dem;?>" ).click(function() {


});
                
            });		

</script>
					<table  border="0">
					<input style="width:280px;" type="hidden" name="idhoadon<?php echo $dem;?>" id="idhoadon<?php echo $dem;?>" value="<?php echo $item['idhoadon'];?>" />
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Size:</td>
					<td style="border:none;">
					
					
					<select  name="size<?php echo $dem;?>" id="size<?php echo $dem;?>" style="width:200px;" >
		<option value="<?php echo $item['sizechon'];?>"><?php echo $item['sizechon'];?></option>
				<?php 
				
				foreach($info1 as $key1)
		{
			if($key1['stt']==$item['stt'])
			{
			$size=explode(",", $key1['size']);
			$demhinh1=0;
			
			foreach($size as $size1)
			{
			if($size1!=$item['sizechon']&&$size1!="")
			{
				{?>
                    <?php if($size1!=$item['sizechon'])echo '<option value="'.$size1.'">';?><?php if($size1!=$item['sizechon'])echo $size1."</option>";?>
                 <?php }}}}};   ?>
                </select>
					
					</td>
					</tr>
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Tên sản phẩm:</td>
					<td style="border:none;"><?php echo $item['tensp'];?></td>
					</tr>
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Tên khách hàng:</td>
					<td style="border:none;"><input style="width:280px;" type="text" name="tenkhach<?php echo $dem;?>" id="tenkhach<?php echo $dem;?>" value="<?php echo $item['tenkhach'];?>" /></td>
					</tr>
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Phone:</td>
					<td style="border:none;"><input style="width:280px;" type="text" name="phone<?php echo $dem;?>" id="phone<?php echo $dem;?>" value="<?php echo $item['phone'];?>" /></td>
					</tr>
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Địa chỉ:</td>
					<td style="border:none;"><textarea cols="33" name="diachi<?php echo $dem;?>" id="diachi<?php echo $dem;?>"  ><?php echo $item['noigiao'];?></textarea></td>
					</tr>
					
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Chiều cao:</td>
					<td style="border:none;"><input style="width:280px;" type="text" name="chieucao<?php echo $dem;?>" id="chieucao<?php echo $dem;?>" value="<?php echo $item['chieucao'];?>" /></td>
					</tr>
					
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Cân nặng:</td>
					<td style="border:none;"><input style="width:280px;" type="text" name="cannang<?php echo $dem;?>" id="cannang<?php echo $dem;?>" value="<?php echo $item['cannang'];?>" /></td>
					</tr>
					
					<tr>
					<td style="text-align:right;padding:0px;border:none;">Tổng tiền:</td>
					<td style="border:none;">(<input style="width:30px;" type="text" id="soluong<?php echo $dem;?>" name="soluong<?php echo $dem;?>" value="<?php echo $item['soluong'];?>" /> x 
					<input style="width:60px;" type="text" id="dongia<?php echo $dem;?>" name="dongia<?php echo $dem;?>" value="<?php echo $item['dongia'];?>" />) + 
					<input style="width:60px;" type="text" id="vanchuyen<?php echo $dem;?>" name="vanchuyen<?php echo $dem;?>" value="<?php echo $item['vanchuyen'];?>" /> = 
					<input style="width:60px;color:red;" type="text" disabled="true" id="tongtien<?php echo $dem;?>" name="tongtien<?php echo $dem;?>" value="<?php echo $item['tongtien'];?>" /> VNĐ</td>
					</tr>
					<tr>
					<td rowspan="2" style="padding:0px;border:none;"></td>
					<td style="border:none;"><input style="width:100px; margin-right:50px;" type="submit" onclick="showUserx<?php echo $dem;?>();" id="sua<?php echo $dem;?>" name="sua<?php echo $dem;?>" value="Sửa đổi" />
					<div id="txtHint">

</div>
					</td>
					</tr>
					</table>
					
					
					
					
					
					
					</div>
		</div>
</div>
		
    </td>
</tr>
<?php };?>

</tbody></table></div>
</div>
</div>
</div>
</div>
</div>
<hr class="hr-double">
</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>




</div>