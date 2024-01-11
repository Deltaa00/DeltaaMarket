<?php
session_start();
require 'functions.php'; // Tambahkan baris ini untuk memasukkan functions.php

// Periksa keberadaan cookie pada awal skrip
$id = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
$key = isset($_COOKIE['key']) ? $_COOKIE['key'] : null;

if ($id && $key) {
    $conn = connectDB();
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && $key === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
            // Tidak perlu redirect ke halamanutama.php di sini, karena pengaturan session sudah cukup
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deltaa Market</title>
    <link rel="icon" href="foto/deltaa.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" defer></script>
</head>
<body>

    <div class="banner-container">
        <div class="top-image-slider">
            <img src="foto/ml1.jpg" alt="Top Image" class="top-image">
            <!-- Add more top images here -->
        </div>
        <!-- Optional: Add text or other elements on the banner -->
        <div class="banner-text">Deltaa Market</div>
    </div>

    <div class="slider-container">
        <div class="juduljualan">Game Terpopuler</div>
        <div class="slider">
            <div class="product">
                <a href="ml.php">
                <img src="foto/chou.png" alt="Product 1" class="product-image">
                <div class="product-label">Mobile Legend</div>
            </a>
            </div>

            <div class="product">
                <a href="ff.php">
                <img src="foto/ff.jpg" alt="Product 2" class="product-image">
                <div class="product-label">Free Fire</div>
            </a>
            </div>

            <div class="product">
                <a href="pubg.php">
                <img src="foto/pubg.jpg" alt="Product 3" class="product-image">
                <div class="product-label">Pubg Battlegrounds</div>
            </a>
            </div>
        </div>

        <div class="slider">
            <div class="product">
                <a href="valorant.php">
                <img src="foto/valo.jpg" alt="Product 1" class="product-image">
                <div class="product-label">Valorant</div>
            </a>
            </div>

            <div class="product">
                <a href="8bp.php">
                <img src="foto/8bp.jpg" alt="Product 2" class="product-image">
                <div class="product-label">8 Ball Pool</div>
            </a>
            </div>

            <div class="product">
                <a href="gensin.php">
                <img src="foto/gensin.jpg" alt="Product 3" class="product-image">
                <div class="product-label">Genshin Impact</div>
            </a>
            </div>
        </div>
    </div>

    <nav class="sidebar close">
        <div class="logo_items flex">
            <span class="nav_images">
                <img src="foto/deltaa.png" alt="logo_img">
            </span>
            <span class="logo_name">Deltaa Market</span>
            <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
            <i class="bx bx-x" id="sidebar-close"></i>
        </div>

        <div class="menu_container">
            <div class="menu_items">

                <ul class="menu_item">
                    <!-- <div class="menu_title flex">
                        <span class="title">Dashboard</span>
                        <span class="line"></span>
                    </div> -->
                    <div class="item">
                    <li class="item1 flex">
                        <a href="index.php" class="link flex">
                            <i class="bx bx-home-alt"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <!-- <li class="item1 flex">
                        <a href="#" class="link flex">
                            <i class="bx bx-grid-alt"></i>
                            <span>Cek transaksi</span>
                        </a>
                    </li> -->
                    </div>

                    <div class="menu_title flex">
                        <span class="title">Masalah Transaksi</span>
                        <span class="line"></span>
                    </div>
                    <div class="item">
                    <li class="item2 flex">
                        <a href="mailto:arleviaditya@gmail.com" class="link flex">
                            <i class="bx bx-envelope"></i>
                            <span>Email</span>
                        </a>
                    </li>

                    <li class="item2 flex">
                        <a href="https://wa.me/6287790835101" class="link flex">
                            <i class='bx bxl-whatsapp' ></i>
                            <span>Whatsapp</span>
                        </a>
                    </li>
                    </div>
                    <div class="item">
                    <?php
                    if (isset($_SESSION["login"]) && $_SESSION["login"]) {
                        // Tampilkan opsi logout hanya jika pengguna sudah login
                        echo '<li class="item2 flex">
                                <a href="logout.php" class="link flex">
                                    <i class="bx bx-exit"></i>
                                    <span>Logout</span>
                                </a>
                            </li>';
                    }
                    ?>
                </div>
                </ul>
            </div>
            <!-- OPSIONAL BISA DIPAKAI TAPI HARUS  DI GANTI LAGI JADI TEMPAT LOGIN -->
            <!-- <div class="sidebar_profile flex">
                <span class="nav_images">
                    <img src="foto/user.png" alt="logo_img">
                </span>
                <div class="data_text">
                    <span class="name"> Aditya Arielevi</span>
                    <span class="gmail"> aditya@gmail.com</span>
                </div>
            </div> -->
            <!-- SAMPAI SINI -->
        </div>
    </nav>

    <!-- Navbar -->
    <nav class="navbar flex">
        <i class="bx bx-menu" id="sidebar-open"></i>
        <input type="text" placeholder="Search..." class="search_box" oninput="cariProduk(this.value)">
        <div id="search-results" class="search-results"></div>
        <span class="nav_images">
            <a href="login.php" class="login-navbar">
                <img src="foto/user.png" style="background-color: white; padding: 10px;" alt="logo_img">
            </a>
            
        </span>
    </nav>
    
    <!-- footer -->
    <footer>
        <div class="footer-content">
            <h3>Thank To Order</h3>
            <p>Terima kasih telah memesan di toko kami, jika terjadi masalah dalam transaksi silahkan hubungi kontak di bawah</p>
            <ul class="socials">
                <li><a href="https://www.instagram.com/deltaa.design/"><i class="fa fa-instagram"></i></a></li>
                <li><a href="mailto:arleviaditya@gmail.com"><i class="bx bx-envelope"></i></a></li>
                <li><a href="https://wa.me/6287790835101"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p><span> &copy;2023 CV Deltaa Market</span></p>
        </div>
    </footer>
        <!-- tutup footer -->
    
</body>
</html>