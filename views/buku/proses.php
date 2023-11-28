<?php

    require_once("../../includes/koneksi.php");
    if ($conn->connect_error) {
      header("Location: ../../error.php?code=3");
    }


    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $ISBN = $_POST['isbn'];
    $edisi = $_POST['edisi'];
    $kategori = (int)$_POST['kategori'];
    $eksemplar = (int)$_POST['eksemplar'];
    $sumber = (int)$_POST['sumber'];
    $no_induk = $_POST['no_induk'];
    $tahun = $_POST['tahun'];

    // var_dump($pengarang, $penerbit, $ISBN, $edisi, $kategori, $eksemplar, $sumber, $ukuran, $tahun, $edisi);

    $res1 = mysqli_query($conn,"SELECT COUNT(*) AS JLH FROM pengarang_buku WHERE nama_pengarang = '$pengarang';");
    $res2 = mysqli_query($conn,"SELECT COUNT(*) AS JLH FROM penerbit_buku WHERE nama_penerbit = '$penerbit';");
    $row1 = mysqli_fetch_assoc($res1);
    $row2 = mysqli_fetch_assoc($res2);
    $jumlah1 = $row1['JLH'];
    $jumlah2 = $row2['JLH'];

    mysqli_query($conn,'START TRANSACTION');

    if (($jumlah1) < 1) {
        mysqli_query($conn,"INSERT INTO pengarang_buku(id_pengarang, nama_pengarang) VALUES (UPPER(SUBSTR('$pengarang', 1, 3)), '$pengarang');");
    }
    if (($jumlah2) < 1) {
        mysqli_query($conn,"INSERT INTO penerbit_buku(nama_penerbit) VALUES ('$penerbit');");
    }

    $result = mysqli_query($conn,"SELECT id_penerbit FROM penerbit_buku WHERE nama_penerbit = '$penerbit';");
    $row = mysqli_fetch_assoc($result);
    $id_penerbit = (int) $row['id_penerbit'];

    $result = mysqli_query($conn,"SELECT id FROM pengarang_buku WHERE nama_pengarang = '$pengarang';");
    $row = mysqli_fetch_assoc($result);
    $id_pengarang = (int) $row['id'];
    // var_dump($id_pengarang);
    // var_dump($id_penerbit);
    // mysqli_query($conn,"INSERT INTO buku(judul_buku, id_pengarang, id_penerbit, ISBN, edisi, id_kelas, eksemplar, id_sumber, tahun_terbit, deskripsiFisik) VALUES ('$judul', $id_pengarang, $id_penerbit, '$ISBN', $edisi, $kategori, $eksemplar, $sumber, $tahun, '$ukuran')");
    $sql = "UPDATE buku SET id_kelas = $kategori, id_pengarang = $id_pengarang, judul_buku = '$judul', id_penerbit = $id_penerbit, tahun_terbit = '$tahun', edisi = '$edisi', eksemplar = $eksemplar, id_sumber = '$sumber', ISBN = '$ISBN' WHERE no_induk = '$no_induk'"; 
     // or log it to a file
     echo $sql;
    $update = mysqli_real_query($conn, $sql);
    mysqli_error($conn);    

    if ($update) {
        mysqli_query($conn,'COMMIT');
        header("Location: ../../views/buku/");
    } else {
        header("Location: ../../error.php?code=2");
    }

?>