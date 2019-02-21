-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 07:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajaxdbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `fullajaxtb`
--

CREATE TABLE IF NOT EXISTS `fullajaxtb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kelas` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `fullajaxtb`
--

INSERT INTO `fullajaxtb` (`id`, `nama`, `alamat`, `kelas`) VALUES
(44, 'kol', 'ko', 'koffss'),
(50, 'aaa', 'dssasda', '12'),
(51, '', '', ''),
(52, '', 'aaa', ''),
(53, '', 'd', 'aa'),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, '', '', ''),
(62, '', '', ''),
(63, '', '', ''),
(64, '', '', ''),
(65, '', '', ''),
(66, '', '', ''),
(67, '', '', ''),
(68, '', '', ''),
(69, '', '', ''),
(70, '', '', ''),
(71, '', '', ''),
(72, '', '', ''),
(73, '', '', ''),
(74, '', '', ''),
(75, '', '', ''),
(76, '', '', ''),
(79, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', '', ''),
(89, 'adsas', 'a', ''),
(90, '', '', ''),
(91, '', '', ''),
(92, '', '', ''),
(93, '', '', ''),
(94, '', '', ''),
(95, '', '', ''),
(96, '', '', ''),
(97, '', '', ''),
(98, '', '', ''),
(99, '', '', ''),
(100, '', '', ''),
(101, '', '', ''),
(102, '', '', ''),
(103, '', '', ''),
(104, '', '', ''),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, '', '', ''),
(109, '', '', ''),
(110, '', '', ''),
(111, '', '', ''),
(112, 'a', 'a', 'ad'),
(113, '', 'd', 'd'),
(114, '', '', ''),
(115, '', '', ''),
(116, '', '', ''),
(117, '', '', ''),
(118, '', '', ''),
(120, '', '', ''),
(121, '', '', ''),
(122, '', 'd', ''),
(123, '', '', 'd'),
(124, '', '', ''),
(125, 'dfs', '', '12'),
(126, 'diki', '12', '11'),
(127, 'diki', 'jogja', '12'),
(128, '', '', ''),
(129, 'kolor', '', ''),
(130, 'benar', 'ada', '1212'),
(131, 'as', 'sa', 'sa'),
(132, 'asas', 'da', '1212'),
(133, 'm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kel`
--

CREATE TABLE IF NOT EXISTS `kel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `kelompok` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `kel`
--

INSERT INTO `kel` (`id`, `nama`, `kelompok`) VALUES
(1, 'dd', 'dd'),
(2, 'sad', 'ddddff'),
(5, 'sad', 'asd'),
(6, 'dd', 'd'),
(7, 'dssd', 'da'),
(8, 'd', 'd'),
(9, 'd', 'd'),
(10, 'd', 'd'),
(11, 'd', 'd'),
(12, 'd', 'd'),
(13, 'd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE IF NOT EXISTS `kelompok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=273 ;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `nama`, `tingkat`) VALUES
(265, 'e', 'e'),
(266, 'ef', 'ef'),
(267, 'efe', 'efe'),
(268, 'e', 'e'),
(269, 'e', 'e'),
(270, 'e', 'e'),
(271, 'ko', 'ko'),
(272, 'kol', 'kol');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(1, 'sd', 'sd', 'male', 'asd', '2018-12-18'),
(2, 'diki', 'irawan', 'male', 'sad', '2018-12-19'),
(3, 'a', 'a', 'male', 'a', '2018-12-18'),
(4, 'a', 'a', 'male', 'a', '2018-12-19'),
(5, 'a', 'a', 'male', 'a', '2018-12-18'),
(6, 'f', 'f', 'male', 'ff', '2018-12-19'),
(7, 'da', 'sk', 'male', 'das', '2018-12-20'),
(8, 'ad', 'sd', 'male', 'ds', '2018-12-20'),
(9, 'a', 'a', 'male', 'a', '2018-12-26'),
(10, 'a', 'a', 'male', 'a', '2018-12-26'),
(11, 'a', 'a', 'male', 'a', '2018-12-26'),
(12, 'a', 'a', 'male', 'a', '2018-12-26'),
(13, 'a', 'a', 'male', 'a', '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_code` int(15) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  PRIMARY KEY (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
