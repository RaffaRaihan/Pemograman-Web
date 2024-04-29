<?php
session_start();
include 'config.php';
$fotoid =$_GET['fotoid'];
$userid = $_SESSION['userid'];
$ceksuka =mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
    if(mysqli_num_rows($ceksuka) == 1){
        while($row =mysqli_fetch_array($ceksuka)){
            $likeid = $row['likeid'];
            $query =mysqli_query($conn, "DELETE FROM likefoto WHERE likeid='$likeid'");
            echo"<script>
             location.href = 'home.php';
             </script>";
        }
    }else{
        $tanggallike = date('Y-m-d');
        $query = mysqli_query($conn, "INSERT INTO likefoto(fotoid,userid, tanggallike)
             VALUES('$fotoid','$userid','$tanggallike')");
             echo"<script>
               location.href = 'home.php';
            </script>";
    }


?>

