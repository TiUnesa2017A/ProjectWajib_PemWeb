/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.1.38-MariaDB : Database - dbuas2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbuas2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbuas2`;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `status` varchar(15) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '0',
  `kode` text,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(id,nama,email,username,password,status,aktif,kode) values (1,'Salsabila','diatahu6@gmail.com','salsa','827ccb0eea8a706c4c34a16891f84e7b','Guru',1,'3b3dbaf68507998acd6a5a5254ab2d76');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
