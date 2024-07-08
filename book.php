<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <section class="products">
    <!-- <div class="box-category">
            <div class="sub-category">
                <h3>
                    SUB CATEGORY
                </h3>
              </div>
              <div class="sort">
              <h3>
                    SORT
                </h3>
              </div>
            </div>  -->
            <!-- changed -->

        <div class="title-heading">
        
            <h2 class="heading">SHOP BOOKS</h2>

            <!-- <div class="sidebar">
                <div class="filter">
                    <h3>Category</h3>
                    <div id="btns"></div>
                </div>
            </div> -->

            <div class="box-container">
                <?php
                $sql = "SELECT * FROM book WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="box">
                            <div class="image">
                                <?php
                                if ($image_name == "") {
                                    echo "<div class='error'>Image not available.</div>";
                                } else {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book">
                                    <?php
                                }
                                ?>
                                
                            </div>
                            <div class="book-icon">
                            <button><a href="userLogin.php">
                            <i class="fa fa-shopping-cart" ></i></a>
                            </button>
                            <button><a href="userLogin.php">
                            <i class="fa fa-heart" ></i></a>
                            </button>
                            <button><a href="">
                            <i class="fa fa-eye" ></i></a>
                            </button>
                            
                            </div>

                            <div class="bcontent">
                                <h3>
                                    <?php echo $title; ?>
                                </h3>
                                <h5>by
                                    <?php echo $author; ?>
                                </h5>
                                <p class="price">
                                    NPR.
                                    <?php echo $price; ?>
                                </p>
                            </div>
                            <input type="submit" class="cartbutton" value="ADD TO CART" name="add_to_cart">
                            <!-- <button class="cartbutton"><a href="userLogin.php" style="text-decoration:none; color:white;">ADD TO CART</a></button> -->
                            <!-- <button class="cartbutton"><a href="userLogin.php" style="text-decoration:none; color:white;">WISHLIST</a></button> -->
                        </div>

                        <?php
                    }
                } else {
                    echo "<div class='error'>Book not available.</div>";
                }

                ?>

            </div>


        </div>
    </section>
    <h3 style="font-family: Monotype Corsiva; font-weight: bold;" class="text-center mt-4 pt-3"> | Get your favourite
        books here. Happy Purchase:) | </h3>

    <?php include 'footer.php'; ?>
    <script src="filter.js">

    </script>
</body>

</html>