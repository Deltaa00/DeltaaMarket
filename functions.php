<?php
function connectDB()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "login";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}


//penyimpanan data
function registrasi($data)
{
    global $conn;
    $conn = connectDB();

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

//cek username yang sudah ada
$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");    
if( mysqli_fetch_assoc($result) ){
    echo "<script>
           alert('username sudah pernah terdaftar!')    
         </script>";
         return false;
}


//cek konfirmasi password    
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan username dan password ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
    
}
?>
