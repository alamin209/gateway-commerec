-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 08:18 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-commerce`
--
CREATE DATABASE IF NOT EXISTS `e-commerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-commerce`;

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `fkInsertBy` int(10) NOT NULL,
  `CategoryStatus` tinyint(4) DEFAULT NULL COMMENT '0=inactive,1=active',
  `image` varchar(255) NOT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `fkInsertBy`, `CategoryStatus`, `image`, `insertDate`) VALUES
(1, 'rerer', 1, NULL, '0', '2018-05-15 06:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE IF NOT EXISTS `logininfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sourceIp` varchar(255) NOT NULL,
  `fkUserId` int(10) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logOutTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`id`, `sourceIp`, `fkUserId`, `browser`, `loginTime`, `logOutTime`) VALUES
(1, '::1', 1, 'Firefox', '2018-05-15 07:15:32', '2018-05-15 03:15:32'),
(2, '::1', 1, 'Firefox', '2018-05-15 07:16:25', '2018-05-15 03:16:25'),
(3, '::1', 1, 'Firefox', '2018-05-15 07:58:05', '2018-05-15 03:58:05'),
(4, '::1', 1, 'Firefox', '2018-05-15 09:43:09', '2018-05-15 05:43:09'),
(5, '::1', 2, 'Firefox', '2018-05-15 09:50:16', '0000-00-00 00:00:00'),
(6, '::1', 2, 'Firefox', '2018-05-15 09:50:42', '0000-00-00 00:00:00'),
(7, '::1', 2, 'Firefox', '2018-05-15 09:53:22', '0000-00-00 00:00:00'),
(8, '::1', 2, 'Firefox', '2018-05-15 09:54:09', '0000-00-00 00:00:00'),
(9, '::1', 2, 'Firefox', '2018-05-15 09:56:06', '0000-00-00 00:00:00'),
(10, '::1', 2, 'Firefox', '2018-05-15 09:57:16', '0000-00-00 00:00:00'),
(11, '::1', 1, 'Firefox', '2018-05-15 09:58:57', '0000-00-00 00:00:00'),
(12, '::1', 2, 'Firefox', '2018-05-15 10:00:49', '0000-00-00 00:00:00'),
(13, '::1', 1, 'Firefox', '2018-05-15 10:04:23', '2018-05-15 06:04:23'),
(14, '::1', 2, 'Firefox', '2018-05-15 10:04:35', '0000-00-00 00:00:00'),
(15, '::1', 2, 'Firefox', '2018-05-15 10:05:32', '0000-00-00 00:00:00'),
(16, '::1', 2, 'Firefox', '2018-05-15 10:05:57', '0000-00-00 00:00:00'),
(17, '::1', 1, 'Firefox', '2018-05-15 10:06:24', '2018-05-15 06:06:24'),
(18, '::1', 1, 'Firefox', '2018-05-15 10:08:34', '2018-05-15 06:08:34'),
(19, '::1', 1, 'Chrome', '2018-05-15 10:11:41', '2018-05-15 06:11:41'),
(20, '::1', 2, 'Chrome', '2018-05-15 10:11:49', '0000-00-00 00:00:00'),
(21, '::1', 2, 'Firefox', '2018-05-15 10:14:32', '2018-05-15 06:14:32'),
(22, '::1', 1, 'Firefox', '2018-05-15 10:18:45', '0000-00-00 00:00:00'),
(23, '::1', 1, 'Firefox', '2018-05-15 11:06:27', '0000-00-00 00:00:00'),
(24, '::1', 1, 'Firefox', '2018-05-15 11:06:36', '2018-05-15 07:06:36'),
(25, '::1', 1, 'Firefox', '2018-05-15 11:12:54', '2018-05-15 07:12:54'),
(26, '::1', 1, 'Firefox', '2018-05-15 11:15:07', '2018-05-15 07:15:07'),
(27, '::1', 1, 'Firefox', '2018-05-15 11:15:20', '2018-05-15 07:15:20'),
(28, '::1', 1, 'Firefox', '2018-05-15 11:15:59', '2018-05-15 07:15:59'),
(29, '::1', 1, 'Firefox', '2018-05-15 11:19:00', '0000-00-00 00:00:00'),
(30, '::1', 1, 'Firefox', '2018-05-15 12:11:29', '2018-05-15 08:11:29'),
(31, '::1', 1, 'Firefox', '2018-05-15 12:13:54', '0000-00-00 00:00:00'),
(32, '::1', 1, 'Firefox', '2018-05-16 04:21:58', '0000-00-00 00:00:00'),
(33, '::1', 1, 'Firefox', '2018-05-16 06:18:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postalCode` varchar(11) NOT NULL,
  `fkCity` int(10) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `userActivationStatus` tinyint(1) DEFAULT NULL COMMENT '0=inactive,1=active',
  `fkUserType` varchar(20) NOT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `postalCode`, `fkCity`, `contactNo`, `email`, `password`, `userActivationStatus`, `fkUserType`, `insertDate`) VALUES
(1, 'admin', 'dhaka', '12345', 1, '0182425928', 'admin@gmail.com', 'admin', 1, 'Admin', '2018-05-15 06:52:28'),
(2, 'almamud', 'mirpur', '123', 12, '0182425928', 'alamin@gmail.com', 'alamin', 1, 'cus', '2018-05-15 09:18:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
