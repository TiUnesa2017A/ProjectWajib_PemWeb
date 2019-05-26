/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.1.31-MariaDB : Database - login
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `loginphp` */

insert  into `loginphp`(id,fullname,email,username,password,type,active,hash) values (1,'amrina','nengamrinar99@gmail.com','amrina','$2y$10$IpGwJ/PX/GYYEK763ZnWouI7qeuufghn8eylCugpwfjpBJzVFw0eG','Mahasiswa',0,'15de21c670ae7c3f6f3f1f37029303c9'),(2,'amr','amrina@gmail.com','amr','$2y$10$/YjKXfdxlktRG5udZ.QvcOEBIImgfT4T7c8J7.P17jbYbbCurQleW','Administrator',0,'0a113ef6b61820daa5611c870ed8d5ee');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
