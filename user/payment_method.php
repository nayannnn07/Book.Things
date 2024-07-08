<?php
include 'userNavbar.php';

$fullname = $_GET['fullname'];
$contact = $_GET['contact'];
$email = $_GET['email'];
$address = $_GET['address'];
$grand_total = $_GET['grand_total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Method</title>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>

<body>
<div class="title-heading">
    <h2 class="heading">CHOOSE YOUR PAYMENT METHOD</h2>
    <div class="payment-container">
    <i class="fa fa-window-close close-icon " style="font-size:30px" onclick="navigateToPage()"></i>
        <form action="confirm_order.php" method="post" class="payment-form">
            <input type="hidden" name="full-name" value="<?= $fullname; ?>">
            <input type="hidden" name="contact" value="<?= $contact; ?>">
            <input type="hidden" name="email" value="<?= $email; ?>">
            <input type="hidden" name="address" value="<?= $address; ?>">
            <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">

            <div class="payment-option">
                <img src="../images/cod.png" alt="Cash on Delivery" class="payment-image">
                <button type="submit" name="cod" class="pay-btn pay-btn-cod">CASH ON DELIVERY</button>
            </div>
            <div class="payment-option ">
                <img src="../images/khalti.png" alt="Pay with Khalti" class="payment-image mt-5">
                <button type="button" name="payWithKhalti" id="payment-button" class="pay-btn pay-btn-khalti">PAY WITH KHALTI</button>
            </div>
        </form>
        <!-- Hidden form to send data to successPage.php -->
        <form id="khalti-success-form" action="successPage.php" method="post" style="display:none;">
            <input type="hidden" name="full-name" value="<?= $fullname; ?>">
            <input type="hidden" name="contact" value="<?= $contact; ?>">
            <input type="hidden" name="email" value="<?= $email; ?>">
            <input type="hidden" name="address" value="<?= $address; ?>">
            <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
        </form>
    </div>
</div>

<script>
  function navigateToPage() {
            window.location.href = "userCart.php"; // Change this to your desired page
        }

    // Admin.khalti.com ko test public key use garya
    var config = {
        "publicKey": "test_public_key_6b6a8c6d85564ddf9fc487b2d383b7cb",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
        "paymentPreference": [
            "KHALTI"
        ],
        "eventHandler": {
            onSuccess(payload) {
                // Hit merchant API for initiating verification
                console.log(payload);
                // Automatically submit the hidden form to successPage.php
                document.getElementById('khalti-success-form').submit();
            },
            onError(error) {
                console.log(error);
            },
            onClose() {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
        // Minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({ amount: <?php echo "200"; ?> * 100 });
        // checkout.show({ amount: <?= $grand_total * 100; ?> });
    }
</script>
</body>
</html>
