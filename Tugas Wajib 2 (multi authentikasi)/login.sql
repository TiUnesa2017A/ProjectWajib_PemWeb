-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2019 pada 07.55
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `loginphp`
--

CREATE TABLE `loginphp` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `type` enum('Administrator','Dosen','Mahasiswa') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loginphp`
--

INSERT INTO `loginphp` (`id`, `fullname`, `email`, `username`, `password`, `type`, `active`, `hash`) VALUES
(11, 'fahri', 'fahri@gmail.com', 'fahri', '$2y$10$1wPZPWYtxesJzQySRrwT4OdusZ1gobsxNl8xsedkNC3ncxU7u.2LS', 'Administrator', 0, '11b921ef080f7736089c757404650e40'),
(12, 'fahrimm', 'fahri111@gmail.com', 'fahri123', '$2y$10$uC7WIxS6cABd3XArf8bTgefoYW6x8.002HZKypEUqhekEiMOWcUda', 'Administrator', 0, 'fe8c15fed5f808006ce95eddb7366e35'),
(13, 'aaa', 'aaaaaa@gmail.com', 'aaaaa', '$2y$10$T4ZYpB9zG8DlPjJUeDlYcOvIM0ASqD6H2wPSYjnUdObtetChaDN4e', 'Administrator', 0, '3435c378bb76d4357324dd7e69f3cd18'),
(14, 'adadadasasd', 'adasdasad@gmail.com', 'dosen', '$2y$10$iQuNn9ZKZUGL3ljOboVjrufB2QU3tbL1qxK/Zzr5S4/laQ0Wnmz2a', 'Dosen', 0, 'fc49306d97602c8ed1be1dfbf0835ead'),
(15, 'sadasda', 'asdadaaad@gmail.com', 'mahasiswa', '$2y$10$OzQYRMo41/f/s8oRQ843eeLQ6QaqXhlO5NQxTTNTM.dHiFhyTT252', 'Mahasiswa', 0, 'd707329bece455a462b58ce00d1194c9'),
(19, 'fahri', 'fahrim27@gmail.com', 'fahrim27', '$2y$10$aa4JMc1tDVs.WOQH3BxwLeq2dxZUhRC5jSHkZPNx7C0Q08yGHVAPO', 'Administrator', 0, 'e6cb2a3c14431b55aa50c06529eaa21b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `loginphp`
--
ALTER TABLE `loginphp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `loginphp`
--
ALTER TABLE `loginphp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
