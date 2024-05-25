-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2023 at 02:32 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20734168_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `temp_pass` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `position`, `temp_pass`, `status`) VALUES
(1, 'admin', 'admin', 'Elvira', 'admin', '', ''),
(12, 'employee1', 'walliegaynor', 'Wally Gaynor', 'cashier', 'aedzq@3Q', 'TEMPORARY'),
(14, 'wallie123', 'walliegaynor', 'Wallie123', 'cashier', '', 'PERMANENT'),
(17, 'Tabiano123', '', 'Mikaela Tabiano', 'cashier', '#YY8w3oZ', 'TEMPORARY');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `current_stocks` int(50) NOT NULL,
  `max_stocks` int(50) NOT NULL,
  `expiration` date NOT NULL,
  `supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `prod_name`, `description`, `category`, `price`, `unit`, `current_stocks`, `max_stocks`, `expiration`, `supplier`) VALUES
(135, '750515030152', 'SkyFlakes', 'Garlic', 'Snacks', 15.00, 'Per Piece', 45, 50, '2023-12-12', ''),
(137, '1234', 'Wally Boy', 'Wally Boy', 'Frozen Food', 100.00, 'Per Piece', 20, 20, '2023-05-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(20) NOT NULL,
  `transaction_no` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `cashier_name` varchar(50) NOT NULL,
  `total_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_no`, `date`, `cashier_name`, `total_price`) VALUES
(122, '12811-4332', '2022-12-08', 'Admin', '9.50'),
(123, '12910-1950', '2019-12-09', 'Admin', '19.00'),
(124, '10910-2556', '2023-10-09', 'Admin', '9.50'),
(125, '121213-125', '2022-12-12', 'Admin', '9.50'),
(126, '121612-246', '2022-12-16', 'Wally Gaynor', '9.50'),
(127, '121817-4959', '2022-12-18', 'Admin', '9.50'),
(128, '-------', '2022-12-18', 'Admin', '0.00'),
(129, '-------', '2022-12-18', 'Admin', '0.00'),
(130, '121817-5133', '2022-12-18', 'Admin', '9.50'),
(131, '121818-1927', '2022-12-18', 'Admin', '10.00'),
(132, '51110-536', '2023-05-11', 'Admin', '20.00'),
(133, '51613-292', '2023-05-16', 'Admin', '10.00'),
(134, '51620-107', '2023-05-16', 'Admin', '15.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
