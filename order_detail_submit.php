<?php
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('smtp/PHPMailerAutoload.php');
// include('header.php');
session_start();

$order_status=get_safe_value($_POST['order_status']);
$payment_status=get_safe_value($_POST['payment_status']);
$order_id=get_safe_value($_GET['id']);
// echo $order_id;
mysqli_query($con,"update order_master set order_status='$order_status',payment_status='$payment_status' where id='$order_id'");
$arr=array('status'=>'success');
if($order_status=="4" && $payment_status!="Pending" ){
    $order_user_info="select * from order_master where id='$order_id'";
    $order_user_id_res=mysqli_query($con,$order_user_info);
    $order_user_id_row=mysqli_fetch_assoc($order_user_id_res);
    $order_user_id=$order_user_id_row['user_id'];
    $order_user_name=$order_user_id_row['name'];
    $order_user_email=$order_user_id_row['email'];
    $html="Your order has been delivered and payment has been received . You ".$payment_status;
    send_email($order_user_email,$html,'Order delivered and Payment received ');
    // echo "test";
}
redirect('order.php');
?>
