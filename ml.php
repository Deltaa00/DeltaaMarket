<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deltaa Market</title>
    <link rel="icon" href="foto/deltaa.png" type="image/png">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" defer></script>
    <title>Form Pembayaran</title>
    <!-- Tambahan stylesheet atau CDN jika diperlukan -->
</head>
<body>

    <div>
    <nav class="navbar flex">
        <i class="bx bx-menu" id="sidebar-open"></i>
        <input type="text" placeholder="Search..." class="search_box" oninput="cariProduk(this.value)">
        <div id="search-results" class="search-results"></div>
        <span class="nav_images">
            <a href="login.php" class="login-navbar">
            <!-- <span class="login-text">Login</span> -->
            <img src="foto/user.png" style="background-color: white; padding: 10px;" alt="logo_img" >
            </a> 
        </span>
    </nav>
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

<div class="content-pembelian">
    <div class="container">
        <div class="left-panel">
            <h1>Mobile Legend</h1>
            <img src="foto/chou.png" class="foto-game" alt="Gambar Pembayaran">
            <div class=" text-game">
            <p>Top up ML diamond Mobile Legends harga paling murah. Cara topup MLBB termurah :</p>
            <ol class="text-game">
                <li>Masukkan ID & server</li>
                <li>Pilih Nominal</li>
                <li>Masukkan jumlah</li>
                <li>Klik Order Now & lakukan Pembayaran</li>
                <li>Lakukan Pembayaran Via WhatsApp</li>
                <li>Tunggu Proses Transaksi Berhasil</li>
            </ol>
            </div>
        </div>
        
        <div class="right-panel">
            <h2>Form Pembayaran</h2>
            <form action="https://wa.me/6287790835101" method="post" id="paymentForm">
                <label for="nama">ID </label>
                <input type="text" id="idml" name="idml" placeholder="Masukan ID" required>

                <label for="email">Server</label>
                <input type="Server" id="Server" name="Server" placeholder="Masukan Server" required>

                <label for="barang">List Top Up</label>
                <select id="barang" name="barang" required>
                    <option value="" disabled selected>Pilih Barang</option>
                    <option value="barang1">12 Diamonds - Rp 3000</option>
                    <option value="barang1">28 Diamonds - Rp 8000</option>
                    <option value="barang1">36 Diamonds - Rp 10000</option>
                    <option value="barang1">56 Diamonds - Rp 16000</option>
                    <option value="barang1">85 Diamonds - Rp 23000</option>
                    <option value="barang1">169 Diamonds - Rp 46000</option>
                    <option value="barang1">220 Diamonds - Rp 60000</option>
                    <option value="barang1">282 Diamonds - Rp 80000</option>
                    <option value="barang1">366 Diamonds - Rp 100000</option>
                    <option value="barang1">568 Diamonds - Rp 150000</option>
                    <option value="barang1">875 Diamonds - Rp 230000</option>
                </select>

                <label for="jumlah">Alamat Email</label>
                <input type="text" id="Email" name="Email" placeholder="Masukan Alamat Email" required>

                <p class="proses-bayar">Pembayaran dapat diselesainkan melalui via Whatsapp</p>

                <button type="submit">Proses Pembayaran</button>
            </form>
        </div>
    </div>
</div>

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

<script>
    function kirimPesanWhatsApp() {
        var idInput = document.getElementById('idml');
        var serverInput = document.getElementById('Server');
        var selectedBarang = document.getElementById('barang');
        var barang = selectedBarang.options[selectedBarang.selectedIndex].text;
        var email = document.getElementById('Email').value;

        // Assuming you want to set a game title
        var gameTitle = "Mobile Legends"; 

        var pesanTemplate = "Halo, saya ingin melakukan pembelian untuk game {{gameTitle}}:\n" +
                            "ID: {{id}}\n" +
                            "Server: {{server}}\n" +
                            "Barang: {{barang}}\n" +
                            "Email: {{email}}\n";

        var pesan = pesanTemplate.replace("{{gameTitle}}", gameTitle)
                                  .replace("{{id}}", idInput.value)
                                  .replace("{{server}}", serverInput.value)
                                  .replace("{{barang}}", barang)
                                  .replace("{{email}}", email);

        var linkWhatsApp = "https://wa.me/6287790835101?text=" + encodeURIComponent(pesan);
        window.open(linkWhatsApp, '_blank');
    }

    document.getElementById('paymentForm').addEventListener('submit', function (event) {
        kirimPesanWhatsApp();
        event.preventDefault();
    });
</script>

    
    
</body>
</html>
