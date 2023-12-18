<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>
    <link rel="stylesheet" href="../../public/css/output.css">
</head>
<body>
    <section class="bg-default h-screen w-screen">
        <div class="grid place-items-center justify-center h-full py-12">
            <div class="w-32 h-32 p-4 m-auto bg-slate-50 rounded-full">
                <img src="../../public/images/logo.png" class="w-20 m-auto" alt="">
            </div>
            <h1 class="titleLogin">Sistem Informasi Perpustakaan SMA Negeri 1 BINJAI</h1>
            <form method="POST" class="w-full">
                <div class="grid">
                    <label for="nomor" class="labelForm mt-2">Username</label>
                    <input type="text" id="nomor" class="inputForm inputNumber" name="username" placeholder="Masukkan username" required>
                    <label for="pswd" class="labelForm mt-5">Password</label>
                    <input type="password" id="pswd" class="inputForm" placeholder="Masukkan password" name="password" required>
                </div>

                <button class="btnLogin" name="btnLogin">Login</button> 
            </form>
    <?php
    require ("../../includes/koneksi.php");

    if (isset($_POST['btnLogin'])) {
        $user_login = mysqli_real_escape_string($conn, $_POST['username']);
        $pass_login = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "SELECT * FROM petugas WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $user_login, $pass_login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            die("Query gagal" . mysqli_error($conn));
        }

        if ($row = mysqli_fetch_array($result)) {
            $user = $row['username'];
            $pass = $row['password'];
            $nama = $row['nama_petugas'];
            $id = $row['id_petugas'];

            if ($user_login == $user && $pass_login == $pass) {
                session_start();
                $_SESSION['username'] = $user;
                $_SESSION['name'] = $nama;
                $_SESSION['id'] = $id;
                $_SESSION['status'] = "admin";
                header("Location: ../dashboard/");
            } else {
                echo '<script type="text/javascript">alert("Username atau password salah");</script>';
            }
        }
    }
    ?>
        </div>
    </section>

</body>
</html>