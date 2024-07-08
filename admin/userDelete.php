<?php
    include '../config/dbconnect.php';
    $id= $_GET['id'];
    $sql= "DELETE FROM user where id=$id";
    $result= mysqli_query($conn, $sql);
    if($result){
        $_SESSION['delete'] = "<script>alert('User Deleted Successfully!');</script>";
        header('location: userManage.php');
    }
    else{
        $_SESSION['delete'] = "<script>alert('Failed to Delete User! Please try again later.');</script>";
        header('location: userManage.php');
        
    }

?>