<?php
include('front_header.php');
$msg="";
//Email id verify
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($_GET['id']);
    $temp=mysqli_query($con,"select * from user where rand_str='$id'");
    if($temp!=''){
        mysqli_query($con,"update user set status=1 where rand_str='$id'");
        $msg="Congratulations !! Email id verified";}
}else{
	redirect('http://127.0.0.1/onlinebakery/front_index.php');
}

?>
<div class="thank-you-section">
            <br>
            <br>
            <h1><?php echo $msg ?></h1>
            <!-- <p>A confirmation email was sent</p> -->
            <h3></h3>
            <br>
            <div>
                <a href="front_login.php" class="button">Go to Login Page</a> <br><br><br>
                <a href="" class="button">Home Page</a> <br>
                <br>
                <br>
            </div>
        </div>
    
<?php
unset($_SESSION['ORDER_ID']);
include('front_footer.php');
?>
