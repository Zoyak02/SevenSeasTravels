-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2023 at 04:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `user_type`) VALUES
('admn210', '$2y$10$YVXyB1DTGNkYz7v015.knu5Qc/DTQslQNWQO0qu7g0Pwjpszf4qb.', 'admin'),
('crud', '$2y$10$AdlDT16Ktn2haWLDb94ykuZP/w7tInuxgzSN1Oj6N4TUDveCqC13G', 'merchant'),
('hi', '$2y$10$SLpRSQlEtaAhuTaVjn30XOAO5mlHPkst4W8HBGkBUrPZAkmEqcRK.', 'user'),
('Parlo Tours', '$2y$10$34oo7KTIoEpdIra.gtcGteRyKMmznvGX9IrDppKBS3ab1QJO.U/WS', 'merchant'),
('perto', '$2y$10$.m27k9gBdOo.DqPbvIw4keCWNrJyOJevDFQr09zIPPx34CjfOUqpi', 'merchant'),
('Star Travels', NULL, 'merchant'),
('tourismOfficer210', '$2y$10$XzvWuzIMtRbXenoYrCisqun0WTMrKpPpo44qWcAEqxYdIDeuiX45u', 'tourism_officer'),
('Zoya', '$2y$10$.T0x9/6k4i8KqQMDNjwqWOJrpUNRfOKAwjCDulEqTOx1PVMI0QCK.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `user_type`) VALUES
('A12345', 'admn210', '$2y$10$YVXyB1DTGNkYz7v015.knu5Qc/DTQslQNWQO0qu7g0Pwjpszf4qb.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchantID` char(11) NOT NULL,
  `first_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL DEFAULT 'merchant',
  `email` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchantID`, `first_login`, `username`, `password`, `user_type`, `email`, `number`, `description`, `logo`, `document`, `status`) VALUES
('M103089407', 0, 'crud', '$2y$10$AdlDT16Ktn2haWLDb94ykuZP/w7tInuxgzSN1Oj6N4TUDveCqC13G', 'merchant', 'crud@gmail.com', 23456756, 'crud', 'uploads/8a2ba667-413c-4287-affe-5c2836e784ac.jpg', '', 'APPROVED'),
('M407423370', 0, 'perto', '$2y$10$.m27k9gBdOo.DqPbvIw4keCWNrJyOJevDFQr09zIPPx34CjfOUqpi', 'merchant', 'perto@gmail.com', 3456738, 'perto', '', '', 'PENDING'),
('M505933160', 0, 'Parlo Tours', '$2y$10$34oo7KTIoEpdIra.gtcGteRyKMmznvGX9IrDppKBS3ab1QJO.U/WS', 'merchant', 'parlo@gmail.com', 46699380, 'parlo', 'uploads/logo-og.png', '', 'PENDING'),
('M736351602', 1, 'Star Travels', NULL, 'merchant', 'startravel@gmail.com', 32436783, 'Star Travel Malaysia is your gateway to unparalleled travel experiences in the heart of Southeast Asia. We specialize in curating celestial journeys, offering a blend of exceptional destinations, seamless service, and unforgettable adventures.', 'uploads/m-s-star-travel-agencies-profile.jpg', 'uploads/8a2ba667-413c-4287-affe-5c2836e784ac.jpg', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policyID` int(11) NOT NULL,
  `policyDescription` text NOT NULL,
  `aboutUsDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policyID`, `policyDescription`, `aboutUsDescription`) VALUES
(1, '\n    <h1>Privacy Policy for Seven Seas Travel</h1> <br>\n    <p>Last Updated: 10th November ,2023 </p> <br>\n    <p>Welcome to Seven Seas Travel (\"us\", \"we\", or \"our\"). This page informs you of our policies regarding the collection, use, and disclosure of Personal Information we receive from users of the Site.</p> <br>\n    <h2>Information Collection and Use</h2>\n    <p>While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally, identifiable information may include but is not limited to your name, email address, phone number, and postal address (\"Personal Information\").</p> <br>\n    <h2>Log Data</h2>\n    <p>Like many site operators, we collect information that your browser sends whenever you visit our Site (\"Log Data\"). This Log Data may include information such as your computer\'s Internet Protocol (\"IP\") address, browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p><br>\n\n    <h2>Cookies</h2>\n    <p>Cookies are files with a small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer\'s hard drive. Like many sites, we use \"cookies\" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Site.</p><br>\n\n    <h2>Security</h2>\n    <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p><br>\n\n    <h2>Changes to This Privacy Policy</h2>\n    <p>This Privacy Policy is effective as of [Date] and will remain in effect except concerning any changes in its provisions in the future, which will be in effect immediately after being posted on this page. We reserve the right to update or change our Privacy Policy at any time, and you should check this Privacy Policy periodically. Your continued use of the Service after we post any modifications to the Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Privacy Policy.</p><br>\n\n    <h2>Contact Us</h2>\n    <p>If you have any questions about this Privacy Policy, please contact us.</p>', 'This is Seven Seas Travel Managment Console');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_officer`
--

CREATE TABLE `tourism_officer` (
  `officerID` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism_officer`
--

INSERT INTO `tourism_officer` (`officerID`, `username`, `password`, `user_type`) VALUES
('O12345', 'tourismOfficer210', 'tourismOfficer210', 'tourism_officer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `user_type`, `email`) VALUES
('U1', 'hi', '$2y$10$SLpRSQlEtaAhuTaVjn30XOAO5mlHPkst4W8HBGkBUrPZAkmEqcRK.', 'user', 'hi@gmail.com'),
('U2', 'Zoya', '$2y$10$.T0x9/6k4i8KqQMDNjwqWOJrpUNRfOKAwjCDulEqTOx1PVMI0QCK.', 'user', 'Zoya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchantID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policyID`);

--
-- Indexes for table `tourism_officer`
--
ALTER TABLE `tourism_officer`
  ADD PRIMARY KEY (`officerID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `merchant_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `tourism_officer`
--
ALTER TABLE `tourism_officer`
  ADD CONSTRAINT `tourism_officer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
