<?php
require_once('../../includes/koneksi.php');
$nama = $_POST['nama'];

$jenis = $_POST['jenis'];

if ($jenis == "siswa"){
    $aktifitas = $_POST['aktifitasSiswa'];
    var_dump($aktifitas);
    $query = "INSERT INTO log_pengunjung_siswa (nama, log_aktivitas_siswa) VALUES ('$nama', '$aktifitas')";
    $hasil = mysqli_query($conn, $query);
    if ($hasil) {
        header("Location: ../search.html");
    }
    else {
        echo "Gagal";
    }
}
else {
    $aktifitas = $_POST['aktifitasTamu'];
    $ulasan = $_POST['ulasan'];
    $jabatan = $_POST['jabatanTamu'];
    $query = "INSERT INTO log_pengunjung_tamu (nama, keterangan, jabatan, ulasan) VALUES ('$nama', '$aktifitas', '$jabatan', '$ulasan')";
    $hasil = mysqli_query($conn, $query);
    if ($hasil) {
        header("Location: ../");
    }
    else {
        echo "Gagal";
    }
}

?>