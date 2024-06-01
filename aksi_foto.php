<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $judul_foto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['albumid'];
    $kategoriid = $_POST['kategoriid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = 'assets/img/';
    $namafoto = rand().'-'.$foto;
    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql =mysqli_query($conn, "INSERT INTO foto (deskripsifoto,tanggalunggah,lokasifile,albumid,userid,kategoriid,judulfoto)
     VALUES('$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid','$kategoriid','$judul_foto')");

    echo"<script>
       alert('Data Berhasil Disimpan.');
       location.href ='foto.php';
    </script>";
}

if(isset($_POST['edit'])){
    $fotoid =$_POST['fotoid'];
    $judul_foto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['albumid'];
    $kategoriid = $_POST['kategoriid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = 'assets/img/';
    $namafoto = rand().'-'.$foto;

    if($foto == null){
        $sql =mysqli_query($conn, "UPDATE foto SET judulfoto='$judul_foto', deskripsifoto='$deskripsifoto', 
        tanggalunggah='$tanggalunggah', albumid='$albumid',kategoriid='$kategoriid' WHERE fotoid='$fotoid'");
    }else{
        $query =mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
        $data =mysqli_fetch_array($query);
        if(is_file('assets/img/'.$data['lokasifile'])){
            unlink('assets/img/'.$data['lokasifile']);
        }
        move_uploaded_file($tmp, $lokasi.$namafoto);
        $sql =mysqli_query($conn, "UPDATE foto SET judulfoto='$judul_foto', deskripsifoto='$deskripsifoto', 
        tanggalunggah='$tanggalunggah', lokasifile='$namafoto', albumid='$albumid',kategoriid='$kategoriid' WHERE fotoid='$fotoid'");
    }
    echo"<script>
       alert('Data Berhasil Diperbaharui.');
       location.href = 'foto.php';
    </script>";
}
if(isset($_POST['hapus'])){
    $fotoid =$_POST['fotoid'];
    $query =mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
        $data =mysqli_fetch_array($query);
        if(is_file('assets/img/'.$data['lokasifile'])){
            unlink('assets/img/'.$data['lokasifile']);
        }
        $sql =mysqli_query($conn, "DELETE FROM foto WHERE fotoid='$fotoid'"); 
        echo"<script>
       alert('Data Berhasil Dihapus.');
       location.href = 'foto.php';
    </script>";  
}
?>