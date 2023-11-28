<?php
require_once "../../includes/koneksi.php";
if($_POST['no_induk'] == "") {
    header("Location: ../../views/buku/index.php");
}
$no_induk = $_POST['no_induk'];
echo''.$no_induk.'';
$query = mysqli_query($conn, "SELECT b.*, b.id_sumber as id_sumber, sb.asal_sumber as sumber, b.no_induk, b.eksemplar as eksemplar, b.judul_buku as judul, pb.nama_pengarang as pengarang, pn.nama_penerbit as penerbit, b.isbn as ISBN, kb.kategori as kategori, b.id_kelas as kelas_id FROM buku b JOIN pengarang_buku pb ON pb.id=b.id_pengarang JOIN penerbit_buku pn ON b.id_penerbit = pn.id_penerbit JOIN sumber_buku sb ON sb.id_sumber = b.id_sumber JOIN kelas_buku kb ON b.id_kelas = kb.id_kelas  WHERE no_induk='$no_induk'");
foreach($query as $data){}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>
    <link rel="stylesheet" href="../../public/css/output.css">
    
</head>
<body class="bg-default bg-no-repeat h-screen bg-cover">

    <div class="flex flex-col py-6 px-8 place-content-center place-items-center ">
        <div class="grid gap-2">
            <h1 class="text-6xl text-white font-bold">Update</h1>
            <span class="w-1/4 py-0.5 rounded-full bg-slate-50"></span>
        </div>
        <div class="w-full my-auto py-6 flex gap-8 max-w-lg bg-gray-900 bg-opacity-70 rounded-md shadow mt-10">
            <!-- <div class="w-1/5 bg-slate-600 items-start">a</div> -->
            <form method="POST" novalidate="" action="proses.php">
                <input type="hidden" name="no_induk" class="hidden" value="<?=$data['no_induk'] ?>">
                <div class="w-full ps-10 pe-10" id="formBuku1">
                    <div class="grid gap-2">
                        <label for="judul" class="text-white">Judul</label>
                        <input type="text" name="judul" id="judul" value="<?=$data['judul'] ?>" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" required>
                        <label for="pengarang" class="text-white">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" value="<?=$data['pengarang'] ?>" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2">
                        <label for="penerbit" class="text-white">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" value="<?=$data['penerbit'] ?>" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" required>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-1/3">
                            <label for="isbn" class="text-white">ISBN</label>
                            <input type="text" name="isbn" id="isbn" value="<?=$data['ISBN'] ?>" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" >
                        </div>
                        <div class="w-1/3">
                            <label for="edisi" class="text-white">Edisi</label>
                            <input type="text" name="edisi" id="edisi" value="<?=$data['edisi'] ?>" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" required>
                        </div>
                        <div class="w-1/3">
                            <label for="tahun" class="text-white">Tahun Terbit</label>
                            <input type="number" name="tahun" id="tahun" value="<?=$data['tahun_terbit'] ?>" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" >
                        </div>
                    </div>
                    <div class="flex gap-2 mt-5">
                        <a href="./" class="w-full"><p class="bg-red-600 w-full rounded-lg px-4 py-2 text-center text-white">Cancel</p></a>
                        <span class="w-full bg-green-500 rounded-lg px-4 py-2 text-white text-center cursor-pointer" id="nextForm">Next</span>
                    </div>
                </div>
                <div class="w-full ps-10 pe-10 hidden" id="formBuku2">
                    
                    <label for="kategori" class="labelForm mt-5">Kategori</label>
                    <select name="kategori" id="aktSiswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="<?=$data['kelas_id'] ?>" class="hidden"><?php echo "<p>".$data['kategori']."</p>"; ?></option>
                        <option value="1">Buku Siswa (TextBook)</option>
                        <option value="2">Buku Guru (TextBook)</option>
                        <option value="3">PANDIK (Non-TextBook)</option>
                        <option value="4">Pengayaan (Non-TextBook)</option>
                        <option value="5">Referensi (Non-TextBook)</option>
                    </select>
                
                    <div class="flex gap-2">
                        <div class="w-1/2">
                            <label for="eksemplar" class="text-white">Eksemplar</label>
                            <input type="number" value="<?=$data['eksemplar']?>" name="eksemplar" id="eksemplar" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" required>
                        </div>
                        <div class="w-1/2">
                            <label for="sumber" class="text-white">Sumber</label>
                            <select type="text" name="sumber" id="sumber" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2">
                                <option selected class="hidden" value="<?=$data['id_sumber']?>"><?=$data['sumber']?></option>
                                <option value="2">Donasi</option> 
                                <option value="1">Dana Bos</option>
                                <option value="3">-</option>
                            </select>
                        </div>
                        
                    </div>
                    <label for="" class="text-white">Ukuran</label>
                    <div class="grid grid-cols-2 gap-2 w-full mt-2">
                        <div class="flex items-center ps-4 border bg-slate-50 dark:bg-gray-700 border-gray-200 rounded-lg dark:border-gray-700">
                            <input checked id="radio1" type="radio" value="A4" name="ukuran" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="radio1" class="w-full py-2 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">A4</label>
                        </div>
                        <div class="flex items-center ps-4 border bg-slate-50 dark:bg-gray-700 border-gray-200 rounded-lg dark:border-gray-700">
                            <input id="radio2" type="radio" value="B5" name="ukuran" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="radio2" class="w-full py-2 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">B5</label>
                        </div>
                    </div>

                    <div class="flex gap-2 mt-5">
                        <a class="w-full"><p class="bg-red-600 w-full rounded-lg px-4 py-2 text-center text-white" id="prevForm">Prev</p></a>
                        <span class="w-full bg-green-500 rounded-lg"><a type="submit" class="bg-green-500 w-full rounded-lg px-4 py-2 text-white text-center" id="btnModal">Update</a></span>
                    </div>
                </div>
                <div class="h-screen w-screen hidden place-content-center place-items-center content-center fixed top-0 left-0 bg-black bg-opacity-80" id="modal">
                    <div class="w-fit h-fit m-auto grid bg-slate-50 rounded-xl p-7">
                        <h1 class="text-2xl text-center font-bold">Konfirmasi Pembaharuan Data</h1>
                        <span class="mx-auto w-1/4 py-0.5 rounded-full bg-black"></span>
                        <p class="max-w-sm mt-3 text-lg font-normal tracking-tight">Apakah anda yakin untuk melanjutkan? Pastikan data yang akan diperbaharui benar dan tidak ada kekeliruan!</p>
                        <div class="grid grid-cols-2 px-2 gap-2 mt-2">
                            <a class="rounded-2xl bg-slate-600 text-white px-3 py-3 text-center" id="btnBatal">Tidak, Batalkan</a>
                            <button class="rounded-2xl font-semibold bg-green-400 px-3 py-3" id="btnSubmit">Ya, Saya Yakin</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
    <script>
        const btnModal = document.getElementById('btnModal');
        const modal = document.getElementById('modal');
        const btnBatal = document.getElementById('btnBatal');
        const btnSubmit = document.getElementById('btnSubmit');

        btnModal.addEventListener('click', () => {
            modal.classList.toggle('hidden');
            modal.classList.toggle('grid');
        });

        btnBatal.addEventListener('click', () => {
            modal.classList.toggle('hidden');
        });

        btnSubmit.addEventListener('click', () => {
            modal.classList.toggle('hidden');
        });
    </script>
    <script>
        const nextForm = document.getElementById('nextForm');
        const prevForm = document.getElementById('prevForm');
        const formBuku1 = document.getElementById('formBuku1');
        const formBuku2 = document.getElementById('formBuku2');

        nextForm.addEventListener('click', () => {
            formBuku1.classList.add('hidden');
            formBuku2.classList.remove('hidden');
        });

        prevForm.addEventListener('click', () => {
            formBuku1.classList.remove('hidden');
            formBuku2.classList.add('hidden');
        });
    </script>
</body>
</html>