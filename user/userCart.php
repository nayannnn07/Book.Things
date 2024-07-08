<?php
   include 'userNavbar.php';

   $user_id = $_SESSION['user_id'];
   if (!isset($user_id)){
    header('location: userLogin.php');
   }

   
    if(isset($_POST['update_btn']))
    {
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query ($conn, "UPDATE cart SET quantity = '$update_value' WHERE id = '$update_id' ");
        if($update_quantity_query){
            header('location:userCart.php');
            exit;
        };
    };

    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM cart where id = '$remove_id'");
        echo "<script>
            alert('Book deleted from cart successfully!');
            setTimeout(function() {
                window.location.href = 'userCart.php';
            }, 100); 
            </script>";
            
    };

    if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM cart where user_id='$user_id'");
        echo "<script>
        alert('All books deleted from cart successfully!');
        setTimeout(function() {
            window.location.href = 'userCart.php';
        }, 100); 
        </script>";

        
        
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
                    //$row=mysqli_fetch_assoc($result);
                    //$user_id= $row['user_id'];  //added
                    //$user_id = $_SESSION['user_id']; where user_id='$user_id' 
                        $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' ");
                        //$user_id = $_SESSION['user_id'];
                        //$select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id=$user_id");
                        $grand_total = 0;
                        if(mysqli_num_rows($select_cart) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                                $price = floatval($fetch_cart['price']);
                                $quantity = intval($fetch_cart['quantity']);
                                $sub_total = $price * $quantity;
                                $grand_total += $sub_total;
                    ?>

                    <tr>
                       <td><img src="../images/book/<?php echo $fetch_cart['image_name']; ?>" width="80" height="110" alt=""></td> 
                        <td><?php echo $fetch_cart['title']; ?></td>
                        <td><?php echo $fetch_cart['author']; ?></td>
                        <td>NPR. <?php echo number_format($fetch_cart['price']); ?></td>
                        
                        <td> 
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?> ">
                                <input type="number" name="update_quantity" min="1" max="10" value="<?php echo isset($_POST['update_quantity']) ? $_POST['update_quantity'] : $quantity; ?>">
                                <button type="submit" name="update_btn" class="quantity-update-btn"><i class="fa fa-pencil-square-o"></i></button>
                                <!-- <input type="submit" value="UPDATE" name="update_btn"> -->
                            </form>
                           
                        </td>

                        <td>NPR. <?php echo  $sub_total; ?></td>
                        <td><a href="userCart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Do you want to remove this item from cart?')" class="delete-btn"><i class="fa fa-trash" style="font-size:20px"></i> REMOVE</a></td>
                    </tr>

                    <?php
                       
                        }
                    }
                    else{
                        echo"<td colspan='7'>No books added to cart yet.</td>";
                    };
                    ?>

                    <tr class="table-bottom">
                        <td><a href="userBook.php" class="option-btn" style="margin-top: 0;">CONTINUE SHOPPING</a></td>
                        <td colspan="4" style="font-weight: bolder; font-size: 22px;">GRAND TOTAL</td>
                        <td>NPR. <?php echo $grand_total; ?></td>
                        <td><a href="userCart.php?delete_all" onclick="return confirm('Are you sure you want to delete all the cart items?');" class="delete-btn"><i class="fa fa-trash" style="font-size:20px"></i> </a></td>
                    </tr>

                </tbody>
                
            </table>
            <div class="checkout-btn">
                <!-- <a href="payment_method.php" class="btn btn-primary btn-lg btn-block ">Choose Payment Method</a> -->
                <a href="order.php" class="btn btn-primary btn-lg btn-block <?= ($grand_total > 1)?'': 'disabled'; ?> ">PROCEED TO CHECKOUT</a>
            </div>
        </div>
                </div>
                </section>
    <?php include 'userFooter.php'; ?>
    
</body>
</html>