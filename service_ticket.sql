-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 11:59 PM
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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_ticket`
--
ALTER TABLE `service_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

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

--
-- Dumping data for table `service_ticket`
--

INSERT INTO `service_ticket` (`id`, `pickup_date`, `arrival_date`, `completed_date`, `tasks`, `work_time_est`, `price_est`, `bill`, `vehicle`, `customer`, `mechanic`, `arr_mile`, `dep_mile`) VALUES
(2, '2016-11-23', '2016-11-15', '2016-11-21', 'oil change', 5, 20000, 1, 2, 3, 1, 30000, 30200),
(3, '2016-11-30', '2016-11-27', '2016-11-29', 'window replacement\r\noil change', 6, 30, 16, 2, 3, 1, 30000, 30000);

