<?php
include 'menu.php';
?>

<div class="main_content">
    <div class="wrapper">
    <h1>Manage Category</h1>
    <br>
                <a class="btn-primary" href="add_category.php">Add Category</a>
                <br>
                <br> 
    <table class="tbl-full">
                    <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>active</th>
                    <th>Action</th>
                    </tr>

                <?php 
                $result = $db->readData("SELECT * FROM master_category");
                $i = 1;
                foreach($result as $res){

                
                ?>

                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $res->cate_name?></td>
                        <td><img src="../images/category/<?php echo $res->cate_image?>"  width="100px" alt="category_img"></td>
                        <td><?php echo $res->cate_featured?></td>
                        <td><?php echo $res->cate_active?></td>
                        <td>
                            <a class="btn-secondary" href="update_category.php?id=<?php echo $res->cate_id?>">UPDATE</a>
                            <a class="btn-danger" href="delete_category.php?id=<?php echo $res->cate_id;?>&image=<?php echo $res->cate_image;?>">DELETE</a>
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