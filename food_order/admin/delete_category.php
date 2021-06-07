<?php 
include 'connection.php';
$db = new Connection;
$id = $_GET['id'];
$img = $_GET['image'];
$path = '../images/category/'.$img;
unlink($path);
$result = $db->deleteData("DELETE FROM master_category WHERE cate_id = $id");

if($result == VALUE_DELETED){

    header("location:manage_category.php");
}else{
    echo "value could not be deleted";
}
?>