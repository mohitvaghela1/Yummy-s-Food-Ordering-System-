<?php
include 'menu.php';
$id = $_GET['id'];

?>

<div class="main_content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <?php 
                $result = $db->readData("SELECT * FROM master_admin WHERE admin_id = $id");
                foreach($result as $res){
                ?>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="fullname" Value="<?php echo $res->admin_fullname?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" Value="<?php echo $res->admin_username?>"></td>
                </tr>
                
                <?php 
                }
                ?>
                <tr>
                    <td><input class="btn-secondary" type="submit" name ="submit" value="Update Admin"></td>
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
    
    
    $result = $db->updateData("UPDATE master_admin SET admin_fullname = '$fullname', admin_username= '$username' WHERE admin_id=$id" );
    if($result == VALUE_UPDATED){
        header("location:manage_admin.php");
    }else{
        echo "value not Updated";
    }
}

?>