<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
    if($_POST['aksi'] =='add'){
    $id = $_POST['id_guru'];
    $nama = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $kelamin = $_POST['jenis_kelamin'];
    $notelepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    
    // buat query
    $sql = "INSERT INTO Guru (nama_guru, alamat,jenis_kelamin,no_telepon,email) VALUE ('$nama', '$alamat', '$kelamin','$notelepon','$email')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index2.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index2.php?status=gagal');
    }

} else if ($_POST['aksi'] =='edit'){
    $id = $_POST['id_guru'];
    $nama = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $kelamin = $_POST['jenis_kelamin'];
    $notelepon = $_POST['no_telepon'];
    $email = $_POST['email'];

    $sql="UPDATE guru SET nama_guru ='$nama', alamat ='$alamat', jenis_kelamin ='$kelamin', no_telepon ='$notelepon', email='$email'
    WHERE id_guru='$id'";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index2.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index2.php?status=gagal');
    }
}
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql ="DELETE FROM guru WHERE id_guru ='$id';";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index2.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index2.php?status=gagal');
    }
}
?>