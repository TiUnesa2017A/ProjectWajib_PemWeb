-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2019 at 01:28 
-- Server version: 5.5.13
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `fakultas`) VALUES
(1, 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(40) NOT NULL,
  `id_fakultas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`, `id_fakultas`) VALUES
(1, 'S1 Teknik Informatika', 1),
(2, 'S1 Sistem Informasi', 1),
(3, 'S1 PTI', 1),
(4, 'D3 Manajemen Informatika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `userimage` varchar(40) NOT NULL,
  `userJk` varchar(40) NOT NULL,
  `userprodi` varchar(40) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `nim` int(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userimage`, `userJk`, `userprodi`, `fakultas`, `nim`, `tgl_lahir`, `alamat`, `kota`, `email`, `created_at`) VALUES
(33, 'rifaagnes', 'icon murid.png', 'Perempuan', 'S1 Teknik Informatika', 'Fakultas Teknik', 1234567, '2017-03-01', 'Pepe', 'Surabaya', 'inisaya@gmail', '2019-05-26 23:39:13'),
(34, 'farahvi', 'guru.png', 'Laki-laki', 'S1 Sistem Informasi', 'Fakultas Teknik', 7654321, '2016-01-07', 'Pepe', 'Jakarta', 'iya@gmail.com', '2019-05-27 00:18:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
