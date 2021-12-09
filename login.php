<?php
    session_start();
    include('database.inc.php');
    include('function.inc.php');
    $msg="";
    if(isset($_POST['submit'])){
        $username=get_safe_value($_POST['username']);
        $password=get_safe_value($_POST['password']);
        echo $sql="select * from admin where username='$username' and password='$password'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $_SESSION['IS_LOGIN'] = 'yes';
            redirect('index.php');
        }else{
            $msg="Please enter valid login details";
        }
    }
?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      

      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>User Name</label>
                        <input type="textbox" class="form-control" placeholder="UserName" name="username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                     </div>
                     <div class="mt-3">
                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN" name="submit"/>
                     </div>
                     <?php echo $msg?>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>