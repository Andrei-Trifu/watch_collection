# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204)
# Database: watch_collection
# Generation Time: 2023-11-20 10:59:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;

INSERT INTO `type` (`id`, `type`)
VALUES
	(1,'Automatic'),
	(2,'Quartz'),
	(3,'Solar'),
	(4,'Mechanical');

/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table watch
# ------------------------------------------------------------

DROP TABLE IF EXISTS `watch`;

CREATE TABLE `watch` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `dial_colour` varchar(100) NOT NULL,
  `watch_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `watch` WRITE;
/*!40000 ALTER TABLE `watch` DISABLE KEYS */;

INSERT INTO `watch` (`id`, `brand`, `model_name`, `dial_colour`, `watch_type`)
VALUES
	(1,'G-Shock','Mudmaster','Black',3),
	(2,'G-Shock','Square','Black',2),
	(3,'Citizen','Nighthawk','Red',3),
	(4,'Tissot','Seastar','Green',1),
	(5,'Tissot','Gentleman','Blue',1),
	(6,'Tissot','PRC200','White',2),
	(7,'Seiko','Monster','Orange',1),
	(8,'Oris','Aquis','Black',4),
	(9,'Hamilton','Pilor','Lime',4),
	(10,'Omega','Seamaster','Black',1),
	(11,'Rado','Captain Cook','Green',1),
	(12,'Seiko','Sports','Black',1),
	(13,'Rolex','Submariner','Green',1),
	(14,'G-Shock','Aviator','Black',3),
	(15,'Casio','Edifice','Yellow',2),
	(16,'Orient','Bambino','Black',4),
	(17,'Atlantic','Traveller','Blue',2),
	(18,'Bulova','Computron','Gold',2);

/*!40000 ALTER TABLE `watch` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
