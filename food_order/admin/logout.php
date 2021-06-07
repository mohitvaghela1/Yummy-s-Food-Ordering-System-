<?php
include 'connection.php';
session_start();
if($_SESSION['login'] == "yes"){
    session_destroy();
    header("location:login.php");
}else{
    
}


?>