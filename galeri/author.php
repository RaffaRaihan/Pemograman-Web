<?php
session_start();
include 'config.php';
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
    <title>Author - Interest</title>
    <script
        type="text/javascript"> (function () { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/jpg" href="assets/img/logo1.jpg">
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/logo1.jpg" width="35"
                height="40"></a>
        <h5 class=" font-weight-bold navbar-brand" href="index.php">Interest - Author</h5>
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
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.php">Post</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link active' href='author.php'>Author</a>
                </li>
                <li class="nav-item">
                <?php
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE userid='$userid'");
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo "<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='author' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <img class='rounded-circle mr-2' src='assets/img/" . $data['namafoto_pro'] . "' width='30'><span class='align-middle'>$username</span></a>
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
    <main role="main">
        <?php
        $sql = "SELECT * FROM user WHERE userid='$userid'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="container-fluid mt-2 bg-graylight">
            <img src="assets/img/<?php echo $data['namafoto_pro'] ?>" class="rounded-img rounded-circle mt-2" width="200">
            <h1 class="font-weight-bold title">
                <?php echo "$username"; ?>
            </h1>
            <p>
                I love Art, Web Design, Photography, Design, Illustration
            </p>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title title ">Album</h5>
                        <?php
                        $album = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        echo "<a href='author.php' class='btn btn-outline-secondary btn-sm'> All </a>";
                        while ($row = mysqli_fetch_array($album)) { ?>
                            <a href="author.php?albumid=<?php echo $row['albumid'] ?>"
                                class="btn btn-outline-secondary btn-sm">
                                <?php echo $row['nama_album'] ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <?php
                if (isset($_GET['albumid'])) {
                    $albumid = $_GET['albumid'];
                    $query = mysqli_query($conn, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <img style="height: 12rem;" class="card-img-top"
                                    src="assets/img/<?php echo $data['lokasifile'] ?>" alt="Card image">
                                <div class="card-footer">
                                    <h5 class="card-text text-center">
                                        <?php echo $data['judulfoto'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo $data['userid'] ?>
                                    </p>
                                    <p class="card-text">
                                        <?php echo $data['tanggalunggah'] ?>
                                    </p>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($ceksuka) == 1) { ?>
                                        <a href="proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                            name="batalsuka">
                                            <i class="fa fa-heart"></i></a>
                                    <?php } else { ?>
                                        <a href="proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka">
                                            <i class="fa-regular fa-heart"></i></a>
                                    <?php }
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


                    $query = mysqli_query($conn, "SELECT * FROM foto WHERE userid='$userid'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <img style="height:12rem;" class="card-img-top"
                                    src="assets/img/<?php echo $data['lokasifile'] ?>" alt="Card image">
                                <div class="card-footer">
                                    <h5 class="card-text text-center">
                                        <?php echo $data['judulfoto'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo $data['userid'] ?>
                                    </p>
                                    <p class="card-text">
                                        <?php echo $data['tanggalunggah'] ?>
                                    </p>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($ceksuka) == 1) { ?>
                                        <a href="proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                            name="batalsuka">
                                            <i class="fa fa-heart"></i></a>
                                    <?php } else { ?>
                                        <a href="proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka">
                                            <i class="fa-regular fa-heart"></i></a>
                                    <?php }
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


    </main>
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

