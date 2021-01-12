/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


DROP DATABASE IF EXISTS `agendaphp`;
CREATE DATABASE `agendaphp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `agendaphp`;
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `fecha_ini` varchar(255) NOT NULL,
  `fecha_fin` varchar(255) NOT NULL,
  `hora_ini` varchar(255) NOT NULL,
  `hora_fin` varchar(255) NOT NULL,
  `fk_usuario` varchar(255) NOT NULL,
  `fulldia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
