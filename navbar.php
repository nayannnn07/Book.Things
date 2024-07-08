<?php 
include './config/dbconnect.php';
include 'header.php'; 
$cart_rows = mysqli_query($conn, "SELECT * FROM cart_details") or die('query failed');
$cart_count = mysqli_num_rows($cart_rows);
// if(isset($_SESSION['cart'])) {
//     $cart_count = count($_SESSION['cart']);
   
// }else{
//     echo "0";
// }
// ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  ?>
    
    <div class="main-navbar">
        <div class="logo">
            <a href="homepage.php" ><img src="./images/logo.png" class="logo" alt="logo"></a>
        </div>

        <form action="bookSearch.php" method="POST">
            <div class="search-container">

                <input type="text" name="search" class="search-input" placeholder="Search for books by title or author...">
                <div class="search-icon">
                    <button type="submit">
                        <i class="fa fa-search" style="font-size:26px;"></i>
                    </button>

                </div>

            </div>
        </form>

        <div class="icons-container">
            <div class="icon"> 
                <span class="wish-number">0</span>
                <a href="userLogin.php"><i class="fa fa-heart" style="color: black; font-size: 30px"></i></a>
            </div>

            <div class="icon"> 
                <span class="cart-number">
                    <?php echo $cart_count; ?>
                </span>
                <a href="cart.php"><i class="fa fa-shopping-cart" style="color: black; font-size: 35px"></i></a>
            </div>

            <div class="icon">
                <a href="userLogin.php">
                <button class='loginbtn' style="border: none; background: none;">
                <i class="fa fa-user" style="color:black; font-size: 35px;"></i>
                </button>
                </a>
            </div>
            <div class=" user-name" style="border-left: 2px solid #ccc; margin-top:7px;">
                <h6>Guest Mode</h6>
            </div>

        </div>

    </div>
    <div class="sub-navbar">
        <ul>
            <li><a href="homepage.php">HOME  </a></li>
            <li><a href="book-test.php">BOOKS</a></li>
            <li><a href="category.php">CATEGORIES</a></li>
            <li><a href="bookCategory.php?type=best-sellers">BEST SELLERS</a></li>
            <li><a href="bookCategory.php?type=new-arrivals">NEW ARRIVALS</a></li>
            <!-- <li><a href="bookCategory.php?type=top-picks">TOP PICKS</a></li> -->

            
        </ul>
    </div>
</body>
</html>