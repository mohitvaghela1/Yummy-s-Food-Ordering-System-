<?php 
include_once 'connection.php';
session_start();
$db = new Connection;
if(!isset($_SESSION['username'])){
  header("location:login.php");

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
  </head>
  <body>

<div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage_admin.php">Admin</a></li>
                    <li><a href="manage_category.php">Category</a></li>
                    <li><a href="manage_food.php">Food</a></li>
                    <li><a href="manage_order.php">Order</a></li>
                    <li><a href="logout.php">Log out</a></li>
                
                
                </ul>
            </div>
         
        </div>