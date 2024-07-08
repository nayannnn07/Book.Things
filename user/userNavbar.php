<?php
include '../config/dbconnect.php';
include 'userHeader.php';
$user_id = $_SESSION['user_id'];
$select_rows = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' ") or die('query failed');
$row_count = mysqli_num_rows($select_rows);
$select_wishrows = mysqli_query($conn, "SELECT * FROM wishlist WHERE user_id='$user_id' ") or die('query failed');
$wishrow_count = mysqli_num_rows($select_wishrows);
$fname = $_SESSION['fname'];
?>
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
            <a href="userHome.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
        </div>
        <form action="bookSearch.php" method="POST">
            <div class="search-container">

                <input type="text" name="search" class="search-input"
                    placeholder="Search for books by title or author...">
                <div class="search-icon">
                    <button type="submit">
                        <i class="fa fa-search" style="font-size:26px;"></i>
                    </button>

                </div>

            </div>
        </form>

        <div class="icons-container">
            <div class="icon">
                <span class="wish-number">
                    <?php echo $wishrow_count; ?>
                </span>
                <a href="wishlist.php"><i class="fa fa-heart" style="color:black; font-size: 30px"></i></a>
            </div>

            <div class="icon">
                <span class="cart-number">
                    <?php echo $row_count; ?>
                </span>
                <a href="userCart.php"><i class="fa fa-shopping-cart" style="color:black; font-size: 35px"></i></a>
            </div>

            <div class="logout-icon">
                <i class="fa fa-user" style="color:black; font-size: 35px;"></i>
                <div class="drop-down">
                    <ul>
                        <li><i class="fa fa-sign-out" style="padding: 5px; font-size: px; margin-left: 15px;"></i><a href="userLogout.php">Logout</a></li>

                    </ul>
                </div>


                <!-- <button class='loginbtn' style="border: none; background: none;">
                        
                    </button> -->


            </div>
            <div class=" user-name" style="border-left: 2px solid #ccc;margin-top:7px;">
                <?php echo $fname; ?>
            </div>

        </div>

    </div>
    <div class="sub-navbar">
        <ul>
            <li><a href="userHome.php">HOME </a></li>
            <li><a href="userBook.php">BOOKS</a></li>
            <li><a href="userCategory.php">CATEGORIES</a></li>
            <li><a href="bookCategory.php?type=best-sellers">BEST SELLERS</a></li>
            <li><a href="bookCategory.php?type=new-arrivals">NEW ARRIVALS</a></li>
            <!-- <li><a href="bookCategory.php?type=top-picks">TOP PICKS</a></li> -->
            <li><a href="userProfile.php">MY ORDERS</a></li>
        </ul>
    </div>
</body>

</html>