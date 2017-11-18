-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 10:15 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agape_vts`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_project`
--

CREATE TABLE `acl_project` (
  `id` int(50) NOT NULL,
  `user_account_id` int(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acl_project`
--

INSERT INTO `acl_project` (`id`, `user_account_id`, `project_id`, `status`, `date_stamp`) VALUES
(1, 1, 1, 'active', '2016-02-22 00:00:00'),
(2, 2, 1, 'active', '2016-11-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `acl_project_screen`
--

CREATE TABLE `acl_project_screen` (
  `id` int(50) NOT NULL,
  `user_account_id` int(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `screen_id` int(10) NOT NULL,
  `write_access` tinyint(4) NOT NULL DEFAULT '1',
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acl_project_screen`
--

INSERT INTO `acl_project_screen` (`id`, `user_account_id`, `project_id`, `screen_id`, `write_access`, `status`, `date_stamp`) VALUES
(4, 1, 1, 24, 1, 'active', '2016-10-26 00:00:00'),
(2, 1, 1, 22, 1, 'active', '2016-02-22 00:00:00'),
(3, 1, 1, 23, 1, 'active', '2016-02-23 00:00:00'),
(5, 1, 1, 1, 1, 'active', '2016-11-07 00:00:00'),
(6, 1, 1, 2, 1, 'active', '2016-11-20 00:00:00'),
(7, 2, 1, 24, 1, 'active', '2016-11-22 00:00:00'),
(8, 2, 1, 22, 1, 'active', '2016-11-25 00:00:00'),
(9, 2, 1, 2, 1, 'active', '2016-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `device_data`
--

CREATE TABLE `device_data` (
  `id` int(50) NOT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `device_date_stamp` datetime DEFAULT NULL,
  `live_data` char(1) DEFAULT NULL,
  `gps_status` char(1) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `altitude` varchar(20) DEFAULT NULL,
  `speed` varchar(20) DEFAULT NULL,
  `direction` varchar(20) DEFAULT NULL,
  `odometer` varchar(50) DEFAULT NULL,
  `gps_move_status` char(1) DEFAULT NULL,
  `external_battery_percent` varchar(50) DEFAULT NULL,
  `internal_battery_percent` varchar(50) DEFAULT NULL,
  `gsm_signal` varchar(50) DEFAULT NULL,
  `alert_msg_code` varchar(50) DEFAULT NULL,
  `sensor_interface` varchar(50) DEFAULT NULL,
  `ign` char(1) DEFAULT NULL,
  `analog_input1` varchar(50) DEFAULT NULL,
  `digital_input1` char(1) DEFAULT NULL,
  `output1` char(1) DEFAULT NULL,
  `check_sum` varchar(50) DEFAULT NULL,
  `lac` varchar(10) DEFAULT NULL,
  `cell_id` varchar(10) DEFAULT NULL,
  `mcc` varchar(10) DEFAULT NULL,
  `mnc` varchar(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `device_epoch_time` int(4) DEFAULT NULL,
  `server_date_Stamp` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_data`
--

INSERT INTO `device_data` (`id`, `imei`, `device_date_stamp`, `live_data`, `gps_status`, `latitude`, `longitude`, `altitude`, `speed`, `direction`, `odometer`, `gps_move_status`, `external_battery_percent`, `internal_battery_percent`, `gsm_signal`, `alert_msg_code`, `sensor_interface`, `ign`, `analog_input1`, `digital_input1`, `output1`, `check_sum`, `lac`, `cell_id`, `mcc`, `mnc`, `location`, `device_epoch_time`, `server_date_Stamp`) VALUES
(1, '352022000370914', '2010-04-17 13:06:59', NULL, NULL, '12.965905', '80.205405', '89.0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1st Main Rd  Sastri Nagar  Madipakkam  Tamil Nadu  India', 1304357864, '2011-05-02 17:37:45'),
(2, '359231030219941', '2011-05-03 11:03:48', NULL, NULL, '13.028812', '80.233633', '28.3', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304381039, '2011-05-03 00:04:00'),
(3, '359231030219941', '2011-05-03 11:08:48', NULL, NULL, '13.030812', '80.234198', '18.6', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Canal Bank Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304381339, '2011-05-03 00:08:59'),
(4, '359231030219941', '2011-05-03 11:13:48', NULL, NULL, '13.028710', '80.233817', '31.9', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304381639, '2011-05-03 00:13:59'),
(5, '359231030219941', '2011-05-03 11:18:48', NULL, NULL, '13.028878', '80.233690', '15.7', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304381939, '2011-05-03 00:18:59'),
(6, '359231030219941', '2011-05-03 11:23:48', NULL, NULL, '13.028832', '80.233743', '32.4', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304382239, '2011-05-03 00:23:59'),
(7, '359231030219941', '2011-05-03 11:28:48', NULL, NULL, '13.028863', '80.233692', '22.8', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304382542, '2011-05-03 00:29:02'),
(8, '359231030219941', '2011-05-03 11:33:48', NULL, NULL, '13.028790', '80.233717', '6.6', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304382839, '2011-05-03 00:33:59'),
(9, '359231030219941', '2011-05-03 11:38:48', NULL, NULL, '13.028883', '80.233727', '33.8', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304383139, '2011-05-03 00:38:59'),
(10, '359231030219941', '2011-05-03 11:43:48', NULL, NULL, '13.028862', '80.233727', '33.5', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fourth main Rd  Thyagaraya Nagar  Chennai  Tamil Nadu  India', 1304383440, '2011-05-03 00:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `device_master`
--

CREATE TABLE `device_master` (
  `id` int(50) NOT NULL,
  `user_account_id` int(50) NOT NULL,
  `device_type_id` int(10) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `version` varchar(100) NOT NULL,
  `imei` varchar(15) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `sim_no` varchar(20) NOT NULL,
  `operator_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_master`
--

INSERT INTO `device_master` (`id`, `user_account_id`, `device_type_id`, `device_id`, `vehicle_no`, `version`, `imei`, `phone`, `sim_no`, `operator_id`, `status`, `date_stamp`) VALUES
(6, 1, 1, '101', 'TN-09-BE-3000', 'FM1.0', '359231030205866', '04432950000', '123456789123456', 1, 'active', '2016-02-21 00:00:00'),
(7, 1, 1, '102', 'TN-09-BE-3296', 'FM1.0', '359231030205867', '04432953456', '123456789123456', 3, 'active', '2016-02-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `id` int(50) NOT NULL,
  `device_type_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_type`
--

INSERT INTO `device_type` (`id`, `device_type_name`, `description`, `status`, `date_stamp`) VALUES
(1, 'Wiman', 'Wiman Devices...', 'active', '2016-02-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location_info`
--

CREATE TABLE `location_info` (
  `id` int(50) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `user_account_id` int(20) DEFAULT NULL,
  `activity` text,
  `date_stamp` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_account_id`, `activity`, `date_stamp`) VALUES
(1, NULL, '|user login|::1||emailid/password wrong|', '2016-11-20 08:24:54'),
(2, 1, '|user login|::1|1|successfully logged|', '2016-11-20 08:25:28'),
(3, 1, '|delete data|::1|1|68|deleted successfully|', '2016-11-20 08:27:24'),
(4, 1, '|list_sample|1|Where Date_Name between \'2016-11-01 00:00:00\' and \'2016-11-24 08:27:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-20 08:27:42'),
(5, 1, '|list_sample|1|Where Date_Name between \'2016-11-01 00:00:00\' and \'2016-11-24 08:27:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-20 08:28:57'),
(6, 1, '|user login|::1|1|successfully logged out|', '2016-11-20 08:37:34'),
(7, 1, '|user login|::1|1|successfully logged|', '2016-11-20 08:37:56'),
(8, 1, '|user login|::1|1|successfully logged out|', '2016-11-20 08:38:04'),
(9, 2, '|user login|::1|2|successfully logged|', '2016-11-20 08:38:11'),
(10, 2, '|user login|::1|2|successfully logged out|', '2016-11-20 08:39:09'),
(11, 1, '|user login|::1|1|successfully logged|', '2016-11-20 08:41:10'),
(12, 1, '|user login|::1|1|successfully logged out|', '2016-11-20 08:42:10'),
(13, NULL, '|user login|::1|||user login exception|SQLSTATE[42S02]: Base table or view not found: 1146 Table \'agape_vts.vw_users1\' doesn\'t exist\r\n---------------------------------------||', '2016-11-20 08:42:14'),
(14, 1, '|user login|::1|1|successfully logged|', '2016-11-20 08:42:48'),
(15, 1, '|user login|::1|1|successfully logged out|', '2016-11-20 08:42:54'),
(16, 1, '|user login|::1|1|successfully logged|', '2016-11-20 12:13:58'),
(17, 1, '|user login|::1|1|successfully logged out|', '2016-11-20 14:06:53'),
(18, 1, '|user login|::1|1|successfully logged|', '2016-11-20 16:27:04'),
(19, 1, '|user login|::1|1|successfully logged|', '2016-11-21 21:50:31'),
(20, 1, '|delete data|::1|1|55|deleted successfully|', '2016-11-21 22:18:24'),
(21, 1, '|delete data|::1|1|45|deleted successfully|', '2016-11-21 22:18:30'),
(22, 1, '|delete data|::1|1|46|deleted successfully|', '2016-11-21 22:18:33'),
(23, 1, '|delete data|::1|1|38||', '2016-11-21 22:20:35'),
(24, 1, '|delete data|::1|1|38||', '2016-11-21 22:20:37'),
(25, 1, '|delete data|::1|1|38||', '2016-11-21 22:20:38'),
(26, 1, '|data update|::1|1|56||', '2016-11-21 22:28:55'),
(27, 1, '|user login|::1|1|successfully logged out|', '2016-11-21 22:34:30'),
(28, 2, '|user login|::1|2|successfully logged|', '2016-11-21 22:34:38'),
(29, 2, '|user login|::1|2|successfully logged out|', '2016-11-21 22:35:52'),
(30, 1, '|user login|::1|1|successfully logged|', '2016-11-21 22:35:56'),
(31, 1, '|delete data|::1|1|58||', '2016-11-21 22:36:11'),
(32, 1, '|delete data|::1|1|58||', '2016-11-21 22:36:13'),
(33, 1, '|delete data|::1|1|58||', '2016-11-21 22:36:14'),
(34, 1, '|delete data|::1|1|58||', '2016-11-21 22:36:15'),
(35, 1, '|delete data|::1|1|58||', '2016-11-21 22:36:53'),
(36, 1, '|delete data|::1|1|58||', '2016-11-21 22:37:09'),
(37, 1, '|delete data|::1|1|58||', '2016-11-21 22:37:11'),
(38, 1, '|delete data|::1|1|58||', '2016-11-21 22:37:12'),
(39, 1, '|delete data|::1|1|58||', '2016-11-21 22:37:42'),
(40, 1, '|delete data|::1|1|58||', '2016-11-21 22:37:43'),
(41, 1, '|delete data|::1|1|58||', '2016-11-21 22:52:44'),
(42, 1, '|delete data|::1|1|58||', '2016-11-21 22:52:45'),
(43, 1, '|delete data|::1|1|58||', '2016-11-21 22:52:46'),
(44, 1, '|delete data|::1|1|58||', '2016-11-21 22:52:47'),
(45, 1, '|delete data|::1|1|58||', '2016-11-21 22:53:46'),
(46, 1, '|delete data|::1|1|58||', '2016-11-21 22:53:55'),
(47, 1, '|delete data|::1|1|58||', '2016-11-21 22:53:56'),
(48, 1, '|delete data|::1|1|58||', '2016-11-21 22:54:30'),
(49, 1, '|delete data|::1|1|58||', '2016-11-21 22:54:31'),
(50, 1, '|delete data|::1|1|58||', '2016-11-21 22:54:32'),
(51, 1, '|delete data|::1|1|58||', '2016-11-21 22:59:37'),
(52, 1, '|delete data|::1|1|58||', '2016-11-21 23:00:21'),
(53, 1, '|delete data|::1|1|58||', '2016-11-21 23:00:23'),
(54, 1, '|delete data|::1|1|58||', '2016-11-21 23:00:24'),
(55, 1, '|delete data|::1|1|58||', '2016-11-21 23:01:02'),
(56, 1, '|delete data|::1|1|58||', '2016-11-21 23:01:03'),
(57, 1, '|delete data|::1|1|58||', '2016-11-21 23:01:36'),
(58, 1, '|delete data|::1|1|58||', '2016-11-21 23:02:09'),
(59, 1, '|delete data|::1|1|58||', '2016-11-21 23:02:11'),
(60, 1, '|user login|::1|1|successfully logged out|', '2016-11-22 08:11:57'),
(61, 2, '|user login|::1|2|successfully logged|', '2016-11-22 08:12:16'),
(62, 2, '|user login|::1|2|successfully logged out|', '2016-11-22 22:59:47'),
(63, 1, '|user login|::1|1|successfully logged|', '2016-11-22 22:59:55'),
(64, 1, '|delete data|::1|1|58||', '2016-11-22 23:00:07'),
(65, 1, '|delete data|::1|1|58||', '2016-11-22 23:00:10'),
(66, 1, '|delete data|::1|1|58||', '2016-11-22 23:00:11'),
(67, 1, '|delete data|::1|1|58||', '2016-11-22 23:11:48'),
(68, 1, '|delete data|::1|1|58||', '2016-11-22 23:11:49'),
(69, 1, '|delete data|::1|1|58||', '2016-11-22 23:12:01'),
(70, 1, '|delete data|::1|1|58||', '2016-11-22 23:12:09'),
(71, 1, '|delete data|::1|1|58||', '2016-11-22 23:12:11'),
(72, 1, '|delete data|::1|1|58||', '2016-11-22 23:27:58'),
(73, 1, '|delete data|::1|1|58||', '2016-11-22 23:28:12'),
(74, 1, '|delete data|::1|1|58||', '2016-11-22 23:28:13'),
(75, 1, '|delete data|::1|1|58||', '2016-11-22 23:29:01'),
(76, 1, '|delete data|::1|1|58||', '2016-11-22 23:29:40'),
(77, 1, '|delete data|::1|1|58||', '2016-11-22 23:29:42'),
(78, 1, '|delete data|::1|1|58||', '2016-11-22 23:30:00'),
(79, 1, '|delete data|::1|1|58||', '2016-11-22 23:30:01'),
(80, 1, '|delete data|::1|1|58||', '2016-11-22 23:35:37'),
(81, 1, '|delete data|::1|1|40||', '2016-11-22 23:35:48'),
(82, 1, '|list_sample|1|Where Date_Name between \'2016-11-23 00:00:00\' and \'2016-11-23 07:58:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-23 07:59:08'),
(83, 1, '|delete data|::1|1|58||', '2016-11-23 07:59:21'),
(84, 1, '|delete data|::1|1|66|deleted successfully|', '2016-11-23 08:24:18'),
(85, 1, '|delete data|::1|1|67||', '2016-11-23 08:24:27'),
(86, 1, '|list_sample|1|Where Date_Name between \'2016-11-23 00:00:00\' and \'2016-11-23 08:30:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-23 08:30:33'),
(87, 1, '|delete data|::1|1|58||', '2016-11-23 08:30:40'),
(88, 1, '|user login|::1|1|successfully logged out|', '2016-11-23 21:39:51'),
(89, 1, '|user login|::1|1|successfully logged|', '2016-11-23 21:39:58'),
(90, 1, '|list_sample|1|Where Date_Name between \'2016-11-24 00:00:00\' and \'2016-11-24 08:50:00\' and Select_Name =  \'2\'  |listed successfully|', '2016-11-24 09:34:51'),
(91, 1, '|list_sample|1|Where Date_Name between \'2017-01-10 00:00:00\' and \'2017-01-11 09:34:00\' and Select_Name =  \'2\'  |listed successfully|', '2016-11-24 09:35:29'),
(92, 1, '|user login|::1|1|successfully logged|', '2016-11-24 21:41:40'),
(93, 1, '|user login|::1|1|successfully logged out|', '2016-11-24 21:59:15'),
(94, NULL, '|user login|::1||emailid/password wrong|', '2016-11-24 22:00:14'),
(95, 1, '|user login|::1|1|successfully logged|', '2016-11-24 22:02:18'),
(96, 1, '|user login|::1|1|successfully logged out|', '2016-11-24 22:03:27'),
(97, 1, '|user login|::1|1|successfully logged|', '2016-11-24 22:03:59'),
(98, 1, '|data insert|::1|1|69|new record added successfully|', '2016-11-24 22:09:57'),
(99, 1, '|list_sample|1|Where Date_Name between \'2016-11-24 00:00:00\' and \'2016-11-24 22:09:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-24 22:11:54'),
(100, 1, '|data update|::1|1|58||', '2016-11-25 08:24:06'),
(101, 1, '|user login|::1|1|successfully logged out|', '2016-11-25 08:24:19'),
(102, 2, '|user login|::1|2|successfully logged|', '2016-11-25 08:24:31'),
(103, 2, '|data update|::1|2|58|updated successfully|', '2016-11-25 08:25:59'),
(104, 2, '|list_sample|2|Where Date_Name between \'2016-11-25 00:00:00\' and \'2016-11-25 08:25:00\' and Select_Name =  \'2\'  |listed successfully|', '2016-11-25 08:34:13'),
(105, 2, '|list_sample|2|Where Date_Name between \'2016-11-25 00:00:00\' and \'2016-11-25 08:34:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-25 08:34:18'),
(106, 2, '|data insert|::1|2|70|new record added successfully|', '2016-11-25 08:35:02'),
(107, 2, '|data insert|::1|2|71|new record added successfully|', '2016-11-25 08:38:04'),
(108, 2, '|user login|::1|2|successfully logged out|', '2016-11-25 22:07:08'),
(109, 1, '|user login|::1|1|successfully logged|', '2016-11-25 22:07:14'),
(110, 1, '|delete data|::1|1|58||', '2016-11-26 09:30:59'),
(111, 1, '|user login|::1|1|successfully logged out|', '2016-11-26 13:51:04'),
(112, 2, '|user login|::1|2|successfully logged|', '2016-11-26 13:51:08'),
(113, 2, '|user login|::1|2|successfully logged out|', '2016-11-26 14:04:51'),
(114, NULL, '|user login|::1||emailid/password wrong|', '2016-11-26 14:04:54'),
(115, 1, '|user login|::1|1|successfully logged|', '2016-11-26 14:04:58'),
(116, 1, '|user login|::1|1|successfully logged out|', '2016-11-26 14:05:39'),
(117, 2, '|user login|::1|2|successfully logged|', '2016-11-26 14:05:44'),
(118, 2, '|data update|::1|2|58||', '2016-11-26 15:01:28'),
(119, 2, '|user login|::1|2|successfully logged out|', '2016-11-26 17:11:33'),
(120, NULL, '|user login|::1||emailid/password wrong|', '2016-11-26 17:11:41'),
(121, 2, '|user login|::1|2|successfully logged|', '2016-11-26 17:11:46'),
(122, 2, '|data update|::1|2|38|updated successfully|', '2016-11-26 21:04:34'),
(123, 2, '|user login|::1|2|successfully logged out|', '2016-11-26 21:09:57'),
(124, 1, '|user login|::1|1|successfully logged|', '2016-11-26 21:10:01'),
(125, 1, '|data update|::1|1|58||', '2016-11-26 23:22:05'),
(126, 1, '|user login|::1|1|successfully logged out|', '2016-11-27 11:58:42'),
(127, 1, '|user login|::1|1|successfully logged|', '2016-11-27 11:59:36'),
(128, 1, '|data update|::1|1|58||', '2016-11-27 12:00:07'),
(129, 1, '|list_sample|1|Where Date_Name between \'2016-11-27 00:00:00\' and \'2016-11-27 12:00:00\' and Select_Name =  \'1\'  |listed successfully|', '2016-11-27 12:00:14'),
(130, 1, '|user login|::1|1|successfully logged out|', '2016-11-27 13:04:22'),
(131, NULL, '|user login|::1|||user login exception|SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\r\n---------------------------------------||', '2016-11-27 13:04:27'),
(132, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:04:53'),
(133, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:04:59'),
(134, NULL, '|user login|::1|||', '2016-11-27 13:07:07'),
(135, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:07:35'),
(136, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:40:21'),
(137, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:40:40'),
(138, 1, '|user login|::1|1|successfully logged|', '2016-11-27 13:46:14'),
(139, 1, '|user login|::1|1|successfully logged out|', '2016-11-27 13:46:29'),
(140, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:52:34'),
(141, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:53:13'),
(142, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:53:57'),
(143, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:54:18'),
(144, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:55:20'),
(145, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 13:55:28'),
(146, 1, '|user login|::1|1|successfully logged|', '2016-11-27 13:56:05'),
(147, 1, '|user login|::1|1|successfully logged out|', '2016-11-27 13:56:12'),
(148, 1, '|user login|::1|1|successfully logged|', '2016-11-27 13:56:29'),
(149, 1, '|user login|::1|1|successfully logged out|', '2016-11-27 13:56:33'),
(150, 2, '|user login|::1|2|successfully logged|', '2016-11-27 13:56:42'),
(151, 2, '|user login|::1|2|successfully logged out|', '2016-11-27 13:56:45'),
(152, 2, '|user login|::1|2|successfully logged|', '2016-11-27 14:00:57'),
(153, 2, '|user login|::1|2|successfully logged out|', '2016-11-27 14:01:00'),
(154, 2, '|user login|::1|2|successfully logged|', '2016-11-27 14:01:04'),
(155, 2, '|user login|::1|2|successfully logged out|', '2016-11-27 14:01:16'),
(156, 2, '|user login|::1|2|successfully logged|', '2016-11-27 14:01:20'),
(157, 2, '|user login|::1|2|successfully logged out|', '2016-11-27 14:01:22'),
(158, 2, '|user login|::1|2|successfully logged|', '2016-11-27 14:01:52'),
(159, 2, '|user login|::1|2|successfully logged out|', '2016-11-27 14:01:54'),
(160, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:02:05'),
(161, 2, '|user login|::1|2|successfully logged|', '2016-11-27 14:02:10'),
(162, 2, '|user login|::1|2|successfully logged out|', '2016-11-27 14:02:23'),
(163, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:02:54'),
(164, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:03:43'),
(165, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:04:14'),
(166, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:34:03'),
(167, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:34:08'),
(168, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:35:42'),
(169, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:35:49'),
(170, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:35:54'),
(171, NULL, '|user login|::1||Oops!!! your account was expired|', '2016-11-27 14:57:09'),
(172, 1, '|user login|::1|1|successfully logged|', '2016-11-27 14:57:18'),
(173, 1, '|user login|::1|1|successfully logged|', '2016-11-27 17:58:08'),
(174, 1, '|user login|::1|1|successfully logged|', '2016-11-27 18:15:15'),
(175, NULL, '|user login|login|::1||Oops!!! your account was locked|', '2017-11-17 10:17:22'),
(176, NULL, '|user login|login|::1||Oops!!! your account was locked|', '2017-11-17 10:18:06'),
(177, NULL, '|user login|login|::1||emailid/password wrong|', '2017-11-18 20:39:13'),
(178, NULL, '|user login|login|::1||Oops!!! your account was locked|', '2017-11-18 20:39:20'),
(179, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:04:32'),
(180, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:05:19'),
(181, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:05:24'),
(182, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:06:47'),
(183, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:07:54'),
(184, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:08:54'),
(185, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:09:38'),
(186, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:09:49'),
(187, NULL, '|user login|login|::1||Oops!!! your account was expired|', '2017-11-18 21:10:49'),
(188, 1, '|user login|login|::1|1|successfully logged|', '2017-11-18 21:11:14'),
(189, 1, '|user login|::1|1|successfully logged out|', '2017-11-18 21:15:44'),
(190, 1, '|user login|login|::1|1|successfully logged|', '2017-11-18 21:33:38'),
(191, 1, '|user login|::1|1|successfully logged out|', '2017-11-18 21:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `logs_type`
--

CREATE TABLE `logs_type` (
  `id` int(50) NOT NULL,
  `logs_type` varchar(100) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_type`
--

INSERT INTO `logs_type` (`id`, `logs_type`, `description`, `status`, `date_stamp`) VALUES
(1, 'User Login', 'User Login', 'active', '2016-10-21 00:00:00'),
(2, 'New Record', 'New Record', 'active', '2016-10-21 00:00:00'),
(3, 'Update Record', 'Update Record', 'active', '2016-10-21 00:00:00'),
(4, 'Delete Record', 'Delete Record', 'active', '2016-10-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `operator_details`
--

CREATE TABLE `operator_details` (
  `id` int(50) NOT NULL,
  `operator_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator_details`
--

INSERT INTO `operator_details` (`id`, `operator_name`, `description`, `status`, `date_stamp`) VALUES
(1, 'Airtel', 'Airtel', 'active', '2016-02-21 00:00:00'),
(2, 'Aircel', 'Aircel', 'active', '2016-02-21 00:00:00'),
(3, 'Docomo', 'Docomo', 'active', '2016-02-21 00:00:00'),
(4, 'IDEA', 'IDEA', 'active', '2016-02-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(50) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `description`, `status`, `date_stamp`) VALUES
(1, 'VTS', 'Vehicle Tracking System', 'active', '2016-02-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `id` int(50) NOT NULL,
  `project_id` int(12) NOT NULL,
  `screen_name` varchar(100) NOT NULL,
  `url` varchar(300) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`id`, `project_id`, `screen_name`, `url`, `description`, `status`, `date_stamp`) VALUES
(1, 1, 'home', '', 'User Home Screen', 'active', '2016-02-22 00:00:00'),
(2, 1, 'profile', '', 'User Profile Screen', 'active', '2016-02-22 00:00:00'),
(3, 1, 'user_report', '', 'User Report Screen', 'active', '2016-02-23 00:00:00'),
(4, 1, 'report_vehicle_status_summary', '', 'Vehicle Status Summary', 'active', '2016-02-23 00:00:00'),
(5, 1, 'report_whole_day', '', 'Whole Day Report', 'active', '2016-02-23 00:00:00'),
(6, 1, 'report_whole_day_summary', '', 'Whole Day Summary', 'active', '2016-02-23 00:00:00'),
(7, 1, 'report_running', '', 'Running Report', 'active', '2016-02-23 00:00:00'),
(8, 1, 'report_stappage', '', 'Stappage Report', 'active', '2016-02-23 00:00:00'),
(9, 1, 'report_idle', '', 'Idle Report', 'active', '2016-02-23 00:00:00'),
(10, 1, 'report_event_details', '', 'Event Detail Report', 'active', '2016-02-23 00:00:00'),
(11, 1, 'report_io_interface_port', '', 'IO Interface port report', 'active', '2016-02-23 00:00:00'),
(12, 1, 'report_inactive_summary', '', 'Inactive Summary report', 'active', '2016-02-23 00:00:00'),
(13, 1, 'report_fuel', '', 'Fuel report', 'active', '2016-02-23 00:00:00'),
(14, 1, 'alert_geozone', '', 'Geozone alert ', 'active', '2016-02-23 00:00:00'),
(15, 1, 'alert_speed', '', 'Speed alert', 'active', '2016-02-23 00:00:00'),
(16, 1, 'report_start_stop_summary', '', 'Start Stop Summary Report', 'active', '2016-02-23 00:00:00'),
(17, 1, 'map_history', '', 'History Map', 'active', '2016-02-23 00:00:00'),
(18, 1, 'chart_speed', '', 'Speed Chart', 'active', '2016-02-23 00:00:00'),
(19, 1, 'chart_fuel', '', 'Fuel Chart', 'active', '2016-02-23 00:00:00'),
(20, 1, 'chart_temperature', '', 'Temperature Chart', 'active', '2016-02-23 00:00:00'),
(21, 1, 'chart_engine_rpm', '', 'Engine RPM chart', 'active', '2016-02-23 00:00:00'),
(22, 1, 'add_sample', '', 'new user insert', 'active', '2016-10-25 00:00:00'),
(23, 1, 'add_device', '', 'new device insert', 'active', '2016-10-25 00:00:00'),
(24, 1, 'list_sample', '', 'user list', 'active', '2016-10-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `startstop_summary`
--

CREATE TABLE `startstop_summary` (
  `id` int(40) NOT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `start_latitude` decimal(12,6) DEFAULT NULL,
  `start_longitude` decimal(12,6) DEFAULT NULL,
  `start_date_stamp` varchar(20) DEFAULT NULL,
  `start_server_date_stamp` varchar(20) DEFAULT NULL,
  `start_speed` varchar(10) DEFAULT NULL,
  `start_ign` varchar(10) DEFAULT NULL,
  `start_location_summary` varchar(255) DEFAULT NULL,
  `start_epoch_time` int(4) DEFAULT NULL,
  `end_latitude` double NOT NULL,
  `end_longitude` decimal(12,6) NOT NULL,
  `end_date_stamp` varchar(20) NOT NULL,
  `end_server_date_stamp` varchar(20) NOT NULL,
  `end_speed` varchar(10) NOT NULL,
  `end_ign` varchar(10) NOT NULL,
  `end_location_summary` varchar(255) NOT NULL,
  `end_epoch_time` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `content` text NOT NULL,
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(50) NOT NULL,
  `Textbox_Name` varchar(100) NOT NULL,
  `Password_Name` varchar(100) NOT NULL,
  `Radio_Name` char(10) NOT NULL,
  `Checkbox_Name` varchar(100) NOT NULL,
  `Select_Name` varchar(100) NOT NULL DEFAULT 'active',
  `Hidden_Name` varchar(100) NOT NULL DEFAULT 'active',
  `Textarea_Name` text NOT NULL,
  `files` varchar(100) NOT NULL,
  `files1` varchar(100) NOT NULL,
  `Date_Name` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `Textbox_Name`, `Password_Name`, `Radio_Name`, `Checkbox_Name`, `Select_Name`, `Hidden_Name`, `Textarea_Name`, `files`, `files1`, `Date_Name`) VALUES
(58, 'Textbox_Value asdasdasa', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasdasdasdasdas dfd', '', '', '2016-11-15 00:00:00'),
(57, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasdasdasdasdas', '', '', '2016-11-15 00:00:00'),
(56, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasdasdasdasdas', '', '', '2016-11-15 00:00:00'),
(38, 'Textbox_Values fdsfds', 'dsfdsff', 'Male', 'a:2:{i:0;s:7:\"Running\";i:1;s:6:\"Eating\";}', '1', 'Hidden_Value-111', 'Textarea_Value sdfs fsdf sdfdsf sdf', 'Hetro SalaryDetails.xlsx', 'ezgif-3608921706_1457613150.gif', '2016-11-13 00:00:00'),
(39, 'Textbox_Value', 'asdsa', 'Male', 'a:1:{i:0;s:7:\"Running\";}', '1', 'Hidden_Value-111', 'Textarea_Value asdasd asdasdas', '1353_Shanmugapriya_DNB_BFSI.doc', 'Citi G2C Resource Sheet_02Feb16_Without SOEID.xlsx', '2016-11-13 00:00:00'),
(40, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:6:\"Eating\";}', '1', 'Hidden_Value-111', 'Textarea_Value  dfsdf sdf dsf ', '', '', '2016-11-13 10:28:00'),
(41, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:1:{i:0;s:7:\"Running\";}', '2', 'Hidden_Value-111', 'Textarea_Value sdfs df ds', '', '', '2016-11-13 05:18:00'),
(42, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:1:{i:0;s:7:\"Running\";}', '2', 'Hidden_Value-111', 'Textarea_Value asd as dasd asdasdasda', '', '', '2016-11-24 05:30:00'),
(44, 'Textbox_Value sdfdsfds', 'Password_Value-1111', 'Female', 'a:4:{i:0;s:5:\"Sking\";i:1;s:7:\"Running\";i:2;s:6:\"Eating\";i:3;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Value sdfd fdsf dsfds ', 'act_login.txt', 'Che_Dgl.pdf', '2016-11-18 00:00:00'),
(69, 'Textbox_Value', 'raji', 'Male', 'a:1:{i:0;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'rajalakshmi kaliyaperumal', 'act_login.txt', '', '2016-11-24 00:00:00'),
(67, 'Textbox_Valueasd asdas', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasd asdas dasd as', '', '', '2016-11-19 00:00:00'),
(50, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasdas dasdasd asdas sdfsdfds', '', '', '2016-11-15 00:00:00'),
(51, 'Textbox_Valueasdasdas', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Value asdasdasdasd', '', '', '2016-11-15 00:00:00'),
(52, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:2:{i:0;s:7:\"Running\";i:1;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasdasdasdasdas', '', '', '2016-11-15 00:00:00'),
(70, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:1:{i:0;s:7:\"Running\";}', '2', 'Hidden_Value-111', 'Textarea_Value dsfgdfg dfg dfg dfgdf', '', '', '2016-11-25 00:00:00'),
(71, 'Textbox_Valuegd gdf gdfg df gfd', 'Password_Value-1111', 'Female', 'a:1:{i:0;s:7:\"Running\";}', '2', 'Hidden_Value-111', 'Textarea_Value fgdfg dfg dfg dfg dfg df', '', '', '2016-11-25 00:00:00'),
(63, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:1:{i:0;s:7:\"Running\";}', '2', 'Hidden_Value-111', 'Textarea_Value fsdf sdf sdf sdf dsfds asdasd', '', '', '2016-11-17 00:00:00'),
(62, 'Textbox_Value', 'Password_Value-1111', 'Female', 'a:3:{i:0;s:5:\"Sking\";i:1;s:7:\"Running\";i:2;s:8:\"Sleeping\";}', '1', 'Hidden_Value-111', 'Textarea_Valueasdasdasdasdsa', '', '', '2016-11-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` char(10) DEFAULT NULL,
  `account_status` char(10) NOT NULL DEFAULT 'active',
  `reason` text NOT NULL,
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `firstname`, `lastname`, `gender`, `address`, `mobile`, `account_status`, `reason`, `date_stamp`) VALUES
(1, 'Seeni', 'vasan', 'male', 'No: 7, Tansi nagar, 19th street, velachery, chennai - 42', '9500006549', 'active', '', '2016-02-13 00:00:00'),
(2, 'Ramesh', 'kumar', 'male', 'chennai', '9940159598', 'active', '', '2016-11-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_expiry`
--

CREATE TABLE `user_expiry` (
  `id` int(50) NOT NULL,
  `user_account_id` int(10) NOT NULL,
  `license_code` varchar(100) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_expiry`
--

INSERT INTO `user_expiry` (`id`, `user_account_id`, `license_code`, `valid_from`, `valid_to`, `status`, `date_stamp`) VALUES
(3, 1, '201602133fed', '2016-02-13 00:00:00', '2025-11-27 14:00:00', 'active', '2016-02-13 00:00:00'),
(4, 1, '201602133fed', '2016-05-13 00:00:00', '2016-08-13 00:00:00', 'active', '2016-05-13 00:00:00'),
(5, 1, '201602133fed', '2016-08-15 00:00:00', '2018-11-13 00:00:00', 'active', '2016-02-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(50) NOT NULL,
  `user_account_id` int(50) NOT NULL,
  `user_type_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `login_status` char(10) NOT NULL DEFAULT 'active',
  `reason` text NOT NULL,
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_account_id`, `user_type_id`, `email`, `password`, `status`, `login_status`, `reason`, `date_stamp`) VALUES
(1, 1, 1, 'iamseeni@gmail.com', 'seeni123', 'active', 'active', '', '2016-10-19 00:00:00'),
(13, 2, 2, 'aaskmy@gmail.com', 'admin123', 'active', 'active', '', '2016-11-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(50) NOT NULL,
  `user_master_id` int(10) NOT NULL,
  `session_start` datetime NOT NULL,
  `session_end` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`id`, `user_master_id`, `session_start`, `session_end`) VALUES
(1, 3, '2016-02-13 09:22:21', '2016-02-13 10:17:17'),
(2, 3, '2016-02-15 05:18:26', '2016-02-15 07:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `description`, `status`, `date_stamp`) VALUES
(1, 'super_admin', 'super admin will have all the rights', 'active', '2016-02-13 00:00:00'),
(2, 'administrator', 'administrator', 'active', '2016-02-13 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_device_details`
-- (See below for the actual view)
--
CREATE TABLE `vw_device_details` (
`user_account_id` int(50)
,`firstname` varchar(100)
,`lastname` varchar(100)
,`device_id` varchar(100)
,`vehicle_no` varchar(50)
,`version` varchar(100)
,`imei` varchar(15)
,`phone` varchar(50)
,`sim_no` varchar(20)
,`operator_name` varchar(100)
,`device_status` varchar(10)
,`device_added_date` datetime
,`device_type_name` varchar(100)
,`device_description` text
,`device_type_status` varchar(10)
,`device_type_added_data` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_project_screen`
-- (See below for the actual view)
--
CREATE TABLE `vw_project_screen` (
`project_id` int(50)
,`project_name` varchar(100)
,`project_description` text
,`project_status` varchar(10)
,`project_date_stamp` datetime
,`screen_id` int(50)
,`screen_name` varchar(100)
,`screen_url` varchar(300)
,`screen_description` text
,`screen_status` varchar(10)
,`screen_date_stamp` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_users`
-- (See below for the actual view)
--
CREATE TABLE `vw_users` (
`user_account_id` int(50)
,`firstname` varchar(100)
,`lastname` varchar(100)
,`gender` varchar(6)
,`address` varchar(255)
,`mobile` char(10)
,`account_status` char(10)
,`account_reason` text
,`date_stamp` datetime
,`email` varchar(100)
,`password` varchar(255)
,`login_status` char(10)
,`login_reason` text
,`user_type_id` int(10)
,`user_type` varchar(100)
,`user_type_description` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_users_expiry`
-- (See below for the actual view)
--
CREATE TABLE `vw_users_expiry` (
`user_account_id` int(50)
,`firstname` varchar(100)
,`lastname` varchar(100)
,`gender` varchar(6)
,`address` varchar(255)
,`mobile` char(10)
,`account_status` char(10)
,`account_reason` text
,`date_stamp` datetime
,`login_status` char(10)
,`login_reason` text
,`user_type_id` int(10)
,`user_type` varchar(100)
,`user_type_description` text
,`license_code` varchar(100)
,`valid_from` datetime
,`valid_to` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_users_session`
-- (See below for the actual view)
--
CREATE TABLE `vw_users_session` (
`user_account_id` int(50)
,`firstname` varchar(100)
,`lastname` varchar(100)
,`address` varchar(255)
,`mobile` char(10)
,`account_status` char(10)
,`account_reason` text
,`date_stamp` datetime
,`password` varchar(255)
,`login_status` char(10)
,`login_reason` text
,`user_type_id` int(10)
,`user_type` varchar(100)
,`user_type_description` text
,`session_start` datetime
,`session_end` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_project_screen`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_project_screen` (
`screen_id` int(10)
,`user_account_id` int(50)
,`project_id` int(10)
,`write_access` tinyint(4)
,`aps_status` varchar(10)
,`screen_name` varchar(100)
,`screen_url` varchar(300)
,`screen_description` text
,`screen_status` varchar(10)
,`screen_date_stamp` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vw_device_details`
--
DROP TABLE IF EXISTS `vw_device_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_device_details`  AS  select `dm`.`user_account_id` AS `user_account_id`,`ua`.`firstname` AS `firstname`,`ua`.`lastname` AS `lastname`,`dm`.`device_id` AS `device_id`,`dm`.`vehicle_no` AS `vehicle_no`,`dm`.`version` AS `version`,`dm`.`imei` AS `imei`,`dm`.`phone` AS `phone`,`dm`.`sim_no` AS `sim_no`,`od`.`operator_name` AS `operator_name`,`dm`.`status` AS `device_status`,`dm`.`date_stamp` AS `device_added_date`,`dt`.`device_type_name` AS `device_type_name`,`dt`.`description` AS `device_description`,`dt`.`status` AS `device_type_status`,`dt`.`date_stamp` AS `device_type_added_data` from (((`device_master` `dm` left join `device_type` `dt` on((`dm`.`device_type_id` = `dt`.`id`))) left join `user_account` `ua` on((`ua`.`id` = `dm`.`user_account_id`))) left join `operator_details` `od` on((`od`.`id` = `dm`.`operator_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_project_screen`
--
DROP TABLE IF EXISTS `vw_project_screen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_project_screen`  AS  select `p`.`id` AS `project_id`,`p`.`project_name` AS `project_name`,`p`.`description` AS `project_description`,`p`.`status` AS `project_status`,`p`.`date_stamp` AS `project_date_stamp`,`s`.`id` AS `screen_id`,`s`.`screen_name` AS `screen_name`,`s`.`url` AS `screen_url`,`s`.`description` AS `screen_description`,`s`.`status` AS `screen_status`,`s`.`date_stamp` AS `screen_date_stamp` from (`project` `p` left join `screen` `s` on((`p`.`id` = `s`.`project_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_users`
--
DROP TABLE IF EXISTS `vw_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_users`  AS  select `ua`.`id` AS `user_account_id`,`ua`.`firstname` AS `firstname`,`ua`.`lastname` AS `lastname`,`ua`.`gender` AS `gender`,`ua`.`address` AS `address`,`ua`.`mobile` AS `mobile`,`ua`.`account_status` AS `account_status`,`ua`.`reason` AS `account_reason`,`ua`.`date_stamp` AS `date_stamp`,`um`.`email` AS `email`,`um`.`password` AS `password`,`um`.`login_status` AS `login_status`,`um`.`reason` AS `login_reason`,`ut`.`id` AS `user_type_id`,`ut`.`user_type` AS `user_type`,`ut`.`description` AS `user_type_description` from ((`user_account` `ua` left join `user_master` `um` on((`ua`.`id` = `um`.`user_account_id`))) left join `user_type` `ut` on((`ut`.`id` = `um`.`user_type_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_users_expiry`
--
DROP TABLE IF EXISTS `vw_users_expiry`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_users_expiry`  AS  select `ua`.`id` AS `user_account_id`,`ua`.`firstname` AS `firstname`,`ua`.`lastname` AS `lastname`,`ua`.`gender` AS `gender`,`ua`.`address` AS `address`,`ua`.`mobile` AS `mobile`,`ua`.`account_status` AS `account_status`,`ua`.`reason` AS `account_reason`,`ua`.`date_stamp` AS `date_stamp`,`um`.`login_status` AS `login_status`,`um`.`reason` AS `login_reason`,`ut`.`id` AS `user_type_id`,`ut`.`user_type` AS `user_type`,`ut`.`description` AS `user_type_description`,`ue`.`license_code` AS `license_code`,`ue`.`valid_from` AS `valid_from`,`ue`.`valid_to` AS `valid_to` from (((`user_expiry` `ue` left join `user_account` `ua` on((`ua`.`id` = `ue`.`user_account_id`))) left join `user_master` `um` on((`um`.`user_account_id` = `ua`.`id`))) left join `user_type` `ut` on((`ut`.`id` = `um`.`user_type_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_users_session`
--
DROP TABLE IF EXISTS `vw_users_session`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_users_session`  AS  select `ua`.`id` AS `user_account_id`,`ua`.`firstname` AS `firstname`,`ua`.`lastname` AS `lastname`,`ua`.`address` AS `address`,`ua`.`mobile` AS `mobile`,`ua`.`account_status` AS `account_status`,`ua`.`reason` AS `account_reason`,`ua`.`date_stamp` AS `date_stamp`,`um`.`password` AS `password`,`um`.`login_status` AS `login_status`,`um`.`reason` AS `login_reason`,`ut`.`id` AS `user_type_id`,`ut`.`user_type` AS `user_type`,`ut`.`description` AS `user_type_description`,`us`.`session_start` AS `session_start`,`us`.`session_end` AS `session_end` from (((`user_session` `us` left join `user_master` `um` on((`um`.`id` = `us`.`user_master_id`))) left join `user_account` `ua` on((`ua`.`id` = `um`.`user_account_id`))) left join `user_type` `ut` on((`ut`.`id` = `um`.`user_type_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_project_screen`
--
DROP TABLE IF EXISTS `vw_user_project_screen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_project_screen`  AS  select `aps`.`screen_id` AS `screen_id`,`aps`.`user_account_id` AS `user_account_id`,`aps`.`project_id` AS `project_id`,`aps`.`write_access` AS `write_access`,`aps`.`status` AS `aps_status`,`s`.`screen_name` AS `screen_name`,`s`.`url` AS `screen_url`,`s`.`description` AS `screen_description`,`s`.`status` AS `screen_status`,`s`.`date_stamp` AS `screen_date_stamp` from (`acl_project_screen` `aps` left join `screen` `s` on((`s`.`id` = `aps`.`screen_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_project`
--
ALTER TABLE `acl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl_project_screen`
--
ALTER TABLE `acl_project_screen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_data`
--
ALTER TABLE `device_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DEVICE_DATA_IDX_IMEI` (`imei`),
  ADD KEY `DEVICE_DATA_IDX_DATE_TIME_STAMP` (`device_date_stamp`),
  ADD KEY `EPOCH_TIME_IDX` (`device_epoch_time`);

--
-- Indexes for table `device_master`
--
ALTER TABLE `device_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_info`
--
ALTER TABLE `location_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latlong_indx` (`latitude`,`longitude`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_type`
--
ALTER TABLE `logs_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_details`
--
ALTER TABLE `operator_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `startstop_summary`
--
ALTER TABLE `startstop_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `user_expiry`
--
ALTER TABLE `user_expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_project`
--
ALTER TABLE `acl_project`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acl_project_screen`
--
ALTER TABLE `acl_project_screen`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `device_data`
--
ALTER TABLE `device_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `device_master`
--
ALTER TABLE `device_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location_info`
--
ALTER TABLE `location_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=680655;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `logs_type`
--
ALTER TABLE `logs_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `operator_details`
--
ALTER TABLE `operator_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `startstop_summary`
--
ALTER TABLE `startstop_summary`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_expiry`
--
ALTER TABLE `user_expiry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
