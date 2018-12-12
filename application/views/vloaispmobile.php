<div class="main">

					

<div class="cm-notification-container"></div>
  
					<div class="mainbox-container">
						<div class="mainbox-body">
			
<script src="<?php echo base_url();?>js/countdown.js"></script>

	
		<div class="category-and-filters" style="">
		<div class="category-title">
						<a href="#">
												<h1><?php echo $tendanhmuc['tendmcha'];?></h1>
							</a>

								</div>
	</div>
<div class="cb"></div>

<div class="main_content">
		
	<div class="box1 list_product">
	
<div id="list-product-item">
<div id="list-product-block">
<?php foreach($sanpham as $item) { 
  
  
  ?>
<div class="product-item">


<div class="thumb">
<a href="<?php echo base_url();?>dealmobile/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html">
<img  class=" product-thumb lazy"   id="det_img_1916489916" src="<?php echo base_url();?>images/grey_mobile.png" data-original="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" width="520" height="250" alt="<?php echo $item['tensp'];?>"  border="0" />                                                            </a>
</div>

<div class="meta">
<!--<div class="buy-number"><?php //echo $item['songuoimua'];?></div>-->
<span id="giamgia" style="font-size:20px;margin-left:30px;" <?php  if($item['giagiam']!=0||$item['giagiam']!=0){ $phantram=round(($item['giagiam']*100)/$item['giagoc']);}else $phantram=0;?><?php if(100-$phantram<10) echo "style='right:38px;'"; else echo "";?>><span style="font-weight:bold;"><?php  if($item['giagiam']!=0||$item['giagiam']!=0){ $phantram=round(($item['giagiam']*100)/$item['giagoc']);}else $phantram=0;?><sup></sup>			
-<?php echo (100-$phantram);?></span><span style="font-size:20px;">%</span></span>
<span class="sell-price" style="font-family: tahoma !important;font-weight:bold;"><?php echo number_format($item['giagiam'],"0",",",".");?><sup>d</sup></span>
<span class="original-price" style="font-family: tahoma !important;font-weight:bold;"><?php echo number_format($item['giagoc'],"0",",",".");?><sup>d</sup></span>
</div>
<div class="title">
<h2><a href="<?php echo base_url();?>dealmobile/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html"><?php echo $item['tensp'];?></a></h2>
</div>
</div>
 <?php }?>



</div>
<!--list-product-item--></div>
	

</div>




</div>

</div>
		</div>
		<div id="list_product_pagination">
<div class="pagination cm-pagination-wraper center pagination_2">
<?php
                    if($num_rows>0){
                        echo $link;
                    }
?>


</div>
<!--pagination_contents--></div>
				</div>