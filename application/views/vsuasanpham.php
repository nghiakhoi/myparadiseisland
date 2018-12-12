<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
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
  
  xmlhttp.open("GET",'<?php echo base_url();?>index.php/ajax/ajax_level2/'+str,true);
  xmlhttp.send();
}
</script>

<script>
function showUser1(str) {
  if (str=="") {
    document.getElementById("txtHint1").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET",'<?php echo base_url();?>index.php/ajax/ajax_level2a/'+str,true);
  xmlhttp.send();
}
</script>


<?php //print_r($loaidoan);?>

<?php
$ngaythang= date('d/m/Y');
  


    $idsp = array(
                        'name'        => 'idsp',
                        'id'          => 'idsp',
                        'width'          => '10px',
						'class'        => 'inp-form',
						'value'        => $info['id'],
                    );

    $tensp = array(
                        'name'        => 'tensp',
                        'id'          => 'tensp',
                        'width'          => '10px',
						'class'        => 'inp-form',
						'value'        => $info['tensp'],
                    );
	
    $motangan = array(
                        'name'        => 'motangan',
                        'id'          => 'motangan',
                        'value'        => $info['motangan'],
						
                    );
	
    $tukhoa = array(
                        'name'        => 'tukhoa',
                        'id'          => 'tukhoa',
                        'class'        => 'inp-form',
						'value'        => $info['tukhoa'],
                    );
					
	$size = array(
                        'name'        => 'size',
                        'id'          => 'size',
                        'class'        => 'inp-form',
						'value'        => $info['size'],
                    );
	$trongluong = array(
                        'name'        => 'trongluong',
                        'id'          => 'trongluong',
                        'class'        => 'inp-form',
						'value'        => $info['trongluong'],
                    );
	$giagoc = array(
                        'name'        => 'giagoc',
                        'id'          => 'giagoc',
                        'class'        => 'inp-form',
						'value'        => $info['giagoc'],
                    );		
				
	$giagiam = array(
                        'name'        => 'giagiam',
                        'id'          => 'giagiam',
                        'class'        => 'inp-form',
						'value'        => $info['giagiam'],
                    );
					
	$ngayketthuc = array(
                        'name'        => 'ngayketthuc',
                        'id'          => 'ngayketthuc',
                        'class'        => 'inp-form',
						'value'        => $info['ngayketthuc'],
                    );
	
	
	$des = array(
                        'name'        => 'des',
                        'id'          => 'des',
                        
						'value'        => $info['des'],
                    );
	$diemnoibat = array(
                        'name'        => 'diemnoibat',
                        'id'          => 'diemnoibat',
                        'class'        => 'inp-form',
						'value'        => $info['diemnoibat'],
                    );
	$dieukien = array(
                        'name'        => 'dieukien',
                        'id'          => 'dieukien',
                        'class'        => 'inp-form',
						'value'        => $info['dieukien'],
                    );
	$motachitiet = array(
                        'name'        => 'motachitiet',
                        'id'          => 'motachitiet',
                        'class'        => 'inp-form',
						'value'        => $info['motachitiet'],
                    );
	$ngayketthuc = array(
                        'name'        => 'ngayketthuc',
                        'id'          => 'ngayketthuc',
                        'class'        => 'inp-form',
						'value'        => $info['ngayketthuc'],
                    );
	$hinhthuc = array(
                        'name'        => 'hinhthuc',
                        'id'          => 'hinhthuc',
                        'class'        => 'inp-form',
						'value'        => $info['hinhthuc'],
                    );
	$thutu = array(
                        'name'        => 'thutu',
                        'id'          => 'thutu',
                        'class'        => 'inp-form',
						'value'        => $info['thutu'],
						'placeholder'  => 'Thứ tự ưu tiên để hiển thị sản phẩm trên cùng',
                    );
    
					
	
	
	
	$submit = array(
                        "name"=>"ok",
                        "value"=>"Sửa",
						
                    );
					
				
					
?>


<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>

  

<div class="container-fluid">
        <div id="content-wrapper" class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="page-header">
                            <h1 class="pull-left">
                               
                                <span>Sản phẩm</span>
                            </h1>
                            
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12 box">
                        <div class="box-header blue-background">
                            <div class="title">Sửa sản phẩm</div>
                            
                        </div>
                        <div class="box-content">
                            <form method="POST" enctype="multipart/form-data" accept-charset="utf-8" style="margin-bottom: 0;" class="form form-horizontal " >
															
                                <div class="control-group">
                                    <label for="validation_name" class="control-label">Ẩn / Hiện sản phẩm: </label>
									
                                    <div class="controls">
                                        <select  name="anhien" class="styledselect_form_1" style="width:100px;">
		
				
                   <option value="<?php if($info['anhien']==0) echo "0"; else echo "1";?>"><?php if($info['anhien']==0) echo "Hiện"; else echo "Ẩn";?></option>
					<option value="<?php if($info['anhien']==0) echo "1"; else echo "0";?>"><?php if($info['anhien']==0) echo "Ẩn"; else echo "Hiện";?></option>
					
                 
                </select>
				<?php echo form_input($thutu); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="validation_email" class="control-label">Mã sản phẩm: </label>
                                    <div class="controls">
                                        <?php echo form_input($idsp); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="validation_password" class="control-label">Tên sản phẩm: </label>
                                    <div class="controls">
                                    <?php echo form_input($tensp); ?>
									</div>
                                </div>
                                <div class="control-group">
                                    <label for="validation_password_confirmation" class="control-label">Từ khóa: </label>
                                    <div class="controls">
										<?php echo form_input($tukhoa); ?>
									</div>
                                </div>
								
								<div class="control-group">
                                    <label for="validation_password_confirmation" class="control-label">Giá: </label>
                                    <div class="controls">
										<?php echo form_input($giagiam); ?>
									</div>
                                </div>
								
								<div class="control-group">
                                    <label for="validation_password_confirmation" class="control-label">Mô tả ngắn: </label>
                                    <div class="controls">
										<?php echo form_textarea($des)?>
									</div>
                                </div>
								
								<div class="control-group">
                                    <label for="validation_password_confirmation" class="control-label">Mô tả chi tiết: </label>
                                    <div class="controls">
										<?php echo form_textarea($motachitiet)?><script type="text/javascript">
                        CKEDITOR.replace( 'motachitiet' );
						//CKEDITOR.config.height=100;
                </script>
				<br><span style="color:red;font-weight:bold;">*Ghi chú: Hình ảnh trong Mô tả chi tiết nên đặt Width(Độ rộng)=600px, Height(Độ cao) sẽ tự động cân chỉnh</span>
									</div>
                                </div>
								
								<div class="control-group">
                                    <label for="validation_password_confirmation" class="control-label">Thuộc danh mục: </label>
                                    <div class="controls">
										<select  name="danhmuccha" class="styledselect_form_1" required="required">
					
                    
					<?php
					function cate_parent($data, $parent=0, $str="==", $selected=0, $ids=null){
    foreach($data as $val){
        $id = $val['id'];
        $name = $val['tendanhmuc'];
        if($val['parent_id']==$parent){
            if($selected!=0 && $id==$selected){
                echo "<option value='$id' selected='selected'>$str $name</option>";
            }else{
                if( $id==$ids){
                   echo "<option value='$id' disabled >$str $name</option>"; 
               }else{
                echo "<option value='$id' >$str $name</option>";
            } 
        }

        cate_parent($data, $id, $str."==",$selected,$ids);
    }
}
}

					cate_parent($danhmuccha, 0, "==", $info['parent_id']);?>

                </select>
									</div>
                                </div>
								
								<div class="control-group">
                                    <label  class="control-label">Hình ảnh chính: </label>
                                    <div class="controls">
										<input type="file"  name="img" id="img" >
										<img width="100px" height="100px" src="<?php echo base_url();?>uploads/<?php echo $info['hinhanhchinh'];?>"  border="0" />
			
									</div>
                                </div>
								
								<div class="control-group">
                                    <label  class="control-label">Hình ảnh phụ: </label>
                                    <div class="controls">
										<input type="file" name="imglist[]" id="imglist" multiple="multiple" >
										<?php $hinhanh=explode("|", $info['hinhanhphu']); 
	for($j=0;$j<count($hinhanh);$j++)
	{
	if($hinhanh[$j]!=null)
	{
?>
<img  src="<?php echo base_url();?>uploads/<?php echo $hinhanh[$j];?>" width="44" height="44"  />
<?php }else break;}?>
									</div>
                                </div>
								
								<div class="control-group">
                                    <label for="validation_password_confirmation" class="control-label">Các mẫu sản phẩm: </label>
                                    <div class="controls">
										<?php echo form_input($size); ?>
									</div>
                                </div>
                                
                                
                                <div style="margin-bottom:0" class="form-actions">
                                    <button type="submit" name="ok" class="btn btn-primary">
                                        <i class="icon-save"></i>
                                        Sửa
                                    </button>
									<button type="reset" name="reset" class="btn btn-warning">
                                        <i class="icon-remove"></i>
                                        Hủy
                                    </button>
									
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>