-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 03:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adminp`
--
CREATE DATABASE IF NOT EXISTS `adminp` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `adminp`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `u_pwd` varchar(50) COLLATE utf8_bin NOT NULL,
  `u_role` varchar(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_name` (`u_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`u_id`, `u_name`, `u_pwd`, `u_role`) VALUES
(2, 'admin', 'admin', ''),
(3, '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 's');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `th_user` varchar(60) COLLATE utf8_bin NOT NULL,
  `th_session_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `th_session_start` varchar(255) COLLATE utf8_bin NOT NULL,
  `th_session_end` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `th_user`, `th_session_id`, `th_session_start`, `th_session_end`) VALUES
(1, 'admin', 'gju1cepq3bgj16qr7uov9l8vt6', '1453401617', '1453401620'),
(2, 'admin', 'tv6j5o499akqintrbdralsbos1', '1454087393', ''),
(3, 'admin', 'ocrr45u4977io8u75o6mnh95l1', '1454250839', ''),
(4, 'admin', 'm6b046jp92je1l1iofm08a7do0', '1455373423', ''),
(5, 'admin', 'sfsqnhlju02a9taugp00ubt2j6', '1455423516', ''),
(6, 'admin', '8d8g6d3dfov43otke7ffge53i2', '1455717302', ''),
(7, 'admin', '3nn9ckj6ko602b0nk9vou5a5o3', '1455717385', '1455717482'),
(8, 'admin', '3nn9ckj6ko602b0nk9vou5a5o3', '1455717516', ''),
(9, 'admin', '3nn9ckj6ko602b0nk9vou5a5o3', '1455717537', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
