<?php
    $db_host = "localhost";
    $db_name = "testperpus";
    $user = "admin";
    $pwd = "admin123";

    $conn = mysqli_connect($db_host, $user, $pwd, $db_name);

    if ($conn->connect_error){
        die("Failed to connect.". $conn->connect_error);
    }
?>