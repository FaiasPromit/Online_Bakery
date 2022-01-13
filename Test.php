<?php
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
// include('header.php');
session_start();
$order_status=get_safe_value($_POST['order_status']);
$payment_status=get_safe_value($_POST['payment_status']);
$order_id=get_safe_value($_GET['id']);
// echo $order_id;
mysqli_query($con,"update order_master set order_status='$order_status',payment_status='$payment_status' where id='$order_id'");
$arr=array('status'=>'success');
redirect('order.php');
?>
