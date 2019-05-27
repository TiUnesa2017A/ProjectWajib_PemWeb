-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2019 pada 17.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
(20, 'Ayyu Faridhatul Masrura', 'ayyu.17051204017@mhs.unesa.ac.id', 'ayyufm', '$2y$10$j0ONcPSmLHOl3uD7EsjGROT3GRG30izqYHc3P5c0knDIjMbAVFnFO', 'Administrator', 0, '788d986905533aba051261497ecffcbb'),
(21, 'AyyuF', 'ayyu.17051204017@mhs.unesa.ac.id', 'ayyuf', '$2y$10$icQ2UntRqfhaC1gq7mDLXefVrKsPBlA5Ns8.JI5tqF0nSJjQbFUOW', 'Dosen', 0, '9b698eb3105bd82528f23d0c92dedfc0'),
(22, 'Ayyu F. M', 'ayyu@gmail.com', 'ayyuff', '$2y$10$kCr.krrag.D7T4Bn5LjVvOES/lY/OVvhheyVqVC1GIUvh.N/AXp9a', 'Mahasiswa', 0, 'e7f8a7fb0b77bcb3b283af5be021448f'),
(23, 'Ayyu', 'Ayyu@gmail.com', 'Ayyu', '$2y$10$MtSbJ4ySbWUsWF4/VZ838.dch0MsOAg0hjS7UAx4CJWU6SCxfl80W', 'Mahasiswa', 0, '85fc37b18c57097425b52fc7afbb6969');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
