<?php
    include('database.inc.php');
    include('function.inc.php');
    include('constant.inc.php');
    include('smtp/PHPMailerAutoload.php');
    session_start();
    $type=get_safe_value($_POST['type']);
    $added_on=date('Y-m-d h:i:s');
    if($type=='register'){
        $name=get_safe_value($_POST['name']);
        $email=get_safe_value($_POST['email']);
        $mobile=get_safe_value($_POST['mobile']);
        $password=get_safe_value($_POST['password']);
        $check=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email'"));
        if($check>0){
            $arr=array('status'=>'error','msg'=>'Email id already registered','field'=>'email_error');   
        }
        else{
            $rand_str=rand_str();
            $new_password=password_hash($password,PASSWORD_BCRYPT);
            // mysqli_query($con,"insert into user(name,email,mobile,password,status,email_verify,added_on,rand_str) values('$name','$email',
            // '$mobile','$new_password','1','1','$added_on','$rand_str')");
            mysqli_query($con,"insert into user(name,email,mobile,password,status,email_verify,added_on,rand_str) values('$name','$email',
            '$mobile','$new_password','0','1','$added_on','$rand_str')");
            $id=mysqli_insert_id($con);
            $html="http://127.0.0.1/onlinebakery/front_verify.php?id=".$rand_str;
            send_email($email,$html,'Verify Your Email Id');
            $arr=array('status'=>'success','msg'=>'Thank you for registering.','field'=>'form_msg'); 
          }
        echo json_encode($arr);
    }
    if($type=='login'){
        $email=get_safe_value($_POST['user_email']);
        $password=get_safe_value($_POST['user_password']);
        $res=mysqli_query($con,"select * from user where email='$email'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $row=mysqli_fetch_assoc($res);
            $status=$row['status'];
            $dbpassword=$row['password'];
            
            if($status==1){
                if(password_verify($password,$dbpassword)){
                    $_SESSION['FOOD_USER_ID']=$row['id'];
                    $_SESSION['FOOD_USER_NAME']=$row['name'];
                    // $_SESSION['FOOD_USER_EMAIL']=$row['email'];
                    $arr=array('status'=>'success','msg'=>'');
                    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
                        foreach($_SESSION['cart'] as $key=>$val){
                            manageUserCart($_SESSION['FOOD_USER_ID'],$val['qty'],$key);
                    }
                }
                }else{
                    $arr=array('status'=>'error','msg'=>'Password Incorrect :@@');
                }
                // if($password==$dbpassword){
                //     $_SESSION['FOOD_USER_ID']=$row['id'];
                //     $_SESSION['FOOD_USER_NAME']=$row['name'];
                //     $arr=array('status'=>'success','msg'=>'');
                //     if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
				// 		foreach($_SESSION['cart'] as $key=>$val){
				// 			manageUserCart($_SESSION['FOOD_USER_ID'],$val['qty'],$key);
				// 		}
				// 	}
                // }else{
                //     $arr=array('status'=>'error','msg'=>'Password Incorrect');
                // }
                
            }else{
                $arr=array('status'=>'error','msg'=>'Your account is not verified:@:@');
            }
        }
        else{
            $arr=array('status'=>'error','msg'=>'Please enter valid login details :@:@');  
        }
        echo json_encode($arr);
    }
    if($type=='forgot'){
        $email=get_safe_value($_POST['user_email']);
        $res=mysqli_query($con,"select * from user where email='$email'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $row=mysqli_fetch_assoc($res);
            $status=$row['status'];
		    $id=$row['id'];
            if($status==1){
                $rand_password=rand(11111,99999);
                $new_password=password_hash($rand_password,PASSWORD_BCRYPT);
                mysqli_query($con,"update user set password='$new_password' where id='$id'");
				$html=$rand_password;
				send_email($email,$html,'New Password');
				$arr=array('status'=>'success','msg'=>'Password has been reset and sent to your email id');
            }else{
                $arr=array('status'=>'error','msg'=>'Your account is deactivated:@:@');
            }
        }
        else{
            $arr=array('status'=>'error','msg'=>'Please enter valid login details :@:@');  
        }
        echo json_encode($arr);
    }
    
?>
