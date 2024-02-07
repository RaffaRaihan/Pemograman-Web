<?php

include "config.php";

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['save'])){
    if($_POST['save']=='add'){
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $path = "image/".$nama_file;
        if(move_uploaded_file($tmp_file, $path)){
            $query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES ('".$nama_file."', '".$ukuran_file."','".$tipe_file."')";
            $sql = mysqli_query($db, $query);
            if($sql){
                header("location: data_upload.php");
            }else{
                echo "Maaf,Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";

            }
        }else{
            echo "Maaf, Gambar gagal di upload";
                echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
        }
            }
        }
            if(isset($_GET['hapus'])){
                $id = $_GET['hapus'];
            
                $sql ="DELETE FROM gambar WHERE id_gambar ='$id';";
                $query = mysqli_query($db, $sql);
                if( $query ) {
                    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                    header('Location: data_upload.php?status=sukses');
                } else {
                    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
                    header('Location: data_upload.php?status=gagal');
                }
            }

   ?>
    
