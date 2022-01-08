<?php
include('front_header.php');
if(!isset($_SESSION['ORDER_ID'])){
    redirect('front_shop.php');
}

?>
<div class="thank-you-section">
            <br>
            <br>
            <h1>Thank you for <br> Your Order!</h1>
            <h3>Your Order number is #<?php echo $_SESSION['ORDER_ID'] ?></h3>
            <p>A confirmation email was sent</p>

            <?php 
            $html="Congratulations on placing your order. Your ordered bakeries will reach your doorstep in 30-45 minutes. Your Order id is #".$_SESSION['ORDER_ID'];
            send_email($_SESSION['ORDER_EMAIL'],'$html','Your Order has been placed'); ?>
            <h3></h3>
            <br>
            <div>
                <a href="" class="button">Home Page</a>
                <br>
                <br>
            </div>
        </div>
    
<?php
unset($_SESSION['ORDER_ID']);
unset($_SESSION['ORDER_EMAIL']);
include('front_footer.php');
?>
