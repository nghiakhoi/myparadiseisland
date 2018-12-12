<?php
class Verify extends CI_Controller{
    
    function __construct(){
        
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("form_validation","my_layout","session","my_auth","email"));
        
        $this->load->database();
        $this->load->model("muser");
        //$this->my_layout->setLayout("vtrangchu");
    }
    
    //--- Login
    function login()
    {   
        if($this->my_auth->is_Login())
        {
            redirect(base_url()."cadmin");
            exit();
        }
        
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view("vloi");            
        }
        else
        {   
             $u = $this->input->post("username");
             $p = $this->input->post("password");
             $session = $this->muser->checkLogin($u,$p);
             
             if($session)
             {
                 
                 {
                      $data = array(
                                    "username"  => $session['username'],
                                    "userid"    => $session['idsv'],
                                    "level"  => $session['level'],
                                );
                                
                     $this->my_auth->set_userdata($data);
                     redirect(base_url()."ctrangchu2");
                 }
             }
             else
             {  
                $this->load->view("vloi");    
             }
        }
    }
	
	function logingv()
    {   
        if($this->my_auth->is_Login())
        {
            redirect(base_url()."cgiaovien");
            exit();
        }
        
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view("vdngiaovien");            
        }
        else
        {   
             $u = $this->input->post("username");
             $p = $this->input->post("password");
             $session = $this->muser->checkLogingv($u,$p);
             
             if($session)
             {
                 
                 {
                      $data = array(
                                    "username"  => $session['username'],
                                    "userid"    => $session['idgv'],
                                    "tengv"    => $session['tengv'],
                                );
                                
                     $this->my_auth->set_userdata($data);
                     redirect(base_url()."cgiaovien");
                 }
             }
             else
             {  
                $this->load->view("vloi2");    
             }
        }
    }
	
	function loginadmin()
    {   
        if($this->my_auth->is_Login())
        {
            redirect(base_url()."cadmin");
            exit();
        }
        
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view("vdangnhap");            
        }
        else
        {   
             $u = $this->input->post("username");
             $p = $this->input->post("password");
             $session = $this->muser->checkLogintbm($u,$p);
             
             if($session)
             {
                 
                 {
                      $data = array(
                                    "username"  => $session['username'],
                                    "userid"    => $session['idadmin'],
                                    "tenquyen"    => $session['tenquyen'],
									"idquyen"    => $session['idquyen'],
                                );
                                
                     $this->my_auth->set_userdata($data);
                     redirect(base_url()."cadmin");
                 }
             }
             else
             {  
                $this->load->view("vloi6");    
             }
        }
    }
	
	function loginuser()
    {   
        if($this->my_auth->is_Loginuser())
        {
            redirect(base_url());
            exit();
        }
        
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view("vloi5");            
        }
        else
        {   
             $u = $this->input->post("username");
             $p = $this->input->post("password");
             $session = $this->muser->checkLoginuser($u,$p);
             
             if($session)
             {
                 
                 {
                      $data = array(
                                    "userkhach"  => $session['username'],
                                    "idkhach"    => $session['idkhach'],
                                    
                                );
                                
                     $this->my_auth->set_userdata($data);
                     redirect(base_url()."cgiohang#p1");
                 }
             }
             else
             {  
                $this->load->view("vloi5");    
             }
        }
    }
	
	
	
	protected function check_login() {
  $session = $this->my_auth->userdata('userkhach');
  if($session == '') {
    return false; // chua dang nh?p
  } else {
    return true; // dã dang nh?p
  }
}
public function facebook() {
  if($this->my_auth->is_Loginuser())
        {
            redirect(base_url());
            exit();
        }
  $config = array(
    'appId'  => '726509060737301',
    'secret' => '9053d98d1cfbecc921efc5f7287e0075'
// Google search cách t?o apps facebook và l?y 2 s? seri trên di?n vào.
  );
  $this->load->library('facebook',$config);
  $session = $this->facebook->getUser();
// hàm $this->facebook->getUser(); tr? v? id c?a tài kho?n facebook khi b?n dã dang nh?p r?i
  if($session) {
// n?u $session t?n t?i dãy s? id tài kho?n thì l?y thông tin tài kho?n ra
    try { $session = $this->facebook->api('/me'); }
    catch (FacebookApiException $e) { $session = null; }
  }
// Ki?m tra ti?p $seesion n?u không có thông tin thì chuy?n d?n trang dang nh?p
  if($session) { // $session = $this->facebook->api('/me'); ? dòng try phía trên
// Ho?c $session  là 1 m?ng thông tin n?u b?n dã dang nh?p r?i
// Trong dây b?n có th? ki?m tra xem $session['email'] có trong csdl c?a b?n ko, n?u  chua có thì insert vào.
	$tontai=$this->muser->getkhachhangbyusername($session['email']);
			if($tontai!=0)
			{
				$u = $tontai;
             $p = "123";
             $session1 = $this->muser->checkLoginuser($u,$p);
             
             if($session1)
             {
                 
                 {
                      $data = array(
                                    "userkhach"  => $session1['username'],
                                    "idkhach"    => $session1['idkhach'],
                                    
                                );
                                
                     $this->my_auth->set_userdata($data);
                     //redirect(base_url()."ctrangchu/thongtinkhachhang");
					 $this->load->view("closewindow"); 
                 }
             }
			}
			else
			{
            $diachi=$_POST['sonha']."|".$_POST['duong']."|".$_POST['phuongxa']."|".$_POST['quanhuyen']."|".$_POST['tinhthanh'];
			$thongtin=array(
				"hoten" => "",
				"username" => $session['email'],
				"password" => md5($session['email']),
				"email" => $session['email'],
				"gioitinh" => "0",
				"diachi" => "||||",
				"phone" => "",
				"ngaysinh" => "",
			);
			$this->muser->addUser($thongtin);
			}
			$tontai1=$this->muser->getkhachhangbyusername1($session['email']);
			$u = $tontai1['username'];
             $p = $tontai1['password'];
             $session1 = $this->muser->checkLoginuserfb($u,$p);
             
             if($session1)
             {
                 
                 {
                      $data = array(
                                    "userkhach"  => $session1['username'],
                                    "idkhach"    => $session1['idkhach'],
                                    
                                );
                                
                     $this->my_auth->set_userdata($data);
                     //redirect(base_url()."ctrangchu/thongtinkhachhang");
					 $this->load->view("closewindow"); 
                 }
             }
    //$this->my_auth->set_userdata('userkhach',$session['email']);
	//$this->my_auth->set_userdata('idkhach',$session['id']);
    //$this->session->set_userdata('popup','Ðang nh?p thành công v?i tài kho?n Facebook');
    //print_r($session1);
	//redirect(base_url()."ctrangchu/chitiet/7");
	$this->load->view("closewindow"); 
    //exit();
  } else { // Lúc này $session = null n?u b?n chua dang nh?p
// L?y du?ng d?n login facebook và chuy?n d?n dó
    redirect($this->facebook->getLoginUrl(array('scope' => 'email')));
    exit();
  }
}  
	
	function dangkyuser()
    {   
	
		if(isset($_POST['dangky'])){
			$user=$_POST['tendangnhap'];
			$pass=$_POST['password'];
			$tontai=$this->muser->getkhachhangbyusername($_POST['tendangnhap']);
			if($tontai!=0)
			{
				$this->load->view("vloi999",$data);
			}
			else
			{
            $diachi=$_POST['sonha']."|".$_POST['duong']."|".$_POST['phuongxa']."|".$_POST['quanhuyen']."|".$_POST['tinhthanh'];
			$thongtin=array(
				"hoten" => $_POST['hoten'],
				"username" => $_POST['tendangnhap'],
				"password" => md5($pass),
				"email" => $_POST['email'],
				"gioitinh" => $_POST['gioitinh'],
				"diachi" => $diachi,
				"phone" => $_POST['dienthoai'],
				"ngaysinh" => $_POST['ngaysinh'],
			);
			
			$this->muser->addUser($thongtin);
			
			
			$u = $user;
             $p = $pass;
             $session = $this->muser->checkLoginuser($u,$p);
             
             if($session)
             {
                 
                 {
                      $data = array(
                                    "userkhach"  => $session['username'],
                                    "idkhach"    => $session['idkhach'],
                                    
                                );
                                
                     $this->my_auth->set_userdata($data);
                     redirect(base_url()."thong-tin-khach-hang.html");
                 }
             }
             else
             {  
                $this->load->view("vloi55");    
             }
			
			//$this->cart->destroy();
			//redirect(base_url().'ctrangchu/dangkythanhcong');
			}
            
        }
	
        
		
          
             
        
    }
    
    //---- Logout
    function logout()
    {
        $this->my_auth->sess_destroy();
		redirect(base_url()."ctrangchu2");
    }
	
	function logoutgv()
    {
        $this->my_auth->sess_destroy();
		redirect(base_url()."cgiaovien");
    }
	
	function logoutadmin()
    {
        $this->my_auth->unset_userdata('username');
		$this->my_auth->unset_userdata('userid');
		redirect(base_url()."cadmin");
    }
	
	function logoutuser()
    {
        $this->my_auth->unset_userdata('idkhach');
		$this->my_auth->unset_userdata('userkhach');
		redirect(base_url()."cgiohang");
    }
	
	function logoutuser1()
    {
        $this->my_auth->unset_userdata('idkhach');
		$this->my_auth->unset_userdata('userkhach');
		$config = array(
    'appId'  => '726509060737301',
    'secret' => '9053d98d1cfbecc921efc5f7287e0075'
// Google search cách t?o apps facebook và l?y 2 s? seri trên di?n vào.
  );
		$this->load->library('facebook',$config);
  $session = $this->facebook->getUser();
// hàm $this->facebook->getUser(); tr? v? id c?a tài kho?n facebook khi b?n dã dang nh?p r?i
  if($session) {
// n?u $session t?n t?i dãy s? id tài kho?n thì l?y thông tin tài kho?n ra
    try { $session = $this->facebook->api('/me'); }
    catch (FacebookApiException $e) { $session = null; }
  }
		
// Destroy the session so that no Facebook data is held
$this->facebook->destroySession();
$logout = $this->facebook->getLogoutUrl();
$this->facebook->setAccessToken('');
// Redirect the user to the logout url, facebook will redirect him to our page
//redirect( $logout );
redirect(base_url());
    }

}