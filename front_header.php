<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('smtp/PHPMailerAutoload.php');


if((isset($_COOKIE["email"])) && !(isset($_SESSION['FOOD_USER_ID'])) ){
  $_SESSION['FOOD_USER_ID']=$_COOKIE["id"];
  $_SESSION['FOOD_USER_NAME']=$_COOKIE["name"];
}


$cartArr=getUserFullCart();
$totalCartBakery=count($cartArr);
$totalPrice=0;
$cart_subtotal=0;
$cart_tax=0;
$cart_total=0;
foreach ($cartArr as $list){
  $totalPrice=$totalPrice+($list['qty']*$list['price']);
}
// unset($_SESSION['cart']);
if(isset($_SESSION['FOOD_USER_ID'])){
  $proceed_to_checkout=1;
}else{
  $proceed_to_checkout=0;
}

// prx($cartArr);
if(isset($_SESSION['MSG'])){
  echo $_SESSION['MSG'];
  }

?>
<!doctype html>
<html>
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bakery Shop</title>
    <link rel="icon" href="images/main image.jpg" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="./index.css" />
    <link rel="stylesheet" type="text/css" href="./login2.css" />
    <link rel="stylesheet" type="text/css" href="./cart.css" />
    <link rel="stylesheet" type="text/css" href="./checkout2.css" />
    <link rel="stylesheet" type="text/css" href="./thankyou.css" />

    <!-- imported from internet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"> 
   
  </head>
  <body class="body">
    <div class="header">
      <div class="header-top">
        <p><a href="front_index.php" style="color:white;font-family:Raleway;">Home</a></p>
        <div class="header-top__links">
          <a href="front_shop.php"><div class="header-top__links--text" style="color:white;font-family:Raleway;">SHOP</div></a>
          <div class="header-top__links--text">ABOUT</div>
          <a href="front_cart.php"><div class="header-top__links--text" style="color:white;font-family:Raleway;">Cart <span id="totalCartBakery"><sup> <?php echo "[".$totalCartBakery."]"?></span> </sup><span id="totalPrice"><?php echo $totalPrice?> Taka</span></div></a> 
          <?php
          if(isset($_SESSION['FOOD_USER_NAME'])){?>
            <a href="front_order_history.php" style="color:white; font-family:Raleway;"><div class="header-top__links--text"> Order History</div></a> 
            <a href="logout.php" style="color:white; font-family:Raleway;"><div class="header-top__links--text" style="color:white;">LOGOUT</div></a>
          <?php }else{?>
          <a href="front_register.php" style="color:white; font-family:Raleway;"><div class="header-top__links--text" style="color:white;">SIGNUP</div></a>
          <a href="front_login.php" style="color:white; font-family:Raleway;"><div class="header-top__links--text" style="color:white;">LOGIN</div></a>
          <?Php } ?>
        </div>
      </div>

      <div class="header-contents">
        <div class="header-contents__left">
          <h1 style="font-family:Raleway;">Bakery Shop</h1>
          <?php if(isset($_SESSION['FOOD_USER_NAME'])){?>
          <p style="font-family:Raleway;"><b>Welcome <?php echo $_SESSION['FOOD_USER_NAME'] ?></b></p>
          <?php }else{ ?>
          <p style="font-family:Raleway;">An online bakery shop</p>
          <?php } ?>
          <?php
          if(isset($_SESSION['FOOD_USER_NAME'])){?>
          <div class="header-contents__left--button">
            <a href="front_profile.php"><div class="header-contents__left--button view" style="font-family:Raleway;">Change User Info</div></a>
            <div class="spacer"></div>
            <a href="front_change_password.php"><div class="header-contents__left--button view" style="font-family:Raleway;">Change Password</div></a>
          </div>
          <?php } ?>
        </div>
        <div class="header-contents__right">
            <img src="images/main image.jpg" alt="image" class="header-contents__right--img" style="opacity:80%;">
        </div>
      </div>
    </div>