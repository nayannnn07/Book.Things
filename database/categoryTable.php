<?php
    include '../config/dbconnect.php';

    $sql="Create table category(
        id int PRIMARY KEY AUTO_INCREMENT,
        title varchar(100),
        image_name varchar(100),
        featured varchar(10),
        active varchar(10)
        )";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        die ("Table is not created due to ".mysqli_error($conn));
    }
?>