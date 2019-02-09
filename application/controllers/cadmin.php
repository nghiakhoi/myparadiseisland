﻿<?php
class Cadmin extends CI_Controller{

	var $_register = "register"; // ten cua session register khi dang ki thanh vien
    var $_fgpassword = "fgpassword";
    public function __construct(){
        parent::__construct();
		$this->load->helper(array("url","date","my_data"));
        $this->load->library(array("form_validation","my_layout","session","my_auth","email"));
        $this->my_layout->setLayout("vadmin");
		$this->load->model("muser");
        $this->load->database();
		 if(!$this->my_auth->is_Adminquanly()){
            redirect(base_url()."verify/loginadmin");
            exit();
        }

        $this->load->model("Mtrangchu");
		//$this->load->library('excel');
		
		
    }
    public function index(){
		
		//$data['tintuc']=$this->Mtrangchu->listtintuc();
        
		
		if(!$this->my_auth->is_Login())
        {
            redirect(base_url()."verify/logintbm");
            exit();
        }
        else
        {
            $userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
            
            $this->my_layout->view("vindexdn",$data);
        }
		
        
           
    }
	
	

	
	function themdanhmuccha()
    {
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
         $data['danhmuccha'] = $this->muser->showdanhmuccha(); 
		//$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
           
        $this->form_validation->set_rules("tendanhmuccha","Tên danh mục","required");
		//$this->form_validation->set_rules("vitri","Vị trí hiển thị","required");
		
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
        
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("vthemdanhmuccha",$data);
        }
        else
        {
                $salt = create_random_string(5);
				$str=utf8tourl(utf8convert($this->input->post("tendanhmuccha")));
                $add = array(
                        "tendanhmuc" => $this->input->post("tendanhmuccha"),
						"parent_id" => $this->input->post("danhmuccha"),
						
						"slug" => $str,
						"order"  => $this->input->post("vitri"),
						"tukhoa"  => $this->input->post("keyword"),
						"des"  => $this->input->post("des"),
						"anhien"  => $this->input->post("anhien"),
						"anhienthem"  => $this->input->post("anhienthem"),
                        
                );
                
                

                if($this->muser->adddanhmuccha($add)){
                    
                    
                 
                    
                    redirect(base_url()."cadmin/showdanhmuc"); 
                }
                
                $this->my_layout->view("vthemdanhmuccha",$data);
        }

    }
	
	function showdanhmuc()
	{
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
			
			
			if(isset($_POST['tim']))
		{
		//$iddm1=explode("-",$this->uri->segment(2));
		$iddm=$_POST['timkiem'];
        $this->Mtrangchu->listsptheosearch($iddm);
        $min = 100;
		$max = $this->muser->getsanphamtheosearchnumrows($iddm);
		
		$data['num_rows'] = $max;
		
		//--- Paging
        if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."cadmin/showsanpham/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->Mtrangchu->listsptheosearch($iddm);
            
            $this->my_layout->view("vshowdanhmuc",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
		
		}
		else
		{	
		
		//$this->muser->getallsanphamnum();
        $max = $this->muser->getalldanhmucnum();
        $min = 100;
        $data['num_rows'] = $max;
	
        //--- Paging
        if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."cadmin/showdanhmuc/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->muser->getalldanhmuc($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vshowdanhmuc",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
		}
	}
	
	function themdanhmuccon()
    {
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
         $data['danhmuccon'] = $this->muser->showdanhmuccon(); 
		$data['danhmuccha'] = $this->muser->showdanhmuccha(); 
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
           
        $this->form_validation->set_rules("tendanhmuccon","Tên danh mục","required");
		//$this->form_validation->set_rules("vitri","Vị trí hiển thị","required");
		
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
        
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("vthemdanhmuccon",$data);
        }
        else
        {
                $salt = create_random_string(5);
				$str=utf8tourl(utf8convert($this->input->post("tendanhmuccon")));
                $add = array(
                        "tendmcon" => $this->input->post("tendanhmuccon"),
						"slug" => $str,
						
						
                        "iddmcha"  => $_POST['danhmuccha'],
                );
                
                

                if($this->muser->adddanhmuccon($add)){
                    
                    
                 
                    
                    redirect(base_url()."cadmin/themdanhmuccon"); 
                }
                
                $this->my_layout->view("vthemdanhmuccon",$data);
        }

    }
	
	
	
	function themdanhmucsubcon()
    {
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
         $data['danhmuccon'] = $this->muser->showdanhmuccon(); 
		 $data['danhmucsubcon'] = $this->muser->showdanhmucsubcon(); 
		$data['danhmuccha'] = $this->muser->showdanhmuccha(); 
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
           
        $this->form_validation->set_rules("tendanhmucsubcon","Tên loại sản phẩm","required");
		//$this->form_validation->set_rules("vitri","Vị trí hiển thị","required");
		
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
        
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("vthemdanhmucsubcon",$data);
        }
        else
        {
                $salt = create_random_string(5);
				$str=utf8tourl(utf8convert($this->input->post("tendanhmucsubcon")));
                $add = array(
                        "tendmsubcon" => $this->input->post("tendanhmucsubcon"),
						"slug" => $str,
						
						
                        "iddmcon"  => $_POST['danhmuccon'],
                );
                
                

                if($this->muser->adddanhmucsubcon($add)){
                    
                    
                 
                    
                    redirect(base_url()."cadmin/themdanhmucsubcon"); 
                }
                
                $this->my_layout->view("vthemdanhmucsubcon",$data);
        }

    }
	
	function thembanner()
    {
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
         //$data['chuyenmuc'] = $this->muser->showban(); 
			//$data['loaisp'] = $this->muser->showloaisp();
			//$data['thuonghieu'] = $this->muser->showthuonghieu();
      
         $this->form_validation->set_rules("link","Link","required");
		//$this->form_validation->set_rules("vitri","Vị trí","required");
        
        
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("vthembanner",$data);
        }
        else
        {
                
				
				$file1=$this->muser->do_upload1();
         
		 
				
				
				
		
		
		
		$tenfile=$file1;
		
                $add = array(
                        
						
						
						"hinhanh"  => $tenfile,
						"tuychon" => $this->input->post("tuychon"),
						
						"thutu" => $this->input->post("thutu"),
						"link" => $this->input->post("link"),
						"anhien" => $this->input->post("anhien"),
                );
                
              

                if($this->muser->addban($add)){
                    
                    
                 
                    
                    redirect(base_url()."cadmin/showbanner"); 
                }
				
                
                $this->my_layout->view("vthembanner",$data);
        }

    }
	
	function themsanpham()
    {
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
         $data['danhmuccha'] = $this->muser->showdanhmuccha(); 


        $this->form_validation->set_rules("idsp","Mã sản phẩm","required");   
        $this->form_validation->set_rules("tensp","Tên sản phẩm","required");
        $hinhphu="";
		//$this->form_validation->set_rules("sosinhvien","Số sinh viên","required");
        
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -]/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("vthemsanpham",$data);
        }
        else
        {
                
				
				$file1=$this->muser->do_upload1();
         //Khai bao bien cau hinh upload
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = './uploads/';
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif';
         
         
         //bien chua cac ten file upload
        $name_array = array();
         
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['imglist'];
		$data['hinhanh']=$file;
		
        $count = count($file['name']);//lấy tổng số file được upload
		
        for($i=0; $i<=$count-1; $i++) {
              
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
			  $hinhphu.=$file['name'][$i]."|";
              //load thư viện upload và cấu hình
              $this->load->library('upload', $config);
              //thực hiện upload từng file
			  
              if($this->upload->do_upload())
              {
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data['hinh'] = $this->upload->data();
                  //in cấu trúc dữ liệu của các file
                 
              }     
         }
		 
		 
		 
		 
				
				
				
		
		
		$ngaythang= date('d/m/Y');
		$tenfile=$file1;
		$str=utf8tourl(utf8convert($this->input->post("tensp")));
                $add = array(
                        
						"idsp" => $this->input->post("idsp"),
                        "tensp" => $this->input->post("tensp"),
						"slug" => $str,
						
						"tukhoa" => $this->input->post("tukhoa"),
						
						
						"giagiam" => $this->input->post("giagiam"),
						"motangan" => $this->input->post("des"),
						"des" => $this->input->post("des"),
						"motachitiet" => $this->input->post("motachitiet"),
						
						"hinhanhchinh"  => $tenfile,
						"hinhanhphu"  => $hinhphu,
						"parent_id" => $this->input->post("danhmuccha"),
						"size"  => $_POST['size'],
						
						"thutu" => $this->input->post("thutu"),
						"anhien"  => $_POST['anhien'],
                        
                );
                
              

                if($this->muser->addsanpham($add)){
                    
                    
                 
                    
                    redirect(base_url()."cadmin/showsanpham"); 
                }
                
                $this->my_layout->view("vthemsanpham",$data);
        }

    }
	
	function suasanpham(){
	$userid = $this->my_auth->userid;
	$tin = $this->uri->segment(3);
            $data['infoa'] = $this->muser->getInfo($userid);
          $data['danhmuccha'] = $this->muser->showdanhmuccha(); 
		 $data['info'] = $this->muser->getInfosanpham($tin);
		 $hinhcu=$data['info']['hinhanhchinh'];
		$hinhphucu=$data['info']['hinhanhphu'];
		$hinhphucuunlink=explode("|", $data['info']['hinhanhphu']); 		
		
	
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -]/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
	
	
	
        
		
        if(is_numeric($userid) && $data['info']!=NULL)
        {
            
            if(isset($_POST['ok']))
            {
                
		
		//$ngaythang= date('d/m/Y');
		if(isset($_FILES['img'])){
				if($_FILES['img']['name']!="")
			{
				unlink('uploads/'.$hinhcu);
			}
				$file=$this->muser->do_upload1();
			$tenfile=$file;
			//echo "ok";
		}
		else 
		{
		//$this->Mtrangchu->do_upload();
				$tenfile=$hinhcu;
		//echo "loi";
				
		}

         if($tenfile=="")
				{
					$tenfile=$hinhcu;
				}    


		if(isset($_FILES['imglist']) && count($_FILES['imglist']['error']) == 1 && $_FILES['imglist']['error'][0] > 0){
			
			//$this->Mtrangchu->do_upload();
				$hinhphu=$hinhphucu;
		//echo "loi";
				
				   
         }
		 else if(isset($_FILES['imglist']))
		{
			if($_FILES['imglist']['name']!="")
			{
				for($i=0;$i<count($hinhphucuunlink);$i++)
				{
					unlink('uploads/'.$hinhphucuunlink[$i]);
				}
			}
			
	
		
		
         //Khai bao bien cau hinh upload
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = './uploads/';
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif';
         
         
         //bien chua cac ten file upload
        $name_array = array();
         
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['imglist'];
		$data['hinhanh']=$file;
		
        $count = count($file['name']);//lấy tổng số file được upload
		
	
		
		
        for($i=0; $i<=$count-1; $i++) {
              
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
			  $hinhphu.=$file['name'][$i]."|";
              //load thư viện upload và cấu hình
              $this->load->library('upload', $config);
              //thực hiện upload từng file
			  
              if($this->upload->do_upload())
              {
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data['hinh'] = $this->upload->data();
                  //in cấu trúc dữ liệu của các file
                 
              } } 
				
		}
		
		
		
		

			if($hinhphu=="|")
				{
					$hinhphu=$hinhphucu;
				}  
			
			
			

				$ngaythang= date('d/m/Y');
                    $str=utf8tourl(utf8convert($this->input->post("tensp")));
                      $update = array(
                                    
						"idsp" => $this->input->post("idsp"),
                        "tensp" => $this->input->post("tensp"),
						"slug" => $str,
						
						"tukhoa" => $this->input->post("tukhoa"),
						
						
						"giagiam" => $this->input->post("giagiam"),
						"motangan" => $this->input->post("des"),
						"des" => $this->input->post("des"),
						"motachitiet" => $this->input->post("motachitiet"),
						
						
						"hinhanhchinh"  => $tenfile,
						"hinhanhphu"  => $hinhphu,
						"parent_id" => $this->input->post("danhmuccha"),
						"size"  => $_POST['size'],
						
						
						
						"thutu" => $this->input->post("thutu"),
						"anhien"  => $_POST['anhien'],
						
						
						
                                 );
                      
                      
                      $this->muser->updatesanpham($update,$tin);
                      redirect(base_url()."cadmin/showsanpham"); 
                
            }
            else
            {
                $this->my_layout->view("vsuasanpham",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function suabanner(){
	$userid = $this->my_auth->userid;
	$tin = $this->uri->segment(3);
            $data['infoa'] = $this->muser->getInfo($userid);
          //$data['danhmuccha'] = $this->muser->showdanhmuccha(); 
		 $data['info'] = $this->muser->getInfobanner($tin);
		 $hinhcu=$data['info']['hinhanh'];
		
	
	
	
        
		
        if(is_numeric($userid) && $data['info']!=NULL)
        {
            
            if(isset($_POST['ok']))
            {
                
		
		//$ngaythang= date('d/m/Y');
		if(isset($_FILES['img'])){
				if($_FILES['img']['name']!="")
			{
				unlink('uploads/'.$hinhcu);
			}
				$file=$this->muser->do_upload1();
			$tenfile=$file;
			//echo "ok";
		}
		else 
		{
		//$this->Mtrangchu->do_upload();
				$tenfile=$hinhcu;
		//echo "loi";
				
		}

         if($tenfile=="")
				{
					$tenfile=$hinhcu;
				}    

			
			
			

				$ngaythang= date('d/m/Y');
                    
                      $update = array(
                                    
						"hinhanh"  => $tenfile,
						"tuychon" => $this->input->post("tuychon"),
						
						"thutu" => $this->input->post("thutu"),
						"link" => $this->input->post("link"),
						"anhien" => $this->input->post("anhien"),
						
						
						
                                 );
                      
                      
                      $this->muser->updatebanner($update,$tin);
                      redirect(base_url()."cadmin/showbanner"); 
                
            }
            else
            {
                $this->my_layout->view("vsuabanner",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function showsanpham()
	{
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
		
		$this->muser->getallsanphamnum();
        $max = $this->muser->getallsanphamnum();
        $min = 10;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."cadmin/showsanpham/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = false;
			$config['prev_link'] = false;
			$config['last_link'] = false;
			$config['first_link'] = false;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->muser->getallsanpham($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vshowsanpham",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
	}
	
	function showbanner()
	{
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
		
		//$this->muser->getallsanphamnum();
        $max = $this->muser->getallbannernum();
        $min = 100;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."cadmin/showbanner/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = false;
			$config['prev_link'] = false;
			$config['last_link'] = false;
			$config['first_link'] = false;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->muser->getallbanner($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vshowbanner",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
	}
	
	function showdonhang()
	{
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
		$data['info1'] = $this->muser->getallsanpham1();
		//$this->muser->getalldonhangnum();
        $max = $this->muser->getalldonhangnum();
        $min = 1000;
        $data['num_rows'] = $max;
        //--- Paging
		if(isset($_GET['loc']) && $_GET['loc']!="")
		{
        if($max!=0){
            
            
            
            $data['users'] = $this->muser->getalldonhang1($_GET['loc']);
            
            $this->my_layout->view("vshowdonhang",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
		}
		else
		{
			if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."cadmin/showdonhang/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->muser->getalldonhang($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vshowdonhang",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
		}
	}
	
	
	function suadanhmuc(){
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
	
        $danhmuccha = $this->uri->segment(3);
		$data['danhmuccha'] = $this->muser->showdanhmuccha(); 
        $data['info'] = $this->muser->getInfodanhmuccha($danhmuccha);


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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
		
        if(is_numeric($userid) && $data['info']!=NULL)
        {
            
            if(isset($_POST['tendanhmuccha']) && $_POST['tendanhmuccha']!="")
            {
                

                $str=utf8tourl(utf8convert($this->input->post("tendanhmuccha")));
                    
                      $update = array(
                                    
						"tendanhmuc" => $this->input->post("tendanhmuccha"),
						"parent_id" => $this->input->post("danhmuccha"),
						
						"slug" => $str,
						"order"  => $this->input->post("vitri"),
						"tukhoa"  => $this->input->post("tukhoa"),
						"des"  => $this->input->post("des"),
                        "anhien"  => $this->input->post("anhien"),
                        "anhienthem"  => $this->input->post("anhienthem"),
                        
                        
                        
						
                                 );
                      
                      
                      $this->muser->updatedanhmuccha($update,$danhmuccha);
                      redirect(base_url()."cadmin/showdanhmuc"); 
                
            }
            else
            {
                $this->my_layout->view("vsuadanhmuc",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	
	
	function suadanhmuccha(){
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
	//$data['loaidoan'] = $this->muser->loaidoan();  
        $danhmuccha = $this->uri->segment(3);
        $data['info'] = $this->muser->getInfodanhmuccha($danhmuccha);
		//$data['info1'] = $this->muser->getgvpb($detai);
		//$data['layallgiaovien']=$this->muser->layallgiaovien();
		
       //$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
	   
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
		//$data['layallgiaovien'] = $this->muser->layallgiaovien();

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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
		
        if(is_numeric($userid) && $data['info']!=NULL)
        {
            
            if(isset($_POST['tendanhmuccha']) && $_POST['tendanhmuccha']!="")
            {
                

                $str=utf8tourl(utf8convert($this->input->post("tendanhmuccha")));
                    
                      $update = array(
                                    
						"tendmcha" => $this->input->post("tendanhmuccha"),
						"vitri" => $this->input->post("vitri"),
                        "slug" => $str,
                        
                        
                        
                        
                        
						
                                 );
                      
                      
                      $this->muser->updatedanhmuccha($update,$danhmuccha);
                      redirect(base_url()."cadmin/thanhcong"); 
                
            }
            else
            {
                $this->my_layout->view("vsuadanhmuccha",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function suadanhmuccon(){
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
	//$data['loaidoan'] = $this->muser->loaidoan();  
        $danhmuccon = $this->uri->segment(3);
        $data['info'] = $this->muser->getInfodanhmuccon($danhmuccon);
		$data['info1'] = $this->muser->showdanhmuccha();
		//$data['info1'] = $this->muser->getgvpb($detai);
		//$data['layallgiaovien']=$this->muser->layallgiaovien();
		
       //$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
	   
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
		//$data['layallgiaovien'] = $this->muser->layallgiaovien(); 
		
		
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
		
		
        if(is_numeric($userid))
        {
            
            if(isset($_POST['tendmcon']) && $_POST['tendmcon']!="")
            {
                

                
                    $str=utf8tourl(utf8convert($this->input->post("tendmcon")));
                      $update = array(
                                    
						"tendmcon" => $this->input->post("tendmcon"),
						"slug" => $str,
                        "iddmcha" => $_POST['danhmuccha'],
                        
                        
                        
                        
                        
						
                                 );
                      
                      
                      $this->muser->updatedanhmuccon($update,$danhmuccon);
                      redirect(base_url()."cadmin/thanhcong"); 
                
            }
            else
            {
                $this->my_layout->view("vsuadanhmuccon",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function suadanhmucsubcon(){
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
	//$data['loaidoan'] = $this->muser->loaidoan();  
        $danhmuccon = $this->uri->segment(3);
        $data['info'] = $this->muser->getInfodanhmucsubcon($danhmuccon);
		$data['info1'] = $this->muser->showdanhmuccon();
		//$data['info1'] = $this->muser->getgvpb($detai);
		//$data['layallgiaovien']=$this->muser->layallgiaovien();
		
       //$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
	   
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
		//$data['layallgiaovien'] = $this->muser->layallgiaovien(); 
		
		
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

function utf8tourl($text){ //chuyển khoảng trắng thành dấu -
	$text = strtolower(utf8convert($text));
	$text = str_replace( "ß", "ss", $text);
	$text = str_replace( "%", "", $text);
	$text = preg_replace("/[^_a-zA-Z0-9 -] 
	
	
	
	

/", "",$text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = str_replace("----","-",$text);
	$text = str_replace("---","-",$text);
	$text = str_replace("--","-",$text);
return $text;
}
		
		
        if(is_numeric($userid))
        {
            
            if(isset($_POST['tendmsubcon']) && $_POST['tendmsubcon']!="")
            {
                

                
                    $str=utf8tourl(utf8convert($this->input->post("tendmsubcon")));
                      $update = array(
                                    
						"tendmsubcon" => $this->input->post("tendmsubcon"),
						"slug" => $str,
                        "iddmcon" => $_POST['danhmuccon'],
                        
                        
                        
                        
                        
						
                                 );
                      
                      
                      $this->muser->updatedanhmucsubcon($update,$danhmuccon);
                      redirect(base_url()."cadmin/thanhcong"); 
                
            }
            else
            {
                $this->my_layout->view("vsuadanhmucsubcon",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	
	
	
	
	
	function thanhcong()
    {
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfo($userid);
         //$data['loaidoan'] = $this->muser->loaidoan(); 
		//$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
		//$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
		$this->my_layout->view("vloi11",$data);

    }
	
	function xoadanhmuc(){
		$vitri = $this->uri->segment(3);
        $sodanhmuccon = $this->muser->getsodanhmuccon($vitri);
		if($sodanhmuccon == 0){
			$this->muser->deletedanhmuc($vitri);
			if ($this->db->_error_number() == 1451)
			{
				$this->load->view("vloi99");
			}
			else
			{
            redirect(base_url()."cadmin/showdanhmuc");
			}
			}else{
			//$cate = DanhMuc::findOrFail($id);
			$cate = $this->muser->getInfodanhmuccha($vitri);
			$tendanhmuc=$cate['tendanhmuc'];
			echo "<script type='text/javascript'  charset='UTF-8'>
			alert('Không thể xóa danh mục [ ".$tendanhmuc." ] vì vẫn còn chứa danh mục con');
			window.location = '".base_url()."cadmin/showdanhmuc"."';
			</script>";
		}
    }
	
	function xoabanner(){
        $vitri = $this->uri->segment(3);
       
	   $data['info'] = $this->muser->getInfobanner($vitri);
		 $hinhcu=$data['info']['hinhanh'];
	   
        if(is_numeric($vitri)){
            unlink('uploads/'.$hinhcu);
            $this->muser->deletebanner($vitri);
            redirect(base_url()."cadmin/showbanner");
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function xoadanhmuccha(){
        $vitri = $this->uri->segment(3);
       
        if(is_numeric($vitri)){
            
            $this->muser->deletedanhmuccha($vitri);
			if ($this->db->_error_number() == 1451)
			{
				$this->load->view("vloi99");
			}
			else
			{
            redirect(base_url()."cadmin/themdanhmuccha");
			}
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function xoadanhmuccon(){
        $vitri = $this->uri->segment(3);
       
        if(is_numeric($vitri)){
            
            $this->muser->deletedanhmuccon($vitri);
			if ($this->db->_error_number() == 1451)
			{
				$this->load->view("vloi88");
			}
			else
			{
            redirect(base_url()."cadmin/themdanhmuccon");
			}
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function xoadanhmucsubcon(){
        $vitri = $this->uri->segment(3);
       
        if(is_numeric($vitri)){
            
            $this->muser->deletedanhmucsubcon($vitri);
			if ($this->db->_error_number() == 1451)
			{
				$this->load->view("vloi88");
			}
			else
			{
            redirect(base_url()."cadmin/themdanhmucsubcon");
			}
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	public function import(){
		    
		
		if($this->input->post("submit")){
				//$this->Mtrangchu->do_upload();
				$file=$this->Mtrangchu->do_upload();	
		}
		
		
		$tenfile=$file;	
		
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("uploads/".$tenfile);
		
		
		//$row=$objPHPExcel->getActiveSheet()->getCell('A2');
		

	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
    //echo "<br>The worksheet ".$worksheetTitle." has ";
    //echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
    //echo ' and ' . $highestRow . ' row.';
    
    for ($row = 2; $row <= $highestRow; ++ $row) {
       
        
            //$cell = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
            $celldata=$worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
            
			
			
			$ngaysinh=$celldata['0'][2];
			$ngaysinh=PHPExcel_Shared_Date::ExcelToPHP($ngaysinh);
			$ngaysinh=date('d/m/Y', $ngaysinh);
			
			
			$bien=array("idsv" => $celldata['0'][0],
						"username"  => $celldata['0'][0],
                        "tensv"  => $celldata['0'][1],
						"ngaysinh"  => $ngaysinh,
						"noisinh"  => $celldata['0'][3],
						"password"  => md5($celldata['0'][4]),
						
                        "idnganh"  => $celldata['0'][5],
			
			
			
			);
			
			
			$this->Mtrangchu->insert($bien);
			
			
        
        
    }
    
}
		
		
		
		
		
		
		echo "<script>alert('Thành công');</script>";
		redirect(base_url().'ctbm/showsinhvien', 'refresh');
    }
	
	function themnhieusinhvien()
    {
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfotbm($userid);
         $data['loaidoan'] = $this->muser->loaidoan(); 
		$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
		$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
           
        
		
        
        
        
        
        
                
                $this->my_layout->view("vthemnhieusinhvien",$data);
        

    }
	
	function themtintuc()
    {
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfotbm($userid);
         $data['loaidoan'] = $this->muser->loaidoan(); 
		$data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
		$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
           
        $this->form_validation->set_rules("tieude","Tiêu đề","required");
		
		
        
        
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("vthemtintuc",$data);
        }
        else
        {
                $salt = create_random_string(5);
				if($this->input->post("ok")){
				//$this->Mtrangchu->do_upload();
				$file=$this->Mtrangchu->do_upload1();	
		}
		
		$ngaythang= date('d/m/Y');
		$tenfile=$file;
                $add = array(
                        
						"tieude" => $this->input->post("tieude"),
                        "tomtat" => $this->input->post("tomtat"),
						"hinhanh"  => $tenfile,
						"noidung"  => $this->input->post("noidung"),
						
						"ngaythang"  => $ngaythang,
						"idadmin"  => $userid,
						
                        
                );
                
                //--- Gui mail kich hoat neu add thanh cong
                $message = "";
                $mail = array();

                if($this->muser->addtintuc($add)){
                    
                    
                 
                    
                    redirect(base_url()."ctbm/showtintuc"); 
                }
                
                $this->my_layout->view("vthemtintuc",$data);
        }

    }
	
	function showtintuc()
	{
		$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfotbm($userid);
		$idgv=$this->my_auth->userid;
		$this->muser->getalltintucnum();
        $max = $this->muser->getalltintucnum();
        $min = 5;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."ctbm/showtintuc/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->muser->getalltintuc($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("vshowtintuc",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
	}
	
	function suatintuc(){
	$userid = $this->my_auth->userid;
            $data['infoa'] = $this->muser->getInfotbm($userid);
	$data['loaidoan'] = $this->muser->loaidoan();  
        $tin = $this->uri->segment(3);
        $data['info'] = $this->muser->getInfotintuc($tin);
       $data['loaichuyennganh'] = $this->muser->loaichuyennganh(); 
	   
		$data['laykhoahoc'] = $this->muser->laykhoahoc(); 
		if(isset($_POST['ok'])&&$_POST['img']=="")
            {
		$tenfile=$_POST['hinhanh'];
		}
        if(is_numeric($userid) && $data['info']!=NULL)
        {
            
            if(isset($_POST['ok']))
            {
                
		
		//$ngaythang= date('d/m/Y');
		if($_POST['img']==""){
				//$this->Mtrangchu->do_upload();
				$tenfile=$_POST['hinhanh'];
		}
		else
		{
		
		$file=$this->Mtrangchu->do_upload1();	
				$tenfile=$file;
				echo "<script>alert('aaaaaaaaaaaaaa');</script>";
		}

                
                    
                      $update = array(
                                    
						"tieude" => $this->input->post("tieude"),
                        "tomtat" => $this->input->post("tomtat"),
						"hinhanh"  => $tenfile,
						"noidung"  => $this->input->post("noidung"),
						
						
						
                                 );
                      
                      
                      $this->muser->updatetintuc($update,$tin);
                      redirect(base_url()."ctbm/showtintuc"); 
                
            }
            else
            {
                $this->my_layout->view("vsuatintuc",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Đường dẫn không hợp lệ";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function xoatintuc(){
        $vitri = $this->uri->segment(3);
       
        if(is_numeric($vitri)){
            
            $this->muser->deletetintuc($vitri);
            redirect(base_url()."ctbm/showtintuc");
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
	function xoasanpham(){
        $vitri = $this->uri->segment(3);
       $userid = $this->my_auth->userid;
	
            $data['infoa'] = $this->muser->getInfo($userid);
          //$data['danhmuccha'] = $this->muser->showdanhmuccha(); 
		 $data['info'] = $this->muser->getInfosanpham($vitri);
		 $hinhcu=$data['info']['hinhanhchinh'];
		$hinhphucu=$data['info']['hinhanhphu'];
		$hinhphucuunlink=explode("|", $data['info']['hinhanhphu']);  
        if(is_numeric($vitri)){
            unlink('uploads/'.$hinhcu);
			for($i=0;$i<count($hinhphucuunlink);$i++)
				{
					unlink('uploads/'.$hinhphucuunlink[$i]);
				}
            $this->muser->deletetintuc($vitri);
            redirect(base_url()."cadmin/showsanpham");
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }

function xoadonhang(){
        $vitri = $this->uri->segment(3);
       
        if(is_numeric($vitri)){
            
            $this->muser->deletedonhang($vitri);
            redirect(base_url()."cadmin/showdonhang");
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
	
}