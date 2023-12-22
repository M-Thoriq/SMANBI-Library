<?php
require_once "../../includes/koneksi.php";
// mysqli_set_charset($conn, 'utf8');
$result1 = mysqli_query($conn, "SELECT judul_buku FROM buku");
$json = array();
foreach($result1 as $data) {
    $json[] = $data;
}

echo $json = json_encode($json);
?>