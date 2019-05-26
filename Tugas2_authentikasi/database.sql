/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 5.7.23 : Database - tugas2_authentikasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tugas2_authentikasi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tugas2_authentikasi`;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`email`,`username`,`password`,`status`,`aktif`,`kode`) values 
(2,'Guru Iqbal','iqbalul.hidayat2801@gmail.com','guruiqbal','1d3f7df5de26ee198ecd9f4d0fc06e73','Guru',1,'1534b76d325a8f591b52d302e7181331'),
(3,'Staff Iqbal','muhammad.17051204011@mhs.unesa.ac.id','staffiqbal','cb751c458b5b14bd2a76361e3584e108','Staff',1,'a8ecbabae151abacba7dbde04f761c37'),
(4,'Siswa Iqbal','iqbalul.hidayat@yahoo.com','siswaiqbal','7295d46dcb9d39c5b8296dad224fd110','Siswa',1,'2f885d0fbe2e131bfc9d98363e55d1d4');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
