<?php
session_start();
require 'functions.php';

// jika tidak ada id di URL
if (!isset($_GET['id'])) {
  header("location: index.php");
  exit;
}

// ambil id dari URl
$id = $_GET['id'];

// cari handphone berdasarkan id
$bk = query("SELECT *FROM buku WHERE id= $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
              </script>";
  } else {
    echo "data gagal diubah!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Import bootsrap.css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Font style -->
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <title>Ubah Data buku</title>
</head>


<body style=" background: linear-gradient(#051923, #003554);">

  <div class="container">
    <h3 class="text-center pt-4" style="font-family:  'cursive', sans-serif;
color :  #EAECEE;">Form Ubah Data Buku</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id" value="<?= $bk['id']; ?>">
      <br>
      <div class="container">
        <div class="row justify-content-evenly">
          <div class="col-md-4">
            <div class="border p-3 bg-light text-center" style="border-radius: 10px;  box-shadow: 0 5px 20px rgba(0,0,0,0.5);">
              <input type="hidden" name="gambar_lama" value="<?= $bk['gambar']; ?>">
              <label for="gambar">Gambar :</label><br><br>
              <img src="img/<?= $bk['gambar']; ?>" width="200" class="img-preview"><br><br>
              <input type="file" name="gambar" class="gambar" onchange="previewImage()" id="gambar"><br><br>
              <button type="submit" name="ubah" style="background-color:   #85929E;">Ubah Data!</button>
              <button type="submit" style="background-color:  #34495E; ;">
                <a style="color: black;" href="index.php">Kembali</a>
              </button>
              <br><br>
            </div>
            <br>
          </div>
          <div class="col-md-4">
            <div class="p-3 border bg-light" style="border-radius: 10px;  box-shadow: 0 5px 20px rgba(0,0,0,0.5);">
              <div class="mb-3">
                <label for="judul_Buku" class="form-label">Judul Buku :</label><br>
                <input type="text" name="judul_Buku" id="judul_Buku" autofocus required value="<?= $bk['judul_Buku']; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit :</label><br>
                <input type="text" name="penerbit" id="penerbit" required class="form-control" value="<?= $bk['penerbit']; ?>">
              </div>
              <div class="mb-3">
                <label for="pengarang" class="form-label">pengarang :</label><br>
                <input type="text" name="pengarang" id="pengarang" required class="form-control" value="<?= $bk['pengarang']; ?>">
              </div>
              <div class="mb-3">
                <label for="tanggal" class="form-label">tanggal :</label><br>
                <input type="text" name="tanggal" id="tanggal" required class="form-control" value="<?= $bk['tanggal']; ?>">
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </div>


      <!-- <input type="hidden" name="gambar_lama" value="<?= $bk['picture']; ?>">
                <label for="picture">Picture :</label><br><br>
                <img src="../assets/img/<?= $p['picture']; ?>" width="100" class="img-preview"><br><br>
                <input type="file" name="picture" class="gambar" onchange="previewImage()" id="picture"><br><br>
            -->

    </form>
  </div>

  <script src="../js/script.js"></script>

</body>

</html>

<!-- <body>
  <div class="container ">
    <div class="card mt-5 bg-dark text-light">
      <div class="card-body text-light">
        <h3>Ubah Data Buku</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $bk['id']; ?>">
          <ul>

            <li>
              <label>
                Judul Buku :
                <input type="text" name="judul_Buku" required value="<?= $bk['judul_Buku']; ?>">
              </label>
            </li>
            <li>
              <label>
                Penerbit :
                <input type="text" name="penerbit" required value="<?= $bk['penerbit']; ?>">
              </label>
            </li>
            <li>
              <label>
                Pengarang :
                <input type="text" name="pengarang" required value="<?= $bk['pengarang']; ?>">
              </label>
            </li>
            <li>
              <label>
                Tanggal :
                <input type="text" name="tanggal" required value="<?= $bk['tanggal']; ?>">
              </label>
            <li>
            <li>
              <input type="hidden" name="gambar_lama" required value="<?= $bk['gambar']; ?>">
              <label>
                Gambar :
                <input type="file" name="gambar" class="gambar" onchange="previewImage()">
              </label>
              <img src="img/<?= $bk['gambar']; ?>" width="120" style="display: block;" class="img-Preview">
            </li>
            <button class="add mb-3 btn btn-primary rounded-pill" type="submit" name="ubah">ubah Data</button>
            </li>
            <li>
              <button class="add mb-3 btn btn-primary rounded-pill">
                <a href="index.php" style="text-decoration:none;color:white;">Kembali</a>
              </button>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</body>

</html> -->