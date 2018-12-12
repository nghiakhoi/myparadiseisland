<script>


$(document).ready(
            function() {
                
		
    resetForms();


		  




	
$( ".chon" ).on({
click: function() {
$( '.test' ).removeClass( "dobong" );
$( this ).toggleClass( "dobong" );
}
});
                
            });
			
			function resetForms() {
    document.forms['commentForm'].reset();
}

</script>

<div class="margin">
<div class="content-helper clear">    
<div class="central-column">        
<div class="central-content">
<div class="cm-notification-container"></div>
<div class="mainbox-">
<div class="mainbox-body">

<div class="detail-breadcrumb">
<div class="detail-breadcrumb-inner">
<div class="row">
<div class="span8">

<div class="breadcrumbs breadcrumb" itemscope
itemtype="http://data-vocabulary.org/Breadcrumb">
<ul>
<li itemscope
itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="<?php echo base_url();?>ctrangchu"
itemprop="url"><img
src="<?php echo base_url();?>images/icon-home.png"
alt=""
style="vertical-align: -1px;"/><span
itemprop="title"
style="display: none;">Trang chủ</span></a>
</li>
<li>
<img src="<?php echo base_url();?>images/icon-arrow.png"
alt=""
style="vertical-align: 1px;"/>
</li>


<li>
<span itemprop="title"><?php echo $chitietsp['tensp'];?></span>
</li>
</ul>
</div>

</div>
<div class="span4">				
<div class="yahoo" style="float: right; margin-left: 10px; ">
<a href="ymsgr:sendim?hnghiakhoi" style="color: #333;"><img class="yahoo-icon" src="images/online-yahoo.gif" org-src="http://opi.yahoo.com/online?u=hnghiakhoi&t=5" alt="" style="vertical-align: -1px;margin-right: 4px;">Hỗ trợ 1</a>
<a href="ymsgr:sendim?hnghiakhoi" style="padding-left: 7px;color: #000;"><img class="yahoo-icon" src="images/online-yahoo.gif" org-src="http://opi.yahoo.com/online?u=hnghiakhoi&t=5" alt="" style="vertical-align: -1px;margin-right: 4px;">Hỗ trợ 2</a>
</div>
<div class="phone">
<strong>08 668 39296</strong>
</div>
</div>
</div><hr style="border:2px solid #e3e3e3;margin-top:1px;">
</div>
</div>

<div class="product-main-info product-main-info-short">	
<div class="row">		
<div class="span6 product-images">
<div class="product-image" style="margin-left: 0;">
<div id="jslidernews1" class="lof-slidecontent dudinh" style="width:394px; height:500px;">
<div class="preload"><div></div></div>
<!-- MAIN CONTENT --> 
<div class="main-slider-content" style="width:394px; height:500px;">
<ul class="sliders-wrap-inner">
<?php $hinhanh=explode("|", $chitietsp['hinhanhphu']); 
	for($i=0;$i<count($hinhanh);$i++)
	{
	if($hinhanh[$i]!=null)
	{
?>
<li><img  class="  "   id="det_img_1394596030" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>" width="394" height="500" alt="<?php echo $chitietsp['tensp'];?>"  border="0" /></li>
<?php } else break;}?>
</ul>  	
</div>
<!-- END MAIN CONTENT --> 
<!-- NAVIGATOR -->
<div class="navigator-content">
<div class="button-next"></div>
<div class="navigator-wrapper">
<ul class="navigator-wrap-inner">
<?php $hinhanh=explode("|", $chitietsp['hinhanhphu']); 
	for($j=0;$j<count($hinhanh);$j++)
	{
	if($hinhanh[$j]!=null)
	{
?>
<li><img  class="  "   id="det_img_517231955" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$j];?>" width="44" height="44" alt="<?php echo $chitietsp['tensp'];?>"  border="0" /></li>
<?php }else break;}?>
</ul>
</div>
<div  class="button-previous"></div>
</div> 
<!----------------- END OF NAVIGATOR --------------------->                </div>
</div>
<script type="text/javascript">
                    $(document).ready(function () {
                        // buttons for next and previous item
                        var buttons = {
                            previous: $('#jslidernews1 .button-previous'),
                            next: $('#jslidernews1 .button-next')
                        };
                        $('#jslidernews1').lofJSidernews({
                            interval: 4000,
                            direction: 'opacity',
                            easing: 'easeInOutQuad',
                            duration: 400,
                            auto: true,
							isPreloaded: false,
                            maxItemDisplay: 5,
                            mobile: false,
                            navPosition: 'horizontal', // horizontal
                            navigatorHeight: 50,
                            navigatorWidth: 60,
                            mainWidth: 394,
                            buttons: buttons,
                            onComplete: function () {
                                slider_nav_margin();
                            }
                        });
                    });
                </script>
</div>
<div class="span6 product-info" style="width:45%;">
<h1><?php echo $chitietsp['tensp'];?></h1>
<div class="addthis_toolbox addthis_default_style">
<div style="float:left; max-width: 100px;"><a class="addthis_button_facebook_like"
fb:like:layout="button_count"></a></div>
<div style="float:left; max-width: 100px;"><a class="addthis_button_google_plusone"
g:plusone:size="medium"></a></div>
<div style="float:left"><a class="addthis_counter addthis_pill_style"></a></div>
</div>
<p><?php echo $chitietsp['motangan'];?></p>
<hr/>
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script>
// only for demo purposes
	

	$(document).ready(function() {
		var validator = $("#commentForm").validate({ 
        rules: { 
            mauchon: "required", 
			sizechon: "required"
            
        }, 
        messages: { 
            mauchon: "Quý khách vui lòng chọn màu sản phẩm.", 
			sizechon: "Quý khách vui lòng chọn size."
            
        }
    }); 
		
	});
</script>
<style>

label.error{
    color:red;
	
}
</style>
<form action="<?php echo base_url();?>dat-hang/<?php echo $chitietsp['stt'];?>.html" method="post" name="product_form_94999" enctype="multipart/form-data"  id="commentForm">




<label class=" cm-profile-field cm-required " >Chọn màu sản phẩm:</label>

<span style="display:block;">


<?php $mau=explode("|", $chitietsp['mau']); 
	for($j=0;$j<count($mau);$j++)
	{
	
	if($j==0)
	{
	?>
	
<label style="float:left;width:58px;margin-right:10px;height:53px;margin-bottom:10px;" for="mauchon" class="chon test ">

<span class="label" style="background-image:url('../uploads/<?php echo $mau[$j];?>');width:50px;height:50px;background-size:cover;"><input  style="opacity:0;margin-top:38px"  type="radio" value="<?php echo $mau[$j];?>" name="mauchon" id="mauchon" required /> </span>
</label>
	
	<?php }else{
	
	if($mau[$j]!=null)
	{
?>
<label style="float:left;width:58px;margin-right:10px;height:53px;margin-bottom:10px;" class="chon test">

<span class="label" style="background-image:url('../uploads/<?php echo $mau[$j];?>');width:50px;height:50px;background-size:cover;"><input style="opacity:0;margin-top:38px"  type="radio" value="<?php echo $mau[$j];?>" name="mauchon" id="mauchon" > </span>
</label>
<?php }else break;}}?>

</span>

<br/><br/><br/><br/><br/>
Chọn size:
<select required  name="sizechon" id="sizechon" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">
<option value="">-- Vui lòng chọn Size --</option>
<?php  $size=explode(",", $chitietsp['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}?>
</select>

<br/><br/>

<div class="list-price" style="font-weight:bold;">
Giá gốc: <?php echo number_format($chitietsp['giagoc'],"0",",","."); if($chitietsp['giagiam']!=0||$chitietsp['giagiam']!=0){ $phantram=round(($chitietsp['giagiam']*100)/$chitietsp['giagoc']);}else $phantram=0;?><sup>đ</sup>			
(-<?php echo (100-$phantram);?>%)
</div>
<div class="sell-price" style="font-weight:bold; font-family:tahoma;"><?php echo number_format($chitietsp['giagiam'],"0",",",".");?><sup>đ</sup></div>


<div class="cart-button">
<input type="hidden" name="result_ids" value="cart_status,wish_list" />
<input type="hidden" name="redirect_url" value="index.php?dispatch=products.view&amp;product_id=94999&amp;hd_no_cache_please=Y" />
<input type="hidden" name="product_data[94999][product_id]" value="94999" />



<div class="buttons-container">	
<?php
$ngayketthuc=substr($chitietsp['ngayketthuc'],6,4)."/".substr($chitietsp['ngayketthuc'],3,2)."/".substr($chitietsp['ngayketthuc'],0,2);
		
		if(strtotime($ngayketthuc)>strtotime(date('Y/m/d')))
		{ ?>
<div class="cm-reload-94999" id="add_to_cart_update_94999">
<span id="cart_add_block_94999">
<span id="wrap_button_cart_94999"  class="button-submit-action"><input id="button_cart" type="submit" value="Mua" name="datmua"></span>
</span>
<span id="cart_buttons_block_94999">
</span>
</div>
<?php }
	else
	{
?>

<span class="disable cm-multideal deal-expired"></span>


<?php }?>



</div>

</div>

<div class="buy-number">
<?php echo $chitietsp['songuoimua'];?>
<br>
<span>đã mua</span>
</div>

<div class="remain-time"  rel="<?php $nam=substr($chitietsp['ngayketthuc'],6,4);
							$thang=substr($chitietsp['ngayketthuc'],3,2);
							$ngay=substr($chitietsp['ngayketthuc'],0,2);
 echo (mktime(0,0,0,$thang,$ngay,$nam));?>">
<div>00<br/><span>ngày</span></div>
<div class="sep">:</div>
<div>00<br/><span>giờ</span></div>
<div class="sep">:</div>
<div>00<br/><span>phút</span></div>
<div class="sep">:</div>
<div>00<br/><span>giây</span></div>
</div>

<div class="product-type " style="font-weight:bold;"><?php if($chitietsp['hinhthuc']==0) echo "Giao Sản Phẩm"; else echo "Giao Voucher";?></div>

<div class="clear"></div></br></br>

</div>		
</div>
<div class="product-terms">
<div class="product-terms-inner">
<div class="product-terms-inner-in">
<div class="row">
<div class="span6 product-conditions">
<h2 class="sec-title">Điểm nổi bật</h2>
<?php echo $chitietsp['diemnoibat'];?>
</div>
<div class="span6 product-feature">
<h2 class="sec-title">Điều kiện</h2>
<?php echo $chitietsp['dieukien'];?>
</div>
</div>
</div>
<a href="#" class="btn-view-more view-more-term"><img src="<?php echo base_url();?>images/btn-view-term-more.png"
alt="Xem thêm dealhangviet.vn"/></a>
</div>
</div>
<div class="clear"></div>
<div class="row">
<div class="span9">
<div class="product-description">
<h2 class="sec-title">Thông tin chi tiết</h2>
<?php echo $chitietsp['motachitiet'];?>
</div>
<div class="product-detail-map">


<div class="span3">
<div class="cart-button">
<div class="buttons-container">	
<?php
$ngayketthuc=substr($chitietsp['ngayketthuc'],6,4)."/".substr($chitietsp['ngayketthuc'],3,2)."/".substr($chitietsp['ngayketthuc'],0,2);
		
		if(strtotime($ngayketthuc)>strtotime(date('Y/m/d')))
		{ ?>
<div class="cm-reload-94999" id="add_to_cart_update_94999">
<span id="cart_add_block_94999">
<span id="wrap_button_cart_94999"  class="button-submit-action"><input id="button_cart" type="submit" value="Mua" name="datmua"></span>
</span>
<span id="cart_buttons_block_94999">
</span>
</div>
<?php }
	else
	{
?>

<span class="disable cm-multideal deal-expired"></span>


<?php }?>



</div>
</div>
</div>

<div>

</div>
<div style="margin: 20px 0 0;" class="fb-comments" data-width="100%" data-num-posts="5"
data-href="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>"></div>
</div>
</form>
</div>
<div class="span3">
<div class="product-sidebar">



<h2 class="sec-title">Deal liên quan</h2>
<div class="side_recommend">

<?php foreach($splienquan as $item){?>
<div class="span3  product-item " style="margin-left:-14px; margin-bottom:10px;">
<div class="meta-icon-2">
</div>
<div class="meta">
<div class="time">
<span class="key" rel="<?php $nam=substr($item['ngayketthuc'],6,4);
							$thang=substr($item['ngayketthuc'],3,2);
							$ngay=substr($item['ngayketthuc'],0,2);
 echo (mktime(0,0,0,$thang,$ngay,$nam));?>"></span>
</div>

</div>

<div class="type type-product"></div>
<div class="thumb">
<a href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html">
<img  class=" product-thumb lazy"   id="det_img_187231287" src="<?php echo base_url();?>images/grey.gif" data-original="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" width="655" height="230px" alt="<?php echo $item['tensp'];?>"  border="0" />												

</a>
</div>
<div class="title">
<h2><a href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" title="<?php echo $item['tensp'];?>"><?php echo $item['tensp'];?></a></h2>
<span class="sell-price"><?php echo number_format($item['giagiam'],"0",",",".");?><sup style="font-size:12px;">đ</sup></span>
<span class="original-price"><?php echo number_format($item['giagoc'],"0",",",".");?><sup>đ</sup></span>
<a href="<?php echo base_url();?>deal/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" class="view" ></a>
</div>
</div>
<?php }?>



</div>

</div>
</div>
</div>
</div>
</div>
</div>  
</div>
</div>  
<div class="bottom clear-both">
<div class="wysiwyg-content">
<div style="background: #FFF; margin-top: 20px;" class="fb-like-box" data-href="https://www.facebook.com/dealhangviet" data-height="220" data-width="995" data-show-faces="true" data-stream="false" data-border-color="white" data-header="true"></div>
</div><div class="wysiwyg-content">

</div>
</div>
</div>
</div>