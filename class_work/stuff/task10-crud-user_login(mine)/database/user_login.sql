-- Adminer 4.8.1 MySQL 8.0.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `attempts`;
CREATE TABLE `attempts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `attempts` (`id`, `email`, `password`, `status`, `created_at`, `modified_at`) VALUES
(11,	'pranavkore5@gmail.com',	'259',	'inactive',	NULL,	NULL),
(12,	'pranavkore5@gmail.com',	'159',	'inactive',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `email`, `password`, `status`, `created_at`, `modified_at`) VALUES
(1,	'pranavkore5@gmail.com',	'123',	'active',	'2024-02-26 10:48:38',	'2024-02-26 10:48:38'),
(2,	'pratiksha@yahoo.com',	'456',	'active',	'2024-02-26 10:49:02',	'2024-02-26 10:49:02'),
(3,	'partik@fb.com',	'789',	'active',	'2024-02-26 10:49:29',	'2024-02-26 10:49:29'),
(4,	'krupali@gmail.com',	'159',	'active',	'2024-02-26 10:49:52',	'2024-02-26 10:49:52');

-- 2024-02-27 04:42:15
