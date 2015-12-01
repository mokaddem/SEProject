-- phpMyAdmin SQL Dump
-- version 4.4.15deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 01 Décembre 2015 à 10:40
-- Version du serveur :  5.6.25-4
-- Version de PHP :  5.6.14-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `SEProjectC`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `ID` int(255) NOT NULL,
  `Year` int(4) NOT NULL,
  `Designation` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`ID`, `Year`, `Designation`) VALUES
(1, 2015, 'Tout âge'),
(6, 2016, 'Poussins'),
(7, 2016, 'Seniors');

-- --------------------------------------------------------

--
-- Structure de la table `Extras`
--

CREATE TABLE IF NOT EXISTS `Extras` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Extras`
--

INSERT INTO `Extras` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'Pas d''options supplémentaire', 0, ' '),
(2, 'Barbecue', 9, 'Barbecue chaleureux au 18 rue de la Grande Place ? 18:00.\r\nVenez nombreux.'),
(3, 'Lan Party', 5, 'A mega lan party!'),
(4, 'Berr pong', 4, 'A mega beer pong!'),
(5, 'Lili je t''aime', 0, 'kro fort');

-- --------------------------------------------------------

--
-- Structure de la table `GroupSaturday`
--

CREATE TABLE IF NOT EXISTS `GroupSaturday` (
  `ID` int(11) NOT NULL,
  `ID_terrain` int(11) DEFAULT NULL,
  `ID_t1` int(11) NOT NULL,
  `ID_t2` int(11) DEFAULT NULL,
  `ID_t3` int(11) DEFAULT NULL,
  `ID_t4` int(11) DEFAULT NULL,
  `ID_t5` int(11) DEFAULT NULL,
  `ID_vic1` int(11) DEFAULT NULL,
  `ID_vic2` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `GroupSaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_vic1`, `ID_vic2`) VALUES
(43, 13, 44, 45, 46, 50, 53, 0, 0),
(44, 13, 54, 61, 144, 62, 153, 0, 0),
(45, 13, 143, 60, 145, 146, 147, 0, 0),
(46, 13, 148, 149, 150, 151, 152, 0, 0),
(47, 13, 156, 154, 155, 158, 157, 0, 0),
(48, 13, 142, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `GroupSunday`
--

CREATE TABLE IF NOT EXISTS `GroupSunday` (
  `ID` int(11) NOT NULL,
  `ID_terrain` int(11) DEFAULT NULL,
  `ID_t1` int(11) NOT NULL,
  `ID_t2` int(11) DEFAULT NULL,
  `ID_t3` int(11) DEFAULT NULL,
  `ID_t4` int(11) DEFAULT NULL,
  `ID_t5` int(11) DEFAULT NULL,
  `ID_t6` int(11) DEFAULT NULL,
  `ID_vic1` int(11) DEFAULT NULL,
  `ID_vic2` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `GroupSunday`
--

INSERT INTO `GroupSunday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_vic1`, `ID_vic2`) VALUES
(1, NULL, 44, 45, 46, 50, 53, 54, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `History`
--

CREATE TABLE IF NOT EXISTS `History` (
  `id` int(11) NOT NULL,
  `idPerson` int(11) NOT NULL,
  `idEntite` int(11) NOT NULL,
  `typeEntite` text NOT NULL,
  `action` text NOT NULL,
  `date` date NOT NULL,
  `hour` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1019 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(978, 70, 0, 'Historique', 'Suppression', '2015-11-24', '18:52:19'),
(979, 70, 1, 'Poules (Dimanche)', 'Ajout', '2015-11-24', '18:52:28'),
(980, 70, 153, 'Match', 'Ajout', '2015-11-24', '18:52:28'),
(981, 70, 154, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(982, 70, 155, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(983, 70, 156, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(984, 70, 207, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(985, 70, 208, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(986, 70, 157, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(987, 70, 158, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(988, 70, 159, 'Match', 'Ajout', '2015-11-24', '18:52:29'),
(989, 70, 212, 'Match', 'Ajout', '2015-11-24', '18:52:30'),
(990, 70, 213, 'Match', 'Ajout', '2015-11-24', '18:52:30'),
(991, 70, 160, 'Match', 'Ajout', '2015-11-24', '18:52:30'),
(992, 70, 215, 'Match', 'Ajout', '2015-11-24', '18:52:30'),
(993, 70, 216, 'Match', 'Ajout', '2015-11-24', '18:52:30'),
(994, 70, 217, 'Match', 'Ajout', '2015-11-24', '18:52:30'),
(995, 7, 153, 'Match', 'Ajout', '2015-11-30', '00:09:44'),
(996, 7, 154, 'Match', 'Ajout', '2015-11-30', '00:09:44'),
(997, 7, 155, 'Match', 'Ajout', '2015-11-30', '00:09:44'),
(998, 7, 156, 'Match', 'Ajout', '2015-11-30', '00:09:44'),
(999, 7, 183, 'Match', 'Ajout', '2015-11-30', '00:10:13'),
(1000, 7, 184, 'Match', 'Ajout', '2015-11-30', '00:10:13'),
(1001, 7, 185, 'Match', 'Ajout', '2015-11-30', '00:10:13'),
(1002, 7, 186, 'Match', 'Ajout', '2015-11-30', '00:10:13'),
(1003, 7, 153, 'Match', 'Ajout', '2015-11-30', '00:10:57'),
(1004, 7, 154, 'Match', 'Ajout', '2015-11-30', '00:10:58'),
(1005, 7, 155, 'Match', 'Ajout', '2015-11-30', '00:10:58'),
(1006, 7, 156, 'Match', 'Ajout', '2015-11-30', '00:10:58'),
(1007, 7, 153, 'Match', 'Ajout', '2015-11-30', '14:33:45'),
(1008, 7, 154, 'Match', 'Ajout', '2015-11-30', '14:33:45'),
(1009, 7, 155, 'Match', 'Ajout', '2015-11-30', '14:33:45'),
(1010, 7, 156, 'Match', 'Ajout', '2015-11-30', '14:33:45'),
(1011, 7, 153, 'Match', 'Ajout', '2015-11-30', '14:34:13'),
(1012, 7, 154, 'Match', 'Ajout', '2015-11-30', '14:34:13'),
(1013, 7, 155, 'Match', 'Ajout', '2015-11-30', '14:34:13'),
(1014, 7, 156, 'Match', 'Ajout', '2015-11-30', '14:34:13'),
(1015, 7, 153, 'Match', 'Ajout', '2015-11-30', '14:34:25'),
(1016, 7, 154, 'Match', 'Ajout', '2015-11-30', '14:34:25'),
(1017, 7, 155, 'Match', 'Ajout', '2015-11-30', '14:34:25'),
(1018, 7, 156, 'Match', 'Ajout', '2015-11-30', '14:34:25');

-- --------------------------------------------------------

--
-- Structure de la table `KnockoffSaturday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSaturday` (
  `ID` int(11) NOT NULL,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `KnockoffSunday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSunday` (
  `ID` int(11) NOT NULL,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Match`
--

CREATE TABLE IF NOT EXISTS `Match` (
  `ID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `hour` text,
  `ID_Equipe1` int(11) NOT NULL,
  `ID_Equipe2` int(11) NOT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `ID_Terrain` int(11) DEFAULT NULL,
  `Poule_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(153, '2015-11-24', '17:18', 44, 45, 1, 0, 13, 43),
(154, '2015-11-24', '17:18', 44, 46, 0, 2, 13, 43),
(155, '2015-11-24', '17:18', 44, 50, 1, 21, 13, 43),
(156, '2015-11-24', '17:18', 44, 53, 0, 1, 13, 43),
(157, '2015-11-24', '17:18', 45, 46, 0, 0, 13, 43),
(158, '2015-11-24', '17:18', 45, 50, 0, 0, 13, 43),
(159, '2015-11-24', '17:18', 45, 53, 0, 0, 13, 43),
(160, '2015-11-24', '17:18', 46, 50, 0, 0, 13, 43),
(161, '2015-11-24', '17:18', 46, 53, 0, 0, 13, 43),
(162, '2015-11-24', '17:18', 50, 53, 0, 0, 13, 43),
(163, '2015-11-24', '17:18', 54, 60, 0, 0, 13, 44),
(164, '2015-11-24', '17:18', 54, 61, 0, 0, 13, 44),
(165, '2015-11-24', '17:18', 54, 62, 0, 0, 13, 44),
(166, '2015-11-24', '17:18', 54, 142, 0, 0, 13, 44),
(167, '2015-11-24', '17:18', 60, 61, 0, 0, 13, 44),
(168, '2015-11-24', '17:18', 60, 62, 0, 0, 13, 44),
(169, '2015-11-24', '17:18', 60, 142, 0, 0, 13, 44),
(170, '2015-11-24', '17:18', 61, 62, 0, 0, 13, 44),
(171, '2015-11-24', '17:18', 61, 142, 0, 0, 13, 44),
(172, '2015-11-24', '17:18', 62, 142, 0, 0, 13, 44),
(173, '2015-11-24', '17:18', 143, 144, 0, 0, 13, 45),
(174, '2015-11-24', '17:18', 143, 145, 0, 0, 13, 45),
(175, '2015-11-24', '17:18', 143, 146, 0, 0, 13, 45),
(176, '2015-11-24', '17:18', 143, 147, 0, 0, 13, 45),
(177, '2015-11-24', '17:18', 144, 145, 0, 0, 13, 45),
(178, '2015-11-24', '17:18', 144, 146, 0, 0, 13, 45),
(179, '2015-11-24', '17:18', 144, 147, 0, 0, 13, 45),
(180, '2015-11-24', '17:18', 145, 146, 0, 0, 13, 45),
(181, '2015-11-24', '17:18', 145, 147, 0, 0, 13, 45),
(182, '2015-11-24', '17:18', 146, 147, 0, 0, 13, 45),
(183, '2015-11-24', '17:18', 148, 149, 1, 0, 13, 46),
(184, '2015-11-24', '17:18', 148, 150, 0, 1, 13, 46),
(185, '2015-11-24', '17:18', 148, 151, 1, 0, 13, 46),
(186, '2015-11-24', '17:18', 148, 152, 0, 1, 13, 46),
(187, '2015-11-24', '17:18', 149, 150, 0, 0, 13, 46),
(188, '2015-11-24', '17:18', 149, 151, 0, 0, 13, 46),
(189, '2015-11-24', '17:18', 149, 152, 0, 0, 13, 46),
(190, '2015-11-24', '17:18', 150, 151, 0, 0, 13, 46),
(191, '2015-11-24', '17:18', 150, 152, 0, 0, 13, 46),
(192, '2015-11-24', '17:18', 151, 152, 0, 0, 13, 46),
(193, '2015-11-24', '17:18', 153, 154, 0, 0, 13, 47),
(194, '2015-11-24', '17:18', 153, 155, 0, 0, 13, 47),
(195, '2015-11-24', '17:18', 153, 156, 0, 0, 13, 47),
(196, '2015-11-24', '17:18', 153, 157, 0, 0, 13, 47),
(197, '2015-11-24', '17:18', 154, 155, 0, 0, 13, 47),
(198, '2015-11-24', '17:18', 154, 156, 0, 0, 13, 47),
(199, '2015-11-24', '17:18', 154, 157, 0, 0, 13, 47),
(200, '2015-11-24', '17:18', 155, 156, 0, 0, 13, 47),
(201, '2015-11-24', '17:18', 155, 157, 0, 0, 13, 47),
(202, '2015-11-24', '17:18', 156, 157, 0, 0, 13, 47),
(203, '2015-11-24', '18:52', 44, 45, NULL, NULL, NULL, 1),
(204, '2015-11-24', '18:52', 44, 46, NULL, NULL, NULL, 1),
(205, '2015-11-24', '18:52', 44, 50, NULL, NULL, NULL, 1),
(206, '2015-11-24', '18:52', 44, 53, NULL, NULL, NULL, 1),
(207, '2015-11-24', '18:52', 44, 54, NULL, NULL, NULL, 1),
(208, '2015-11-24', '18:52', 45, 45, NULL, NULL, NULL, 1),
(209, '2015-11-24', '18:52', 45, 46, NULL, NULL, NULL, 1),
(210, '2015-11-24', '18:52', 45, 50, NULL, NULL, NULL, 1),
(211, '2015-11-24', '18:52', 45, 53, NULL, NULL, NULL, 1),
(212, '2015-11-24', '18:52', 46, 45, NULL, NULL, NULL, 1),
(213, '2015-11-24', '18:52', 46, 46, NULL, NULL, NULL, 1),
(214, '2015-11-24', '18:52', 46, 50, NULL, NULL, NULL, 1),
(215, '2015-11-24', '18:52', 50, 45, NULL, NULL, NULL, 1),
(216, '2015-11-24', '18:52', 50, 46, NULL, NULL, NULL, 1),
(217, '2015-11-24', '18:52', 53, 45, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Owner`
--

CREATE TABLE IF NOT EXISTS `Owner` (
  `ID` int(11) NOT NULL,
  `ID_Personne` int(255) NOT NULL,
  `ID_Staff` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(11, 109, 7),
(12, 116, 7),
(13, 307, 7),
(14, 308, 7),
(15, 309, 7),
(16, 310, 7),
(17, 311, 7),
(18, 312, 7),
(19, 313, 7),
(20, 314, 7),
(21, 315, 7),
(22, 316, 7),
(23, 307, 7),
(24, 308, 7),
(25, 309, 7),
(26, 310, 7),
(27, 311, 7),
(28, 312, 7),
(29, 313, 7),
(30, 314, 7),
(31, 315, 7),
(32, 316, 7),
(33, 307, 7),
(34, 308, 7),
(35, 309, 7),
(36, 310, 7),
(37, 311, 7),
(38, 312, 7),
(39, 313, 7),
(40, 314, 7),
(41, 315, 7),
(42, 316, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `ID` int(255) NOT NULL,
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
  `IsStaff` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=657 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Personne`
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
(128, 1, 'Sylvie', 'Vivi', '12 rue de la secousse', 21000, '700', 0, 2147483647, 678896745, '1971-01-04', 'b.s@gmail.com', '2015-11-12', 'J''aime les frites', 1, 0, 0),
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
(144, 1, 'f1', 'l1', 'ville', 0, 'rue', 0, 0, 0, '2015-11-02', 'mail', '2015-11-03', 'note', 1, 0, 0),
(145, 1, 'Misa', 'Moka', 'Mouch', 7578, '75', 0, 335465468, 335465468, '2011-04-04', 'lzefjzf@ldgzj.com', '2015-11-18', '', 1, 0, 0),
(146, 0, 'Misa2', 'Moka2', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '2004-09-06', 'pikapika@hotmail.com', '2015-11-18', '', 1, 0, 0),
(147, 1, 'JoueurP0', 'NameP0', 'Rue0', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-24', '', 1, 0, 0),
(148, 1, 'JoueurP1', 'NameP1', 'Rue1', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-24', '', 1, 0, 0),
(149, 1, 'JoueurP2', 'NameP2', 'Rue2', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-24', '', 1, 0, 0),
(150, 1, 'JoueurP3', 'NameP3', 'Rue3', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-24', '', 1, 0, 0),
(151, 1, 'JoueurP4', 'NameP4', 'Rue4', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-24', '', 1, 0, 0),
(152, 1, 'JoueurP5', 'NameP5', 'Rue5', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-24', '', 1, 0, 0),
(153, 1, 'JoueurP6', 'NameP6', 'Rue6', 1000, '1', 0, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-24', '', 1, 0, 0),
(154, 1, 'JoueurP7', 'NameP7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(155, 1, 'JoueurP8', 'NameP8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(156, 1, 'JoueurP9', 'NameP9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(157, 1, 'JoueurP10', 'NameP10', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1985-01-01', '10address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(158, 1, 'JoueurP11', 'NameP11', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1985-01-01', '11address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(159, 1, 'JoueurP12', 'NameP12', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '1985-01-01', '12address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(160, 1, 'JoueurP13', 'NameP13', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '1985-01-01', '13address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(161, 1, 'JoueurP14', 'NameP14', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '1985-01-01', '14address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(162, 1, 'JoueurP15', 'NameP15', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1985-01-01', '15address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(163, 1, 'JoueurP16', 'NameP16', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '1985-01-01', '16address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(164, 1, 'JoueurP17', 'NameP17', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1985-01-01', '17address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(165, 1, 'JoueurP18', 'NameP18', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '1985-01-01', '18address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(166, 1, 'JoueurP19', 'NameP19', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '1985-01-01', '19address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(167, 1, 'JoueurP20', 'NameP20', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1985-01-01', '20address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(168, 1, 'JoueurP21', 'NameP21', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '1985-01-01', '21address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(169, 1, 'JoueurP22', 'NameP22', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1985-01-01', '22address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(170, 1, 'JoueurP23', 'NameP23', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1985-01-01', '23address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(171, 1, 'JoueurP24', 'NameP24', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '1985-01-01', '24address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(172, 1, 'JoueurP25', 'NameP25', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '1985-01-01', '25address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(173, 1, 'JoueurP26', 'NameP26', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1985-01-01', '26address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(174, 1, 'JoueurP27', 'NameP27', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1985-01-01', '27address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(175, 1, 'JoueurP28', 'NameP28', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1985-01-01', '28address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(176, 1, 'JoueurP29', 'NameP29', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1985-01-01', '29address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(177, 1, 'JoueurP30', 'NameP30', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '1985-01-01', '30address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(178, 1, 'JoueurP31', 'NameP31', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '1985-01-01', '31address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(179, 1, 'JoueurP32', 'NameP32', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1985-01-01', '32address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(180, 1, 'JoueurP33', 'NameP33', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1985-01-01', '33address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(181, 1, 'JoueurP34', 'NameP34', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '1985-01-01', '34address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(182, 1, 'JoueurP35', 'NameP35', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1985-01-01', '35address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(183, 1, 'JoueurP36', 'NameP36', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1985-01-01', '36address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(184, 1, 'JoueurP37', 'NameP37', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1985-01-01', '37address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(185, 1, 'JoueurP38', 'NameP38', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1985-01-01', '38address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(186, 1, 'JoueurP39', 'NameP39', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1985-01-01', '39address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(187, 1, 'JoueurP40', 'NameP40', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '1985-01-01', '40address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(188, 1, 'JoueurP41', 'NameP41', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1985-01-01', '41address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(189, 1, 'JoueurP42', 'NameP42', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '1985-01-01', '42address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(190, 1, 'JoueurP43', 'NameP43', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '1985-01-01', '43address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(191, 1, 'JoueurP44', 'NameP44', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '1985-01-01', '44address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(192, 1, 'JoueurP45', 'NameP45', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1985-01-01', '45address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(193, 1, 'JoueurP46', 'NameP46', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1985-01-01', '46address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(194, 1, 'JoueurP47', 'NameP47', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1985-01-01', '47address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(195, 1, 'JoueurP48', 'NameP48', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '1985-01-01', '48address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(196, 1, 'JoueurP49', 'NameP49', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '1985-01-01', '49address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(197, 1, 'JoueurP50', 'NameP50', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '1985-01-01', '50address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(198, 1, 'JoueurP51', 'NameP51', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '1985-01-01', '51address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(199, 1, 'JoueurP52', 'NameP52', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1985-01-01', '52address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(200, 1, 'JoueurP53', 'NameP53', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1985-01-01', '53address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(201, 1, 'JoueurP54', 'NameP54', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1985-01-01', '54address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(202, 1, 'JoueurP55', 'NameP55', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1985-01-01', '55address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(203, 1, 'JoueurP56', 'NameP56', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1985-01-01', '56address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(204, 1, 'JoueurP57', 'NameP57', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1985-01-01', '57address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(205, 1, 'JoueurP58', 'NameP58', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1985-01-01', '58address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(206, 1, 'JoueurP59', 'NameP59', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1985-01-01', '59address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(207, 1, 'JoueurP60', 'NameP60', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1985-01-01', '60address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(208, 1, 'JoueurP61', 'NameP61', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1985-01-01', '61address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(209, 1, 'JoueurP62', 'NameP62', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '1985-01-01', '62address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(210, 1, 'JoueurP63', 'NameP63', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1985-01-01', '63address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(211, 1, 'JoueurP64', 'NameP64', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1985-01-01', '64address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(212, 1, 'JoueurP65', 'NameP65', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1985-01-01', '65address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(213, 1, 'JoueurP66', 'NameP66', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '1985-01-01', '66address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(214, 1, 'JoueurP67', 'NameP67', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1985-01-01', '67address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(215, 1, 'JoueurP68', 'NameP68', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1985-01-01', '68address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(216, 1, 'JoueurP69', 'NameP69', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1985-01-01', '69address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(217, 1, 'JoueurP70', 'NameP70', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1985-01-01', '70address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(218, 1, 'JoueurP71', 'NameP71', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1985-01-01', '71address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(219, 1, 'JoueurP72', 'NameP72', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1985-01-01', '72address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(220, 1, 'JoueurP73', 'NameP73', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1985-01-01', '73address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(221, 1, 'JoueurP74', 'NameP74', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1985-01-01', '74address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(222, 1, 'JoueurP75', 'NameP75', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1985-01-01', '75address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(223, 1, 'JoueurP76', 'NameP76', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1985-01-01', '76address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(224, 1, 'JoueurP77', 'NameP77', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1985-01-01', '77address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(225, 1, 'JoueurP78', 'NameP78', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1985-01-01', '78address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(226, 1, 'JoueurP79', 'NameP79', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '1985-01-01', '79address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(227, 1, 'JoueurP80', 'NameP80', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1985-01-01', '80address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(228, 1, 'JoueurP81', 'NameP81', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1985-01-01', '81address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(229, 1, 'JoueurP82', 'NameP82', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1985-01-01', '82address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(230, 1, 'JoueurP83', 'NameP83', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1985-01-01', '83address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(231, 1, 'JoueurP84', 'NameP84', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '1985-01-01', '84address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(232, 1, 'JoueurP85', 'NameP85', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1985-01-01', '85address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(233, 1, 'JoueurP86', 'NameP86', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1985-01-01', '86address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(234, 1, 'JoueurP87', 'NameP87', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '1985-01-01', '87address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(235, 1, 'JoueurP88', 'NameP88', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '1985-01-01', '88address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(236, 1, 'JoueurP89', 'NameP89', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '1985-01-01', '89address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(237, 1, 'JoueurP90', 'NameP90', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1985-01-01', '90address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(238, 1, 'JoueurP91', 'NameP91', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '1985-01-01', '91address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(239, 1, 'JoueurP92', 'NameP92', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1985-01-01', '92address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(240, 1, 'JoueurP93', 'NameP93', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '1985-01-01', '93address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(241, 1, 'JoueurP94', 'NameP94', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '1985-01-01', '94address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(242, 1, 'JoueurP95', 'NameP95', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '1985-01-01', '95address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(243, 1, 'JoueurP96', 'NameP96', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1985-01-01', '96address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(244, 1, 'JoueurP97', 'NameP97', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1985-01-01', '97address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(245, 1, 'JoueurP98', 'NameP98', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '1985-01-01', '98address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(246, 1, 'JoueurP99', 'NameP99', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1985-01-01', '99address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(247, 1, 'JoueurP100', 'NameP100', 'Ville100', 1000, 'Rue100', 1, 600000000, 600000000, '1985-01-01', '100address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(248, 1, 'JoueurP101', 'NameP101', 'Ville101', 1000, 'Rue101', 1, 600000000, 600000000, '1985-01-01', '101address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(249, 1, 'JoueurP102', 'NameP102', 'Ville102', 1000, 'Rue102', 1, 600000000, 600000000, '1985-01-01', '102address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(250, 1, 'JoueurP103', 'NameP103', 'Ville103', 1000, 'Rue103', 1, 600000000, 600000000, '1985-01-01', '103address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(251, 1, 'JoueurP104', 'NameP104', 'Ville104', 1000, 'Rue104', 1, 600000000, 600000000, '1985-01-01', '104address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(252, 1, 'JoueurP105', 'NameP105', 'Ville105', 1000, 'Rue105', 1, 600000000, 600000000, '1985-01-01', '105address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(253, 1, 'JoueurP106', 'NameP106', 'Ville106', 1000, 'Rue106', 1, 600000000, 600000000, '1985-01-01', '106address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(254, 1, 'JoueurP107', 'NameP107', 'Ville107', 1000, 'Rue107', 1, 600000000, 600000000, '1985-01-01', '107address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(255, 1, 'JoueurP108', 'NameP108', 'Ville108', 1000, 'Rue108', 1, 600000000, 600000000, '1985-01-01', '108address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(256, 1, 'JoueurP109', 'NameP109', 'Ville109', 1000, 'Rue109', 1, 600000000, 600000000, '1985-01-01', '109address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(257, 1, 'JoueurP110', 'NameP110', 'Ville110', 1000, 'Rue110', 1, 600000000, 600000000, '1985-01-01', '110address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(258, 1, 'JoueurP111', 'NameP111', 'Ville111', 1000, 'Rue111', 1, 600000000, 600000000, '1985-01-01', '111address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(259, 1, 'JoueurP112', 'NameP112', 'Ville112', 1000, 'Rue112', 1, 600000000, 600000000, '1985-01-01', '112address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(260, 1, 'JoueurP113', 'NameP113', 'Ville113', 1000, 'Rue113', 1, 600000000, 600000000, '1985-01-01', '113address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(261, 1, 'JoueurP114', 'NameP114', 'Ville114', 1000, 'Rue114', 1, 600000000, 600000000, '1985-01-01', '114address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(262, 1, 'JoueurP115', 'NameP115', 'Ville115', 1000, 'Rue115', 1, 600000000, 600000000, '1985-01-01', '115address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(263, 1, 'JoueurP116', 'NameP116', 'Ville116', 1000, 'Rue116', 1, 600000000, 600000000, '1985-01-01', '116address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(264, 1, 'JoueurP117', 'NameP117', 'Ville117', 1000, 'Rue117', 1, 600000000, 600000000, '1985-01-01', '117address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(265, 1, 'JoueurP118', 'NameP118', 'Ville118', 1000, 'Rue118', 1, 600000000, 600000000, '1985-01-01', '118address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(266, 1, 'JoueurP119', 'NameP119', 'Ville119', 1000, 'Rue119', 1, 600000000, 600000000, '1985-01-01', '119address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(267, 1, 'JoueurP120', 'NameP120', 'Ville120', 1000, 'Rue120', 1, 600000000, 600000000, '1985-01-01', '120address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(268, 1, 'JoueurP121', 'NameP121', 'Ville121', 1000, 'Rue121', 1, 600000000, 600000000, '1985-01-01', '121address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(269, 1, 'JoueurP122', 'NameP122', 'Ville122', 1000, 'Rue122', 1, 600000000, 600000000, '1985-01-01', '122address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(270, 1, 'JoueurP123', 'NameP123', 'Ville123', 1000, 'Rue123', 1, 600000000, 600000000, '1985-01-01', '123address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(271, 1, 'JoueurP124', 'NameP124', 'Ville124', 1000, 'Rue124', 1, 600000000, 600000000, '1985-01-01', '124address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(272, 1, 'JoueurP125', 'NameP125', 'Ville125', 1000, 'Rue125', 1, 600000000, 600000000, '1985-01-01', '125address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(273, 1, 'JoueurP126', 'NameP126', 'Ville126', 1000, 'Rue126', 1, 600000000, 600000000, '1985-01-01', '126address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(274, 1, 'JoueurP127', 'NameP127', 'Ville127', 1000, 'Rue127', 1, 600000000, 600000000, '1985-01-01', '127address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(275, 1, 'JoueurP128', 'NameP128', 'Ville128', 1000, 'Rue128', 1, 600000000, 600000000, '1985-01-01', '128address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(276, 1, 'JoueurP129', 'NameP129', 'Ville129', 1000, 'Rue129', 1, 600000000, 600000000, '1985-01-01', '129address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(277, 1, 'JoueurP130', 'NameP130', 'Ville130', 1000, 'Rue130', 1, 600000000, 600000000, '1985-01-01', '130address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(278, 1, 'JoueurP131', 'NameP131', 'Ville131', 1000, 'Rue131', 1, 600000000, 600000000, '1985-01-01', '131address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(279, 1, 'JoueurP132', 'NameP132', 'Ville132', 1000, 'Rue132', 1, 600000000, 600000000, '1985-01-01', '132address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(280, 1, 'JoueurP133', 'NameP133', 'Ville133', 1000, 'Rue133', 1, 600000000, 600000000, '1985-01-01', '133address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(281, 1, 'JoueurP134', 'NameP134', 'Ville134', 1000, 'Rue134', 1, 600000000, 600000000, '1985-01-01', '134address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(282, 1, 'JoueurP135', 'NameP135', 'Ville135', 1000, 'Rue135', 1, 600000000, 600000000, '1985-01-01', '135address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(283, 1, 'JoueurP136', 'NameP136', 'Ville136', 1000, 'Rue136', 1, 600000000, 600000000, '1985-01-01', '136address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(284, 1, 'JoueurP137', 'NameP137', 'Ville137', 1000, 'Rue137', 1, 600000000, 600000000, '1985-01-01', '137address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(285, 1, 'JoueurP138', 'NameP138', 'Ville138', 1000, 'Rue138', 1, 600000000, 600000000, '1985-01-01', '138address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(286, 1, 'JoueurP139', 'NameP139', 'Ville139', 1000, 'Rue139', 1, 600000000, 600000000, '1985-01-01', '139address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(287, 1, 'JoueurP140', 'NameP140', 'Ville140', 1000, 'Rue140', 1, 600000000, 600000000, '1985-01-01', '140address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(288, 1, 'JoueurP141', 'NameP141', 'Ville141', 1000, 'Rue141', 1, 600000000, 600000000, '1985-01-01', '141address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(289, 1, 'JoueurP142', 'NameP142', 'Ville142', 1000, 'Rue142', 1, 600000000, 600000000, '1985-01-01', '142address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(290, 1, 'JoueurP143', 'NameP143', 'Ville143', 1000, 'Rue143', 1, 600000000, 600000000, '1985-01-01', '143address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(291, 1, 'JoueurP144', 'NameP144', 'Ville144', 1000, 'Rue144', 1, 600000000, 600000000, '1985-01-01', '144address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(292, 1, 'JoueurP145', 'NameP145', 'Ville145', 1000, 'Rue145', 1, 600000000, 600000000, '1985-01-01', '145address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(293, 1, 'JoueurP146', 'NameP146', 'Ville146', 1000, 'Rue146', 1, 600000000, 600000000, '1985-01-01', '146address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(294, 1, 'JoueurP147', 'NameP147', 'Ville147', 1000, 'Rue147', 1, 600000000, 600000000, '1985-01-01', '147address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(295, 1, 'JoueurP148', 'NameP148', 'Ville148', 1000, 'Rue148', 1, 600000000, 600000000, '1985-01-01', '148address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(296, 1, 'JoueurP149', 'NameP149', 'Ville149', 1000, 'Rue149', 1, 600000000, 600000000, '1985-01-01', '149address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(297, 1, 'JoueurP150', 'NameP150', 'Ville150', 1000, 'Rue150', 1, 600000000, 600000000, '1985-01-01', '150address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(298, 1, 'JoueurP151', 'NameP151', 'Ville151', 1000, 'Rue151', 1, 600000000, 600000000, '1985-01-01', '151address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(299, 1, 'JoueurP152', 'NameP152', 'Ville152', 1000, 'Rue152', 1, 600000000, 600000000, '1985-01-01', '152address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(300, 1, 'JoueurP153', 'NameP153', 'Ville153', 1000, 'Rue153', 1, 600000000, 600000000, '1985-01-01', '153address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(301, 1, 'JoueurP154', 'NameP154', 'Ville154', 1000, 'Rue154', 1, 600000000, 600000000, '1985-01-01', '154address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(302, 1, 'JoueurP155', 'NameP155', 'Ville155', 1000, 'Rue155', 1, 600000000, 600000000, '1985-01-01', '155address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(303, 1, 'JoueurP156', 'NameP156', 'Ville156', 1000, 'Rue156', 1, 600000000, 600000000, '1985-01-01', '156address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(304, 1, 'JoueurP157', 'NameP157', 'Ville157', 1000, 'Rue157', 1, 600000000, 600000000, '1985-01-01', '157address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(305, 1, 'JoueurP158', 'NameP158', 'Ville158', 1000, 'Rue158', 1, 600000000, 600000000, '1985-01-01', '158address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(306, 1, 'JoueurP159', 'NameP159', 'Ville159', 1000, 'Rue159', 1, 600000000, 600000000, '1985-01-01', '159address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(307, 1, 'JoueurO0', 'NameO0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(308, 1, 'JoueurO1', 'NameO1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(309, 1, 'JoueurO2', 'NameO2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(310, 1, 'JoueurO3', 'NameO3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(311, 1, 'JoueurO4', 'NameO4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(312, 1, 'JoueurO5', 'NameO5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(313, 1, 'JoueurO6', 'NameO6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(314, 1, 'JoueurO7', 'NameO7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(315, 1, 'JoueurO8', 'NameO8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(316, 1, 'JoueurO9', 'NameO9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(317, 1, 'JoueurP0', 'NameP0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(318, 1, 'JoueurP1', 'NameP1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(319, 1, 'JoueurP2', 'NameP2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(320, 1, 'JoueurP3', 'NameP3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(321, 1, 'JoueurP4', 'NameP4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(322, 1, 'JoueurP5', 'NameP5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(323, 1, 'JoueurP6', 'NameP6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(324, 1, 'JoueurP7', 'NameP7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(325, 1, 'JoueurP8', 'NameP8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(326, 1, 'JoueurP9', 'NameP9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(327, 1, 'JoueurP10', 'NameP10', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1985-01-01', '10address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(328, 1, 'JoueurP11', 'NameP11', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1985-01-01', '11address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(329, 1, 'JoueurP12', 'NameP12', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '1985-01-01', '12address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(330, 1, 'JoueurP13', 'NameP13', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '1985-01-01', '13address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(331, 1, 'JoueurP14', 'NameP14', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '1985-01-01', '14address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(332, 1, 'JoueurP15', 'NameP15', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1985-01-01', '15address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(333, 1, 'JoueurP16', 'NameP16', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '1985-01-01', '16address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(334, 1, 'JoueurP17', 'NameP17', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1985-01-01', '17address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(335, 1, 'JoueurP18', 'NameP18', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '1985-01-01', '18address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(336, 1, 'JoueurP19', 'NameP19', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '1985-01-01', '19address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(337, 1, 'JoueurP20', 'NameP20', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1985-01-01', '20address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(338, 1, 'JoueurP21', 'NameP21', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '1985-01-01', '21address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(339, 1, 'JoueurP22', 'NameP22', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1985-01-01', '22address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(340, 1, 'JoueurP23', 'NameP23', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1985-01-01', '23address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(341, 1, 'JoueurP24', 'NameP24', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '1985-01-01', '24address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(342, 1, 'JoueurP25', 'NameP25', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '1985-01-01', '25address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(343, 1, 'JoueurP26', 'NameP26', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1985-01-01', '26address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(344, 1, 'JoueurP27', 'NameP27', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1985-01-01', '27address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(345, 1, 'JoueurP28', 'NameP28', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1985-01-01', '28address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(346, 1, 'JoueurP29', 'NameP29', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1985-01-01', '29address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(347, 1, 'JoueurP30', 'NameP30', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '1985-01-01', '30address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(348, 1, 'JoueurP31', 'NameP31', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '1985-01-01', '31address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(349, 1, 'JoueurP32', 'NameP32', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1985-01-01', '32address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(350, 1, 'JoueurP33', 'NameP33', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1985-01-01', '33address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(351, 1, 'JoueurP34', 'NameP34', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '1985-01-01', '34address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(352, 1, 'JoueurP35', 'NameP35', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1985-01-01', '35address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(353, 1, 'JoueurP36', 'NameP36', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1985-01-01', '36address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(354, 1, 'JoueurP37', 'NameP37', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1985-01-01', '37address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(355, 1, 'JoueurP38', 'NameP38', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1985-01-01', '38address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(356, 1, 'JoueurP39', 'NameP39', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1985-01-01', '39address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(357, 1, 'JoueurP40', 'NameP40', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '1985-01-01', '40address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(358, 1, 'JoueurP41', 'NameP41', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1985-01-01', '41address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(359, 1, 'JoueurP42', 'NameP42', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '1985-01-01', '42address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(360, 1, 'JoueurP43', 'NameP43', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '1985-01-01', '43address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(361, 1, 'JoueurP44', 'NameP44', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '1985-01-01', '44address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(362, 1, 'JoueurP45', 'NameP45', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1985-01-01', '45address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(363, 1, 'JoueurP46', 'NameP46', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1985-01-01', '46address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(364, 1, 'JoueurP47', 'NameP47', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1985-01-01', '47address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(365, 1, 'JoueurP48', 'NameP48', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '1985-01-01', '48address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(366, 1, 'JoueurP49', 'NameP49', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '1985-01-01', '49address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(367, 1, 'JoueurP50', 'NameP50', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '1985-01-01', '50address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(368, 1, 'JoueurP51', 'NameP51', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '1985-01-01', '51address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(369, 1, 'JoueurP52', 'NameP52', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1985-01-01', '52address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(370, 1, 'JoueurP53', 'NameP53', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1985-01-01', '53address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(371, 1, 'JoueurP54', 'NameP54', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1985-01-01', '54address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(372, 1, 'JoueurP55', 'NameP55', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1985-01-01', '55address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(373, 1, 'JoueurP56', 'NameP56', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1985-01-01', '56address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(374, 1, 'JoueurP57', 'NameP57', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1985-01-01', '57address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(375, 1, 'JoueurP58', 'NameP58', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1985-01-01', '58address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(376, 1, 'JoueurP59', 'NameP59', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1985-01-01', '59address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(377, 1, 'JoueurP60', 'NameP60', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1985-01-01', '60address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(378, 1, 'JoueurP61', 'NameP61', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1985-01-01', '61address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(379, 1, 'JoueurP62', 'NameP62', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '1985-01-01', '62address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(380, 1, 'JoueurP63', 'NameP63', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1985-01-01', '63address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(381, 1, 'JoueurP64', 'NameP64', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1985-01-01', '64address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(382, 1, 'JoueurP65', 'NameP65', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1985-01-01', '65address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(383, 1, 'JoueurP66', 'NameP66', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '1985-01-01', '66address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(384, 1, 'JoueurP67', 'NameP67', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1985-01-01', '67address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(385, 1, 'JoueurP68', 'NameP68', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1985-01-01', '68address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(386, 1, 'JoueurP69', 'NameP69', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1985-01-01', '69address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(387, 1, 'JoueurP70', 'NameP70', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1985-01-01', '70address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(388, 1, 'JoueurP71', 'NameP71', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1985-01-01', '71address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(389, 1, 'JoueurP72', 'NameP72', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1985-01-01', '72address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(390, 1, 'JoueurP73', 'NameP73', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1985-01-01', '73address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(391, 1, 'JoueurP74', 'NameP74', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1985-01-01', '74address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(392, 1, 'JoueurP75', 'NameP75', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1985-01-01', '75address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(393, 1, 'JoueurP76', 'NameP76', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1985-01-01', '76address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(394, 1, 'JoueurP77', 'NameP77', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1985-01-01', '77address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(395, 1, 'JoueurP78', 'NameP78', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1985-01-01', '78address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(396, 1, 'JoueurP79', 'NameP79', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '1985-01-01', '79address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(397, 1, 'JoueurP0', 'NameP0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(398, 1, 'JoueurP80', 'NameP80', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1985-01-01', '80address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(399, 1, 'JoueurP1', 'NameP1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(400, 1, 'JoueurP81', 'NameP81', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1985-01-01', '81address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(401, 1, 'JoueurP2', 'NameP2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(402, 1, 'JoueurP82', 'NameP82', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1985-01-01', '82address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(403, 1, 'JoueurP3', 'NameP3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(404, 1, 'JoueurP83', 'NameP83', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1985-01-01', '83address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(405, 1, 'JoueurP4', 'NameP4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(406, 1, 'JoueurP84', 'NameP84', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '1985-01-01', '84address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(407, 1, 'JoueurP5', 'NameP5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(408, 1, 'JoueurP85', 'NameP85', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1985-01-01', '85address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(409, 1, 'JoueurP6', 'NameP6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(410, 1, 'JoueurP86', 'NameP86', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1985-01-01', '86address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(411, 1, 'JoueurP7', 'NameP7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(412, 1, 'JoueurP87', 'NameP87', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '1985-01-01', '87address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(413, 1, 'JoueurP8', 'NameP8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(414, 1, 'JoueurP88', 'NameP88', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '1985-01-01', '88address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(415, 1, 'JoueurP9', 'NameP9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(416, 1, 'JoueurP89', 'NameP89', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '1985-01-01', '89address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(417, 1, 'JoueurP10', 'NameP10', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1985-01-01', '10address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(418, 1, 'JoueurP90', 'NameP90', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1985-01-01', '90address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(419, 1, 'JoueurP11', 'NameP11', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1985-01-01', '11address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(420, 1, 'JoueurP91', 'NameP91', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '1985-01-01', '91address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(421, 1, 'JoueurP12', 'NameP12', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '1985-01-01', '12address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(422, 1, 'JoueurP92', 'NameP92', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1985-01-01', '92address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(423, 1, 'JoueurP13', 'NameP13', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '1985-01-01', '13address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(424, 1, 'JoueurP93', 'NameP93', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '1985-01-01', '93address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(425, 1, 'JoueurP14', 'NameP14', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '1985-01-01', '14address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(426, 1, 'JoueurP94', 'NameP94', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '1985-01-01', '94address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(427, 1, 'JoueurP15', 'NameP15', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1985-01-01', '15address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(428, 1, 'JoueurP95', 'NameP95', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '1985-01-01', '95address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(429, 1, 'JoueurP16', 'NameP16', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '1985-01-01', '16address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(430, 1, 'JoueurP96', 'NameP96', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1985-01-01', '96address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(431, 1, 'JoueurP17', 'NameP17', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1985-01-01', '17address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(432, 1, 'JoueurP97', 'NameP97', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1985-01-01', '97address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(433, 1, 'JoueurP18', 'NameP18', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '1985-01-01', '18address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(434, 1, 'JoueurP98', 'NameP98', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '1985-01-01', '98address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(435, 1, 'JoueurP19', 'NameP19', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '1985-01-01', '19address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(436, 1, 'JoueurP99', 'NameP99', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1985-01-01', '99address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(437, 1, 'JoueurP20', 'NameP20', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1985-01-01', '20address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(438, 1, 'JoueurP100', 'NameP100', 'Ville100', 1000, 'Rue100', 1, 600000000, 600000000, '1985-01-01', '100address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(439, 1, 'JoueurP21', 'NameP21', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '1985-01-01', '21address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(440, 1, 'JoueurP101', 'NameP101', 'Ville101', 1000, 'Rue101', 1, 600000000, 600000000, '1985-01-01', '101address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(441, 1, 'JoueurP22', 'NameP22', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1985-01-01', '22address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(442, 1, 'JoueurP102', 'NameP102', 'Ville102', 1000, 'Rue102', 1, 600000000, 600000000, '1985-01-01', '102address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(443, 1, 'JoueurP23', 'NameP23', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1985-01-01', '23address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(444, 1, 'JoueurP103', 'NameP103', 'Ville103', 1000, 'Rue103', 1, 600000000, 600000000, '1985-01-01', '103address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(445, 1, 'JoueurP24', 'NameP24', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '1985-01-01', '24address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0);
INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(446, 1, 'JoueurP104', 'NameP104', 'Ville104', 1000, 'Rue104', 1, 600000000, 600000000, '1985-01-01', '104address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(447, 1, 'JoueurP25', 'NameP25', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '1985-01-01', '25address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(448, 1, 'JoueurP105', 'NameP105', 'Ville105', 1000, 'Rue105', 1, 600000000, 600000000, '1985-01-01', '105address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(449, 1, 'JoueurP26', 'NameP26', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1985-01-01', '26address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(450, 1, 'JoueurP106', 'NameP106', 'Ville106', 1000, 'Rue106', 1, 600000000, 600000000, '1985-01-01', '106address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(451, 1, 'JoueurP27', 'NameP27', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1985-01-01', '27address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(452, 1, 'JoueurP107', 'NameP107', 'Ville107', 1000, 'Rue107', 1, 600000000, 600000000, '1985-01-01', '107address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(453, 1, 'JoueurP28', 'NameP28', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1985-01-01', '28address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(454, 1, 'JoueurP108', 'NameP108', 'Ville108', 1000, 'Rue108', 1, 600000000, 600000000, '1985-01-01', '108address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(455, 1, 'JoueurP29', 'NameP29', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1985-01-01', '29address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(456, 1, 'JoueurP109', 'NameP109', 'Ville109', 1000, 'Rue109', 1, 600000000, 600000000, '1985-01-01', '109address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(457, 1, 'JoueurP30', 'NameP30', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '1985-01-01', '30address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(458, 1, 'JoueurP110', 'NameP110', 'Ville110', 1000, 'Rue110', 1, 600000000, 600000000, '1985-01-01', '110address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(459, 1, 'JoueurP31', 'NameP31', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '1985-01-01', '31address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(460, 1, 'JoueurP111', 'NameP111', 'Ville111', 1000, 'Rue111', 1, 600000000, 600000000, '1985-01-01', '111address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(461, 1, 'JoueurP32', 'NameP32', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1985-01-01', '32address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(462, 1, 'JoueurP112', 'NameP112', 'Ville112', 1000, 'Rue112', 1, 600000000, 600000000, '1985-01-01', '112address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(463, 1, 'JoueurP113', 'NameP113', 'Ville113', 1000, 'Rue113', 1, 600000000, 600000000, '1985-01-01', '113address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(464, 1, 'JoueurP33', 'NameP33', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1985-01-01', '33address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(465, 1, 'JoueurP114', 'NameP114', 'Ville114', 1000, 'Rue114', 1, 600000000, 600000000, '1985-01-01', '114address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(466, 1, 'JoueurP34', 'NameP34', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '1985-01-01', '34address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(467, 1, 'JoueurP115', 'NameP115', 'Ville115', 1000, 'Rue115', 1, 600000000, 600000000, '1985-01-01', '115address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(468, 1, 'JoueurP35', 'NameP35', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1985-01-01', '35address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(469, 1, 'JoueurP116', 'NameP116', 'Ville116', 1000, 'Rue116', 1, 600000000, 600000000, '1985-01-01', '116address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(470, 1, 'JoueurP36', 'NameP36', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1985-01-01', '36address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(471, 1, 'JoueurP117', 'NameP117', 'Ville117', 1000, 'Rue117', 1, 600000000, 600000000, '1985-01-01', '117address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(472, 1, 'JoueurP37', 'NameP37', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1985-01-01', '37address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(473, 1, 'JoueurP118', 'NameP118', 'Ville118', 1000, 'Rue118', 1, 600000000, 600000000, '1985-01-01', '118address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(474, 1, 'JoueurP38', 'NameP38', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1985-01-01', '38address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(475, 1, 'JoueurP119', 'NameP119', 'Ville119', 1000, 'Rue119', 1, 600000000, 600000000, '1985-01-01', '119address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(476, 1, 'JoueurP39', 'NameP39', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1985-01-01', '39address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(477, 1, 'JoueurP120', 'NameP120', 'Ville120', 1000, 'Rue120', 1, 600000000, 600000000, '1985-01-01', '120address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(478, 1, 'JoueurP40', 'NameP40', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '1985-01-01', '40address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(479, 1, 'JoueurP121', 'NameP121', 'Ville121', 1000, 'Rue121', 1, 600000000, 600000000, '1985-01-01', '121address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(480, 1, 'JoueurP41', 'NameP41', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1985-01-01', '41address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(481, 1, 'JoueurP122', 'NameP122', 'Ville122', 1000, 'Rue122', 1, 600000000, 600000000, '1985-01-01', '122address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(482, 1, 'JoueurP42', 'NameP42', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '1985-01-01', '42address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(483, 1, 'JoueurP123', 'NameP123', 'Ville123', 1000, 'Rue123', 1, 600000000, 600000000, '1985-01-01', '123address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(484, 1, 'JoueurP43', 'NameP43', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '1985-01-01', '43address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(485, 1, 'JoueurP124', 'NameP124', 'Ville124', 1000, 'Rue124', 1, 600000000, 600000000, '1985-01-01', '124address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(486, 1, 'JoueurP44', 'NameP44', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '1985-01-01', '44address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(487, 1, 'JoueurP125', 'NameP125', 'Ville125', 1000, 'Rue125', 1, 600000000, 600000000, '1985-01-01', '125address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(488, 1, 'JoueurP45', 'NameP45', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1985-01-01', '45address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(489, 1, 'JoueurP126', 'NameP126', 'Ville126', 1000, 'Rue126', 1, 600000000, 600000000, '1985-01-01', '126address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(490, 1, 'JoueurP46', 'NameP46', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1985-01-01', '46address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(491, 1, 'JoueurP127', 'NameP127', 'Ville127', 1000, 'Rue127', 1, 600000000, 600000000, '1985-01-01', '127address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(492, 1, 'JoueurP47', 'NameP47', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1985-01-01', '47address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(493, 1, 'JoueurP128', 'NameP128', 'Ville128', 1000, 'Rue128', 1, 600000000, 600000000, '1985-01-01', '128address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(494, 1, 'JoueurP48', 'NameP48', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '1985-01-01', '48address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(495, 1, 'JoueurP129', 'NameP129', 'Ville129', 1000, 'Rue129', 1, 600000000, 600000000, '1985-01-01', '129address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(496, 1, 'JoueurP49', 'NameP49', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '1985-01-01', '49address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(497, 1, 'JoueurP130', 'NameP130', 'Ville130', 1000, 'Rue130', 1, 600000000, 600000000, '1985-01-01', '130address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(498, 1, 'JoueurP50', 'NameP50', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '1985-01-01', '50address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(499, 1, 'JoueurP131', 'NameP131', 'Ville131', 1000, 'Rue131', 1, 600000000, 600000000, '1985-01-01', '131address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(500, 1, 'JoueurP51', 'NameP51', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '1985-01-01', '51address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(501, 1, 'JoueurP132', 'NameP132', 'Ville132', 1000, 'Rue132', 1, 600000000, 600000000, '1985-01-01', '132address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(502, 1, 'JoueurP52', 'NameP52', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1985-01-01', '52address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(503, 1, 'JoueurP133', 'NameP133', 'Ville133', 1000, 'Rue133', 1, 600000000, 600000000, '1985-01-01', '133address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(504, 1, 'JoueurP53', 'NameP53', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1985-01-01', '53address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(505, 1, 'JoueurP134', 'NameP134', 'Ville134', 1000, 'Rue134', 1, 600000000, 600000000, '1985-01-01', '134address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(506, 1, 'JoueurP54', 'NameP54', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1985-01-01', '54address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(507, 1, 'JoueurP135', 'NameP135', 'Ville135', 1000, 'Rue135', 1, 600000000, 600000000, '1985-01-01', '135address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(508, 1, 'JoueurP55', 'NameP55', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1985-01-01', '55address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(509, 1, 'JoueurP136', 'NameP136', 'Ville136', 1000, 'Rue136', 1, 600000000, 600000000, '1985-01-01', '136address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(510, 1, 'JoueurP56', 'NameP56', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1985-01-01', '56address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(511, 1, 'JoueurP137', 'NameP137', 'Ville137', 1000, 'Rue137', 1, 600000000, 600000000, '1985-01-01', '137address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(512, 1, 'JoueurP57', 'NameP57', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1985-01-01', '57address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(513, 1, 'JoueurP138', 'NameP138', 'Ville138', 1000, 'Rue138', 1, 600000000, 600000000, '1985-01-01', '138address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(514, 1, 'JoueurP58', 'NameP58', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1985-01-01', '58address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(515, 1, 'JoueurP139', 'NameP139', 'Ville139', 1000, 'Rue139', 1, 600000000, 600000000, '1985-01-01', '139address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(516, 1, 'JoueurP59', 'NameP59', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1985-01-01', '59address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(517, 1, 'JoueurP140', 'NameP140', 'Ville140', 1000, 'Rue140', 1, 600000000, 600000000, '1985-01-01', '140address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(518, 1, 'JoueurP60', 'NameP60', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1985-01-01', '60address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(519, 1, 'JoueurP141', 'NameP141', 'Ville141', 1000, 'Rue141', 1, 600000000, 600000000, '1985-01-01', '141address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(520, 1, 'JoueurP61', 'NameP61', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1985-01-01', '61address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(521, 1, 'JoueurP142', 'NameP142', 'Ville142', 1000, 'Rue142', 1, 600000000, 600000000, '1985-01-01', '142address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(522, 1, 'JoueurP62', 'NameP62', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '1985-01-01', '62address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(523, 1, 'JoueurP143', 'NameP143', 'Ville143', 1000, 'Rue143', 1, 600000000, 600000000, '1985-01-01', '143address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(524, 1, 'JoueurP63', 'NameP63', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1985-01-01', '63address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(525, 1, 'JoueurP144', 'NameP144', 'Ville144', 1000, 'Rue144', 1, 600000000, 600000000, '1985-01-01', '144address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(526, 1, 'JoueurP64', 'NameP64', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1985-01-01', '64address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(527, 1, 'JoueurP145', 'NameP145', 'Ville145', 1000, 'Rue145', 1, 600000000, 600000000, '1985-01-01', '145address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(528, 1, 'JoueurP65', 'NameP65', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1985-01-01', '65address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(529, 1, 'JoueurP146', 'NameP146', 'Ville146', 1000, 'Rue146', 1, 600000000, 600000000, '1985-01-01', '146address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(530, 1, 'JoueurP66', 'NameP66', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '1985-01-01', '66address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(531, 1, 'JoueurP147', 'NameP147', 'Ville147', 1000, 'Rue147', 1, 600000000, 600000000, '1985-01-01', '147address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(532, 1, 'JoueurP67', 'NameP67', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1985-01-01', '67address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(533, 1, 'JoueurP148', 'NameP148', 'Ville148', 1000, 'Rue148', 1, 600000000, 600000000, '1985-01-01', '148address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(534, 1, 'JoueurP68', 'NameP68', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1985-01-01', '68address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(535, 1, 'JoueurP149', 'NameP149', 'Ville149', 1000, 'Rue149', 1, 600000000, 600000000, '1985-01-01', '149address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(536, 1, 'JoueurP69', 'NameP69', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1985-01-01', '69address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(537, 1, 'JoueurP150', 'NameP150', 'Ville150', 1000, 'Rue150', 1, 600000000, 600000000, '1985-01-01', '150address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(538, 1, 'JoueurP70', 'NameP70', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1985-01-01', '70address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(539, 1, 'JoueurP151', 'NameP151', 'Ville151', 1000, 'Rue151', 1, 600000000, 600000000, '1985-01-01', '151address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(540, 1, 'JoueurP71', 'NameP71', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1985-01-01', '71address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(541, 1, 'JoueurP152', 'NameP152', 'Ville152', 1000, 'Rue152', 1, 600000000, 600000000, '1985-01-01', '152address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(542, 1, 'JoueurP72', 'NameP72', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1985-01-01', '72address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(543, 1, 'JoueurP153', 'NameP153', 'Ville153', 1000, 'Rue153', 1, 600000000, 600000000, '1985-01-01', '153address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(544, 1, 'JoueurP73', 'NameP73', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1985-01-01', '73address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(545, 1, 'JoueurP154', 'NameP154', 'Ville154', 1000, 'Rue154', 1, 600000000, 600000000, '1985-01-01', '154address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(546, 1, 'JoueurP74', 'NameP74', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1985-01-01', '74address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(547, 1, 'JoueurP155', 'NameP155', 'Ville155', 1000, 'Rue155', 1, 600000000, 600000000, '1985-01-01', '155address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(548, 1, 'JoueurP75', 'NameP75', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1985-01-01', '75address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(549, 1, 'JoueurP156', 'NameP156', 'Ville156', 1000, 'Rue156', 1, 600000000, 600000000, '1985-01-01', '156address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(550, 1, 'JoueurP76', 'NameP76', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1985-01-01', '76address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(551, 1, 'JoueurP157', 'NameP157', 'Ville157', 1000, 'Rue157', 1, 600000000, 600000000, '1985-01-01', '157address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(552, 1, 'JoueurP77', 'NameP77', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1985-01-01', '77address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(553, 1, 'JoueurP158', 'NameP158', 'Ville158', 1000, 'Rue158', 1, 600000000, 600000000, '1985-01-01', '158address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(554, 1, 'JoueurP78', 'NameP78', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1985-01-01', '78address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(555, 1, 'JoueurP159', 'NameP159', 'Ville159', 1000, 'Rue159', 1, 600000000, 600000000, '1985-01-01', '159address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(556, 1, 'JoueurP79', 'NameP79', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '1985-01-01', '79address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(557, 1, 'JoueurO0', 'NameO0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(558, 1, 'JoueurP80', 'NameP80', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1985-01-01', '80address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(559, 1, 'JoueurP81', 'NameP81', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1985-01-01', '81address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(560, 1, 'JoueurP82', 'NameP82', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1985-01-01', '82address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(561, 1, 'JoueurO1', 'NameO1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(562, 1, 'JoueurP83', 'NameP83', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1985-01-01', '83address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(563, 1, 'JoueurP84', 'NameP84', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '1985-01-01', '84address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(564, 1, 'JoueurO2', 'NameO2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(565, 1, 'JoueurP85', 'NameP85', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1985-01-01', '85address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(566, 1, 'JoueurO3', 'NameO3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(567, 1, 'JoueurP86', 'NameP86', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1985-01-01', '86address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(568, 1, 'JoueurP87', 'NameP87', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '1985-01-01', '87address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(569, 1, 'JoueurO4', 'NameO4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(570, 1, 'JoueurP88', 'NameP88', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '1985-01-01', '88address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(571, 1, 'JoueurP89', 'NameP89', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '1985-01-01', '89address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(572, 1, 'JoueurO5', 'NameO5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(573, 1, 'JoueurP90', 'NameP90', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1985-01-01', '90address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(574, 1, 'JoueurP91', 'NameP91', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '1985-01-01', '91address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(575, 1, 'JoueurO6', 'NameO6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(576, 1, 'JoueurP92', 'NameP92', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1985-01-01', '92address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(577, 1, 'JoueurP93', 'NameP93', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '1985-01-01', '93address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(578, 1, 'JoueurO7', 'NameO7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(579, 1, 'JoueurP94', 'NameP94', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '1985-01-01', '94address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(580, 1, 'JoueurP95', 'NameP95', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '1985-01-01', '95address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(581, 1, 'JoueurO8', 'NameO8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(582, 1, 'JoueurP96', 'NameP96', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1985-01-01', '96address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(583, 1, 'JoueurP97', 'NameP97', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1985-01-01', '97address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(584, 1, 'JoueurO9', 'NameO9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(585, 1, 'JoueurP98', 'NameP98', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '1985-01-01', '98address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(586, 1, 'JoueurP99', 'NameP99', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1985-01-01', '99address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(587, 1, 'JoueurP100', 'NameP100', 'Ville100', 1000, 'Rue100', 1, 600000000, 600000000, '1985-01-01', '100address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(588, 1, 'JoueurP101', 'NameP101', 'Ville101', 1000, 'Rue101', 1, 600000000, 600000000, '1985-01-01', '101address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(589, 1, 'JoueurP102', 'NameP102', 'Ville102', 1000, 'Rue102', 1, 600000000, 600000000, '1985-01-01', '102address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(590, 1, 'JoueurP103', 'NameP103', 'Ville103', 1000, 'Rue103', 1, 600000000, 600000000, '1985-01-01', '103address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(591, 1, 'JoueurP104', 'NameP104', 'Ville104', 1000, 'Rue104', 1, 600000000, 600000000, '1985-01-01', '104address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(592, 1, 'JoueurP105', 'NameP105', 'Ville105', 1000, 'Rue105', 1, 600000000, 600000000, '1985-01-01', '105address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(593, 1, 'JoueurP106', 'NameP106', 'Ville106', 1000, 'Rue106', 1, 600000000, 600000000, '1985-01-01', '106address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(594, 1, 'JoueurP107', 'NameP107', 'Ville107', 1000, 'Rue107', 1, 600000000, 600000000, '1985-01-01', '107address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(595, 1, 'JoueurP108', 'NameP108', 'Ville108', 1000, 'Rue108', 1, 600000000, 600000000, '1985-01-01', '108address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(596, 1, 'JoueurP109', 'NameP109', 'Ville109', 1000, 'Rue109', 1, 600000000, 600000000, '1985-01-01', '109address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(597, 1, 'JoueurP110', 'NameP110', 'Ville110', 1000, 'Rue110', 1, 600000000, 600000000, '1985-01-01', '110address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(598, 1, 'JoueurP111', 'NameP111', 'Ville111', 1000, 'Rue111', 1, 600000000, 600000000, '1985-01-01', '111address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(599, 1, 'JoueurP112', 'NameP112', 'Ville112', 1000, 'Rue112', 1, 600000000, 600000000, '1985-01-01', '112address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(600, 1, 'JoueurP113', 'NameP113', 'Ville113', 1000, 'Rue113', 1, 600000000, 600000000, '1985-01-01', '113address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(601, 1, 'JoueurP114', 'NameP114', 'Ville114', 1000, 'Rue114', 1, 600000000, 600000000, '1985-01-01', '114address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(602, 1, 'JoueurP115', 'NameP115', 'Ville115', 1000, 'Rue115', 1, 600000000, 600000000, '1985-01-01', '115address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(603, 1, 'JoueurP116', 'NameP116', 'Ville116', 1000, 'Rue116', 1, 600000000, 600000000, '1985-01-01', '116address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(604, 1, 'JoueurP117', 'NameP117', 'Ville117', 1000, 'Rue117', 1, 600000000, 600000000, '1985-01-01', '117address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(605, 1, 'JoueurP118', 'NameP118', 'Ville118', 1000, 'Rue118', 1, 600000000, 600000000, '1985-01-01', '118address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(606, 1, 'JoueurP119', 'NameP119', 'Ville119', 1000, 'Rue119', 1, 600000000, 600000000, '1985-01-01', '119address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(607, 1, 'JoueurP120', 'NameP120', 'Ville120', 1000, 'Rue120', 1, 600000000, 600000000, '1985-01-01', '120address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(608, 1, 'JoueurP121', 'NameP121', 'Ville121', 1000, 'Rue121', 1, 600000000, 600000000, '1985-01-01', '121address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(609, 1, 'JoueurP122', 'NameP122', 'Ville122', 1000, 'Rue122', 1, 600000000, 600000000, '1985-01-01', '122address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(610, 1, 'JoueurP123', 'NameP123', 'Ville123', 1000, 'Rue123', 1, 600000000, 600000000, '1985-01-01', '123address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(611, 1, 'JoueurP124', 'NameP124', 'Ville124', 1000, 'Rue124', 1, 600000000, 600000000, '1985-01-01', '124address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(612, 1, 'JoueurP125', 'NameP125', 'Ville125', 1000, 'Rue125', 1, 600000000, 600000000, '1985-01-01', '125address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(613, 1, 'JoueurP126', 'NameP126', 'Ville126', 1000, 'Rue126', 1, 600000000, 600000000, '1985-01-01', '126address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(614, 1, 'JoueurP127', 'NameP127', 'Ville127', 1000, 'Rue127', 1, 600000000, 600000000, '1985-01-01', '127address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(615, 1, 'JoueurP128', 'NameP128', 'Ville128', 1000, 'Rue128', 1, 600000000, 600000000, '1985-01-01', '128address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(616, 1, 'JoueurP129', 'NameP129', 'Ville129', 1000, 'Rue129', 1, 600000000, 600000000, '1985-01-01', '129address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(617, 1, 'JoueurP130', 'NameP130', 'Ville130', 1000, 'Rue130', 1, 600000000, 600000000, '1985-01-01', '130address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(618, 1, 'JoueurP131', 'NameP131', 'Ville131', 1000, 'Rue131', 1, 600000000, 600000000, '1985-01-01', '131address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(619, 1, 'JoueurP132', 'NameP132', 'Ville132', 1000, 'Rue132', 1, 600000000, 600000000, '1985-01-01', '132address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(620, 1, 'JoueurP133', 'NameP133', 'Ville133', 1000, 'Rue133', 1, 600000000, 600000000, '1985-01-01', '133address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(621, 1, 'JoueurP134', 'NameP134', 'Ville134', 1000, 'Rue134', 1, 600000000, 600000000, '1985-01-01', '134address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(622, 1, 'JoueurP135', 'NameP135', 'Ville135', 1000, 'Rue135', 1, 600000000, 600000000, '1985-01-01', '135address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(623, 1, 'JoueurP136', 'NameP136', 'Ville136', 1000, 'Rue136', 1, 600000000, 600000000, '1985-01-01', '136address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(624, 1, 'JoueurP137', 'NameP137', 'Ville137', 1000, 'Rue137', 1, 600000000, 600000000, '1985-01-01', '137address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(625, 1, 'JoueurP138', 'NameP138', 'Ville138', 1000, 'Rue138', 1, 600000000, 600000000, '1985-01-01', '138address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(626, 1, 'JoueurP139', 'NameP139', 'Ville139', 1000, 'Rue139', 1, 600000000, 600000000, '1985-01-01', '139address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(627, 1, 'JoueurP140', 'NameP140', 'Ville140', 1000, 'Rue140', 1, 600000000, 600000000, '1985-01-01', '140address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(628, 1, 'JoueurP141', 'NameP141', 'Ville141', 1000, 'Rue141', 1, 600000000, 600000000, '1985-01-01', '141address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(629, 1, 'JoueurP142', 'NameP142', 'Ville142', 1000, 'Rue142', 1, 600000000, 600000000, '1985-01-01', '142address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(630, 1, 'JoueurP143', 'NameP143', 'Ville143', 1000, 'Rue143', 1, 600000000, 600000000, '1985-01-01', '143address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(631, 1, 'JoueurP144', 'NameP144', 'Ville144', 1000, 'Rue144', 1, 600000000, 600000000, '1985-01-01', '144address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(632, 1, 'JoueurP145', 'NameP145', 'Ville145', 1000, 'Rue145', 1, 600000000, 600000000, '1985-01-01', '145address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(633, 1, 'JoueurP146', 'NameP146', 'Ville146', 1000, 'Rue146', 1, 600000000, 600000000, '1985-01-01', '146address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(634, 1, 'JoueurP147', 'NameP147', 'Ville147', 1000, 'Rue147', 1, 600000000, 600000000, '1985-01-01', '147address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(635, 1, 'JoueurP148', 'NameP148', 'Ville148', 1000, 'Rue148', 1, 600000000, 600000000, '1985-01-01', '148address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(636, 1, 'JoueurP149', 'NameP149', 'Ville149', 1000, 'Rue149', 1, 600000000, 600000000, '1985-01-01', '149address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(637, 1, 'JoueurP150', 'NameP150', 'Ville150', 1000, 'Rue150', 1, 600000000, 600000000, '1985-01-01', '150address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(638, 1, 'JoueurP151', 'NameP151', 'Ville151', 1000, 'Rue151', 1, 600000000, 600000000, '1985-01-01', '151address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(639, 1, 'JoueurP152', 'NameP152', 'Ville152', 1000, 'Rue152', 1, 600000000, 600000000, '1985-01-01', '152address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(640, 1, 'JoueurP153', 'NameP153', 'Ville153', 1000, 'Rue153', 1, 600000000, 600000000, '1985-01-01', '153address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(641, 1, 'JoueurP154', 'NameP154', 'Ville154', 1000, 'Rue154', 1, 600000000, 600000000, '1985-01-01', '154address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(642, 1, 'JoueurP155', 'NameP155', 'Ville155', 1000, 'Rue155', 1, 600000000, 600000000, '1985-01-01', '155address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(643, 1, 'JoueurP156', 'NameP156', 'Ville156', 1000, 'Rue156', 1, 600000000, 600000000, '1985-01-01', '156address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(644, 1, 'JoueurP157', 'NameP157', 'Ville157', 1000, 'Rue157', 1, 600000000, 600000000, '1985-01-01', '157address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(645, 1, 'JoueurP158', 'NameP158', 'Ville158', 1000, 'Rue158', 1, 600000000, 600000000, '1985-01-01', '158address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(646, 1, 'JoueurP159', 'NameP159', 'Ville159', 1000, 'Rue159', 1, 600000000, 600000000, '1985-01-01', '159address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(647, 1, 'JoueurO0', 'NameO0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(648, 1, 'JoueurO1', 'NameO1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(649, 1, 'JoueurO2', 'NameO2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(650, 1, 'JoueurO3', 'NameO3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(651, 1, 'JoueurO4', 'NameO4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(652, 1, 'JoueurO5', 'NameO5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(653, 1, 'JoueurO6', 'NameO6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(654, 1, 'JoueurO7', 'NameO7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(655, 1, 'JoueurO8', 'NameO8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0),
(656, 1, 'JoueurO9', 'NameO9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-24', 'R.A.S.', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `PersonneExtra`
--

CREATE TABLE IF NOT EXISTS `PersonneExtra` (
  `ID` int(11) NOT NULL,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PersonneExtra`
--

INSERT INTO `PersonneExtra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(2, 108, 1),
(25, 146, 1),
(26, 145, 1),
(34, 107, 2),
(35, 107, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `ID_Personne` int(255) NOT NULL,
  `IsLeader` tinyint(1) NOT NULL,
  `Paid` tinyint(1) NOT NULL,
  `AlreadyPart` tinyint(1) NOT NULL
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
(131, 0, 0, 0),
(145, 0, 0, 0),
(146, 0, 0, 0),
(147, 0, 1, 1),
(148, 0, 1, 1),
(149, 0, 1, 1),
(150, 0, 1, 1),
(151, 0, 1, 1),
(152, 0, 1, 1),
(153, 0, 1, 1),
(154, 0, 1, 1),
(155, 0, 1, 1),
(156, 0, 1, 1),
(157, 0, 1, 1),
(158, 0, 1, 1),
(159, 0, 1, 1),
(160, 0, 1, 1),
(161, 0, 1, 1),
(162, 0, 1, 1),
(163, 0, 1, 1),
(164, 0, 1, 1),
(165, 0, 1, 1),
(166, 0, 1, 1),
(167, 0, 1, 1),
(168, 0, 1, 1),
(169, 0, 1, 1),
(170, 0, 1, 1),
(171, 0, 1, 1),
(172, 0, 1, 1),
(173, 0, 1, 1),
(174, 0, 1, 1),
(175, 0, 1, 1),
(176, 0, 1, 1),
(177, 0, 1, 1),
(178, 0, 1, 1),
(179, 0, 1, 1),
(180, 0, 1, 1),
(181, 0, 1, 1),
(182, 0, 1, 1),
(183, 0, 1, 1),
(184, 0, 1, 1),
(185, 0, 1, 1),
(186, 0, 1, 1),
(187, 0, 1, 1),
(188, 0, 1, 1),
(189, 0, 1, 1),
(190, 0, 1, 1),
(191, 0, 1, 1),
(192, 0, 1, 1),
(193, 0, 1, 1),
(194, 0, 1, 1),
(195, 0, 1, 1),
(196, 0, 1, 1),
(197, 0, 1, 1),
(198, 0, 1, 1),
(199, 0, 1, 1),
(200, 0, 1, 1),
(201, 0, 1, 1),
(202, 0, 1, 1),
(203, 0, 1, 1),
(204, 0, 1, 1),
(205, 0, 1, 1),
(206, 0, 1, 1),
(207, 0, 1, 1),
(208, 0, 1, 1),
(209, 0, 1, 1),
(210, 0, 1, 1),
(211, 0, 1, 1),
(212, 0, 1, 1),
(213, 0, 1, 1),
(214, 0, 1, 1),
(215, 0, 1, 1),
(216, 0, 1, 1),
(217, 0, 1, 1),
(218, 0, 1, 1),
(219, 0, 1, 1),
(220, 0, 1, 1),
(221, 0, 1, 1),
(222, 0, 1, 1),
(223, 0, 1, 1),
(224, 0, 1, 1),
(225, 0, 1, 1),
(226, 0, 1, 1),
(227, 0, 1, 1),
(228, 0, 1, 1),
(229, 0, 1, 1),
(230, 0, 1, 1),
(231, 0, 1, 1),
(232, 0, 1, 1),
(233, 0, 1, 1),
(234, 0, 1, 1),
(235, 0, 1, 1),
(236, 0, 1, 1),
(237, 0, 1, 1),
(238, 0, 1, 1),
(239, 0, 1, 1),
(240, 0, 1, 1),
(241, 0, 1, 1),
(242, 0, 1, 1),
(243, 0, 1, 1),
(244, 0, 1, 1),
(245, 0, 1, 1),
(246, 0, 1, 1),
(247, 0, 1, 1),
(248, 0, 1, 1),
(249, 0, 1, 1),
(250, 0, 1, 1),
(251, 0, 1, 1),
(252, 0, 1, 1),
(253, 0, 1, 1),
(254, 0, 1, 1),
(255, 0, 1, 1),
(256, 0, 1, 1),
(257, 0, 1, 1),
(258, 0, 1, 1),
(259, 0, 1, 1),
(260, 0, 1, 1),
(261, 0, 1, 1),
(262, 0, 1, 1),
(263, 0, 1, 1),
(264, 0, 1, 1),
(265, 0, 1, 1),
(266, 0, 1, 1),
(267, 0, 1, 1),
(268, 0, 1, 1),
(269, 0, 1, 1),
(270, 0, 1, 1),
(271, 0, 1, 1),
(272, 0, 1, 1),
(273, 0, 1, 1),
(274, 0, 1, 1),
(275, 0, 1, 1),
(276, 0, 1, 1),
(277, 0, 1, 1),
(278, 0, 1, 1),
(279, 0, 1, 1),
(280, 0, 1, 1),
(281, 0, 1, 1),
(282, 0, 1, 1),
(283, 0, 1, 1),
(284, 0, 1, 1),
(285, 0, 1, 1),
(286, 0, 1, 1),
(287, 0, 1, 1),
(288, 0, 1, 1),
(289, 0, 1, 1),
(290, 0, 1, 1),
(291, 0, 1, 1),
(292, 0, 1, 1),
(293, 0, 1, 1),
(294, 0, 1, 1),
(295, 0, 1, 1),
(296, 0, 1, 1),
(297, 0, 1, 1),
(298, 0, 1, 1),
(299, 0, 1, 1),
(300, 0, 1, 1),
(301, 0, 1, 1),
(302, 0, 1, 1),
(303, 0, 1, 1),
(304, 0, 1, 1),
(305, 0, 1, 1),
(306, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `ID` int(11) NOT NULL,
  `ID_Personne` int(255) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Username` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

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
  `ID` int(255) NOT NULL,
  `ID_Player1` int(255) NOT NULL,
  `ID_Player2` int(255) NOT NULL,
  `ID_Cat` int(255) NOT NULL,
  `NbWinMatch` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`) VALUES
(43, 107, 108, 7, 0),
(44, 110, 111, 1, 1),
(45, 112, 113, 1, 3),
(46, 114, 115, 1, 2),
(50, 117, 118, 1, 4),
(53, 128, 129, 1, 0),
(54, 130, 131, 1, 0),
(57, 137, 132, 6, 0),
(59, 133, 136, 6, 0),
(60, 145, 146, 1, 0),
(61, 141, 138, 1, 0),
(62, 143, 142, 1, 0),
(142, 144, 147, 1, 0),
(143, 148, 149, 1, 0),
(144, 151, 150, 1, 0),
(145, 153, 152, 1, 0),
(146, 154, 159, 1, 0),
(147, 156, 155, 1, 0),
(148, 158, 160, 1, 2),
(149, 157, 161, 1, 0),
(150, 162, 163, 1, 0),
(151, 165, 164, 1, 0),
(152, 167, 166, 1, 0),
(153, 169, 168, 1, 0),
(154, 170, 171, 1, 0),
(155, 173, 172, 1, 0),
(156, 175, 174, 1, 0),
(157, 177, 176, 1, 0),
(158, 179, 178, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Terrain`
--

CREATE TABLE IF NOT EXISTS `Terrain` (
  `ID` int(11) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `surface` int(11) NOT NULL,
  `ID_Owner` int(11) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `disponibiliteFrom` date NOT NULL,
  `disponibiliteTo` date NOT NULL,
  `CreationDate` date NOT NULL,
  `Type` varchar(500) NOT NULL,
  `Note` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
-- Index pour les tables exportées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Extras`
--
ALTER TABLE `Extras`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `GroupSaturday`
--
ALTER TABLE `GroupSaturday`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `GroupSunday`
--
ALTER TABLE `GroupSunday`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD UNIQUE KEY `id_4` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Index pour la table `KnockoffSaturday`
--
ALTER TABLE `KnockoffSaturday`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `KnockoffSunday`
--
ALTER TABLE `KnockoffSunday`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Match`
--
ALTER TABLE `Match`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Owner`
--
ALTER TABLE `Owner`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Personne` (`ID_Personne`),
  ADD KEY `ID_Staff` (`ID_Staff`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `PersonneExtra`
--
ALTER TABLE `PersonneExtra`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Player`
--
ALTER TABLE `Player`
  ADD UNIQUE KEY `ID_Personne_2` (`ID_Personne`),
  ADD KEY `ID_Personne` (`ID_Personne`),
  ADD KEY `ID_Personne_3` (`ID_Personne`);

--
-- Index pour la table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Personne` (`ID_Personne`),
  ADD KEY `ID_Cat` (`ID_Cat`);

--
-- Index pour la table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Player1` (`ID_Player1`),
  ADD KEY `ID_Player2` (`ID_Player2`),
  ADD KEY `ID_Cat` (`ID_Cat`);

--
-- Index pour la table `Terrain`
--
ALTER TABLE `Terrain`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Extras`
--
ALTER TABLE `Extras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `GroupSaturday`
--
ALTER TABLE `GroupSaturday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `GroupSunday`
--
ALTER TABLE `GroupSunday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `History`
--
ALTER TABLE `History`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1019;
--
-- AUTO_INCREMENT pour la table `KnockoffSaturday`
--
ALTER TABLE `KnockoffSaturday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KnockoffSunday`
--
ALTER TABLE `KnockoffSunday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Match`
--
ALTER TABLE `Match`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=218;
--
-- AUTO_INCREMENT pour la table `Owner`
--
ALTER TABLE `Owner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=657;
--
-- AUTO_INCREMENT pour la table `PersonneExtra`
--
ALTER TABLE `PersonneExtra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `Team`
--
ALTER TABLE `Team`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT pour la table `Terrain`
--
ALTER TABLE `Terrain`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
