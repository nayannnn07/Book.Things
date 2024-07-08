<?php
include 'adminSidebar.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql2 = "SELECT * FROM book WHERE id=$id";

    $res2 = mysqli_query($conn, $sql2);


    $row2 = mysqli_fetch_assoc($res2);

    $title = $row2['title'];
    $author = $row2['author'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];

} else {
    header('location: bookManage.php');
}


if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $category = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];


    if (isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $explodedArray = explode('.', $image_name);
            $ext = end($explodedArray);


            $image_name = "Food_Name_" . rand(0000, 9999) . '.' . $ext;



            $src_path = $_FILES['image']['tmp_name'];

            $dest_path = "../images/book/" . $image_name;

            $upload = move_uploaded_file($src_path, $dest_path);

            if ($upload == false) {
                $_SESSION['upload'] = "<script>Failed to upload new image.');</script>";
                header('location: bookManage.php');
                die();
            }


            if ($current_image != "") {
                $remove_path = "../images/book/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == false) {

                    $_SESSION['remove-failed'] = "<script>alert('Failed to remove current image.');</script>";
                    header('location: bookManage.php');
                    die();
                }
            }


        } else {
            $image_name = $current_image;
        }

    } else {
        $image_name = $current_image;
    }

    $sql3 = "UPDATE book SET 
      title='$title',
      author= '$author',
      description='$description',
      price=$price,
      image_name='$image_name',
      category_id='$category',
      featured='$featured',
      active='$active'
      WHERE id=$id
    ";

    $res3 = mysqli_query($conn, $sql3);


    if ($res3 == TRUE) {

        $_SESSION['update'] = "<script>alert('Book Updated Successfully!');</script>";
        header('location: bookManage.php');

    } else {

        $_SESSION['update'] = "<script>alert('Failed to update book.');</script>";
        header('location: bookManage.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
</head>

<body>
    <section id="interface">
        <div class="navigation">
            <div class="logo">
                <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>
        </div>
        <div class="title-heading">
            <h2 class="heading">UPDATE BOOK</h2>

            <div class="maincontent">
                <div class="wrapper">


                    <form action="" method="POST" enctype="multipart/form-data" class="table-form">
                        <div class="close-icon">
                            <a href="bookManage.php"><i class="fa fa-window-close"></i></a>
                        </div>

                        <table class="tbl-form">
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" value="<?php echo $title; ?>" class="box"></td>
                            </tr>

                            <tr>
                                <td>Author</td>
                                <td><input type="text" name="author" value="<?php echo $author; ?>" class="box"></td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea class="box" name="description" cols="30"
                                        rows="5"><?php echo $description; ?></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>Price</td>
                                <td><input type="number" name="price" value="<?php echo $price; ?>" class="box"></td>
                            </tr>

                            <tr>
                                <td>Current Image</td>
                                <td>

                                    <?php
                                    if ($current_image == "") {
                                        echo "<div class='error'>Image Not Available.</div>";

                                    } else {

                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/book/<?php echo $current_image; ?>"
                                            width="100px">


                                        <?php

                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Select New Image</td>
                                <td><input type="file" name="image"></td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td>
                                    <select name="category">

                                        <?php

                                        $sql = "SELECT * FROM category WHERE active='Yes'";

                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $category_title = $row['title'];
                                                $category_id = $row['id'];


                                                ?>
                                                <option <?php if ($current_category == $category_id) {
                                                    echo "selected";
                                                } ?>
                                                    value="<?php echo $category_id; ?>">
                                                    <?php echo $category_title; ?>
                                                </option>
                                                <?php
                                            }

                                        } else {

                                            echo "<option value='0'>Category not available.</option>";

                                        }
                                        ?>


                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td>Featured</td>
                                <td>
                                    <input <?php if ($featured == "Yes") {
                                        echo "checked";
                                    } ?> type="radio"
                                        name="featured" value="Yes">Yes

                                    <input <?php if ($featured == "No") {
                                        echo "checked";
                                    } ?> type="radio"
                                        name="featured" value="No">No
                                </td>
                            </tr>

                            <tr>
                                <td>Active</td>
                                <td>
                                    <input <?php if ($active == "Yes") {
                                        echo "checked";
                                    } ?> type="radio" name="active"
                                        value="Yes">Yes

                                    <input <?php if ($active == "No") {
                                        echo "checked";
                                    } ?> type="radio" name="active"
                                        value="No">No
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                                    <input type="submit" name="submit" value="Update Book" class="btn-primary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </section>
</body>

</html>