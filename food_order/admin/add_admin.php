<?php
include 'menu.php';

?>

<div class="main_content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="fullname" placeholder="Enter Your Full Name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter Your username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td><input class="btn-secondary" type="submit" name ="submit" value="Add Admin"></td>
                </tr>
            </table>

        </form>
    </div>

</div>
<?php include 'footer.php'?>

<?php 

if(isset($_POST['submit']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $result = $db->insertData("INSERT INTO master_admin VALUES ('','$username','$fullname','$password')" );
    if($result == VALUE_INSERTED){
        header("location:manage_admin.php");
    }else{
        echo "value not added";
    }
}

?>