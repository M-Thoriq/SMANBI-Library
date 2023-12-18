<?php
require_once('../../includes/koneksi.php');
$query = "SELECT id, nama, waktu, log_aktivitas as aktifitas, keterangan FROM v_log_pengunjung ORDER BY waktu DESC";
$hasil = mysqli_query($conn, $query);
// var_dump($hasil);
foreach($hasil as $data) {
    echo '
<tr class="tableRow">
    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
        '.$data['id'].'
    </td>
    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
        '.$data['nama'].'
    </td>
    <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
        '.$data['waktu'].'
    </td>
    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
        '.$data['aktifitas'].'
    </td>
    <td class="p-4 whitespace-nowrap dark:text-white text-gray-950 font-semibold">
        '.$data['keterangan'].'
    </td>
</tr> ';
}