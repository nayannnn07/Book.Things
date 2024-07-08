<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
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
            <h2 class="heading">FEEDBACK</h2>

            <div class="maincontent">
        <div class="wrapper">
        
        <div class="table-display">
        <table class="tbl-full">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">NAME</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">CONTACT</th>
                <th class="text-center">MESSAGE</th>
            </tr>

            <?php 
                $sql="SELECT * FROM feedback";
                $result= mysqli_query($conn, $sql);
                if($result){
                    $count= mysqli_num_rows($result);
                    $sn=1;
                    if($count>0){
                        while($rows= mysqli_fetch_assoc($result)){
                            $id=$rows['id'];
                            $name=$rows['name'];
                            $email=$rows['email'];
                            $contact=$rows['contact'];
                            $message=$rows['message'];
                                                
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><?php echo $message; ?></td>
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