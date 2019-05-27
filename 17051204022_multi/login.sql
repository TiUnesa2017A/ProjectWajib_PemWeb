/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.1.35-MariaDB : Database - login
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`login` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `login`;

/*Table structure for table `loginphp` */

DROP TABLE IF EXISTS `loginphp`;

CREATE TABLE `loginphp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `type` enum('Administrator','Dosen','Mahasiswa') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `loginphp` */

insert  into `loginphp`(id,fullname,email,username,password,type,active,hash) values 
  (14,'adadadasasd','adasdasad@gmail.com','dosen','$2y$10$iQuNn9ZKZUGL3ljOboVjrufB2QU3tbL1qxK/Zzr5S4/laQ0Wnmz2a','Dosen',0,'fc49306d97602c8ed1be1dfbf0835ead'),
  (15,'sadasda','asdadaaad@gmail.com','mahasiswa','$2y$10$OzQYRMo41/f/s8oRQ843eeLQ6QaqXhlO5NQxTTNTM.dHiFhyTT252','Mahasiswa',0,'d707329bece455a462b58ce00d1194c9'),
  (20,'putri','a@gmail.com','puput','$2y$10$W6FeksdB/yk8aIM/cdABK.VRz32mrnFqKCL6mpgM52/R/jCSAN7si','Dosen',0,'37693cfc748049e45d87b8c7d8b9aacd'),
  (21,'putri','putri@gmail.com','ugjgjhgjh','$2y$10$e.h5x83vTq06rA3OI2YqRODY5vJnEGmDGM0eycovXcRBOTb5d/WBO','Administrator',0,'7504adad8bb96320eb3afdd4df6e1f60');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
