<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Book</title>
</head>

<body>
    <?php 
        include 'userNavbar.php';
        $search = $_POST['search'];
    ?>
    <section class="products">

        <div class="title-heading">
            <h2 class="heading">SEARCH "<?php echo $search; ?>"</h2>

            <div class="box-container">

            <?php

            

            $sql = "SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
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
                                <a href="bookDetails.php?id=<?php echo $row['id']; ?>">
                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book"></a>
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
                                NPR.
                                <?php echo $price; ?>
                            </p>
                        </div>
                        <button class="cartbutton"><a href="userLogin.php" style="text-decoration:none; color:white;">ADD TO
                                CART</a></button>
                    </div>

                    <?php
                }

            } else {
                echo "<div class='error'>Book not found.</div>";
            }

            ?>
            


            </div>


        </div>
    </section>

    <?php include 'userFooter.php'; ?>
</body>

</html>