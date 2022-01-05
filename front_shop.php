<?php
include('front_header.php');
$product_sql="select * from bakery where status=1";
$cat_id="";
if(isset($_GET['cat_id']) && $_GET['cat_id']>0){
    $cat_id=get_safe_value($_GET['cat_id']);
    $product_sql.=" and category_id='$cat_id' ";
}
$product_sql.=" order by bakery desc";
$product_res=mysqli_query($con,$product_sql);
$cat_res=mysqli_query($con,"select * from category where status=1 order by order_number desc");
$cat_name_res="";
// $results_per_page = 12;
// $number_of_result = mysqli_num_rows($result);   

?>
    <div class="products-section">
            <div class="sidebar">
                <h3><a href="front_shop.php"> All Categories</a></h3>
                <ul>
                    <?php while($cat_row=mysqli_fetch_assoc($cat_res)){?>
                        <li><a href="front_shop.php?cat_id=<?php echo $cat_row['id']?>"><?php echo $cat_row['category']?></a></li>
                    <?php }?>
                </ul>
            </div>
            <div>
                <?php if($cat_id==""){?>
                <h1><?php echo "All Categories"?></h1>
                <?php } else {
                    // this part can be improved
                    $cat_name_res=mysqli_query($con,"select * from category where id='$cat_id'"); 
                    while ($cat_row=mysqli_fetch_assoc($cat_name_res)){?>
                        <h1><?php echo $cat_row['category']?></h1>
                    <?php }}?>
                    
                
                <div class="products">
                <?php
                while($product_row=mysqli_fetch_assoc($product_res)){
                ?>
                    <div class="product">
                        <a href="#"><img src="<?php echo SITE_BAKERY_IMAGE.$product_row['image']?>" alt="item.png"></a>
                        <a href="#"><span class="product-name"><?php echo $product_row['bakery'] ?></span></a>
                        <div class="product-name" style="text-align:left;"><?php echo $product_row['price'] .' Taka'?></div>
                        <!-- <div class="image-overlay">
                                <p class="image-description"><?php echo $product_row['bakery_detail'] ?></p>
                        </div> -->
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
                            <div style=" cursor:pointer;color:black;width: 30%;height:23px; border: 1px solid black; padding-right:5px; margin-top: 3px;background: #add8e6; margin-right:3px;text-align:center">
                                <i class="addToCart"  onclick="add_to_cart('<?php echo $product_row['id'] ?>','add')">Add to Cart</i>
                            </div>
                            <div style=" cursor:pointer;color:black;width: 27%;height:23px; border: 1px solid black; padding-right:5px; margin-top: 3px;background: #FF7F7F;margin-left:3px;margin-right:3px;text-align:center">
                                <i class="deleteCart"  onclick="delete_cart('<?php echo $product_row['id'] ?>')">Remove</i>
                            </div>
                            <div id="firstTimeAddedShow" style=" cursor:pointer;color:black;width: 43%; height:23px;border: 1px solid black; padding-right:5px; margin-top: 3px;background: #90ee90;margin-left:3px;text-align:center">
                            <?php 
                                $added_msg=" --- ";
                                if(array_key_exists($product_row['id'],$cartArr)){
                                $added_qty=getUserFullCart($product_row['id']);
                                $added_msg="Added to Cart - $added_qty";}
                                echo "<span id='shop_added_msg_".$product_row['id']."'>".$added_msg."</span> ";    
                            ?>
                            </div>
                        </div>
                        <!-- <div style="color:green;" id="firstTimeAddedShow">
                            <?php 
                                // $added_msg="";
                                // if(array_key_exists($product_row['id'],$cartArr)){
                                // $added_qty=getUserFullCart($product_row['id']);
                                // $added_msg="[Added - $added_qty]";}
                                // echo "<span id='shop_added_msg_".$product_row['id']."'>".$added_msg."</span> ";
                               
                            
                            ?>
                        </div> -->
                        
                        
                    </div>
                <?php }?>    

                </div>
                
            </div>
    </div>
<?php
include('front_footer.php');
?>
