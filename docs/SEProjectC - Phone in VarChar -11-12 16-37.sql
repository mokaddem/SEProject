-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 11 Décembre 2015 à 16:32
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`ID`, `Age`, `Designation`) VALUES
(15, '9 - 10', 'Pré-minimes'),
(16, '11 - 12', 'Minimes'),
(17, '13 - 14', 'Cadet'),
(18, '15 - 16', 'Scolaire'),
(19, '17 - 19', 'Junior'),
(20, '20 - 40', 'Seniors'),
(21, '41 - 120', 'Elites');

-- --------------------------------------------------------

--
-- Structure de la table `ConfirmationPersonne`
--

CREATE TABLE IF NOT EXISTS `ConfirmationPersonne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Code` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Personne_ID` (`Personne_ID`,`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `ConfirmationPersonne`
--

INSERT INTO `ConfirmationPersonne` (`ID`, `Personne_ID`, `Code`) VALUES
(33, 961, '7e5d16a11379a5051554417be4efa041'),
(32, 962, 'd81ad84ce7a4d670fc77cc0e71d19f98'),
(34, 964, '8b2bb1d75a0da61aa6de2d08d708ef94'),
(35, 968, 'ec3f75573845ba157c01bf0e29098392'),
(36, 972, '0907835d124fddbd6f93676942f8e4c2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=22 ;

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
(9, 'Prix_Tournoi', '15', 1),
(10, 'tournament_started_sam', '0', 0),
(11, 'tournament_started_dim', '0', 0),
(12, 'Paiement CB', '[A rediger]', 0),
(13, 'Paiement Espece', '[A rediger]', 0),
(16, 'Paiement Paypal', '[A rediger]', 1),
(17, 'Sujet paiement', '[A rediger]', 1),
(18, 'Message Catégorie', 'message catégorie', 1),
(19, 'Sujet Catégorie', 'sujet catégorie', 1),
(20, 'Message propriétaire inscripti', 'message propriétaire inscription', 1),
(21, 'Sujet propriétaire inscription', 'Sujet propriétaire inscription', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

--
-- Contenu de la table `GroupSaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(156, 13, 543, 545, NULL, NULL, NULL, NULL, NULL, NULL, 543, 19),
(157, 14, 489, 495, 500, 501, 505, NULL, NULL, NULL, 489, 20),
(158, 15, 516, 518, 520, 521, 523, NULL, NULL, NULL, 516, 20),
(159, 16, 528, 531, 534, 537, 540, NULL, NULL, NULL, 528, 20),
(160, 17, 542, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 542, 20),
(161, 13, 491, 492, 493, 498, 499, NULL, NULL, NULL, 491, 21),
(162, 14, 506, 508, 509, 514, 515, NULL, NULL, NULL, 506, 21),
(163, 15, 517, 522, 525, 526, 527, NULL, NULL, NULL, 517, 21),
(164, 16, 536, 539, 546, NULL, NULL, NULL, NULL, NULL, 536, 21);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2616 ;

--
-- Contenu de la table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(2541, 7, 0, 'Suppression de toute l''année précédente.', 'Suppression', '2015-12-10', '18:30:40'),
(2542, 7, 488, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2543, 7, 489, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2544, 7, 490, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2545, 7, 491, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2546, 7, 492, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2547, 7, 493, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2548, 7, 494, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2549, 7, 495, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2550, 7, 496, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2551, 7, 497, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2552, 7, 498, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2553, 7, 499, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2554, 7, 500, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2555, 7, 501, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2556, 7, 502, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2557, 7, 503, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2558, 7, 504, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2559, 7, 505, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2560, 7, 506, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2561, 7, 507, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2562, 7, 508, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2563, 7, 509, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2564, 7, 510, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2565, 7, 511, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2566, 7, 512, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2567, 7, 513, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2568, 7, 514, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2569, 7, 515, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2570, 7, 516, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2571, 7, 517, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2572, 7, 518, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2573, 7, 519, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2574, 7, 520, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2575, 7, 521, 'Equipe', 'Ajout', '2015-12-09', '23:53:14'),
(2576, 7, 522, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2577, 7, 523, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2578, 7, 524, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2579, 7, 525, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2580, 7, 526, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2581, 7, 527, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2582, 7, 528, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2583, 7, 529, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2584, 7, 530, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2585, 7, 531, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2586, 7, 532, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2587, 7, 533, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2588, 7, 534, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2589, 7, 535, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2590, 7, 536, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2591, 7, 537, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2592, 7, 538, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2593, 7, 539, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2594, 7, 540, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2595, 7, 541, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2596, 7, 542, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2597, 7, 543, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2598, 7, 544, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2599, 7, 545, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2600, 7, 546, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2601, 7, 547, 'Equipe', 'Ajout', '2015-12-09', '23:53:15'),
(2602, 7, 156, 'Poules (Samedi - Junior)', 'Ajout', '2015-12-09', '23:53:26'),
(2603, 7, 157, 'Poules (Samedi - Seniors)', 'Ajout', '2015-12-09', '23:53:26'),
(2604, 7, 158, 'Poules (Samedi - Seniors)', 'Ajout', '2015-12-09', '23:53:26'),
(2605, 7, 159, 'Poules (Samedi - Seniors)', 'Ajout', '2015-12-09', '23:53:26'),
(2606, 7, 160, 'Poules (Samedi - Seniors)', 'Ajout', '2015-12-09', '23:53:26'),
(2607, 7, 161, 'Poules (Samedi - Elites)', 'Ajout', '2015-12-09', '23:53:26'),
(2608, 7, 162, 'Poules (Samedi - Elites)', 'Ajout', '2015-12-09', '23:53:26'),
(2609, 7, 163, 'Poules (Samedi - Elites)', 'Ajout', '2015-12-09', '23:53:26'),
(2610, 7, 164, 'Poules (Samedi - Elites)', 'Ajout', '2015-12-09', '23:53:26'),
(2611, 70, 962, 'Joueur', 'Ajout', '2015-12-11', '03:09:10'),
(2612, 70, 1376, 'Match', 'Edition', '2015-12-11', '03:15:20'),
(2613, 70, 964, 'Joueur', 'Ajout', '2015-12-11', '03:27:58'),
(2614, 70, 971, 'Joueur', 'Ajout', '2015-12-11', '03:39:56'),
(2615, 70, 972, 'Joueur', 'Ajout', '2015-12-11', '03:39:56');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1440 ;

--
-- Contenu de la table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(1376, '2015-12-16', '08:30', 543, 545, 0, 0, 13, 156),
(1377, '2015-12-09', '08:30', 489, 495, 0, 0, 14, 157),
(1378, '2015-12-09', '08:30', 489, 500, 0, 0, 14, 157),
(1379, '2015-12-09', '08:30', 489, 501, 0, 0, 14, 157),
(1380, '2015-12-09', '08:30', 489, 505, 0, 0, 14, 157),
(1381, '2015-12-09', '08:30', 495, 500, 0, 0, 14, 157),
(1382, '2015-12-09', '08:30', 495, 501, 0, 0, 14, 157),
(1383, '2015-12-09', '08:30', 495, 505, 0, 0, 14, 157),
(1384, '2015-12-09', '08:30', 500, 501, 0, 0, 14, 157),
(1385, '2015-12-09', '08:30', 500, 505, 0, 0, 14, 157),
(1386, '2015-12-09', '08:30', 501, 505, 0, 0, 14, 157),
(1387, '2015-12-09', '08:30', 516, 518, 0, 0, 15, 158),
(1388, '2015-12-09', '08:30', 516, 520, 0, 0, 15, 158),
(1389, '2015-12-09', '08:30', 516, 521, 0, 0, 15, 158),
(1390, '2015-12-09', '08:30', 516, 523, 0, 0, 15, 158),
(1391, '2015-12-09', '08:30', 518, 520, 0, 0, 15, 158),
(1392, '2015-12-09', '08:30', 518, 521, 0, 0, 15, 158),
(1393, '2015-12-09', '08:30', 518, 523, 0, 0, 15, 158),
(1394, '2015-12-09', '08:30', 520, 521, 0, 0, 15, 158),
(1395, '2015-12-09', '08:30', 520, 523, 0, 0, 15, 158),
(1396, '2015-12-09', '08:30', 521, 523, 0, 0, 15, 158),
(1397, '2015-12-09', '08:30', 528, 531, 0, 0, 16, 159),
(1398, '2015-12-09', '08:30', 528, 534, 0, 0, 16, 159),
(1399, '2015-12-09', '08:30', 528, 537, 0, 0, 16, 159),
(1400, '2015-12-09', '08:30', 528, 540, 0, 0, 16, 159),
(1401, '2015-12-09', '08:30', 531, 534, 0, 0, 16, 159),
(1402, '2015-12-09', '08:30', 531, 537, 0, 0, 16, 159),
(1403, '2015-12-09', '08:30', 531, 540, 0, 0, 16, 159),
(1404, '2015-12-09', '08:30', 534, 537, 0, 0, 16, 159),
(1405, '2015-12-09', '08:30', 534, 540, 0, 0, 16, 159),
(1406, '2015-12-09', '08:30', 537, 540, 0, 0, 16, 159),
(1407, '2015-12-09', '08:30', 491, 492, 0, 0, 13, 161),
(1408, '2015-12-09', '08:30', 491, 493, 0, 0, 13, 161),
(1409, '2015-12-09', '08:30', 491, 498, 0, 0, 13, 161),
(1410, '2015-12-09', '08:30', 491, 499, 0, 0, 13, 161),
(1411, '2015-12-09', '08:30', 492, 493, 0, 0, 13, 161),
(1412, '2015-12-09', '08:30', 492, 498, 0, 0, 13, 161),
(1413, '2015-12-09', '08:30', 492, 499, 0, 0, 13, 161),
(1414, '2015-12-09', '08:30', 493, 498, 0, 0, 13, 161),
(1415, '2015-12-09', '08:30', 493, 499, 0, 0, 13, 161),
(1416, '2015-12-09', '08:30', 498, 499, 0, 0, 13, 161),
(1417, '2015-12-09', '08:30', 506, 508, 0, 0, 14, 162),
(1418, '2015-12-09', '08:30', 506, 509, 0, 0, 14, 162),
(1419, '2015-12-09', '08:30', 506, 514, 0, 0, 14, 162),
(1420, '2015-12-09', '08:30', 506, 515, 0, 0, 14, 162),
(1421, '2015-12-09', '08:30', 508, 509, 0, 0, 14, 162),
(1422, '2015-12-09', '08:30', 508, 514, 0, 0, 14, 162),
(1423, '2015-12-09', '08:30', 508, 515, 0, 0, 14, 162),
(1424, '2015-12-09', '08:30', 509, 514, 0, 0, 14, 162),
(1425, '2015-12-09', '08:30', 509, 515, 0, 0, 14, 162),
(1426, '2015-12-09', '08:30', 514, 515, 0, 0, 14, 162),
(1427, '2015-12-09', '08:30', 517, 522, 0, 0, 15, 163),
(1428, '2015-12-09', '08:30', 517, 525, 0, 0, 15, 163),
(1429, '2015-12-09', '08:30', 517, 526, 0, 0, 15, 163),
(1430, '2015-12-09', '08:30', 517, 527, 0, 0, 15, 163),
(1431, '2015-12-09', '08:30', 522, 525, 0, 0, 15, 163),
(1432, '2015-12-09', '08:30', 522, 526, 0, 0, 15, 163),
(1433, '2015-12-09', '08:30', 522, 527, 0, 0, 15, 163),
(1434, '2015-12-09', '08:30', 525, 526, 0, 0, 15, 163),
(1435, '2015-12-09', '08:30', 525, 527, 0, 0, 15, 163),
(1436, '2015-12-09', '08:30', 526, 527, 0, 0, 15, 163),
(1437, '2015-12-09', '08:30', 536, 539, 0, 0, 16, 164),
(1438, '2015-12-09', '08:30', 536, 546, 0, 0, 16, 164),
(1439, '2015-12-09', '08:30', 539, 546, 0, 0, 16, 164);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `Owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7),
(23, 1095, 7);

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
  `PhoneNumber` varchar(20) NOT NULL,
  `GSMNumber` varchar(20) NOT NULL,
  `BirthDate` date NOT NULL,
  `Mail` varchar(500) NOT NULL,
  `CreationDate` date NOT NULL,
  `Note` varchar(500) NOT NULL,
  `IsPlayer` tinyint(1) NOT NULL,
  `IsOwner` tinyint(1) NOT NULL,
  `IsStaff` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1096 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, '413257954', '2147483647', '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, '0', '635434770', '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(109, 2, 'Sarah', 'Croche', 'Annecy', 78000, 'Avenue du halo', 0, '9', '689898989', '1945-01-01', 'c.s@gmail.fr', '2015-11-11', '', 0, 1, 0),
(116, 1, 'Gérard', 'Remangagner', 'Marseille', 13000, '78 avenue de la défaite', 0, '0', '7', '1960-06-06', 'r.g@gmail.be', '2015-11-11', '', 0, 1, 0),
(971, 0, 'LawL', 'Mii', 'Yeah', 6510, 'Koko', 1, '0', '2147483647', '1990-02-04', 'mitsuko.lawl@gmail.com', '2015-12-09', '', 0, 1, 0),
(972, 0, 'Hugo', 'Pellerin', 'Ville0', 1000, 'Rue0', 1, '600000000', '600000000', '1972-01-01', 'Hugo.Pellerin@mail.com', '2015-12-09', '', 1, 0, 0),
(973, 0, 'Tristan', 'Olivier', 'Ville1', 1000, 'Rue1', 1, '600000000', '600000000', '1997-01-01', 'Tristan.Olivier@mail.com', '2015-12-09', '', 1, 0, 0),
(974, 0, 'Samuel', 'Bélanger', 'Ville2', 1000, 'Rue2', 1, '600000000', '600000000', '1981-01-01', 'Samuel.Bélanger@mail.com', '2015-12-09', '', 1, 0, 0),
(975, 1, 'Tommy', 'Desmarais', 'Ville3', 1000, 'Rue3', 1, '600000000', '600000000', '1983-01-01', 'Tommy.Desmarais@mail.com', '2015-12-09', '', 1, 0, 0),
(976, 0, 'Charles', 'Pellerin', 'Ville4', 1000, 'Rue4', 1, '600000000', '600000000', '1993-01-01', 'Charles.Pellerin@mail.com', '2015-12-09', '', 1, 0, 0),
(977, 0, 'Raphaël', 'Paquette', 'Ville5', 1000, 'Rue5', 1, '600000000', '600000000', '1988-01-01', 'Raphaël.Paquette@mail.com', '2015-12-09', '', 1, 0, 0),
(978, 0, 'Logan', 'Desmarais', 'Ville6', 1000, 'Rue6', 1, '600000000', '600000000', '1969-01-01', 'Logan.Desmarais@mail.com', '2015-12-09', '', 1, 0, 0),
(979, 1, 'Julien', 'Papineau', 'Ville7', 1000, 'Rue7', 1, '600000000', '600000000', '1964-01-01', 'Julien.Papineau@mail.com', '2015-12-09', '', 1, 0, 0),
(980, 1, 'Christopher', 'Ratté', 'Ville8', 1000, 'Rue8', 1, '600000000', '600000000', '1976-01-01', 'Christopher.Ratté@mail.com', '2015-12-09', '', 1, 0, 0),
(981, 0, 'Dylan', 'Bourgault', 'Ville9', 1000, 'Rue9', 1, '600000000', '600000000', '1967-01-01', 'Dylan.Bourgault@mail.com', '2015-12-09', '', 1, 0, 0),
(982, 0, 'Samuel', 'Bergeron', 'Ville10', 1000, 'Rue10', 1, '600000000', '600000000', '1985-01-01', 'Samuel.Bergeron@mail.com', '2015-12-09', '', 1, 0, 0),
(983, 1, 'Alex', 'Lavoie', 'Ville11', 1000, 'Rue11', 1, '600000000', '600000000', '1972-01-01', 'Alex.Lavoie@mail.com', '2015-12-09', '', 1, 0, 0),
(984, 1, 'Olivier', 'Gauthier', 'Ville12', 1000, 'Rue12', 1, '600000000', '600000000', '1980-01-01', 'Olivier.Gauthier@mail.com', '2015-12-09', '', 1, 0, 0),
(985, 1, 'Jonathan', 'Simard', 'Ville13', 1000, 'Rue13', 1, '600000000', '600000000', '1966-01-01', 'Jonathan.Simard@mail.com', '2015-12-09', '', 1, 0, 0),
(986, 0, 'Isaac', 'Nolet', 'Ville14', 1000, 'Rue14', 1, '600000000', '600000000', '1983-01-01', 'Isaac.Nolet@mail.com', '2015-12-09', '', 1, 0, 0),
(987, 1, 'Ludovic', 'Bouchard', 'Ville15', 1000, 'Rue15', 1, '600000000', '600000000', '1977-01-01', 'Ludovic.Bouchard@mail.com', '2015-12-09', '', 1, 0, 0),
(988, 0, 'David', 'Gauthier', 'Ville16', 1000, 'Rue16', 1, '600000000', '600000000', '1983-01-01', 'David.Gauthier@mail.com', '2015-12-09', '', 1, 0, 0),
(989, 0, 'Anthony', 'Pelletier', 'Ville17', 1000, 'Rue17', 1, '600000000', '600000000', '1995-01-01', 'Anthony.Pelletier@mail.com', '2015-12-09', '', 1, 0, 0),
(990, 1, 'Justin', 'Laberge', 'Ville18', 1000, 'Rue18', 1, '600000000', '600000000', '1972-01-01', 'Justin.Laberge@mail.com', '2015-12-09', '', 1, 0, 0),
(991, 1, 'Alexis', 'Paquette', 'Ville19', 1000, 'Rue19', 1, '600000000', '600000000', '1974-01-01', 'Alexis.Paquette@mail.com', '2015-12-09', '', 1, 0, 0),
(992, 0, 'Noah', 'Poliquin', 'Ville20', 1000, 'Rue20', 1, '600000000', '600000000', '1991-01-01', 'Noah.Poliquin@mail.com', '2015-12-09', '', 1, 0, 0),
(993, 1, 'Adam', 'Olivier', 'Ville21', 1000, 'Rue21', 1, '600000000', '600000000', '1967-01-01', 'Adam.Olivier@mail.com', '2015-12-09', '', 1, 0, 0),
(994, 0, 'Olivier', 'Bourgault', 'Ville22', 1000, 'Rue22', 1, '600000000', '600000000', '1981-01-01', 'Olivier.Bourgault@mail.com', '2015-12-09', '', 1, 0, 0),
(995, 1, 'Léo', 'Généreux', 'Ville23', 1000, 'Rue23', 1, '600000000', '600000000', '1960-01-01', 'Léo.Généreux@mail.com', '2015-12-09', '', 1, 0, 0),
(996, 0, 'Julien', 'Côté', 'Ville24', 1000, 'Rue24', 1, '600000000', '600000000', '1989-01-01', 'Julien.Côté@mail.com', '2015-12-09', '', 1, 0, 0),
(997, 1, 'Cédric', 'Ranger', 'Ville25', 1000, 'Rue25', 1, '600000000', '600000000', '1975-01-01', 'Cédric.Ranger@mail.com', '2015-12-09', '', 1, 0, 0),
(998, 1, 'Mathieu', 'Métivier', 'Ville26', 1000, 'Rue26', 1, '600000000', '600000000', '1991-01-01', 'Mathieu.Métivier@mail.com', '2015-12-09', '', 1, 0, 0),
(999, 0, 'Thomas', 'Leboeuf', 'Ville27', 1000, 'Rue27', 1, '600000000', '600000000', '2002-01-01', 'Thomas.Leboeuf@mail.com', '2015-12-09', '', 1, 0, 0),
(1000, 1, 'Thomas', 'Paquette', 'Ville28', 1000, 'Rue28', 1, '600000000', '600000000', '1967-01-01', 'Thomas.Paquette@mail.com', '2015-12-09', '', 1, 0, 0),
(1001, 1, 'Hugo', 'Patenaude', 'Ville29', 1000, 'Rue29', 1, '600000000', '600000000', '1969-01-01', 'Hugo.Patenaude@mail.com', '2015-12-09', '', 1, 0, 0),
(1002, 1, 'Justin', 'Chan', 'Ville30', 1000, 'Rue30', 1, '600000000', '600000000', '2000-01-01', 'Justin.Chan@mail.com', '2015-12-09', '', 1, 0, 0),
(1003, 1, 'Logan', 'Généreux', 'Ville31', 1000, 'Rue31', 1, '600000000', '600000000', '1987-01-01', 'Logan.Généreux@mail.com', '2015-12-09', '', 1, 0, 0),
(1004, 1, 'Victor', 'Fradette', 'Ville32', 1000, 'Rue32', 1, '600000000', '600000000', '1999-01-01', 'Victor.Fradette@mail.com', '2015-12-09', '', 1, 0, 0),
(1005, 1, 'Anthony', 'Larrivée', 'Ville33', 1000, 'Rue33', 1, '600000000', '600000000', '1995-01-01', 'Anthony.Larrivée@mail.com', '2015-12-09', '', 1, 0, 0),
(1006, 1, 'Noah', 'Pelletier', 'Ville34', 1000, 'Rue34', 1, '600000000', '600000000', '2001-01-01', 'Noah.Pelletier@mail.com', '2015-12-09', '', 1, 0, 0),
(1007, 0, 'Émile', 'Lévesque', 'Ville35', 1000, 'Rue35', 1, '600000000', '600000000', '1986-01-01', 'Émile.Lévesque@mail.com', '2015-12-09', '', 1, 0, 0),
(1008, 1, 'Elliot', 'Pelletier', 'Ville36', 1000, 'Rue36', 1, '600000000', '600000000', '1981-01-01', 'Elliot.Pelletier@mail.com', '2015-12-09', '', 1, 0, 0),
(1009, 0, 'Simon', 'Ratté', 'Ville37', 1000, 'Rue37', 1, '600000000', '600000000', '1964-01-01', 'Simon.Ratté@mail.com', '2015-12-09', '', 1, 0, 0),
(1010, 1, 'Charles', 'Bélanger', 'Ville38', 1000, 'Rue38', 1, '600000000', '600000000', '2000-01-01', 'Charles.Bélanger@mail.com', '2015-12-09', '', 1, 0, 0),
(1011, 1, 'David', 'Poliquin', 'Ville39', 1000, 'Rue39', 1, '600000000', '600000000', '1982-01-01', 'David.Poliquin@mail.com', '2015-12-09', '', 1, 0, 0),
(1012, 0, 'Lucas', 'Masson', 'Ville40', 1000, 'Rue40', 1, '600000000', '600000000', '1966-01-01', 'Lucas.Masson@mail.com', '2015-12-09', '', 1, 0, 0),
(1013, 1, 'Elliot', 'Poliquin', 'Ville41', 1000, 'Rue41', 1, '600000000', '600000000', '1992-01-01', 'Elliot.Poliquin@mail.com', '2015-12-09', '', 1, 0, 0),
(1014, 0, 'Charles', 'Bourgault', 'Ville42', 1000, 'Rue42', 1, '600000000', '600000000', '1980-01-01', 'Charles.Bourgault@mail.com', '2015-12-09', '', 1, 0, 0),
(1015, 1, 'Mathis', 'Lévesque', 'Ville43', 1000, 'Rue43', 1, '600000000', '600000000', '1969-01-01', 'Mathis.Lévesque@mail.com', '2015-12-09', '', 1, 0, 0),
(1016, 0, 'Antoine', 'Desmarais', 'Ville44', 1000, 'Rue44', 1, '600000000', '600000000', '1960-01-01', 'Antoine.Desmarais@mail.com', '2015-12-09', '', 1, 0, 0),
(1017, 0, 'Jonathan', 'Bouchard', 'Ville45', 1000, 'Rue45', 1, '600000000', '600000000', '1995-01-01', 'Jonathan.Bouchard@mail.com', '2015-12-09', '', 1, 0, 0),
(1018, 1, 'Jérémy', 'Sénéchal', 'Ville46', 1000, 'Rue46', 1, '600000000', '600000000', '1962-01-01', 'Jérémy.Sénéchal@mail.com', '2015-12-09', '', 1, 0, 0),
(1019, 1, 'Charles', 'Brousseau', 'Ville47', 1000, 'Rue47', 1, '600000000', '600000000', '1966-01-01', 'Charles.Brousseau@mail.com', '2015-12-09', '', 1, 0, 0),
(1020, 0, 'Raphaël', 'Latreille', 'Ville48', 1000, 'Rue48', 1, '600000000', '600000000', '2005-01-01', 'Raphaël.Latreille@mail.com', '2015-12-09', '', 1, 0, 0),
(1021, 0, 'Tristan', 'Lagacé', 'Ville49', 1000, 'Rue49', 1, '600000000', '600000000', '1990-01-01', 'Tristan.Lagacé@mail.com', '2015-12-09', '', 1, 0, 0),
(1022, 0, 'Christopher', 'Barbeau', 'Ville50', 1000, 'Rue50', 1, '600000000', '600000000', '1996-01-01', 'Christopher.Barbeau@mail.com', '2015-12-09', '', 1, 0, 0),
(1023, 0, 'Samuel', 'Alarie', 'Ville51', 1000, 'Rue51', 1, '600000000', '600000000', '1999-01-01', 'Samuel.Alarie@mail.com', '2015-12-09', '', 1, 0, 0),
(1024, 0, 'Félix', 'Chan', 'Ville52', 1000, 'Rue52', 1, '600000000', '600000000', '1971-01-01', 'Félix.Chan@mail.com', '2015-12-09', '', 1, 0, 0),
(1025, 1, 'Jacob', 'Bossé', 'Ville53', 1000, 'Rue53', 1, '600000000', '600000000', '1992-01-01', 'Jacob.Bossé@mail.com', '2015-12-09', '', 1, 0, 0),
(1026, 1, 'Antoine', 'Nolet', 'Ville54', 1000, 'Rue54', 1, '600000000', '600000000', '1992-01-01', 'Antoine.Nolet@mail.com', '2015-12-09', '', 1, 0, 0),
(1027, 0, 'Simon', 'Masson', 'Ville55', 1000, 'Rue55', 1, '600000000', '600000000', '1964-01-01', 'Simon.Masson@mail.com', '2015-12-09', '', 1, 0, 0),
(1028, 1, 'Alexis', 'Sauvé', 'Ville56', 1000, 'Rue56', 1, '600000000', '600000000', '1994-01-01', 'Alexis.Sauvé@mail.com', '2015-12-09', '', 1, 0, 0),
(1029, 0, 'Anthony', 'Latreille', 'Ville57', 1000, 'Rue57', 1, '600000000', '600000000', '1998-01-01', 'Anthony.Latreille@mail.com', '2015-12-09', '', 1, 0, 0),
(1030, 0, 'Thomas', 'Major', 'Ville58', 1000, 'Rue58', 1, '600000000', '600000000', '1977-01-01', 'Thomas.Major@mail.com', '2015-12-09', '', 1, 0, 0),
(1031, 1, 'Louis', 'Bourgeois', 'Ville59', 1000, 'Rue59', 1, '600000000', '600000000', '1973-01-01', 'Louis.Bourgeois@mail.com', '2015-12-09', '', 1, 0, 0),
(1032, 1, 'Nathan', 'Larrivée', 'Ville60', 1000, 'Rue60', 1, '600000000', '600000000', '1990-01-01', 'Nathan.Larrivée@mail.com', '2015-12-09', '', 1, 0, 0),
(1033, 0, 'Thomas', 'Sauvé', 'Ville61', 1000, 'Rue61', 1, '600000000', '600000000', '1997-01-01', 'Thomas.Sauvé@mail.com', '2015-12-09', '', 1, 0, 0),
(1034, 0, 'Tommy', 'Laurin', 'Ville62', 1000, 'Rue62', 1, '600000000', '600000000', '1999-01-01', 'Tommy.Laurin@mail.com', '2015-12-09', '', 1, 0, 0),
(1035, 0, 'Malik', 'Papineau', 'Ville63', 1000, 'Rue63', 1, '600000000', '600000000', '1960-01-01', 'Malik.Papineau@mail.com', '2015-12-09', '', 1, 0, 0),
(1036, 1, 'Michaël', 'Grenon', 'Ville64', 1000, 'Rue64', 1, '600000000', '600000000', '1998-01-01', 'Michaël.Grenon@mail.com', '2015-12-09', '', 1, 0, 0),
(1037, 0, 'Samuel', 'Fortin', 'Ville65', 1000, 'Rue65', 1, '600000000', '600000000', '1986-01-01', 'Samuel.Fortin@mail.com', '2015-12-09', '', 1, 0, 0),
(1038, 1, 'David', 'Briand', 'Ville66', 1000, 'Rue66', 1, '600000000', '600000000', '1985-01-01', 'David.Briand@mail.com', '2015-12-09', '', 1, 0, 0),
(1039, 0, 'Simon', 'Fradette', 'Ville67', 1000, 'Rue67', 1, '600000000', '600000000', '2003-01-01', 'Simon.Fradette@mail.com', '2015-12-09', '', 1, 0, 0),
(1040, 0, 'Léo', 'Major', 'Ville68', 1000, 'Rue68', 1, '600000000', '600000000', '1964-01-01', 'Léo.Major@mail.com', '2015-12-09', '', 1, 0, 0),
(1041, 1, 'Cédric', 'Masson', 'Ville69', 1000, 'Rue69', 1, '600000000', '600000000', '1991-01-01', 'Cédric.Masson@mail.com', '2015-12-09', '', 1, 0, 0),
(1042, 1, 'Philippe', 'Larochelle', 'Ville70', 1000, 'Rue70', 1, '600000000', '600000000', '1975-01-01', 'Philippe.Larochelle@mail.com', '2015-12-09', '', 1, 0, 0),
(1043, 0, 'Vincent', 'Desmarais', 'Ville71', 1000, 'Rue71', 1, '600000000', '600000000', '1992-01-01', 'Vincent.Desmarais@mail.com', '2015-12-09', '', 1, 0, 0),
(1044, 1, 'Lucas', 'Bourgault', 'Ville72', 1000, 'Rue72', 1, '600000000', '600000000', '1997-01-01', 'Lucas.Bourgault@mail.com', '2015-12-09', '', 1, 0, 0),
(1045, 1, 'Vincent', 'Ouellet', 'Ville73', 1000, 'Rue73', 1, '600000000', '600000000', '2004-01-01', 'Vincent.Ouellet@mail.com', '2015-12-09', '', 1, 0, 0),
(1046, 1, 'Christopher', 'Bourgault', 'Ville74', 1000, 'Rue74', 1, '600000000', '600000000', '1986-01-01', 'Christopher.Bourgault@mail.com', '2015-12-09', '', 1, 0, 0),
(1047, 0, 'Philippe', 'Bourgault', 'Ville75', 1000, 'Rue75', 1, '600000000', '600000000', '1961-01-01', 'Philippe.Bourgault@mail.com', '2015-12-09', '', 1, 0, 0),
(1048, 1, 'Philippe', 'Simard', 'Ville76', 1000, 'Rue76', 1, '600000000', '600000000', '1997-01-01', 'Philippe.Simard@mail.com', '2015-12-09', '', 1, 0, 0),
(1049, 0, 'Adam', 'Fortin', 'Ville77', 1000, 'Rue77', 1, '600000000', '600000000', '1972-01-01', 'Adam.Fortin@mail.com', '2015-12-09', '', 1, 0, 0),
(1050, 0, 'Maxime', 'Laberge', 'Ville78', 1000, 'Rue78', 1, '600000000', '600000000', '1970-01-01', 'Maxime.Laberge@mail.com', '2015-12-09', '', 1, 0, 0),
(1051, 1, 'Christopher', 'Grenon', 'Ville79', 1000, 'Rue79', 1, '600000000', '600000000', '1999-01-01', 'Christopher.Grenon@mail.com', '2015-12-09', '', 1, 0, 0),
(1052, 0, 'Benjamin', 'Latreille', 'Ville80', 1000, 'Rue80', 1, '600000000', '600000000', '1995-01-01', 'Benjamin.Latreille@mail.com', '2015-12-09', '', 1, 0, 0),
(1053, 1, 'Anthony', 'Brousseau', 'Ville81', 1000, 'Rue81', 1, '600000000', '600000000', '1999-01-01', 'Anthony.Brousseau@mail.com', '2015-12-09', '', 1, 0, 0),
(1054, 1, 'Hugo', 'Morin', 'Ville82', 1000, 'Rue82', 1, '600000000', '600000000', '1967-01-01', 'Hugo.Morin@mail.com', '2015-12-09', '', 1, 0, 0),
(1055, 1, 'Jonathan', 'Métivier', 'Ville83', 1000, 'Rue83', 1, '600000000', '600000000', '1971-01-01', 'Jonathan.Métivier@mail.com', '2015-12-09', '', 1, 0, 0),
(1056, 0, 'Julien', 'Boissonneault', 'Ville84', 1000, 'Rue84', 1, '600000000', '600000000', '1979-01-01', 'Julien.Boissonneault@mail.com', '2015-12-09', '', 1, 0, 0),
(1057, 0, 'Raphaël', 'Major', 'Ville85', 1000, 'Rue85', 1, '600000000', '600000000', '1981-01-01', 'Raphaël.Major@mail.com', '2015-12-09', '', 1, 0, 0),
(1058, 0, 'Louis', 'Chan', 'Ville86', 1000, 'Rue86', 1, '600000000', '600000000', '1983-01-01', 'Louis.Chan@mail.com', '2015-12-09', '', 1, 0, 0),
(1059, 1, 'Dylan', 'Poliquin', 'Ville87', 1000, 'Rue87', 1, '600000000', '600000000', '1985-01-01', 'Dylan.Poliquin@mail.com', '2015-12-09', '', 1, 0, 0),
(1060, 0, 'Anthony', 'Boucher', 'Ville88', 1000, 'Rue88', 1, '600000000', '600000000', '1973-01-01', 'Anthony.Boucher@mail.com', '2015-12-09', '', 1, 0, 0),
(1061, 0, 'Justin', 'Leboeuf', 'Ville89', 1000, 'Rue89', 1, '600000000', '600000000', '1974-01-01', 'Justin.Leboeuf@mail.com', '2015-12-09', '', 1, 0, 0),
(1062, 1, 'Olivier', 'Poliquin', 'Ville90', 1000, 'Rue90', 1, '600000000', '600000000', '1969-01-01', 'Olivier.Poliquin@mail.com', '2015-12-09', '', 1, 0, 0),
(1063, 1, 'Adam', 'Boissonneault', 'Ville91', 1000, 'Rue91', 1, '600000000', '600000000', '1964-01-01', 'Adam.Boissonneault@mail.com', '2015-12-09', '', 1, 0, 0),
(1064, 0, 'Adam', 'Généreux', 'Ville92', 1000, 'Rue92', 1, '600000000', '600000000', '1991-01-01', 'Adam.Généreux@mail.com', '2015-12-09', '', 1, 0, 0),
(1065, 1, 'Antoine', 'Samson', 'Ville93', 1000, 'Rue93', 1, '600000000', '600000000', '2002-01-01', 'Antoine.Samson@mail.com', '2015-12-09', '', 1, 0, 0),
(1066, 0, 'Maxime', 'Leblanc', 'Ville94', 1000, 'Rue94', 1, '600000000', '600000000', '2000-01-01', 'Maxime.Leblanc@mail.com', '2015-12-09', '', 1, 0, 0),
(1067, 0, 'Cédric', 'Brault', 'Ville95', 1000, 'Rue95', 1, '600000000', '600000000', '2005-01-01', 'Cédric.Brault@mail.com', '2015-12-09', '', 1, 0, 0),
(1068, 1, 'Hugo', 'Boucher', 'Ville96', 1000, 'Rue96', 1, '600000000', '600000000', '1962-01-01', 'Hugo.Boucher@mail.com', '2015-12-09', '', 1, 0, 0),
(1069, 0, 'Jacob', 'Lépine', 'Ville97', 1000, 'Rue97', 1, '600000000', '600000000', '2003-01-01', 'Jacob.Lépine@mail.com', '2015-12-09', '', 1, 0, 0),
(1070, 1, 'Justin', 'Leblanc', 'Ville98', 1000, 'Rue98', 1, '600000000', '600000000', '1989-01-01', 'Justin.Leblanc@mail.com', '2015-12-09', '', 1, 0, 0),
(1071, 0, 'Mathieu', 'Chan', 'Ville99', 1000, 'Rue99', 1, '600000000', '600000000', '1988-01-01', 'Mathieu.Chan@mail.com', '2015-12-09', '', 1, 0, 0),
(1072, 0, 'Thomas', 'Pellerin', 'Ville100', 1000, 'Rue100', 1, '600000000', '600000000', '1974-01-01', 'Thomas.Pellerin@mail.com', '2015-12-09', '', 1, 0, 0),
(1073, 0, 'Samuel', 'Bossé', 'Ville101', 1000, 'Rue101', 1, '600000000', '600000000', '1972-01-01', 'Samuel.Bossé@mail.com', '2015-12-09', '', 1, 0, 0),
(1074, 1, 'Benjamin', 'Paquette', 'Ville102', 1000, 'Rue102', 1, '600000000', '600000000', '1965-01-01', 'Benjamin.Paquette@mail.com', '2015-12-09', '', 1, 0, 0),
(1075, 0, 'Isaac', 'Gagnon', 'Ville103', 1000, 'Rue103', 1, '600000000', '600000000', '1980-01-01', 'Isaac.Gagnon@mail.com', '2015-12-09', '', 1, 0, 0),
(1076, 1, 'Isaac', 'Gagnon', 'Ville104', 1000, 'Rue104', 1, '600000000', '600000000', '1982-01-01', 'Isaac.Gagnon@mail.com', '2015-12-09', '', 1, 0, 0),
(1077, 0, 'Alexis', 'Miller', 'Ville105', 1000, 'Rue105', 1, '600000000', '600000000', '1999-01-01', 'Alexis.Miller@mail.com', '2015-12-09', '', 1, 0, 0),
(1078, 0, 'Logan', 'Brousseau', 'Ville106', 1000, 'Rue106', 1, '600000000', '600000000', '2004-01-01', 'Logan.Brousseau@mail.com', '2015-12-09', '', 1, 0, 0),
(1079, 0, 'Logan', 'Larrivée', 'Ville107', 1000, 'Rue107', 1, '600000000', '600000000', '1962-01-01', 'Logan.Larrivée@mail.com', '2015-12-09', '', 1, 0, 0),
(1080, 0, 'Elliot', 'Nolet', 'Ville108', 1000, 'Rue108', 1, '600000000', '600000000', '1982-01-01', 'Elliot.Nolet@mail.com', '2015-12-09', '', 1, 0, 0),
(1081, 1, 'Vincent', 'Bélanger', 'Ville109', 1000, 'Rue109', 1, '600000000', '600000000', '1981-01-01', 'Vincent.Bélanger@mail.com', '2015-12-09', '', 1, 0, 0),
(1082, 1, 'Maxime', 'Laberge', 'Ville110', 1000, 'Rue110', 1, '600000000', '600000000', '1996-01-01', 'Maxime.Laberge@mail.com', '2015-12-09', '', 1, 0, 0),
(1083, 0, 'Édouard', 'Pelletier', 'Ville111', 1000, 'Rue111', 1, '600000000', '600000000', '2003-01-01', 'Édouard.Pelletier@mail.com', '2015-12-09', '', 1, 0, 0),
(1084, 1, 'Vincent', 'Vallières', 'Ville112', 1000, 'Rue112', 1, '600000000', '600000000', '1996-01-01', 'Vincent.Vallières@mail.com', '2015-12-09', '', 1, 0, 0),
(1085, 1, 'Tommy', 'Sénéchal', 'Ville113', 1000, 'Rue113', 1, '600000000', '600000000', '1978-01-01', 'Tommy.Sénéchal@mail.com', '2015-12-09', '', 1, 0, 0),
(1086, 1, 'Christopher', 'Grenon', 'Ville114', 1000, 'Rue114', 1, '600000000', '600000000', '2000-01-01', 'Christopher.Grenon@mail.com', '2015-12-09', '', 1, 0, 0),
(1087, 0, 'Noah', 'Gouin', 'Ville115', 1000, 'Rue115', 1, '600000000', '600000000', '1996-01-01', 'Noah.Gouin@mail.com', '2015-12-09', '', 1, 0, 0),
(1088, 0, 'Jonathan', 'Métivier', 'Ville116', 1000, 'Rue116', 1, '600000000', '600000000', '1976-01-01', 'Jonathan.Métivier@mail.com', '2015-12-09', '', 1, 0, 0),
(1089, 1, 'David', 'Pedneault', 'Ville117', 1000, 'Rue117', 1, '600000000', '600000000', '1970-01-01', 'David.Pedneault@mail.com', '2015-12-09', '', 1, 0, 0),
(1090, 0, 'Lucas', 'Girard', 'Ville118', 1000, 'Rue118', 1, '600000000', '600000000', '1984-01-01', 'Lucas.Girard@mail.com', '2015-12-09', '', 1, 0, 0),
(1091, 0, 'Alexis', 'Sauvé', 'Ville119', 1000, 'Rue119', 1, '600000000', '600000000', '1999-01-01', 'Alexis.Sauvé@mail.com', '2015-12-09', '', 1, 0, 0),
(1092, 0, 'LawL', 'Mii', 'Yeah', 6510, 'Koko', 1, '0', '2147483647', '1990-02-04', 'mitsuko.lawl@gmail.com', '2015-12-10', '', 0, 1, 0),
(1093, 0, 'LawL', 'Mii', 'Yeah', 6510, 'Koko', 1, '0', '2147483647', '1990-02-04', 'mitsuko.lawl@gmail.com', '2015-12-10', '', 0, 1, 0),
(1094, 0, 'LawL', 'Mii', 'Yeah', 6510, 'Koko', 1, '0', '2147483647', '1990-02-04', 'mitsuko.lawl@gmail.com', '2015-12-10', '', 0, 1, 0),
(1095, 0, 'test', 'test', 'O', 90000, 'o', 0, '0', '606060606', '2015-01-01', 'a@a.cfr', '2015-12-11', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `PersonneExtra`
--

CREATE TABLE IF NOT EXISTS `PersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(972, 0, 0, 0, 'C15.3'),
(973, 0, 0, 0, 'NC'),
(974, 0, 0, 0, 'C30'),
(975, 0, 0, 0, 'C15.4'),
(976, 0, 0, 0, 'NC'),
(977, 0, 0, 0, 'C15'),
(978, 0, 0, 0, 'C30.2'),
(979, 0, 0, 0, 'C30'),
(980, 0, 0, 0, 'C30.4'),
(981, 0, 0, 0, 'C15.1'),
(982, 0, 0, 0, 'C15.2'),
(983, 0, 0, 0, 'C30'),
(984, 0, 0, 0, 'C30.2'),
(985, 0, 0, 0, 'C15.1'),
(986, 0, 0, 0, 'C15.4'),
(987, 0, 0, 0, 'C15.3'),
(988, 0, 0, 0, 'C15.2'),
(989, 0, 0, 0, 'C30.5'),
(990, 0, 0, 0, 'C15.5'),
(991, 0, 0, 0, 'C15.4'),
(992, 0, 0, 0, 'C15'),
(993, 0, 0, 0, 'C30.4'),
(994, 0, 0, 0, 'C30.4'),
(995, 0, 0, 0, 'C15'),
(996, 0, 0, 0, 'C15.5'),
(997, 0, 0, 0, 'C30.4'),
(998, 0, 0, 0, 'C30.1'),
(999, 0, 0, 0, 'C15.4'),
(1000, 0, 0, 0, 'C30.3'),
(1001, 0, 0, 0, 'C15.4'),
(1002, 0, 0, 0, 'C15.4'),
(1003, 0, 0, 0, 'C30.2'),
(1004, 0, 0, 0, 'C15'),
(1005, 0, 0, 0, 'C30.5'),
(1006, 0, 0, 0, 'C15.5'),
(1007, 0, 0, 0, 'C30'),
(1008, 0, 0, 0, 'C15.4'),
(1009, 0, 0, 0, 'C15.1'),
(1010, 0, 0, 0, 'C30.5'),
(1011, 0, 0, 0, 'C30.1'),
(1012, 0, 0, 0, 'C30.5'),
(1013, 0, 0, 0, 'C15.2'),
(1014, 0, 0, 0, 'C30.2'),
(1015, 0, 0, 0, 'C15.5'),
(1016, 0, 0, 0, 'C15.2'),
(1017, 0, 0, 0, 'C30.2'),
(1018, 0, 0, 0, 'C15.4'),
(1019, 0, 0, 0, 'C15'),
(1020, 0, 0, 0, 'C30.2'),
(1021, 0, 0, 0, 'C30'),
(1022, 0, 0, 0, 'C15.3'),
(1023, 0, 0, 0, 'C30.5'),
(1024, 0, 0, 0, 'C30.5'),
(1025, 0, 0, 0, 'C15.4'),
(1026, 0, 0, 0, 'C15.5'),
(1027, 0, 0, 0, 'C15.3'),
(1028, 0, 0, 0, 'C30.3'),
(1029, 0, 0, 0, 'C30.3'),
(1030, 0, 0, 0, 'NC'),
(1031, 0, 0, 0, 'C30.4'),
(1032, 0, 0, 0, 'C15.3'),
(1033, 0, 0, 0, 'C15.3'),
(1034, 0, 0, 0, 'C30'),
(1035, 0, 0, 0, 'C30.3'),
(1036, 0, 0, 0, 'C30'),
(1037, 0, 0, 0, 'C30'),
(1038, 0, 0, 0, 'C30.1'),
(1039, 0, 0, 0, 'NC'),
(1040, 0, 0, 0, 'C15.3'),
(1041, 0, 0, 0, 'C30.2'),
(1042, 0, 0, 0, 'C15.2'),
(1043, 0, 0, 0, 'C30.5'),
(1044, 0, 0, 0, 'C30'),
(1045, 0, 0, 0, 'C30.1'),
(1046, 0, 0, 0, 'C15.2'),
(1047, 0, 0, 0, 'C15.5'),
(1048, 0, 0, 0, 'C15.5'),
(1049, 0, 0, 0, 'C30.3'),
(1050, 0, 0, 0, 'C15.4'),
(1051, 0, 0, 0, 'C30.3'),
(1052, 0, 0, 0, 'C15.2'),
(1053, 0, 0, 0, 'C15.4'),
(1054, 0, 0, 0, 'C30.3'),
(1055, 0, 0, 0, 'C30.4'),
(1056, 0, 0, 0, 'C15.2'),
(1057, 0, 0, 0, 'C30.5'),
(1058, 0, 0, 0, 'C30.5'),
(1059, 0, 0, 0, 'C30.4'),
(1060, 0, 0, 0, 'C15.1'),
(1061, 0, 0, 0, 'C15.1'),
(1062, 0, 0, 0, 'C30.2'),
(1063, 0, 0, 0, 'C30.2'),
(1064, 0, 0, 0, 'C30.2'),
(1065, 0, 0, 0, 'C15'),
(1066, 0, 0, 0, 'C15.5'),
(1067, 0, 0, 0, 'C30.1'),
(1068, 0, 0, 0, 'C30.1'),
(1069, 0, 0, 0, 'C30.2'),
(1070, 0, 0, 0, 'C15.5'),
(1071, 0, 0, 0, 'C30.3'),
(1072, 0, 0, 0, 'C15'),
(1073, 0, 0, 0, 'C30.5'),
(1074, 0, 0, 0, 'C30.5'),
(1075, 0, 0, 0, 'C30.5'),
(1076, 0, 0, 0, 'C15.4'),
(1077, 0, 0, 0, 'C30.3'),
(1078, 0, 0, 0, 'NC'),
(1079, 0, 0, 0, 'C30.3'),
(1080, 0, 0, 0, 'C30.3'),
(1081, 0, 0, 0, 'C15.3'),
(1082, 0, 0, 0, 'C30.1'),
(1083, 0, 0, 0, 'C30'),
(1084, 0, 0, 0, 'C15.1'),
(1085, 0, 0, 0, 'C30.2'),
(1086, 0, 0, 0, 'C30.2'),
(1087, 0, 0, 0, 'C30.4'),
(1088, 0, 0, 0, 'C30.3'),
(1089, 0, 0, 0, 'C30.4'),
(1090, 0, 0, 0, 'C30.2'),
(1091, 0, 0, 0, 'C30');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=548 ;

--
-- Contenu de la table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`, `AvgRanking`, `Group_Vic`) VALUES
(488, 972, 973, 21, 0, 'C30.1', 0),
(489, 974, 975, 20, 0, 'C15.5', 0),
(490, 976, 977, 20, 0, 'C30', 0),
(491, 978, 979, 21, 0, 'C30.1', 0),
(492, 980, 981, 21, 0, 'C15.5', 0),
(493, 982, 983, 21, 0, 'C15.4', 0),
(494, 984, 985, 21, 0, 'C15.4', 0),
(495, 986, 987, 20, 0, 'C15.3', 0),
(496, 988, 989, 20, 0, 'C30', 0),
(497, 990, 991, 21, 0, 'C15.4', 0),
(498, 992, 993, 21, 0, 'C15.5', 0),
(499, 994, 995, 21, 0, 'C15.5', 0),
(500, 996, 997, 20, 0, 'C30.1', 0),
(501, 998, 999, 20, 0, 'C15.5', 0),
(502, 1000, 1001, 21, 0, 'C30', 0),
(503, 1002, 1003, 20, 0, 'C30', 0),
(504, 1004, 1005, 20, 0, 'C15.5', 0),
(505, 1006, 1007, 20, 0, 'C15.5', 0),
(506, 1008, 1009, 21, 0, 'C15.2', 0),
(507, 1010, 1011, 20, 0, 'C30.3', 0),
(508, 1012, 1013, 21, 0, 'C30', 0),
(509, 1014, 1015, 21, 0, 'C30', 0),
(510, 1016, 1017, 21, 0, 'C15.5', 0),
(511, 1018, 1019, 21, 0, 'C15.2', 0),
(512, 1020, 1021, 20, 0, 'C30.1', 0),
(513, 1022, 1023, 19, 0, 'C30.1', 0),
(514, 1024, 1025, 21, 0, 'C30.1', 0),
(515, 1026, 1027, 21, 0, 'C15.4', 0),
(516, 1028, 1029, 20, 0, 'C30.4', 0),
(517, 1030, 1031, 21, 0, 'C30.5', 0),
(518, 1032, 1033, 20, 0, 'C30.1', 0),
(519, 1034, 1035, 21, 0, 'C30.1', 0),
(520, 1036, 1037, 20, 0, 'C30.3', 0),
(521, 1038, 1039, 20, 0, 'C30.3', 0),
(522, 1040, 1041, 21, 0, 'C15.5', 0),
(523, 1042, 1043, 20, 0, 'C30', 0),
(524, 1044, 1045, 19, 0, 'C30', 0),
(525, 1046, 1047, 21, 0, 'C15.3', 0),
(526, 1048, 1049, 21, 0, 'C30.1', 0),
(527, 1050, 1051, 21, 0, 'C30', 0),
(528, 1052, 1053, 20, 0, 'C15.3', 0),
(529, 1054, 1055, 21, 0, 'C30.3', 0),
(530, 1056, 1057, 20, 0, 'C30', 0),
(531, 1058, 1059, 20, 0, 'C30.4', 0),
(532, 1060, 1061, 21, 0, 'C30', 0),
(533, 1062, 1063, 21, 0, 'C30.4', 0),
(534, 1064, 1065, 20, 0, 'C15.4', 0),
(535, 1066, 1067, 18, 0, 'C30', 0),
(536, 1068, 1069, 21, 0, 'C30.1', 0),
(537, 1070, 1071, 20, 0, 'C30.1', 0),
(538, 1072, 1073, 21, 0, 'C15.5', 0),
(539, 1074, 1075, 21, 0, 'C30.5', 0),
(540, 1076, 1077, 20, 0, 'C30', 0),
(541, 1078, 1079, 21, 0, 'C30.4', 0),
(542, 1080, 1081, 20, 0, 'C30', 0),
(543, 1082, 1083, 19, 0, 'C30', 0),
(544, 1084, 1085, 20, 0, 'C15.4', 0),
(545, 1086, 1087, 19, 0, 'C30.3', 0),
(546, 1088, 1089, 21, 0, 'C30.3', 0),
(547, 1090, 1091, 20, 0, 'C30.1', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `Terrain`
--

INSERT INTO `Terrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`) VALUES
(13, '1 Rue de la frappe', 25, 11, 'Usé', '2015-11-17', '2015-12-03', '2015-11-11', 'Synthétique', 'Terrain boueux'),
(14, '34 Boulevard de la poussière', 22, 11, 'Neuf', '2020-04-11', '2036-11-12', '2015-11-11', 'Terre battue', 'Terrain propre'),
(15, '90 rue du combat', 18, 12, 'Passable', '2016-10-05', '2021-11-14', '2015-11-11', 'Gazon', 'Terrain agréable'),
(16, '1 rue', 90, 13, 'Neuf', '2015-11-12', '2016-05-12', '2015-11-12', 'Terre battue', 'OK'),
(17, 'okok', 0, 14, 'Neuf', '2015-11-12', '2015-11-12', '2015-11-12', 'Terre battue', 'ok'),
(18, 'test', 90, 23, 'Usé', '2016-03-07', '2018-01-01', '2015-12-11', 'Terre battue', 'RAS');

-- --------------------------------------------------------

--
-- Structure de la table `TmpPersonne`
--

CREATE TABLE IF NOT EXISTS `TmpPersonne` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Title` int(2) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Ville` varchar(500) NOT NULL,
  `ZIPCode` int(10) NOT NULL,
  `Rue` varchar(100) NOT NULL,
  `Number` int(11) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `GSMNumber` varchar(20) NOT NULL,
  `BirthDate` date NOT NULL,
  `Mail` varchar(500) NOT NULL,
  `CreationDate` date NOT NULL,
  `Note` varchar(500) NOT NULL,
  `IsPlayer` tinyint(1) NOT NULL,
  `IsOwner` tinyint(1) NOT NULL,
  `IsStaff` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=973 ;

--
-- Contenu de la table `TmpPersonne`
--

INSERT INTO `TmpPersonne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(961, 0, 'a', 'a', 'a', 1, 'a', 1, '0', '6', '2012-04-06', 'a@a.fr', '2015-12-11', '', 1, 0, 0),
(962, 0, 'test2', 'test2', 'O', 90, 'a', 0, '0', '808080808', '0000-00-00', 'a.a@f.fr', '2015-12-11', '', 1, 0, 0),
(963, 0, 'a', 'a', 'a', 0, 'a', 0, '0', '609090909', '2015-01-01', 'a@a.fr', '2015-12-11', '', 1, 0, 0),
(964, 0, 'b', 'b', 'b', 9, 'b', 0, '0', '808080808', '2015-01-01', 'b.j@free.fr', '2015-12-11', '', 1, 0, 0),
(965, 0, 'c', 'c', 'c', 8, 'c', 0, '0', '606060606', '2015-01-01', 'c.C@gmail.com', '2015-12-11', '', 1, 0, 0),
(966, 0, 'c', 'c', 'c', 8, 'c', 0, '0', '606060606', '2015-01-01', 'c.C@gmail.com', '2015-12-11', '', 1, 0, 0),
(967, 0, 'c', 'c', 'c', 8, 'c', 0, '0', '606060606', '2015-01-01', 'c.C@gmail.com', '2015-12-11', '', 1, 0, 0),
(968, 0, 'd', 'd', 'd', 7, 'd', 0, '0', '808080808', '2015-01-01', 'd.d@d.d', '2015-12-11', '', 1, 0, 0),
(969, 0, 'c', 'c', 'c', 8, 'c', 0, '0', '606060606', '2015-01-01', 'c.C@gmail.com', '2015-12-11', '', 1, 0, 0),
(970, 0, 'd', 'd', 'd', 7, 'd', 0, '0', '808080808', '2015-01-01', 'd.d@d.d', '2015-12-11', '', 1, 0, 0),
(971, 0, 'e', 'e', 'e', 9, 'e', 0, '0', '2147483647', '2015-01-01', 'e@e.fr', '2015-12-11', '', 1, 0, 0),
(972, 0, 'f', 'f', 'f', 8, 'f', 0, '0', '2147483647', '2014-01-02', 'f@f.fr', '2015-12-11', 'kaka', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `TmpPersonneExtra`
--

CREATE TABLE IF NOT EXISTS `TmpPersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Contenu de la table `TmpPersonneExtra`
--

INSERT INTO `TmpPersonneExtra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(90, 962, 1),
(91, 961, 2),
(92, 961, 3),
(93, 961, 4),
(94, 964, 1),
(95, 965, 1),
(96, 968, 1),
(97, 971, 2),
(98, 971, 3),
(99, 971, 4),
(100, 972, 2),
(101, 972, 3),
(102, 972, 4);

-- --------------------------------------------------------

--
-- Structure de la table `TmpPlayer`
--

CREATE TABLE IF NOT EXISTS `TmpPlayer` (
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
-- Contenu de la table `TmpPlayer`
--

INSERT INTO `TmpPlayer` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`, `Ranking`) VALUES
(961, 0, 0, 0, 'NC'),
(962, 0, 0, 0, 'NC'),
(964, 0, 0, 0, 'NC'),
(965, 0, 0, 0, 'NC'),
(968, 0, 0, 0, 'NC'),
(971, 0, 0, 0, 'NC'),
(972, 0, 0, 0, 'NC');

-- --------------------------------------------------------

--
-- Structure de la table `TmpTeam`
--

CREATE TABLE IF NOT EXISTS `TmpTeam` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_Player1` int(255) NOT NULL,
  `ID_Player2` int(255) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `NbWinMatch` int(255) NOT NULL,
  `AvgRanking` varchar(10) NOT NULL,
  `Group_Vic` int(11) NOT NULL,
  `player1_confirmed` int(11) NOT NULL,
  `player2_confirmed` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Player1` (`ID_Player1`),
  KEY `ID_Player2` (`ID_Player2`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=492 ;

--
-- Contenu de la table `TmpTeam`
--

INSERT INTO `TmpTeam` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`, `AvgRanking`, `Group_Vic`, `player1_confirmed`, `player2_confirmed`) VALUES
(490, 965, 968, 15, 0, 'NC', 0, 0, 0),
(491, 971, 972, 15, 0, 'NC', 0, 0, 0);

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
