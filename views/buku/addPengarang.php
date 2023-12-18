<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>
    <link rel="stylesheet" href="../../public/css/output.css">
    <script src="../../public/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../../public/css/jquery-ui.css">
</head>
<body class="bg-default bg-no-repeat h-screen bg-cover">
    <div class="flex flex-col py-6 px-8 place-content-center place-items-center ">
        <div class="grid gap-2">
            <h1 class="text-6xl text-white font-bold">Insert</h1>
            <span class="w-1/4 py-0.5 rounded-full bg-slate-50"></span>
        </div>
        <div class="w-full my-auto py-6 flex gap-8 max-w-sm bg-gray-900 bg-opacity-70 rounded-md shadow mt-10">
            <form method="POST">
                <div class="w-full ps-10 pe-10 mx-auto" id="formBuku1">
                    <label for="jenis" class="text-white">Insert untuk</label>
                    <select name="jenis" id="jenis" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2">
                        <option value="1">Pengarang</option>
                        <option value="2">Penerbit</option>
                    </select>
                    <label for="penerbit" class="text-white">Nama</label>
                    <input type="text" name="penerbit" id="penerbit" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" required>
                    <div class="flex gap-2 mt-5">
                        <a href="index.php" class="w-full"><p class="bg-red-600 w-full rounded-lg px-4 py-2 text-center text-white" id="prevForm">Cancel</p></a>
                        <span class="w-full bg-green-500 rounded-lg"><button class="bg-green-500 w-full rounded-lg px-4 py-2 text-white" name="btnInsert">Submit</button></span>
                    </div>
                </div>
            </form>
            <?php
            require_once '../../includes/koneksi.php';

            if (isset($_POST['btnInsert'])) {
                $jenis = $_POST['jenis'];
                $nama = $_POST['penerbit'];
                if ($jenis == 1) {
                    $sql = mysqli_query($conn, "INSERT INTO pengarang_buku (id_pengarang, nama_pengarang) VALUES (SUBSTR('$nama', 1, 3), '$nama')");
                } else {
                    $sql = mysqli_query($conn, "INSERT INTO penerbit_buku(nama_penerbit) VALUES ('$nama')");
                }
                
                if (!$sql) {
                    die("Query gagal" . mysqli_error($conn));
                } else {
                    echo '<script type="text/javascript">alert("Data berhasil ditambahkan");</script>';
                    header("Location: index.php");
                }
            }
            ?>
        </div> 
    </div>
    
</body>
</html>