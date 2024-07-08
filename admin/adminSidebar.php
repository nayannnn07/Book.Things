<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    include 'adminHeader.php'; 
    include '../config/dbconnect.php';
?>
    <section id="menu">
        <div class="icon">
            <i class="fa fa-user-circle"></i>
            
        </div>

        <div class="icon-content">
                <h4>Admin
                        <?php 
                        if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        }
                    ?>
                </h4>
            </div>

        <div class="items">
            <li><i class="fa fa-dashboard"></i><a href="dashboard.php">DASHBOARD</a></li>
            <li><i class="fa fa-book"></i><a href="bookManage.php">BOOK</a></li>
            <li><i class="fa fa-list"></i><a href="categoryManage.php">CATEGORY</a></li>
            <li><i class="fa fa-shopping-cart"></i><a href="orderManage.php">ORDER</a></li>
            <li><i class="fa fa-envelope"></i><a href="feedbackManage.php">FEEDBACK</a></li>
            <li><i class="fa fa-users"></i><a href="userManage.php">CUSTOMER</a></li> 
            <li><i class="fa fa-user" ></i><a href="adminManage.php">ADMIN</a></li>
            <li class="logout"><i class="fa fa-sign-out" ></i><a href="adminLogout.php">LOGOUT</a></li>
        </div>

    </section>

    
</body>
</html>