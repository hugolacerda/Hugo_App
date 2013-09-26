# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: moviebase
# Generation Time: 2013-09-26 05:15:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
  `list_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `list_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`list_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lists` WRITE;
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;

INSERT INTO `lists` (`list_id`, `user_id`, `list_name`)
VALUES
	(13,NULL,'horror'),
	(16,NULL,'adventure');

/*!40000 ALTER TABLE `lists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table movies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `movie_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) DEFAULT NULL,
  `movie_number` int(11) DEFAULT NULL,
  `movie_description` varchar(255) DEFAULT NULL,
  `rotten_key` int(11) DEFAULT NULL,
  `list_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `list_id` (`list_id`),
  CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `lists` (`list_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_number`, `movie_description`, `rotten_key`, `list_id`)
VALUES
	(7,'Sharknado',5,'This movie sucks, cgi vomit, keep it on Syfy',NULL,13),
	(8,'Troll Hunter',4,'Freaky pov movie',NULL,13),
	(9,'Amytimvill Horror',3,'overated',NULL,13),
	(10,'Indiana Jones: Temple of Doom',1,'people don\'t like it but I do here why: lorem ipsum dolor set amet',NULL,16),
	(11,'asdoufoasdfaosdufp',2,'al;sdfsdlkfasdlfaskdjfal;s',NULL,16);

/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `password`)
VALUES
	(2,'bob','ae2b1fca515949e5d54fb22b8ed95575');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
