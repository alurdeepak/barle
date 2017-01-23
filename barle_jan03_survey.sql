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
/*Table structure for table `dat_survey_responses` */

DROP TABLE IF EXISTS `dat_survey_responses`;

CREATE TABLE `dat_survey_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id_fk` int(11) DEFAULT NULL,
  `response_id_fk` int(11) DEFAULT NULL,
  `feedback` varchar(5000) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `dat_survey_responses` */

insert  into `dat_survey_responses`(`id`,`question_id_fk`,`response_id_fk`,`feedback`,`created_on`) values 
(1,1,1,'','2017-01-02 12:55:07'),
(2,2,6,'','2017-01-02 12:55:07'),
(3,3,10,'','2017-01-02 12:55:07'),
(4,4,14,'','2017-01-02 12:55:07'),
(5,5,18,'','2017-01-02 12:55:07'),
(6,1,2,'','2017-01-02 12:55:31'),
(7,2,6,'','2017-01-02 12:55:31'),
(8,3,10,'','2017-01-02 12:55:31'),
(9,4,14,'','2017-01-02 12:55:31'),
(10,5,18,'','2017-01-02 12:55:31'),
(11,1,2,'','2017-01-02 12:55:44'),
(12,2,6,'','2017-01-02 12:55:44'),
(13,3,10,'','2017-01-02 12:55:44'),
(14,4,14,'','2017-01-02 12:55:44'),
(15,5,18,'','2017-01-02 12:55:44'),
(16,1,2,'','2017-01-02 12:56:18'),
(17,2,6,'','2017-01-02 12:56:18'),
(18,3,10,'','2017-01-02 12:56:18'),
(19,4,14,'','2017-01-02 12:56:18'),
(20,5,18,'','2017-01-02 12:56:18'),
(21,6,0,'All ok','2017-01-02 12:56:18'),
(22,1,4,'','2017-01-02 15:19:22'),
(23,2,8,'','2017-01-02 15:19:22'),
(24,3,12,'','2017-01-02 15:19:22'),
(25,4,16,'','2017-01-02 15:19:22'),
(26,5,20,'','2017-01-02 15:19:22'),
(27,1,3,'','2017-01-02 17:06:25'),
(28,2,6,'','2017-01-02 17:06:25'),
(29,3,11,'','2017-01-02 17:06:25'),
(30,4,15,'','2017-01-02 17:06:25'),
(31,5,19,'','2017-01-02 17:06:25');

/*Table structure for table `mas_survey_options` */

DROP TABLE IF EXISTS `mas_survey_options`;

CREATE TABLE `mas_survey_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id_fk` int(11) DEFAULT NULL,
  `options` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `mas_survey_options` */

insert  into `mas_survey_options`(`id`,`question_id_fk`,`options`) values 
(1,1,'Excellent'),
(2,1,'Very Good'),
(3,1,'Good'),
(4,1,'Poor'),
(5,2,'Excellent'),
(6,2,'Very Good'),
(7,2,'Good'),
(8,2,'Poor'),
(9,3,'Excellent'),
(10,3,'Very Good'),
(11,3,'Good'),
(12,3,'Poor'),
(13,4,'Excellent'),
(14,4,'Very Good'),
(15,4,'Good'),
(16,4,'Poor'),
(17,5,'Extremly Likely'),
(18,5,'Very Likely'),
(19,5,'Undecided'),
(20,5,'Not at all Likely');

/*Table structure for table `mas_survey_qs` */

DROP TABLE IF EXISTS `mas_survey_qs`;

CREATE TABLE `mas_survey_qs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `mas_survey_qs` */

insert  into `mas_survey_qs`(`id`,`question`) values 
(1,'Overall, how would you rate the UKSL 2017 event?'),
(2,'Are you contended with the LOCATION of the event?'),
(3,'Are you contended with the FOOD at the event?'),
(4,'Are you contended with the ENTERTAINMENT of the event?'),
(5,'How likely is it that you would RECOMEND the event to a friend or family member?'),
(6,'Do you have any other comments, questions, or concerns?');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
