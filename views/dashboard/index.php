<?php
require_once("../../includes/koneksi.php");
session_start();
if(empty($_SESSION['id'])){
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    header("Location: ../login/");
}

$jumlahJudul = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS JLH FROM buku;"))['JLH'];
$jumlahPengunjung = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS JLH FROM v_log_pengunjung;"))['JLH'];
$jumlahBuku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(eksemplar) AS JLH FROM buku;"))['JLH'];
$jumlahPeminjaman = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS JLH FROM peminjaman_buku;"))['JLH']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="../../public/css/output.css">
  <script src="../../public/js/drawer.js" defer></script>
  <script src="../../public/js/jquery-3.7.1.min.js"></script>
  <script src="../../public/js/pengunjung.js"></script>
</head>
<body>
<div class="rounded-r-md grid  gap-5 fixed top-0 left-0 text-white bg-indigo-950 h-screen w-1/4 px-4 py-4 -translate-x-full ease-in-out transition-all duration-500" id="drawer">
  
  <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
    <div class="w-22 h-22 my-8 mx-auto p-2 bg-slate-50 rounded-full shadow-md">
      <a href="./" class="flex"><img src="../../public/images/logo.png" class="w-10 mx-5" alt="">
        <span class="text-lg text-center font-bold text-gray-950 font-jb max-w-prose">Sistem Informasi Perpustakaan</span>
      </a>
    </div>
    <ul class="space-y-2 font-medium">
      <li class="">
        <a href="./" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
              <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
            </svg>
            <span class="ms-3">Dashboard</span>
        </a>
      </li>
      <li class="">
          <a href="../anggota/parameter.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
            <path stroke="rgb(107, 114, 128)" fill="rgb(107, 114, 128)" d="M600.704 64a32 32 0 0 1 30.464 22.208l35.2 109.376c14.784 7.232 28.928 15.36 42.432 24.512l112.384-24.192a32 32 0 0 1 34.432 15.36L944.32 364.8a32 32 0 0 1-4.032 37.504l-77.12 85.12a357.12 357.12 0 0 1 0 49.024l77.12 85.248a32 32 0 0 1 4.032 37.504l-88.704 153.6a32 32 0 0 1-34.432 15.296L708.8 803.904c-13.44 9.088-27.648 17.28-42.368 24.512l-35.264 109.376A32 32 0 0 1 600.704 960H423.296a32 32 0 0 1-30.464-22.208L357.696 828.48a351.616 351.616 0 0 1-42.56-24.64l-112.32 24.256a32 32 0 0 1-34.432-15.36L79.68 659.2a32 32 0 0 1 4.032-37.504l77.12-85.248a357.12 357.12 0 0 1 0-48.896l-77.12-85.248A32 32 0 0 1 79.68 364.8l88.704-153.6a32 32 0 0 1 34.432-15.296l112.32 24.256c13.568-9.152 27.776-17.408 42.56-24.64l35.2-109.312A32 32 0 0 1 423.232 64H600.64zm-23.424 64H446.72l-36.352 113.088-24.512 11.968a294.113 294.113 0 0 0-34.816 20.096l-22.656 15.36-116.224-25.088-65.28 113.152 79.68 88.192-1.92 27.136a293.12 293.12 0 0 0 0 40.192l1.92 27.136-79.808 88.192 65.344 113.152 116.224-25.024 22.656 15.296a294.113 294.113 0 0 0 34.816 20.096l24.512 11.968L446.72 896h130.688l36.48-113.152 24.448-11.904a288.282 288.282 0 0 0 34.752-20.096l22.592-15.296 116.288 25.024 65.28-113.152-79.744-88.192 1.92-27.136a293.12 293.12 0 0 0 0-40.256l-1.92-27.136 79.808-88.128-65.344-113.152-116.288 24.96-22.592-15.232a287.616 287.616 0 0 0-34.752-20.096l-24.448-11.904L577.344 128zM512 320a192 192 0 1 1 0 384 192 192 0 0 1 0-384zm0 64a128 128 0 1 0 0 256 128 128 0 0 0 0-256z"/>
          </svg>
              <span class="ms-3">Setting</span>
          </a>
      </li>
      <li class="text-lg border-b p-2 dark:text-white flex items-center text-gray-900">
        <svg class="me-3 flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
          <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
        </svg>
        Buku
      </li>
        
        <li>
          <a href="../buku/index.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <span class="flex-1 ms-3 break-all whitespace-nowrap">List Buku</span>
          </a>
        </li>
        <li>
          <a href="../buku/pinjam.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <span class="flex-1 ms-3 break-all whitespace-nowrap">Peminjaman Buku</span>
          </a>
        </li>
        <li>
          <a href="../buku/add.html" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <span class="flex-1 ms-3 whitespace-nowrap">Tambah Buku</span>
          </a>
        </li>
      
        
    </ul>
  </div>
</div>
<div class="fixed top-1/2 -translate-y-1/2 left-0 w-full ease-in-out transition-all duration-500" id="divDrawer">
  <div class="bg-indigo-950 py-6 px-1/2 rounded-tr-3xl rounded-br-3xl w-fit" id="btnDrawer" >
      <img id="arrow" src="../../public/images/arrow.svg" class="ease-in-out transition-all" alt="">
  </div>
</div>
<section class="bg-default p-5 min-h-screen">
  <div class="p-4 dark:bg-gray-700 bg-slate-50 rounded-xl flex gap-2 mb-5">
    <div class="w-full flex justify-between p-2 bg-slate-400 dark:bg-gray-800 rounded-lg">
      <div class="grid">
          <h3 class="text-xl font-normal text-black dark:text-gray-400">Judul Buku</h3>
          <span class="text-5xl font-bold leading-none text-gray-900 dark:text-white"><?=$jumlahJudul ?></span>
      </div>
        <img src="../../public/images/buku.svg" class="w-12" alt="">
    </div>
    <div class="w-full flex justify-between p-2 bg-slate-400 dark:bg-gray-800 rounded-lg">
      <div class="grid">
          <h3 class="text-xl font-normal text-black dark:text-gray-400">Eksemplar</h3>
          <span class="text-5xl font-bold leading-none text-gray-900 dark:text-white"><?=$jumlahBuku?></span>
      </div>
        <img src="../../public/images/eksemplr.svg" class="w-12" alt="">
    </div>
    <div class="w-full flex justify-between p-2 bg-slate-400 dark:bg-gray-800 rounded-lg">
      <div class="grid">
          <h3 class="text-xl font-normal text-black dark:text-gray-400">Pengunjung</h3>
          <span class="text-5xl font-bold leading-none text-gray-900 dark:text-white"><?=$jumlahPengunjung?></span>
      </div>
        <img src="../../public/images/pengunjung.svg" class="w-16" alt="">
    </div>
    <div class="relative w-full flex justify-between p-2 bg-slate-400 dark:bg-gray-800 rounded-lg">
      <div class="bg-red-600 animate-ping rounded-full w-2 h-2 absolute -top-1 -right-1 p-2"></div>
      <div class="grid">
          <h3 class="text-xl font-normal text-black dark:text-gray-400">Buku Dipinjam</h3>
          <span class="text-5xl font-bold leading-none text-gray-900 dark:text-white"><a href="../buku/pinjam.php"> <?=$jumlahPeminjaman?></a></span>
      </div>
        <img src="../../public/images/pinjam.svg" class="w-14" alt="">
    </div>
  </div>
  <div class="p-2 max-h-fit dark:bg-gray-700 bg-slate-50 rounded-xl flex gap-2 mb-5">
    <h1 class="text-4xl dark:text-white uppercase font-bold my-auto">Cetak Laporan Bulanan</h1>
    <form class="flex gap-2" action="procedure.php" method="POST">
      <select name="bulan" id="bulan" class="inputForm h-fit w-10">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
      <select name="tahun" id="tahun" class="inputForm h-fit">
        <?php
          $tahun = date('Y');
          for($i = 2021; $i <= $tahun; $i++){
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
        ?>
      </select>
      <button name="btnCetak" class="bg-blue-700 text-white rounded-md px-6 py-1 h-full text-xl font-bold">Cetak</button>
    </form>
  </div>
  <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 min-h-[70vh]">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
      <div class="mb-4 lg:mb-0">
        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Log Aktivitas Pengunjung</h3>
        <span class="text-base font-normal text-gray-500 dark:text-gray-400">List akan diperbaharui otomatis saat ada data yang masuk</span>
      </div>
      <div class="items-center sm:flex">
        <div class="flex items-center">
          
        </div>
        
      </div>
    </div>
    <!-- Table -->
    <div class="flex flex-col mt-6">
      <div class="overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
              <thead class="bg-gray-50 dark:bg-gray-700 font-extrabold">
                <tr>
                  <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    ID
                  </th>
                  <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Nama
                  </th>
                  <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Waktu
                  </th>
                  <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Aktivitas
                  </th>
                  <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    STATUS
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-gray-800" id="tableBody">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
  <script>
    const btnDrawer = document.getElementById('btnDrawer');
    const drawer = document.getElementById('drawer');
    const arrow = document.getElementById('arrow');
    const divDrawer = document.getElementById('divDrawer');

    btnDrawer.addEventListener('click', () => {
        drawer.classList.toggle('-translate-x-full');
        arrow.classList.toggle('rotate-180');
        arrow.classList.toggle('-translate-x-2');
        divDrawer.classList.toggle('translate-x-1/4');
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
  <!-- <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
 </svg> -->

</body>
</html>