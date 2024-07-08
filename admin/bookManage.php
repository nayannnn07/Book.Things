<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Book</title>
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
            <h2 class="heading">MANAGE BOOK</h2>

            <div class="maincontent">
                <div class="wrapper">

                    <?php
                    if (isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if (isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if (isset($_SESSION['upload'])) {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if (isset($_SESSION['unauthorize'])) {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if (isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    
                    ?>

                    <!-- Button to add book -->
                    <a href="<?php echo SITEURL; ?>admin/bookAdd.php" class="btn-primary"><i class="fa fa-plus"
                            style="margin-right: 12px;"></i>ADD BOOK</a>

                    <div class="table-display">
                        <table class="tbl-full">
                            <tr>
                                <th class="text-center">S.N.</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Featured</th>
                                <th class="text-center">Active</th>
                                <th class="text-center">Action</th>
                            </tr>

                            <?php
                            $sql = "SELECT * FROM book";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $sn = 1;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $author = $row['author'];
                                    $price = $row['price'];
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
                                            <?php echo $author; ?>
                                        </td>
                                        <td>NPR.
                                            <?php echo $price; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($image_name == "") {
                                                echo "<div class='error'>Image not added.</div>";
                                            } 
                                            else {
                                                ?>
                                                <img src="../images/book/<?php echo $image_name; ?>" width="80px" height="110px">
                                                <?php
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
                                                <a href="bookUpdate.php?id=<?php echo $id; ?>" class="btn-update">Update Book</a>
                                                <br><a href="bookDelete.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"
                                                    class="btn-delete">Delete Book</a>
                                            </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='8' class='error'> Book not added yet. </td></tr>";
                            }
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