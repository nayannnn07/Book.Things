<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    
    <?php 
    // Initialize category title variable
    $category_title = "";

    // Check if category_id is set
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM category WHERE id=$category_id";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            $category_title = $row["title"];
        } else {
            header('location:homepage.php');
            exit();
        }
    } elseif (isset($_GET['type']) && $_GET['type'] == 'best-sellers') {
        $category_title = "Best Sellers";
    } elseif (isset($_GET['type']) && $_GET['type'] == 'new-arrivals') {
        $category_title = "New Arrivals";
    } else {
        header('location:homepage.php');
        exit();
    }
    ?>

    <section class="products">
        <div class="title-heading">
            <h2 class="heading"><?php echo $category_title; ?></h2>
            <div class="box-container">

            <?php
            // Check if type parameter is set to best-sellers
            if (isset($_GET['type']) && $_GET['type'] == 'best-sellers') {
                $sql2 = "SELECT * FROM book WHERE category_id=1 AND featured='Yes' AND active='Yes' ";
            }else if (isset($_GET['type']) && $_GET['type'] == 'new-arrivals') {
                $sql2 = "SELECT * FROM book WHERE category_id=2 AND featured='Yes' AND active='Yes'";
            } else {
                $sql2 = "SELECT * FROM book WHERE category_id=$category_id AND active='Yes'";
            }
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if ($count2 > 0) {
                while ($row2 = mysqli_fetch_assoc($res2)) {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $author = $row2['author'];
                    $price = $row2['price'];
                    $image_name = $row2['image_name'];
                    ?>

                    <div class="box">
                        <div class="image">
                            <?php
                            if ($image_name == "") {
                                echo "<div class='error'>Image not available.</div>";
                            } else {
                                ?>
                                <a href="bookDetails.php?id=<?php echo $row2['id']; ?>">
                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book">
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="bcontent">
                            <h3><?php echo $title; ?></h3>
                            <h5>by <?php echo $author; ?></h5>
                            <p class="price">NPR. <?php echo $price; ?></p>
                        </div>
                         <button type="submit" class="cartbutton" name="add_to_cart">
                                            <i class="fa fa-shopping-cart"></i> ADD TO CART
                                            </button>
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
    <?php include 'footer.php'; ?>
</body>
</html>
