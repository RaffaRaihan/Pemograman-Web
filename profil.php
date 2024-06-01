<?php
session_start();
include 'koneksi.php';
$userid = $_SESSION['userid'];
if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = 'not_login';
}
if ($_SESSION['status'] != 'login') {
    echo "<script>
           alert('Anda Belum Login');
           location.href = 'index.php';
           </script>";
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil - Interest</title>
    <script
        type="text/javascript"> (function () { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="icon" type="image/jphg" href="assets/img/logo1.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/logo1.jpg" width="35"
                height="40"></a>
        <h5 class=" font-weight-bold navbar-brand" href="index.php">Interest - Profil</h5>
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault"
            aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsDefault">
            <ul class="navbar-nav mr-auto align-items-center">
                <form class="bd-search hidden-sm-down">
                    <input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input"
                        placeholder="Pencarian..." autocomplete="off">
                    <div class="dropdown-menu bd-search-results" id="search-results">
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link " href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.php">Post</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='author.php'>Author</a>
                </li>
                <?php
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE userid='$userid'");
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo "<li class='nav-item dropdown'>
                <a class='nav-link active dropdown-toggle active' href='author' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <img class='rounded-circle mr-2' src='assets/img/" . $data['namafoto_pro'] . "' width='30'><span class='align-middle'>$username</span></a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item' href='album.php'>Album</a>
                <a class='dropdown-item' href='foto.php'>Foto</a>
                <a class='dropdown-item' href='kategori.php'>Kategori</a>
                <a class='dropdown-item active' href='profil.php'>Profil</a>
                <a class='dropdown-item' href='logout.php'>Logout</a>
                </div></li>";


                        ?>
                        <?php
                    } else {
                        echo "<li class=nav-item>
                <a class=nav-link href='register.php'>Register</a>
                </li>";
                        echo "<li class=nav-item>
                    <a class=nav-link href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <section class="mt-4 mb-5">
            <div class="container">
                <div class="row">


                    <div class="col-md-4">
                        <img class="img-fluid  mt-2" src="assets/img/<?php echo $data['namafoto_pro'] ?>" height="12rem"
                            alt="Foto Profil">
                    </div>
                    <div class="col-md-8">
                        <table class="table mt-2">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama :</th>
                                    <td>
                                        <?php echo $data['namalengkap'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat :</th>
                                    <td>
                                        <?php echo $data['alamat'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email :</th>
                                    <td>
                                        <?php echo $data['email'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Username :</th>
                                    <td>
                                        <?php echo $data['username'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Password :</th>
                                    <td>
                                        <?php echo $data['password'] ?>
                                    </td>
                                </tr>
                            </tbody>


                        </table>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#edit<?php echo $data['userid'] ?>">
                            Edit Profil</button>
                        <!-- Modal -->
                        <div class="modal fade" id="edit<?php echo $data['userid'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Profil</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form action="aksi_register.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="userid" value="<?php echo $data['userid'] ?>">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama"
                                                value="<?php echo $data['namalengkap'] ?>">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control"
                                                name="alamat"><?php echo $data['alamat'] ?></textarea>
                                            <label class="form-label">E-mail</label>
                                            <input type="text" class="form-control" name="email"
                                                value="<?php echo $data['email'] ?>">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                value="<?php echo $data['username'] ?>">
                                            <label class="form-label">Password</label>
                                            <input type="text" class="form-control" name="password"
                                                value="<?php echo $data['password'] ?>">
                                            <label class="form-label">Foto</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="assets/img/<?php echo $data['namafoto_pro'] ?>" width="100">
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">Ganti Foto</label>
                                                    <input type="file" class="form-control" name="namafoto_pro">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="edit" class="btn btn-primary">Simpan
                                                    Perubahan</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>






    </div>
    </section>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <footer class="footer pt-5 pb-5 text-center">


        <div class="container">
            <p>© <span class="credits font-weight-bold">
                    <u>Interest 2024</u> by WowThemes.net.</u>
                </span>
        </div>


    </footer>
</body>


</html>
