<?php
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1; shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post - Interest</title>
    <script
        type="text/javascript"> (function () { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/logo1.jpg" width="35"
                height="40"></a>
        <h5 class=" font-weight-bold navbar-brand" href="index.php">Interest - Details</h5>
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
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="post.php">Post</a>
                </li> -->
                <li class=nav-item>
                    <a class=nav-link href='register.php'>Register</a>
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
                <a class='nav-link dropdown-toggle' href='author' id='navbarDropdownMenuLink' 
                role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <img class='rounded-circle mr-2' src='assets/img/" . $data['namafoto_pro'] . "' width='30'>
                <span class='align-middle'>$username</span></a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item' href='album.php'>Album</a>
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

    <section class="mt-4 mb-5">
        <div class="container-fluid mb-4">
            <h1 class="font-weight-bold title">Jelajahi Foto</h1>
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
                    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                    echo "<a href='home.php' class='btn btn-outline-secondary btn-sm'>All </a>";
                    while ($row = mysqli_fetch_array($kategori)) { ?>

                        <div class="collapse navbar-collapse" id="navbarsExplore">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="home.php?kategoriid=<?php echo $row['kategoriid'] ?>" class="nav-link">
                                        <?php echo $row['nama_kategori'] ?>
                                    </a>
                            </ul>
                        </div>
                    <?php } ?>
            </ul>
        </div>
    </nav>
    <main role="main">
        <section class="bg-gray200 pt-5 pb-5">
            <div class="container">
                <div class="row justify-content-center"></div>
<?phpif (isset($_GET['fotoid'])) {?>
    <?php
    $fotoid = mysqli_real_escape_string($conn, $_GET['fotoid']);

    // Query untuk mendapatkan data foto berdasarkan fotoid
    $query = mysqli_query($conn, "SELECT * FROM foto 
        INNER JOIN user ON foto.userid = user.userid 
        INNER JOIN album ON foto.albumid = album.albumid 
        INNER JOIN kategori ON foto.kategoriid = kategori.kategoriid 
        WHERE foto.fotoid='$fotoid'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
?>
        <div class="col-md-7">
            <article class="card">
                <img class="card-img-top mb-2" src="assets/img/<?php echo $row['lokasifile']; ?>" alt="Card image">
                <div class="card-body">
                    <h1 class="card-title display-4"><?php echo $row['judulfoto']; ?></h1>
                    <?php echo "<img src='assets/img/". $row['namafoto_pro'] . "' class='rounded-circle me-2' width='40' height='40' />"; ?>
                    <p class="badge bg-primary text-light"><?php echo $row['username']; ?></p>
                    <p class="badge bg-primary text-light"> Posted On: <?php echo $row['tanggalunggah']; ?></p><br>
                    <p class="badge bg-secondary text-light">Album: <?php echo $row['nama_album']; ?></p>
                    <p class="badge bg-secondary text-light">Kategori: <?php echo $row['nama_kategori']; ?></p>
                    <p><?php echo $row['deskripsifoto']; ?></p>
                    <?php
                    $fotoid = $row['fotoid'];

                    $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$username'");
                    if (mysqli_num_rows($ceksuka) == 1) {
                    ?>
                        <a href="proses_like.php?fotoid=<?php echo $row['fotoid']; ?>" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
                    <?php } else { ?>
                        <a href="proses_like.php?fotoid=<?php echo $row['fotoid']; ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
                    <?php }

                    $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($like) . 'Suka';
                    ?>
                    <i class="fa-regular fa-comment"></i>
                    <?php
                    $kome = mysqli_query($conn, "SELECT * FROM komentar WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($kome) . 'Komentar';
                    ?>
                    <hr>
                    <h4 class="h6">Komentar </h4>
                    <div class="card bg-light">
                        <div class="card-body py-1">
                            <form action="proses_komentar.php" method="POST">
                                <input type="hidden" name="fotoid" value="<?php echo $row['fotoid']; ?>">
                                <div>
                                    <textarea class="form-control form-control-sm border border-2 rounded-1" id="exampleFormControlTextarea1" style="height: 50px" placeholder="Add a comment..." minlength="3" maxlength="255" name="isikomentar" required></textarea>
                                </div>
                                <footer class="card-footer bg-transparent border-0 text-end">
                                    <button type="submit" name="kirim" class="btn btn-primary btn-sm">Kirim Komentar</button>
                                </footer>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <?php
                    $fotoid = $row['fotoid'];
                    $komentar_query = mysqli_query($conn, "SELECT * FROM komentar INNER JOIN user ON komentar.userid = user.userid WHERE komentar.fotoid='$fotoid'");
                    while ($komentar_row = mysqli_fetch_array($komentar_query)) {
                    ?>
                        <article class="card bg-light">
                            <div class="d-flex align-items-center">
                                <?php echo "<img src='assets/img/" . $komentar_row['namafoto_pro'] . "' class='rounded-circle me-2' width='40' height='40' />"; ?>
                                <div>
                                    <a class="fw-bold text-primary mb-1"><?php echo $komentar_row['namalengkap']; ?></a>
                                    <span class="ms-3 small text-muted"><?php echo $komentar_row['tanggalkomentar']; ?></span>
                                </div>
                            </div>
                            <div class="card-body py-3 px-3 d-flex">
                                <?php echo $komentar_row['isikomentar']; ?>
                            </div>
                            <footer class="card-footer bg-white border-0 py-1 px-3">
                                <form action="proses_komentar.php" method="POST">
                                    <input type="hidden" name="fotoid" value="<?php echo $row['fotoid']; ?>">
                                    <input type="hidden" name="komentarid" value="<?php echo $komentar_row['komentarid']; ?>">
                                    <?php
                                    $currentUserID = $_SESSION['userid']; // Example current user ID
                                    $commentUserID = $komentar_row['userid']; // Example comment's user ID
                                    if ($currentUserID === $commentUserID) {
                                    ?>
                                        <button type="button" class="btn btn-link btn-sm text-decoration-none ps-0" data-bs-toggle="modal" data-bs-target="#edit<?php echo $komentar_row['komentarid']; ?>"><i class="fa fa-edit fa-sm"></i></button>
                                        <button type="submit" name="hapus" class="btn btn-link btn-sm text-decoration-none ps-0" onclick="return confirm ('Apakah Anda yakin ingin menghapus komentar ini?')"><i class="fa fa-trash-o fa-sm"></i></button>
                                    <?php } ?>
                                </form>
                                <hr>
                            </footer>
                            <!-- Modal -->
                            <div class="modal fade" id="edit<?php echo $komentar_row['komentarid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Komentar</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form action="proses_komentar.php" method="POST">
                                                <input type="hidden" name="fotoid" value="<?php echo $row['fotoid']; ?>">
                                                <input type="hidden" name="komentarid" value="<?php echo $komentar_row['komentarid']; ?>">
                                                <label class="form-label">Komentar</label>
                                                <input type="text" class="form-control" name="isikomentar" value="<?php echo $komentar_row['isikomentar']; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="edit" class="btn btn-primary">Sim Perubahan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </article>
        </div>
    <?php }
 ?>
