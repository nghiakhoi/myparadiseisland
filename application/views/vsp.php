<div class="row">
			<aside class="col-sm-3 col-xs-12 left-sidebar">
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
			<main class="col-sm-9 col-xs-12">
				<div class="main-page-catalog">
					<h2>
						<span class="text">Fashion</span>
						<strong>New Products</strong>
					</h2>
					<div id="carousel-new" class="carousel slide">
						<div class="carousel-controls top clearfix">
							<div class="inner-wrap">
								<a class="btn-arrow left" href="#carousel-new" role="button" data-slide="prev"><span class="btn-text"></span></a>
								<ol class="slider-controls carousel-indicators sliderhome">

								</ol>
								<a class="btn-arrow right" href="#carousel-new" role="button" data-slide="next"><span class="btn-text"></span></a>
							</div>
						</div>
						<div class="catalog catalog-blocks carousel-inner clearfix">
							<div class="woocommerce columns-3">

								<!-- start -->
								<?php  foreach($sanphamnewlimit as $item) { 
								?> 

								<div class="catalog-item-container clearfix first post-1806 product type-product status-publish has-post-thumbnail pwb-brand-gilda-tonelli product_cat-blouses-tunics pa_color-blue pa_color-green pa_color-yellow  instock shipping-taxable purchasable product-type-variable has-default-attributes has-children">

									<div class="catalog-item clearfix">

										<div class="img-container">
											<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" title="<?php echo $item['tensp'];?>">
												<img width="300" height="300"  class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" alt="<?php echo $item['tensp'];?>"
												title="<?php echo $item['tensp'];?>" srcset="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" alt="<?php echo $item['tensp'];?>"
												 sizes="(max-width: 300px) 100vw, 300px" /> </a>
											<div class="stickers-container">
											</div>
											<div class="catalog-item-thumbnails">
											<?php $hinhanh=explode("|", $item['hinhanhphu']); 
	for($i=0;$i<count($hinhanh);$i++)
	{
	if($hinhanh[$i]!=null)
	{
?>
												<div style="width: 63px;"><img src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>"
													 alt="Item" data-big-image="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>"></div>

													 <?php } else break;}?>
											</div>
										</div><!-- /img-container -->
										<div class="main-data">
											<div class="main-description">
												<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" class="catalog-item-name" title="<?php echo $item['tensp'];?>">
												<?php echo $item['tensp'];?>
												</a>
											</div>

											<div class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($item['giagiam'],"0",",",".");?></span></div>
										</div>
										<div class="full-view">
											<div class="catalog-item-links">

												<div class="yith-wcwl-add-to-wishlist add-to-wishlist-1806">
													<div class="yith-wcwl-add-button show" style="display:block">
														<a href="#" rel="nofollow" data-product-id="1806" data-product-type="variable" class="add_to_wishlist product-action-link favorite switchable "
														 data-toggle="tooltip" title="Add to wishlist">
														</a> </div>

													<div class="yith-wcwl-wishlistaddresponse"></div>

												</div>
												<span title="Detail" data-toggle="tooltip">
													<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" data-quantity="1" data-product_id="1806"
													 data-product_sku="" class="btn-variable product-action-link product_type_variable add_to_cart_button"></a></span>
											</div><!-- /catalog-item-links -->
										</div><!-- /full-view -->

									</div><!-- /catalog-item -->
								</div><!-- /catalog-item-container -->
											<?php  }?>
							</div>
						</div>
						<div class="carousel-controls bottom clearfix">
							<div class="inner-wrap">
								<a class="btn-arrow left" href="#carousel-new" role="button" data-slide="prev"><span class="btn-text"></span></a>
								<ol class="slider-controls sliderhome">

								</ol><!-- /slider-controls -->
								<a class="btn-arrow right" href="#carousel-new" role="button" data-slide="next"><span class="btn-text"></span></a>
							</div>
						</div><!-- /carousel-controls -->
					</div>
					<!-- /#carousel-bestsellers -->
				</div><!-- /main-page-catalog -->
				<div class="main-page-catalog">
					<h2>
						<span class="text">Fashion</span>
						<strong>On sale</strong>
					</h2>
					<div id="carousel-bestsellers" class="carousel slide">
						<div class="carousel-controls top clearfix">
							<div class="inner-wrap">
								<a class="btn-arrow left" href="#carousel-bestsellers" role="button" data-slide="prev"><span class="btn-text"></span></a>
								<ol class="slider-controls carousel-indicators sliderhome">

								</ol>
								<a class="btn-arrow right" href="#carousel-bestsellers" role="button" data-slide="next"><span class="btn-text"></span></a>
							</div>
						</div>
						<div class="catalog catalog-blocks carousel-inner clearfix">
							<div class="woocommerce columns-3">

								<!-- start -->

									<?php  foreach($sanphamhotlimit as $item) { 
									?> 
								<div class="catalog-item-container clearfix first post-1943 product type-product status-publish has-post-thumbnail pwb-brand-monster-high product_cat-pants pa_color-black pa_color-green pa_color-grey  instock sale shipping-taxable purchasable product-type-variable has-default-attributes has-children">

									<div class="catalog-item clearfix">

										<div class="img-container">
											<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" title="<?php echo $item['tensp'];?>">
												<img width="300" height="300"  class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" alt="<?php echo $item['tensp'];?>"
												title="<?php echo $item['tensp'];?>" srcset="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" alt="<?php echo $item['tensp'];?>"
												 sizes="(max-width: 300px) 100vw, 300px" /> </a>
											<div class="stickers-container">
												<div class="sticker discount">Sale!"</div>
											</div>
											<div class="catalog-item-thumbnails">

											<?php $hinhanh=explode("|", $item['hinhanhphu']); 
	for($i=0;$i<count($hinhanh);$i++)
	{
	if($hinhanh[$i]!=null)
	{
?>

												<div style="width: 63px;"><img src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>"
													 alt="Item" data-big-image="<?php echo base_url();?>uploads/<?php echo $hinhanh[$i];?>"></div>

													 <?php } else break;}?>

											</div>
										</div>
										<div class="main-data">
											<div class="main-description">
												<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" class="catalog-item-name" title="<?php echo $item['tensp'];?>">
												<?php echo $item['tensp'];?>
												</a>
											</div>

											<div class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($item['giagiam'],"0",",",".");?></span></div>
										</div>
										<div class="full-view">
											<div class="catalog-item-links">

												<div class="yith-wcwl-add-to-wishlist add-to-wishlist-1943">
													<div class="yith-wcwl-add-button show" style="display:block">
														<a href="/?add_to_wishlist=1943" rel="nofollow" data-product-id="1943" data-product-type="variable" class="add_to_wishlist product-action-link favorite switchable "
														 data-toggle="tooltip" title="Add to favorites">
														</a> </div>


													<div class="yith-wcwl-wishlistaddresponse"></div>

												</div> 
												<span title="Detail" data-toggle="tooltip">
													<a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" data-quantity="1" data-product_id="1943"
													 data-product_sku="" class="btn-variable product-action-link product_type_variable add_to_cart_button"></a></span>
											</div>
										</div>
									</div>
								</div>
									<?php }?>

							</div>
						</div>
						<div class="carousel-controls bottom clearfix">
							<div class="inner-wrap">
								<a class="btn-arrow left" href="#carousel-bestsellers" role="button" data-slide="prev"><span class="btn-text"></span></a>
								<ol class="slider-controls sliderhome">

								</ol><!-- /slider-controls -->
								<a class="btn-arrow right" href="#carousel-bestsellers" role="button" data-slide="next"><span class="btn-text"></span></a>
							</div>
						</div><!-- /carousel-controls -->
					</div>
					<!-- /#carousel-bestsellers -->
				</div><!-- /main-page-catalog -->
			</main><!-- /col-sm-9 -->
		</div><!-- /row -->
		<div class="banner-bottom col-sm-12 hidden-xs full" style="background-size:cover;color:white;object-fit:cover;height:805px;background-image:url('https://static.wixstatic.com/media/aeffba_4afb8002857e4d2c9cc4f60bae0a1277~mv2_d_4000_2500_s_4_2.jpg/v1/fill/w_1899,h_1006,al_c,q_85,usm_0.66_1.00_0.01/aeffba_4afb8002857e4d2c9cc4f60bae0a1277~mv2_d_4000_2500_s_4_2.jpg')">
		<div class="col-sm-8 col-sm-offset-2 text-justify">
			<div class="row" style="margin-top:200px">
			My desire was to create chic Mix & Match designs for your holiday vactions in colors of amazing stretch fabrics. These are the only garments you will need to pack light for!
			Our swimwear collections can be effortlessly fused together with our fashionable resort wear. The result is a selection of ready-to-wear pieces with fine detailing & flattering silhouettes.

​

Swimwear - taking you from beach & pool to cafe & Restaurant. 

Resortwear - from poolside to Lunch or dinner. 

Activewear - for your exercise & comfort.

Then of course.... a must, our devine evening lingerie.
 

"The differrence between style & fashion, is quality" - Giorgio Armani

& Paradise Island was created with all of this in mind for you...
			</div>
		</div>
		
​


		</div>