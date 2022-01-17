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
            <div class="error_field" style="align-self:center;font-weight: bold;color: white;" >Old Password </div>
            <input class="input-field pass" type="password" placeholder="Enter here" name="old_password" required>
            <div class="spacer"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: white;">New Password </div>
            <input class="input-field pass" type="password" placeholder="Make sure to use a strong Password" name="new_password" required> 
            <div style="height:40px;"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: white;">Confirm New Password </div>
            <input class="input-field pass" type="password" placeholder="Make sure to match the new Password" name="new_password_confirm" required>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <input type="hidden" name="type" value="password" id="type">
            <button class="login-button-new-i" type="submit" id="password_submit" style="background: rgb(201, 198, 198);">Confirm</button>
            <div style="height:10px;"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: #AEFEFF;" id="password_form_msg"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: #EC255A;" id="password_form_msg_2"></div>
            <div style="height:40px;"></div>
        </form>  
        <a href="front_profile.php" class="login-button-new-i">Change User Information</a>        
    </div>
<?php
include('front_footer.php');
?>