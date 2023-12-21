<?php
// $code = $_GET['code'];
// if ($code == '') {
//     header("Location: index.html");
// }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
    <link rel="stylesheet" href="public/css/output.css">
</head>
<body >
    <section class="relative min-h-screen w-full bg-slate-50 p-12 grid content-center place-content-center place-items-center">
        <div class="absolute top-2 left-2 w-16 h-16 px-3 py-2 bg-slate-50 rounded-full">
            <a href="../index.html"><img src="../public/images/logo.png" class="w-20 m-auto" alt=""></a>
        </div>
        <h1 class="bg-default shadow-inner shadow-black p-12 rounded-md mx-auto my-auto font-jb text-4xl text-center text-white">Error :(</h1>
        
        

        <a href="views/dashboard/" class="bg-blue-900 text-white rounded-md px-4 py-2">Kembali ke halaman utama</a>
        <form method="GET">
        <button name="btnTes">Click Me!</button>
        </form> -->
        <?php
    // require_once("includes/koneksi.php");
    // function customError($errno, $errstr) {
    //     echo "<script type='text/javascript'>alert('Gagal : $errstr');</script>";
    // }
    // set_error_handler("customError");

    // if (isset($_GET['btnTes'])) {
        // $sql = "CALL InsertPeminjaman('1', '4', 'YUS')";
        // $insert = mysqli_real_query($conn, $sql);
    //     error_reporting(0);
    // }
?>
    <!-- </section>
</body>
</html> -->

<?php
function shutDownFunction() {
    $error = error_get_last();
    
     // Fatal error, E_ERROR === 1
    if ($error['type'] === E_ERROR) {
        $search = array("Uncaught mysqli_sql_exception: ", " in ", $error["file"], " on line ", $error["line"], "Uncaught ");
        $replace = array("", "", "", "", "", "");
        $msg = str_replace($search, $replace, $error["message"]);
        $posIndex = strpos($msg, ":");
        $errMsg = substr($msg, 0, $posIndex);
        echo "<script type='text/javascript'>alert('Gagal : $errMsg');</script>";
    }
}

register_shutdown_function('shutDownFunction');
error_reporting(0);

require_once("includes/koneksi.php");

$sql = "CALL InsertPeminjaman('1', '4', 'YUS')";
        $insert = mysqli_real_query($conn, $sql);

// $err = error_get_last();
// echo fand();
// $string = "Hello;World";
// $posIndex = strpos($string, ";");
// echo substr($string, 0, $posIndex);
// // echo substr("Hello;World", 0, 5);
?>
