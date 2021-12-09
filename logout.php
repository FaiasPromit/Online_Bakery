<?php
session_start();
include('function.inc.php');  
unset($_SESSION['IS_LOGIN']);
redirect('login.php');
?>