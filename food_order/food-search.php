<?php 
include 'menu.php';
$search = $_POST['search'];
?>
  

    <!-- fOOD sEARCH Section Starts Here -->
    <section class=" text-center">

            
            <h2 background="black" >Foods on Your Search <a href="#" class="">"<?php echo $search?>"</a></h2>

       
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            $result = $db->readData("SELECT * FROM master_food WHERE food_name LIKE '%$search%' OR food_desc LIKE '%$search%'");
            
            if($result != VALUE_NOT_FOUND)
            {

            
            foreach($result as $res){
            
            ?>

           

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $res->food_image?>" alt="<?php echo $res->food_name;?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $res->food_name?></h4>
                    <p class="food-price">Rs.<?php echo $res->food_price?></p>
                    <p class="food-detail">
                        <?php echo $res->food_desc;?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php 
            }}else{ 
                echo "<h4 class='text-center'>Item not found</h4>";

            }
            ?>

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php 
include 'footer.php';
?>