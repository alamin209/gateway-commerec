-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 12:18 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `fkInsertBy`, `CategoryStatus`, `image`, `insertDate`) VALUES
(3, 'fgfgfg', 1, 1, '', '2018-05-16 07:25:21'),
(4, 'ghghg', 1, 1, '', '2018-05-16 07:26:34'),
(5, 'fgfgfgffffffff', 1, 1, '', '2018-05-16 07:27:05'),
(7, 'alamin', 1, 1, '', '2018-05-16 07:28:02'),
(11, 'erer', 1, 1, './assets/admin/uploads/11.jpg', '2018-05-17 11:58:26'),
(13, 'rtrtrtdffffffffffffff', 1, 0, './assets/admin/uploads/13.jpg', '2018-05-19 08:01:46');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

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
(33, '::1', 1, 'Firefox', '2018-05-16 06:18:18', '0000-00-00 00:00:00'),
(34, '::1', 1, 'Firefox', '2018-05-16 08:34:17', '2018-05-16 04:34:17'),
(35, '::1', 1, 'Firefox', '2018-05-17 04:24:40', '0000-00-00 00:00:00'),
(36, '::1', 1, 'Firefox', '2018-05-17 08:36:41', '2018-05-17 04:36:41'),
(37, '::1', 1, 'Chrome', '2018-05-17 05:47:48', '0000-00-00 00:00:00'),
(38, '::1', 1, 'Firefox', '2018-05-17 11:51:59', '2018-05-17 07:51:59'),
(39, '::1', 1, 'Firefox', '2018-05-17 11:52:05', '0000-00-00 00:00:00'),
(40, '::1', 1, 'Firefox', '2018-05-19 04:35:00', '0000-00-00 00:00:00'),
(41, '::1', 1, 'Firefox', '2018-05-19 04:40:17', '0000-00-00 00:00:00'),
(42, '::1', 1, 'Chrome', '2018-05-19 06:50:14', '0000-00-00 00:00:00'),
(43, '::1', 1, 'Chrome', '2018-05-19 07:27:01', '0000-00-00 00:00:00'),
(44, '::1', 1, 'Firefox', '2018-05-19 10:02:15', '0000-00-00 00:00:00'),
(45, '::1', 1, 'Firefox', '2018-05-20 04:50:06', '0000-00-00 00:00:00'),
(46, '::1', 1, 'Firefox', '2018-05-20 08:06:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive,1=active',
  `insertby` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `subcat_id`, `name`, `product_desc`, `status`, `insertby`, `image`, `insert_date`) VALUES
(1, 3, 6, 'alamin hossain', 'nmnm', 0, 1, 'this is not null', '2018-05-19 09:45:36'),
(2, 4, 6, 'this is mail check ', 'nmnm', 0, 1, 'almin hosain', '2018-05-19 09:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE IF NOT EXISTS `products_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_categoryId` int(10) NOT NULL,
  `price` double NOT NULL,
  `desc` text NOT NULL,
  `qty` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=inactive,1=active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`id`, `sub_categoryId`, `price`, `desc`, `qty`, `status`) VALUES
(1, 6, 12, 'fdsfdsfdsf', 12, 0),
(2, 6, 12.3, 'rtrtrtrtrtrtrt', 142, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcatgory`
--

CREATE TABLE IF NOT EXISTS `subcatgory` (
  `sub_catgoryId` int(10) NOT NULL AUTO_INCREMENT,
  `InsertBy` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subCatoryName` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_catgoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `subcatgory`
--

INSERT INTO `subcatgory` (`sub_catgoryId`, `InsertBy`, `cat_id`, `subCatoryName`, `image`, `status`, `insertDate`) VALUES
(6, 1, 13, 'ewrerewrew', './assets/admin/uploads/subCatogory/194-700x7001.jpg', 1, '2018-05-19 08:13:33'),
(7, 1, 13, 'alamin', './assets/admin/uploads/subCatogory/12.jpg', 0, '2018-05-19 08:00:15'),
(8, 1, 12, 'hkjhkh', './assets/admin/uploads/subCatogory/ajax-loader.gif', 1, '2018-05-19 06:27:51'),
(9, 1, 12, 'trtr', './assets/admin/uploads/subCatogory/11.jpg', 1, '2018-05-19 06:44:18'),
(10, 1, 13, 'alamin', './assets/admin/uploads/subCatogory/31.jpg', 0, '2018-05-19 07:48:41'),
(11, 1, 13, 'klklkl', './assets/admin/uploads/subCatogory/wsv30177.jpg', 1, '2018-05-19 08:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE IF NOT EXISTS `tbl_slide` (
  `slide_id` int(3) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`slide_id`, `photo`, `created_date`) VALUES
(0, './assets/admin/uploads/23.jpg', '2018-05-17 11:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postalCode` varchar(11) NOT NULL,
  `fkCity` varchar(10) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `userActivationStatus` tinyint(1) DEFAULT NULL COMMENT '0=inactive,1=active',
  `fkUserType` varchar(20) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `postalCode`, `fkCity`, `contactNo`, `email`, `password`, `userActivationStatus`, `fkUserType`, `Country`, `insertDate`) VALUES
(1, 'almin', 'almamudhossain', 'alaminjjjjj', 'gggggggggg', 'alaminjjjjj', 'admin@gmail.com', 'admin', 0, 'Admin', 'bangldesh', '2018-05-17 11:51:49'),
(3, 'sfs', 'sfs', 'sfs', '0', 'fffffffffff', 'ffffffffffffffffffff', 'ffffffffffffffffffffff', 1, 'cus', 'sssssssssssssssssssssssssssssssssssssss', '2018-05-20 04:52:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
