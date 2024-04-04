-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 12:38 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `owngalaxy`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` varchar(30) NOT NULL,
  `USER_ID` varchar(30) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` text NOT NULL,
  `number` varchar(10) NOT NULL,
  `certName` text NOT NULL,
  `landType` text NOT NULL,
  `landArea` text NOT NULL,
  `certType` text NOT NULL,
  `msg` text DEFAULT NULL,
  `TXN_AMOUNT` decimal(8,2) NOT NULL,
  `address` text NOT NULL,
  `status` int(2) NOT NULL,
  `orderDate` date NOT NULL,
  `transaction` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `USER_ID`, `name`, `email`, `number`, `certName`, `landType`, `landArea`, `certType`, `msg`, `TXN_AMOUNT`, `address`, `status`, `orderDate`, `transaction`) VALUES
('ORD35772302', '11', 'Demo User', 'demouser@gmail.com', '9876543212', 'Random Name', 'ORIANTALE', '1 acre', 'custom1', 'Hey', '3500.00', 'Lado Apartment, Jawahar Nagar, Raipur (492001), Chhattisgarh', 11, '2020-09-09', 1),
('ORD35772645', '11', 'Demo User', 'demouser@gmail.com', '9876543212', 'Random Name', 'BAY OF RAINBOW', '3 acre', 'custom2', 'Cannot be more grateful, congratulations !', '6500.00', 'Sadar Bazar, Nagpur, Maharashtra', 0, '2020-09-22', 0),
('ORD97395204', '11', 'Demo User', 'demouser@gmail.com', '6654862312', 'Demo User1, Demo User2, Demo User3', 'BAY OF RAINBOW,SEA OF TRANQUILITY,SEA OF TRANQUILITY', '1 acre,1 acre,3 acre', 'certificate1,certificate1,certificate1', 'fdsfeds, vb gvxcv,vfdsref', '15498.00', 'Jawahar Nagar Rajkot Rajasthan 664548', 0, '2020-10-07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
