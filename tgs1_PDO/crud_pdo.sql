/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 10.1.37-MariaDB : Database - crud_pdo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crud_pdo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crud_pdo`;

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `fakultas` varbinary(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fakultas` */

insert  into `fakultas`(`id`,`fakultas`) values 
(1,'Fakultas Teknik');

/*Table structure for table `prodi` */

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(40) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prodi` */

insert  into `prodi`(`id`,`prodi`,`id_fakultas`) values 
(1,'S1 Teknik Informatika',1),
(2,'S1 Sistem Informasi',1),
(3,'S1 Pendidikan Teknologi Informasi',1),
(4,'D3 Manajemen Informatika',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `prodi` varchar(40) DEFAULT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  `nim` varchar(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`foto`,`jenis_kelamin`,`prodi`,`fakultas`,`nim`,`tgl_lahir`,`alamat`,`kota`,`email`) values 
(5,'rian','WIN_20171214_18_11_22_Pro.jpg','Laki-laki','S1 Teknik Informatika','Fakultas Teknik','17051204020','2019-05-01','xxxxx','Semarang','riandwisusanto1903@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
