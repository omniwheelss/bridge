-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2011 at 09:18 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `GPS`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACCOUNT`
--

DROP TABLE IF EXISTS `ACCOUNT`;
CREATE TABLE IF NOT EXISTS `ACCOUNT` (
  `Account_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Account_Name` varchar(255) DEFAULT NULL,
  `Account_Address` varchar(255) DEFAULT NULL,
  `Account_Phone` varchar(255) DEFAULT NULL,
  `Account_Fax` varchar(255) DEFAULT NULL,
  `Primary_Contact` varchar(255) DEFAULT NULL,
  `Primary_Contact_Phone` varchar(255) DEFAULT NULL,
  `Primary_Contact_Email` varchar(255) DEFAULT NULL,
  `Banner_URL` varchar(100) NOT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `API_Key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Account_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=86 ;


-- --------------------------------------------------------

--
-- Table structure for table `ACCOUNT_FEATURE`
--

DROP TABLE IF EXISTS `ACCOUNT_FEATURE`;
CREATE TABLE IF NOT EXISTS `ACCOUNT_FEATURE` (
  `Account_ID` int(10) DEFAULT NULL,
  `Feature_Index` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `DEVICE_DATA`
--

DROP TABLE IF EXISTS `DEVICE_DATA`;
CREATE TABLE IF NOT EXISTS `DEVICE_DATA` (
  `Record_Index` int(40) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Latitude` decimal(12,6) DEFAULT NULL,
  `Longitude` decimal(12,6) DEFAULT NULL,
  `Date_Stamp` varchar(20) DEFAULT NULL,
  `Server_Date_Stamp` varchar(20) DEFAULT NULL,
  `Altitude` varchar(10) DEFAULT NULL,
  `Speed` varchar(10) DEFAULT NULL,
  `IGN` varchar(10) DEFAULT NULL,
  `Location_Summary` varchar(255) DEFAULT NULL,
  `Raw_Data` text,
  `Epoch_Time` int(4) DEFAULT NULL,
  PRIMARY KEY (`Record_Index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5034 ;


-- --------------------------------------------------------

--
-- Table structure for table `DEVICE_DATA_TEST`
--

DROP TABLE IF EXISTS `DEVICE_DATA_TEST`;
CREATE TABLE IF NOT EXISTS `DEVICE_DATA_TEST` (
  `Record_Index` int(40) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Latitude` decimal(12,6) DEFAULT NULL,
  `Longitude` decimal(12,6) DEFAULT NULL,
  `Date_Stamp` varchar(20) DEFAULT NULL,
  `Server_Date_Stamp` varchar(20) DEFAULT NULL,
  `Altitude` varchar(10) DEFAULT NULL,
  `Speed` varchar(10) DEFAULT NULL,
  `IGN` varchar(10) DEFAULT NULL,
  `Location_Summary` varchar(255) DEFAULT NULL,
  `Raw_Data` text,
  `Epoch_Time` int(4) DEFAULT NULL,
  PRIMARY KEY (`Record_Index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5003 ;


-- --------------------------------------------------------

--
-- Stand-in structure for view `device_data_view`
--
DROP VIEW IF EXISTS `device_data_view`;
CREATE TABLE IF NOT EXISTS `device_data_view` (
`IMEI` varchar(50)
,`Latitude` decimal(12,6)
,`Longitude` decimal(12,6)
,`Date_Stamp` varchar(20)
,`Server_Date_Stamp` varchar(20)
,`Speed` varchar(10)
,`IGN` varchar(10)
,`Location_Summary` varchar(255)
,`Epoch_Time` int(4)
,`Vehicle_No` varchar(100)
);
-- --------------------------------------------------------

--
-- Table structure for table `DEVICE_REGISTER`
--

DROP TABLE IF EXISTS `DEVICE_REGISTER`;
CREATE TABLE IF NOT EXISTS `DEVICE_REGISTER` (
  `Device_Index` int(50) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Device_Type_ID` varchar(50) DEFAULT NULL,
  `SIM_No` varchar(50) DEFAULT NULL,
  `Phone_No` varchar(20) DEFAULT NULL,
  `Asset_No` varchar(20) DEFAULT NULL,
  `Account_ID` int(20) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `GMT_Drift` varchar(10) DEFAULT NULL,
  `Speed_Threshold` varchar(10) DEFAULT NULL,
  `Mileage` varchar(10) DEFAULT '10',
  `Vehicle_No` varchar(100) DEFAULT NULL,
  `Device_ID` varchar(100) DEFAULT NULL,
  `Software_Version` varchar(100) DEFAULT NULL,
  `Hardware_Version` varchar(100) DEFAULT NULL,
  `Logs_Start` int(4) DEFAULT NULL,
  `Logs_End` int(4) DEFAULT NULL,
  `Daily_Reports` varchar(20) DEFAULT NULL,
  `Status` char(2) NOT NULL,
  `Date_Stamp` datetime NOT NULL,
  PRIMARY KEY (`Device_Index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `DEVICE_TYPE`
--

DROP TABLE IF EXISTS `DEVICE_TYPE`;
CREATE TABLE IF NOT EXISTS `DEVICE_TYPE` (
  `Device_Type_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Device_Type` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Device_Type_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `FEATURE_MASTER`
--

DROP TABLE IF EXISTS `FEATURE_MASTER`;
CREATE TABLE IF NOT EXISTS `FEATURE_MASTER` (
  `Feature_Index` int(10) NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) DEFAULT NULL,
  `Feature` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Feature_Index`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `FEATURE_MASTER`
--


-- --------------------------------------------------------

--
-- Table structure for table `LOCATION_MASTER`
--

DROP TABLE IF EXISTS `LOCATION_MASTER`;
CREATE TABLE IF NOT EXISTS `LOCATION_MASTER` (
  `L_ID` int(40) NOT NULL AUTO_INCREMENT,
  `Latitude` varchar(20) NOT NULL,
  `Longitude` varchar(20) NOT NULL,
  `Location_Summary` text NOT NULL,
  `Date_Stamp` datetime NOT NULL,
  `Epoch_Time` varchar(50) NOT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `LOGS`
--

DROP TABLE IF EXISTS `LOGS`;
CREATE TABLE IF NOT EXISTS `LOGS` (
  `Log_Index` int(255) NOT NULL AUTO_INCREMENT,
  `Account_ID` int(20) DEFAULT NULL,
  `Date_Stamp` datetime DEFAULT NULL,
  `Activity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Log_Index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;


-- --------------------------------------------------------

--
-- Table structure for table `MCC_MNC_CODES`
--

DROP TABLE IF EXISTS `MCC_MNC_CODES`;
CREATE TABLE IF NOT EXISTS `MCC_MNC_CODES` (
  `M_ID` int(8) NOT NULL AUTO_INCREMENT,
  `Code` varchar(50) DEFAULT NULL,
  `MNC` varchar(10) DEFAULT NULL,
  `MCC` varchar(10) DEFAULT NULL,
  `Operator` varchar(100) DEFAULT NULL,
  `Circle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`M_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=285 ;


-- --------------------------------------------------------

--
-- Table structure for table `SCHEMA_ERRORS`
--

DROP TABLE IF EXISTS `SCHEMA_ERRORS`;
CREATE TABLE IF NOT EXISTS `SCHEMA_ERRORS` (
  `S_ID` int(40) NOT NULL AUTO_INCREMENT,
  `Filename` varchar(100) DEFAULT NULL,
  `Description` text,
  `Date_Stamp` datetime DEFAULT NULL,
  `Epoch_Time` int(4) NOT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `STARTSTOP_SUMMARY`
--

DROP TABLE IF EXISTS `STARTSTOP_SUMMARY`;
CREATE TABLE IF NOT EXISTS `STARTSTOP_SUMMARY` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;


-- --------------------------------------------------------

--
-- Table structure for table `TEMP`
--

DROP TABLE IF EXISTS `TEMP`;
CREATE TABLE IF NOT EXISTS `TEMP` (
  `Content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `USER_MASTER`
--

DROP TABLE IF EXISTS `USER_MASTER`;
CREATE TABLE IF NOT EXISTS `USER_MASTER` (
  `Account_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `User_Type_ID` varchar(10) NOT NULL,
  `E_Mail` varchar(100) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `GPS` varchar(10) NOT NULL DEFAULT 'Enabled',
  `GPSAdmin` varchar(10) NOT NULL DEFAULT 'Disabled',
  `Parent_ID` int(8) NOT NULL,
  `Valid_Till` date NOT NULL,
  `Date_Stamp` datetime NOT NULL,
  PRIMARY KEY (`Account_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-------------------------------------------------------

--
-- Table structure for table `USER_TYPE`
--

DROP TABLE IF EXISTS `USER_TYPE`;
CREATE TABLE IF NOT EXISTS `USER_TYPE` (
  `User_Type_ID` int(10) NOT NULL AUTO_INCREMENT,
  `User_Type` varchar(255) DEFAULT NULL,
  `User_Type_Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_Type_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;



-- --------------------------------------------------------

--
-- Table structure for table `WTIO_DATA`
--

DROP TABLE IF EXISTS `WTIO_DATA`;
CREATE TABLE IF NOT EXISTS `WTIO_DATA` (
  `Record_Index` int(40) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Date_Stamp` datetime NOT NULL,
  `Server_Date_Stamp` varchar(20) DEFAULT NULL,
  `C1` varchar(10) DEFAULT NULL,
  `C2` varchar(10) DEFAULT NULL,
  `C3` varchar(10) DEFAULT NULL,
  `C4` varchar(10) NOT NULL,
  `C5` varchar(10) NOT NULL,
  `C6` varchar(10) NOT NULL,
  `C7` varchar(10) NOT NULL,
  `C8` varchar(10) NOT NULL,
  `C9` varchar(10) NOT NULL,
  `C10` varchar(10) NOT NULL,
  `C11` varchar(10) NOT NULL,
  `C12` varchar(10) NOT NULL,
  `Raw_Data` text,
  `Epoch_Time` int(4) DEFAULT NULL,
  PRIMARY KEY (`Record_Index`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `WTIO_DATA`
--


-- --------------------------------------------------------

--
-- Table structure for table `WTLOGIN_DATA`
--

DROP TABLE IF EXISTS `WTLOGIN_DATA`;
CREATE TABLE IF NOT EXISTS `WTLOGIN_DATA` (
  `Record_Index` int(40) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Server_Date_Stamp` varchar(20) DEFAULT NULL,
  `C1` varchar(10) DEFAULT NULL,
  `C2` varchar(10) DEFAULT NULL,
  `C3` varchar(10) DEFAULT NULL,
  `Provider` varchar(50) NOT NULL,
  `Raw_Data` text,
  `Epoch_Time` int(4) DEFAULT NULL,
  PRIMARY KEY (`Record_Index`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `WTLOGIN_DATA`
--


-- --------------------------------------------------------

--
-- Table structure for table `WTSYS_DATA`
--

DROP TABLE IF EXISTS `WTSYS_DATA`;
CREATE TABLE IF NOT EXISTS `WTSYS_DATA` (
  `Record_Index` int(40) NOT NULL AUTO_INCREMENT,
  `IMEI` varchar(50) DEFAULT NULL,
  `Date_Stamp` datetime NOT NULL,
  `Server_Date_Stamp` varchar(20) DEFAULT NULL,
  `C1` varchar(10) DEFAULT NULL,
  `C2` varchar(10) DEFAULT NULL,
  `C3` varchar(10) DEFAULT NULL,
  `C4` varchar(10) NOT NULL,
  `C5` varchar(10) NOT NULL,
  `Raw_Data` text,
  `Epoch_Time` int(4) DEFAULT NULL,
  PRIMARY KEY (`Record_Index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure for view `device_data_view`
--
DROP TABLE IF EXISTS `device_data_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gps`.`device_data_view` AS select `A`.`IMEI` AS `IMEI`,`A`.`Latitude` AS `Latitude`,`A`.`Longitude` AS `Longitude`,`A`.`Date_Stamp` AS `Date_Stamp`,`A`.`Server_Date_Stamp` AS `Server_Date_Stamp`,`A`.`Speed` AS `Speed`,`A`.`IGN` AS `IGN`,`A`.`Location_Summary` AS `Location_Summary`,`A`.`Epoch_Time` AS `Epoch_Time`,`B`.`Vehicle_No` AS `Vehicle_No` from (`gps`.`device_data` `A` left join `gps`.`device_register` `B` on((`A`.`IMEI` = `B`.`IMEI`)));
