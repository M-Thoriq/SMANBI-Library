<?php
require_once "../../includes/koneksi.php";
$query1 = "SELECT id, nama_pengarang FROM pengarang_buku";
$result1 = mysqli_query($conn, $query1);
$json = array();
while ($row = mysqli_fetch_assoc($result1)) {
    $json[] = $row;
}

echo json_encode($json);
?>