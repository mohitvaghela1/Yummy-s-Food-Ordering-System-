
    <!-- menu section start -->
    <?php include 'menu.php';?>
    <!-- menu section End -->




    <!-- main content section start -->
        <div class="main_content">
        <div class="wrapper">
                <h1>DASHBOARD</h1>
                <div class="row">
                    <div class="col-4 text-center " >
                       <a style="text-decoration:none" href="manage_admin.php"> <h1>
                        <?php 
                        $result = $db->readData("SELECT * FROM master_admin");
                        $i=0;
                        foreach($result as $res){
                            $i = $i +1;
                        }
                        echo $i;
                        ?>
                        </h1> </a>
                        Admins   

                    </div>
                    <div class="col-4 text-center " >
                    <a style="text-decoration:none" href="manage_category.php"> <h1> <?php 
                        $result = $db->readData("SELECT * FROM master_category");
                        $i=0;
                        foreach($result as $res){
                            $i = $i +1;
                        }
                        echo $i;
                        ?> </h1></a>
                        Categories  

                    </div>
                    <div class="col-4 text-center " >
                    <a style="text-decoration:none" href="manage_food.php"><h1> <?php 
                        $result = $db->readData("SELECT * FROM master_food");
                        $i=0;
                        if($result != VALUE_NOT_FOUND){
                        foreach($result as $res){
                            $i = $i +1;
                        }}
                        echo $i;
                        ?> </h1></a>
                        Food   

                    </div>
                    <div class="col-4 text-center " >
                    <a style="text-decoration:none" href="manage_order.php"> <h1> <?php 
                        $result = $db->readData("SELECT * FROM food_order");
                        $i=0;
                        if($result != VALUE_NOT_FOUND){
                        foreach($result as $res){
                            $i = $i +1;
                        }}
                        echo $i;
                        ?> </h1></a>
                        Total Orders   

                    </div>

                    <div class="col-4 text-center " >
                    <a style="text-decoration:none" href="manage_order.php"> <h1> <?php 
                        $result = $db->readData("SELECT * FROM food_order WHERE order_status = 'Ordered'");
                        $i=0;
                        if($result != VALUE_NOT_FOUND){
                        foreach($result as $res){
                            $i = $i +1;
                        }}
                        echo $i;
                        ?> </h1></a>
                        Pending Orders   

                    </div>
                    <div class="col-4 text-center " >
                    <a style="text-decoration:none" href="manage_order.php"><h1> <?php 
                        $result = $db->readData("SELECT * FROM food_order WHERE order_status = 'Delivered'");
                        $i=0;
                        if($result != VALUE_NOT_FOUND){
                        foreach($result as $res){
                            $i = $i +1;
                        }}
                        echo $i;
                        ?> </h1> </a>
                        Delivered Orders  

                    </div>

                    <div class="col-4 text-center " >
                    <a style="text-decoration:none" href="manage_order.php"><h1> <?php 
                        $result = $db->readData("SELECT * FROM food_order WHERE order_status = 'On the way'");
                        $i=0;
                        if($result != VALUE_NOT_FOUND){
                        foreach($result as $res){
                            $i = $i +1;
                        }}
                        echo $i;
                        ?> </h1> </a>
                        On the way  

                    </div>
                    </div>

                    <div class="clear-fix"></div>
            </div>
        </div>
    <!-- main content section End -->



    <!-- Footer section start -->
      <?php include 'footer.php'?>
   
