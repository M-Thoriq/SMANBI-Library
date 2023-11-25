<?php
require_once '../includes/koneksi.php';
$keyword = $_GET["keyword"];
if(!isset($_GET["keyword"])) {
    $keyword = "";

} else {
    $keyword = $_GET["keyword"];
    $query = "SELECT b.no_induk, b.judul_buku as judul, pb.nama_pengarang as pengarang, pn.nama_penerbit as penerbit, b.isbn as ISBN FROM buku b JOIN pengarang_buku pb ON pb.id=b.id_pengarang JOIN penerbit_buku pn ON b.id_penerbit = pn.id_penerbit WHERE judul_buku LIKE '%$keyword%' OR nama_pengarang LIKE '%$keyword%' ORDER BY no_induk ASC";
}
sleep(2);
$result = mysqli_query($conn, $query); 
if(mysqli_num_rows($result) > 0) {
  foreach ($result as $buku) {
    echo '
    <div class="bg-slate-100 w-full  px-7 py-5 rounded-xl flex justify-between">
            <div class="flex">
                <div class="rounded-lg bg-slate-400 max-w-sm overflow-hidden">
                    <img src="../public/images/bg.png" class="h-40 object-cover w-36" alt="">
                </div>
                <div class="flex flex-col px-4">
                    <h1 class="text-2xl max-w-prose font-semibold text-red-950">'.$buku["judul"].'</h1>
                    <h1 class="text-2xl my-1">'.$buku["pengarang"].'</h1>
                    <h1 class="text-2xl my-1">'.$buku["penerbit"].'</h1>
                    <h1 class="text-2xl my-1">'.$buku["penerbit"].'</h1>
                    <h1 class="text-2xl my-1 rounded-full border-green-500 border text-center">'.$buku["ISBN"].'</h1>
                </div>
            </div>
            <a href="buku/detail.php?no_induk='.$buku["no_induk"].'" class="shadow-md text-4xl grid rounded-lg px-3 py-3 place-items-center text-center my-auto h-fit w-fit bg-blue-900 text-white">
                <img src="../public/images/buku.svg" class="w-20 h-20 m-auto" alt="">
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
