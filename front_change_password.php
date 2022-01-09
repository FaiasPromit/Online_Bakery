<?php
    include('front_header.php');
    if(!isset($_SESSION['FOOD_USER_ID'])){
        redirect('front_index.php');
    }
    $getUserDetails=getUserDetailByid();
    // prx($getUserDetails);
?>
    <div class="main-login">
        <p class="sign_in-text" >Profile of <?php echo $getUserDetails['name']?></p>
        <form class="login_form" method="post" id="frmPassword" action="#">
            <div class="error_field" style="align-self:center;font-weight: bold;color: black;" >Old Password </div>
            <input class="pass" type="password" placeholder="Enter here" name="old_password" required>
            <div class="spacer"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: black;">New Password </div>
            <input class="username" type="password" placeholder="Make sure to use a strong Password" name="new_password" required> 
            <div class="error_field" style="align-self:center;font-weight: bold;color: black;">Confirm New Password </div>
            <input class="pass" type="password" placeholder="Make sure to match the new Password" name="new_password_confirm" required>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <input type="hidden" name="type" value="password" id="type">
            <button class="submit" type="submit" id="password_submit" style="background: rgb(201, 198, 198);">Confirm</button>
            <div class="error_field" style="align-self:center;font-weight: bold;color: green;" id="password_form_msg"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: red;" id="password_form_msg_2"></div>
        </form>  
        <a href="front_profile.php" class="submit">Change User Information</a>        
    </div>
<?php
include('front_footer.php');
?>