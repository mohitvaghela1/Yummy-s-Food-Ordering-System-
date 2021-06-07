<?php
include 'connection.php';
$db = new Connection;
$id = $_GET['id'];
$result = $db->deleteData("DELETE FROM master_admin WHERE admin_id = $id");
if($result == VALUE_DELETED){
    header("location:manage_admin.php");
}else{
    echo "failed";
}
?>