<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

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
  <script src="https://kit.fontawesome.com/105baf2792.js" crossorigin="anonymous"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Font style -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

  <title>Daftar Buku</title>

</head>

<body style=" background: linear-gradient(#051923, #003554);">

  <div class="container">
    <div class="card mt-4" style="border-radius: 10px;  box-shadow: 0 5px 20px rgba(0,0,0,0.5);">
      <div class="card-body text-dark">
        <h2 class="display-1" style="font-family: 'Pattaya'; text-align :center;">Daftar Buku</h2>
        <div class="add mb-3  btn btn-primary bg-gradient rounded-pill" style="width:180px" ;>
          <a href="tambah.php" style="text-decoration:none;color:white;">Tambah Data Buku</a>
        </div>

        <table class="table table-bordered table-striped table-hover text-center" style="background-color: #DCDCDC;">
          <tr>
            <th>No</th>
            <th>Judul buku</th>
            <th>Penerbit</th>
            <th>Pengarang</th>
            <th>Tanggal Terbit</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>

          <?php if (empty($buku)) : ?>
            <tr>
              <td colspan="4">
                <p style="color: red; font-style: italic;">Data Buku tidak ditemukan!</p>
              </td>
            </tr>
          <?php endif; ?>

          <?php $i = 1;
          foreach ($buku as $bk) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $bk['judul_Buku']; ?></td>
              <td><?= $bk['penerbit']; ?></td>
              <td><?= $bk['pengarang']; ?></td>
              <td><?= $bk['tanggal']; ?></td>
              <td><img src="img/<?= $bk['gambar'] ?>" width="100"></td>
              <td><button class="add mb-3 btn btn-primary rounded-pill">
                  <a href="ubah.php?id=<?= $bk['id']; ?>" style="text-decoration:none;color:white;">Ubah</a>
                </button>
                <button class="add mb-3 btn btn-primary rounded-pill">
                  <a href="hapus.php?id=<?= $bk['id']; ?>" onclick="return confirm ('Apakah anda yakin?');" style="text-decoration:none;color:white;">Hapus</a>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <!-- </div> -->
      </div>
    </div>



    <script src="script.js"></script>

</body>

</html>