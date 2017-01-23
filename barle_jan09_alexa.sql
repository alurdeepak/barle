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
/*Table structure for table `dat_alexa` */

DROP TABLE IF EXISTS `dat_alexa`;

CREATE TABLE `dat_alexa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `balance` float DEFAULT NULL,
  `revenue` float DEFAULT NULL,
  `margin` float DEFAULT NULL,
  `receivables` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `dat_alexa` */

insert  into `dat_alexa`(`id`,`balance`,`revenue`,`margin`,`receivables`) values 
(1,2000,3000,1500,500);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
