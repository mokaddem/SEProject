-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 07 Décembre 2015 à 18:19
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `SEProjectC`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Age` varchar(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`ID`, `Age`, `Designation`) VALUES
(16, '11 - 12', 'Minimes'),
(17, '13 - 14', 'Cadet'),
(18, '15 - 16', 'Scolaire'),
(19, '17 - 19', 'Junior'),
(20, '20 - 40', 'Seniors'),
(21, '41 - 120', 'Elites'),
(25, '9 - 10', 'Pré-minimes');

-- --------------------------------------------------------

--
-- Structure de la table `Extras`
--

CREATE TABLE IF NOT EXISTS `Extras` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Extras`
--

INSERT INTO `Extras` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'Pas d''options supplémentaire', 0, ' '),
(2, 'Barbecue', 9, 'Barbecue chaleureux au 18 rue de la Grande Place ? 18:00.\r\nVenez nombreux.'),
(3, 'Lan Party', 5, 'A mega lan party!'),
(4, 'Berr pong', 4, 'A mega beer pong!');

-- --------------------------------------------------------

--
-- Structure de la table `GlobalVariables`
--

CREATE TABLE IF NOT EXISTS `GlobalVariables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE latin1_bin NOT NULL,
  `Value` varchar(1000) COLLATE latin1_bin NOT NULL,
  `Displayable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=13 ;

--
-- Contenu de la table `GlobalVariables`
--

INSERT INTO `GlobalVariables` (`id`, `Name`, `Value`, `Displayable`) VALUES
(1, 'Message Leader', '[A rediger]', 1),
(2, 'Sujet Leader', '[A rediger]', 1),
(3, 'Adresse HQ', '[A rediger]', 1),
(4, 'Message Non-Paye', '[A rediger]', 1),
(5, 'Sujet Non-Paye', '[A rediger]', 1),
(6, 'Message a tous', '[A rediger]', 1),
(7, 'Sujet a tous', '[A rediger]', 1),
(8, 'Message', '[A rediger]', 1),
(9, 'Prix_Tournoi', '12', 1),
(10, 'tournament_started_sam', '0', 0),
(11, 'tournament_started_dim', '0', 0),
(12, 'Paiement CB', '[A rediger]', 0),
(13, 'Paiement Espece', '[A rediger]', 0),
(16, 'Paiement Paypal', '[A rediger]', 1),
(17, 'Sujet paiement', '[A rediger]', 1);

-- --------------------------------------------------------

--
-- Structure de la table `GroupSaturday`
--

CREATE TABLE IF NOT EXISTS `GroupSaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_terrain` int(11) DEFAULT NULL,
  `ID_t1` int(11) NOT NULL,
  `ID_t2` int(11) DEFAULT NULL,
  `ID_t3` int(11) DEFAULT NULL,
  `ID_t4` int(11) DEFAULT NULL,
  `ID_t5` int(11) DEFAULT NULL,
  `ID_t6` int(11) DEFAULT NULL,
  `ID_t7` int(11) DEFAULT NULL,
  `ID_t8` int(11) DEFAULT NULL,
  `ID_Leader` int(11) NOT NULL,
  `ID_Cat` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Contenu de la table `GroupSaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(149, 13, 435, 447, NULL, NULL, NULL, NULL, NULL, NULL, 435, 16),
(150, 13, 429, 451, NULL, NULL, NULL, NULL, NULL, NULL, 429, 19),
(151, 13, 431, 441, 446, 448, 453, NULL, NULL, NULL, 431, 20),
(152, 14, 458, 459, 460, 465, 467, NULL, NULL, NULL, 458, 20),
(153, 15, 469, 474, NULL, NULL, NULL, NULL, NULL, NULL, 469, 20),
(154, 13, 427, 434, 439, 445, 449, NULL, NULL, NULL, 427, 21),
(155, 14, 450, 462, 466, 470, 475, NULL, NULL, NULL, 450, 21);

-- --------------------------------------------------------

--
-- Structure de la table `GroupSunday`
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
  `ID_t7` int(11) DEFAULT NULL,
  `ID_t8` int(11) DEFAULT NULL,
  `ID_Leader` int(11) NOT NULL,
  `ID_Cat` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `GroupSunday`
--

INSERT INTO `GroupSunday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(22, 13, 436, 438, 440, NULL, NULL, NULL, NULL, NULL, 436, 19),
(23, 13, 428, 437, 443, 452, 456, 457, NULL, NULL, 428, 20),
(24, 14, 471, 472, 473, NULL, NULL, NULL, NULL, NULL, 471, 20),
(25, 13, 426, 430, 432, 433, 442, 444, NULL, NULL, 426, 21),
(26, 14, 454, 455, 461, 463, 464, 468, NULL, NULL, 454, 21);

-- --------------------------------------------------------

--
-- Structure de la table `History`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2492 ;

--
-- Contenu de la table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(2335, 7, 0, 'Suppression de toute l''année précédente.', 'Suppression', '2015-12-07', '18:05:35'),
(2336, 7, 426, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2337, 7, 427, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2338, 7, 428, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2339, 7, 429, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2340, 7, 430, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2341, 7, 431, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2342, 7, 432, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2343, 7, 433, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2344, 7, 434, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2345, 7, 435, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2346, 7, 436, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2347, 7, 437, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2348, 7, 438, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2349, 7, 439, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2350, 7, 440, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2351, 7, 441, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2352, 7, 442, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2353, 7, 443, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2354, 7, 444, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2355, 7, 445, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2356, 7, 446, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2357, 7, 447, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2358, 7, 448, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2359, 7, 449, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2360, 7, 450, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2361, 7, 451, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2362, 7, 452, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2363, 7, 453, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2364, 7, 454, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2365, 7, 455, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2366, 7, 456, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2367, 7, 457, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2368, 7, 458, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2369, 7, 459, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2370, 7, 460, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2371, 7, 461, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2372, 7, 462, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2373, 7, 463, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2374, 7, 464, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2375, 7, 465, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2376, 7, 466, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2377, 7, 467, 'Equipe', 'Ajout', '2015-12-07', '18:05:40'),
(2378, 7, 468, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2379, 7, 469, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2380, 7, 470, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2381, 7, 471, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2382, 7, 472, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2383, 7, 473, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2384, 7, 474, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2385, 7, 475, 'Equipe', 'Ajout', '2015-12-07', '18:05:41'),
(2386, 7, 149, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2387, 7, 1275, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2388, 7, 150, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2389, 7, 1276, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2390, 7, 151, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2391, 7, 1277, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2392, 7, 1278, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2393, 7, 1279, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2394, 7, 1280, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2395, 7, 1281, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2396, 7, 1282, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2397, 7, 1283, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2398, 7, 1284, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2399, 7, 1285, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2400, 7, 1286, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2401, 7, 152, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2402, 7, 1287, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2403, 7, 1288, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2404, 7, 1289, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2405, 7, 1290, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2406, 7, 1291, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2407, 7, 1292, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2408, 7, 1293, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2409, 7, 1294, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2410, 7, 1295, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2411, 7, 1296, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2412, 7, 153, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2413, 7, 1297, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2414, 7, 154, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2415, 7, 1298, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2416, 7, 1299, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2417, 7, 1300, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2418, 7, 1301, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2419, 7, 1302, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2420, 7, 1303, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2421, 7, 1304, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2422, 7, 1305, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2423, 7, 1306, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2424, 7, 1307, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2425, 7, 155, 'Poules (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2426, 7, 1308, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2427, 7, 1309, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2428, 7, 1310, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2429, 7, 1311, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2430, 7, 1312, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2431, 7, 1313, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2432, 7, 1314, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2433, 7, 1315, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2434, 7, 1316, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2435, 7, 1317, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '18:06:07'),
(2436, 7, 22, 'Poules (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2437, 7, 1318, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2438, 7, 1319, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2439, 7, 1320, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2440, 7, 23, 'Poules (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2441, 7, 1321, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2442, 7, 1322, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2443, 7, 1323, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2444, 7, 1324, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2445, 7, 1325, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2446, 7, 1326, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2447, 7, 1327, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2448, 7, 1328, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2449, 7, 1329, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2450, 7, 1330, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2451, 7, 1331, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2452, 7, 1332, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2453, 7, 1333, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2454, 7, 1334, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2455, 7, 1335, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2456, 7, 24, 'Poules (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2457, 7, 1336, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2458, 7, 1337, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2459, 7, 1338, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2460, 7, 25, 'Poules (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2461, 7, 1339, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2462, 7, 1340, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2463, 7, 1341, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2464, 7, 1342, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2465, 7, 1343, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2466, 7, 1344, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2467, 7, 1345, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2468, 7, 1346, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2469, 7, 1347, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2470, 7, 1348, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2471, 7, 1349, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2472, 7, 1350, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2473, 7, 1351, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2474, 7, 1352, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2475, 7, 1353, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2476, 7, 26, 'Poules (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2477, 7, 1354, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2478, 7, 1355, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2479, 7, 1356, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2480, 7, 1357, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2481, 7, 1358, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2482, 7, 1359, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2483, 7, 1360, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2484, 7, 1361, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2485, 7, 1362, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2486, 7, 1363, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2487, 7, 1364, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2488, 7, 1365, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2489, 7, 1366, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2490, 7, 1367, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21'),
(2491, 7, 1368, 'Match de poule (Dimanche)', 'Ajout', '2015-12-07', '18:06:21');

-- --------------------------------------------------------

--
-- Structure de la table `KnockoffSaturday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Structure de la table `KnockoffSunday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSunday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `Match`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1369 ;

--
-- Contenu de la table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(1275, '2015-12-07', '08:30', 435, 447, 0, 0, 13, 149),
(1276, '2015-12-07', '08:30', 429, 451, 0, 0, 13, 150),
(1277, '2015-12-07', '08:30', 431, 441, 0, 0, 13, 151),
(1278, '2015-12-07', '08:30', 431, 446, 0, 0, 13, 151),
(1279, '2015-12-07', '08:30', 431, 448, 0, 0, 13, 151),
(1280, '2015-12-07', '08:30', 431, 453, 0, 0, 13, 151),
(1281, '2015-12-07', '08:30', 441, 446, 0, 0, 13, 151),
(1282, '2015-12-07', '08:30', 441, 448, 0, 0, 13, 151),
(1283, '2015-12-07', '08:30', 441, 453, 0, 0, 13, 151),
(1284, '2015-12-07', '08:30', 446, 448, 0, 0, 13, 151),
(1285, '2015-12-07', '08:30', 446, 453, 0, 0, 13, 151),
(1286, '2015-12-07', '08:30', 448, 453, 0, 0, 13, 151),
(1287, '2015-12-07', '08:30', 458, 459, 0, 0, 14, 152),
(1288, '2015-12-07', '08:30', 458, 460, 0, 0, 14, 152),
(1289, '2015-12-07', '08:30', 458, 465, 0, 0, 14, 152),
(1290, '2015-12-07', '08:30', 458, 467, 0, 0, 14, 152),
(1291, '2015-12-07', '08:30', 459, 460, 0, 0, 14, 152),
(1292, '2015-12-07', '08:30', 459, 465, 0, 0, 14, 152),
(1293, '2015-12-07', '08:30', 459, 467, 0, 0, 14, 152),
(1294, '2015-12-07', '08:30', 460, 465, 0, 0, 14, 152),
(1295, '2015-12-07', '08:30', 460, 467, 0, 0, 14, 152),
(1296, '2015-12-07', '08:30', 465, 467, 0, 0, 14, 152),
(1297, '2015-12-07', '08:30', 469, 474, 0, 0, 15, 153),
(1298, '2015-12-07', '08:30', 427, 434, 0, 0, 13, 154),
(1299, '2015-12-07', '08:30', 427, 439, 0, 0, 13, 154),
(1300, '2015-12-07', '08:30', 427, 445, 0, 0, 13, 154),
(1301, '2015-12-07', '08:30', 427, 449, 0, 0, 13, 154),
(1302, '2015-12-07', '08:30', 434, 439, 0, 0, 13, 154),
(1303, '2015-12-07', '08:30', 434, 445, 0, 0, 13, 154),
(1304, '2015-12-07', '08:30', 434, 449, 0, 0, 13, 154),
(1305, '2015-12-07', '08:30', 439, 445, 0, 0, 13, 154),
(1306, '2015-12-07', '08:30', 439, 449, 0, 0, 13, 154),
(1307, '2015-12-07', '08:30', 445, 449, 0, 0, 13, 154),
(1308, '2015-12-07', '08:30', 450, 462, 0, 0, 14, 155),
(1309, '2015-12-07', '08:30', 450, 466, 0, 0, 14, 155),
(1310, '2015-12-07', '08:30', 450, 470, 0, 0, 14, 155),
(1311, '2015-12-07', '08:30', 450, 475, 0, 0, 14, 155),
(1312, '2015-12-07', '08:30', 462, 466, 0, 0, 14, 155),
(1313, '2015-12-07', '08:30', 462, 470, 0, 0, 14, 155),
(1314, '2015-12-07', '08:30', 462, 475, 0, 0, 14, 155),
(1315, '2015-12-07', '08:30', 466, 470, 0, 0, 14, 155),
(1316, '2015-12-07', '08:30', 466, 475, 0, 0, 14, 155),
(1317, '2015-12-07', '08:30', 470, 475, 0, 0, 14, 155),
(1318, '2015-12-07', '08:30', 436, 438, 0, 0, 13, 22),
(1319, '2015-12-07', '08:30', 436, 440, 0, 0, 13, 22),
(1320, '2015-12-07', '08:30', 438, 440, 0, 0, 13, 22),
(1321, '2015-12-07', '08:30', 428, 437, 0, 0, 13, 23),
(1322, '2015-12-07', '08:30', 428, 443, 0, 0, 13, 23),
(1323, '2015-12-07', '08:30', 428, 452, 0, 0, 13, 23),
(1324, '2015-12-07', '08:30', 428, 456, 0, 0, 13, 23),
(1325, '2015-12-07', '08:30', 428, 457, 0, 0, 13, 23),
(1326, '2015-12-07', '08:30', 437, 443, 0, 0, 13, 23),
(1327, '2015-12-07', '08:30', 437, 452, 0, 0, 13, 23),
(1328, '2015-12-07', '08:30', 437, 456, 0, 0, 13, 23),
(1329, '2015-12-07', '08:30', 437, 457, 0, 0, 13, 23),
(1330, '2015-12-07', '08:30', 443, 452, 0, 0, 13, 23),
(1331, '2015-12-07', '08:30', 443, 456, 0, 0, 13, 23),
(1332, '2015-12-07', '08:30', 443, 457, 0, 0, 13, 23),
(1333, '2015-12-07', '08:30', 452, 456, 0, 0, 13, 23),
(1334, '2015-12-07', '08:30', 452, 457, 0, 0, 13, 23),
(1335, '2015-12-07', '08:30', 456, 457, 0, 0, 13, 23),
(1336, '2015-12-07', '08:30', 471, 472, 0, 0, 14, 24),
(1337, '2015-12-07', '08:30', 471, 473, 0, 0, 14, 24),
(1338, '2015-12-07', '08:30', 472, 473, 0, 0, 14, 24),
(1339, '2015-12-07', '08:30', 426, 430, 0, 0, 13, 25),
(1340, '2015-12-07', '08:30', 426, 432, 0, 0, 13, 25),
(1341, '2015-12-07', '08:30', 426, 433, 0, 0, 13, 25),
(1342, '2015-12-07', '08:30', 426, 442, 0, 0, 13, 25),
(1343, '2015-12-07', '08:30', 426, 444, 0, 0, 13, 25),
(1344, '2015-12-07', '08:30', 430, 432, 0, 0, 13, 25),
(1345, '2015-12-07', '08:30', 430, 433, 0, 0, 13, 25),
(1346, '2015-12-07', '08:30', 430, 442, 0, 0, 13, 25),
(1347, '2015-12-07', '08:30', 430, 444, 0, 0, 13, 25),
(1348, '2015-12-07', '08:30', 432, 433, 0, 0, 13, 25),
(1349, '2015-12-07', '08:30', 432, 442, 0, 0, 13, 25),
(1350, '2015-12-07', '08:30', 432, 444, 0, 0, 13, 25),
(1351, '2015-12-07', '08:30', 433, 442, 0, 0, 13, 25),
(1352, '2015-12-07', '08:30', 433, 444, 0, 0, 13, 25),
(1353, '2015-12-07', '08:30', 442, 444, 0, 0, 13, 25),
(1354, '2015-12-07', '08:30', 454, 455, 0, 0, 14, 26),
(1355, '2015-12-07', '08:30', 454, 461, 0, 0, 14, 26),
(1356, '2015-12-07', '08:30', 454, 463, 0, 0, 14, 26),
(1357, '2015-12-07', '08:30', 454, 464, 0, 0, 14, 26),
(1358, '2015-12-07', '08:30', 454, 468, 0, 0, 14, 26),
(1359, '2015-12-07', '08:30', 455, 461, 0, 0, 14, 26),
(1360, '2015-12-07', '08:30', 455, 463, 0, 0, 14, 26),
(1361, '2015-12-07', '08:30', 455, 464, 0, 0, 14, 26),
(1362, '2015-12-07', '08:30', 455, 468, 0, 0, 14, 26),
(1363, '2015-12-07', '08:30', 461, 463, 0, 0, 14, 26),
(1364, '2015-12-07', '08:30', 461, 464, 0, 0, 14, 26),
(1365, '2015-12-07', '08:30', 461, 468, 0, 0, 14, 26),
(1366, '2015-12-07', '08:30', 463, 464, 0, 0, 14, 26),
(1367, '2015-12-07', '08:30', 463, 468, 0, 0, 14, 26),
(1368, '2015-12-07', '08:30', 464, 468, 0, 0, 14, 26);

-- --------------------------------------------------------

--
-- Structure de la table `OldOwner`
--

CREATE TABLE IF NOT EXISTS `OldOwner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(11) NOT NULL,
  `ID_Staff` int(11) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `OldOwner`
--

INSERT INTO `OldOwner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7);

-- --------------------------------------------------------

--
-- Structure de la table `OldTerrain`
--

CREATE TABLE IF NOT EXISTS `OldTerrain` (
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
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `OldTerrain`
--

INSERT INTO `OldTerrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`) VALUES
(13, '1 Rue de la frappe', 25, 11, 'Usé', '2015-11-17', '2015-12-03', '2015-11-11', 'Synthétique', 'Terrain boueux'),
(14, '34 Boulevard de la poussière', 22, 11, 'Neuf', '2020-04-11', '2036-11-12', '2015-11-11', 'Terre battue', 'Terrain propre'),
(15, '90 rue du combat', 18, 12, 'Passable', '2016-10-05', '2021-11-14', '2015-11-11', 'Gazon', 'Terrain agréable'),
(16, '1 rue', 90, 13, 'Neuf', '2015-11-12', '2016-05-12', '2015-11-12', 'Terre battue', 'OK'),
(17, 'okok', 0, 14, 'Neuf', '2015-11-12', '2015-11-12', '2015-11-12', 'Terre battue', 'ok');

-- --------------------------------------------------------

--
-- Structure de la table `Owner`
--

CREATE TABLE IF NOT EXISTS `Owner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(255) NOT NULL,
  `ID_Staff` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Staff` (`ID_Staff`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `Owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=913 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, 0, 635434770, '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(109, 2, 'Sarah', 'Croche', 'Annecy', 78000, 'Avenue du halo', 0, 9, 689898989, '1945-01-01', 'c.s@gmail.fr', '2015-11-11', '', 0, 1, 0),
(116, 1, 'Gérard', 'Remangagner', 'Marseille', 13000, '78 avenue de la défaite', 0, 0, 7, '0000-00-00', 'r.g@gmail.be', '2015-11-11', '', 0, 1, 0),
(713, 1, 'Christopher', 'Nault', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1981-01-01', 'Christopher.Nault@mail.com', '2015-12-07', '', 1, 0, 0),
(714, 1, 'Tommy', 'Lépine', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '2005-01-01', 'Tommy.Lépine@mail.com', '2015-12-07', '', 1, 0, 0),
(715, 0, 'Léo', 'Bourgeois', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1979-01-01', 'Léo.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(716, 0, 'Antoine', 'Sylvestre', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1972-01-01', 'Antoine.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(717, 1, 'Mathieu', 'Paquette', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1997-01-01', 'Mathieu.Paquette@mail.com', '2015-12-07', '', 1, 0, 0),
(718, 0, 'Étienne', 'Lépine', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1968-01-01', 'Étienne.Lépine@mail.com', '2015-12-07', '', 1, 0, 0),
(719, 1, 'Samuel', 'Bélanger', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1965-01-01', 'Samuel.Bélanger@mail.com', '2015-12-07', '', 1, 0, 0),
(720, 1, 'Antoine', 'Girard', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1978-01-01', 'Antoine.Girard@mail.com', '2015-12-07', '', 1, 0, 0),
(721, 1, 'Hugo', 'Briand', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1999-01-01', 'Hugo.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(722, 0, 'Alexis', 'Lajeunesse', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '2003-01-01', 'Alexis.Lajeunesse@mail.com', '2015-12-07', '', 1, 0, 0),
(723, 0, 'Justin', 'Fradette', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1963-01-01', 'Justin.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(724, 1, 'Émile', 'Briand', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1966-01-01', 'Émile.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(725, 1, 'Charles', 'Lajeunesse', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '1999-01-01', 'Charles.Lajeunesse@mail.com', '2015-12-07', '', 1, 0, 0),
(726, 1, 'Ludovic', 'Leblanc', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '1980-01-01', 'Ludovic.Leblanc@mail.com', '2015-12-07', '', 1, 0, 0),
(727, 0, 'Jonathan', 'Berger', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '1993-01-01', 'Jonathan.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(728, 1, 'Loïc', 'Simard', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1976-01-01', 'Loïc.Simard@mail.com', '2015-12-07', '', 1, 0, 0),
(729, 1, 'Alexis', 'Brault', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '2002-01-01', 'Alexis.Brault@mail.com', '2015-12-07', '', 1, 0, 0),
(730, 0, 'Noah', 'Crête', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1967-01-01', 'Noah.Crête@mail.com', '2015-12-07', '', 1, 0, 0),
(731, 0, 'Justin', 'Brousseau', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '1977-01-01', 'Justin.Brousseau@mail.com', '2015-12-07', '', 1, 0, 0),
(732, 0, 'Louis', 'Major', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '1994-01-01', 'Louis.Major@mail.com', '2015-12-07', '', 1, 0, 0),
(733, 0, 'Mathieu', 'Fradette', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1969-01-01', 'Mathieu.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(734, 0, 'Thomas', 'Berger', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '1987-01-01', 'Thomas.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(735, 0, 'Justin', 'Grenon', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1969-01-01', 'Justin.Grenon@mail.com', '2015-12-07', '', 1, 0, 0),
(736, 1, 'Jérémy', 'Sylvestre', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1973-01-01', 'Jérémy.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(737, 0, 'Olivier', 'Brault', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '1972-01-01', 'Olivier.Brault@mail.com', '2015-12-07', '', 1, 0, 0),
(738, 1, 'Tommy', 'Girard', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '2004-01-01', 'Tommy.Girard@mail.com', '2015-12-07', '', 1, 0, 0),
(739, 1, 'Tristan', 'Sylvestre', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1962-01-01', 'Tristan.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(740, 1, 'Louis', 'Rivest', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1963-01-01', 'Louis.Rivest@mail.com', '2015-12-07', '', 1, 0, 0),
(741, 0, 'Étienne', 'Cournoyer', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1975-01-01', 'Étienne.Cournoyer@mail.com', '2015-12-07', '', 1, 0, 0),
(742, 1, 'Gabriel', 'Berger', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1967-01-01', 'Gabriel.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(743, 0, 'Lucas', 'Bouchard', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '2002-01-01', 'Lucas.Bouchard@mail.com', '2015-12-07', '', 1, 0, 0),
(744, 0, 'Malik', 'Ratté', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '2001-01-01', 'Malik.Ratté@mail.com', '2015-12-07', '', 1, 0, 0),
(745, 1, 'Alex', 'Cournoyer', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1972-01-01', 'Alex.Cournoyer@mail.com', '2015-12-07', '', 1, 0, 0),
(746, 1, 'Gabriel', 'Masson', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1960-01-01', 'Gabriel.Masson@mail.com', '2015-12-07', '', 1, 0, 0),
(747, 0, 'Alexis', 'Lafrance', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '1996-01-01', 'Alexis.Lafrance@mail.com', '2015-12-07', '', 1, 0, 0),
(748, 0, 'Gabriel', 'Patenaude', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1960-01-01', 'Gabriel.Patenaude@mail.com', '2015-12-07', '', 1, 0, 0),
(749, 0, 'Samuel', 'Samson', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1997-01-01', 'Samuel.Samson@mail.com', '2015-12-07', '', 1, 0, 0),
(750, 1, 'Jonathan', 'Leboeuf', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1965-01-01', 'Jonathan.Leboeuf@mail.com', '2015-12-07', '', 1, 0, 0),
(751, 0, 'Philippe', 'Barbeau', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1998-01-01', 'Philippe.Barbeau@mail.com', '2015-12-07', '', 1, 0, 0),
(752, 0, 'Charles', 'Truchon', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1997-01-01', 'Charles.Truchon@mail.com', '2015-12-07', '', 1, 0, 0),
(753, 1, 'Justin', 'Gouin', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '2005-01-01', 'Justin.Gouin@mail.com', '2015-12-07', '', 1, 0, 0),
(754, 0, 'Gabriel', 'Sylvestre', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1994-01-01', 'Gabriel.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(755, 0, 'Raphaël', 'Sauvé', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '1968-01-01', 'Raphaël.Sauvé@mail.com', '2015-12-07', '', 1, 0, 0),
(756, 1, 'Elliot', 'Sénéchal', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '1963-01-01', 'Elliot.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(757, 1, 'David', 'Frappier', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '2001-01-01', 'David.Frappier@mail.com', '2015-12-07', '', 1, 0, 0),
(758, 1, 'Cédric', 'Ratté', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1995-01-01', 'Cédric.Ratté@mail.com', '2015-12-07', '', 1, 0, 0),
(759, 0, 'Émile', 'Briand', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1989-01-01', 'Émile.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(760, 1, 'Dylan', 'Boucher', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1967-01-01', 'Dylan.Boucher@mail.com', '2015-12-07', '', 1, 0, 0),
(761, 0, 'Alex', 'Pedneault', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '2003-01-01', 'Alex.Pedneault@mail.com', '2015-12-07', '', 1, 0, 0),
(762, 1, 'Hugo', 'Lesage', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '1979-01-01', 'Hugo.Lesage@mail.com', '2015-12-07', '', 1, 0, 0),
(763, 1, 'Noah', 'Lesage', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '1982-01-01', 'Noah.Lesage@mail.com', '2015-12-07', '', 1, 0, 0),
(764, 1, 'David', 'Berger', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '1969-01-01', 'David.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(765, 0, 'Étienne', 'Frappier', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1981-01-01', 'Étienne.Frappier@mail.com', '2015-12-07', '', 1, 0, 0),
(766, 0, 'Émile', 'Olivier', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1960-01-01', 'Émile.Olivier@mail.com', '2015-12-07', '', 1, 0, 0),
(767, 0, 'Louis', 'Carpentier', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1981-01-01', 'Louis.Carpentier@mail.com', '2015-12-07', '', 1, 0, 0),
(768, 1, 'Logan', 'Berger', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1975-01-01', 'Logan.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(769, 1, 'Noah', 'Tremblay', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1973-01-01', 'Noah.Tremblay@mail.com', '2015-12-07', '', 1, 0, 0),
(770, 0, 'Gabriel', 'Lajeunesse', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1984-01-01', 'Gabriel.Lajeunesse@mail.com', '2015-12-07', '', 1, 0, 0),
(771, 0, 'Samuel', 'Leblanc', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1961-01-01', 'Samuel.Leblanc@mail.com', '2015-12-07', '', 1, 0, 0),
(772, 0, 'Samuel', 'Sauvé', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1962-01-01', 'Samuel.Sauvé@mail.com', '2015-12-07', '', 1, 0, 0),
(773, 1, 'Malik', 'Desmarais', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1998-01-01', 'Malik.Desmarais@mail.com', '2015-12-07', '', 1, 0, 0),
(774, 1, 'Louis', 'Gauthier', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1972-01-01', 'Louis.Gauthier@mail.com', '2015-12-07', '', 1, 0, 0),
(775, 1, 'Malik', 'Généreux', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '2000-01-01', 'Malik.Généreux@mail.com', '2015-12-07', '', 1, 0, 0),
(776, 0, 'Guillaume', 'Laurin', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1980-01-01', 'Guillaume.Laurin@mail.com', '2015-12-07', '', 1, 0, 0),
(777, 1, 'Simon', 'Nault', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1994-01-01', 'Simon.Nault@mail.com', '2015-12-07', '', 1, 0, 0),
(778, 1, 'Samuel', 'Daoust', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1993-01-01', 'Samuel.Daoust@mail.com', '2015-12-07', '', 1, 0, 0),
(779, 1, 'Émile', 'Bourgeois', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '1966-01-01', 'Émile.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(780, 0, 'Philippe', 'Leroux', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1988-01-01', 'Philippe.Leroux@mail.com', '2015-12-07', '', 1, 0, 0),
(781, 1, 'David', 'Roy', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1962-01-01', 'David.Roy@mail.com', '2015-12-07', '', 1, 0, 0),
(782, 1, 'Louis', 'Masson', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1982-01-01', 'Louis.Masson@mail.com', '2015-12-07', '', 1, 0, 0),
(783, 0, 'Benjamin', 'Gagné', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1969-01-01', 'Benjamin.Gagné@mail.com', '2015-12-07', '', 1, 0, 0),
(784, 1, 'Samuel', 'Major', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1969-01-01', 'Samuel.Major@mail.com', '2015-12-07', '', 1, 0, 0),
(785, 1, 'Léo', 'Olivier', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1984-01-01', 'Léo.Olivier@mail.com', '2015-12-07', '', 1, 0, 0),
(786, 0, 'Étienne', 'Daoust', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1963-01-01', 'Étienne.Daoust@mail.com', '2015-12-07', '', 1, 0, 0),
(787, 1, 'Michaël', 'Fradette', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1980-01-01', 'Michaël.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(788, 1, 'Mathieu', 'Rivest', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1973-01-01', 'Mathieu.Rivest@mail.com', '2015-12-07', '', 1, 0, 0),
(789, 1, 'Gabriel', 'Leblanc', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1973-01-01', 'Gabriel.Leblanc@mail.com', '2015-12-07', '', 1, 0, 0),
(790, 0, 'Victor', 'Lépine', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1976-01-01', 'Victor.Lépine@mail.com', '2015-12-07', '', 1, 0, 0),
(791, 0, 'Alexis', 'Sénéchal', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1967-01-01', 'Alexis.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(792, 1, 'Olivier', 'Roy', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '1988-01-01', 'Olivier.Roy@mail.com', '2015-12-07', '', 1, 0, 0),
(793, 1, 'Anthony', 'Morin', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1985-01-01', 'Anthony.Morin@mail.com', '2015-12-07', '', 1, 0, 0),
(794, 0, 'Victor', 'Nault', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1960-01-01', 'Victor.Nault@mail.com', '2015-12-07', '', 1, 0, 0),
(795, 0, 'Isaac', 'Chan', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1993-01-01', 'Isaac.Chan@mail.com', '2015-12-07', '', 1, 0, 0),
(796, 0, 'Ludovic', 'Gagnon', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1981-01-01', 'Ludovic.Gagnon@mail.com', '2015-12-07', '', 1, 0, 0),
(797, 0, 'Elliot', 'Côté', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '2003-01-01', 'Elliot.Côté@mail.com', '2015-12-07', '', 1, 0, 0),
(798, 0, 'Antoine', 'Masson', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1978-01-01', 'Antoine.Masson@mail.com', '2015-12-07', '', 1, 0, 0),
(799, 1, 'Guillaume', 'Lafrance', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1960-01-01', 'Guillaume.Lafrance@mail.com', '2015-12-07', '', 1, 0, 0),
(800, 0, 'Tommy', 'Leblanc', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '1978-01-01', 'Tommy.Leblanc@mail.com', '2015-12-07', '', 1, 0, 0),
(801, 1, 'Noah', 'Frappier', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '1972-01-01', 'Noah.Frappier@mail.com', '2015-12-07', '', 1, 0, 0),
(802, 0, 'Noah', 'Briand', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '2005-01-01', 'Noah.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(803, 0, 'Maxime', 'Généreux', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1973-01-01', 'Maxime.Généreux@mail.com', '2015-12-07', '', 1, 0, 0),
(804, 0, 'Mathieu', 'Truchon', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '2005-01-01', 'Mathieu.Truchon@mail.com', '2015-12-07', '', 1, 0, 0),
(805, 1, 'Tommy', 'Gauthier', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1990-01-01', 'Tommy.Gauthier@mail.com', '2015-12-07', '', 1, 0, 0),
(806, 0, 'Benjamin', 'Castonguay', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '1964-01-01', 'Benjamin.Castonguay@mail.com', '2015-12-07', '', 1, 0, 0),
(807, 0, 'Raphaël', 'Meloche', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '2000-01-01', 'Raphaël.Meloche@mail.com', '2015-12-07', '', 1, 0, 0),
(808, 0, 'Nathan', 'Lévesque', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '1979-01-01', 'Nathan.Lévesque@mail.com', '2015-12-07', '', 1, 0, 0),
(809, 0, 'Adam', 'Major', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1998-01-01', 'Adam.Major@mail.com', '2015-12-07', '', 1, 0, 0),
(810, 0, 'Michaël', 'Brochu', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1964-01-01', 'Michaël.Brochu@mail.com', '2015-12-07', '', 1, 0, 0),
(811, 1, 'Christopher', 'Barbeau', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '1984-01-01', 'Christopher.Barbeau@mail.com', '2015-12-07', '', 1, 0, 0),
(812, 1, 'Édouard', 'Lévesque', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1999-01-01', 'Édouard.Lévesque@mail.com', '2015-12-07', '', 1, 0, 0),
(813, 0, 'Olivier', 'Bossé', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1969-01-01', 'Olivier.Bossé@mail.com', '2015-12-07', '', 1, 0, 0),
(814, 0, 'Justin', 'Ratté', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1973-01-01', 'Justin.Ratté@mail.com', '2015-12-07', '', 1, 0, 0),
(815, 1, 'Raphaël', 'Chan', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1979-01-01', 'Raphaël.Chan@mail.com', '2015-12-07', '', 1, 0, 0),
(816, 0, 'Alex', 'Généreux', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1970-01-01', 'Alex.Généreux@mail.com', '2015-12-07', '', 1, 0, 0),
(817, 1, 'Tommy', 'Boucher', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1987-01-01', 'Tommy.Boucher@mail.com', '2015-12-07', '', 1, 0, 0),
(818, 1, 'Simon', 'Ratté', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1996-01-01', 'Simon.Ratté@mail.com', '2015-12-07', '', 1, 0, 0),
(819, 0, 'Justin', 'Poliquin', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '2001-01-01', 'Justin.Poliquin@mail.com', '2015-12-07', '', 1, 0, 0),
(820, 1, 'Jacob', 'Lagacé', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1998-01-01', 'Jacob.Lagacé@mail.com', '2015-12-07', '', 1, 0, 0),
(821, 0, 'Loïc', 'Bourgeois', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1964-01-01', 'Loïc.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(822, 0, 'Lucas', 'Bourgeois', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '2000-01-01', 'Lucas.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(823, 1, 'Michaël', 'Papineau', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1985-01-01', 'Michaël.Papineau@mail.com', '2015-12-07', '', 1, 0, 0),
(824, 0, 'Dylan', 'Boissonneault', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1986-01-01', 'Dylan.Boissonneault@mail.com', '2015-12-07', '', 1, 0, 0),
(825, 0, 'Raphaël', 'Brault', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '1962-01-01', 'Raphaël.Brault@mail.com', '2015-12-07', '', 1, 0, 0),
(826, 0, 'Ludovic', 'Gagnon', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '2004-01-01', 'Ludovic.Gagnon@mail.com', '2015-12-07', '', 1, 0, 0),
(827, 1, 'Justin', 'Pedneault', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '2005-01-01', 'Justin.Pedneault@mail.com', '2015-12-07', '', 1, 0, 0),
(828, 1, 'Julien', 'Chrétien', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1974-01-01', 'Julien.Chrétien@mail.com', '2015-12-07', '', 1, 0, 0),
(829, 0, 'Alexis', 'Leblanc', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '1972-01-01', 'Alexis.Leblanc@mail.com', '2015-12-07', '', 1, 0, 0),
(830, 1, 'Maxime', 'Crête', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1977-01-01', 'Maxime.Crête@mail.com', '2015-12-07', '', 1, 0, 0),
(831, 0, 'Benjamin', 'Meloche', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '2004-01-01', 'Benjamin.Meloche@mail.com', '2015-12-07', '', 1, 0, 0),
(832, 1, 'Noah', 'Bergeron', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '2003-01-01', 'Noah.Bergeron@mail.com', '2015-12-07', '', 1, 0, 0),
(833, 1, 'Léo', 'Métivier', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1998-01-01', 'Léo.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(834, 1, 'Alexis', 'Meloche', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '2001-01-01', 'Alexis.Meloche@mail.com', '2015-12-07', '', 1, 0, 0),
(835, 0, 'Thomas', 'Bouchard', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1979-01-01', 'Thomas.Bouchard@mail.com', '2015-12-07', '', 1, 0, 0),
(836, 0, 'Jacob', 'Leroux', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1978-01-01', 'Jacob.Leroux@mail.com', '2015-12-07', '', 1, 0, 0),
(837, 1, 'Isaac', 'Nault', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '2005-01-01', 'Isaac.Nault@mail.com', '2015-12-07', '', 1, 0, 0),
(838, 1, 'Logan', 'Larrivée', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '1997-01-01', 'Logan.Larrivée@mail.com', '2015-12-07', '', 1, 0, 0),
(839, 1, 'Adam', 'Paquette', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1975-01-01', 'Adam.Paquette@mail.com', '2015-12-07', '', 1, 0, 0),
(840, 0, 'Lucas', 'Ranger', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1961-01-01', 'Lucas.Ranger@mail.com', '2015-12-07', '', 1, 0, 0),
(841, 0, 'Michaël', 'Larochelle', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1998-01-01', 'Michaël.Larochelle@mail.com', '2015-12-07', '', 1, 0, 0),
(842, 0, 'Olivier', 'Métivier', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1999-01-01', 'Olivier.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(843, 1, 'Christopher', 'Berger', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '1975-01-01', 'Christopher.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(844, 0, 'Félix', 'Morin', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '2004-01-01', 'Félix.Morin@mail.com', '2015-12-07', '', 1, 0, 0),
(845, 0, 'Maxime', 'Fradette', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1991-01-01', 'Maxime.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(846, 0, 'Benjamin', 'Lafrance', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1971-01-01', 'Benjamin.Lafrance@mail.com', '2015-12-07', '', 1, 0, 0),
(847, 0, 'Mathis', 'Brousseau', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '2002-01-01', 'Mathis.Brousseau@mail.com', '2015-12-07', '', 1, 0, 0),
(848, 0, 'Lucas', 'Leboeuf', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1975-01-01', 'Lucas.Leboeuf@mail.com', '2015-12-07', '', 1, 0, 0),
(849, 0, 'Ludovic', 'Lépine', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1961-01-01', 'Ludovic.Lépine@mail.com', '2015-12-07', '', 1, 0, 0),
(850, 0, 'Louis', 'Métivier', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1963-01-01', 'Louis.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(851, 0, 'Nathan', 'Brochu', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1963-01-01', 'Nathan.Brochu@mail.com', '2015-12-07', '', 1, 0, 0),
(852, 1, 'Félix', 'Bourgeois', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1969-01-01', 'Félix.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(853, 1, 'Dylan', 'Laurin', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '1978-01-01', 'Dylan.Laurin@mail.com', '2015-12-07', '', 1, 0, 0),
(854, 0, 'Elliot', 'Daoust', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1998-01-01', 'Elliot.Daoust@mail.com', '2015-12-07', '', 1, 0, 0),
(855, 0, 'Antoine', 'Chrétien', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '2003-01-01', 'Antoine.Chrétien@mail.com', '2015-12-07', '', 1, 0, 0),
(856, 1, 'Noah', 'Bessette', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '2003-01-01', 'Noah.Bessette@mail.com', '2015-12-07', '', 1, 0, 0),
(857, 0, 'Raphaël', 'Crête', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '1991-01-01', 'Raphaël.Crête@mail.com', '2015-12-07', '', 1, 0, 0),
(858, 1, 'Nicolas', 'Laurin', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1977-01-01', 'Nicolas.Laurin@mail.com', '2015-12-07', '', 1, 0, 0),
(859, 0, 'Cédric', 'Grenon', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1982-01-01', 'Cédric.Grenon@mail.com', '2015-12-07', '', 1, 0, 0),
(860, 1, 'Étienne', 'Desmarais', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1961-01-01', 'Étienne.Desmarais@mail.com', '2015-12-07', '', 1, 0, 0),
(861, 1, 'Tristan', 'Lesage', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '1971-01-01', 'Tristan.Lesage@mail.com', '2015-12-07', '', 1, 0, 0),
(862, 0, 'Guillaume', 'Sénéchal', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '2002-01-01', 'Guillaume.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(863, 1, 'Victor', 'Alarie', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '1996-01-01', 'Victor.Alarie@mail.com', '2015-12-07', '', 1, 0, 0),
(864, 0, 'Antoine', 'Paquette', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '2001-01-01', 'Antoine.Paquette@mail.com', '2015-12-07', '', 1, 0, 0),
(865, 1, 'Thomas', 'Gauthier', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1995-01-01', 'Thomas.Gauthier@mail.com', '2015-12-07', '', 1, 0, 0),
(866, 0, 'Isaac', 'Nault', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1977-01-01', 'Isaac.Nault@mail.com', '2015-12-07', '', 1, 0, 0),
(867, 0, 'Loïc', 'Fradette', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1975-01-01', 'Loïc.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(868, 1, 'Tommy', 'Lagacé', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1989-01-01', 'Tommy.Lagacé@mail.com', '2015-12-07', '', 1, 0, 0),
(869, 0, 'Guillaume', 'Bourgeois', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1968-01-01', 'Guillaume.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(870, 0, 'Cédric', 'Leblanc', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1975-01-01', 'Cédric.Leblanc@mail.com', '2015-12-07', '', 1, 0, 0),
(871, 1, 'Victor', 'Sénéchal', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1961-01-01', 'Victor.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(872, 1, 'Olivier', 'Fradette', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1992-01-01', 'Olivier.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(873, 0, 'Édouard', 'Lévesque', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1978-01-01', 'Édouard.Lévesque@mail.com', '2015-12-07', '', 1, 0, 0),
(874, 1, 'Tommy', 'Fortin', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1993-01-01', 'Tommy.Fortin@mail.com', '2015-12-07', '', 1, 0, 0),
(875, 0, 'Jonathan', 'Lajeunesse', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '1991-01-01', 'Jonathan.Lajeunesse@mail.com', '2015-12-07', '', 1, 0, 0),
(876, 0, 'Raphaël', 'Sénéchal', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1997-01-01', 'Raphaël.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(877, 0, 'Étienne', 'Després', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1987-01-01', 'Étienne.Després@mail.com', '2015-12-07', '', 1, 0, 0),
(878, 1, 'Elliot', 'Poliquin', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1976-01-01', 'Elliot.Poliquin@mail.com', '2015-12-07', '', 1, 0, 0),
(879, 1, 'Alex', 'Lesage', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '2000-01-01', 'Alex.Lesage@mail.com', '2015-12-07', '', 1, 0, 0),
(880, 0, 'Michaël', 'Métivier', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1975-01-01', 'Michaël.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(881, 0, 'Michaël', 'Frappier', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1994-01-01', 'Michaël.Frappier@mail.com', '2015-12-07', '', 1, 0, 0),
(882, 1, 'Anthony', 'Després', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1993-01-01', 'Anthony.Després@mail.com', '2015-12-07', '', 1, 0, 0),
(883, 0, 'Michaël', 'Paquette', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1970-01-01', 'Michaël.Paquette@mail.com', '2015-12-07', '', 1, 0, 0),
(884, 0, 'Tommy', 'Lavoie', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1994-01-01', 'Tommy.Lavoie@mail.com', '2015-12-07', '', 1, 0, 0),
(885, 0, 'Maxime', 'Barbeau', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1986-01-01', 'Maxime.Barbeau@mail.com', '2015-12-07', '', 1, 0, 0),
(886, 1, 'Charles', 'Gauthier', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1962-01-01', 'Charles.Gauthier@mail.com', '2015-12-07', '', 1, 0, 0),
(887, 0, 'Christopher', 'Fradette', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1973-01-01', 'Christopher.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(888, 0, 'Hugo', 'Lévesque', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1987-01-01', 'Hugo.Lévesque@mail.com', '2015-12-07', '', 1, 0, 0),
(889, 1, 'Mathieu', 'Gagné', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1974-01-01', 'Mathieu.Gagné@mail.com', '2015-12-07', '', 1, 0, 0),
(890, 1, 'Charles', 'Olivier', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1978-01-01', 'Charles.Olivier@mail.com', '2015-12-07', '', 1, 0, 0),
(891, 0, 'Adam', 'Briand', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1993-01-01', 'Adam.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(892, 1, 'Vincent', 'Sauvé', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '2000-01-01', 'Vincent.Sauvé@mail.com', '2015-12-07', '', 1, 0, 0),
(893, 0, 'Olivier', 'Larrivée', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1964-01-01', 'Olivier.Larrivée@mail.com', '2015-12-07', '', 1, 0, 0),
(894, 1, 'Samuel', 'Lépine', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1974-01-01', 'Samuel.Lépine@mail.com', '2015-12-07', '', 1, 0, 0),
(895, 1, 'Mathieu', 'Desmarais', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1992-01-01', 'Mathieu.Desmarais@mail.com', '2015-12-07', '', 1, 0, 0),
(896, 0, 'Léo', 'Lavoie', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1996-01-01', 'Léo.Lavoie@mail.com', '2015-12-07', '', 1, 0, 0),
(897, 0, 'Raphaël', 'Bergeron', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '1962-01-01', 'Raphaël.Bergeron@mail.com', '2015-12-07', '', 1, 0, 0),
(898, 0, 'Louis', 'Bourgault', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1990-01-01', 'Louis.Bourgault@mail.com', '2015-12-07', '', 1, 0, 0),
(899, 0, 'Tristan', 'Patenaude', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1987-01-01', 'Tristan.Patenaude@mail.com', '2015-12-07', '', 1, 0, 0),
(900, 1, 'Alexandre', 'Rivest', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '1975-01-01', 'Alexandre.Rivest@mail.com', '2015-12-07', '', 1, 0, 0),
(901, 0, 'Raphaël', 'Fortin', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '1969-01-01', 'Raphaël.Fortin@mail.com', '2015-12-07', '', 1, 0, 0),
(902, 0, 'Tristan', 'Sylvestre', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '1989-01-01', 'Tristan.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(903, 0, 'Émile', 'Fortin', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1976-01-01', 'Émile.Fortin@mail.com', '2015-12-07', '', 1, 0, 0),
(904, 0, 'David', 'Vallières', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '1997-01-01', 'David.Vallières@mail.com', '2015-12-07', '', 1, 0, 0),
(905, 0, 'Elliot', 'Sénéchal', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1978-01-01', 'Elliot.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(906, 1, 'Noah', 'Boissonneault', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '2000-01-01', 'Noah.Boissonneault@mail.com', '2015-12-07', '', 1, 0, 0),
(907, 1, 'Jérémy', 'Desmarais', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '1978-01-01', 'Jérémy.Desmarais@mail.com', '2015-12-07', '', 1, 0, 0),
(908, 1, 'Jérémy', 'Boucher', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '1976-01-01', 'Jérémy.Boucher@mail.com', '2015-12-07', '', 1, 0, 0),
(909, 1, 'Édouard', 'Côté', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1999-01-01', 'Édouard.Côté@mail.com', '2015-12-07', '', 1, 0, 0),
(910, 0, 'Gabriel', 'Morin', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1994-01-01', 'Gabriel.Morin@mail.com', '2015-12-07', '', 1, 0, 0),
(911, 0, 'Félix', 'Berger', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '2004-01-01', 'Félix.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(912, 1, 'Michaël', 'Crête', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1968-01-01', 'Michaël.Crête@mail.com', '2015-12-07', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `PersonneExtra`
--

CREATE TABLE IF NOT EXISTS `PersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Structure de la table `PersonneTmp`
--

CREATE TABLE IF NOT EXISTS `PersonneTmp` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=913 ;

-- --------------------------------------------------------

--
-- Structure de la table `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `ID_Personne` int(255) NOT NULL,
  `IsLeader` tinyint(1) NOT NULL,
  `Paid` tinyint(1) NOT NULL,
  `AlreadyPart` tinyint(1) NOT NULL,
  `Ranking` varchar(10) NOT NULL,
  UNIQUE KEY `ID_Personne_2` (`ID_Personne`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Personne_3` (`ID_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Player`
--

INSERT INTO `Player` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`, `Ranking`) VALUES
(739, 0, 0, 0, 'C15'),
(756, 0, 0, 0, 'C30.2'),
(796, 0, 0, 0, 'C30.5'),
(812, 0, 0, 0, 'C30.2'),
(813, 0, 0, 0, 'C15'),
(814, 0, 0, 0, 'C30.3'),
(815, 0, 0, 0, 'C15.4'),
(816, 0, 0, 0, 'NC'),
(817, 0, 0, 0, 'C15.1'),
(818, 0, 0, 0, 'C30.4'),
(819, 0, 0, 0, 'C15.3'),
(820, 0, 0, 0, 'C30.3'),
(821, 0, 0, 0, 'C30.4'),
(822, 0, 0, 0, 'C30.5'),
(823, 0, 0, 0, 'C15.3'),
(824, 0, 0, 0, 'C15.3'),
(825, 0, 0, 0, 'C15.4'),
(827, 0, 0, 0, 'C15.4'),
(828, 0, 0, 0, 'C30.3'),
(829, 0, 0, 0, 'C30'),
(830, 0, 0, 0, 'C30.1'),
(831, 0, 0, 0, 'C30.5'),
(832, 0, 0, 0, 'C15.1'),
(833, 0, 0, 0, 'C30'),
(834, 0, 0, 0, 'C30.4'),
(835, 0, 0, 0, 'C15.5'),
(836, 0, 0, 0, 'C30.5'),
(837, 0, 0, 0, 'C30.3'),
(838, 0, 0, 0, 'C30'),
(839, 0, 0, 0, 'C30'),
(840, 0, 0, 0, 'C15.5'),
(841, 0, 0, 0, 'NC'),
(842, 0, 0, 0, 'NC'),
(843, 0, 0, 0, 'C15.3'),
(844, 0, 0, 0, 'C30.2'),
(845, 0, 0, 0, 'C30.2'),
(846, 0, 0, 0, 'C30.2'),
(847, 0, 0, 0, 'C15.2'),
(848, 0, 0, 0, 'C15.5'),
(849, 0, 0, 0, 'C15.5'),
(850, 0, 0, 0, 'C30.4'),
(851, 0, 0, 0, 'C15.3'),
(852, 0, 0, 0, 'C15.1'),
(853, 0, 0, 0, 'C15.3'),
(854, 0, 0, 0, 'C30.3'),
(855, 0, 0, 0, 'C15'),
(856, 0, 0, 0, 'C30.3'),
(857, 0, 0, 0, 'C15.1'),
(858, 0, 0, 0, 'C15.3'),
(859, 0, 0, 0, 'NC'),
(860, 0, 0, 0, 'C30.2'),
(861, 0, 0, 0, 'C30.3'),
(862, 0, 0, 0, 'C15.3'),
(863, 0, 0, 0, 'C15.3'),
(864, 0, 0, 0, 'C30.5'),
(865, 0, 0, 0, 'C15.1'),
(867, 0, 0, 0, 'C30.4'),
(868, 0, 0, 0, 'C15.4'),
(869, 0, 0, 0, 'C30'),
(870, 0, 0, 0, 'C30.3'),
(871, 0, 0, 0, 'C15.4'),
(872, 0, 0, 0, 'C30'),
(874, 0, 0, 0, 'C30.3'),
(875, 0, 0, 0, 'C15.3'),
(876, 0, 0, 0, 'NC'),
(877, 0, 0, 0, 'C30.5'),
(878, 0, 0, 0, 'NC'),
(879, 0, 0, 0, 'C30.2'),
(880, 0, 0, 0, 'C15.3'),
(881, 0, 0, 0, 'C30.4'),
(882, 0, 0, 0, 'C15'),
(883, 0, 0, 0, 'NC'),
(884, 0, 0, 0, 'C30.2'),
(885, 0, 0, 0, 'C30.4'),
(886, 0, 0, 0, 'C15.2'),
(887, 0, 0, 0, 'C30.1'),
(888, 0, 0, 0, 'C30.1'),
(889, 0, 0, 0, 'NC'),
(890, 0, 0, 0, 'C30.1'),
(891, 0, 0, 0, 'C30.2'),
(892, 0, 0, 0, 'C30.2'),
(893, 0, 0, 0, 'C15'),
(894, 0, 0, 0, 'C30.4'),
(895, 0, 0, 0, 'C30.5'),
(896, 0, 0, 0, 'C30.2'),
(897, 0, 0, 0, 'C15.5'),
(898, 0, 0, 0, 'C15.1'),
(899, 0, 0, 0, 'C30.3'),
(900, 0, 0, 0, 'C30.2'),
(901, 0, 0, 0, 'C30.1'),
(903, 0, 0, 0, 'C15.5'),
(904, 0, 0, 0, 'C15'),
(906, 0, 0, 0, 'C30.5'),
(907, 0, 0, 0, 'C15.3'),
(908, 0, 0, 0, 'NC'),
(909, 0, 0, 0, 'C15.5'),
(910, 0, 0, 0, 'C30.2'),
(911, 0, 0, 0, 'C15.5'),
(912, 0, 0, 0, 'C30.5');

-- --------------------------------------------------------

--
-- Structure de la table `PlayerAlone`
--

CREATE TABLE IF NOT EXISTS `PlayerAlone` (
  `ID_Personne` int(255) NOT NULL,
  `Paid` tinyint(4) NOT NULL,
  `AlreadyPart` tinyint(4) NOT NULL,
  `Ranking` varchar(10) NOT NULL,
  UNIQUE KEY `ID_Personne` (`ID_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `PlayerTmp`
--

CREATE TABLE IF NOT EXISTS `PlayerTmp` (
  `ID_Personne` int(255) NOT NULL,
  `IsLeader` tinyint(1) NOT NULL,
  `Paid` tinyint(1) NOT NULL,
  `AlreadyPart` tinyint(1) NOT NULL,
  `Ranking` varchar(10) NOT NULL,
  UNIQUE KEY `ID_Personne_2` (`ID_Personne`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Personne_3` (`ID_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Structure de la table `RankingTextToIntBelgian`
--

CREATE TABLE IF NOT EXISTS `RankingTextToIntBelgian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RankingText` varchar(10) COLLATE latin1_bin NOT NULL,
  `RankingInt` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=26 ;

--
-- Contenu de la table `RankingTextToIntBelgian`
--

INSERT INTO `RankingTextToIntBelgian` (`ID`, `RankingText`, `RankingInt`) VALUES
(1, 'NC', 0),
(2, 'C30.5', 1),
(3, 'C30.4', 2),
(4, 'C30.3', 3),
(5, 'C30.2', 4),
(6, 'C30.1', 5),
(7, 'C30', 6),
(8, 'C15.5', 7),
(9, 'C15.4', 8),
(10, 'C15.3', 9),
(11, 'C15.2', 10),
(12, 'C15.1', 11),
(13, 'C15', 12),
(14, 'B+4/6', 13),
(15, 'B+2/6', 14),
(16, 'B0', 15),
(17, 'B-2/6', 16),
(18, 'B-4/6', 17),
(19, 'B-15', 18),
(20, 'B-15.1', 19),
(21, 'B-15.2', 20),
(22, 'B-15.4', 21),
(23, 'A Nat', 22),
(24, 'A Int', 23),
(25, '', -1);

-- --------------------------------------------------------

--
-- Structure de la table `Staff`
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
-- Contenu de la table `Staff`
--

INSERT INTO `Staff` (`ID`, `ID_Personne`, `Level`, `ID_Cat`, `Password`, `Username`) VALUES
(1, 7, '1', 20, 'hello', '1'),
(100, 70, '10', 20, '123', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_Player1` int(255) NOT NULL,
  `ID_Player2` int(255) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `NbWinMatch` int(255) NOT NULL,
  `AvgRanking` varchar(10) NOT NULL,
  `Group_Vic` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Player1` (`ID_Player1`),
  KEY `ID_Player2` (`ID_Player2`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=476 ;

-- --------------------------------------------------------

--
-- Structure de la table `TeamTmp`
--

CREATE TABLE IF NOT EXISTS `TeamTmp` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_Player1` int(255) NOT NULL,
  `ID_Player2` int(255) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `NbWinMatch` int(255) NOT NULL,
  `AvgRanking` varchar(10) NOT NULL,
  `Group_Vic` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Player1` (`ID_Player1`),
  KEY `ID_Player2` (`ID_Player2`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=476 ;

--
-- Contenu de la table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`, `AvgRanking`, `Group_Vic`) VALUES
(426, 813, 814, 21, 0, 'C15.4', 0),
(427, 815, 816, 21, 0, 'C30.2', 0),
(428, 817, 818, 20, 0, 'C15.5', 0),
(429, 819, 820, 19, 0, 'C30', 0),
(430, 821, 822, 21, 0, 'C30.4', 0),
(431, 823, 824, 20, 0, 'C30.1', 0),
(432, 825, 796, 21, 0, 'C30.1', 0),
(433, 827, 828, 21, 0, 'C30', 0),
(434, 829, 830, 21, 0, 'C30', 0),
(435, 831, 832, 16, 0, 'C30', 0),
(436, 833, 834, 19, 0, 'C30.2', 0),
(437, 835, 836, 20, 0, 'C30.2', 0),
(438, 837, 838, 19, 0, 'C30.1', 0),
(439, 839, 840, 21, 0, 'C15.5', 0),
(440, 841, 842, 19, 0, 'NC', 0),
(441, 843, 844, 20, 0, 'C15.5', 0),
(442, 845, 846, 21, 0, 'C30.4', 0),
(443, 847, 848, 20, 0, 'C15.3', 0),
(444, 849, 850, 21, 0, 'C30.1', 0),
(445, 851, 852, 21, 0, 'C15.2', 0),
(446, 853, 854, 20, 0, 'C30', 0),
(447, 855, 856, 16, 0, 'C15.4', 0),
(448, 857, 858, 20, 0, 'C15.2', 0),
(449, 859, 860, 21, 0, 'C30.4', 0),
(450, 861, 862, 21, 0, 'C30', 0),
(451, 863, 864, 19, 0, 'C30.1', 0),
(452, 865, 837, 20, 0, 'C30', 0),
(453, 867, 868, 20, 0, 'C30.1', 0),
(454, 869, 870, 21, 0, 'C30.1', 0),
(455, 871, 872, 21, 0, 'C15.5', 0),
(456, 812, 874, 20, 0, 'C30.2', 0),
(457, 875, 876, 20, 0, 'C30.1', 0),
(458, 877, 878, 20, 0, 'C30.5', 0),
(459, 879, 880, 20, 0, 'C15.5', 0),
(460, 881, 882, 20, 0, 'C15.5', 0),
(461, 883, 884, 21, 0, 'C30.4', 0),
(462, 885, 886, 21, 0, 'C30', 0),
(463, 887, 888, 21, 0, 'C30.3', 0),
(464, 889, 890, 21, 0, 'C30.3', 0),
(465, 891, 892, 20, 0, 'C30.4', 0),
(466, 893, 894, 21, 0, 'C15.5', 0),
(467, 895, 896, 20, 0, 'C30.3', 0),
(468, 897, 898, 21, 0, 'C15.3', 0),
(469, 899, 900, 20, 0, 'C30.2', 0),
(470, 901, 739, 21, 0, 'C15.3', 0),
(471, 903, 904, 20, 0, 'C15.2', 0),
(472, 756, 906, 20, 0, 'C30.3', 0),
(473, 907, 908, 20, 0, 'C30.1', 0),
(474, 909, 910, 20, 0, 'C30', 0),
(475, 911, 912, 21, 0, 'C30.2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Terrain`
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
-- Contenu de la table `Terrain`
--

INSERT INTO `Terrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`) VALUES
(13, '1 Rue de la frappe', 25, 11, 'Usé', '2015-11-17', '2015-12-03', '2015-11-11', 'Synthétique', 'Terrain boueux'),
(14, '34 Boulevard de la poussière', 22, 11, 'Neuf', '2020-04-11', '2036-11-12', '2015-11-11', 'Terre battue', 'Terrain propre'),
(15, '90 rue du combat', 18, 12, 'Passable', '2016-10-05', '2021-11-14', '2015-11-11', 'Gazon', 'Terrain agréable'),
(16, '1 rue', 90, 13, 'Neuf', '2015-11-12', '2016-05-12', '2015-11-12', 'Terre battue', 'OK'),
(17, 'okok', 0, 14, 'Neuf', '2015-11-12', '2015-11-12', '2015-11-12', 'Terre battue', 'ok');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Owner`
--
ALTER TABLE `Owner`
  ADD CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Owner_ibfk_2` FOREIGN KEY (`ID_Staff`) REFERENCES `Staff` (`ID_Personne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Player`
--
ALTER TABLE `Player`
  ADD CONSTRAINT `PersonneFK` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `Staff_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Staff_ibfk_2` FOREIGN KEY (`ID_Cat`) REFERENCES `Categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Team`
--
ALTER TABLE `Team`
  ADD CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`ID_Player1`) REFERENCES `Personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_2` FOREIGN KEY (`ID_Player2`) REFERENCES `Personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_3` FOREIGN KEY (`ID_Cat`) REFERENCES `Categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
