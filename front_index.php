<?php
include('front_header.php');
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$product_res=mysqli_query($con,"select * from bakery where status=1 order by rand() limit 5");
?>
    <div class="main">
        <div class="main-top">
            <h1>Bakery Shop</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam officia placeat nobis iusto enim 
                unde dignissimos quidem, cum tempora aspernatur ipsam iure perferendis facilis magni, quo dolorum 
                asperiores eos. Doloremque!
            </p>
            <div class="main-top__grid">
                <?php
                while($product_row=mysqli_fetch_assoc($product_res)){
                ?>
                <div class="main-top__grid item">
                    <a href="">
                    <img src="<?php echo SITE_BAKERY_IMAGE.$product_row['image']?>" alt="item.png">
                    <p><?php echo $product_row['bakery'] ?></p>
                    </a>
                    <p><?php echo $product_row['price'] .' Taka'?></p>
                </div>
                <?php }?>
            </div>
                    
            <div class="main-top__grid--button">View more products</div>
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
