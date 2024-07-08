<?php
include 'adminSidebar.php';
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }
    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {

            //auto rename image
            $explodedArray = explode('.', $image_name);
            $ext = end($explodedArray);
            $image_name = "Book_Category_" . rand(000, 999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/category/" . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['upload'] = "<script>alert('Failed to Upload Image!');</script>";
                header('location: categoryAdd.php');
                die();
            }
        }
    } else {
        $image_name = "";
    }

    $sql = "INSERT INTO category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active' ";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['add'] = "<script>alert('Category Added Successfully!');</script>";
        header('location:categoryManage.php');
    } else {

        $_SESSION['add'] = "<script>alert('Failed to Add Category! Please try again later.');</script>";
        header('location:categoryManage.php');
        // die ("Data is not inserted due to ".mysqli_error($conn));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>

<body>

    <section id="interface">
        <div class="navigation">
            <div class="logo">
                <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>
        </div>

        <div class="title-heading">
            <h2 class="heading">ADD CATEGORY</h2>

            <div class="maincontent">
                <div class="wrapper">


                    <!-- Add Category Form -->
                    <form action="" method="POST" enctype="multipart/form-data" class="table-form">
                        <div class="close-icon">
                            <a href="categoryManage.php"><i class="fa fa-window-close"></i></a>
                        </div>

                        <table class="tbl-form">
                            <tr>
                                <td>Title</td>
                                <td>
                                    <input type="text" name="title" placeholder="Category Title">
                                </td>
                            </tr>
                            <tr>
                                <td>Select Image</td>
                                <td>
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Featured</td>
                                <td>
                                    <input type="radio" name="featured" value="Yes">Yes
                                    <input type="radio" name="featured" value="No">No
                                </td>
                            </tr>
                            <tr>
                                <td>Active</td>
                                <td>
                                    <input type="radio" name="active" value="Yes">Yes
                                    <input type="radio" name="active" value="No">No
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Add Category" class="btn-primary">
                                </td>
                            </tr>
                        </table>
                    </form>



                </div>
            </div>


        </div>
        <?php include 'adminFooter.php'; ?>
    </section>
</body>

</html>