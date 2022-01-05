<?php
include('front_header.php');  
$userArr=getUserDetailById();
// prx($userArr);
if(isset($_POST['place_order'])){
    $checkout_name=get_safe_value($_POST['checkout_name']);
	$checkout_email=get_safe_value($_POST['checkout_email']);
	$checkout_mobile=get_safe_value($_POST['checkout_mobile']);
    $checkout_zip=get_safe_value($_POST['checkout_zip']);
    $checkout_address=get_safe_value($_POST['checkout_address']);
    $added_on=date('Y-m-d h:i:s');
    $sql="insert into order_master(user_id,name,email,mobile,address,total_price,zipcode,delivery_boy_id,payment_status,order_status,added_on) 
    values('".$_SESSION['FOOD_USER_ID']."','$checkout_name','$checkout_email','$checkout_mobile','$checkout_address','$cart_total','$checkout_zip','1','pending','1','$added_on')";
    mysqli_query($con,$sql);
    $insert_id=mysqli_insert_id($con);
    $_SESSION['ORDER_ID']=$insert_id;
    foreach($cartArr as $key=>$val){
        mysqli_query($con,"insert into order_detail(order_id,bakery_id,price,qty) values('$insert_id','$key','".$val['price']."','".$val['qty']."')");
    }
    emptyCart();
    redirect('front_thanks.php');
}
?>
<div class="container">
            <h1 class="checkout-heading stylish-heading">Checkout</h1>
            <div class="checkout-section">
                <div style="margin-right:40px;">
                    <form action="" method="POST" id="payment-form">
                        <h2>Billing Address</h2>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="checkout_email" value="<?php echo $userArr['email']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="checkout_name" value="<?php echo $userArr['name']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="checkout_address" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="city">Zip Code</label>
                            <input type="text" class="form-control" id="city" name="checkout_zip" value="" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" id="area" name="area" value="">
                        </div> -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="checkout_mobile" value="<?php echo $userArr['mobile']?>" required>
                        </div>
                        
                        <!-- <input type="hidden" class="form-control" id="subtotal" name="subtotal" value="{{Cart::subtotal()}}">
                        <input type="hidden" class="form-control" id="tax" name="tax" value="{{Cart::tax()}}">
                        <input type="hidden" class="form-control" id="total" name="total" value="{{Cart::total()}}"> -->
                        <h5>You will be charged on delivery. Make sure to keep the money with you.</h5>
                        <h5>Happy Shopping.</h5>
                        <br>
                        <button type="submit" class="button-primary full-width" name="place_order">Complete Order</button>
                    </form>
                </div>
                <div class="checkout-table-container">
                    <h2>Your Order</h2>
                    <div class="checkout-table">
                        <?php foreach($cartArr as $key=>$item) {?>
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="<?php echo SITE_BAKERY_IMAGE.$item['image']?>" alt="item" class="checkout-table-img" style="width:30%;height:50px;">
                                <div class="checkout-item-details">
                                    <div class="checkout-table-item" ><?php echo $item['bakery']?></div>
                                    <div class="checkout-table-description"><?php echo substr($item['bakery_detail'],0,90)?>....</div>
                                    <div class="checkout-table-price" ><?php echo $item['qty']*$item['price'] ?></div>
                                </div>
                            </div>
                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity"><?php echo $item['qty']?></div>
                                <?php $cart_subtotal=$cart_subtotal+($item['qty']*$item['price']);?>
                                <?php $cart_tax=$cart_subtotal/10;?>
                                <?php $cart_total=$cart_subtotal+$cart_tax;?>
                            </div> 
                        </div>
                        <?php } ?>
                    </div>
                    <div class="checkout-totals">
                        <div class="checkout-totals-left">
                            Subtotal <br>
                            <!-- Discout <br> -->
                             Tax<br>
                            <span class="checkout-totals total">Total</span>
                            <div class="cart-totals-left" >
                                *Shipping will be charged 40 Taka inside Dhaka and <br> 110 Taka Outside Dhaka.
                            </div>
                        </div>
                        <div class="checkout-totals-right">
                            <?php echo $cart_subtotal ?> Taka <br>
                            <!-- 2 <br> -->
                            <?php echo $cart_tax ?> Taka<br>
                            <span class="checkout-totals-total"><?php echo $cart_total ?> Taka</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include('front_footer.php');  
?>