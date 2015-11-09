-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 07 Novembre 2015 à 20:56
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.6.14-1+deb.sury.org~trusty+1

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
  `Year` int(4) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`ID`, `Year`, `Designation`) VALUES
(1, 2014, 'Main administrator');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Extras`
--

INSERT INTO `Extras` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'Barbecue', 8, 'Very Nice Barbecue');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Contenu de la table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(87, 70, 0, 'Historique', 'Suppression', '2015-11-07', '19:11:22');

-- --------------------------------------------------------

--
-- Structure de la table `Match`
--

CREATE TABLE IF NOT EXISTS `Match` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ID_Equipe1` int(11) NOT NULL,
  `ID_Equipe2` int(11) NOT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `ID_Terrain` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`) VALUES
(1, '2015-10-22', 1, 2, NULL, NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(1, 6, 7),
(9, 70, 7),
(10, 82, 7);

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
  `IsPlayer` tinyint(1) NOT NULL,
  `IsOwner` tinyint(1) NOT NULL,
  `IsStaff` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(1, 1, 'David', 'Loubard', 'Mons', 1348, 'Rue de la victoire', 42, 61424594, 2147483647, '1992-05-09', 'DavidLoubard@gmail.c', '2015-10-07', 1, 0, 0),
(2, 2, 'Jeanne', 'Doudremont', '', 7452, 'rue des rosiers, n°5', 0, 61579846, 2147483647, '1984-10-09', 'JeanneDoudremont@gma', '2015-10-10', 1, 0, 0),
(4, 2, 'Caroline', 'Rochez', '', 7843, 'Londres rue des clampins', 0, 6148796, 2147483647, '1996-01-24', 'crocrolecrocro@gmail', '2015-10-03', 1, 0, 0),
(5, 2, 'Beatrice', 'Lebouch', '', 7463, 'Avenue des carottes, 12', 0, 64795321, 2147483647, '1974-01-06', 'blebouch@hotmail.fr', '2015-10-02', 1, 0, 0),
(6, 1, 'Leonard', 'Leriche', 'Charleroi', 3256, 'Rue des richards, 1', 42, 61235495, 2147483647, '1950-06-14', 'legrosriche@hotmail.com', '2015-09-24', 0, 1, 0),
(7, 1, 'Billy', 'Biloup', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', 0, 0, 1),
(8, 2, 'Noémie', 'milé', '', 7456, 'route des bleus,74', 0, 98764138, 2147483647, '1995-12-24', 'nonolabest@gmail.com', '2015-10-01', 1, 0, 0),
(70, 1, 'Antoine', 'ROLLIN', 'Jupiter', 66666, 'TokupCPrivÃ©', 666, 0, 0, '1994-05-06', 'a@a.xn--6ca', '2015-11-05', 0, 1, 0),
(77, 0, 'John', 'D''Oeuf', '2', 26500, '1234', 192, 0, 2147483647, '2012-02-01', 'antoine.rollin26@free.fr', '2015-11-07', 1, 0, 0),
(80, 0, 'Sylvie-Aude-Anne-Marc-Sanson-Gil-Laura', 'FroidEUH!', '1', 26500, '1349', 192, 0, 2147483647, '2014-01-01', 'antoine.rollin26@free.fr', '2015-11-07', 1, 0, 0),
(82, 1, 'Jean', 'Cule', '26500', 26500, '192 rue des Acacias', 90, 0, 2147483647, '1994-01-05', 'antoine.rollin26@free.fr', '2015-11-07', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Player`
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
-- Contenu de la table `Player`
--

INSERT INTO `Player` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(4, 0, 1, 0),
(5, 1, 1, 0),
(8, 0, 1, 0);

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
  PRIMARY KEY (`ID`),
  KEY `ID_Player1` (`ID_Player1`),
  KEY `ID_Player2` (`ID_Player2`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`) VALUES
(24, 4, 1, 1, 0),
(25, 77, 80, 1, 0),
(26, 77, 4, 1, 0),
(27, 1, 1, 1, 0),
(28, 1, 8, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `Terrain`
--

INSERT INTO `Terrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`) VALUES
(4, 'Rue du printemps', 4775, 1, 'Passable', '2015-05-12', '2015-09-14', '2015-05-12', 'Synthétique', 'Terrain boueux'),
(5, 'Village de tennis', 550, 1, 'Neuf', '2015-05-12', '2015-09-14', '2015-05-12', 'Terre battue', 'Blabla'),
(8, 'OK', 120, 1, 'UsÃ©', '2015-05-12', '2015-09-14', '2015-05-12', 'SynthÃ©tique', 'ok'),
(9, 'OK', 120, 1, 'UsÃ©', '2015-05-12', '2015-09-14', '2015-05-12', 'SynthÃ©tique', 'ok'),
(11, 'ok', 5, 10, 'Neuf', '2015-05-12', '9999-01-01', '2015-11-07', 'Terre battue', 'ok\r\n'),
(12, 'ok', 3, 1, 'Neuf', '2015-05-12', '9999-01-01', '2015-11-07', 'Terre battue', 'ok\r\n');

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
