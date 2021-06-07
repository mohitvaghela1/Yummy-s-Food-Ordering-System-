<?php
include 'menu.php';
$id = $_GET['id'];

?>

<div class="main_content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password </td>
                    <td><input type="password" name="current_password" placeholder="Enter Your current password"></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password" placeholder="Enter new password"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm password"></td>
                </tr>
                <tr>
                    <td><input class="btn-secondary" type="submit" name ="submit" value="Change Admin"></td>
                </tr>
            </table>

        </form>
    </div>

</div>
<?php include 'footer.php'?>

<?php 

if(isset($_POST['submit']))
{
  $current_pass = $_POST['current_password'];
  $new_pass = $_POST['new_password'];
  $confirm_pass = $_POST['confirm_password'];
  
  $result = $db->readData("SELECT * FROM master_admin WHERE admin_id = $id");
  foreach($result as $res){
      $password = $res->admin_password;
  }
  if($password = $current_pass){
      if($new_pass == $confirm_pass){
          $pass = md5($new_pass);
          $result = $db->updateData("UPDATE master_admin SET admin_password = '$pass' WHERE admin_id=$id");
          if($result == VALUE_UPDATED){
              header("location:manage_admin.php");
          }else{
              echo "value did not changed";
          }
      }else{
          echo "You confirm password do not match with new password ";
      }
  }else{
      echo "your old password is wrong ";  }
    
}

?>