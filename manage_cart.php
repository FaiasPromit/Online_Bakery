<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$qty=get_safe_value($_POST['qty']);
$attr=get_safe_value($_POST['attr']);
$type=get_safe_value($_POST['type']);
if($type=='add'){
  if(isset($_SESSION['FOOD_USER_ID'])){
    $uid=$_SESSION['FOOD_USER_ID'];
    manageUserCart($uid,$qty,$attr);
  }else{
    $_SESSION['cart'][$attr]['qty']=$qty;
  }
  $getUserFullCart=getUserFullCart();
  $totalPrice=0;
  foreach ($getUserFullCart as $list){
    $totalPrice=$totalPrice+($list['qty']*$list['price']);
  }
  $totalBakery=count(getUserFullCart());
  $arr= array('totalCartBakery'=>$totalBakery,'totalPrice'=>$totalPrice);
  echo json_encode($arr);
  }


  if($type=='delete'){
    removeBakeryFromCart($attr);
    
  }

?>
