<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>
    <link rel="stylesheet" href="../public/css/output.css">
    <script src="../public/js/jquery-3.7.1.min.js"></script>
    <script src="../public/js/searchbuku.js"></script>
</head>
<body>
<?php
require_once '../includes/koneksi.php';
$keyword = "";
if(!isset($_POST["search"])) {
    $keyword = "";
} else {
    $keyword = $_POST["search"];
}
echo '<h1 id="keywordInit" class="hidden">'.$keyword.'</h1>';
?>

    <section class="bg-default h-screen w-screen flex flex-col px-12 py-8">
        <div class="flex">
            <div class="w-16 h-16 px-3 py-2 bg-slate-50 rounded-full">
                <a href="../index.html"><img src="../public/images/logo.png" class="w-20 m-auto" alt=""></a>
            </div>
            <div class="relative w-full px-4">
                <input type="search" value="<?=$keyword ?>" id="book_search" name="search" class="searchBar shadow-md px-7 py-4 mx-5 " placeholder="Cari judul buku" required>
                <button  onclick="" type="submit" class="absolute top-0 -right-1 px-8 py-6 text-sm font-medium text-white bg-blue-700 rounded-r-full border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
        <div class="flex gap-3">
            <div class="flex gap-4 rounded-2xl bg-slate-50 text-xl my-3 py-1 px-5">
                <h1 class="font-bold uppercase">Judul</h1>
                <div class="bg-gradient-to-tr from-[#003680] to-[#FF6868] rounded-2xl text-white font-extrabold ps-2 pe-20">A-Z</div>
            </div>
            <div class="flex gap-4 rounded-2xl bg-slate-50 text-xl my-3 py-1 px-5">
                <h1 class="font-bold uppercase">Author  </h1>
                <div class="bg-gradient-to-tr from-[#003680] to-[#FF6868] rounded-2xl text-white font-extrabold ps-2 pe-20">A-Z</div>
            </div>
        </div>
        <div class="bg-slate-50 h-full bg-opacity-40 rounded-lg px-5 py-4 grid gap-3 overflow-y-scroll" id="body">
            <!-- <div class="bg-slate-100 w-full px-7 py-5 rounded-xl flex">
                <div class="rounded-lg bg-slate-400 max-w-sm overflow-hidden">
                    <img src="../public/images/bg.png" class="h-full object-cover w-36" alt="">
                </div>
                <div class="flex flex-col py-2 px-4">
                    <h1 class="text-4xl font-bold">Judul Buku</h1>
                    <h1 class="text-2xl">Author</h1>
                    <h1 class="text-2xl">Tahun Terbit</h1>
                    <h1 class="text-2xl">Jumlah Halaman</h1>
                    <h1 class="text-2xl">Jumlah Buku</h1>
                    <h1 class="text-2xl">Deskripsi</h1>
                </div>
            </div>
            <div class="bg-slate-100 w-full px-7 py-5 rounded-xl flex">
                <div class="rounded-lg bg-slate-400 max-w-sm overflow-hidden">
                    <img src="../public/images/bg.png" class="h-full object-cover w-36" alt="">
                </div>
                <div class="flex flex-col py-2 px-4">
                    <h1 class="text-4xl font-bold">Judul Buku</h1>
                    <h1 class="text-2xl">Author</h1>
                    <h1 class="text-2xl">Tahun Terbit</h1>
                    <h1 class="text-2xl">Jumlah Halaman</h1>
                    <h1 class="text-2xl">Jumlah Buku</h1>
                    <h1 class="text-2xl">Deskripsi</h1>
                </div>
            </div>
            <div class="bg-slate-100 w-full px-7 py-5 rounded-xl flex">
                <div class="rounded-lg bg-slate-400 max-w-sm overflow-hidden">
                    <img src="../public/images/bg.png" class="h-full object-cover w-36" alt="">
                </div>
                <div class="flex flex-col py-2 px-4">
                    <h1 class="text-4xl font-bold">Judul Buku</h1>
                    <h1 class="text-2xl">Author</h1>
                    <h1 class="text-2xl">Tahun Terbit</h1>
                    <h1 class="text-2xl">Jumlah Halaman</h1>
                    <h1 class="text-2xl">Jumlah Buku</h1>
                    <h1 class="text-2xl">Deskripsi</h1>
                </div>
            </div> -->
        </div>
    </section>

    <script>
        function katalog() {
            //Make a new document via document.write with a div element with author name and book title
            const katalogBuku = "\
                <div>Author Name</div><div>Book Title</div>\
                ";
            document.write(katalogBuku);
            
            setTimeout(function() {
                //Automatically keyboard Ctrl + P to print the document
                window.print();
            }, 2500);
            setTimeout(() => {
                //Refresh page
                window.location.reload();
            }, 10000);
        }
    </script>
    
    
</body>
</html>