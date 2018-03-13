-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2018 at 02:02 PM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = off\n1 = superadmin\n2 = admin\n3 = editor',
  PRIMARY KEY (`user_id`,`user_email`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `username`, `password`, `status`) VALUES
(1, 'Aya', 'aya.romporas@gmail.com', '060.766.76.72', 'ayaromporas', '$2y$10$oTkY/MvXdK6Io9fB5IDYBuHLgLuk4LVEcs/aD8CNBVj7fM7zkHP7i', 1),
(2, 'Petar', 'petar.cvetic@gmail.com', '060.022.69.79', 'pepapecaros', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 0),
(3, 'Milan', 'mirkovicmilan0211@gmail.com', '060.55.27.460', 'milanche', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(4, 'Ivana', 'sapic.iva@gmail.com', '065.25.00.266', 'sapiciva', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(5, 'Boris', 'bvatovec@gmail.com', '063.418.282', 'bvatovec', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(6, 'Jovana', 'jovana@gmail.com', '069.123.98.76', 'jovanchica', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 0),
(7, 'Miljenko', 'miljenko@gmail.com', '068.987.65.43', 'miljenko', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
