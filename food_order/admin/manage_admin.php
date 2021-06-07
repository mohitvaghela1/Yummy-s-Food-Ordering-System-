     <?php include 'menu.php';?>
    <!-- menu section End -->




    <!-- main content section start -->
        <div class="main_content">
        <div class="wrapper">
                <h1>Admin Manager</h1>
                <br>
                <a class="btn-primary" href="add_admin.php">Add admin</a>
                <br>
                <br> 
                <table class="tbl-full">
                    <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>UserName</th>
                    <th>Action</th>
                    </tr>

                    <?php 
                    $result = $db->readData("SELECT * FROM master_admin");
                    if($result != VALUE_NOT_FOUND)
                        {
                            $i = 1;
                    foreach($result as $res)
                    {
                    ?>

                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $res->admin_fullname?></td>
                        <td><?php echo $res->admin_username?></td>
                        <td>    
                            <a  class="btn-primary" href="change_password.php?id=<?php echo $res->admin_id?>">Change Password </a>
                            <a class="btn-secondary" href="update_admin.php?id=<?php echo $res->admin_id?>">UPDATE</a>
                            <a class="btn-danger" href="delete_admin.php?id=<?php echo $res->admin_id?>">DELETE</a>
                        </td>
                    </tr>

                    <?php 
                        $i++;}
                        }
                    ?>

                   

                   

                   

                </table>
                   
            </div>
        </div>
    <!-- main content section End -->



    <!-- Footer section start -->
       <?php include 'footer.php'?>
  
