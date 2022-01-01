<?php
    include('front_header.php');
    
?>

    <div class="main-login">
        <p class="sign_in-text" >Sign in Page</p>
        <form class="login_form" id="frmLogin">
            <input class="username" type="email" placeholder="Email" name="user_email" id="user_email" required>
            <input class="pass" type="password" placeholder="Password" name="user_password" id="user_password" required>
            <input type="hidden" name="type" value="login" id="type">
            <button class="submit" type="submit" id="login_submit" style="background: rgb(201, 198, 198);">Login</button>  
            <div class="login_field" style="align-self:center;font-weight: bold;color: red;" id="form_login_msg"></div>
            <div class="spacer"></div>
        </form>
        <span style="padding-bottom:5px;">
            <input type="checkbox">
            <label>Remember Me</label>
        </span>
        <p class="forgot" ><a href="#">Forgot Password?</p>   
        <a href="front_register.php" class="submit">Create a New Account!!</a>        
    </div>
<?php
include('front_footer.php');
?>