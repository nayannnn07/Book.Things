<?php
include 'userNavbar.php';

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location: userLogin.php');
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM wishlist where id = '$remove_id'");
    echo "<script>
            alert('Book deleted from wishlist successfully!');
            window.location('userHome.php');
            </script>";

}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM wishlist where user_id='$user_id'");
    echo "<script>
            alert('All books deleted from wishlist successfully!');
            window.location('userHome.php');
            </script>";
}

$select_wish = mysqli_query($conn, "SELECT * FROM wishlist WHERE user_id='$user_id' ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>

<body>
<section class="cart">
    <div class="title-heading">
        <h2 class="heading">MY WISHLIST</h2>
        <div class="box-container">
            <table>
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php if (mysqli_num_rows($select_wish) > 0) { ?>
                        <?php while ($fetch_wish = mysqli_fetch_assoc($select_wish)) { ?>
                            <tr>
                                <td><img src="../images/book/<?php echo $fetch_wish['image_name']; ?>" width="80" height="110" alt=""></td>
                                <td><?php echo $fetch_wish['title']; ?></td>
                                <td><?php echo $fetch_wish['author']; ?></td>
                                <td>NPR. <?php echo number_format($fetch_wish['price']); ?></td>
                                <td>
                                    <a href="wishlist.php?remove=<?php echo $fetch_wish['id']; ?>" onclick="return confirm('Do you want to remove this item from wishlist?')" class="delete-btn"><i class="fa fa-trash" style="font-size:25px"></i> REMOVE</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr class="table-bottom">
                            <td></td>
                            <td></td>
                            <td><a href="wishlist.php?delete_all" onclick="return confirm('Are you sure you want to delete all the books from wishlist?');" class="delete-btn"><i class="fa fa-trash" style="font-size:20px"> DELETE ALL</i> </a></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5">No books added to wishlist yet.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include 'userFooter.php'; ?>
</body>

</html>
