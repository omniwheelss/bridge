-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: vts
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `STARTSTOP_SUMMARY`
--

DROP TABLE IF EXISTS `STARTSTOP_SUMMARY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STARTSTOP_SUMMARY` (
  `Record_Index` int(40) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Start_Latitude` decimal(12,6) DEFAULT NULL,
  `Start_Longitude` decimal(12,6) DEFAULT NULL,
  `Start_Date_Stamp` varchar(20) DEFAULT NULL,
  `Start_Server_Date_Stamp` varchar(20) DEFAULT NULL,
  `Start_Speed` varchar(10) DEFAULT NULL,
  `Start_IGN` varchar(10) DEFAULT NULL,
  `Start_Location_Summary` varchar(255) DEFAULT NULL,
  `Start_Epoch_Time` int(4) DEFAULT NULL,
  `End_Latitude` double(12,6) NOT NULL,
  `End_Longitude` decimal(12,6) NOT NULL,
  `End_Date_Stamp` varchar(20) NOT NULL,
  `End_Server_Date_Stamp` varchar(20) NOT NULL,
  `End_Speed` varchar(10) NOT NULL,
  `End_IGN` varchar(10) NOT NULL,
  `End_Location_Summary` varchar(255) NOT NULL,
  `End_Epoch_Time` int(4) NOT NULL,
  PRIMARY KEY (`Record_Index`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `acl_project`
--

DROP TABLE IF EXISTS `acl_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_project` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `acl_project_screen`
--

DROP TABLE IF EXISTS `acl_project_screen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_project_screen` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `screen_id` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active',
  `Date_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `description` text,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `device_data`
--

DROP TABLE IF EXISTS `device_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_data` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `protocol_version` varchar(50) DEFAULT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `device_date_stamp` datetime DEFAULT NULL,
  `live_data` char(1) DEFAULT NULL,
  `gps_status` char(1) DEFAULT NULL,
  `latitude` decimal(9,7) DEFAULT NULL,
  `longitude` decimal(9,7) DEFAULT NULL,
  `altitude` varchar(20) DEFAULT NULL,
  `speed` decimal(9,2) DEFAULT NULL,
  `direction` varchar(20) DEFAULT NULL,
  `odometer` varchar(50) DEFAULT NULL,
  `gps_move_status` char(1) DEFAULT NULL,
  `external_battery_volt` varchar(50) DEFAULT NULL,
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
  `server_date_Stamp` datetime DEFAULT NULL,
  `unused` int(2) DEFAULT NULL,
  `sequence_no` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `DEVICE_DATA_IDX_IMEI` (`imei`),
  KEY `DEVICE_DATA_IDX_DATE_TIME_STAMP` (`device_date_stamp`),
  KEY `EPOCH_TIME_IDX` (`device_epoch_time`)
) ENGINE=InnoDB AUTO_INCREMENT=46259 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `device_master`
--

DROP TABLE IF EXISTS `device_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_master` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(50) NOT NULL,
  `device_type_id` int(10) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `version` text NOT NULL,
  `imei` varchar(15) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `sim_no` varchar(20) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `device_type`
--

DROP TABLE IF EXISTS `device_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_type` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `device_type_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `geo_fence`
--

DROP TABLE IF EXISTS `geo_fence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geo_fence` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `latitude` decimal(9,7) NOT NULL,
  `longitude` decimal(9,7) NOT NULL,
  `radius` decimal(9,1) NOT NULL DEFAULT '0.5',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `geo_fence1`
--

DROP TABLE IF EXISTS `geo_fence1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geo_fence1` (
  `id` int(50) NOT NULL DEFAULT '0',
  `user_account_id` int(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `latitude` decimal(9,7) NOT NULL,
  `longitude` decimal(9,7) NOT NULL,
  `radius` decimal(9,1) NOT NULL DEFAULT '0.5'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `geo_fence_alerts`
--

DROP TABLE IF EXISTS `geo_fence_alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geo_fence_alerts` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `date_stamp` datetime DEFAULT NULL,
  `server_date_stamp` datetime NOT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `location_name` text NOT NULL,
  `status` varchar(5) DEFAULT NULL,
  `alert_dispatch` varchar(2) DEFAULT NULL,
  `trip_index` int(4) DEFAULT NULL,
  `raw_data` text NOT NULL,
  `epoch_time` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `geo_fence_alerts_idX_imei` (`imei`),
  KEY `geo_fence_alerts_idX_DATE_TIME_STAMP` (`date_stamp`)
) ENGINE=MyISAM AUTO_INCREMENT=568 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `geo_fence_alerts1`
--

DROP TABLE IF EXISTS `geo_fence_alerts1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geo_fence_alerts1` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `date_stamp` datetime DEFAULT NULL,
  `server_date_stamp` datetime NOT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `location_name` text NOT NULL,
  `status` varchar(5) DEFAULT NULL,
  `alert_dispatch` varchar(2) DEFAULT NULL,
  `trip_index` int(4) DEFAULT NULL,
  `raw_data` text NOT NULL,
  `epoch_time` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `screens`
--

DROP TABLE IF EXISTS `screens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screens` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `project_id` int(12) NOT NULL,
  `screen_name` varchar(100) NOT NULL,
  `url` varchar(300) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp` (
  `content` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'valid',
  `date_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_account` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'C',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_expiry`
--

DROP TABLE IF EXISTS `user_expiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_expiry` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(10) NOT NULL,
  `license_code` varchar(200) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_master` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(50) NOT NULL,
  `user_type_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) NOT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-15  0:47:56
