<?php
include('front_header.php');
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
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
                        <div class="product-price"><?php echo $product_row['price'] .' Taka'?></div>
                    </div>
                <?php }?>    

                </div>
                
            </div>
    </div>
<?php
include('front_footer.php');
?>
