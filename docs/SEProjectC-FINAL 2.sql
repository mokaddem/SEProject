-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2015 at 10:34 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Categorie`
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
-- Table structure for table `ConfirmationPersonne`
--

CREATE TABLE IF NOT EXISTS `ConfirmationPersonne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Code` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Personne_ID` (`Personne_ID`,`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ConfirmationPersonne`
--

INSERT INTO `ConfirmationPersonne` (`ID`, `Personne_ID`, `Code`) VALUES
(40, 973, '3ba1b0a0ae5ab687181172a909e7f921'),
(41, 974, 'be6748418611923b60cd0d1571dabb80');

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
(3, 'T-shirt', 7, 'Le superbe T-shirt officiel'),
(4, 'Boissons à volontées', 8, 'Drink d''ouverture offert!');

-- --------------------------------------------------------

--
-- Table structure for table `GlobalVariables`
--

CREATE TABLE IF NOT EXISTS `GlobalVariables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE latin1_bin NOT NULL,
  `Value` varchar(1000) COLLATE latin1_bin NOT NULL,
  `Displayable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=22 ;

--
-- Dumping data for table `GlobalVariables`
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
(10, 'tournament_started_sam', '1', 0),
(11, 'tournament_started_dim', '1', 0),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `GroupSaturday`
--

INSERT INTO `GroupSaturday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(203, 22, 895, 896, 897, 898, NULL, NULL, NULL, NULL, 895, 17),
(204, 23, 900, 901, 902, 903, NULL, NULL, NULL, NULL, 900, 17),
(205, 24, 905, 906, 904, 899, NULL, NULL, NULL, NULL, 905, 17),
(206, 22, 878, 879, 880, 881, 882, NULL, NULL, NULL, 878, 16),
(207, 23, 883, 884, 885, 886, 887, NULL, NULL, NULL, 883, 16),
(208, 24, 888, 889, 890, 891, 892, NULL, NULL, NULL, 888, 16),
(209, 25, 893, 894, NULL, NULL, NULL, NULL, NULL, NULL, 893, 16),
(210, 22, 951, 952, 953, 954, 955, NULL, NULL, NULL, 951, 21),
(211, 23, 956, 957, 958, 959, 960, NULL, NULL, NULL, 956, 21),
(212, 24, 961, 962, 963, NULL, NULL, NULL, NULL, NULL, 961, 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `GroupSunday`
--

INSERT INTO `GroupSunday` (`ID`, `ID_terrain`, `ID_t1`, `ID_t2`, `ID_t3`, `ID_t4`, `ID_t5`, `ID_t6`, `ID_t7`, `ID_t8`, `ID_Leader`, `ID_Cat`) VALUES
(7, 22, 907, 908, 909, 910, 911, NULL, NULL, NULL, 907, 19),
(8, 23, 913, 914, 915, 916, 917, NULL, NULL, NULL, 913, 19),
(9, 24, 919, 920, 921, 922, 923, NULL, NULL, NULL, 919, 19),
(10, 25, 925, 926, 927, 928, 929, NULL, NULL, NULL, 925, 19),
(11, 22, 912, 918, 924, 930, NULL, NULL, NULL, NULL, 912, 0),
(12, 22, 931, 932, 933, 934, 935, NULL, NULL, NULL, 931, 20),
(13, 23, 937, 938, 939, 940, 941, NULL, NULL, NULL, 937, 20),
(14, 24, 943, 944, 945, 946, 947, NULL, NULL, NULL, 943, 20),
(15, 25, 949, 950, 948, 942, 936, NULL, NULL, NULL, 949, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3790 ;

--
-- Dumping data for table `History`
--

INSERT INTO `History` (`id`, `idPerson`, `idEntite`, `typeEntite`, `action`, `date`, `hour`) VALUES
(3775, 7, 0, 'Historique', 'Suppression', '2015-12-16', '18:27:45'),
(3776, 7, 1741, 'Joueur', 'Edition', '2015-12-16', '22:25:38'),
(3777, 7, 1743, 'Joueur', 'Edition', '2015-12-16', '22:26:04'),
(3778, 7, 1745, 'Joueur', 'Edition', '2015-12-16', '22:27:01'),
(3779, 7, 1748, 'Joueur', 'Edition', '2015-12-16', '22:27:37'),
(3780, 7, 1746, 'Joueur', 'Edition', '2015-12-16', '22:28:24'),
(3781, 7, 1777, 'Joueur', 'Edition', '2015-12-16', '22:28:53'),
(3782, 7, 1746, 'Joueur', 'Edition', '2015-12-16', '22:29:37'),
(3783, 7, 1777, 'Joueur', 'Edition', '2015-12-16', '22:29:46'),
(3784, 7, 1757, 'Joueur', 'Edition', '2015-12-16', '22:30:22'),
(3785, 7, 1788, 'Joueur', 'Edition', '2015-12-16', '22:30:43'),
(3786, 7, 1800, 'Joueur', 'Edition', '2015-12-16', '22:31:15'),
(3787, 7, 1825, 'Joueur', 'Edition', '2015-12-16', '22:31:50'),
(3788, 7, 1768, 'Joueur', 'Edition', '2015-12-16', '22:32:56'),
(3789, 7, 1794, 'Joueur', 'Edition', '2015-12-16', '22:33:32');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `KnockoffSaturday`
--

INSERT INTO `KnockoffSaturday` (`ID`, `ID_Match`, `Position`, `Category`) VALUES
(23, 2023, 1, 21),
(24, 2024, 2, 21),
(25, 2025, 3, 21),
(26, 2026, 4, 21),
(27, 2027, 5, 21),
(28, 2028, 6, 21),
(29, 2029, 7, 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `KnockoffSunday`
--

INSERT INTO `KnockoffSunday` (`ID`, `ID_Match`, `Position`, `Category`) VALUES
(1, 2030, 1, 20),
(2, 2031, 2, 20),
(3, 2032, 3, 20),
(4, 2033, 4, 20),
(5, 2034, 5, 20),
(6, 2035, 6, 20),
(7, 2036, 7, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2037 ;

--
-- Dumping data for table `Match`
--

INSERT INTO `Match` (`ID`, `date`, `hour`, `ID_Equipe1`, `ID_Equipe2`, `score1`, `score2`, `ID_Terrain`, `Poule_ID`) VALUES
(1821, '2015-12-11', '08:30', 895, 896, 0, 0, 22, 203),
(1822, '2015-12-11', '08:30', 895, 897, 0, 0, 22, 203),
(1823, '2015-12-11', '08:30', 895, 898, 0, 0, 22, 203),
(1825, '2015-12-11', '08:30', 896, 897, 0, 0, 22, 203),
(1826, '2015-12-11', '08:30', 896, 898, 0, 0, 22, 203),
(1828, '2015-12-11', '08:30', 897, 898, 0, 0, 22, 203),
(1831, '2015-12-11', '08:30', 900, 901, 0, 0, 23, 204),
(1832, '2015-12-11', '08:30', 900, 902, 0, 0, 23, 204),
(1833, '2015-12-11', '08:30', 900, 903, 0, 0, 23, 204),
(1835, '2015-12-11', '08:30', 901, 902, 0, 0, 23, 204),
(1836, '2015-12-11', '08:30', 901, 903, 0, 0, 23, 204),
(1838, '2015-12-11', '08:30', 902, 903, 0, 0, 23, 204),
(1841, '2015-12-11', '08:30', 905, 906, 0, 0, 24, 205),
(1842, '2015-12-11', '08:30', 904, 905, 0, 0, 0, 205),
(1843, '2015-12-11', '08:30', 904, 906, 0, 0, 0, 205),
(1844, '2015-12-11', '08:30', 899, 905, 0, 0, 0, 205),
(1845, '2015-12-11', '08:30', 899, 906, 0, 0, 0, 205),
(1846, '2015-12-11', '08:30', 899, 904, 0, 0, 0, 205),
(1847, '2015-12-11', '08:30', 907, 908, 3, 0, 22, 7),
(1848, '2015-12-11', '08:30', 907, 909, 1, 3, 22, 7),
(1849, '2015-12-11', '08:30', 907, 910, 2, 3, 22, 7),
(1850, '2015-12-11', '08:30', 907, 911, 3, 1, 22, 7),
(1852, '2015-12-11', '08:30', 908, 909, 3, 0, 22, 7),
(1853, '2015-12-11', '08:30', 908, 910, 3, 0, 22, 7),
(1854, '2015-12-11', '08:30', 908, 911, 1, 3, 22, 7),
(1856, '2015-12-11', '08:30', 909, 910, 3, 1, 22, 7),
(1857, '2015-12-11', '08:30', 909, 911, 3, 0, 22, 7),
(1859, '2015-12-11', '08:30', 910, 911, 1, 3, 22, 7),
(1862, '2015-12-11', '08:30', 913, 914, 3, 0, 23, 8),
(1863, '2015-12-11', '08:30', 913, 915, 0, 3, 23, 8),
(1864, '2015-12-11', '08:30', 913, 916, 3, 0, 23, 8),
(1865, '2015-12-11', '08:30', 913, 917, 3, 0, 23, 8),
(1867, '2015-12-11', '08:30', 914, 915, 2, 3, 23, 8),
(1868, '2015-12-11', '08:30', 914, 916, 2, 3, 23, 8),
(1869, '2015-12-11', '08:30', 914, 917, 3, 1, 23, 8),
(1871, '2015-12-11', '08:30', 915, 916, 3, 0, 23, 8),
(1872, '2015-12-11', '08:30', 915, 917, 3, 1, 23, 8),
(1874, '2015-12-11', '08:30', 916, 917, 3, 0, 23, 8),
(1877, '2015-12-11', '08:30', 919, 920, 3, 0, 24, 9),
(1878, '2015-12-11', '08:30', 919, 921, 3, 0, 24, 9),
(1879, '2015-12-11', '08:30', 919, 922, 3, 0, 24, 9),
(1880, '2015-12-11', '08:30', 919, 923, 0, 3, 24, 9),
(1882, '2015-12-11', '08:30', 920, 921, 3, 0, 24, 9),
(1883, '2015-12-11', '08:30', 920, 922, 0, 3, 24, 9),
(1884, '2015-12-11', '08:30', 920, 923, 0, 3, 24, 9),
(1886, '2015-12-11', '08:30', 921, 922, 3, 1, 24, 9),
(1887, '2015-12-11', '08:30', 921, 923, 2, 3, 24, 9),
(1889, '2015-12-11', '08:30', 922, 923, 1, 3, 24, 9),
(1892, '2015-12-11', '08:30', 925, 926, 3, 0, 25, 10),
(1893, '2015-12-11', '08:30', 925, 927, 3, 0, 25, 10),
(1894, '2015-12-11', '08:30', 925, 928, 3, 0, 25, 10),
(1895, '2015-12-11', '08:30', 925, 929, 2, 3, 25, 10),
(1897, '2015-12-11', '08:30', 926, 927, 3, 0, 25, 10),
(1898, '2015-12-11', '08:30', 926, 928, 3, 1, 25, 10),
(1899, '2015-12-11', '08:30', 926, 929, 3, 2, 25, 10),
(1901, '2015-12-11', '08:30', 927, 928, 3, 0, 25, 10),
(1902, '2015-12-11', '08:30', 927, 929, 2, 3, 25, 10),
(1904, '2015-12-11', '08:30', 928, 929, 3, 1, 25, 10),
(1907, '2015-12-11', '08:30', 912, 0, 0, 0, 22, 11),
(1908, '2015-12-11', '08:30', 918, 912, 0, 0, 22, 11),
(1909, '2015-12-11', '08:30', 924, 912, 0, 0, 22, 11),
(1910, '2015-12-11', '08:30', 924, 918, 0, 0, 22, 11),
(1911, '2015-12-11', '08:30', 930, 912, 0, 0, 22, 11),
(1912, '2015-12-11', '08:30', 930, 918, 0, 0, 22, 11),
(1913, '2015-12-11', '08:30', 930, 924, 0, 0, 22, 11),
(1914, '2015-12-11', '08:30', 878, 879, 0, 0, 22, 206),
(1915, '2015-12-11', '08:30', 878, 880, 0, 0, 22, 206),
(1916, '2015-12-11', '08:30', 878, 881, 0, 0, 22, 206),
(1917, '2015-12-11', '08:30', 878, 882, 0, 0, 22, 206),
(1918, '2015-12-11', '08:30', 879, 880, 0, 0, 22, 206),
(1919, '2015-12-11', '08:30', 879, 881, 0, 0, 22, 206),
(1920, '2015-12-11', '08:30', 879, 882, 0, 0, 22, 206),
(1921, '2015-12-11', '08:30', 880, 881, 0, 0, 22, 206),
(1922, '2015-12-11', '08:30', 880, 882, 0, 0, 22, 206),
(1923, '2015-12-11', '08:30', 881, 882, 0, 0, 22, 206),
(1924, '2015-12-11', '08:30', 883, 884, 0, 0, 23, 207),
(1925, '2015-12-11', '08:30', 883, 885, 0, 0, 23, 207),
(1926, '2015-12-11', '08:30', 883, 886, 0, 0, 23, 207),
(1927, '2015-12-11', '08:30', 883, 887, 0, 0, 23, 207),
(1928, '2015-12-11', '08:30', 884, 885, 0, 0, 23, 207),
(1929, '2015-12-11', '08:30', 884, 886, 0, 0, 23, 207),
(1930, '2015-12-11', '08:30', 884, 887, 0, 0, 23, 207),
(1931, '2015-12-11', '08:30', 885, 886, 0, 0, 23, 207),
(1932, '2015-12-11', '08:30', 885, 887, 0, 0, 23, 207),
(1933, '2015-12-11', '08:30', 886, 887, 0, 0, 23, 207),
(1934, '2015-12-11', '08:30', 888, 889, 0, 0, 24, 208),
(1935, '2015-12-11', '08:30', 888, 890, 0, 0, 24, 208),
(1936, '2015-12-11', '08:30', 888, 891, 0, 0, 24, 208),
(1937, '2015-12-11', '08:30', 888, 892, 0, 0, 24, 208),
(1938, '2015-12-11', '08:30', 889, 890, 0, 0, 24, 208),
(1939, '2015-12-11', '08:30', 889, 891, 0, 0, 24, 208),
(1940, '2015-12-11', '08:30', 889, 892, 0, 0, 24, 208),
(1941, '2015-12-11', '08:30', 890, 891, 0, 0, 24, 208),
(1942, '2015-12-11', '08:30', 890, 892, 0, 0, 24, 208),
(1943, '2015-12-11', '08:30', 891, 892, 0, 0, 24, 208),
(1944, '2015-12-11', '08:30', 893, 894, 0, 0, 25, 209),
(1945, '2015-12-11', '08:30', 951, 952, 3, 0, 22, 210),
(1946, '2015-12-11', '08:30', 951, 953, 3, 0, 22, 210),
(1947, '2015-12-11', '08:30', 951, 954, 3, 2, 22, 210),
(1948, '2015-12-11', '08:30', 951, 955, 2, 3, 22, 210),
(1949, '2015-12-11', '08:30', 952, 953, 3, 0, 22, 210),
(1950, '2015-12-11', '08:30', 952, 954, 2, 3, 22, 210),
(1951, '2015-12-11', '08:30', 952, 955, 0, 3, 22, 210),
(1952, '2015-12-11', '08:30', 953, 954, 3, 2, 22, 210),
(1953, '2015-12-11', '08:30', 953, 955, 3, 1, 22, 210),
(1954, '2015-12-11', '08:30', 954, 955, 3, 2, 22, 210),
(1955, '2015-12-11', '08:30', 956, 957, 3, 0, 23, 211),
(1956, '2015-12-11', '08:30', 956, 958, 3, 0, 23, 211),
(1957, '2015-12-11', '08:30', 956, 959, 2, 3, 23, 211),
(1958, '2015-12-11', '08:30', 956, 960, 2, 3, 23, 211),
(1959, '2015-12-11', '08:30', 957, 958, 3, 0, 23, 211),
(1960, '2015-12-11', '08:30', 957, 959, 0, 3, 23, 211),
(1961, '2015-12-11', '08:30', 957, 960, 1, 3, 23, 211),
(1962, '2015-12-11', '08:30', 958, 959, 3, 1, 23, 211),
(1963, '2015-12-11', '08:30', 958, 960, 3, 2, 23, 211),
(1964, '2015-12-11', '08:30', 959, 960, 3, 1, 23, 211),
(1965, '2015-12-11', '08:30', 961, 962, 3, 0, 24, 212),
(1966, '2015-12-11', '08:30', 961, 963, 3, 0, 24, 212),
(1967, '2015-12-11', '08:30', 962, 963, 3, 1, 24, 212),
(1968, '2015-12-11', '08:30', 931, 932, 3, 0, 22, 12),
(1969, '2015-12-11', '08:30', 931, 933, 3, 0, 22, 12),
(1970, '2015-12-11', '08:30', 931, 934, 3, 0, 22, 12),
(1971, '2015-12-11', '08:30', 931, 935, 3, 0, 22, 12),
(1973, '2015-12-11', '08:30', 932, 933, 3, 1, 22, 12),
(1974, '2015-12-11', '08:30', 932, 934, 2, 3, 22, 12),
(1975, '2015-12-11', '08:30', 932, 935, 3, 1, 22, 12),
(1977, '2015-12-11', '08:30', 933, 934, 3, 0, 22, 12),
(1978, '2015-12-11', '08:30', 933, 935, 0, 3, 22, 12),
(1980, '2015-12-11', '08:30', 934, 935, 3, 0, 22, 12),
(1983, '2015-12-11', '08:30', 937, 938, 3, 0, 23, 13),
(1984, '2015-12-11', '08:30', 937, 939, 3, 0, 23, 13),
(1985, '2015-12-11', '08:30', 937, 940, 3, 0, 23, 13),
(1986, '2015-12-11', '08:30', 937, 941, 3, 0, 23, 13),
(1988, '2015-12-11', '08:30', 938, 939, 0, 3, 23, 13),
(1989, '2015-12-11', '08:30', 938, 940, 3, 1, 23, 13),
(1990, '2015-12-11', '08:30', 938, 941, 0, 3, 23, 13),
(1992, '2015-12-11', '08:30', 939, 940, 2, 3, 23, 13),
(1993, '2015-12-11', '08:30', 939, 941, 2, 3, 23, 13),
(1995, '2015-12-11', '08:30', 940, 941, 3, 0, 23, 13),
(1998, '2015-12-11', '08:30', 943, 944, 3, 0, 24, 14),
(1999, '2015-12-11', '08:30', 943, 945, 0, 3, 24, 14),
(2000, '2015-12-11', '08:30', 943, 946, 3, 0, 24, 14),
(2001, '2015-12-11', '08:30', 943, 947, 0, 3, 24, 14),
(2003, '2015-12-11', '08:30', 944, 945, 2, 3, 24, 14),
(2004, '2015-12-11', '08:30', 944, 946, 0, 3, 24, 14),
(2005, '2015-12-11', '08:30', 944, 947, 3, 2, 24, 14),
(2007, '2015-12-11', '08:30', 945, 946, 3, 0, 24, 14),
(2008, '2015-12-11', '08:30', 945, 947, 3, 0, 24, 14),
(2010, '2015-12-11', '08:30', 946, 947, 3, 0, 24, 14),
(2013, '2015-12-11', '08:30', 949, 950, 3, 0, 25, 15),
(2014, '2015-12-11', '08:30', 948, 949, 0, 3, 25, 15),
(2015, '2015-12-11', '08:30', 948, 950, 3, 0, 25, 15),
(2016, '2015-12-11', '08:30', 942, 949, 0, 3, 25, 15),
(2017, '2015-12-11', '08:30', 942, 950, 0, 3, 25, 15),
(2018, '2015-12-11', '08:30', 942, 948, 3, 0, 25, 15),
(2019, '2015-12-11', '08:30', 936, 949, 3, 0, 25, 15),
(2020, '2015-12-11', '08:30', 936, 950, 3, 0, 25, 15),
(2021, '2015-12-11', '08:30', 936, 948, 3, 0, 25, 15),
(2022, '2015-12-11', '08:30', 936, 942, 0, 3, 25, 15),
(2023, '2015-12-11', '14:00', 952, 958, 3, 1, 22, -1),
(2024, '2015-12-11', '14:00', 951, 959, 2, 3, 23, -1),
(2025, '2015-12-11', '14:00', 956, 961, 2, 0, 24, -1),
(2026, '2015-12-11', '15:00', 953, -2, 0, 0, -1, -1),
(2027, '2015-12-11', '15:00', 956, 959, 0, 3, 25, -1),
(2028, '2015-12-11', '16:00', 953, 952, 0, 3, 22, -1),
(2029, '2015-12-11', '17:00', 959, 0, 0, 0, 23, -1),
(2030, '2015-12-11', '14:00', 940, 937, 0, 0, 22, -2),
(2031, '2015-12-11', '14:00', 945, 931, 0, 0, 23, -2),
(2032, '2015-12-11', '14:00', 949, 932, 0, 0, 24, -2),
(2033, '2015-12-11', '15:00', 936, 943, 0, 0, 25, -2),
(2034, '2015-12-11', '15:00', 0, 0, 0, 0, 22, -2),
(2035, '2015-12-11', '16:00', 0, 0, 0, 0, 23, -2),
(2036, '2015-12-11', '17:00', 0, 0, 0, 0, 24, -2);

-- --------------------------------------------------------

--
-- Table structure for table `OldOwner`
--

CREATE TABLE IF NOT EXISTS `OldOwner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(11) NOT NULL,
  `ID_Staff` int(11) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `OldTerrain`
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
  `StaffNote` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Owner`
--

INSERT INTO `Owner` (`ID`, `ID_Personne`, `ID_Staff`) VALUES
(27, 1912, 7),
(28, 1913, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1914 ;

--
-- Dumping data for table `Personne`
--

INSERT INTO `Personne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(7, 1, 'Super', 'Admin', '', 0, '', 0, '', '', '2015-01-01', '', '2015-01-01', '', 0, 0, 1),
(70, 1, 'Antoine', 'Rollin', 'Bourg-Lès-Valence', 26500, '192, rue des abricotiers', 12, '0476543298', '0105246978', '1994-05-06', 'antoine.rollin26@free.fr', '2015-11-05', '', 0, 0, 1),
(1740, 0, 'Sébastien', 'Ratté', 'Ville0', 1000, 'Rue0', 1, '600000000', '600000000', '2004-01-01', 'Sébastien.Ratté@mail.com', '2015-12-11', '', 1, 0, 0),
(1741, 1, 'David', 'Frappier', 'Ville1', 1000, 'Rue1', 1, '600000000', '600000000', '2003-01-01', 'David.Frappier@mail.com', '2015-12-11', 'Préfère les terrains en Gazon!', 1, 0, 0),
(1742, 0, 'Sacripant ', 'Crête', 'Ville2', 1000, 'Rue2', 1, '600000000', '600000000', '2004-01-01', 'Sacripant .Crête@mail.com', '2015-12-11', '', 1, 0, 0),
(1743, 1, 'Delmar', 'Pellerin', 'Ville3', 1000, 'Rue3', 1, '600000000', '600000000', '2003-01-01', 'Delmar.Pellerin@mail.com', '2015-12-11', 'Si possible, jouer sur un terrain près de chez moi.', 1, 0, 0),
(1744, 0, 'Guillaume', 'Girard', 'Ville4', 1000, 'Rue4', 1, '600000000', '600000000', '2004-01-01', 'Guillaume.Girard@mail.com', '2015-12-11', '', 1, 0, 0),
(1745, 1, 'Noah', 'Sénéchal', 'Ville5', 1000, 'Rue5', 1, '600000000', '600000000', '2003-01-01', 'Noah.Senechal@mail.com', '2015-12-11', 'Je suis tout seul. Pourrais-je avoir un cooéquipié fort pour gagner ?', 1, 0, 0),
(1746, 1, 'Artus ', 'Sylvestre', 'Ville6', 1000, 'Rue6', 1, '600000000', '600000000', '2004-01-01', 'Artus.Sylvestre@mail.com', '2015-12-11', 'aime les terrains en terre battue', 1, 0, 0),
(1747, 1, 'Chapin', 'Papineau', 'Ville7', 1000, 'Rue7', 1, '600000000', '600000000', '2004-01-01', 'Chapin.Papineau@mail.com', '2015-12-11', '', 1, 0, 0),
(1748, 1, 'Dylan', 'Nault', 'Ville8', 1000, 'Rue8', 1, '600000000', '600000000', '2003-01-01', 'Dylan.Nault@mail.com', '2015-12-11', 'Est-il possible d''acheter le t-shirt sur place ?', 1, 0, 0),
(1749, 1, 'Ray ', 'Ratté', 'Ville9', 1000, 'Rue9', 1, '600000000', '600000000', '2003-01-01', 'Ray .Ratté@mail.com', '2015-12-11', '', 1, 0, 0),
(1750, 0, 'Gabriel', 'Bessette', 'Ville10', 1000, 'Rue10', 1, '600000000', '600000000', '2003-01-01', 'Gabriel.Bessette@mail.com', '2015-12-11', '', 1, 0, 0),
(1751, 1, 'Justin', 'Leboeuf', 'Ville11', 1000, 'Rue11', 1, '600000000', '600000000', '2004-01-01', 'Justin.Leboeuf@mail.com', '2015-12-11', '', 1, 0, 0),
(1752, 0, 'Richard ', 'Gagnon', 'Ville12', 1000, 'Rue12', 1, '600000000', '600000000', '2004-01-01', 'Richard .Gagnon@mail.com', '2015-12-11', '', 1, 0, 0),
(1753, 1, 'Philippe', 'Alarie', 'Ville13', 1000, 'Rue13', 1, '600000000', '600000000', '2004-01-01', 'Philippe.Alarie@mail.com', '2015-12-11', '', 1, 0, 0),
(1754, 0, 'Léo', 'Poliquin', 'Ville14', 1000, 'Rue14', 1, '600000000', '600000000', '2003-01-01', 'Léo.Poliquin@mail.com', '2015-12-11', '', 1, 0, 0),
(1755, 1, 'Hugues ', 'Bergeron', 'Ville15', 1000, 'Rue15', 1, '600000000', '600000000', '2003-01-01', 'Hugues .Bergeron@mail.com', '2015-12-11', '', 1, 0, 0),
(1756, 0, 'Hugues ', 'Latreille', 'Ville16', 1000, 'Rue16', 1, '600000000', '600000000', '2004-01-01', 'Hugues .Latreille@mail.com', '2015-12-11', '', 1, 0, 0),
(1757, 1, 'Burnell', 'Leroux', 'Ville17', 1000, 'Rue17', 1, '600000000', '600000000', '2003-01-01', 'Burnell.Leroux@mail.com', '2015-12-11', 'aime les terrains en terra battue', 1, 0, 0),
(1758, 0, 'Tommy', 'Samson', 'Ville18', 1000, 'Rue18', 1, '600000000', '600000000', '2004-01-01', 'Tommy.Samson@mail.com', '2015-12-11', '', 1, 0, 0),
(1759, 1, 'Sacripant ', 'Gauthier', 'Ville19', 1000, 'Rue19', 1, '600000000', '600000000', '2003-01-01', 'Sacripant .Gauthier@mail.com', '2015-12-11', '', 1, 0, 0),
(1760, 0, 'Ray ', 'Brochu', 'Ville20', 1000, 'Rue20', 1, '600000000', '600000000', '2004-01-01', 'Ray .Brochu@mail.com', '2015-12-11', '', 1, 0, 0),
(1761, 1, 'Armand', 'Castonguay', 'Ville21', 1000, 'Rue21', 1, '600000000', '600000000', '2003-01-01', 'Armand.Castonguay@mail.com', '2015-12-11', '', 1, 0, 0),
(1762, 0, 'Belda ', 'Chrétien', 'Ville22', 1000, 'Rue22', 1, '600000000', '600000000', '2004-01-01', 'Belda .Chrétien@mail.com', '2015-12-11', '', 1, 0, 0),
(1763, 1, 'Michaël', 'Major', 'Ville23', 1000, 'Rue23', 1, '600000000', '600000000', '2004-01-01', 'Michaël.Major@mail.com', '2015-12-11', '', 1, 0, 0),
(1764, 0, 'Élisabeth', 'Olivier', 'Ville24', 1000, 'Rue24', 1, '600000000', '600000000', '2004-01-01', 'Élisabeth.Olivier@mail.com', '2015-12-11', '', 1, 0, 0),
(1765, 1, 'Julien', 'Papineau', 'Ville25', 1000, 'Rue25', 1, '600000000', '600000000', '2004-01-01', 'Julien.Papineau@mail.com', '2015-12-11', '', 1, 0, 0),
(1766, 0, 'Dylan', 'Frappier', 'Ville26', 1000, 'Rue26', 1, '600000000', '600000000', '2004-01-01', 'Dylan.Frappier@mail.com', '2015-12-11', '', 1, 0, 0),
(1767, 1, 'Evrard', 'Gagné', 'Ville27', 1000, 'Rue27', 1, '600000000', '600000000', '2004-01-01', 'Evrard.Gagné@mail.com', '2015-12-11', '', 1, 0, 0),
(1768, 1, 'Édouard', 'Roy', 'Ville28', 1000, 'Rue28', 1, '600000000', '600000000', '2003-01-01', 'edouard.Roy@mail.com', '2015-12-11', 'les balles sont sur places ?\r\n', 1, 0, 0),
(1769, 1, 'Anaïs', 'Pedneault', 'Ville29', 1000, 'Rue29', 1, '600000000', '600000000', '2004-01-01', 'Anaïs.Pedneault@mail.com', '2015-12-11', '', 1, 0, 0),
(1770, 0, 'Huette', 'Cournoyer', 'Ville30', 1000, 'Rue30', 1, '600000000', '600000000', '2003-01-01', 'Huette.Cournoyer@mail.com', '2015-12-11', '', 1, 0, 0),
(1771, 1, 'Simon', 'Olivier', 'Ville31', 1000, 'Rue31', 1, '600000000', '600000000', '2003-01-01', 'Simon.Olivier@mail.com', '2015-12-11', '', 1, 0, 0),
(1772, 0, 'Charlotte', 'Poliquin', 'Ville32', 1000, 'Rue32', 1, '600000000', '600000000', '2003-01-01', 'Charlotte.Poliquin@mail.com', '2015-12-11', '', 1, 0, 0),
(1773, 1, 'Trinette', 'Samson', 'Ville33', 1000, 'Rue33', 1, '600000000', '600000000', '2003-01-01', 'Trinette.Samson@mail.com', '2015-12-11', '', 1, 0, 0),
(1774, 0, 'Lucas', 'Chrétien', 'Ville0', 1000, 'Rue0', 1, '600000000', '600000000', '2002-01-01', 'Lucas.Chrétien@mail.com', '2015-12-11', '', 1, 0, 0),
(1775, 1, 'Nicolas', 'Lépine', 'Ville1', 1000, 'Rue1', 1, '600000000', '600000000', '2002-01-01', 'Nicolas.Lépine@mail.com', '2015-12-11', '', 1, 0, 0),
(1776, 0, 'Philippe', 'Boucher', 'Ville2', 1000, 'Rue2', 1, '600000000', '600000000', '2001-01-01', 'Philippe.Boucher@mail.com', '2015-12-11', '', 1, 0, 0),
(1777, 1, 'Félix', 'Sylvestre', 'Ville3', 1000, 'Rue3', 1, '600000000', '600000000', '2002-01-01', 'Felix.Sylvestre@mail.com', '2015-12-11', 'aime les terrains synthétique', 1, 0, 0),
(1778, 0, 'Anthony', 'Samson', 'Ville4', 1000, 'Rue4', 1, '600000000', '600000000', '2001-01-01', 'Anthony.Samson@mail.com', '2015-12-11', '', 1, 0, 0),
(1779, 1, 'Guillaume', 'Meloche', 'Ville5', 1000, 'Rue5', 1, '600000000', '600000000', '2001-01-01', 'Guillaume.Meloche@mail.com', '2015-12-11', '', 1, 0, 0),
(1780, 0, 'Gabriel', 'Rivest', 'Ville6', 1000, 'Rue6', 1, '600000000', '600000000', '2001-01-01', 'Gabriel.Rivest@mail.com', '2015-12-11', '', 1, 0, 0),
(1781, 1, 'Émile', 'Brousseau', 'Ville7', 1000, 'Rue7', 1, '600000000', '600000000', '2002-01-01', 'Émile.Brousseau@mail.com', '2015-12-11', '', 1, 0, 0),
(1782, 0, 'Raphaël', 'Bourgault', 'Ville8', 1000, 'Rue8', 1, '600000000', '600000000', '2002-01-01', 'Raphaël.Bourgault@mail.com', '2015-12-11', '', 1, 0, 0),
(1783, 1, 'Vincent', 'Alarie', 'Ville9', 1000, 'Rue9', 1, '600000000', '600000000', '2001-01-01', 'Vincent.Alarie@mail.com', '2015-12-11', '', 1, 0, 0),
(1784, 0, 'Jérémy', 'Gagné', 'Ville10', 1000, 'Rue10', 1, '600000000', '600000000', '2002-01-01', 'Jérémy.Gagné@mail.com', '2015-12-11', '', 1, 0, 0),
(1785, 1, 'Édouard', 'Métivier', 'Ville11', 1000, 'Rue11', 1, '600000000', '600000000', '2002-01-01', 'Édouard.Métivier@mail.com', '2015-12-11', '', 1, 0, 0),
(1786, 0, 'Émile', 'Després', 'Ville12', 1000, 'Rue12', 1, '600000000', '600000000', '2001-01-01', 'Émile.Després@mail.com', '2015-12-11', '', 1, 0, 0),
(1787, 1, 'Émile', 'Fortin', 'Ville13', 1000, 'Rue13', 1, '600000000', '600000000', '2002-01-01', 'Émile.Fortin@mail.com', '2015-12-11', '', 1, 0, 0),
(1788, 1, 'Ludovic', 'Leroux', 'Ville14', 1000, 'Rue14', 1, '600000000', '600000000', '2002-01-01', 'Ludovic.Leroux@mail.com', '2015-12-11', 'est-il possible de prendre le barbecue sur place ?', 1, 0, 0),
(1789, 1, 'Léo', 'Ouellet', 'Ville15', 1000, 'Rue15', 1, '600000000', '600000000', '2001-01-01', 'Léo.Ouellet@mail.com', '2015-12-11', '', 1, 0, 0),
(1790, 0, 'David', 'Bessette', 'Ville16', 1000, 'Rue16', 1, '600000000', '600000000', '2002-01-01', 'David.Bessette@mail.com', '2015-12-11', '', 1, 0, 0),
(1791, 1, 'Christopher', 'Leblanc', 'Ville17', 1000, 'Rue17', 1, '600000000', '600000000', '2002-01-01', 'Christopher.Leblanc@mail.com', '2015-12-11', '', 1, 0, 0),
(1792, 0, 'Hugo', 'Ranger', 'Ville18', 1000, 'Rue18', 1, '600000000', '600000000', '2002-01-01', 'Hugo.Ranger@mail.com', '2015-12-11', '', 1, 0, 0),
(1793, 1, 'Émile', 'Lévesque', 'Ville19', 1000, 'Rue19', 1, '600000000', '600000000', '2002-01-01', 'Émile.Lévesque@mail.com', '2015-12-11', '', 1, 0, 0),
(1794, 1, 'Nathan', 'Roy', 'Ville20', 1000, 'Rue20', 1, '600000000', '600000000', '2001-01-01', 'Nathan.Roy@mail.com', '2015-12-11', 'ya t''il moyen d''acheter des balles sur place ?', 1, 0, 0),
(1795, 1, 'Victor', 'Morin', 'Ville21', 1000, 'Rue21', 1, '600000000', '600000000', '2002-01-01', 'Victor.Morin@mail.com', '2015-12-11', '', 1, 0, 0),
(1796, 0, 'Jérémy', 'Truchon', 'Ville22', 1000, 'Rue22', 1, '600000000', '600000000', '2002-01-01', 'Jérémy.Truchon@mail.com', '2015-12-11', '', 1, 0, 0),
(1797, 1, 'Alex', 'Pelletier', 'Ville23', 1000, 'Rue23', 1, '600000000', '600000000', '2001-01-01', 'Alex.Pelletier@mail.com', '2015-12-11', '', 1, 0, 0),
(1798, 0, 'Justin', 'Boucher', 'Ville0', 1000, 'Rue0', 1, '600000000', '600000000', '1998-01-01', 'Justin.Boucher@mail.com', '2015-12-11', '', 1, 0, 0),
(1799, 0, 'Thomas', 'Daoust', 'Ville1', 1000, 'Rue1', 1, '600000000', '600000000', '1998-01-01', 'Thomas.Daoust@mail.com', '2015-12-11', '', 1, 0, 0),
(1800, 1, 'Christopher', 'Leroux', 'Ville2', 1000, 'Rue2', 1, '600000000', '600000000', '1997-01-01', 'Christopher.Leroux@mail.com', '2015-12-11', 'j''aimerai un bon cooequipier', 1, 0, 0),
(1801, 0, 'Tommy', 'Gagnon', 'Ville3', 1000, 'Rue3', 1, '600000000', '600000000', '1996-01-01', 'Tommy.Gagnon@mail.com', '2015-12-11', '', 1, 0, 0),
(1802, 0, 'Félix', 'Pellerin', 'Ville4', 1000, 'Rue4', 1, '600000000', '600000000', '1998-01-01', 'Félix.Pellerin@mail.com', '2015-12-11', '', 1, 0, 0),
(1803, 0, 'Jacob', 'Gagné', 'Ville5', 1000, 'Rue5', 1, '600000000', '600000000', '1998-01-01', 'Jacob.Gagné@mail.com', '2015-12-11', '', 1, 0, 0),
(1804, 0, 'Logan', 'Larrivée', 'Ville6', 1000, 'Rue6', 1, '600000000', '600000000', '1996-01-01', 'Logan.Larrivée@mail.com', '2015-12-11', '', 1, 0, 0),
(1805, 0, 'Antoine', 'Bessette', 'Ville7', 1000, 'Rue7', 1, '600000000', '600000000', '1997-01-01', 'Antoine.Bessette@mail.com', '2015-12-11', '', 1, 0, 0),
(1806, 0, 'Benjamin', 'Brochu', 'Ville8', 1000, 'Rue8', 1, '600000000', '600000000', '1998-01-01', 'Benjamin.Brochu@mail.com', '2015-12-11', '', 1, 0, 0),
(1807, 0, 'Olivier', 'Brault', 'Ville9', 1000, 'Rue9', 1, '600000000', '600000000', '1997-01-01', 'Olivier.Brault@mail.com', '2015-12-11', '', 1, 0, 0),
(1808, 0, 'Anthony', 'Frappier', 'Ville10', 1000, 'Rue10', 1, '600000000', '600000000', '1998-01-01', 'Anthony.Frappier@mail.com', '2015-12-11', '', 1, 0, 0),
(1809, 0, 'Justin', 'Daoust', 'Ville11', 1000, 'Rue11', 1, '600000000', '600000000', '1998-01-01', 'Justin.Daoust@mail.com', '2015-12-11', '', 1, 0, 0),
(1810, 0, 'Jérémy', 'Lavoie', 'Ville12', 1000, 'Rue12', 1, '600000000', '600000000', '1996-01-01', 'Jérémy.Lavoie@mail.com', '2015-12-11', '', 1, 0, 0),
(1811, 0, 'Raphaël', 'Daoust', 'Ville13', 1000, 'Rue13', 1, '600000000', '600000000', '1996-01-01', 'Raphaël.Daoust@mail.com', '2015-12-11', '', 1, 0, 0),
(1812, 0, 'Thomas', 'Miller', 'Ville14', 1000, 'Rue14', 1, '600000000', '600000000', '1996-01-01', 'Thomas.Miller@mail.com', '2015-12-11', '', 1, 0, 0),
(1813, 0, 'Olivier', 'Lafrance', 'Ville15', 1000, 'Rue15', 1, '600000000', '600000000', '1998-01-01', 'Olivier.Lafrance@mail.com', '2015-12-11', '', 1, 0, 0),
(1814, 0, 'Vincent', 'Leblanc', 'Ville16', 1000, 'Rue16', 1, '600000000', '600000000', '1996-01-01', 'Vincent.Leblanc@mail.com', '2015-12-11', '', 1, 0, 0),
(1815, 0, 'Mathis', 'Brousseau', 'Ville17', 1000, 'Rue17', 1, '600000000', '600000000', '1997-01-01', 'Mathis.Brousseau@mail.com', '2015-12-11', '', 1, 0, 0),
(1816, 0, 'Vincent', 'Bouchard', 'Ville18', 1000, 'Rue18', 1, '600000000', '600000000', '1997-01-01', 'Vincent.Bouchard@mail.com', '2015-12-11', '', 1, 0, 0),
(1817, 0, 'Thomas', 'Berger', 'Ville19', 1000, 'Rue19', 1, '600000000', '600000000', '1998-01-01', 'Thomas.Berger@mail.com', '2015-12-11', '', 1, 0, 0),
(1818, 0, 'Raphaël', 'Bourgeois', 'Ville20', 1000, 'Rue20', 1, '600000000', '600000000', '1998-01-01', 'Raphaël.Bourgeois@mail.com', '2015-12-11', '', 1, 0, 0),
(1819, 0, 'Charles', 'Lesage', 'Ville21', 1000, 'Rue21', 1, '600000000', '600000000', '1996-01-01', 'Charles.Lesage@mail.com', '2015-12-11', '', 1, 0, 0),
(1820, 0, 'Julien', 'Pedneault', 'Ville22', 1000, 'Rue22', 1, '600000000', '600000000', '1997-01-01', 'Julien.Pedneault@mail.com', '2015-12-11', '', 1, 0, 0),
(1821, 0, 'Étienne', 'Briand', 'Ville23', 1000, 'Rue23', 1, '600000000', '600000000', '1997-01-01', 'Étienne.Briand@mail.com', '2015-12-11', '', 1, 0, 0),
(1822, 0, 'Hugo', 'Fortin', 'Ville24', 1000, 'Rue24', 1, '600000000', '600000000', '1997-01-01', 'Hugo.Fortin@mail.com', '2015-12-11', '', 1, 0, 0),
(1823, 0, 'Maxime', 'Cournoyer', 'Ville25', 1000, 'Rue25', 1, '600000000', '600000000', '1996-01-01', 'Maxime.Cournoyer@mail.com', '2015-12-11', '', 1, 0, 0),
(1824, 0, 'Logan', 'Tremblay', 'Ville26', 1000, 'Rue26', 1, '600000000', '600000000', '1996-01-01', 'Logan.Tremblay@mail.com', '2015-12-11', '', 1, 0, 0),
(1825, 1, 'Charles', 'Leroux', 'Ville27', 1000, 'Rue27', 1, '600000000', '600000000', '1996-01-01', 'Charles.Leroux@mail.com', '2015-12-11', 'je prends 3 barbecues en supplement', 1, 0, 0),
(1826, 0, 'Benjamin', 'Berger', 'Ville28', 1000, 'Rue28', 1, '600000000', '600000000', '1997-01-01', 'Benjamin.Berger@mail.com', '2015-12-11', '', 1, 0, 0),
(1827, 0, 'Hugo', 'Samson', 'Ville29', 1000, 'Rue29', 1, '600000000', '600000000', '1996-01-01', 'Hugo.Samson@mail.com', '2015-12-11', '', 1, 0, 0),
(1828, 0, 'Ludovic', 'Major', 'Ville30', 1000, 'Rue30', 1, '600000000', '600000000', '1998-01-01', 'Ludovic.Major@mail.com', '2015-12-11', '', 1, 0, 0),
(1829, 0, 'Léo', 'Gauthier', 'Ville31', 1000, 'Rue31', 1, '600000000', '600000000', '1996-01-01', 'Léo.Gauthier@mail.com', '2015-12-11', '', 1, 0, 0),
(1830, 0, 'Olivier', 'Lévesque', 'Ville32', 1000, 'Rue32', 1, '600000000', '600000000', '1996-01-01', 'Olivier.Lévesque@mail.com', '2015-12-11', '', 1, 0, 0),
(1831, 0, 'Mathieu', 'Lavoie', 'Ville33', 1000, 'Rue33', 1, '600000000', '600000000', '1997-01-01', 'Mathieu.Lavoie@mail.com', '2015-12-11', '', 1, 0, 0),
(1832, 0, 'Malik', 'Brousseau', 'Ville34', 1000, 'Rue34', 1, '600000000', '600000000', '1997-01-01', 'Malik.Brousseau@mail.com', '2015-12-11', '', 1, 0, 0),
(1833, 0, 'Vincent', 'Briand', 'Ville35', 1000, 'Rue35', 1, '600000000', '600000000', '1998-01-01', 'Vincent.Briand@mail.com', '2015-12-11', '', 1, 0, 0),
(1834, 0, 'Étienne', 'Fortin', 'Ville36', 1000, 'Rue36', 1, '600000000', '600000000', '1997-01-01', 'Étienne.Fortin@mail.com', '2015-12-11', '', 1, 0, 0),
(1835, 0, 'Lucas', 'Bourgault', 'Ville37', 1000, 'Rue37', 1, '600000000', '600000000', '1998-01-01', 'Lucas.Bourgault@mail.com', '2015-12-11', '', 1, 0, 0),
(1836, 0, 'Félix', 'Miller', 'Ville38', 1000, 'Rue38', 1, '600000000', '600000000', '1998-01-01', 'Félix.Miller@mail.com', '2015-12-11', '', 1, 0, 0),
(1837, 0, 'Jérémy', 'Bélanger', 'Ville39', 1000, 'Rue39', 1, '600000000', '600000000', '1997-01-01', 'Jérémy.Bélanger@mail.com', '2015-12-11', '', 1, 0, 0),
(1838, 0, 'Ludovic', 'Lévesque', 'Ville40', 1000, 'Rue40', 1, '600000000', '600000000', '1997-01-01', 'Ludovic.Lévesque@mail.com', '2015-12-11', '', 1, 0, 0),
(1839, 0, 'Dylan', 'Gauthier', 'Ville41', 1000, 'Rue41', 1, '600000000', '600000000', '1998-01-01', 'Dylan.Gauthier@mail.com', '2015-12-11', '', 1, 0, 0),
(1840, 0, 'Édouard', 'Gagnon', 'Ville42', 1000, 'Rue42', 1, '600000000', '600000000', '1996-01-01', 'Édouard.Gagnon@mail.com', '2015-12-11', '', 1, 0, 0),
(1841, 0, 'Michaël', 'Brault', 'Ville43', 1000, 'Rue43', 1, '600000000', '600000000', '1998-01-01', 'Michaël.Brault@mail.com', '2015-12-11', '', 1, 0, 0),
(1842, 0, 'Olivier', 'Nault', 'Ville44', 1000, 'Rue44', 1, '600000000', '600000000', '1998-01-01', 'Olivier.Nault@mail.com', '2015-12-11', '', 1, 0, 0),
(1843, 0, 'Dylan', 'Bourgault', 'Ville45', 1000, 'Rue45', 1, '600000000', '600000000', '1996-01-01', 'Dylan.Bourgault@mail.com', '2015-12-11', '', 1, 0, 0),
(1844, 0, 'Loïc', 'Lafrance', 'Ville46', 1000, 'Rue46', 1, '600000000', '600000000', '1996-01-01', 'Loïc.Lafrance@mail.com', '2015-12-11', '', 1, 0, 0),
(1845, 0, 'Jérémy', 'Brousseau', 'Ville47', 1000, 'Rue47', 1, '600000000', '600000000', '1996-01-01', 'Jérémy.Brousseau@mail.com', '2015-12-11', '', 1, 0, 0),
(1846, 0, 'Anthony', 'Bourgeois', 'Ville0', 1000, 'Rue0', 1, '600000000', '600000000', '1992-01-01', 'Anthony.Bourgeois@mail.com', '2015-12-11', '', 1, 0, 0),
(1847, 0, 'Ludovic', 'Major', 'Ville1', 1000, 'Rue1', 1, '600000000', '600000000', '1978-01-01', 'Ludovic.Major@mail.com', '2015-12-11', '', 1, 0, 0),
(1848, 0, 'David', 'Vallières', 'Ville2', 1000, 'Rue2', 1, '600000000', '600000000', '1988-01-01', 'David.Vallières@mail.com', '2015-12-11', '', 1, 0, 0),
(1849, 0, 'Émile', 'Desmarais', 'Ville3', 1000, 'Rue3', 1, '600000000', '600000000', '1994-01-01', 'Émile.Desmarais@mail.com', '2015-12-11', '', 1, 0, 0),
(1850, 0, 'Alexandre', 'Bergeron', 'Ville4', 1000, 'Rue4', 1, '600000000', '600000000', '1978-01-01', 'Alexandre.Bergeron@mail.com', '2015-12-11', '', 1, 0, 0),
(1851, 0, 'Charles', 'Grenon', 'Ville5', 1000, 'Rue5', 1, '600000000', '600000000', '1991-01-01', 'Charles.Grenon@mail.com', '2015-12-11', '', 1, 0, 0),
(1852, 0, 'Loïc', 'Fradette', 'Ville6', 1000, 'Rue6', 1, '600000000', '600000000', '1979-01-01', 'Loïc.Fradette@mail.com', '2015-12-11', '', 1, 0, 0),
(1853, 0, 'Guillaume', 'Gagnon', 'Ville7', 1000, 'Rue7', 1, '600000000', '600000000', '1990-01-01', 'Guillaume.Gagnon@mail.com', '2015-12-11', '', 1, 0, 0),
(1854, 0, 'Édouard', 'Nolet', 'Ville8', 1000, 'Rue8', 1, '600000000', '600000000', '1984-01-01', 'Édouard.Nolet@mail.com', '2015-12-11', '', 1, 0, 0),
(1855, 0, 'Alex', 'Boucher', 'Ville9', 1000, 'Rue9', 1, '600000000', '600000000', '1980-01-01', 'Alex.Boucher@mail.com', '2015-12-11', '', 1, 0, 0),
(1856, 0, 'Félix', 'Patenaude', 'Ville10', 1000, 'Rue10', 1, '600000000', '600000000', '1994-01-01', 'Félix.Patenaude@mail.com', '2015-12-11', '', 1, 0, 0),
(1857, 0, 'Gabriel', 'Généreux', 'Ville11', 1000, 'Rue11', 1, '600000000', '600000000', '1992-01-01', 'Gabriel.Généreux@mail.com', '2015-12-11', '', 1, 0, 0),
(1858, 0, 'Étienne', 'Truchon', 'Ville12', 1000, 'Rue12', 1, '600000000', '600000000', '1994-01-01', 'Étienne.Truchon@mail.com', '2015-12-11', '', 1, 0, 0),
(1859, 0, 'Jérémy', 'Larrivée', 'Ville13', 1000, 'Rue13', 1, '600000000', '600000000', '1985-01-01', 'Jérémy.Larrivée@mail.com', '2015-12-11', '', 1, 0, 0),
(1860, 0, 'Nathan', 'Nault', 'Ville14', 1000, 'Rue14', 1, '600000000', '600000000', '1993-01-01', 'Nathan.Nault@mail.com', '2015-12-11', '', 1, 0, 0),
(1861, 0, 'Raphaël', 'Bouchard', 'Ville15', 1000, 'Rue15', 1, '600000000', '600000000', '1979-01-01', 'Raphaël.Bouchard@mail.com', '2015-12-11', '', 1, 0, 0),
(1862, 0, 'Maxime', 'Roy', 'Ville16', 1000, 'Rue16', 1, '600000000', '600000000', '1986-01-01', 'Maxime.Roy@mail.com', '2015-12-11', '', 1, 0, 0),
(1863, 0, 'Anthony', 'Bélanger', 'Ville17', 1000, 'Rue17', 1, '600000000', '600000000', '1978-01-01', 'Anthony.Bélanger@mail.com', '2015-12-11', '', 1, 0, 0),
(1864, 0, 'Félix', 'Boissonneault', 'Ville18', 1000, 'Rue18', 1, '600000000', '600000000', '1982-01-01', 'Félix.Boissonneault@mail.com', '2015-12-11', '', 1, 0, 0),
(1865, 0, 'Gabriel', 'Després', 'Ville19', 1000, 'Rue19', 1, '600000000', '600000000', '1984-01-01', 'Gabriel.Després@mail.com', '2015-12-11', '', 1, 0, 0),
(1866, 0, 'Antoine', 'Olivier', 'Ville20', 1000, 'Rue20', 1, '600000000', '600000000', '1989-01-01', 'Antoine.Olivier@mail.com', '2015-12-11', '', 1, 0, 0),
(1867, 0, 'Benjamin', 'Bessette', 'Ville21', 1000, 'Rue21', 1, '600000000', '600000000', '1984-01-01', 'Benjamin.Bessette@mail.com', '2015-12-11', '', 1, 0, 0),
(1868, 0, 'Alexis', 'Chan', 'Ville22', 1000, 'Rue22', 1, '600000000', '600000000', '1993-01-01', 'Alexis.Chan@mail.com', '2015-12-11', '', 1, 0, 0),
(1869, 0, 'Olivier', 'Lajeunesse', 'Ville23', 1000, 'Rue23', 1, '600000000', '600000000', '1987-01-01', 'Olivier.Lajeunesse@mail.com', '2015-12-11', '', 1, 0, 0),
(1870, 0, 'Ludovic', 'Pellerin', 'Ville24', 1000, 'Rue24', 1, '600000000', '600000000', '1989-01-01', 'Ludovic.Pellerin@mail.com', '2015-12-11', '', 1, 0, 0),
(1871, 0, 'Noah', 'Meloche', 'Ville25', 1000, 'Rue25', 1, '600000000', '600000000', '1990-01-01', 'Noah.Meloche@mail.com', '2015-12-11', '', 1, 0, 0),
(1872, 0, 'Elliot', 'Bergeron', 'Ville26', 1000, 'Rue26', 1, '600000000', '600000000', '1992-01-01', 'Elliot.Bergeron@mail.com', '2015-12-11', '', 1, 0, 0),
(1873, 0, 'Mathieu', 'Alarie', 'Ville27', 1000, 'Rue27', 1, '600000000', '600000000', '1988-01-01', 'Mathieu.Alarie@mail.com', '2015-12-11', '', 1, 0, 0),
(1874, 0, 'Jérémy', 'Nolet', 'Ville28', 1000, 'Rue28', 1, '600000000', '600000000', '1989-01-01', 'Jérémy.Nolet@mail.com', '2015-12-11', '', 1, 0, 0),
(1875, 0, 'David', 'Ratté', 'Ville29', 1000, 'Rue29', 1, '600000000', '600000000', '1978-01-01', 'David.Ratté@mail.com', '2015-12-11', '', 1, 0, 0),
(1876, 0, 'Charles', 'Miller', 'Ville30', 1000, 'Rue30', 1, '600000000', '600000000', '1992-01-01', 'Charles.Miller@mail.com', '2015-12-11', '', 1, 0, 0),
(1877, 0, 'Samuel', 'Simard', 'Ville31', 1000, 'Rue31', 1, '600000000', '600000000', '1979-01-01', 'Samuel.Simard@mail.com', '2015-12-11', '', 1, 0, 0),
(1878, 0, 'Étienne', 'Poliquin', 'Ville32', 1000, 'Rue32', 1, '600000000', '600000000', '1994-01-01', 'Étienne.Poliquin@mail.com', '2015-12-11', '', 1, 0, 0),
(1879, 0, 'Alex', 'Miller', 'Ville33', 1000, 'Rue33', 1, '600000000', '600000000', '1994-01-01', 'Alex.Miller@mail.com', '2015-12-11', '', 1, 0, 0),
(1880, 0, 'Étienne', 'Gouin', 'Ville34', 1000, 'Rue34', 1, '600000000', '600000000', '1987-01-01', 'Étienne.Gouin@mail.com', '2015-12-11', '', 1, 0, 0),
(1881, 0, 'Alexandre', 'Castonguay', 'Ville35', 1000, 'Rue35', 1, '600000000', '600000000', '1978-01-01', 'Alexandre.Castonguay@mail.com', '2015-12-11', '', 1, 0, 0),
(1882, 0, 'Malik', 'Simard', 'Ville36', 1000, 'Rue36', 1, '600000000', '600000000', '1978-01-01', 'Malik.Simard@mail.com', '2015-12-11', '', 1, 0, 0),
(1883, 0, 'Thomas', 'Miller', 'Ville37', 1000, 'Rue37', 1, '600000000', '600000000', '1994-01-01', 'Thomas.Miller@mail.com', '2015-12-11', '', 1, 0, 0),
(1884, 0, 'Benjamin', 'Métivier', 'Ville38', 1000, 'Rue38', 1, '600000000', '600000000', '1986-01-01', 'Benjamin.Métivier@mail.com', '2015-12-11', '', 1, 0, 0),
(1885, 0, 'Nathan', 'Rivest', 'Ville39', 1000, 'Rue39', 1, '600000000', '600000000', '1978-01-01', 'Nathan.Rivest@mail.com', '2015-12-11', '', 1, 0, 0),
(1886, 0, 'Guillaume', 'Ranger', 'Ville0', 1000, 'Rue0', 1, '600000000', '600000000', '1967-01-01', 'Guillaume.Ranger@mail.com', '2015-12-11', '', 1, 0, 0),
(1887, 1, 'Lucas', 'Frappier', 'Ville1', 1000, 'Rue1', 1, '600000000', '600000000', '1962-01-01', 'Lucas.Frappier@mail.com', '2015-12-11', '', 1, 0, 0),
(1888, 0, 'Tommy', 'Ouellet', 'Ville2', 1000, 'Rue2', 1, '600000000', '600000000', '1958-01-01', 'Tommy.Ouellet@mail.com', '2015-12-11', '', 1, 0, 0),
(1889, 1, 'Adam', 'Briand', 'Ville3', 1000, 'Rue3', 1, '600000000', '600000000', '1967-01-01', 'Adam.Briand@mail.com', '2015-12-11', '', 1, 0, 0),
(1890, 0, 'Guillaume', 'Boucher', 'Ville4', 1000, 'Rue4', 1, '600000000', '600000000', '1973-01-01', 'Guillaume.Boucher@mail.com', '2015-12-11', '', 1, 0, 0),
(1891, 1, 'Olivier', 'Desmarais', 'Ville5', 1000, 'Rue5', 1, '600000000', '600000000', '1971-01-01', 'Olivier.Desmarais@mail.com', '2015-12-11', '', 1, 0, 0),
(1892, 0, 'Tristan', 'Fradette', 'Ville6', 1000, 'Rue6', 1, '600000000', '600000000', '1969-01-01', 'Tristan.Fradette@mail.com', '2015-12-11', '', 1, 0, 0),
(1893, 1, 'Hugo', 'Brault', 'Ville7', 1000, 'Rue7', 1, '600000000', '600000000', '1962-01-01', 'Hugo.Brault@mail.com', '2015-12-11', '', 1, 0, 0),
(1894, 0, 'Jacob', 'Lavoie', 'Ville8', 1000, 'Rue8', 1, '600000000', '600000000', '1959-01-01', 'Jacob.Lavoie@mail.com', '2015-12-11', '', 1, 0, 0),
(1895, 1, 'Alex', 'Chrétien', 'Ville9', 1000, 'Rue9', 1, '600000000', '600000000', '1965-01-01', 'Alex.Chrétien@mail.com', '2015-12-11', '', 1, 0, 0),
(1896, 0, 'Dylan', 'Carpentier', 'Ville10', 1000, 'Rue10', 1, '600000000', '600000000', '1974-01-01', 'Dylan.Carpentier@mail.com', '2015-12-11', '', 1, 0, 0),
(1897, 1, 'Benjamin', 'Boucher', 'Ville11', 1000, 'Rue11', 1, '600000000', '600000000', '1967-01-01', 'Benjamin.Boucher@mail.com', '2015-12-11', '', 1, 0, 0),
(1898, 0, 'Mathieu', 'Lépine', 'Ville12', 1000, 'Rue12', 1, '600000000', '600000000', '1969-01-01', 'Mathieu.Lépine@mail.com', '2015-12-11', '', 1, 0, 0),
(1899, 1, 'Michaël', 'Patenaude', 'Ville13', 1000, 'Rue13', 1, '600000000', '600000000', '1970-01-01', 'Michaël.Patenaude@mail.com', '2015-12-11', '', 1, 0, 0),
(1900, 0, 'Loïc', 'Tremblay', 'Ville14', 1000, 'Rue14', 1, '600000000', '600000000', '1973-01-01', 'Loïc.Tremblay@mail.com', '2015-12-11', '', 1, 0, 0),
(1901, 1, 'Félix', 'Crête', 'Ville15', 1000, 'Rue15', 1, '600000000', '600000000', '1971-01-01', 'Félix.Crête@mail.com', '2015-12-11', '', 1, 0, 0),
(1902, 0, 'Anthony', 'Côté', 'Ville16', 1000, 'Rue16', 1, '600000000', '600000000', '1972-01-01', 'Anthony.Côté@mail.com', '2015-12-11', '', 1, 0, 0),
(1903, 1, 'Cédric', 'Brault', 'Ville17', 1000, 'Rue17', 1, '600000000', '600000000', '1972-01-01', 'Cédric.Brault@mail.com', '2015-12-11', '', 1, 0, 0),
(1904, 0, 'Victor', 'Bossé', 'Ville18', 1000, 'Rue18', 1, '600000000', '600000000', '1962-01-01', 'Victor.Bossé@mail.com', '2015-12-11', '', 1, 0, 0),
(1905, 1, 'Mathis', 'Sauvé', 'Ville19', 1000, 'Rue19', 1, '600000000', '600000000', '1970-01-01', 'Mathis.Sauvé@mail.com', '2015-12-11', '', 1, 0, 0),
(1906, 0, 'Noah', 'Lépine', 'Ville20', 1000, 'Rue20', 1, '600000000', '600000000', '1967-01-01', 'Noah.Lépine@mail.com', '2015-12-11', '', 1, 0, 0),
(1907, 1, 'Elliot', 'Lépine', 'Ville21', 1000, 'Rue21', 1, '600000000', '600000000', '1968-01-01', 'Elliot.Lépine@mail.com', '2015-12-11', '', 1, 0, 0),
(1908, 0, 'Nathan', 'Nolet', 'Ville22', 1000, 'Rue22', 1, '600000000', '600000000', '1966-01-01', 'Nathan.Nolet@mail.com', '2015-12-11', '', 1, 0, 0),
(1909, 1, 'Ludovic', 'Morin', 'Ville23', 1000, 'Rue23', 1, '600000000', '600000000', '1963-01-01', 'Ludovic.Morin@mail.com', '2015-12-11', '', 1, 0, 0),
(1910, 0, 'David', 'Samson', 'Ville24', 1000, 'Rue24', 1, '600000000', '600000000', '1962-01-01', 'David.Samson@mail.com', '2015-12-11', '', 1, 0, 0),
(1911, 1, 'Elliot', 'Roy', 'Ville25', 1000, 'Rue25', 1, '600000000', '600000000', '1960-01-01', 'Elliot.Roy@mail.com', '2015-12-11', '', 1, 0, 0),
(1912, 1, 'Jean', 'Leriche', 'Villesoyes', 38000, 'Rue du printemps', 45, '+3513541351', '+86431244961', '1964-06-05', 'J.leriche@mail.com', '2015-12-11', '', 0, 1, 0),
(1913, 2, 'Pascale', 'Dubois', 'Tuin', 5497, 'rue du Flambeau', 12, '337465468', '+8643124461', '0000-00-00', 'c@polytech.unice.fr', '2015-12-11', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PersonneExtra`
--

CREATE TABLE IF NOT EXISTS `PersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `PersonneExtra`
--

INSERT INTO `PersonneExtra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(11, 1740, 3),
(12, 1741, 2),
(13, 1742, 3),
(14, 1743, 3),
(15, 1744, 2),
(16, 1745, 2),
(17, 1746, 2),
(18, 1747, 2),
(19, 1748, 2),
(20, 1749, 3),
(21, 1750, 4),
(22, 1751, 4),
(23, 1752, 1),
(24, 1753, 1),
(25, 1754, 4),
(26, 1755, 4),
(27, 1756, 4),
(28, 1757, 3),
(29, 1758, 3),
(30, 1759, 2),
(31, 1760, 2),
(32, 1761, 3),
(33, 1762, 1),
(34, 1763, 2),
(35, 1764, 2),
(36, 1765, 3),
(37, 1766, 1),
(38, 1767, 3),
(39, 1768, 3),
(40, 1769, 1),
(41, 1770, 3),
(42, 1771, 2),
(43, 1772, 4),
(44, 1773, 3),
(45, 1774, 2),
(46, 1775, 2),
(47, 1776, 1),
(48, 1777, 1),
(49, 1778, 2),
(50, 1779, 4),
(51, 1780, 1),
(52, 1781, 4),
(53, 1782, 1),
(54, 1783, 2),
(55, 1784, 4),
(56, 1785, 3),
(57, 1786, 2),
(58, 1787, 4),
(59, 1788, 2),
(60, 1789, 4),
(61, 1790, 1),
(62, 1791, 1),
(63, 1792, 3),
(64, 1793, 3),
(65, 1794, 2),
(66, 1795, 2),
(67, 1796, 4),
(68, 1797, 4),
(69, 1798, 2),
(70, 1799, 2),
(71, 1800, 1),
(72, 1801, 2),
(73, 1802, 3),
(74, 1803, 4),
(75, 1804, 2),
(76, 1805, 1),
(77, 1806, 3),
(78, 1807, 4),
(79, 1808, 4),
(80, 1809, 1),
(81, 1810, 3),
(82, 1811, 3),
(83, 1812, 2),
(84, 1813, 3),
(85, 1814, 2),
(86, 1815, 3),
(87, 1816, 3),
(88, 1817, 2),
(89, 1818, 4),
(90, 1819, 1),
(91, 1820, 3),
(92, 1821, 1),
(93, 1822, 3),
(94, 1823, 4),
(95, 1824, 4),
(96, 1825, 2),
(97, 1826, 2),
(98, 1827, 1),
(99, 1828, 1),
(100, 1829, 3),
(101, 1830, 1),
(102, 1831, 4),
(103, 1832, 3),
(104, 1833, 1),
(105, 1834, 2),
(106, 1835, 3),
(107, 1836, 3),
(108, 1837, 4),
(109, 1838, 2),
(110, 1839, 4),
(111, 1840, 2),
(112, 1841, 2),
(113, 1842, 4),
(114, 1843, 2),
(115, 1844, 1),
(116, 1845, 3),
(117, 1846, 1),
(118, 1847, 4),
(119, 1848, 2),
(120, 1849, 4),
(121, 1850, 1),
(122, 1851, 4),
(123, 1852, 2),
(124, 1853, 4),
(125, 1854, 4),
(126, 1855, 4),
(127, 1856, 1),
(128, 1857, 1),
(129, 1858, 4),
(130, 1859, 2),
(131, 1860, 2),
(132, 1861, 4),
(133, 1862, 2),
(134, 1863, 3),
(135, 1864, 4),
(136, 1865, 4),
(137, 1866, 4),
(138, 1867, 4),
(139, 1868, 1),
(140, 1869, 2),
(141, 1870, 1),
(142, 1871, 2),
(143, 1872, 3),
(144, 1873, 2),
(145, 1874, 3),
(146, 1875, 3),
(147, 1876, 4),
(148, 1877, 1),
(149, 1878, 1),
(150, 1879, 3),
(151, 1880, 4),
(152, 1881, 3),
(153, 1882, 1),
(154, 1883, 2),
(155, 1884, 1),
(156, 1885, 4),
(157, 1886, 1),
(158, 1887, 1),
(159, 1888, 2),
(160, 1889, 4),
(161, 1890, 1),
(162, 1891, 4),
(163, 1892, 2),
(164, 1893, 3),
(165, 1894, 1),
(166, 1895, 2),
(167, 1896, 3),
(168, 1897, 4),
(169, 1898, 3),
(170, 1899, 4),
(171, 1900, 4),
(172, 1901, 1),
(173, 1902, 2),
(174, 1903, 3),
(175, 1904, 2),
(176, 1905, 4),
(177, 1906, 3),
(178, 1907, 4),
(179, 1908, 1),
(180, 1909, 1),
(181, 1910, 3),
(182, 1911, 1);

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
(1740, 0, 0, 0, 'C30.2'),
(1741, 0, 0, 0, 'C15.4'),
(1742, 0, 0, 0, 'C30'),
(1743, 0, 0, 0, 'C30.4'),
(1744, 0, 0, 0, 'C15'),
(1745, 0, 0, 0, 'C15.2'),
(1746, 0, 0, 0, 'C30.1'),
(1747, 0, 0, 0, 'C15.4'),
(1748, 0, 0, 0, 'C30.5'),
(1749, 0, 0, 0, 'C30.3'),
(1750, 0, 0, 0, 'C30'),
(1751, 0, 0, 0, 'C30.1'),
(1752, 0, 0, 0, 'C15.2'),
(1753, 0, 0, 0, 'C15'),
(1754, 0, 0, 0, 'C30.4'),
(1755, 0, 0, 0, 'C30'),
(1756, 0, 0, 0, 'C15'),
(1757, 0, 0, 0, 'C15'),
(1758, 0, 0, 0, 'C30.3'),
(1759, 0, 0, 0, 'C15.4'),
(1760, 0, 0, 0, 'C30.4'),
(1761, 0, 0, 0, 'C30.1'),
(1762, 0, 0, 0, 'C30'),
(1763, 0, 0, 0, 'C15.2'),
(1764, 0, 0, 0, 'C30.2'),
(1765, 0, 0, 0, 'C15.5'),
(1766, 0, 0, 0, 'C30'),
(1767, 0, 0, 0, 'C15.4'),
(1768, 0, 0, 0, 'C15.4'),
(1769, 0, 0, 0, 'C15.1'),
(1770, 0, 0, 0, 'C15.3'),
(1771, 0, 0, 0, 'C30.3'),
(1772, 0, 0, 0, 'C30.3'),
(1773, 0, 0, 0, 'C15.5'),
(1774, 0, 0, 0, 'C15.1'),
(1775, 0, 0, 0, 'C30.3'),
(1776, 0, 0, 0, 'C30.4'),
(1777, 0, 0, 0, 'NC'),
(1778, 0, 0, 0, 'NC'),
(1779, 0, 0, 0, 'C30.1'),
(1780, 0, 0, 0, 'C15.3'),
(1781, 0, 0, 0, 'C30.2'),
(1782, 0, 0, 0, 'C15'),
(1783, 0, 0, 0, 'C15.4'),
(1784, 0, 0, 0, 'C15.1'),
(1785, 0, 0, 0, 'C30'),
(1786, 0, 0, 0, 'C30.3'),
(1787, 0, 0, 0, 'C15.1'),
(1788, 0, 0, 0, 'C15.3'),
(1789, 0, 0, 0, 'C15.5'),
(1790, 0, 0, 0, 'C30.1'),
(1791, 0, 0, 0, 'C30.4'),
(1792, 0, 0, 0, 'C15.4'),
(1793, 0, 0, 0, 'C30.4'),
(1794, 0, 0, 0, 'C15.5'),
(1795, 0, 0, 0, 'C30.5'),
(1796, 0, 0, 0, 'C15.4'),
(1797, 0, 0, 0, 'C30.2'),
(1798, 0, 0, 0, 'C30'),
(1799, 0, 0, 0, 'C15.4'),
(1800, 0, 0, 0, 'C15'),
(1801, 0, 0, 0, 'C15.1'),
(1802, 0, 0, 0, 'C30'),
(1803, 0, 0, 0, 'C15'),
(1804, 0, 0, 0, 'C30'),
(1805, 0, 0, 0, 'C30.1'),
(1806, 0, 0, 0, 'C30.4'),
(1807, 0, 0, 0, 'C30.1'),
(1808, 0, 0, 0, 'C30'),
(1809, 0, 0, 0, 'C15'),
(1810, 0, 0, 0, 'C15.1'),
(1811, 0, 0, 0, 'C30'),
(1812, 0, 0, 0, 'C15.5'),
(1813, 0, 0, 0, 'C15.4'),
(1814, 0, 0, 0, 'C30'),
(1815, 0, 0, 0, 'C30.1'),
(1816, 0, 0, 0, 'C15.1'),
(1817, 0, 0, 0, 'C30.4'),
(1818, 0, 0, 0, 'C15.4'),
(1819, 0, 0, 0, 'NC'),
(1820, 0, 0, 0, 'C30.2'),
(1821, 0, 0, 0, 'C15.3'),
(1822, 0, 0, 0, 'C15.1'),
(1823, 0, 0, 0, 'C15'),
(1824, 0, 0, 0, 'C15.5'),
(1825, 0, 0, 0, 'C15.5'),
(1826, 0, 0, 0, 'C15.4'),
(1827, 0, 0, 0, 'C15.4'),
(1828, 0, 0, 0, 'NC'),
(1829, 0, 0, 0, 'C15.4'),
(1830, 0, 0, 0, 'C30.5'),
(1831, 0, 0, 0, 'C15.1'),
(1832, 0, 0, 0, 'C15.5'),
(1833, 0, 0, 0, 'C15.3'),
(1834, 0, 0, 0, 'C15.4'),
(1835, 0, 0, 0, 'C30.4'),
(1836, 0, 0, 0, 'C15'),
(1837, 0, 0, 0, 'NC'),
(1838, 0, 0, 0, 'C15.5'),
(1839, 0, 0, 0, 'C15.1'),
(1840, 0, 0, 0, 'C15.4'),
(1841, 0, 0, 0, 'C15.2'),
(1842, 0, 0, 0, 'C30.3'),
(1843, 0, 0, 0, 'C15.5'),
(1844, 0, 0, 0, 'NC'),
(1845, 0, 0, 0, 'NC'),
(1846, 0, 0, 0, 'NC'),
(1847, 0, 0, 0, 'C15.1'),
(1848, 0, 0, 0, 'C15.3'),
(1849, 0, 0, 0, 'C30.5'),
(1850, 0, 0, 0, 'C15.1'),
(1851, 0, 0, 0, 'C15.4'),
(1852, 0, 0, 0, 'C30'),
(1853, 0, 0, 0, 'C15.5'),
(1854, 0, 0, 0, 'C30.2'),
(1855, 0, 0, 0, 'C15.2'),
(1856, 0, 0, 0, 'C30.2'),
(1857, 0, 0, 0, 'C15.3'),
(1858, 0, 0, 0, 'C30.1'),
(1859, 0, 0, 0, 'C30.1'),
(1860, 0, 0, 0, 'C30.5'),
(1861, 0, 0, 0, 'NC'),
(1862, 0, 0, 0, 'C15.3'),
(1863, 0, 0, 0, 'C30.4'),
(1864, 0, 0, 0, 'C30.1'),
(1865, 0, 0, 0, 'C15.4'),
(1866, 0, 0, 0, 'C30.2'),
(1867, 0, 0, 0, 'C15.3'),
(1868, 0, 0, 0, 'C15.2'),
(1869, 0, 0, 0, 'C30.1'),
(1870, 0, 0, 0, 'C30.5'),
(1871, 0, 0, 0, 'C30.5'),
(1872, 0, 0, 0, 'C30.2'),
(1873, 0, 0, 0, 'C15'),
(1874, 0, 0, 0, 'C15'),
(1875, 0, 0, 0, 'C15'),
(1876, 0, 0, 0, 'C30.1'),
(1877, 0, 0, 0, 'NC'),
(1878, 0, 0, 0, 'NC'),
(1879, 0, 0, 0, 'C15'),
(1880, 0, 0, 0, 'C15.3'),
(1881, 0, 0, 0, 'C15.1'),
(1882, 0, 0, 0, 'C15.1'),
(1883, 0, 0, 0, 'NC'),
(1884, 0, 0, 0, 'NC'),
(1885, 0, 0, 0, 'C30'),
(1886, 0, 0, 0, 'C15'),
(1887, 0, 0, 0, 'C30.4'),
(1888, 0, 0, 0, 'C15.2'),
(1889, 0, 0, 0, 'C15.3'),
(1890, 0, 0, 0, 'C30.2'),
(1891, 0, 0, 0, 'C15.1'),
(1892, 0, 0, 0, 'C30'),
(1893, 0, 0, 0, 'C15.1'),
(1894, 0, 0, 0, 'C15.3'),
(1895, 0, 0, 0, 'C15'),
(1896, 0, 0, 0, 'C30.2'),
(1897, 0, 0, 0, 'C15.3'),
(1898, 0, 0, 0, 'C15.2'),
(1899, 0, 0, 0, 'C15.4'),
(1900, 0, 0, 0, 'C15.3'),
(1901, 0, 0, 0, 'C30.3'),
(1902, 0, 0, 0, 'C15.1'),
(1903, 0, 0, 0, 'C15.1'),
(1904, 0, 0, 0, 'C30.2'),
(1905, 0, 0, 0, 'C30.4'),
(1906, 0, 0, 0, 'C15.5'),
(1907, 0, 0, 0, 'C30.2'),
(1908, 0, 0, 0, 'C15.5'),
(1909, 0, 0, 0, 'C15.4'),
(1910, 0, 0, 0, 'C30.5'),
(1911, 0, 0, 0, 'NC');

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
(1, 7, '1', 20, 'hello', 'Admin1'),
(100, 70, '10', 20, '123', 'Admin2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=964 ;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`ID`, `ID_Player1`, `ID_Player2`, `ID_Cat`, `NbWinMatch`, `AvgRanking`, `Group_Vic`) VALUES
(878, 1740, 1741, 16, 0, 'C30', 0),
(879, 1742, 1743, 16, 0, 'C30.2', 0),
(880, 1744, 1745, 16, 0, 'C15.1', 0),
(881, 1746, 1747, 16, 0, 'C15.5', 0),
(882, 1748, 1749, 16, 0, 'C30.4', 0),
(883, 1750, 1751, 16, 0, 'C30', 0),
(884, 1752, 1753, 16, 0, 'C15.1', 0),
(885, 1754, 1755, 16, 0, 'C30.2', 0),
(886, 1756, 1757, 16, 0, 'C30', 0),
(887, 1758, 1759, 16, 0, 'C30', 0),
(888, 1760, 1761, 16, 0, 'C30.2', 0),
(889, 1762, 1763, 16, 0, 'C15.4', 0),
(890, 1764, 1765, 16, 0, 'C30', 0),
(891, 1766, 1767, 16, 0, 'C15.5', 0),
(892, 1768, 1769, 16, 0, 'C15.2', 0),
(893, 1770, 1771, 16, 0, 'C30', 0),
(894, 1772, 1773, 16, 0, 'C30.1', 0),
(895, 1774, 1775, 17, 0, 'C15.5', 0),
(896, 1776, 1777, 17, 0, 'C30.5', 0),
(897, 1778, 1779, 17, 0, 'C30.3', 0),
(898, 1780, 1781, 17, 0, 'C15.5', 0),
(899, 1782, 1783, 17, 0, 'C15.2', 0),
(900, 1784, 1785, 17, 0, 'C15.3', 0),
(901, 1786, 1787, 17, 0, 'C15.5', 0),
(902, 1788, 1789, 17, 0, 'C15.4', 0),
(903, 1790, 1791, 17, 0, 'C30.2', 0),
(904, 1792, 1793, 17, 0, 'C30.1', 0),
(905, 1794, 1795, 17, 0, 'C30.2', 0),
(906, 1796, 1797, 17, 0, 'C30', 0),
(907, 1798, 1799, 19, 2, 'C15.5', 1),
(908, 1800, 1801, 19, 2, 'C15', 1),
(909, 1802, 1803, 19, 3, 'C15.3', 1),
(910, 1804, 1805, 19, 1, 'C30', 0),
(911, 1806, 1807, 19, 2, 'C30.2', 1),
(912, 1808, 1809, 19, 0, 'C15.3', 1),
(913, 1810, 1811, 19, 3, 'C15.3', 1),
(914, 1812, 1813, 19, 1, 'C15.4', 0),
(915, 1814, 1815, 19, 4, 'C30', 1),
(916, 1816, 1817, 19, 2, 'C15.5', 0),
(917, 1818, 1819, 19, 0, 'C30.2', 1),
(918, 1820, 1821, 19, 0, 'C15.5', 1),
(919, 1822, 1823, 19, 3, 'C15', 1),
(920, 1824, 1825, 19, 1, 'C30.2', 0),
(921, 1826, 1827, 19, 1, 'C30.2', 1),
(922, 1828, 1829, 19, 1, 'C30.2', 0),
(923, 1830, 1831, 19, 4, 'C30', 1),
(924, 1832, 1833, 19, 0, 'C15.4', 1),
(925, 1834, 1835, 19, 3, 'C30.1', 1),
(926, 1836, 1837, 19, 3, 'C30', 1),
(927, 1838, 1839, 19, 1, 'C15.3', 0),
(928, 1840, 1841, 19, 1, 'C15.3', 0),
(929, 1842, 1843, 19, 2, 'C30.1', 1),
(930, 1844, 1845, 19, 0, 'NC', 0),
(931, 1846, 1847, 20, 4, 'C30', 1),
(932, 1848, 1849, 20, 2, 'C30.1', 1),
(933, 1850, 1851, 20, 1, 'C15.2', 0),
(934, 1852, 1853, 20, 2, 'C15.5', 0),
(935, 1854, 1855, 20, 1, 'C15.5', 0),
(936, 1856, 1857, 20, 3, 'C15.5', 1),
(937, 1858, 1859, 20, 4, 'C30.3', 1),
(938, 1860, 1861, 20, 1, 'C30.5', 0),
(939, 1862, 1863, 20, 1, 'C30', 0),
(940, 1864, 1865, 20, 2, 'C15.5', 1),
(941, 1866, 1867, 20, 2, 'C15.5', 0),
(942, 1868, 1869, 20, 2, 'C15.4', 0),
(943, 1870, 1871, 20, 2, 'C30.5', 1),
(944, 1872, 1873, 20, 1, 'C15.4', 0),
(945, 1874, 1875, 20, 4, 'C30', 1),
(946, 1876, 1877, 20, 2, 'C30.3', 0),
(947, 1878, 1879, 20, 1, 'C30', 0),
(948, 1880, 1881, 20, 1, 'C15.2', 0),
(949, 1882, 1883, 20, 3, 'C30', 1),
(950, 1884, 1885, 20, 1, 'C30.3', 0),
(951, 1886, 1887, 21, 3, 'C15.5', 1),
(952, 1888, 1889, 21, 1, 'C15.2', 1),
(953, 1890, 1891, 21, 2, 'C15.4', 1),
(954, 1892, 1893, 21, 2, 'C15.3', 0),
(955, 1894, 1895, 21, 2, 'C15.1', 0),
(956, 1896, 1897, 21, 2, 'C15.5', 1),
(957, 1898, 1899, 21, 1, 'C15.3', 0),
(958, 1900, 1901, 21, 2, 'C30', 1),
(959, 1902, 1903, 21, 3, 'C30', 1),
(960, 1904, 1905, 21, 2, 'C30.3', 0),
(961, 1906, 1907, 21, 2, 'C30', 1),
(962, 1908, 1909, 21, 1, 'C15.4', 0),
(963, 1910, 1911, 21, 0, 'C30.5', 0);

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
  `StaffNote` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Terrain`
--

INSERT INTO `Terrain` (`ID`, `adresse`, `surface`, `ID_Owner`, `etat`, `disponibiliteFrom`, `disponibiliteTo`, `CreationDate`, `Type`, `Note`, `StaffNote`) VALUES
(22, '192 rue des Acacias', 450, 27, 'Neuf', '2015-12-11', '2016-12-11', '2015-12-11', 'Terre battue', 'Bar neuf.', ''),
(23, 'Rue des 4 saisons', 200, 27, 'Passable', '2015-12-11', '2016-12-11', '2015-12-11', 'Terre battue', 'Plaine de jeu disponible à côté.', ''),
(24, 'Rue du printemps', 250, 28, 'Neuf', '2015-12-11', '2016-12-11', '2015-12-11', 'Gazon', 'Fillet tout neuf.', ''),
(25, 'Rue des étoiles', 320, 28, 'Usé', '2015-12-11', '2016-12-11', '2015-12-11', 'Synthétique', 'Balles disponibles.', '');

-- --------------------------------------------------------

--
-- Table structure for table `TmpPersonne`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=975 ;

--
-- Dumping data for table `TmpPersonne`
--

INSERT INTO `TmpPersonne` (`ID`, `Title`, `FirstName`, `LastName`, `Ville`, `ZIPCode`, `Rue`, `Number`, `PhoneNumber`, `GSMNumber`, `BirthDate`, `Mail`, `CreationDate`, `Note`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES
(973, 0, 'X33', 'Dupont', 'Cigare du pharaon', 4567, 'Rue des primeverres', 2, '+335465468', '+897456151', '1958-09-11', '33.dupont@mail.com', '2015-12-14', 'Avec un "T"', 1, 0, 0),
(974, 0, 'X33bis', 'Dupond', 'Cigare du pharaon', 7578, 'Rue des primeverres', 2, '+335465468', '+335465468', '1967-09-08', '33bis.dupont@mail.com', '2015-12-14', 'Avec un "D"', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TmpPersonneExtra`
--

CREATE TABLE IF NOT EXISTS `TmpPersonneExtra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_ID` int(11) NOT NULL,
  `Extra_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `TmpPersonneExtra`
--

INSERT INTO `TmpPersonneExtra` (`ID`, `Personne_ID`, `Extra_ID`) VALUES
(105, 973, 2),
(106, 973, 3),
(107, 973, 4),
(108, 974, 3),
(109, 974, 4);

-- --------------------------------------------------------

--
-- Table structure for table `TmpPlayer`
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
-- Dumping data for table `TmpPlayer`
--

INSERT INTO `TmpPlayer` (`ID_Personne`, `IsLeader`, `Paid`, `AlreadyPart`, `Ranking`) VALUES
(973, 0, 0, 0, 'NC'),
(974, 0, 0, 0, 'NC');

-- --------------------------------------------------------

--
-- Table structure for table `TmpTeam`
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
