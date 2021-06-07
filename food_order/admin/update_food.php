<?php 
include 'menu.php';
$id = $_GET['id'];
?>

<?php 
if(isset($_POST['submit']))
{
$name = $_POST['food_name'];
$desc = $_POST['food_desc'];
$price = $_POST['food_price'];
$new = $_FILES['image']['name'];
$category = $_POST['category'];
$featured = $_POST['featured'];
$active = $_POST['active'];
$old = $_POST['old_image'];
if($new != null)
{
    $image = $_FILES['image']['name'];
}else{
    $image = $_POST['old_image'];
}

    $result = $db->updateData("UPDATE master_food SET food_name='$name',food_desc='$desc' , food_price='$price', food_image='$image', cate_id='$category',food_featured='$featured', food_active='$active' WHERE food_id='$id'");
    
    if($new != null){
        move_uploaded_file($_FILES['image']['tmp_name'],"../images/food".$image);
        $path = "../images/food".$old;
        
    }
    if($result == VALUE_UPDATED){
        header("location:manage_food.php");
    }
    
        
    

}
?>
<div class="main_content">
    <div class="wrapper">
        <h1>
            Update Food
        </h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30 ">

                <?php 
                $result = $db->readData("SELECT * FROM master_food WHERE food_id =$id");
                foreach($result as $res)
                {
                ?>
                    <tr>
                        <td>
                           Food Name:
                        </td>

                        <td>
                            <input type="text" value="<?php echo $res->food_name?>" name="food_name" id="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description:
                        </td>

                        <td>
                            <textarea name="food_desc"  id="" cols="30" rows="3"><?php echo $res->food_desc;?>
                            </textarea>
                        </td>
                    </tr> 

                    <tr>
                        <td>
                            Price:
                        </td>

                        <td>
                            <input type="number" value="<?php echo $res->food_price?>" name="food_price" id="">
                        </td>
                    </tr> 

                    <tr>
                        <td>
                           Old Image:
                        </td>

                        <td>
                            <img src="../images/food/<?php echo $res->food_image?>" width="100px" alt="old image">
                            <input type="hidden" name="old_image" value="<?php echo $res->food_image?>" id="">

                        </td>
                    </tr>  

                    <tr>
                        <td>
                           Image:
                        </td>

                        <td>
                            <input type="file" name="image" id="">
                        </td>
                    </tr> 
                   
                    <tr>
                        <td>
                            Category:
                        </td>

                        <td>
                            <select name="category" id="">
                            <?php 
                            $result1 = $db->readData("SELECT * FROM master_category WHERE cate_active = 'yes'");
                            foreach($result1 as $res1)
                            {
                            ?>
                                <option <?php if($res->cate_id == $res1->cate_id){echo "selected";}?> value="<?php echo $res1->cate_id?>"><?php echo $res1->cate_name?></option>
                            <?php
                            }
                            ?>    
                            </select>
                        </td>
                    </tr>

                   <tr>
                  
                   <td>Featured:</td>
                   <td>
                            <input <?php if($res->food_featured=='yes'){echo "checked";}else{ echo "unchecked";}?> type="radio" name="featured" value="yes">Yes
                            <input <?php if($res->food_featured=='no'){echo "checked";}else{ echo "unchecked";}?> type="radio" name="featured" value="no" >No
                           
                   
                   </td>
                   </tr>

                   <tr>
                        <td>
                            Active:
                        </td>

                        <td>
                        <input <?php if($res->food_active=='yes'){echo "checked";}?> type="radio" name="active" value="yes">Yes
                        <input <?php if($res->food_active=='no'){echo "checked";}?> type="radio" name="active" value="no">No
                        </td>
                           
                    </tr>

 

                    <tr>
                            <td>
                            <button name="submit" value="go" class="btn-primary">Add</button>
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
include 'footer.php';
?>