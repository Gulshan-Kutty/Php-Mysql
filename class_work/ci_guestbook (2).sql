-- Adminer 4.8.1 MySQL 10.4.32-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`, `created_at`, `modified_at`) VALUES
(1,	'Harsh',	'harshbhoyar@gmail.com',	'0000',	'Active',	'2024-02-27 11:56:58',	'2024-02-27 11:56:58');

DROP TABLE IF EXISTS `attempts`;
CREATE TABLE `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
(4,	1,	'Bhandara',	'Active',	'2023-08-19 09:45:15',	'2023-08-19 09:45:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `hobbies` (`id`, `tokenid`, `hobbyname`, `status`, `created`, `modified`) VALUES
(20,	'dffgdf',	'Reading',	'Active',	'0000-00-00 00:00:00',	'2024-02-22 12:13:41'),
(23,	'023c351f7ed45c767bfd62347ca5e95d',	'Playing',	'Active',	'2024-02-26 11:54:05',	'0000-00-00 00:00:00'),
(25,	'7d9e1b670745e660b8dc756ecc7af34f',	'Singing',	'Active',	'2024-02-26 11:58:47',	'0000-00-00 00:00:00'),
(28,	'd0493b6477cacf2a7fac395f7c30809a',	'Dancing',	'Active',	'2024-02-26 12:20:58',	'0000-00-00 00:00:00');

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
  `dob` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `hobby_id` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `tokenid`, `email`, `dob`, `password`, `address`, `gender`, `hobbies`, `city_id`, `hobby_id`, `photo`, `status`, `created`, `modified`) VALUES
(5,	'Pratiksha Pangul',	'0b48fe1db8cc4ca46dcb1a0cf1985685',	'pratiksha@gmail.com',	NULL,	'0000',	'',	'',	'',	0,	'',	'',	'Active',	'2024-02-21 04:51:11',	'2024-02-27 18:00:58'),
(13,	'Harsh',	'440a0fbc3ab9c4af5ed22d13ce3447f9',	'harsh1@gmail.com',	NULL,	'fa246d0262c3925617b0c72bb20eeb1d',	'',	'',	'',	0,	'',	'',	'Active',	'2024-02-27 12:20:37',	'2024-02-27 18:13:22'),
(14,	'Sagar',	'9df60bfc4cf7c0450457035e6c4654f6',	'sagar@gmail.com',	NULL,	'1111',	'',	'',	'',	0,	'',	'',	'Active',	'2024-02-27 12:21:16',	'0000-00-00 00:00:00'),
(18,	'Harsh Bhoyar',	'8b76458210508a6d1d5e9095de7b9a9c',	'harshbhoyar@gmail.com',	NULL,	'0000',	'',	'',	'',	0,	'',	'',	'Active',	'2024-02-27 02:10:15',	'2024-02-27 18:02:19'),
(19,	'Paru',	'b858f0ad84ff190171b399caed905b69',	'paru@pangul.com',	NULL,	'9999',	'',	'',	'',	0,	'',	'',	'Active',	'2024-02-27 02:25:11',	'2024-02-27 18:18:55'),
(23,	'Lasun',	'be9504b41db062fd16267819c5aa8b0a',	'lasun@gmail.com',	NULL,	'9999',	'',	'',	'',	0,	'',	'',	'Active',	'2024-02-27 03:45:59',	'0000-00-00 00:00:00');

-- 2024-02-27 13:55:56
