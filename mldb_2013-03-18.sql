# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.15)
# Database: mldb
# Generation Time: 2013-03-19 04:03:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table image_locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image_locations`;

CREATE TABLE `image_locations` (
  `image_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_width` smallint(4) DEFAULT NULL,
  `image_height` smallint(4) DEFAULT NULL,
  `alt_tag_text` varchar(255) DEFAULT NULL,
  `description` text,
  `upld_on` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `proj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_text` text,
  `proj_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `proj_id` (`proj_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_title`, `post_text`, `proj_id`, `user_id`, `image_id`)
VALUES
	(1,'Test Post','A test post for testing',NULL,1,NULL),
	(2,'Another post','The second test post for my database test',NULL,2,NULL),
	(3,'Test Post','The first test post for my database test.',NULL,1,NULL),
	(4,'the insert posts','the insert post text abcd',NULL,1,NULL);

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
  PRIMARY KEY (`proj_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`proj_id`, `proj_title`, `proj_cat`, `proj_desc`, `user_id`)
VALUES
	(1,'Leon\'s Project','Code','A robust code project.',16),
	(2,'Another project','Art','Another Project goes here',1),
	(3,'Super Project','Painting','Super project text description',1),
	(4,'Trigger\'s first project','coding','some code goes here',17),
	(5,'Trigger\'s Second Project','Photography','Photos are cool.',17),
	(6,'The Test Project','Test Project 1','Here is a new test project.',2);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table test_imageblob
# ------------------------------------------------------------

DROP TABLE IF EXISTS `test_imageblob`;

CREATE TABLE `test_imageblob` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(25) NOT NULL DEFAULT '',
  `image` blob NOT NULL,
  `image_size` varchar(25) NOT NULL DEFAULT '',
  `image_cat` varchar(25) NOT NULL DEFAULT '',
  `image_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(11,'tom','606d986929dcb1225fafe0276c0ec061','tom hanks','1363553599','tom@hanks.net'),
	(12,'stan','c46b45be5e0bdd0983687f4749c6e822','stan getz','1363553830','stan@getz.net'),
	(13,'stanley','f6aff9827c571f5edea9cbd0da31cd78','stan getz','1363553867','stanley@getzerg.net'),
	(14,'conrad','7385bdfc08966c6e25070164e1f05ced','connie jones','1363554084','con@jones.ru'),
	(16,'leon','b4bb2ae3ef6bfc48e408876ecd9baa93','leon lion','1363660963','leon@lion.com'),
	(17,'trigger','2f4e51401c32a9621ac10000c434313c','trigger horse','1363665417','th@horse.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
