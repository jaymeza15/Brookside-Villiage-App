-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 31, 2019 at 07:35 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `brooksidevillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintID` int(10) NOT NULL,
  `senderID` int(8) NOT NULL,
  `sender` varchar(21) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaintID`, `senderID`, `sender`, `subject`, `description`, `status`, `submitDate`) VALUES
(1, 27453209, 'Mike Saxor', 'Heating', 'sdg', 2, '2019-03-10 08:25:53'),
(2, 11176209, 'Stephan Meerman', 'Cooling', 'dddd', 1, '2019-03-11 06:11:18'),
(3, 11176209, 'Stephan Meerman', 'Heating', 'jjjj', 0, '2019-03-12 03:48:36'),
(4, 11176209, 'Stephan Meerman', 'Plumbing', 'jjjjj', 0, '2019-03-12 03:48:46'),
(5, 11176209, 'Stephan Meerman', 'Repairing', 'jjjj', 0, '2019-03-12 03:48:52'),
(6, 18174990, 'jason meza', 'Heating', 'ff', 1, '2019-03-12 04:52:22'),
(7, 18174990, 'jason meza', 'Cooling', 'fff', 0, '2019-03-12 04:52:27'),
(8, 18174990, 'jason meza', 'Plumbing', 'fff', 0, '2019-03-12 04:52:31'),
(9, 18174990, 'jason meza', 'Repairing', 'ffff', 0, '2019-03-12 04:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fineID` int(10) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `state` int(1) NOT NULL,
  `tenantID` int(8) NOT NULL,
  `employeeID` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(10) NOT NULL,
  `senderID` int(8) NOT NULL,
  `sender` varchar(21) NOT NULL,
  `targetID` int(8) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `senderID`, `sender`, `targetID`, `subject`, `description`, `status`, `submitDate`) VALUES
(1, 27453209, 'Mike Saxor', 18174990, 'yooo', 'whats good', 0, '2019-03-12 05:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requestID` int(10) NOT NULL,
  `tenantID` int(8) NOT NULL,
  `tenantName` varchar(21) NOT NULL,
  `priority` int(2) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  `compDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requestID`, `tenantID`, `tenantName`, `priority`, `subject`, `description`, `status`, `submitDate`, `compDate`) VALUES
(1, 11176209, 'Stephan Meerman', 2, 'Heating', 'hahaha', 2, '2019-03-09 09:20:22', NULL),
(2, 11176209, 'Stephan Meerman', 3, 'Heating', 'dfdffd', 2, '2019-03-11 06:01:16', NULL),
(3, 11176209, 'Stephan Meerman', 5, 'Plumbing', 'vds', 2, '2019-03-11 06:01:26', NULL),
(4, 11176209, 'Stephan Meerman', 7, 'Repairing', 'vvvvv', 1, '2019-03-11 06:01:35', NULL),
(5, 18174990, 'jason meza', 2, 'Cooling', 'kkkk', 1, '2019-03-12 04:45:11', NULL),
(6, 18174990, 'jason meza', 5, 'Heating', 'ddd', 0, '2019-03-12 04:46:15', NULL),
(7, 18174990, 'jason meza', 6, 'Plumbing', 'ddd', 0, '2019-03-12 04:46:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskID` int(8) NOT NULL,
  `creatorID` int(8) NOT NULL,
  `fullName` varchar(21) NOT NULL,
  `priority` int(2) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL,
  `compDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `creatorID`, `fullName`, `priority`, `subject`, `description`, `status`, `submitDate`, `compDate`) VALUES
(1, 11176209, 'Stephan Meerman', 10, 'Heating', 'NEED HEATING', 2, '2019-03-09 20:48:26', NULL),
(3, 11176209, 'Stephan Meerman', 2, 'Plumbing', 'ggg]]\\\\', 2, '2019-03-11 05:52:11', NULL),
(4, 11176209, 'Stephan Meerman', 5, 'Repairing', 'gggffd', 1, '2019-03-11 05:52:21', NULL),
(5, 18174990, 'jason meza', 4, 'Heating', 'xxxx', 2, '2019-03-11 06:20:43', NULL),
(6, 18174990, 'jason meza', 6, 'Cooling', 'xzxxz', 1, '2019-03-11 06:20:51', NULL),
(7, 18174990, 'jason meza', 8, 'Plumbing', 'dsfzxxz', 3, '2019-03-11 06:20:59', NULL),
(8, 11176209, 'Stephan Meerman', 1, 'Plumbing', 'kkkkk', 2, '2019-03-12 02:54:31', NULL),
(9, 11176209, 'Stephan Meerman', 5, 'Heating', 'kihihljkbn', 1, '2019-03-12 02:54:46', NULL),
(10, 27453209, 'Mike Saxor', 4, 'Heating', 'sfa', 3, '2019-03-12 04:18:59', NULL),
(11, 27453209, 'Mike Saxor', 6, 'Cooling', 'llll', 1, '2019-03-12 04:21:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `room` varchar(3) NOT NULL
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

CREATE TABLE `vehicles` (
  `vehicleID` int(10) NOT NULL,
  `userID` int(8) NOT NULL,
  `Owner` varchar(21) NOT NULL,
  `Make` varchar(10) NOT NULL,
  `Model` varchar(10) NOT NULL,
  `Year` int(4) NOT NULL,
  `License` varchar(8) NOT NULL,
  `Status` int(1) NOT NULL,
  `submitDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleID`, `userID`, `Owner`, `Make`, `Model`, `Year`, `License`, `Status`, `submitDate`) VALUES
(1, 11176209, 'Jason', 'Jeep', 'Wrangler', 2017, 'hmv2310', 0, '2019-03-09 22:01:57'),
(2, 11176209, 'David', 'Honda', 'CRX', 2012, 'ght2345', 0, '2019-03-11 06:18:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`fineID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `fineID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `requestID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicleID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;