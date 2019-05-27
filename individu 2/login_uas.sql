/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.1.38-MariaDB : Database - login_uas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`login_uas` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `login_uas`;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `loginphp` */

insert  into `loginphp`(id,fullname,email,username,password,type,active,hash) values (33,'malik','malikdwi30@gmail.com','malik','$2y$10$D/jzYcVVB0S9n7tpOdrpEuSmR/noSNDUS0221Hrd7YBYWb9W6xamC','Administrator',0,'0efe32849d230d7f53049ddc4a4b0c60'),(34,'malik123','malik.17051204024@mhs.unesa.ac.id','malik123','$2y$10$LJtPrVsJG6oH3DpPSxQy6.SXEPJc/CpwPDuJIWkU8W/1g3JqDb3zi','Dosen',0,'33e8075e9970de0cfea955afd4644bb2'),(35,'malikdwi','malikdwi25@gmail.com','malikdwi','$2y$10$O3txbFB69MFKbE1/5zXCu.rci5lIZumj/HG3TqseBn4j/LlQjSL86','Mahasiswa',0,'85422afb467e9456013a2a51d4dff702');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
