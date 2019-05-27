/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.13-MariaDB : Database - login_uas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `loginphp` */

insert  into `loginphp`(`id`,`fullname`,`email`,`username`,`password`,`type`,`active`,`hash`) values 
(20,'atikah adawiyyah','atikahadawiyyah@gmail.com','atikah adawiyyah','$2y$10$mnmFp6vXrTDXc7VhQmhYm.HsvtVnjv/jy1OwGOQUWvFoeWSZD2Gaq','Administrator',0,'41f1f19176d383480afa65d325c06ed0'),
(24,'fikri','ubaidillah871@gmail.com','fikri','$2y$10$rhdTLp8GvZ2r2kpZUpS2n.wRnclKsav3Mb10hz.QzYbqL8c8KWvvy','Administrator',0,'d490d7b4576290fa60eb31b5fc917ad1'),
(25,'dian','dian@gmail.com','dian','$2y$10$lltjEfItyxW41Xy74NwTYuvbMY5GBLFFM/JN3HBR.elOcm.dUoofy','Mahasiswa',0,'3c7781a36bcd6cf08c11a970fbe0e2a6'),
(26,'roy','roy@gmail.com','roy','$2y$10$zzgJRR3ExNQ3kemaoZlPMeQ0Ne2CqodQdPcxm8QAa.wDuPJsMH8rG','Dosen',0,'9a1158154dfa42caddbd0694a4e9bdc8');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
