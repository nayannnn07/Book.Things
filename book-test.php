<?php
include 'navbar.php';
// session_start();

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

// Handle sorting by price
if (isset($_GET['sort']) && $_GET['sort'] == 'low_to_high') {
    $sort_query = "ORDER BY price ASC";
} elseif(isset($_GET['sort']) && $_GET['sort'] == 'high_to_low'){
    $sort_query = "ORDER BY price DESC";
}else {
    $sort_query = ""; // Default sorting
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

</head>

<body>

    <section class="products1">
    <?php
    // Check if a category is selected
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $sql = "SELECT title FROM category WHERE id='$category_id'";
        $result = mysqli_query($conn, $sql);
        $category_name = mysqli_fetch_assoc($result)['title'];
        ?>
        <div class="title-heading">
            <h2 class="heading">BOOKS > <?php echo $category_name; ?></h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="filter-category">
                    <form action="" method="get">
                        <ul>
                            <h3 align="center">CATEGORY</h3>
                            <?php
                            $sql = "SELECT * FROM category";
                            $res = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];

                                $checked = isset($_GET['category']) && $_GET['category'] == $id ? 'checked' : '';

                                echo "<li><input type='checkbox' name='category' value='$id' $checked> <label>$title</label></li>";
                            }
                            ?>
                        </ul>
                        <button type="submit" class="filter-button"><i class="fa fa-filter" aria-hidden="true"></i> FILTER</button> <!-- Add a submit button to submit the form -->
                            </form></div>

                            <div class="filter-price">
    <form action="" method="get">
        <ul>
        <h5 >SORT BY PRICE</h5>
        <li><input type="checkbox" name="sort" value="low_to_high"> <label>Lowest to Highest</label></li>
        <li><input type="checkbox" name="sort" value="high_to_low"> <label>Highest to Lowest</label></li>

        
        </ul>
        <button type="submit" class="filter-button"><i class="fa fa-sort" aria-hidden="true"></i> SORT</button>
    </form>
    </div>

                    

                </div>
                
                
                <div class="col-md-10">
                    <div class="box-container">
                        <?php
                        //getting unique categories
                        if (isset($_GET['category'])) {
                            $category_id = $_GET['category'];
                            $sql = "SELECT * FROM book WHERE active='Yes' AND category_id='$category_id'";
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
                                    <form action="" method="post">

                                        <div class="box">
                                            <div class="image">
                                                <?php
                                                if ($image_name == "") {
                                                    echo "<div class='error'>Image not available.</div>";
                                                } else {
                                                    ?>
                                                    <a href="bookDetails.php?id=<?php echo $id; ?>">
                                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book">
                                                    </a><?php
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
                                                    NPR.
                                                    <?php echo $price; ?>
                                                </p>
                                            </div>


                                            <button type="submit" class="cartbutton" name="add_to_cart">
                                            <i class="fa fa-shopping-cart"></i> ADD TO CART
                                            </button>

                                        </div>
                                    </form>

                                    <?php
                                }
                            } else {
                                echo "<div class='error'>Books not available for this category.</div>";
                            }
                        }
                        ?>

        </div>
    <?php } else { ?>
        <div class="title-heading">
            <h2 class="heading">SHOP BOOKS</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="filter-category">
                    <form action="" method="get">
                        <ul>
                            <h3>CATEGORY</h3>
                            <?php
                            $sql = "SELECT * FROM category";
                            $res = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];

                                $checked = isset($_GET['category']) && $_GET['category'] == $id ? 'checked' : '';

                                echo "<li><input type='checkbox' name='category' value='$id' $checked> <label>$title</label></li>";
                            }
                            ?>
                        </ul>
                        <button type="submit" class="filter-button"><i class="fa fa-filter" aria-hidden="true"></i> FILTER</button> <!-- Add a submit button to submit the form -->
                            </form></div>

                           
                <div class="filter-price">
                <form action="" method="get">
                    <ul>
                    <h5 >SORT BY PRICE</h5>
                    <li><input type="checkbox" name="sort" value="low_to_high"> <label>Lowest to Highest</label></li>
                    <li><input type="checkbox" name="sort" value="high_to_low"> <label>Highest to Lowest</label></li>

                    
                    </ul>
                    <button type="submit" class="filter-button"><i class="fa fa-sort" aria-hidden="true"></i> SORT</button>
                </form>
                </div>


                </div>

                <div class="col-md-10">
                    <div class="box-container">
                        <?php
                        if (!isset($_GET['category'])) {
                            $sql = "SELECT * FROM book WHERE active='Yes'";
                            if ($sort_query !== "") {
                                $sql .= " $sort_query";
                            } else {
                                $sql .= " ORDER BY rand()"; // Default random sorting
                            }
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
                                    <form action="" method="post">
                                        <input type="hidden" name="add_to_cart" value="1">
                                        <!-- Add this hidden input field to indicate adding to cart -->
                                        <div class="box">
                                            <div class="image">
                                                <?php
                                                if ($image_name == "") {
                                                    echo "<div class='error'>Image not available.</div>";
                                                } else {
                                                    ?>
                                                    <a href="bookDetails.php?id=<?php echo $row['id']; ?>">
                                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book">
                                                </a><?php
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
                                                    NPR.
                                                    <?php echo $price; ?>
                                                </p>
                                            </div>

                                            <!-- <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> -->
                                            <input type="hidden" name="product_image"
                                                value="<?php echo $row['image_name']; ?>"><input type="hidden" name="product_name"
                                                value="<?php echo $row['title']; ?>">
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
                        }

                        
                        ?>

                    </div>
                </div>
            </div>


        </div>
        </div>
    <?php } ?>
                        
    </section>
    <h3 style="font-family: Monotype Corsiva; font-weight: bold;" class="text-center"> | Get your favourite
        books here. Happy Purchase | </h3>

    <?php include 'footer.php'; ?>

</body>

</html>