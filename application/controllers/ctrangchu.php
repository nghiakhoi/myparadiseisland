<?php
class Ctrangchu extends CI_Controller{

        
	var $_register = "register"; // ten cua session register khi dang ki thanh vien
    var $_fgpassword = "fgpassword";
    public function __construct(){
        parent::__construct();
		$this->load->helper(array("url","date","my_data","cookie"));
		$this->load->library('user_agent');
        $this->load->library(array("form_validation","my_layout","session","email","my_auth","cart"));
        $this->my_layout->setLayout("vtrangchu");
     
        $this->load->database();
        $this->load->model("Mtrangchu");
		$this->load->model("muser");
		//$this->load->model("mhome");
		
    }
    public function index(){
       
		
        $userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		
		$data['danhmuccha'] = $this->muser->showdanhmuccha();
		$data['danhmucchaduoi'] = $this->muser->showdanhmucchaduoi();
		//$param              = $this->uri->segment(3);  
		$data['banner'] = $this->muser->showbanner();
        $data['hienthi']=1;
		//$data['songuoimua']=$this->muser->getsonguoimua();
		
		$data['title']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		$data['des']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		
		$min = 100;
		$max = $this->muser->getsanphamnumrows();
		$data['num_rows'] = $max;
		if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."trang-chu.html/";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 1; 
            $config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<strong style="margin-left:4px;" class="pagination-selected-page">';
			$config['cur_tag_close'] = '</strong>';
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
			$data['sanpham'] = $this->Mtrangchu->listall();
			$data['sanphamnewlimit'] = $this->Mtrangchu->listallsanphamnewwithlimit(24);
			$data['sanphamhotlimit'] = $this->Mtrangchu->listallsanphamhotwithlimit(24);
			
			$data['showbanner']=1;
			$data['showpromo']=1;
            
            $this->my_layout->view("vsp",$data);
        
        }else{
			
            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
        
		

    }
	
	public function loi(){
			$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		$this->Mtrangchu->listall();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=1;
		
		$data['title']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		$data['des']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
			//$data['tendanhmuc']=$this->Mtrangchu->layiddmcha($iddm);
            $data['report'] = '<div style="margin-left:30px;font-size:30px">Chưa có sản phẩm nào</div>';
            $this->my_layout->view("reportloi",$data);
	}
	
	
	public function newest(){
        
		if ($this->agent->is_mobile())
		{
			
			redirect(base_url()."ctrangchumobile", 'refresh');
		}
		else
		{
		
        $userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		$this->Mtrangchu->listallnew();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=1;
		
		$data['title']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		$data['des']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		
		$min = 100;
		$max = $this->muser->getsanphamnewnumrows();
		$data['num_rows'] = $max;
		if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."/moi-nhat.html/";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 1; 
            $config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<strong style="margin-left:4px;" class="pagination-selected-page">';
			$config['cur_tag_close'] = '</strong>';
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['sanpham'] = $this->Mtrangchu->listallnew($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vsp",$data);
        
        }else{
			
            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
        
	}	

    }
	
	public function hot(){
        
		if ($this->agent->is_mobile())
		{
			
			redirect(base_url()."ctrangchumobile", 'refresh');
		}
		else
		{
		
        $userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		//$this->Mtrangchu->listallhot();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=1;
		
		$data['title']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		$data['des']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		
		$min = 100;
		$max = $this->muser->getsanphamhotnumrows();
		$data['num_rows'] = $max;
		if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."/hot-nhat.html/";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 1; 
            $config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<strong style="margin-left:4px;" class="pagination-selected-page">';
			$config['cur_tag_close'] = '</strong>';
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['sanpham'] = $this->Mtrangchu->listallhot($min,$this->uri->segment($config['uri_segment']));
            //print_r($data['menucha']);
            $this->my_layout->view("vsp",$data);
        
        }else{
			
            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
        
	}	

    }
	
	public function banchaynhat(){
        
		if ($this->agent->is_mobile())
		{
			
			redirect(base_url()."ctrangchumobile", 'refresh');
		}
		else
		{
		
        $userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		$this->Mtrangchu->listallbanchay();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=1;
		
		$data['title']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		$data['des']="Thời Trang Đoàn Duyên - Mua sắm thời trang online đẹp giá rẻ ";
		
		$min = 100;
		$max = $this->muser->getsanphambanchaynhatnumrows();
		$data['num_rows'] = $max;
		if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."/ban-chay-nhat.html/";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 1; 
            $config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<strong style="margin-left:4px;" class="pagination-selected-page">';
			$config['cur_tag_close'] = '</strong>';
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['sanpham'] = $this->Mtrangchu->listallbanchay($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vsp",$data);
        
        }else{
			
            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
        
	}	

    }
	
	
	
	public function loaisptheocha($a=""){
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
        
		//$iddm1=explode("-",$this->uri->segment(2));
		$iddm=$a;
		
        //$this->Mtrangchu->listsptheocha($a);
		$data['danhmuccha'] = $this->muser->showdanhmuccha();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=3;
		$data['tendanhmuc']=$this->Mtrangchu->layiddmcha($iddm);
		$data['tendanhmuc1']=$this->Mtrangchu->layiddmcha1($iddm);
		$data['title']=$data['tendanhmuc']['tendanhmuc'];
		$data['des']="Thời Trang Đoàn Duyên - ".$data['title']." Mua sắm thời trang online đẹp giá rẻ ";

		
		function utf8convert($str) { //chuyển chuỗi thành ko dấu
	if(!$str) return false;
	$utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
	foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}




    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    $danhmuc2= array();
        // Nếu là chuyên mục con thì hiển thị
        if ($iddm!=0)
        {
			$tendanhmuc=$this->Mtrangchu->layiddmcha($iddm);
            $cate_child[0]['id'] = $tendanhmuc['id'];
			unset($tendanhmuc);
            $tendanhmuc=$this->Mtrangchu->layiddmcha1($cate_child[0]['id']);
			//print_r($tendanhmuc);
			$dem=1;
			foreach($tendanhmuc as $item){
				
				$tendanhmuc=$this->Mtrangchu->layiddmcha($item['id']);
				$cate_child[$dem]['id'] = $item['id'];
				$tendanhmuc1=$this->Mtrangchu->layiddmcha1($cate_child[$dem]['id']);
				$danhmuc2[] = $tendanhmuc1;
				//echo count($tendanhmuc1);
				//print_r($tendanhmuc1);
				$cate_child[$dem]['id'] = $item['id'];
				$dem++;
			}
			$dem=count($cate_child);
			$dem1=$dem;
			$mangphu = $cate_child;
			
			foreach($danhmuc2 as $item1){
				foreach($item1 as $item2){
					$tendanhmuc2=$this->Mtrangchu->layiddmcha1($item2['id']);
					//echo $tendanhmuc2['id'];
					$cate_child[$dem]['id'] = $item2['id'];
					$dem++;
					
			}}
			//print_r($tendanhmuc);
			
			//$cate_child[0] = $data['tendanhmuc']['id'];
			//showCategories1($categories,$cate_child['id']);
        }
		if($cate_child){
			
			$mangtam = array();
			$demsanpham=0;
			foreach($cate_child as $item){
				$data['sanpham']=$this->Mtrangchu->listsptheocha($item['id']);
				$mangtam[$demsanpham] = $data['sanpham'];
				
				//array_merge($mangtam,$data['sanpham']);
				$demsanpham++;
			}
			
			$mangchinhthuc = array();
			foreach($mangtam as $item){
				foreach($item as $item1){
					$mangchinhthuc[]= $item1;
				}
			}
			
			
		}
    
		function Compare($ar1, $ar2)
{
   if ($ar1['stt']<$ar2['stt'])
      return 1;
   else if ($ar1['stt']>$ar2['stt'])
      return -1;
   
   return 0;
}



		uasort($mangchinhthuc, 'Compare');	

		
		$data['key']=$data['title'].", ".utf8convert($data['title']);
        $min = 60;
		$max = count($mangchinhthuc);
		$data['num_rows'] = $max;
		if($max!=0){
			
		
            
            $this->load->library('pagination');
			$per_page = $min;
		$page = $this->uri->segment(5);
        $offset = ($page - 1) * $per_page;
			$data['result'] = array_slice($mangchinhthuc,$offset,$min,true); 
            $config['base_url'] = base_url()."ctrangchu/loaisptheocha/".$iddm."/index";
            $config['total_rows'] = count($mangchinhthuc);
            $config['per_page'] = $min;
            $config['num_link'] = 5;
			$config['use_page_numbers'] = TRUE;			
            $config['uri_segment'] = 5;
			$config['cur_tag_open'] = '<li class="active"><a class="a_phantrang phantrang_active active" alt="Trang hiện tại(1)" title="Trang hiện tại(1)">
										<span class="phantrang_content">';
			$config['cur_tag_close'] = '</span></a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['next_link'] = false;
			$config['prev_link'] = false;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
			$data['sanpham']=$data['result'];
            
            
            $this->my_layout->view("vloaisp",$data);
        
        }else{
			redirect(base_url());
        }
			

    }
	
	public function loaisptheocon($b=""){
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
        
		//$iddm1=explode("-",$this->uri->segment(2));
		$iddm=$b;
        
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		$data['hienthi']=3;
		$data['tendanhmuc']=$this->Mtrangchu->layiddmcon($iddm);
		$data['title']=$data['tendanhmuc']['tendmcon'];
		$data['des']="Thời Trang Đoàn Duyên - ".$data['title']." Mua sắm thời trang online đẹp giá rẻ ";
		
		function utf8convert($str) { //chuyển chuỗi thành ko dấu
	if(!$str) return false;
	$utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
	foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}
		
		$data['key']=$data['title'].", ".utf8convert($data['title']);
		
		$min = 100;
		$max = $this->muser->getsanphamtheoconnumrows($iddm);
		$data['num_rows'] = $max;
		if($max!=0){
			
			if ($this->agent->is_mobile())
		{
			
			redirect(base_url()."danh-muc-mobile/".$data['tendanhmuc']['slug']."-".$data['tendanhmuc']['iddmcon'].".html", 'refresh');
		}
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."ctrangchu/loaisptheocon/".$iddm."/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 1; 
            $config['uri_segment'] = 5;
			$config['cur_tag_open'] = '<strong style="margin-left:4px;" class="pagination-selected-page">';
			$config['cur_tag_close'] = '</strong>';
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
			$data['sanpham']=$this->Mtrangchu->listsptheocon($iddm,$min,$this->uri->segment($config['uri_segment']));
			
            
            
            $this->my_layout->view("vloaispcon",$data);
        
        }else{
			redirect(base_url());
        }
			

    }
	
	public function loaisptheosubcon($b=""){
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
        
		//$iddm1=explode("-",$this->uri->segment(2));
		$iddm=$b;
        
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		$data['hienthi']=3;
		$data['tendanhmuc']=$this->Mtrangchu->layiddmsubcon($iddm);
		$data['title']=$data['tendanhmuc']['tendmsubcon'];
		$data['des']="Thời Trang Đoàn Duyên - ".$data['title']." Mua sắm thời trang online đẹp giá rẻ ";
		
		function utf8convert($str) { //chuyển chuỗi thành ko dấu
	if(!$str) return false;
	$utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
	foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}
		
		$data['key']=$data['title'].", ".utf8convert($data['title']);
		
		$min = 100;
		$max = $this->muser->getsanphamtheosubconnumrows($iddm);
		$data['num_rows'] = $max;
		if($max!=0){
            
			if ($this->agent->is_mobile())
		{
			
			redirect(base_url()."danh-muc-mobile/".$data['tendanhmuc']['slug']."-".$data['tendanhmuc']['iddmsubcon'].".html", 'refresh');
		}
			
            $this->load->library('pagination');
            $config['base_url'] = base_url()."ctrangchu/loaisptheosubcon/".$iddm."/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 1; 
            $config['uri_segment'] = 5;
			$config['cur_tag_open'] = '<strong style="margin-left:4px;" class="pagination-selected-page">';
			$config['cur_tag_close'] = '</strong>';
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
			$data['sanpham']=$this->Mtrangchu->listsptheosubcon($iddm,$min,$this->uri->segment($config['uri_segment']));
			
            
            
            $this->my_layout->view("vloaispsubcon",$data);
        
        }else{
			redirect(base_url());
        }
			

    }
	
	
	public function chitiet($c=""){
        
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
		
        $sp=$c;
        $data['sanpham']=$this->Mtrangchu->listall();
		$data['danhmuccha'] = $this->muser->showdanhmuccha();

		
		$data['chitietsp']=$this->Mtrangchu->getInfochitietsp($sp);
		$data['tendanhmuc']=$this->Mtrangchu->layiddmcha($data['chitietsp']['parent_id']);
		$data['splienquan']=$this->Mtrangchu->getInfosplienquan($data['chitietsp']['parent_id'],$data['chitietsp']['stt']);
		$max = count($data['chitietsp']);
		if($max==0){
			//$data['tendanhmuc']=$this->Mtrangchu->layidthuonghieu($iddm);
            redirect(base_url());
            
            
        
        }
		else{
		$data['splienquan']=$this->Mtrangchu->getInfosplienquan($data['chitietsp']['parent_id'],$data['chitietsp']['stt']);
		$data['title']=$data['chitietsp']['tensp'];
		$data['des']=$data['chitietsp']['des'];
		$data['key']=$data['chitietsp']['tukhoa'];
		$data['hienthi']=2;
		
		
        
            //$userid = $this->my_auth->userid;
            //$data['info'] = $this->muser->getInfo($userid);
            //$data['about']=$this->mhome->get_about();
            //$this->load->view("frontend/user/home_view",$data);
			//print_r($data['chitietsp']);
			$this->my_layout->view("vchitiet",$data);
		}
			
    }
	
	public function danhmuccha(){
        
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
        $sp=$this->uri->segment(3);
        $data['sanpham']=$this->Mtrangchu->listall();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		$data['chitietsp']=$this->Mtrangchu->getInfochitietsp($sp);
		$data['danhmuccha']=$this->Mtrangchu->getInfochitietsp($sp);
		
		
		
        
            //$userid = $this->my_auth->userid;
            //$data['info'] = $this->muser->getInfo($userid);
            //$data['about']=$this->mhome->get_about();
            //$this->load->view("frontend/user/home_view",$data);
			//print_r($data['chitietsp']);
			$this->my_layout->view("vchitiet",$data);
			
    }
	
	public function tintuc(){
        
		
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		
		$param              = $this->uri->segment(3);   
        
            $userid = $this->my_auth->userid;
            $data['info'] = $this->muser->getInfo($userid);
            
			$this->load->library('pagination');
                         $config['base_url']         = base_url().'ctrangchu/tintuc';            
                         $config['total_rows']       = $this->mhome->get_total_rows_tintuc();
                         //$config['use_page_numbers'] = TRUE;//hiển thị số trang đúng
                         $config['per_page']         = 3;  
                         $config['uri_segment']      = 3;                              
                         $this->pagination->initialize($config);                         
                         $data['tintuc']          = $this->mhome->get_tintuc($config['per_page'],$param); 
			
			$this->my_layout->view("news",$data);
			
    }

	
	public function new_detail(){
        
		
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		
		$param              = $this->uri->segment(3);   
        
            $userid = $this->my_auth->userid;
            $data['info'] = $this->muser->getInfo($userid);
            
			$this->load->library('pagination');
                         $config['base_url']         = base_url().'ctrangchu/tintuc';            
                         $config['total_rows']       = $this->mhome->get_total_rows_tintuc();
                         //$config['use_page_numbers'] = TRUE;//hiển thị số trang đúng
                         $config['per_page']         = 3;  
                         $config['uri_segment']      = 3;                              
                         $this->pagination->initialize($config);                         
                         $data['tintuc']          = $this->mhome->get_newdetail($param); 
			
			$this->my_layout->view("new_detail",$data);
			
    }
	
	public function dichvu(){
        
		
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		
		
			
			$this->my_layout->view("services",$data);
			
    }
	
	public function duandalam(){
        
		
        
$data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		
		
			
			$this->my_layout->view("duan",$data);
			
    }
	
	public function lienhe(){
        
		
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		
		
			
			$this->my_layout->view("contact",$data);
			
    }
	
	public function loaisanpham(){
        
		$param              = $this->uri->segment(3);   
        
        $data['loaisp']=$this->mhome->get_theloai();
		
		$data['content_cat']   = $this->mhome->content_theloai($param);
		
			
			$this->my_layout->view("categories",$data);
			
    }
	
	public function dkthanhcong(){
        
		
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		$data['title']="Đăng ký thành viên thành công";
		

		
		
			
			$this->my_layout->view("dkthanhcong",$data);
			
    }
	
	public function thanhtoan(){
        
		if($this->input->post()){
            $post_data = $this->input->post('data');
            $this->load->model('mcustomer');
            $insert_id = $this->mcustomer->add_customer($post_data);
            
            $tong_tien = 0;
            foreach($this->cart->contents() as $item){
                $tong_tien += $item['subtotal'];
            }
            
            $this->load->model('mcart');
            $cart_data = array(
                'id_khach_hang' => $insert_id,
                'tong_tien' => $tong_tien
            );
            
            $insert_id = $this->mcart->add_cart($cart_data);
            echo $insert_id;
            
            
            // Lưu đơn hàng
            $cart_data = array();
            $i = 0;
            
            foreach($this->cart->contents() as $item){
                $cart_data[$i]['id_cart'] = $insert_id;
                $cart_data[$i]['id_hang'] = $item['id'];
                $cart_data[$i]['so_luong'] = $item['qty'];
                $cart_data[$i]['don_gia'] = $item['price'];
                $cart_data[$i]['thanh_tien'] = $item['subtotal'];
                $i++;
            }
            
            if($this->mcart->add_cart_detail($cart_data))
                $data['message'] = 'Thanh toán thành công';
            
        }
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();

		$this->my_layout->view("thanhtoan",$data);
    }
	
	public function chitietsp(){
        
		$param              = $this->uri->segment(3);  
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		$data['chitietsp']=$this->mhome->getchitietsp($param);
		
		
			
			$this->my_layout->view("single_product",$data);
			
    }
	
	function register()
    {
	$data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
	
        //--- Neu Login thi khong duoc dang ki
        if($this->my_auth->is_Login()){
            redirect(base_url()."ctrangchu");
            exit();
        }
        
        $this->form_validation->set_rules("full_name","Full name","required|min_length[6]");
        $this->form_validation->set_rules("username","Username","required|max_length[25]|callback_checkUser");
        $this->form_validation->set_rules("password","Password","required|matches[repassword]");
        $this->form_validation->set_rules("email","Email","required|valid_email|callback_checkEmail");
        $this->form_validation->set_rules("address","Address","required");
        $this->form_validation->set_rules("phone","Phone number","required|callback_validPhone");
        $this->form_validation->set_rules("gender","Gender","required");
        
        if($this->form_validation->run()==FALSE){
            $data['error']="";
            $this->my_layout->view("frontend/user/register",$data);
			
        }
        else
        {
                $salt = create_random_string(5);
                $add = array(
                        "full_name" => $this->input->post("full_name"),
                        "username"  => $this->input->post("username"),
                        "salt"      => $salt,
                        "password"  => md5($this->input->post("password")),
                        "email"     => $this->input->post("email"),
                        "address"   => $this->input->post("address"),
                        "phone"     => $this->input->post("phone"),
                        "level"     => 2, // mac dinh la memmber khi dang ki thanh vien
                        "gender"    => $_POST['gender'],
                        "add_date"  => date("Y-m-d H:i:s"),
                        "active"    => 0, // chua kich hoat
                );

                //--- Xử lý ảnh : phần này không bắt buộc
                $img = "";
                $flag = TRUE;
                if($_FILES['image']['name'] != NULL){
                    $config['upload_path']   = 'public/images/avata/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '5000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '2000';
                    $config['encrypt_name']  = true; // ma hoa ten file
                    $config['remove_spaces'] = true; // xoa khoang trang
                    $this->load->library('upload', $config);

                    if(!$this->upload->do_upload("image"))
                    {
                        $data['error'] = $this->upload->display_errors();
                        $this->my_layout->view("frontend/user/register",$data);
                        $flag = FALSE;
                    }
                    else
                    {
                        $img = $this->upload->data();
                        $add['image'] = $img['file_name'];
                    }
                }

                if($flag==TRUE){
                    //--- Gui mail kich hoat neu add thanh cong
                    $message = "";
                    if($this->muser->addUser($add)){

                        $userid = mysql_insert_id();
                        $link_active = base_url()."home/user/active/?userid=".$userid."&key=".md5($salt);
                        $message  = "Please follow this link to active your acount <br/>".
                        $message .= "Link : <a href=".$link_active.">".$link_active."</a><br/>";
                        $message .= "username : ".$add['username']."<br/>";
                        $message .= "password : ".$this->input->post("password");

                        $mail = array(
                                "to_receiver"   => $add['email'],
                                "message"       => $message,
                            );

                        $this->load->library("my_email");
                        $this->my_email->config($mail);
                        $this->my_email->sendmail();

                        $this->session->set_userdata(array($this->_register => TRUE));
                        redirect(base_url()."ctrangchu/dkthanhcong");
                    }
                }
        }
        
    }
	
	public function thanhcong()
	{
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			$data['title']="Đặt hàng thành công";
		$this->Mtrangchu->listall();
		$data['danhmuccha'] = $this->muser->showdanhmuccha();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=2;
		
            $this->my_layout->view("vthankyou",$data);
        
	}
	
	public function thongtinkhachhang()
	{
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			$data['title']="Thông tin khách hàng";
			if(count($data['info'])!=0)
			{
			
			
		$this->Mtrangchu->listall();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=2;
		
            $this->my_layout->view("vthongtinkhachhang",$data);
			}
			else
			{
				redirect(base_url()."ctrangchu");
			}
        
	}
	
	public function xlthongtinkhachhang()
	{
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			if(isset($_POST['luu']))
			{
				if($_POST['password']!="")
				{
				//$username = $_POST['tendangnhap'],
				$diachi=$_POST['diachi0']."|".$_POST['diachi1']."|".$_POST['diachi2']."|".$_POST['diachi3']."|".$_POST['diachi4'];
			$thongtin=array(
				"hoten" => $_POST['hoten'],
				
				"password" => md5($_POST['password']),
				"email" => $_POST['email'],
				"gioitinh" => $_POST['gioitinh'],
				"diachi" => $diachi,
				"phone" => $_POST['dienthoai'],
				"ngaysinh" => $_POST['ngaysinh'],
			);
			}
			else 
			{
				//$username = $_POST['tendangnhap'],
				$diachi=$_POST['diachi0']."|".$_POST['diachi1']."|".$_POST['diachi2']."|".$_POST['diachi3']."|".$_POST['diachi4'];
			$thongtin=array(
				"hoten" => $_POST['hoten'],
				
				//"password" => md5($_POST['password']),
				"email" => $_POST['email'],
				"gioitinh" => $_POST['gioitinh'],
				"diachi" => $diachi,
				"phone" => $_POST['dienthoai'],
				"ngaysinh" => $_POST['ngaysinh'],
				);
			}
			
			$this->muser->updateUser1($thongtin,$userid);
			redirect(base_url()."ctrangchu/thongtinkhachhang");
			}
			redirect(base_url()."ctrangchu/thongtinkhachhang");
        
	}
	
	public function dangky()
	{
		
		$userid = $this->my_auth->idkhach;
            $data['info'] = $this->muser->getInfokhach($userid);
			
			$data['title'] = "Đăng ký thành viên";
			
			if(count($data['info'])==0)
			{
		$this->Mtrangchu->listall();
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		$data['menusubcon']=$this->Mtrangchu->menusubcon();
		//$param              = $this->uri->segment(3);  
        $data['hienthi']=2;
		
            $this->my_layout->view("vdangky",$data);
			}
			else
			{
				redirect(base_url()."ctrangchu");
			}
        
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."ctrangchu");
	}
	
	
	
	
	
	
	
	
	
}