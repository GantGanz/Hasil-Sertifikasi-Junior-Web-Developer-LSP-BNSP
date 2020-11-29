<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

$daftar_fakultas = query("SELECT * FROM fakultas WHERE id_fakultas = " . $_SESSION["tu_fakultas"] . "");
$daftar_prodi = query("SELECT * FROM prodi");
// , fakultas WHERE prodi.id_fakultas =  fakultas.id_fakultas
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/formMahasiswa.css">
  <script src="https://kit.fontawesome.com/8306e7b683.js" crossorigin="anonymous"></script>

  <title>Form Mahasiswa</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand text-white-50" href="index.php"><i class="fas fa-home">Dashboard</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Selamat Datang, <?= $_SESSION["username"]; ?><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-3" href="mahasiswa.php"><i class="fas fa-users"></i></a>
          </li>
          <!-- <?php if (isset($_SESSION["tu_fakultas"])) { ?>
            <li class="nav-item">
              <a class="nav-link ml-1" href="fakultas.php"><i class="fas fa-hotel"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link ml-1" href="prodi.php"><i class="fas fa-dna"></i></a>
            </li>
          <?php } ?> -->
        </ul>
      </div>
      </ul>
    </div>
    <a href="logout.php" class="btn btn-danger navbar-right"><i class="fas fa-sign-out-alt"> Keluar</i></a>
    </div>
  </nav>

  <?php
  if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) { ?>
      <div class="alert alert-success" role="alert">
        Data berhasil ditambahkan, <a href="mahasiswa.php" class="alert-link">Klik disini untuk melihat tabel</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times</span>
        </button>
      </div>
    <?php
    } else { ?>
      <div class="alert alert-warning" role="alert">
        Data gagal ditambahkan <a href="mahasiswa.php" class="alert-link">Klik disini untuk melihat tabel</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times</span>
        </button>
      </div>
  <?php
    }
  }
  ?>

  <div class="container formcontainer border border-dark mt-4">
    <h2 class="alert alert-primary text-center mt-3 font-weight-bold">Form Data Mahasiswa</h2>
    <a href="mahasiswa.php" class="kembali btn btn-secondary ml-2 printInv"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
    <form action="" method="POST" class="font-weight-bold">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="NIM">NIM : </label>
            <input id="NIM" type="number" name="nim" class="form-control" placeholder="Masukkan NIM" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="Nama">Nama : </label>
            <input id="Nama" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required autocomplete="off">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="Alamat">Alamat : </label>
            <input id="Alamat" type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="TanggalLahir">Tanggal Lahir : </label>
            <input id="TanggalLahir" type="date" name="tanggal_lahir" class="form-control" placeholder="dd-mmm-yyyy" required autocomplete="off">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="Gender">Gender : </label><br>
            <input type="radio" name="gender" value="Laki-Laki" checked required> Laki-laki<br>
            <input type="radio" name="gender" value="Perempuan"> Perempuan<br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="Agama">Agama : </label>
            <input id="Agama" type="text" name="agama" class="form-control" placeholder="Masukkan Agama" required autocomplete="off">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="Fakultas">Fakultas : </label>
            <select id="Fakultas" class="form-control" name="id_fakultas">
              <?php foreach ($daftar_fakultas as $row) : ?>
                <option value="<?= $row["id_fakultas"]; ?>"><?= $row["nama_fakultas"]; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="Prodi">Prodi : </label>
            <select id="Prodi" class="form-control" name="id_prodi">
              <?php foreach ($daftar_prodi as $row) : ?>
                <option value="<?= $row["id_prodi"]; ?>"><?= $row["nama_prodi"]; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>
      <button type="reset" class="btn btn-danger mt-2"><i class="fas fa-trash"> RESET</i></button>
      <button type="submit" name="submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-save"> SIMPAN</i></button>
    </form>
    <br>
  </div>
  <br><br>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>