<?php
Class Sanpham extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
		$this->load->model('Mtrangchu');
		$this->load->helper(array("url","date","my_data","cookie"));
		$this->load->library('user_agent');
        $this->load->library(array("form_validation","my_layout","session","email","my_auth","cart"));
        $this->my_layout->setLayout("vtrangchu");
    }
    
    /*
     * Hien thi danh sach san pham
     */
    function catalog($id="")
    {
		//l?y ID c?a th? lo?i
        $id = intval($this->uri->rsegment(3));
		$data['danhmuccha'] = $this->muser->showdanhmuccha();
		$data['tendanhmuc']=$this->Mtrangchu->layiddmcha($id);
        //lay ra thông tin c?a th? lo?i
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        
        //kiêm tra xem dây là danh con hay danh m?c cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh m?c con do
                $this->db->where_in('id', $catalog_subs_id);
            }else{
                $input['where'] = array('id' => $id);
            }
        }else{
            $input['where'] = array('id' => $id);
        }
        
        //l?y ra danh sách s?n ph?m thu?c danh m?c dó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('sanpham/catalog/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang k? ti?p';
        $config['prev_link']   = 'Trang tru?c';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        
        
        //lay danh sach san pham
        if(isset($catalog_subs_id))
        {
            $this->db->where_in('id', $catalog_subs_id);
        }
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
		
		//lay danh sach san pha
        $list = $this->product_model->get_list($input,$id,$config['per_page'],$this->uri->segment($config['uri_segment']));
		
        $data['sanpham'] = $list;
        print_r($list);
        $this->my_layout->view("vloaisp",$data);
    }
}