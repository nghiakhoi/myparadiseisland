<?php
    //--- Giu gia tri cua form
    $full_name = array(
                        "name"  => "full_name",
                        "id"    => "full_name",
                        "size"  => "30",
                        "value" => set_value("full_name"),
                    );
    $username = array(
                        'name'        => 'username',
                        'id'          => 'fname',
                        'size'        => '30',
                        'value'       => set_value('username'),
                    );

    $password = array(
                        'name'        => 'password',
                        'id'          => 'lname',
                        'size'        => '30',
                        'value'       => set_value('password'),
                    );

    $repassword = array(
                        'name'        => 'repassword',
                        'id'          => 'lname',
                        'size'        => '30',
                        'value'       => set_value('repassword'),
                    );
    $address = array(
                        'name'        => 'address',
                        'id'          => 'address',
                        'size'        => '30',
                        'value'       => set_value('address'),
                    );
    $phone = array(
                        'name'        => 'phone',
                        'id'          => 'phone',
                        'size'        => '30',
                        'value'       => set_value('phone'),
                    );
    $email = array(
                        'name'        => 'email',
                        'id'          => 'email',
                        'size'        => '30',
                        'value'       => set_value('email'),
                    );
?>


<div id="box_entry">
  	  <h2><span>Đăng ký thành viên</span></h2>
      <div style="
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: red;">
        <ul>
            <?php
			
                echo validation_errors('<li>','</li>');
                if($error!="")
				{
                    echo $error;
					
				}
            ?>
        </ul>
      </div>
     <form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart-formdata">
        <fieldset style="margin-left:20px;">
        <br>
		<div id="dangky">
        <label>Họ và tên</label><?php echo form_input($full_name);?><br />

        <label>Tài khoản</label><?php echo form_input($username);?><br />

        <label>Mật khẩu</label><?php echo form_password($password);?><br />

        <label>Nhập lại mật khẩu</label><?php echo form_password($repassword);?><br />

        <label>Email</label><?php echo form_input($email);?><br />

        <label>Địa chỉ</label><?php echo form_input($address);?><br />

        <label>Số điện thoại</label><?php echo form_input($phone);?><br />

        <label>Giới tính</label>
            <span style="float:right;position:absolute;left:150px;">Nam</span><input style="float:auto; position:absolute;left:130px;" name="gender" id="male" value="1" type="radio" /><br>
            <span style="float:right;position:absolute;left:150px;">Nữ</span><input style="float:auto; position:absolute;left:130px;" name="gender" id="female" value="2" type="radio" />
        <br/>
        <br/>
        <label>Hình đại diện</label><input type="file" name="image" /><br/>
        
        <label>&nbsp;</label> <input class="nutdangky" style="width:150px; height:40px; font-size:20px; " type="submit" name="ok" value="Đăng ký" /><br />
		</div>
        </fieldset>
    </form>
</div>