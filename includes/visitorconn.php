<?php
// Hanya bisa select data tabel buku
    if (!isset($_SESSION)) {
        session_start();
    }    

    $db_host = "localhost";
    $db_name = "java_app";
    $user = "visitor";
    $pwd = "123";

    $conn = mysqli_connect($db_host, $user, $pwd, $db_name);

    if ($conn->connect_error){
        die("Failed to connect.". $conn->connect_error);
    }
?>