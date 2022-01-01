<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
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

// prx($cartArr);
?>
<!doctype html>
<html>
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bakery Shop</title>

    <link rel="stylesheet" type="text/css" href="./index.css" />
    <link rel="stylesheet" type="text/css" href="./login.css" />
    <link rel="stylesheet" type="text/css" href="./cart.css" />
   
  </head>
  <body class="body">
    <div class="header">
      <div class="header-top">
        <p><a href="front_index.php" style="color:white;">Home</a> </p>
        <div class="header-top__links">
          <a href="front_shop.php"><div class="header-top__links--text" style="color:white;">SHOP</div></a>
          <div class="header-top__links--text">ABOUT</div>
          <a href="front_cart.php"><div class="header-top__links--text" style="color:white;">Cart <span id="totalCartBakery"><sup> <?php echo "[".$totalCartBakery."]"?></span> </sup><span id="totalPrice"><?php echo $totalPrice?> Taka</span></div></a> 
          <?php
          if(isset($_SESSION['FOOD_USER_NAME'])){?>
            <div class="header-top__links--text"> Profile of <?php echo $_SESSION['FOOD_USER_NAME'] ?></div>
            <a href="logout.php" style="color:white;"><div class="header-top__links--text" style="color:white;">LOGOUT</div></a>
          <?php }else{?>
          <a href="front_register.php" style="color:white;"><div class="header-top__links--text" style="color:white;">SIGNUP</div></a>
          <a href="front_login.php" style="color:white;"><div class="header-top__links--text" style="color:white;">LOGIN</div></a>
          <?Php } ?>
        </div>
      </div>

      <div class="header-contents">
        <div class="header-contents__left">
          <h1>Bakery Shop</h1>
          <p>An online bakery shop</p>
          <div class="header-contents__left--button">
            <div class="header-contents__left--button view">Button 1</div>
            <div class="spacer"></div>
            <div class="header-contents__left--button view">Button 2</div>
          </div>
        </div>
        <div class="header-contents__right">
            <img src="images/main image.jpg" alt="image" class="header-contents__right--img">
        </div>
      </div>
    </div>