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
/*Table structure for table `dat_attendees` */

DROP TABLE IF EXISTS `dat_attendees`;

CREATE TABLE `dat_attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afname` varchar(200) DEFAULT NULL,
  `alname` varchar(200) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `parent_id_fk` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Table structure for table `dat_payments` */

DROP TABLE IF EXISTS `dat_payments`;

CREATE TABLE `dat_payments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amt` float DEFAULT NULL,
  `paid_by_email` varchar(500) DEFAULT NULL,
  `paid_by_name` varchar(1000) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `insta_ded` float DEFAULT NULL,
  `lurl` varchar(2000) DEFAULT NULL,
  `mac` varchar(5000) DEFAULT NULL,
  `payment_id` varchar(2000) DEFAULT NULL,
  `payment_request_id` varchar(2000) DEFAULT NULL,
  `purpose` varchar(500) DEFAULT NULL,
  `shorturl` varchar(2000) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `paid_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `attendee_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `dat_regs` */

DROP TABLE IF EXISTS `dat_regs`;

CREATE TABLE `dat_regs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `reg_on` datetime DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `num_of_adults` int(11) DEFAULT NULL,
  `num_of_kids` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Table structure for table `lkp_payments_attendees` */

DROP TABLE IF EXISTS `lkp_payments_attendees`;

CREATE TABLE `lkp_payments_attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendee_id_fk` int(11) DEFAULT NULL,
  `payment_id_fk` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `mas_logins` */

DROP TABLE IF EXISTS `mas_logins`;

CREATE TABLE `mas_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(20) DEFAULT NULL,
  `log` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `mas_prices` */

DROP TABLE IF EXISTS `mas_prices`;

CREATE TABLE `mas_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Adult` float DEFAULT NULL,
  `Children` float DEFAULT NULL,
  `Infant` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
