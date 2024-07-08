<?php
include 'navbar.php'; 
if (isset($_POST['add_to_cart'])) {
    // Retrieve product information from POST
    $product_image = $_POST['product_image'];
    $product_name = $_POST['product_name'];
    $product_author = $_POST['product_author'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    // Store product information in an array
    $product = array(
        $product_image,
        $product_name,
        $product_author,
        $product_price,
        $product_quantity
    );

    // Add product to session cart
    $_SESSION[$product_name] = $product;
    
    $cart_sql = "SELECT * FROM cart_details WHERE title= '$product_name' ";
    $cart_result = mysqli_query($conn, $cart_sql);
    $cart_count = mysqli_num_rows($cart_result);
    if ($cart_count > 0) {
        
        echo "<script>
            alert('Book already added to cart!');
            window.location('userCart.php');
            </script>";
    } else {
        $insert_query = "INSERT INTO cart_details( title, author, price, image_name, quantity) 
                        VALUES ( '$product_name', '$product_author', '$product_price', '$product_image', '$product_quantity')";


    mysqli_query($conn, $insert_query);
    echo "<script>
    alert('Book added to cart!');
    setTimeout(function() {
        window.location.href = 'cart.php';
    }, 100);
    </script>";
    }

}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book.Things</title>
    <!-- Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body>
    <!-- MAIN HOMEPAGE -->

    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Discover your <br>next read</h3>
                <p>Get amazing deals on lots of different books! Find your next favorite book at a price you'll love.</p>
                <button class="button-36" role="button">
                    <i class="fa fa-shopping-bag"></i>
                    <a href="book-test.php" style="text-decoration:none; color:white;">SHOP NOW</a>
                </button>
                
                
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="./images/book-list/book1.jfif" alt=""></div>
                    <div class="swiper-slide"><img src="./images/book-list/book2.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="./images/book-list/book24.jfif" alt=""></div>
                    <div class="swiper-slide"><img src="./images/book-list/book28.jfif" alt=""></div>
                    <div class="swiper-slide"><img src="./images/book-list/book7.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="./images/book-list/book12.jfif" alt=""></div>
                </div>
                <!-- <img src="./images/bookshelf.png" class="stand" alt="bookshelf"> -->
            </div>
            
        </div>
    </section>

    <!-- Include Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".books-slider", {
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 1500, // Increased speed (3000ms = 3 seconds)
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
    <!-- SERVICES -->
    <div class="services py-3" id="choose_us">
        <div class="container">
            <h1 class="text-center pb-5 heading">WHY CHOOSE US?</h1>
            <div class="row pb-5">
                <div class="col-lg-4 mb-3">
                    <div class="card text-center py-3">
                        <div class="card-body">
                            <div class="circle">
                                <i class="fa fa-money"></i>
                            </div>
                            <h4 class="fw-bolder pb-3">Lowest Price</h4>
                            <h6>We provide you with the books you want at lowest prices possible.</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="card text-center py-3">
                        <div class="card-body">
                            <div class="circle">
                                <i class="fa fa-truck"></i>
                            </div>
                            <h4 class="fw-bolder pb-3">Fastest Delivery</h4>
                            <h6>All the orders placed will be delivered within 48 hours, If not same day!</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="card text-center py-3">
                        <div class="card-body">
                            <div class="circle">
                                <i class="fa fa-book"></i>
                            </div>
                            <h4 class="fw-bolder pb-3">Buy Books Online</h4>
                            <h6>Easily discover new reads and stock you shelves at the comfort of your home.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CATEGORIES -->
    <section class="categories">
        <div class="container">
            <h1 class="text-center pb-5 heading" style="border-top: 2px solid black; padding:2rem;">CATEGORY</h1>

            <?php
            $sql = "Select * FROM category WHERE active='Yes' AND featured='Yes' ORDER BY rand() LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                    <a href="<?php echo SITEURL; ?>bookCategory.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                            if ($image_name == "") {
                                echo "<div class='error'>Image not available.</div>";
                            } else {
                                ?>
                               
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="book"
                                    class="img-responsive img-curve">
                                
                                <?php
                            }

                            ?>

                            <h3 class="float-text text-white">
                                <?php echo $title; ?>
                            </h3>
                        </div>
                    </a>

                    <?php
                }

            } else {
                echo "<div class='error'>Category not added.</div>";
            }

            ?>
        <center><button class="button-45 text-center mt-4" role="button" onclick="product.php"><a href="category.php"
                    style="text-decoration:none; color:black;">LOAD MORE...</a></button></center>
        </div>
        
    </section>


    <!-- BOOKS -->
    <section class="products">
        <h1 class="text-center pb-5 heading" style="border-top: 2px solid black; padding:2rem;">SHOP BOOKS</h1>

        <div class="box-container">
            <?php
            $sql2 = "SELECT * FROM book WHERE active='Yes' AND featured='Yes' ORDER BY rand() LIMIT 8";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    <form action="" method="post">
                    <input type="hidden" name="add_to_cart" value="1">
                    <div class="box">
                        <div class="image">
                            <?php
                            if ($image_name == "") {
                                echo "<div class='error'>Image not available.</div>";
                            } else {
                                ?>
                                <a href="bookDetails.php?id=<?php echo $row['id']; ?>">
                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book">
                            </a>
                                <?php
                            }
                            ?>

                        </div>


                        <div class="bcontent">
                            <h3>
                                <?php echo $title; ?>
                            </h3>
                            <h5>by
                                <?php echo $author; ?>
                            </h5>
                            <p class="price">
                                NPR. <?php echo $price; ?>
                            </p>
                        </div>
                        <input type="hidden" name="product_image" value="<?php echo $row['image_name']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">
                        <input type="hidden" name="product_author" value="<?php echo $row['author']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="product_quantity" value="1"> <!-- Default quantity value -->

                        <button type="submit" class="cartbutton" name="add_to_cart">
                            <i class="fa fa-shopping-cart"></i> ADD TO CART
                        </button>
                    </div>
                    </form>
                    <?php
                }
            } else {
                echo "<div class='error'>Book not available.</div>";
            }

            ?>

        </div>
        <center><button class="button-45 text-center mt-4" role="button" onclick="product.php"><a href="book-test.php"
                    style="text-decoration:none; color:black;">LOAD MORE...</a></button></center>
    </section>
<!-- DEAL -->
    <section class="deal">
    <div class="contents">
        <h3>DEAL OF THE DAY</h3>
        <h2 class="text-bold">upto 50% off</h2>
        <p>Find your favourite books at the discounted prices. Enjoy the deals to buy your loved books. Happy Shopping!</p>
        <button class="button-36" role="button">
                    <i class="fa fa-shopping-bag"></i>
                    <a href="book-test.php" style="text-decoration:none; color:white;">SHOP NOW</a>
                </button>
    </div>
    <div class="images">
        <img src="./images/bg7.jfif" alt="">
    </div>
    </section>
            
    <div class="map-container">
            <div class="info-section">
                <h2>VISIT US HERE <br>AT OUR PHYSICAL STORE</h2>
                <p><i class="fa fa-phone"></i> 9840012570</p>
                <p><i class="fa fa-envelope"></i> book.things@gmail.com</p>
                <p><i class="fa fa-map-marker"></i> Jhochhen, Kathmandu</p>
                <p><i class="fa fa-clock-o"></i> Sunday to Friday 11:00am-8:00pm</p><br>
                <button class="button-40" role="button"><a href="contact.php" style="text-decoration: none; color:white;">GET IN TOUCH</a></button>
                
            </div>
            <div class="map-section">
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14129.914942916641!2d85.29823131620418!3d27.702501418707808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1932ff24afc1%3A0xd61489cc96129a4c!2sBook.Things!5e0!3m2!1sen!2snp!4v1714715041791!5m2!1sen!2snp"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>


    <?php include 'footer.php'; ?>

</body>
</html>