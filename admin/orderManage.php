<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Order</title>
</head>
<body>
<?php 
    include 'adminSidebar.php'; 
    // include '../config/dbconnect.php';
    ?>

    <section id="interface">
        <div class="navigation">
            <div class="logo">
            <a href="dashboard.php" ><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>

        </div>

        <div class="title-heading">
            <h2 class="heading">MANAGE ORDER</h2>
            <div class="order-content">
           

        <?php
        
            if(isset($_SESSION['update'])){
                echo $_SESSION['update']; //Displaying session message
                unset($_SESSION['update']); //Removing session message
            }
        ?>
        
        <div class="table-display">
        <table class="tbl-order">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">BOOK</th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">ORDER DATE</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">CUSTOMER NAME</th>
                <th class="text-center">CUSTOMER CONTACT</th>
                <th class="text-center">CUSTOMER <br>EMAIL</th>
                <th class="text-center">CUSTOMER ADDRESS</th>
                <th class="text-center">PAYMENT MODE</th>
                <th class="text-center">ACTION</th>

            </tr>

            <?php 
                $sql="SELECT * FROM orders ORDER BY id DESC"; //display latest on top
                $result= mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if($count>0){
                    $sn=1;
                        while($rows= mysqli_fetch_assoc($result)){
                            $id=$rows['id'];
                            $title=$rows['title'];
                            $price=$rows['price'];
                            $quantity=$rows['quantity'];
                            $total=$rows['total'];
                            $order_date=$rows['order_date'];
                            $status=$rows['status'];
                            $fullname=$rows['fullname'];
                            $contact=$rows['contact'];
                            $email=$rows['email'];
                            $address=$rows['address'];
                            $payment_mode=$rows['payment_mode'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $title . " x " . $quantity; ?></td>

                                    
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>

                                    <td>
                                        <?php 
                                            if($status == "Ordered")
                                            {
                                                echo "<label style='color: black; background-color:#eed202    ; padding:8px; border-radius: 8px;'>$status</label>";
                                            }
                                            else if($status == "On Delivery")
                                            {
                                                echo "<label style='color: white; background-color:orange; padding:8px; border-radius: 8px;'>$status</label>";
                                            }
                                            else if($status == "Delivered")
                                            {
                                                echo "<label style='color: white; background-color:#32cd32; padding:8px; border-radius: 8px;'>$status</label>";
                                            }
                                            else if($status == "Cancelled")
                                            {
                                                echo "<label style='color: white; background-color:red; padding:8px; border-radius: 8px;'>$status</label>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $payment_mode; ?></td>
                                    <td>
                                        <a href="orderUpdate.php?id=<?php echo $id; ?>" class="btn-update">Update Order</a>
                                        
                                    </td>
                                </tr>

                            <?php
                        }
                    }
                    else{
                    echo "<tr><td colspan='12' class='error'>Orders not available.</td></tr>";  
                }
            ?>

        </table>
        </div>
        
        </div>
        
        </div>


        </div>
        <?php include 'adminFooter.php'; ?>
    </section>
</body>
</html>