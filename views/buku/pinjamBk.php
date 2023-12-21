<?php
// session_start();
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
function shutDownFunction() {
    $error = error_get_last();
    
     // Fatal error, E_ERROR === 1
    if ($error['type'] === E_ERROR) {
        $search = array("Uncaught mysqli_sql_exception: ", " in ", $error["file"], " on line ", $error["line"], "Uncaught ");
        $replace = array("", "", "", "", "", "");
        $msg = str_replace($search, $replace, $error["message"]);
        $posIndex = strpos($msg, ":");
        $errMsg = substr($msg, 0, $posIndex);
        echo "<script type='text/javascript'>alert('Gagal : $errMsg');</script>";
    }
}

register_shutdown_function('shutDownFunction');
error_reporting(0);
$query = mysqli_query($conn, "CALL InsertPeminjaman('$id_siswa', '$no_induk', '$idPetugas')");
if (!$query){
    header("Location: ./detail.php?no_induk=$no_induk");
}
?>