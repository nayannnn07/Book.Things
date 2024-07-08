<?php 
include 'adminSidebar.php'; 
// include '../config/dbconnect.php'; 
?>

<section id="interface">
    <div class="navigation">
        <div class="logo">
            <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
        </div>
    </div>



    <div class="maincontent">
        <div class="wrapper">

            <?php 
             
                    $id= $_GET['id'];
                    $sql="SELECT * FROM admin WHERE id=$id";
                    $result= mysqli_query($conn, $sql);
                    if($result){
                        $count= mysqli_num_rows($result);
                        if($count==1){
                            $row= mysqli_fetch_assoc($result);
                            $name= $row['name'];
                            $email= $row['email'];
                        }
                        else{
                            header('location: adminManage.php');
                        }
                    }
                ?>


            <div class="form-box">
                <div class="admin-closeicon">
                    <a href="adminManage.php"><i class="fa fa-window-close"></i></a>
                </div>
                <div class='button-box'>
                    <h4>UPDATE ADMIN</h4>
                </div>

                <form id='login' class='input-group-login' method="post">
                
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label class="label">Name:</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" class="input-field" required>
                        
                    </div>
                    <div class="form-group">
                        <label class="label">Email:</label>
                        
                        <input type="text" name="email" value="<?php echo $email; ?>" class="input-field" required>
                    </div>
                    <button name='submit' class='submit-btn'>UPDATE ADMIN</button>
                </form>

            </div>
        </div>
    </div>


    </div>
    </div>

    </div>
    <section>
    <?php
    
   if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];

        $sql="UPDATE admin SET
        name = '$name',
        email = '$email'
        WHERE id='$id' ";
        $result= mysqli_query($conn, $sql);
        if($result){
    
            $_SESSION['update'] = "<script>alert('Admin Updated Successfully!');</script>";
            header('location:adminManage.php');
        }
        else{
            
            $_SESSION['update'] = "<script>alert('Failed to Update Admin! Please try again later.');</script>";
            header('location:adminManage.php');
        }
   } 
?>

