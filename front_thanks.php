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
include('front_footer.php');
?>
