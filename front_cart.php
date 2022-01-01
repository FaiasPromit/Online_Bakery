<?php
include('front_header.php');  
?>
<div class="cart-section">
        <div>

            <?php if ($totalCartBakery > 0){?>
            <h2><?php echo $totalCartBakery?> item(s) in Shopping Cart</h2>


            <div class="cart-table">
            <?php foreach($cartArr as $item) {?>
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href=""><img src="<?php echo SITE_BAKERY_IMAGE.$item['image']?>" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href=""><?php echo $item['bakery']?></a></div>
                            <div class="cart-table-description">Quantity : <?php echo $item['qty']?></div> 
                        </div>
                    </div>
            
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                <button type="submit" class="Button">Remove</button>
                            </form>


                        </div>
                        <div>
                        <!-- data-productquantity="10" -->
                            <select class="quantity" data-id="{{ $item->rowId }}" >
                                                                    <!-- <option {{$item->qty ==1 ? 'selected':''}}>1</option>
                                                                    <option {{$item->qty ==2 ? 'selected':''}}>2</option>
                                                                    <option {{$item->qty ==3 ? 'selected':''}}>3</option>
                                                                    <option {{$item->qty ==4 ? 'selected':''}}>4</option>
                                                                    <option {{$item->qty ==5 ? 'selected':''}}>5</option> -->
                            </select>
                        </div>
                        <div><?php echo $item['qty']*$item['price'] ?>Taka</div>
                        <?php $cart_subtotal=$cart_subtotal+($item['qty']*$item['price']);?>
                        <?php $cart_tax=$cart_subtotal/10;?>
                        <?php $cart_total=$cart_subtotal+$cart_tax;?>
                        
                    </div>
                </div> <!-- end cart-table-row -->
            <?php } ?>
                
            </div> <!-- end cart-table -->

            
                <a href="#" class="have-code">Have a Code?</a>

                <div class="have-code-container">
                    <form action="https://laravelecommerceexample.ca/coupon" method="POST">
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
                <a href="{{route('layout.shop')}}" class="button">Continue Shopping</a>
                <a href="{{route('checkout')}}" class="button">Proceed to Checkout</a>
            </div>

            <?php }else{ ?>
                <h3>No items in Cart</h3>
                <div class="cart-buttons">
                    <a href="{{route('layout.shop')}}" class="button">Continue Shopping</a>
                </div>
                
            <?php }?>
            <h3></h3>

            
        </div>

        </div>
<?php
include('front_footer.php');  
?>