<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>

    <link rel="stylesheet" href="../../public/css/output.css">
    <!-- <script src="../../public/js/jquery-3.7.1.min.js"></script>
    <script src="../../public/js/searchbuku.js"></script> -->
</head>
<body>
    <div class="rounded-r-md grid  gap-5 fixed top-0 left-0 text-white bg-indigo-950 h-screen w-1/4 pe-4 py-4 -translate-x-full ease-in-out transition-all duration-500" id="drawer">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
          <div class="w-22 h-22 my-8 mx-auto p-2 bg-slate-50 rounded-full shadow-md">
            <a href="index.html" class="flex"><img src="../../public/images/logo.png" class="w-10 mx-5" alt="">
              <span class="text-lg text-center font-bold text-gray-950 font-jb max-w-prose">Sistem Informasi Perpustakaan</span>
            </a>
          </div>
          <ul class="space-y-2 font-medium">
             <li class="">
                <a href="../dashboard/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                      <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                      <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                   </svg>
                   <span class="ms-3">Dashboard</span>
                </a>
             </li>
            <li class="text-lg border-b p-2 flex items-center">
              <svg class="me-3 flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
              </svg>
              Buku
            </li>
             
             <li>
                <a href="../buku/index.html" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <span class="flex-1 ms-3 whitespace-nowrap">List Buku</span>
                </a>
             </li>
             <li>
                <a href="../buku/add.html" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <span class="flex-1 ms-3 whitespace-nowrap">Tambah Buku</span>
                </a>
             </li>
            <li class="text-lg border-b p-2 flex items-center">
              <svg class="me-3 flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
             </svg>
              User
            </li>
             
             <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <!-- <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                   </svg> -->
                   <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                </a>
             </li>
             <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <!-- <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                      <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                      <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                   </svg> -->
                   <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
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
      
      <div class="p-4 mt-2 mb-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-blue-950 max-h-[80vh] overflow-y-scroll">
        <!-- Card header -->
        <div class="grid text-lg dark:text-white justify-between text-gray-950 grid-flow-col">
          <h1 class="text-3xl font-bold">Konfirmasi Peminjaman Buku</h1>
          
        </div>
        <!-- Table -->
        <div class="flex flex-col mt-6">
          <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-600">
                  <thead class="bg-gray-50 dark:bg-gray-700 font-extrabold">
                    <tr>
                      <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        No
                      </th>
                      <th scope="col" class="p-4 max-w-prose text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        ID Siswa
                      </th>
                      <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        No Buku
                      </th>
                      <th scope="col" class="ps-2 pe-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        Tanggal Pinjam
                      </th>
                      <th scope="col" class="ps-2 pe-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        Tanggal Kembali
                      </th>
                      
                      <th scope="col" class="p-4 w-fit">
                        
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white dark:bg-gray-800" id="tableBody">
<?php
require_once '../../includes/koneksi.php';
$query = "SELECT * FROM peminjaman_buku WHERE id_petugas IS NULL";
$result = mysqli_query($conn, $query); 
foreach ($result as $data) {
  echo '
  <tr class="tableRow">
    
  <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">
    '.$data['id_peminjaman'].'
  </td>
  <td class="p-4 text-sm max-w-[40ch] font-bold text-gray-500 break-all dark:text-gray-400">
    '.$data['id_siswa'].'
  </td>
  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
    '.$data['no_induk'].'
  </td>
  <td class="px-2 text-sm font-bold break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
    '.$data['tgl_peminjaman'].'
  </td>
  <td class="px-2 text-sm font-bold break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
    '.$data['tgl_pengembalian'].'
  </td>
  <td class="p-4 relative flex gap-2 z-50">
  <form method="POST">
    <input class="hidden" name="idpinjam" value="'.$data['id_peminjaman'].'">
    <button type="submit" name="btnHapus" class=" rounded-lg p-2 shadow-md shadow-black bg-red-500 dark:bg-slate-50">
      <img src="../../public/images/cross.svg" class="w-5" alt="">
    </button>
  </form>
  <form method="POST">
    <input class="hidden" name="idPinjam" value="'.$data['id_peminjaman'].'">
    <button type="submit" name="btnConfirm" class=" rounded-lg p-2 shadow-md shadow-black bg-green-500 dark:bg-slate-50">
      <img src="../../public/images/ceklis.svg" class="w-5" alt="">
    </button>
  </form>
  </td>
</tr>
';
}
?>
<?php
         if(isset($_POST['btnConfirm'])){
           
           //inisiasi variabel untuk menampung isian id
           $id=$_POST['idPinjam'];
              $query = mysqli_query($conn, "UPDATE peminjaman_buku SET id_petugas='YUS' WHERE id_peminjaman=$id");
              echo "<script>window.location.href='pinjam.php'</script>";
          }
           
?>
<?php
         if(isset($_POST['btnHapus'])){
           
           //inisiasi variabel untuk menampung isian id
           $id=$_POST['idpinjam'];
              $query = mysqli_query($conn, "UPDATE peminjaman_buku SET id_petugas='YUS' WHERE id_peminjaman=$id");
              $sql = "DELETE FROM peminjaman_buku WHERE id_peminjaman=$id";
              mysqli_query($conn, $sql);
              echo "<script>window.location.href='pinjam.php'</script>";
          }
           
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
            
      </div>
      <div class="grid grid-cols-2 gap-2">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-blue-950 min-h-[80vh]">
            <!-- Card header -->
            <div class="grid text-lg dark:text-white text-gray-950 grid-flow-col">
              <h1 class="text-3xl font-bold">Daftar Peminjaman Buku</h1>
              
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
              <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                  <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600">
                      <thead class="bg-gray-50 dark:bg-gray-700 font-extrabold">
                        <tr>
                          <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            No
                          </th>
                          <th scope="col" class="p-4 max-w-prose text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            ID Siswa
                          </th>
                          <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            No Buku
                          </th>
                          <th scope="col" class="ps-2 pe-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Petugas
                          </th>
                          <th scope="col" class="p-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Tanggal Pinjam
                          </th>
                          <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Tanggal Kembali
                          </th>
                          <th scope="col" class="p-4 w-fit">
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white dark:bg-gray-800" id="tableBody">
    <?php
    $query = "SELECT * FROM peminjaman_buku WHERE id_petugas IS NOT NULL";
    $result = mysqli_query($conn, $query); 
    foreach ($result as $buku) {
      echo '
      <tr class="tableRow">
        
      <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
        '.$buku['id_peminjaman'].'
      </td>
      <td class="p-4 text-sm max-w-[40ch] font-normal text-gray-500 break-all dark:text-gray-400">
      '.$buku['id_siswa'].'
      </td>
      <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
        '.$buku['no_induk'].'
      </td>
      <td class="px-2 text-sm font-normal break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
        '.$buku['id_petugas'].'
      </td>
      <td class="px-2 text-sm font-normal break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
        '.$buku['tgl_peminjaman'].'
      </td>
      <td class="px-2 text-sm font-normal break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
        '.$buku['tgl_pengembalian'].'
      </td>
      <td class="p-4 relative z-50">
      <form action="update.php" method="POST">
        <input class="hidden" name="no_induk" value="'.$buku['no_induk'].'">
        <button type="submit" class=" rounded-lg p-2 shadow-inner shadow-black bg-blue-100 dark:bg-slate-50">
          <img src="../../public/images/edit.svg" class="w-5" alt="">
        </button>
      </form>
      </td>
    </tr>
    ';
    }
    
    
    
    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                
        </div>
          <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-blue-950 min-h-[80vh]">
            <!-- Card header -->
            <div class="grid text-lg dark:text-white text-gray-950 grid-flow-col">
              <h1 class="text-3xl font-bold">Daftar Denda</h1>
              
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
              <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                  <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600">
                      <thead class="bg-gray-50 dark:bg-gray-700 font-extrabold">
                        <tr>
                          <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            No
                          </th>
                          <th scope="col" class="p-4 max-w-prose text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            ID Pinjam
                          </th>
                          <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Jumlah Denda
                          </th>
                          <th scope="col" class="ps-2 pe-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Keterangan
                          </th>
                          <th scope="col" class="p-4 w-fit">
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white dark:bg-gray-800" id="tableBody">
    <?php
    
    $query = "SELECT * FROM denda";
    $result = mysqli_query($conn, $query); 
    foreach ($result as $buku) {
      echo '
      <tr class="tableRow">
        
      <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
        '.$buku['id_denda'].'
      </td>
      <td class="p-4 text-sm max-w-[40ch] font-normal text-gray-500 break-all dark:text-gray-400">
        '.$buku['id_peminjaman'].'
      </td>
      <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
        
      </td>
      <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
        '.$buku['keterangan'].'
      </td>
      <td class="p-4 relative z-50">
      <form action="update.php" method="POST">
        <input class="hidden" name="no_induk" value="'.$buku['no_induk'].'">
        <button type="submit" class=" rounded-lg p-2 shadow-inner shadow-black bg-blue-100 dark:bg-slate-50">
          <img src="../../public/images/edit.svg" class="w-5" alt="">
        </button>
      </form>
      </td>
    </tr>
    ';
    }
    
    
    
    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                
          </div>
      </div>
      <div class="p-4 mt-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-blue-950 max-h-[80vh] overflow-y-scroll">
        <!-- Card header -->
        <div class="grid text-lg dark:text-white justify-between text-gray-950 grid-flow-col">
          <h1 class="text-3xl font-bold">Daftar Pengembalian Buku</h1>
          <div class="w-full flex justify-between p-2 bg-slate-100 shadow-inner dark:bg-gray-800 rounded-lg">
            <div class="grid">
                <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400">Eksemplar</h3>
                <span class="text-5xl font-bold leading-none text-gray-900 dark:text-white"></span>
            </div>
              <img src="../../public/images/eksemplr.svg" class="w-12" alt="">
          </div>
        </div>
        <!-- Table -->
        <div class="flex flex-col mt-6">
          <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-600">
                  <thead class="bg-gray-50 dark:bg-gray-700 font-extrabold">
                    <tr>
                      <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        No
                      </th>
                      <th scope="col" class="p-4 max-w-prose text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        ID Siswa
                      </th>
                      <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        Jumlah Denda
                      </th>
                      <th scope="col" class="ps-2 pe-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
                        Keterangan
                      </th>
                      
                      <th scope="col" class="p-4 w-fit">
                        
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white dark:bg-gray-800" id="tableBody">
<?php
$query = "SELECT * FROM peminjaman_buku";
$result = mysqli_query($conn, $query); 
foreach ($result as $buku) {
  echo '
  <tr class="tableRow">
    
  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
    '.$buku['no_induk'].'
  </td>
  <td class="p-4 text-sm max-w-[40ch] font-normal text-gray-500 break-all dark:text-gray-400">
    '.$buku['id_siswa'].'
  </td>
  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
    
  </td>
  <td class="px-2 text-sm font-normal break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
    '.$buku['tgl_peminjaman'].'
  </td>
  <td class="p-4 relative z-50">
  <form method="POST">
    <input class="hidden" name="id_denda" value="'.$buku['no_induk'].'">
    <button type="submit" name="" class="rounded-lg p-2 shadow-inner shadow-black bg-blue-100 dark:bg-slate-50">
      <img src="../../public/images/edit.svg" class="w-5" alt="">
    </button>
  </form>
  </td>
</tr>
';
}



?>
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
      
</body>
</html>