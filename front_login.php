<?php
    include('front_header.php');
    if(isset($_SESSION['FOOD_USER_ID'])){
        redirect('front_index.php');
    }
    
?>

    <div class="main-login">
        <p class="sign_in-text" >Sign in Page</p>
        <form class="login_form" id="frmLogin">
            <input class="username" type="email" placeholder="Email" name="user_email" id="user_email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required>
            <input class="pass" type="password" placeholder="Password" name="user_password" id="user_password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
            <input type="hidden" name="type" value="login" id="type">
            <button class="submit" type="submit" id="login_submit" style="background: rgb(201, 198, 198);">Login</button>  
            <div class="login_field" style="align-self:center;font-weight: bold;color: red;" id="form_login_msg"></div>
            <div class="spacer"></div>
            <span style="padding-bottom:5px; text-align:center;">
                <input type="checkbox" name="remember">
                <label>Remember Me</label>
            </span>
        </form>
        
        <p class="forgot" ><a href="front_forgot_password.php">Forgot Password?</p>   
        <a href="front_register.php" class="submit">Create a New Account!!</a>        
    </div>
<?php
include('front_footer.php');
?>