/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - savetemples
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`savetemples` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `savetemples`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT '2',
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` text,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `notes` text,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`role`,`name`,`email`,`phone`,`address`,`password`,`org_password`,`mobile`,`profile_pic`,`notes`,`status`,`created_at`,`updated_at`) values (1,2,'admin','admin@gmail.com','8500050944','kadapa','e10adc3949ba59abbe56e057f20f883e','123456','8500050944','1538633514.gif','vcvc',1,'2018-10-04 10:44:06','2018-10-04 11:53:40');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `name` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `blogs` */

insert  into `blogs`(`b_id`,`title`,`description`,`name`,`date`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (1,'We Hear Your Prayers','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','Jane Smith','28/10/2018','1539169204.jpg','1 (2).jpg',1,'2018-10-10 16:22:16','2018-10-10 16:30:03',1),(2,'We Hear Your Prayers','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n','Jane Smith','28/10/2018','1539169278.jpg','2 (1).jpg',1,'2018-10-10 16:31:17','2018-10-10 16:31:17',1);

/*Table structure for table `certificates` */

DROP TABLE IF EXISTS `certificates`;

CREATE TABLE `certificates` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `certificates` */

insert  into `certificates`(`c_id`,`title`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (2,'Registration certificate','1539162420.png','cert2.png',1,'2018-10-10 14:37:00','2018-10-10 14:39:04',1),(3,'sickle call society','1539162606.png','cert1.png',1,'2018-10-10 14:40:05','2018-10-10 14:58:58',1);

/*Table structure for table `contactus` */

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `contactus` */

insert  into `contactus`(`id`,`name`,`phone`,`email_id`,`message`,`create_at`) values (1,'xcxzv','8500050944','khdfghsdfds@gmail.com',',nkjhfdjgdsf','2018-10-03 18:06:28'),(2,'xcxzv','8500050944','khdfghsdfds@gmail.com',',nkjhfdjgdsf','2018-10-03 18:06:43');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `date` varchar(250) DEFAULT NULL,
  `address` text,
  `type` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`e_id`,`title`,`description`,`date`,`address`,`type`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (1,'FEED A HUNGRY CHILD','Lorem ipsum dolor sit amet, consectrtur adipisicing slit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','09/03/2018','test','Upcoming','1539157088.jpg','5.jpg',1,'2018-10-10 13:08:08','2018-10-10 15:50:21',1),(2,'FEED A HUNGRY CHILD','FEED A HUNGRY CHILD\r\nLorem ipsum dolor sit amet, consectrtur adipisicing slit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','09/03/2018','test','Upcoming','1539157415.jpg','6.jpg',1,'2018-10-10 13:13:35','2018-10-10 15:50:26',1),(3,'FEED A HUNGRY CHILD','Lorem ipsum dolor sit amet, consectrtur adipisicing slit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','09/02/2018','test','Previous','1539157614.jpg','1.jpg',1,'2018-10-10 13:16:53','2018-10-10 13:16:53',1),(4,'CHARITY FOR BLOOD','Lorem ipsum dolor sit amet, consectrtur adipisicing slit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','09/03/2018','test','Previous','1539157650.jpg','4.jpg',0,'2018-10-10 13:17:29','2018-10-10 18:17:22',1);

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

insert  into `gallery`(`g_id`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (2,'1539175420.jpg','5.jpg',1,'2018-10-10 18:12:15','2018-10-10 18:13:39',1),(4,'1539175550.jpg','5 (1).jpg',1,'2018-10-10 18:15:50','2018-10-10 18:15:50',1),(5,'1539175559.jpg','4.jpg',1,'2018-10-10 18:15:58','2018-10-10 18:15:58',1),(6,'1539175567.jpg','1 (3).jpg',1,'2018-10-10 18:16:07','2018-10-10 18:16:07',1),(7,'1539175579.jpg','1.jpg',1,'2018-10-10 18:16:18','2018-10-10 18:16:18',1);

/*Table structure for table `talkaboutuss` */

DROP TABLE IF EXISTS `talkaboutuss`;

CREATE TABLE `talkaboutuss` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `category` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `talkaboutuss` */

insert  into `talkaboutuss`(`a_id`,`name`,`description`,`category`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (7,'JOHN DOE ','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','Businessa man','1539166311.jpg','1 (1).jpg',1,'2018-10-10 15:41:51','2018-10-10 15:42:39',1),(8,'SAIMON','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','Team Lead','1539166393.jpg','2.jpg',1,'2018-10-10 15:43:13','2018-10-10 15:43:13',1),(9,'JOHN DOE','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','Businessa man','1539166796.jpg','1 (1).jpg',1,'2018-10-10 15:49:56','2018-10-10 15:49:56',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `description` text,
  `address` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  `payment_id` varchar(250) DEFAULT NULL,
  `payment_order_id` varchar(250) DEFAULT NULL,
  `payment_singnature` varchar(250) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`cust_name`,`email`,`mobile`,`description`,`address`,`amount`,`invoice_name`,`payment_id`,`payment_order_id`,`payment_singnature`,`payment_date`,`status`,`created_at`) values (1,'vasudevareddy','inventory@gmail.com',NULL,NULL,'fgsdfg','100',NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00'),(2,'vasudevareddy','vasudevareddy549@gmail.com','8500050944','donation','kadapa','100',NULL,NULL,NULL,NULL,NULL,0,'2018-10-03 19:05:15'),(3,'vasudevareddy','inventory@gmail.com','8500050944','donation','kadapa','100','vasudevareddy_3.pdf','pay_B5QixnudT0M0uH','order_B5QiRaTHokjTwD','a46c8489046b7360826e49345e6b68095859a0688960e9d6d2ebe9dfa82aef79','2018-10-04 10:17:18',1,'2018-10-04 10:12:14'),(4,'vasudevareddy','vasu@gmail.com','8500050944','test','kadapa','100','vasudevareddy_4.pdf','pay_B5QqOGeIICwEGi','order_B5QqFtb4d2tFjQ','a4b9e7965791a15bede62924dfd1f46363b755e4d3db46aabf3a2d7eec900a24','2018-10-04 10:19:52',1,'2018-10-04 10:19:41');

/*Table structure for table `volunteers` */

DROP TABLE IF EXISTS `volunteers`;

CREATE TABLE `volunteers` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `category` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `volunteers` */

insert  into `volunteers`(`v_id`,`name`,`category`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (2,'NATHI NAGA RAJU GARU','Founder','1539165166.png','founder.png',1,'2018-10-10 15:22:45','2018-10-10 15:22:45',1),(3,'CH MURAIL GARU','President','1539165191.png','president.png',1,'2018-10-10 15:23:10','2018-10-10 15:23:10',1),(4,'NIRMALA THAKUR','Work President','1539165206.png','working-president.png',1,'2018-10-10 15:23:25','2018-10-10 15:23:25',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
