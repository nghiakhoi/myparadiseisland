<meta property="og:image" content="<?php echo base_url();?>uploads/<?php echo $chitietsp['hinhanhchinh'];?>" />
<div id="main" style="">
        <div class="container">
    
<div id="body_right" class="body_right">
	<div class="heading">
    <div class="breadcrumb">
        <ul>
                          
		 <?php 
// BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($danhmuccha as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['id'] == $tendanhmuc["parent_id"])
        {
            $cate_parent[] = $item;
			foreach ($danhmuccha as $key => $item1)
    {
			if($cate_parent[0]['parent_id']==$item1['id']){
				$cate_parent[] = $item1;
				unset($danhmuccha[$key]);
	}}
            unset($danhmuccha[$key]);
			
        }
    }
	
	
	//print_r($cate_parent);
				
				  if(isset($cate_parent)){
					  krsort($cate_parent);
					  foreach($cate_parent as $item){
					  ?>
					  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <h1 class="h1_breadcrumb"><a title="<?php echo $item["tendanhmuc"];?>" href="<?php echo base_url();?>danh-muc/<?php echo $item["slug"];?>-<?php echo $item["id"];?>.html"><span itemprop="title"><?php echo $item["tendanhmuc"];?></span></a></h1>
				
				<?php }}?>          
				
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <h1 class="h1_breadcrumb"><a title="<?php echo $tendanhmuc["tendanhmuc"]?>" href="<?php echo base_url();?>danh-muc/<?php echo $tendanhmuc["slug"];?>-<?php echo $tendanhmuc["id"];?>.html"><span itemprop="title"><?php echo $tendanhmuc["tendanhmuc"]?></span></a></h1>
				
				<?php
					
					// BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($danhmuccha as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $tendanhmuc["id"])
        {
            $cate_child[] = $item;
            unset($danhmuccha[$key]);
			
        }
    }
	if($cate_child){
		echo "<ul>";
	foreach($cate_child as $item){
		echo '<li>
                    <a title="'. $item["tendanhmuc"].'" href="'.base_url().'danh-muc/'.$item["slug"].'-'.$item["id"].'.html">'. $item["tendanhmuc"].'</a>
                </li>';
	}
	echo "</ul>";
	}
	//print_r($cate_child);
					
								
					
					?>

                    </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-10 col-md-12">
        <!--<div class="product-detail" itemscope itemtype="http://schema.org/Product">-->
	<div class="product-detail">
            <div class="top-detail">
                <div class="photo">
				<?php $hinhanh=explode("|", $chitietsp['hinhanhphu']); ?>
                                        <div class="preview">
										<img title="<?php echo $chitietsp['tensp'];?>" alt="<?php echo $chitietsp['tensp'];?>" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[0];?>" itemprop="image"></div>
                    <div class="thumbs">
                        <div class="inner">
						
                            <ul>
							<?php 
	for($j=0;$j<count($hinhanh);$j++)
	{
	if($hinhanh[$j]!=null)
	{
?>
                                <li>
                                    <a title="<?php echo $chitietsp['tensp'];?>" alt="<?php echo $chitietsp['tensp'];?>" href="<?php echo base_url();?>uploads/<?php echo $hinhanh[$j];?>">
                                        <img title="<?php echo $chitietsp['tensp'];?>" alt="<?php echo $chitietsp['tensp'];?>" src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$j];?>">
                                        <span class="frame"></span>
                                    </a>
                                </li>
								<?php }else break;}?>
                             </ul>
                        </div>
                    </div>
                                    </div>
                <form action="<?php echo base_url();?>dat-hang-new/<?php echo $chitietsp['stt'];?>.html" enctype="multipart/form-data" method="post" name="frm_add_item_cart">
                <input type="hidden" value="plus" name="act">
                <input type="hidden" value="7835" name="product_id">
                <div class="caption">
                    <h1 itemprop="name"><?php echo $chitietsp['tensp'];?></h1>
                    
                    <p class="code"><strong>Mã SP : <span itemprop="mpn"><?php echo $chitietsp['id'];?></span></strong>
                    <span style="display:none" itemtype="http://schema.org/AggregateRating" itemscope="" itemprop="aggregateRating">
                    
                    </span>
                    </p><div itemprop="description" class="desc">
                        <p> <?php echo $chitietsp['motangan'];?></p>
                    </div>
                                        <div itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers" class="price">
                        
                        <p class="best-price"><strong><span itemprop="lowPrice"><?php echo number_format($chitietsp['giagiam'],"0",",",".");?></span>&nbsp;Đ</strong></p>
                        <meta style="display: none" content="VND" itemprop="priceCurrency">
                    </div>
                    
                    <div class="option clearfix">
                                                <div class="size clearfix">
                            <div class="col-lg-2">
                                <label class="name">Tùy chọn:</label>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-xs-3">
                                <select class="item_option_se form-control" name="sizechon">
                                    <?php  $size=explode(",", $chitietsp['size']); 
						for($k=0;$k<count($size);$k++)
						{
						if($size[$k]!=null)
						{
					?>
					<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

					<?php }else break;}?>

									
									</select>
                            </div>
                        </div>
                                                    <div class="number clearfix">
                            <div class="col-lg-2">
                            <label class="name">Số lượng:</label>
                            </div>
                            <div class="g-opt col-lg-4">
                                <div class="input-group number-spinner">
                                    <span class="input-group-btn data-dwn">
                                        <a data-dir="dwn" class="btn btn-default btn-info"><span class="glyphicon glyphicon-minus"></span></a>
                                    </span>
                                    <input type="text" max="10" min="1" value="1" name="soluong" class="form-control text-center">
                                    <span class="input-group-btn data-up">
                                        <a data-dir="up" class="btn btn-default btn-info"><span class="glyphicon glyphicon-plus"></span></a>
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                                        <div class="bottombar">
                                                                               
                            <div class="support"><strong>Hỗ trợ mua hàng</strong>0979.807.668</div>
                            <div class="button"><input type="submit" name="datmua" class="btn btn-default btn-buy" value="Mua ngay"></div>
                                            </div>

                    
                </div>
                
            </div>
            <div class="row services">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="item">
                        <div class="icon"><img title="An toàn và đảm bảo" alt="An toàn và đảm bảo" src="http://www.remoingay.com/static/v2/images/service-1.png"></div>
                        <p class="caption"><strong>Thanh toán<br>khi nhận hàng</strong>An toàn và đảm bảo</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="item">
                        <div class="icon"><img title="Giao hàng tận nơi nhanh chóng" alt="Giao hàng tận nơi nhanh chóng" src="http://www.remoingay.com/static/v2/images/service-2.png"></div>
                        <p class="caption"><strong>Giao Hàng<br>Toàn Quốc</strong>Giao hàng tận nơi nhanh chóng</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="item">
                        <div class="icon"><img title="Đổi trả hàng" alt="Đổi trả hàng" src="http://www.remoingay.com/static/v2/images/service-3.png"></div>
                        <p class="caption"><strong>Đổi trả<br>trong 7 ngày</strong>Xem quy định đổi trả hàng </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="item">
                        <div class="icon"><img alt="Liên hệ giá sỉ/buôn" src="http://www.remoingay.com/static/v2/images/service-4.png"></div>
                        <p class="caption"><strong>Liên hệ<br>mua giá sỉ/buôn</strong>Gọi 0979.807.668 - 0979.705.078</p>
                    </div>
                </div>
            </div>
            
            <div class="product-info">
                <h2 class="title"><span>Thông tin sản phẩm</span></h2>
                <div class="editor">
				<?php echo $chitietsp['motachitiet'];?>
				</div>
                <div class="bottombar">
                                            <div class="price">
                            
                            <p class="best-price"><strong><?php echo number_format($chitietsp['giagiam'],"0",",",".");?>&nbsp;Đ</strong></p>
                        </div>
                        
                        <div class="support"><strong>Hỗ trợ mua hàng</strong>0979.807.668</div>
                        <div class="button"><input type="submit" name="datmua" class="btn btn-default btn-buy" value="Mua ngay"></div>
                                    </div>
									
				
				
            </div>
			</form>
            <div class="comment">
                <h2 class="title"><span>Bình luận</span></h2>
                <div class="fbplugin">
                    <div data-num-posts="10" data-width="740" data-href="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" class="fb-comments fb_iframe_widget" fb-xfbml-state="rendered"></div>
                </div>
            </div>
            
            </div>
    </div>
    <div class="col-lg-2">
        <div class="relative-products">
    <h2 class="title">Có thể bạn thích!</h2>
    <div class="products clearfix">
	<?php foreach($splienquan as $item){?>
            <div class="item">
            <div class="thumb">
                <a title="Set áo không tay quần cullotes" href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html">
                    <img title="<?php echo $item['tensp'];?>" alt="<?php echo $item['tensp'];?>" src="<?php echo base_url();?>uploads/<?php echo $item['hinhanhchinh'];?>">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="caption">
                <h3 class="title"><a target="_blank" title="<?php echo $item['tensp'];?>" href="<?php echo base_url();?>sp/<?php echo $item['slug'];?>-<?php echo $item['stt'];?>.html"><?php echo $item['tensp'];?></a></h3>
                <p class="meta"><span class="price"><?php echo number_format($item['giagiam'],"0",",",".");?> đ</span></p>
            </div>
        </div>
             <?php }?>   
            </div>
</div>        
</div>
</div>

                          
</div>




				
</div><!--container-->    </div>