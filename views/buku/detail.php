<?php
require_once "../../includes/koneksi.php";
if($_GET['no_induk'] == "") {
    header("Location: ../../views/index.php");
}
$no_induk = $_GET['no_induk'];
// echo''.$no_induk.'';
$query = mysqli_query($conn, "SELECT * FROM detail_buku WHERE ID = '$no_induk'");
foreach($query as $data){}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/output.css">
</head>
<body class="h-screen w-full bg-default relative z-10">
    <div class="h-1/4 w-full flex justify-center place-items-center">
        <a href="../"><div class="my-auto h-fit w-fit bg-slate-50 border-r rounded-l-full px-6 py-4">
            <span class="font-bold text-blue-900">&lt;</span>
        </div></a>
        <div class="my-auto h-fit flex bg-slate-50 rounded-r-full px-6 py-4 gap-4">
            <img src="../../public/images/icon1.svg" class="w-6 h-6" alt="">
            <p class="max-w-md overflow-x-hidden whitespace-nowrap overflow-hidden text-ellipsis text-blue-600 font-semibold font-jb">
                <span>../buku/detail/<?=$data['judul'] ?></span>
            </p>
        </div>
    </div>
    <section class="bg-slate-50 rounded-t-[40px] top-1/4 z-50 absolute w-full min-h-screen max-h-fit overflow-hidden">
        <div class="h-full w-full relative">
            <div class="absolute -top-20 rounded-full left-1/2 -translate-x-1/2 bg-blue-800 w-36 shadow-inner shadow-black h-36">
                <img src="../../public/images/buku.svg" class="scale-[35%] mt-8" alt="">
            </div>
        </div>
        <div class="grid mt-12 p-8">
            <div class="shadow-inner w-full min-h-full rounded-lg py-5 px-4">
                <h1  class="text-center text-4xl font-semibold uppercase font-jb underline"><?=$data['judul'] ?></h1>
            </div>
            <div class="flex text-white rounded-lg w-full gap-0 text-2xl mt-8">
                <div class="w-2/3 min-h-full rounded-xl rounded-tr-none bg-gradient-to-r to-sky-400 from-blue-700 py-7 px-5 selection:bg-white selection:text-blue-900">
                    <div class="grid grid-cols-2 gap-4">
                            <p class="font-semibold uppercase font-jb">Judul</p><p class="font-semibold font-jb">: <?=$data['judul'] ?></p>
                            <p class="font-semibold uppercase font-jb">Pengarang</p><p class="font-semibold font-jb">: <?=$data['pengarang'] ?></p>
                            <p class="font-semibold uppercase font-jb">Kode Author</p><p class="font-semibold font-jb">: <?=$data['KODE_PENGARANG'] ?></p>
                            <p class="font-semibold uppercase font-jb">Penerbit</p><p class="font-semibold font-jb">: <?=$data['penerbit'] ?></p>
                            <p class="font-semibold uppercase font-jb">ISBN</p><p class="font-semibold font-jb">: <?=$data['isbn'] ?></p>        
                            <p class="font-semibold uppercase font-jb">Kategori</p><p class="font-semibold font-jb rounded-xl px-3 py-1 bg-white text-blue-950 w-fit before:content-['#']"><?=$data['kategori'] ?></p>
                    </div>
                </div>
                <div class="w-1/3 min-h-full relative bg-sky-400 rounded-tl-none rounded-xl py-5 px-4">
                    <div class="grid">
                        <div class="h-full w-full">
                            
                        </div>
                        <div class="h-full absolute bg-slate-50 rounded-tl-xl gap-2 px-2 py-3 flex right-0 top-[70%] w-full">
                            <button class="uppercase shadow-lg h-fit  p-6 bg-gradient-to-tr from-blue-700 to-sky-500 text-white rounded-xl w-full" id="modalPinjam">Pinjam</button>
                            <button class="uppercase shadow-lg h-fit bg-gradient-to-tr from-red-400 to-red-700 -me-2 text-white p-6 rounded-xl w-1/2" id="modalCetak">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="h-screen w-screen hidden place-content-center place-items-center content-center z-[9999] fixed top-0 left-0 bg-black bg-opacity-80" id="cetak">
        <img id="btnCloseCetak" src="../../public/images/cross.svg" class="bg-slate-50 p-2 w-10 h-10 rounded-t-lg text-black" alt="">
        <div class="w-fit h-fit m-auto grid grid-cols-2 gap-2 bg-slate-50 rounded-xl p-7">
            <p class="text-center">Cetak Katalog</p><p class="text-center">Cetak No Punggung</p>
            <button class="bg-blue-500 px-3 py-2 rounded-lg" onclick="katalog()">Cetak</button>
            <button class="bg-yellow-300 px-3 py-2 rounded-lg" onclick="punggung()">Cetak</button>
        </div>
    </div>
    <div class="h-screen w-screen hidden place-content-center place-items-center content-center z-[9999] fixed top-0 left-0 bg-black bg-opacity-80" id="modal">
        <div class="w-fit h-fit m-auto grid bg-slate-50 rounded-xl p-7">
            <h1 class="text-2xl text-center font-bold">Konfirmasi Peminjaman Buku</h1>
            <form action="pinjamBk.php" method="POST">
            <span class="mx-auto w-1/4 py-0.5 rounded-full bg-black"></span>
            <input type="text" class="hidden" name="no_induk" value="<?=$data['ID']?>">
            <input type="text" class="inputForm" value="<?=$data['judul'] ?>" disabled>
            <label for="nama">Nama Peminjam</label>
            <input type="text" class="inputForm" name="namaPeminjam" id="nama" placeholder="Masukkan nama peminjam" required>
            <!-- <label for="namaPetugas">Nama Petugas</label>
            <input type="text" class="inputForm" name="namaPetugas" id="namaPetugas" placeholder="Masukkan nama petugas" required> -->
            
            <div class="grid grid-cols-2 px-2 gap-2 mt-2">
                <a class="rounded-2xl bg-slate-600 text-white px-3 py-3 text-center" id="btnBatal">Batalkan</a>
                <button class="rounded-2xl font-semibold bg-green-400 px-3 py-3" id="btnSubmit">Submit</button>
            </div>
            </form>
        </div>
    </div>
<?php 
$katalog = mysqli_query($conn, "SELECT * FROM katalog_judul WHERE ID = '$no_induk'");
foreach($katalog as $buku){}
echo '
    <script>
        function katalog() {
            var section = document.createElement(\'section\');

            // Set the innerHTML of the section to your HTML string
            section.innerHTML = `
            <html>
            <head>
                <link rel="stylesheet" href="../../public/css/output.css">
            </head>
            <body class="w-1/3 border invisible">
                <section class="visible absolute top-0 left-0 text-lg">
                    <h1 class="font-bold ms-2">'.$buku['ID'].'</h1>
                    <div class="grid grid-cols-2 w-1/4 gap-10">
                        <h1 class="font-bold ms-2">'.$buku['KODE_PENGARANG'].'</h1>
                        <h1 class="whitespace-nowrap">Neni, Jahar</h1>
                    </div>
                    <div class="grid grid-cols-2 w-1/4 gap-10">
                        <h1 class="font-bold ms-2">'.$buku['inisial'].'</h1>
                        <h1 class="whitespace-nowrap">'.$buku['judul'].'<br>/'.$buku['pengarang'].',<span>'.$buku['penerbit'].', '.$buku['tahun'].'</span></h1>
                    </div>
                    <div class="grid grid-cols-2 w-1/4 gap-10">
                        <h1 class="font-bold"></h1>
                        <h1 class="whitespace-nowrap">'.$buku['ukuran'].'</span></h1>
                    </div>
                    <div class="grid grid-cols-2 w-1/4 gap-10">
                        <h1 class="font-bold"></h1>
                        <h1 class="whitespace-nowrap mt-7">ISBN : '.$buku['isbn'].'</span></h1>
                    </div>
                    <div class="grid grid-cols-2 w-1/4 gap-10">
                        <h1 class="font-bold"></h1>
                        <h1 class="whitespace-nowrap mt-7">I. Judul</span></h1>
                    </div>
                </section>
            </body>
            </html>
            `;

            document.write(section.innerHTML);
            
            setTimeout(function() {
                //Automatically keyboard Ctrl + P to print the document
                window.print();
            }, 2500);
            setTimeout(() => {
                //Refresh page
                window.location.reload();
            }, 10000);
        }
    </script>';
?>

<?php 
$katalog = mysqli_query($conn, "SELECT * FROM katalog_judul WHERE ID = '$no_induk'");
foreach($katalog as $buku){}
echo '
    <script>
        function punggung() {
            var section = document.createElement(\'section\');

            // Set the innerHTML of the section to your HTML string
            section.innerHTML = `
            <html>
            <head>
                <link rel="stylesheet" href="../../public/css/output.css">
            </head>
            <body class="w-1/3 border invisible">
                <section class="visible absolute top-0 mx-auto left-0 text-lg">
                        <h1 class="font-bold ms-2">'.$buku['ID'].'</h1>
                    
                        <h1 class="font-bold ms-2">'.$buku['KODE_PENGARANG'].'</h1>
                        
                        <h1 class="font-bold ms-2">'.$buku['inisial'].'</h1>
                    
                        <h1 class="font-bold">SMA Negeri Satu Binjai</h1>
                    </div>
                </section>
            </body>
            </html>
            `;

            document.write(section.innerHTML);
            
            setTimeout(function() {
                //Automatically keyboard Ctrl + P to print the document
                window.print();
            }, 2500);
            setTimeout(() => {
                //Refresh page
                window.location.reload();
            }, 10000);
        }
    </script>';
?>

<script>
    const modalCetak = document.getElementById('modalCetak');
    const cetak = document.getElementById('cetak');
    const btnCloseCetak = document.getElementById('btnCloseCetak');

    modalCetak.addEventListener('click', () => {
        cetak.classList.toggle('hidden');
        cetak.classList.toggle('grid');
    });

    btnCloseCetak.addEventListener('click', () => {
        cetak.classList.toggle('hidden');
        cetak.classList.toggle('grid');
    });
</script>
<script>
    const modal = document.getElementById('modal');
    const modalPinjam = document.getElementById('modalPinjam');
    const btnBatal = document.getElementById('btnBatal');
    const btnSubmit = document.getElementById('btnSubmit');

    modalPinjam.addEventListener('click', () => {
        modal.classList.toggle('hidden');
        modal.classList.toggle('grid');
    });
    btnBatal.addEventListener('click', () => {
        modal.classList.toggle('hidden');
        modal.classList.toggle('grid');
    });
    btnSubmit.addEventListener('click', () => {
        modal.classList.toggle('hidden');
        modal.classList.toggle('grid');
    });
</script>

</body>
</html>