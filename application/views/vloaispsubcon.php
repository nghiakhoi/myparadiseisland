<?php $now = getdate();   ?>
<div class="margin">
<div class="content-helper clear">    
<div class="central-column">        
<div class="central-content">
<div class="cm-notification-container"></div>
<script type="text/javascript">
		$(document).ready(function () {
			var height_title_feature = $(".span8.product-large h2").height();
			if (height_title_feature > 30) {
				$(".span8.product-large h2").css("margin-top", "-13px");
			}			
			// $('.promotion_winners').cycle();
		});
	</script>	
<script type="text/javascript">
document.write(''); // hide noscript tags
</script>	
<div class="pagination-container" id="pagination_contents">

<div class="cm-pagination-wraper"><a name="pagination" href="" rel="" rev="pagination_contents" class="hidden"></a></div>
<div class="detail-breadcrumb">
<div class="detail-breadcrumb-inner">
<div class="row">
<div class="span6">
<div class="breadcrumbs breadcrumb">

</div>
</div>
<div class="span6">
<div class="yahoo" style="float: right; margin-left: 10px; ">
<a href="ymsgr:sendim?hnghiakhoi" style="color: #333;"><img class="yahoo-icon" src="images/online-yahoo.gif" org-src="http://opi.yahoo.com/online?u=hnghiakhoi&t=5" alt="" style="vertical-align: -1px;margin-right: 4px;">Hỗ trợ 1</a>
<a href="ymsgr:sendim?hnghiakhoi" style="padding-left: 7px;color: #000;"><img class="yahoo-icon" src="images/online-yahoo.gif" org-src="http://opi.yahoo.com/online?u=hnghiakhoi&t=5" alt="" style="vertical-align: -1px;margin-right: 4px;">Hỗ trợ 2</a>
</div>
<div class="phone">
<strong>08 668 39296</strong>
</div>
<div class="addthis_toolbox addthis_default_style" addthis:url="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" style="float: right; margin-right: 20px; margin-top: 2px;">
<div style="float:left; max-width: 100px;">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
</div>
<div style="float:left; max-width: 100px;">
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
</div>
</div>
</div>
</div>
</div>
</div>
<a href="#" style="float: left; position: absolute; width: 100%;height: 200px;"></a>
<h1 class="mainbox-title"><span><span class="secure-page-title"><?php echo $tendanhmuc['tendmsubcon'];?></span></span></h1>	

<div class="clear"></div>
<div class="home_bg feature-row" style="margin:auto;margin-top:-10px;">
<div id="list_product_item" style="margin-top:30px;margin-left:0px;">
<div style="margin-left:-37px;">
<div class="row product-row">
<?php $a=0; $dem=0; foreach($sanpham as $item) { 
  if($a<3)
  {
  ?> 


<div class="span4  product-item cart_items" style="margin-top:30px;">
<div class="meta-icon-2">
</div>
<div class="meta">
<!--<div class="buy_number buy_number-open" style="">
<span><?php //echo $item['songuoimua']; ?></span>
đã mua
</div> -->
<div class="time">
<span class="key" rel="<?php $nam=substr($item['ngayketthuc'],6,4);
							$thang=substr($item['ngayketthuc'],3,2);
							$ngay=substr($item['ngayketthuc'],0,2);
 echo (mktime(0,0,0,$thang,$ngay,$nam));?>"></span>
</div>
</div>

<div class="type type-product"></div>
<div class="thumb">
<a class="imagetam" href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html">
<img  class=" product-thumb lazy"   id="det_img_187231287" src="<?php echo base_url();?>images/grey.gif" data-original="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" width="315" height="400" alt="<?php echo $item['tensp'];?>"  border="0" />												
<!--<div class="icon-exclusive ">
<div class="haha">
<?php if(strlen($item['idsp'])<=8){?>
		  <span id="giamgia"><span style="font-weight:bold;font-size:17px;"><?php echo $item['idsp']; ?></span></span>
  <?php }else{?>
			<span id="giamgia"><span style="font-weight:bold;font-size:11px;"><?php echo $item['idsp']; ?></span></span>
  <?php }?>
</div>
</div>-->
</a>
</div>
<div class="title">
<h2><a href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" title="<?php echo $item['tensp'];?>"><?php echo $item['tensp'];?></a></h2>
<span class="sell-price"><?php echo number_format($item['giagiam'],"0",",",".");?><sup>đ</sup></span>
<span class="original-price"><?php echo number_format($item['giagoc'],"0",",",".");?><sup>đ</sup></span>

<a href="javascript:;" onclick="showUserstt<?php echo $item['stt'];?>();" class="view" id="view1"></a>
<input type="hidden" name="sttsp" id="sttsp<?php echo $item['stt'];?>" value="<?php echo $item['stt'];?>"/>

<?php $mau=explode("|", $item['mau']); 
	for($j=0;$j<count($mau);$j++)
	{
	
	if($j==0)
	{
	?>
	

<?php  $size=explode(",", $item['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>

<?php }else break;}?>

<script>
function showUserx<?php echo $j;?><?php echo $item['stt'];?>() {
	var giatri1 = document.getElementById('idsp<?php echo $item['stt'];?>').value;
	var giatri2 = document.getElementById('hinhmau<?php echo $j;?><?php echo $item['stt'];?>').value;
	var giatri3 = document.getElementById('sizechon<?php echo $j;?><?php echo $item['stt'];?>').value;
	
	var p1="idsp="+giatri1;
	var p2="mau="+giatri2;
	var p3="size="+giatri3;
	
	
	
	var p=p1+"&"+p2+"&"+p3;
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
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level14/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>

	
	<?php }else{
	
	if($mau[$j]!=null)
	{
?>

<?php  $size=explode(",", $item['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>

<?php }else break;}?>

<script>
function showUserx<?php echo $j;?><?php echo $item['stt'];?>() {
	var giatri1 = document.getElementById('idsp<?php echo $item['stt'];?>').value;
	var giatri2 = document.getElementById('hinhmau<?php echo $j;?><?php echo $item['stt'];?>').value;
	var giatri3 = document.getElementById('sizechon<?php echo $j;?><?php echo $item['stt'];?>').value;
	
	var p1="idsp="+giatri1;
	var p2="mau="+giatri2;
	var p3="size="+giatri3;
	
	
	
	var p=p1+"&"+p2+"&"+p3;
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
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level14/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>
	 
<?php }else break;}}?>

<script>
function showUserstt<?php echo $item['stt'];?>() {
	var giatri1 = document.getElementById('sttsp<?php echo $item['stt'];?>').value;
	
	
	var p1="sttsp="+giatri1;
	
	
	
	
	var p=p1;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHintstt").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level15/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>


</div>
</div>


<?php  $a++;}
	else
	{ ?>

<div class="span4  product-item cart_items" style="margin-top:30px;">
<div class="meta-icon-2">
</div>
<div class="meta">
<!--<div class="buy_number buy_number-open" style="">
<span><?php //echo $item['songuoimua']; ?></span>
đã mua
</div> -->
<div class="time">
<span class="key" rel="<?php $nam=substr($item['ngayketthuc'],6,4);
							$thang=substr($item['ngayketthuc'],3,2);
							$ngay=substr($item['ngayketthuc'],0,2);
 echo (mktime(0,0,0,$thang,$ngay,$nam));?>"></span>
</div>
</div>

<div class="type type-product"></div>
<div class="thumb">
<a class="imagetam" href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html">
<img  class=" product-thumb lazy"   id="det_img_187231287" src="<?php echo base_url();?>images/grey.gif" data-original="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" width="315" height="400" alt="<?php echo $item['tensp'];?>"  border="0" />												
<!--<div class="icon-exclusive ">
<div class="haha">
<?php if(strlen($item['idsp'])<=8){?>
		  <span id="giamgia"><span style="font-weight:bold;font-size:17px;"><?php echo $item['idsp']; ?></span></span>
  <?php }else{?>
			<span id="giamgia"><span style="font-weight:bold;font-size:11px;"><?php echo $item['idsp']; ?></span></span>
  <?php }?>
</div>
</div>-->
</a>
</div>
<div class="title">
<h2><a href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" title="<?php echo $item['tensp'];?>"><?php echo $item['tensp'];?></a></h2>
<span class="sell-price"><?php echo number_format($item['giagiam'],"0",",",".");?><sup>đ</sup></span>
<span class="original-price"><?php echo number_format($item['giagoc'],"0",",",".");?><sup>đ</sup></span>

<a href="javascript:;" onclick="showUserstt<?php echo $item['stt'];?>();" class="view" id="view1"></a>
<input type="hidden" name="sttsp" id="sttsp<?php echo $item['stt'];?>" value="<?php echo $item['stt'];?>"/>

<?php $mau=explode("|", $item['mau']); 
	for($j=0;$j<count($mau);$j++)
	{
	
	if($j==0)
	{
	?>
	

<?php  $size=explode(",", $item['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>

<?php }else break;}?>

<script>
function showUserx<?php echo $j;?><?php echo $item['stt'];?>() {
	var giatri1 = document.getElementById('idsp<?php echo $item['stt'];?>').value;
	var giatri2 = document.getElementById('hinhmau<?php echo $j;?><?php echo $item['stt'];?>').value;
	var giatri3 = document.getElementById('sizechon<?php echo $j;?><?php echo $item['stt'];?>').value;
	
	var p1="idsp="+giatri1;
	var p2="mau="+giatri2;
	var p3="size="+giatri3;
	
	
	
	var p=p1+"&"+p2+"&"+p3;
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
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level14/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>

	
	<?php }else{
	
	if($mau[$j]!=null)
	{
?>

<?php  $size=explode(",", $item['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>

<?php }else break;}?>

<script>
function showUserx<?php echo $j;?><?php echo $item['stt'];?>() {
	var giatri1 = document.getElementById('idsp<?php echo $item['stt'];?>').value;
	var giatri2 = document.getElementById('hinhmau<?php echo $j;?><?php echo $item['stt'];?>').value;
	var giatri3 = document.getElementById('sizechon<?php echo $j;?><?php echo $item['stt'];?>').value;
	
	var p1="idsp="+giatri1;
	var p2="mau="+giatri2;
	var p3="size="+giatri3;
	
	
	
	var p=p1+"&"+p2+"&"+p3;
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
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level14/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>
	 
<?php }else break;}}?>

<script>
function showUserstt<?php echo $item['stt'];?>() {
	var giatri1 = document.getElementById('sttsp<?php echo $item['stt'];?>').value;
	
	
	var p1="sttsp="+giatri1;
	
	
	
	
	var p=p1;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHintstt").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level15/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>


</div>
</div>
<script type="text/javascript">
			
			
				
			
			$(document).ready(function(){
			var colsize = $('.overview ul li').size();
			var colHeight = 0;
			$(".overview ul li").each(function() {
			colHeight += $(this).outerHeight() + parseInt($(this).css("margin-top"));
			});
				if(colsize < 4){
				$('.viewport').height(colHeight);
			}

                                
				// $('#scrollbar1').tinyscrollbar({ sizethumb: 34 });
                                
				$('.icon_close, .multidealoptions<?php echo $dem;?> .overlay').bind('click', function(){ 
				$('.multidealoptions<?php echo $dem;?>').css('display','none');
			});
				$('#view<?php echo $dem;?>').bind('click', function(){
				var windowHeight = $(window).height();
				var popupHeight = $('.box_sku<?php echo $dem;?>').height();
				var height = Math.floor((windowHeight - popupHeight)/2);
				if (height < 0) height = 0;
				$('.box_sku_all<?php echo $dem;?>').css('top', height);
                $('.multidealoptions<?php echo $dem;?>').attr('style', "display:block;position:fixed;top:50px !important;");                        
				
			});
					
				$(document).keydown(function (e) {
				if (e.keyCode == 27) {
				$('.icon_close').trigger('click');
			}
				return true;
			});
			});
		</script>

<?php }
	
	
	}?>	
	
	<script type="text/javascript">
			
			
				
			
			$(document).ready(function(){
			var colsize = $('.overview ul li').size();
			var colHeight = 0;
			$(".overview ul li").each(function() {
			colHeight += $(this).outerHeight() + parseInt($(this).css("margin-top"));
			});
				if(colsize < 4){
				$('.viewport').height(colHeight);
			}

                                
				// $('#scrollbar1').tinyscrollbar({ sizethumb: 34 });
                                
				$('.icon_close, .multidealoptions .overlay').bind('click', function(){ 
				$('.multidealoptions').css('display','none');
			});
				$('.view').bind('click', function(){
				var windowHeight = $(window).height();
				var popupHeight = $('.box_sku').height();
				var height = Math.floor((windowHeight - popupHeight)/2);
				if (height < 0) height = 0;
				$('.box_sku_all').css('top', height);
                $('.multidealoptions').attr('style', "display:block;position:fixed;top:50px !important;");                        
				
			});
					
				$(document).keydown(function (e) {
				if (e.keyCode == 27) {
				$('.icon_close').trigger('click');
			}
				return true;
			});
			});
		</script>
	
<div id="subsanpham" class="multidealoptions" style="top: 0px;display:none;">
<div class="overlay"></div>
<div class="box_sku_all" style="top: 110px;">
<div class="box_sku" id="scrollbar1">
<div class="icon_close icon_close_sku"></div>
<p class="title_sku">
Hãy chọn "Mẫu" và "Size" bạn thích
</p>
<div class="clear"></div>
<div style="overflow-x: auto; overflow-y: hidden;">
<div style="width: 510px;margin-left:0px;" class="row product-row">


<div id="txtHintstt">

</div>



</div>
</div>
<!--<div class="scrollbar colright"><div class="track line_scroll"><div class="thumb icon_scroll"><div class="end"></div></div></div></div>-->
<div class="cb"></div>
</div>

</div>
</div>
<!--list_product_item--></div>
<p>&nbsp;</p>
<div >
<div class="pagination cm-pagination-wraper center pagination_2">
<?php
                    if($num_rows>0){
                        echo $link;
                    }
?>
</div>
<!--pagination_contents--></div>
<!--list_product_pagination--></div><div class="mainbox-container">
<div class="mainbox-body"></div>
</div>  
</div>
</div>  
<div class="bottom clear-both">
<div class="wysiwyg-content">
<div style="background: #FFF; margin-top: 20px;" class="fb-like-box" data-href="https://www.facebook.com/dealhangviet" data-height="220" data-width="995" data-show-faces="true" data-stream="false" data-border-color="white" data-header="true"></div>
</div><div class="wysiwyg-content">
<div class="hidden"><a rel="publisher" href="https://plus.google.com/+hotdeal/">Find us on Google+</a></div>
</div>
</div>
</div>
</div></div>
</div>
</div>	