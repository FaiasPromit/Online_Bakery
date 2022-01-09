<?php
    session_start();
    include('database.inc.php');
    include('function.inc.php');
    include('constant.inc.php');
    if(!isset($_SESSION['FOOD_USER_ID'])){
        redirect('front_index.php');
    }else{
    $type=get_safe_value($_POST['type']);
    $uid=$_SESSION['FOOD_USER_ID'];
    if($type=='profile'){
        $name=get_safe_value($_POST['name']);
        $mobile=get_safe_value($_POST['mobile']);
        $_SESSION['FOOD_USER_NAME']=$name;
        mysqli_query($con,"update user set name='$name',mobile='$mobile' where id='$uid'");
        // $arr=array('status'=>'success','msg'=>'Profile has been updated');
        // echo json_encode($arr);
    }
}
    
    
?>
