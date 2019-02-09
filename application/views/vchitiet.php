<script type='text/javascript' src='<?php echo base_url();?>js/jquery.selectBox.min.js?ver=1.2.0'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.formstyler.js?ver=4.5.15'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/single-product.min.js'>
</script>
<script type='text/javascript' src='<?php echo base_url();?>js/underscore.min.js'></script>

<script type='text/javascript' src='<?php echo base_url();?>js/um_product-page-carousels.js?ver=4.5.15'></script>
<link rel='stylesheet' id='jquery-selectBox-css' href='<?php echo base_url();?>css/jquery.selectBox.css?ver=1.2.0' type='text/css' media='all' />
<div id="container">
    <div id="content" role="main">

        <div itemscope itemtype="http://schema.org/Product" id="product-1806" class="container product-page post-1806 product type-product status-publish has-post-thumbnail pwb-brand-gilda-tonelli product_cat-blouses-tunics pa_color-blue pa_color-green pa_color-yellow first instock shipping-taxable purchasable product-type-variable has-default-attributes has-children">

            <div class="row main affix-target-bottom">
                <div class="col-sm-5 col-xs-12 affix-target-top">
                    <div class="affix-wrap">
                        <div class="product-photo-affix" id="product-photo-affix">
                            <div class="medium-image-wrap">
                                <div class="medium-image clearfix" id="medium-image">
                                <?php $hinhanh=explode("|", $chitietsp['hinhanhphu']); ?>
                                <div class="med-img-inner"><img width="600" height="600" src="<?php echo base_url();?>uploads/<?php echo $chitietsp['hinhanhchinh'];?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?php echo $chitietsp['tensp'];?>" title="<?php echo $chitietsp['tensp'];?>" srcset="<?php echo base_url();?>uploads/<?php echo $chitietsp['hinhanhchinh'];?>" sizes="(max-width: 600px) 100vw, 600px" /></div>
                                <?php 
	for($j=0;$j<count($hinhanh);$j++)
	{
	if($hinhanh[$j]!=null)
	{
?>
                                    <div class="med-img-inner"><img width="600" height="600" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$j];?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?php echo $chitietsp['tensp'];?>" title="<?php echo $chitietsp['tensp'];?>" srcset="<?php echo base_url();?>uploads/<?php echo $hinhanh[$j];?>" sizes="(max-width: 600px) 100vw, 600px" /></div>
                                    <?php }else break;}?>
                                </div>
                                <!-- /medium-image -->

                                <div class="med-img-zoom-container"></div>

                                <div class="thumbnails formedium clearfix columns-3" id="formedium">
                                <div><img width="180" height="180" src="<?php echo base_url();?>uploads/<?php echo $chitietsp['hinhanhchinh'];?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?php echo $chitietsp['tensp'];?>" title="<?php echo $chitietsp['tensp'];?>" data-big-image="<?php echo base_url();?>uploads/<?php echo $chitietsp['hinhanhchinh'];?>" srcset="<?php echo base_url();?>uploads/<?php echo $chitietsp['hinhanhchinh'];?>" sizes="(max-width: 180px) 100vw, 180px" /></div>
                                <?php 
	for($k=0;$k<count($hinhanh);$k++)
	{
	if($hinhanh[$k]!=null)
	{
?>
                                    <div><img width="180" height="180" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$k];?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?php echo $chitietsp['tensp'];?>" title="<?php echo $chitietsp['tensp'];?>" data-big-image="<?php echo base_url();?>uploads/<?php echo $hinhanh[$k];?>" srcset="<?php echo base_url();?>uploads/<?php echo $hinhanh[$k];?>" sizes="(max-width: 180px) 100vw, 180px" /></div>
                                    <?php }else break;}?>
                                </div>
                                <!-- /thumbnails formedium-->
                            </div>
                        </div>
                        <!-- .product-photo-affix -->
                    </div>
                    <!-- .affix-wrap -->
                </div>
                <!-- /col-sm-5 -->

                <div class="product-info col-sm-7 col-xs-12">
                    <h1 itemprop="name">
                    <?php echo $chitietsp['tensp'];?>
                    </h1>
                    <div class=" price-usd" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="text">Price:</span>
                        <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($chitietsp['giagiam'],"0",",",".");?></span>
                        </span>

                        <meta itemprop="price" content="25" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <link itemprop="availability" href="http://schema.org/InStock" />
                    </div>
                    <form action="<?php echo base_url();?>dat-hang-new/<?php echo $chitietsp['stt'];?>.html" class="variations_form cart product-page-parameters-form" method="post" enctype='multipart/form-data' data-product_id="1806" >

                        <div class="woocommerce-variation single_variation"></div>
                        <div class="product-page-buy-block woocommerce-variation-add-to-cart variations_button">
                            <div class="quantity-wrapper">
                                <div class="input-wrapper">
                                    <button class="btn-quantity-change minus"><span class="btn-text">-</span></button>
                                    <input type="number" step="1" min="1" max="999" name="soluong" value="1" title="Qty" class="qty item-quantity" size="4" />
                                    <button class="btn-quantity-change plus"><span class="btn-text">+</span></button>
                                </div>
                            </div>
                            <!-- /quantity-wrapper
            -->
                            <button type="submit" class="btn-buy medium main-buy-btn"><span class="btn-text">Add to cart</span></button>
                            <input type="hidden" name="add-to-cart" value="1806" />
                            <input type="hidden" name="product_id" value="1806" />
                            <input type="hidden" name="variation_id" class="variation_id" value="0" />
                        </div>

                        <div class="variations">
                            <div class="size-choice pp-parameter">
                                <h3 class=""><span class="text">Color:</span></h3>
                                <div class="sizes">
                                    <label class="radio-styled">
                                        <select id="pa_color"   class="" name="mauchon" data-attribute_name="attribute_pa_color">
                                        <?php $mau=explode("|", $chitietsp['mau']); 
                                            for($j=0;$j<count($mau)-1;$j++)
                                            {
                                            
                                            ?>
                                            <option value="<?php echo $mau[$j];?>"><?php echo $mau[$j];?></option>
                                            <?php }?>
                                        </select>
                                    </label>
                                    </div>
                                <!-- /sizes -->
                            </div>
                            <!-- /size-choice -->

                            <div class="size-choice pp-parameter" style="z-index:0">
                                <h3 class=""><span class="text">Size:</span></h3>
                                <div class="sizes">
                                    <label class="radio-styled">
                                        <select id="pa_color"   class="" name="sizechon" data-attribute_name="attribute_pa_color">
                                        <?php  $size=explode(",", $chitietsp['size']); 
						for($k=0;$k<count($size);$k++)
						{
						if($size[$k]!=null)
						{
					?>
                                            <option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>
                                            <?php }else break;}?>
                                        </select>
                                    </label>
                                    </div>
                                <!-- /sizes -->
                            </div>
                            <!-- /size-choice -->
                        </div>
                        <!-- /variations -->

                    </form>

                    <div class="identify-size-wrap">
                        <a href="#" class="secondary-link hidden-xs" data-toggle="modal" data-target="#modal_sizes-info">Size chart</a>
                    </div>

                    <div class="yith-wcwl-add-to-wishlist ">
                        <div class="yith-wcwl-add-button hide" style="display:none">
                            <a href="#" rel="nofollow" data-product-id="1806" data-product-type="variable" class="add_to_wishlist product-action-link favorite switchable "  title="Add to favorites">
                            </a>
                        </div>

                        <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                            <a href="/wishlist/view/" rel="nofollow" class="product-action-link favorite active"  title="Add to favorites">
                            </a>
                        </div>

                        <div class="yith-wcwl-wishlistexistsbrowse show" style="display:block">
                            <a href="/wishlist/view/" rel="nofollow" class="product-action-link favorite active"  title="Add to favorites">
                            </a>
                        </div>

                        <div class="yith-wcwl-wishlistaddresponse"></div>

                    </div> 
                    
                </div>
                <!-- /product-info.col-sm-7 -->

                
            </div>
            <!-- /row.main -->

            <div class="row">
                <div class="col-sm-12">
                <?php echo $chitietsp['motachitiet'];?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row hidden-xs">
                        <div class="col-xs-12">
                            <h2 class="product-page-accessories"><span class="text">Related Products:</span></h2>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="accessories hidden-xs scrollbar-v">
                    <?php foreach($splienquan as $item){?>
                        <div class="recommended-item">
                            <a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html" class="img-container">
                                <img width="180" height="180" src="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?php echo $item['tensp'];?>" title="<?php echo $item['tensp'];?>" srcset="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>" sizes="(max-width: 180px) 100vw, 180px" /> </a>
                            <div class="recommended-item-info">
                                <h4><a href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html"><?php echo $item['tensp'];?></a></h4>
                               
                                <div class="price"><span class="price-usd"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($item['giagiam'],"0",",",".");?></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /recommended-item -->
                        <?php }?>
                        
                    </div>

                </div>
            </div>

        </div>
        <!-- #product-1806 -->


    </div>
</div>