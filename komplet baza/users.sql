-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2018 at 11:29 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hara0210_ukus_pok`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = off\n1 = superadmin\n2 = admin\n3 = editor'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `username`, `password`, `status`) VALUES
(1, 'Aya', 'aya.romporas@gmail.com', '060.766.76.72', 'ayaromporas', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(7, 'Nikola', 'nikola@gmail.com', '060.123.45.67', 'nikolica', 'nikoleti', 0),
(3, 'Milan', 'mirkovicmilan0211@gmail.com', '060.55.27.460', 'milanche', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(4, 'Ivana', 'sapic.iva@gmail.com', '065.25.00.266', 'sapiciva', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(5, 'Boris', 'bvatovec@gmail.com', '063.418.282', 'bvatovec', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 1),
(6, 'Jovana', 'jovana@gmail.com', '069.123.98.76', 'jovanchica', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 3),
(2, 'Miljenko', 'miljenko@gmail.com', '068.987.65.43', 'miljenko', '$2y$10$fuOF3oeIieHsGgAvqYRvYOjZBy0vCa7iJaBKIsQRJkYWfpodNbIVK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`user_email`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
