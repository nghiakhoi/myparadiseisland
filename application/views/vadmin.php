<!DOCTYPE html>
<html>
<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Hệ thống Website</title>
    <!-- <link rel="icon" href="<?php echo base_url();?>/images/doanduyen.png" type="image/x-icon" /> -->
    <!-- <link rel="shortcut icon" href="<?php echo base_url();?>/images/doanduyen.png" type="image/x-icon" /> -->
    <!--[if lt IE 9]>
    <script src='<?php echo base_url();?>assets/javascripts/html5shiv.js' type='text/javascript'></script>
    <![endif]-->
    <link href='<?php echo base_url();?>assets/stylesheets/bootstrap/bootstrap.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo base_url();?>assets/stylesheets/bootstrap/bootstrap-responsive.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery ui -->
    <link href='<?php echo base_url();?>assets/stylesheets/jquery_ui/jquery-ui-1.10.0.custom.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo base_url();?>assets/stylesheets/jquery_ui/jquery.ui.1.10.0.ie.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / switch buttons -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery file upload -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/jquery_fileupload/jquery.fileupload-ui.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / full calendar -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/fullcalendar/fullcalendar.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / select2 -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/select2/select2.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / mention -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/mention/mention.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / tabdrop (responsive tabs) -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/tabdrop/tabdrop.css' media='all' rel='stylesheet' type='text/css' />
    
    <!-- / datatables -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/datatables/bootstrap-datatable.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / dynatrees (file trees) -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/dynatree/ui.dynatree.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / color picker -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/bootstrap_colorpicker/bootstrap-colorpicker.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / datetime picker -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / daterange picker) -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css' media='all' rel='stylesheet' type='text/css' />
    
    <!-- / slider nav (address book) -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/slider_nav/slidernav.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / fuelux (wizard) -->
    <link href='<?php echo base_url();?>assets/stylesheets/plugins/fuelux/wizard.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flatty theme -->
    <link href='<?php echo base_url();?>assets/stylesheets/light-theme.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='<?php echo base_url();?>assets/stylesheets/demo.css' media='all' rel='stylesheet' type='text/css' />

</head>
    
<body class='contrast-red'>
<header>
    <div class='navbar'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href="<?php echo base_url();?>cadmin">
                    <i class='icon-heart-empty'></i>
                    <span class='hidden-phone'>My Paradise Island</span>
                </a>
                <a class='toggle-nav btn pull-left' href='#'>
                    <i class='icon-reorder'></i>
                </a>
                <ul class='nav pull-right'>
                    
                    
                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <img alt='<?php echo $infoa['username']; ?>' height='23' src='https://graph.facebook.com/632213506/picture?type=normal' width='23' />
                            <span class='user-name hidden-phone'><?php echo "Xin chào ".$infoa['username']; ?></span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='user_profile.html'>
                                    <i class='icon-user'></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href='user_profile.html'>
                                    <i class='icon-cog'></i>
                                    Settings
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo base_url()."verify/logoutadmin";?>" onclick="return confirm('Bạn có muốn đăng xuất không?');">
                                    <i class='icon-signout'></i>
                                    Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form accept-charset="UTF-8" action="search_results.html" class="navbar-search pull-right hidden-phone" method="get" /><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                    <button class="btn btn-link icon-search" name="button" type="submit"></button>
                    <input autocomplete="off" class="search-query span2" id="q_header" name="q" placeholder="Search..." type="text" value="" />
                </form>
            </div>
        </div>
    </div>
</header>
<div id='wrapper'>
<div id='main-nav-bg'></div>
<nav class='' id='main-nav'>
<div class='navigation'>
<div class='search'>
    <form accept-charset="UTF-8" action="search_results.html" method="get" /><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
        <div class='search-wrapper'>
            <input autocomplete="off" class="search-query" id="q" name="q" placeholder="Search..." type="text" value="" />
            <button class="btn btn-link icon-search" name="button" type="submit"></button>
        </div>
    </form>
</div>
<ul class='nav nav-stacked'>
<li class='active'>
    <a href='<?php echo base_url();?>' target="_blank">
        <i class='icon-dashboard'></i>
        <span>Xem Home Page</span>
    </a>
</li>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-edit'></i>
        <span>DANH MỤC</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href="<?php echo base_url();?>cadmin/themdanhmuccha">
                <i class='icon-caret-right'></i>
                <span>Thêm Danh Mục</span>
            </a>
        </li>
        
		<li class=''>
            <a href="<?php echo base_url();?>cadmin/showdanhmuc">
                <i class='icon-caret-right'></i>
                <span>Xóa - Sửa Danh Mục</span>
            </a>
        </li>
		
    </ul>
</li>
<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-book'></i>
        <span>SẢN PHẨM</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href="<?php echo base_url();?>cadmin/themsanpham">
                <i class='icon-caret-right'></i>
                <span>Thêm Sản Phẩm</span>
            </a>
        </li>
        <li class=''>
            <a href="<?php echo base_url();?>cadmin/showsanpham">
                <i class='icon-caret-right'></i>
                <span>Xóa - Sửa Sản Phẩm</span>
            </a>
        </li>
    </ul>
</li>

<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-magic'></i>
        <span>BANNER</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href="<?php echo base_url();?>cadmin/thembanner">
                <i class='icon-caret-right'></i>
                <span>Thêm Banner</span>
            </a>
        </li>
        <li class=''>
            <a href="<?php echo base_url();?>cadmin/showbanner">
                <i class='icon-caret-right'></i>
                <span>Xóa - Sửa Banner</span>
            </a>
        </li>
    </ul>
</li>

<li>
    <a  href="<?php echo base_url();?>cadmin/showdonhang">
        <i class='icon-money'></i>
        <span>ĐƠN HÀNG</span>
        
    </a>
    
</li>

</ul>
</div>
</nav>
<section id='content'>

<?php echo $content_for_layout ;?>

</section>
</div>
<!-- / jquery -->
<script src='<?php echo base_url();?>assets/javascripts/jquery/jquery.min.js' type='text/javascript'></script>
<!-- / jquery mobile events (for touch and slide) -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/mobile_events/jquery.mobile-events.min.js' type='text/javascript'></script>

<!-- / jquery ui -->
<script src='<?php echo base_url();?>assets/javascripts/jquery_ui/jquery-ui.min.js' type='text/javascript'></script>
<!-- / bootstrap -->
<script src='<?php echo base_url();?>assets/javascripts/bootstrap/bootstrap.min.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/plugins/flot/excanvas.js' type='text/javascript'></script>

<!-- / bootstrap switch -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js' type='text/javascript'></script>
<!-- / fullcalendar -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/fullcalendar/fullcalendar.min.js' type='text/javascript'></script>
<!-- / datatables -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/datatables/jquery.dataTables.min.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js' type='text/javascript'></script>

<!-- / select2 -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/select2/select2.js' type='text/javascript'></script>
<!-- / color picker -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_colorpicker/bootstrap-colorpicker.min.js' type='text/javascript'></script>
<!-- / mention -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/mention/mention.min.js' type='text/javascript'></script>

<!-- / modernizr -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/modernizr/modernizr.min.js' type='text/javascript'></script>
<!-- / retina -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/retina/retina.js' type='text/javascript'></script>
<!-- / timeago -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/timeago/jquery.timeago.js' type='text/javascript'></script>
<!-- / slimscroll -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js' type='text/javascript'></script>
<!-- / autosize (for textareas) -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/autosize/jquery.autosize-min.js' type='text/javascript'></script>
<!-- / charCount -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/charCount/charCount.js' type='text/javascript'></script>
<!-- / validate -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/validate/jquery.validate.min.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/plugins/validate/additional-methods.js' type='text/javascript'></script>
<!-- / naked password -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/naked_password/naked_password-0.2.4.min.js' type='text/javascript'></script>
<!-- / nestable -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/nestable/jquery.nestable.js' type='text/javascript'></script>
<!-- / tabdrop -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/tabdrop/bootstrap-tabdrop.js' type='text/javascript'></script>

<!-- / bootbox -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootbox/bootbox.min.js' type='text/javascript'></script>

<!-- / ckeditor -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/ckeditor/ckeditor.js' type='text/javascript'></script>
<!-- / filetrees -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/dynatree/jquery.dynatree.min.js' type='text/javascript'></script>
<!-- / datetime picker -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js' type='text/javascript'></script>
<!-- / daterange picker -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_daterangepicker/moment.min.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js' type='text/javascript'></script>
<!-- / max length -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_maxlength/bootstrap-maxlength.min.js' type='text/javascript'></script>
<!-- / dropdown hover -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/bootstrap_hover_dropdown/twitter-bootstrap-hover-dropdown.min.js' type='text/javascript'></script>
<!-- / slider nav (address book) -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/slider_nav/slidernav-min.js' type='text/javascript'></script>
<!-- / fuelux -->
<script src='<?php echo base_url();?>assets/javascripts/plugins/fuelux/wizard.js' type='text/javascript'></script>
<!-- / flatty theme -->
<script src='<?php echo base_url();?>assets/javascripts/nav.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/tables.js' type='text/javascript'></script>

<!-- / demo -->
<script src='<?php echo base_url();?>assets/javascripts/demo/jquery.mockjax.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/demo/inplace_editing.js' type='text/javascript'></script>
<script src='<?php echo base_url();?>assets/javascripts/demo/charts.js' type='text/javascript'></script>

</body>
</html>