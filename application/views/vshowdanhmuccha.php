<div id="page-heading">
		<h2>Danh sách đồ án</h2>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
						 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">				
				<table border="0" width="1170" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a style="color:white;" href="#">Tên đồ án</a>	</th>					
										
					<th class="table-header-repeat line-left"><a style="color:white;" href="#">Ngày bắt đầu đồ án</th>
					
										
					<th class="table-header-repeat line-left" width="250px"><a style="color:white;" href="#">Ngày kết thúc đồ án</th>
					<th class="table-header-repeat line-left"><a style="color:white;" href="#">Số tuần</th>
					<th class="table-header-repeat line-left"><a style="color:white;" href="#">Tên khóa học</th>
					<th class="table-header-options line-left"><a style="color:white;" href="#">Tuỳ chọn</a></th>
				</tr>
				
				
				<?php foreach($users as $item)
					{
					
					?>
				<tr>
					<td><input name="chkid[]" type="checkbox"/></td>
					
					<td><?php echo $item['tenloaidoan'];?></td>
					
					<td><?php echo $item['ngaybatdau'];?></td>					
					
					<td><?php echo $item['ngayketthuc'];?></td>
					<td><?php echo $item['sotuan'];?></td>
					<td><?php echo $item['tenkhoahoc'];?></td>
					<td class="options-width">
					<a title="Sửa đồ án" class="icon-1 info-tooltip" href ="<?php echo base_url();?>ctbm/suadoan/<?php echo $item['idloaidoan'];?>"></a>
					<a title="Xóa đồ án" class="icon-2 info-tooltip" href ="<?php echo base_url();?>ctbm/xoadoan/<?php echo $item['idloaidoan'];?>" onclick="return confirm('Chắc chắn muốn xóa đồ án này?  ');"></a>
					</td>
					
				</tr>
				<?php };?>
				
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<ul >
					<div id="phantrang">
                  <?php
                    if($num_rows>0){
                        echo $link;
                        echo " | Tổng số đề tài: ".$num_rows;
                    }
                  ?>
					</div>
				</ul>
			</td>
			<td>
			
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>