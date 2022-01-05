<?php
include('front_header.php');
$product_res=mysqli_query($con,"select * from bakery where status=1 order by rand() limit 8");
?>
    <div class="main">
        <div class="main-top">
            <h1>Bakery Shop</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam officia placeat nobis iusto enim 
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
                    <a href="">
                    <img src="<?php echo SITE_BAKERY_IMAGE.$product_row['image']?>" alt="item.png">
                    <p><?php echo $product_row['bakery'] ?></p>
                    </a>
                    <p><?php echo $product_row['price'] .' Taka'?></p>
                </div>
                <?php }?>
            </div>
                    
            <div class="main-top__grid--button"><a href="front_shop.php">View more products</a> </div>
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
