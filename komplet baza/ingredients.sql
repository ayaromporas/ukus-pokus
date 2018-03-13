-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2018 at 02:06 PM
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
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ingredient_id`),
  UNIQUE KEY `ingredient_name_UNIQUE` (`ingredient_name`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `ingredient_name`, `status`) VALUES
(1, 'jaja', 1),
(2, 'pšenično brašno', 1),
(3, 'šećer', 1),
(4, 'so', 1),
(5, 'mleko', 1),
(6, 'ulje', 1),
(7, 'biber', 1),
(8, 'jogurt', 1),
(9, 'pavlaka 12% mm', 1),
(10, 'kiselo mleko', 1),
(11, 'slatka pavlaka', 1),
(12, 'majonez', 1),
(13, 'feta sir', 1),
(14, 'puter', 1),
(15, 'pirinač', 1),
(16, 'palenta', 1),
(17, 'šargarepa', 1),
(18, 'krompir', 1),
(19, 'luk', 1),
(20, 'pasulj', 1),
(21, 'grašak', 1),
(22, 'boranija', 1),
(23, 'kukuruzno brašno', 1),
(24, 'pirinčano brašno', 1),
(25, 'pavlaka 16% mm', 1),
(26, 'pavlaka 20% mm', 1),
(27, 'mileram 30% mm', 1),
(28, 'cimet', 1),
(29, 'prezle', 1),
(30, 'muskatni orah', 1),
(31, 'karanfilić', 1),
(32, 'kim u zrnu', 1),
(33, 'prašak za pecivo', 1),
(34, 'kisela voda', 1),
(35, 'hladna voda', 1),
(36, 'mlaka voda', 1),
(37, 'belo vino', 1),
(38, 'pšenični griz', 1),
(39, 'crno vino', 1),
(40, 'pivo', 1),
(41, 'kokosovo brašno', 1),
(42, 'kokosovo ulje', 1),
(43, 'jagode', 1),
(44, 'jabuke', 1),
(45, 'kruške', 1),
(46, 'maline', 1),
(47, 'višnje', 1),
(48, 'ananas', 1),
(49, 'banane', 1),
(50, 'pomorandže', 1),
(51, 'mandarine', 1),
(52, 'puding od vanile', 1),
(53, 'puding od čokolade', 1),
(54, 'puding od jagode', 1),
(55, 'kuvana kafa', 1),
(56, 'mlevena kafa', 1),
(57, 'žumance', 1),
(58, 'belance', 1),
(59, 'crni luk', 1),
(60, 'beli luk', 1),
(61, 'praziluk', 1),
(62, 'trešnje', 1),
(63, 'borovnice', 1),
(64, 'spanać', 1),
(65, 'vanil šećer', 1),
(66, 'rum', 1),
(67, 'mleveni plazma keks', 1),
(68, 'margarin', 1),
(69, 'piškote', 1),
(70, 'kore za pitu', 1),
(71, 'rum šećer', 1),
(72, 'limuntus', 1),
(73, 'sok od limuna', 1),
(74, 'sok od pomorandže', 1),
(75, 'mleveni bademi', 1),
(76, 'mleveni orasi', 1),
(77, 'mleveni lešnici', 1),
(78, 'semenke od bundeve', 1),
(79, 'semenke suncokreta', 1),
(80, 'tamari soja sos', 1),
(81, 'sušene urme', 1),
(82, 'sušene brusnice', 1),
(83, 'suvo grožđe', 1),
(84, 'mak', 1),
(85, 'laneno seme', 1),
(86, 'mleveni lan', 1),
(87, 'mleveni mak', 1),
(88, 'brašno od prosa', 1),
(89, 'ovsene pahuljice', 1),
(90, 'zobene pahuljice', 1),
(91, 'zelje', 1),
(92, 'sočivo', 1),
(93, 'blitva', 1),
(95, 'kokosovo mleko', 1),
(96, 'pirinčano mleko', 1),
(97, 'tofu sir', 1),
(99, 'špagete, spaghetti', 1),
(100, 'lisnato testo', 1),
(101, 'kečap', 1),
(102, 'ajvar', 1),
(103, 'patlidžan', 1),
(104, 'paradajz', 1),
(105, 'krastavac', 1),
(106, 'mango', 1),
(107, 'kavijar', 1),
(108, 'papaja', 1),
(109, 'avokado', 1),
(110, 'crno grožđe', 1),
(111, 'belo grožđe', 1),
(112, 'šljive', 1),
(113, 'kukuruzni griz', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
