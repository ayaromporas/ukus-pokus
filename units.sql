-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2018 at 10:52 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `status`) VALUES
(1, 'gr', 1),
(2, 'kg', 1),
(3, 'ml', 1),
(4, 'lit', 0),
(5, 'kom', 1),
(6, 'prstohvat', 1),
(7, 'dcl', 1),
(8, 'kaš', 1),
(9, 'kčc', 0),
(10, 'prstohvata', 1),
(11, 'kockica', 1),
(12, 'kockice', 1),
(13, 'šolja', 1),
(14, 'šolje', 1),
(15, 'malo', 0),
(16, 'par', 1),
(17, 'kolutića', 1),
(18, 'štapić', 0),
(19, 'štapića', 1),
(20, 'glavica', 1),
(21, 'glavice', 1),
(22, 'čen', 1),
(23, 'čena', 1),
(24, 'grančica', 1),
(25, 'grančice', 1),
(26, 'šnita', 1),
(27, 'šnite', 0),
(28, 'šoljica', 1),
(29, 'šoljice', 1),
(31, 'čaša', 1),
(32, 'čaše', 1),
(33, 'listić', 0),
(34, 'listića', 1),
(35, 'para', 1),
(36, 'kolutić', 1),
(37, 'veza', 1),
(38, 'veze', 1),
(39, 'list', 1),
(40, 'lista', 1),
(41, 'listova', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
