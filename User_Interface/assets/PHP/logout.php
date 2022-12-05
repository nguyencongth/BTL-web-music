<?php 
session_start();
 unset($_SESSION["USER"]);
 unset($_SESSION["PASSWORD"]);
 header('location: http://localhost/Nhom8_Web_Music_demo/User_Interface/index.php'); 
?>