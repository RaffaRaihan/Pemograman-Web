<?php
session_start();
include 'koneksi.php';
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
    <title>Author - Interest</title>
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="icon" type="image/jpg" href="assets/img/logo1.jpg">
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/logo1.jpg" width="35" height="40"></a>
        <h5 class=" font-weight-bold navbar-brand" href="index.php">Interest - Album</h5>
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsDefault">
            <ul class="navbar-nav mr-auto align-items-center">
                <form class="bd-search hidden-sm-down">
                    <input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input" placeholder="Pencarian..." autocomplete="off">
                    <div class="dropdown-menu bd-search-results" id="search-results">
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.php">Post</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link ' href='author.php'>Author</a>
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
                <a class='nav-link dropdown-toggle active' href='author' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <img class='rounded-circle mr-2' src='assets/img/" . $data['namafoto_pro'] . "' width='30'><span class='align-middle'>$username</span></a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item active' href='album.php'>Album</a>
                <a class='dropdown-item' href='foto.php'>Foto</a>
                <a class='dropdown-item' href='kategori.php'>Kategori</a>
                <a class='dropdown-item' href='profil.php'>Profil</a>
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
                <?php } ?>
            </ul>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header"> Tambah Album</div>
                    <div class="card-body">
                        <form action="aksi_album.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" class="form-control" name="nama_album">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Album</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama_album'] ?></td>
                                        <td><?php echo $data['deskripsi'] ?></td>
                                        <td><?php echo $data['tanggalbuat'] ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid'] ?>">
                                                Edit
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Album</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="aksi_album.php" method="POST">
                                                                <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" class="form-control" name="nama_album" value="<?php echo $data['nama_album'] ?>">
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi'] ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Album</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="aksi_album.php" method="POST">
                                                                <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                                Apakah anda yakin akan menghapus data <strong> <?php echo$data['nama_album']?></strong> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    <footer class="footer pt-5 pb-5 text-center">
        <p>© <span class="credits font-weight-bold">
                <u>Interest 2024</u> by WowThemes.net.</u>
        </p>
        </div>


    </footer>
</body>


</html>

