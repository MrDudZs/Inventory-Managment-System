-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2024 at 08:10 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

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

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceID` int NOT NULL AUTO_INCREMENT,
  `invoiceStaff` int NOT NULL,
  `invoicePDF` text NOT NULL,
  `invoiceDate` int NOT NULL,
  `invoiceCustomer` text NOT NULL,
  PRIMARY KEY (`invoiceID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `saleshistory`
--

DROP TABLE IF EXISTS `saleshistory`;
CREATE TABLE IF NOT EXISTS `saleshistory` (
  `saleID` int NOT NULL AUTO_INCREMENT,
  `saleStockID` int NOT NULL,
  `saleCount` int NOT NULL,
  `saleInvoiceID` int NOT NULL,
  PRIMARY KEY (`saleID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` int NOT NULL,
  `personalID` int NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `permission_level` int NOT NULL,
  `job_role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`staffID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `personalID`, `first_name`, `surname`, `password`, `dob`, `email`, `permission_level`, `job_role`) VALUES
(0, 0, 'Admin', 'Me', '$2y$10$VRwWii6TpuLZXrKpYIoUHOMkHc/1lTSxGxek3zFM9IhblOnBMIfWu', NULL, '^UltraAdmin@INVMGMTSYS.com', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stockID` int NOT NULL AUTO_INCREMENT,
  `stockName` text NOT NULL,
  `stockCount` int NOT NULL,
  `stockType` text NOT NULL,
  `stockPrice` float NOT NULL,
  `stockBrand` text NOT NULL,
  PRIMARY KEY (`stockID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand`) VALUES
(1, 'Gaming headset', 3, 'Headset', 31.99, 'Corsair'),
(2, 'RGB keyboard', 42, 'Keyboard', 17.5, 'Corsair'),
(3, '52 inch, 4k monitor', 20, 'Monitor', 95.99, 'ASUS'),
(4, '45 inch 1080p monitor', 7, 'Monitor', 72.99, 'HP'),
(5, 'Wireless optical gaming mouse', 36, 'Mouse', 16.5, 'ASUS'),
(6, 'Wired gaming mouse', 39, 'Mouse', 25.99, 'Logitech'),
(7, 'Precision wireless mouse', 17, 'Mouse', 20.5, 'Logitech'),
(8, 'Dual wired speakers', 14, 'Speakers', 10.99, 'Bose'),
(9, '1M single speaker', 4, 'Speakers', 35.99, 'JBL'),
(10, 'Wired studio microphone with muffler', 24, 'Microphone', 29.99, 'Rode');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
