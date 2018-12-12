<div class="container-fluid">
<div id="content-wrapper" class="row-fluid">
<div class="span12">
<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1 class="pull-left">
                
                <span>Đơn Hàng</span>
            </h1>
           
        </div>
    </div>
</div>

<div class="row-fluid">
<div style="margin-bottom:0;" class="span12 box bordered-box orange-border">
<div class="box-header blue-background">
    <div class="title">Danh sách đơn hàng</div>
    
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<div role="grid" class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
<div class="row-fluid">
<div class="span12 text-right"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label></div></div></div><table style="margin-bottom:0;" class="data-table table table-bordered table-striped dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="
        Name
    : activate to sort column descending">
        Mã đơn hàng
    </th>
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 304px;" aria-label="
        E-mail
    : activate to sort column ascending">
        Tên khách hàng
    </th>
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 304px;" aria-label="
        Status
    : activate to sort column ascending">
        Phone
    </th>
	
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 204px;" aria-label="
        Status
    : activate to sort column ascending">
        Ngày đặt
    </th>
	
	
	
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 304px;" aria-label="
        Status
    : activate to sort column ascending">
        Tổng tiền
    </th>
	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 143px;" aria-label=": activate to sort column ascending">Tùy chọn</th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php $dem=0; foreach($users as $item)
					{
					
					?>

<tr class="odd" >
    <td class="  sorting_1"><?php echo $item['idhoadon'];?>
	<input type="hidden" name="idhoadon<?php echo $dem;?>" id="idhoadon<?php echo $dem;?>" value="<?php echo $item['idhoadon'];?>" />
	</td>
    <td class=" "><?php echo $item['tenkhach'];?></td>
	<td class=" "><?php echo $item['phone'];?></td>
	<td class=" "><?php echo $item['ngaydat'];?></td>
	
	<td class=" "><span style="color:#009900;font-weight:bold;"><?php echo number_format($item['tongtien'],"0",",",".");?></span></td>
    
    <td class=" ">
        <div class="text-right">
            <a onClick="showUserxx<?php echo $dem;?>();" data-target="#myModal" data-toggle="modal" href="#" class="btn btn-success btn-mini">
                <i class="icon-edit"></i>
            </a>
            <a href="<?php echo base_url();?>cadmin/xoadonhang/<?php echo $item['idhoadon'];?>" onclick="return confirm('Chắc chắn muốn xóa sản phẩm này?  ');" class="btn btn-danger btn-mini">
                <i class="icon-remove"></i>
            </a>
        </div>
    </td>
</tr>

<script>
function showUserxx<?php echo $dem;?>() {
	var giatri1 = document.getElementById('idhoadon<?php echo $dem;?>').value;
	
	var p1="idhoadon="+giatri1;
	
	
	
	var p=p1;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("myModal").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_showdonhang/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p);
}


</script>

<?php $dem++; };?>

</tbody></table></div>
</div>
</div>
</div>
</div>
</div>
<hr class="hr-double">
</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
</div>




</div>