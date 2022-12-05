<?php 
session_start();
 unset($_SESSION["userName"]);
 unset($_SESSION["PASSWORD"]);
 header('location: index-admin.php'); 
?>