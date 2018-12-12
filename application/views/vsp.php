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
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/Mexx-Yellow-Women-Tank-Top-1646-4243862-1-zoom_l-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/Mexx-Yellow-Women-Tank-Top-1646-4243862-1-zoom_l-300x300.jpg"></div>
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/Mexx-Yellow-Women-Tank-Top-1646-4243862-3-zoom_l-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/Mexx-Yellow-Women-Tank-Top-1646-4243862-3-zoom_l-300x300.jpg"></div>
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/Mexx-Yellow-Women-Tank-Top-1646-4243862-2-zoom_l-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/Mexx-Yellow-Women-Tank-Top-1646-4243862-2-zoom_l-300x300.jpg"></div>
											</div>
										</div><!-- /img-container -->
										<div class="main-data">
											<div class="main-description">
												<a href="https://wp-apparel.romza.ru/product/mexx-yellow-women-top/" class="catalog-item-name" title="Mexx Yellow Women Top">
												<?php echo $item['tensp'];?>
												</a>
											</div>

											<div class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($item['giagiam'],"0",",",".");?></span></div>
										</div>
										<div class="full-view">
											<div class="catalog-item-links">

												<div class="yith-wcwl-add-to-wishlist add-to-wishlist-1806">
													<div class="yith-wcwl-add-button show" style="display:block">
														<a href="/?add_to_wishlist=1806" rel="nofollow" data-product-id="1806" data-product-type="variable" class="add_to_wishlist product-action-link favorite switchable "
														 data-toggle="tooltip" title="Add to favorites">
														</a> </div>

													<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
														<a href="https://wp-apparel.romza.ru/wishlist/view/" rel="nofollow" class="product-action-link favorite active"
														 data-toggle="tooltip" title="Browse Wishlist">
														</a>
													</div>

													<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
														<a href="https://wp-apparel.romza.ru/wishlist/view/" rel="nofollow" class="product-action-link favorite active"
														 data-toggle="tooltip" title="Browse Wishlist">
														</a>
													</div>

													<div class="yith-wcwl-wishlistaddresponse"></div>

												</div> <span class="product-action-link" data-toggle="tooltip" title="Compare">
													<a href="/?action=yith-woocompare-add-product&id=1806" class="compare button" data-product_id="1806" rel="nofollow"></a>
												</span>
												<span title="Select options" data-toggle="tooltip">
													<a href="https://wp-apparel.romza.ru/product/mexx-yellow-women-top/" data-quantity="1" data-product_id="1806"
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
											<a href="https://wp-apparel.romza.ru/product/acid-wash/" title="Acid Wash">
												<img width="300" height="300" src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-300x300.jpg"
												 class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="79408_7104072a29ea4c52016006d02a15732f_image1_zoom"
												 title="79408_7104072a29ea4c52016006d02a15732f_image1_zoom" srcset="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-300x300.jpg 300w, https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-150x150.jpg 150w, https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-180x180.jpg 180w, https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-600x600.jpg 600w"
												 sizes="(max-width: 300px) 100vw, 300px" /> </a>
											<div class="stickers-container">
												<div class="sticker discount">Sale!"</div>
											</div>
											<div class="catalog-item-thumbnails">
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_7104072a29ea4c52016006d02a15732f_image1_zoom-300x300.jpg"></div>
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_3b7b8fbf856aa69fc8dd28d9dffbe5c5_image2_zoom-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_3b7b8fbf856aa69fc8dd28d9dffbe5c5_image2_zoom-300x300.jpg"></div>
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_b213518730b6e2ecf0dd0fe496d1d916_image3_zoom-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_b213518730b6e2ecf0dd0fe496d1d916_image3_zoom-300x300.jpg"></div>
												<div style="width: 63px;"><img src="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_bca69708d9672063f1679a7edbd7a888_image4_zoom-150x150.jpg"
													 alt="Item" data-big-image="https://wp-apparel.romza.ru/wp-content/uploads/2016/09/79408_bca69708d9672063f1679a7edbd7a888_image4_zoom-300x300.jpg"></div>
											</div>
										</div>
										<div class="main-data">
											<div class="main-description">
												<a href="https://wp-apparel.romza.ru/product/acid-wash/" class="catalog-item-name" title="Acid Wash">Acid
													Wash</a>
												<div class="short-description">
													<p>Here&#8217;s how you run the jogger-pant game right.</p>
												</div>
											</div>

											<div class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>68.00</span></del>
												<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>62.00</span>&ndash;<span
													 class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>65.00</span></ins></div>
										</div>
										<div class="long-description">
											<p>Here&#8217;s how you run the jogger-pant game right. These denim joggers from STYX &amp; STONES are a
												modern update for your casual collection. Crafted with an elasticated waist and cuffs, this slim fit design
												blends modern comfort with the classic denim. A crowd pleaser, this style pick looks best paired with
												printed T-shirts and lace-up shoes.</p>
										</div>
										<div class="full-view">
											<div class="catalog-item-links">

												<div class="yith-wcwl-add-to-wishlist add-to-wishlist-1943">
													<div class="yith-wcwl-add-button show" style="display:block">
														<a href="/?add_to_wishlist=1943" rel="nofollow" data-product-id="1943" data-product-type="variable" class="add_to_wishlist product-action-link favorite switchable "
														 data-toggle="tooltip" title="Add to favorites">
														</a> </div>

													<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
														<a href="https://wp-apparel.romza.ru/wishlist/view/" rel="nofollow" class="product-action-link favorite active"
														 data-toggle="tooltip" title="Browse Wishlist">
														</a>
													</div>

													<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
														<a href="https://wp-apparel.romza.ru/wishlist/view/" rel="nofollow" class="product-action-link favorite active"
														 data-toggle="tooltip" title="Browse Wishlist">
														</a>
													</div>

													<div class="yith-wcwl-wishlistaddresponse"></div>

												</div> <span class="product-action-link" data-toggle="tooltip" title="Compare">
													<a href="/?action=yith-woocompare-add-product&id=1943" class="compare button" data-product_id="1943" rel="nofollow"></a>
												</span>
												<span title="Select options" data-toggle="tooltip">
													<a href="https://wp-apparel.romza.ru/product/acid-wash/" data-quantity="1" data-product_id="1943"
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