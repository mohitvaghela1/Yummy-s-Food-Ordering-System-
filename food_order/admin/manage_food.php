<?php
include 'menu.php';
?>

<div class="main_content">
    <div class="wrapper">
    <h1>Manage Food</h1>
    <br>
                <a class="btn-primary" href="add_food.php">Add Food</a>
                <br>
                <br> 
    <table class="tbl-full">
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                    </tr>
                    <?php 
                    $result = $db->readData("SELECT * FROM master_food ");
                    $i = 1;
                    foreach($result as $res){
                    ?>


                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $res->food_name?></td>
                        <td><?php echo $res->food_desc?></td>
                        <td><?php echo $res->food_price?></td>
                        <td>
                        <img src="../images/food/<?php echo $res->food_image?>" width="100px" alt="">
                        </td>
                            

                        <td><?php
                        $result1 = $db->readData("SELECT * FROM master_category WHERE cate_id = $res->cate_id");
                        foreach($result1 as $res1)
                        {
                        echo $res1->cate_name;
                        }
                         
                         ?></td>


                        <td><?php echo $res->food_featured?></td>
                        <td><?php echo $res->food_active?></td>

                        <td>
                            <a class="btn-secondary" href="update_food.php?id=<?php echo $res->food_id?>">UPDATE</a>
                            <a class="btn-danger" href="delete_food.php?id=<?php echo $res->food_id?>&image=<?php echo $res->food_image?>">DELETE</a>
                        </td>
                    </tr>

                    <?php
                    $i++;
                    }
                    ?>


                </table>
                   
    </div>


</div>


<?php 
include 'footer.php';

?>