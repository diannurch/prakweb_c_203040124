<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040124_pw');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['ukuran'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // tidak ada gambar yang di pilih
  if ($error == 4) {
    // echo "<script>
    //      alert('pilih gambar terlebih dahulu');
    //      </script>";
    return 'nofoto.png';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    "<script>
         alert('yang anda pilih bukan gambar!');
        </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
               alert('yang anda pilih bukan gambar!');
              </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5Mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
             alert('ukuran gambar terlalu besar!');
             </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

// ubah
function ubah($data)
{
  $conn = koneksi();

  $id = ($data['id']);
  $judul_Buku = htmlspecialchars($data['judul_Buku']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tanggal = htmlspecialchars($data['tanggal']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nofoto.png') {
    $gambar = $gambar_lama;
  }


  $query = "UPDATE buku SET
               judul_Buku = '$judul_Buku',
               penerbit = '$penerbit',
               pengarang = '$pengarang',
               tanggal = '$tanggal',
               gambar = '$gambar'
               WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

//tambah
function tambah($data)
{
  $conn = koneksi();

  // $Gambar = htmlspecialchars($data['gambar']);
  $judul_Buku = htmlspecialchars($data['judul_Buku']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tanggal = htmlspecialchars($data['tanggal']);
  $gambar_lama = htmlspecialchars($data['gambar']);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nofoto.png') {
    $gambar = $gambar_lama;
  }

  $query = "INSERT INTO 
               buku
              VALUES
              ('', '$judul_Buku','$penerbit', '$pengarang','$tanggal', '$gambar');
              ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


//hapus
function hapus($id)
{
  $conn = Koneksi();

  // meghapus gambar di folder img
  $bk = query("SELECT * FROM buku WHERE id = $id");
  if ($bk['gambar'] != 'nofoto.png') {
    unlink('img/' . $bk['gambar']);
  }

  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
