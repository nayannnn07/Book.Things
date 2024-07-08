<?php
include 'adminSidebar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM category WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_array($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    } else {
        $_SESSION['no-category-found'] = "<script>alert('Category not found.');</script>";
        header('location: categoryManage.php');
        exit();
    }
} else {
    header('location: categoryManage.php');
    exit();
}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        if ($image_name != "") {
            $explodedArray = explode('.', $image_name);
            $ext = end($explodedArray);
            $image_name = "Book_Category_" . rand(0000, 9999) . '.' . $ext;
            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = "../images/category/" . $image_name;
            $upload = move_uploaded_file($src_path, $dest_path);
            if ($upload == false) {
                $_SESSION['upload'] = "<script>alert('Failed to upload image.');</script>";
                header('location:categoryManage.php');
                die();
            }
            if ($current_image != "") {
                $remove_path = "../images/category/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == FALSE) {

                    $_SESSION['remove-failed'] = "<script>alert('Failed to remove current image.');</script>";
                    header('location: categoryManage.php');
                    die();
                }

            }
        } else {
            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }
    $sql2 = "UPDATE category SET 
          title='$title',
          image_name='$image_name',
          featured='$featured',
          active='$active'
          WHERE id=$id
        ";
    $res2 = mysqli_query($conn, $sql2);
    if ($res2 == true) {
        $_SESSION['update'] = "<script>alert('Category Updated Successfully!');</script>";
        header('location: categoryManage.php');
        exit();
    } else {
        $_SESSION['update'] = "<script>alert('Failed to update category.');</script>";
        header('location: categoryManage.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
</head>

<body>
    <section id="interface">
        <div class="navigation">
            <div class="logo">
                <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>
        </div>
        <div class="title-heading">
            <h2 class="heading">UPDATE CATEGORY</h2>
            <div class="maincontent">
                <div class="wrapper">
                    <form action="" method="POST" enctype="multipart/form-data" class="table-form">
                        <div class="close-icon">
                            <a href="categoryManage.php"><i class="fa fa-window-close"></i></a>
                        </div>

                        <table class="tbl-form">
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" value="<?php echo $title; ?>" class="box"></td>
                            </tr>

                            <tr>
                                <td>Current Image</td>
                                <td>
                                    <?php
                                    if ($current_image != "") {
                                        //display image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>"
                                            width="100px">
                                        <?php
                                    } else {
                                        //error message
                                        echo "<div class='error'>Image not added.</div>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>New Image</td>
                                <td><input type="file" name="image"></td>
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
                                    <input type="submit" name="submit" value="Update Category" class="btn-primary">
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