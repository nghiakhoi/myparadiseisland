<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Deal Hàng Việt</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="vn" />
<meta name="description" content="Dealhangviet.vn" />

<meta name="keywords" content="Dealhangviet.vn" />

<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />


<link href="<?php echo base_url(); ?>images/logo.png" rel="shortcut icon" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.custom.min2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/core2.js?v=1"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ajax2.js?v=1"></script>
<script src="<?php echo base_url(); ?>js/jquery.lazyload.js?v=1"></script>
<script src="<?php echo base_url(); ?>js/jquery.responsiveslider.js?v=1"></script>
<script src="<?php echo base_url(); ?>js/jquery.sidr.min.js?v=1"></script>
<script src="<?php echo base_url(); ?>js/jquery.customselect.js?v=1"></script>
<script src="<?php echo base_url(); ?>js/jquery.accordion.js?v=1"></script>
<script src="<?php echo base_url(); ?>js/jquery.touchwipe.min.js"></script>

<script src="<?php echo base_url(); ?>js/common.js?v=10"></script>
<script type="text/javascript">
//<![CDATA[
var index_script = 'index.php';
var current_path = '';
var http_location = '';
var domain_location = '';
var changes_warning = 'Y';

var lang = {
	select_district: 'Quận/Huyện',
	select_state: 'Chọn Tỉnh/Thành phố',
	select_ward: 'Chọn Phường/Xã',
	cannot_buy: 'You cannot buy the product with these option variants ',
	no_products_selected: 'No products selected',
	error_no_items_selected: 'No items selected! At least one check box must be selected to perform this action.',
	delete_confirmation: 'Are you sure you want to delete the selected items?',
	text_out_of_stock: 'Out-of-stock',
	in_stock: 'Tồn kho',
	items: 'item(s)',
	text_required_group_product: 'Please select a product for the required group [group_name]',
	notice: 'Thông báo',
	warning: 'Cảnh báo',
	loading: 'Đang tải...',
	none: 'None',
	text_are_you_sure_to_proceed: 'Bạn có chắc là bạn muốn xử lý?',
	text_invalid_url: 'You have entered an invalid URL',
	text_cart_changed: 'Items in the shopping cart have been changed. Please click on \"OK\" to save changes, or on \"Cancel\" to leave the items unchanged.',
	error_validator_email: 'Địa chỉ <b>[field]<\/b> không chính xác.\r\n',
	error_validator_confirm_email: 'The email addresses in the <b>[field]<\/b> field and confirmation fields do not match.',
	error_validator_phone: '<b>Số điện thoại<\/b> không chính xác. Định dạng đúng của số điện thoại là (555) 555-55-55 hoặc 55 55 555 5555.',
	error_validator_integer: 'The value of the <b>[field]<\/b> field is invalid. It should be integer.',
	error_validator_multiple: 'The <b>[field]<\/b> field does not contain the selected options.',
	error_validator_password: '<b>[field2]<\/b> và <b>[field1]<\/b> không khớp.',
	error_validator_required: 'Vui lòng nhập \" <b>[field]<\/b> \" .',
	error_validator_zipcode: 'The ZIP / Postal code in the <b>[field]<\/b> field is incorrect. The correct format is [extra].',
	error_validator_message: 'The value of the <b>[field]<\/b> field is invalid.',
	text_page_loading: 'Loading... Your request is being processed, please wait.',
	view_cart: 'View cart',
	checkout: 'Thanh toán',
	product_added_to_cart: 'Bạn đã thêm deal vào giỏ hàng',
	products_added_to_cart: 'Products were added to your cart',
	product_added_to_wl: 'Product was added to your Wish list',
	product_added_to_cl: 'Product was added to your Compare list',
	close: 'Close',
	error: 'Lỗi',
	error_ajax: 'Oops, something went wrong ([error]). Please try again.',
	text_changes_not_saved: 'Your changes have not been saved.',
	text_data_changed: 'Your changes have not been saved.\r\n\r\nPress OK to continue, or Cancel to stay on the current page.'
}

var currencies = {
	'primary': {
		'decimals_separator': ',',
		'thousands_separator': '.',
		'decimals': '0',
		'coefficient': '1'
	},
	'secondary': {
		'decimals_separator': ',',
		'thousands_separator': '.',
		'decimals': '0',
		'coefficient': '1'
	}
};

var default_editor = 'tinymce';
var default_previewer = 'prettyphoto';

var cart_language = 'VN';
var images_dir = '/skins/mobilev2/mobile/images';
var skin_name = 'hotdeal';
var notice_displaying_time = 5;
var cart_prices_w_taxes = false;
var translate_mode = false;
var regexp = new Array();


$(document).ready(function(){
	jQuery.runCart('C');
});

document.write('<style>.cm-noscript { display:none }</style>'); // hide noscript tags
//]]>
</script>




<script type="text/javascript">
		var disable_fixed_height = false;
</script>

<script language='javascript'>
 
 function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
 }
 
 </script>


<link href="<?php echo base_url(); ?>css/jqueryui1.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>css/hd_style_new.css?v=9" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/common.css?v=1" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/nivo-slider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/default.css" rel="stylesheet" type="text/css" />






<style>
.cm-index-index .main {
		
}
.category-and-filters {
		}
.noel_and_tet_content {
	width: 100%;
	height: 60px; 
	background: url(/skins/mobilev2/mobile/images/tet_2014/ld_top_mob.jpg?v=1) no-repeat #f7f7f7 50% !important;
}	
#temp_page {
		}
.box_count_down div, .box_count_down span, .box_count_down .sep {
	color: #FFF;
	text-align: center;
	text-transform: uppercase;
	float: left;
}
.remain-time-home-big-sale-2 .txt_count_down label {
	background: #eaeaea;
	color: #000;
	font-size: 20px;
	width: 38px;
	margin: 0 6px;
}
.remain-time-home-big-sale-2 .txt_count_down {
	line-height: 6px;
}
.remain-time-home-big-sale-2 .box_count_down span {
	margin-left: 4px;
}
.remain-time-home-big-sale-2 .sep {
	padding-top: 24px;
}

.remain-time-home-big-sale-2 .txt_count_down label {
	color: #fff; 
	font-family: "OpenSans-Bold", sans-serif !important;
	font-size: 20px;
	text-align: center;
	text-transform: uppercase;
	background: none;
	/*padding: 0 0 6px 0;*/

	width: 40px;
	height: 40px;
	line-height: 40px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
			display: inline-table;
}
.box_count_down div, .box_count_down span, .box_count_down .sep {
	color: #fff;
	font-family: "OpenSans", sans-serif !important;
}
.remain-time-home-big-sale-2 .sep {
	padding-top: 8px;
	font-size: 15px;
}	
.remain-time-home-big-sale-2 span {
	color: #fefefe;
	font-size: 10px;
	display: inline-block;
	width: 100%;
}
</style>
</head>

<body class="c-index m-index cm-index-index">

<script type="text/javascript">
		var server_time = '<?php $now = getdate();  echo mktime($now["hours"],$now["minutes"],$now["seconds"],$now["mon"],$now["mday"],$now["year"]);mktime($now["hours"],$now["minutes"],$now["seconds"],$now["mon"],$now["mday"],$now["year"]); ?>';
</script>
<div id="temp_page">
	<div class="top">
		<div id="sidr-left" class="sidr left">
<div class="search-menu">
	<form name="search-box" action="/ho-chi-minh/tim-kiem" class="form-search-box">
		<input type="text" name="q" class="search-textbox" placeholder="Tìm kiếm..." />
	</form>
</div>
<div id="menu">
    <ul class="catalog-menu">
        
        <?php foreach($menucha as $item1)
{ ?>

				<li class="first-level">
			<a href="#" >
				+ <?php echo $item1['tendmcha'];?>
			</a>
			<ul class="catalog-menu1" id="submenu" style="margin-left:20px;">
			<li class="first-level">
			<a href="<?php echo base_url();?>danh-muc-mobile/<?php echo $item1['slug'];?>-<?php echo $item1['iddmcha'];?>.html" >
				Tất cả <?php echo $item1['tendmcha'];?>
			</a>
						</li>							
			
<?php foreach($menucon as $item2)
{ if($item2['iddmcha']==$item1['iddmcha'])
	{
?>
				<li class="second-level">
			<a href="<?php echo base_url();?>danh-muc-con-mobile/<?php echo $item2['slug'];?>-<?php echo $item2['iddmcon'];?>.html" >
				* <?php echo $item2['tendmcon'];?>
			</a>
			
			
										
			
<?php foreach($menusubcon as $item3)
{ if($item3['iddmcon']==$item2['iddmcon'])
	{
?>
<ul class="catalog-menu2" id="submenu1" style="margin-left:20px;">
				<li class="third-level">
			<a href="<?php echo base_url();?>danh-muc-sub-con-mobile/<?php echo $item3['slug'];?>-<?php echo $item3['iddmsubcon'];?>.html" >
				<?php echo $item3['tendmsubcon'];?>
			</a>
						</li>	
</ul>						
<?php }else echo "";}?>				
			
		
					
	

			
						</li>			
<?php }}?>				
			
		
					
	
</ul>
						</li>			
<?php }?>
        
    </ul>
</div>



<script type="text/javascript">



$(function($) {

$('#menu .first-level:has("#submenu")').children('#submenu').hide(); //hide submenu
$('#menu .first-level:has("#submenu1")').children('#submenu1').hide();

$('#menu .first-level:has("#submenu")').click(function(){ 
    $(this).children('#submenu').slideToggle(); //toggle submenu
});



$('#menu .first-level .second-level:has("#submenu1")').click(function(){ 
    $(this).children('#submenu1').slideToggle(); //toggle submenu
});



});
</script>
</div>

<div class="top-menu" style="background-image:url(<?php echo base_url();?>images/1.jpg);background-size:100% 100%;">
<div class="c1">
	<a href="#" class="icon-menu"></a>
</div>
<div class="c1 p9t text_center">
	<a href="<?php echo base_url();?>ctrangchumobile">
		<img src="<?php echo base_url();?>images/logodeal1.png" width="119" height="18" border="0" alt="Deal Hàng Việt"/>
	</a>
</div>
<div class="c1">
	<a href="<?php echo base_url();?>cgiohangnomobile" class="icon-giohangmobile"></a>
</div>


<div class="cb"></div>

</div>
	
       
		<div id="page_content">
							
							<?php echo $content_for_layout ;// các file view được nạp vào layout?>
							
			<div class="nav_footer">
	<ul>
		  
			<li><a href="<?php echo base_url();?>ctrangchumobile">Trang chủ</a></li>
			<li><a href="#">Chính sách đổi trả</a></li>         
			<li><a href="#">Liên hệ</a></li>      
			
	</ul>
	<div class="cb"></div>
</div>



<div class="box_adress">
					<p>
					CÔNG TY DEAL HÀNG VIỆT<br />
					78D, Đường Số 12, P. Bình Hưng Hòa A, Q. Bình Tân, TP.HCM
			</p>
			
			
			<p class="p10t">Hotline:  0979 807 668 - 08 668 39296</p>
	</div>				<div class="cb"></div>





		</div>
	</div>
</div>




	<div id="fb-root"></div>


</body>
</html>