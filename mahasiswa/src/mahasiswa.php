<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// $anggota = query("SELECT * FROM anggota ORDER BY id DESC");


// $jumlahDataPerHalaman = 200;
// $jumlahData = count(query("SELECT * FROM mahasiswa"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// /// if (isset($_GET["halaman"])), $halamanAktif = (true = $_GET["halaman"]/ else = 1)
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/mahasiswa.css">
    <script src="https://kit.fontawesome.com/8306e7b683.js" crossorigin="anonymous"></script>

    <title>Data Mahasiswa</title>
</head>

<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <!-- text-white-50 -->
            <a class="navbar-brand" href="index.php"><i class="fas fa-home">Dashboard</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Selamat Datang, <?= $_SESSION["username"]; ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
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
            <a href="logout.php" class="btn btn-danger navbar-right"><i class="fas fa-sign-out-alt"> Keluar</i></a>
        </div>
    </nav>

    <?php
    if (isset($_GET["nim"])) {
        $nim = $_GET["nim"];
        if (hapus($nim) > 0) { ?>
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus.
                <a href="mahasiswa.php">(Klik disini untuk refresh)</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="window.location.href = 'mahasiswa.php';">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
        <?php
        } else { ?>
            <div class="alert alert-warning" role="alert">
                Data gagal dihapus.
                <a href="mahasiswa.php">(Klik disini untuk refresh)</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="window.location.href = 'mahasiswa.php';">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
    <?php
        }
    }
    ?>

    <div class="container-fluid float-left">
        <!-- <img src="../img/UNDIP.png" alt="UNDIP" class="float-left UNDIP"> -->
        <h2 class="text-center judul">UNDIP</h2>
        <h4 class="text-center judul">Tabel Data Mahasiswa</h4>
        <hr>
        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <a href="formMahasiswa.php" class="btn btn-success ml-2"><i class="fas fa-plus-circle"> Tambah</i></a>
                </div>
            </div>
        </form>

        <div>
            <table class="table table-striped table-bordered table-sm bg-white">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Prodi</th>
                        <?php if (isset($_SESSION["tu_fakultas"])) { ?>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php if ($halamanAktif == 1) {
                                $i = 1;
                            } else {
                                $i = 200 * $halamanAktif - 200 + 1;
                            }
                            ?> -->
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $row) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td><?= $row["nim"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["tanggal_lahir"]; ?></td>
                            <td><?= $row["gender"]; ?></td>
                            <td><?= $row["agama"]; ?></td>
                            <td><?= $row["id_fakultas"]; ?></td>
                            <td><?= $row["id_prodi"]; ?></td>
                            <?php if (isset($_SESSION["tu_fakultas"])) {
                                if ($_SESSION["tu_fakultas"] == $row["id_fakultas"]) {
                            ?>
                                    <td><a href="updateMahasiswa.php?nim=<?= $row["nim"]; ?>"><i class=" fas fa-pencil-alt"></i></a></td>
                                    <td><a href="mahasiswa.php?nim=<?= $row["nim"]; ?>" onclick="return confirm('Apakah anda yakin menghapus data?');"><i class="fas fa-trash-alt text-danger"></i></a></td>
                            <?php }
                            }  ?>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="../script/script.js"></script>
</body>

</html>