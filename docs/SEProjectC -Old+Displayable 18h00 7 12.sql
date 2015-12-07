-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 07 Décembre 2015 à 17:58
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.6.15-1+deb.sury.org~trusty+1

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
(1, '4 - 9', 'Tout âge'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=12 ;

--
-- Contenu de la table `GlobalVariables`
--

INSERT INTO `GlobalVariables` (`id`, `Name`, `Value`, `Displayable`) VALUES
(1, 'Message Leader', '[A rediger]', 1),
(2, 'Sujet Leader', '[A rediger]', 1),
(3, 'Adresse HQ', '[A rediger]', 1),
(4, 'Message Non-Payé', '[A rediger]', 1),
(5, 'Sujet Non-Payé', '[A rediger]', 1),
(6, 'Message à tous', '[A rediger]', 1),
(7, 'Sujet à tous', '[A rediger]', 1),
(8, 'Message', '[A rediger]', 1),
(10, 'tournament_started_sam', '0', 0),
(11, 'tournament_started_dim', '0', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2232 ;

--
-- Contenu de la table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(2231, 7, 0, 'Suppression de toute l''année précédente.', 'Suppression', '2015-12-07', '17:58:24');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1232 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=713 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, 0, 635434770, '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(109, 2, 'Sarah', 'Croche', 'Annecy', 78000, 'Avenue du halo', 0, 9, 689898989, '1945-01-01', 'c.s@gmail.fr', '2015-11-11', '', 0, 1, 0),
(116, 1, 'Gérard', 'Remangagner', 'Marseille', 13000, '78 avenue de la défaite', 0, 0, 7, '0000-00-00', 'r.g@gmail.be', '2015-11-11', '', 0, 1, 0);

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
(1, 7, '1', 1, 'hello', '1'),
(100, 70, '10', 1, '123', 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=376 ;

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
