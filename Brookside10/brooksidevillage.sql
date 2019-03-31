-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2019 at 03:09 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brooksidevillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `complaintID` int(10) NOT NULL AUTO_INCREMENT,
  `senderID` int(8) NOT NULL,
  `sender` varchar(21) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  PRIMARY KEY (`complaintID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaintID`, `senderID`, `sender`, `subject`, `description`, `status`, `submitDate`) VALUES
(1, 27453209, 'Mike Saxor', 'Heating', 'sdg', 0, '2019-03-10 08:25:53'),
(2, 11176209, 'Stephan Meerman', 'Cooling', 'dddd', 0, '2019-03-11 06:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

DROP TABLE IF EXISTS `fines`;
CREATE TABLE IF NOT EXISTS `fines` (
  `fineID` int(10) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `state` int(1) NOT NULL,
  `tenantID` int(8) NOT NULL,
  `employeeID` int(8) NOT NULL,
  PRIMARY KEY (`fineID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(10) NOT NULL AUTO_INCREMENT,
  `senderID` int(8) NOT NULL,
  `sender` varchar(21) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `requestID` int(10) NOT NULL AUTO_INCREMENT,
  `tenantID` int(8) NOT NULL,
  `tenantName` varchar(21) NOT NULL,
  `priority` int(2) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  `compDate` datetime DEFAULT NULL,
  PRIMARY KEY (`requestID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requestID`, `tenantID`, `tenantName`, `priority`, `subject`, `description`, `status`, `submitDate`, `compDate`) VALUES
(1, 11176209, 'Stephan Meerman', 2, 'Heating', 'hahaha', 0, '2019-03-09 09:20:22', NULL),
(2, 11176209, 'Stephan Meerman', 3, 'Heating', 'dfdffd', 0, '2019-03-11 06:01:16', NULL),
(3, 11176209, 'Stephan Meerman', 5, 'Plumbing', 'vds', 0, '2019-03-11 06:01:26', NULL),
(4, 11176209, 'Stephan Meerman', 7, 'Repairing', 'vvvvv', 0, '2019-03-11 06:01:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `taskID` int(8) NOT NULL AUTO_INCREMENT,
  `creatorID` int(8) NOT NULL,
  `fullName` varchar(21) NOT NULL,
  `priority` int(2) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  `compDate` datetime DEFAULT NULL,
  PRIMARY KEY (`taskID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `creatorID`, `fullName`, `priority`, `subject`, `description`, `status`, `submitDate`, `compDate`) VALUES
(1, 11176209, 'Stephan Meerman', 10, 'Heating', 'NEED HEATING', 0, '2019-03-09 20:48:26', NULL),
(2, 11176209, 'Stephan Meerman', 3, 'Cooling', 'ggg', 0, '2019-03-11 05:51:56', NULL),
(3, 11176209, 'Stephan Meerman', 2, 'Plumbing', 'ggg]]\\\\', 0, '2019-03-11 05:52:11', NULL),
(4, 11176209, 'Stephan Meerman', 5, 'Repairing', 'gggffd', 0, '2019-03-11 05:52:21', NULL),
(5, 18174990, 'jason meza', 4, 'Heating', 'xxxx', 0, '2019-03-11 06:20:43', NULL),
(6, 18174990, 'jason meza', 6, 'Cooling', 'xzxxz', 0, '2019-03-11 06:20:51', NULL),
(7, 18174990, 'jason meza', 8, 'Plumbing', 'dsfzxxz', 0, '2019-03-11 06:20:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `room` varchar(3) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `usertype`, `firstname`, `lastname`, `birthday`, `room`) VALUES
(40000000, 'admin', 'root', 'admin', 'admin', 'admin', '2019-01-01', '000'),
(18174990, 'BestTenant', 'pass', 'Tenant', 'jason', 'meza', '2019-03-01', '222'),
(11176209, 'tt', 'aa', 'Tenant', 'Stephan', 'Meerman', '2019-03-01', '123'),
(27453209, 'Manager100', 'pass', 'Manager', 'Mike', 'Saxor', '2019-03-01', '666'),
(32554025, 'Board007', 'pass', 'Board', 'David', 'Abreu', '2019-03-01', '999');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicleID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(8) NOT NULL,
  `Owner` varchar(21) NOT NULL,
  `Make` varchar(10) NOT NULL,
  `Model` varchar(10) NOT NULL,
  `Year` int(4) NOT NULL,
  `License` varchar(8) NOT NULL,
  `Status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  PRIMARY KEY (`vehicleID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleID`, `userID`, `Owner`, `Make`, `Model`, `Year`, `License`, `Status`, `submitDate`) VALUES
(1, 11176209, 'Jason', 'Jeep', 'Wrangler', 2017, 'hmv2310', 0, '2019-03-09 22:01:57'),
(2, 11176209, 'David', 'Honda', 'CRX', 2012, 'ght2345', 0, '2019-03-11 06:18:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
