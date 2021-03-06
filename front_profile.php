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
        <form class="login_form" method="post" id="frmProfile" action="#">
            <div class="error_field" style="align-self:center;font-weight: bold;margin-bottom:0.5rem;" >Email Address </div>
            <input class="input-field pass" type="text" placeholder="Email Address" name="email" id="email" value="<?php echo $getUserDetails['email']?>" readonly="readonly">
            <div class="spacer"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;margin-bottom:0.5rem;">Name </div>
            <input class="input-field username" type="text" placeholder="Name" id="name" name="name" value="<?php echo $getUserDetails['name']?>" required> 
            <div style="height:40px;"></div>
            <div class="error_field" style="align-self:center;font-weight: bold;margin-bottom:0.5rem;">Mobile Number  </div>
            <input class="input-field pass" type="text" placeholder="Mobile no." name="mobile" id="mobile" value="<?php echo $getUserDetails['mobile']?>" required>
            <div class="spacer"></div>
            <!-- <div class="error_field" style="align-self:center;font-weight: bold;color: black;">Password</div>
            <input class="pass" type="password" placeholder="Password" name="password" id="password" required> -->
            <div class="spacer"></div>
            <input type="hidden" name="type" value="profile" id="type">
            <button class="login-button-new-i" type="submit" id="profile_submit" style="background: rgb(201, 198, 198);">Save</button>
            <div class="error_field" style="align-self:center;font-weight: bold;color: #AEFEFF;" id="form_msg"></div>
        </form>
        <div style="height:40px;"></div> 
        <a style="display:flex;width:100%;flex-direction:column;border:none;background-color:transparent;" href="front_change_password.php"><button class="login-button-new-i">Change Password</button>  </a>     
    </div>
<?php
include('front_footer.php');
?>