<?php
    include('front_header.php');
    
?>

    <div class="main-login">
        <p class="sign_in-text" >Forgot Password</p>
        <form class="login_form" id="frmForgotPassword">
            <input class="input-field username" type="email" placeholder="Email" name="user_email" id="user_email" required>
            <input type="hidden" name="type" value="forgot" id="type">
            <div style="height:40px;"></div>
            <button class="login-button-new-i" type="submit" id="forgot_submit" style="background: rgb(201, 198, 198);">Submit</button>  
            <div style="height:10px;"></div>
            <div class="login_field" style="align-self:center;font-weight: bold;color: #AEFEFF;" id="form_forgot_msg"></div>
            <div class="spacer"></div>
        </form>
        <a href="front_login.php" class="login-button-new-i">Go to Login Page</a>
        <div style="height:40px;"></div>
        <a href="front_register.php" class="login-button-new-i">Go to Registration Page</a>        
    </div>
<?php
include('front_footer.php');
?>