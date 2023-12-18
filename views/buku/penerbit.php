<?php
require_once "../../includes/koneksi.php";
// mysqli_set_charset($conn, 'utf8');
$query1 = "SELECT * FROM penerbit_buku";
$result1 = mysqli_query($conn, "SELECT * FROM penerbit_buku");
$json = array();
foreach($result1 as $data) {
    $json[] = $data;
}

echo $json = json_encode($json);
?>