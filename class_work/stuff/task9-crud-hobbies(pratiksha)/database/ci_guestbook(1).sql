-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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

SET NAMES utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `hobbies` (`id`, `tokenid`, `hobbyname`, `status`, `created`, `modified`) VALUES
(19,	'ce0ea81169807904b84f67d712b825f1',	'',	'Active',	'2023-08-24 05:07:05',	'0000-00-00 00:00:00'),
(20,	'dffgdf',	'dgfgdf',	'Active',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(21,	'90a01a43430d0cf2936bc0414124ab30',	'Playing',	'Active',	'2023-08-29 04:59:37',	'2023-08-29 17:11:15');

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
  `password` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `tokenid`, `email`, `dob`, `password`, `address`, `gender`, `hobbies`, `city_id`, `hobby_id`, `photo`, `status`, `created`, `modified`) VALUES
(1,	'Test ',	'',	'',	NULL,	'16d7a4fca7442dda3ad93c9a726597e4',	'testtest',	'male',	'reading, singing, dancing',	3,	'',	'1692418754MicrosoftTeams-image.png',	'Active',	'2023-08-19 09:49:14',	'0000-00-00 00:00:00'),
(2,	'fdgfd',	'',	'',	NULL,	'',	'',	'',	'',	0,	'',	'',	'Active',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'Snow Belly',	'',	'',	NULL,	'52dcb810931e20f7aa2f49b3510d3805',	'nagpur',	'male',	'reading, singing',	3,	'',	'1692616473MicrosoftTeams-image (2).png',	'Active',	'2023-08-21 04:44:33',	'0000-00-00 00:00:00'),
(4,	'Test',	'eb9caea413de227bb7dcf7504c2cfe4d',	'test@gmail.com',	NULL,	'32250170a0dca92d53ec9624f336ca24',	'',	'',	'',	0,	'',	'',	'Active',	'2023-08-23 07:13:25',	'0000-00-00 00:00:00');

-- 2023-08-29 12:12:05
