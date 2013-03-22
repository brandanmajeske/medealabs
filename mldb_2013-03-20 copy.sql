# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.15)
# Database: mldb
# Generation Time: 2013-03-21 03:54:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_text` text,
  `proj_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_file` tinytext,
  PRIMARY KEY (`post_id`),
  KEY `proj_id` (`proj_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_title`, `post_text`, `proj_id`, `user_id`, `post_date`, `post_file`)
VALUES
	(2,'The Overlane Route','Taken at the Historical Boise Train Station',1,1,'2013-03-20 13:58:39','032013-130339-seal.jpg'),
	(3,'Train Tracks','B&W Train Tracks\r\nTaken: July 2, 2012',1,20,'2013-03-20 14:05:19','032013-140319-whereDoTheseGo.jpg'),
	(4,'No Trespass','Ignore this sign!',2,1,'2013-03-20 14:14:46','032013-140346-noTrespassing.jpg'),
	(5,'Cloudy Day','Here comes the sun after a rainy day.',3,1,'2013-03-20 15:36:55','032013-150355-RollingClouds.jpg'),
	(6,'Johnny\'s Test Post!','This is a cool Yellow Tree!',4,29,'2013-03-20 20:54:16','032013-200316-yellowTree.jpg');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `proj_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `proj_title` varchar(50) DEFAULT NULL,
  `proj_cat` varchar(50) DEFAULT NULL,
  `proj_desc` text,
  `user_id` int(11) DEFAULT NULL,
  `proj_date` datetime DEFAULT NULL,
  `proj_file` tinytext,
  PRIMARY KEY (`proj_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`proj_id`, `proj_title`, `proj_cat`, `proj_desc`, `user_id`, `proj_date`, `proj_file`)
VALUES
	(1,'Idaho Photography Project','Photography','Photography projects in Idaho.',1,'2013-03-20 13:51:43','032013-130343-boise_light_leak.jpg'),
	(2,'Digital Art','Digital Art','Fire in the Sky',1,'2013-03-20 14:11:31','032013-140331-fireSky.jpg'),
	(3,'Rainy Day Blues','Photography','Images from a rainy day.',1,'2013-03-20 15:35:43',''),
	(4,'A New Project','Photography','Wet grass.',29,'2013-03-20 20:51:37','032013-200337-wet_grass.jpg');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_posts`;

CREATE TABLE `user_posts` (
  `id` int(11) unsigned NOT NULL,
  `post_id` int(11) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_profiles`;

CREATE TABLE `user_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_bio` text,
  `user_id` int(11) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  `user_image` tinytext,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;

INSERT INTO `user_profiles` (`id`, `user_bio`, `user_id`, `join_date`, `user_image`)
VALUES
	(1,'I like long walks on the beach. Large bottles of wine and lots of cheese. And cows.',1,'2013-03-20 15:33:24',NULL),
	(2,'Jill\'s wicked cool bio. From Massachusetts - says \"Pawk tha caw in yaw muthas yawd!\"',28,'2013-03-20 20:43:20',NULL),
	(4,'This profile has been edited by the user.',29,'2013-03-20 20:51:49',NULL);

/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `full_name` varchar(50) DEFAULT NULL,
  `salt` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_name` (`user_name`),
  UNIQUE KEY `UX_name_password` (`password`,`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `password`, `full_name`, `salt`, `email`)
VALUES
	(1,'brandan','bed912739730c294acb13eecfce3385b','Brandan Majeske','jfshskjd','brandan@bmaj.com'),
	(2,'tester','bed912739730c294acb13eecfce3385b','Tester','jfshskjd','test@test.com'),
	(20,'adam','d4d2fff98edb8f2d238ba1a904e3baeb','adam e.','1363809859','adam@e.com'),
	(26,'ben','393c0e8ade3401cc4bedb8a1376a97d8','ben jie','1363832318','ben@g.com'),
	(27,'jet','d13d6b1bb993390ba6e4693e2d2e3d8b','jet black','1363833388','jb@jet.com'),
	(28,'jill','f65769d1763942a29ea7808c35e2f273','jill bean','1363833771','jb@jb.com'),
	(29,'johnny','aa3d256d35f3a28276e8fed75c6f0ad6','johnny test','1363834239','test@jon.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;