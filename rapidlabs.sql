/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.19-MariaDB : Database - rapidlab
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rapidlab` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `rapidlab`;

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) unsigned DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`),
  KEY `subject` (`subject_id`,`subject_type`),
  KEY `causer` (`causer_id`,`causer_type`)
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_log` */

insert  into `activity_log`(`id`,`log_name`,`description`,`subject_id`,`subject_type`,`causer_id`,`causer_type`,`properties`,`created_at`,`updated_at`) values 
(1,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-15 20:02:36','2022-01-15 20:02:36'),
(2,'default','Account was registered',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-16 08:29:28','2022-01-16 08:29:28'),
(3,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-16 08:29:28','2022-01-16 08:29:28'),
(4,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-16 08:29:37','2022-01-16 08:29:37'),
(5,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-16 08:29:46','2022-01-16 08:29:46'),
(6,'default','User was updated',6,'App\\User',1,'App\\User','{\"name\":\"wukasin\",\"by\":\"admin\"}','2022-01-16 08:30:05','2022-01-16 08:30:05'),
(7,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-16 08:30:10','2022-01-16 08:30:10'),
(8,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-16 08:36:50','2022-01-16 08:36:50'),
(9,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-16 08:45:34','2022-01-16 08:45:34'),
(10,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-16 08:46:53','2022-01-16 08:46:53'),
(11,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-17 14:08:03','2022-01-17 14:08:03'),
(12,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-17 14:13:32','2022-01-17 14:13:32'),
(13,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-17 14:13:40','2022-01-17 14:13:40'),
(14,'default','Account signed-in',7,'App\\User',7,'App\\User','{\"name\":\"jovan\",\"by\":\"jovan\"}','2022-01-18 07:22:21','2022-01-18 07:22:21'),
(15,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 09:45:28','2022-01-19 09:45:28'),
(16,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 10:00:58','2022-01-19 10:00:58'),
(17,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 15:22:20','2022-01-19 15:22:20'),
(18,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 15:23:47','2022-01-19 15:23:47'),
(19,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:27:21','2022-01-19 17:27:21'),
(20,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:34:48','2022-01-19 17:34:48'),
(21,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:34:57','2022-01-19 17:34:57'),
(22,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:37:57','2022-01-19 17:37:57'),
(23,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:42:12','2022-01-19 17:42:12'),
(24,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:43:51','2022-01-19 17:43:51'),
(25,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:51:44','2022-01-19 17:51:44'),
(26,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:53:24','2022-01-19 17:53:24'),
(27,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 17:55:57','2022-01-19 17:55:57'),
(28,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 18:05:09','2022-01-19 18:05:09'),
(29,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 18:06:54','2022-01-19 18:06:54'),
(30,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 18:14:12','2022-01-19 18:14:12'),
(31,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-19 18:23:00','2022-01-19 18:23:00'),
(32,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-22 03:32:36','2022-01-22 03:32:36'),
(33,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 02:41:40','2022-01-24 02:41:40'),
(34,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 02:43:56','2022-01-24 02:43:56'),
(35,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 02:49:07','2022-01-24 02:49:07'),
(36,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-24 07:17:26','2022-01-24 07:17:26'),
(37,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-24 08:04:53','2022-01-24 08:04:53'),
(38,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 08:05:01','2022-01-24 08:05:01'),
(39,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 08:14:09','2022-01-24 08:14:09'),
(40,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-24 08:14:18','2022-01-24 08:14:18'),
(41,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-24 09:42:53','2022-01-24 09:42:53'),
(42,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 09:43:03','2022-01-24 09:43:03'),
(43,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-24 20:32:10','2022-01-24 20:32:10'),
(44,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-27 23:47:27','2022-01-27 23:47:27'),
(45,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-28 05:03:24','2022-01-28 05:03:24'),
(46,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-28 15:06:40','2022-01-28 15:06:40'),
(47,'default','User login details updated',9,'App\\User',1,'App\\User','{\"name\":\"david\",\"by\":\"admin\"}','2022-01-28 15:39:00','2022-01-28 15:39:00'),
(48,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-28 15:39:04','2022-01-28 15:39:04'),
(49,'default','Account signed-in',9,'App\\User',9,'App\\User','{\"name\":\"david\",\"by\":\"david\"}','2022-01-28 15:39:13','2022-01-28 15:39:13'),
(50,'default','Account signed-out',9,'App\\User',9,'App\\User','{\"name\":\"david\",\"by\":\"david\"}','2022-01-28 17:19:45','2022-01-28 17:19:45'),
(51,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-28 17:19:52','2022-01-28 17:19:52'),
(52,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-28 19:58:25','2022-01-28 19:58:25'),
(53,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-28 20:16:55','2022-01-28 20:16:55'),
(54,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-28 23:47:54','2022-01-28 23:47:54'),
(55,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 16:04:08','2022-01-29 16:04:08'),
(56,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 16:26:53','2022-01-29 16:26:53'),
(57,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 16:38:46','2022-01-29 16:38:46'),
(58,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 16:38:56','2022-01-29 16:38:56'),
(59,'default','Account was registered',11,'App\\User',11,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 17:53:42','2022-01-29 17:53:42'),
(60,'default','Account signed-in',11,'App\\User',11,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 17:53:42','2022-01-29 17:53:42'),
(61,'default','Account was registered',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 17:57:01','2022-01-29 17:57:01'),
(62,'default','Account signed-in',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 17:57:01','2022-01-29 17:57:01'),
(63,'default','Updated profile',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 19:23:46','2022-01-29 19:23:46'),
(64,'default','Updated profile',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 19:24:21','2022-01-29 19:24:21'),
(65,'default','Updated profile',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 19:24:45','2022-01-29 19:24:45'),
(66,'default','Updated profile',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 19:25:05','2022-01-29 19:25:05'),
(67,'default','Account signed-out',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 19:32:34','2022-01-29 19:32:34'),
(68,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 19:32:44','2022-01-29 19:32:44'),
(69,'default','Account signed-out',12,'App\\User',12,'App\\User','{\"name\":\"alex\",\"by\":\"alex\"}','2022-01-29 19:33:34','2022-01-29 19:33:34'),
(70,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 19:33:44','2022-01-29 19:33:44'),
(71,'default','User was updated',12,'App\\User',1,'App\\User','{\"name\":\"alex\",\"by\":\"admin\"}','2022-01-29 20:04:47','2022-01-29 20:04:47'),
(72,'default','User was updated',12,'App\\User',1,'App\\User','{\"name\":\"alex\",\"by\":\"admin\"}','2022-01-29 20:04:54','2022-01-29 20:04:54'),
(73,'default','User was updated',12,'App\\User',1,'App\\User','{\"name\":\"alex\",\"by\":\"admin\"}','2022-01-29 20:04:59','2022-01-29 20:04:59'),
(74,'default','User was updated',12,'App\\User',1,'App\\User','{\"name\":\"alex\",\"by\":\"admin\"}','2022-01-29 20:05:04','2022-01-29 20:05:04'),
(75,'default','User login details updated',12,'App\\User',1,'App\\User','{\"name\":\"alex\",\"by\":\"admin\"}','2022-01-29 20:05:25','2022-01-29 20:05:25'),
(76,'default','User was created',13,'App\\User',1,'App\\User','{\"name\":\"clerical_new\",\"by\":\"admin\"}','2022-01-29 21:14:00','2022-01-29 21:14:00'),
(77,'default','User login details updated',13,'App\\User',1,'App\\User','{\"name\":null,\"by\":\"admin\"}','2022-01-29 21:15:19','2022-01-29 21:15:19'),
(78,'default','User was created',14,'App\\User',1,'App\\User','{\"name\":\"blue\",\"by\":\"admin\"}','2022-01-29 21:19:58','2022-01-29 21:19:58'),
(79,'default','User was updated',14,'App\\User',1,'App\\User','{\"name\":\"blue\",\"by\":\"admin\"}','2022-01-29 21:20:15','2022-01-29 21:20:15'),
(80,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 21:38:04','2022-01-29 21:38:04'),
(81,'default','Account was registered',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:39:08','2022-01-29 21:39:08'),
(82,'default','Account signed-in',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:39:08','2022-01-29 21:39:08'),
(83,'default','Account signed-out',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:39:13','2022-01-29 21:39:13'),
(84,'default','Account signed-in',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:39:24','2022-01-29 21:39:24'),
(85,'default','Updated profile',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:39:58','2022-01-29 21:39:58'),
(86,'default','Updated profile',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:40:11','2022-01-29 21:40:11'),
(87,'default','Account signed-out',15,'App\\User',15,'App\\User','{\"name\":\"sasha\",\"by\":\"sasha\"}','2022-01-29 21:40:23','2022-01-29 21:40:23'),
(88,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 21:40:32','2022-01-29 21:40:32'),
(89,'default','User was updated',15,'App\\User',1,'App\\User','{\"name\":\"sasha\",\"by\":\"admin\"}','2022-01-29 21:40:55','2022-01-29 21:40:55'),
(90,'default','User login details updated',15,'App\\User',1,'App\\User','{\"name\":\"sasha\",\"by\":\"admin\"}','2022-01-29 21:41:04','2022-01-29 21:41:04'),
(91,'default','User was created',16,'App\\User',1,'App\\User','{\"name\":\"blue789\",\"by\":\"admin\"}','2022-01-29 21:42:09','2022-01-29 21:42:09'),
(92,'default','User was updated',16,'App\\User',1,'App\\User','{\"name\":\"blue789\",\"by\":\"admin\"}','2022-01-29 21:42:33','2022-01-29 21:42:33'),
(93,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 22:04:22','2022-01-29 22:04:22'),
(94,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 22:04:29','2022-01-29 22:04:29'),
(95,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 22:04:39','2022-01-29 22:04:39'),
(96,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 22:04:55','2022-01-29 22:04:55'),
(97,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-29 22:29:33','2022-01-29 22:29:33'),
(98,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-29 22:29:41','2022-01-29 22:29:41'),
(99,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 00:53:41','2022-01-30 00:53:41'),
(100,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 01:15:54','2022-01-30 01:15:54'),
(101,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 01:19:56','2022-01-30 01:19:56'),
(102,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 01:21:51','2022-01-30 01:21:51'),
(103,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 01:24:30','2022-01-30 01:24:30'),
(104,'default','Updated profile',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 01:25:35','2022-01-30 01:25:35'),
(105,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 01:29:29','2022-01-30 01:29:29'),
(106,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:26:17','2022-01-30 10:26:17'),
(107,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:28:17','2022-01-30 10:28:17'),
(108,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:28:23','2022-01-30 10:28:23'),
(109,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:29:35','2022-01-30 10:29:35'),
(110,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:29:46','2022-01-30 10:29:46'),
(111,'default','Permission assigned to Role was',3,'Spatie\\Permission\\Models\\Role',1,'App\\User','{\"name\":\"clerical\",\"by\":\"admin\"}','2022-01-30 10:30:40','2022-01-30 10:30:40'),
(112,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:32:03','2022-01-30 10:32:03'),
(113,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:32:11','2022-01-30 10:32:11'),
(114,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:32:26','2022-01-30 10:32:26'),
(115,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:32:36','2022-01-30 10:32:36'),
(116,'default','Permission assigned to Role was',3,'Spatie\\Permission\\Models\\Role',1,'App\\User','{\"name\":\"clerical\",\"by\":\"admin\"}','2022-01-30 10:32:54','2022-01-30 10:32:54'),
(117,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:33:16','2022-01-30 10:33:16'),
(118,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:33:24','2022-01-30 10:33:24'),
(119,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:35:11','2022-01-30 10:35:11'),
(120,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:35:54','2022-01-30 10:35:54'),
(121,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:36:30','2022-01-30 10:36:30'),
(122,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:36:53','2022-01-30 10:36:53'),
(123,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:37:16','2022-01-30 10:37:16'),
(124,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:37:53','2022-01-30 10:37:53'),
(125,'default','Permission assigned to Role was',3,'Spatie\\Permission\\Models\\Role',1,'App\\User','{\"name\":\"clerical\",\"by\":\"admin\"}','2022-01-30 10:38:07','2022-01-30 10:38:07'),
(126,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 10:41:58','2022-01-30 10:41:58'),
(127,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:42:04','2022-01-30 10:42:04'),
(128,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 10:43:01','2022-01-30 10:43:01'),
(129,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 11:44:04','2022-01-30 11:44:04'),
(130,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 11:44:23','2022-01-30 11:44:23'),
(131,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 11:48:05','2022-01-30 11:48:05'),
(132,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 11:49:26','2022-01-30 11:49:26'),
(133,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 11:49:33','2022-01-30 11:49:33'),
(134,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-30 11:49:54','2022-01-30 11:49:54'),
(135,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 11:50:01','2022-01-30 11:50:01'),
(136,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 14:02:30','2022-01-30 14:02:30'),
(137,'default','User was updated',17,'App\\User',6,'App\\User','{\"name\":\"jovan\",\"by\":\"wukasin\"}','2022-01-30 16:18:14','2022-01-30 16:18:14'),
(138,'default','User was updated',17,'App\\User',6,'App\\User','{\"name\":\"jovan\",\"by\":\"wukasin\"}','2022-01-30 16:19:37','2022-01-30 16:19:37'),
(139,'default','User login details updated',17,'App\\User',6,'App\\User','{\"name\":\"jovan\",\"by\":\"wukasin\"}','2022-01-30 16:20:08','2022-01-30 16:20:08'),
(140,'default','User was updated',18,'App\\User',6,'App\\User','{\"name\":\"james\",\"by\":\"wukasin\"}','2022-01-30 16:59:42','2022-01-30 16:59:42'),
(141,'default','User was updated',18,'App\\User',6,'App\\User','{\"name\":\"james\",\"by\":\"wukasin\"}','2022-01-30 17:00:07','2022-01-30 17:00:07'),
(142,'default','User was updated',17,'App\\User',6,'App\\User','{\"name\":\"jovan\",\"by\":\"wukasin\"}','2022-01-30 17:08:26','2022-01-30 17:08:26'),
(143,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 20:39:10','2022-01-30 20:39:10'),
(144,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 21:10:30','2022-01-30 21:10:30'),
(145,'default','User was updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-01-30 21:11:47','2022-01-30 21:11:47'),
(146,'default','User login details updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-01-30 21:13:15','2022-01-30 21:13:15'),
(147,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 23:22:47','2022-01-30 23:22:47'),
(148,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-30 23:33:45','2022-01-30 23:33:45'),
(149,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-31 15:48:20','2022-01-31 15:48:20'),
(150,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-31 19:53:55','2022-01-31 19:53:55'),
(151,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-01-31 19:57:23','2022-01-31 19:57:23'),
(152,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-01-31 19:58:19','2022-01-31 19:58:19'),
(153,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 00:05:28','2022-02-01 00:05:28'),
(154,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 00:58:07','2022-02-01 00:58:07'),
(155,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 00:58:14','2022-02-01 00:58:14'),
(156,'default','User information was updated',19,'App\\User',1,'App\\User','{\"name\":\"delicious\",\"by\":\"admin\"}','2022-02-01 01:15:27','2022-02-01 01:15:27'),
(157,'default','User information was updated',6,'App\\User',1,'App\\User','{\"name\":\"wukasin\",\"by\":\"admin\"}','2022-02-01 01:15:45','2022-02-01 01:15:45'),
(158,'default','User information was updated',6,'App\\User',1,'App\\User','{\"name\":\"wukasin\",\"by\":\"admin\"}','2022-02-01 01:16:03','2022-02-01 01:16:03'),
(159,'default','User information was updated',6,'App\\User',1,'App\\User','{\"name\":\"wukasin\",\"by\":\"admin\"}','2022-02-01 01:17:34','2022-02-01 01:17:34'),
(160,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 01:17:37','2022-02-01 01:17:37'),
(161,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 01:17:46','2022-02-01 01:17:46'),
(162,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 02:27:37','2022-02-01 02:27:37'),
(163,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 02:27:45','2022-02-01 02:27:45'),
(164,'default','User information was updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-02-01 02:33:25','2022-02-01 02:33:25'),
(165,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 05:19:21','2022-02-01 05:19:21'),
(166,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 11:21:53','2022-02-01 11:21:53'),
(167,'default','User information was updated',19,'App\\User',1,'App\\User','{\"name\":\"delicious\",\"by\":\"admin\"}','2022-02-01 11:27:00','2022-02-01 11:27:00'),
(168,'default','User information was updated',19,'App\\User',1,'App\\User','{\"name\":\"delicious\",\"by\":\"admin\"}','2022-02-01 11:27:42','2022-02-01 11:27:42'),
(169,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 11:33:36','2022-02-01 11:33:36'),
(170,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 11:33:44','2022-02-01 11:33:44'),
(171,'default','User information was updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-02-01 11:36:42','2022-02-01 11:36:42'),
(172,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 14:54:44','2022-02-01 14:54:44'),
(173,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 21:23:01','2022-02-01 21:23:01'),
(174,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-01 21:23:27','2022-02-01 21:23:27'),
(175,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-01 21:24:00','2022-02-01 21:24:00'),
(176,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-02 10:16:30','2022-02-02 10:16:30'),
(177,'default','User information was updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-02-02 10:17:11','2022-02-02 10:17:11'),
(178,'default','User information was updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-02-02 10:18:10','2022-02-02 10:18:10'),
(179,'default','User information was updated',19,'App\\User',6,'App\\User','{\"name\":\"delicious\",\"by\":\"wukasin\"}','2022-02-02 10:52:10','2022-02-02 10:52:10'),
(180,'default','Account was registered',22,'App\\User',22,'App\\User','{\"name\":\"aaa\",\"by\":\"aaa\"}','2022-02-02 19:20:15','2022-02-02 19:20:15'),
(181,'default','Account signed-in',22,'App\\User',22,'App\\User','{\"name\":\"aaa\",\"by\":\"aaa\"}','2022-02-02 19:20:15','2022-02-02 19:20:15'),
(182,'default','Account signed-out',22,'App\\User',22,'App\\User','{\"name\":\"aaa\",\"by\":\"aaa\"}','2022-02-02 19:21:02','2022-02-02 19:21:02'),
(183,'default','Account was registered',23,'App\\User',23,'App\\User','{\"name\":\"nemanja123\",\"by\":\"nemanja123\"}','2022-02-02 19:34:32','2022-02-02 19:34:32'),
(184,'default','Account signed-in',23,'App\\User',23,'App\\User','{\"name\":\"nemanja123\",\"by\":\"nemanja123\"}','2022-02-02 19:34:33','2022-02-02 19:34:33'),
(185,'default','Account signed-out',23,'App\\User',23,'App\\User','{\"name\":\"nemanja123\",\"by\":\"nemanja123\"}','2022-02-02 19:36:13','2022-02-02 19:36:13'),
(186,'default','Account was registered',24,'App\\User',24,'App\\User','{\"name\":\"nemanja123456789\",\"by\":\"nemanja123456789\"}','2022-02-02 19:55:13','2022-02-02 19:55:13'),
(187,'default','Account signed-in',24,'App\\User',24,'App\\User','{\"name\":\"nemanja123456789\",\"by\":\"nemanja123456789\"}','2022-02-02 19:55:13','2022-02-02 19:55:13'),
(188,'default','Account signed-out',24,'App\\User',24,'App\\User','{\"name\":\"nemanja123456789\",\"by\":\"nemanja123456789\"}','2022-02-02 19:55:18','2022-02-02 19:55:18'),
(189,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-02 20:30:29','2022-02-02 20:30:29'),
(190,'default','User was created',25,'App\\User',1,'App\\User','{\"name\":\"colombo\",\"by\":\"admin\"}','2022-02-02 20:40:42','2022-02-02 20:40:42'),
(191,'default','User was created',26,'App\\User',1,'App\\User','{\"name\":\"simba98923\",\"by\":\"admin\"}','2022-02-02 20:41:10','2022-02-02 20:41:10'),
(192,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-02 20:41:14','2022-02-02 20:41:14'),
(193,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-02 20:41:28','2022-02-02 20:41:28'),
(194,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-02 20:41:33','2022-02-02 20:41:33'),
(195,'default','Account was registered',27,'App\\User',27,'App\\User','{\"name\":\"aaabbb\",\"by\":\"aaabbb\"}','2022-02-02 20:42:09','2022-02-02 20:42:09'),
(196,'default','Account signed-in',27,'App\\User',27,'App\\User','{\"name\":\"aaabbb\",\"by\":\"aaabbb\"}','2022-02-02 20:42:09','2022-02-02 20:42:09'),
(197,'default','Account signed-out',27,'App\\User',27,'App\\User','{\"name\":\"aaabbb\",\"by\":\"aaabbb\"}','2022-02-02 20:42:13','2022-02-02 20:42:13'),
(198,'default','Account signed-in',27,'App\\User',27,'App\\User','{\"name\":\"aaabbb\",\"by\":\"aaabbb\"}','2022-02-02 20:43:04','2022-02-02 20:43:04'),
(199,'default','Account signed-out',27,'App\\User',27,'App\\User','{\"name\":\"aaabbb\",\"by\":\"aaabbb\"}','2022-02-02 20:43:07','2022-02-02 20:43:07'),
(200,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-02 20:46:24','2022-02-02 20:46:24'),
(201,'default','User information was updated',27,'App\\User',1,'App\\User','{\"name\":\"aaabbb\",\"by\":\"admin\"}','2022-02-02 20:48:15','2022-02-02 20:48:15'),
(202,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-02 20:52:43','2022-02-02 20:52:43'),
(203,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-02 20:52:51','2022-02-02 20:52:51'),
(204,'default','User information was updated',26,'App\\User',6,'App\\User','{\"name\":\"simba98923\",\"by\":\"wukasin\"}','2022-02-02 20:58:28','2022-02-02 20:58:28'),
(205,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-02 22:03:58','2022-02-02 22:03:58'),
(206,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-02 22:04:09','2022-02-02 22:04:09'),
(207,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:29:43','2022-02-05 19:29:43'),
(208,'default','Updated profile',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:30:03','2022-02-05 19:30:03'),
(209,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:39:12','2022-02-05 19:39:12'),
(210,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:40:06','2022-02-05 19:40:06'),
(211,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:40:26','2022-02-05 19:40:26'),
(212,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-05 19:40:42','2022-02-05 19:40:42'),
(213,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-05 19:45:08','2022-02-05 19:45:08'),
(214,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:45:18','2022-02-05 19:45:18'),
(215,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:51:19','2022-02-05 19:51:19'),
(216,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-05 19:53:35','2022-02-05 19:53:35'),
(217,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-06 17:20:26','2022-02-06 17:20:26'),
(218,'default','User information was updated',28,'App\\User',6,'App\\User','{\"name\":\"sasha\",\"by\":\"wukasin\"}','2022-02-06 17:22:35','2022-02-06 17:22:35'),
(219,'default','User information was updated',28,'App\\User',6,'App\\User','{\"name\":\"sasha\",\"by\":\"wukasin\"}','2022-02-06 17:23:01','2022-02-06 17:23:01'),
(220,'default','User information was updated',28,'App\\User',6,'App\\User','{\"name\":\"sasha\",\"by\":\"wukasin\"}','2022-02-06 17:34:23','2022-02-06 17:34:23'),
(221,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-06 17:34:54','2022-02-06 17:34:54'),
(222,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-06 18:49:42','2022-02-06 18:49:42'),
(223,'default','User information was updated',30,'App\\User',1,'App\\User','{\"name\":\"jukkov\",\"by\":\"admin\"}','2022-02-06 18:50:01','2022-02-06 18:50:01'),
(224,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-06 18:50:11','2022-02-06 18:50:11'),
(225,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-06 18:50:21','2022-02-06 18:50:21'),
(226,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-07 01:49:49','2022-02-07 01:49:49'),
(227,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:04:14','2022-02-08 20:04:14'),
(228,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:04:57','2022-02-08 20:04:57'),
(229,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:05:20','2022-02-08 20:05:20'),
(230,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:05:25','2022-02-08 20:05:25'),
(231,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:05:54','2022-02-08 20:05:54'),
(232,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:05:57','2022-02-08 20:05:57'),
(233,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:07:30','2022-02-08 20:07:30'),
(234,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:31:28','2022-02-08 20:31:28'),
(235,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-08 20:31:35','2022-02-08 20:31:35'),
(236,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-08 20:38:02','2022-02-08 20:38:02'),
(237,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 20:38:15','2022-02-08 20:38:15'),
(238,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-08 22:12:44','2022-02-08 22:12:44'),
(239,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-08 22:12:52','2022-02-08 22:12:52'),
(240,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"DenisMeydanov\",\"by\":\"admin\"}','2022-02-08 23:04:06','2022-02-08 23:04:06'),
(241,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 02:00:13','2022-02-09 02:00:13'),
(242,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 02:13:55','2022-02-09 02:13:55'),
(243,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-09 02:16:53','2022-02-09 02:16:53'),
(244,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 12:38:46','2022-02-09 12:38:46'),
(245,'default','User information was updated',28,'App\\User',1,'App\\User','{\"name\":\"sasha\",\"by\":\"admin\"}','2022-02-09 14:39:51','2022-02-09 14:39:51'),
(246,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 14:48:18','2022-02-09 14:48:18'),
(247,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-09 14:49:45','2022-02-09 14:49:45'),
(248,'default','User information was updated',28,'App\\User',6,'App\\User','{\"name\":\"sasha\",\"by\":\"wukasin\"}','2022-02-09 15:42:57','2022-02-09 15:42:57'),
(249,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-09 15:43:04','2022-02-09 15:43:04'),
(250,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 15:43:13','2022-02-09 15:43:13'),
(251,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:44:24','2022-02-09 15:44:24'),
(252,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:44:25','2022-02-09 15:44:25'),
(253,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:44:41','2022-02-09 15:44:41'),
(254,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:44:50','2022-02-09 15:44:50'),
(255,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:45:28','2022-02-09 15:45:28'),
(256,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:45:41','2022-02-09 15:45:41'),
(257,'default','User information was updated',35,'App\\User',1,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"admin\"}','2022-02-09 15:46:05','2022-02-09 15:46:05'),
(258,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 15:46:10','2022-02-09 15:46:10'),
(259,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-09 15:46:14','2022-02-09 15:46:14'),
(260,'default','User information was updated',35,'App\\User',6,'App\\User','{\"name\":\"zzzzbbb\",\"by\":\"wukasin\"}','2022-02-09 15:46:20','2022-02-09 15:46:20'),
(261,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-02-09 16:31:57','2022-02-09 16:31:57'),
(262,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 16:32:21','2022-02-09 16:32:21'),
(263,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-09 19:09:21','2022-02-09 19:09:21'),
(264,'default','User was deleted',37,'App\\User',1,'App\\User','{\"name\":\"ice\",\"by\":\"admin\"}','2022-02-09 21:45:42','2022-02-09 21:45:42'),
(265,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"Edmon Dantes123\",\"by\":\"admin\"}','2022-02-09 22:08:27','2022-02-09 22:08:27'),
(266,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-11 00:53:50','2022-02-11 00:53:50'),
(267,'default','Updated profile',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-11 02:36:26','2022-02-11 02:36:26'),
(268,'default','User information was updated',19,'App\\User',1,'App\\User','{\"name\":\"delicious\",\"by\":\"admin\"}','2022-02-11 02:37:54','2022-02-11 02:37:54'),
(269,'default','User information was updated',19,'App\\User',1,'App\\User','{\"name\":\"delicious\",\"by\":\"admin\"}','2022-02-11 02:38:16','2022-02-11 02:38:16'),
(270,'default','User information was updated',34,'App\\User',1,'App\\User','{\"name\":\"zzzzzz\",\"by\":\"admin\"}','2022-02-11 02:38:57','2022-02-11 02:38:57'),
(271,'default','User information was updated',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-11 02:39:11','2022-02-11 02:39:11'),
(272,'default','User was created',38,'App\\User',1,'App\\User','{\"name\":\"abccccsd\",\"by\":\"admin\"}','2022-02-11 02:44:04','2022-02-11 02:44:04'),
(273,'default','User information was updated',39,'App\\User',1,'App\\User','{\"name\":\"drogba\",\"by\":\"admin\"}','2022-02-11 02:48:20','2022-02-11 02:48:20'),
(274,'default','Updated profile',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-02-11 02:53:36','2022-02-11 02:53:36'),
(275,'default','User information was updated',40,'App\\User',1,'App\\User','{\"name\":\"nemanja\",\"by\":\"admin\"}','2022-02-11 02:54:02','2022-02-11 02:54:02'),
(276,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-04 02:46:06','2022-03-04 02:46:06'),
(277,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-10 10:06:52','2022-03-10 10:06:52'),
(278,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-10 14:24:26','2022-03-10 14:24:26'),
(279,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-13 10:00:48','2022-03-13 10:00:48'),
(280,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-24 21:39:12','2022-03-24 21:39:12'),
(281,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-25 16:30:15','2022-03-25 16:30:15'),
(282,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-25 19:26:48','2022-03-25 19:26:48'),
(283,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-25 19:27:34','2022-03-25 19:27:34'),
(284,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-03-25 19:27:39','2022-03-25 19:27:39'),
(285,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-03-25 20:29:25','2022-03-25 20:29:25'),
(286,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-25 20:29:35','2022-03-25 20:29:35'),
(287,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-03-27 02:13:03','2022-03-27 02:13:03'),
(288,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-05 15:51:07','2022-04-05 15:51:07'),
(289,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-05 15:52:20','2022-04-05 15:52:20'),
(290,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-05 15:52:26','2022-04-05 15:52:26'),
(291,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-05 16:58:26','2022-04-05 16:58:26'),
(292,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-06 17:56:43','2022-04-06 17:56:43'),
(293,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-06 17:56:50','2022-04-06 17:56:50'),
(294,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-06 17:56:58','2022-04-06 17:56:58'),
(295,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-07 18:52:21','2022-04-07 18:52:21'),
(296,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-08 00:32:05','2022-04-08 00:32:05'),
(297,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-08 05:49:26','2022-04-08 05:49:26'),
(298,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-08 17:24:44','2022-04-08 17:24:44'),
(299,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-09 04:56:11','2022-04-09 04:56:11'),
(300,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-09 05:02:27','2022-04-09 05:02:27'),
(301,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-09 16:13:35','2022-04-09 16:13:35'),
(302,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-09 21:28:16','2022-04-09 21:28:16'),
(303,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-10 00:56:56','2022-04-10 00:56:56'),
(304,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-10 01:00:02','2022-04-10 01:00:02'),
(305,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-10 01:00:33','2022-04-10 01:00:33'),
(306,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-10 01:00:37','2022-04-10 01:00:37'),
(307,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-10 01:01:13','2022-04-10 01:01:13'),
(308,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-10 06:45:43','2022-04-10 06:45:43'),
(309,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"QWER Nemanja\",\"by\":\"admin\"}','2022-04-10 08:45:56','2022-04-10 08:45:56'),
(310,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"aaaa Drogba\",\"by\":\"admin\"}','2022-04-10 08:46:01','2022-04-10 08:46:01'),
(311,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"ccc zzzzzz\",\"by\":\"admin\"}','2022-04-10 08:46:05','2022-04-10 08:46:05'),
(312,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"Nepal Friend\",\"by\":\"admin\"}','2022-04-10 08:46:10','2022-04-10 08:46:10'),
(313,'default','Appointment has removed.',NULL,'App\\User',1,'App\\User','{\"name\":\"Gorchakin James\",\"by\":\"admin\"}','2022-04-10 08:46:13','2022-04-10 08:46:13'),
(314,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-10 09:04:22','2022-04-10 09:04:22'),
(315,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-10 09:04:30','2022-04-10 09:04:30'),
(316,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-10 14:01:17','2022-04-10 14:01:17'),
(317,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-10 14:13:50','2022-04-10 14:13:50'),
(318,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-10 14:13:57','2022-04-10 14:13:57'),
(319,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-11 06:36:38','2022-04-11 06:36:38'),
(320,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-11 08:19:34','2022-04-11 08:19:34'),
(321,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-11 08:19:42','2022-04-11 08:19:42'),
(322,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-11 09:01:53','2022-04-11 09:01:53'),
(323,'default','Account signed-in',17,'App\\User',17,'App\\User','{\"name\":\"jovan\",\"by\":\"jovan\"}','2022-04-11 09:02:49','2022-04-11 09:02:49'),
(324,'default','Account signed-out',17,'App\\User',17,'App\\User','{\"name\":\"jovan\",\"by\":\"jovan\"}','2022-04-11 09:06:30','2022-04-11 09:06:30'),
(325,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-14 11:59:50','2022-04-14 11:59:50'),
(326,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-14 12:50:29','2022-04-14 12:50:29'),
(327,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-14 12:50:35','2022-04-14 12:50:35'),
(328,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-14 12:58:39','2022-04-14 12:58:39'),
(329,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-14 12:58:51','2022-04-14 12:58:51'),
(330,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-14 13:19:54','2022-04-14 13:19:54'),
(331,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:02:22','2022-04-15 18:02:22'),
(332,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:04:08','2022-04-15 18:04:08'),
(333,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:04:16','2022-04-15 18:04:16'),
(334,'default','Updated profile',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:04:46','2022-04-15 18:04:46'),
(335,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:04:50','2022-04-15 18:04:50'),
(336,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:04:56','2022-04-15 18:04:56'),
(337,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:05:04','2022-04-15 18:05:04'),
(338,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"wukasin\",\"by\":\"wukasin\"}','2022-04-15 18:06:20','2022-04-15 18:06:20'),
(339,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"omega2148\",\"by\":\"omega2148\"}','2022-04-15 18:08:55','2022-04-15 18:08:55'),
(340,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"omega2148\",\"by\":\"omega2148\"}','2022-04-15 18:09:12','2022-04-15 18:09:12'),
(341,'default','Updated profile',6,'App\\User',6,'App\\User','{\"name\":\"omega2148\",\"by\":\"omega2148\"}','2022-04-15 18:09:28','2022-04-15 18:09:28'),
(342,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"omega2148\",\"by\":\"omega2148\"}','2022-04-15 18:09:32','2022-04-15 18:09:32'),
(343,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"rapid_clerical\",\"by\":\"rapid_clerical\"}','2022-04-15 18:11:03','2022-04-15 18:11:03'),
(344,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"rapid_clerical\",\"by\":\"rapid_clerical\"}','2022-04-15 18:11:22','2022-04-15 18:11:22'),
(345,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:11:38','2022-04-15 18:11:38'),
(346,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-15 18:53:57','2022-04-15 18:53:57'),
(347,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-17 01:07:29','2022-04-17 01:07:29'),
(348,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-17 03:00:01','2022-04-17 03:00:01'),
(349,'default','Account signed-in',6,'App\\User',6,'App\\User','{\"name\":\"rapid_clerical\",\"by\":\"rapid_clerical\"}','2022-04-17 03:00:20','2022-04-17 03:00:20'),
(350,'default','Account signed-out',6,'App\\User',6,'App\\User','{\"name\":\"rapid_clerical\",\"by\":\"rapid_clerical\"}','2022-04-17 03:00:33','2022-04-17 03:00:33'),
(351,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-17 13:49:10','2022-04-17 13:49:10'),
(352,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-17 21:19:03','2022-04-17 21:19:03'),
(353,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-18 03:30:56','2022-04-18 03:30:56'),
(354,'default','Account signed-in',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-20 21:35:47','2022-04-20 21:35:47'),
(355,'default','Account signed-out',1,'App\\User',1,'App\\User','{\"name\":\"admin\",\"by\":\"admin\"}','2022-04-20 21:57:04','2022-04-20 21:57:04');

/*Table structure for table `appointments` */

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `s_time` datetime DEFAULT NULL,
  `symptoms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('scheduled','done') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `payment_gateway` enum('Paypal','Cash') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` enum('Paid','Declined','Cancelled','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Positive/Negative or custom text',
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collected_time` datetime DEFAULT NULL,
  `reported_time` datetime DEFAULT NULL,
  `app_str` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `appointments` */

insert  into `appointments`(`id`,`user_id`,`type_id`,`s_time`,`symptoms`,`status`,`paid`,`payment_gateway`,`payment_status`,`result`,`pdf`,`collected_time`,`reported_time`,`app_str`,`created_at`,`updated_at`) values 
(1,45,1,NULL,'[1,0,0,0,0,0,0,0,0,0,0]','scheduled',100.00,'Cash','Paid',NULL,NULL,NULL,NULL,'677770057174046','2022-04-17 16:50:06','2022-04-17 16:50:06'),
(2,45,1,NULL,'[1,0,0,0,0,0,0,0,0,0,0]','scheduled',100.00,'Cash','Paid','Inconclusive','public/results/report_245545839980710.pdf','2022-04-17 03:02:00','2022-04-18 03:02:00','037325448085628','2022-04-17 22:21:12','2022-04-18 03:04:01'),
(3,45,1,NULL,'[0,1,0,0,0,0,0,0,0,0,0]','scheduled',100.00,'Cash','Paid','Inconclusive','public/results/report_637422881159350.pdf','2022-04-17 03:15:00','2022-04-18 03:15:00','637422881159350','2022-04-18 03:14:48','2022-04-18 03:16:00');

/*Table structure for table `article_categories` */

DROP TABLE IF EXISTS `article_categories`;

CREATE TABLE `article_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article_categories` */

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `articles` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `google2fas` */

DROP TABLE IF EXISTS `google2fas`;

CREATE TABLE `google2fas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT 0,
  `google2fa_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `google2fas` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2017_08_24_000000_create_settings_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_10_14_130139_create_permission_tables',1),
(6,'2019_10_20_235738_create_activity_log_table',1),
(7,'2019_11_06_102701_create_google2fas_table',1),
(8,'2020_01_06_193639_create_stripe_plans_table',1),
(9,'2020_02_06_151213_create_articles_table',1),
(10,'2020_03_08_234129_create_subscriptions_table',1),
(11,'2020_03_20_152321_create_article_categories_table',1),
(12,'2020_08_08_113943_create_webhook_calls_table',1),
(13,'2022_01_10_154200_create_tests_table',2),
(14,'2022_01_10_154651_create_appointments_table',2),
(15,'2022_01_10_154652_create_appointments_table',3);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\User',1),
(1,'App\\User',25),
(1,'App\\User',26),
(1,'App\\User',38),
(2,'App\\User',17),
(2,'App\\User',18),
(2,'App\\User',19),
(2,'App\\User',21),
(2,'App\\User',22),
(2,'App\\User',23),
(2,'App\\User',24),
(2,'App\\User',27),
(2,'App\\User',28),
(2,'App\\User',29),
(2,'App\\User',30),
(2,'App\\User',31),
(2,'App\\User',32),
(2,'App\\User',33),
(2,'App\\User',34),
(2,'App\\User',39),
(2,'App\\User',40),
(2,'App\\User',41),
(2,'App\\User',42),
(2,'App\\User',43),
(2,'App\\User',44),
(2,'App\\User',45),
(3,'App\\User',6);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pdf_templates` */

DROP TABLE IF EXISTS `pdf_templates`;

CREATE TABLE `pdf_templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `result_type` varchar(100) DEFAULT NULL COMMENT 'Positive/Negative or Number/Score',
  `positive_display` varchar(100) DEFAULT NULL,
  `negative_display` varchar(100) DEFAULT NULL,
  `inconclusive_display` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `qr_code` tinyint(1) DEFAULT 1,
  `preview_url` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `pdf_templates` */

insert  into `pdf_templates`(`id`,`name`,`result_type`,`positive_display`,`negative_display`,`inconclusive_display`,`description`,`qr_code`,`preview_url`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Antibody','Positive/Negative','DETECTED','NOT DETECTED','PENDING','<p><span style=\"font-size: 14px;\"><b>Detected</b> (positive): You produced the COVID-19 IgG antibody and have a high likelihood of prior infection. Some patients with past infections may not have experienced any symptoms. It is unclear at this time if a positive IgG infers immunity against future COVID-10 infection. Please continue with universal precautions: social distancing, hand washing and when applicable PPE such as masks or gloves.</span><br></p><p><br></p><p><span style=\"font-size: 14px;\"><b>Not Detected</b> (negative): You tested negative for the COVID-19 IgG antibody. This means you have not been infected with COVID-19. Please note, it may take 14-21 days to produce detectable levels of IgG following infection. If you have symptoms consistent with COVID-19 within the past 3 weeks and tested negative, repeat testing in 1 -2 weeks may yield a positive result.</span></p><p><br></p><p><span style=\"font-size: 14px;\">Please review the \"Fact Sheets\" and FDA authorized labeling available for health care providers using the following website: <a href=\"https://www.fda.gov/media/136523/download\" target=\"_blank\">https://www.fda.gov/media/136523/download</a>; and patients using the following websites: <a href=\"https://www.fda.gov/media/136524/download\" target=\"_blank\">https://www.fda.gov/media/136524/download</a>. This test has been authorized by the FDA under an Emergency Use Authorization (EUA) for use by authorized laboratories.</span></p><p><br></p><p><b>Next Steps:</b></p><ol><li><span style=\"font-size: 14px;\">&nbsp;<b>Maintain social distance</b> - Stay home from work, school, and all activities when you have any COVID-19 symptoms. Keep away from others who are sick and limit close contacts as much as possible (about 6 feet).</span></li><li><span style=\"font-size: 14px;\">&nbsp;<b>Wear a mask&nbsp;</b>- Wear a facial covering over your mouth and nose when you are unable to social distance.</span></li><li><span style=\"font-size: 14px;\">&nbsp;<b>Wash your hands&nbsp;</b>- Clean your hands often, either with soap and water for 20 seconds or with a hand sanitizer that contains at least 60% alcohol.</span></li><li><span style=\"font-size: 14px;\"><p><span style=\"font-size: 14px;\"><b>Lean more&nbsp;</b>- COVID-19 is in a family of viruses known as coronaviruses. To learn more about COVID</span><span style=\"font-size: 14px;\">19 and how you can help reduce the spread of the virus in your community,&nbsp;</span><span style=\"font-size: 14px;\"><a href=\"https://floridahealthcovid19.gov/\" target=\"_blank\">https://floridahealthcovid19.gov/</a></span></p></span></li></ol>',1,'public/assets/templates/template_1.pdf','2022-04-18 08:35:36','2022-04-18 01:35:36',NULL),
(2,'Antigen','Positive/Negative','Detected (Positive)','Not Detected (Negative)','PENDING (Inconclusive)','<p><span style=\"font-size: 14px;\">A Not Detected (negative) test result for this test means that SARS-CoV-2 nucleocapsid antigens were not present in the specimen above the limit of detection. A negative result does not rule out the possibility of COVID-19 and should not be used as the sole basis for treatment or patient management decisions. If COVID-19 is still suspected, based on exposure history&nbsp;</span><span style=\"font-size: 14px;\">together with other clinical findings, re-testing should be considered in consultation with public health authorities. Laboratory test results should always be considered in the context of clinical observations and epidemiological data in making a final diagnosis and patient management decisions.</span></p><p><span style=\"font-size: 14px;\"><br></span></p><p><span style=\"font-size: 14px;\">A Detected (positive) test result indicates that the SARS-CoV-2 nucleocapsid antigens are detectable in upper and lower respiratory specimens during infection. Positive results are indicative of active infection with SARS-COV-2, but do not rule out bacterial infection or co-infection with other viruses. The agent detected may not be the definite cause of disease. This test is intended for the qualitative detection of nucleic acid from the SARS-COV-2 virus in upper and lower respiratory specimens collected from individuals who meet CDC criteria.</span></p><p><span style=\"font-size: 14px;\"><br></span></p><p><span style=\"font-size: 14px;\">Please review the \"Fact Sheets\" and FDA authorized labeling available for health care providers using the following website: <a href=\"https://www.fda.gov/media/136523/download\" target=\"_blank\">https://www.fda.gov/media/136523/download</a>; and patients using the following websites:&nbsp;</span><a href=\"https://www.fda.gov/media/136524/download\" target=\"_blank\">https://www.fda.gov/media/136524/download</a></p><p><span style=\"font-size: 14px;\"><br></span></p><p><span style=\"font-size: 14px;\">This test has been authorized by the FDA under an Emergency Use Authorization (EUA) for use by authorized laboratories.</span></p><p><span style=\"font-size: 14px;\"><br></span></p><p><span style=\"font-size: 14px;\">Due to the current public health emergency, Rapid-Labs is performing a high volume of samples. In order to serve patients, only samples performed at Rapid-Labs facilities will be tested at Rapid-Labs. Positive results do not rule out a bacterial infection or co-infection with other viruses. Negative results should be treated as presumptive and, if inconsistent with clinical signs and symptoms or necessary for patient management should be tested with different authorized or cleared molecular tests.</span></p><p><span style=\"font-size: 14px;\">Methodology: Qualitative detection of SARS-CoV-2 nucleocapsid antigens in nasal swabs from individuals who are suspected of COVID-19.</span></p>',1,'public/assets/templates/template_2.pdf','2022-04-18 10:15:25','2022-04-18 03:15:25',NULL),
(3,'HIV','Positive/Negative','reactive (Preliminary Positive)','non-reactive (Negative)','PENDING','<p><span style=\"font-size: 14px;\">A non-reactive</span><b> <span style=\"font-size: 14px;\">(Negative)</span></b><span style=\"font-size: 14px;\"> result means that HIV antibodies were not detected in your blood at the time of testing. However, this does not completely rule out the possibility of infection with HIV. HIV antibodies may not appear until a few months after infection with the virus. A very recent infection may not produce enough antibodies to be detected by this test. Ask your healthcare provider if you should consider getting tested again in the next 3 to 6 months to be sure that you are not infected. However, if you are certain that you have not had any of the contacts that could transmit HIV in the last 3 months before you\'re HIV test a negative test result means you were not infected with HIV at the time of testing. Ask your healthcare provider to help you understand what your test results mean for you.</span></p><p><br></p><p><span style=\"font-size: 14px;\">A reactive </span><b><span style=\"font-size: 14px;\">Preliminary Positive</span></b><span style=\"font-size: 14px;\"> (negative): test results suggest that your blood may contain HIV antibodies. This result, however, must be confirmed by another test. If you have participated in an HIV vaccine study, you should inform the person giving you the test. Until your HIV test is confirmed, you should be careful to avoid activities that might spread HIV. If your test result is confirmed positive (HIV-infected), new treatments can help you maintain your health. Some people who test positive for HIV infection stay healthy for many years.</span></p><p><span style=\"font-size: 14px;\">Even if you become ill, there are medications that can help to slow down the virus and maintain your immune system. You should tell your doctor that you are HIV positive, so that he or she can watch your health closely.</span></p><p><span style=\"font-size: 14px;\">You must take steps to protect others by practicing safe sex and by informing your past and present partners about your HIV test result.</span></p><p><br></p><p><span style=\"font-size: 14px;\">This test has been authorized by the FDA for use by authorized laboratories.</span></p><p><br></p><p><b><span style=\"font-size: 14px;\">Where can you get more information about HIV and AIDS?</span></b></p><p><br></p><p><span style=\"font-size: 14px;\">If you have any questions or want additional information, ask your healthcare provider or contact your local health department. You can also call </span><b><span style=\"font-size: 14px;\">the National AIDS Hotline at 1-800-CDC-INFO (1-800-232- 4636)</span></b><span style=\"font-size: 14px;\"> to talk with an HIV specialist. They can give you quick, private answers at any time, day or night. Other AIDS service organizations near you can also provide information, education, and the help you may need.</span></p>',1,'public/assets/templates/template_5.pdf','2022-04-18 10:03:30','2022-04-14 15:17:50',NULL),
(4,'PCR','Positive/Negative','Deactive','Active','PENDING','<p><span style=\"font-size: 12px;\">A Not Detected (negative) test result for this test means that the RNA (Ribonucleic acid) contained within the SARS-CoV-2 virus were not present in the specimen above the limit of detection. A negative result does not rule out the possibility of COVID-19 and should not be used as the sole basis for treatment or patient management decisions. If COVID-19 is still suspected, based on exposure history together with other clinical findings, re-testing should be considered in consultation with public health authorities. Laboratory test results should always be considered in the context of clinical observations and epidemiological data in making a final diagnosis and patient management decisions.</span></p><p><br></p><p><span style=\"font-size: 12px;\">A Detected (positive) test result indicates that the RNA (Ribonucleic acid) contained within the SARS-CoV-2 virus were detectable in the specimen above the limit of detection. Positive results are indicative of active infection with SARS-COV-2, but do not rule out bacterial infection or co-infection with other viruses. The agent detected may not be the definite cause of disease. This test is intended for the qualitative detection of Ribonucleic acid from the SARS-COV-2 virus in the specimens collected from individuals who meet CDC criteria.</span></p><p><br></p><p><span style=\"font-size: 12px;\">Please review the \"Fact Sheets\" and FDA authorized labeling available for health care providers using the following website:&nbsp;</span><a href=\"https://www.fda.gov/media/136523/download\" target=\"_blank\"><span style=\"font-size: 12px;\">https://www.fda.gov/media/136523/download</span></a><span style=\"font-size: 12px;\">; and patients using the following websites:&nbsp;</span><a href=\"https://www.fda.gov/media/136524/download\" target=\"_blank\"><span style=\"font-size: 12px;\">https://www.fda.gov/media/136524/download</span></a><span style=\"font-size: 12px;\">.</span></p><p><br></p><p><span style=\"font-size: 12px;\">This test has been authorized by the FDA under an Emergency Use Authorization (EUA) for use by authorized laboratories.</span></p><p><br></p><p><span style=\"font-size: 12px;\">Due to the current public health emergency, Rapid-Labs is performing a high volume of samples. In order to serve patients, only samples performed at Rapid-Labs facilities will be tested at Rapid-Labs. Positive results do not rule out a bacterial infection or co-infection with other viruses. Negative results should be treated as presumptive and, if inconsistent with clinical signs and symptoms or necessary for patient management should be tested with different authorized or cleared molecular tests.</span></p><p><br></p><p><span style=\"font-size: 12px;\">Methodology: Qualitative detection of RNA (Ribonucleic acid) contained within the SARS-CoV-2 virus in nasal/oral swabs from individuals who are suspected of COVID-19.</span></p>',1,'public/assets/templates/template_6.pdf','2022-04-18 10:03:29','2022-04-09 21:41:50',NULL),
(7,'sss','Positive/Negative','aaa','bbb','ccc','<p>dfdsf</p>',1,'public/assets/templates/template_7.pdf','2022-04-21 04:37:01','2022-04-20 21:37:01',NULL);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`removable`,`created_at`,`updated_at`) values 
(1,'user-activity','web',0,'2022-01-10 23:29:11','2022-01-10 23:29:11'),
(2,'manage-user','web',0,'2022-01-10 23:29:11','2022-01-10 23:29:11'),
(3,'manage-permission','web',0,'2022-01-10 23:29:11','2022-01-10 23:29:11'),
(4,'manage-role','web',0,'2022-01-10 23:29:11','2022-01-10 23:29:11'),
(5,'manage-setting','web',0,'2022-01-10 23:29:11','2022-01-10 23:29:11');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(2,3),
(3,1),
(4,1),
(5,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`removable`,`created_at`,`updated_at`) values 
(1,'admin','web',0,'2022-01-10 23:29:11','2022-01-10 23:29:11'),
(2,'users','web',0,'2022-01-10 23:29:12','2022-01-13 08:03:13'),
(3,'clerical','web',0,'2022-01-10 23:29:12','2022-01-10 23:29:12');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`value`) values 
(1,'app_name','Rapid-Labs LLC'),
(2,'app_theme','dark'),
(3,'app_navbar','#007bff'),
(4,'app_sidebar','light'),
(5,'app_currency','USD'),
(6,'stripe_status','0'),
(7,'captcha','0'),
(8,'2fa','0'),
(9,'email_verification','0'),
(10,'default_location','United State'),
(11,'start_time','09:00'),
(12,'end_time','18:00'),
(13,'app_dark_logo','http://localhost/CovidTest/public/uploads/appLogo/app-logo-dark.png'),
(14,'app_light_logo','http://localhost:8000/uploads/appLogo/app-logo-light.png');

/*Table structure for table `stripe_plans` */

DROP TABLE IF EXISTS `stripe_plans`;

CREATE TABLE `stripe_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_interval` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_intervalCount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` double(8,2) NOT NULL,
  `trial_period_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stripe_plans_plan_name_unique` (`plan_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stripe_plans` */

/*Table structure for table `subscriptions` */

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_amount` double NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_start_date` datetime NOT NULL,
  `subscription_end_date` datetime NOT NULL,
  `subscription_trial_period` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscriptions` */

/*Table structure for table `tests` */

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_id` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `test_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_backgroundcolor` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tests` */

insert  into `tests`(`id`,`test_view`,`test_type`,`sample_type`,`template_id`,`description`,`features`,`price`,`test_color`,`test_backgroundcolor`,`delete_flag`,`created_at`,`updated_at`) values 
(1,'Covid-19 Rapid Antigen Test ~ 15 Minute Results','Covid-19 Rapid Antigen Test','Put here',2,'Desciption Confirm',NULL,100.00,'#000000','#e401e4',0,'2022-04-15 18:19:25','2022-04-15 18:19:25'),
(2,'Covid-19 RT-PCR Screening - Test Same Day Results 11 pm','Covid-19 RT-PCR','Put here',4,'Desciption Confirm',NULL,100.00,'#000000','#fbff00',0,'2022-04-15 18:19:25','2022-04-15 18:19:25'),
(3,'Covid-19 RT-PCR - Test Next Day by 11:00 pm','Covid-19 RT-PCR','Put here',4,'description',NULL,100.00,'#000000','#aed2ac',0,'2022-04-15 18:22:05','2022-04-15 18:22:05'),
(4,'Covid-19 RT-PCR Screening - Results in 24 Hours','Covid-19 RT-PCR','Put here',4,'Description',NULL,100.00,'#000000','#e8b426',0,'2022-04-15 18:22:05','2022-04-15 18:22:05'),
(5,'Covid-19 Rapid Antibody Test','Covid-19 Rapid Antibody Test','Put here',1,'Description',NULL,100.00,'#000000','#514091',0,'2022-04-15 18:24:35','2022-04-15 18:24:35'),
(6,'HIV Antibody Test','HIV Antibody Test','Put here',3,'HIV Description here',NULL,100.00,'#000000','#00ff00',0,'2022-04-15 18:26:00','2022-04-15 18:26:00'),
(7,'Covid-19 RT-PCR Screening - Test Same Day Results in 3 Hours','Covid-19 RT-PCR Screening','Put Sample Type',4,'Description Here',NULL,100.00,'#000000','#add8e6',0,'2022-04-15 18:28:16','2022-04-15 18:28:16'),
(8,'Covid-19 RT-PCR Screening - Results in 45 Minutes','Covid-19 RT-PCR Screening','Put Sample Type',4,'Description Here',NULL,100.00,'#000000','#f01414',0,'2022-04-15 18:28:16','2022-04-15 18:28:16');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `pass_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ethnicity` enum('white','hispanic','indian','asian','black','islander','other') COLLATE utf8mb4_unicode_ci DEFAULT 'white',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`username`,`email`,`phone`,`address`,`zipcode`,`gender`,`birth_date`,`pass_country`,`pass_number`,`ethnicity`,`email_verified_at`,`status`,`password`,`provider`,`provider_id`,`avatar`,`last_login_at`,`last_login_ip`,`remember_token`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Admin','RapidLab','admin','admin@gmail.com',NULL,NULL,NULL,'Male',NULL,'Kokiyoaaa',NULL,'white','2022-01-10 23:29:12','active','$2y$10$5fbgtPMXVcTlndk0IwiOverGHh/f4AZCz2T1CfM3yNDah4UXb6laO',NULL,NULL,'https://localhost/CovidTest/public/uploads/avatar/avatar.png','2022-04-20 14:35:46','::1',NULL,NULL,'2022-01-10 23:29:12','2022-04-20 21:35:46'),
(6,'Varela','Jonathan','rapid_clerical','clerical@gmail.com','123443566','All around the world','11111','Female','2022-01-29','United Arab Emirates','123456789','hispanic',NULL,'active','$2y$10$MXPWo4ZmYIb9OZdhp2UFIevs3uzcxOoDv4NkGSze7QQxDUjZYHnRO',NULL,NULL,'https://localhost/CovidTest/public/uploads/avatar/avatar.png','2022-04-16 20:00:20','::1',NULL,NULL,'2022-01-16 08:29:27','2022-04-17 03:00:20'),
(45,'Djordjevic','Nemanja','djordjevic','cloudrider.m92@gmail.com','1976243212','US','754111','Male','1992-04-15','United State','SJ123456','white',NULL,'active','$2y$10$QmCmAy5OkS1Ng72wrfsQduMzagCU9KD9ZgNznZCpsGue1tAmfx1Lq',NULL,NULL,'https://localhost/CovidTestCo/public/uploads/avatar/avatar.png',NULL,NULL,NULL,NULL,'2022-04-15 18:34:18','2022-04-15 18:34:18');

/*Table structure for table `webhook_calls` */

DROP TABLE IF EXISTS `webhook_calls`;

CREATE TABLE `webhook_calls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exception` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webhook_calls` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
