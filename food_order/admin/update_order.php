<?php
include 'menu.php';
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    $total = $qty * $price;
    $status = $_POST['status'];
    $emailId = $_POST['email'];
    echo $emailId;
    echo $status;
   
    
    $result = $db->updateData("UPDATE food_order SET order_qty = '$qty', order_status = '$status', order_total = '$total' WHERE order_id= $id");
   
    if($result == VALUE_UPDATED){
        require 'phpmailer/PHPMailerAutoload.php';
        $mail= new PHPMailer;
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='bunny.prjcts@gmail.com';//Your Email Address
        $mail->Password='Bunny2001';//Your Email Password
        $mail->setFrom('bunny.prjcts@gmail.com',$status);
        $mail->addAddress($emailId);//Receiver Email
        $mail->addReplyTo('bunny.prjcts@gmail.com');
        $mail->isHTML(true);
        $mail->Subject=$status;
        $mail->Body='<h1>Your order is '.$status.'</h1>';
        if(!$mail->send())
            {
                echo "Something went wrong";
                echo $mail->ErrorInfo;
            }   
            else
                {
	            echo "Email sent successfully";
                }


       header("location:manage_order.php");
    }

}


?>

<div class="main_content">
    <div class="wrapper">
    <h1>Update Order</h1>

        <form action="" method="POST">
        <?php 
        $result = $db->readData("SELECT * FROM food_order WHERE order_id=$id");

        foreach($result as $res){
        ?>
            <table class="tbl-30">
            <tr>
                <td>
                    Food Name:
                </td>
                <td>
                   <?php echo $res->order_food;?> 
                </td>
            </tr>

            <tr>
                <td>
                    Food Quantity:
                </td>
                <td>
                    <input type="number" name="qty" value="<?php echo $res->order_qty?>" id="">
                </td>
            </tr>

            <tr>
                <td>
                    Status:
                </td>
                <td>
                    <select name="status" id="">
                        <option <?php if($res->order_status == 'Ordered'){echo "selected";}?> value="Ordered">Ordered</option>
                        <option <?php if($res->order_status == 'On the way'){echo "selected";}?> value="On the way">On the way</option>
                        <option <?php if($res->order_status == 'Delivered'){echo "selected";}?> value="Delivered">Delivered</option>
                        <option <?php if($res->order_status == 'Cancelled'){echo "selected";}?> value="Cancelled">Cancelled</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="email" value="<?php echo $res->o_customer_email;?>">
                    <input type="hidden" name="price" value="<?php echo $res->order_price?>">
                    <button name='submit' class="btn-primary">Update Order</button>
                </td>
            </tr>
            
            </table>
        <?php 
        }
        ?>    
        
        </form>
    </div>
</div>
<?php 
include 'footer.php';
?>