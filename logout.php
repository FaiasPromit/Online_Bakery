<?php
session_start();
include('function.inc.php');  

setcookie('password', false);
setcookie('email', false);
setcookie('name', false);
setcookie('id', false);
unset($_SESSION['cart']);
unset($_SESSION['FOOD_USER_ID']);
unset($_SESSION['FOOD_USER_NAME']);

redirect('front_shop.php');
?>

