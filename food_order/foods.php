<?php 
include 'menu.php';
?>
  

   
 

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            $result1 = $db->readData("SELECT * FROM master_food WHERE food_active ='yes'" );
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

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php 
include 'footer.php';
?>