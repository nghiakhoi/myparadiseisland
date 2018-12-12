		<div class="row">
			<div class="span3 offset9">
				<a class="btn btn-info" href="<?php echo base_url(); ?>cart/view">Xem giỏ hàng</a>
			</div>
		</div>
		<div class="row">
			<div class="span10 offset1">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>ID</td>
							<td>Sản phẩm</td>
							
							<td>Giá</td>
							<td>Mua</td>
						</tr>
					</thead>
						<?php
						foreach ($info1 as $k => $item) {
							echo "<tr>";
							echo "<td>".($k+1)."</td>";
							echo "<td>$item[product_name]</td>";
							
							echo "<td>$".$this->cart->format_number($item['product_price'])."</td>";
							echo "<td><a class='btn btn-success' href='".base_url()."cart/add/$item[product_id]'>Mua</a></td>";
							echo "</tr>";
						}
						?>
				</table>
			</div>
		</div>
	
