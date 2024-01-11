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
            <h1>8 Ball Pool</h1>
            <img src="foto/8bp.jpg" class="foto-game" alt="Gambar Pembayaran">
            <div class=" text-game">
            <p>Top up ML diamond Mobile Legends harga paling murah. Cara topup MLBB termurah :</p>
            <ol class="text-game">
                <li>Masukkan ID</li>
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
                <input type="text" id="id8bp" name="id8bp" placeholder="Masukan ID" required>

                <label for="barang">List Coin</label>
                <select id="barang" name="barang">
                    <option value="" disabled selected>Pilih Barang</option>
                    <option value="barang1">150M - Rp 40000</option>
                    <option value="barang1">250M - Rp 55000</option>
                    <option value="barang1">400M - Rp 75000</option>
                    <option value="barang1">1B - Rp 160000</option>
                    </select>

                <label for="barangc">List Cash</label>
                <select id="barangc" name="barangc">
                    <option value="" disabled selected>Pilih Barang</option>
                    <option value="barang1">1220 Cash - Rp 35000</option>
                    <option value="barang1">4000 Cash - Rp 70000</option>
                    <option value="barang1">8000 Cash - Rp 125000</option>
                    <option value="barang1">16000 Cash - Rp 230000</option>
                    <option value="barang1">32000 Cash - Rp 450000</option>
                    <option value="barang1">48000 Cash - Rp 680000</option>
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
        var id8bp = document.getElementById('id8bp').value;
        var selectedBarang = document.getElementById('barang');
        var selectedBarangc = document.getElementById('barangc');
        var barang = selectedBarang.options[selectedBarang.selectedIndex].text;
        var barangc = selectedBarangc.options[selectedBarangc.selectedIndex].text;
        var email = document.getElementById('Email').value;

        // Game details
        var gameTitle = "8 Ball Pool";

        // Message template
        var pesanTemplate = "Halo, saya ingin melakukan pembelian untuk game {{gameTitle}}:\n" +
                            "ID: {{id8bp}}\n" +
                            "Barang: {{barang}}\n" +
                            "Barangc: {{barangc}}\n" +
                            "Email: {{email}}\n";

        // Fill in the details in the message template
        var pesan = pesanTemplate.replace("{{gameTitle}}", gameTitle)
                                  .replace("{{id8bp}}", id8bp)
                                  .replace("{{barang}}", barang)
                                  .replace("{{barangc}}", barangc)
                                  .replace("{{email}}", email);

        // Create the WhatsApp link
        var linkWhatsApp = "https://wa.me/6287790835101?text=" + encodeURIComponent(pesan);

        // Open the WhatsApp link in a new tab
        window.open(linkWhatsApp, '_blank');
    }

    // Add event listener to the form submission
    document.getElementById('paymentForm').addEventListener('submit', function (event) {
        kirimPesanWhatsApp();
        // Prevent the default form submission
        event.preventDefault();
    });
</script>


    
    
</body>
</html>
