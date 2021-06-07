<?php
include 'menu.php';
?>

<div class="main_content">
    <div class="wrapper">
    <h1>Manage Order</h1>
    <br>
                <a class="btn-primary" href="">Add Order</a>
                <br>
                <br> 
    <table class="tbl-full">
                    <tr>
                    <th>ID</th>
                    <th>Food Name</th>
                    <th>Food Price</th>
                    <th>Quantity</th>
                    <th>Total Bill</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Order By</th>
                    <th>Number</th>
                    <th>Mail</th>                    
                    <th>Address</th>
                    <th>Action</th>
                    </tr>

                <?php 
                $result = $db->readData("SELECT * FROM food_order");
                $i = 1;
                if($result != VALUE_NOT_FOUND){
                foreach($result as $res){
                
                ?>

                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $res->order_food?></td>
                        <td><?php echo $res->order_price?></td>
                        <td><?php echo $res->order_qty?></td>
                        <td><?php echo $res->order_total?></td>
                        <td><?php echo $res->order_date?></td>
                        <td><?php echo $res->order_status?></td>

                        <td><?php echo $res->o_customer_name?></td>
                        <td><?php echo $res->o_customer_contact?></td>
                        <td><?php echo $res->o_customer_email?></td>
                        <td><?php echo $res->o_customer_address?></td>
                        <td>
                            <a class="btn-secondary" href="update_order.php?id=<?php echo $res->order_id?>">UPDATE</a>
                        </td>
                    </tr>
                <?php 
                $i++;
                }}
                ?>    

                   

                </table>
                   
    </div>


</div>

<?php 
include 'footer.php';

?>