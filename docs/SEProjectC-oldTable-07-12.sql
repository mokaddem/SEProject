-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2015 at 01:46 AM
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
  `Age` varchar(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Categorie`
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
-- Table structure for table `GlobalVariables`
--

CREATE TABLE IF NOT EXISTS `GlobalVariables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE latin1_bin NOT NULL,
  `Value` varchar(1000) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `GlobalVariables`
--

INSERT INTO `GlobalVariables` (`id`, `Name`, `Value`) VALUES
(1, 'Message Leader', '[A rÃ©diger]'),
(2, 'Sujet Leader', '[A rÃ©diger]'),
(3, 'Adresse HQ', '[A rÃ©diger]'),
(4, 'Message Non-Payé', '[A rÃ©diger]'),
(5, 'Sujet Non-Payé', '[A rÃ©diger]'),
(6, 'Message à tous', '[A rÃ©diger]'),
(7, 'Sujet à tous', '[A rÃ©diger]'),
(8, 'Message', '[A rÃ©diger]'),
(10, 'tournament_started_sam', '1'),
(11, 'tournament_started_dim', '0');

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
  `ID_t6` int(11) DEFAULT NULL,
  `ID_t7` int(11) DEFAULT NULL,
  `ID_t8` int(11) DEFAULT NULL,
  `ID_Leader` int(11) NOT NULL,
  `ID_Cat` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `GroupSaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(129, 13, 235, 246, 247, 256, 260, NULL, NULL, NULL, 235, 21),
(130, 14, 261, 263, 264, 267, 273, NULL, NULL, NULL, 261, 21),
(131, 15, 274, 275, NULL, NULL, NULL, NULL, NULL, NULL, 274, 21);

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
  `ID_t7` int(11) DEFAULT NULL,
  `ID_t8` int(11) DEFAULT NULL,
  `ID_Leader` int(11) NOT NULL,
  `ID_Cat` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2001 ;

--
-- Dumping data for table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(1844, 7, 0, 'Suppression de toute l''année précédente.', 'Suppression', '2015-12-07', '00:46:44'),
(1845, 7, 226, 'Equipe', 'Ajout', '2015-12-07', '01:00:17'),
(1846, 7, 227, 'Equipe', 'Ajout', '2015-12-07', '01:00:20'),
(1847, 7, 228, 'Equipe', 'Ajout', '2015-12-07', '01:00:22'),
(1848, 7, 229, 'Equipe', 'Ajout', '2015-12-07', '01:00:24'),
(1849, 7, 230, 'Equipe', 'Ajout', '2015-12-07', '01:00:27'),
(1850, 7, 231, 'Equipe', 'Ajout', '2015-12-07', '01:00:30'),
(1851, 7, 232, 'Equipe', 'Ajout', '2015-12-07', '01:00:32'),
(1852, 7, 233, 'Equipe', 'Ajout', '2015-12-07', '01:00:35'),
(1853, 7, 234, 'Equipe', 'Ajout', '2015-12-07', '01:00:37'),
(1854, 7, 235, 'Equipe', 'Ajout', '2015-12-07', '01:00:40'),
(1855, 7, 236, 'Equipe', 'Ajout', '2015-12-07', '01:00:42'),
(1856, 7, 237, 'Equipe', 'Ajout', '2015-12-07', '01:00:44'),
(1857, 7, 238, 'Equipe', 'Ajout', '2015-12-07', '01:00:47'),
(1858, 7, 239, 'Equipe', 'Ajout', '2015-12-07', '01:00:49'),
(1859, 7, 240, 'Equipe', 'Ajout', '2015-12-07', '01:00:52'),
(1860, 7, 241, 'Equipe', 'Ajout', '2015-12-07', '01:00:55'),
(1861, 7, 242, 'Equipe', 'Ajout', '2015-12-07', '01:00:58'),
(1862, 7, 243, 'Equipe', 'Ajout', '2015-12-07', '01:01:00'),
(1863, 7, 244, 'Equipe', 'Ajout', '2015-12-07', '01:01:03'),
(1864, 7, 245, 'Equipe', 'Ajout', '2015-12-07', '01:01:05'),
(1865, 7, 246, 'Equipe', 'Ajout', '2015-12-07', '01:01:08'),
(1866, 7, 247, 'Equipe', 'Ajout', '2015-12-07', '01:01:10'),
(1867, 7, 248, 'Equipe', 'Ajout', '2015-12-07', '01:01:13'),
(1868, 7, 249, 'Equipe', 'Ajout', '2015-12-07', '01:01:16'),
(1869, 7, 250, 'Equipe', 'Ajout', '2015-12-07', '01:01:18'),
(1870, 7, 251, 'Equipe', 'Ajout', '2015-12-07', '01:01:21'),
(1871, 7, 252, 'Equipe', 'Ajout', '2015-12-07', '01:01:23'),
(1872, 7, 253, 'Equipe', 'Ajout', '2015-12-07', '01:01:25'),
(1873, 7, 254, 'Equipe', 'Ajout', '2015-12-07', '01:01:28'),
(1874, 7, 255, 'Equipe', 'Ajout', '2015-12-07', '01:01:31'),
(1875, 7, 256, 'Equipe', 'Ajout', '2015-12-07', '01:01:33'),
(1876, 7, 257, 'Equipe', 'Ajout', '2015-12-07', '01:01:36'),
(1877, 7, 258, 'Equipe', 'Ajout', '2015-12-07', '01:01:39'),
(1878, 7, 259, 'Equipe', 'Ajout', '2015-12-07', '01:01:41'),
(1879, 7, 260, 'Equipe', 'Ajout', '2015-12-07', '01:01:43'),
(1880, 7, 261, 'Equipe', 'Ajout', '2015-12-07', '01:01:46'),
(1881, 7, 262, 'Equipe', 'Ajout', '2015-12-07', '01:01:49'),
(1882, 7, 263, 'Equipe', 'Ajout', '2015-12-07', '01:01:52'),
(1883, 7, 264, 'Equipe', 'Ajout', '2015-12-07', '01:01:55'),
(1884, 7, 265, 'Equipe', 'Ajout', '2015-12-07', '01:01:57'),
(1885, 7, 266, 'Equipe', 'Ajout', '2015-12-07', '01:02:00'),
(1886, 7, 267, 'Equipe', 'Ajout', '2015-12-07', '01:02:02'),
(1887, 7, 268, 'Equipe', 'Ajout', '2015-12-07', '01:02:06'),
(1888, 7, 269, 'Equipe', 'Ajout', '2015-12-07', '01:02:09'),
(1889, 7, 270, 'Equipe', 'Ajout', '2015-12-07', '01:02:11'),
(1890, 7, 271, 'Equipe', 'Ajout', '2015-12-07', '01:02:13'),
(1891, 7, 272, 'Equipe', 'Ajout', '2015-12-07', '01:02:16'),
(1892, 7, 273, 'Equipe', 'Ajout', '2015-12-07', '01:02:18'),
(1893, 7, 274, 'Equipe', 'Ajout', '2015-12-07', '01:02:21'),
(1894, 7, 275, 'Equipe', 'Ajout', '2015-12-07', '01:02:23'),
(1895, 7, 129, 'Poules (Samedi)', 'Ajout', '2015-12-07', '01:04:27'),
(1896, 7, 1040, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:27'),
(1897, 7, 1041, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:27'),
(1898, 7, 1042, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:27'),
(1899, 7, 1043, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1900, 7, 1044, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1901, 7, 1045, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1902, 7, 1046, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1903, 7, 1047, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1904, 7, 1048, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1905, 7, 1049, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1906, 7, 130, 'Poules (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1907, 7, 1050, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1908, 7, 1051, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1909, 7, 1052, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:28'),
(1910, 7, 1053, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1911, 7, 1054, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1912, 7, 1055, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1913, 7, 1056, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1914, 7, 1057, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1915, 7, 1058, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1916, 7, 1059, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1917, 7, 131, 'Poules (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1918, 7, 1060, 'Match de poule (Samedi)', 'Ajout', '2015-12-07', '01:04:29'),
(1919, 7, 1041, 'Match', 'Ajout', '2015-12-07', '01:05:21'),
(1920, 7, 1044, 'Match', 'Ajout', '2015-12-07', '01:05:21'),
(1921, 7, 1047, 'Match', 'Ajout', '2015-12-07', '01:05:21'),
(1922, 7, 1048, 'Match', 'Ajout', '2015-12-07', '01:05:21'),
(1923, 7, 246, 'Vainqueur - Team 246', 'Ajout', '2015-12-07', '01:05:38'),
(1924, 7, 247, 'Vainqueur - Team 247', 'Ajout', '2015-12-07', '01:05:38'),
(1925, 7, 261, 'Vainqueur - Team 261', 'Ajout', '2015-12-07', '01:05:38'),
(1926, 7, 263, 'Vainqueur - Team 263', 'Ajout', '2015-12-07', '01:05:38'),
(1927, 7, 274, 'Vainqueur - Team 274', 'Ajout', '2015-12-07', '01:05:38'),
(1928, 7, 275, 'Vainqueur - Team 275', 'Ajout', '2015-12-07', '01:05:38'),
(1929, 7, 1061, 'Match - Knock-Off', 'Ajout', '2015-12-07', '01:05:46'),
(1930, 7, 1062, 'Match - Knock-Off', 'Ajout', '2015-12-07', '01:05:47'),
(1931, 7, 1063, 'Match - Knock-Off', 'Ajout', '2015-12-07', '01:05:47'),
(1932, 7, 1064, 'Match - Knock-Off', 'Ajout', '2015-12-07', '01:05:47'),
(1933, 7, 1065, 'Match - Knock-Off', 'Ajout', '2015-12-07', '01:05:47'),
(1934, 7, 1066, 'Match - Knock-Off', 'Ajout', '2015-12-07', '01:05:47'),
(1935, 7, 24, 'Knock-Off (Samedi)', 'CrÃ©ation', '2015-12-07', '01:05:47'),
(1936, 7, 1, 'Match', 'Ajout', '2015-12-07', '01:25:09'),
(1937, 7, 1, 'Match', 'Ajout', '2015-12-07', '01:25:30'),
(1938, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:26:26'),
(1939, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:26:30'),
(1940, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:26:41'),
(1941, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:26:42'),
(1942, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:26:42'),
(1943, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:43'),
(1944, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:43'),
(1945, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:43'),
(1946, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:44'),
(1947, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:44'),
(1948, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:44'),
(1949, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:26:44'),
(1950, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:26:45'),
(1951, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:26:45'),
(1952, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:26:46'),
(1953, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:26:46'),
(1954, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:26:46'),
(1955, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:26:47'),
(1956, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:33'),
(1957, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:35'),
(1958, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:36'),
(1959, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:37'),
(1960, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:37'),
(1961, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:38'),
(1962, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:28:38'),
(1963, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:29:44'),
(1964, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:29:45'),
(1965, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:29:46'),
(1966, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:29:47'),
(1967, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:29:52'),
(1968, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:29:55'),
(1969, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:29:56'),
(1970, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:29:57'),
(1971, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:29:57'),
(1972, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:29:59'),
(1973, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:30:00'),
(1974, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:30:01'),
(1975, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:05'),
(1976, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:05'),
(1977, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:05'),
(1978, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:05'),
(1979, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:06'),
(1980, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:06'),
(1981, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:30:06'),
(1982, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:32:16'),
(1983, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:32:16'),
(1984, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:32:18'),
(1985, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:32:19'),
(1986, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:32:19'),
(1987, 7, 1061, 'Match', 'Ajout', '2015-12-07', '01:32:21'),
(1988, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:32:22'),
(1989, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:32:22'),
(1990, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:32:23'),
(1991, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:32:23'),
(1992, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:32:23'),
(1993, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:32:24'),
(1994, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:32:25'),
(1995, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:32:25'),
(1996, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:32:26'),
(1997, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:32:27'),
(1998, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:32:27'),
(1999, 7, 1063, 'Match', 'Ajout', '2015-12-07', '01:32:27'),
(2000, 7, 1062, 'Match', 'Ajout', '2015-12-07', '01:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `KnockoffSaturday`
--

CREATE TABLE IF NOT EXISTS `KnockoffSaturday` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Match` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `KnockoffSaturday`
--

INSERT INTO `KnockoffSaturday` (`ID`, `ID_Match`, `Position`, `Category`) VALUES
(19, 1061, 1, 21),
(20, 1062, 2, 21),
(21, 1063, 3, 21),
(22, 1064, 4, 21),
(23, 1065, 5, 21),
(24, 1066, 6, 21);

-- --------------------------------------------------------

--
-- Table structure for table `KnockoffSunday`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1067 ;

--
-- Dumping data for table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(1040, '2015-12-07', '08:30', 235, 246, 0, 0, 13, 129),
(1041, '2015-12-07', '08:30', 235, 247, 0, 4, 13, 129),
(1042, '2015-12-07', '08:30', 235, 256, 0, 0, 13, 129),
(1043, '2015-12-07', '08:30', 235, 260, 0, 0, 13, 129),
(1044, '2015-12-07', '08:30', 246, 247, 0, 4, 13, 129),
(1045, '2015-12-07', '08:30', 246, 256, 0, 0, 13, 129),
(1046, '2015-12-07', '08:30', 246, 260, 0, 0, 13, 129),
(1047, '2015-12-07', '08:30', 247, 256, 3, 0, 13, 129),
(1048, '2015-12-07', '08:30', 247, 260, 2, 0, 13, 129),
(1049, '2015-12-07', '08:30', 256, 260, 0, 0, 13, 129),
(1050, '2015-12-07', '08:30', 261, 263, 0, 0, 14, 130),
(1051, '2015-12-07', '08:30', 261, 264, 0, 0, 14, 130),
(1052, '2015-12-07', '08:30', 261, 267, 0, 0, 14, 130),
(1053, '2015-12-07', '08:30', 261, 273, 0, 0, 14, 130),
(1054, '2015-12-07', '08:30', 263, 264, 0, 0, 14, 130),
(1055, '2015-12-07', '08:30', 263, 267, 0, 0, 14, 130),
(1056, '2015-12-07', '08:30', 263, 273, 0, 0, 14, 130),
(1057, '2015-12-07', '08:30', 264, 267, 0, 0, 14, 130),
(1058, '2015-12-07', '08:30', 264, 273, 0, 0, 14, 130),
(1059, '2015-12-07', '08:30', 267, 273, 0, 0, 14, 130),
(1060, '2015-12-07', '08:30', 274, 275, 0, 0, 15, 131),
(1061, '2015-12-07', '01:05', 246, 247, 2, 4, 13, 0),
(1062, '2015-12-07', '01:05', 261, 275, 3, 4, 14, 0),
(1063, '2015-12-07', '01:05', 274, 263, 2, 4, 15, 0),
(1064, '2015-12-07', '01:05', 0, 0, 0, 0, 16, 0),
(1065, '2015-12-07', '01:05', 0, 0, 0, 0, 17, 0),
(1066, '2015-12-07', '01:05', 0, 0, 0, 0, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oldOwner`
--

CREATE TABLE IF NOT EXISTS `oldOwner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(11) NOT NULL,
  `ID_Staff` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldTerrain`
--

CREATE TABLE IF NOT EXISTS `oldTerrain` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(250) NOT NULL,
  `ID_Owner` int(11) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `disponibiliteFrom` date NOT NULL,
  `disponibiliteTo` date NOT NULL,
  `CreationDate` date NOT NULL,
  `Type` varchar(500) NOT NULL,
  `Note` varchar(500) NOT NULL,
  `surface` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Owner`
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
(22, 316, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=514 ;

--
-- Dumping data for table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 9413, 'chemin des Bibilou, 14', 0, 413257954, 2147483647, '1964-11-19', 'Billy.Biloup@gmail.c', '2015-08-20', '', 0, 0, 1),
(70, 1, 'Antoine', 'ROLLIN', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 0, 0, 635434770, '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', 'R.A.S.', 0, 0, 1),
(107, 1, 'Johné', 'Doooooeuf', '0', 38000, '12', 450, 9, 6, '1978-11-14', 'j.d@hotmail.fr', '2015-11-11', 'J''aime les barbecues.', 1, 0, 0),
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
(144, 1, 'f1', 'l1', 'ville', 0, 'rue', 0, 0, 0, '2015-11-02', 'mail', '2015-11-03', 'note', 1, 0, 0),
(145, 1, 'Misa', 'Moka', 'Mouch', 7578, '75', 0, 335465468, 335465468, '2011-04-04', 'lzefjzf@ldgzj.com', '2015-11-18', '', 1, 0, 0),
(146, 0, 'Misa2', 'Moka2', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '2004-09-06', 'pikapika@hotmail.com', '2015-11-18', '', 1, 0, 0),
(147, 1, 'JoueurP0', 'NameP0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(148, 1, 'JoueurP1', 'NameP1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(149, 1, 'JoueurP2', 'NameP2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(150, 1, 'JoueurP3', 'NameP3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(151, 1, 'JoueurP4', 'NameP4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(152, 1, 'JoueurP5', 'NameP5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(153, 1, 'JoueurP6', 'NameP6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(154, 1, 'JoueurP7', 'NameP7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(155, 1, 'JoueurP8', 'NameP8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(156, 1, 'JoueurP9', 'NameP9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(157, 1, 'JoueurP10', 'NameP10', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1985-01-01', '10address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(158, 1, 'JoueurP11', 'NameP11', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1985-01-01', '11address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(159, 1, 'JoueurP12', 'NameP12', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '1985-01-01', '12address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(160, 1, 'JoueurP13', 'NameP13', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '1985-01-01', '13address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(161, 1, 'JoueurP14', 'NameP14', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '1985-01-01', '14address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(162, 1, 'JoueurP15', 'NameP15', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1985-01-01', '15address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(163, 1, 'JoueurP16', 'NameP16', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '1985-01-01', '16address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(164, 1, 'JoueurP17', 'NameP17', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1985-01-01', '17address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(165, 1, 'JoueurP18', 'NameP18', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '1985-01-01', '18address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(166, 1, 'JoueurP19', 'NameP19', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '1985-01-01', '19address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(167, 1, 'JoueurP20', 'NameP20', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1985-01-01', '20address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(168, 1, 'JoueurP21', 'NameP21', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '1985-01-01', '21address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(169, 1, 'JoueurP22', 'NameP22', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1985-01-01', '22address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(170, 1, 'JoueurP23', 'NameP23', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1985-01-01', '23address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(171, 1, 'JoueurP24', 'NameP24', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '1985-01-01', '24address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(172, 1, 'JoueurP25', 'NameP25', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '1985-01-01', '25address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(173, 1, 'JoueurP26', 'NameP26', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1985-01-01', '26address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(174, 1, 'JoueurP27', 'NameP27', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1985-01-01', '27address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(175, 1, 'JoueurP28', 'NameP28', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1985-01-01', '28address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(176, 1, 'JoueurP29', 'NameP29', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1985-01-01', '29address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(177, 1, 'JoueurP30', 'NameP30', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '1985-01-01', '30address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(178, 1, 'JoueurP31', 'NameP31', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '1985-01-01', '31address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(179, 1, 'JoueurP32', 'NameP32', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1985-01-01', '32address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(180, 1, 'JoueurP33', 'NameP33', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1985-01-01', '33address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(181, 1, 'JoueurP34', 'NameP34', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '1985-01-01', '34address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(182, 1, 'JoueurP35', 'NameP35', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1985-01-01', '35address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(183, 1, 'JoueurP36', 'NameP36', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1985-01-01', '36address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(184, 1, 'JoueurP37', 'NameP37', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1985-01-01', '37address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(185, 1, 'JoueurP38', 'NameP38', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1985-01-01', '38address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(186, 1, 'JoueurP39', 'NameP39', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1985-01-01', '39address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(187, 1, 'JoueurP40', 'NameP40', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '1985-01-01', '40address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(188, 1, 'JoueurP41', 'NameP41', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1985-01-01', '41address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(189, 1, 'JoueurP42', 'NameP42', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '1985-01-01', '42address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(190, 1, 'JoueurP43', 'NameP43', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '1985-01-01', '43address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(191, 1, 'JoueurP44', 'NameP44', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '1985-01-01', '44address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(192, 1, 'JoueurP45', 'NameP45', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1985-01-01', '45address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(193, 1, 'JoueurP46', 'NameP46', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1985-01-01', '46address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(194, 1, 'JoueurP47', 'NameP47', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1985-01-01', '47address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(195, 1, 'JoueurP48', 'NameP48', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '1985-01-01', '48address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(196, 1, 'JoueurP49', 'NameP49', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '1985-01-01', '49address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(197, 1, 'JoueurP50', 'NameP50', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '1985-01-01', '50address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(198, 1, 'JoueurP51', 'NameP51', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '1985-01-01', '51address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(199, 1, 'JoueurP52', 'NameP52', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1985-01-01', '52address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(200, 1, 'JoueurP53', 'NameP53', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1985-01-01', '53address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(201, 1, 'JoueurP54', 'NameP54', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1985-01-01', '54address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(202, 1, 'JoueurP55', 'NameP55', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1985-01-01', '55address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(203, 1, 'JoueurP56', 'NameP56', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1985-01-01', '56address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(204, 1, 'JoueurP57', 'NameP57', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1985-01-01', '57address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(205, 1, 'JoueurP58', 'NameP58', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1985-01-01', '58address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(206, 1, 'JoueurP59', 'NameP59', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1985-01-01', '59address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(207, 1, 'JoueurP60', 'NameP60', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1985-01-01', '60address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(208, 1, 'JoueurP61', 'NameP61', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1985-01-01', '61address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(209, 1, 'JoueurP62', 'NameP62', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '1985-01-01', '62address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(210, 1, 'JoueurP63', 'NameP63', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1985-01-01', '63address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(211, 1, 'JoueurP64', 'NameP64', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1985-01-01', '64address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(212, 1, 'JoueurP65', 'NameP65', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1985-01-01', '65address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(213, 1, 'JoueurP66', 'NameP66', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '1985-01-01', '66address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(214, 1, 'JoueurP67', 'NameP67', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1985-01-01', '67address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(215, 1, 'JoueurP68', 'NameP68', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1985-01-01', '68address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(216, 1, 'JoueurP69', 'NameP69', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1985-01-01', '69address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(217, 1, 'JoueurP70', 'NameP70', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1985-01-01', '70address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(218, 1, 'JoueurP71', 'NameP71', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1985-01-01', '71address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(219, 1, 'JoueurP72', 'NameP72', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1985-01-01', '72address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(220, 1, 'JoueurP73', 'NameP73', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1985-01-01', '73address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(221, 1, 'JoueurP74', 'NameP74', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1985-01-01', '74address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(222, 1, 'JoueurP75', 'NameP75', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1985-01-01', '75address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(223, 1, 'JoueurP76', 'NameP76', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1985-01-01', '76address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(224, 1, 'JoueurP77', 'NameP77', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1985-01-01', '77address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(225, 1, 'JoueurP78', 'NameP78', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1985-01-01', '78address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(226, 1, 'JoueurP79', 'NameP79', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '1985-01-01', '79address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(227, 1, 'JoueurP80', 'NameP80', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1985-01-01', '80address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(228, 1, 'JoueurP81', 'NameP81', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1985-01-01', '81address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(229, 1, 'JoueurP82', 'NameP82', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1985-01-01', '82address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(230, 1, 'JoueurP83', 'NameP83', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1985-01-01', '83address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(231, 1, 'JoueurP84', 'NameP84', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '1985-01-01', '84address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(232, 1, 'JoueurP85', 'NameP85', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1985-01-01', '85address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(233, 1, 'JoueurP86', 'NameP86', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1985-01-01', '86address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(234, 1, 'JoueurP87', 'NameP87', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '1985-01-01', '87address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(235, 1, 'JoueurP88', 'NameP88', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '1985-01-01', '88address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(236, 1, 'JoueurP89', 'NameP89', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '1985-01-01', '89address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(237, 1, 'JoueurP90', 'NameP90', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1985-01-01', '90address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(238, 1, 'JoueurP91', 'NameP91', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '1985-01-01', '91address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(239, 1, 'JoueurP92', 'NameP92', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1985-01-01', '92address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(240, 1, 'JoueurP93', 'NameP93', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '1985-01-01', '93address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(241, 1, 'JoueurP94', 'NameP94', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '1985-01-01', '94address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(242, 1, 'JoueurP95', 'NameP95', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '1985-01-01', '95address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(243, 1, 'JoueurP96', 'NameP96', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1985-01-01', '96address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(244, 1, 'JoueurP97', 'NameP97', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1985-01-01', '97address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(245, 1, 'JoueurP98', 'NameP98', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '1985-01-01', '98address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(246, 1, 'JoueurP99', 'NameP99', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1985-01-01', '99address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(247, 1, 'JoueurP100', 'NameP100', 'Ville100', 1000, 'Rue100', 1, 600000000, 600000000, '1985-01-01', '100address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(248, 1, 'JoueurP101', 'NameP101', 'Ville101', 1000, 'Rue101', 1, 600000000, 600000000, '1985-01-01', '101address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(249, 1, 'JoueurP102', 'NameP102', 'Ville102', 1000, 'Rue102', 1, 600000000, 600000000, '1985-01-01', '102address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(250, 1, 'JoueurP103', 'NameP103', 'Ville103', 1000, 'Rue103', 1, 600000000, 600000000, '1985-01-01', '103address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(251, 1, 'JoueurP104', 'NameP104', 'Ville104', 1000, 'Rue104', 1, 600000000, 600000000, '1985-01-01', '104address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(252, 1, 'JoueurP105', 'NameP105', 'Ville105', 1000, 'Rue105', 1, 600000000, 600000000, '1985-01-01', '105address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(253, 1, 'JoueurP106', 'NameP106', 'Ville106', 1000, 'Rue106', 1, 600000000, 600000000, '1985-01-01', '106address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(254, 1, 'JoueurP107', 'NameP107', 'Ville107', 1000, 'Rue107', 1, 600000000, 600000000, '1985-01-01', '107address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(255, 1, 'JoueurP108', 'NameP108', 'Ville108', 1000, 'Rue108', 1, 600000000, 600000000, '1985-01-01', '108address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(256, 1, 'JoueurP109', 'NameP109', 'Ville109', 1000, 'Rue109', 1, 600000000, 600000000, '1985-01-01', '109address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(257, 1, 'JoueurP110', 'NameP110', 'Ville110', 1000, 'Rue110', 1, 600000000, 600000000, '1985-01-01', '110address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(258, 1, 'JoueurP111', 'NameP111', 'Ville111', 1000, 'Rue111', 1, 600000000, 600000000, '1985-01-01', '111address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(259, 1, 'JoueurP112', 'NameP112', 'Ville112', 1000, 'Rue112', 1, 600000000, 600000000, '1985-01-01', '112address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(260, 1, 'JoueurP113', 'NameP113', 'Ville113', 1000, 'Rue113', 1, 600000000, 600000000, '1985-01-01', '113address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(261, 1, 'JoueurP114', 'NameP114', 'Ville114', 1000, 'Rue114', 1, 600000000, 600000000, '1985-01-01', '114address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(262, 1, 'JoueurP115', 'NameP115', 'Ville115', 1000, 'Rue115', 1, 600000000, 600000000, '1985-01-01', '115address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(263, 1, 'JoueurP116', 'NameP116', 'Ville116', 1000, 'Rue116', 1, 600000000, 600000000, '1985-01-01', '116address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(264, 1, 'JoueurP117', 'NameP117', 'Ville117', 1000, 'Rue117', 1, 600000000, 600000000, '1985-01-01', '117address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(265, 1, 'JoueurP118', 'NameP118', 'Ville118', 1000, 'Rue118', 1, 600000000, 600000000, '1985-01-01', '118address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(266, 1, 'JoueurP119', 'NameP119', 'Ville119', 1000, 'Rue119', 1, 600000000, 600000000, '1985-01-01', '119address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(267, 1, 'JoueurP120', 'NameP120', 'Ville120', 1000, 'Rue120', 1, 600000000, 600000000, '1985-01-01', '120address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(268, 1, 'JoueurP121', 'NameP121', 'Ville121', 1000, 'Rue121', 1, 600000000, 600000000, '1985-01-01', '121address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(269, 1, 'JoueurP122', 'NameP122', 'Ville122', 1000, 'Rue122', 1, 600000000, 600000000, '1985-01-01', '122address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(270, 1, 'JoueurP123', 'NameP123', 'Ville123', 1000, 'Rue123', 1, 600000000, 600000000, '1985-01-01', '123address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(271, 1, 'JoueurP124', 'NameP124', 'Ville124', 1000, 'Rue124', 1, 600000000, 600000000, '1985-01-01', '124address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(272, 1, 'JoueurP125', 'NameP125', 'Ville125', 1000, 'Rue125', 1, 600000000, 600000000, '1985-01-01', '125address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(273, 1, 'JoueurP126', 'NameP126', 'Ville126', 1000, 'Rue126', 1, 600000000, 600000000, '1985-01-01', '126address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(274, 1, 'JoueurP127', 'NameP127', 'Ville127', 1000, 'Rue127', 1, 600000000, 600000000, '1985-01-01', '127address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(275, 1, 'JoueurP128', 'NameP128', 'Ville128', 1000, 'Rue128', 1, 600000000, 600000000, '1985-01-01', '128address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(276, 1, 'JoueurP129', 'NameP129', 'Ville129', 1000, 'Rue129', 1, 600000000, 600000000, '1985-01-01', '129address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(277, 1, 'JoueurP130', 'NameP130', 'Ville130', 1000, 'Rue130', 1, 600000000, 600000000, '1985-01-01', '130address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(278, 1, 'JoueurP131', 'NameP131', 'Ville131', 1000, 'Rue131', 1, 600000000, 600000000, '1985-01-01', '131address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(279, 1, 'JoueurP132', 'NameP132', 'Ville132', 1000, 'Rue132', 1, 600000000, 600000000, '1985-01-01', '132address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(280, 1, 'JoueurP133', 'NameP133', 'Ville133', 1000, 'Rue133', 1, 600000000, 600000000, '1985-01-01', '133address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(281, 1, 'JoueurP134', 'NameP134', 'Ville134', 1000, 'Rue134', 1, 600000000, 600000000, '1985-01-01', '134address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(282, 1, 'JoueurP135', 'NameP135', 'Ville135', 1000, 'Rue135', 1, 600000000, 600000000, '1985-01-01', '135address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(283, 1, 'JoueurP136', 'NameP136', 'Ville136', 1000, 'Rue136', 1, 600000000, 600000000, '1985-01-01', '136address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(284, 1, 'JoueurP137', 'NameP137', 'Ville137', 1000, 'Rue137', 1, 600000000, 600000000, '1985-01-01', '137address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(285, 1, 'JoueurP138', 'NameP138', 'Ville138', 1000, 'Rue138', 1, 600000000, 600000000, '1985-01-01', '138address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(286, 1, 'JoueurP139', 'NameP139', 'Ville139', 1000, 'Rue139', 1, 600000000, 600000000, '1985-01-01', '139address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(287, 1, 'JoueurP140', 'NameP140', 'Ville140', 1000, 'Rue140', 1, 600000000, 600000000, '1985-01-01', '140address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(288, 1, 'JoueurP141', 'NameP141', 'Ville141', 1000, 'Rue141', 1, 600000000, 600000000, '1985-01-01', '141address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(289, 1, 'JoueurP142', 'NameP142', 'Ville142', 1000, 'Rue142', 1, 600000000, 600000000, '1985-01-01', '142address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(290, 1, 'JoueurP143', 'NameP143', 'Ville143', 1000, 'Rue143', 1, 600000000, 600000000, '1985-01-01', '143address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(291, 1, 'JoueurP144', 'NameP144', 'Ville144', 1000, 'Rue144', 1, 600000000, 600000000, '1985-01-01', '144address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(292, 1, 'JoueurP145', 'NameP145', 'Ville145', 1000, 'Rue145', 1, 600000000, 600000000, '1985-01-01', '145address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(293, 1, 'JoueurP146', 'NameP146', 'Ville146', 1000, 'Rue146', 1, 600000000, 600000000, '1985-01-01', '146address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(294, 1, 'JoueurP147', 'NameP147', 'Ville147', 1000, 'Rue147', 1, 600000000, 600000000, '1985-01-01', '147address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(295, 1, 'JoueurP148', 'NameP148', 'Ville148', 1000, 'Rue148', 1, 600000000, 600000000, '1985-01-01', '148address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(296, 1, 'JoueurP149', 'NameP149', 'Ville149', 1000, 'Rue149', 1, 600000000, 600000000, '1985-01-01', '149address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(297, 1, 'JoueurP150', 'NameP150', 'Ville150', 1000, 'Rue150', 1, 600000000, 600000000, '1985-01-01', '150address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(298, 1, 'JoueurP151', 'NameP151', 'Ville151', 1000, 'Rue151', 1, 600000000, 600000000, '1985-01-01', '151address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(299, 1, 'JoueurP152', 'NameP152', 'Ville152', 1000, 'Rue152', 1, 600000000, 600000000, '1985-01-01', '152address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(300, 1, 'JoueurP153', 'NameP153', 'Ville153', 1000, 'Rue153', 1, 600000000, 600000000, '1985-01-01', '153address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(301, 1, 'JoueurP154', 'NameP154', 'Ville154', 1000, 'Rue154', 1, 600000000, 600000000, '1985-01-01', '154address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(302, 1, 'JoueurP155', 'NameP155', 'Ville155', 1000, 'Rue155', 1, 600000000, 600000000, '1985-01-01', '155address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(303, 1, 'JoueurP156', 'NameP156', 'Ville156', 1000, 'Rue156', 1, 600000000, 600000000, '1985-01-01', '156address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(304, 1, 'JoueurP157', 'NameP157', 'Ville157', 1000, 'Rue157', 1, 600000000, 600000000, '1985-01-01', '157address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(305, 1, 'JoueurP158', 'NameP158', 'Ville158', 1000, 'Rue158', 1, 600000000, 600000000, '1985-01-01', '158address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(306, 1, 'JoueurP159', 'NameP159', 'Ville159', 1000, 'Rue159', 1, 600000000, 600000000, '1985-01-01', '159address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(307, 1, 'JoueurO0', 'NameO0', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1985-01-01', '0address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(308, 1, 'JoueurO1', 'NameO1', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1985-01-01', '1address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(309, 1, 'JoueurO2', 'NameO2', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', '2address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(310, 1, 'JoueurO3', 'NameO3', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1985-01-01', '3address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(311, 1, 'JoueurO4', 'NameO4', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1985-01-01', '4address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(312, 1, 'JoueurO5', 'NameO5', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1985-01-01', '5address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(313, 1, 'JoueurO6', 'NameO6', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1985-01-01', '6address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(314, 1, 'JoueurO7', 'NameO7', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1985-01-01', '7address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(315, 1, 'JoueurO8', 'NameO8', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1985-01-01', '8address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(316, 1, 'JoueurO9', 'NameO9', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '1985-01-01', '9address@mail.com', '2015-11-19', 'R.A.S.', 1, 0, 0),
(317, 0, 'a', 'Abra', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(318, 0, 'a', 'a', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(319, 0, 'a', 'Abra', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(320, 0, 'a', 'a', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(321, 0, 'a', 'Abra', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(322, 0, 'a', 'a', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(323, 0, 'a', 'Abra', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(324, 0, 'a', 'a', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(325, 0, 'a', 'Abra', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(326, 0, 'a', 'a', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(327, 0, 'a', 'Abra', 'vfegze', 453544, 'Mouch', 545, 335465468, 335465468, '2012-04-04', 'lzefjzf@ldgzj.com', '2015-11-29', '', 1, 0, 0),
(328, 0, 'a', 'a', 'pallete', 35435, 'gleijgvkzelvj', 54, 85341534, 335486846, '2013-03-03', 'pikapika@hotmail.com', '2015-11-29', '', 1, 0, 0),
(329, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(330, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(331, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(332, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(333, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(334, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(335, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(336, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(337, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(338, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(339, 0, 'Julien', 'Evrard', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(340, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(341, 0, 'Julien', 'Evrard', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(342, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(343, 0, 'Julien', 'Evrard', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(344, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(345, 0, 'Julien', 'Evrard', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(346, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(347, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(348, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(349, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(350, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(351, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(352, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(353, 0, 'Julien', 'Evrad', 'vfegze', 7578, 'azerty', 75, 335465468, 335465468, '1994-06-02', 'abra@pokemon.be', '2015-12-01', 'zetu', 1, 0, 0),
(354, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'pikapika@hotmail.com', '2015-12-01', 'sdfgh', 1, 0, 0),
(355, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(356, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(357, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(358, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(359, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(360, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(361, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(362, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(363, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(364, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(365, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(366, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(367, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(368, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(369, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(370, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(371, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(372, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(373, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(374, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(375, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(376, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(377, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(378, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(379, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(380, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(381, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(382, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(383, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(384, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(385, 0, 'Julien', 'Evrard', 'vfegze', 453544, 'efgaezgzeg', 545, 335465468, 335465468, '1994-06-02', 'lzefjzf@ldgzj.com', '2015-12-01', 'zarfehj', 1, 0, 0),
(386, 0, 'Marie', 'Leyder', 'clvkszjvlzekv', 35435, 'fezfvzev', 54, 335465468, 335486846, '1995-07-21', 'lzefjzf@ldgzj.com', '2015-12-01', '', 1, 0, 0),
(387, 0, 'Sami', 'Mokka', 'o', 0, 'o', 0, 0, 2147483647, '1994-02-02', 'o@o.fr', '2015-12-02', '', 1, 0, 0),
(388, 0, 'Lili', 'Best', 'a', 0, 'a', 0, 0, 2147483647, '1994-11-08', 'a@a.fr', '2015-12-02', '', 1, 0, 0),
(389, 0, 'Olivier', 'BOULANGER', 'kjhyhku', 234, 'jhfh', 123, 543676756, 2147483647, '1965-08-05', 'o@o.fr', '2015-12-05', 'dfghj', 1, 0, 0),
(390, 0, 'Roxane', 'BOULANGER', 'kfeflzief', 3456, 'drtyukhi', 2345, 2147483647, 2147483647, '1994-04-01', 'a@a.fr', '2015-12-05', 'cfvghjk', 1, 0, 0),
(391, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(392, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(393, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(394, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(395, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(396, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(397, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(398, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(399, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', '', 1, 0, 0),
(400, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiop', 1, 0, 0),
(401, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiop', 1, 0, 0),
(402, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiop', 1, 0, 0),
(403, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiopz', 1, 0, 0),
(404, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiopzzef', 1, 0, 0),
(405, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiopzzefs', 1, 0, 0),
(406, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiopzzefs', 1, 0, 0),
(407, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiopzzefs', 1, 0, 0),
(408, 0, 'pika', 'chu', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2012-04-05', 'lzefjzf@ldgzj.com', '2015-12-06', 'azertyuiopzzefsca', 1, 0, 0),
(409, 0, 'pika2', 'chu2', 'vfegze', 7578, 'efgaezgzeg', 545, 335465468, 897456151, '2013-03-03', 'abra@pokemon.be', '2015-12-06', 'cezvzebzb', 1, 0, 0),
(410, 0, 'pika3', 'chu3', 'vfegze', 7578, 'efgaezgzeg', 75, 335465468, 335465468, '2010-06-04', 'abra@pokemon.be', '2015-12-06', 'afavavav', 1, 0, 0),
(411, 0, 'pika4', 'chu4', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2004-12-10', 'lzefjzf@ldgzj.com', '2015-12-06', 'zezevzev', 1, 0, 0),
(412, 0, 'pika5', 'chu5', 'vfegze', 7578, 'Mouch', 75, 335465468, 335465468, '2010-11-07', 'lzefjzf@ldgzj.com', '2015-12-06', 'bdkbhskf', 1, 0, 0),
(413, 1, 'Tommy', 'Papineau', 'Ville0', 1000, 'Rue0', 1, 600000000, 600000000, '1972-01-01', 'Tommy.Papineau@mail.com', '2015-12-07', '', 1, 0, 0),
(414, 1, 'Jacob', 'Laberge', 'Ville1', 1000, 'Rue1', 1, 600000000, 600000000, '1991-01-01', 'Jacob.Laberge@mail.com', '2015-12-07', '', 1, 0, 0),
(415, 1, 'David', 'Généreux', 'Ville2', 1000, 'Rue2', 1, 600000000, 600000000, '1985-01-01', 'David.Généreux@mail.com', '2015-12-07', '', 1, 0, 0),
(416, 1, 'Tommy', 'Chan', 'Ville3', 1000, 'Rue3', 1, 600000000, 600000000, '1989-01-01', 'Tommy.Chan@mail.com', '2015-12-07', '', 1, 0, 0),
(417, 0, 'Noah', 'Briand', 'Ville4', 1000, 'Rue4', 1, 600000000, 600000000, '1989-01-01', 'Noah.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(418, 0, 'David', 'Papineau', 'Ville5', 1000, 'Rue5', 1, 600000000, 600000000, '1994-01-01', 'David.Papineau@mail.com', '2015-12-07', '', 1, 0, 0),
(419, 1, 'Antoine', 'Boissonneault', 'Ville6', 1000, 'Rue6', 1, 600000000, 600000000, '1961-01-01', 'Antoine.Boissonneault@mail.com', '2015-12-07', '', 1, 0, 0),
(420, 1, 'Isaac', 'Gagnon', 'Ville7', 1000, 'Rue7', 1, 600000000, 600000000, '1986-01-01', 'Isaac.Gagnon@mail.com', '2015-12-07', '', 1, 0, 0),
(421, 1, 'Mathieu', 'Roy', 'Ville8', 1000, 'Rue8', 1, 600000000, 600000000, '1990-01-01', 'Mathieu.Roy@mail.com', '2015-12-07', '', 1, 0, 0),
(422, 1, 'Alex', 'Pelletier', 'Ville9', 1000, 'Rue9', 1, 600000000, 600000000, '2003-01-01', 'Alex.Pelletier@mail.com', '2015-12-07', '', 1, 0, 0),
(423, 0, 'Elliot', 'Frappier', 'Ville10', 1000, 'Rue10', 1, 600000000, 600000000, '1990-01-01', 'Elliot.Frappier@mail.com', '2015-12-07', '', 1, 0, 0),
(424, 1, 'Thomas', 'Gauthier', 'Ville11', 1000, 'Rue11', 1, 600000000, 600000000, '1994-01-01', 'Thomas.Gauthier@mail.com', '2015-12-07', '', 1, 0, 0),
(425, 1, 'Malik', 'Poliquin', 'Ville12', 1000, 'Rue12', 1, 600000000, 600000000, '2002-01-01', 'Malik.Poliquin@mail.com', '2015-12-07', '', 1, 0, 0),
(426, 1, 'Loïc', 'Brousseau', 'Ville13', 1000, 'Rue13', 1, 600000000, 600000000, '1980-01-01', 'Loïc.Brousseau@mail.com', '2015-12-07', '', 1, 0, 0),
(427, 0, 'Christopher', 'Boissonneault', 'Ville14', 1000, 'Rue14', 1, 600000000, 600000000, '2005-01-01', 'Christopher.Boissonneault@mail.com', '2015-12-07', '', 1, 0, 0),
(428, 1, 'Philippe', 'Boucher', 'Ville15', 1000, 'Rue15', 1, 600000000, 600000000, '1991-01-01', 'Philippe.Boucher@mail.com', '2015-12-07', '', 1, 0, 0),
(429, 0, 'David', 'Miller', 'Ville16', 1000, 'Rue16', 1, 600000000, 600000000, '1968-01-01', 'David.Miller@mail.com', '2015-12-07', '', 1, 0, 0),
(430, 0, 'Charles', 'Berger', 'Ville17', 1000, 'Rue17', 1, 600000000, 600000000, '1970-01-01', 'Charles.Berger@mail.com', '2015-12-07', '', 1, 0, 0),
(431, 1, 'Benjamin', 'Laurin', 'Ville18', 1000, 'Rue18', 1, 600000000, 600000000, '2005-01-01', 'Benjamin.Laurin@mail.com', '2015-12-07', '', 1, 0, 0),
(432, 0, 'Gabriel', 'Larochelle', 'Ville19', 1000, 'Rue19', 1, 600000000, 600000000, '1972-01-01', 'Gabriel.Larochelle@mail.com', '2015-12-07', '', 1, 0, 0),
(433, 1, 'Mathis', 'Major', 'Ville20', 1000, 'Rue20', 1, 600000000, 600000000, '1987-01-01', 'Mathis.Major@mail.com', '2015-12-07', '', 1, 0, 0),
(434, 0, 'Charles', 'Gagné', 'Ville21', 1000, 'Rue21', 1, 600000000, 600000000, '1986-01-01', 'Charles.Gagné@mail.com', '2015-12-07', '', 1, 0, 0),
(435, 0, 'Jacob', 'Vallières', 'Ville22', 1000, 'Rue22', 1, 600000000, 600000000, '1975-01-01', 'Jacob.Vallières@mail.com', '2015-12-07', '', 1, 0, 0),
(436, 1, 'Malik', 'Leboeuf', 'Ville23', 1000, 'Rue23', 1, 600000000, 600000000, '1980-01-01', 'Malik.Leboeuf@mail.com', '2015-12-07', '', 1, 0, 0),
(437, 0, 'Anthony', 'Tremblay', 'Ville24', 1000, 'Rue24', 1, 600000000, 600000000, '2005-01-01', 'Anthony.Tremblay@mail.com', '2015-12-07', '', 1, 0, 0),
(438, 0, 'Maxime', 'Meloche', 'Ville25', 1000, 'Rue25', 1, 600000000, 600000000, '1979-01-01', 'Maxime.Meloche@mail.com', '2015-12-07', '', 1, 0, 0),
(439, 1, 'Julien', 'Bourgeois', 'Ville26', 1000, 'Rue26', 1, 600000000, 600000000, '1981-01-01', 'Julien.Bourgeois@mail.com', '2015-12-07', '', 1, 0, 0),
(440, 1, 'Charles', 'Miller', 'Ville27', 1000, 'Rue27', 1, 600000000, 600000000, '1984-01-01', 'Charles.Miller@mail.com', '2015-12-07', '', 1, 0, 0),
(441, 0, 'David', 'Ouellet', 'Ville28', 1000, 'Rue28', 1, 600000000, 600000000, '1982-01-01', 'David.Ouellet@mail.com', '2015-12-07', '', 1, 0, 0),
(442, 0, 'Jérémy', 'Gagné', 'Ville29', 1000, 'Rue29', 1, 600000000, 600000000, '1994-01-01', 'Jérémy.Gagné@mail.com', '2015-12-07', '', 1, 0, 0),
(443, 0, 'Maxime', 'Sylvestre', 'Ville30', 1000, 'Rue30', 1, 600000000, 600000000, '2004-01-01', 'Maxime.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(444, 0, 'Tommy', 'Vallières', 'Ville31', 1000, 'Rue31', 1, 600000000, 600000000, '1970-01-01', 'Tommy.Vallières@mail.com', '2015-12-07', '', 1, 0, 0),
(445, 1, 'Louis', 'Métivier', 'Ville32', 1000, 'Rue32', 1, 600000000, 600000000, '1967-01-01', 'Louis.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(446, 1, 'Maxime', 'Roy', 'Ville33', 1000, 'Rue33', 1, 600000000, 600000000, '1982-01-01', 'Maxime.Roy@mail.com', '2015-12-07', '', 1, 0, 0),
(447, 1, 'Jonathan', 'Tremblay', 'Ville34', 1000, 'Rue34', 1, 600000000, 600000000, '1970-01-01', 'Jonathan.Tremblay@mail.com', '2015-12-07', '', 1, 0, 0);
INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(448, 1, 'Hugo', 'Larrivée', 'Ville35', 1000, 'Rue35', 1, 600000000, 600000000, '1977-01-01', 'Hugo.Larrivée@mail.com', '2015-12-07', '', 1, 0, 0),
(449, 0, 'Isaac', 'Paquette', 'Ville36', 1000, 'Rue36', 1, 600000000, 600000000, '1980-01-01', 'Isaac.Paquette@mail.com', '2015-12-07', '', 1, 0, 0),
(450, 1, 'Édouard', 'Truchon', 'Ville37', 1000, 'Rue37', 1, 600000000, 600000000, '1986-01-01', 'Édouard.Truchon@mail.com', '2015-12-07', '', 1, 0, 0),
(451, 1, 'Cédric', 'Alarie', 'Ville38', 1000, 'Rue38', 1, 600000000, 600000000, '1998-01-01', 'Cédric.Alarie@mail.com', '2015-12-07', '', 1, 0, 0),
(452, 0, 'Justin', 'Latreille', 'Ville39', 1000, 'Rue39', 1, 600000000, 600000000, '1980-01-01', 'Justin.Latreille@mail.com', '2015-12-07', '', 1, 0, 0),
(453, 1, 'Guillaume', 'Papineau', 'Ville40', 1000, 'Rue40', 1, 600000000, 600000000, '1998-01-01', 'Guillaume.Papineau@mail.com', '2015-12-07', '', 1, 0, 0),
(454, 0, 'Christopher', 'Fradette', 'Ville41', 1000, 'Rue41', 1, 600000000, 600000000, '1971-01-01', 'Christopher.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(455, 0, 'Vincent', 'Lagacé', 'Ville42', 1000, 'Rue42', 1, 600000000, 600000000, '1967-01-01', 'Vincent.Lagacé@mail.com', '2015-12-07', '', 1, 0, 0),
(456, 1, 'Léo', 'Cournoyer', 'Ville43', 1000, 'Rue43', 1, 600000000, 600000000, '1997-01-01', 'Léo.Cournoyer@mail.com', '2015-12-07', '', 1, 0, 0),
(457, 1, 'Dylan', 'Laberge', 'Ville44', 1000, 'Rue44', 1, 600000000, 600000000, '1998-01-01', 'Dylan.Laberge@mail.com', '2015-12-07', '', 1, 0, 0),
(458, 0, 'Charles', 'Major', 'Ville45', 1000, 'Rue45', 1, 600000000, 600000000, '1987-01-01', 'Charles.Major@mail.com', '2015-12-07', '', 1, 0, 0),
(459, 0, 'Vincent', 'Gouin', 'Ville46', 1000, 'Rue46', 1, 600000000, 600000000, '1968-01-01', 'Vincent.Gouin@mail.com', '2015-12-07', '', 1, 0, 0),
(460, 0, 'Thomas', 'Després', 'Ville47', 1000, 'Rue47', 1, 600000000, 600000000, '1984-01-01', 'Thomas.Després@mail.com', '2015-12-07', '', 1, 0, 0),
(461, 1, 'Raphaël', 'Leboeuf', 'Ville48', 1000, 'Rue48', 1, 600000000, 600000000, '1990-01-01', 'Raphaël.Leboeuf@mail.com', '2015-12-07', '', 1, 0, 0),
(462, 1, 'Tommy', 'Olivier', 'Ville49', 1000, 'Rue49', 1, 600000000, 600000000, '1999-01-01', 'Tommy.Olivier@mail.com', '2015-12-07', '', 1, 0, 0),
(463, 0, 'Cédric', 'Latreille', 'Ville50', 1000, 'Rue50', 1, 600000000, 600000000, '2001-01-01', 'Cédric.Latreille@mail.com', '2015-12-07', '', 1, 0, 0),
(464, 0, 'Justin', 'Bélanger', 'Ville51', 1000, 'Rue51', 1, 600000000, 600000000, '2001-01-01', 'Justin.Bélanger@mail.com', '2015-12-07', '', 1, 0, 0),
(465, 1, 'Christopher', 'Paquette', 'Ville52', 1000, 'Rue52', 1, 600000000, 600000000, '1989-01-01', 'Christopher.Paquette@mail.com', '2015-12-07', '', 1, 0, 0),
(466, 0, 'Noah', 'Sénéchal', 'Ville53', 1000, 'Rue53', 1, 600000000, 600000000, '1982-01-01', 'Noah.Sénéchal@mail.com', '2015-12-07', '', 1, 0, 0),
(467, 1, 'Émile', 'Métivier', 'Ville54', 1000, 'Rue54', 1, 600000000, 600000000, '1986-01-01', 'Émile.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(468, 1, 'Samuel', 'Leroux', 'Ville55', 1000, 'Rue55', 1, 600000000, 600000000, '1975-01-01', 'Samuel.Leroux@mail.com', '2015-12-07', '', 1, 0, 0),
(469, 1, 'Raphaël', 'Fradette', 'Ville56', 1000, 'Rue56', 1, 600000000, 600000000, '1981-01-01', 'Raphaël.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(470, 0, 'Justin', 'Larrivée', 'Ville57', 1000, 'Rue57', 1, 600000000, 600000000, '1998-01-01', 'Justin.Larrivée@mail.com', '2015-12-07', '', 1, 0, 0),
(471, 0, 'Logan', 'Lépine', 'Ville58', 1000, 'Rue58', 1, 600000000, 600000000, '1962-01-01', 'Logan.Lépine@mail.com', '2015-12-07', '', 1, 0, 0),
(472, 0, 'Louis', 'Briand', 'Ville59', 1000, 'Rue59', 1, 600000000, 600000000, '1995-01-01', 'Louis.Briand@mail.com', '2015-12-07', '', 1, 0, 0),
(473, 0, 'Gabriel', 'Després', 'Ville60', 1000, 'Rue60', 1, 600000000, 600000000, '1983-01-01', 'Gabriel.Després@mail.com', '2015-12-07', '', 1, 0, 0),
(474, 1, 'Gabriel', 'Métivier', 'Ville61', 1000, 'Rue61', 1, 600000000, 600000000, '1963-01-01', 'Gabriel.Métivier@mail.com', '2015-12-07', '', 1, 0, 0),
(475, 0, 'Adam', 'Bergeron', 'Ville62', 1000, 'Rue62', 1, 600000000, 600000000, '2003-01-01', 'Adam.Bergeron@mail.com', '2015-12-07', '', 1, 0, 0),
(476, 0, 'Alexis', 'Chan', 'Ville63', 1000, 'Rue63', 1, 600000000, 600000000, '1969-01-01', 'Alexis.Chan@mail.com', '2015-12-07', '', 1, 0, 0),
(477, 0, 'Simon', 'Girard', 'Ville64', 1000, 'Rue64', 1, 600000000, 600000000, '1976-01-01', 'Simon.Girard@mail.com', '2015-12-07', '', 1, 0, 0),
(478, 1, 'Adam', 'Olivier', 'Ville65', 1000, 'Rue65', 1, 600000000, 600000000, '1975-01-01', 'Adam.Olivier@mail.com', '2015-12-07', '', 1, 0, 0),
(479, 1, 'Édouard', 'Masson', 'Ville66', 1000, 'Rue66', 1, 600000000, 600000000, '1984-01-01', 'Édouard.Masson@mail.com', '2015-12-07', '', 1, 0, 0),
(480, 1, 'Simon', 'Crête', 'Ville67', 1000, 'Rue67', 1, 600000000, 600000000, '1995-01-01', 'Simon.Crête@mail.com', '2015-12-07', '', 1, 0, 0),
(481, 1, 'Malik', 'Bouchard', 'Ville68', 1000, 'Rue68', 1, 600000000, 600000000, '1996-01-01', 'Malik.Bouchard@mail.com', '2015-12-07', '', 1, 0, 0),
(482, 0, 'Jacob', 'Lafrance', 'Ville69', 1000, 'Rue69', 1, 600000000, 600000000, '1961-01-01', 'Jacob.Lafrance@mail.com', '2015-12-07', '', 1, 0, 0),
(483, 0, 'Charles', 'Bélanger', 'Ville70', 1000, 'Rue70', 1, 600000000, 600000000, '1985-01-01', 'Charles.Bélanger@mail.com', '2015-12-07', '', 1, 0, 0),
(484, 1, 'Noah', 'Fortin', 'Ville71', 1000, 'Rue71', 1, 600000000, 600000000, '1967-01-01', 'Noah.Fortin@mail.com', '2015-12-07', '', 1, 0, 0),
(485, 1, 'Tristan', 'Bouchard', 'Ville72', 1000, 'Rue72', 1, 600000000, 600000000, '1984-01-01', 'Tristan.Bouchard@mail.com', '2015-12-07', '', 1, 0, 0),
(486, 1, 'Noah', 'Pedneault', 'Ville73', 1000, 'Rue73', 1, 600000000, 600000000, '1976-01-01', 'Noah.Pedneault@mail.com', '2015-12-07', '', 1, 0, 0),
(487, 1, 'Loïc', 'Lévesque', 'Ville74', 1000, 'Rue74', 1, 600000000, 600000000, '1972-01-01', 'Loïc.Lévesque@mail.com', '2015-12-07', '', 1, 0, 0),
(488, 0, 'Adam', 'Boucher', 'Ville75', 1000, 'Rue75', 1, 600000000, 600000000, '1966-01-01', 'Adam.Boucher@mail.com', '2015-12-07', '', 1, 0, 0),
(489, 1, 'Raphaël', 'Papineau', 'Ville76', 1000, 'Rue76', 1, 600000000, 600000000, '1961-01-01', 'Raphaël.Papineau@mail.com', '2015-12-07', '', 1, 0, 0),
(490, 0, 'Julien', 'Poliquin', 'Ville77', 1000, 'Rue77', 1, 600000000, 600000000, '1987-01-01', 'Julien.Poliquin@mail.com', '2015-12-07', '', 1, 0, 0),
(491, 1, 'Adam', 'Sylvestre', 'Ville78', 1000, 'Rue78', 1, 600000000, 600000000, '1971-01-01', 'Adam.Sylvestre@mail.com', '2015-12-07', '', 1, 0, 0),
(492, 1, 'David', 'Crête', 'Ville79', 1000, 'Rue79', 1, 600000000, 600000000, '1975-01-01', 'David.Crête@mail.com', '2015-12-07', '', 1, 0, 0),
(493, 1, 'Justin', 'Pellerin', 'Ville80', 1000, 'Rue80', 1, 600000000, 600000000, '1978-01-01', 'Justin.Pellerin@mail.com', '2015-12-07', '', 1, 0, 0),
(494, 0, 'Benjamin', 'Brault', 'Ville81', 1000, 'Rue81', 1, 600000000, 600000000, '1979-01-01', 'Benjamin.Brault@mail.com', '2015-12-07', '', 1, 0, 0),
(495, 0, 'Victor', 'Bélanger', 'Ville82', 1000, 'Rue82', 1, 600000000, 600000000, '1972-01-01', 'Victor.Bélanger@mail.com', '2015-12-07', '', 1, 0, 0),
(496, 1, 'Michaël', 'Chrétien', 'Ville83', 1000, 'Rue83', 1, 600000000, 600000000, '1973-01-01', 'Michaël.Chrétien@mail.com', '2015-12-07', '', 1, 0, 0),
(497, 1, 'Louis', 'Ratté', 'Ville84', 1000, 'Rue84', 1, 600000000, 600000000, '2004-01-01', 'Louis.Ratté@mail.com', '2015-12-07', '', 1, 0, 0),
(498, 1, 'Simon', 'Laberge', 'Ville85', 1000, 'Rue85', 1, 600000000, 600000000, '1980-01-01', 'Simon.Laberge@mail.com', '2015-12-07', '', 1, 0, 0),
(499, 1, 'Nicolas', 'Pellerin', 'Ville86', 1000, 'Rue86', 1, 600000000, 600000000, '1975-01-01', 'Nicolas.Pellerin@mail.com', '2015-12-07', '', 1, 0, 0),
(500, 1, 'Anthony', 'Gouin', 'Ville87', 1000, 'Rue87', 1, 600000000, 600000000, '2004-01-01', 'Anthony.Gouin@mail.com', '2015-12-07', '', 1, 0, 0),
(501, 1, 'Félix', 'Laurin', 'Ville88', 1000, 'Rue88', 1, 600000000, 600000000, '2003-01-01', 'Félix.Laurin@mail.com', '2015-12-07', '', 1, 0, 0),
(502, 1, 'Charles', 'Fradette', 'Ville89', 1000, 'Rue89', 1, 600000000, 600000000, '1990-01-01', 'Charles.Fradette@mail.com', '2015-12-07', '', 1, 0, 0),
(503, 0, 'Justin', 'Bergeron', 'Ville90', 1000, 'Rue90', 1, 600000000, 600000000, '1988-01-01', 'Justin.Bergeron@mail.com', '2015-12-07', '', 1, 0, 0),
(504, 0, 'Simon', 'Masson', 'Ville91', 1000, 'Rue91', 1, 600000000, 600000000, '1960-01-01', 'Simon.Masson@mail.com', '2015-12-07', '', 1, 0, 0),
(505, 0, 'Émile', 'Rivest', 'Ville92', 1000, 'Rue92', 1, 600000000, 600000000, '1974-01-01', 'Émile.Rivest@mail.com', '2015-12-07', '', 1, 0, 0),
(506, 0, 'Julien', 'Gouin', 'Ville93', 1000, 'Rue93', 1, 600000000, 600000000, '1995-01-01', 'Julien.Gouin@mail.com', '2015-12-07', '', 1, 0, 0),
(507, 0, 'Dylan', 'Ratté', 'Ville94', 1000, 'Rue94', 1, 600000000, 600000000, '1972-01-01', 'Dylan.Ratté@mail.com', '2015-12-07', '', 1, 0, 0),
(508, 1, 'Cédric', 'Ranger', 'Ville95', 1000, 'Rue95', 1, 600000000, 600000000, '2001-01-01', 'Cédric.Ranger@mail.com', '2015-12-07', '', 1, 0, 0),
(509, 0, 'Jonathan', 'Bessette', 'Ville96', 1000, 'Rue96', 1, 600000000, 600000000, '1965-01-01', 'Jonathan.Bessette@mail.com', '2015-12-07', '', 1, 0, 0),
(510, 1, 'Tristan', 'Bélanger', 'Ville97', 1000, 'Rue97', 1, 600000000, 600000000, '1977-01-01', 'Tristan.Bélanger@mail.com', '2015-12-07', '', 1, 0, 0),
(511, 1, 'Édouard', 'Castonguay', 'Ville98', 1000, 'Rue98', 1, 600000000, 600000000, '1994-01-01', 'Édouard.Castonguay@mail.com', '2015-12-07', '', 1, 0, 0),
(512, 0, 'Christopher', 'Ouellet', 'Ville99', 1000, 'Rue99', 1, 600000000, 600000000, '1966-01-01', 'Christopher.Ouellet@mail.com', '2015-12-07', '', 1, 0, 0),
(513, 0, 'pika', 'chu', 'vfegze', 7578, 'efgaezgzeg', 75, 335465468, 335465468, '2013-03-03', 'lzefjzf@ldgzj.com', '2015-12-07', 'pika!!!', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PersonneExtra`
--

CREATE TABLE IF NOT EXISTS `PersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `PersonneExtra`
--

INSERT INTO `PersonneExtra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(55, 391, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Player`
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
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`, `Ranking`) VALUES
(391, 0, 0, 0, 'NC'),
(413, 0, 0, 0, ''),
(414, 0, 0, 0, ''),
(415, 0, 0, 0, ''),
(416, 0, 0, 0, ''),
(417, 0, 0, 0, ''),
(418, 0, 0, 0, ''),
(419, 0, 0, 0, ''),
(420, 0, 0, 0, ''),
(421, 0, 0, 0, ''),
(422, 0, 0, 0, ''),
(423, 0, 0, 0, ''),
(424, 0, 0, 0, ''),
(425, 0, 0, 0, ''),
(426, 0, 0, 0, ''),
(427, 0, 0, 0, ''),
(428, 0, 0, 0, ''),
(429, 0, 0, 0, ''),
(430, 0, 0, 0, ''),
(431, 0, 0, 0, ''),
(432, 0, 0, 0, ''),
(433, 0, 0, 0, ''),
(434, 0, 0, 0, ''),
(435, 0, 0, 0, ''),
(436, 0, 0, 0, ''),
(437, 0, 0, 0, ''),
(438, 0, 0, 0, ''),
(439, 0, 0, 0, ''),
(440, 0, 0, 0, ''),
(441, 0, 0, 0, ''),
(442, 0, 0, 0, ''),
(443, 0, 0, 0, ''),
(444, 0, 0, 0, ''),
(445, 0, 0, 0, ''),
(446, 0, 0, 0, ''),
(447, 0, 0, 0, ''),
(448, 0, 0, 0, ''),
(449, 0, 0, 0, ''),
(450, 0, 0, 0, ''),
(451, 0, 0, 0, ''),
(452, 0, 0, 0, ''),
(453, 0, 0, 0, ''),
(454, 0, 0, 0, ''),
(455, 0, 0, 0, ''),
(456, 0, 0, 0, ''),
(457, 0, 0, 0, ''),
(458, 0, 0, 0, ''),
(459, 0, 0, 0, ''),
(460, 0, 0, 0, ''),
(461, 0, 0, 0, ''),
(462, 0, 0, 0, ''),
(463, 0, 0, 0, ''),
(464, 0, 0, 0, ''),
(465, 0, 0, 0, ''),
(466, 0, 0, 0, ''),
(467, 0, 0, 0, ''),
(468, 0, 0, 0, ''),
(469, 0, 0, 0, ''),
(470, 0, 0, 0, ''),
(471, 0, 0, 0, ''),
(472, 0, 0, 0, ''),
(473, 0, 0, 0, ''),
(474, 0, 0, 0, ''),
(475, 0, 0, 0, ''),
(476, 0, 0, 0, ''),
(477, 0, 0, 0, ''),
(478, 0, 0, 0, ''),
(479, 0, 0, 0, ''),
(480, 0, 0, 0, ''),
(481, 0, 0, 0, ''),
(482, 0, 0, 0, ''),
(483, 0, 0, 0, ''),
(484, 0, 0, 0, ''),
(485, 0, 0, 0, ''),
(486, 0, 0, 0, ''),
(487, 0, 0, 0, ''),
(488, 0, 0, 0, ''),
(489, 0, 0, 0, ''),
(490, 0, 0, 0, ''),
(491, 0, 0, 0, ''),
(492, 0, 0, 0, ''),
(493, 0, 0, 0, ''),
(494, 0, 0, 0, ''),
(495, 0, 0, 0, ''),
(496, 0, 0, 0, ''),
(497, 0, 0, 0, ''),
(498, 0, 0, 0, ''),
(499, 0, 0, 0, ''),
(500, 0, 0, 0, ''),
(501, 0, 0, 0, ''),
(502, 0, 0, 0, ''),
(503, 0, 0, 0, ''),
(504, 0, 0, 0, ''),
(505, 0, 0, 0, ''),
(506, 0, 0, 0, ''),
(507, 0, 0, 0, ''),
(508, 0, 0, 0, ''),
(509, 0, 0, 0, ''),
(510, 0, 0, 0, ''),
(511, 0, 0, 0, ''),
(512, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `PlayerAlone`
--

CREATE TABLE IF NOT EXISTS `PlayerAlone` (
  `ID_Personne` int(255) NOT NULL,
  `Paid` tinyint(4) NOT NULL,
  `AlreadyPart` tinyint(4) NOT NULL,
  `Ranking` varchar(10) NOT NULL,
  UNIQUE KEY `ID_Personne` (`ID_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PlayerAlone`
--

INSERT INTO `PlayerAlone` (`ID_Personne`, `Paid`, `AlreadyPart`, `Ranking`) VALUES
(391, 0, 0, 'NC');

-- --------------------------------------------------------

--
-- Table structure for table `RankingTextToIntBelgian`
--

CREATE TABLE IF NOT EXISTS `RankingTextToIntBelgian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RankingText` varchar(10) COLLATE latin1_bin NOT NULL,
  `RankingInt` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=26 ;

--
-- Dumping data for table `RankingTextToIntBelgian`
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
(1, 7, '1', 16, 'hello', '1'),
(100, 70, '10', 17, '123', 'admin');

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
  `AvgRanking` varchar(10) NOT NULL,
  `Group_Vic` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Player1` (`ID_Player1`),
  KEY `ID_Player2` (`ID_Player2`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=276 ;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`, `AvgRanking`, `Group_Vic`) VALUES
(226, 413, 414, 21, 0, '', 0),
(227, 415, 416, 20, 0, '', 0),
(228, 417, 418, 20, 0, '', 0),
(229, 419, 420, 21, 0, '', 0),
(230, 421, 422, 20, 0, '', 0),
(231, 423, 424, 20, 0, '', 0),
(232, 425, 426, 20, 0, '', 0),
(233, 427, 428, 20, 0, '', 0),
(234, 429, 430, 21, 0, '', 0),
(235, 431, 432, 21, 0, '', 0),
(236, 433, 434, 20, 0, '', 0),
(237, 435, 436, 20, 0, '', 0),
(238, 437, 438, 20, 0, '', 0),
(239, 439, 440, 20, 0, '', 0),
(240, 441, 442, 20, 0, '', 0),
(241, 443, 444, 21, 0, '', 0),
(242, 445, 446, 21, 0, '', 0),
(243, 447, 448, 21, 0, '', 0),
(244, 449, 450, 20, 0, '', 0),
(245, 451, 452, 20, 0, '', 0),
(246, 453, 454, 21, 0, '', 1),
(247, 455, 456, 21, 4, '', 1),
(248, 457, 458, 20, 0, '', 0),
(249, 459, 460, 21, 0, '', 0),
(250, 461, 462, 20, 0, '', 0),
(251, 463, 464, 17, 0, '', 0),
(252, 465, 466, 20, 0, '', 0),
(253, 467, 468, 20, 0, '', 0),
(254, 469, 470, 20, 0, '', 0),
(255, 471, 472, 21, 0, '', 0),
(256, 473, 474, 21, 0, '', 0),
(257, 475, 476, 21, 0, '', 0),
(258, 477, 478, 20, 0, '', 0),
(259, 479, 480, 20, 0, '', 0),
(260, 481, 482, 21, 0, '', 0),
(261, 483, 484, 21, 0, '', 1),
(262, 485, 486, 20, 0, '', 0),
(263, 487, 488, 21, 0, '', 1),
(264, 489, 490, 21, 0, '', 0),
(265, 491, 492, 21, 0, '', 0),
(266, 493, 494, 20, 0, '', 0),
(267, 495, 496, 21, 0, '', 0),
(268, 497, 498, 20, 0, '', 0),
(269, 499, 500, 20, 0, '', 0),
(270, 501, 502, 20, 0, '', 0),
(271, 503, 504, 21, 0, '', 0),
(272, 505, 506, 21, 0, '', 0),
(273, 507, 508, 21, 0, '', 0),
(274, 509, 510, 21, 0, '', 1),
(275, 511, 512, 21, 0, '', 1);

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
