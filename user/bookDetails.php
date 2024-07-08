<?php
include 'userNavbar.php';
$user_id = $_SESSION['user_id'];
    if (!isset($user_id)){
     header('location: userLogin.php');
    }

    if(isset($_POST['submit'])){
        $book_id = $_GET['id'];
        
        $review = $_POST['review'];

        $insertReview = " INSERT INTO review (book_id, user_id, review) VALUES ('$book_id','$user_id','$review') ";
        if(mysqli_query($conn, $insertReview)){
            echo "<script>
        alert('Review Submitted!');
        
        </script>";
        }
    }

// Fetch book details based on the provided book ID
if(isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $sql = "SELECT * FROM book WHERE id = $book_id";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $image_name = $row['image_name'];
        $title = $row['title'];
        $author = $row['author'];
        $price = $row['price'];
        $description = $row['description'];
        // Fetch other details as needed
        // Display the details
    } else {
        echo "<div class='error'>Book not found.</div>";
    }
} else {
    echo "<div class='error'>Book ID not provided.</div>";
}
if(isset($_POST['add_to_cart'])){
        
    $product_name = $_POST['product_name'];
    $product_author = $_POST['product_author'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    //$user_id=$_POST['user_id']; //added line

    $cart_sql="SELECT * FROM cart WHERE title= '$product_name' AND user_id= '$user_id' ";
    $cart_result= mysqli_query($conn, $cart_sql);
    $cart_count= mysqli_num_rows($cart_result);
    if($cart_count>0){
        // $message[] = 'Product already added to cart';
        // $_SESSION['add'] = "<div class='error'>Product already added to cart!</div>";
        // header('location:order.php');
        echo "<script>
        alert('Book already added to cart!');
        window.location('userBook.php');
        </script>";
    }
    else{
        //$user_id = $_SESSION['user_id'];
        $product_sql="INSERT INTO cart 
        (title, author, price, image_name, quantity, user_id)
        VALUES('$product_name', '$product_author', '$product_price', '$product_image', '$product_quantity', '$user_id') ";
        $product_result= mysqli_query($conn, $product_sql);

        echo "<script>
        alert('Book added to cart successfully!');
        setTimeout(function() {
            window.location.href = 'userBook.php';
        }, 100); 
        </script>";
    }
}

if(isset($_POST['wishlist'])){
    
    $product_name = $_POST['product_name'];
    $product_author = $_POST['product_author'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    
    $wish_sql="SELECT * FROM wishlist WHERE title= '$product_name' AND user_id= '$user_id' ";
    $wish_result= mysqli_query($conn, $wish_sql);
    $wish_count= mysqli_num_rows($wish_result);
    if($wish_count>0){
        // $message[] = 'Product already added to cart';
        // $_SESSION['add'] = "<div class='error'>Product already added to cart!</div>";
        // header('location:order.php');
        echo "<script>
        alert('Book already added to wishlist!');
        window.location('userBook.php');
        </script>";
    }
    else{
        //$user_id = $_SESSION['user_id'];
        $product_sql="INSERT INTO wishlist 
        (title, author, price, image_name, user_id)
        VALUES('$product_name', '$product_author', '$product_price', '$product_image', '$user_id') ";
        $product_result= mysqli_query($conn, $product_sql);

        echo "<script>
        alert('Book added to wishlist successfully!');
        setTimeout(function() {
            window.location.href = 'userBook.php';
        }, 100); 
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
</head>

<body>
    <section class="products">

        <div class="title-heading">
        <h2 class="heading"></h2>
        
            <div class="detail-box">
                <div class="book-image">
                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book" style="width: 350px; height:550px;">
                </div>
                <form action="" method="post">
                <div class="book-details">
                    <h1><?php echo $title; ?></h1>
                    <h5>by <?php echo $author; ?></h5> <hr/>
                    <h4>NPR <?php echo $price; ?></h4> <hr/>
                    <div class="detail-button">
                    <!-- <button >1</button> -->
                    <button class="cartbutton" type="submit" name="add_to_cart"><i class="fa fa-shopping-cart" ></i> ADD TO CART</button>
                    <button class="cartbutton" type="submit" name="wishlist"><i class="fa fa-heart" ></i> WISHLIST</button>
                    </div>
                    <h5><b>Synopsis:</b></h5>
                    <p  class="text-justify"><?php echo $description; ?></p>
                    
                </div>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">
                            <input type="hidden" name="product_author" value="<?php echo $row['author']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row['image_name']; ?>">
                            <input type="hidden" name="product_quantity" value="1"> <!-- Default quantity value --> 
</form>

            </div>
            <div class="review">
        <h4 class="text-center text-uppercase py-3">Reviews for <?php echo $title;?></h4>
            <div class= "col-md-12">
            
            <ul>
                <?php 
                $allReview_sql="SELECT * FROM review JOIN user ON user.id=review.user_id WHERE book_id='$book_id'";
                $allReview_result= mysqli_query($conn, $allReview_sql);
               
                if(mysqli_num_rows($allReview_result)>0){
                    while($allReview_row = mysqli_fetch_assoc($allReview_result)){
                        ?><li>
                    <div class="comment-meta">
                        <a href="#" style="text-decoration: none; color: #fdd5b1;"><?php echo $allReview_row['fname']." ".$allReview_row['lname'] ?></a>
                        <span>
                            <em><?php echo $allReview_row['timestamp'] ?></em>
                        </span>
                        <p style="color:white;"><?php echo $allReview_row['review'] ?></p>
                    </div>
                </li><?php
                    }
                   
                   
                }
                ?>
                
                
            </ul>

            <h4>Add a review:</h4>
            <form id="form" class="review-form" method="post">

                <?php
                
                $review_sql="SELECT fname, lname, email FROM user WHERE id = $user_id ";
                $review_result= mysqli_query($conn, $review_sql);
                $name = '';
                $email = '';
                if(mysqli_num_rows($review_result)>0){
                    $review_row = mysqli_fetch_assoc($review_result);
                    $name = $review_row['fname']." ". $review_row['lname'];
                    $email = $review_row['email'];
                    
                }
                ?>

                <div class="row">
                    <div class="col-md-6 space20">
                        <input name="name" value="<?php echo $name ?>" class="form-control" placeholder="Name" required="" type="text" <?php if(isset($name)){ echo 'disabled';} else{ echo ' ';} ?>>
                    </div>
                    <div class="col-md-6 space20">
                    <input name="email" value="<?php echo $email ?>" class="form-control" placeholder="Email" required="" type="text" <?php if(isset($email)){ echo 'disabled';} else{ echo ' ';} ?>>     
                    </div>
                </div>

                <div class="space20 mt-2">
                    <textarea name="review" id="text" class="input-md form-control" cols="10" rows="6" placeholder="Add review..."></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">
                    Submit Review
                </button>
                
            </form>
            </div>
            
        </div>
        </div>

        
    </section>
    <?php include 'userFooter.php'; ?>
</body>

</html>