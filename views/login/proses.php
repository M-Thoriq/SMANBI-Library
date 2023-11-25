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
    $query = "INSERT INTO log_pengunjung_tamu (nama, log_aktivitas_tamu) VALUES ('$nama', '$aktifitas')";
    $hasil = mysqli_query($conn, $query);
    if ($hasil) {
        header("Location: ../search.html");
    }
    else {
        echo "Gagal";
    }
}

?>