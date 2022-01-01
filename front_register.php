<?php
    include('front_header.php');
?>
    <div class="main-login">
        <p class="sign_in-text" >Register Page</p>
        <form class="login_form" method="post" id="id_form_register" action="front_index.php">
            <input class="username" type="text" placeholder="Name" id="name" name="name" required>
            <input class="pass" type="text" placeholder="Email Address" name="email" id="email" required>
            <div class="error_field" style="align-self:center;font-weight: bold;color: red;"  id="email_error"></div>
            <div class="spacer"></div>
            <input class="pass" type="text" placeholder="Mobile no." name="mobile" id="mobile" required>
            <div class="spacer"></div>
            <input class="pass" type="password" placeholder="Password" name="password" id="password" required>
            <div class="spacer"></div>
            <input type="hidden" name="type" value="register" id="type">
            <button class="submit" type="submit" id="register_submit" style="background: rgb(201, 198, 198);">Register</button>
            <div class="error_field" style="align-self:center;font-weight: bold;color: green;" id="form_msg"></div>
        </form>
        <p class="forgot" ><a href="#">Forgot Password?</p>   
        <a href="front_login.php" class="submit">Already have an account??</a>        
    </div>
<?php
include('front_footer.php');
?>