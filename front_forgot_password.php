<?php
    include('front_header.php');
    
?>

    <div class="main-login">
        <p class="sign_in-text" >Forgot Password</p>
        <form class="login_form" id="frmForgotPassword">
            <input class="username" type="email" placeholder="Email" name="user_email" id="user_email" required>
            <input type="hidden" name="type" value="forgot" id="type">
            <button class="submit" type="submit" id="forgot_submit" style="background: rgb(201, 198, 198);">Submit</button>  
            <div class="login_field" style="align-self:center;font-weight: bold;color: red;" id="form_forgot_msg"></div>
            <div class="spacer"></div>
        </form>
        <a href="front_login.php" class="submit">Go to Login Page</a>        
    </div>
<?php
include('front_footer.php');
?>