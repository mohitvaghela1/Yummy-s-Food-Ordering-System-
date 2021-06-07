<?php 
include 'menu.php';
?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            $result = $db->readData("SELECT * FROM master_category WHERE cate_active = 'yes'");
            foreach($result as $res){
            ?>

            <a href="category-foods.php?id=<?php echo $res->cate_id?>">
            <div class="box-3 float-container">
                <img src="images/category/<?php echo $res->cate_image?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $res->cate_name?></h3>
            </div>
            </a>
            <?php 
            }
            ?>
            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php 
include 'footer.php';
?>