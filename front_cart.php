<?php
include('front_header.php');  
?>
<div class="cart-section" style="max-width: 1200px;margin-top:80px;margin-left:auto; margin-right:auto;" >
        <div>

            <?php if ($totalCartBakery > 0){?>
            <h2><?php echo $totalCartBakery?> item(s) in Shopping Cart</h2>


            <div class="cart-table">
            <?php foreach($cartArr as $key=>$item) {?>
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href=""><img src="<?php echo SITE_BAKERY_IMAGE.$item['image']?>" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href=""><?php echo $item['bakery']?></a></div>
                            <div class="cart-table-description">Quantity : <?php echo $item['qty']?></div> 
                        </div>
                    </div>
            
                    <div class="cart-table-row-right" style=" width: 53%;">
                        <div class="cart-table-actions">
                            <div style=" cursor:pointer;color:black;width: 70px;height:23px; border: 1px solid black; padding-right:5px;background: #FF7F7F;text-align:center">
                                <i class="deleteCart" onclick="delete_cart('<?php echo $key ?>','load')">Remove</i>
                            </div>


                        </div>
                        <div>
                            <select id="qty<?php echo $key ?>" style="cursor:pointer;color:black;width: 80px;height:23px; border: 1px solid black; padding-right:5px;background: #90ee90;text-align:center">
                                <option value="0">Quantity</option>
                                <?php 
                                for($i=1;$i<=10;$i++){
                                    echo "<option>$i</option>";
                                }?>
                            </select>
                        </div>
                        <div style=" cursor:pointer;color:black;width: 70px;height:23px; border: 1px solid black; padding-right:5px;background: #add8e6;text-align:center">
                                <i onclick="add_to_cart('<?php echo $key ?>','update')">Update</i>
                        </div>
                        <div><?php echo $item['qty']*$item['price'] ?>Taka</div>
                        <?php $cart_subtotal=$cart_subtotal+($item['qty']*$item['price']);?>
                        <?php $cart_tax=$cart_subtotal/10;?>
                        <?php $cart_total=$cart_subtotal+$cart_tax;?>
                        
                    </div>
                </div> 
            <?php } ?>
                
            </div> 

            
                <a href="#" class="have-code">Have a Code?</a>

                <div class="have-code-container">
                    <form action="" method="POST">
                        <input type="hidden" name="_token" value="S35jzNgDcuxmS0S4zU3WPBwuxbQ4Si6BMWesjRhK">
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">Apply</button>
                    </form>
                </div> <!-- end have-code-container -->
            
            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping will be charged 40 Taka inside Dhaka and 110 Taka Outside Dhaka.
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Tax (10%)<br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        <?php echo $cart_subtotal ?> Taka<br>
                        <?php echo $cart_tax ?> Taka<br>
                        <span class="cart-totals-total"><?php echo $cart_total ?>  Taka</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="front_shop.php" class="button">Add More Items to Cart</a>
                <div style=" cursor:pointer;color:black;width: 150px;height:23px; border: 1px solid black; padding-right:5px;background: gray;text-align:center">
                    <?php if($proceed_to_checkout==1){?>
                    <a href="front_checkout.php">Proceed to Checkout</a>
                    <?php }else{?>
                    <a href="front_login.php" >Proceed to Checkout</a>
                    <?php } ?>
                </div>
            </div>

            <?php }else{ ?>
                <h3>No items in Cart</h3>
                <div class="cart-buttons">
                    <a href="front_shop.php" class="button">Add More Items to Cart</a>
                </div>
                
            <?php }?>
            <h3></h3>

            
        </div>

        </div>
<?php
include('front_footer.php');  
?>