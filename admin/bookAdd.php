<?php
include 'adminSidebar.php';

if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']); 
}
// if(isset($_SESSION['add'])){
//     echo $_SESSION['add'];
//     unset($_SESSION['add']); 
// }

                if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $author=$_POST['author'];
                    $description=$_POST['description'];
                    $price=$_POST['price'];
                    $category=$_POST['category'];
                    
                    if(isset($_POST['featured'])){
                        $featured=$_POST['featured'];
                    }
                    else{
                        $featured= "No";
                    }

                    if(isset($_POST['active'])){
                        $active=$_POST['active'];
                    }
                    else{
                        $active= "No";
                    }

                    if(isset($_FILES['image']['name']))
                    {
                        $image_name = $_FILES['image']['name'];

                        if($image_name!=""){
                            //auto rename image
                            $explodedArray= explode('.', $image_name);
                            $ext = end($explodedArray);
                        
                            $image_name = "Book_Name_".rand(000,999).'.'.$ext;

                            $src= $_FILES['image']['tmp_name'];

                            $dst= "../images/book/".$image_name; 

                            $upload = move_uploaded_file($src, $dst);

                            if($upload==false){
                                $_SESSION['upload']= "<script>alert('Failed to Upload Image!');</script>";
                                header('location: bookAdd.php');
                                die();
                            }
                        }
                    }
                    else{
                        $image_name= "";
                    }

                    $sql2="INSERT INTO book SET
                        title='$title',
                        author='$author',
                        description='$description',
                        price= $price,
                        image_name='$image_name',
                        category_id= $category,
                        featured='$featured',
                        active='$active'
                    ";
                    $res2= mysqli_query($conn, $sql2);

                    if($res2 == true){ 
            
                        $_SESSION['add'] = "<script>alert('Book Added Successfully!');</script>"; 
                        header('location: bookManage.php');
                       
                        
                    }
                    else{
                        
                        $_SESSION['add'] = "<script>alert('Failed to Add Book.;</script>";
                        header('location: bookManage.php');
                    }
                }

            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>

    <section id="interface">
        <div class="navigation">
            <div class="logo">
                <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
            </div>
        </div>

        <div class="title-heading">
            <h2 class="heading">ADD BOOK</h2>
        
        <div class="maincontent">
            <div class="wrapper">

            <form action="" method="POST" enctype="multipart/form-data" class="table-form">
            <div class="close-icon">
                    <a href="bookManage.php"><i class="fa fa-window-close"></i></a>
                </div>
                
                <table class="tbl-form">
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" placeholder="Title of the Book">
                        </td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td>
                            <input type="text" name="author" placeholder="Author of the Book">
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Description of the Book"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="number" name="price" >
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category</td>
                        <td>
                            <select name= "category">

                                <?php
                                    $sql= "SELECT * from category where active='Yes'";
                                    $res= mysqli_query($conn, $sql);
                                    $count= mysqli_num_rows($res);
                                    if($count>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $id= $row['id'];
                                            $title= $row['title'];
                                           ?>

                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                           <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <option value="0">No Category Found</option>
                                        <?php
                                    }
                                ?>  
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured</td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes 
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes 
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="Add Book" class="btn-primary">
        </td>
    </tr>
    
                </table>
            </form>


            </div>
        </div>
    </div>
    <?php include 'adminFooter.php'; ?>
            </section>
</body>
</html>