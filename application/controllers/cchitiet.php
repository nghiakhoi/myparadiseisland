 <?php
class Cchitiet extends CI_Controller{

	var $_register = "register"; // ten cua session register khi dang ki thanh vien
    var $_fgpassword = "fgpassword";
    public function __construct(){
        parent::__construct();
		$this->load->helper(array("url","date","my_data"));
        $this->load->library(array("form_validation","my_layout","session","email"));
        $this->my_layout->setLayout("vtrangchu");
     
        $this->load->database();
        $this->load->model("Mtrangchu");
		//$this->load->model("muser");
		//$this->load->model("mhome");
		
    }
    public function index(){
        
		$sp=$this->uri->segment(2);   
        $data['sanpham']=$this->Mtrangchu->listall();
		$data['chitietsp']=$this->Mtrangchu->getInfochitietsp($sp);
		$data['menucha']=$this->Mtrangchu->menucha();
		$data['menucon']=$this->Mtrangchu->menucon();
		//$param              = $this->uri->segment(3);  
        
        //$data['sanpham']=$this->Mtrangchu->listall();
        
		
		//$data['chitietsp']=$this->mhome->getallsp($param);
		
		
        
            //$userid = $this->my_auth->userid;
            //$data['info'] = $this->muser->getInfo($userid);
            
            //$this->load->view("frontend/user/home_view",$data);
			//print_r($data);
			$this->my_layout->view("vchitiet",$data);

    }
	
	public function gioithieu(){
        
		
        
        $data['sanpham']=$this->Mtrangchu->listall();
        $data['loaisp']=$this->mhome->get_theloai();
		
		
		
        
            $userid = $this->my_auth->userid;
            $data['info'] = $this->muser->getInfo($userid);
            $data['about']=$this->mhome->get_about();
            //$this->load->view("frontend/user/home_view",$data);
			//print_r($data);
			$this->my_layout->view("about",$data);
			
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
	
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."ctrangchu");
	}
	
	
	
	
	
	
} 