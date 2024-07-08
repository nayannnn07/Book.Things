<?php

include 'userNavbar.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle appropriately
    header('Location: userLogin.php');
    exit();
}

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$user_id = $_SESSION['user_id']; // Fetch user ID from session

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <section class="cart">
        <div class="title-heading">
            <h2 class="heading">MY ORDERS</h2>
            <div class="box-container">
                <!-- <div class="user-details">
                Name: <?php echo $fname . ' ' . $lname; ?><br>
                Email: <?php echo $email; ?>
                </div> -->
                <table class="table-display">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Book</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Payment Mode</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql = "SELECT * FROM orders WHERE  user_id= '$user_id' ORDER BY id DESC ";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $count = mysqli_num_rows($result);
                            $sn = 1;
                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $title = $rows['title'];
                                    $price = $rows['price'];
                                    $quantity = $rows['quantity'];
                                    $total = $rows['total'];
                                    $order_date = $rows['order_date'];
                                    $status = $rows['status'];
                                    $payment_mode = $rows['payment_mode'];


                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $sn++; ?>.
                                        </td>
                                        <td>
                                            <?php echo $title; ?>
                                        </td>
                                        <td>
                                            <?php echo $price; ?>
                                        </td>
                                        <td>
                                            <?php echo $quantity; ?>
                                        </td>
                                        <td>
                                            <?php echo $total; ?>
                                        </td>
                                        <td>
                                            <?php echo $order_date; ?>
                                        </td>
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
                                        <td>
                                            <?php echo $payment_mode; ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php include 'userFooter.php'; ?>
</body>
</html>