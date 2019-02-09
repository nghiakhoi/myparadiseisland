<?php class Ajax extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->library(array("form_validation","my_layout","session","my_auth","email","cart","MY_Cart"));
		$this->load->model("Mcart");
		$this->load->model("muser");
$this->load->helper(array("url","date","my_data"));
	}
	function ajax_level2($id)
	{
	
		?>
		
	<div name="level2" >
	<select  name="danhmuccon" class="styledselect_form_1" onchange="showUser1(this.value)" >
	<option selected="" value="">Chọn</option>
    <?php
	$query=$this->db->query("select * from danhmuccon where iddmcha='".$id."'");
	if($query->num_rows()!=0)
	{
	$data=$query->result_array();
	
	foreach($data as $item)
		{
		?>
        <option value="<?php echo $item['iddmcon'];?>"><?php echo $item['tendmcon'];?></option>
        <?php
		}
	}
	?>
	</select>
    </div>
    	<?php
	}
	
	function ajax_level2a($id)
	{
	
		?>
		
	<div name="level2a" >
	<select  name="loaisp" class="styledselect_form_1" >
    <?php
	$query=$this->db->query("select * from danhmucsubcon where iddmcon='".$id."'");
	if($query->num_rows()!=0)
	{
	$data=$query->result_array();
	
	foreach($data as $item)
		{
		?>
        <option value="<?php echo $item['iddmsubcon'];?>"><?php echo $item['tendmsubcon'];?></option>
        <?php
		}
	}
	?>
	</select>
    </div>
    	<?php
	}
	
	public function update(){
		$data = $_POST['soluong'];
		        

		
			$this->cart->update($item);
		
		$data['title'] =" View Cart";
		$data['temp'] ="cart/view_cart"; 
		$data['info2'] = $this->cart->contents();
		$this->my_layout->view("cart/view_cart",$data);
	}
	
	function ajax_level4a()
	{
	session_start();
$_SESSION['phivanchuyen']=0;
	$mavc=0;
	
	if(isset($_GET['vanchuyen']))
	{
		$mavc=$_GET['vanchuyen'];
		$query=$this->db->query("select * from province where provinceid='".$mavc."'");
	if($query->num_rows()!=0)
	{
	$a=$this->cart->contents();
		$dem=0;
		$data['gram']=0;
		$data['tienship']=0;
			foreach($a as $item)
			{
				$stt=$item['id'];
				$data['info1'] = $this->Mcart->getProductById($stt);
				if($dem==0)
				{
					$data['gram']=$item['trongluong']*$item['qty'];
					
					if($item['trongluong']==250)
					{
						$data['tienship']=20000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==450)
					{
						$data['tienship']=30000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==600)
					{
						$data['tienship']=45000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					$dem++;
				}
				else
				{
					$data['gram']+=$item['trongluong']*$item['qty'];
					if($item['trongluong']==250)
					{
						$data['tienship']+=20000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==450)
					{
						$data['tienship']+=30000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==600)
					{
						$data['tienship']+=45000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
				}
			}
	}
	else
	{
		$tienvc=$_SESSION['phivanchuyen'];
	}
	}
	else
	{
		$tienvc=$_SESSION['phivanchuyen'];
	}
	
	if(isset($_GET['phivanchuyen']))
	{
		
		
	
	$tienvc=$_GET['phivanchuyen'];
	$_SESSION['phivanchuyen']=$_GET['phivanchuyen'];
	
	}
	
	$tongtientam=$this->cart->total();
	if($mavc!=79&&$mavc!=""){
	$tongtien=$this->cart->total()+$data['tienship'];
	}
	else
	{
		$data['tienship']=16000;
		$tongtien=$this->cart->total()+$data['tienship'];
	}
	if($mavc==""){
		$data['tienship']=0;
		$tongtien=$this->cart->total()+$data['tienship'];
	}
	if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
	if(($this->cart->total_items())>=3&&$mavc==79)
						{
							$data['tienship']=0;
							$tongtien=$this->cart->total()+$data['tienship'];
						}
		?>

	
	<div id="txtHint5" >
<div class="box_cart_content1">
<div id="step_four_body" class="step-body-active ">
<div class="clear">		

<ul>
<li class="w45">Thành tiền:</li>
<li class="text_bo"><?php echo number_format($tongtientam,"0",",",".");?>&nbsp;VNĐ</li><br />

<li class="w45">Phí vận chuyển:</li>
<li class="text_bo">
<input type="hidden" name="phivanchuyen" value="<?php echo $data['tienship']; ?>"  />
<?php if($data['tienship']!=0) echo number_format($data['tienship'],"0",",",".")."&nbsp;VNĐ"; else echo "Miễn phí ship"; ?>
</li>
<br />
<br />                                
</ul>
</div>
</div>
</div>
<div class="box_cart_content1 bor_top">
<ul>
<li class=" w45 font18 text_bo">Tổng cộng:</li>
<input type="hidden" name="tongtientam1" value="<?php echo $tongtien;?>" />
<li class="font18 text_bo red_color total-content-more">
<?php  echo number_format($tongtien,"0",",",".");?>&nbsp;VNĐ			
</li>
<br />
</ul>
<div class="cb"></div>
</div>  
</div> 
    	<?php
	}
	
	function ajax_level4()
	{
	session_start();
$_SESSION['phivanchuyen']=0;
	$mavc=0;
	
	if(isset($_GET['vanchuyen']))
	{
		$mavc=$_GET['vanchuyen'];
		$query=$this->db->query("select * from province where provinceid='".$mavc."'");
	if($query->num_rows()!=0)
	{
	$a=$this->cart->contents();
		$dem=0;
		$data['gram']=0;
		$data['tienship']=0;
			foreach($a as $item)
			{
				$stt=$item['id'];
				$data['info1'] = $this->Mcart->getProductById($stt);
				if($dem==0)
				{
					$data['gram']=$item['trongluong']*$item['qty'];
					
					if($item['trongluong']==250)
					{
						$data['tienship']=20000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==450)
					{
						$data['tienship']=30000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==600)
					{
						$data['tienship']=45000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					$dem++;
				}
				else
				{
					$data['gram']+=$item['trongluong']*$item['qty'];
					if($item['trongluong']==250)
					{
						$data['tienship']+=20000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==450)
					{
						$data['tienship']+=30000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
					if($item['trongluong']==600)
					{
						$data['tienship']+=45000*$item['qty'];
						if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
					}
				}
			}
			$data['tienship']=0;//sửa chỗ này
	}
	else
	{
		$tienvc=0;//$_SESSION['phivanchuyen'];
	}
	}
	else
	{
		$tienvc=0;//$_SESSION['phivanchuyen'];
	}
	
	if(isset($_GET['phivanchuyen']))
	{
		
		
	
	$tienvc=0;//$_GET['phivanchuyen'];
	$_SESSION['phivanchuyen']=0;//$_GET['phivanchuyen'];
	
	}
	
	$tongtientam=$this->cart->total();
	if($mavc!=79&&$mavc!=""){
	$tongtien=$this->cart->total()+$data['tienship'];
	}
	else
	{
		$data['tienship']=0;//16000;
		$tongtien=$this->cart->total()+$data['tienship'];
	}
	if($mavc==""){
		$data['tienship']=0;
		$tongtien=$this->cart->total()+$data['tienship'];
	}
	if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
	if(($this->cart->total_items())>=3&&$mavc==79)
						{
							$data['tienship']=0;
							$tongtien=$this->cart->total()+$data['tienship'];
						}
		?>
		
	<div id="txtHint1" >
	<div class="order_total_info canhchinhle">	    
<div class="clear">
<ul class="order_total_info_nd" style="">
<li class="subtotal">
<label>Thành tiền:</label>

<span style="margin-top:-14px;"><?php echo number_format($tongtientam,"0",",",".");?>&nbsp;VNĐ</span>
</li>
<li id="payment_shipping_fee_line">
<input type="hidden" name="phivanchuyen" value="<?php echo $data['tienship'];?>"  />

<label title="" class="">Phí vận chuyển:</label>
<span style="margin-top:-14px;"><?php if($data['tienship']!=0) echo number_format($data['tienship'],"0",",",".")."&nbsp;VNĐ"; else echo "Miễn phí ship"; ?></span>
</li>
<li class="total" style="border-top:1px solid #dddddd;">
<label style="padding-top:5px; margin-top:5px;">Tổng số tiền:</label>
<input type="hidden" name="tongtientam1" value="<?php echo $tongtien;?>" />
<span style="margin-top:-20px; color:#ed1b24 !important; padding-top:5px; font-size:22px; font-weight:bold;"><?php  echo number_format($tongtien,"0",",",".");?>&nbsp;VNĐ</span>
</li>
</ul>
</div>
</div>	
    </div>
    	<?php
	}
	
	function ajax_level3()
	{
	
	$item1 = $_POST['soluong'];
	$item2 = $_POST['iddong'];	        
	/*$data['1']=array(
		'rowid' => $item2,
		'qty' => $item1
	);
	foreach ($data as $item) {
			$this->cart->update($item);
		}*/
	$data = $_POST;	
	foreach ($data as $item) {
			$this->cart->update($item);
		}		
	print_r($data);	
		
		
		?>
		
	<div id="txtHint" style="display:inline;">

<?php $_SESSION['tongtientam']=$items['subtotal']; echo number_format($_SESSION['tongtientam'],"0",",",".");?>&nbsp;VNĐ
</div>

    	<?php
	}
	
	function ajax_level13()
	{
	
	$item1 = $_POST['soluong'];
	$item2 = $_POST['iddong'];
	$item3 = $_POST['id'];	
		$laysanpham=$this->Mcart->getProductById($item3);
	
	$data['1']=array(
		'rowid' => $item2,
		'qty' => $item1
	);
	foreach ($data as $item) {
			$this->cart->update($item);
			$sub=$laysanpham['giagiam']*$item1;
		}
		
			 
		
		
		
		?>
		  <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    <?php echo number_format($sub,"0",",","."); ?>                                   </span>	
	
    	<?php
	}
	
	function ajax_level13size()
	{
	
	$item1 = $_POST['sizechon'];
	$item2 = $_POST['iddong'];
	
		//$laysanpham=$this->Mcart->getProductById($item3);
	
	for ($i = 0; $i <= $this->cart->total_items(); $i++){
            $item = $this->input->post($i);
			
            $data=array(
		'rowid' => $item2,
		'options' => array( 'sizechon'=>$item1)
	);
            $this->cart->update_options($data);
            }
	
	
		
		
		
		
		?>
		 
	
    	<?php
	}
	function ajax_level13mau()
	{
	
	$item1 = $_POST['mauchon'];
	$item2 = $_POST['iddong'];	
	
		//$laysanpham=$this->Mcart->getProductById($item3);
	
	for ($i = 0; $i <= $this->cart->total_items(); $i++){
            $item = $this->input->post($i);
			
            $data=array(
		'rowid' => $item2,
		'options' => array( 'mauchon'=>$item1)
	);
            $this->cart->update_options($data);
            }
		
		
		
		
		?>
		 
	
    	<?php
	}
	
	function ajax_level13a()
	{
	
	$item1 = $_POST['soluong'];
	$item2 = $_POST['iddong'];
	$item3 = $_POST['id'];	
		$laysanpham=$this->Mcart->getProductById($item3);
	
	$data['1']=array(
		'rowid' => $item2,
		'qty' => $item1,
		'options' => array('wei'=>$laysanpham['trongluong']*$item1),
	);
	foreach ($data as $item) {
			$this->cart->update($item);
			$sub=$laysanpham['trongluong']*$item1;
		}
		
			 
		echo $laysanpham['trongluong']."gr x ".$item1." = ".$sub."gr";
		
		
		?>
		 
	
    	<?php
	}
	
	function ajax_level16()
	{
	session_start();
$_SESSION['phivanchuyen']=0;
	$mavc=0;
	
	
	
	$tongtientam=$this->cart->total();
	
	$tongtien=$this->cart->total();
		
		?>
		



<input type="hidden" name="tongtientam1" value="<?php echo $tongtien;?>" />
<span class="totalprice1 price-usd"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo number_format($tongtien,"0",",",".");?></span></span>



    	<?php
	}
	
	function ajax_level5()
	{
	$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		?>
		
	
<div id="step_two_body" class="step-body-active cm-skip-save-fields" style="border-right:1px solid #dddddd;border-left:1px solid #dddddd; box-shadow: 1px 1px 10px; min-height:300px; height:auto;">
	
<div>
<form class="cm-ajax cm-ajax-force" method="post" action="/ho-chi-minh/" name="step_two_billing_address">
<div class="clear">
<div class="input_info_privite"> Vui lòng nhập thông tin của bạn </div>
<div class="float-left">
<div class="form-field">
<label class="hidden cm-profile-field cm-required " >Họ tên:</label>
<input id="elm_30" class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_30');" value="<?php echo $data['info']['hoten'];?>" size="32" name="hoten" placeholder="Họ tên">
</div>
<div class="form-field">
<input class="input-text " type="text" disabled="disabled" value="<?php echo $data['info']['email'];?>" size="32">
</div>

<?php $diachi=explode("|", $data['info']['diachi']); 
	for($i=0;$i<count($diachi);$i++)
	{
	//if($diachi[$i]!=null)
	{
?>

<div class="form-field">
<label class="hidden cm-profile-field cm-required " for="elm_1<?php echo $i;?>"><?php if($i==0) echo "Số nhà"; if($i==1) echo "Đường"; if($i==2) echo "Phường / Xã"; if($i==3) echo "Quận / Huyện"; if($i==4) echo "Tỉnh / Thành";?>:</label>
<input id="elm_1<?php echo $i;?>" class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_1<?php echo $i;?>');" value="<?php if($i==0) echo $diachi[$i]; if($i==1) echo $diachi[$i]; if($i==2) echo $diachi[$i]; if($i==3) echo $diachi[$i]; if($i==4) echo $diachi[$i]; else echo "";?>" size="32" name="<?php echo "diachi".$i; ?>" placeholder="<?php if($i==0) echo "Số nhà"; if($i==1) echo "Đường"; if($i==2) echo "Phường / Xã"; if($i==3) echo "Quận / Huyện"; if($i==4) echo "Tỉnh / Thành";?>">
</div>
<?php } }//else break;}?>

<div class="form-field">
<label class="hidden cm-profile-field cm-required " for="elm_31">Điện thoại:</label>
<input id="elm_31" onKeyPress="return isNumberKey(event)" class="input-text cm-skip-avail-switch" type="text" onblur="clear_space('elm_31');" value="<?php echo $data['info']['phone'];?>" size="32" name="dienthoai" placeholder="Điện thoại">
</div>
</div>
</div>

<div class="buttons-container margin-top">
<span class="button-submit">
<input type="submit" value="Hoàn tất thông tin" name="chapnhan">
</span>
</div>
</form>
</div>
</div>
    
    	<?php
	}
	
	function ajax_level6()
	{
			$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			$quanhuyen = $this->muser->layquanhuyen($_POST['tinhthanh']);
			
		?>
	
<div class="col ">
<label class="field-name">Quận huyện <span class="req">*</span>:</label>
<select class="form-control " id="quanhuyen" name="quanhuyen" required="required" onchange="layphuongxa(this.value)">
<option value="">- Chọn Quận/Huyện -</option>
<?php foreach($quanhuyen as $quanhuyen1){ ?>
<option value="<?php echo $quanhuyen1['districtid'];?>"><?php echo $quanhuyen1['districtname'];?></option>
<?php }?>
</select>
</div>
<div id="txtHint3">
<div class="col ">
<label class="field-name">Phường xã <span class="req">*</span>:</label>
<select class="form-control " id="phuongxa" name="phuongxa" >
<option value="">- Chọn Phường/Xã -</option>

</select>
</div>	
</div>	

    
    	<?php
	}
	
	function ajax_level7()
	{
			$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			
			$phuongxa = $this->muser->layphuongxa($_POST['quanhuyen']);
		?>
	


<div class="col ">
<label class="field-name">Phường xã <span class="req">*</span>:</label>
<select class="form-control " id="phuongxa" name="phuongxa">
<option value="">- Chọn Phường/Xã -</option>
<?php foreach($phuongxa as $phuongxa1){ ?>
<option value="<?php echo $phuongxa1['wardid'];?>"><?php echo $phuongxa1['wardtype'];?> <?php echo $phuongxa1['wardname'];?></option>
<?php }?>
</select>
</div>	

    
    	<?php
	}
	
	function ajax_level8a()
	{
			$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			if($_GET['vanchuyen']!="")
			$mavc=$_GET['vanchuyen'];
			else
			$mavc=0;
		$query=$this->db->query("select * from province where provinceid='".$mavc."'");
	if($query->num_rows()!=0)
	{
	$data=$query->row_array();
	$tienvc=$data['gia'];
	
	
	$a=$this->cart->contents();
		$dem=0;
		$data['gram']=0;
		$data['tienship']=0;
			foreach($a as $item)
			{
				$stt=$item['id'];
				$data['info1'] = $this->Mcart->getProductById($stt);
				if($dem==0)
				{
					$data['gram']=$item['trongluong']*$item['qty'];
					
					if($item['trongluong']==250)
					{
						$data['tienship']=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']=45000*$item['qty'];
					}
					$dem++;
				}
				else
				{
					$data['gram']+=$item['trongluong']*$item['qty'];
					if($item['trongluong']==250)
					{
						$data['tienship']+=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']+=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']+=45000*$item['qty'];
					}
				}
			}
	
	
	}
	else
	{
		$tienvc="";
	}
	
	if($mavc=="")
	{
$data=$query->row_array();
	
	
	
	$a=$this->cart->contents();
		$dem=0;
		$data['gram']=0;
		$data['tienship']=0;
			foreach($a as $item)
			{
				$stt=$item['id'];
				$data['info1'] = $this->Mcart->getProductById($stt);
				if($dem==0)
				{
					$data['gram']=$item['trongluong']*$item['qty'];
					
					if($item['trongluong']==250)
					{
						$data['tienship']=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']=45000*$item['qty'];
					}
					$dem++;
				}
				else
				{
					$data['gram']+=$item['trongluong']*$item['qty'];
					if($item['trongluong']==250)
					{
						$data['tienship']+=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']+=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']+=45000*$item['qty'];
					}
				}
			}
			$data['tienship']=0;
}
			
		?>
	





Trọng lượng cả đơn hàng: <strong><?php echo $data['gram'];?> gram</strong>

    
    	<?php
	}
	
	function ajax_level8()
	{
			$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			if($_GET['vanchuyen']!="")
			$mavc=$_GET['vanchuyen'];
			else
			$mavc=0;
		$query=$this->db->query("select * from province where provinceid='".$mavc."'");
	if($query->num_rows()!=0)
	{
	$data=$query->row_array();
	$tienvc=0;//$data['gia'];
	
	
	$a=$this->cart->contents();
		$dem=0;
		$data['gram']=0;
		$data['tienship']=0;
			foreach($a as $item)
			{
				$stt=$item['id'];
				$data['info1'] = $this->Mcart->getProductById($stt);
				if($dem==0)
				{
					$data['gram']=$item['trongluong']*$item['qty'];
					
					if($item['trongluong']==250)
					{
						$data['tienship']=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']=45000*$item['qty'];
					}
					$data['tienship']=0;//xóa chỗ này
					$dem++;
				}
				else
				{
					$data['gram']+=$item['trongluong']*$item['qty'];
					if($item['trongluong']==250)
					{
						$data['tienship']+=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']+=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']+=45000*$item['qty'];
					}
					$data['tienship']=0;//xóa chỗ này
				}
			}
	
	
	}
	else
	{
		$tienvc="";
	}
	
	if($mavc=="")
	{
$data=$query->row_array();
	
	
	
	$a=$this->cart->contents();
		$dem=0;
		$data['gram']=0;
		$data['tienship']=0;
			foreach($a as $item)
			{
				$stt=$item['id'];
				$data['info1'] = $this->Mcart->getProductById($stt);
				if($dem==0)
				{
					$data['gram']=$item['trongluong']*$item['qty'];
					
					if($item['trongluong']==250)
					{
						$data['tienship']=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']=45000*$item['qty'];
					}
					$data['tienship']=0;//xóa chỗ này
					$dem++;
				}
				else
				{
					$data['gram']+=$item['trongluong']*$item['qty'];
					if($item['trongluong']==250)
					{
						$data['tienship']+=20000*$item['qty'];
					}
					if($item['trongluong']==450)
					{
						$data['tienship']+=30000*$item['qty'];
					}
					if($item['trongluong']==600)
					{
						$data['tienship']+=45000*$item['qty'];
					}
					$data['tienship']=0;//xóa chỗ này
				}
			}
			$data['tienship']=0;
}
			if(($this->cart->total_items())>=3)
						{
							$data['tienship']=0;
						}
		?>
	




<div class="overflow-hidden " id="shipping_rates_list">
<input type="radio" class="valign" name="shipping_ids[]" value="11" id="sh_11" checked="checked"  />
<label style="width:221px;" id="shipping_method_11_label" for="sh_11" class="valign strong">Chuyển phát nhanh từ TPHCM với giá <?php if($data['tienship']!=0) {if($mavc!=79) echo number_format($data['tienship'],"0",",",".")."&nbsp;VNĐ"; else echo number_format("16000","0",",",".")."&nbsp;VNĐ";} else echo "Miễn phí ship"; ?>
<br>


<span class="valign strong" style="color:white;"><b>Thời gian vận chuyển: <br><span style="color:yellow;"><?php if($tienvc==0) echo $data['songaygiao']; else echo "0";?></span></b></span><br>
<span class="valign strong" style="color:white;"><b>Tổng trọng lượng: <br><span style="color:yellow;"><?php echo $data['gram'];?> gram</span></b></span>

</label>
<!--shipping_rates_list--></div>

    
    	<?php
	}
	
	function ajax_level9()
	{
		$query=array(
			"tenkhach" => $_POST['tenkhach'],
			"phone" => $_POST['phone'],
			"noigiao" => $_POST['diachi'],
			"soluong" => $_POST['soluong'],
			"dongia" => $_POST['dongia'],
			"vanchuyen" => $_POST['vanchuyen'],
			"tongtien" => $_POST['tongtien'],
			"sizechon" => $_POST['size'],
			"chieucao" => $_POST['chieucao'],
			"cannang" => $_POST['cannang'],
		);	
		
		$this->db->where("idhoadon",$_POST['idhoadon']);
        if($this->db->update("hoadon",$query))
            return true;
        else
            return FALSE;
	
			
		?>
	


    
    	<?php 
	}
	
	function ajax_level10()
	{
		$query=array(
			
			"mauchon" => $_POST['mau'],
			
		);	
		
		$this->db->where("idhoadon",$_POST['idhoadon']);
        if($this->db->update("hoadon",$query))
            return true;
        else
            return FALSE;
	
			
		?>
	


    
    	<?php 
	}
	
	function ajax_level11()
	{
		$query=array(
			
			"status" => $_POST['trangthai'],
			
		);	
		
		$this->db->where("idhoadon",$_POST['idhoadon']);
        if($this->db->update("hoadon",$query))
            return true;
        else
            return FALSE;
	
			
		?>
	


    
    	<?php 
	}
	
	function ajax_level12()
	{
			
		
		$this->db->where("status",$_POST['loc']);
        if($this->db->get("hoadon"))
            return true;
        else
            return FALSE;
	
			
		?>
	


    
    	<?php 
	}
	
	function ajax_level14()
	{
			
		
		$id = $_POST['idsp'];
		$data= $this->Mcart->getProductById($id);
		
		//$now = getdate();
		//$ngayketthuc=substr($data['ngayketthuc'],6,4)."/".substr($data['ngayketthuc'],3,2)."/".substr($data['ngayketthuc'],0,2);
		
		//$time=mktime($now["hours"],$now["minutes"],$now["seconds"],$now["mon"],$now["mday"],$now["year"]);
		
		//$time1=mktime($ngayketthuc["hours"],$ngayketthuc["minutes"],$ngayketthuc["seconds"],$ngayketthuc["mon"],$ngayketthuc["mday"],$ngayketthuc["year"]);
		
		
		
		$getshop=$this->cart->contents();
		$data['qty']=1;
		foreach($getshop as $item)
		{
			if($item['id']==$data['stt'] && $item['options']['mauchon']==$_POST['mau'] && $item['options']['sizechon']==$_POST['size'])
			{
				$data['qty']=$item['qty']+1;
			}
			
		}
		
		$shop=array(
				'id'=>$data['stt'],
				'masp'=>$data['idsp'],
				'name'=>$data['tensp'],
				'price'=>$data['giagiam'],
				'hinhanh'=>$data['hinhanhchinh'],
				'mau'=>$data['mau'],
				'size'=>$data['size'],
				'trongluong'=>$data['trongluong'],
				'options' => array('mauchon'=>$_POST['mau'], 'sizechon'=>$_POST['size'], 'wei'=>$data['trongluong']),
				
				//'vanchuyen'=>$data['vanchuyen'],
				'qty'=>$data['qty'],
				'subtong'=>$data['giagiam']*$data['qty'],
		);
		
		$this->cart->insert($shop);
		//redirect(base_url().'cgiohangno','refresh');
		echo "<div id='txtHint' style='color:white;'>".$this->cart->total_items()."</div>";
		
	
			
		?>
	


    
    	<?php 
	}
	
	function ajax_level15()
	{
			
		
		$id = $_POST['sttsp'];
		$data= $this->Mcart->getProductById($id);
		
		//print_r($data);
		
	
			
		?>
		
		<div id="txtHintstt"> 
		
	<ul style="display:inline-flex;">
<?php $mau=explode("|", $data['mau']); 
	for($j=0;$j<count($mau);$j++)
	{
	
	if($j==0)
	{
	?>
	
	
    <li class="cart_items" style="margin-left:10px;border:3px solid green;border-radius:20px;over-flow:hidden;padding:10px 0px 10px 6px;">
      <div class="contentzzz"> <a  href="javascript:;" class="product-imagezzz" title="Product 1" > 
    <input style="width:280px;" type="hidden" name="idsp<?php echo $data['stt'];?>" id="idsp<?php echo $data['stt'];?>" value="<?php echo $data['stt'];?>" />
	<input style="width:280px;" type="hidden" name="hinhmau<?php echo $j;?><?php echo $data['stt'];?>" id="hinhmau<?php echo $j;?><?php echo $data['stt'];?>" value="<?php echo $mau[$j];?>" />
		
	  <img width="100px" height="100px" src="<?php echo base_url();?>/uploads/<?php echo $mau[$j];?>" alt="Product 1" /> </a> </div>
      Chọn size:<br>
<select required  name="sizechon<?php echo $j;?><?php echo $data['stt'];?>" id="sizechon<?php echo $j;?><?php echo $data['stt'];?>" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">

<?php  $size=explode(",", $data['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}?>
</select><br>
<script>
function showUserx<?php echo $j;?><?php echo $data['stt'];?>() {
	var giatri1 = document.getElementById('idsp<?php echo $data['stt'];?>').value;
	var giatri2 = document.getElementById('hinhmau<?php echo $j;?><?php echo $data['stt'];?>').value;
	var giatri3 = document.getElementById('sizechon<?php echo $j;?><?php echo $data['stt'];?>').value;
	
	var p1="idsp="+giatri1;
	var p2="mau="+giatri2;
	var p3="size="+giatri3;
	
	
	
	var p=p1+"&"+p2+"&"+p3;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level14/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>
	  <button onclick="showUserx<?php echo $j;?><?php echo $data['stt'];?>();" type="button" title="Add to Cart" class="add-to-cart" name="nutchon<?php echo $j;?>">Chọn mẫu này</button>
	  
    </li>
	

	
	<?php }else{
	
	if($mau[$j]!=null)
	{
?>

<li class="cart_items" style="margin-left:10px;border:3px solid green;border-radius:20px;over-flow:hidden;padding:10px 0px 10px 6px;">
      <div class="contentzzz"> <a  href="javascript:;" class="product-imagezzz" title="Product 1" > 
    <input style="width:280px;" type="hidden" name="idsp<?php echo $data['stt'];?>" id="idsp<?php echo $data['stt'];?>" value="<?php echo $data['stt'];?>" />
	<input style="width:280px;" type="hidden" name="hinhmau<?php echo $j;?><?php echo $data['stt'];?>" id="hinhmau<?php echo $j;?><?php echo $data['stt'];?>" value="<?php echo $mau[$j];?>" />
		
	  <img width="100px" height="100px" src="<?php echo base_url();?>/uploads/<?php echo $mau[$j];?>" alt="Product 1" /> </a> </div>
      Chọn size:<br>
<select required  name="sizechon<?php echo $j;?><?php echo $data['stt'];?>" id="sizechon<?php echo $j;?><?php echo $data['stt'];?>" style="font-size: 16px; padding: 4px 8px;" class="change_quantity" rel="1159000">

<?php  $size=explode(",", $data['size']); 
	for($k=0;$k<count($size);$k++)
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}?>
</select><br>
<script>
function showUserx<?php echo $j;?><?php echo $data['stt'];?>() {
	var giatri1 = document.getElementById('idsp<?php echo $data['stt'];?>').value;
	var giatri2 = document.getElementById('hinhmau<?php echo $j;?><?php echo $data['stt'];?>').value;
	var giatri3 = document.getElementById('sizechon<?php echo $j;?><?php echo $data['stt'];?>').value;
	
	var p1="idsp="+giatri1;
	var p2="mau="+giatri2;
	var p3="size="+giatri3;
	
	
	
	var p=p1+"&"+p2+"&"+p3;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level14/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>
	  <button onclick="showUserx<?php echo $j;?><?php echo $data['stt'];?>();" type="button" title="Add to Cart" class="add-to-cart" name="nutchon<?php echo $j;?>">Chọn mẫu này</button>
    </li>
<?php }else break;}}?>
</ul>
</div>

    
    	<?php 
	}
	
	function ajax_showdonhang()
	{
		
		$idhoadon = $_POST['idhoadon'];
		
		$this->db->where("idhoadon",$idhoadon);
		
        $query = $this->db->get('hoadon');
        
		$data=$query->row_array();
		
		$this->db->where("idhoadon",$idhoadon);
		
        $query = $this->db->get('chitiethoadon');
        
		$data1=$query->result_array();
        
		?>	
		
		<!-- Modal -->

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Chi tiết hóa đơn</h4>
      </div>
      <div class="modal-body">
        
		<div id="content-wrapper" class="row-fluid">
<div class="span12">

<div class="row-fluid invoice">
    <div class="span12 box">
        <div class="box-content box-double-padding">
            <div class="row-fluid">
                <div class="invoice-header">
                    <div class="invoice-title">
                        Đơn hàng số
                        <span class="muted">#001</span>
                    </div>
                   
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 seller">
                    <div class="lead text-contrast">Khách hàng</div>
                   
                    <address>
                        
						<input id="idsp" class="inp-form" width="10px" type="text" value="<?php echo $data['tenkhach'];?>" name="idsp">
						
                        <br>
                        
						
						<textarea id="des" rows="5" cols="33" name="des"><?php echo str_replace("|",", ",$data['noigiao']);?></textarea>
						
                        <br>
                        
                        
                        <input id="idsp" class="inp-form" width="10px" type="text" value="<?php echo $data['phone'];?>" name="idsp">
						
                    </address>
                </div>
                
                <div class="span6 info">
                    <div class="lead muted">Thông tin</div>
                    Ngày đặt:
                    <strong><?php echo $data['ngaydat'];?></strong>
                    <br><br>
                    Ghi chú:
                    <strong><?php echo $data['ghichu'];?></strong>
					<br><br>
					Tổng tiền:<br><br>
					<div class="text-left text-contrast subtotal">
                       <?php echo number_format($data['tongtien'],"0",",",".");?>
                    </div>
					
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="responsive-table">
                        <div class="scrollable-area">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    
                                    <th>Tên sản phẩm</th>
                                    <th>
                                        <div class="text-center">Số lượng</div>
                                    </th>
                                    <th>
                                        <div class="text-right">Đơn giá</div>
                                    </th>
									<th>
                                        <div class="text-right">Size-Mẫu</div>
                                    </th>
                                    <th>
                                        <div class="text-right">Thành tiền</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach($data1 as $item){?>
								
                                <tr>
                                    
                                    <td><?php echo $item['tensp'];?></td>
                                    <td>
                                        <div class="text-center"><?php echo $item['soluong'];?></div>
                                    </td>
                                    <td>
                                        <div class="text-right"><?php echo number_format($item['dongia'],"0",",",".");?></div>
                                    </td>
									<td>
                                        <div class="text-right"><?php echo $item['sizechon'];?></div>
                                    </td>
                                    <td>
                                        <div class="text-right"><?php echo number_format($item['tongcong'],"0",",",".");?></div>
                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hr-normal">
           
        </div>
    </div>
</div>
</div>
</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>


    
    	<?php 
	}
	
	
}
?>