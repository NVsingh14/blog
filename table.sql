/*
SQLyog Community v12.2.5 (32 bit)
MySQL - 5.6.24 : Database - eduamerica
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`testbook` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `testbook`;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `phone` varchar(20) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `position` int(5) DEFAULT '0',
  `add_ip` varchar(50) DEFAULT '0.0.0.0',
  `add_by` varchar(100) DEFAULT '',
  `add_time` datetime DEFAULT '0000-00-00 00:00:00',
  `update_ip` varchar(50) DEFAULT '0.0.0.0',
  `update_by` varchar(100) DEFAULT '',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Table structute for table `tbl_question`*/

DROP TABLE IF EXISTS `tbl_question`;

CREATE TABLE `tbl_question` (
  `question_id` int(10) NOT NULL DEFAULT '0',
  `question_name` text ,
  `position` int(5) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `add_ip` varchar(50) DEFAULT '0.0.0.0',
  `add_by` varchar(100) DEFAULT '',
  `add_time` datetime DEFAULT '0000-00-00 00:00:00',
  `update_ip` varchar(50) DEFAULT '0.0.0.0',
  `update_by` varchar(100) DEFAULT '',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Table structure for table `tb_option`*/

DROP TABLE IF EXISTS `tbl_option`;

CREATE TABLE `tbl_option` (
  `option_id` int(10) NOT NULL DEFAULT '0',
  `question_id` int(10) DEFAULT '0',
  `options` varchar(255) DEFAULT '' ,
  `position` int(5) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `add_ip` varchar(50) DEFAULT '0.0.0.0',
  `add_by` varchar(100) DEFAULT '',
  `add_time` datetime DEFAULT '0000-00-00 00:00:00',
  `update_ip` varchar(50) DEFAULT '0.0.0.0',
  `update_by` varchar(100) DEFAULT '',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Table structure for table `tbl_answer`*/

DROP TABLE IF EXISTS `tbl_answer`;

CREATE TABLE `tbl_answer` (
  `answer_id` int(10) NOT NULL DEFAULT '0',
  `question_id` int(10) DEFAULT '0', 
  `option_value` varchar(250) DEFAULT '',
  `correct_answer` varchar(250) DEFAULT '',
  `answer_description` text,
  `status` tinyint(1) DEFAULT '1',
  `add_ip` varchar(50) DEFAULT '0.0.0.0',
  `add_by` varchar(100) DEFAULT '',
  `add_time` datetime DEFAULT '0000-00-00 00:00:00',
  `update_ip` varchar(50) DEFAULT '0.0.0.0',
  `update_by` varchar(100) DEFAULT '',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Table structure for table `tbl_category`*/


DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL DEFAULT '0',
  `category_name` varchar(250) DEFAULT '',
  `position` int(5) DEFAULT  '0',
  `status` tinyint(1) DEFAULT '1',
  `add_ip` varchar(50) DEFAULT '0.0.0.0',
  `add_by` varchar(100) DEFAULT '',
  `add_time` datetime DEFAULT '0000-00-00 00:00:00',
  `update_ip` varchar(50) DEFAULT '0.0.0.0',
  `update_by` varchar(100) DEFAULT '',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/* Table structure for table `tbl_sub_category`*/


DROP TABLE IF EXISTS `tbl_sub_category`;

CREATE TABLE `tbl_sub_category` (
  `sub_category_id` int(10) NOT NULL DEFAULT '0',
  `category_id` int(10) DEFAULT '0',
  `sub_category_name` varchar(250) DEFAULT '',
  `position` int(5) DEFAULT  '0',
  `status` tinyint(1) DEFAULT '1',
  `add_ip` varchar(50) DEFAULT '0.0.0.0',
  `add_by` varchar(100) DEFAULT '',
  `add_time` datetime DEFAULT '0000-00-00 00:00:00',
  `update_ip` varchar(50) DEFAULT '0.0.0.0',
  `update_by` varchar(100) DEFAULT '',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
