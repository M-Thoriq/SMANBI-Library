<?php
require_once "../../includes/koneksi.php";
require_once '../../vendor/autoload.php';
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];

$query3 = mysqli_query($conn, "SELECT s.nama_siswa, s.id_siswa, kelas_siswa, COUNT(*) AS TOTAL FROM siswa s JOIN peminjaman_buku p ON s.id_siswa = p.id_siswa GROUP BY s.id_siswa ORDER BY TOTAL DESC");
$query2 = mysqli_query($conn, "SELECT ID, nama, kelas_siswa, Total, Keterangan from (SELECT ID, nama, kelas_siswa, Keterangan, waktu, COUNT(*) as Total FROM v_log_pengunjung GROUP BY nama, Keterangan) as kunjunganSiswa WHERE (MONTH(waktu) = $bulan AND YEAR(waktu) = $tahun) AND kelas_siswa IS NOT NULL ORDER BY Total DESC");
$query = mysqli_query($conn, "CALL report_bulanan($bulan, $tahun)");

if (!$query || !$query2 || !$query3) {
    header("Location: .index.php");
}

foreach($query as $result) {}
// echo $result['JumlahDenda'];
$html = '
<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Laporan Bulanan ('.date('d F Y').')</title>
    <style>
      body {
        font-size: 0.75rem;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: normal;
        color: #000000;
        margin: 0;
        padding: 0;
        position: relative;
      }

      .pspdfkit-header {
        font-size: 0.625rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 400;
        color: #717885;
        margin-top: 2.5rem;
        margin-bottom: 2.5rem;
        width: 100%;
      }

      .header-columns {
        display: flex;
        justify-content: space-between;
        padding-left: 2.5rem;
        padding-right: 2.5rem;
      }

      .logotype {
        font-weight: bold;
        display: flex;
        gap: 1.5rem;
        
      }

      .txt{
        margin: auto 0;
      }

      h2 {
        font-family: "Courier New", Courier, monospace;
        font-size: 1.25rem;
        font-weight: normal;
      }

      .page {
        margin-left: 2rem;
        margin-right: 2rem;
      }

      .intro-table {
        display: flex;
        justify-content: space-between;
        margin: 3rem 0 1rem 0;
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
      }

      .intro-table-summary{
        display: flex;
        justify-content: space-between;
        margin: 0.25rem 0 1rem 0;
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
      }

      .intro-form {
        display: flex;
        flex-direction: column;
        
        width: 50%;
      }

      .intro-form:last-child {
        border-right: none;
      }

      .intro-table-title {
        font-size: 0.625rem;
        margin: 0;
      }

      .intro-form-item {
        padding: 0.25rem 1.5rem 1.25rem 1.5rem;
      }

      .intro-form-item:first-child {
        padding-left: 0;
      }

      .intro-form-item:last-child {
        padding-right: 0;
      }

      .intro-form-item-border {
        padding: 0.35rem 0 0.35rem 0.25rem;
        border-bottom: 1px solid #000000;
        margin-bottom: -0.25rem;
      }

      .intro-form-item-border:last-child {
        border-bottom: none;
      }

      .form {
        display: flex;
        flex-direction: column;
        margin-top: 1.5rem;
      }

      .no-border {
        border: none;
      }

      .border {
        border: 1px solid #000000;
      }

      .border-bottom {
        border: 1px solid #000000;
        border-top: none;
        border-left: none;
        border-right: none;
      }

      .signer {
        display: flex;
        justify-content: space-between;
        margin: 2rem 0 2rem 0;
      }

      .signer-item {
        width: 50%;
      }

      input {
        color: #4537de;
        font-family: "Courier New", Courier, monospace;
        text-align: center;
        margin-top: 1.5rem;
        height: 1.5rem;
        width: 100%;
        box-sizing: border-box;
      }

      input#date {
        text-align: left;
      }

      input#signature {
        height: 3rem;
      }

      .intro-text {
        width: 60%;
      }

      .table-box table,
      .summary-box table {
        width: 100%;
        font-size: 1rem;
      }

      .title{
        padding-top: 2rem;
      }

      .table-box table {
        padding-top: 0.5rem;
      }

      .table-box td:first-child,
      .summary-box td:first-child {
        width: 50%;
      }

      .table-box td:last-child,
      .summary-box td:last-child {
        text-align: right;
      }

      .table-box table tr.heading td {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        height: 1.5rem;
      }

      .table-box table tr.item td,
      .summary-box table tr.item td {
        border-bottom: 1px solid #d7dce4;
        height: 1.5rem;
      }

      .summary-box table tr.no-border-item td {
        border-bottom: none;
        height: 1.5rem;
      }

      .summary-box table tr.total td {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        height: 1.5rem;
      }

      .summary-box table tr.item td:first-child,
      .summary-box table tr.total td:first-child {
        border: none;
        height: 1.5rem;
      }

      p{margin: 0; font-size: 0.625rem;}

      .logo{
        width: 50px;
        height: 50px;
        align-items: center;
        float: center;
      }

      .textInfo{
        font-size: 0.9rem;
        color: #3a3a3a;
      }
    </style>
</head>
<body id="body">
    <div class="pspdfkit-header">
      <div class="header-columns">
        <div class="logotype">
          <div style="text-align: center; padding-bottom: 0.5rem;">
            <center><img src="./logo.png" class="logo" alt="" ></center>
          </div>
          <p style="text-align: center" class="txt">Perpustakaan SMA Negeri 1 Binjai</p>
        </div>
        <div class="logotype">
          <p style="text-align: center" class="txt">Jl. Wr.Mongonsidi No.10, Satria, Kec. Binjai Kota, Kota Binjai, Sumatera Utara 20714</p>
        </div>
      </div>
    </div>
    
    <div class="page">
      <div>
        <h1 style="text-align: center">Laporan Bulanan</h1>
        <h2 style="text-align: center">'.date('d F Y').'</h2>
      </div>
      
      <h2 class="title">Pengunjung</h2>
      <div class="table-box">
        <table cellpadding="0" cellspacing="0">
          <tbody>
            <tr class="heading">
              <td>Nama</td>
              <td>ID Siswa</td>
              <td>Kelas</td>
              <td>Total Kunjungan</td>
            </tr>';
            foreach($query2 as $data) {
              $html .= '
            <tr class="item">
              <td>'.$data['nama'].'</td>
              <td>'.$data['ID'].'</td>
              <td>'.$data['kelas_siswa'].'</td>
              <td>'.$data['Total'].'</td>
            </tr>
            ';
            }
            $html .= '
          </tbody>
        </table>
      </div>
      <h2 class="title">Peminjaman Buku</h2>
      <div class="table-box">
        <table cellpadding="0" cellspacing="0">
          <tbody>
            <tr class="heading">
              <td>Nama</td>
              <td>ID Siswa</td>
              <td>Kelas</td>
              <td>Total Peminjaman Buku</td>
            </tr>';
            foreach($query3 as $data) {
                $html .= '
            <tr class="item">
              <td>'.$data['nama_siswa'].'</td>
              <td>'.$data['id_siswa'].'</td>
              <td>'.$data['kelas_siswa'].'</td>
              <td>'.$data['TOTAL'].'</td>
            </tr>';
            }

           $html .= '
          </tbody>
        </table>
      </div>
      <h2 class="title">Rangkuman</h2>
      <div style="width:100%;" class="intro-table-summary">
        <div style:"" class="intro-form intro-form-item">
          <p style="margin-left: -1rem; padding-left: 0;" class="textInfo">Informasi Tambahan :</p>
          <p class="">
            
          </p>
        </div>
        <div style="float: right; width: 50%; margin-top: -2.7rem; border-left: 1px solid #000000;" align="left" class="intro-form">
          <div class="intro-form-item-border">
            <p class="textInfo">Jumlah pengunjung : '.$result['JumlahPengunjung'].'</p>
          </div>
          <div class="intro-form-item-border">
            <p class="textInfo">Total pembayaran denda : '.$result['JumlahDenda'].'</p>
          </div>
          <div class="intro-form-item-border">
            <p class="textInfo">Jumlah peminjaman buku : '.$result['JumlahPeminjaman'].'</p>
          </div>
          <div style="border-bottom: 0;" class="intro-form-item-border">
            <p class="textInfo">Jumlah buku : '.$result['JumlahBuku'].'</p>
          </div>
        </div>
      </div>
      
      <div style="width:100%;" class="signer">
        <div class="form signer-item"></div>
        <div style="width: 100%;" class="form signer-item">
          <h4 for="signature" style="text-align: right; width:100%; float:right; padding-right: 4.5rem;" class="h4">Mengetahui, </h4>
          <br>
          <br>
          <br>
          <h4 for="signature" style="text-align: right; width:100%; float:right; padding-left: 2rem;" class="h4">Kepala Perpustakaan</h4>
        </div>
      </div>
    </div>
</body>
</html>';

$filename = 'report_perpustakaan_'.date('d-m-Y').'.pdf';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output($filename, 'D');

?>