<?php
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('header.php');
session_start();
// $order_status=get_safe_value($_POST['order_status']);
// $payment_status=get_safe_value($_POST['payment_status']);
// $order_id=get_safe_value($_POST['order_id']);
// echo $order_status;
echo "ol";
if (isset($_POST['submit'])) {
    echo "ok";}
?>
