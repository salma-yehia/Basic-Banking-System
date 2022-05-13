-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `send_money`
--

DROP TABLE IF EXISTS `send_money`;
CREATE TABLE IF NOT EXISTS `send_money` (
  `id` int(11) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `send_money`
--

INSERT INTO `send_money` (`id`, `sender`, `receiver`, `balance`, `time`) VALUES
(9, 'Fatma', 'Hosny', 700, '2022-05-09 20:41:10'),
(11, 'Said', 'Samar', 200, '2022-05-09 20:49:42');


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Mohamed', 'mohamed@gmail.com', 1000),
(2, 'Ahmed', 'ahmed.gmail.com', 1300),
(3, 'Salma', 'salma@gmail.com', 1350),
(4, 'Fatma', 'fatma@gmail.com', 700),
(5, 'Said', 'said@gmail.com', 600),
(6, 'Yehia', 'yehia@gmail.com', 9000),
(7, 'Osman', 'osman@gmail.com', 6400),
(8, 'Samar', 'samar@gmail.com', 2500),
(9, 'Sara', 'sara@gmail.com', 1250),
(10, 'Hosny', 'hosny@gmail.com', 7900);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;