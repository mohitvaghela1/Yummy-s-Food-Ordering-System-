<?php 
include 'menu.php';
$id = $_GET['id'];
?>
   
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            $result = $db->readData("SELECT * FROM master_food WHERE cate_id = $id AND food_active = 'yes'");
            if($result != VALUE_NOT_FOUND)
            {

            
            foreach($result as $res){

            
            ?>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $res->food_image?>" alt="<?php echo $res->food_name?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $res->food_name?></h4>
                    <p class="food-price">Rs.<?php echo $res->food_price?></p>
                    <p class="food-detail">
                        <?php echo $res->food_desc?>
                    </p>
                    <br>

                    <a href="order.php?id=<?php echo $res->food_id?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php 
            }
            }else{
                header("location:index.php");
            }
            ?>

          


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php 
include 'footer.php';
?>