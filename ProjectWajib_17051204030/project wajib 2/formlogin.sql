/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 10.1.38-MariaDB : Database - formlogin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`formlogin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `formlogin`;

/*Table structure for table `loginphp` */

DROP TABLE IF EXISTS `loginphp`;

CREATE TABLE `loginphp` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(80) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` TEXT NOT NULL,
  `type` ENUM('Administrator','Dosen','Mahasiswa') NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '0',
  `hash` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=INNODB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `loginphp` */

INSERT  INTO `loginphp`(`id`,`fullname`,`email`,`username`,`password`,`type`,`active`,`hash`) VALUES 
(30,'Moh. Hilmy Badrudduja','Helbad@gmail.com','Helbad','$2y$10$mnmFp6vXrTDXc7VhQmhYm.HsvtVnjv/jy1OwGOQUWvFoeWSZD2Gaq','Administrator',0,'41f1f19176d383480afa65d325c06ed0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
