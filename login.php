<?php
session_start();
require 'functions.php'; // Tambahkan baris ini untuk memasukkan functions.php


$id = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
$key = isset($_COOKIE['key']) ? $_COOKIE['key'] : null;

// ambil username berdasarkan id
if ($id && $key) {
    $conn = connectDB();
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ($row && $key === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
            header("location: index.php");
            exit;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Tutup koneksi setelah digunakan
}



if (isset($_POST["Login"])) {
    $conn = connectDB(); // Tambahkan ini untuk mendapatkan koneksi ke database
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if ($result) { // Periksa apakah query berhasil dijalankan
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {

                //cek session
                $_SESSION["login"] = true;

                //remember me
                if (isset($_POST['remember'])) {
                    //buat cookie
                    
                    setcookie('id', $row['id'], time() + 604800);
                    setcookie('key', hash('sha256', $row['username']), time()+604800);
                    
                }
                


                header("Location: index.php");
                exit;
            }
        } else {
            echo "Username tidak ditemukan.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Tutup koneksi setelah digunakan
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login | Deltaa Market</title>
    <link rel="icon" href="foto/deltaa.png" type="image/png">
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: linear-gradient(to bottom, #111a25, #382f43);">
                <div class="featured-image mb-3">
                    <img src="foto/gusion.png" class="img-fluid" style="width: 600px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Deltaa Market</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Silahkan login untuk mendapatkan promo promo.</small>
            </div>

            <!---------------------- Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Login</h2>
                        <p>Silahkan masukkan akun anda.</p>
                        <form method="post" action="">
                            
                            <div class="input-group mb-3">
                                <input type="text" name="username" id="username" for="username" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" for="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                            </div>
                            <div class="input-group mb-5 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formCheck" for="remember" name="remember">
                                    <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                                </div>
                                <div class="forgot">
                                    <small><a href="https://wa.me/6287790835101">Forgot Password?</a></small>
                                </div>
                            </div>
                            <?php if (isset($error)) : ?>
                                <p style="color: red; text-align:center;">Username atau Password Salah</p>
                            <?php endif; ?>
                                <div class="row align-items-center">
                            <!-- ... Bagian right-box tetap sama ... -->
                                    <button type="submit" name="Login" class="btn btn-lg custom-login-btn w-100 fs-6">Login</button>
                            </div>
                            </form>
                        <div class="row">
                            <small>Don't have an account? <a href="registrasilogin.php">Sign Up</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
