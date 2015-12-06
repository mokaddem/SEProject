-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Décembre 2015 à 17:13
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2010 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(1809, 7, 0, 'Historique', 'Suppression', '2015-12-06', '15:31:46'),
(1810, 7, 1020, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1811, 7, 1025, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1812, 7, 1026, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1813, 7, 1027, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1814, 7, 1028, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1815, 7, 1029, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1816, 7, 1032, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1817, 7, 1034, 'Match', 'Ajout', '2015-12-06', '15:38:48'),
(1818, 7, 1020, 'Match', 'Ajout', '2015-12-06', '15:41:06'),
(1819, 7, 1021, 'Match', 'Ajout', '2015-12-06', '15:41:07'),
(1820, 7, 1022, 'Match', 'Ajout', '2015-12-06', '15:41:07'),
(1821, 7, 1023, 'Match', 'Ajout', '2015-12-06', '15:41:07'),
(1822, 7, 1024, 'Match', 'Ajout', '2015-12-06', '15:41:07'),
(1823, 7, 1020, 'Match', 'Ajout', '2015-12-06', '15:41:13'),
(1824, 7, 1021, 'Match', 'Ajout', '2015-12-06', '15:41:14'),
(1825, 7, 1022, 'Match', 'Ajout', '2015-12-06', '15:41:14'),
(1826, 7, 1023, 'Match', 'Ajout', '2015-12-06', '15:41:14'),
(1827, 7, 1024, 'Match', 'Ajout', '2015-12-06', '15:41:14'),
(1828, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-12-06', '15:41:30'),
(1829, 7, 15, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:41:33'),
(1830, 7, 1053, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1831, 7, 1054, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1832, 7, 1055, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1833, 7, 1056, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1834, 7, 1057, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1835, 7, 1058, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1836, 7, 1059, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1837, 7, 1060, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1838, 7, 1061, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1839, 7, 1062, 'Match', 'Ajout', '2015-12-06', '15:41:33'),
(1840, 7, 1063, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1841, 7, 1064, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1842, 7, 1065, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1843, 7, 1066, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1844, 7, 1067, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1845, 7, 16, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:41:34'),
(1846, 7, 1068, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1847, 7, 1069, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1848, 7, 1070, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1849, 7, 1071, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1850, 7, 1072, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1851, 7, 1073, 'Match', 'Ajout', '2015-12-06', '15:41:34'),
(1852, 7, 1074, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1853, 7, 1075, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1854, 7, 1076, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1855, 7, 1077, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1856, 7, 1078, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1857, 7, 1079, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1858, 7, 1080, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1859, 7, 1081, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1860, 7, 1082, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1861, 7, 17, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:41:35'),
(1862, 7, 1083, 'Match', 'Ajout', '2015-12-06', '15:41:35'),
(1863, 7, 1053, 'Match', 'Ajout', '2015-12-06', '15:42:34'),
(1864, 7, 1058, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1865, 7, 1059, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1866, 7, 1060, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1867, 7, 1061, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1868, 7, 1062, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1869, 7, 1065, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1870, 7, 1067, 'Match', 'Ajout', '2015-12-06', '15:42:35'),
(1871, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-12-06', '15:43:19'),
(1872, 7, 18, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:43:21'),
(1873, 7, 1084, 'Match', 'Ajout', '2015-12-06', '15:43:21'),
(1874, 7, 1085, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1875, 7, 1086, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1876, 7, 1087, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1877, 7, 1088, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1878, 7, 1089, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1879, 7, 1090, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1880, 7, 1091, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1881, 7, 1092, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1882, 7, 1093, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1883, 7, 1094, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1884, 7, 1095, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1885, 7, 1096, 'Match', 'Ajout', '2015-12-06', '15:43:22'),
(1886, 7, 1097, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1887, 7, 1098, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1888, 7, 19, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:43:23'),
(1889, 7, 1099, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1890, 7, 1100, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1891, 7, 1101, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1892, 7, 1102, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1893, 7, 1103, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1894, 7, 1104, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1895, 7, 1105, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1896, 7, 1106, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1897, 7, 1107, 'Match', 'Ajout', '2015-12-06', '15:43:23'),
(1898, 7, 1108, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1899, 7, 1109, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1900, 7, 1110, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1901, 7, 1111, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1902, 7, 1112, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1903, 7, 1113, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1904, 7, 20, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:43:24'),
(1905, 7, 1114, 'Match', 'Ajout', '2015-12-06', '15:43:24'),
(1906, 7, 1084, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1907, 7, 1089, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1908, 7, 1090, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1909, 7, 1091, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1910, 7, 1092, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1911, 7, 1093, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1912, 7, 1096, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1913, 7, 1098, 'Match', 'Ajout', '2015-12-06', '15:43:49'),
(1914, 7, 1084, 'Match', 'Ajout', '2015-12-06', '15:44:47'),
(1915, 7, 1085, 'Match', 'Ajout', '2015-12-06', '15:44:47'),
(1916, 7, 1086, 'Match', 'Ajout', '2015-12-06', '15:44:47'),
(1917, 7, 1087, 'Match', 'Ajout', '2015-12-06', '15:44:47'),
(1918, 7, 1088, 'Match', 'Ajout', '2015-12-06', '15:44:48'),
(1919, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-12-06', '15:45:18'),
(1920, 7, 131, 'Poules (Samedi)', 'Ajout', '2015-12-06', '15:45:19'),
(1921, 7, 21, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:45:31'),
(1922, 7, 1115, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1923, 7, 1116, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1924, 7, 1117, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1925, 7, 1118, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1926, 7, 1119, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1927, 7, 1120, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1928, 7, 1121, 'Match', 'Ajout', '2015-12-06', '15:45:31'),
(1929, 7, 1122, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1930, 7, 1123, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1931, 7, 1124, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1932, 7, 1125, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1933, 7, 1126, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1934, 7, 1127, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1935, 7, 1128, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1936, 7, 1129, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1937, 7, 22, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:45:32'),
(1938, 7, 1130, 'Match', 'Ajout', '2015-12-06', '15:45:32'),
(1939, 7, 1131, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1940, 7, 1132, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1941, 7, 1133, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1942, 7, 1134, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1943, 7, 1135, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1944, 7, 1136, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1945, 7, 1137, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1946, 7, 1138, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1947, 7, 1139, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1948, 7, 1140, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1949, 7, 1141, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1950, 7, 1142, 'Match', 'Ajout', '2015-12-06', '15:45:33'),
(1951, 7, 1143, 'Match', 'Ajout', '2015-12-06', '15:45:34'),
(1952, 7, 1144, 'Match', 'Ajout', '2015-12-06', '15:45:34'),
(1953, 7, 23, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:45:34'),
(1954, 7, 1145, 'Match', 'Ajout', '2015-12-06', '15:45:34'),
(1955, 7, 107, 'Joueur', 'Edition', '2015-12-06', '15:46:06'),
(1956, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-12-06', '15:46:23'),
(1957, 7, 132, 'Poules (Samedi)', 'Ajout', '2015-12-06', '15:46:24'),
(1958, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-12-06', '15:46:27'),
(1959, 7, 24, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:46:30'),
(1960, 7, 1146, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1961, 7, 1147, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1962, 7, 1148, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1963, 7, 1149, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1964, 7, 1150, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1965, 7, 1151, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1966, 7, 1152, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1967, 7, 1153, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1968, 7, 1154, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1969, 7, 1155, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1970, 7, 1156, 'Match', 'Ajout', '2015-12-06', '15:46:30'),
(1971, 7, 1157, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1972, 7, 1158, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1973, 7, 1159, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1974, 7, 1160, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1975, 7, 25, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:46:31'),
(1976, 7, 1161, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1977, 7, 1162, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1978, 7, 1163, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1979, 7, 1164, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1980, 7, 1165, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1981, 7, 1166, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1982, 7, 1167, 'Match', 'Ajout', '2015-12-06', '15:46:31'),
(1983, 7, 1168, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1984, 7, 1169, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1985, 7, 1170, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1986, 7, 1171, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1987, 7, 1172, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1988, 7, 1173, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1989, 7, 1174, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1990, 7, 1175, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1991, 7, 26, 'Poules (Dimanche)', 'Ajout', '2015-12-06', '15:46:32'),
(1992, 7, 1176, 'Match', 'Ajout', '2015-12-06', '15:46:32'),
(1993, 7, 1146, 'Match', 'Ajout', '2015-12-06', '15:50:19'),
(1994, 7, 1147, 'Match', 'Ajout', '2015-12-06', '15:50:19'),
(1995, 7, 1148, 'Match', 'Ajout', '2015-12-06', '15:50:20'),
(1996, 7, 1149, 'Match', 'Ajout', '2015-12-06', '15:50:20'),
(1997, 7, 1150, 'Match', 'Ajout', '2015-12-06', '15:50:20'),
(1998, 7, 43, 'Vainqueur - Team 43', 'Ajout', '2015-12-06', '16:11:58'),
(1999, 7, 44, 'Vainqueur - Team 44', 'Ajout', '2015-12-06', '16:11:58'),
(2000, 7, 45, 'Vainqueur - Team 45', 'Ajout', '2015-12-06', '16:11:58'),
(2001, 7, 65, 'Vainqueur - Team 65', 'Ajout', '2015-12-06', '16:11:59'),
(2002, 7, 1177, 'Match - Knock-Off', 'Ajout', '2015-12-06', '16:12:03'),
(2003, 7, 1178, 'Match - Knock-Off', 'Ajout', '2015-12-06', '16:12:03'),
(2004, 7, 1179, 'Match - Knock-Off', 'Ajout', '2015-12-06', '16:12:03'),
(2005, 7, 1180, 'Match - Knock-Off', 'Ajout', '2015-12-06', '16:12:04'),
(2006, 7, 4, 'Knock-Off (Dimanche)', 'CrÃ©ation', '2015-12-06', '16:12:04'),
(2007, 7, 0, 'Groupes & Knock-Off', 'Suppression', '2015-12-06', '16:45:12'),
(2008, 7, 144, 'Joueur', 'Edition', '2015-12-06', '17:06:28'),
(2009, 7, 146, 'Joueur', 'Edition', '2015-12-06', '17:06:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1181 ;

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
(62, 317, 318, 1, 0, '', 0),
(63, 317, 318, 1, 0, '', 0),
(64, 317, 318, 1, 0, '', 0),
(65, 317, 318, 1, 0, '', 0),
(66, 317, 318, 1, 0, '', 0),
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
