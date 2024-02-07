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
        <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
        <a class="nav-link" href="kelola1.php">Pendaftaran</a>
        <a class="nav-link" href="kelola1.php">Data guru</a>
        <a class="nav-link" href="data_upload.php">Data upload</a>
      </div>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <h2>Form Upload File</h2><br>
    <form method="post" enctype="multipart/form-data" action="upload.php">
        <div class="mb-3">
            <label for="foto" class="form-label">Foto : </label>
            <input type="file" class="form-control" name="gambar"/>
        </div>
        <div class="mb-3 row mt-4">
            <div class="col">
                <button type="submit" name="save" value="add" class="btn btn-primary">
                    Daftar
                </button>
                <a href="data-upload.php" type="button" class="btn btn-danger">Batal</a>
            </div>
        </div>
</form>
</div>
</body>
</html>