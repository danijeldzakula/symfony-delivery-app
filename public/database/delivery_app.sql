-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2022 at 06:20 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `deliverers`
--

DROP TABLE IF EXISTS `deliverers`;
CREATE TABLE IF NOT EXISTS `deliverers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverers`
--

INSERT INTO `deliverers` (`id`, `name`) VALUES
(1, 'Danijel'),
(2, 'Marko'),
(3, 'Nikola'),
(4, 'Nemanja'),
(5, 'Alen'),
(83, 'Ognjen');

-- --------------------------------------------------------

--
-- Table structure for table `deliverer_vehicle`
--

DROP TABLE IF EXISTS `deliverer_vehicle`;
CREATE TABLE IF NOT EXISTS `deliverer_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deliverer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverer_vehicle`
--

INSERT INTO `deliverer_vehicle` (`id`, `deliverer_id`, `vehicle_id`) VALUES
(17, 2, 2),
(16, 2, 2),
(15, 2, 2),
(14, 2, 2),
(13, 4, 2),
(27, 1, 3),
(11, 4, 1),
(10, 1, 3),
(18, 1, 2),
(19, 1, 3),
(20, 1, 4),
(21, 5, 4),
(22, 83, 1),
(23, 5, 1),
(24, 83, 4),
(25, 83, 3),
(26, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle`) VALUES
(1, 'Yugo'),
(2, 'Mercedes Benz'),
(3, 'Opel'),
(4, 'Bugatti');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
