-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 04:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

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
-- Table structure for table `loginphp`
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
-- Dumping data for table `loginphp`
--

INSERT INTO `loginphp` (`id`, `fullname`, `email`, `username`, `password`, `type`, `active`, `hash`) VALUES
(24, 'Arum Dewi', 'arum@gmail.com', 'Arum', '$2y$10$zz5swvRPIf.JQzhF.k.QJOCFStZqWWdEq1VY4Bf2ApA9bu1X0zR8S', 'Administrator', 0, '15de21c670ae7c3f6f3f1f37029303c9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginphp`
--
ALTER TABLE `loginphp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginphp`
--
ALTER TABLE `loginphp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
