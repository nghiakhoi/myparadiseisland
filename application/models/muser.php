<?php
class muser extends CI_Model{

    private $_table = "sinhvien";
	protected $_gallery_path = "";
	protected $_gallery_url = "";
    
    function __contruct(){
        parent::__construct();
        $this->load->database();
		//L?y du?ng d?n url c?a thu m?c ch?a hình ?nh du?c upload
		$this->_gallery_url = base_url()."uploads/";
		//L?y du?ng d?n v?t lý c?a thu m?c ch?a hình ?nh duoc upload
		$this->_gallery_path = realpath(APPPATH. "../uploads");
    }
	
	public function do_upload1(){
		$config = array('upload_path'   => './uploads/',
						'allowed_types' => 'jpg|png|jpeg|gif',
						'max_size'      => '20000');
		$this->load->library("upload",$config);
		if(!$this->upload->do_upload("img")){
			$error = array($this->upload->display_errors());
		}else{
			$image_data = $this->upload->data();	
		}
		$duongdan=$image_data['full_path'];	
		$tenfile1=$image_data['file_name'];	
		return $tenfile1;	
		
	}
	
	function getsonguoimua(){
        $query=$this->db->query("SELECT stt, SUM(soluong) as songuoimua FROM hoadon GROUP BY stt");
        $data = $query->result_array();
        return $data;
    }

    //--- Lay du lieu
    function getalldata($off="",$limit=""){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->limit($off,$limit);
        $this->db->order_by("idsv","asc");
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
	
	function thongtindiachi($id){
		$this->db->join('district','district.districtid=ward.districtid');
        $this->db->join('province','province.provinceid=district.provinceid');
        
		$this->db->where("ward.wardid",$id);
        $query = $this->db->get('ward');
        
        return $query->row_array();;
    }
	
	function laytinhthanh(){
        $this->db->select('*');
		$this->db->order_by("provincename","asc");
        $query = $this->db->get('province');
        
        
            return $query->result_array();
    }
	
	function layquanhuyen($tinh){
        $this->db->select('*');
		$this->db->order_by("districtname","asc");
		$this->db->where("provinceid",$tinh);
        $query = $this->db->get('district');
        
        
            return $query->result_array();
    }
	
	function layphuongxa($quan){
        $this->db->select('*');
		$this->db->order_by("wardname","asc");
		$this->db->where("districtid",$quan);
        $query = $this->db->get('ward');
        
        
            return $query->result_array();
    }

function deletedonhang($id){
        
            $this->db->where("idhoadon",$id);
            $this->db->delete('chitiethoadon');
			$this->db->where("idhoadon",$id);
            $this->db->delete('hoadon');
        
    }
	
	function danhmuccha(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('danhmuccha');
        
        
            return $query->result_array();
        
    }
	
	function danhmuccon(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('danhmuccon');
        
        
            return $query->result_array();
        
    }
	
	function danhmucsubcon(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('danhmucsubcon');
        
        
            return $query->result_array();
        
    }
	
	function getdetaigv($id,$off="",$limit=""){
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("detai.idgv",$id);
		
        $this->db->limit($off,$limit);
        $this->db->order_by("iddetai","desc");
        $query = $this->db->get('detai');
        
        return $query->result_array();;
    }
	
	function getdetaiduocchongv($id){
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("detai.idgv",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	
	
	function getdiemtuandetai($id){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemtuan.iddetai');
		$this->db->select('diemtuan.tuanthu');
		$this->db->select('diemtuan.diem');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        //$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
		$this->db->where("diemtuan.idgv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemtuan');
        
        return $query->result_array();
    }
	
	function getalldiemtuandetai(){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemtuan.iddetai');
		$this->db->select('diemtuan.tuanthu');
		$this->db->select('diemtuan.diem');
		$this->db->select('loaidoan.idloaidoan');
		$this->db->select('loaidoan.sotuan');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
		//$this->db->where("diemtuan.idgv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemtuan');
        
        return $query->result_array();
    }
	
	function kqdiemtuan(){
	//$this->db->select('DISTINCT(sinhvien.idsv)');
		//$this->db->select('sinhvien.tensv');
		//$this->db->select('diemtuan.iddetai');
		//$this->db->select('diemtuan.tuanthu');
		//$this->db->select('diemtuan.diem');
		//$this->db->select('loaidoan.idloaidoan');
		//$this->db->select('loaidoan.sotuan');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=kqdoan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=kqdoan.idsv');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		//$this->db->where("diemtuan.idgv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('kqdoan');
        
        return $query->result_array();
    }
	
	function gediemtuandetaisv($id){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemtuan.iddetai');
		$this->db->select('diemtuan.tuanthu');
		$this->db->select('diemtuan.diem');
		$this->db->select('loaidoan.idloaidoan');
		$this->db->select('loaidoan.sotuan');
		$this->db->select('loaidoan.istn');
		$this->db->select('detai.iddetai');
		$this->db->select('detai.tendetai');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
		$this->db->where("diemtuan.idsv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemtuan');
        
        return $query->result_array();
    }
	
	function getdiemgvhddetai($id){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemgvhd.iddetai');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemgvhd.diemgvhd');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        //$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemgvhd.idsv');
		$this->db->where("diemgvhd.idgv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemgvhd');
        
        return $query->result_array();
    }
	
	function getalldiemgvhddetai(){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemgvhd.iddetai');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemgvhd.diemgvhd');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        //$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemgvhd.idsv');
		//$this->db->where("diemgvhd.idgv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemgvhd');
        
        return $query->result_array();
    }
	
	function getdiemgvhddetaisv($id){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemgvhd.iddetai');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemgvhd.diemgvhd');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        //$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemgvhd.idsv');
		$this->db->where("diemgvhd.idsv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemgvhd');
        
        return $query->result_array();
    }
	
	function getdiemphanbiendetai($id){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemphanbien.iddetai');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemphanbien.diemphanbien');
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('diemphanbien','diemphanbien.iddetai=dangkydetai.iddetai');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->join('sinhvien','sinhvien.idsv=diemphanbien.idsv');
		$this->db->where("dangkydetai.idgvpb",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getalldiemphanbiendetai(){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemphanbien.iddetai');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemphanbien.diemphanbien');
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('diemphanbien','diemphanbien.iddetai=dangkydetai.iddetai');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->join('sinhvien','sinhvien.idsv=diemphanbien.idsv');
		//$this->db->where("dangkydetai.idgvpb",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getdiemphanbiendetaisv($id){
	$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemphanbien.iddetai');
		//$this->db->select('diemphanbien.tuanthu');
		$this->db->select('diemphanbien.diemphanbien');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        //$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('sinhvien','sinhvien.idsv=diemphanbien.idsv');
		$this->db->where("diemphanbien.idsv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemphanbien');
        
        return $query->result_array();
    }
	
	function getdiemhoidongdetai($id){
	$this->db->select('DISTINCT(diemhoidong.idgv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('sinhvien.idsv');
		$this->db->select('diemhoidong.iddetai');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemhoidong.diemhoidong');
		$this->db->select('diemhoidong.idgv');
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('diemhoidong','diemhoidong.iddetai=dangkydetai.iddetai');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->join('sinhvien','sinhvien.idsv=diemhoidong.idsv');
		$this->db->join('hoidongpb','hoidongpb.idhoidong=dangkydetai.idhoidong');
		$this->db->join('chitiethoidong','chitiethoidong.idhoidong=hoidongpb.idhoidong');
		
		$this->db->where("chitiethoidong.idgv",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getalldiemhoidongdetai(){
	$this->db->select('DISTINCT(diemhoidong.idgv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('sinhvien.idsv');
		$this->db->select('diemhoidong.iddetai');
		$this->db->select('hoidongpb.soluonggv');
		//$this->db->select('diemgvhd.tuanthu');
		$this->db->select('diemhoidong.diemhoidong');
		$this->db->select('diemhoidong.idgv');
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('diemhoidong','diemhoidong.iddetai=dangkydetai.iddetai');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->join('sinhvien','sinhvien.idsv=diemhoidong.idsv');
		$this->db->join('hoidongpb','hoidongpb.idhoidong=dangkydetai.idhoidong');
		$this->db->join('chitiethoidong','chitiethoidong.idhoidong=hoidongpb.idhoidong');
		
		//$this->db->where("chitiethoidong.idgv",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getdiemhoidongdetaisv($id){
	//$this->db->select('DISTINCT(sinhvien.idsv)');
		$this->db->select('sinhvien.tensv');
		$this->db->select('diemhoidong.iddetai');
		//$this->db->select('diemhoidong.tuanthu');
		$this->db->select('diemhoidong.diemhoidong');
		$this->db->select('hoidongpb.soluonggv');
		//$this->db->select('chitiethoidong.idgv');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        //$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('hoidongpb','hoidongpb.idhoidong=diemhoidong.idhoidong');
		$this->db->join('chitiethoidong','chitiethoidong.idhoidong=hoidongpb.idhoidong');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=diemhoidong.idsv');
		
		$this->db->where("diemhoidong.idsv",$id);
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
		//$this->db->order_by("idsv","desc");
		//$this->db->order_by("tuanthu","asc");
        $query = $this->db->get('diemhoidong');
        
        return $query->result_array();
    }
	
	function getdetaiphanbiengv($id){
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("dangkydetai.idgvpb",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getdetaihoidonggv($id){
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('hoidongpb','hoidongpb.idhoidong=dangkydetai.idhoidong');
		$this->db->join('chitiethoidong','chitiethoidong.idhoidong=hoidongpb.idhoidong');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		//$this->db->where("dangkydetai.idhoidong",$id);
		$this->db->where("chitiethoidong.idgv",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getalldetaiduocchon(){
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		//$this->db->where("detai.idgv",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	
	
	
	function getalldetaitotnghiepduocchon(){
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
        $this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("loaidoan.istn",1);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('dangkydetai');
        
        return $query->result_array();
    }
	
	function getbangdiem($id){
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemtuan.iddetai",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemtuan');
        
        return $query->result_array();
    }
	
	function getbangdiem1($id1,$id2){
	$this->db->select('DISTINCT(nhom.idsv)'); 
	$this->db->select('nhom.idnhom');
	$this->db->select('sinhvien.tensv');
	$this->db->select('detai.iddetai');
	$this->db->select('detai.tendetai');
	$this->db->select('loaidoan.sotuan');
	$this->db->select('loaidoan.ngaybatdau');
	$this->db->select('loaidoan.ngayketthuc');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemtuan.iddetai",$id1);
		$this->db->where("nhom.idnhom",$id2);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemtuan');
        
        return $query->result_array();
    }
	
	
	
	function getbangdiemhd1($id1,$id2){
	$this->db->select('DISTINCT(nhom.idsv)'); 
	$this->db->select('nhom.idnhom');
	$this->db->select('sinhvien.tensv');
	$this->db->select('detai.iddetai');
	$this->db->select('detai.tendetai');
	$this->db->select('loaidoan.sotuan');
	$this->db->select('loaidoan.ngaybatdau');
	$this->db->select('loaidoan.ngayketthuc');
	$this->db->select('diemgvhd.diemgvhd');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('dangkydetai','dangkydetai.iddetai=diemgvhd.iddetai');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemgvhd.iddetai",$id1);
		$this->db->where("nhom.idnhom",$id2);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemgvhd');
        
        return $query->result_array();
    }
	
	function getbangdiempb1($id1,$id2){
	$this->db->select('DISTINCT(nhom.idsv)'); 
	$this->db->select('nhom.idnhom');
	$this->db->select('sinhvien.tensv');
	$this->db->select('detai.iddetai');
	$this->db->select('detai.tendetai');
	$this->db->select('loaidoan.sotuan');
	$this->db->select('loaidoan.ngaybatdau');
	$this->db->select('loaidoan.ngayketthuc');
	$this->db->select('diemphanbien.diemphanbien');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('dangkydetai','dangkydetai.iddetai=diemphanbien.iddetai');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemphanbien.iddetai",$id1);
		$this->db->where("nhom.idnhom",$id2);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemphanbien');
        
        return $query->result_array();
    }
	
	function getbangdiemhoidong1($id1,$id2){
	$this->db->select('DISTINCT(nhom.idsv)'); 
	$this->db->select('nhom.idnhom');
	$this->db->select('sinhvien.tensv');
	$this->db->select('detai.iddetai');
	$this->db->select('detai.tendetai');
	$this->db->select('loaidoan.sotuan');
	$this->db->select('loaidoan.ngaybatdau');
	$this->db->select('loaidoan.ngayketthuc');
	$this->db->select('diemhoidong.diemhoidong');
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('dangkydetai','dangkydetai.iddetai=diemhoidong.iddetai');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('giaovien','giaovien.idgv=diemhoidong.idgv');
		$this->db->where("diemhoidong.iddetai",$id1);
		$this->db->where("nhom.idnhom",$id2);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemhoidong');
        
        return $query->result_array();
    }
	
	function getbangdiem2($id1,$id2="7",$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		$this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemtuan.iddetai",$id1);
		$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemtuan.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemtuan');
        
        return $query->row_array();
    }
	
	function getbangdiemhd2($id1,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		$this->db->join('detai','detai.iddetai=diemgvhd.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=diemgvhd.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemgvhd.iddetai",$id1);
		//$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemgvhd.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemgvhd');
        
        return $query->row_array();
    }
	
	function getbangdiempb2($id1,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		$this->db->join('detai','detai.iddetai=diemphanbien.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=diemphanbien.idsv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemphanbien.iddetai",$id1);
		//$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemphanbien.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemphanbien');
        
        return $query->row_array();
    }
	
	function getbangdiemhoidong2($id1,$id2,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		$this->db->join('detai','detai.iddetai=diemhoidong.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=diemhoidong.idsv');
		$this->db->join('giaovien','giaovien.idgv=diemhoidong.idgv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemhoidong.iddetai",$id1);
		$this->db->where("diemhoidong.idgv",$id2);
		$this->db->where("diemhoidong.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemhoidong');
        
        return $query->row_array();
    }
	
	function getbangdiem3($id1,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		//$this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemtuan.iddetai",$id1);
		//$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemtuan.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemtuan');
        
        return $query->result_array();
    }
	
	function getbangdiemhd3($id1,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		//$this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemgvhd.iddetai",$id1);
		//$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemgvhd.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemgvhd');
        
        return $query->result_array();
    }
	
	
	
	function getbangdiempb3($id1,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		//$this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemphanbien.iddetai",$id1);
		//$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemphanbien.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemphanbien');
        
        return $query->result_array();
    }
	
	function getbangdiemhoidong3($id1,$id3){
	//$this->db->select('nhom.idsv'); 
	//$this->db->select('nhom.idnhom');
	
		//$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('dangkydetai','dangkydetai.iddetai=diemtuan.iddetai');
		//$this->db->join('detai','detai.iddetai=diemtuan.iddetai');
		//$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		//$this->db->join('sinhvien','sinhvien.idsv=diemtuan.idsv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		//$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->where("diemhoidong.iddetai",$id1);
		//$this->db->where("diemtuan.tuanthu",$id2);
		$this->db->where("diemhoidong.idsv",$id3);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('diemhoidong');
        
        return $query->result_array();
    }
	
	function gettuanthu($id1){
	
		
		
		
		
		$this->db->where("diemtuan.tuanthu",$id1);
		
        $query = $this->db->get('diemtuan');
        
        return $query->row_array();
    }
	
	function getdetaiduocchongvnum($ids){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("idgv",$ids);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('detai');
        
        return $query->num_rows();
    }
	
	function getalldoan($off="",$limit=""){
		
        $this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        $this->db->limit($off,$limit);
        $this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('loaidoan');
        
        return $query->result_array();
    }
	
	function getallsinhvien($off="",$limit=""){
		
        $this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		
		
        $this->db->limit($off,$limit);
        //$this->db->order_by("idsv","desc");
        $query = $this->db->get('sinhvien');
        
        return $query->result_array();
    }
	
	function getalltintuc($off="",$limit=""){
		
        //$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		
		
        $this->db->limit($off,$limit);
        $this->db->order_by("idtin","desc");
        $query = $this->db->get('tintuc');
        
        return $query->result_array();
    }
	
	function getallsanpham($off="",$limit=""){
		
        //$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		
		
        $this->db->limit($off,$limit);
        $this->db->order_by("stt","desc");
        $query = $this->db->get('sanpham');
        
        return $query->result_array();
    }
	
	function getallbanner($off="",$limit=""){
		
        //$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		
		
        $this->db->limit($off,$limit);
		$this->db->order_by("idbanner","desc");
        $this->db->order_by("thutu","asc");
		
        $query = $this->db->get('banner');
        
        return $query->result_array();
    }

function getallsanpham1(){
		
        //$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		
		
        
        
        $query = $this->db->get('sanpham');
        
        return $query->result_array();
    }
	
	function getalldonhang($off="",$limit=""){
		
        //$this->db->join('sanpham','sanpham.stt=chitiethoadon.stt');
		$this->db->join('chitiethoadon','chitiethoadon.idhoadon=hoadon.idhoadon');
		$this->db->join('sanpham','sanpham.stt=chitiethoadon.stt');
        $this->db->limit($off,$limit);
        $this->db->order_by("hoadon.idhoadon","desc");
        $query = $this->db->get('hoadon');
        
        return $query->result_array();
    }

function getalldonhang1($id){
		
        $this->db->join('sanpham','sanpham.stt=hoadon.stt');
		
        $this->db->where('hoadon.status',$id);
        $this->db->order_by("idhoadon","desc");
        $query = $this->db->get('hoadon');
        
        return $query->result_array();
    }
	
	function getallhoidong($off="",$limit=""){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        $this->db->limit($off,$limit);
        $this->db->order_by("idhoidong","desc");
        $query = $this->db->get('hoidongpb');
        
        return $query->result_array();
    }
	
	function getalldoannum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('loaidoan');
        
        return $query->num_rows();
    }
	
	function getallsinhviennum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('sinhvien');
        
        return $query->num_rows();
    }
	
	function getalltintucnum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('sinhvien');
        
        return $query->num_rows();
    }
	
	function getallsanphamnum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getallbannernum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('banner');
        
        return $query->num_rows();
    }
	
	function getalldonhangnum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('hoadon');
        
        return $query->num_rows();
    }
	
	function getallhoidongnum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('hoidongpb');
        
        return $query->num_rows();
    }
	
	function getkhachhangbyusername($u){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		$this->db->where("username",$u);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('khachhang');
        
        return $query->num_rows();
    }
	
	function getkhachhangbyusername1($u){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		$this->db->where("username",$u);
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('khachhang');
        
        return $query->row_array();
    }
	
	function getsanphamnumrows(){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->where("stt",$ids);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getsanphamnewnumrows(){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("new","1");
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getsanphamhotnumrows(){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->where("hot","1");
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getsanphambanchaynhatnumrows(){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("chay","1");
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getsanphamtheochanumrows($id){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("parent_id",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getsanphamtheoconnumrows($id){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("iddmcon",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	function getsanphamtheosubconnumrows($id){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->where("iddmsubcon",$id);
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('sanpham');
        
        return $query->num_rows();
    }
	
	
	function getalldetai($off="",$limit=""){
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		
        //$this->db->limit($off,$limit);
        $this->db->order_by("iddetai","desc");
        $query = $this->db->get('detai');
        
        return $query->result_array();
    }
	
	function getalldetainum(){
		//$this->db->join('giaovien','giaovien.idgv=detai.idgv');
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("iddetai","desc");
        $query = $this->db->get('detai');
        
        return $query->num_rows();
    }
    
    //--- Lay thong tin 1 record qua id
    function getInfo($id){
        
		
        $this->db->where("idadmin",$id);
		
        $query = $this->db->get("admin");
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfokhach($id){
        
		
        $this->db->where("idkhach",$id);
		
        $query = $this->db->get("khachhang");
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfogv($id){
        //$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		//$this->db->join('lop','lop.idlop=chuyennganh.idlop');
		//$this->db->join('khoahoc','khoahoc.idkhoahoc=lop.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("idgv",$id);
		
        $query = $this->db->get('giaovien');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfotbm($id){
        $this->db->join('quyen','quyen.idquyen=admin.idquyen');
		//$this->db->join('lop','lop.idlop=chuyennganh.idlop');
		//$this->db->join('khoahoc','khoahoc.idkhoahoc=lop.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("idadmin",$id);
		
        $query = $this->db->get('admin');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfodetai($id){
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		//$this->db->join('khoahoc','khoahoc.idkhoahoc=lop.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("iddetai",$id);
		
        $query = $this->db->get('detai');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfodoan($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("idloaidoan",$id);
		
        $query = $this->db->get('loaidoan');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfosinhvien($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		//$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("idsv",$id);
		
        $query = $this->db->get('sinhvien');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfotintuc($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		//$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("idtin",$id);
		
        $query = $this->db->get('tintuc');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function addban($data){
        if($this->db->insert('banner',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function getInfosanpham($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		
		
        $this->db->where("stt",$id);
		
        $query = $this->db->get('sanpham');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfobanner($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		
		
		
        $this->db->where("idbanner",$id);
		
        $query = $this->db->get('banner');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfohoidong($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		//$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		//$this->db->join('bacdaotao','bacdaotao.idbac=khoahoc.idbac');
		
        $this->db->where("idhoidong",$id);
		
        $query = $this->db->get('hoidongpb');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfodanhmuccha($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		//$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		//$this->db->join('giaovien','giaovien.idgv=dangkydetai.idgvpb');
		
        $this->db->where("id",$id);
		
        $query = $this->db->get('danhmucs');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfodanhmuccon($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		//$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('danhmuccha','danhmuccha.iddmcha=danhmuccon.iddmcha');
		
        $this->db->where("iddmcon",$id);
		
        $query = $this->db->get('danhmuccon');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function getInfodanhmucsubcon($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		//$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('danhmuccon','danhmuccon.iddmcon=danhmucsubcon.iddmcon');
		
        $this->db->where("iddmsubcon",$id);
		
        $query = $this->db->get('danhmucsubcon');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	
	function getInfohoidongphanbien($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
		$this->db->join('nhom','nhom.idnhom=dangkydetai.idnhom');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('hoidongpb','hoidongpb.idhoidong=dangkydetai.idhoidong');
		$this->db->join('chitiethoidong','chitiethoidong.idhoidong=hoidongpb.idhoidong');
		$this->db->join('giaovien','giaovien.idgv=chitiethoidong.idgv');
		
        $this->db->where("dangkydetai.iddetai",$id);
		
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
    }
	
	
	function getgvpb($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		//$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('giaovien','giaovien.idgv=dangkydetai.idgvpb');
		
        $this->db->where("dangkydetai.iddetai",$id);
		
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function gethdpb($id){
        //$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('hoidongpb','hoidongpb.idhoidong=dangkydetai.idhoidong');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('giaovien','giaovien.idgv=dangkydetai.idgvpb');
		
        $this->db->where("dangkydetai.iddetai",$id);
		
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function showdanhmuccon(){
        
		//$this->db->join('hoidongpb','hoidongpb.idhoidong=chitiethoidong.idhoidong');
        $this->db->select('*');
		
		$this->db->order_by("iddmcha","asc");
        $query = $this->db->get('danhmuccon');
        
        
            return $query->result_array();
        
    }
	
	function showdanhmucsubcon(){
        
		//$this->db->join('hoidongpb','hoidongpb.idhoidong=chitiethoidong.idhoidong');
        $this->db->select('*');
		
		$this->db->order_by("iddmcon","asc");
        $query = $this->db->get('danhmucsubcon');
        
        
            return $query->result_array();
        
    }
	
	function showdanhmuccon1($id){
        
		//$this->db->join('hoidongpb','hoidongpb.idhoidong=chitiethoidong.idhoidong');
        $this->db->select('*');
		$this->db->where("iddmcha",$id);
		//$this->db->order_by("iddmcha","asc");
        $query = $this->db->get('danhmuccon');
        
        
            return $query->result_array();
        
    }
	
	function showdanhmuccon2($id){
        
		//$this->db->join('hoidongpb','hoidongpb.idhoidong=chitiethoidong.idhoidong');
        $this->db->select('*');
		$this->db->where("iddmcon",$id);
        $query = $this->db->get('danhmucsubcon');
        
        
            return $query->result_array();
        
    }
	
	function showdanhmuccha(){
        
		
        $this->db->select('*');
		$this->db->where("anhien","0");
		$this->db->order_by("vitri","asc");
        $query = $this->db->get('danhmucs');
        
        
            return $query->result_array();
        
    }
	
	function showbanner(){
        
		
        $this->db->select('*');
		$this->db->where("anhien","0");
		$this->db->order_by("thutu","asc");
		$this->db->order_by("tuychon","asc");
        $query = $this->db->get('banner');
        
        
            return $query->result_array();
        
    }
	
	function showdanhmucchaduoi(){
        
		
        $this->db->select('*');
		$this->db->where("anhienthem","0");
		$this->db->order_by("vitri","asc");
        $query = $this->db->get('danhmucs');
        
        
            return $query->result_array();
        
    }
	
	
	
	function lay1loaidoan($id){
        
		
        $this->db->select('*');
		$this->db->where('idloaidoan',$id);
        $query = $this->db->get('loaidoan');
        
        
            return $query->result_array();
        
    }
	
	function loaichuyennganh(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('chuyennganh');
        
        
            return $query->result_array();
        
    }
	
	function laykhoahoc(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('khoahoc');
        
        
            return $query->result_array();
        
    }
	
	
	function laychitiethoidong($id){
        
		//$this->db->join('hoidongpb','hoidongpb.idhoidong=chitiethoidong.idhoidong');
        $this->db->select('*');
		
		$this->db->where('hoidongpb.idhoidong',$id);
        $query = $this->db->get('hoidongpb');
        
        
            return $query->row_array();
        
    }
	
	function laychitiethoidonggv($id){
        
		$this->db->join('giaovien','giaovien.idgv=chitiethoidong.idgv');
        $this->db->select('*');
		
		$this->db->where('chitiethoidong.idhoidong',$id);
        $query = $this->db->get('chitiethoidong');
        
        
            return $query->result_array();
        
    }
	
	function layallgiaovien(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('giaovien');
        
        
            return $query->result_array();
        
    }
	
	function layallhoidong(){
        
		
        $this->db->select('*');
		
        $query = $this->db->get('hoidongpb');
        
        
            return $query->result_array();
        
    }
	
	function laytongnhom($id){
        
		
        $this->db->select('*');
		$this->db->where('idsv',$id);
		//$this->db->where('idnhom',$id);
        $query = $this->db->get('nhom');
        
        
            return $query->result_array();
        
    }
	
	function laytintuc($id){
        
		
        $this->db->select('*');
		$this->db->where('idtin',$id);
		//$this->db->where('idnhom',$id);
        $query = $this->db->get('tintuc');
        
        
            return $query->row_array();
        
    }
	
	function tinlienquan($off="",$limit=5){
        
		
        $this->db->select('*');
		$this->db->limit($limit);
        $this->db->order_by("idtin","desc");
		//$this->db->where('idtin',$id);
		//$this->db->where('idnhom',$id);
        $query = $this->db->get('tintuc');
        
            return $query->result_array();
        
        
    }
	
	function laynhomsv($id){
        
		
        $this->db->select('*');
		//$this->db->where('idsv',$id);
		$this->db->where('idnhom',$id);
        $query = $this->db->get('nhom');
        
        
            return $query->result_array();
        
    }
	
	function laynhomsvchinhthuc($id){
        
		
        $this->db->select('*');
		//$this->db->where('idsv',$id);
		$this->db->where('idnhom',$id);
		$this->db->where('chinhthuc',1);
        $query = $this->db->get('nhom');
        
        
            return $query->result_array();
        
    }
	
	function laynhomtruong($id){
        
		
        $this->db->select('*');
		//$this->db->where('idsv',$id);
		$this->db->where('nhomtruong',$id);
        $query = $this->db->get('sonhom');
        
        
            return $query->row_array();
        
    }
	
	function layloaidoan($id){
        
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
        $this->db->select('*');
		//$this->db->where('idsv',$id);
		$this->db->where('iddetai',$id);
        $query = $this->db->get('detai');
        
        
            return $query->row_array();
        
    }
	
	
	
	function laythongtinthanhvien($id)
	{
		$this->db->join('nhom','nhom.idsv=sinhvien.idsv');
		$this->db->where("sinhvien.idsv",$id);
		
        $query = $this->db->get('sinhvien');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
	}
	
	function laythanhvientrongnhom($id)
	{
		$this->db->join('sinhvien','sinhvien.idsv=nhom.idsv');
		$this->db->where("idnhom",$id);
		
        $query = $this->db->get('nhom');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
	}
	
	function laythoigiandangky($id,$stt){
        
		
        $this->db->select('*');
		//$this->db->where('idsv',$id);
		$this->db->where('idkhoahoc',$id);
		$this->db->where('mathoigian',$stt);
        $query = $this->db->get('thoigian');
        
        
            return $query->row_array();
        
    }
	
	function laydetai($id1,$id2){
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->order_by("iddetai","asc");
		
        $this->db->where("detai.idnganh",$id1);
		$this->db->where("khoahoc.idkhoahoc",$id2);
		$this->db->where("detai.anhien",1);
        $query = $this->db->get('detai');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
    }
	
	function locdetaichon($id1,$id2,$id3){
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->order_by("iddetai","asc");
		
        $this->db->where("detai.idnganh",$id1);
		$this->db->where("khoahoc.idkhoahoc",$id2);
		$this->db->where("detai.chon",$id2);
        $query = $this->db->get('detai');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
    }
	
	function laydetai1($id1,$id2){
	$this->db->select('DISTINCT(detai.idgv)'); 
	$this->db->select('giaovien.tengv'); 
	$this->db->select('detai.anhien'); 
        $this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		//$this->db->order_by("iddetai","asc");
		$this->db->where("detai.anhien",1);
        $this->db->where("detai.idnganh",$id1);
		$this->db->where("khoahoc.idkhoahoc",$id2);
        $query = $this->db->get('detai');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
    }
	
	
	
	
	
	function laysinhviendkdetai($id2=1){
        
		
		
		$this->db->join('dangkydetai','dangkydetai.iddetai=detai.iddetai');
		$this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=sonhom.nhomtruong');
		
        //$this->db->where("dangkydetai.idnhom",$id1);
		$this->db->where("detai.chon",$id2);
        $query = $this->db->get('detai');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
    }
	
	function ktdetaidangky($id){
        
		
		
		
		$this->db->where("idnhom",$id);
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
    }
	
	
	
	function laydetaidachon($id1){
        $this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=sonhom.nhomtruong');
		
        $this->db->where("dangkydetai.idnhom",$id1);
		//$this->db->where("iddetai",$id2);
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	function laydetaixem($id1){
        
		
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		
		
		
		
        $this->db->where("iddetai",$id1);
		//$this->db->where("iddetai",$id2);
        $query = $this->db->get('detai');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	
	function laysinhviendachondetai($id1){
        $this->db->join('sonhom','sonhom.idnhom=dangkydetai.idnhom');
		$this->db->join('detai','detai.iddetai=dangkydetai.iddetai');
		$this->db->join('loaidoan','loaidoan.idloaidoan=detai.idloaidoan');
		$this->db->join('chuyennganh','chuyennganh.idnganh=detai.idnganh');
		$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		$this->db->join('giaovien','giaovien.idgv=detai.idgv');
		$this->db->join('nhom','nhom.idnhom=sonhom.idnhom');
		$this->db->join('sinhvien','sinhvien.idsv=sonhom.nhomtruong');
		
        $this->db->where("dangkydetai.idnhom",$id1);
		//$this->db->where("iddetai",$id2);
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
    }
	
	
	

    //---- Lay thong tin qua email
    function getInfoByEmail($email){
        $this->db->where("email",$email);
        $query = $this->db->get($this->_table);

        if($query)
            return $query->row_array();
        else
            return FALSE;
    }

    //--- Them User moi
    function addUser($data){
        if($this->db->insert("khachhang",$data))
            return TRUE;
        else
            return FALSE;
    }
	
	
	function adddetai($data){
        if($this->db->insert('detai',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function getalldanhmucnum(){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
        $query = $this->db->get('danhmucs');
        
        return $query->num_rows();
    }
	
	function getalldanhmuc($off="",$limit=""){
		
        //$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		
		
        $this->db->limit($off,$limit);
        $this->db->order_by("id","desc");
        $query = $this->db->get('danhmucs');
        
        return $query->result_array();
    }
	
	function adddanhmuccha($data){
        if($this->db->insert('danhmucs',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddanhmuccon($data){
        if($this->db->insert('danhmuccon',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddanhmucsubcon($data){
        if($this->db->insert('danhmucsubcon',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function addsinhvien($data){
        if($this->db->insert('sinhvien',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function addsanpham($data){
        if($this->db->insert('sanpham',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function addhoidong($data){
        if($this->db->insert('hoidongpb',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function addgvhoidong($data){
        if($this->db->insert('chitiethoidong',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function addketqua($data){
        if($this->db->insert('kqdoan',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function addsonhom($data){
        if($this->db->insert('sonhom',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	
	
	function laysonhom($data){
        $this->db->where("nhomtruong",$data);
		
        $query = $this->db->get('sonhom');
        
        if($query)
            return $query->row_array();
        else
            return FALSE;
           
    }
	
	function ktnhom($data){
        $this->db->where("idsv",$data);
		
        $query = $this->db->get('nhom');
        
        if($query)
            return $query->num_rows();
        else
            return FALSE;
           
    }
	
	function ktdetai($data){
        $this->db->where("idnhom",$data);
		
        $query = $this->db->get('dangkydetai');
        
        if($query)
            return $query->num_rows();
        else
            return FALSE;
           
    }
	
	function loadnhom(){
        
		$this->db->join('sinhvien','sinhvien.idsv=sonhom.nhomtruong');
		$this->db->join('chuyennganh','chuyennganh.idnganh=sinhvien.idnganh');
		$this->db->order_by("idnhom","desc");
        $query = $this->db->get('sonhom');
        
        if($query)
            return $query->result_array();
        else
            return FALSE;
           
    }
	
	function addnhom($data){
        if($this->db->insert('nhom',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddetaidk($data){
        if($this->db->insert('dangkydetai',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddiemtuandetai($data){
        if($this->db->insert('diemtuan',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddiemhddetai($data){
        if($this->db->insert('diemgvhd',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddiempbdetai($data){
        if($this->db->insert('diemphanbien',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddiemhoidongdetai($data){
        if($this->db->insert('diemhoidong',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function adddetaidadk($id,$data){
        $this->db->where("iddetai",$id);
        if($this->db->update('detai',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function duyetdetai($id,$data=1){
        $this->db->where("iddetai",$id);
        if($this->db->update('detai.anhien',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	

    //--- Xoa user
    function deleteUser($id){
        if($id!=1){
            $this->db->where("idsv",$id);
            $this->db->delete($this->_table);
        }
    }
	
	function deletedetai($id){
        
            $this->db->where("iddetai",$id);
            $this->db->delete('detai');
        
    }
	
	function deletedoan($id){
        
            $this->db->where("idloaidoan",$id);
            $this->db->delete('loaidoan');
        
    }
	
	function deletedanhmuc($id){
        
            $this->db->where("id",$id);
            $this->db->delete('danhmucs');
        
    }
	
	function deletedanhmuccha($id){
        
            $this->db->where("iddmcha",$id);
            $this->db->delete('danhmuccha');
        
    }
	
	function deletedanhmuccon($id){
        
            $this->db->where("iddmcon",$id);
            $this->db->delete('danhmuccon');
        
    }
	
	function deletedanhmucsubcon($id){
        
            $this->db->where("iddmsubcon",$id);
            $this->db->delete('danhmucsubcon');
        
    }
	
	function deletetintuc($id){
        
            $this->db->where("stt",$id);
            $this->db->delete('sanpham');
        
    }
	
	function deletehoidong($id){
        
            $this->db->where("idhoidong",$id);
            $this->db->delete('hoidongpb');
        
    }
	
	function deletethanhviennhom($id){
        
            $this->db->where("idsv",$id);
            $this->db->delete('nhom');
        
    }
	
	function deletenhom($id){
        
			$this->db->where("idnhom",$id);
            $this->db->delete('nhom');
            
			
        
    }
	
	function deletenhom1($id){
        
			
            $this->db->where("idnhom",$id);
            $this->db->delete('sonhom');
			
        
    }

    //--- Cap nhat user
    function updateUser($data,$id){
        $this->db->where("idkhach",$id);
        if($this->db->update("khachhang",$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updateUser1($data,$id){
        $this->db->where("idkhach",$id);
        if($this->db->update("khachhang",$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatedetai($data,$id){
        $this->db->where("iddetai",$id);
        if($this->db->update('detai',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatediemtuan($data,$id1,$id2,$id3){
		$this->db->where("idsv",$id1);
        $this->db->where("iddetai",$id2);
		
		$this->db->where("tuanthu",$id3);
        if($this->db->update('diemtuan',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatediemhd($data,$id1,$id2){
		$this->db->where("idsv",$id1);
        $this->db->where("iddetai",$id2);
		
		
        if($this->db->update('diemgvhd',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatediempb($data,$id1,$id2){
		$this->db->where("idsv",$id1);
        $this->db->where("iddetai",$id2);
		
		
        if($this->db->update('diemphanbien',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatediemhoidong($data,$id1,$id2,$id3){
		$this->db->where("idsv",$id1);
        $this->db->where("iddetai",$id2);
		$this->db->where("idgv",$id3);
		
		
        if($this->db->update('diemhoidong',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatedoan($data,$id){
        $this->db->where("idloaidoan",$id);
        if($this->db->update('loaidoan',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatesinhvien($data,$id){
        $this->db->where("idsv",$id);
        if($this->db->update('sinhvien',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatetintuc($data,$id){
        $this->db->where("idtin",$id);
        if($this->db->update('tintuc',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function deletebanner($id){
        
            $this->db->where("idbanner",$id);
            $this->db->delete('banner');
        
    }
	
	function updatesanpham($data,$id){
        $this->db->where("stt",$id);
        if($this->db->update('sanpham',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatebanner($data,$id){
        $this->db->where("idbanner",$id);
        if($this->db->update('banner',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatehoidong($data,$id){
        $this->db->where("idhoidong",$id);
        if($this->db->update('hoidongpb',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatedanhmuccha($data,$id){
        $this->db->where("id",$id);
        if($this->db->update('danhmucs',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function getsodanhmuccon($parent_id){
		
        //$this->db->join('khoahoc','khoahoc.idkhoahoc=loaidoan.idkhoahoc');
		
		
        //$this->db->limit($off,$limit);
        //$this->db->order_by("idloaidoan","desc");
		$this->db->where("parent_id",$parent_id);
        $query = $this->db->get('danhmucs');
        
        return $query->num_rows();
    }
	
	function updatedanhmuccon($data,$id){
        $this->db->where("iddmcon",$id);
        if($this->db->update('danhmuccon',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatedanhmucsubcon($data,$id){
        $this->db->where("iddmsubcon",$id);
        if($this->db->update('danhmucsubcon',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatephanconghoidong($data,$id){
        $this->db->where("iddetai",$id);
        if($this->db->update('dangkydetai',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	function updatechinhthuc($id,$data){
        $this->db->where("idsv",$id);
        if($this->db->update('nhom',$data))
            return TRUE;
        else
            return FALSE;
    }
	
	

    // Tong so record
    function num_rows($id){
		$this->db->where("idgv",$id);
		$num=$this->db->count('detai');
        return $num;
    }
    
    
    //---- Kiem tra username hop le
    function getUser($username,$id){
        if(isset($id)){ //use for update
           $this->db->where("username",$username);
           $this->db->where("idsv !=",$id);
           $query = $this->db->get($this->_table);
        }
        else{ //user for add
            $this->db->where("username",$username);
            $query = $this->db->get($this->_table);
        }
        
        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    //--- da kich hoat 
    function actived($userid){
        $this->db->select("userid,active");
        $this->db->where("userid",$userid);
        $query = $this->db->get($this->_table);
        $info  = $query->row_array();
        if($info){
            if($info['active']==1)
            return TRUE;
        else
            return FALSE;
        }
        else
        {
            return FALSE;
        }
    }
    
    //--- Kiem tra userid và key
    function checkActive($userid,$key){
         if($userid!="" && $key!=""){
            
            $this->db->where("userid",$userid);
            $this->db->where("md5(salt)",$key);
            $query = $this->db->get($this->_table);
            if($query->num_rows()!=0){
                
                return $query->row_array();
                
            }else{
                return FALSE;
            }
            
        }else{
            return FALSE;
        }
    }
    //--- Kiem tra Email
    function checkEmail($email,$id=""){
        
        if(isset($id) && $id!="")
        { //use for update
           $this->db->where("email",$email);
           $this->db->where("userid !=",$id);
           $query = $this->db->get($this->_table);
        }
        else
        { //user for add
            $this->db->where("email",$email);
            $query = $this->db->get($this->_table);
        }
        
        if($query->num_rows()!=0){
            return FALSE;
        }
        else{
            return TRUE;
        }
        
    }
    
    //--- Kiem tra dang nhap
    //----------------------------- CHECK LOGIN
    function checkLogin($username,$password){
        $u = $username;
        $p = md5($password);
        $this->db->where("username",$u);
        $this->db->where("password",$p);
        $query = $this->db->get($this->_table);
        if($query->num_rows()==0){
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
	
	function checkLogingv($username,$password){
        $u = $username;
        $p = md5($password);
        $this->db->where("username",$u);
        $this->db->where("password",$p);
        $query = $this->db->get('giaovien');
        if($query->num_rows()==0){
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
	
	function checkLogintbm($username,$password){
        $u = $username;
        $p = md5($password);
		//$this->db->join("quyen","quyen.idquyen=admin.idquyen");
        $this->db->where("username",$u);
        $this->db->where("password",$p);
        $query = $this->db->get('admin');
        if($query->num_rows()==0){
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
	
	function checkLoginuser($username,$password){
        $u = $username;
        $p = md5($password);
		//$this->db->join("quyen","quyen.idquyen=admin.idquyen");
        $this->db->where("username",$u);
        $this->db->where("password",$p);
        $query = $this->db->get('khachhang');
        if($query->num_rows()==0){
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
	function checkLoginuserfb($username,$password){
        $u = $username;
        $p = $password;
		//$this->db->join("quyen","quyen.idquyen=admin.idquyen");
        $this->db->where("username",$u);
        $this->db->where("password",$p);
        $query = $this->db->get('khachhang');
        if($query->num_rows()==0){
            return FALSE;
        }
        else{
            return $query->row_array();
        }
        
    }
}
?>