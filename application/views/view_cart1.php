<?php session_start();
$_SESSION['phivanchuyen']=0;
$_SESSION['thanhtien']=$this->cart->total();
$_SESSION['tongtientam1']=$this->cart->total();
//echo $_SESSION['tongtientam1'];
?>

<script>


$(document).ready(
            function() {
                $(".menu ul li a#m3").attr("class","hovermenutop3");
				
				$("#tinhthanh").change(function(){
				
				 c = $("#tinhthanh").val();
	$("#txtHintvanchuyen").load('<?php echo base_url();?>index.php/ajax/ajax_level4/?vanchuyen='+c);
	$("#txtHinttongtien").load('<?php echo base_url();?>index.php/ajax/ajax_level41/?vanchuyen='+c);
	
	
}); 
				
				$(".refresh").on('change', function(){
				
				
				b=$(this).attr("name");
				d=$(this).attr("maso");
				
				a=$(this).val();
				
				$.ajax({
	  
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level13/",
         data : { 
		 soluong : a,
		 iddong : b,
		 id : d,
                    },
         success: function(result){
             
		 
		 $('#txtHint'+b).fadeOut(100).html(result).fadeIn(500);
		 $('#txtHint1'+b).fadeOut(100).html(result).fadeIn(500);
		$.ajax({
		
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level16/",
         data : { 
		 vanchuyen : $("#tinhthanh").val(),
                    },
         success: function(result){
		 
		 
		$('#txtHinttotal').fadeOut(100).html(result).fadeIn(500);
		$('#txtHinttotal1').fadeOut(100).html(result).fadeIn(500);
		   
         }
      });
		   
         }
      });
	  
	  
	  
	  
            });
            
            var timer;
            $('.btn-quantity-change1').on('mousedown', function(){
            var quanInput = $(this).parent().find('input');
            b=quanInput.attr("name");
				d=quanInput.attr("maso");
			var curValue = parseInt(quanInput.val(), 10);
			if (isNaN(curValue) || curValue<1) curValue = 1;
			if ($(this).hasClass('plus')) {
				curValue += 1;
                quanInput.val(curValue);
                $.ajax({
	  
	  
      type : "post",
       url: "<?php echo base_url();?>index.php/ajax/ajax_level13/",
       data : { 
       soluong : curValue,
       iddong : b,
       id : d,
                  },
       success: function(result){
       
       $('#txtHint'+b).fadeOut(100).html(result).fadeIn(500);
       $('#txtHint1'+b).fadeOut(100).html(result).fadeIn(500);
      $.ajax({
      
    
      type : "post",
       url: "<?php echo base_url();?>index.php/ajax/ajax_level16/",
       data : { 
       vanchuyen : $("#tinhthanh").val(),
                  },
       success: function(result){
       
       
      $('#txtHinttotal').fadeOut(100).html(result).fadeIn(500);
      $('#txtHinttotal1').fadeOut(100).html(result).fadeIn(500);
         
       }
    });
         
       }
    });
				
                
			} else {
				curValue -= 1;
				if (curValue < 1) curValue = 1;
                quanInput.val(curValue);
                $.ajax({
	  
	  
      type : "post",
       url: "<?php echo base_url();?>index.php/ajax/ajax_level13/",
       data : { 
       soluong : curValue,
       iddong : b,
       id : d,
                  },
       success: function(result){
       
       $('#txtHint'+b).fadeOut(100).html(result).fadeIn(500);
       $('#txtHint1'+b).fadeOut(100).html(result).fadeIn(500);
      $.ajax({
      
    
      type : "post",
       url: "<?php echo base_url();?>index.php/ajax/ajax_level16/",
       data : { 
       vanchuyen : $("#tinhthanh").val(),
                  },
       success: function(result){
       
       
      $('#txtHinttotal').fadeOut(100).html(result).fadeIn(500);
      $('#txtHinttotal1').fadeOut(100).html(result).fadeIn(500);
         
       }
    });
         
       }
    });
			}
		}).on('mouseup mouseleave', function(){
			clearInterval(timer);
		});



			
			$(".refreshsize").on('change', function(){
				
				
				b=$(this).attr("name");
				d=$(this).attr("maso");
				
				a=$(this).val();
				
				c=$('.id'+d).val();
				$.ajax({
	  
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level13size/",
         data : { 
		 sizechon : a,
		 iddong : b,
		 id : c,
                    },
         success: function(result){
           
		   
         }
      });
			});
			$(".refreshmau").on('change', function(){
				
				
				b1=$(this).attr("name");
				d1=$(this).attr("maso");
				
				a1=$(this).val();
				
				c1=$('.id'+d1).val();
				$.ajax({
	  
	  
		type : "post",
         url: "<?php echo base_url();?>index.php/ajax/ajax_level13mau/",
         data : { 
		 mauchon : a1,
		 iddong : b1,
		 id : c1,
                    },
         success: function(result){
            
		   
         }
      });
			});
            
            });

</script>

<script>
function laytinhthanh() {
	var giatri1 = document.getElementById('tinhthanh').value;
	
	var p1="tinhthanh="+giatri1;
	
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level6/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p1);
}


</script>

<script>
function layphuongxa() {
	var giatri1 = document.getElementById('quanhuyen').value;
	
	var p1="quanhuyen="+giatri1;
	
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("POST",'<?php echo base_url();?>index.php/ajax/ajax_level7/',true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(p1);
}


</script>

<div id="primary" class="container ">
		<main id="main" class="site-main" role="main">

			
				
				
<article id="post-5" class="post-5 page type-page status-publish hentry">
			
		<header class="entry-header">
			<h1 class="entry-title" itemprop="name">Cart</h1>		</header><!-- .entry-header -->
				<div class="entry-content main" itemprop="mainContentOfPage">
			<div class="woocommerce">
<div class="order-step1-page">
	<div class="row main">
		<div class="col-xs-12">
<form action="" name="myform" method="post">


<table class=" basket-table basket-big" cellspacing="0">
	<tfoot>
	<tr>
		<td class="clearfix" colspan="3">
                            
        
        <div class="coupon">
        <div class="form">
                    <div class="form-group ">
                        <label class="field-name">Họ và tên <span class="req">*</span>:</label>
                        <div class="input-container "><input type="text" value="" id="p_order_user_name" name="hoten" class="form-control" required="required" ></div>
                    </div>
                                        <div class="form-group ">
                        <label class="field-name">Điện thoại di động <span class="req">*</span>:</label>
                        <div class="input-container"><input type="text" onKeyPress="return isNumberKey(event)" value="" id="p_order_user_phone" name="dienthoai" class="form-control" required="required"></div>
                    </div>
                                        <div class="form-group ">
                        <label class="field-name">Số nhà/Thôn: <span class="req">*</span>:</label>
                        <div class="input-container"><input type="text" value="" id="p_order_user_address_street" name="sonha" class="form-control " ></div>
                    </div>
										<div class="form-group ">
                        <label class="field-name">Đường/Xóm: <span class="req">*</span>:</label>
                        <div class="input-container"><input type="text" value="" id="p_order_user_address_street" name="duong" class="form-control" ></div>
                    </div>
                                        <div class="form-group">
                        <div class="col ">
                            <label class="field-name">Thành phố <span class="req">*</span>:</label>
                            <select class="form-control " id="tinhthanh" onchange="laytinhthanh(this.value)" required="required" name="tinhthanh">
                                
								<option value="">- Chọn Tỉnh/Thành -</option>
<?php foreach($tinhthanh as $tinhthanh1){ ?>
<option value="<?php echo $tinhthanh1['provinceid'];?>"><?php echo $tinhthanh1['provincename'];?></option>
<?php }?>
								
							</select>
                        </div>
						<div id="txtHint2">
                        <div class="col ">
                            <label class="field-name">Quận huyện <span class="req">*</span>:</label>
                            <select class="form-control " id="quanhuyen" name="quanhuyen" required="required" onchange="layphuongxa(this.value)">
								<option value="">- Chọn Quận/Huyện -</option>
							</select>
                        </div>
						
						<div id="txtHint3">
                        <div class="col ">
                            <label class="field-name">Phường xã <span class="req">*</span>:</label>
                            <select class="form-control " id="phuongxa" name="phuongxa">
								<option value="">- Chọn Phường/Xã -</option>
							</select>
                        </div>
						</div>
						</div>
                    </div>
                    <div class="form-group">
                        <label class="field-name">Ghi chú</label>
                        <div class="input-container"><textarea class="form-control " name="ghichu" cols="1" rows="3"></textarea></div>
                    </div>
                    <div class="note">
                        <p>* This is note.</p>
                        <p class="req">* Free ship</p>
                    </div>
                </div>
		</div>


						<div class="buy-block clearfix cart_totals calculated_shipping">
		<table class="price-info">
		<tbody><tr>
			<td>Subtotal</td>
			<td id="txtHinttotal">   
            <span class="totalprice1 price-usd"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php $_SESSION['tongtientam']=$this->cart->total(); echo number_format($_SESSION['tongtientam'],"0",",",".");?></span></span></td>
		</tr>
		
					
			<tr class="shipping">
	<td>Shipping</td>

	<td data-title="Shipping">
					Free <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span></span> <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="legacy_international_delivery" class="shipping_method">		
		
					



	<p><a href="#" class="shipping-calculator-button-ap">Calculate Shipping</a></p>

	<section class="shipping-calculator-form" style="display:none;">

		<p class="form-row form-row-wide" id="calc_shipping_country_field">
			<div id="calc_shipping_country-styler" class="jq-selectbox jqselect country_to_state changed" style="display: inline-block; position: relative; z-index:100"><select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state" style="margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0;">
				<option value="">Select a country…</option>
				<option value="AX">Åland Islands</option><option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="PW">Belau</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo (Brazzaville)</option><option value="CD">Congo (Kinshasa)</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curaçao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="CI">Ivory Coast</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao S.A.R., China</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="IE">Republic of Ireland</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="SX">Saint Martin (Dutch part)</option><option value="MF">Saint Martin (French part)</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia/Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom (UK)</option><option value="US" selected="selected">United States (US)</option><option value="UM">United States (US) Minor Outlying Islands</option><option value="VI">United States (US) Virgin Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option>			</select><div class="jq-selectbox__select" style="position: relative"><div class="jq-selectbox__select-text">United States (US)</div><div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div></div><div class="jq-selectbox__dropdown" style="position: absolute; left: 0px; display: none;"><ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden" class="mCustomScrollbar _mCS_2 mCS_no_scrollbar"><div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 0px;" tabindex="0"><div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr"><li style="">Select a country…</li><li style="">Åland Islands</li><li style="">Afghanistan</li><li style="">Albania</li><li style="">Algeria</li><li style="">American Samoa</li><li style="">Andorra</li><li style="">Angola</li><li style="">Anguilla</li><li style="">Antarctica</li><li style="">Antigua and Barbuda</li><li style="">Argentina</li><li style="">Armenia</li><li style="">Aruba</li><li style="">Australia</li><li style="">Austria</li><li style="">Azerbaijan</li><li style="">Bahamas</li><li style="">Bahrain</li><li style="">Bangladesh</li><li style="">Barbados</li><li style="">Belarus</li><li style="">Belau</li><li style="">Belgium</li><li style="">Belize</li><li style="">Benin</li><li style="">Bermuda</li><li style="">Bhutan</li><li style="">Bolivia</li><li style="">Bonaire, Saint Eustatius and Saba</li><li style="">Bosnia and Herzegovina</li><li style="">Botswana</li><li style="">Bouvet Island</li><li style="">Brazil</li><li style="">British Indian Ocean Territory</li><li style="">British Virgin Islands</li><li style="">Brunei</li><li style="">Bulgaria</li><li style="">Burkina Faso</li><li style="">Burundi</li><li style="">Cambodia</li><li style="">Cameroon</li><li style="">Canada</li><li style="">Cape Verde</li><li style="">Cayman Islands</li><li style="">Central African Republic</li><li style="">Chad</li><li style="">Chile</li><li style="">China</li><li style="">Christmas Island</li><li style="">Cocos (Keeling) Islands</li><li style="">Colombia</li><li style="">Comoros</li><li style="">Congo (Brazzaville)</li><li style="">Congo (Kinshasa)</li><li style="">Cook Islands</li><li style="">Costa Rica</li><li style="">Croatia</li><li style="">Cuba</li><li style="">Curaçao</li><li style="">Cyprus</li><li style="">Czech Republic</li><li style="">Denmark</li><li style="">Djibouti</li><li style="">Dominica</li><li style="">Dominican Republic</li><li style="">Ecuador</li><li style="">Egypt</li><li style="">El Salvador</li><li style="">Equatorial Guinea</li><li style="">Eritrea</li><li style="">Estonia</li><li style="">Ethiopia</li><li style="">Falkland Islands</li><li style="">Faroe Islands</li><li style="">Fiji</li><li style="">Finland</li><li style="">France</li><li style="">French Guiana</li><li style="">French Polynesia</li><li style="">French Southern Territories</li><li style="">Gabon</li><li style="">Gambia</li><li style="">Georgia</li><li style="">Germany</li><li style="">Ghana</li><li style="">Gibraltar</li><li style="">Greece</li><li style="">Greenland</li><li style="">Grenada</li><li style="">Guadeloupe</li><li style="">Guam</li><li style="">Guatemala</li><li style="">Guernsey</li><li style="">Guinea</li><li style="">Guinea-Bissau</li><li style="">Guyana</li><li style="">Haiti</li><li style="">Heard Island and McDonald Islands</li><li style="">Honduras</li><li style="">Hong Kong</li><li style="">Hungary</li><li style="">Iceland</li><li style="">India</li><li style="">Indonesia</li><li style="">Iran</li><li style="">Iraq</li><li style="">Isle of Man</li><li style="">Israel</li><li style="">Italy</li><li style="">Ivory Coast</li><li style="">Jamaica</li><li style="">Japan</li><li style="">Jersey</li><li style="">Jordan</li><li style="">Kazakhstan</li><li style="">Kenya</li><li style="">Kiribati</li><li style="">Kuwait</li><li style="">Kyrgyzstan</li><li style="">Laos</li><li style="">Latvia</li><li style="">Lebanon</li><li style="">Lesotho</li><li style="">Liberia</li><li style="">Libya</li><li style="">Liechtenstein</li><li style="">Lithuania</li><li style="">Luxembourg</li><li style="">Macao S.A.R., China</li><li style="">Macedonia</li><li style="">Madagascar</li><li style="">Malawi</li><li style="">Malaysia</li><li style="">Maldives</li><li style="">Mali</li><li style="">Malta</li><li style="">Marshall Islands</li><li style="">Martinique</li><li style="">Mauritania</li><li style="">Mauritius</li><li style="">Mayotte</li><li style="">Mexico</li><li style="">Micronesia</li><li style="">Moldova</li><li style="">Monaco</li><li style="">Mongolia</li><li style="">Montenegro</li><li style="">Montserrat</li><li style="">Morocco</li><li style="">Mozambique</li><li style="">Myanmar</li><li style="">Namibia</li><li style="">Nauru</li><li style="">Nepal</li><li style="">Netherlands</li><li style="">New Caledonia</li><li style="">New Zealand</li><li style="">Nicaragua</li><li style="">Niger</li><li style="">Nigeria</li><li style="">Niue</li><li style="">Norfolk Island</li><li style="">North Korea</li><li style="">Northern Mariana Islands</li><li style="">Norway</li><li style="">Oman</li><li style="">Pakistan</li><li style="">Palestinian Territory</li><li style="">Panama</li><li style="">Papua New Guinea</li><li style="">Paraguay</li><li style="">Peru</li><li style="">Philippines</li><li style="">Pitcairn</li><li style="">Poland</li><li style="">Portugal</li><li style="">Puerto Rico</li><li style="">Qatar</li><li style="">Republic of Ireland</li><li style="">Reunion</li><li style="">Romania</li><li style="">Russia</li><li style="">Rwanda</li><li style="">São Tomé and Príncipe</li><li style="">Saint Barthélemy</li><li style="">Saint Helena</li><li style="">Saint Kitts and Nevis</li><li style="">Saint Lucia</li><li style="">Saint Martin (Dutch part)</li><li style="">Saint Martin (French part)</li><li style="">Saint Pierre and Miquelon</li><li style="">Saint Vincent and the Grenadines</li><li style="">Samoa</li><li style="">San Marino</li><li style="">Saudi Arabia</li><li style="">Senegal</li><li style="">Serbia</li><li style="">Seychelles</li><li style="">Sierra Leone</li><li style="">Singapore</li><li style="">Slovakia</li><li style="">Slovenia</li><li style="">Solomon Islands</li><li style="">Somalia</li><li style="">South Africa</li><li style="">South Georgia/Sandwich Islands</li><li style="">South Korea</li><li style="">South Sudan</li><li style="">Spain</li><li style="">Sri Lanka</li><li style="">Sudan</li><li style="">Suriname</li><li style="">Svalbard and Jan Mayen</li><li style="">Swaziland</li><li style="">Sweden</li><li style="">Switzerland</li><li style="">Syria</li><li style="">Taiwan</li><li style="">Tajikistan</li><li style="">Tanzania</li><li style="">Thailand</li><li style="">Timor-Leste</li><li style="">Togo</li><li style="">Tokelau</li><li style="">Tonga</li><li style="">Trinidad and Tobago</li><li style="">Tunisia</li><li style="">Turkey</li><li style="">Turkmenistan</li><li style="">Turks and Caicos Islands</li><li style="">Tuvalu</li><li style="">Uganda</li><li style="">Ukraine</li><li style="">United Arab Emirates</li><li style="">United Kingdom (UK)</li><li class="selected sel" style="">United States (US)</li><li style="">United States (US) Minor Outlying Islands</li><li style="">United States (US) Virgin Islands</li><li style="">Uruguay</li><li style="">Uzbekistan</li><li style="">Vanuatu</li><li style="">Vatican</li><li style="">Venezuela</li><li style="">Vietnam</li><li style="">Wallis and Futuna</li><li style="">Western Sahara</li><li style="">Yemen</li><li style="">Zambia</li><li style="">Zimbabwe</li></div><div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul></div></div>
		</p>

		<p class="form-row form-row-wide validate-required" id="calc_shipping_state_field">
			<span>
						<div id="calc_shipping_state-styler" class="jq-selectbox jqselect" style="display: inline-block; position: relative; z-index:100"><select name="calc_shipping_state" id="calc_shipping_state" placeholder="State / county" style="margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0;"><option value="">Select an option…</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option><option value="AA">Armed Forces (AA)</option><option value="AE">Armed Forces (AE)</option><option value="AP">Armed Forces (AP)</option></select><div class="jq-selectbox__select" style="position: relative"><div class="jq-selectbox__select-text" style="width: 100px;">Select a state…AlabamaAlaskaArizonaArkansasCaliforniaColoradoConnecticutDelawareDistrict Of ColumbiaFloridaGeorgiaHawaiiIdahoIllinoisIndianaIowaKansasKentuckyLouisianaMaineMarylandMassachusettsMichiganMinnesotaMississippiMissouriMontanaNebraskaNevadaNew HampshireNew JerseyNew MexicoNew YorkNorth CarolinaNorth DakotaOhioOklahomaOregonPennsylvaniaRhode IslandSouth CarolinaSouth DakotaTennesseeTexasUtahVermontVirginiaWashingtonWest VirginiaWisconsinWyomingArmed Forces (AA)Armed Forces (AE)Armed Forces (AP)</div><div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div></div><div class="jq-selectbox__dropdown" style="position: absolute; left: 0px; display: none;"><ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden" class="mCustomScrollbar _mCS_3 mCS_no_scrollbar"><div id="mCSB_3" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 0px;" tabindex="0"><div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr"><li class="selected sel" style="">Select a state…</li><li style="">Alabama</li><li style="">Alaska</li><li style="">Arizona</li><li style="">Arkansas</li><li style="">California</li><li style="">Colorado</li><li style="">Connecticut</li><li style="">Delaware</li><li style="">District Of Columbia</li><li style="">Florida</li><li style="">Georgia</li><li style="">Hawaii</li><li style="">Idaho</li><li style="">Illinois</li><li style="">Indiana</li><li style="">Iowa</li><li style="">Kansas</li><li style="">Kentucky</li><li style="">Louisiana</li><li style="">Maine</li><li style="">Maryland</li><li style="">Massachusetts</li><li style="">Michigan</li><li style="">Minnesota</li><li style="">Mississippi</li><li style="">Missouri</li><li style="">Montana</li><li style="">Nebraska</li><li style="">Nevada</li><li style="">New Hampshire</li><li style="">New Jersey</li><li style="">New Mexico</li><li style="">New York</li><li style="">North Carolina</li><li style="">North Dakota</li><li style="">Ohio</li><li style="">Oklahoma</li><li style="">Oregon</li><li style="">Pennsylvania</li><li style="">Rhode Island</li><li style="">South Carolina</li><li style="">South Dakota</li><li style="">Tennessee</li><li style="">Texas</li><li style="">Utah</li><li style="">Vermont</li><li style="">Virginia</li><li style="">Washington</li><li style="">West Virginia</li><li style="">Wisconsin</li><li style="">Wyoming</li><li style="">Armed Forces (AA)</li><li style="">Armed Forces (AE)</li><li style="">Armed Forces (AP)</li></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul></div></div>
					</span>		</p>

		
		
			<p class="form-row form-row-wide validate-required" id="calc_shipping_postcode_field">
				<input type="text" class="textinput" value="" placeholder="Postcode / ZIP" name="calc_shipping_postcode" id="calc_shipping_postcode">
			</p>

		
		<p><button type="submit" name="calc_shipping" value="1" class="btn-buy medium"><span class="btn-text">Update Totals</span></button></p>

		<input type="hidden" id="_wpnonce" name="_wpnonce" value="a2c0c1dd3c"><input type="hidden" name="_wp_http_referer" value="/cart/">	</section>


			</td>
</tr>

					
		
		
		
		<tr class="order-total">
            <td>Total</td>
            <td id="txtHinttotal1" data-title="Total">
            <input type="hidden" name="tongtientam1" value="<?php echo $_SESSION['tongtientam1'];?>" />    
            <span class="totalprice1 price-usd"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php  echo number_format($_SESSION['tongtientam1'],"0",",",".");?></span></span></td>
			</td>
        </tr>

		
	</tbody></table>
   
    <button type="submit" name="ok">
    <a href="javascript:" class="btn-buy medium"> 
    <span class="btn-text">Order Now</span>
    </a>
    </button>

</div><!-- /buy-block -->

<div>
	</div>
		</td>
	</tr>
	</tfoot>
	<tbody>
		
    <?php $dem=0; foreach ($info2 as $items){ ?>	

					<tr>
				<td class="main-data">
					<div class="img-container big-image-opener">
						<a href="<?php echo base_url();?>sp/<?php echo $items['slug'];?>-<?php echo $items['id'];?>.html"><img width="180" height="180" src="<?php echo base_url();?>uploads/<?php echo $items['hinhanh'];?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?php echo $items['name'];?>" sizes="(max-width: 180px) 100vw, 180px"></a>					</div>
					<div class="data-container">
						<div class="item-name">
							<a href="<?php echo base_url();?>sp/<?php echo $items['slug'];?>-<?php echo $items['id'];?>.html"> 
                            <?php echo $items['name'];?>
                            </a>					
                            	</div>
					</div>
				</td>
				<!-- main-data -->
				<td class="secondary-data">
					<div class="catalog-item-parameters">
						<div class="size-choice">
								<span class="text"><dl class="variation">
			<dt class="variation-Color">Size:</dt>
            <select  class=" refreshsize" maso="<?php echo $items['id']?>" id="size<?php echo $items['rowid']?>" name="<?php echo $items['rowid']?>">
                                    
									<?php  $size=explode(",", $items['size']); 
	for($k=0;$k<count($size);$k++)
	{
	$sizechontam=$items['options']['sizechon'];
	if($sizechontam==$size[$k])
	{
?>

<option selected="selected" value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php
		
	}
	else
	{
	if($size[$k]!=null)
	{
?>
<option value="<?php echo $size[$k];?>"><?php echo $size[$k];?></option>

<?php }else break;}}?>
									
									</select>
	</dl>
</span>
						</div>
						<!-- /size-choice -->

                        <div class="size-choice" style="z-index:0">
								<span class="text"><dl class="variation">
			<dt class="variation-Color">Color:</dt>
            <select  class=" refreshmau" maso="<?php echo $items['id']?>" id="mau<?php echo $items['rowid']?>" name="<?php echo $items['rowid']?>">
                                    
									<?php  $mau=explode("|", $items['mau']); 
	for($k=0;$k<count($mau);$k++)
	{
	$mauchontam=$items['options']['mauchon'];
	if($mauchontam==$mau[$k])
	{
?>

<option selected="selected" value="<?php echo $mau[$k];?>"><?php echo $mau[$k];?></option>

<?php
		
	}
	else
	{
	if($mau[$k]!=null)
	{
?>
<option value="<?php echo $mau[$k];?>"><?php echo $mau[$k];?></option>

<?php }else break;}}?>
									
									</select>
	</dl>
</span>
						</div>
						<!-- /size-choice -->

					</div>
					<!-- /catalog-item-parameters-form -->
				</td>
				<!-- secondary-data -->
				<td class="price-and-actions" data-title="Price">
					<div class="price-main">
							<span class="price price-usd">
								<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo number_format($items['price'],"0",",",".");?></span>							</span>
					</div>

											<div class="input-wrapper quantity-wrapper">
							<div class="input-wrapper">
	<button class="btn-quantity-change1 minus"><span class="btn-text">-</span></button>
	<input type="number" step="1" min="1" max="999"  value="<?php echo $items['qty'];?>" title="Qty" class="qty item-quantity refresh iddong<?php echo $items['rowid']?>" id="iddong<?php echo $items['rowid']?>" name="<?php echo $items['rowid']?>" maso="<?php echo $items['id']?>" size="4">
	<button class="btn-quantity-change1 plus"><span class="btn-text">+</span></button>
</div>
						</div>
										<div class="discount">
							    <span id="txtHint1<?php echo $items['rowid']?>" class="price price-usd">
                                    <span  class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    <?php echo number_format($items['subtotal'],"0",",","."); ?>
                                    </span>							
                                </span>
					</div>
											<div class="item-actions">
							<a href="<?php echo base_url()."cgiohangno/del/".$items['rowid'];?>" class="btn-item-action delete" title="Remove this item" data-product_id="1806" data-product_sku=""><span class="btn-text"><span class="inner-text">Remove</span></span></a>													</div><!-- /item-actions -->
									</td>
				<!-- /price-and-actions -->
			</tr>
            <?php }?>
						
				

			</tbody>
</table>



		</form></div><!--/col-->
	</div><!--/row main-->
</div><!--/order-step1-page-->
</div>
					</div><!-- .entry-content -->
		</article><!-- #post-## -->

				
			
		</main><!-- #main -->
	</div>