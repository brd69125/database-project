-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2016 at 01:21 AM
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

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `bill`
--

TRUNCATE TABLE `bill`;
--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `amount`, `payment`) VALUES
(1, '2016-11-20 22:51:57', 20, 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `customer`
--

TRUNCATE TABLE `customer`;
--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `type`, `email`) VALUES
(1, 'Chisom Ogbanana', '123 Place', 123456789, 'sale', 'nobody@nowhere.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL COMMENT 'mechanic or sales'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `employee`
--

TRUNCATE TABLE `employee`;
-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `custom_work` varchar(255) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `sale`
--

TRUNCATE TABLE `sale`;
--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `date`, `custom_work`, `customer`, `vehicle`, `bill`) VALUES
(1, '2016-11-20 22:54:01', 'none', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_ticket`
--

DROP TABLE IF EXISTS `service_ticket`;
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
  `mechanic` int(11) NOT NULL,
  `arr_mile` int(11) NOT NULL COMMENT 'arrival mileage',
  `dep_mile` int(11) NOT NULL COMMENT 'departure mileage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `service_ticket`
--

TRUNCATE TABLE `service_ticket`;
-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `vehicle`
--

TRUNCATE TABLE `vehicle`;
--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `make`, `model`, `year`, `price`) VALUES
(1, 'kia', 'soul', 1999, 10000);

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
  ADD KEY `mechanic` (`mechanic`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_ticket`
--
ALTER TABLE `service_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `service_ticket_ibfk_3` FOREIGN KEY (`mechanic`) REFERENCES `employee` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
