-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2015 at 12:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spare_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `manufacturer` varchar(30) NOT NULL,
  `condition` varchar(20) NOT NULL,
  `warranty` tinyint(1) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `units_in_stock` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(30) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`id`, `name`, `manufacturer`, `condition`, `warranty`, `serial_number`, `units_in_stock`, `price`, `image`, `desc`) VALUES
(34, 'Steering BMW E46', '4', '1', 1, 'gpl879', 3, '450', '../image_uploads/EgPhyp.jpeg', 'For Diesel engine 210 hp'),
(35, 'Turbo Audi 1.8', '1', '1', 1, 'GHL856', 2, '699', '../image_uploads/EYHWTk.jpg', 'Brand new! 105 hp 2013. manufactured');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
