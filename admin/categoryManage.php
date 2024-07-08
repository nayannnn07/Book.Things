<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Category</title>

</head>

<body>
    <?php
    include 'adminSidebar.php';
    ?>

    <section id="interface">
        <div class="navigation">
            <div class="logo">
                <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>
        </div>

        <div class="title-heading">
            <h2 class="heading">MANAGE CATEGORY</h2>

            <div class="maincontent">
                <div class="wrapper">

                    <?php
                    if (isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if (isset($_SESSION['remove'])) {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                    if (isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if (isset($_SESSION['no-category-found'])) {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
                    }

                    if (isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if (isset($_SESSION['upload'])) {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if (isset($_SESSION['failed-remove'])) {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }
                    ?>

                    <!-- Button to add category -->
                    <a href="categoryAdd.php" class="btn-primary"><i class="fa fa-plus"
                            style="margin-right: 12px;"></i>ADD CATEGORY</a>

                    <div class="table-display">
                        <table class="tbl-full">
                            <tr>
                                <th class="text-center">S.N.</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Featured</th>
                                <th class="text-center">Active</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM category";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $sn = 1;
                            //if ($result) {
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $image_name = $row['image_name'];
                                        $featured = $row['featured'];
                                        $active = $row['active'];

                                        ?>

                                        <tr>
                                            <td>
                                                <?php echo $sn++; ?>.
                                            </td>
                                            <td>
                                                <?php echo $title; ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($image_name != "") {
                                                    ?>
                                                    <img src="../images/category/<?php echo $image_name; ?>" width="80px"
                                                        height="110px">

                                                    <?php

                                                } else {
                                                    echo "<div class='error'>Failed to upload image.</div>";
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php echo $featured; ?>
                                            </td>
                                            <td>
                                                <?php echo $active; ?>
                                            </td>
                                            <td>
                                                <a href="categoryUpdate.php?id=<?php echo $id; ?>" class="btn-update">Update Category</a>
                                                <a href="categoryDelete.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"
                                                    class="btn-delete">Delete Category</a>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">
                                            <script>alert('No Category Added!');</script>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            //}
                            ?>

                        </table>
                    </div>

                </div>
            </div>
        </div>
        <?php include 'adminFooter.php'; ?>
    </section>



</body>

</html>