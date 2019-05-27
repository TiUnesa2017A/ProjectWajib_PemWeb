/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.10 : Database - loginn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`loginn` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `loginn`;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `loginphp` */

insert  into `loginphp`(id,fullname,email,username,password,type,active,hash) values (20,'Ika Putri','ik.putri8@gmail.com','cobacoba','$2y$10$brkP4TMzHbWgi7GKhfXUO.YEw.bxypG.1cPLSmpi9MbIcEpGMgKFi','Mahasiswa',0,'d395771085aab05244a4fb8fd91bf4ee');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
