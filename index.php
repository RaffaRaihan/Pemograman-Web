<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Interest</title>
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
        <h5 class=" font-weight-bold navbar-brand" href="index.php">Interest</h5>
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
                <li class="nav-item">
                    <a class="nav-link" href="post.php">Post</a>
                </li>
                <li class=nav-item>
                    <a class=nav-link href='register.php'>Register</a>
                </li>
                <li class=nav-item>
                    <a class=nav-link href='login.php'>Login</a>
                </li>
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
					<div class="collapse navbar-collapse" id="navbarsExplore">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Gaya Hidup</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Makanan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Arsitektur</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Satwa</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Kategori Lainnya
      </a>
      <div class="dropdown-menu shadow-lg" aria-labelledby="dropdown01">
        <a class="dropdown-item" href="#">Astronomi</a>
        <a class="dropdown-item" href="#">Alam</a>
        <a class="dropdown-item" href="#">Perjalanan</a>
        <a class="dropdown-item" href="#">Fashion</a>
        <a class="dropdown-item" href="#">Seni Rupa</a>
        <a class="dropdown-item" href="#">Bawah Laut</a>
      </div>
    </li>
  </ul>
</div>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                    echo "<a href='index.php' class='btn btn-outline-secondary btn-sm'>All </a>";
                    while ($row = mysqli_fetch_array($kategori)) { ?>

                        <div class="collapse navbar-collapse" id="navbarsExplore">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="index.php?kategoriid=<?php echo $row['kategoriid'] ?>" class="nav-link">
                                        <?php echo $row['nama_kategori'] ?>
                                    </a>
                            </ul>
                        </div>
                    <?php } ?>
                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                if (isset($_GET['kategoriid'])) {
                    $kategoriid = $_GET['kategoriid'];
                    $query = mysqli_query($conn, "SELECT * FROM foto WHERE kategoriid='$kategoriid'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-3 mt-2">
                            <div class="card card-pin" style="width: 18rem;">
                                <img style="width: 100%; height: 18rem; object-fit: cover;" class="card-img-top"
                                    src="assets/img/<?php echo $data['lokasifile'] ?>" alt="Card image">
                                <div class="overlay" style="width: 100%; height: 18rem; object-fit: cover;">
                                    <h2 class="card-title title">
                                        <?php echo $data['judulfoto'] ?>
                                    </h2>
                                    <div class="more">
                                        <a href="detail.php">
                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Selengkapnya </a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h5 class="card-text text-center">
                                        <?php echo $data['judulfoto'] ?>
                                    </h5>
                                    <!-- <p class="card-text"><?php echo $data['userid'] ?></p> -->
                                    <p class="card-text">
                                        <?php echo $data['tanggalunggah'] ?>
                                    </p>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo "<a href='login.php' type='submit' name='suka'>
                                            <i class='fa-regular fa-heart'></i></a> ";
                                    $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($like) . ' Suka';
                                    ?>
                                    </a>
                                    <a href=""><i class="fa-regular fa-comment"></i>3 komentar</a>

                                </div>
                            </div>
                        </div>
                        <?php }
                } else {

                    $query = mysqli_query($conn, "SELECT * FROM foto");
                    while ($data = mysqli_fetch_array($query)) { ?>
                            <div class="col-md-3 mt-2">
                                <div class="card card-pin" style="width: 18rem;">
                                    <img style="width: 100%; height: 18rem; object-fit: cover;" class="card-img-top"
                                        src="assets/img/<?php echo $data['lokasifile'] ?>" alt="Card image">
                                    <div class="overlay" style="width: 100%; height: 18rem; object-fit: cover;">
                                        <h2 class="card-title title">
                                            <?php echo $data['judulfoto'] ?>
                                        </h2>
                                        <div class="more">
                                            <a href="post.php">
                                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Selengkapnya </a>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <h5 class="card-text text-center">
                                            <?php echo $data['judulfoto'] ?>
                                        </h5>
                                        <!-- <p class="card-text"><?php echo $data['userid'] ?></p> -->
                                        <p class="card-text">
                                            <?php echo $data['tanggalunggah'] ?>
                                        </p>
                                        <?php
                                        $fotoid = $data['fotoid'];
                                        $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                        echo "<a href='login.php' type='submit' name='suka'>
                                            <i class='fa-regular fa-heart'></i></a> ";
                                        $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                        echo mysqli_num_rows($like) . ' Suka';
                                        ?>
                                        </a>
                                        <a href=""><i class="fa-regular fa-comment"></i>3 komentar</a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                } ?>
                </div>
            </div>
    </section>

    </main>

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