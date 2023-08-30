-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 13.43
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwdtugas1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `no_id` int(11) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pw` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`no_id`, `user_email`, `user_pw`) VALUES
(1, 'coba@gmail.com', 'coba123'),
(19, 'test@gmail.com', 'test123'),
(22, 'nadia@gmail.com', 'nadnad123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas1`
--

CREATE TABLE `tugas1` (
  `id` int(11) NOT NULL,
  `nama_jwdtugas1` varchar(100) DEFAULT NULL,
  `email_jwdtugas1` varchar(50) DEFAULT NULL,
  `komentar_jwdtugas1` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas1`
--

INSERT INTO `tugas1` (`id`, `nama_jwdtugas1`, `email_jwdtugas1`, `komentar_jwdtugas1`) VALUES
(33, 'NADIA', 'nadia@gmail.com', 'HALO!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `webme`
--

CREATE TABLE `webme` (
  `id` varchar(10) NOT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `email_pengirim` varchar(50) DEFAULT NULL,
  `pesan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `webme`
--

INSERT INTO `webme` (`id`, `nama_pengirim`, `email_pengirim`, `pesan`) VALUES
('11', 'nadia', 'nadia@gmail.com', 'HALO'),
('15', 'HAI', 'cek@gmail.com', 'COBA-COBA'),
('3', 'percobaan@gmail.com', 'coba@gmail.com', 'Good Job');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`no_id`);

--
-- Indeks untuk tabel `tugas1`
--
ALTER TABLE `tugas1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `webme`
--
ALTER TABLE `webme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tugas1`
--
ALTER TABLE `tugas1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
