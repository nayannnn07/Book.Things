<!-- Admin Login Validation -->
<?php
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $pass= $_POST['pass'];

            include '../config/dbconnect.php';

            $sql= "Select * From admin where name='$name' and email='$email' and pass='$pass'";
            $result= mysqli_query($conn, $sql);
            $totalrows=mysqli_num_rows($result);
            if($totalrows==1){
                $_SESSION['name']= $name;
                header('location: dashboard.php');
            }
            else{
                echo "<script>alert('Invalid username or password!');</script>";
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <?php include 'adminHeader.php'; ?> 
        <div id='login-form' class="login-page">
            <br/><br/><br/>
                <div class="form-box">
                    <div class='button-box'>
                        <h4>LOGIN AS ADMIN</h4>
                    </div>
                    <form id='login' class='input-group-login' method="post">
                    <div class="input-field-wrapper">
            <i class="fa fa-user-o input-icon"></i>
            <input type='text' name="name" class='input-field' placeholder='Enter Name' required>
        </div>
        <div class="input-field-wrapper">
            <i class="fa fa-envelope-o input-icon"></i>
            <input type='text' name="email" class='input-field' placeholder='Email Id' required>
        </div>
                    <div class="input-field-wrapper">
            <i class="fa fa-eye-slash input-icon"></i>
            <input type='password' name="pass" class='input-field' placeholder='Enter Password' required>
        </div>
                    
                     
                        
                        <Button type='submit' name='login' class='submit-btn'>LOG IN</button>
                    </form>
                    
                </div>
        </div>

</body>
</html>
