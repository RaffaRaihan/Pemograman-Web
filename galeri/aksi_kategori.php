<?php
session_start();
include 'config.php';


if(isset($_POST['tambah'])){
    $nama_kategori= $_POST['nama_kategori'];
    $userid= $_SESSION['userid'];


    $sql =mysqli_query($conn, "INSERT INTO kategori (nama_kategori,userid)VALUES('$nama_kategori','$userid')");


    echo"<script>
       alert('Data Berhasi Disimpan.');
       location.href = 'kategori.php';
    </script>";
}else if(isset($_POST['edit'])){
    $kategoriid=$_POST['kategoriid'];
    $nama_kategori= $_POST['nama_kategori'];
    $userid= $_SESSION['userid'];


    $sql =mysqli_query($conn,"UPDATE kategori SET nama_kategori='$nama_kategori' WHERE kategoriid='$kategoriid'");
    echo"<script>
       alert('Data Berhasil Diperbaharui.');
       location.href = 'kategori.php';
    </script>";
}else if(isset($_POST['hapus'])){
    $kategoriid=$_POST['kategoriid'];
    $sql =mysqli_query($conn, "DELETE FROM kategori WHERE kategoriid='$kategoriid'");
    echo"<script>
       alert('Data Berhasil Dihapus.');
       location.href = 'kategori.php';
    </script>";
}
?>

