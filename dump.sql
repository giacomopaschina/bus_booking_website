# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: iit_bus
# Generation Time: 2014-07-21 07:29:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Buses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Buses`;

CREATE TABLE `Buses` (
  `plate` varchar(11) NOT NULL DEFAULT '',
  `seats` int(3) NOT NULL,
  PRIMARY KEY (`plate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Buses` WRITE;
/*!40000 ALTER TABLE `Buses` DISABLE KEYS */;

INSERT INTO `Buses` (`plate`, `seats`)
VALUES
	('DD000DD',40),
	('EE111EE',40);

/*!40000 ALTER TABLE `Buses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Seats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Seats`;

CREATE TABLE `Seats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `timeid` int(11) NOT NULL,
  `data` date NOT NULL,
  `state` int(1) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Timetables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Timetables`;

CREATE TABLE `Timetables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `departuretime` time NOT NULL,
  `arrivaltime` time NOT NULL,
  `departureplace` varchar(60) NOT NULL DEFAULT '',
  `arrivalplace` varchar(60) NOT NULL DEFAULT '',
  `plate` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Timetables` WRITE;
/*!40000 ALTER TABLE `Timetables` DISABLE KEYS */;

INSERT INTO `Timetables` (`id`, `departuretime`, `arrivaltime`, `departureplace`, `arrivalplace`, `plate`)
VALUES
	(1,'07:45:00','08:00:00','Certosa','Morego','DD000DD'),
	(2,'08:10:00','08:25:00','Morego','Certosa','DD000DD'),
	(3,'08:45:00','09:00:00','Certosa','Morego','DD000DD'),
	(4,'09:10:00','09:25:00','Morego','Certosa','DD000DD'),
	(5,'09:45:00','10:00:00','Certosa','Morego','DD000DD'),
	(6,'10:10:00','10:25:00','Morego','Certosa','DD000DD'),
	(7,'17:00:00','17:15:00','Morego','Certosa','DD000DD'),
	(8,'17:30:00','17:45:00','Certosa','Morego','DD000DD'),
	(9,'18:00:00','18:15:00','Morego','Certosa','DD000DD'),
	(10,'18:30:00','18:45:00','Certosa','Morego','DD000DD'),
	(11,'19:00:00','19:15:00','Morego','Certosa','DD000DD'),
	(13,'07:45:00','07:50:00','Bolzaneto','Morego','EE111EE'),
	(14,'08:00:00','08:05:00','Morego','Bolzaneto','EE111EE'),
	(15,'08:45:00','08:50:00','Bolzaneto','Morego','EE111EE'),
	(16,'09:00:00','09:05:00','Morego','Bolzaneto','EE111EE'),
	(18,'09:45:00','09:50:00','Bolzaneto','Morego','EE111EE'),
	(20,'18:10:00','18:15:00','Morego','Bolzaneto','EE111EE'),
	(21,'18:30:00','18:35:00','Bolzaneto','Morego','EE111EE'),
	(22,'19:10:00','19:15:00','Morego','Bolzaneto','EE111EE');

/*!40000 ALTER TABLE `Timetables` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `email` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `surname` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`email`, `name`, `surname`, `password`)
VALUES
	('a','a','a','0cc175b9c0f1b6a831c399e269772661'),
	('b','b','b','92eb5ffee6ae2fec3ad71c777531578f'),
	('c','c','c','4a8a08f09d37b73795649038408b5f33'),
	('giulia.pasquale@iit.it','Giulia','Pasquale','1a1dc91c907325c69271ddf0c944bc72');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
