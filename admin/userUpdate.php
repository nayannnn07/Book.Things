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
                    $sql="SELECT * FROM user WHERE id=$id";
                    $result= mysqli_query($conn, $sql);
                    if($result){
                        $count= mysqli_num_rows($result);
                        if($count==1){
                            $row= mysqli_fetch_assoc($result);
                            $email= $row['email'];
                        }
                        else{
                            header('location: userManage.php');
                        }
                    }
                ?>


            <div class="form-box">
                <div class="admin-closeicon">
                    <a href="userManage.php"><i class="fa fa-window-close"></i></a>
                </div>
                <div class='button-box'>
                    <h4>UPDATE USER</h4>
                </div>

                <form id='login' class='input-group-login' method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                    <div class="form-group">
                        <label class="label">Email:</label>
                        
                        <input type="text" name="email" value="<?php echo $email; ?>" class="input-field" required>
                    </div>
                    <button name='submit' class='submit-btn'>UPDATE USER</button>
                </form>

            </div>
        </div>
    </div>


    </div>
    </div>

    </div>
    </section>
    <?php
    
   if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $email=$_POST['email'];

        $sql="UPDATE user SET
        email = '$email'
        WHERE id='$id' ";
        $result= mysqli_query($conn, $sql);
        if($result){
    
            $_SESSION['update'] = "<script>alert('User Updated Successfully!');</script>";
            header('location:userManage.php');
        }
        else{
            
            $_SESSION['update'] = "<script>alert('Failed to Update User! Please try again later.');</script>";
            header('location:userManage.php');
        }
   } 
?>
