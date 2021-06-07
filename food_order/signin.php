<?php 
include 'admin/connection.php';
$db = new Connection;
if(isset($_POST['submit'])){
    echo "hello";
    $name = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $order_id = 0;
   $result = $db->insertData("INSERT INTO customer VALUES('','$name','$email','$number','$password',$order_id,'$address')");
   if($result != VALUE_NOT_FOUND){
        header("location:login.php");
   }else{
       echo 'error';
   }
        

}else{
    echo "no";  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
            <form class="box" action="" method="POST">
                <table class="text_align">
                    <tr>
                            <h1>Sign In</h1>
                        <td>
                        <label style='color:white' for="">Username</label>

                        </td>
                        <td>
                        <input type="text" name="username" id="">

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label style='color:white' for="">Address</label>

                        </td>
                        <td>
                        <input type="text" name="address" id="">

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label style='color:white' for="">Phone Number</label>

                        </td>
                        <td>
                        <input type="text" name="number" id="">

                        </td>
                    </tr>

                    <tr>
                        <td>
                        <label style='color:white' for="">Email</label>

                        </td>
                        <td>
                        <input type="mail" name="email" id="">

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label style='color:white' for="">Password</label>

                        </td>
                        <td>
                        <input type="password" name="password" id="">

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button name='submit' >Sign In</button>
                        </td>
                            
                       
                    </tr>


                </table>
                

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>