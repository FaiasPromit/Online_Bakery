<?php
    include('front_header.php');
    if(isset($_SESSION['FOOD_USER_ID'])){
        redirect('front_index.php');
    }
?>
    <div class="main-login">
        <p class="sign_in-text" >Register Page</p>
        <form class="login_form" method="post" id="id_form_register" action="front_index.php">
            <input class=" input-field username" type="text" placeholder="Name" id="name" name="name" required>
            <div style="height:40px;"></div>
            <input class="input-field pass" type="email" placeholder="Email Address" name="email" id="email" required>
            <div style="height:10px;"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: #EC255A;"  id="email_error"></div>
            <div class="spacer"></div>
            <input class="input-field pass" type="number" placeholder="Mobile no." name="mobile" id="mobile" required>
            <div class="spacer"></div>
            <input class="input-field pass" type="password" placeholder="Password" name="password" id="password" required>
            <div class="spacer"></div>
            <input type="hidden" name="type" value="register" id="type">
            <button class="login-button-new-i" type="submit" id="register_submit" style="background: rgb(201, 198, 198);">Register</button>
            <div style="height:10px;"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;color: #AEFEFF;" id="form_msg"></div>
        </form>
        <p class="forgot" ><a href="front_forgot_password.php" style="color:white;"><u>Forgot Password?</u> </p> 
        <p class="forgot" ><a href="email_reverification.php" style="color:white;"><u>Resend Verification Link?</u> </p>    
        <a href="front_login.php" class="login-button-new-i">Already have an account??</a>        
    </div>
<?php
include('front_footer.php');
?>