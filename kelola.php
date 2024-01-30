<?php
include'config.php';
$id_pendaftaran = '';
$nama = '';
$alamat = '';
$kelamin ='';
$agama= '';
$sekolah_asal = '';
$tanggal_lahir = '';
$notelepon ='';
$email ='';
$desa = '';
$kecamatan = '';
$kabupaten = '';
$provinsi = '';
$kodePos = '';

if(isset($_GET['edit'])){
  $id_pendaftaran=$_GET['edit'];
  $sql = "SELECT * FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
  $query = mysqli_query($db,$sql);
  $result = mysqli_fetch_assoc($query);
  $nama = $result['nama'];
  $alamat = $result['alamat'];
  $kelamin = $result['jenis_kelamin'];
  $agama= $result['agama'];
  $sekolah_asal = $result['sekolah_asal'];
  $tanggal_lahir = $result['tanggal_lahir'];
  $notelepon = $result['no_tel'];
  $email = $result['email'];
  $desa = $result['desa'];
  $kecamatan = $result['kecamatan'];
  $kabupaten = $result['kota'];
  $provinsi = $result['provinsi'];
  $kodePos = $result['kode_pos'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Chichago</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMK Negeri 1 Chichago</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="form-daftar.php">Pendaftaran</a>
      </div>
    </div>
  </div>
</nav>
<div class="container mt-4">
<h2>Formulir Pendaftaran Siswa SMK Negeri 1 Chichago</h2><br>

<form action="proses.php" method="POST">
<input type="hidden" name="id_pendaftaran" value ="<?php echo $id_pendaftaran;?>" />
  <div class="mb-3">
  <label for="nama" class="form-label">Nama: </label>
  <input type="text" class ="form-control" name="nama" value ="<?php echo $nama;?>"placeholder="nama lengkap" />
</div>
<div class="mb-3">
  <label for="alamat" class="form-label">Alamat</label>
  <textarea class="form-control" name="alamat"  rows="3"><?php echo $alamat;?></textarea>
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
<div class="mb-3">
    <label for="agama" class="form-label">Agama: </label>
            <select name="agama" class="form-control">
                <option  <?php if ($agama == 'islam'){echo "selected";}?> value="Islam">Islam</option>
                <option  <?php if ($agama == 'kristen'){echo "selected";}?> value="kristen">Kristen</option>
                <option  <?php if ($agama == 'Hindu'){echo "selected";}?> value="Hindu">Hindu</option>
                <option  <?php if ($agama == 'Budha'){echo "selected";}?> value="Budha">Budha</option>
                <option  <?php if ($agama == 'Atheis'){echo "selected";}?> value="Atheis">Atheis</option>
            </select>
</div>
<div class="mb-3">
    <label for="sekolah_asal" class="form-label">Sekolah Asal: </label>
    <input type="text" class ="form-control" name="sekolah_asal"  value ="<?php echo $sekolah_asal;?>"placeholder="nama sekolah" />
</div>
<div>
<label for="tanggal_lahir" class="form-label">Tanggal lahir: </label>
  <input type="date" class ="form-control" name="tanggal_lahir"  value ="<?php echo $tanggal_lahir;?>" placeholder="tanggal lahir" />
</div>
<div>
<label for="no_telepon" class="form-label">No telepon: </label>
  <input type="text" class ="form-control" name="no_telepon"   value ="<?php echo $notelepon;?>"placeholder="no telepon" />
</div>
<div>
<label for="email" class="form-label">Email: </label>
  <input type="text" class ="form-control" name="email"  value ="<?php echo $email;?>" placeholder="email" />
</div>
<div>
<label for="desa" class="form-label">Desa: </label>
  <input type="text" class ="form-control" name="desa"  value ="<?php echo $desa;?>" placeholder="desa/kelurahan" />
</div>
<div>
<label for="kecamatan" class="form-label">Kecamatan: </label>
  <input type="text" class ="form-control" name="kecamatan"   value ="<?php echo $kecamatan;?>" placeholder="Kecamatan" />
</div>
<div class="mb-3">
    <label for="kabupaten" class="form-label">Kabupaten: </label>
            <select name="kabupaten" class="form-control">
                <option <?php if ($kabupaten == 'Bandung barat'){echo "selected";}?> value="Bandung barat">Bandung barat</option>
                <option <?php if ($kabupaten == 'bandung'){echo "selected";}?> value="bandung">Bandung</option>
                <option <?php if ($kabupaten == 'pangandaran'){echo "selected";}?> value="pangandaran">Pangandaran</option>
                <option <?php if ($kabupaten == 'purwakarta'){echo "selected";}?> value="purwakarta">Purwakarta</option>
                <option <?php if ($kabupaten == 'subang'){echo "selected";}?> value="subang">Subang</option>
                <option <?php if ($kabupaten == 'sukabumi'){echo "selected";}?> value="sukabumi">Sukabumi</option>
                <option <?php if ($kabupaten == 'sumedang'){echo "selected";}?> value="sumedang">Sumedang</option>
                <option <?php if ($kabupaten == 'majalengka'){echo "selected";}?> value="majalengka">Majalengka</option>
                <option <?php if ($kabupaten == 'garut'){echo "selected";}?> value="garut">Garut</option>
                <option <?php if ($kabupaten == 'cianjur'){echo "selected";}?> value="cianjur">Cianjur</option>
                <option <?php if ($kabupaten == 'ciamis'){echo "selected";}?> value="ciamis">Ciamis</option>
                <option <?php if ($kabupaten == 'cirebon'){echo "selected";}?> value="cirebon">Cirebon</option>
            </select>
</div>
<div class="mb-3">
    <label for="provinsi" class="form-label">Provinsi: </label>
            <select name="provinsi" class="form-control">
                <option <?php if ($provinsi == 'Jawa barat'){echo "selected";}?> value="Jawa barat">Jawa barat</option>
                <option <?php if ($provinsi == 'Jawa tengah'){echo "selected";}?> value="Jawa tengah">Jawa tengah</option>
                <option <?php if ($provinsi == 'Dki jakarta'){echo "selected";}?> value="Dki jakarta">Dki jakarta</option>
                <option <?php if ($provinsi == 'Banten'){echo "selected";}?> value="Banten">Banten</option>
                <option <?php if ($provinsi == 'Jawa timur'){echo "selected";}?> value="Jawa timur">Jawa timur</option>
                <option <?php if ($provinsi == 'DI yogyakarta'){echo "selected";}?> value="DI yogyakarta">DI yogyakarta</option>
            </select>
</div>
<div>
<label for="kode_pos" class="form-label">Kode pos: </label>
  <input type="text" class ="form-control" name="kode_pos"  value ="<?php echo $kodePos;?>" placeholder="kode pos" />
</div>
<div class="mb-3 row mt-4">
  <div class ="col">
    <?php
    if(isset($_GET['edit'])){
      ?>
      <button type="submit" name="aksi" value="edit" class="btn btn-primary">
        Simpan
    </button>
    <?php
    }else{
      ?>
      <button type="submit" name="aksi" value="add" class="btn btn-primary">
        Daftar
    </button>
    <?php
    }
    ?>
    <a href ="index.php" type="button" class="btn btn-dangger">Batal</a>
  </div>
</div>
    </form>
</div>
    </body>
</html>