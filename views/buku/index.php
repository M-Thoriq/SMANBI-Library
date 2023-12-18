<?php session_start();
if(empty($_SESSION['id'])){
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    header("Location: ../login/");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>

    <link rel="stylesheet" href="../../public/css/output.css">
    <script src="../../public/js/jquery-3.7.1.min.js"></script>
    <script src="../../public/js/searchListBuku.js"></script>
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
          <a href="../dashboard/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
              </svg>
              <span class="ms-3">Dashboard</span>
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
      <div class="p-1 w-fit rounded-xl flex gap-2 mb-5">
        <a href="./add.html">
        <div class="w-fit px-3 py-2 bg-slate-50 rounded-lg flex">
          <img src="../../public/images/add.svg" class="w-14" alt="">
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl m-auto">Tambah Buku</span>
        
        </div></a>
        <a href="./addPengarang.php">
        <div class="w-fit px-3 py-2 bg-slate-50 rounded-lg flex">
          <img src="../../public/images/add.svg" class="w-14" alt="">
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl m-auto">Tambah Pengarang / Penerbit</span>
        
        </div></a>
        
      </div>
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-blue-950 min-h-[80vh]">
        <!-- Card header -->
        <div class="grid text-lg text-white grid-flow-col">
          <h1 class="text-3xl font-bold">Daftar Buku</h1>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            
            <input type="search" id="book_search" name="keyword" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari judul buku" required>
            
          </div>
        </div>
        <!-- Table -->
        <div class="flex flex-col mt-6">
          <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow sm:rounded-lg" id="tableBody">
                
              </div>
            </div>
          </div>
        </div>
      <div id=""></div>
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