<?php
    include('front_header.php');
    if(isset($_SESSION['FOOD_USER_ID'])){
        redirect('front_index.php');
    }
    
?>

    <div class="main-login">
        <p class="sign_in-text" >Sign in Page</p>
        <form class="login_form" id="frmLogin">
            <input class="input-field username" type="email" placeholder="Email" name="user_email" id="user_email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required>
            <div style="height:40px;"></div> 
            <input class="input-field pass" type="password" placeholder="Password" name="user_password" id="user_password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
            <div style="height:40px;"></div> 
            <input type="hidden" name="type" value="login" id="type">
            <button class="login-button-new-i" type="submit" id="login_submit" style="background: rgb(201, 198, 198);">Login</button>  
            <div style="height:10px;"></div> 
            <div class="login_field" style="align-self:center;font-weight: bold;color: #EC255A;" id="form_login_msg"></div>
            <div class="spacer"></div>
            <span style="padding-bottom:5px; text-align:center;">
                <input type="checkbox" name="remember">
                <label>Remember Me</label>
            </span>
        </form>
        
        <p class="forgot" ><a href="front_forgot_password.php" style="color:white;"><u>Forgot Password?</u> </p>   
        <a href="front_register.php" class="login-button-new-i">Create a New Account!!</a>        
    </div>
<?php
include('front_footer.php');
?>