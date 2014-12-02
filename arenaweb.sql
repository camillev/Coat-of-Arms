-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2014 at 10:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arenaweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `coordinate_x` int(11) NOT NULL,
  `coordinate_y` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `coordinate_x`, `coordinate_y`) VALUES
(1, 'Aragorn entered the arena', '2014-11-07 12:00:00', 2, 3),
(2, 'Slou left the arena.', '2014-11-28 15:10:04', -1, -1),
(3, 'Slou attacked Angmar for 1 dammage !', '2014-11-28 15:20:13', 2, 3),
(4, 'Slou attacked Angmar for 1 dammage !', '2014-11-28 15:21:46', 2, 3),
(5, 'Slou attacked Angmar for 1 dammage !', '2014-11-28 15:21:48', 2, 3),
(6, 'Slou attacked Angmar but it failed !', '2014-11-28 15:22:50', 2, 3),
(7, 'Slou attacked Angmar but it failed !', '2014-11-28 15:22:54', 2, 3),
(8, 'Slou attacked Angmar but it failed !', '2014-11-28 15:31:10', 2, 3),
(9, 'Slou attacked Angmar but it failed !', '2014-11-28 15:34:22', 2, 3),
(10, 'Slou attacked Angmar but it failed !', '2014-11-28 15:35:28', 2, 3),
(11, 'Slou attacked in the wind ...', '2014-12-01 01:45:40', 12, 5),
(12, 'Slou left the arena.', '2014-12-01 01:47:01', 13, 5),
(13, 'Slou attacked in the wind ...', '2014-12-01 01:48:43', 10, 9),
(14, 'Slou attacked in the wind ...', '2014-12-01 01:48:50', 10, 9),
(15, 'Slou attacked Angmar but it failed !', '2014-12-01 02:26:29', 4, 3),
(16, 'Slou attacked Angmar but it failed !', '2014-12-01 02:26:33', 4, 3),
(17, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:26:38', 4, 3),
(18, 'Slou attacked Angmar but it failed !', '2014-12-01 02:26:42', 4, 3),
(19, 'Slou attacked Angmar but it failed !', '2014-12-01 02:26:44', 4, 3),
(20, 'Slou attacked Angmar but it failed !', '2014-12-01 02:26:45', 4, 3),
(21, 'Angmar has been killed bySlou !', '2014-12-01 02:27:00', 4, 3),
(22, 'Slou attacked Angmar but it failed !', '2014-12-01 02:27:43', 4, 3),
(23, 'Slou attacked Angmar but it failed !', '2014-12-01 02:27:46', 4, 3),
(24, 'Slou attacked Angmar but it failed !', '2014-12-01 02:27:52', 4, 3),
(25, 'Slou attacked Angmar but it failed !', '2014-12-01 02:27:54', 4, 3),
(26, 'Angmar has been killed bySlou !', '2014-12-01 02:27:55', 4, 3),
(27, 'Angmar has been killed bySlou !', '2014-12-01 02:27:56', 4, 3),
(28, 'Angmar has been killed bySlou !', '2014-12-01 02:27:58', 4, 3),
(29, 'Angmar has been killed bySlou !', '2014-12-01 02:27:59', 4, 3),
(30, 'Slou attacked Angmar but it failed !', '2014-12-01 02:28:22', 4, 3),
(31, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:30:32', 4, 3),
(32, 'Slou attacked Angmar but it failed !', '2014-12-01 02:33:00', 4, 3),
(33, 'Slou attacked Angmar but it failed !', '2014-12-01 02:33:30', 4, 3),
(34, 'Slou attacked Angmar but it failed !', '2014-12-01 02:37:40', 4, 3),
(35, 'Slou attacked Angmar but it failed !', '2014-12-01 02:37:43', 4, 3),
(36, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:37:45', 4, 3),
(37, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:38:38', 4, 3),
(38, 'Slou attacked Angmar but it failed !', '2014-12-01 02:40:50', 4, 3),
(39, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:40:51', 4, 3),
(40, 'Slou attacked Angmar but it failed !', '2014-12-01 02:40:52', 4, 3),
(41, 'Slou attacked Angmar but it failed !', '2014-12-01 02:40:54', 4, 3),
(42, 'Slou attacked Angmar but it failed !', '2014-12-01 02:40:55', 4, 3),
(43, 'Slou attacked Angmar but it failed !', '2014-12-01 02:41:32', 4, 3),
(44, 'Slou attacked Angmar but it failed !', '2014-12-01 02:41:35', 4, 3),
(45, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:41:38', 4, 3),
(46, 'Slou attacked Angmar but it failed !', '2014-12-01 02:41:40', 4, 3),
(47, 'Slou attacked Angmar but it failed !', '2014-12-01 02:42:45', 4, 3),
(48, 'Slou attacked Angmar but it failed !', '2014-12-01 02:42:49', 4, 3),
(49, 'Slou attacked Angmar but it failed !', '2014-12-01 02:42:52', 4, 3),
(50, 'Slou attacked Angmar but it failed !', '2014-12-01 02:42:56', 4, 3),
(51, 'Slou attacked Angmar but it failed !', '2014-12-01 02:42:59', 4, 3),
(52, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:43:03', 4, 3),
(53, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:43:55', 4, 3),
(54, 'Slou attacked Angmar for 1 dammage !', '2014-12-01 02:43:56', 4, 3),
(55, 'Slou attacked Angmar but it failed !', '2014-12-01 02:45:16', 4, 3),
(56, 'Angmar has been killed bySlou !', '2014-12-01 09:00:07', 4, 3),
(57, 'Slou attacked Angmar but it failed !', '2014-12-01 09:00:14', 4, 3),
(58, 'Slou attacked Angmar but it failed !', '2014-12-01 09:07:35', 4, 3),
(59, 'Slou attacked Angmar but it failed !', '2014-12-01 09:07:49', 4, 3),
(60, 'Angmar has been killed bySlou !', '2014-12-01 09:07:52', 4, 3),
(61, 'Angmar has been killed bySlou !', '2014-12-01 09:22:14', 4, 3),
(62, 'Angmar has been killed bySlou !', '2014-12-01 09:22:57', 4, 3),
(63, 'Angmar has been killed bySlou !', '2014-12-01 09:23:31', 4, 3),
(64, 'Angmar has been killed bySlou !', '2014-12-01 09:24:33', 4, 3),
(65, 'Slou attacked Angmar but it failed !', '2014-12-01 09:25:12', 4, 3),
(66, 'Angmar has been killed bySlou !', '2014-12-01 09:25:40', 4, 3),
(67, 'Slou attacked Angmar but it failed !', '2014-12-01 09:27:13', 4, 3),
(68, 'Slou attacked Angmar but it failed !', '2014-12-01 09:28:08', 4, 3),
(69, 'Slou attacked Angmar but it failed !', '2014-12-01 09:28:21', 4, 3),
(70, 'Angmar has been killed bySlou !', '2014-12-01 09:31:08', 4, 3),
(71, 'Slou attacked Angmar but it failed !', '2014-12-01 09:33:57', 4, 3),
(72, 'Slou attacked Angmar but it failed !', '2014-12-01 09:34:28', 4, 3),
(73, 'Angmar has been killed bySlou !', '2014-12-01 09:35:00', 4, 3),
(74, 'Slou attacked Angmar but it failed !', '2014-12-01 09:36:40', 4, 3),
(75, 'Slou attacked in the wind ...', '2014-12-01 11:17:02', 8, 0),
(76, 'Slou attacked in the wind ...', '2014-12-01 11:17:04', 8, 0),
(77, 'Slou attacked in the wind ...', '2014-12-01 11:17:08', 8, 0),
(78, 'Slou attacked in the wind ...', '2014-12-01 11:18:39', 8, 0),
(79, 'Slou attacked in the wind ...', '2014-12-01 11:19:49', 8, 0),
(80, 'Slou attacked in the wind ...', '2014-12-01 11:20:58', 8, 0),
(81, 'Slou attacked in the wind ...', '2014-12-01 11:21:33', 8, 0),
(82, 'Slou attacked in the wind ...', '2014-12-01 11:22:12', 8, 0),
(83, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:24:51', 5, 4),
(84, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:25:05', 5, 4),
(85, 'Aragorn has been killed bySlou !', '2014-12-01 11:25:14', 5, 4),
(86, 'Aragorn has been killed bySlou !', '2014-12-01 11:26:08', 5, 4),
(87, 'Aragorn has been killed bySlou !', '2014-12-01 11:27:07', 5, 4),
(88, 'Aragorn has been killed bySlou !', '2014-12-01 11:27:24', 5, 4),
(89, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:28:04', 5, 4),
(90, 'Aragorn has been killed bySlou !', '2014-12-01 11:28:44', 5, 4),
(91, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:31:19', 5, 4),
(92, 'Aragorn has been killed bySlou !', '2014-12-01 11:31:50', 5, 4),
(93, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:32:37', 5, 4),
(94, 'Aragorn has been killed bySlou !', '2014-12-01 11:32:44', 5, 4),
(95, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:34:12', 5, 4),
(96, 'Aragorn has been killed bySlou !', '2014-12-01 11:38:32', 5, 4),
(97, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:38:53', 5, 4),
(98, 'Aragorn has been killed bySlou !', '2014-12-01 11:39:01', 5, 4),
(99, 'Aragorn has been killed bySlou !', '2014-12-01 11:40:20', 5, 4),
(100, 'Aragorn has been killed bySlou !', '2014-12-01 11:40:48', 5, 4),
(101, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:41:09', 5, 4),
(102, 'Slou attacked Aragorn but it failed !', '2014-12-01 11:41:42', 5, 4),
(103, 'Aragorn has been killed bySlou !', '2014-12-01 11:45:53', 5, 4),
(104, 'Aragorn has been killed bySlou !', '2014-12-01 11:46:06', 5, 4),
(105, 'Slou attacked Aragorn but it failed !', '2014-12-01 12:02:52', 5, 4),
(106, 'Slou attacked Aragorn but it failed !', '2014-12-01 12:04:40', 5, 4),
(107, 'Aragorn has been killed bySlou !', '2014-12-01 13:08:59', 5, 4),
(108, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:19:10', 5, 4),
(109, 'Aragorn has been killed bySlou !', '2014-12-01 13:22:19', 5, 4),
(110, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:22:33', 5, 4),
(111, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:23:16', 5, 4),
(112, 'Aragorn has been killed bySlou !', '2014-12-01 13:23:23', 5, 4),
(113, 'Aragorn has been killed bySlou !', '2014-12-01 13:23:28', 5, 4),
(114, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:27:15', 5, 4),
(115, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:31:40', 5, 4),
(116, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:31:59', 5, 4),
(117, 'Slou attacked Aragorn but it failed !', '2014-12-01 13:34:13', 5, 4),
(118, 'Slou attacked in the wind ...', '2014-12-01 14:19:05', 5, 4),
(119, 'Slou attacked in the wind ...', '2014-12-01 14:21:02', 5, 4),
(120, 'Slou attacked Aragorn but it failed !', '2014-12-01 14:32:38', 5, 4),
(121, 'Aragorn has been killed bySlou !', '2014-12-01 14:32:42', 5, 4),
(125, 'Slou left the arena.', '2014-12-01 19:47:56', 11, 8),
(126, 'Slou2 entered the arena.', '2014-12-01 19:48:46', 7, 5),
(124, 'Slou entered the arena.', '2014-12-01 19:26:59', 4, 5),
(127, 'Slou entered the arena.', '2014-12-01 19:53:24', 14, 0),
(128, 'Slou left the arena.', '2014-12-01 20:00:43', 2, 2),
(129, 'Slou2 entered the arena.', '2014-12-01 20:01:17', 3, 1),
(130, 'Slou entered the arena.', '2014-12-01 20:26:28', 0, 6),
(131, 'Slou2 has been killed by a monster !', '2014-12-02 11:27:01', 12, 7),
(132, 'Slou entered the arena.', '2014-12-02 13:37:23', 8, 6),
(133, 'Slou left the arena.', '2014-12-02 14:12:04', 13, 8),
(134, 'Slou left the arena.', '2014-12-02 14:14:12', 13, 8),
(135, 'Slou left the arena.', '2014-12-02 14:14:21', 13, 8),
(136, 'Slou left the arena.', '2014-12-02 14:16:25', 13, 8),
(137, 'Slou left the arena.', '2014-12-02 14:18:06', 13, 8),
(138, 'Slou entered the arena.', '2014-12-02 14:21:48', 10, 3),
(139, 'Slou left the arena.', '2014-12-02 14:22:27', 14, 3),
(140, 'Slou entered the arena.', '2014-12-02 14:57:44', 2, 8),
(141, 'Slou left the arena.', '2014-12-02 14:59:16', 0, 1),
(142, 'Slou entered the arena.', '2014-12-02 14:59:47', 5, 6),
(143, 'Slou attacked in the wind ...', '2014-12-02 15:10:38', 5, 9),
(144, 'Slou attacked in the wind ...', '2014-12-02 15:11:13', 5, 9),
(145, 'creve entered the arena.', '2014-12-02 15:25:53', 13, 9),
(146, 'creve has been killed by a monster !', '2014-12-02 15:26:45', 13, 9),
(147, 'Slou entered the arena.', '2014-12-02 15:27:14', 11, 4),
(148, 'Slou attacked in the wind ...', '2014-12-02 15:35:55', 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fighters`
--

CREATE TABLE IF NOT EXISTS `fighters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `player_id` varchar(36) NOT NULL,
  `coordinate_x` int(11) NOT NULL,
  `coordinate_y` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `xp` int(11) NOT NULL,
  `skill_sight` int(11) NOT NULL,
  `skill_strength` int(11) NOT NULL,
  `skill_health` int(11) NOT NULL,
  `current_health` int(11) NOT NULL,
  `next_action_time` datetime DEFAULT NULL,
  `guild_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fighters_id` (`player_id`),
  KEY `fighters_id1` (`guild_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `fighters`
--

INSERT INTO `fighters` (`id`, `name`, `player_id`, `coordinate_x`, `coordinate_y`, `level`, `xp`, `skill_sight`, `skill_strength`, `skill_health`, `current_health`, `next_action_time`, `guild_id`) VALUES
(1, 'Aragorn', '545f827c-576c-4dc5-ab6d-27c33186dc3e', -1, -1, 3, 29, 12, 1, 3, 0, '0000-00-00 00:00:00', NULL),
(2, 'Angmar', '545f827c-576c-4dc5-ab6d-27c33186dc3e', 3, 3, 3, 10, 0, 1, 9, 9, '0000-00-00 00:00:00', NULL),
(23, 'Slou', '546f0b82ebf17', 11, 5, 31, 200, 29, 14, 15, 15, '2014-12-02 20:54:25', NULL),
(25, 'Slou', '547c9fc29c434', -1, -1, 0, 0, 0, 1, 3, 3, '2014-12-01 18:05:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guilds`
--

CREATE TABLE IF NOT EXISTS `guilds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `fighter_id_from` int(11) NOT NULL,
  `fighter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_id1` (`fighter_id`),
  KEY `messages_id2` (`fighter_id_from`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` varchar(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `email`, `password`) VALUES
('545f827c-576c-4dc5-ab6d-27c33186dc3e', 'admin@test.com', 'toto'),
('546f0b82ebf17', 'slou412@gmail.com', 'a55378beb485d040624b31d9b54902a09bcc2fa3afb3f841b41e9415bb11c553'),
('547c9c1579505', 'sgarcia@ece.fr', 'a55378beb485d040624b31d9b54902a09bcc2fa3afb3f841b41e9415bb11c553'),
('547c9fc29c434', 'slou@yop.fr', 'a55378beb485d040624b31d9b54902a09bcc2fa3afb3f841b41e9415bb11c553');

-- --------------------------------------------------------

--
-- Table structure for table `surroundings`
--

CREATE TABLE IF NOT EXISTS `surroundings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `coordinate_x` int(11) NOT NULL,
  `coordinate_y` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `surroundings`
--

INSERT INTO `surroundings` (`id`, `type`, `coordinate_x`, `coordinate_y`) VALUES
(1, 'monster', 0, '1'),
(2, 'arbre', 4, '5'),
(3, 'exit', 13, '2'),
(4, 'arbre', 14, '8'),
(5, 'arbre', 6, '1'),
(6, 'arbre', 9, '3'),
(7, 'arbre', 12, '6'),
(8, 'arbre', 3, '2'),
(9, 'arbre', 7, '7'),
(10, 'arbre', 11, '0'),
(11, 'arbre', 0, '4'),
(12, 'arbre', 2, '8'),
(13, 'arbre', 1, '1'),
(14, 'arbre', 5, '4'),
(15, 'arbre', 8, '2'),
(16, 'arbre', 13, '4'),
(17, 'trap', 0, '0'),
(18, 'trap', 0, '9'),
(19, 'trap', 14, '0'),
(20, 'trap', 14, '9');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `bonus` int(11) NOT NULL,
  `coordinate_x` int(11) DEFAULT NULL,
  `coordinate_y` int(11) DEFAULT NULL,
  `fighter_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tools_id1` (`fighter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
