<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];

    // include '../config/dbconnect.php';

    
    $email_check = "SELECT * FROM admin WHERE email='$email'";
    $res_email = mysqli_query($conn, $email_check);

    $pass_check = "SELECT * FROM admin WHERE pass='$pass'";
    $res_pass = mysqli_query($conn, $pass_check);

    $repass_check = "SELECT * FROM admin WHERE repass='$repass'";
    $res_repass = mysqli_query($conn, $repass_check);

    if (mysqli_num_rows($res_email) > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else if ($pass_check != $repass_check) {
        echo "<script>alert('Your password does not match!');</script>";
    } else {
        $sql = "Insert into admin
                    VALUES ('$id','$name',  '$email', '$pass', '$repass')";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            $_SESSION['add'] = "<script>alert('Admin Added Successfully!');</script>";
            header('location:adminManage.php');
        } else {

            $_SESSION['add'] = "<script>alert('Failed to Add Admin! Please try again later.');</script>";
            header('location:adminManage.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
</head>

<body>
    <?php include 'adminHeader.php'; ?>
    <div id='login-form' class="login-page">
        <br /><br /><br />
        <div class="form-box">
            <div class="admin-closeicon">
                <a href="adminManage.php"><i class="fa fa-window-close"></i></a>
            </div>
            <div class='button-box'>
                <h4>NEW REGISTRATION</h4>
            </div>
            <form id='register' class='input-group-register' method="post">
                <input type='text' name="name" class='input-field' placeholder='Name' required>
                <input type='email' name="email" class='input-field' placeholder='Email Id' required>
                <input type='password' name="pass" class='input-field' placeholder='Enter Password' required>
                <input type='password' name="repass" class='input-field' placeholder='Confirm Password' required>
                <button type='submit' name='register' class='submit-btn'>REGISTER</button>
            </form>

        </div>
    </div>


</body>

</html>