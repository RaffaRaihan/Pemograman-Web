<?php
session_start(); 
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql =mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password");
$cek = mysqli_num_rows($sql);

if ($cek >0){
    $_SESSION['username'] = $username;
    $_SESSION['status']= 'login';
    echo"<script>
    alert('Login Berhasil');
    </script>";
    header('Location: index.php?status=sukses');
}else{
    echo"<script>
    alert('Login gagal');
    </script>";
    header('Location: login.php?status=gagal');
}
?>