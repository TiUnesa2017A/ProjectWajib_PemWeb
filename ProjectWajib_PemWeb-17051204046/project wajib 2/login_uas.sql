-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 04:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginphp`
--

CREATE TABLE IF NOT EXISTS `loginphp` (
`id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `type` enum('Administrator','Dosen','Mahasiswa') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginphp`
--

INSERT INTO `loginphp` (`id`, `fullname`, `email`, `username`, `password`, `type`, `active`, `hash`) VALUES
(20, 'shinta yuan ayu pratiwi', 'shintayuan84h@gmail.com', 'shinta yuan', '$2y$10$mnmFp6vXrTDXc7VhQmhYm.HsvtVnjv/jy1OwGOQUWvFoeWSZD2Gaq', 'Administrator', 0, '41f1f19176d383480afa65d325c06ed0'),
(28, 'shinta yuan', 'shintayuan84@gmail.com', 'shinta', '$2y$10$U2C.NAuqncUZ7.mz6RWcfuqwZNOpj7kaFKnOAISMLYbgmphERYwry', 'Mahasiswa', 0, '250cf8b51c773f3f8dc8b4be867a9a02'),
(30, 'shinta yuan', 'shintayuan84@gmail.com', 'perpus', '$2y$10$6xlu9oyezgEW42QndrjgU.dhno7Ajys6AKTB2mRxFFx5uPqKrBk6C', 'Dosen', 0, 'c45147dee729311ef5b5c3003946c48f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginphp`
--
ALTER TABLE `loginphp`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginphp`
--
ALTER TABLE `loginphp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
