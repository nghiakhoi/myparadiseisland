<p style="font-size:20px !important;"></p>

<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <a href="<?php echo base_url();?>" target="_blank"><span>Xem Home Page</span></a>
    </h1>
    
</div>

<div class='row-fluid'>

<?php $this->load->view('thongketruycap');?>

	

    <div class='span6 box'>
        <div class='box-header'>
            <div class='title'>
                <div class='icon-inbox'></div>
                ĐƠN HÀNG
            </div>
            
        </div>
        <div class='row-fluid'>
            <div class='span6'>
                <div class='box-content box-statistic'>
                    <h3 class='title text-error'>191</h3>
                    <small>New</small>
                    <div class='text-error icon-inbox align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-warning'>311</h3>
                    <small>In process</small>
                    <div class='text-warning icon-check align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-info'>3</h3>
                    <small>Pending</small>
                    <div class='text-info icon-time align-right'></div>
                </div>
            </div>
            <div class='span6'>
                <div class='box-content box-statistic'>
                    <h3 class='title text-primary'>3</h3>
                    <small>Shipped</small>
                    <div class='text-primary icon-truck align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-success'>981</h3>
                    <small>Completed</small>
                    <div class='text-success icon-flag align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title muted'>0</h3>
                    <small>Canceled</small>
                    <div class='muted icon-remove align-right'></div>
                </div>
            </div>
        </div>
    </div>
    
</div>

</div>
</div>
</div>