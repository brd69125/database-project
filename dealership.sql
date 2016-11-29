-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 04:26 AM
-- Server version: 5.6.23-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealership`
--
CREATE DATABASE IF NOT EXISTS `dealership` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dealership`;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `amount`, `payment`) VALUES
(1, '2016-11-20 22:51:57', 20, 'visa'),
(2, '2016-11-21 03:28:28', 19000, 'mastercard'),
(3, '2016-11-27 00:54:15', 500, 'visa'),
(4, '2016-11-27 00:54:36', 500, 'visa'),
(5, '2016-11-27 00:55:25', 500, 'visa'),
(7, '2016-11-27 00:56:47', 500, 'visa'),
(8, '2016-11-27 00:58:18', 30, 'visa'),
(16, '2016-11-27 01:55:10', 30, 'mastercard'),
(17, '2016-11-28 13:59:21', 14000, 'visa'),
(18, '2016-11-29 00:59:34', 14000, 'visa'),
(19, '2016-11-29 01:56:35', 14000, 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `type`, `email`) VALUES
(1, 'Chisom Ogbanana', '123 Place', 123456789, 'sale', 'nobody@nowhere.com'),
(2, 'David Owens', 'nowhere', 8675309, 'sale and service', 'person@place'),
(3, 'nobody', 'nowhere', 8675309, 'sale and service', 'person@place'),
(4, 'nobody', 'nowhere', 8675309, 'sale and service', 'person@place'),
(5, 'John Smith', '123 Fleet Street', 1234567890, 'sale and service', 'john.smith@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL COMMENT 'mechanic or sales'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `address`, `phone`, `type`) VALUES
(1, 'Brody Bruns', 'oerson@place.com', '234 Place', 123456789, 'mechanic'),
(2, 'Lester Crest', 'nowhere@noplace.org', '999 Nowhere', 345673893, 'mechanic'),
(3, 'Sean Connery', 'bond@aol.com', '007 Secret Avenue', 7345784, 'sales'),
(4, 'Patrick Stewart', 'trek@gmail.com', '711 Kings Cross', 567345987, 'mechanic'),
(5, 'Harry Potter', 'hp@owl.com', '711 Kings Cross Rd', 567328901, 'sales'),
(6, 'Robert Downey Jr', 'roboman@yahoo.com', 'The Really Big House', 234897456, 'mechanic');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `custom_work` varchar(255) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `date`, `custom_work`, `customer`, `vehicle`, `bill`) VALUES
(1, '2016-11-20 22:54:01', 'none', 1, 1, 1),
(2, '2016-11-21 03:28:28', 'none', 1, 1, 2),
(3, '2016-11-28 13:59:21', 'none', 1, 2, 17),
(4, '2016-11-29 00:59:34', 'none', 1, 2, 18),
(5, '2016-11-29 01:56:35', 'none', 1, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `service_ticket`
--

CREATE TABLE IF NOT EXISTS `service_ticket` (
  `id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `tasks` varchar(255) NOT NULL,
  `work_time_est` int(11) NOT NULL,
  `price_est` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `mechanic` int(11) NOT NULL,
  `arr_mile` int(11) NOT NULL COMMENT 'arrival mileage',
  `dep_mile` int(11) NOT NULL COMMENT 'departure mileage'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_ticket`
--

INSERT INTO `service_ticket` (`id`, `pickup_date`, `arrival_date`, `completed_date`, `tasks`, `work_time_est`, `price_est`, `bill`, `vehicle`, `customer`, `mechanic`, `arr_mile`, `dep_mile`) VALUES
(2, '2016-11-23', '2016-11-15', '2016-11-21', 'oil change', 5, 20000, 1, 2, 3, 1, 30000, 30200),
(3, '2016-11-30', '2016-11-27', '2016-11-29', 'window replacement\r\noil change', 6, 30, 16, 2, 3, 1, 30000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `vin` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `make`, `model`, `year`, `price`, `vin`) VALUES
(1, 'kia', 'soul', 1999, 10000, 'asdfghfd'),
(2, 'Kia', 'Sorento', 2004, 14000, '3345sdfs343'),
(3, 'Obey', '9F Cabrio', 1994, 100000, '4T1BE32K65U073119'),
(4, 'Truffade', 'Adder', 2007, 32000, '2HNYD18621H397417'),
(5, 'Bravado', 'Banshee', 2016, 120000, 'KNADH4A35A6545200'),
(6, 'Karin', 'Asterope', 2005, 22000, '1FMJU1LT1FEF41649'),
(7, 'Vapid', 'Bullet', 2008, 140000, '1GB4KZCL1CF190449');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`),
  ADD KEY `vehicle` (`vehicle`),
  ADD KEY `bill` (`bill`);

--
-- Indexes for table `service_ticket`
--
ALTER TABLE `service_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill` (`bill`),
  ADD KEY `vehicle` (`vehicle`),
  ADD KEY `mechanic` (`mechanic`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `service_ticket`
--
ALTER TABLE `service_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`vehicle`) REFERENCES `vehicle` (`id`),
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`bill`) REFERENCES `bill` (`id`);

--
-- Constraints for table `service_ticket`
--
ALTER TABLE `service_ticket`
  ADD CONSTRAINT `service_ticket_ibfk_1` FOREIGN KEY (`bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `service_ticket_ibfk_2` FOREIGN KEY (`vehicle`) REFERENCES `vehicle` (`id`),
  ADD CONSTRAINT `service_ticket_ibfk_3` FOREIGN KEY (`mechanic`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `service_ticket_ibfk_4` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
