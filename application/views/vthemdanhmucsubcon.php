<?php
$ngaythang= date('d/m/Y');
    $tendanhmucsubcon = array(
                        'name'        => 'tendanhmucsubcon',
                        'id'          => 'tendanhmucsubcon',
                        'width'          => '10px',
						'class'        => 'inp-form',
                    );
					
	
						
                   
					
	
					
	
						
                   
	
	
	
	$submit = array(
                        "name"=>"ok",
                        "value"=>"Đăng Nhập",
						'class'        => 'button',
						'style' => 'width:100px;height:40px;background:#3a3a3a;border-radius:30px;',
                    );
?>

<?php //print_r($data['khoahoc']);?>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>

  
<script>


$(function($) {
    $.datepicker.regional['vi'] = {
        closeText: 'Đóng',
        prevText: '&#x3c;Trước',
        nextText: 'Tiếp&#x3e;',
        currentText: 'Hôm nay',
        monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
            'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Th.Mười Một', 'Th.Mười Hai'],
        monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
        dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        weekHeader: 'Tu',
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['vi']);
});



</script>  

<script>


function kt(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
 var z=new Date();
z.setFullYear(current_year,current_month,current_day);
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdaudk.value;
ngay1=document.form1.ngayketthucdk.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(0,2)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(6,4);
var x=new Date();
x.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var y=new Date();
y.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));


	if(y!="")
	{
	if(x>y)
	{
		
		document.form1.ngayketthucdk.value="";
		
	}
	}
	



}

</script> 


<script>


function kt2(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
var c=new Date();
c.setFullYear(current_year,current_month,current_day);
 
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdaudk.value;
ngay1=document.form1.ngayketthucdk.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(6,4)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(0,2);
var a=new Date();
a.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var b=new Date();
b.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));



if (b<a)
{
	document.form1.ngayketthucdk.value=document.form1.ngaybatdaudk.value;
    alert ("[Ngày kết thúc] không được nhỏ hơn [ngày bắt đầu]. Hãy chọn [ngày lớn hơn] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngaybatdau.value)+" làm mặc định");
    
}

if (b<a&&a=="")
{
	
    alert ("[Ngày bắt đầu] chưa được chọn. Hãy chọn [ngày bắt đầu] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngayketthuc.value)+" làm mặc định");
    document.form1.ngaybatdaudk.value=document.form1.ngayketthucdk.value;
}



}

</script> 

<script>


function ktz(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
 var z=new Date();
z.setFullYear(current_year,current_month,current_day);
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdau.value;
ngay1=document.form1.ngayketthuc.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(0,2)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(6,4);
var x=new Date();
x.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var y=new Date();
y.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));


	if(y!="")
	{
	if(x>y)
	{
		
		document.form1.ngayketthuc.value="";
		
	}
	}
	



}

</script> 


<script>


function ktz2(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
var c=new Date();
c.setFullYear(current_year,current_month,current_day);
 
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdau.value;
ngay1=document.form1.ngayketthuc.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(6,4)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(0,2);
var a=new Date();
a.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var b=new Date();
b.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));



if (b<a)
{
	document.form1.ngayketthuc.value=document.form1.ngaybatdau.value;
    alert ("[Ngày kết thúc] không được nhỏ hơn [ngày bắt đầu]. Hãy chọn [ngày lớn hơn] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngaybatdau.value)+" làm mặc định");
    document.form1.sotuan.value="1";
}

if (b<a&&a=="")
{
	
    alert ("[Ngày bắt đầu] chưa được chọn. Hãy chọn [ngày bắt đầu] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngayketthuc.value)+" làm mặc định");
    document.form1.ngaybatdau.value=document.form1.ngayketthuc.value;
}



}

</script> 

<script>


function ktgv(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
 var z=new Date();
z.setFullYear(current_year,current_month,current_day);
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdaugv.value;
ngay1=document.form1.ngayketthucgv.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(0,2)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(6,4);
var x=new Date();
x.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var y=new Date();
y.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));


	if(y!="")
	{
	if(x>y)
	{
		
		document.form1.ngayketthucgv.value="";
		
	}
	}
	



}

</script> 


<script>


function ktgv2(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
var c=new Date();
c.setFullYear(current_year,current_month,current_day);
 
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdaugv.value;
ngay1=document.form1.ngayketthucgv.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(6,4)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(0,2);
var a=new Date();
a.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var b=new Date();
b.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));



if (b<a)
{
	document.form1.ngayketthucgv.value=document.form1.ngaybatdaugv.value;
    alert ("[Ngày kết thúc] không được nhỏ hơn [ngày bắt đầu]. Hãy chọn [ngày lớn hơn] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngaybatdau.value)+" làm mặc định");
    
}

if (b<a&&a=="")
{
	
    alert ("[Ngày bắt đầu] chưa được chọn. Hãy chọn [ngày bắt đầu] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngayketthuc.value)+" làm mặc định");
    document.form1.ngaybatdaugv.value=document.form1.ngayketthucgv.value;
}



}

</script> 


<script>


function kttbm(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
 var z=new Date();
z.setFullYear(current_year,current_month,current_day);
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdautbm.value;
ngay1=document.form1.ngayketthuctbm.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(0,2)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(6,4);
var x=new Date();
x.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var y=new Date();
y.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));


	if(y!="")
	{
	if(x>y)
	{
		
		document.form1.ngayketthuctbm.value="";
		
	}
	}
	



}

</script> 


<script>


function kttbm2(){
today= new Date();
current_year=today.getFullYear();
current_month=today.getMonth()+1;
current_day=today.getDate();
today_string=current_year+"/"+current_month+"/"+current_day;
var c=new Date();
c.setFullYear(current_year,current_month,current_day);
 
if (current_month<10) current_month="0"+current_month;
if (current_day<10) current_day="0"+current_day;



ngay=document.form1.ngaybatdautbm.value;
ngay1=document.form1.ngayketthuctbm.value;
ngay_test=ngay.substr(6,4)+"/"+ngay.substr(3,2)+"/"+ngay.substr(0,2);
ngay_test1=ngay1.substr(6,4)+"/"+ngay1.substr(3,2)+"/"+ngay1.substr(0,2);
var a=new Date();
a.setFullYear(ngay.substr(6,4),ngay.substr(3,2),ngay.substr(0,2));
var b=new Date();
b.setFullYear(ngay1.substr(6,4),ngay1.substr(3,2),ngay1.substr(0,2));



if (b<a)
{
	document.form1.ngayketthuctbm.value=document.form1.ngaybatdautbm.value;
    alert ("[Ngày kết thúc] không được nhỏ hơn [ngày bắt đầu]. Hãy chọn [ngày lớn hơn] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngaybatdau.value)+" làm mặc định");
    
}

if (b<a&&a=="")
{
	
    alert ("[Ngày bắt đầu] chưa được chọn. Hãy chọn [ngày bắt đầu] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngayketthuc.value)+" làm mặc định");
    document.form1.ngaybatdautbm.value=document.form1.ngayketthuctbm.value;
}



}

</script> 


<script>
$(function(){

$("#sotuan").change(function(){
	var now = new Date();
	var a=$("#sotuan").val();
	var b=$("#ngaybatdau").val();
	var chuyenngay=b.substr(6,4)+"/"+b.substr(3,2)+"/"+b.substr(0,2);
	var tinhngay=a*7;
	var ngay=new Date(chuyenngay);
	var ketquangay=new Date(ngay.getFullYear(),ngay.getMonth(),ngay.getDate()+tinhngay);
	var day=ketquangay.getDate();
	var month=ketquangay.getMonth()+1;
	if (month<10) month="0"+month;
	if (day<10) day="0"+day;
	var ketquangay1=day+"/"+month+"/"+ketquangay.getFullYear();
	alert("Bạn đã nhập "+a+" tuần. Hệ thống sẽ tự động tính [ngày kết thúc] là "+ketquangay1+". Có thể thay đổi [ngày kết thúc] theo ý muốn!");

//alert("Ngày hôm nay: " + now);

//alert("Ngày hôm qua: " + new Date(now.getFullYear(), now.getMonth(), now.getDate() - 1));

//alert("Ngày mai: " + new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1));

//alert("Ngày mốt: " + new Date(now.getFullYear(), now.getMonth(), now.getDate() + 2));

	$("#ngayketthuc").val(ketquangay1);
	//$("#ngayketthuc").focus();
});

$("#ngaybatdau").change(function(){
	var now = new Date();
	var a=$("#sotuan").val();
	var b=$("#ngaybatdau").val();
	var chuyenngay=b.substr(6,4)+"/"+b.substr(3,2)+"/"+b.substr(0,2);
	var tinhngay=a*7;
	var ngay=new Date(chuyenngay);
	var ketquangay=new Date(ngay.getFullYear(),ngay.getMonth(),ngay.getDate()+tinhngay);
	var day=ketquangay.getDate();
	var month=ketquangay.getMonth()+1;
	if (month<10) month="0"+month;
	if (day<10) day="0"+day;
	var ketquangay1=day+"/"+month+"/"+ketquangay.getFullYear();
	alert("Bạn đã nhập "+a+" tuần. Hệ thống sẽ tự động tính [ngày kết thúc] là "+ketquangay1+". Có thể thay đổi [ngày kết thúc] theo ý muốn!");

//alert("Ngày hôm nay: " + now);

//alert("Ngày hôm qua: " + new Date(now.getFullYear(), now.getMonth(), now.getDate() - 1));

//alert("Ngày mai: " + new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1));

//alert("Ngày mốt: " + new Date(now.getFullYear(), now.getMonth(), now.getDate() + 2));

	$("#ngayketthuc").val(ketquangay1);
	//$("#ngayketthuc").focus();
});

});
</script>


    




 



<div id="page-heading"><h2>Thêm loại sản phẩm</h2></div>

<div class="error">
        <ul>
            <?php
                echo validation_errors('<li>','</li>');
                if($error!="" && !empty($error))
                    echo $error;
            ?>
        </ul>
      </div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
    <th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
    <td id="tbl-border-left"></td>
    <td>
    <!--  start content-table-inner -->
    <div id="content-table-inner">
    
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
    <td>
    
    
        
    <form action="" id="form1" name="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <!-- start id-form -->
    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
            <th valign="top"><?php echo form_label("Tên loại sản phẩm: ")?></th>
            <td><?php echo form_input($tendanhmucsubcon); ?></td>
            <td></td>
        </tr>
		
		
        
        
		
		<tr>
        <th valign="top">Thuộc danh mục con:</th>
        <td>  <select  name="danhmuccon" class="styledselect_form_1">
		
				<?php foreach($danhmuccon as $item)
				{
				if(count($danhmuccon)>0)
				{
				
				
				?>
                    <option value="<?php echo $item['iddmcon'];?>"><?php echo $item['tendmcon'];?></option>
                 <?php }}   ?>
                </select>
            
        </td>
        <td></td>
        </tr>
        
        
    
    <tr>
        <th>&nbsp;</th>
        <td valign="top">
            <input type="submit" name="ok" value="Thêm">
            <input type="reset" name="reset" value="Hủy">
        </td>
        <td></td>
    </tr>
    </table>
    <!-- end id-form  -->
    </form>
    
    </td>
    <td>

    

</td>
</tr>
<tr>
<td><img src="<?php echo base_url();?>images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
 <div id="table-content">
			
						 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">				
				<table border="0" width="600" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a style="color:white;" href="#">Tên loại sản phẩm</a>	</th>					
					<th class="table-header-repeat line-left"><a style="color:white;" href="#">Tên danh mục con</a>	</th>					
										
					
					
										
					
					<th class="table-header-options line-left"><a style="color:white;" href="#">Tuỳ chọn</a></th>
				</tr>
				
				
				<?php foreach($danhmucsubcon as $item)
					{
					
					?>
				<tr>
					<td><input name="chkid[]" type="checkbox"/></td>
					
					<td><?php echo $item['tendmsubcon'];?></td>
					<td><?php foreach($danhmuccon as $items){ if($items['iddmcon']==$item['iddmcon']) echo $items['tendmcon']; else echo "";}?></td>	
										
					
					
					<td class="options-width">
					<a onclick="myFunction<?php echo $item['iddmsubcon']; ?>()" title="Sửa" class="icon-1 info-tooltip" href ="javascript:void{0};"></a>
					
					<?php $chuoi=base_url()."cadmin/suadanhmucsubcon/".$item['iddmsubcon'];
					$dem=0;
					$detai=$item['iddmsubcon'];
					
					echo "
					<script>
function myFunction$detai() {
    var myWindow=window.open('$chuoi','1353463131339','width=800,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
    
    myWindow.focus();
}
</script>";?>
					<a title="Xóa" class="icon-2 info-tooltip" href ="<?php echo base_url();?>cadmin/xoadanhmucsubcon/<?php echo $item['iddmsubcon'];?>" onclick="return confirm('Chắc chắn muốn xóa danh mục [<?php echo $item['tendmsubcon'];?>]?');"></a>
					</td>
					
				</tr>
				<?php };?>
				
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>



 


    

 
 