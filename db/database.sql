DROP TABLE IF EXISTS `t_appointment`;
CREATE TABLE IF NOT EXISTS `t_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `service` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

DROP TABLE IF EXISTS `t_config`;
CREATE TABLE IF NOT EXISTS `t_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` longblob,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lastName` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `companyName` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `profession` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'admin',
  `password` varchar(999) COLLATE utf8_spanish_ci NOT NULL DEFAULT '$2y$10$Tqxa8gwJUvg57v3clMTiLeoI3RqnA9vSV166AaT3/Ny5GlQqjl7I2',
  `monday` int(1) NOT NULL DEFAULT '1',
  `tuesday` int(1) NOT NULL DEFAULT '1',
  `wednesday` int(1) NOT NULL DEFAULT '1',
  `thursday` int(1) NOT NULL DEFAULT '1',
  `friday` int(1) NOT NULL DEFAULT '1',
  `saturday` int(1) NOT NULL DEFAULT '1',
  `sunday` int(1) NOT NULL DEFAULT '1',
  `monday_start1` time DEFAULT '08:00:00',
  `monday_end1` time DEFAULT '13:00:00',
  `tuesday_start1` time DEFAULT '08:00:00',
  `tuesday_end1` time DEFAULT '13:00:00',
  `wednesday_start1` time DEFAULT '08:00:00',
  `wednesday_end1` time DEFAULT '13:00:00',
  `thursday_start1` time DEFAULT '08:00:00',
  `thursday_end1` time DEFAULT '13:00:00',
  `friday_start1` time DEFAULT '08:00:00',
  `friday_end1` time DEFAULT '13:00:00',
  `saturday_start1` time DEFAULT '08:00:00',
  `saturday_end1` time DEFAULT '13:00:00',
  `sunday_start1` time DEFAULT '08:00:00',
  `sunday_end1` time DEFAULT '13:00:00',
  `monday_start2` time DEFAULT '16:00:00',
  `monday_end2` time DEFAULT '20:00:00',
  `tuesday_start2` time DEFAULT '16:00:00',
  `tuesday_end2` time DEFAULT '20:00:00',
  `wednesday_start2` time DEFAULT '16:00:00',
  `wednesday_end2` time DEFAULT '20:00:00',
  `thursday_start2` time DEFAULT '16:00:00',
  `thursday_end2` time DEFAULT '20:00:00',
  `friday_start2` time DEFAULT '16:00:00',
  `friday_end2` time DEFAULT '20:00:00',
  `saturday_start2` time DEFAULT '16:00:00',
  `saturday_end2` time DEFAULT '20:00:00',
  `sunday_start2` time DEFAULT '16:00:00',
  `sunday_end2` time DEFAULT '20:00:00',
  `timeOff` int(11) NOT NULL DEFAULT '30',
  `facebookLink` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `instagramLink` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bussinessAddress` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bussinessAddress2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bussinessCity` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bussinessState` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bussinessPostalCode` int(5) DEFAULT NULL,
  `bussinessCountry` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emailNotification` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
)

DROP TABLE IF EXISTS `t_customer`;
CREATE TABLE IF NOT EXISTS `t_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `lastName` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(9) DEFAULT NULL,
  `password` varchar(999) COLLATE utf8_spanish_ci NOT NULL,
  `term` int(11) NOT NULL DEFAULT '1',
  `token` varchar(999) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `emailVerified` int(11) NOT NULL DEFAULT '0',
  `emailSubscription` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
)

DROP TABLE IF EXISTS `t_service`;
CREATE TABLE IF NOT EXISTS `t_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `price` float NOT NULL,
  `description` varchar(999) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
)
