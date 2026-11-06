-- Adminer 6.3.0 MariaDB 13.0.2-MariaDB-ubu2604 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tournaments`;
CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `game` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `max_teams` int(11) NOT NULL,
  `prize` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `tournaments` (`id`, `name`, `game`, `start_date`, `location`, `max_teams`, `prize`) VALUES
(1,	'Spring Cup 2026',	'Counter-Strike 2',	'2026-04-18',	'Žilina, herňa Arena',	8,	500);

-- 2026-11-06 08:02:04 UTC