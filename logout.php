<?php
session_start();
include('function.inc.php');  
unset($_SESSION['FOOD_USER_ID']);
unset($_SESSION['FOOD_USER_NAME']);
unset($_SESSION['cart']);
redirect('front_shop.php');
?>

