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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '2' COMMENT 'default status is 2, means that it is new and waits approval, 1 is approved and visible, 0 is unapproved',
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_name`, `comment_email`, `comment_text`, `comment_time`, `status`, `recipe_id`) VALUES
(1, 'Aja', 'aja@aja.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '2017-12-08 12:25:50', 1, 5),
(2, 'Petar', 'pepa@pepa.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\n', '2017-12-08 12:25:50', 2, 5),
(3, 'Boris', 'boris@boris.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n', '2017-12-08 12:27:10', 1, 5),
(4, 'Iva', 'iva@iva.com', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n', '2017-12-08 12:27:10', 1, 5),
(5, 'Milan', 'milan@milan.com', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\n', '2017-12-08 12:27:30', 1, 5),
(6, 'Jovana', 'jovana@jovana.com', 'Gulp is a tool that can be of great help to any web designer, but it can be intimidating for beginners. In this course you’re going to learn what Gulp is, how to set it up, and how to use it for creating an awesome front-end workflow—even as a beginner.', '2017-12-08 12:58:46', 2, 3),
(7, 'Ivan', 'ivan@ivan.com', 'But Gravit is a lot more than just accessible; it’s also packed with professional-level features that position it as the next big up-and-coming graphics app. Whether you’re a UI designer, an illustrator, or any other kind of digital artist, Gravit could quickly find a regular place in your design workflows.\r\n\r\n', '2017-12-08 12:58:46', 2, 2),
(8, 'Mica', 'mica@mica.com', 'Micin komentar', '2017-12-09 23:46:38', 1, 5),
(14, 'Mile', 'mile@mile', 'Miletov komentar', '2017-12-10 01:37:52', 2, 5),
(15, 'Aya Romporas', 'aya.romporas@gmail.com', 'Test proba 1', '2018-02-07 00:18:31', 0, 12),
(16, 'Milos Sucura', 'interfortas.serbia@gmail.com', 'Test 2', '2018-02-07 00:19:24', 2, 12),
(17, 'Aja Romporas', 'aya.romporas@gmail.com', 'Test 3', '2018-02-07 00:20:11', 2, 12),
(18, 'Sanja', 'sanja@gmail.com', 'Test 4', '2018-02-07 00:21:48', 2, 12),
(19, 'Aja Romporas', 'aya.romporas@gmail.com', 'Test 5', '2018-02-07 00:24:27', 0, 12),
(20, 'Aja Romporas', 'aya.romporas@gmail.com', 'dfhfghf', '2018-02-07 00:56:29', 2, 12),
(21, 'Aja Romporas', 'aya.romporas@gmail.com', 'fsdfsd', '2018-02-07 01:03:34', 1, 12),
(22, 'Aja Romporas', 'aya.romporas@gmail.com', 'fasfsdfsd', '2018-02-07 01:03:51', 2, 12),
(23, 'Aja Romporas', 'aya.romporas@gmail.com', 'xfhfhfgh', '2018-02-07 01:05:30', 2, 12),
(24, 'aja', 'aya.romporas@gmail.com', 'Test 6', '2018-02-07 01:06:35', 2, 12),
(25, 'Ivana', 'ivsdfdfgdfgna@gmail.com', 'Test 7', '2018-02-07 01:07:30', 2, 16),
(26, 'Bojana', 'bojana@email.com', 'Neki komentar test 8', '2018-02-07 01:08:47', 2, 18),
(27, 'Aja Romporas', 'aya.romporas@gmail.com', 'fgjghjgh', '2018-02-07 04:31:40', 0, 12),
(28, 'Aja Romporas', 'aya.romporas@gmail.com', 'cgnvcbjnvbjm', '2018-02-08 11:07:10', 2, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
