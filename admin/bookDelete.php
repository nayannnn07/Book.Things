<?php
    include '../config/dbconnect.php';
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/book/".$image_name;
            $remove = unlink($path);

            if($remove == FALSE){
                $_SESSION['upload'] = "<script>alert('Failed to Remove Image File.');</script>";
                header('location: bookManage.php');
                die();
            }
        }
        $sql= "DELETE FROM book where id=$id";
        $res= mysqli_query($conn, $sql);
        if($res==true){
            $_SESSION['delete'] = "<script>alert('Book Deleted Successfully!');</script>";
            header('location:bookManage.php');
        }
        else{
            $_SESSION['delete'] = "<script>alert('Failed to Delete Book.');</script>";
            header('location:bookManage.php');
        }
    }

    else
    {
        $_SESSION['unauthorize'] = "<script>alert('Unauthorized Access.');</script>";
        header('location: bookManage.php');
    }
?>