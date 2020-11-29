<?php
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $gender = htmlspecialchars($data["gender"]);
    $agama = htmlspecialchars($data["agama"]);
    $id_fakultas = htmlspecialchars($data["id_fakultas"]);
    $id_prodi = htmlspecialchars($data["id_prodi"]);

    $query = "INSERT INTO mahasiswa VALUES 
            ('$nim', '$nama',  '$alamat', '$tanggal_lahir', '$gender', '$agama', '$id_fakultas', '$id_prodi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($nim)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = $nim");
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $id = htmlspecialchars($data["id"]);
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $gender = htmlspecialchars($data["gender"]);
    $agama = htmlspecialchars($data["agama"]);
    $id_fakultas = htmlspecialchars($data["id_fakultas"]);
    $id_prodi = htmlspecialchars($data["id_prodi"]);

    $query = "UPDATE mahasiswa SET
            nim = '$nim', nama = '$nama',  alamat = '$alamat', tanggal_lahir = '$tanggal_lahir', gender = '$gender', 
            agama = '$agama', id_fakultas = '$id_fakultas', id_prodi = '$id_prodi'
            WHERE nim = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
