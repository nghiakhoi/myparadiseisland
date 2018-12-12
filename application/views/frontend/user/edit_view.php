<?php
    //--- Giu gia tri cua form
    $full_name = array(
                        "name"  => "full_name",
                        "id"    => "full_name",
                        "size"  => "30",
                        "value" => $info["full_name"]
                    );
    $username = array(
                        'name'        => 'username',
                        'id'          => 'fname',
                        'size'        => '30',
                        'disabled'     => 'disabled',
                        'value'       => $info["username"]
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
                        'value'       => $info["address"],
                    );
    $phone = array(
                        'name'        => 'phone',
                        'id'          => 'phone',
                        'size'        => '30',
                        'value'       => $info["phone"],
                    );
    $email = array(
                        'name'        => 'email',
                        'id'          => 'email',
                        'size'        => '30',
                        'value'       => $info["email"],
                    );
?>

<div id="box_entry">
  	  <h2><span>Thêm Category</span></h2>
      <div class="error">
        <ul>
            <?php
                echo validation_errors('<li>','</li>');
                if(isset($error) && $error!=NULL && !empty($error))
                    echo $error;
            ?>
        </ul>
      </div>
     <form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart-formdata">
        <fieldset>
        <legend>Member Register</legend>
        <img src="<?php echo base_url()."public/images/avata/".$info['image'];?>"  width="150px"/><br/>
        
        <label>Full name</label><?php echo form_input($full_name);?><br />

        <label>Username</label><?php echo form_input($username);?><br />

        <label>Password</label><?php echo form_password($password);?><br />

        <label>Re-Password</label><?php echo form_password($repassword);?><br />

        <label>Email</label><?php echo form_input($email);?><br />

        <label>Address</label><?php echo form_input($address);?><br />

        <label>Phone</label><?php echo form_input($phone);?><br />

        <label>Gender</label>
            Male<input name="gender" id="male" value="1" type="radio" <?php if($info['gender']==1) echo "checked";?> />
            Female<input name="gender" id="female" value="2" type="radio" <?php if($info['gender']==2) echo "checked";?> />
        <br/>
        <br/>
        
        <label>Avata</label><input type="file" name="image" /><br/>
        
        <label>&nbsp;</label> <input type="submit" name="ok" value="Update" /><br />

        </fieldset>
    </form>
</div>