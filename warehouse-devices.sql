-- -------------------------------------------------------------
-- TablePlus 4.6.4(414)
--
-- https://tableplus.com/
--
-- Database: warehouse-devices
-- Generation Time: 2022-05-28 23:58:18.6840
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `device_categories`;
CREATE TABLE `device_categories` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `category_id` bigint DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `available` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `device_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `device_categories` (`id`, `name`) VALUES
(1, 'industrial_trucks'),
(2, 'engineered_systems'),
(3, 'material_handlers'),
(4, 'handling_equipments');

INSERT INTO `devices` (`id`, `category_id`, `name`, `created_at`, `available`) VALUES
(7, 1, 'Hand Trucks', '2022-05-26 10:21:03', 23),
(8, 1, 'Side-loaders', '2022-05-26 10:21:03', 41),
(9, 1, 'Pallet trucks', '2022-05-26 10:21:03', 13),
(10, 1, 'Walkie stackers', '2022-05-26 10:21:03', 3),
(11, 1, 'Order pickers', '2022-05-26 10:21:03', 30),
(12, 1, 'Forklifts', '2022-05-26 10:21:03', 50),
(13, 2, 'AGVs', '2022-05-26 10:23:20', 11),
(14, 2, 'Conveyor belts', '2022-05-26 10:23:20', 61),
(15, 2, 'Robotic delivery system', '2022-05-26 10:23:20', 7),
(16, 3, 'Stackers and reclaimers', '2022-05-26 10:26:46', 11),
(17, 3, 'Hoppers', '2022-05-26 10:26:46', 11),
(18, 3, 'Grain elevators', '2022-05-26 10:26:46', 11),
(19, 3, 'Bucket elevators', '2022-05-26 10:26:46', 11),
(20, 3, 'Screw Conveyor', '2022-05-26 10:26:46', 11),
(21, 3, 'Rotary car dumper', '2022-05-26 10:26:46', 11),
(22, 4, 'Drawers', '2022-05-27 00:29:00', 101),
(23, 4, 'Stacking frames', '2022-05-27 00:29:00', 52),
(24, 4, 'Flow racks', '2022-05-27 00:29:01', 11),
(25, 4, 'Cantiveler racks', '2022-05-27 00:29:01', 91);

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `password`) VALUES
(21, 'kylym1631@gmail.com', 'Kylymbek', 'Mazaripov', '$2y$10$fKhdoA.Asg9UxiGr6l5kQuAYl/tpyArFfVQ6JXEpcFM0ROU/v/RVG');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;