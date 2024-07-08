<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body> 
    <?php include 'userNavbar.php'; ?>

    <div class="title-heading">
    <h2 class="heading">CATEGORIES</h2>
    
        <div class="container">

            <?php 
                $sql = "Select * FROM category WHERE active='Yes' ORDER BY rand()";
                
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count>0) {
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

<a href="<?php echo SITEURL; ?>user/bookCategory.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                            if($image_name== ""){
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else{
                                ?>
                               
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="book" class="img-responsive img-curve">


                                <?php
                            }

                        ?>
                        
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>

                        <?php
                    }

                } 
                else {
                    echo "<div class='error'>Category not found.</div>";
                }

            ?>
            
        </div>

    </div>

<?php include 'userFooter.php'; ?>

</body>
</html>