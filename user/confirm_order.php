<?php
include 'userNavbar.php';
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['full-name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $grand_total = $_POST['grand_total'];
    $status = "Ordered";
    $payment_mode = isset($_POST['cod']) ? 'Cash on Delivery' : 'Khalti';

    // Fetch cart items
    $cart_items_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
    while ($cart_item = mysqli_fetch_assoc($cart_items_query)) {
        $title = $cart_item['title'];
        $price = $cart_item['price'];
        $quantity = $cart_item['quantity'];
        $total = $price * $quantity;

        $sql2 = "INSERT INTO orders (title, price, quantity, total, order_date, status, fullname, contact, email, address, payment_mode, user_id) 
            VALUES ('$title', $price, $quantity, $total, NOW(), '$status', '$fullname', '$contact', '$email', '$address', '$payment_mode', '$user_id')";

        $res2 = mysqli_query($conn, $sql2);
    }

    if ($res2 == true) {
        mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");
        echo "<script>
        alert('Thank you for your purchase!');
        window.location= 'userHome.php';
        </script>";
    } else {
        echo "<script>
        alert('Failed to order book.');
        window.location= 'userHome.php';
        </script>";
    }
}
?>
