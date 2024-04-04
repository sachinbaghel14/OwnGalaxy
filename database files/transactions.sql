-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 12:39 AM
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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sr_id` int(7) NOT NULL,
  `order_id` varchar(16) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `txn_amt` decimal(7,2) NOT NULL,
  `pay_mode` varchar(24) NOT NULL,
  `txn_date` varchar(64) NOT NULL,
  `txn_status` varchar(64) NOT NULL,
  `gateway` varchar(24) NOT NULL,
  `bank_txn` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sr_id`, `order_id`, `txn_id`, `txn_amt`, `pay_mode`, `txn_date`, `txn_status`, `gateway`, `bank_txn`) VALUES
(17, 'ORD61147492', '20200825111212800110168437901830004', '3500.00', 'NB', '2020-08-25 01:41:18.0', 'TXN_SUCCESS', 'HDFC', '15404916925'),
(29, 'ORD46332045', '20200825111212800110168082902898009', '3499.00', 'NB', '2020-08-25 17:43:58.0', 'TXN_SUCCESS', 'SBI', '18810069487'),
(40, 'ORD74691703', '20201008111212800110168446901959772', '10999.00', 'NB', '2020-10-08 03:44:52.0', 'TXN_SUCCESS', 'ICICI', '11698210254'),
(41, 'ORD71325406', '20201008111212800110168154401983454', '10999.00', 'NB', '2020-10-08 03:53:32.0', 'TXN_SUCCESS', 'SBI', '10679569718');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sr_id`),
  ADD UNIQUE KEY `UNIQUE` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sr_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
