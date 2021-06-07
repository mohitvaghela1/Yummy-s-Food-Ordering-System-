<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>lOG IN</title>
</head>
<body>
    <div class="login">
    <h1 class="text-align">Log in</h1>
    <br> 
    <form class="text-align" action="" method="POST">
    Username: <br> 
    <input type="text" name="username" placeholder="enter username"> <br> <br>
    Password: <br>
    <input type="password" name="password" placeholder="enter password"> <br><br>

    <input type="submit" value="log in" name ="submit" class="btn-primary">
    
    </form>

    <p class="text-align" >Created By- Bunny</p>
    </div>
    
</body>
</html>
<?php 
include 'connection.php';
$db = new Connection;
session_start();
if(isset($_POST['submit'])){


$username = $_POST['username'];
$password = md5($_POST['password']);
$result = $db->readData("SELECT * FROM master_admin WHERE admin_username='$username' AND admin_password = '$password'");
if($result != VALUE_NOT_FOUND){
    $_SESSION['login'] = "yes";
    $_SESSION['username'] = $username;
    header("location:index.php");
    
}else{
    echo "<script>alert('your username or password is wrong')</script>";
}

}

?>