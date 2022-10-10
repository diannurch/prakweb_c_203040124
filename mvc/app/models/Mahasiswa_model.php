<?php

class Mahasiswa_model
{
  private $dbh; //database handler : untuk menampung ke database
  private $stmt; // statement : menyimpan query

  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=localhost;dbname=phpmvc';
    try {
      $this->dbh = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }



  // private $mhs = [
  //   [
  //     "nama" => "Dian Nurcahya Ningrum",
  //     "nrp" => "203040124",
  //     "email" => "diannurcahyaf@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Ayu Putri Dwi Annisa",
  //     "nrp" => "203040166",
  //     "email" => "ayuputri@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Heryani",
  //     "nrp" => "203040169",
  //     "email" => "heryani@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Renandra Rahadian Putri",
  //     "nrp" => "203040153",
  //     "email" => "renandra@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  // ];

  public function getAllMahasiswa()
  {
    $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
