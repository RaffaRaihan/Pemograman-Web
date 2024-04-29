<?php
session_start();
include 'config.php';


if(isset($_POST['tambah'])){
    $nama_album= $_POST['nama_album'];
    $deskripsi= $_POST['deskripsi'];
    $tanggal= date('Y-m-d');
    $userid= $_SESSION['userid'];


    $sql =mysqli_query($conn, "INSERT INTO album (nama_album, deskripsi, tanggalbuat, userid)
     VALUES('$nama_album','$deskripsi','$tanggal','$userid')");


    echo"<script>
       alert('Data Berhasi Disimpan.');
       location.href = 'album.php';
    </script>";
}else if(isset($_POST['edit'])){
    $albumid=$_POST['albumid'];
    $nama_album= $_POST['nama_album'];
    $deskripsi= $_POST['deskripsi'];
    $tanggal= date('Y-m-d');
    $userid= $_SESSION['userid'];


    $sql =mysqli_query($conn,"UPDATE album SET nama_album='$nama_album',deskripsi='$deskripsi',tanggalbuat='$tanggal' WHERE albumid='$albumid'");
    echo"<script>
       alert('Data Berhasil Diperbaharui.');
       location.href = 'album.php';
    </script>";
}else if(isset($_POST['hapus'])){
    $albumid=$_POST['albumid'];
    $sql =mysqli_query($conn, "DELETE FROM album WHERE albumid='$albumid'");
    echo"<script>
       alert('Data Berhasil Dihapus.');
       location.href = 'album.php';
    </script>";
}
?>

