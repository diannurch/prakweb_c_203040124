<?php
session_start();
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
              </script>";
  } else {
    echo "data gagal ditembahkan!";
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
  <title>Tambah Data Buku</title>
</head>

<body style="background: linear-gradient(#051923, #003554);">

  <div class="container">
    <h3 class="text-center pt-4" style="font-family:  'Pattaya', sans-serif; color :  #EAECEE;">FORM TAMBAH DATA BUKU</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <br>
      <div class="container">
        <div class="row justify-content-evenly">
          <div class="col-md-4">
            <div class="border p-3 bg-light text-center" style="border-radius: 10px;  box-shadow: 0 5px 20px rgba(0,0,0,0.5);">
              <label for="gambar" class="pt-2">Gambar :</label><br><br>
              <img src="img/nofoto.png" width="200" class="img-preview"><br><br>
              <input type="file" name="gambar" class="gambar" onchange="previewImage()" id="gambar"><br><br>

              <button type="submit" name="tambah" style="background-color:   #85929E;">Tambah Data!</button>
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
                <input type="text" name="judul_Buku" id="judul_Buku" autofocus required class="form-control" id="exampleInputName">
              </div>
              <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit :</label><br>
                <input type="text" name="penerbit" id="penerbit" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang :</label><br>
                <input type="text" name="pengarang" id="pengarang" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal :</label><br>
                <input type="date" name="tanggal" id="tanggal" required class="form-control">
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="script.js"></script>

</body>

</html>

<!-- <body>
  <div class="container ">
    <div class="card mt-5 bg-dark text-light">
      <div class="card-body text-light">
        <h3>Tambah Data Buku</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <ul>
            <li>
              <label>
                Judul Buku :
                <input type="text" name="judul_Buku" required>
              </label>
            </li>
            <li>
              <label>
                Penerbit :
                <input type="text" name="penerbit" required>
              </label>
            </li>
            <li>
              <label>
                Pengarang :
                <input type="text" name="pengarang" required>
              </label>
            </li>
            <li>
              <label>
                Tanggal :
                <input type="date" name="tanggal" required>
              </label>
            </li>
            <li>
              <label>
                Gambar :
                <input type="file" name="gambar" class="gambar" onchange="previewImage()">
              </label>
              <img src="img/nofoto.png" width="120" style="display: block;" class="img-Preview">
            </li>
            <li>
              <button class="add mb-3 btn btn-primary rounded-pill" type="submit" name="tambah">Tambah Data</button>
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

  <script src="script.js"></script>
</body> -->

</html>