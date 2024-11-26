-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 01:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invmgmtsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `invoiceStaff` int(11) NOT NULL,
  `invoicePDF` text NOT NULL,
  `invoiceDate` int(11) NOT NULL,
  `invoiceCustomer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `invoiceStaff`, `invoicePDF`, `invoiceDate`, `invoiceCustomer`) VALUES
(1, 1, '*PDF Link*', 20400113, 'Charles Horthimer'),
(2, 1, '*PDF Link 2', 20241105, 'Shaun Lockheed'),
(3, 1, '*PDF Link 3', 20241029, 'Martin Brown'),
(4, 2, '*PDF Link 4', 20241031, 'Penelopie White');

-- --------------------------------------------------------

--
-- Table structure for table `job_roles`
--

CREATE TABLE `job_roles` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_roles`
--

INSERT INTO `job_roles` (`job_id`, `job_name`) VALUES
(1, 'Clerk'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `saleshistory`
--

CREATE TABLE `saleshistory` (
  `saleID` int(11) NOT NULL,
  `saleStockID` int(11) NOT NULL,
  `saleCount` int(11) NOT NULL,
  `saleInvoiceID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saleshistory`
--

INSERT INTO `saleshistory` (`saleID`, `saleStockID`, `saleCount`, `saleInvoiceID`) VALUES
(1, 2, 3, 1),
(2, 4, 2, 1),
(3, 5, 1, 2),
(4, 6, 6, 3),
(5, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `personalID` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `permission_level` int(11) NOT NULL,
  `job_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `personalID`, `first_name`, `surname`, `password`, `dob`, `email`, `permission_level`, `job_role`) VALUES
(1, 0, 'test', 'test', '$2y$10$2jpbAyUiNRFd0PPUbEX0EO8H3dJvFnW8KCgKn1terXzTN.j5WtxHW', '2024-11-13', 'Test@test.com', 1, 'Clerk'),
(3, 0, 'test', 'test', '$2y$10$7k3dTAKPhElm8xwnVnLseOFWCSwablZgv1uHxoCjDemAwXrt2CL4i', '0000-00-00', 'Test@test.co', 1, 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int(11) NOT NULL,
  `stockName` text NOT NULL,
  `stockCount` int(11) NOT NULL,
  `stockType` text NOT NULL,
  `stockPrice` float NOT NULL,
  `stockBrand` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand`) VALUES
(1, 'Gaming headset', 300, 'Headset', 31.99, 'Corsair'),
(2, 'RGB keyboard', 100, 'Keyboard', 17.5, 'Corsair'),
(3, '52 inch, 4k monitor', 20, 'Monitor', 95.99, 'ASUS'),
(4, '45 inch 1080p monitor', 700, 'Monitor', 72.99, 'HP'),
(5, 'Wireless optical gaming mouse', 36, 'Mouse', 16.5, 'ASUS'),
(6, 'Wired gaming mouse', 39, 'Mouse', 25.99, 'Logitech'),
(7, 'Precision wireless mouse', 7, 'Mouse', 20.5, 'Logitech'),
(8, 'Dual wired speakers', 10, 'Speakers', 10.99, 'Bose'),
(9, '1M single speaker', 400, 'Speakers', 35.99, 'JBL'),
(10, 'Wired studio microphone with muffler', 24, 'Microphone', 29.99, 'Rode');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `job_roles`
--
ALTER TABLE `job_roles`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `saleshistory`
--
ALTER TABLE `saleshistory`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_roles`
--
ALTER TABLE `job_roles`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saleshistory`
--
ALTER TABLE `saleshistory`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
