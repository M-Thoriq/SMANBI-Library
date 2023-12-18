<?php
require_once '../../includes/koneksi.php';
if (isset($_GET['keyword'])){
$keyword = $_GET['keyword'];}
else {
  $keyword = '';
}
$records_per_page = 10;
$result = mysqli_query($conn, "SELECT COUNT(*) FROM buku WHERE judul_buku LIKE '%$keyword%'");
$total_records = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_records / $records_per_page);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
  $current_page = (int) $_GET['page'];
} else {
  $current_page = 1;
}
$start_from = ($current_page - 1) * $records_per_page;

$query = "SELECT b.no_induk, b.eksemplar, b.judul_buku as judul, pb.nama_pengarang as pengarang, pn.nama_penerbit as penerbit, b.isbn as ISBN FROM buku b JOIN pengarang_buku pb ON pb.id=b.id_pengarang JOIN penerbit_buku pn ON b.id_penerbit = pn.id_penerbit WHERE b.judul_buku LIKE '%$keyword%' ORDER BY b.no_induk ASC LIMIT $start_from, $records_per_page";
$result = mysqli_query($conn, $query); 

echo '
<table class="w-full divide-y divide-gray-200 dark:divide-gray-600">
<thead class="bg-gray-50 dark:bg-gray-700 font-extrabold">
<tr>
    <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
    No
    </th>
    <th scope="col" class="p-4 max-w-prose text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
    Judul
    </th>
    <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
    Pengarang
    </th>
    <th scope="col" class="ps-2 pe-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
    Penerbit
    </th>
    <th scope="col" class="p-2 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
    ISBN
    </th>
    <th scope="col" class="p-4 text-xs tracking-wider text-left text-gray-500 uppercase dark:text-white">
    EXM
    </th>
    <th scope="col" class="p-4 w-fit">
    
    </th>
</tr>

</thead>
<tbody class="bg-white dark:bg-gray-800">
                  
';

foreach ($result as $buku) {
  echo '
  <tr class="tableRow">
    
  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
    '.$buku['no_induk'].'
  </td>
  <td class="p-4 text-sm max-w-[40ch] font-normal text-gray-500 break-all dark:text-gray-400">
    <a href="detail.php?no_induk='.$buku['no_induk'].'">'.$buku['judul'].'</a>
  </td>
  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
    '.$buku['pengarang'].'
  </td>
  <td class="px-2 text-sm font-normal break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
    '.$buku['penerbit'].'
  </td>
  <td class="px-2 text-sm font-normal break-all text-gray-500 whitespace-wrap max-w-prose dark:text-gray-400">
    '.$buku['ISBN'].'
  </td>
  <td class="p-4 whitespace-nowrap">
    <span
      class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">'.$buku['eksemplar'].'</span>
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


echo "
</tbody>
                </table>
<div>
                    
<div class='flex rounded-lg w-fit mx-auto mt-4 overflow-hidden justify-center bg-gray-300 text-slate-900 dark:bg-slate-900 dark:text-gray-50'>";

$prev_page = $current_page - 1;
$next_page = $current_page + 1;
if ($current_page != 1){
  echo "<a href='search.php?keyword=$keyword&page=$prev_page' class='px-3 py-2'>Prev</a>";
}
// Display the first 3 pages
for ($i = 1; $i <= min(3, $total_pages); $i++) {
  if ($i == $current_page) {
    echo "<a href='search.php?keyword=$keyword&page=$i' class='px-3 py-2 dark:bg-blue-500 bg-slate-800 text-white'>$i</a>";
  } else {
    echo "<a href='search.php?keyword=$keyword&page=$i' class='px-3 py-2'>$i</a>";
  }
}

// Display the current page if it's not in the first 3 pages
if ($current_page > 3 && $current_page <= $total_pages - 3) {
  echo "<a href='search.php?keyword=$keyword&page=$current_page' class='px-3 py-2 bg-blue-500 text-white'>$current_page</a>";
}

// Display the last 3 pages
for ($i = max(4, $total_pages - 2); $i <= $total_pages; $i++) {
  if ($i == $current_page) {
    echo "<a href='search.php?keyword=$keyword&page=$i' class='px-3 py-2 bg-blue-500 text-white'>$i</a>";
  } else {
    echo "<a href='search.php?keyword=$keyword&page=$i' class='px-3 py-2'>$i</a>";
  }
}
if ($current_page != $total_pages){
  echo "<a href='search.php?keyword=$keyword&page=$next_page' class='px-3 py-2'>Next</a>";
}

echo "</div>
                    </div>";
?>