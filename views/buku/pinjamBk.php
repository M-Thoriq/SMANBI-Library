<?php
$no_induk = $_POST['no_induk'];
$namaPeminjam = $_POST['namaPeminjam'];
// $namaPetugas = $_POST['namaPetugas'];
require_once("../../includes/koneksi.php");

$result = mysqli_query($conn, "SELECT id_siswa as id FROM siswa WHERE nama_siswa = '$namaPeminjam';");
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_siswa = $row['id'];
} else {
    echo "0 results";
    header("Location: ../../views/buku/detail.php?ID=$no_induk");
}

$query = mysqli_query($conn, "INSERT INTO peminjaman_buku(no_induk, id_siswa, tgl_peminjaman, tgl_pengembalian) VALUES ('$no_induk', '$id_siswa', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY));");
if ($query) {
    header("Location: ../../views/buku/detail.php?ID=$no_induk");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>