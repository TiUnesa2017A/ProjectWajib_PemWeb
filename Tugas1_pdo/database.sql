/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 5.7.23 : Database - tugas1_pdo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tugas1_pdo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tugas1_pdo`;

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fakultas` */

insert  into `fakultas`(`id`,`fakultas`) values 
(1,'Fakultas Teknik');

/*Table structure for table `prodi` */

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(40) NOT NULL,
  `id_fakultas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `prodi` */

insert  into `prodi`(`id`,`prodi`,`id_fakultas`) values 
(1,'S1 Teknik Informatika',1),
(2,'S1 Sistem Informasi',1),
(3,'S1 PTI',1),
(4,'D3 Manajemen Informatika',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `jk` varchar(40) NOT NULL,
  `prodi` varchar(40) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`foto`,`jk`,`prodi`,`fakultas`,`nim`,`tgl_lahir`,`alamat`,`kota`,`email`) values 
(38,'Muhammad Iqbalul Hidayat','FOTO.jpg','Laki-laki','S1 Teknik Informatika','Fakultas Teknik','17051204011','2019-05-28','Perumaham Palem Putri','Sidoarjo','muhammad.17051204011@mhs.unesa.ac.id'),
(39,'Mahasiswa 1','images.png','Laki-laki','S1 Sistem Informasi','Fakultas Teknik','17051204090','2019-05-17','palem','Surabaya','mahasiswa1.17051204090@mhs.unesa.ac.id'),
(40,'Mahasiswa 2','images (1).png','Perempuan','S1 PTI','Fakultas Teknik','17051204091','2019-05-14','putri','Malang','mahasiswa2.17051204091@mhs.unesa.ac.id');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
