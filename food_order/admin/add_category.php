<?php 
include 'menu.php';
?>
<div class = "main_content">
    <div class="wrapper">
        <h1>Add category</h1>
        <br> <br>
        <form class="" action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" id="" placeholder="Title of Category">
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
                        <input type="radio" name="featured" value="yes" id=""> Yes
                        <input type="radio" name="featured" value="no" id=""> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes" id=""> Yes
                        <input type="radio" name="active" value="no" id=""> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <button class="btn-secondary" name="submit">ADD</button>
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>


<?php 
include 'footer.php';
?>

<?php 
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];


$ext = pathinfo($image, PATHINFO_EXTENSION);
if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg') {
    $result = $db->insertData("INSERT INTO master_category VALUES ('','$title','$image','$featured','$active')");
    if($result== VALUE_INSERTED){
        move_uploaded_file($_FILES['image']['tmp_name'],"../images/category/".$image);
        header("location:manage_category.php");
    }
}else{
    echo "File not allowed";
}

    
}

//echo $title,$image,$featured,$active;
?>