<?php
    include '../config/dbconnect.php';

    $sql="Create table review(
        id int PRIMARY KEY AUTO_INCREMENT,
        book_id int,
        user_id int,
        review varchar(200),
        timestamp datetime
        )";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        die ("Table is not created due to ".mysqli_error($conn));
    }
?>