/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.1.31-MariaDB : Database - pdo_crud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`pdo_crud` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pdo_crud`;

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `fakultas` */

insert  into `fakultas`(id,fakultas) values (1,'Fakultas Teknik'),(2,'Fakultas Ekonomi'),(3,'FMIPA');

/*Table structure for table `prodi` */

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(40) NOT NULL,
  `id_fakultas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `prodi` */

insert  into `prodi`(id,prodi,id_fakultas) values (1,'S1 Teknik Informatika',1),(2,'S1 Sistem Informasi',1),(3,'S1 PTI',1),(4,'D3 Manajemen Informatika',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(id,username,userimage,userJk,userprodi,fakultas,nim,tgl_lahir,alamat,kota,email,created_at) values (1,'amrina','','pilih jenis kelamin','D3 Manajemen Informatika','Fakultas Teknik',1782,'0000-00-00','surabaya','Jogja','nengamrinar99@gmail.','2019-05-26 09:45:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
