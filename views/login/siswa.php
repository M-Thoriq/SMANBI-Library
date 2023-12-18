<?php
require_once "../../includes/koneksi.php";
$query = "SELECT concat(nama_siswa, ' [', kelas_siswa, ']') as nama FROM siswa";

$result = mysqli_query($conn, $query); 
$array =  array();
while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
}
echo json_encode($array);
?>