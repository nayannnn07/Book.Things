<?php
    include '../config/dbconnect.php';
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            if($remove == FALSE){
                $_SESSION['remove'] = "<script>alert('Failed to remove category image.');</script>";
                header('location: categoryManage.php');
                die();
            }
        }
        $sql= "DELETE FROM category where id=$id";
        $res= mysqli_query($conn, $sql);
        if($res==true){
            $_SESSION['delete'] = "<script>alert('Category Deleted Successfully!');</script>";
            header('location:categoryManage.php');
        }
        else{
            $_SESSION['delete'] = "<script>alert('Failed to Delete Category! Please try again later.');</script>";
            header('location:categoryManage.php');
        }
    }

    else
    {
        header('location: categoryManage.php');
    }
?>