-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2018 at 08:33 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukuspokus`
--

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `status`) VALUES
(1, 'gr', 1),
(2, 'kg', 1),
(3, 'ml', 1),
(4, 'lit', 1),
(5, 'kom', 1),
(6, 'prstohvat', 1),
(7, 'dcl', 1),
(8, 'kaš', 1),
(9, 'kčc', 1),
(10, 'prstohvata', 1),
(11, 'kockica', 1),
(12, 'kockice', 1),
(13, 'šolja', 1),
(14, 'šolje', 1),
(15, 'malo', 1),
(16, 'par', 1),
(17, 'kolutića', 1),
(18, 'štapić', 1),
(19, 'štapića', 1),
(20, 'glavica', 1),
(21, 'glavice', 1),
(22, 'čen', 1),
(23, 'čena', 1),
(24, 'grančica', 1),
(25, 'grančice', 1),
(26, 'šnita', 1),
(27, 'šnite', 1),
(28, 'šoljica', 1),
(29, 'šoljice', 1),
(31, 'čaša', 1),
(32, 'čaše', 1),
(33, 'listić', 1),
(34, 'listića', 1),
(35, 'para', 1),
(36, 'kolutić', 1),
(37, 'veza', 1),
(38, 'veze', 1),
(39, 'list', 1),
(40, 'lista', 1),
(41, 'listova', 1),
(42, 'manji', 1),
(43, 'manja', 1),
(44, 'manje', 1),
(45, 'veći', 1),
(46, 'veća', 1),
(47, 'veće', 1),
(48, 'manjih', 1),
(49, 'većih', 1),
(50, 'kčc', 1),
(51, 'prstohvata', 1),
(52, 'kockica', 1),
(53, 'kockice', 1),
(54, 'šolja', 1),
(55, 'šolje', 1),
(56, 'malo', 1),
(57, 'par', 1),
(58, 'kolutića', 1),
(59, 'štapić', 1),
(60, 'štapića', 1),
(61, 'glavica', 1),
(62, 'glavice', 1),
(63, 'čen', 1),
(64, 'čena', 1),
(65, 'grančica', 1),
(66, 'grančice', 1),
(67, 'šnita', 1),
(68, 'šnite', 1),
(69, 'šoljica', 1),
(70, 'šoljice', 1),
(71, 'čaša', 1),
(72, 'čaše', 1),
(73, 'listić', 1),
(74, 'listića', 1),
(75, 'para', 1),
(76, 'kolutić', 1),
(77, 'veza', 1),
(78, 'veze', 1),
(79, 'list', 1),
(80, 'lista', 1),
(81, 'listova', 1),
(82, 'kolutića', 1),
(83, 'štapić', 1),
(84, 'štapića', 1),
(85, 'glavica', 1),
(86, 'glavice', 1),
(87, 'čen', 1),
(88, 'čena', 1),
(89, 'grančica', 1),
(90, 'grančice', 1),
(91, 'šnita', 1),
(92, 'šnite', 1),
(93, 'šoljica', 1),
(94, 'šoljice', 1),
(95, 'čaša', 1),
(96, 'čaše', 1),
(97, 'listić', 1),
(98, 'listića', 1),
(99, 'para', 1),
(100, 'kolutić', 1),
(101, 'veza', 1),
(102, 'veze', 1),
(103, 'list', 1),
(104, 'lista', 1),
(105, 'listova', 1),
(106, 'kuglica', 1),
(107, 'kuglice', 1),
(108, 'mali', 1),
(109, 'mala', 1),
(110, 'male', 1),
(111, 'malih', 1),
(112, 'veliki', 1),
(113, 'velike', 1),
(114, 'velika', 1),
(115, 'velikih', 1),
(116, 'osrednji', 1),
(117, 'osrednja', 1),
(118, 'osrednje', 1),
(119, 'osrednjih', 1),
(120, 'dkg', 1),
(121, 'komadić', 1),
(122, 'komadića', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
