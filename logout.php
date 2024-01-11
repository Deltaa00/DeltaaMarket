<?php
// logout.php

session_start();

// Unset semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

setcookie('id', "", time() - 604800);
setcookie('key', "", time() - 604800);

// Redirect ke halaman login atau ke halaman lain yang Anda pilih
header("Location: login.php");
exit;
?>
