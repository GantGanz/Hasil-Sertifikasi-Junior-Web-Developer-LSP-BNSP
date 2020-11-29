-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2020 pada 08.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Kedokteran'),
(2, 'Teknik'),
(3, 'Perikanan dan Ilmu Kelautan'),
(4, 'Sains dan Matematika'),
(5, 'Ekonomika dan Bisnis'),
(6, 'Peternakan dan Pertanian'),
(7, 'Hukum'),
(8, 'Ilmu Budaya'),
(9, 'Ilmu Sosial dan Ilmu Politik'),
(10, 'Kesehatan Masyarakat'),
(11, 'Psikologi'),
(12, 'Pasca Sarjana'),
(13, 'Sekolah Vokasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `id_fakultas` varchar(20) NOT NULL,
  `id_prodi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `tanggal_lahir`, `gender`, `agama`, `id_fakultas`, `id_prodi`) VALUES
('240601117140099', 'Muhammad', 'Semarang', '2001-02-02', 'Laki-Laki', 'Islam', '2', '4'),
('24060117140089', 'Angger', 'Tembeling', '2000-03-05', 'Laki-Laki', 'Islam', '1', '1'),
('24060117140090', 'Elegant', 'Bojonegoro', '0003-03-03', 'Laki-Laki', 'Islam', '1', '1'),
('24060117140098', 'Cici', 'Jakarta', '2000-01-01', 'Perempuan', 'Kristen', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(60) NOT NULL,
  `id_fakultas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id_fakultas`) VALUES
(1, 'Farmasi', '1'),
(2, 'Kedokteran', '1'),
(3, 'Keperawatan', '1'),
(4, 'Teknik Sipil', '2'),
(5, 'Teknik Elektro', '2'),
(6, 'Teknik Kimia', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(11) NOT NULL,
  `id_fakultas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `id_fakultas`) VALUES
('Aka1', 'Aka1', 2, '1'),
('Aka2', 'Aka2', 2, '2'),
('TU1', 'TU1', 1, '1'),
('TU2', 'TU2', 1, '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
