<div class="main">
	<script>


$(document).ready(
            function() {
$("body").removeClass("cm-index-index"); 
$("body").removeClass("c-index"); 
$("body").removeClass("m-index");               
$("body").addClass("cm-products-view");	
$("body").addClass("c-products");
$("body").addClass("m-view");
$('.product-description img').removeAttr('style');     





		  
                
            });
			
			

</script>				
					

<div class="cm-notification-container"></div>
  
					<div class="mainbox-container">
						<div class="mainbox-body">
			<script src="<?php echo base_url();?>js/jquery.nivo.slider.js"></script>
<script src="<?php echo base_url();?>js/countdown.js"></script>

	


<div id="main_content_product" class="main_content" style="padding-top:0; min-height: 200px; overflow-x: hidden; overflow-y: auto; ">
	           
<div>
<div class="box1 product-details" >
<div class="pro1">
<div class="boc">
<ul class="rslides">
<?php $hinhanh=explode("|", $chitietsp['hinhanhphu']); 
	for($i=0;$i<count($hinhanh);$i++)
	{
	if($hinhanh[$i]!=null)
	{
?>
<li><img  class=" slide "   id="det_img_414892890" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>" width="500" height="500" alt="<?php echo $chitietsp['tensp'];?>"  border="0" /></li>
<?php } else break;}?>
</ul>					
<div class="title">						
<h1><?php echo $chitietsp['tensp'];?></h1>
</div>
</div>
<div class="cb"></div>
</div>
</div>		
<div class="box1">
<div id="accordion">
<h3><span>Điều kiện</span></h3>
<div>
<?php echo $chitietsp['dieukien'];?>
</div>
<h3><span>Điểm nổi bật</span></h3>
<div>
<?php echo $chitietsp['diemnoibat'];?>
</div>

<h3 class="selected"><span>Thông tin chi tiết</span></h3>
<div class="product-description" >
<?php echo $chitietsp['motachitiet'];?>
</div>

<script>
// only for demo purposes
	

	$(document).ready(function() {
		$('.product-description').css('display','block');
		$("table").removeAttr('style').attr('style','width:100%;');
		
		
    }); 
		
	
</script>
<style>

label.error{
    color:red;
	position:absolute;
	bottom:55px;
	left:0px;
	background:black;
}

#sizechon-error{
    
	bottom:40px !important;
	
	
}
label, select, button, input[type="button"], input[type="reset"], input[type="submit"], input[type="radio"], input[type="checkbox"] {
    cursor: pointer;
}

.dobong {
    box-shadow: 5px 5px 5px #24aa00;
}
</style>

<script>


$(document).ready(
            function() {
                
		
   


		  




	
$( ".chon" ).click(function(){
$( '.test' ).removeClass( "dobong" );
$( this ).toggleClass( "dobong" );

});
                
            });
			
			

</script>



</div>
</div>

</div>
</div>


</div>
		</div>
				</div>
				
				<form style="position:absolute;" action="<?php echo base_url(); ?>ctrangchumobile/chitietmobileselect/<?php echo $chitietsp['stt'];?>" name="product_form_94999" >
<div id="bar-product-buy" class="meta" style="clear: both; width: 100%; background: rgba(0, 0, 0, 1); float: left; margin-bottom: 10px; position:fixed; bottom:-10px; z-index:999;" >
	<div class="float_left" style="position:relative;">
		<p class="sell-price"><?php echo number_format($chitietsp['giagiam'],"0",",",".");?>&nbsp;VNĐ</p>
		<p class="original-price ">
Giá gốc:
<span class="text_line"><?php echo number_format($chitietsp['giagoc'],"0",",",".");?>&nbsp;VNĐ</span>
</p>
	</div>
	<div class="float_right">
					<input class="bt_buy1 pointer" type="submit" value="Mua" >
			</div>
</div>

</form>