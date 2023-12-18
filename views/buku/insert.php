
<?php
require_once("../../includes/koneksi.php");
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$ISBN = $_POST['isbn'];
$edisi = $_POST['edisi'];
$kategori = (int)$_POST['kategori'];
$eksemplar = (int)$_POST['eksemplar'];
$sumber = (int)$_POST['sumber'];
$ukuran = $_POST['ukuran'];
$tahun = $_POST['tahun'];

// var_dump($pengarang, $penerbit, $ISBN, $edisi, $kategori, $eksemplar, $sumber, $ukuran, $tahun, $edisi);

$res1 = mysqli_query($conn,"SELECT COUNT(*) AS JLH FROM pengarang_buku WHERE nama_pengarang = '$pengarang';");
$res2 = mysqli_query($conn,"SELECT COUNT(*) AS JLH FROM penerbit_buku WHERE nama_penerbit = '$penerbit';");
$row1 = mysqli_fetch_assoc($res1);
$row2 = mysqli_fetch_assoc($res2);
$jumlah1 = $row1['JLH'];
$jumlah2 = $row2['JLH'];

mysqli_query($conn,'START TRANSACTION');

// if (($jumlah1) < 1) {
//     mysqli_query($conn,"INSERT INTO pengarang_buku(id_pengarang, nama_pengarang) VALUES (UPPER(SUBSTR('$pengarang', 1, 3)), '$pengarang');");
// }
// if (($jumlah2) < 1) {
//     mysqli_query($conn,"INSERT INTO penerbit_buku(nama_penerbit) VALUES ('$penerbit');");
// }

$result = mysqli_query($conn,"SELECT id_penerbit FROM penerbit_buku WHERE nama_penerbit = '$penerbit';");
$row = mysqli_fetch_assoc($result);
$id_penerbit = (int) $row['id_penerbit'];

$result = mysqli_query($conn,"SELECT id FROM pengarang_buku WHERE nama_pengarang = '$pengarang';");
$row = mysqli_fetch_assoc($result);
$id_pengarang = (int) $row['id'];

var_dump($judul, $id_pengarang, $id_penerbit, $ISBN, $edisi, $kategori, $eksemplar, $sumber, $ukuran, $tahun);
$sql = "INSERT INTO `buku` (`no_induk`, `id_kelas`, `id_pengarang`, `judul_buku`, `id_penerbit`, `tahun_terbit`, 
    `edisi`, `eksemplar`, `id_sumber`, `ISBN`, `deskripsiFisik`, `deskripsi`)
    VALUES (NULL, '$kategori', '$id_pengarang', '$judul', '$id_penerbit', 
    '$tahun', '$edisi', '$eksemplar', '$sumber', '$ISBN', '$ukuran', NULL);";
echo $sql; // or log it to a file
$insert = mysqli_real_query($conn, $sql);
mysqli_error($conn);    

if ($insert) {
    mysqli_query($conn,'COMMIT');
    header("Location: ../../views/buku/index.php");
} else {
    mysqli_query($conn,'ROLLBACK');
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>