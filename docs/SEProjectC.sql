-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Novembre 2015 à 03:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `seprojectc`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Year` int(4) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `Categorie` (`ID`, `Year`, `Designation`) VALUES
(1, 2015, 'Tout âge'),
(6, 2016, 'Poussins'),
(7, 2016, 'Seniors');

-- --------------------------------------------------------

--
-- Structure de la table `extras`
--

CREATE TABLE IF NOT EXISTS `Extras` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `extras`
--

INSERT INTO `Extras` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'Barbecue', 8, 'Barbecue chaleureux au 18 rue de la Grande Place à 18:00.\r\nVenez nombreux.');

-- --------------------------------------------------------

--
-- Structure de la table `Groupsaturday`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `groupsaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_vic1`, `ID_vic2`) VALUES
(27, NULL, 44, 45, 46, 50, 54, 45, 54);

-- --------------------------------------------------------

--
-- Structure de la table `Groupsunday`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `history`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=324 ;

--
-- Contenu de la table `history`
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
(323, 7, 9, 'Match-knock-off-Samedi', 'Ajout', '2015-11-13', '03:15:56');

-- --------------------------------------------------------

--
-- Structure de la table `knockoffsaturday`
--

CREATE TABLE IF NOT EXISTS `Knockoffsaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `knockoffsaturday`
--

INSERT INTO `KnockoffSaturday` (`ID`, `ID_Match`, `Position`) VALUES
(9, 51, 1);

-- --------------------------------------------------------

--
-- Structure de la table `KnockoffSunday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSunday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `match`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(16, '2015-11-11', '16:15', 43, 45, 0, 0, 13, NULL),
(17, '2015-11-11', '18:00', 45, 44, 0, 0, 14, NULL),
(18, '2015-11-15', '20:45', 46, 45, 0, 0, 15, NULL),
(44, NULL, NULL, 45, 54, 0, 0, 1, NULL),
(45, NULL, NULL, 45, 54, 0, 0, 1, NULL),
(46, NULL, NULL, 45, 54, 0, 0, 1, NULL),
(47, NULL, NULL, 45, 54, 0, 0, 1, NULL),
(48, NULL, NULL, 45, 54, 0, 0, 1, NULL),
(49, NULL, NULL, 45, 54, 0, 0, 1, NULL),
(51, NULL, NULL, 45, 54, 0, 0, 13, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `owner`
--

CREATE TABLE IF NOT EXISTS `Owner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(255) NOT NULL,
  `ID_Staff` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Staff` (`ID_Staff`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, 0, 635434770, '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(107, 1, 'John', 'Doeuf', 'Grenoble', 38000, '12 rue des Pins', 450, 9, 6, '1978-11-14', 'j.d@hotmail.fr', '2015-11-11', 'J''aime les barbecues.', 1, 0, 0),
(108, 0, 'Oussama', 'Faitmal', 'Dijon', 21000, '12, rue du ouille', 0, 99999999, 6898989, '1964-02-12', 'f.o@gmail.com', '2015-11-11', '', 1, 0, 0),
(109, 2, 'Sarah', 'Croche', 'Annecy', 78000, 'Avenue du halo', 0, 9, 689898989, '1945-01-01', 'c.s@gmail.fr', '2015-11-11', '', 0, 1, 0),
(110, 1, 'Yves', 'Rogne', 'Antibes', 6000, '192 rue des abricotiers', 0, 9, 6, '1970-11-04', 'r.y@gmail.com', '2015-11-11', '', 1, 0, 0),
(111, 0, 'Aude', 'Javel', 'Romans', 26000, '34, avenue du propre', 9, 4, 6, '1992-08-05', 'j.a@gmail.fr', '2015-11-11', '', 1, 0, 0),
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
(143, 0, 'Debby', 'Scott', 'Louvain-La-Neuve', 1348, '89 place craquante', 0, 0, 2147483647, '1991-03-17', 's.d@gmail.fr', '2015-11-12', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `player`
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
(131, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
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
-- Contenu de la table `staff`
--

INSERT INTO `Staff` (`ID`, `ID_Personne`, `Level`, `ID_Cat`, `Password`, `Username`) VALUES
(1, 7, '1', 1, 'hello', '1'),
(100, 70, '10', 1, '123', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `team`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`) VALUES
(43, 107, 108, 7, 0),
(44, 110, 111, 1, 0),
(45, 112, 113, 1, 0),
(46, 114, 115, 1, 0),
(50, 117, 118, 1, 0),
(53, 128, 129, 6, 0),
(54, 130, 131, 1, 0),
(57, 137, 132, 6, 0),
(58, 139, 140, 7, 0),
(59, 133, 136, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
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
-- Contenu de la table `terrain`
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
-- Contraintes pour la table `owner`
--
ALTER TABLE `Owner`
  ADD CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Owner_ibfk_2` FOREIGN KEY (`ID_Staff`) REFERENCES `Staff` (`ID_Personne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `player`
--
ALTER TABLE `Player`
  ADD CONSTRAINT `PersonneFK` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `Staff_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `Personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Staff_ibfk_2` FOREIGN KEY (`ID_Cat`) REFERENCES `Categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `team`
--
ALTER TABLE `Team`
  ADD CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`ID_Player1`) REFERENCES `Personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_2` FOREIGN KEY (`ID_Player2`) REFERENCES `Personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_3` FOREIGN KEY (`ID_Cat`) REFERENCES `Categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
