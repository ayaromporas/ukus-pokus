-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2018 at 02:05 PM
-- Server version: 5.7.19
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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_title` varchar(255) NOT NULL,
  `photo_alt` varchar(255) NOT NULL,
  `photo_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `recipe_id` int(11) DEFAULT '0',
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_title`, `photo_alt`, `photo_link`, `status`, `recipe_id`) VALUES
(1, 'default', 'default', 'default.jpg', 1, 0),
(2, 'pita sa mesom', 'pita sa mesom', '2.jpg', 1, 2),
(3, 'torta od šargarepe', 'torta od šargarepe', '3.jpg', 1, 3),
(4, 'torta od šargarepe', 'torta od šargarepe', '4.jpg', 1, 4),
(5, 'torta od šargarepe', 'torta od šargarepe', '5.jpg', 1, 5),
(6, 'krempite', 'krempite', '6.jpg', 1, 6),
(7, 'krempite', 'krempite', '7.jpg', 1, 7),
(8, 'krempite', 'krempite', '8.jpg', 1, 8),
(9, 'američke palačinke', 'američke palačinke', '9.jpg', 1, 9),
(10, 'američke palačinke', 'američke palačinke', '10.jpg', 1, 10),
(11, 'američke palačinke', 'američke palačinke', '11.jpg', 1, 11),
(12, 'američke palačinke', 'američke palačinke', '12.jpg', 1, 196055),
(13, 'američke palačinke', 'američke palačinke', '13.jpg', 1, 12),
(15, 'pita sa mesom', 'pita sa mesom', '15.jpg', 1, 1),
(16, 'krempite', 'krempite', '16.jpg', 1, 1),
(17, 'američke palačinke', 'američke palačinke', '17.jpg', 1, 2),
(18, 'američke palačinke', 'američke palačinke', '18.jpg', 1, 2),
(19, 'pita sa mesom', 'pita sa mesom', '19.jpg', 1, 3),
(20, 'američke palačinke', 'američke palačinke', '20.jpg', 1, 196055),
(21, 'američke palačinke', 'američke palačinke', '21.jpg', 1, 4),
(22, 'torta od šargarepe', 'torta od šargarepe', '22.jpg', 1, 4),
(23, 'američke palačinke', 'američke palačinke', '23.jpg', 1, 5),
(24, 'krempite', 'krempite', '24.jpg', 1, 5),
(25, 'krempite', 'krempite', '25.jpg', 1, 6),
(26, 'američke palačinke', 'američke palačinke', '26.jpg', 1, 6),
(27, 'američke palačinke', 'američke palačinke', '27.jpg', 1, 7),
(28, 'krempite', 'krempite', '28.jpg', 1, 7),
(29, 'pita sa mesom', 'pita sa mesom', '29.jpg', 1, 8),
(30, 'američke palačinke', 'američke palačinke', '30.jpg', 1, 8),
(31, 'torta od šargarepe', 'torta od šargarepe', '31.jpg', 1, 9),
(32, 'krempite', 'krempite', '32.jpg', 1, 9),
(33, 'pita sa mesom', 'pita sa mesom', '33.jpg', 1, 9),
(34, 'pita sa mesom', 'pita sa mesom', '34.jpg', 1, 10),
(35, 'američke palačinke', 'američke palačinke', '35.jpg', 1, 10),
(36, 'torta od šargarepe', 'torta od šargarepe', '36.jpg', 1, 11),
(37, 'američke palačinke', 'američke palačinke', '37.jpg', 1, 12),
(14, 'pita sa mesom', 'pita sa mesom', '14.jpg', 1, 11),
(39, 'pita sa mesom', 'pita sa mesom', '39.jpg', 1, 1),
(40, 'pita sa mesom', 'pita sa mesom', '40.jpg', 1, 2),
(41, 'torta od šargarepe', 'torta od šargarepe', '41.jpg', 1, 3),
(42, 'torta od šargarepe', 'torta od šargarepe', '42.jpg', 1, 4),
(43, 'torta od šargarepe', 'torta od šargarepe', '43.jpg', 1, 5),
(44, 'krempite', 'krempite', '44.jpg', 1, 6),
(45, 'krempite', 'krempite', '45.jpg', 1, 7),
(46, 'krempite', 'krempite', '46.jpg', 1, 8),
(47, 'američke palačinke', 'američke palačinke', '47.jpg', 1, 9),
(48, 'američke palačinke', 'američke palačinke', '48.jpg', 1, 10),
(49, 'američke palačinke', 'američke palačinke', '49.jpg', 1, 11),
(50, 'američke palačinke', 'američke palačinke', '50.jpg', 1, 12),
(51, 'američke palačinke', 'američke palačinke', '51.jpg', 1, 12),
(52, 'pita sa mesom', 'pita sa mesom', '52.jpg', 1, 11),
(53, 'pita sa mesom', 'pita sa mesom', '15.jpg', 1, 1),
(54, 'krempite', 'krempite', '16.jpg', 1, 1),
(55, 'američke palačinke', 'američke palačinke', '17.jpg', 1, 2),
(56, 'američke palačinke', 'američke palačinke', '18.jpg', 1, 2),
(57, 'pita sa mesom', 'pita sa mesom', '19.jpg', 1, 3),
(58, 'američke palačinke', 'američke palačinke', '20.jpg', 1, 3),
(59, 'američke palačinke', 'američke palačinke', '21.jpg', 1, 4),
(60, 'torta od šargarepe', 'torta od šargarepe', '22.jpg', 1, 4),
(61, 'američke palačinke', 'američke palačinke', '23.jpg', 1, 5),
(62, 'krempite', 'krempite', '24.jpg', 1, 5),
(63, 'krempite', 'krempite', '25.jpg', 1, 6),
(64, 'američke palačinke', 'američke palačinke', '26.jpg', 1, 6),
(65, 'američke palačinke', 'američke palačinke', '27.jpg', 1, 7),
(66, 'krempite', 'krempite', '28.jpg', 1, 7),
(67, 'pita sa mesom', 'pita sa mesom', '29.jpg', 1, 8),
(68, 'američke palačinke', 'američke palačinke', '30.jpg', 1, 8),
(69, 'torta od šargarepe', 'torta od šargarepe', '31.jpg', 1, 9),
(70, 'krempite', 'krempite', '32.jpg', 1, 9),
(71, 'pita sa mesom', 'pita sa mesom', '33.jpg', 1, 9),
(72, 'pita sa mesom', 'pita sa mesom', '34.jpg', 1, 10),
(73, 'američke palačinke', 'američke palačinke', '35.jpg', 1, 10),
(74, 'torta od šargarepe', 'torta od šargarepe', '36.jpg', 1, 11),
(38, 'američke palačinke', 'američke palačinke', '38.jpg', 1, 12),
(76, 'pita sa jabukama', 'pita sa jabukama', '112.jpg', 1, 25),
(77, 'kavijar sa orasima', 'kavijar sa orasima', 'kavijar115.png', 1, 13),
(78, 'supa od povrća', 'supa od povrća', 'supaodpovrca.jpg', 1, NULL),
(79, 'sufle', 'sufle', 'sufle.jpg', 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
