<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php include 'adminSidebar.php'; ?>

    <section id="interface">
        <div class="navigation">
            <div class="logo">
            <a href="dashboard.php" ><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>

        </div>

        <div class="title-heading">
            <h2 class="heading">DASHBOARD</h2>

            <div class="values">
                <div class="val-box">
                    <i class="fa fa-users"></i>
                    <div>
                        <?php
                            $sql = "SELECT * FROM user";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <h3><?php echo $count; ?></h3>
                        <span>Total Customers</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fa fa-book"></i>
                    <div>
                        <?php
                            $sql2 = "SELECT * FROM book";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);
                        ?>
                        <h3><?php echo $count2; ?></h3>
                        <span>Total Books</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fa fa-shopping-cart"></i>
                    <div>
                    <?php
                            $sql3 = "SELECT * FROM orders where status='Ordered'";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);
                        ?>
                        <h3><?php echo $count3; ?></h3>
                        <span>Total Pending Orders</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fa fa-inr"></i>
                    <div>
                        <?php
                            $sql4 = "SELECT SUM(total) AS Total FROM orders WHERE status='Delivered'";
                            $res4 = mysqli_query($conn, $sql4);
                            $row4 = mysqli_fetch_assoc($res4);
                            $total_revenue = $row4['Total'];
                        ?>
                        <h3>NPR. <?php echo $total_revenue; ?></h3>
                        <span>Total Revenue Generated</span>
                    </div>
                </div>
            </div>

        </div>
        
        <?php include 'adminFooter.php'; ?>
    </section>  
</body>
</html>