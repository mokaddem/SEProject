-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2015 at 05:59 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SEProjectC`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Year` int(4) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Categorie`
--

INSERT INTO `Categorie` (`ID`, `Year`, `Designation`) VALUES
(1, 2015, 'Tout âge'),
(6, 2016, 'Poussins'),
(7, 2016, 'Seniors');

-- --------------------------------------------------------

--
-- Table structure for table `Extras`
--

CREATE TABLE IF NOT EXISTS `Extras` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Extras`
--

INSERT INTO `Extras` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'Pas d''options supplémentaire', 0, ' '),
(2, 'Barbecue', 9, 'Barbecue chaleureux au 18 rue de la Grande Place ? 18:00.\r\nVenez nombreux.'),
(3, 'Lan Party', 5, 'A mega lan party!'),
(4, 'Berr pong', 4, 'A mega beer pong!');

-- --------------------------------------------------------

--
-- Table structure for table `GroupSaturday`
--

CREATE TABLE IF NOT EXISTS `GroupSaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_terrain` int(11) DEFAULT NULL,
  `ID_t1` int(11) NOT NULL,
  `ID_t2` int(11) DEFAULT NULL,
  `ID_t3` int(11) DEFAULT NULL,
  `ID_t4` int(11) DEFAULT NULL,
  `ID_t5` int(11) DEFAULT NULL,
  `ID_vic1` int(11) DEFAULT NULL,
  `ID_vic2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `GroupSaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_vic1`, `ID_vic2`) VALUES
(29, 13, 44, 45, 46, 50, 54, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `GroupSunday`
--

CREATE TABLE IF NOT EXISTS `GroupSunday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_terrain` int(11) DEFAULT NULL,
  `ID_t1` int(11) NOT NULL,
  `ID_t2` int(11) DEFAULT NULL,
  `ID_t3` int(11) DEFAULT NULL,
  `ID_t4` int(11) DEFAULT NULL,
  `ID_t5` int(11) DEFAULT NULL,
  `ID_t6` int(11) DEFAULT NULL,
  `ID_vic1` int(11) DEFAULT NULL,
  `ID_vic2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `History`
--

CREATE TABLE IF NOT EXISTS `History` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPerson` int(11) NOT NULL,
  `idEntite` int(11) NOT NULL,
  `typeEntite` text NOT NULL,
  `action` text NOT NULL,
  `date` date NOT NULL,
  `hour` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_3` (`id`),
  UNIQUE KEY `id_4` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=745 ;

--
-- Dumping data for table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(280, 70, 0, 'Historique', 'Suppression', '2015-11-12', '23:13:19'),
(281, 70, 55, 'Equipe', 'Suppression', '2015-11-12', '23:14:48'),
(282, 70, 56, 'Equipe', 'Suppression', '2015-11-12', '23:15:09'),
(283, 70, 58, 'Equipe', 'Ajout', '2015-11-12', '23:16:05'),
(284, 70, 59, 'Equipe', 'Ajout', '2015-11-12', '23:22:10'),
(285, 70, 142, 'Joueur', 'Ajout', '2015-11-12', '23:26:35'),
(286, 70, 143, 'Joueur', 'Ajout', '2015-11-12', '23:26:35'),
(287, 70, 58, 'Equipe', 'Edition', '2015-11-12', '23:27:08'),
(288, 7, 15, 'Match', 'Ajout', '2015-11-13', '01:34:40'),
(289, 7, 1, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '01:34:40'),
(290, 7, 0, 'Groupes', 'Suppression', '2015-11-13', '01:36:02'),
(291, 7, 0, 'Groupes', 'Suppression', '2015-11-13', '01:37:55'),
(292, 7, 34, 'Match', 'Ajout', '2015-11-13', '01:42:23'),
(293, 7, 2, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '01:42:23'),
(294, 7, 0, 'Groupes', 'Suppression', '2015-11-13', '01:51:41'),
(295, 7, 36, 'Match', 'Ajout', '2015-11-13', '01:52:14'),
(296, 7, 3, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '01:52:14'),
(297, 7, 0, 'Groupes', 'Suppression', '2015-11-13', '01:55:46'),
(298, 7, 37, 'Match', 'Ajout', '2015-11-13', '01:56:21'),
(299, 7, 4, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '01:56:21'),
(300, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:17:00'),
(301, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:17:14'),
(302, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:17:31'),
(303, 7, 39, 'Match', 'Ajout', '2015-11-13', '02:19:13'),
(304, 7, 5, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '02:19:13'),
(305, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:21:12'),
(306, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:25:11'),
(307, 7, 40, 'Match', 'Ajout', '2015-11-13', '02:25:23'),
(308, 7, 6, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '02:25:23'),
(309, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:26:13'),
(310, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:28:10'),
(311, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:32:07'),
(312, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:32:58'),
(313, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:49:09'),
(314, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '02:55:33'),
(315, 7, 15, 'Match', 'Ajout', '2015-11-13', '03:01:02'),
(316, 7, 7, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '03:01:02'),
(317, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '03:02:57'),
(318, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '03:10:59'),
(319, 7, 50, 'Match', 'Ajout', '2015-11-13', '03:13:42'),
(320, 7, 8, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '03:13:42'),
(321, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '03:15:28'),
(322, 7, 51, 'Match', 'Ajout', '2015-11-13', '03:15:55'),
(323, 7, 9, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '03:15:56'),
(324, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '03:34:56'),
(325, 7, 28, 'GroupSaturday', 'Ajout', '2015-11-13', '03:34:59'),
(326, 7, 52, 'Match', 'Ajout', '2015-11-13', '03:34:59'),
(327, 7, 53, 'Match', 'Ajout', '2015-11-13', '03:34:59'),
(328, 7, 54, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(329, 7, 55, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(330, 7, 56, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(331, 7, 57, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(332, 7, 44, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(333, 7, 59, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(334, 7, 60, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(335, 7, 61, 'Match', 'Ajout', '2015-11-13', '03:35:00'),
(336, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-11-13', '04:06:02'),
(337, 7, 29, 'GroupSaturday', 'Ajout', '2015-11-13', '04:06:05'),
(338, 7, 62, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(339, 7, 63, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(340, 7, 64, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(341, 7, 65, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(342, 7, 66, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(343, 7, 67, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(344, 7, 68, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(345, 7, 69, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(346, 7, 70, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(347, 7, 71, 'Match', 'Ajout', '2015-11-13', '04:06:05'),
(348, 7, 64, 'Match', 'Ajout', '2015-11-13', '04:06:21'),
(349, 7, 67, 'Match', 'Ajout', '2015-11-13', '04:06:21'),
(350, 7, 69, 'Match', 'Ajout', '2015-11-13', '04:06:21'),
(351, 7, 71, 'Match', 'Ajout', '2015-11-13', '04:06:21'),
(352, 7, 107, 'Joueur', 'Edition', '2015-11-13', '17:14:59'),
(353, 7, 108, 'Joueur', 'Edition', '2015-11-13', '17:16:36'),
(354, 7, 107, 'Joueur', 'Edition', '2015-11-13', '17:18:14'),
(355, 7, 111, 'Joueur', 'Edition', '2015-11-13', '17:19:51'),
(356, 7, 107, 'Joueur', 'Edition', '2015-11-13', '20:21:32'),
(357, 7, 107, 'Joueur', 'Edition', '2015-11-13', '20:37:58'),
(358, 7, 107, 'Joueur', 'Edition', '2015-11-13', '20:38:32'),
(359, 7, 107, 'Joueur', 'Edition', '2015-11-13', '20:39:03'),
(360, 7, 107, 'Joueur', 'Edition', '2015-11-13', '20:43:11'),
(361, 7, 107, 'Joueur', 'Edition', '2015-11-13', '20:59:34'),
(362, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:01:35'),
(363, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:01:54'),
(364, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:02:16'),
(365, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:09:16'),
(366, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:09:37'),
(367, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:13:39'),
(368, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:34:38'),
(369, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:34:54'),
(370, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:34:59'),
(371, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:36:08'),
(372, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:36:29'),
(373, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:38:06'),
(374, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:39:40'),
(375, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:40:32'),
(376, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:40:42'),
(377, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:41:38'),
(378, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:41:54'),
(379, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:42:29'),
(380, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:43:04'),
(381, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:43:25'),
(382, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:44:08'),
(383, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:44:45'),
(384, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:45:13'),
(385, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:49:27'),
(386, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:50:47'),
(387, 7, 108, 'Joueur', 'Edition', '2015-11-13', '21:52:00'),
(388, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:52:46'),
(389, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:53:24'),
(390, 7, 107, 'Joueur', 'Edition', '2015-11-13', '21:54:16'),
(391, 7, 16, 'Match', 'Ajout', '2015-11-13', '22:29:46'),
(392, 7, 62, 'Match', 'Ajout', '2015-11-13', '22:29:46'),
(393, 7, 66, 'Match', 'Ajout', '2015-11-13', '22:29:46'),
(394, 7, 16, 'Match', 'Ajout', '2015-11-13', '22:29:52'),
(395, 7, 62, 'Match', 'Ajout', '2015-11-13', '22:29:52'),
(396, 7, 66, 'Match', 'Ajout', '2015-11-13', '22:29:52'),
(397, 7, 16, 'Match', 'Ajout', '2015-11-13', '22:29:55'),
(398, 7, 62, 'Match', 'Ajout', '2015-11-13', '22:29:56'),
(399, 7, 66, 'Match', 'Ajout', '2015-11-13', '22:29:56'),
(400, 7, 64, 'Match', 'Ajout', '2015-11-13', '22:30:06'),
(401, 7, 67, 'Match', 'Ajout', '2015-11-13', '22:30:06'),
(402, 7, 69, 'Match', 'Ajout', '2015-11-13', '22:30:06'),
(403, 7, 71, 'Match', 'Ajout', '2015-11-13', '22:30:06'),
(404, 7, 107, 'Joueur', 'Edition', '2015-11-14', '14:43:34'),
(405, 7, 63, 'Match', 'Ajout', '2015-11-14', '14:46:09'),
(406, 7, 66, 'Match', 'Ajout', '2015-11-14', '14:46:09'),
(407, 7, 69, 'Match', 'Ajout', '2015-11-14', '14:46:10'),
(408, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:23:45'),
(409, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:23:55'),
(410, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:24:00'),
(411, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:26:49'),
(412, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:27:05'),
(413, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:27:53'),
(414, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:29:03'),
(415, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:30:12'),
(416, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:40:44'),
(417, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:41:02'),
(418, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:41:30'),
(419, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:52:16'),
(420, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:52:34'),
(421, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:54:39'),
(422, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:54:59'),
(423, 7, 107, 'Joueur', 'Edition', '2015-11-17', '10:56:46'),
(424, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:24:29'),
(425, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:25:12'),
(426, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:28:18'),
(427, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:28:30'),
(428, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:28:58'),
(429, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:29:18'),
(430, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:29:49'),
(431, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:30:14'),
(432, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:34:42'),
(433, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:36:01'),
(434, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:37:10'),
(435, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:38:25'),
(436, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:39:08'),
(437, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:39:31'),
(438, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:41:20'),
(439, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:41:38'),
(440, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:41:51'),
(441, 7, 107, 'Joueur', 'Edition', '2015-11-18', '10:42:39'),
(442, 7, 107, 'Joueur', 'Edition', '2015-11-18', '11:02:44'),
(443, 7, 107, 'Joueur', 'Edition', '2015-11-18', '11:02:53'),
(444, 7, 107, 'Joueur', 'Edition', '2015-11-18', '11:03:42'),
(445, 7, 107, 'Joueur', 'Edition', '2015-11-18', '11:04:08'),
(446, 7, 107, 'Joueur', 'Edition', '2015-11-18', '11:05:23'),
(447, 7, 107, 'Joueur', 'Edition', '2015-11-18', '11:05:47'),
(448, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:40:46'),
(449, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:41:09'),
(450, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:41:46'),
(451, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:51:01'),
(452, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:51:06'),
(453, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:51:15'),
(454, 7, 107, 'Joueur', 'Edition', '2015-11-18', '22:51:22'),
(455, 7, 145, 'Joueur', 'Edition', '2015-11-18', '23:51:09'),
(456, 7, 107, 'Joueur', 'Edition', '2015-11-18', '23:51:32'),
(457, 7, 3, 'Extra', 'Ajout', '2015-11-19', '08:31:55'),
(458, 7, 16, 'Match', 'Ajout', '2015-11-19', '10:11:43'),
(459, 7, 62, 'Match', 'Ajout', '2015-11-19', '10:11:43'),
(460, 7, 66, 'Match', 'Ajout', '2015-11-19', '10:11:43'),
(461, 7, 16, 'Match', 'Ajout', '2015-11-19', '10:11:44'),
(462, 7, 62, 'Match', 'Ajout', '2015-11-19', '10:11:44'),
(463, 7, 66, 'Match', 'Ajout', '2015-11-19', '10:11:44'),
(464, 7, 65, 'Match', 'Ajout', '2015-11-19', '10:13:26'),
(465, 7, 68, 'Match', 'Ajout', '2015-11-19', '10:13:26'),
(466, 7, 70, 'Match', 'Ajout', '2015-11-19', '10:13:26'),
(467, 7, 71, 'Match', 'Ajout', '2015-11-19', '10:13:27'),
(468, 7, 65, 'Match', 'Ajout', '2015-11-19', '10:13:32'),
(469, 7, 68, 'Match', 'Ajout', '2015-11-19', '10:13:32'),
(470, 7, 70, 'Match', 'Ajout', '2015-11-19', '10:13:32'),
(471, 7, 71, 'Match', 'Ajout', '2015-11-19', '10:13:32'),
(472, 7, 65, 'Match', 'Ajout', '2015-11-19', '10:13:35'),
(473, 7, 68, 'Match', 'Ajout', '2015-11-19', '10:13:35'),
(474, 7, 70, 'Match', 'Ajout', '2015-11-19', '10:13:35'),
(475, 7, 71, 'Match', 'Ajout', '2015-11-19', '10:13:35'),
(476, 7, 16, 'Match', 'Ajout', '2015-11-19', '10:13:45'),
(477, 7, 62, 'Match', 'Ajout', '2015-11-19', '10:13:45'),
(478, 7, 66, 'Match', 'Ajout', '2015-11-19', '10:13:45'),
(479, 7, 62, 'Match', 'Ajout', '2015-11-19', '10:13:49'),
(480, 7, 63, 'Match', 'Ajout', '2015-11-19', '10:13:55'),
(481, 7, 66, 'Match', 'Ajout', '2015-11-19', '10:13:55'),
(482, 7, 69, 'Match', 'Ajout', '2015-11-19', '10:13:55'),
(483, 7, 65, 'Match', 'Ajout', '2015-11-19', '10:18:30'),
(484, 7, 68, 'Match', 'Ajout', '2015-11-19', '10:18:30'),
(485, 7, 70, 'Match', 'Ajout', '2015-11-19', '10:18:30'),
(486, 7, 71, 'Match', 'Ajout', '2015-11-19', '10:18:30'),
(487, 7, 4, 'Extra', 'Ajout', '2015-11-19', '12:22:21'),
(488, 7, 107, 'Joueur', 'Edition', '2015-11-19', '12:33:41'),
(489, 7, 107, 'Joueur', 'Edition', '2015-11-19', '12:33:49'),
(490, 7, 107, 'Joueur', 'Edition', '2015-11-19', '12:40:25'),
(491, 7, 107, 'Joueur', 'Edition', '2015-11-19', '12:40:34'),
(492, 7, 16, 'Match', 'Ajout', '2015-11-19', '13:27:34'),
(493, 7, 62, 'Match', 'Ajout', '2015-11-19', '13:27:34'),
(494, 7, 66, 'Match', 'Ajout', '2015-11-19', '13:27:34'),
(495, 7, 16, 'Match', 'Ajout', '2015-11-19', '13:27:42'),
(496, 7, 62, 'Match', 'Ajout', '2015-11-19', '13:27:42'),
(497, 7, 66, 'Match', 'Ajout', '2015-11-19', '13:27:42'),
(498, 7, 62, 'Match', 'Ajout', '2015-11-19', '15:17:53'),
(499, 7, 66, 'Match', 'Ajout', '2015-11-19', '15:17:53'),
(500, 7, 67, 'Match', 'Ajout', '2015-11-19', '15:17:53'),
(501, 7, 68, 'Match', 'Ajout', '2015-11-19', '15:17:53'),
(502, 7, 62, 'Match', 'Ajout', '2015-11-19', '15:18:00'),
(503, 7, 66, 'Match', 'Ajout', '2015-11-19', '15:18:01'),
(504, 7, 67, 'Match', 'Ajout', '2015-11-19', '15:18:01'),
(505, 7, 68, 'Match', 'Ajout', '2015-11-19', '15:18:01'),
(506, 7, 2, 'Extra', 'Edition', '2015-11-19', '16:03:17'),
(507, 7, 4, 'Extra', 'Edition', '2015-11-19', '16:03:36'),
(508, 7, 107, 'Joueur', 'Edition', '2015-11-19', '16:04:26'),
(509, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:33:54'),
(510, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:33:54'),
(511, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:33:54'),
(512, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:33:54'),
(513, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:34:31'),
(514, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:34:31'),
(515, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:34:31'),
(516, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:34:31'),
(517, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:53:47'),
(518, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:53:48'),
(519, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:53:48'),
(520, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:53:48'),
(521, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:57:13'),
(522, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:57:13'),
(523, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:57:13'),
(524, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:57:13'),
(525, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:57:19'),
(526, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:57:19'),
(527, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:57:19'),
(528, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:57:19'),
(529, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:57:31'),
(530, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:57:31'),
(531, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:57:32'),
(532, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:57:32'),
(533, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:57:36'),
(534, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:57:36'),
(535, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:57:36'),
(536, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:57:36'),
(537, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:58:16'),
(538, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:58:16'),
(539, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:58:16'),
(540, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:58:16'),
(541, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:58:35'),
(542, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:58:35'),
(543, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:58:35'),
(544, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:58:35'),
(545, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:59:10'),
(546, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:59:10'),
(547, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:59:10'),
(548, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:59:11'),
(549, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:59:23'),
(550, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:59:23'),
(551, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:59:23'),
(552, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:59:23'),
(553, 7, 62, 'Match', 'Ajout', '2015-11-19', '16:59:58'),
(554, 7, 66, 'Match', 'Ajout', '2015-11-19', '16:59:58'),
(555, 7, 67, 'Match', 'Ajout', '2015-11-19', '16:59:58'),
(556, 7, 68, 'Match', 'Ajout', '2015-11-19', '16:59:58'),
(557, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:00:06'),
(558, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:00:06'),
(559, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:00:06'),
(560, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:00:06'),
(561, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:01:18'),
(562, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:01:18'),
(563, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:01:19'),
(564, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:01:19'),
(565, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:02:03'),
(566, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:02:03'),
(567, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:02:03'),
(568, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:02:04'),
(569, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:02:29'),
(570, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:02:29'),
(571, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:02:29'),
(572, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:02:29'),
(573, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:02:37'),
(574, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:02:38'),
(575, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:02:38'),
(576, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:02:38'),
(577, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:03:00'),
(578, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:03:00'),
(579, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:03:00'),
(580, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:03:00'),
(581, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:03:09'),
(582, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:03:10'),
(583, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:03:10'),
(584, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:03:10'),
(585, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:03:18'),
(586, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:03:18'),
(587, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:03:18'),
(588, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:03:18'),
(589, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:04:53'),
(590, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:04:53'),
(591, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:04:53'),
(592, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:04:53'),
(593, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:05:52'),
(594, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:05:52'),
(595, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:05:52'),
(596, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:05:52'),
(597, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:17:07'),
(598, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:17:07'),
(599, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:17:07'),
(600, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:17:07'),
(601, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:19:14'),
(602, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:19:14'),
(603, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:19:14'),
(604, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:19:14'),
(605, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:20:06'),
(606, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:20:06'),
(607, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:20:06'),
(608, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:20:06'),
(609, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:20:27'),
(610, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:20:27'),
(611, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:20:27'),
(612, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:20:27'),
(613, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:21:11'),
(614, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:21:11'),
(615, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:21:11'),
(616, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:21:11'),
(617, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:21:20'),
(618, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:21:20'),
(619, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:21:20'),
(620, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:21:20'),
(621, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:21:30'),
(622, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:21:30'),
(623, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:21:30'),
(624, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:21:30'),
(625, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:21:39'),
(626, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:21:40'),
(627, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:21:40'),
(628, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:21:40'),
(629, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:21:53'),
(630, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:21:53'),
(631, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:21:53'),
(632, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:21:53'),
(633, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:23:11'),
(634, 7, 63, 'Match', 'Ajout', '2015-11-19', '17:23:11'),
(635, 7, 64, 'Match', 'Ajout', '2015-11-19', '17:23:11'),
(636, 7, 65, 'Match', 'Ajout', '2015-11-19', '17:23:12'),
(637, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:23:41'),
(638, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:23:41'),
(639, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:23:41'),
(640, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:23:42'),
(641, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:23:51'),
(642, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:23:51'),
(643, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:23:51'),
(644, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:23:51'),
(645, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:24:00'),
(646, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:24:00'),
(647, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:24:00'),
(648, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:24:00'),
(649, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:24:06'),
(650, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:24:06'),
(651, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:24:06'),
(652, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:24:06'),
(653, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:24:11'),
(654, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:24:11'),
(655, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:24:11'),
(656, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:24:11'),
(657, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:28:16'),
(658, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:28:17'),
(659, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:28:17'),
(660, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:28:17'),
(661, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:28:19'),
(662, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:28:19'),
(663, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:28:20'),
(664, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:28:20'),
(665, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:28:24'),
(666, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:28:24'),
(667, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:28:24'),
(668, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:28:24'),
(669, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:28:30'),
(670, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:28:30'),
(671, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:28:30'),
(672, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:28:30'),
(673, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:30:41'),
(674, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:30:41'),
(675, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:30:41'),
(676, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:30:41'),
(677, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:30:54'),
(678, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:30:54'),
(679, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:30:55'),
(680, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:30:55'),
(681, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:31:00'),
(682, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:31:00'),
(683, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:31:00'),
(684, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:31:00'),
(685, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:31:10'),
(686, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:31:10'),
(687, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:31:10'),
(688, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:31:10'),
(689, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:32:48'),
(690, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:32:49'),
(691, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:32:49'),
(692, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:32:49'),
(693, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:33:24'),
(694, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:33:24'),
(695, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:33:24'),
(696, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:33:24'),
(697, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:33:43'),
(698, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:33:43'),
(699, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:33:43'),
(700, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:33:43'),
(701, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:35:42'),
(702, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:35:42'),
(703, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:35:42'),
(704, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:35:42'),
(705, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:38:31'),
(706, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:38:31'),
(707, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:38:32'),
(708, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:38:32'),
(709, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:41:08'),
(710, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:41:08'),
(711, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:41:08'),
(712, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:41:08'),
(713, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:45:41'),
(714, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:45:41'),
(715, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:45:41'),
(716, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:45:41'),
(717, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:45:57'),
(718, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:45:57'),
(719, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:45:57'),
(720, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:45:57'),
(721, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:48:18'),
(722, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:48:18'),
(723, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:48:18'),
(724, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:48:18'),
(725, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:50:55'),
(726, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:50:55'),
(727, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:50:56'),
(728, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:50:56'),
(729, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:51:05'),
(730, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:51:05'),
(731, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:51:05'),
(732, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:51:05'),
(733, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:51:22'),
(734, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:51:23'),
(735, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:51:23'),
(736, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:51:23'),
(737, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:51:32'),
(738, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:51:32'),
(739, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:51:32'),
(740, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:51:32'),
(741, 7, 62, 'Match', 'Ajout', '2015-11-19', '17:51:38'),
(742, 7, 66, 'Match', 'Ajout', '2015-11-19', '17:51:38'),
(743, 7, 67, 'Match', 'Ajout', '2015-11-19', '17:51:38'),
(744, 7, 68, 'Match', 'Ajout', '2015-11-19', '17:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `KnockoffSaturday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `KnockoffSunday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSunday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Match`
--

CREATE TABLE IF NOT EXISTS `Match` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `hour` text,
  `ID_Equipe1` int(11) NOT NULL,
  `ID_Equipe2` int(11) NOT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `ID_Terrain` int(11) DEFAULT NULL,
  `Poule_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(16, '2015-11-11', '16:15', 43, 45, 0, 3, 13, NULL),
(17, '2015-11-11', '18:00', 45, 44, 0, 0, 14, NULL),
(18, '2015-11-15', '20:45', 46, 45, 0, 0, 15, NULL),
(62, '2015-11-13', '04:06', 44, 45, 3, 4, 13, 29),
(63, '2015-11-13', '04:06', 44, 46, 0, 4, 13, 29),
(64, '2015-11-13', '04:06', 44, 50, 3, 4, 13, 29),
(65, '2015-11-13', '04:06', 44, 54, 4, 0, 13, 29),
(66, '2015-11-13', '04:06', 45, 46, 6, 5, 13, 29),
(67, '2015-11-13', '04:06', 45, 50, 5, 4, 13, 29),
(68, '2015-11-13', '04:06', 45, 54, 3, 0, 13, 29),
(69, '2015-11-13', '04:06', 46, 50, 0, 3, 13, 29),
(70, '2015-11-13', '04:06', 46, 54, 0, 3, 13, 29),
(71, '2015-11-13', '04:06', 50, 54, 4, 0, 13, 29);

-- --------------------------------------------------------

--
-- Table structure for table `Owner`
--

CREATE TABLE IF NOT EXISTS `Owner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(255) NOT NULL,
  `ID_Staff` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Staff` (`ID_Staff`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Title` int(2) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Ville` varchar(500) NOT NULL,
  `ZIPCode` int(10) NOT NULL,
  `Rue` varchar(100) NOT NULL,
  `Number` int(11) NOT NULL,
  `PhoneNumber` int(20) NOT NULL,
  `GSMNumber` int(20) NOT NULL,
  `BirthDate` date NOT NULL,
  `Mail` varchar(500) NOT NULL,
  `CreationDate` date NOT NULL,
  `Note` varchar(500) NOT NULL,
  `IsPlayer` tinyint(1) NOT NULL,
  `IsOwner` tinyint(1) NOT NULL,
  `IsStaff` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, 0, 635434770, '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(107, 1, 'John', 'Doeuf', '450', 38000, '0', 12, 9, 6, '1978-11-14', 'j.d@hotmail.fr', '2015-11-11', 'J''aime les barbecues.', 1, 0, 0),
(108, 1, 'Oussama', 'Faitmal', '0', 21000, '0', 12, 99999999, 6898989, '1964-02-12', 'f.o@gmail.com', '2015-11-11', '', 1, 0, 0),
(109, 2, 'Sarah', 'Croche', 'Annecy', 78000, 'Avenue du halo', 0, 9, 689898989, '1945-01-01', 'c.s@gmail.fr', '2015-11-11', '', 0, 1, 0),
(110, 1, 'Yves', 'Rogne', 'Antibes', 6000, '192 rue des abricotiers', 0, 9, 6, '1970-11-04', 'r.y@gmail.com', '2015-11-11', '', 1, 0, 0),
(111, 1, 'Aude', 'Javel', '34, avenue du propre', 26000, '9', 0, 4, 6, '1992-08-05', 'j.a@gmail.fr', '2015-11-11', '', 1, 0, 0),
(112, 0, 'Anna', 'Conda', 'Louvain', 1348, '6, boulevard du python', 35, 8, 6, '1990-03-08', 'c.a@gmail.com', '2015-11-11', '', 1, 0, 0),
(113, 0, 'Asterix', 'Eperil', 'Louvain', 1348, '90, rue du danger', 98, 0, 6, '1982-03-03', 'e.a@gmail.com', '2015-11-11', '', 1, 0, 0),
(114, 0, 'Sandra', 'Lacouettegratte', 'Louvain', 1348, '78, avenue de l''épilation', 12, 0, 6, '1997-02-13', 's.l@gmail.fr', '2015-11-11', '', 1, 0, 0),
(115, 0, 'Sophie', 'Fonfec', 'Lyon', 69000, '67, port de la pénife', 14, 0, 7, '1988-01-01', 'f.s@gmail.be', '2015-11-11', '', 1, 0, 0),
(116, 1, 'Gérard', 'Remangagner', 'Marseille', 13000, '78 avenue de la défaite', 0, 0, 7, '0000-00-00', 'r.g@gmail.be', '2015-11-11', '', 0, 1, 0),
(117, 0, 'Anna', 'Lyse', 'Privas', 7000, '56, boulevard de la recherche', 18, 0, 7, '1980-05-12', 'l.a@hotmail.com', '2015-11-11', '', 1, 0, 0),
(118, 0, 'Mario', 'Net', '0', 49000, 'Angers', 78, 0, 6, '1982-04-05', 'n.m@free.fr', '2015-11-11', '', 1, 0, 0),
(128, 0, 'Sylvie', 'Bromasseurmarchepastaldoi', 'Is-sur-Tille', 21000, '12 rue de la secousse', 700, 2147483647, 678896745, '1971-01-04', 'b.s@gmail.com', '2015-11-12', 'J''aime les frites', 1, 0, 0),
(129, 0, 'Jean', 'Neymard', 'Cannes', 6000, '1 avenue de la paresse', 90, 475676767, 678787889, '1992-06-11', 'n.j@free.fr', '2015-11-12', '', 1, 0, 0),
(130, 0, 'Alex', 'Terieur', 'Annecy', 74000, '34 boulevard du froid', 0, 0, 2147483647, '1978-12-19', 't.a@wanadoo.com', '2015-11-12', '', 1, 0, 0),
(131, 0, 'Alain', 'Terieur', 'Annecy', 74000, '23 rue du chaud', 0, 0, 2147483647, '1982-02-02', 't.a@free.fr', '2015-11-12', '', 1, 0, 0),
(132, 0, 'Agathe', 'Deblouze', 'Paris', 75000, '2 place de la déprime', 89, 0, 645454545, '1959-11-03', 'd.a@wanadoo.com', '2015-11-12', '', 1, 0, 0),
(133, 0, 'Tony', 'Truand', 'Chabeuil', 26000, '8 rue des impasses', 99, 0, 678787878, '1973-04-04', 't.t@free.fr', '2015-11-12', '', 1, 0, 0),
(136, 0, 'Justin', 'Pticou', 'Dijon', 21000, '39 avenue barrée', 0, 0, 634352534, '0000-00-00', 'p.j@free.fr', '2015-11-12', '', 1, 0, 0),
(137, 0, 'Geoffrey', 'Beinunetitsieste', 'Paris', 75000, '78 chemin de la paresse', 0, 0, 677665544, '1992-04-19', 'b.g@gmail.com', '2015-11-12', '', 1, 0, 0),
(138, 0, 'Joe', 'Bidjoba', 'Saint-Marcel-Les-Valence', 26000, '26 avenue holé', 0, 0, 677777755, '1994-07-03', 'b.j@free.fr', '2015-11-12', '', 1, 0, 0),
(139, 0, 'Odile', 'Atmoilanus', 'Menton', 6000, '78 place de l''érosion', 0, 0, 655554444, '1988-03-13', 'a.o@gmail.com', '2015-11-12', '', 1, 0, 0),
(140, 0, 'Sam', 'Excite', 'Louvain', 1348, '2 rue du sport', 0, 0, 600880099, '1985-05-13', 'e.s@gmail.com', '2015-11-12', '', 1, 0, 0),
(141, 0, 'Donna', 'Memelababal', 'Paris', 75000, '2 place du canidé', 0, 0, 677777777, '1984-05-06', 'm.d@gmail.fr', '2015-11-12', '', 1, 0, 0),
(142, 0, 'Cecile', 'Vaistairstalone', 'Marseille', 13000, '194 rue du sport', 0, 0, 2147483647, '1993-01-04', 'v.c@gmail.fr', '2015-11-12', '', 1, 0, 0),
(143, 0, 'Debby', 'Scott', 'Louvain-La-Neuve', 1348, '89 place craquante', 0, 0, 2147483647, '1991-03-17', 's.d@gmail.fr', '2015-11-12', '', 1, 0, 0),
(144, 1, 'f1', 'l1', 'ville', 0, 'rue', 0, 0, 0, '2015-11-02', 'mail', '2015-11-03', 'note', 1, 0, 0),
(145, 1, 'Misa', 'Moka', 'Mouch', 7578, '75', 0, 335465468, 335465468, '2011-04-04', 'lzefjzf@ldgzj.com', '2015-11-18', '', 1, 0, 0),
(146, 0, 'Misa2', 'Moka2', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '2004-09-06', 'pikapika@hotmail.com', '2015-11-18', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PersonneExtra`
--

CREATE TABLE IF NOT EXISTS `PersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `PersonneExtra`
--

INSERT INTO `PersonneExtra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(2, 108, 1),
(25, 146, 1),
(26, 145, 1),
(34, 107, 2),
(35, 107, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `ID_Personne` int(255) NOT NULL,
  `IsLeader` tinyint(1) NOT NULL,
  `Paid` tinyint(1) NOT NULL,
  `AlreadyPart` tinyint(1) NOT NULL,
  UNIQUE KEY `ID_Personne_2` (`ID_Personne`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Personne_3` (`ID_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`) VALUES
(107, 0, 0, 0),
(108, 0, 0, 0),
(110, 0, 0, 0),
(111, 0, 0, 0),
(112, 0, 0, 0),
(113, 0, 0, 0),
(114, 0, 0, 0),
(115, 0, 0, 0),
(117, 0, 0, 0),
(118, 0, 0, 0),
(128, 0, 0, 0),
(129, 0, 0, 0),
(130, 0, 0, 0),
(131, 0, 0, 0),
(145, 0, 0, 0),
(146, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(255) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Username` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`ID`, `ID_Personne`, `Level`, `ID_Cat`, `Password`, `Username`) VALUES
(1, 7, '1', 1, 'hello', '1'),
(100, 70, '10', 1, '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_Player1` int(255) NOT NULL,
  `ID_Player2` int(255) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `NbWinMatch` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Player1` (`ID_Player1`),
  KEY `ID_Player2` (`ID_Player2`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`) VALUES
(43, 107, 108, 7, 0),
(44, 110, 111, 1, 1),
(45, 112, 113, 1, 4),
(46, 114, 115, 1, 2),
(50, 117, 118, 1, 4),
(53, 128, 129, 6, 0),
(54, 130, 131, 1, 2),
(57, 137, 132, 6, 0),
(58, 139, 140, 7, 0),
(59, 133, 136, 6, 0),
(60, 145, 146, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Terrain`
--

CREATE TABLE IF NOT EXISTS `Terrain` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(250) NOT NULL,
  `surface` int(11) NOT NULL,
  `ID_Owner` int(11) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `disponibiliteFrom` date NOT NULL,
  `disponibiliteTo` date NOT NULL,
  `CreationDate` date NOT NULL,
  `Type` varchar(500) NOT NULL,
  `Note` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Terrain`
--

INSERT INTO `Terrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`) VALUES
(13, '1 Rue de la frappe', 25, 11, 'Usé', '2015-11-17', '2015-12-03', '2015-11-11', 'Synthétique', 'Terrain boueux'),
(14, '34 Boulevard de la poussière', 22, 11, 'Neuf', '2020-04-11', '2036-11-12', '2015-11-11', 'Terre battue', 'Terrain propre'),
(15, '90 rue du combat', 18, 12, 'Passable', '2016-10-05', '2021-11-14', '2015-11-11', 'Gazon', 'Terrain agréable'),
(16, '1 rue', 90, 13, 'Neuf', '2015-11-12', '2016-05-12', '2015-11-12', 'Terre battue', 'OK'),
(17, 'okok', 0, 14, 'Neuf', '2015-11-12', '2015-11-12', '2015-11-12', 'Terre battue', 'ok');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Owner`
--
ALTER TABLE `Owner`
  ADD CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Owner_ibfk_2` FOREIGN KEY (`ID_Staff`) REFERENCES `Staff` (`ID_Personne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Player`
--
ALTER TABLE `Player`
  ADD CONSTRAINT `PersonneFK` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `Staff_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Staff_ibfk_2` FOREIGN KEY (`ID_Cat`) REFERENCES `Categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Team`
--
ALTER TABLE `Team`
  ADD CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`ID_Player1`) REFERENCES `Personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_2` FOREIGN KEY (`ID_Player2`) REFERENCES `Personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_3` FOREIGN KEY (`ID_Cat`) REFERENCES `Categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
