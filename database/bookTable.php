<?php
    include '../config/dbconnect.php';

    $sql="Create table book(
        id int PRIMARY KEY AUTO_INCREMENT,
        title varchar(100),
        author varchar(100),
        description TEXT,
        price decimal(10,2),
        image_name varchar(255),
        category_id int,
        featured varchar(10),
        active varchar(10)
        )";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        die ("Table is not created due to ".mysqli_error($conn));
    }
?>