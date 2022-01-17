<?php
    include('front_header.php');
    
?>

    <div class="main-login">
        <p class="sign_in-text" >Resend your Verification link</p>
        <form class="login_form" id="frmReverification">
            <input class="input-field username" type="email" placeholder="Email" name="reverify_email" id="reverify_email" required>
            <input type="hidden" name="type" value="reverification" id="type">
            <div style="height:40px;"></div> 
            <button class="login-button-new-i" type="submit" id="reverification_submit" style="background: rgb(201, 198, 198);">Submit</button> 
            <div style="height:10px;"></div>  
            <div class="login_field" style="align-self:center;font-weight: bold;color: #EC255A;text-align:center;" id="form_reverification_msg_error"></div>
            <div class="login_field" style="align-self:center;font-weight: bold;color: #AEFEFF;text-align:center;" id="form_reverification_msg_success"></div>
            <div style="height:40px;"></div>
            <div class="spacer"></div>
        </form>
        <a href="front_login.php" class="login-button-new-i">Go to Login Page</a>    
        <div style="height:40px;"></div>
        <a href="front_register.php" class="login-button-new-i">Go to Registration Page</a>    
    </div>
<?php
include('front_footer.php');
?>