<?php 
include 'menu.php';
$email = $_SESSION['email'];




if($_GET['id'])
{
$id = $_GET['id'];
}else{
    header("location:index.php");
    
}

if(isset($_POST['submit'])){
    $result2 = $db->readData("SELECT * FROM master_food");
    foreach($result2 as $res2){
        $food_name = $res2->food_name;
        $food_price = $res2->food_price;

    }
    $result3 = $db->readData("SELECT * FROM customer WHERE Email = '$email'");
    foreach($result3 as $res3){
        $full_name = $res3->Username;
        $address = $res3->Address;
        $contact = $res3->Number;
    }
    $qty = $_POST['qty'];
    
   
    $total = $food_price * $qty;
    $date = date("Y-m-d h:i:sa"); 
    $status = "Ordered";
    
    $result = $db->insertData("INSERT INTO food_order VALUES('','$food_name','$food_price','$qty','$total','$date','$status','$full_name','$contact','$email','$address') ");
    if($result == VALUE_INSERTED)
    {
        
        $_SESSION['order'] = "<div class='btn-primary'><h1>Your Order is placed Successfully</h1></div>";
        header("location:index.php");

        require 'phpmailer/PHPMailerAutoload.php';
        $mail= new PHPMailer;
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='bunny.prjcts@gmail.com';//Your Email Address
        $mail->Password='Bunny2001';//Your Email Password
        $mail->setFrom('bunny.prjcts@gmail.com','Order Confirmation');
        $mail->addAddress($email);//Receiver Email
        $mail->addReplyTo('bunny.prjcts@gmail.com');
        $mail->isHTML(true);
        $mail->Subject='Order Confirmation';
        $mail->Body='<h1>Your order has been confirmed.</h1>';
        if(!$mail->send())
            {
                echo "Something went wrong";
                echo $mail->ErrorInfo;
            }   
            else
                {
	            echo "Email sent successfully";
                }
        
    }
}


?>
  

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            
            <h2 class="text-center text-white">Order Detail will be same</h2>
            <h2 class="text-center text-white"> as your account details.</h2>
            <h2 class="text-center text-white"><a class="btn btn-primary" href="order.php?id=<?php echo $id?>">Order using Other Details</a></h2>
            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
                    <?php 
                    $result = $db->readData("SELECT * FROM master_food WHERE food_id = $id");
                    if($result != null)
                    {
                    foreach($result as $res)
                        {
                    ?>

                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $res->food_image?>" alt="<?php echo $res->food_name?>" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $res->food_name; ?></h3>
                        <input type="hidden" name="food_name" value="<?php echo $res->food_name;?>" id="">
                        <p class="food-price">Rs. <?php echo $res->food_price?></p>
                        <input type="hidden" name="food_price" value="<?php echo $res->food_price?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>
                    <?php 
                        }
                    }else{
                        header("location:index.php");
                        
                    }
                    ?>

                </fieldset>
                
                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php 
include 'footer.php';
?>