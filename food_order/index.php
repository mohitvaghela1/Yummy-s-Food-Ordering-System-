<?php 
include 'menu.php';
?>
    
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
            
            if(isset($_SESSION['order']))
            {
                echo $_SESSION['order'];
                unset($_SESSION['order']);
            }
            ?>

            <?php 
            $result = $db->readData("SELECT * FROM master_category WHERE cate_active = 'yes' AND cate_featured = 'yes' LIMIT 3 ");
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

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            $result1 = $db->readData("SELECT * FROM master_food WHERE food_active ='yes' AND food_featured='yes' LIMIT 6 " );
            foreach($result1 as $res1){
            ?>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $res1->food_image?>" alt="<?php echo $res1->food_name?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $res1->food_name?></h4>
                    <p class="food-price">Rs.<?php echo $res1->food_price?></p>
                    <p class="food-detail"><?php echo $res1->food_desc?></p>
                    <br>

                    <a href="order.php?id=<?php echo $res1->food_id?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php 
            }
            ?>

     


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php 
include 'footer.php';
?>