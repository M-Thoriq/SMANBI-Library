<?php
    $db_host = "localhost";
    $db_name = "perpussmansa";
    $user = "root";
    $pwd = "";

    $conn = mysqli_connect($db_host, $user, $pwd, $db_name);

    if ($conn->connect_error){
        die("Failed to connect.". $conn->connect_error);
    }
?>