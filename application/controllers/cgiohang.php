<?php 
class Cgiohang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array("url","form"));
		$this->load->library(array("form_validation","my_layout","session","my_auth","email","cart"));
		$this->load->model("Mcart");
		$this->my_layout->setLayout("vtrangchu");
		$this->load->model("Mtrangchu");
		$this->load->model("muser");
		
		//$this->load->model("mhome");
	}
	public function index(){
	$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		$data['title'] ="Đặt hàng"; 
		$data['info2'] = $this->cart->contents();
		$data['tinhthanh'] = $this->muser->laytinhthanh();
		
		
		if(isset($_POST['chapnhan'])){
            $diachi=$_POST['sonha']."|".$_POST['duong']."|".$_POST['phuongxa']."|".$_POST['quanhuyen']."|".$_POST['tinhthanh'];
			$thongtin=array(
				"hoten" => $_POST['hoten'],
				"diachi" => $diachi,
				"phone" => $_POST['dienthoai'],
				
			);
			
			$this->muser->updateUser($thongtin,$userid);
			//$this->cart->destroy();
			redirect(base_url().'cgiohang#p1');
            
        }
		
		
		if(isset($_POST['ok'])){
            $a=$this->cart->contents();
			$ngaythang= date('d/m/Y');
			$vanchuyen=$_POST['phivanchuyen'];
			$thongtindiachi = $this->muser->thongtindiachi($_POST['phuongxa']);
			if($_POST['sonha']=="")
			{
				$sonha="Số nhà Không có";
			}
			else
			{
				$sonha=$_POST['sonha'];
			}
			if($_POST['duong']=="")
			{
				$duong="Đường Không có";
			}
			else
			{
				$duong="Đường ".$_POST['duong'];
			}
			$diachi=$sonha."|".$duong."|".$thongtindiachi['wardtype']." ".$thongtindiachi['wardname']."|".$thongtindiachi['districttype']." ".$thongtindiachi['districtname']."|".$thongtindiachi['provincetype']." ".$thongtindiachi['provincename'];
			
			foreach($a as $item)
			{
				$stt=$item['id'];
				$dongia=$item['price'];
				$soluong=$item['qty'];
			}
			$tongtien=($soluong*$dongia)+$vanchuyen;
			$ghichu=$_POST['ghichu'];
			$noigiao=$data['info']['diachi'];
			$dathang=array(
				"stt" => $stt,
				"idkhach" => $userid,
				"tenkhach" => $_POST['hoten'],
				"phone" => $_POST['dienthoai'],
				"ngaydat" => $ngaythang,
				"soluong" => $soluong,
				"dongia" => $dongia,
				"vanchuyen" => $vanchuyen,
				"tongtien" => $tongtien,
				"mauchon" => $_POST['mau'],
				"sizechon" => $_POST['size'],
				"ghichu" => $ghichu,
				"noigiao" => $diachi,
			);
			
			$this->Mcart->dathang($dathang);
			$this->cart->destroy();
			redirect(base_url().'ctrangchu/thanhcong');
            
        }
		
		
		if(count($data['info2'])!=0)
		{
		
		
		$data['sanpham']=$this->Mtrangchu->listall();
	$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['hienthi']=3;
        //$data['loaisp']=$this->mhome->get_theloai();
		
		//$data['sanpham']=$this->Mtrangchu->listall();
        //$data['loaisp']=$this->mhome->get_theloai();
		
        
		
		$a=$this->cart->contents();
			foreach($a as $item)
			{
				$stt=$item['id'];
				
			}
		$data['info1'] = $this->Mcart->getProductById($stt);
		$this->my_layout->view("view_cart",$data);
		}
		else
		{
			redirect(base_url().'ctrangchu');
		}
		
	}
	public function add(){
		
		
		
		$this->cart->destroy();
		$id = $this->uri->segment(2);
		$data= $this->Mcart->getProductById($id);
		
		//$now = getdate();
		$ngayketthuc=substr($data['ngayketthuc'],6,4)."/".substr($data['ngayketthuc'],3,2)."/".substr($data['ngayketthuc'],0,2);
		
		//$time=mktime($now["hours"],$now["minutes"],$now["seconds"],$now["mon"],$now["mday"],$now["year"]);
		
		//$time1=mktime($ngayketthuc["hours"],$ngayketthuc["minutes"],$ngayketthuc["seconds"],$ngayketthuc["mon"],$ngayketthuc["mday"],$ngayketthuc["year"]);
		
		if(strtotime($ngayketthuc)>strtotime(date('Y/m/d')))
		{
		
		$getshop=$this->cart->contents();
		$data['qty']=1;
		
		$shop=array(
				'id'=>$data['stt'],
				'masp'=>$data['idsp'],
				'name'=>$data['tensp'],
				'price'=>$data['giagiam'],
				'hinhanh'=>$data['hinhanhchinh'],
				//'vanchuyen'=>$data['vanchuyen'],
				'qty'=>$data['qty']
		);
		
		$this->cart->insert($shop);
		redirect(base_url().'cgiohangno','refresh');
		}
		else
		{
			$this->load->view("vloi9999");
		}
	}
	public function view(){
	
        

		
		
        
            
		
	}
	public function update(){
		$data = $_POST;
		        $data['loaisp']=$this->mhome->get_theloai();

		foreach ($data as $item) {
			$this->cart->update($item);
		}
		$data['title'] =" View Cart";
		$data['temp'] ="cart/view_cart"; 
		$data['info2'] = $this->cart->contents();
		$this->my_layout->view("view_cart",$data);
	}
	public function del(){
		$id = $this->uri->segment(3);
		$data = $this->cart->contents();
		foreach ($data as $val) {
			if ($val['id'] == $id) {
				$data_remove = array(
					"rowid" =>$val['rowid'],
					"qty"=>0
				);
				$this->cart->update($data_remove);
			}
		}
		redirect(base_url()."cart/view");
	}
	
	public function thanhtoangiohang(){
		redirect(base_url()."ctrangchu/thanhtoan");
	}
	function show() {
		
		$cart = $this->cart->contents();
		
		echo "<pre>";
		print_r($cart);
	}

}
?>