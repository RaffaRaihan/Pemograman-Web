<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];

  // Mengambil informasi file
  $foto_pro = $_FILES['namafoto_pro']['name'];
  $tmp = $_FILES['namafoto_pro']['tmp_name'];

  // Validasi file
  if (isset($_FILES['namafoto_pro']) && $_FILES['namafoto_pro']['error'] === 0) {
    // File berhasil diunggah
    $lokasi_pro = 'assets/img/';
    $namafoto_pro = $foto_pro; // Mengubah nama file menjadi nama asli

    // Memindahkan file
    move_uploaded_file($tmp, $lokasi_pro . $namafoto_pro);

    // Query untuk memeriksa ketersediaan nama pengguna
    $check_query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);

    // Periksa jumlah baris yang dikembalikan
    if (mysqli_num_rows($result) > 0) {
      // Jika nama pengguna sudah ada dalam database
      echo "<script>
        alert('Nama pengguna sudah digunakan. Silakan pilih nama pengguna lain.');
        location.href = 'register.php?status=gagal';
      </script>";
    } else {
      $sql = mysqli_query($conn, "INSERT INTO user (username, password, email, namalengkap, alamat, namafoto_pro) 
        VALUE ('$username','$password', '$email', '$nama', '$alamat', '$namafoto_pro')");

      if ($sql) {
        // Jika pendaftaran berhasil
        echo "<script>
          alert('Pendaftaran Akun Berhasil');
          location.href = 'login.php?status=berhasil';
        </script>";
      } else {
        // Jika pendaftaran gagal
        echo "<script>
          alert('Pendaftaran Akun Gagal. Silakan coba lagi.');
          location.href = 'register.php?status=gagal';
        </script>";
      }
    }
  } else {
    // File gagal diunggah
    echo "<script>
      alert('File gagal diunggah. Silakan coba lagi.');
      location.href = 'register.php?status=gagal';
      </script>";
  }
}
if (isset($_POST['edit'])) {
  $userid = $_POST['userid'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];

  // Mengambil informasi file
  $foto_pro = $_FILES['namafoto_pro']['name'];
  $tmp = $_FILES['namafoto_pro']['tmp_name'];

  // Validasi file

    // File berhasil diunggah
    $lokasi_pro = 'assets/img/';
    $namafoto_pro = $foto_pro; // Mengubah nama file menjadi nama asli

    if ($foto_pro == null) {
      $sql = mysqli_query($con, "UPDATE user SET username='$username', password='$password', 
      email='$email', nama='$nama', alamat='$alamat' WHERE userid='$userid'");
    } else {
      $query = mysqli_query($conn, "SELECT * FROM user WHERE userid='$userid'");
      $data = mysqli_fetch_array($query);
      if (is_file('assets/img/' . $data['namafoto_pro'])) {
        unlink('assets/img/' . $data['namafoto_pro']);
      }
      move_uploaded_file($tmp, $lokasi_pro . $namafoto_pro);
      $sql = mysqli_query($conn, "UPDATE user SET username='$username', password='$password', 
      email='$email', namalengkap='$nama', alamat='$alamat', namafoto_pro='$namafoto_pro' WHERE userid='$userid'");
    }
    echo "<script>
     alert('Data Berhasil Diperbaharui.');
     location.href = 'profil.php';
  </script>";
}