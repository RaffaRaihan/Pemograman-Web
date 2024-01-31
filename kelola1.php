<?php
include'config.php';
    $id ='';
    $nama ='';
    $alamat = '';
    $kelamin ='';
    $notelepon ='';
    $email ='';

    if(isset($_GET['edit'])){
      $id=$_GET['edit'];
      $sql = "SELECT * FROM Guru WHERE id_guru='$id';";
      $query = mysqli_query($db,$sql);
      $result = mysqli_fetch_assoc($query);
      $nama = $result ['nama_guru'];
      $alamat = $result ['alamat'];
      $kelamin = $result ['jenis_kelamin'];
      $notelepon = $result ['no_telepon'];
      $email = $result ['email'];
    }
    ?>
<!DOCTYPE html>
<html>
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
<h2>Formulir Pendaftaran Guru Siswa SMK Negeri 1 Lagos</h2><br>
<form action="proses1.php" method="POST">
<input type="hidden" name="id_guru" value ="<?php echo $id;?>" />
<div class="mb-3">
  <label for="nama_guru" class="form-label">Nama guru: </label>
  <input type="text" class ="form-control" name="nama_guru" value="<?php echo $nama;?>"placeholder="nama_guru" />
</div>
<div class="mb-3">
  <label for="alamat" class="form-label">Alamat</label>
  <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat;?></textarea>
</div>
<div class="mb-3">
<div class="form-check">
<label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label><br>
  <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($kelamin == 'laki-laki'){echo "checked";}?> value="laki-laki">
  <label class="form-check-label" for="laki-laki">Laki-Laki</label><br>
  <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($kelamin == 'perempuan'){echo "checked";}?> value="perempuan">
  <label class="form-check-label" for="laki-laki">Perempuan</label>
</div>
</div>
<div>
<label for="no_telepon" class="form-label">no telepon: </label>
  <input type="text" class ="form-control" name="no_telepon" value ="<?php echo $notelepon;?>" placeholder="no telepon" />
</div>
<div>
<label for="email" class="form-label">Email: </label>
  <input type="text" class ="form-control" name="email" value ="<?php echo $email;?>" placeholder="email" />
</div>
<div class="mb-3 row mt-4">
  <div class ="col">
    <?php
    if(isset($_GET['edit'])){
      ?>
      <button type="submit" name="aksi" value="edit" class="btn btn-primary">
        simpan perubahan
    </button>
    <?php
    }else{
      ?>
      <button type="submit" name="aksi" value="add" class="btn btn-primary">
        Daptar
    </button>
    <?php
    }
    ?>
    <a href ="index2.php" type="button" class="btn btn-dangger">Batal</a>
  </div>
</div>
    </form>
</div>
    </body>
</html>
