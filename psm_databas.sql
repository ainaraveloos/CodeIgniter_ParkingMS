-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour pms
CREATE DATABASE IF NOT EXISTS `pms` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pms`;

-- Listage de la structure de table pms. add_vehicle
CREATE TABLE IF NOT EXISTS `add_vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(200) NOT NULL,
  `parking_area_no` varchar(200) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `parking_charge` int NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '0',
  `arrival_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Listage des données de la table pms.add_vehicle : ~20 rows (environ)
INSERT INTO `add_vehicle` (`id`, `vehicle_no`, `parking_area_no`, `vehicle_type`, `parking_charge`, `status`, `arrival_time`) VALUES
	(3, 'ASS7', '8', 'Mini Van', 25, '0', '2024-10-18 18:03:13'),
	(5, 'YSC12', '8', 'Mini Van', 25, '1', '2024-10-18 18:03:50'),
	(7, 'ASS7', '8', 'Mini Van', 25, '1', '2024-10-18 18:04:13'),
	(40, '3309', '2', 'Car', 20, '1', '2024-10-28 15:30:15'),
	(42, 'ZA45', '7', 'Pickup ', 10, '0', '2024-10-28 15:31:12'),
	(43, '6767TAV', '2', 'Car', 20, '0', '2024-10-28 15:31:34'),
	(44, 'A111', '7', 'Pickup ', 10, '0', '2024-10-29 13:50:13'),
	(45, 'A112', '2', 'Car', 20, '0', '2024-10-29 13:50:27'),
	(46, 'A113', '9', 'Minibus', 16, '0', '2024-10-29 13:50:41'),
	(47, 'A115', '8', 'Mini Van', 25, '0', '2024-10-29 13:51:44'),
	(48, 'A116', '6', 'Motorcycle', 2, '1', '2024-10-29 13:52:22'),
	(49, '45BGM', '2', 'Car', 20, '0', '2024-10-29 15:02:57'),
	(50, 'BM777', '7', 'Pickup ', 10, '0', '2024-10-29 15:05:25'),
	(51, 'NOS45', '2', 'Car', 20, '0', '2024-10-29 15:13:41'),
	(52, 'NFSMW2', '7', 'Pickup ', 10, '0', '2024-10-29 15:15:11'),
	(53, 'FH5', '2', 'Car', 20, '0', '2024-10-29 15:15:27'),
	(54, 'NDS8', '6', 'Motorcycle', 2, '0', '2024-10-29 16:24:37'),
	(55, 'GT456', '2', 'Car', 20, '0', '2024-10-29 16:24:53'),
	(56, 'DC666', '2', 'Car', 20, '0', '2024-10-29 16:25:38'),
	(57, 'T16', '7', 'Pickup ', 10, '0', '2024-10-29 16:26:33');

-- Listage de la structure de table pms. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Listage des données de la table pms.admin : ~1 rows (environ)
INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
	(18, 'aina', '$2y$10$AKS6THGtiHtz09u6lh3HP.8ap2dloB0tKMFnX.Qa45shznetT3oXq', 'ainaraveloos@gmail.com'),
	(19, 'aina19', '$2y$10$VejyXOLMlP8pjMKplsf8Bu62kWMDIf7zEy7Hbh1h1Cbhr9QjvJ71G', 'ainaoptimus@gmail.com'),
	(20, 'azaza', '$2y$10$890i4rcYuCcVOM8NxjfgmegiUQiZWfqyUnvUIl1BS1HKExshr2w1K', 'ahuguessteeven@gmail.com'),
	(21, 'Bota', '$2y$10$0ZV3jq97rRaZxYwiUMfFOuyN2gzR7LBJfRGSXBnp8xB1QubSp5uPW', 'bobotasdsdd@gmail.com');

-- Listage de la structure de table pms. category
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `parking_area_no` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `vehicle_limit` varchar(200) NOT NULL,
  `parking_charge` varchar(200) NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table pms.category : ~5 rows (environ)
INSERT INTO `category` (`cat_id`, `parking_area_no`, `vehicle_type`, `vehicle_limit`, `parking_charge`, `status`, `doc`) VALUES
	(1, '2', 'Car', '16', '20', '0', '2020-04-19 19:33:44'),
	(3, '6', 'Motorcycle', '26', '2', '0', '2021-05-15 19:04:41'),
	(5, '7', 'Pickup ', '11', '10', '0', '2021-05-15 22:21:51'),
	(6, '9', 'Minibus', '6', '16', '0', '2021-05-15 22:22:53'),
	(11, '8', 'Mini Van', '15', '25', '0', '2024-10-17 20:54:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
