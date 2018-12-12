<script>
function showUser() {
	var giatri = document.getElementById('loaidoan').value;
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
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax1/ajax_level2/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("iddetai=<?php echo $this->uri->segment(3);?>&idloaidoan="+giatri);
}
</script>
<?php
$ngaythang= date('d/m/Y');

				
    $tendmcon = array(
                        'name'        => 'tendmcon',
                        'id'          => 'tendmcon',
                        'width'          => '10px',
						'class'        => 'inp-form',
						"value" => $info["tendmcon"],
                    );
	
					
	
	
	
	$submit = array(
                        "name"=>"ok",
                        "value"=>"Sửa",
						
                    );
					
					
					
					
					
?>

<?php //print_r($info);?>

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
    
}

if (b<a&&a=="")
{
	
    alert ("[Ngày bắt đầu] chưa được chọn. Hãy chọn [ngày bắt đầu] hoặc hệ thống sẽ tự động chọn - [Ngày bắt đầu]: "+(document.form1.ngayketthuc.value)+" làm mặc định");
    document.form1.ngaybatdau.value=document.form1.ngayketthuc.value;
}



}

</script> 






    




 



<div id="page-heading"><h2>Sửa danh mục con</h2></div>

<div class="error">
        <ul>
            <?php
                echo validation_errors('<li>','</li>');
                if(isset($error) && $error!="" && !empty($error))
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
            <th valign="top"><?php echo form_label("Tên danh mục con: ")?></th>
            <td><?php echo form_input($tendmcon); ?></td>
            <td></td>
        </tr>
       
		<?php //print_r($info);?>
        <tr>
        <th valign="top">Thuộc danh mục cha:</th>
        <td>  <select id="danhmuccha" name="danhmuccha" class="styledselect_form_1">
		<option value="<?php echo $info['iddmcha'];?>"><?php echo $info['tendmcha'];?></option>
				<?php 
				
				foreach($info1 as $item)
				{?>
                    <?php if($info['iddmcha']!=$item['iddmcha'])echo '<option value="'.$item['iddmcha'].'">';?><?php if($info['tendmcha']!=$item['tendmcha'])echo $item['tendmcha']."</option>";?>
                 <?php };   ?>
                </select>
            
        </td>
        <td></td>
        </tr>
        
        
    
    <tr>
        <th>&nbsp;</th>
        <td valign="top">
            <?php echo form_submit($submit)?>
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



 


    

 
 