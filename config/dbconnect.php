<?php
    session_start();
    define('SITEURL', 'http://localhost/book.things/');
    $url = "http://localhost/book.things/";
    $hostname= "localhost";
    $username= "root";
    $password= "";
    $db= "bookstore";
    $conn =mysqli_connect($hostname, $username, $password, $db);

    if(!$conn){
        die("Connection was not successful due to ".mysqli_connect_error());
    }
?>
