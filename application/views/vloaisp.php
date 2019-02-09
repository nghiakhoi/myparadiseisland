<script type='text/javascript' src='<?php echo base_url();?>js/jquery.selectBox.min.js?ver=1.2.0'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/um_catalog-carousel.js?ver=4.5.15'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.formstyler.js?ver=4.5.15'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/catalog-page.js?ver=4.5.15'></script>
	<link rel='stylesheet' id='jquery-selectBox-css' href='<?php echo base_url();?>css/jquery.selectBox.css?ver=1.2.0' type='text/css' media='all' />
<div class="container catalog-page">
	
	<div class="row">
		<aside class="col-sm-3 left-sidebar">
		<nav>

<?php
					
					
					
					
					// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
function showCategories1($categories, $parent_id = 0, $char = '', $stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if ($stt == 0){
            echo '<ul class="catalog-menu">';
        }
        else if ($stt == 1){
            echo '<ul class="catalog-menu-lvl1 expand-content">';
        }
        else if ($stt == 2){
            echo '<ul class="catalog-menu-lvl2 expand-content">';
        }
         
        foreach ($cate_child as $key => $item)
        {
			if ($stt == 0){
				// Hiển thị tiêu đề chuyên mục
				//echo '<li class="expandable  expanded"><h2><a class="item-haschild" title="'. $item["tendanhmuc"].'" href="'.base_url().'danh-muc/'.$item["slug"].'-'.$item["id"].'.html">'. $item["tendanhmuc"].' </a></h2>';
				echo '<li class="expandable"><span class="catalog-menu-item">
				<span class="icon-wrapper">
					<span class="menu-item-icon">
						<img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/04/summer.png" alt="'. $item["tendanhmuc"].'" width="300" height="300"> </span>
				</span><!-- /icon-wrapper -->
				<span class="text">'. $item["tendanhmuc"].'</span>
			</span>';
				// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
				showCategories1($categories, $item['id'], $char.'', $stt+1);
				echo '</li>';
			}else if($stt == 1){								
				echo '<li class=""><span class="menu-item-lvl1">
				<a title="'. $item["tendanhmuc"].'" href="'.base_url().'danh-muc/'.$item["slug"].'-'.$item["id"].'.html"> '. $item["tendanhmuc"].' </a>
			</span>';
				// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
				showCategories1($categories, $item['id'], $char.'', $stt+1);
				echo '</li>';

			}else {
								
				echo '<li><a class="" title="'. $item["tendanhmuc"].'" href="'.base_url().'danh-muc/'.$item["slug"].'-'.$item["id"].'.html"> '. $item["tendanhmuc"].' </a>';
				// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
				showCategories1($categories, $item['id'], $char.'', $stt+1);
				echo '</li>';

			}
            
        }
        echo '</ul>';
    }
}
					
					showCategories1($danhmuccha);
					?>	
				</nav>

		</aside><!-- /col-sm-3 -->
		<main class="col-sm-9">
					
				  
			<div class="v-type-switch-wrap">
									<span class="text">View:</span>
					<div class="view-type-switcher">
						<button class="btn-blocks"></button><!--
						--><button class="btn-list"></button><!--
						--><button class="btn-table"></button>
						<div class="box v-blocks"></div>
					</div>
							</div>
<?php //print_r($sanpham);?>
							<h2><?php echo $tendanhmuc['tendanhmuc'];?></h2>
										<form method="get" class="view-options-form sort-by">
	
	<div class="jq-selectbox jqselect orderby" style="display: inline-block; position: relative; z-index:100"><select name="orderby" class="orderby" style="margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0;">
					<option value="menu_order" selected="selected">Default sorting</option>
					<option value="popularity">Sort by popularity</option>
					<option value="rating">Sort by average rating</option>
					<option value="date">Sort by newness</option>
					<option value="price">Sort by price: low to high</option>
					<option value="price-desc">Sort by price: high to low</option>
			</select>
			<div class="jq-selectbox__dropdown" style="position: absolute; display: none;"><ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden" class="mCustomScrollbar _mCS_1 mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 0px;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr"><li class="selected sel" style="">Default sorting</li><li style="">Sort by popularity</li><li style="">Sort by average rating</li><li style="">Sort by newness</li><li style="">Sort by price: low to high</li><li style="">Sort by price: high to low</li></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul></div></div>
	</form>
<nav class="pagination woocommerce-pagination columns-3">
<?php
                    if($num_rows>0){
                        echo $link;
                    }
					
                    
?>
	
</nav>
				<!-- start -->
									<div class="yit-wcan-container"><div class="catalog yit-wcan-container catalog-blocks clearfix">
											<div class="item">

<?php foreach($sanpham as $item){?>

	<div class="catalog-item-container clearfix first post-1943 product type-product status-publish has-post-thumbnail pwb-brand-monster-high product_cat-pants pa_color-black pa_color-green pa_color-grey  instock sale shipping-taxable purchasable product-type-variable has-default-attributes has-children">
		
	<div class="catalog-item clearfix">

					<div class="img-container">
				<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" title="<?php echo $item['tensp']?>">
					<img width="300" height="300" src="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh']?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="79408_7104072a29ea4c52016006d02a15732f_image1_zoom" title="79408_7104072a29ea4c52016006d02a15732f_image1_zoom" srcset="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh']?>" sizes="(max-width: 300px) 100vw, 300px">				</a>
				
				<div class="catalog-item-thumbnails slick-initialized slick-slider">
			<div class="slick-list draggable" tabindex="0">
			<div class="slick-track" style="opacity: 1; width: 273px; transform: translate3d(0px, 0px, 0px);">
			<?php $hinhanh=explode("|", $item['hinhanhphu']); 
	for($i=0;$i<count($hinhanh);$i++)
	{
	if($hinhanh[$i]!=null)
	{
?>
			<div style="width: 63px;" class="slick-slide slick-active" index="0">
			<img src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>" alt="Item" data-big-image="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>">
			</div>
			<?php } else break;}?>
			</div>
			</div>			  
			</div>			
			</div><!-- /img-container -->
				<div class="main-data">
			<div class="main-description">
				<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" class="catalog-item-name" title="<?php echo $item['tensp']?>"><?php echo $item['tensp']?></a>
				<div class="short-description"><?php echo $item['motangan']?>
</div>
			</div>
			
	<div class="price"> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>62.00</span></ins></div>
		</div><!-- /main-data -->
		<div class="long-description">
		<?php echo $item['motangan']?>
</div>
		<div class="full-view">
			<div class="catalog-item-links">
				
<div class="yith-wcwl-add-to-wishlist add-to-wishlist-1943">
		    <div class="yith-wcwl-add-button show" style="display:block">
	        <a href="/product-category/clothes/?add_to_wishlist=1943" rel="nofollow" data-product-id="1943" data-product-type="variable" class="add_to_wishlist product-action-link favorite switchable " data-toggle="tooltip" title="" data-original-title="Add to favorites">
</a>	    </div>


	    <div class="yith-wcwl-wishlistaddresponse"></div>
	
</div>		
		<span title="" data-toggle="tooltip" data-original-title="Detail">
<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" data-quantity="1" data-product_id="1943" data-product_sku="" class="btn-variable product-action-link product_type_variable add_to_cart_button"></a></span> 
			</div><!-- /catalog-item-links -->
		</div><!-- /full-view -->

	</div><!-- /catalog-item -->
</div>

			<?php }?>

</div><!-- /catalog-item-container -->


									</div></div>
								<nav class="pagination woocommerce-pagination columns-3">
								<?php
                    if($num_rows>0){
                        echo $link;
                    }
					
                    
?>
	
	</nav>

												
						</main><!-- /col-sm-9 -->
					<div class="col-sm-12 small-banner">
																												<span class="thing-empty">										<img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/catalog-brands.jpg" alt="Promo-banner">										
									</span>										</div><!-- /promos.row -->
				  
	</div><!-- /row -->
</div><!-- /container -->
