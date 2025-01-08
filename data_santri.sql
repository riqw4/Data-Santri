-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2025 pada 19.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_santri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_santri`
--

CREATE TABLE `data_santri` (
  `id` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jkel` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_santri`
--

INSERT INTO `data_santri` (`id`, `nama`, `alamat`, `jkel`, `kelas`) VALUES
(5, 'Muhammad Naufal Arsyi', 'Kranji RT. 03/04 Kedungwuni Pekalongan Jawa Tengah', 'Laki-laki', 'Tiga'),
(7, 'Abdul', 'Purbalingga', 'Laki-laki', 'Tiga'),
(8, 'Akmila', 'Kranji', 'Perempuan', 'Satu'),
(12, 'Alex', 'Kediri', 'Laki-laki', 'Satu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
