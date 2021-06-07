<?php 
session_start();
$id = $_GET['id'];
$email = $_SESSION['email'];
unset($_SESSION['email']);
header("location:order.php?id=$id&usermail=$email");
?>