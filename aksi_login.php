<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    // Ambil data user dari hasil query
    $user = mysqli_fetch_assoc($sql);

    // Setel data user dalam sesi
    $_SESSION['userid'] = $user['userid'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['status'] = 'login';
    echo "<script>
    alert('Login Berhasil');
    </script>";
    header('Location: home.php?status=sukses');
} else {
    echo "<script>
    alert('Login gagal');
    </script>";
    header('Location: login.php?status=gagal');
}
?>
