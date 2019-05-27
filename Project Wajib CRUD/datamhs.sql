/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.13 : Database - datamhs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`datamhs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `datamhs`;

/*Table structure for table `mhs` */

DROP TABLE IF EXISTS `mhs`;

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) DEFAULT NULL,
  `namamhs` varchar(50) DEFAULT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `prodi` varchar(20) DEFAULT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  `image_name` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `mhs` */

insert  into `mhs`(id,nim,namamhs,jk,prodi,fakultas,image_name) values (17,'17051204123','Kim Chaewon','Perempuan','Teknik Informatika','teknik','chaeyeon.jpg'),(18,'17051204123','Kim Chaewon','Perempuan','Teknik Informatika','teknik','chaeyeon.jpg'),(19,'17051204123','Kim Chaewon','Perempuan','Teknik Informatika','teknik','eunbi.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
