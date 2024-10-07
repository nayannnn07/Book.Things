<!-- Register/ Login Validation-->
<?php
    include 'navbar.php'; 
   
   //   session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    if (isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];

        $email_check = "SELECT * FROM user WHERE email='$email'";
        $res_email = mysqli_query($conn, $email_check);

        if (mysqli_num_rows($res_email) > 0) {
            echo "<script>alert('Email already exists!');</script>";
        } else if ($pass !== $repass) {
            echo "<script>alert('Your password does not match!');</script>";
        } else {
            $sql = "Insert into user 
                    VALUES ('$id', '$fname', '$lname', '$email', '$pass', '$repass')";
            $result = mysqli_query($conn, $sql);
           

            if ($result) {
                header('location:userLogin.php');
            } else {
                die("Data is not inserted due to " . mysqli_error($conn));
            }
        }
    } elseif (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        //$user_id=$_POST['user_id']; //added line
        $sql = "Select * From user where email='$email' and pass='$pass' ";
        
        $result = mysqli_query($conn, $sql);
        $totalrows = mysqli_num_rows($result);

        if ($totalrows == 1) {
            $row=mysqli_fetch_assoc($result);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $user_id = $row['id'];
           
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id']; //fetched id
            //$user_id = $row['id']; // Add this line
            // $_SESSION['email'] = $email;

            $fetch_cart_query = "SELECT * FROM cart_details";
    $fetch_cart_result = mysqli_query($conn, $fetch_cart_query);

    // Check if there are any cart details to insert
    if (mysqli_num_rows($fetch_cart_result) > 0) {
        // Iterate over each cart detail and insert into cart table along with user_id
        while ($row = mysqli_fetch_assoc($fetch_cart_result)) {
            $product_title = $row['title'];
            $product_author = $row['author'];
            $product_price = $row['price'];
            $product_image = $row['image_name'];
            $product_quantity = $row['quantity'];

            // Insert the cart detail into the cart table along with user_id
            $insert_cart_query = "INSERT INTO cart(user_id, title, author, price, image_name, quantity) 
                                  VALUES ('".$_SESSION['user_id']."', '$product_title', '$product_author', '$product_price', '$product_image', '$product_quantity')";
            mysqli_query($conn, $insert_cart_query);
        }

        // Clear the cart_details table after inserting data into cart table
        $clear_cart_query = "TRUNCATE TABLE cart_details";
        mysqli_query($conn, $clear_cart_query);
    }
           
            echo "<script>
                alert('Welcome to Book.Things, $fname!');
                setTimeout(function() {
                    window.location.href = './user/userHome.php'; 
                }, 100); 
            </script>";

        } else {
            echo "<script>alert('Invalid username or password!');</script>";
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
    <title>Login</title>
</head>

<body>
    <div id='login-form' class="login-page">
        <br /><br /><br />
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button' class='toggle-btn login'>Login</button>
                <button type='button' class='toggle-btn register'>Register</button>
            </div>
            <form id='login' class='input-group-login' method="post">
        <div class="input-field-wrapper">
            <i class="fa fa-envelope-o input-icon"></i>
            <input type='text' name="email" class='input-field' placeholder='Email Id' required>
        </div>
        <div class="input-field-wrapper">
        <i class="fa fa-eye-slash input-icon" aria-hidden="true"></i>
            <input type='password' name="pass" class='input-field' placeholder='Enter Password' required>
        </div>
        <p> New here? Register your account</p>
        <button type='submit' name='login' class='submit-btn'>LOG IN</button>
    </form>
            <form id='register' class='input-group-register' method="post">
            <div class="input-field-wrapper">
            <i class="fa fa-user-o input-icon"></i>
            <input type='text' name="fname" class='input-field' placeholder='First Name' required>
        </div>
        <div class="input-field-wrapper">
            <i class="fa fa-user-o input-icon"></i>
            <input type='text' name="lname" class='input-field' placeholder='Last Name' required>
        </div>
        <div class="input-field-wrapper">
            <i class="fa fa-envelope-o input-icon"></i>
            <input type='email' name="email" class='input-field' placeholder='Email Id' required>
        </div>
        <div class="input-field-wrapper">
            <i class="fa fa-eye-slash input-icon"></i>
            <input type='password' name="pass" class='input-field' placeholder='Enter Password' required>
        </div>
        <div class="input-field-wrapper">
            <i class="fa fa-eye-slash input-icon"></i>
            <input type='password' name="repass" class='input-field' placeholder='Confirm Password' required>
        </div>
                
               
                
                
                
                <p>Already have an account? Login</p>
                <button type='submit' name='register' class='submit-btn'>REGISTER</button>
            </form>
        </div>
    </div>
    </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var loginForm = document.getElementById('login-form');
            if (loginForm) {
                // Display the login form when the page loads
                loginForm.style.display = 'block';


                // Ensure initial styles are applied after CSS rendering
                setTimeout(function () {
                    x.style.left = '50px'; // Adjust if needed based on CSS
                }, 100);

                var loginBtn = document.querySelector('.login');
                if (loginBtn) {
                    loginBtn.addEventListener('click', function (event) {
                        event.preventDefault();
                        toggleForm('login');
                    });
                }

                var registerBtn = document.querySelector('.register');
                if (registerBtn) {
                    registerBtn.addEventListener('click', function (event) {
                        event.preventDefault();
                        toggleForm('register');
                    });
                }
            }

            var x = document.getElementById('login');
            var y = document.getElementById('register');
            var z = document.getElementById('btn');

            function toggleForm(btnId) {
                if (btnId === 'register') {
                    // If login form is currently displayed, switch to register
                    x.style.left = '-400px';
                    y.style.left = '50px';
                    z.style.left = '110px';
                } else {
                    // If register form is currently displayed, switch to login
                    x.style.left = '50px';
                    y.style.left = '450px';
                    z.style.left = '0px';
                }
            }

        });


    </script>
</body>
</html>