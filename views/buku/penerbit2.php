<?php
require_once "../../includes/koneksi.php";
$query1 = "SELECT * FROM penerbit_buku";
$result1 = mysqli_query($conn, $query1);



if (!$result1) {
    die('Invalid query: ' . mysqli_error($conn));
}

$json = array();
while($row = mysqli_fetch_assoc($result1)) {
    $json[] = $row;
}

if(!empty($json)) {
    echo json_encode($json);
} else {
    echo "No data found";
}
?>