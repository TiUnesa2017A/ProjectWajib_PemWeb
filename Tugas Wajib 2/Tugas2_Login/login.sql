-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 03:51 AM
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
(20, 'Rosida Pujiati', 'rosidapujiati820@gmail.com', 'Rosida', '$2y$10$brkP4TMzHbWgi7GKhfXUO.YEw.bxypG.1cPLSmpi9MbIcEpGMgKFi', 'Mahasiswa', 0, 'd395771085aab05244a4fb8fd91bf4ee'),
(21, 'Ros Ida', 'rosida@gmail.com', 'Ros', '$2y$10$WVqxh1zabIG.F41RDjKXdOqPGIYF18XeZC/C/V534nwoJfuTuB7cO', 'Dosen', 0, 'b137fdd1f79d56c7edf3365fea7520f2'),
(22, 'Rosidacii', 'rosi@gmail.com', 'oci', '$2y$10$S8YnBZSuutV7LwWzTp2GW.Q7HU9C6qAhjhpELxaHQvv61HVKBJg1e', 'Administrator', 0, '06997f04a7db92466a2baa6ebc8b872d');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
