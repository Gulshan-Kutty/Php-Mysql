-- Adminer 4.8.1 MySQL 10.4.32-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `created_at`, `modified_at`) VALUES
(1,	'Pratiksha Pangul',	'pratikshap@gmail.com',	'0000',	'Active',	'2024-02-27 12:16:07',	'2024-02-27 12:16:07')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `email` = VALUES(`email`), `password` = VALUES(`password`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `modified_at` = VALUES(`modified_at`);

DROP TABLE IF EXISTS `attempts`;
CREATE TABLE `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `attempts` (`id`, `email`, `password`, `status`, `created_at`, `modified_at`) VALUES
(181,	'pratiksha@gmail.com',	'zzzz',	'inactive',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(182,	'pratiksha@gmail.com',	'xxxx',	'inactive',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `email` = VALUES(`email`), `password` = VALUES(`password`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `modified_at` = VALUES(`modified_at`);

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48357 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `cities` (`id`, `state_id`, `cityname`, `status`, `created`, `modified`) VALUES
(1,	1,	'Nagpur',	'Active',	'2023-08-19 09:45:15',	'2023-08-19 09:45:15'),
(2,	1,	'Wardha',	'Active',	'2023-08-19 09:45:15',	'2023-08-19 09:45:15'),
(3,	1,	'Amravati',	'Active',	'2023-08-19 09:45:15',	'2023-08-19 09:45:15'),
(4,	1,	'Bhandara',	'Active',	'2023-08-19 09:45:15',	'2023-08-19 09:45:15')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `state_id` = VALUES(`state_id`), `cityname` = VALUES(`cityname`), `status` = VALUES(`status`), `created` = VALUES(`created`), `modified` = VALUES(`modified`);

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tokenid` varchar(50) NOT NULL,
  `hobbyname` varchar(50) NOT NULL,
  `status` enum('Active','Block') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `hobbies` (`id`, `tokenid`, `hobbyname`, `status`, `created`, `modified`) VALUES
(20,	'dffgdf',	'Reading',	'Active',	'0000-00-00 00:00:00',	'2024-02-22 12:13:41'),
(23,	'023c351f7ed45c767bfd62347ca5e95d',	'Playing',	'Active',	'2024-02-26 11:54:05',	'0000-00-00 00:00:00'),
(30,	'd03cc09e0f7d0e9ffb48aaf461a9e260',	'Dancing',	'Active',	'2024-02-27 11:04:29',	'0000-00-00 00:00:00')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `tokenid` = VALUES(`tokenid`), `hobbyname` = VALUES(`hobbyname`), `status` = VALUES(`status`), `created` = VALUES(`created`), `modified` = VALUES(`modified`);

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tokenid` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `countryname` varchar(50) NOT NULL,
  `statename` varchar(50) NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `statename` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tokenid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `hobby_id` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `tokenid`, `email`, `status`, `password`, `address`, `gender`, `hobbies`, `city_id`, `hobby_id`, `photo`, `dob`, `created`, `modified`) VALUES
(5,	'Pratiksha Pangul',	'0b48fe1db8cc4ca46dcb1a0cf1985685',	'pratiksha@gmail.com',	'Active',	'123',	'',	'',	'',	0,	'',	'',	'0000-00-00',	'2024-02-21 04:51:11',	'2024-02-27 15:57:25'),
(13,	'Harsh Bhoyar',	'285d980f80178fa863b050a0acd05e2a',	'harsh@gmail.com',	'Active',	'1234',	'',	'',	'',	0,	'',	'',	'0000-00-00',	'2024-02-27 11:13:42',	'2024-02-27 16:15:47'),
(15,	'Ruchi Korde',	'bdba5f25d22586e121246cbf00bb46be',	'ruchi@gmail.com',	'Active',	'4545',	'',	'',	'',	0,	'',	'',	'0000-00-00',	'2024-02-27 11:27:58',	'2024-02-27 15:58:41')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `tokenid` = VALUES(`tokenid`), `email` = VALUES(`email`), `status` = VALUES(`status`), `password` = VALUES(`password`), `address` = VALUES(`address`), `gender` = VALUES(`gender`), `hobbies` = VALUES(`hobbies`), `city_id` = VALUES(`city_id`), `hobby_id` = VALUES(`hobby_id`), `photo` = VALUES(`photo`), `dob` = VALUES(`dob`), `created` = VALUES(`created`), `modified` = VALUES(`modified`);

-- 2024-02-27 12:29:16
