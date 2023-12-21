<?php
require_once('../../includes/koneksi.php');
session_destroy();

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
// function customError($errno, $errstr) {
//     echo "<script type='text/javascript'>alert('<h1 class=\"font-bold\">Gagal : $errstr</h1>');</script>";
// }
// set_error_handler("customError");
session_start();
$_SESSION['status']= 'siswa';

if ($jenis == "siswa"){
    $aktifitas = $_POST['aktifitasSiswa'];
    // var_dump($aktifitas);
    $res = mysqli_query($conn, "SELECT id_siswa FROM siswa WHERE nama_siswa = SUBSTRING_INDEX('$nama', '[', 1) AND kelas_siswa = SUBSTRING_INDEX(SUBSTRING_INDEX('$nama', '[', -1), ']', 1)");
    $row = mysqli_fetch_assoc($res);
    $id_siswa = $row['id_siswa'];
    $query = "INSERT INTO log_pengunjung_siswa (id_siswa, nama, kelas_siswa, log_aktivitas_siswa) VALUES ($id_siswa, SUBSTRING_INDEX('$nama', '[', 1), SUBSTRING_INDEX(SUBSTRING_INDEX('$nama', '[', -1), ']', 1), '$aktifitas')";
    $hasil = mysqli_query($conn, $query);
    if ($hasil) {
        header("Location: ../");
    }
    else {
        echo "Gagal";
    }
}
else {
    $aktivitas = $_POST['aktifitasTamu'];
    $ulasan = $_POST['ulasan'];
    $jabatan = $_POST['jabatanTamu'];
    // $query = "INSERT INTO log_pengunjung_tamu (nama, keterangan, jabatan, ulasan, penerima) VALUES ('$nama', '$aktifitas', '$jabatan', '$ulasan', 'YUS')";
    $query = "INSERT INTO tamu (nama_tamu, keterangan, jabatan_tamu, penerima, ulasan) VALUES ('$nama', '$aktivitas', '$jabatan', 'YUS', '$ulasan')";
    $hasil = mysqli_query($conn, $query);
    if ($hasil) {
        header("Location: ../");
    }
    else {
        echo "Gagal";
    }
}

?>