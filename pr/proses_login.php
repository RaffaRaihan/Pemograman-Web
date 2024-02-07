<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Data Guru SMK Negeri 1 Lagos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
        <a class="nav-link" href="kelola1.php">Pendaftaran</a>
        <a class="nav-link" href="kelola1.php">Data guru</a>
        <a class="nav-link" href="data_upload.php">Data upload</a>
      </div>
    </div>
  </div>
</nav>

<?php
include("config.php");

  $username = $_POST['username'];
  $password = $_POST['password'];

$query ="SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    // Data pengguna valid, set session dan arahkan ke halaman utama
    
    $_SESSION['username'] = $username;
    header("Location: index2.php");
    
    } else {
    
    // Data pengguna tidak valid, arahkan kembali ke halaman login echo "Login gagal. Silakan coba lagi <a href='login.php'>di sini</a>.";
    echo "login gagal. Silahkan coba lagi <a href='login.php'>disini</a>.";
    }
    
    // Tutup koneksi database mysqli_close($koneksi);
    mysqli_close($koneksi);
    ?>