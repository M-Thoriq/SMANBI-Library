<?php
// Select semua tabel di database, insert, update
    if (!isset($_SESSION)) {
        session_start();
    }    

    $db_host = "localhost";
    $db_name = "java_app";
    $user = "admin";
    $pwd = "admin123";

    $conn = mysqli_connect($db_host, $user, $pwd, $db_name);

    if ($conn->connect_error){
        die("Failed to connect.". $conn->connect_error);
    }
?>