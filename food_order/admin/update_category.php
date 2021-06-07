<?php include 'menu.php';
$id = $_GET['id'];
?>


<div class="main_content">
    <div class="wrapper" >
    <h1>Update Category</h1>

    <br> <br>
        <form class="" action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
            <?php 
            $result = $db->readData("SELECT * FROM master_category WHERE cate_id = $id");
            foreach($result as $res){
            ?>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" id="" value="<?php echo $res->cate_name?>" placeholder="Title of Category">
                    </td>
                </tr>

                <tr>
                    <td>Previous Image:</td>
                    <td>
                        <img src="../images/category/<?php echo $res->cate_image?>" width = "100px" alt="">
                        
                    </td>
                </tr>

                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                    
                        <input type="radio" name="featured" value="yes"
                        <?php
                        if($res->cate_featured == "yes"){
                            echo "checked";
                        }
                        ?>
                        
                          > Yes
                        <input type="radio" name="featured" value="no"
                        <?php
                        if($res->cate_featured == "no"){
                            echo "checked";
                        }
                        ?>
                          > No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" 
                        
                        <?php
                        if($res->cate_active== "yes"){
                            echo "checked";
                        }
                        ?>
                        
                        value="yes" id=""> Yes
                        <input type="radio" name="active" 
                        <?php
                        if($res->cate_active== "no"){
                            echo "checked";
                        }
                        ?>
                        value="no" id=""> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="previous_image" value="<?php echo $res->cate_image ?>" id="">
                        <button class="btn-secondary" name="submit">ADD</button>
                    </td>
                </tr>
                <?php 
                }
                ?>

            </table>
        </form>   
    </div>
</div>
<?php
if(isset($_POST['submit']))
{


$title = $_POST['title'];
$featured = $_POST['featured'];
$active = $_POST['active'];
$new = $_FILES['image']['name'];
$old = $_POST['previous_image'];

if($new == null){
    $image = $_POST['previous_image'];
    
    
}else{
    $image = $_FILES['image']['name'];
    
    
}

$result = $db->updateData("UPDATE master_category SET cate_name = '$title', cate_image='$image', cate_featured = '$featured', cate_active = '$active' WHERE cate_id = $id");
if($new != null){
    move_uploaded_file($_FILES['image']['tmp_name'],"../images/category/".$image);
    $path = '../images/category/'.$old;
    unlink($path);
    
}
if($result == VALUE_UPDATED){
    header("location:manage_category.php");
}
}

?>
<?php include 'footer.php'?>