<?php
    include('database.inc.php');
    include('function.inc.php');
    include('constant.inc.php');
    
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
            mysqli_query($con,"insert into user(name,email,mobile,password,status,email_verify,added_on) values('$name','$email',
            '$mobile','$password','1','0','$added_on')");
            $arr=array('status'=>'success','msg'=>'Thank you for registering. Please check your email id to verify','field'=>'form_msg');  
          }
        echo json_encode($arr);
    }
    if($type=='login'){
        $email=get_safe_value($_POST['user_email']);
        $password=get_safe_value($_POST['user_password']);
        $res=mysqli_query($con,"select * from user where email='$email' and password='$password'");
        $check=mysqli_num_rows($res);
        if($check>0){
            
        }
        else{
            $arr=array('status'=>'error','msg'=>'Please enter valid login details :@:@');  
        }
        echo json_encode($arr);
    }
    
?>
