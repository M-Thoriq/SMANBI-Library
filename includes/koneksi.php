<?php
    
    $db_host = "localhost";
    $db_name = "testperpus";
    $user = "root";
    $pwd = "";

    $conn = mysqli_connect($db_host, $user, $pwd, $db_name);
    mysqli_set_charset($conn, 'utf8');

    if ($conn->connect_error){
        die("Failed to connect.". $conn->connect_error);
    }
?>