-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 08.20
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`) VALUES
(4, 7, '2024-05-27 12:56:43'),
(5, 7, '2024-05-27 13:03:30'),
(6, 7, '2024-05-27 13:07:56'),
(7, 7, '2024-05-27 13:08:58'),
(8, 7, '2024-05-27 13:09:19'),
(9, 7, '2024-05-27 13:10:57'),
(10, 7, '2024-05-27 13:13:34'),
(11, 7, '2024-05-27 13:15:36'),
(12, 7, '2024-05-27 13:21:53'),
(13, 7, '2024-05-27 13:29:14'),
(14, 7, '2024-05-27 13:29:48'),
(15, 6, '2024-05-27 13:58:37'),
(16, 7, '2024-05-27 14:02:47'),
(17, 7, '2024-05-27 14:06:51'),
(18, 6, '2024-05-27 14:13:07'),
(19, 7, '2024-05-27 14:14:55'),
(20, 6, '2024-05-27 14:19:58'),
(21, 7, '2024-05-28 01:01:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `angkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`user_id`, `nama`, `nim`, `prodi`, `fakultas`, `username`, `password`, `address`, `latitude`, `longitude`, `angkatan`) VALUES
(6, 'AHMAD FARHAN ', '112209100085', 'TEKNIK INFORMATIKA', 'SAINS', 'farhan21', '123', 'Sariak', -7.38581, 146.745, ''),
(7, 'Nadya', '20123121', 'Kedokteran', 'Kesehatan', 'nad', '123', 'Solok', -0.932231, 100.804, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mahasiswa` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
