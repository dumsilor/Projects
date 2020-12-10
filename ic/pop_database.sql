-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2020 at 10:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `routers`
--

CREATE TABLE `routers` (
  `router_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `loopback_ip_add` varchar(128) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL,
  `vendor` varchar(128) DEFAULT NULL,
  `device_model` varchar(128) DEFAULT NULL,
  `number_of_port` int(11) DEFAULT NULL,
  `number_of_sfp` int(11) DEFAULT NULL,
  `last_changed` varchar(128) DEFAULT NULL,
  `last_backup` varchar(128) DEFAULT NULL,
  `OS_version` varchar(128) DEFAULT NULL,
  `user` varchar(128) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routers`
--

INSERT INTO `routers` (`router_id`, `name`, `loopback_ip_add`, `location`, `vendor`, `device_model`, `number_of_port`, `number_of_sfp`, `last_changed`, `last_backup`, `OS_version`, `user`, `pass`) VALUES
(1, 'Airport RTR', '163.53.149.56', 'Airport', 'Mikrotik', 'CCR-1016-12G', 12, 4, '', '', '6.63', 'admin', ''),
(3, 'BDIX Router', '118.67.208.2', 'Colocity', 'Mikrotik', 'CCR1036-12G-4S', 12, 4, '', '', '6.37.4', NULL, NULL),
(4, 'BTRC PoP', '103.23.40.59', 'BTRC Office', 'Mikrotik', 'RB3011UiAS', 10, 1, '', '', '6.38.1', NULL, NULL),
(5, 'Banani RTR', '103.23.40.59', 'NovoAir Office', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.19', NULL, NULL),
(6, 'Baridhara DOHS RTR', '103.23.40.25', 'Baridhara DOHS', 'Mikrotik', 'RB3011UiAS', 10, 1, '', '', '6.35.4', NULL, NULL),
(7, 'Bashundhara RTR', '103.248.12.18', 'Bashundhara', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.19', NULL, NULL),
(8, 'Benapole RTR', '103.23.40.15', 'Benapole', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.40.7', NULL, NULL),
(9, 'Bogra RTR', '103.23.40.6', 'Bogra', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.42.10', NULL, NULL),
(10, 'Chottogram Press Club', '103.23.40.8', 'Chottogram', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.34.3', NULL, NULL),
(11, 'Chottogram Saint Martin Agrabad', '103.23.40.1', 'Chottogram', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.19', NULL, NULL),
(12, 'Coloasia RTR', '103.248.12.6', 'Coloasia', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.19', NULL, NULL),
(13, 'Colocity Old NNI RTR', '103.248.12.27', 'Colocity Datacenter', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.23', NULL, NULL),
(14, 'Colocity New NNI', '118.67.208.13', 'Colocity Datacenter New ISP Rack', 'Mikrotik', 'CCR1036-12G-4S', 12, 4, '', '', '6.46.5', NULL, NULL),
(15, 'Colocity New NNI 2', '118.67.208.20', 'Colocity Datacenter New ISP Rack', 'Cisco', 'ASR-920-24TZ-M', 24, 4, '', '', 'IOS XE v16.08.01b', NULL, NULL),
(16, 'Colocity Aggregation RTR', '103.248.12.2', 'Colocity Datacenter', 'Mikrotik', 'CCR1036-12G-4S', 12, 4, '', '', '6.47.3', NULL, NULL),
(17, 'Colocity Aggregation RTR 2', '103.23.40.9', 'Colocity Datacenter', 'Mikrotik', 'CCR1036-12G-4S', 12, 4, '', '', '6.47.1', NULL, NULL),
(18, 'Colocity ASR9K', '103.248.12.30', 'Colocity Datacenter New ISP Rack', 'Cisco', 'ASR-9001', 0, 12, '', '', 'IOS XR v5.2.2', 'root', ''),
(20, 'Cox\'s Bazar RTR', '103.248.12.24', 'Cox\'s Bazar', 'Mikrotik', 'CCR1036-12G-4S', 12, 4, '', '', '6.19', 'admin', ''),
(21, 'Core Wifi Mikrotik', '163.53.150.254', '4th floor NOC room on IIG PC', 'Mikrotik', 'RB2011 2HnD ', 8, 0, '', '', '', 'admin', ''),
(22, 'Dhanmondi RTR', '103.248.12.22', 'Dhanmondi', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.19', 'admin', ''),
(23, 'GGC/Akamai RTR', '103.23.40.85', 'Colocity ISP New Rack', 'Mikrotik', 'CCR1072-1G-8S+', 1, 8, '', '', '6.38.5', 'admin', ''),
(24, 'Gazi TV 1', '103.248.12.26', 'Gazi Television', 'Mikrotik', 'CCR1036-12G-4S', 12, 4, '', '', '6.43.13', 'admin', ''),
(25, 'Gazi TV 2', '103.23.40.11', 'Gazi Television', 'Mikrotik', 'RB3011UiAS', 10, 1, '', '', '6.35.4', 'admin', ''),
(26, 'Gazi TV 3', '103.23.40.17', 'Gazi Television', 'Mikrotik', 'RB2011UiAS', 10, 1, '', '', '6.35.4', 'admin', ''),
(27, 'Gulshan 1 RTR', '103.248.12.17', 'Gulshan', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.44.1', 'admin', ''),
(28, 'Gulshan 2 RTR', '103.248.12.13', 'Gulshan', 'Mikroitk', 'CCR1016-12G', 12, 0, '', '', '6.19', 'admin', ''),
(29, 'IDB RTR', '163.53.149.58', 'IDB', 'Mikrotik', 'CCR1016-12G', 12, 0, '', '', '6.23', 'admin', ''),
(30, 'IDB Wifi RTR', '118.67.223.190', 'BCIC Bhaban', 'Mikrotik', 'CCR1016-12S-1S+', 0, 13, '', '', '6.35.2', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `switches`
--

CREATE TABLE `switches` (
  `switch_id` int(11) NOT NULL,
  `switch_name` varchar(255) DEFAULT NULL,
  `switch_ip` varchar(255) DEFAULT NULL,
  `vlan_range` varchar(255) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `os_version` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `switches`
--

INSERT INTO `switches` (`switch_id`, `switch_name`, `switch_ip`, `vlan_range`, `vendor`, `model`, `os_version`, `username`, `pass`) VALUES
(1, 'Dlink', '172.17.1.12', '1-10', 'Dlink', '1210', '927', 'admin', 'ch@rp0tr0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `routers`
--
ALTER TABLE `routers`
  ADD PRIMARY KEY (`router_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `switches`
--
ALTER TABLE `switches`
  ADD PRIMARY KEY (`switch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `routers`
--
ALTER TABLE `routers`
  MODIFY `router_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `switches`
--
ALTER TABLE `switches`
  MODIFY `switch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
