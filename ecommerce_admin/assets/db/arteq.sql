-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 07:00 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arteq`
--
CREATE DATABASE IF NOT EXISTS `arteq` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `arteq`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `description`, `price`, `image`) VALUES
(3, '15W Emergency LED Light White ( AC DC ) with 1-year replacement warranty !', '1', '<p style="box-sizing: border-box; margin: 0px; font-family: inherit; font-size: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; white-space: normal;"><strong style="box-sizing: border-box; font-family: inherit; font-size: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit;">#ArteqSolutions</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px; font-family: inherit; font-size: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; white-space: normal;">Energy efficient &amp; planet friendly</p>\r\n<p style="box-sizing: border-box; margin: 0px; font-family: inherit; font-size: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; white-space: normal;">No need to accumulate extra money for costly IPS or run high power generators for home lighting during load shedding. By replacing your home''s existing light bulbs with this latest energy efficient emergency LED lights, you can save money and also be a contributor to our greener world by saving less energy.</p>', '400', 'dddd.jpg'),
(4, 'WiFi IP Camera (360eye 1MP)', '2', '<p><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Wherever you are, always have one eye on or home or your workplace. This is the simplest, easiest and the cheapest form of all IP Camera. No more hassle of DVR/NVR</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Product Description:</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Brand : 360eye</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Infrared : Available</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-se', '2,999.00', 'gg.jpg'),
(5, 'admin', '2', '<p><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Wherever you are, always have one eye on or home or your workplace. This is the simplest, easiest and the cheapest form of all IP Camera. No more hassle of DVR/NVR</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Product Description:</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Brand : 360eye</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-serif; font-size: 15px;">Infrared : Available</span><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><br style="box-sizing: border-box; font-family: proxima-n-w01-reg, sans-serif; font-size: 15px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit;" /><span style="font-family: proxima-n-w01-reg, sans-se', '1234', 'gg1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
