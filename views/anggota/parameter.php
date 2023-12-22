<?php 
require_once '../../includes/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM parameter");
?>
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
            <h1 class="text-6xl text-white font-bold">Konfigurasi</h1>
            <span class="w-1/4 py-0.5 rounded-full bg-slate-50"></span>
        </div>
        <div class="w-full my-auto py-6 flex gap-8 max-w-sm bg-gray-900 bg-opacity-70 rounded-md shadow mt-10">
            <form method="POST">
                <div class="w-full ps-10 pe-10 mx-auto" id="formBuku1">
                    <label for="jenis" class="text-white">Update Nilai untuk</label>
                    <select name="jenis" id="jenis" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2">
                        <option hidden>Pilih parameter</option>
                    <?php foreach($data as $row): ?>
                        <option value="<?php echo $row['nama_param'];?>"><?php echo $row['nama_param'];?></option>
                    <?php endforeach; ?>
                    </select>
                    <label for="nilai" class="text-white">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="w-full rounded-lg bg-slate-50 dark:bg-gray-700 dark:text-white px-4 py-2" required>
                    <div class="flex gap-2 mt-5">
                        <a href="../dashboard/" class="w-full"><p class="bg-red-600 w-full rounded-lg px-4 py-2 text-center text-white" id="prevForm">Cancel</p></a>
                        <span class="w-full bg-green-500 rounded-lg"><button class="bg-green-500 w-full rounded-lg px-4 py-2 text-white" name="btnInsert">Update</button></span>
                    </div>
                </div>
            </form>
            <?php
            require_once '../../includes/koneksi.php';

            if (isset($_POST['btnInsert'])) {
                $jenis = $_POST['jenis'];
                $nilai = $_POST['nilai'];
                $sql = mysqli_query($conn, "UPDATE parameter SET nilai_param = $nilai WHERE nama_param = '$jenis'");
                // var_dump($sql);
                
                if (!$sql) {
                    die("Query gagal" . mysqli_error($conn));
                } else {
                    echo '<script type="text/javascript">alert("Konfigurasi diperbaharui");</script>';
                    // header("Location: ../dashboard/");
                }
            }
            ?>
        </div> 
    </div>
    
</body>
</html>