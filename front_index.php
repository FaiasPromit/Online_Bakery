<?php
include('front_header.php');
$product_res=mysqli_query($con,"select * from bakery where status=1 order by rand() limit 8");
?>
    <div class="main">
        <div class="main-top">
            <h1>Bakery Shop</h1>
            <p style="font-family:Raleway;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam officia placeat nobis iusto enim 
                unde dignissimos quidem, cum tempora aspernatur ipsam iure perferendis facilis magni, quo dolorum 
                asperiores eos. Doloremque!Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" 
                (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very 
                popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, 
                or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there 
                isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks 
                as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful 
                of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from 
                repetition, injected humour, or non-characteristic words etc. <br> <br>
            </p>
            <div class="main-top__grid">
                <?php
                while($product_row=mysqli_fetch_assoc($product_res)){
                ?>
                <div class="main-top__grid item">
                    <div style="height:2rem;"></div>
                        <div class="p-i-container-img" >
                            <div class="p-i-container-des"><p><?php echo $product_row['bakery_detail'] ?></p></div>
                            <img src="<?php echo SITE_BAKERY_IMAGE . $product_row['image'] ?>" alt="item.png">
                        </div>
                        <span class="product-name"><?php echo $product_row['bakery'] ?></span>
                        <div class="product-price" style="text-align:left;"><?php echo $product_row['price'] . ' Taka' ?></div>
                        <div class="product-quantity">
                            <select name="" id="qty<?php echo $product_row['id'] ?>" class="product-quantity-select" style="cursor:pointer; 
                                                                                                                            color:black; 
                                                                                                                            width: 100%;    
                                                                                                                            border: 1px solid black; 
                                                                                                                            padding-top: 3px;
                                                                                                                            background: #D3D3D3; 
                                                                                                                            margin-bottom:3px;">
                                <option value="0">Quantity</option>
                                <?php 
                                for($i=1;$i<=10;$i++){
                                    echo "<option>$i</option>";
                                }?>
                            </select>
                        </div>
                        <div style="display: flex; flex-direction: row; align-items: stretch;  justify-content: flex-start;">
                            <div class="product-cart-button">
                                <i onclick="add_to_cart('<?php echo $product_row['id'] ?>','add')">Add to Cart</i>
                            </div>
                            <div class="product-cart-button remove">
                                <i onclick="delete_cart('<?php echo $product_row['id'] ?>')">Remove</i>
                            </div>
                            <div class="product-cart-added ">
                            <?php 
                                $added_msg="Empty!";
                                if(array_key_exists($product_row['id'],$cartArr)){
                                $added_qty=getUserFullCart($product_row['id']);
                                $added_msg="Added to Cart - $added_qty";}
                                echo "<span id='shop_added_msg_".$product_row['id']."'>".$added_msg."</span> ";                                ?>
                            </div>
                        </div>
                </div>
                <?php }?>
                
            
            </div>
            
                    
            <a href="front_shop.php"><div class="main-top__grid--button">View more products </div></a>
        </div>

        <div class="main-bottom">
            <h1>About our shop</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam officia placeat nobis iusto enim 
                unde dignissimos quidem, cum tempora aspernatur ipsam iure perferendis facilis magni, quo dolorum 
                asperiores eos. Doloremque!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam officia placeat nobis iusto enim 
                unde dignissimos quidem, cum tempora aspernatur ipsam iure perferendis facilis magni, quo dolorum 
                asperiores eos. Doloremque!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam officia placeat nobis iusto enim 
                unde dignissimos quidem, cum tempora aspernatur ipsam iure perferendis facilis magni, quo dolorum 
                asperiores eos. Doloremque!
            </p>
        </div>
    </div>
<?php
include('front_footer.php');
?>
