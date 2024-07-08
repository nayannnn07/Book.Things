<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Admin</title>
    
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
            <h2 class="heading">MANAGE ADMIN</h2>
    
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
        
        <!-- Button to add admin -->
        <a href="adminRegister.php" class="btn-primary"><i class="fa fa-user-plus" style="margin-right: 15px;"></i>ADD ADMIN</a>
        
        <div class="table-display">
        <table class="tbl-full">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">NAME</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">ACTION</th>
            </tr>

            <?php 
                $sql="Select * from admin";
                $result= mysqli_query($conn, $sql);
                if($result){
                    $count= mysqli_num_rows($result);
                    $sn=1;
                    if($count>0){
                        while($rows= mysqli_fetch_assoc($result)){
                            $id=$rows['id'];
                            $name=$rows['name'];   
                            $email=$rows['email'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <a href="adminUpdate.php?id=<?php echo $id; ?>" class="btn-update">Update Admin</a>
                                        <a href="adminDelete.php?id=<?php echo $id; ?>" class="btn-delete">Delete Admin</a>
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