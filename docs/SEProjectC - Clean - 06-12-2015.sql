-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Décembre 2015 à 17:24
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

CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Age` varchar(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `Age`, `Designation`) VALUES
(1, '4 - 9', 'Tout âge'),
(6, '18 - 36', 'Poussins'),
(7, '100 - 112', 'Seniors'),
(16, '11 - 12', 'Minimes'),
(17, '13 - 14', 'Cadet'),
(18, '15 - 16', 'Scolaire'),
(19, '17 - 19', 'Junior'),
(20, '20 - 40', 'Seniors'),
(21, '41 - 120', 'Elites'),
(25, '9 - 10', 'Pré-minimes');

-- --------------------------------------------------------

--
-- Structure de la table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `extras`
--

INSERT INTO `extras` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'Pas d''options supplémentaire', 0, ' '),
(2, 'Barbecue', 9, 'Barbecue chaleureux au 18 rue de la Grande Place ? 18:00.\r\nVenez nombreux.'),
(3, 'Lan Party', 5, 'A mega lan party!'),
(4, 'Berr pong', 4, 'A mega beer pong!');

-- --------------------------------------------------------

--
-- Structure de la table `globalvariables`
--

CREATE TABLE IF NOT EXISTS `globalvariables` (
  `Name` varchar(20) COLLATE latin1_bin NOT NULL,
  `Value` varchar(1000) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `globalvariables`
--

INSERT INTO `globalvariables` (`Name`, `Value`) VALUES
('Message Leader', '[A rediger]'),
('Sujet Leader', '[A rediger]'),
('Adresse HQ', '[A rediger]'),
('Message Non-Payé', '[A rediger]'),
('Sujet Non-Payé', '[A rediger]'),
('Message à tous', '[A rediger]'),
('Sujet à tous', '[A rediger]'),
('Message', 'ar'),
('tournament_started', '0');

-- --------------------------------------------------------

--
-- Structure de la table `groupsaturday`
--

CREATE TABLE IF NOT EXISTS `groupsaturday` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupsunday`
--

CREATE TABLE IF NOT EXISTS `groupsunday` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `groupsunday`
--

INSERT INTO `groupsunday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(27, 13, 62, 44, 45, 46, 50, 54, NULL, NULL, 62, 1),
(28, 14, 60, 61, 43, 63, 64, 65, NULL, NULL, 61, 1),
(29, 15, 67, 68, NULL, NULL, NULL, NULL, NULL, NULL, 67, 1);

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2052 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(2051, 7, 0, 'Historique', 'Suppression', '2015-12-06', '17:24:39');

-- --------------------------------------------------------

--
-- Structure de la table `knockoffsaturday`
--

CREATE TABLE IF NOT EXISTS `knockoffsaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Structure de la table `knockoffsunday`
--

CREATE TABLE IF NOT EXISTS `knockoffsunday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1224 ;

--
-- Contenu de la table `match`
--

INSERT INTO `match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(1186, '2015-12-06', '08:30', 44, 44, 0, 0, 13, 27),
(1187, '2015-12-06', '08:30', 44, 45, 0, 0, 13, 27),
(1188, '2015-12-06', '08:30', 44, 46, 0, 0, 13, 27),
(1189, '2015-12-06', '08:30', 44, 50, 0, 0, 13, 27),
(1190, '2015-12-06', '08:30', 45, 44, 0, 0, 13, 27),
(1191, '2015-12-06', '08:30', 45, 45, 0, 0, 13, 27),
(1192, '2015-12-06', '08:30', 45, 46, 0, 0, 13, 27),
(1193, '2015-12-06', '08:30', 46, 44, 0, 0, 13, 27),
(1194, '2015-12-06', '08:30', 46, 45, 0, 0, 13, 27),
(1195, '2015-12-06', '08:30', 50, 44, 0, 0, 13, 27),
(1196, '2015-12-06', '08:30', 60, 61, 0, 0, 14, 28),
(1198, '2015-12-06', '08:30', 60, 63, 0, 0, 14, 28),
(1199, '2015-12-06', '08:30', 60, 64, 0, 0, 14, 28),
(1200, '2015-12-06', '08:30', 60, 65, 0, 0, 14, 28),
(1201, '2015-12-06', '08:30', 61, 61, 0, 0, 14, 28),
(1203, '2015-12-06', '08:30', 61, 63, 0, 0, 14, 28),
(1204, '2015-12-06', '08:30', 61, 64, 0, 0, 14, 28),
(1208, '2015-12-06', '08:30', 63, 61, 0, 0, 14, 28),
(1210, '2015-12-06', '08:30', 64, 61, 0, 0, 14, 28),
(1211, '2015-12-06', '08:30', 67, 68, 0, 0, 15, 29),
(1212, '2015-12-06', '08:30', 62, 44, 0, 0, 13, 27),
(1213, '2015-12-06', '08:30', 62, 45, 0, 0, 13, 27),
(1214, '2015-12-06', '08:30', 62, 46, 0, 0, 13, 27),
(1215, '2015-12-06', '08:30', 62, 50, 0, 0, 13, 27),
(1216, '2015-12-06', '08:30', 62, 54, 0, 0, 13, 27),
(1217, '2015-12-06', '08:30', 62, 0, 0, 0, 13, 27),
(1218, '2015-12-06', '08:30', 43, 60, 0, 0, 14, 28),
(1219, '2015-12-06', '08:30', 43, 61, 0, 0, 14, 28),
(1220, '2015-12-06', '08:30', 43, 63, 0, 0, 14, 28),
(1221, '2015-12-06', '08:30', 43, 64, 0, 0, 14, 28),
(1222, '2015-12-06', '08:30', 43, 65, 0, 0, 14, 28),
(1223, '2015-12-06', '08:30', 43, 0, 0, 0, 14, 28);

-- --------------------------------------------------------

--
-- Structure de la table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(255) NOT NULL,
  `ID_Staff` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Personne` (`ID_Personne`),
  KEY `ID_Staff` (`ID_Staff`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `owner`
--

INSERT INTO `owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=391 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, 0, 635434770, '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(107, 1, 'John', 'Doeuf', '12', 38000, '450', 0, 9, 6, '1978-11-14', 'j.d@hotmail.fr', '2015-11-11', 'J''aime les barbecues.', 1, 0, 0),
(108, 1, 'Oussama', 'Faitmal', '0', 21000, '0', 12, 99999999, 6898989, '1964-02-12', 'f.o@gmail.com', '2015-11-11', '', 1, 0, 0),
(109, 2, 'Sarah', 'Croche', 'Annecy', 78000, 'Avenue du halo', 0, 9, 689898989, '1945-01-01', 'c.s@gmail.fr', '2015-11-11', '', 0, 1, 0),
(110, 1, 'Yves', 'Rogne', '192 rue des abricotiers', 6000, '0', 0, 9, 6, '1970-11-04', 'r.y@gmail.com', '2015-11-11', 'coucou', 1, 0, 0),
(111, 1, 'Aude', 'Javel', '34, avenue du propre', 26000, '9', 0, 4, 6, '1992-08-05', 'j.a@gmail.fr', '2015-11-11', '', 1, 0, 0),
(112, 1, 'Anna', 'Conda', '6, boulevard du python', 1348, '35', 0, 8, 6, '1990-03-08', 'c.a@gmail.com', '2015-11-11', 'Mon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon TextMon Text', 1, 0, 0),
(113, 1, 'Asterix', 'Eperil', '90, rue du danger', 1348, '98', 0, 0, 6, '1982-03-03', 'e.a@gmail.com', '2015-11-11', 'Mon Texte 2Mon Texte 2Mon Texte 2Mon Texte 2', 1, 0, 0),
(114, 0, 'Sandra', 'Lacouettegratte', 'Louvain', 1348, '78, avenue de l''épilation', 12, 0, 6, '1997-02-13', 's.l@gmail.fr', '2015-11-11', '', 1, 0, 0),
(115, 0, 'Sophie', 'Fonfec', 'Lyon', 69000, '67, port de la pénife', 14, 0, 7, '1988-01-01', 'f.s@gmail.be', '2015-11-11', '', 1, 0, 0),
(116, 1, 'Gérard', 'Remangagner', 'Marseille', 13000, '78 avenue de la défaite', 0, 0, 7, '0000-00-00', 'r.g@gmail.be', '2015-11-11', '', 0, 1, 0),
(117, 0, 'Anna', 'Lyse', 'Privas', 7000, '56, boulevard de la recherche', 18, 0, 7, '1980-05-12', 'l.a@hotmail.com', '2015-11-11', '', 1, 0, 0),
(118, 0, 'Mario', 'Net', '0', 49000, 'Angers', 78, 0, 6, '1982-04-05', 'n.m@free.fr', '2015-11-11', '', 1, 0, 0),
(129, 0, 'Jean', 'Neymard', 'Cannes', 6000, '1 avenue de la paresse', 90, 475676767, 678787889, '1992-06-11', 'n.j@free.fr', '2015-11-12', '', 1, 0, 0),
(130, 0, 'Alex', 'Terieur', 'Annecy', 74000, '34 boulevard du froid', 0, 0, 2147483647, '1978-12-19', 't.a@wanadoo.com', '2015-11-12', '', 1, 0, 0),
(131, 0, 'Alain', 'Terieur', 'Annecy', 74000, '23 rue du chaud', 0, 0, 2147483647, '1982-02-02', 't.a@free.fr', '2015-11-12', '', 1, 0, 0),
(132, 0, 'Agathe', 'Deblouze', 'Paris', 75000, '2 place de la déprime', 89, 0, 645454545, '1959-11-03', 'd.a@wanadoo.com', '2015-11-12', '', 1, 0, 0),
(133, 0, 'Tony', 'Truand', 'Chabeuil', 26000, '8 rue des impasses', 99, 0, 678787878, '1973-04-04', 't.t@free.fr', '2015-11-12', '', 1, 0, 0),
(136, 0, 'Justin', 'Pticou', 'Dijon', 21000, '39 avenue barrée', 0, 0, 634352534, '0000-00-00', 'p.j@free.fr', '2015-11-12', '', 1, 0, 0),
(137, 0, 'Geoffrey', 'Beinunetitsieste', 'Paris', 75000, '78 chemin de la paresse', 0, 0, 677665544, '1992-04-19', 'b.g@gmail.com', '2015-11-12', '', 1, 0, 0),
(138, 0, 'Joe', 'Bidjoba', 'Saint-Marcel-Les-Valence', 26000, '26 avenue holé', 0, 0, 677777755, '1994-07-03', 'b.j@free.fr', '2015-11-12', '', 1, 0, 0),
(140, 0, 'Sam', 'Excite', 'Louvain', 1348, '2 rue du sport', 0, 0, 600880099, '1985-05-13', 'e.s@gmail.com', '2015-11-12', '', 1, 0, 0),
(141, 0, 'Donna', 'Memelababal', 'Paris', 75000, '2 place du canidé', 0, 0, 677777777, '1984-05-06', 'm.d@gmail.fr', '2015-11-12', '', 1, 0, 0),
(142, 0, 'Cecile', 'Vaistairstalone', 'Marseille', 13000, '194 rue du sport', 0, 0, 2147483647, '1993-01-04', 'v.c@gmail.fr', '2015-11-12', '', 1, 0, 0),
(143, 0, 'Debby', 'Scott', 'Louvain-La-Neuve', 1348, '89 place craquante', 0, 0, 2147483647, '1991-03-17', 's.d@gmail.fr', '2015-11-12', '', 1, 0, 0),
(144, 1, 'Ménage', 'Jean', 'rue', 0, '0', 0, 0, 0, '2015-11-02', 'MAIL@MAIL.MAIL', '2015-11-03', 'note', 1, 0, 0),
(145, 1, 'Misa', 'Moka', 'Mouch', 7578, '75', 0, 335465468, 335465468, '2011-04-04', 'lzefjzf@ldgzj.com', '2015-11-18', '', 1, 0, 0),
(146, 1, 'Café', 'Moka', 'fezfvzev', 35435, '54', 0, 335465468, 335486846, '2004-09-06', 'pikapika@hotmail.com', '2015-11-18', '', 1, 0, 0),
(317, 0, 'Jean', 'Kikine', 'Paris', 95000, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(318, 0, 'Jean', 'Passédesmeilleurs', 'Villeneuve', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(319, 0, 'Jean', 'Tame', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(320, 0, 'Jean', 'File', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(321, 0, 'Jean', 'Trevoi', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(322, 0, 'Jean', 'Trecote', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(323, 0, 'Jean', 'Magasine', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(324, 0, 'Jean', 'Valjean', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(325, 0, 'Jean', 'Rage', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(326, 0, 'Jean', 'Perlaraison', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(327, 0, 'Jean', 'Peuplu', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(328, 0, 'Jean', 'Clume', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(330, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(339, 0, 'Julien', 'Evrard', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(387, 0, 'Sami', 'Mokka', 'o', 0, 'o', 0, 0, 2147483647, '1994-02-02', 'o@o.fr', '2015-12-02', '', 1, 0, 0),
(388, 0, 'Lili', 'Best', 'a', 0, 'a', 0, 0, 2147483647, '1994-11-08', 'a@a.fr', '2015-12-02', '', 1, 0, 0),
(389, 0, 'Olivier', 'BOULANGER', 'kjhyhku', 234, 'jhfh', 123, 543676756, 2147483647, '1965-08-05', 'o@o.fr', '2015-12-05', 'dfghj', 1, 0, 0),
(390, 0, 'Roxane', 'BOULANGER', 'kfeflzief', 3456, 'drtyukhi', 2345, 2147483647, 2147483647, '1994-04-01', 'a@a.fr', '2015-12-05', 'cfvghjk', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personneextra`
--

CREATE TABLE IF NOT EXISTS `personneextra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Contenu de la table `personneextra`
--

INSERT INTO `personneextra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(2, 108, 1),
(25, 146, 1),
(26, 145, 1),
(34, 107, 2),
(35, 107, 3),
(36, 317, 1),
(37, 318, 1),
(38, 317, 1),
(39, 318, 1),
(40, 317, 1),
(41, 318, 1),
(42, 317, 1),
(43, 318, 1);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
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
-- Contenu de la table `player`
--

INSERT INTO `player` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`, `Ranking`) VALUES
(107, 0, 0, 0, ''),
(108, 0, 0, 0, ''),
(110, 0, 0, 0, ''),
(111, 0, 0, 0, ''),
(112, 0, 0, 0, ''),
(113, 0, 0, 0, ''),
(114, 0, 0, 0, ''),
(115, 0, 0, 0, ''),
(117, 0, 0, 0, ''),
(118, 0, 0, 0, ''),
(129, 0, 0, 0, ''),
(130, 0, 0, 0, ''),
(131, 0, 0, 0, ''),
(145, 0, 0, 0, ''),
(146, 0, 0, 0, ''),
(317, 0, 0, 0, ''),
(318, 0, 0, 0, ''),
(330, 0, 0, 0, 'C15.4'),
(339, 0, 0, 0, 'C30.3'),
(387, 0, 0, 0, ''),
(388, 0, 0, 0, ''),
(389, 0, 0, 0, 'B-15.2'),
(390, 0, 0, 0, 'B-15.2');

-- --------------------------------------------------------

--
-- Structure de la table `rankingtexttointbelgian`
--

CREATE TABLE IF NOT EXISTS `rankingtexttointbelgian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RankingText` varchar(10) COLLATE latin1_bin NOT NULL,
  `RankingInt` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=25 ;

--
-- Contenu de la table `rankingtexttointbelgian`
--

INSERT INTO `rankingtexttointbelgian` (`ID`, `RankingText`, `RankingInt`) VALUES
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
(14, ' B+4/6', 13),
(15, 'B+2/6', 14),
(16, 'B0', 15),
(17, 'B-2/6', 16),
(18, 'B-4/6', 17),
(19, 'B-15', 18),
(20, 'B-15.1', 19),
(21, 'B-15.2', 20),
(22, 'B-15.4', 21),
(23, 'A Nat', 22),
(24, 'A Int', 23);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
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

INSERT INTO `staff` (`ID`, `ID_Personne`, `Level`, `ID_Cat`, `Password`, `Username`) VALUES
(1, 7, '1', 1, 'hello', '1'),
(100, 70, '10', 1, '123', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `team`
--

INSERT INTO `team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`, `AvgRanking`, `Group_Vic`) VALUES
(43, 107, 108, 1, 0, '', 0),
(44, 110, 111, 1, 0, '', 0),
(45, 112, 113, 1, 0, '', 0),
(46, 114, 115, 1, 0, '', 0),
(50, 117, 118, 1, 0, '', 0),
(54, 130, 131, 1, 0, '', 0),
(57, 137, 132, 6, 0, '', 0),
(59, 133, 136, 6, 0, '', 0),
(60, 145, 146, 1, 0, '', 0),
(61, 317, 318, 1, 0, '', 0),
(62, 320, 322, 1, 0, '', 0),
(63, 328, 325, 1, 0, '', 0),
(64, 323, 324, 1, 0, '', 0),
(65, 326, 327, 1, 0, '', 0),
(67, 339, 330, 1, 0, 'NC', 0),
(68, 339, 330, 1, 0, 'C30', 0),
(69, 389, 390, 21, 0, 'C15.2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE IF NOT EXISTS `terrain` (
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
-- Contenu de la table `terrain`
--

INSERT INTO `terrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`) VALUES
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
ALTER TABLE `owner`
  ADD CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Owner_ibfk_2` FOREIGN KEY (`ID_Staff`) REFERENCES `staff` (`ID_Personne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `PersonneFK` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `Staff_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Staff_ibfk_2` FOREIGN KEY (`ID_Cat`) REFERENCES `categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`ID_Player1`) REFERENCES `personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_2` FOREIGN KEY (`ID_Player2`) REFERENCES `personne` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Team_ibfk_3` FOREIGN KEY (`ID_Cat`) REFERENCES `categorie` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
