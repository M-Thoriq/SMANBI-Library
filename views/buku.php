<?php
require_once '../includes/koneksi.php';
$keyword = $_GET["keyword"];
if(!isset($_GET["keyword"])) {
    $keyword = "";

} else {
    $keyword = $_GET["keyword"];
    $query = "SELECT b.no_induk, b.judul_buku as judul, pb.nama_pengarang as pengarang, pn.nama_penerbit as penerbit, b.isbn as ISBN, k.kategori AS kategori FROM buku b JOIN pengarang_buku pb ON pb.id=b.id_pengarang JOIN penerbit_buku pn ON b.id_penerbit = pn.id_penerbit JOIN kelas_buku k ON k.id_kelas = b.id_kelas WHERE judul_buku LIKE '%$keyword%' OR nama_pengarang LIKE '%$keyword%' ORDER BY no_induk ASC";
}
sleep(2);
$result = mysqli_query($conn, $query); 
if(mysqli_num_rows($result) > 0) {
  foreach ($result as $buku) {
    echo '
    <div class="bg-slate-100 dark:bg-slate-600 dark:text-white w-full min-h-full relative px-7 py-5 rounded-xl flex overflow-x-hidden justify-between z-10">
        <div class="flex">
            <div class="rounded-lg bg-slate-400 max-w-sm overflow-hidden relative border-0">
                <img src="" class="min-h-48 border-0 object-cover min-w-36 " alt="">
                <div class="absolute h-full w-full top-0 bg-blue-950 bg-opacity-70 grid place-items-center place-content-center">
                    <h1 class="text-xl text-white font-semibold m-auto text-center">Tidak ada foto</h1>                      
                </div>
            </div>
            <div class="flex flex-col px-4 py-3">
                <h1 class="text-base max-w-prose font-semibold text-slate-950 dark:text-white">'.$buku["judul"].'</h1>
                <div class="grid w-fit text-sm grid-cols-4 gap-1">
                    <span class="font-semibold text-gray-800 dark:text-gray-300 w-fit">Pengarang</span><h1 class=" font-normal dark:text-gray-200 col-span-3">'.$buku["pengarang"].'</h1>
                    <span class="font-semibold text-gray-800 dark:text-gray-300 w-fit">Penerbit</span><h1 class=" font-normal dark:text-gray-200 col-span-3">'.$buku["penerbit"].'</h1>
                    <span class="font-semibold text-gray-800 dark:text-gray-300 w-fit">ISBN</span><h1 class=" font-normal dark:text-gray-200 col-span-3">'.$buku["ISBN"].'</h1>
                </div>
                <div class="flex">
                    <h1 class="text-lg my-1 rounded-l-md bg-blue-950 dark:bg-blue-800 px-3 py-1 text-white place-items-end">Kategori</h1> <span class="rounded-r-md bg-blue-900 px-3 py-1 my-auto text-white text-xl">'.$buku['kategori'].'</span>
                </div>
            </div>
        </div>
        <a href="buku/detail.php?no_induk='.$buku["no_induk"].'" class="shadow-inner shadow-black text-4xl grid rounded-full absolute top-1/2 -translate-y-1/2 -right-12 ps-1 pe-4 py-3 place-items-center text-center my-auto h-fit w-fit bg-blue-900 text-white">
            <img src="../public/images/arrow.svg" class="w-20 h-20 m-auto " alt="">
        </a>
    </div>
  ';
  }
}
else {
  echo '
    <div class="flex place-items-center place-content-center">
      <h1 class="m-auto text-4xl text-black">'.$keyword.' tidak ditemukan</h1>
    </div>
  ';
}

?>
