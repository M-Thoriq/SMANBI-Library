<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../login/");
}

$idPetugas = $_SESSION['id'];
$no_induk = $_POST['no_induk'];
$nama = $_POST['namaPeminjam'];
// $namaPetugas = $_POST['namaPetugas'];
require_once("../../includes/koneksi.php");

$result = mysqli_query($conn, "SELECT id_siswa FROM siswa WHERE nama_siswa = SUBSTRING_INDEX('$nama', '[', 1) AND kelas_siswa = SUBSTRING_INDEX(SUBSTRING_INDEX('$nama', '[', -1), ']', 1)");
$row = mysqli_fetch_assoc($result);
$id_siswa = $row['id_siswa'];

$query = mysqli_query($conn, "INSERT INTO peminjaman_buku(id_buku, id_siswa, tgl_peminjaman, tgl_pengembalian, id_petugas) VALUES ('$no_induk', '$id_siswa', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), '$idPetugas');");
if ($query) {
    header("Location: ../../views/buku/detail.php?ID=$no_induk");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>