-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2023 at 12:01 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `merchantID` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `merchant_logo` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `tour_type` enum('Asia','Europe','North America') NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`merchantID`, `username`, `merchant_logo`, `id`, `tour_type`, `name`, `location`, `price`, `description`, `image`) VALUES
('M505933160', 'Parlo Tours', 'uploads/logo-og.png', 1, 'Asia', 'Your Journey to the Land of the Rising Sun!', 'Japan', 360.00, ' Embark on an unforgettable adventure to Japan with our exclusive \"Japan Unveiled\" package tour. \r\nDive into the mesmerizing world of the Land of the Rising Sun, where ancient traditions coexist with modern marvels. \r\n                          This meticulously crafted tour invites you to explore the very essence of Japan.', '46829photo-1627052862140-069bd225b3b2.jpeg'),
('M505933160', 'Parlo Tours', 'uploads/logo-og.png', 2, 'Asia', 'Your Passage to a Land of Diversity and Splendor!', 'India', 600.00, 'Prepare to be enchanted by the myriad colors, cultures, and landscapes of India with our \"Incredible India\" package tour. \r\n                          This immersive journey invites you to explore the captivating tapestry of the Indian subcontinent, \r\n                          where ancient traditions seamlessly blend with modern wonders.', '56791photo-1696887484490-715e7eb0e682.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchantID` (`merchantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
