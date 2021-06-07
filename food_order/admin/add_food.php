<?php 
include 'menu.php';
if(isset($_POST['submit']))
    {
    $name = $_POST['food_name'];
    $desc = $_POST['food_desc'];
    $price = $_POST['food_price'];
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg') 
        {
            $result = $db->insertData("INSERT INTO master_food VALUES ('','$name', '$desc', '$price', '$image', '$category', '$featured', '$active')");
            if($result == VALUE_INSERTED){
                move_uploaded_file($_FILES['image']['tmp_name'],"../images/food/".$image);
                header("location:manage_food.php");
            }
        }else{
            echo "File type is now allowed";
        }

    }

?>
    <div class = "main_content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <br><br>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>
                           Food Name:
                        </td>

                        <td>
                            <input type="text" name="food_name" id="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description:
                        </td>

                        <td>
                            <textarea name="food_desc" id="" cols="30" rows="3"></textarea>
                        </td>
                    </tr> 

                    <tr>
                        <td>
                            Price:
                        </td>

                        <td>
                            <input type="number" name="food_price" id="">
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
                            $result = $db->readData("SELECT * FROM master_category WHERE cate_active = 'yes'");
                            foreach($result as $res){
                            ?>
                                <option value="<?php echo $res->cate_id?>"><?php echo $res->cate_name?></option>
                            <?php
                            }
                            ?>    
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Active:
                        </td>

                        <td>
                            <input type="radio" name="featured"  value="yes"id=""> Yes
                            <input type="radio" name="featured"  value="No"id=""> No
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Featured:
                        </td>

                        <td>
                            <input type="radio" name="active"  value="yes"id=""> Yes
                            <input type="radio" name="active"  value="No"id=""> No
                        </td>
                    </tr> 

                    <tr>
                            <td>
                            <button name="submit" value="go" class="btn-primary">Add</button>
                            </td>
                    </tr>   


                </table>
            </form>
        </div>
    
    </div>
    <?php 


?>


<?php include 'footer.php';?>
