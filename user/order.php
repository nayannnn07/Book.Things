<?php
include 'userNavbar.php';
$user_id = $_SESSION['user_id'];

if (isset($_POST['order-btn'])) {
    $fullname = $_POST['full-name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mode = $_POST['payment_mode'];
    $grand_total = $_POST['grand_total'];

    header("Location: payment_method.php?fullname=$fullname&contact=$contact&email=$email&address=$address&grand_total=$grand_total");
    exit;
}

if (isset($_POST['khalti-pay'])) {
    header("Location: khalti.php?total=$total&fullname=$fullname&contact=$contact&email=$email");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>

<body>
    <div class="title-heading">
        <h2 class="heading">PLACE YOUR ORDER</h2>
        <div class="order-container">
            <div class="display-order">
                <h4 class="text-center fw-bolder pb-4">YOUR ORDER</h4>
                <table>
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
                        $grand_total = 0;
                        $sn = 1;
                        if (mysqli_num_rows($select_cart) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                                $grand_total += $total_price;
                        ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?= $fetch_cart['title'] . " x" . $fetch_cart['quantity']; ?></td>
                                    <td>NPR. <?= $total_price; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <span class="grand-total">GRAND TOTAL: NPR. <?= $grand_total; ?></span>
            </div>

            <div class="order-form">
                <form action="order.php" method="post" class="order">
                    <legend class="text-center py-4" style="font-weight:bold;">Enter your details to confirm order</legend>
                    <div class="order-label">Name</div>
                    <input type="text" name="full-name" placeholder="Your Full Name" class="text-box" required>
                    <div class="order-label">Contact</div>
                    <input type="tel" name="contact" placeholder="Your Contact" class="text-box" required>
                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Your Email" class="text-box" required>
                    <div class="order-label">Address</div>
                    <textarea name="address" rows="7" placeholder="Your Address" required></textarea>
                    <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                    <input type="hidden" name="payment_mode" value="Cash on Delivery">
                    <button type="submit" name="order-btn" class="btn" style="background-color: #114945; color: white;">Choose Payment Method</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'userFooter.php'; ?>
</body>
</html>
