-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2023 at 12:00 PM
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
-- Database: `bookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `orderID` char(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `idNo` varchar(50) NOT NULL,
  `guests` int(10) NOT NULL,
  `tour_type` char(10) NOT NULL,
  `tour_location` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `star_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`orderID`, `userID`, `username`, `firstName`, `lastName`, `phoneNo`, `idNo`, `guests`, `tour_type`, `tour_location`, `product_name`, `product_price`, `total_amount`, `review`, `star_rating`) VALUES
('OD102486664', 'U1', 'hi', 'he', 'he', 1234567890, 'h123456789', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, 'dddee', 3),
('OD221620067', 'U1', 'hi', 'ffrr', 'ffrr', 12345678, 'g2345678', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.00, NULL, NULL),
('OD234363699', 'U1', 'hi', 'zoa', 'zoa', 12345678, 'h12345678', 2, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1272.00, 'Love it ', 5),
('OD236370439', 'U1', 'hi', 'ss', 'ss', 12345678, 'ss1234567', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, NULL, NULL),
('OD256878584', 'U1', 'hi', 'ss', 'ss', 1234567, 'g12345678', 3, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1908.00, NULL, NULL),
('OD313823638', 'U1', 'hi', 'chea wan xin', 'cheah wan xin', 12345667, 'd123456789', 8, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 5088.00, 'Greattttttt', 5),
('OD333998060', 'U1', 'hi', 'yyy', 'yy', 98765432, 'y8765432', 5, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1908.00, NULL, NULL),
('OD377933998', 'U1', 'hi', 'hh', 'hh', 12345678, 'h123456789', 6, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 2290.00, NULL, NULL),
('OD447207659', 'U1', 'hi', 'hello', 'hello', 98765432, 'dd98765432', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.00, 'Lovely ', 4),
('OD464247762', 'U1', 'hi', 'han', 'han', 87654321, 'han123456', 1, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 382.00, 'Great', 2),
('OD552151042', 'U1', 'hi', 'sss', 's', 12345678, 'd12345', 3, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1145.00, NULL, NULL),
('OD624191026', 'U1', 'hi', 'hh', 'hh', 2345678, 'a1234567890', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, 'yooo', 3),
('OD692051716', 'U1', 'hi', 'heel', 'heel', 98765432, 'g098765432', 3, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1908.00, NULL, NULL),
('OD769048341', 'U1', 'hi', 'hh', 'hh', 1234567890, 'g123456789', 3, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1908.00, 'wowwwwwwwww ', 5),
('OD77745564', 'U1', 'hi', 'hh', 'hh', 2345678, 'a1234567890', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, 'greatttt', 4),
('OD998172383', 'U1', 'hi', 'bb', 'bb', 7865432, 'b8765432', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `orderID` char(11) NOT NULL,
  `tour_type` varchar(10) NOT NULL,
  `tour_location` varchar(20) NOT NULL,
  `guests` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `bookingRefNo` int(6) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `paymentStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`orderID`, `tour_type`, `tour_location`, `guests`, `firstName`, `lastName`, `total_amount`, `bookingRefNo`, `paymentMethod`, `paymentStatus`) VALUES
('OD320522258', 'Asia', 'Japan', 4, 'han', 'han', 1526.00, 579277418, 'CARD', 'PAID'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 729401895, 'CARD', 'SUCCESS'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 123721159, 'CARD', 'SUCCESS'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 597202934, 'CARD', 'SUCCESS'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 288505646, 'CARD', 'SUCCESS'),
('OD234363699', 'Asia', 'India', 2, 'zoa', 'zoa', 1272.00, 901761341, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 822202078, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 146167092, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 817642649, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 498922699, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 316647975, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 118439795, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 320789373, 'CARD', 'SUCCESS'),
('OD77745564', 'Asia', 'Japan', 2, 'hh', 'hh', 763.00, 232035085, 'CARD', 'SUCCESS'),
('OD769048341', 'Asia', 'India', 3, 'hh', 'hh', 1908.00, 34675937, 'CARD', 'SUCCESS'),
('OD692051716', 'Asia', 'India', 3, 'heel', 'heel', 1908.00, 872748191, 'CARD', 'SUCCESS'),
('OD377933998', 'Asia', 'Japan', 6, 'hh', 'hh', 2290.00, 87086010, 'CARD', 'SUCCESS'),
('OD313823638', 'Asia', 'India', 8, 'chea wan xin', 'cheah wan xin', 5088.00, 959841970, 'CARD', 'SUCCESS'),
('OD221620067', 'Asia', 'Japan', 4, 'ffrr', 'ffrr', 1526.00, 739459346, 'CARD', 'SUCCESS'),
('OD998172383', 'Asia', 'Japan', 4, 'bb', 'bb', 1526.00, 596551422, 'CARD', 'SUCCESS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`username`) REFERENCES `login`.`user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
