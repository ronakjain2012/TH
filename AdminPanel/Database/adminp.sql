-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 08:04 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(257) COLLATE utf8_bin NOT NULL,
  `u_pwd` varchar(257) COLLATE utf8_bin NOT NULL,
  `u_role` varchar(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`u_id`, `u_name`, `u_pwd`, `u_role`) VALUES
(1, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 's'),
(2, 'admin', 'admin', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `th_user`, `th_session_id`, `th_session_start`, `th_session_end`) VALUES
(1, 'admin', 'gju1cepq3bgj16qr7uov9l8vt6', '1453401617', '1453401620'),
(2, 'admin', 'tv6j5o499akqintrbdralsbos1', '1454087393', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
