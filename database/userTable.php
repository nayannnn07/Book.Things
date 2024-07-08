<?php
    include '../config/dbconnect.php';

    $sql="Create table user(
        id int PRIMARY KEY AUTO_INCREMENT,
        fname varchar(50),
        lname varchar(50),
        email varchar(50),
        pass varchar(50),
        repass varchar(50)
        )";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        die ("Table is not created due to ".mysqli_error($conn));
    }
?>