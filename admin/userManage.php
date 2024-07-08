<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
</head>
<body>
    <?php 
    include 'adminSidebar.php'; 
    // include '../config/dbconnect.php';
    ?>

    <section id="interface">
        <div class="navigation">
            <div class="logo">
            <a href="dashboard.php" ><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>

        </div>

        <div class="title-heading">
            <h2 class="heading">MANAGE USER</h2>

            <div class="maincontent">
            <div class="wrapper">

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //Displaying session message
                unset($_SESSION['add']); //Removing session message
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete']; //Displaying session message
                unset($_SESSION['delete']); //Removing session message
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update']; //Displaying session message
                unset($_SESSION['update']); //Removing session message
            }
        ?>
        
        <div class="table-display">
        <table class="tbl-full">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">NAME</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">ACTION</th>
            </tr>

            <?php 
                $sql="SELECT * FROM user";
                $result= mysqli_query($conn, $sql);
                if($result){
                    $count= mysqli_num_rows($result);
                    $sn=1;
                    if($count>0){
                        while($rows= mysqli_fetch_assoc($result)){
                            $id=$rows['id'];
                            $fname=$rows['fname'];
                            $email=$rows['email'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $fname; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <a href="userUpdate.php?id=<?php echo $id; ?>" class="btn-update">Update User</a>
                                        <a href="userDelete.php?id=<?php echo $id; ?>" class="btn-delete">Delete User</a>
                                    </td>
                                </tr>

                            <?php
                        }
                    }
                }
            ?>

        </table>
        </div>
        
        </div>
        </div>
        </div>

        </div>
        <?php include 'adminFooter.php'; ?>
    </section>

</body>
</html>