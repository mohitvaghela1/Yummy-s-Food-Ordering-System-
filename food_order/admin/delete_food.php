<?php 
include 'connection.php';
$db = new Connection;
$id = $_GET['id'];
$image = $_GET['image'];
$path = '../images/food/'.$image;
unlink($path);
$result = $db->deleteData("DELETE FROM master_food WHERE food_id= $id");
if($result == VALUE_DELETED){
    header("location:manage_food.php");
}

?>