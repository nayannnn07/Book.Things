<?php
    include '../config/dbconnect.php';

    $sql="Create table orders(
        id int PRIMARY KEY AUTO_INCREMENT,
        title varchar(100),
        price decimal(10,2),
        quantity int,
        total decimal(10,2),
        order_date date,
        status varchar(50),
        fullname varchar(100),
        contact varchar(12),
        email varchar(255),
        address varchar(255), 
        payment_mode varchar(100),
        user_id int
        )";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        die ("Table is not created due to ".mysqli_error($conn));
    }
?>