<?php

include 'navbar.php';
//fetch cart data
$cart_items = $_SESSION;

//session_start();
if (isset($_POST['update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $_SESSION[$update_id][4] = $update_value;
    $update_quantity_query = mysqli_query($conn, "UPDATE cart_details SET quantity = '$update_value' WHERE title = '$update_id' ");

    header('location:cart.php');
    exit;
}
;

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    unset($_SESSION[$remove_id]); // Remove the item from the session

    mysqli_query($conn, "DELETE FROM cart_details WHERE title = '$remove_id'");

    echo "<script>
                alert('Book deleted from cart successfully!');
                setTimeout(function() {
                    window.location.href = 'cart.php';
                }, 100); 
              </script>";
    exit;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>

    <section class="cart">

        <div class="title-heading">
            <h2 class="heading">MY CART</h2>
            <div class="box-container">
                <table>
                    <thead>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php
                        $grand_total = 0;
                        if (empty($cart_items) || count($cart_items) < 1) {
                            echo "<tr><td colspan='7'>No books added to cart yet.</td></tr>";
                        } else {
                            foreach ($cart_items as $product_id => $product) {
                                //print_r($product);
                                if (is_array($product) && count($product) >= 5) {
                                    $product_image = $product[0];
                                    $product_title = $product[1];
                                    $product_author = $product[2];
                                    $product_price = (float) $product[3];
                                    $product_quantity = (int) $product[4];

                                    // Calculate total for this product
                                    $total = $product_price * $product_quantity;
                                    $grand_total += $total; // Add to grand total
                        
                                    echo "<tr>";
                                    echo "<td><img src='./images/book/$product_image' alt='Book Image' style='width: 80px; height: 110px;'></td>";
                                    echo "<td>$product_title</td>";
                                    echo "<td>$product_author</td>";
                                    echo "<td>NPR. $product_price</td>";
                                    echo "<td>
                    <form method='post'>
                        <input type='hidden' name='update_quantity_id' value='$product_id'>
                        <input type='number' name='update_quantity' min='1' max='10' value='" . (isset($_POST['update_quantity']) ? $_POST['update_quantity'] : $product_quantity) . "'>
                        <button type='submit' name='update_btn' class='quantity-update-btn'><i class='fa fa-pencil-square-o'></i></button>
                    </form>
                    </td>";
                                    echo "<td>NPR. $total</td>";
                                    echo "<td><a href='cart.php?remove=$product_id' onclick=\"return confirm('Do you want to remove this item from cart?')\" class='delete-btn'><i class='fa fa-trash' style='font-size:20px'></i> REMOVE</a></td>";


                                    echo "</tr>";
                                }

                            }
                        }

                        ?>


                        <tr class='table-bottom'>
                            <td><a href='book-test.php' class='option-btn' style='margin-top: 0;'>CONTINUE SHOPPING</a>
                            </td>
                            <td colspan='4' style='font-weight: bolder; font-size: 22px;'>GRAND TOTAL</td>
                            <td>NPR. <?php echo $grand_total; ?></td>
                            <td><a href='cart.php?delete_all' onclick='return confirm(' Are you sure you want to delete
                                    all the cart items?');' class='delete-btn'><i class='fa fa-trash'
                                        style='font-size:20px'></i> </a></td>
                        </tr>




                    </tbody>

                </table>
                <div class="checkout-btn">
                    <!-- <a href="payment_method.php" class="btn btn-primary btn-lg btn-block ">Choose Payment Method</a> -->
                    <a href="userLogin.php"
                        class="btn btn-primary btn-lg btn-block <?= ($grand_total > 1) ? '' : 'disabled'; ?> ">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

</body>

</html>