/*
SQLyog Community v12.14 (64 bit)
MySQL - 5.6.26-log : Database - barle
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `dat_budgets` */

DROP TABLE IF EXISTS `dat_budgets`;

CREATE TABLE `dat_budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(5000) DEFAULT NULL,
  `amt` float DEFAULT NULL,
  `requested_by` varchar(1000) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `dat_budgets` */

insert  into `dat_budgets`(`id`,`activity`,`amt`,`requested_by`,`last_updated`) values 
(1,'Camerman (Excluding post Editing)',16000,'Arun Yadwad','2016-12-26 09:09:09'),
(2,'Dollu Kunita + Breakfast',13000,'Arun Yadwad','2016-12-26 09:09:09'),
(3,'Banners & Posters',8000,'Kumar Handur','2016-12-26 09:09:09'),
(4,'First Aid Kit',500,NULL,'2016-12-26 09:09:09'),
(5,'Richard Lious',10000,'Wali','2016-12-26 09:09:09'),
(6,'Momentos',2000,'Wali','2016-12-26 09:09:09'),
(7,'Resort Rooms',8000,'Kumar','2016-12-26 09:09:09'),
(8,'Resort Dinner(Prev Day)',3000,'Wali','2016-12-26 09:09:09'),
(9,'Special Batch (for VIPS)',500,'Shashikant','2016-12-26 09:09:09'),
(10,'Event Management',8000,'Wali','2016-12-26 09:09:09'),
(11,'Banner Labour',2000,'Kumar','2016-12-26 09:09:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
