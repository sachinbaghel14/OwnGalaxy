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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `priviledge` int(1) NOT NULL,
  `user_fname` varchar(16) NOT NULL,
  `user_lname` varchar(16) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_zip` varchar(6) DEFAULT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_gender` varchar(6) DEFAULT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `priviledge`, `user_fname`, `user_lname`, `user_city`, `user_state`, `user_zip`, `user_phone`, `user_gender`, `user_email`, `user_password`) VALUES
(10, 1, 'Admin', 'Administrator', 'New Delhi', 'Delhi', '110011', '9876543210', 'female', 'admin@owngalaxy.in', 'lorem'),
(15, 0, 'Demo', 'User', 'New Delhi', 'Delhi', '110011', '6689752015', 'female', 'demouser@gmail.com', 'qwertykey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQUE` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
