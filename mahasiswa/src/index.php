<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://kit.fontawesome.com/8306e7b683.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>
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
                    <?php if (isset($_SESSION["tu_fakultas"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link ml-1" href="fakultas.php"><i class="fas fa-hotel"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-1" href="prodi.php"><i class="fas fa-dna"></i></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            </ul>
        </div>
        <a href="logout.php" class="btn btn-danger navbar-right"><i class="fas fa-sign-out-alt"> Keluar</i></a>
        </div>
    </nav>

    <div class="container-fluid small">
        <div class="card-deck mx-auto mt-3">
            <div class="row">
                <div class="col">
                    <div class="card border-success h-100" onclick="location.href='dataAnggota.php'">
                        <img src="../img/users-solid.png" class="card-img-top mx-auto gambarkartu" alt="Gambar orang-orang">
                        <div class="card-body">
                            <h5 class="card-title text-center">Entry Data Anggota</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container small">
        <?php if (isset($_SESSION["tu_fakultas"])) { ?>
            <hr>
            <div class="text-center">
                <h5>Fitur Tambahan untuk Tata Usaha</h5>
            </div>
            <div class="card-deck mx-auto mt-3">
                <div class="card border-dark" onclick="location.href='fakultas.php'">
                    <img src="../img/hotel-solid.png" class="card-img-top mx-auto gambarkartu" alt="Gambar fakultas">
                    <div class="card-body">
                        <h5 class="card-title text-center">Data Fakultas</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-primary h-100" onclick="location.href='prodi.php'">
                        <img src="../img/dna-solid.png" class="card-img-top mx-auto gambarkartu" alt="Gambar mutasi">
                        <div class="card-body">
                            <h5 class="card-title text-center">Data Prodi</h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
    <br>

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