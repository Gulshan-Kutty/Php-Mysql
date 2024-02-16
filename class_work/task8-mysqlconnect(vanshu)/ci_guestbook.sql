-- Adminer 4.8.1 MySQL 5.5.5-10.4.10-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` enum('Active','Block','Pending') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cities` (`id`, `token`, `state_id`, `city_name`, `status`, `created`, `modified`) VALUES
(1,	'faa39a62417e90f77bdfd843ec29f656',	2,	'Surat',	'Active',	'2023-08-04 13:55:51',	'0000-00-00 00:00:00'),
(2,	'461da0a0b0b44404130ac942a824a63d',	2,	'Jamnagar',	'Active',	'2023-08-04 13:56:02',	'0000-00-00 00:00:00'),
(3,	'9eaa704df5556b49a7d12f986d47dc27',	1,	'Nagpur',	'Active',	'2023-08-04 13:56:09',	'0000-00-00 00:00:00'),
(4,	'9c9437489ee8566d8c256d26c8bb61b1',	1,	'Mumbai',	'Active',	'2023-08-04 13:56:17',	'0000-00-00 00:00:00'),
(5,	'9c9437489ee8566d8c256d26c8bb61b1',	1,	'Wardha',	'Active',	'2023-08-04 13:56:17',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other','etc') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `access_details` text NOT NULL,
  `role` enum('Admin','User','superadmin') NOT NULL,
  `status` enum('Active','Block','Pending') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `token_link` varchar(100) NOT NULL,
  `token_created` datetime NOT NULL,
  `address` text NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `token`, `name`, `email_address`, `password`, `dob`, `gender`, `photo`, `last_login`, `last_ip`, `access_details`, `role`, `status`, `created`, `modified`, `token_link`, `token_created`, `address`, `hobbies`, `city_id`, `created_at`) VALUES
(1,	'900150983cd24fb0d6963f7d28e17f72',	'Admin',	'admin@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'',	'2023-08-04 11:56:41',	'::1',	'Chrome 115.0.0.0',	'Admin',	'Active',	'2023-08-04 11:55:40',	'2023-08-04 11:56:41',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(2,	'dd4fb7f0bd3bccf77f67dac3b619a8dd',	'Snow',	'snowbelly@gmail.com',	'b4af804009cb036a4ccdc33431ef9ac9',	'0000-00-00',	'Male',	'',	'2023-08-25 16:36:25',	'127.0.0.1',	'Firefox 116.0',	'Admin',	'Active',	'2023-08-04 13:33:22',	'2023-09-26 19:32:39',	'',	'2023-09-26 19:22:09',	'',	'',	0,	'0000-00-00 00:00:00'),
(3,	'baa82a4886d50424bb5fd60927d61e97',	'Belly',	'belly@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'',	'2023-08-04 14:00:13',	'127.0.0.1',	'Firefox 115.0',	'Admin',	'Active',	'2023-08-04 13:59:58',	'2023-08-04 14:00:13',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(4,	'b78787068df8bdf92d17cafee1364bd3',	'Test',	'test123@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2023-08-25 16:33:21',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(5,	'17553ec7585dbb085fe840bd0ad57b07',	'Test',	'test12@gmail.com',	'32250170a0dca92d53ec9624f336ca24',	'0000-00-00',	'Male',	'',	'2023-09-05 10:36:12',	'127.0.0.1',	'Firefox 117.0',	'Admin',	'Active',	'2023-08-25 16:34:12',	'2023-09-05 10:36:12',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(6,	'8807079fdd16e3e704a293c4235eaf87',	'Test',	'test5509@gmail.com',	'b4af804009cb036a4ccdc33431ef9ac9',	'0000-00-00',	'Male',	'',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2023-09-06 16:31:50',	'2023-09-06 17:01:06',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(7,	'6f32b75703933dbe7dc382c5b7969877',	'Testname',	'test220011@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2023-09-06 16:42:59',	'2023-09-07 10:32:16',	'',	'2023-09-07 10:21:46',	'',	'',	0,	'0000-00-00 00:00:00'),
(8,	'71dbd34b82e86f1341bfc90f2d4a0ca4',	'Test',	'testsnow@gmail.com',	'b4af804009cb036a4ccdc33431ef9ac9',	'0000-00-00',	'Male',	'',	'2023-09-12 10:19:49',	'127.0.0.1',	'Firefox 117.0',	'Admin',	'Active',	'2023-09-12 10:19:39',	'2023-09-12 10:19:49',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(9,	'920898b74f20884119bab4125f5c1d4d',	'Demo Username',	'demo@gmail.com',	'b4af804009cb036a4ccdc33431ef9ac9',	'2023-11-21',	'Female',	'919c64648fcd1802c709adf0ef999fc6.jpg',	'2024-01-08 14:11:23',	'127.0.0.1',	'Firefox 121.0',	'Admin',	'Active',	'2023-09-12 13:16:07',	'2024-01-08 14:11:23',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'2024-01-08 14:11:23'),
(10,	'900150983cd24fb0d6963f7d28e17f72',	'Super Admin',	'superadmin@gmail.com',	'b4af804009cb036a4ccdc33431ef9ac9',	'0000-00-00',	'Male',	'',	'2023-10-06 10:18:03',	'127.0.0.1',	'Firefox 118.0',	'superadmin',	'Active',	'2023-08-04 11:55:40',	'2023-10-06 10:18:03',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(11,	'',	'Test',	'',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'16977092032022-09-091662706497Banner-1.jpg',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2023-10-19 03:23:23',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'tesat',	'reading, singing, dancing',	2,	'0000-00-00 00:00:00'),
(12,	'',	'Test',	'',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'16977952212022-09-091662706497Banner-1.jpg',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2023-10-20 15:17:01',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'test',	'reading, singing',	2,	'0000-00-00 00:00:00'),
(13,	'',	'Test',	'',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'16977952512022-09-091662706497Banner-1.jpg',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2023-10-20 15:17:31',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'test',	'reading, singing',	2,	'0000-00-00 00:00:00'),
(14,	'a738863b38e515ae0efdfc9cdbcee57a',	'Demo User',	'demouser@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'0000-00-00',	'Male',	'',	'2023-11-20 13:05:39',	'127.0.0.1',	'Firefox 119.0',	'Admin',	'Active',	'2023-11-20 13:04:02',	'2023-11-20 13:05:39',	'',	'0000-00-00 00:00:00',	'',	'',	0,	'0000-00-00 00:00:00'),
(15,	'',	'Test User',	'',	'9fab6755cd2e8817d3e73b0978ca54a6',	'0000-00-00',	'Male',	'1707915240home-img-1_MRorkY.png',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2024-02-14 18:24:00',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'Nagpur',	'singing',	3,	'0000-00-00 00:00:00'),
(16,	'',	'Test User',	'',	'b857eed5c9405c1f2b98048aae506792',	'0000-00-00',	'Male',	'1707915523placeholder.jpg',	'0000-00-00 00:00:00',	'',	'',	'Admin',	'Active',	'2024-02-14 18:28:43',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'Nagpur',	'singing',	2,	'0000-00-00 00:00:00');

-- 2024-02-15 05:55:31
