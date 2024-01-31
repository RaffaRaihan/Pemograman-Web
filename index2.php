<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Data Guru SMK Negeri 1 Lagos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="halaman.php">Home</a>
        <a class="nav-link" href="form-daftar-guru.php">Pendaftaran</a>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-4">
        <h2>Data Guru</h2><br>
        <a class="btn btn-primary" href="kelola1.php" role="button">Tambah Data</a>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Nama Guru</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM guru";
                $query = mysqli_query($db, $sql);
                while($guruu = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$guruu['id_guru']."</td>";
                    echo "<td>".$guruu['nama_guru']."</td>";
                    echo "<td>".$guruu['alamat']."</td>";
                    echo "<td>".$guruu['jenis_kelamin']."</td>";
                    echo "<td>".$guruu['no_telepon']."</td>";
                    echo "<td>".$guruu['email']."</td>";
                    echo "<td>
                    <a href='kelola1.php?edit=" . $guruu['id_guru'] . "' class='btn btn-warning'>Edit</a>
                    <a href='proses1.php?delete=" . $guruu['id_guru'] . "' class='btn btn-danger'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>