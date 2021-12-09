<?php
include('front_header.php');
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$product_res=mysqli_query($con,"select * from bakery where status=1");
$cat_res=mysqli_query($con,"select * from category where status=1 order by order_number desc");
?>
    <div class="products-section">
            <div class="sidebar">
                <h3>All Categories</h3>
                <ul>
                    <?php while($cat_row=mysqli_fetch_assoc($cat_res)){?>
                        <li><a href="#"><?php echo $cat_row['category']?></a></li>
                    <?php }?>
                </ul>
            </div>
            <div>
                <h1>name</h1>
                <div class="products">
                <?php
                while($product_row=mysqli_fetch_assoc($product_res)){
                ?>
                    <div class="product">
                        <a href="#"><img src="<?php echo SITE_BAKERY_IMAGE.$product_row['image']?>" alt="item.png"></a>
                        <a href="#"><span class="product-name"><?php echo $product_row['bakery'] ?></span></a>
                        <div class="product-price"><?php echo $product_row['price'] .' Taka'?></div>
                    </div>
                <?php }?>    

                </div>
                
            </div>
    </div>
<?php
include('front_footer.php');
?>
