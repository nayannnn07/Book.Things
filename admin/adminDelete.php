<?php
    include '../config/dbconnect.php';
    $id= $_GET['id'];
    $sql= "DELETE FROM admin where id=$id";
    $result= mysqli_query($conn, $sql);
    if($result){
        $_SESSION['delete'] = "<script>alert('Admin Deleted Successfully!');</script>";
        header('location:adminManage.php');
    }
    else{
        $_SESSION['delete'] = "<script>alert('Failed to Delete Admin! Please try again later.');</script>";
        header('location:adminManage.php');
        // die ("Data is not deleted due to ".mysqli_error($conn));
    }
?>  