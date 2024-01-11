<?php
require 'functions.php';
if(isset($_POST["Register"])){

    if( registrasi($_POST) > 0 ){
        echo "<script>
            alert('user baru barhasil ditambahkan!');
             </script>";
             header("Location: login.php");
             exit();
    } else {
        echo mysqli_error($conn);
        }
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
    <title>Register | Deltaa Market</title>
    <link rel="icon" href="foto/deltaa.png" type="image/png">
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: linear-gradient(to bottom, #111a25, #382f43);">
                <div class="featured-image mb-3">
                    <img src="foto/gusion.png" class="img-fluid" style="width: 600px;">
                </div>
                <p class="text-white fs-2"
                    style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Deltaa Market</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Silahkan login untuk mendapatkan
                    promo promo.</small>
            </div>

            <!---------------------- Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Register</h2>
                        <p>Silahkan daftar dan masukan data anda.</p>
                    </div>
                    <form method="post" action="">
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username " for="username"
                            class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" for="password"
                            class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" name="password2" id="password2" for="password2"
                            class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="#">Forgot Password?</a></small>
                        </div> -->
                    </div>
                        <div class="row align-items-center">
                    <!-- ... Bagian right-box tetap sama ... -->
                            <button type="submit" name="Register" class="btn btn-lg custom-login-btn w-100 fs-6">Register</button>
                    </div>
                    </form>
                    <!-- <div class="input-group mb-3">
                        <button class="btn btn-lg btn-light w-100 fs-6"><img src="foto/googl.png" style="width:20px"
                                class="me-2"><small>Sign In with Google</small></button>
                    </div> -->
                    <!-- <div class="row">
                        <small>Don't have an account? <a href="#">Sign Up</a></small>
                    </div> -->
                </div>
            </div>

        </div>
    </div>

</body>

</html>
