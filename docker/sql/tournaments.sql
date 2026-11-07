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

INSERT INTO `tournaments` (`name`, `game`, `start_date`, `location`, `max_teams`, `prize`) VALUES
('Spring Cup 2026', 'Counter-Strike 2', '2026-04-18', 'Žilina, herňa Arena', 8, 500),
('Autumn League', 'League of Legends', '2026-10-24', 'Online', 16, 1000),
('Žilina Open', 'Valorant', '2026-12-05', 'Žilina, UNIZA', 12, 300),
('Nitra Clash', 'Rocket League', '2027-01-16', 'Nitra, Mestská hala', 8, 200);

-- 2026-11-06 08:02:04 UTC