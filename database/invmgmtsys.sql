-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 03:11 PM
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
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `invoiceStaff` int(11) NOT NULL,
  `invoicePDF` blob DEFAULT NULL,
  `invoiceDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `invoiceStaff`, `invoicePDF`, `invoiceDate`) VALUES
(1, 1, 0x2a504446204c696e6b2a, '2040-01-13'),
(2, 1, 0x2a504446204c696e6b2032, '2024-11-05'),
(3, 1, 0x2a504446204c696e6b2033, '2024-10-29'),
(4, 1, 0x2a504446204c696e6b2034, '2024-10-31'),
(5, 9, 0x433a5c78616d70705c746d705c706870453643432e746d70, '2024-12-31'),
(6, 9, 0x433a5c78616d70705c746d705c706870394242462e746d70, '2024-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_06_105124_add_permission_level_to_users_table', 2),
(5, '2024_12_06_131650_create_roles_table', 3),
(6, '2024_12_06_135503_update_users_table', 4),
(7, '2024_12_22_120054_drop_name_from_users_table', 5),
(8, '2024_12_29_031252_add_location_to_users_table', 6),
(9, '2024_12_29_031846_create_store_and_warehouses_table', 7),
(10, '2025_01_01_180230_stock_reports', 8),
(11, '2025_01_01_181601_stock_reports', 9),
(12, '2025_01_01_181644_stock_reports', 10),
(13, '2025_01_01_182543_sales_avg_report', 11),
(14, '2025_01_04_015645_update_stock_reports_table', 12),
(15, '2025_01_04_030016_drop_stock_reports_table', 13),
(16, '2025_01_04_030047_create_stock_reports_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('Test@test.com', '$2y$12$H6Juuu5hcQETk8V8PPv8tOhdv77NlAOxmgR/3YO5yvNaChhkLOvPK', '2024-12-22 12:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'clerk', '2024-12-06 13:25:12', '2024-12-06 13:25:12'),
(2, 'admin', '2024-12-06 13:25:12', '2024-12-06 13:25:12');

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
-- Table structure for table `sales_avg_report`
--

CREATE TABLE `sales_avg_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_generated` date NOT NULL,
  `generation_time` time NOT NULL,
  `total_avg_levels` varchar(255) NOT NULL,
  `total_avg_sales` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_avg_report`
--

INSERT INTO `sales_avg_report` (`id`, `report_generated`, `generation_time`, `total_avg_levels`, `total_avg_sales`) VALUES
(1, '2025-01-04', '04:21:02', '81.8', '116.9'),
(2, '2025-01-05', '16:57:17', '311.6', '116.9'),
(3, '2025-01-05', '17:03:02', '311.6', '116.9');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2AFYevulY0jISqVC2gDQNVj4DxCeivzLLHzUSK0n', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVHY3V3BJN2p1eFRlYVRwYlNLZkxSdDhTeWUxVzRzQ2hsbFI2UERxbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluLWRhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZ2V0LWJyYW5kcz90eXBlPUhlYWRzZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O3M6MTA6InVzZXJfZW1haWwiO3M6MTY6IkR1ZGxleS5NQElNUy5jb20iO30=', 1736134769),
('SN16FVSMTYL7eERPf6kii3UmKZ5HS8cvK8qLy9eX', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiN09aSVZob05MM25JUWdyQ0RXNTdZd3BPa096OURJQmQ0SUJkYjV2biI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluLWRhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2FsZXMtZGF0YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7czoxMDoidXNlcl9lbWFpbCI7czoxNjoiRHVkbGV5Lk1ASU1TLmNvbSI7fQ==', 1736169960);

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
  `stockBrand` text NOT NULL,
  `stockSold` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand`, `stockSold`) VALUES
(1, 'Gaming headset', 1654, 'Headset', 31.99, 'Corsair', 400),
(2, 'RGB keyboard', 96, 'Keyboard', 17.5, 'Corsair', 100),
(3, '52 inch, 4k monitor', 19, 'Monitor', 95.99, 'ASUS', 50),
(4, '45 inch 1080p monitor', 700, 'Monitor', 72.99, 'HP', 50),
(5, 'Wireless optical gaming mouse', 31, 'Mouse', 16.5, 'ASUS', 60),
(6, 'Wired gaming mouse', 39, 'Mouse', 25.99, 'Logitech', 15),
(7, 'Precision wireless mouse', 7, 'Mouse', 20.5, 'Logitech', 10),
(8, 'Dual wired speakers', 110, 'Speakers', 10.99, 'Bose', 60),
(9, '1M single speaker', 400, 'Speakers', 35.99, 'JBL', 400),
(10, 'Wired studio microphone with muffler', 60, 'Microphone', 29.99, 'Rode', 24),
(16, 'Ergonomic', 0, 'Mouse', 23.99, 'Anker', 0),
(15, 'Kraken-X', 0, 'Headset', 59.99, 'Razor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_reports`
--

CREATE TABLE `stock_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_generated` date NOT NULL,
  `generation_time` time NOT NULL,
  `stock_type` varchar(255) NOT NULL,
  `stock_level` int(11) NOT NULL,
  `sales_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_reports`
--

INSERT INTO `stock_reports` (`id`, `report_generated`, `generation_time`, `stock_type`, `stock_level`, `sales_level`) VALUES
(21, '2025-01-04', '03:43:10', 'Gaming headset', -643, 400),
(22, '2025-01-04', '03:43:10', 'RGB keyboard', 96, 100),
(23, '2025-01-04', '03:43:10', '52 inch, 4k monitor', 19, 50),
(24, '2025-01-04', '03:43:10', '45 inch 1080p monitor', 700, 50),
(25, '2025-01-04', '03:43:10', 'Wireless optical gaming mouse', 31, 60),
(26, '2025-01-04', '03:43:10', 'Wired gaming mouse', 39, 15),
(27, '2025-01-04', '03:43:10', 'Precision wireless mouse', 7, 10),
(28, '2025-01-04', '03:43:10', 'Dual wired speakers', 110, 60),
(29, '2025-01-04', '03:43:10', '1M single speaker', 400, 400),
(30, '2025-01-04', '03:43:10', 'Wired studio microphone with muffler', 59, 24),
(31, '2025-01-04', '06:24:35', 'Gaming headset', 655, 400),
(32, '2025-01-04', '06:24:35', 'RGB keyboard', 96, 100),
(33, '2025-01-04', '06:24:35', '52 inch, 4k monitor', 19, 50),
(34, '2025-01-04', '06:24:35', '45 inch 1080p monitor', 700, 50),
(35, '2025-01-04', '06:24:35', 'Wireless optical gaming mouse', 31, 60),
(36, '2025-01-04', '06:24:35', 'Wired gaming mouse', 39, 15),
(37, '2025-01-04', '06:24:35', 'Precision wireless mouse', 7, 10),
(38, '2025-01-04', '06:24:35', 'Dual wired speakers', 110, 60),
(39, '2025-01-04', '06:24:35', '1M single speaker', 400, 400),
(40, '2025-01-04', '06:24:35', 'Wired studio microphone with muffler', 59, 24),
(41, '2025-01-05', '16:56:27', 'Gaming headset', 1654, 400),
(42, '2025-01-05', '16:56:27', 'RGB keyboard', 96, 100),
(43, '2025-01-05', '16:56:27', '52 inch, 4k monitor', 19, 50),
(44, '2025-01-05', '16:56:27', '45 inch 1080p monitor', 700, 50),
(45, '2025-01-05', '16:56:27', 'Wireless optical gaming mouse', 31, 60),
(46, '2025-01-05', '16:56:27', 'Wired gaming mouse', 39, 15),
(47, '2025-01-05', '16:56:27', 'Precision wireless mouse', 7, 10),
(48, '2025-01-05', '16:56:27', 'Dual wired speakers', 110, 60),
(49, '2025-01-05', '16:56:27', '1M single speaker', 400, 400),
(50, '2025-01-05', '16:56:27', 'Wired studio microphone with muffler', 60, 24),
(51, '2025-01-05', '17:02:57', 'Gaming headset', 1654, 400),
(52, '2025-01-05', '17:02:57', 'RGB keyboard', 96, 100),
(53, '2025-01-05', '17:02:57', '52 inch, 4k monitor', 19, 50),
(54, '2025-01-05', '17:02:57', '45 inch 1080p monitor', 700, 50),
(55, '2025-01-05', '17:02:57', 'Wireless optical gaming mouse', 31, 60),
(56, '2025-01-05', '17:02:57', 'Wired gaming mouse', 39, 15),
(57, '2025-01-05', '17:02:57', 'Precision wireless mouse', 7, 10),
(58, '2025-01-05', '17:02:57', 'Dual wired speakers', 110, 60),
(59, '2025-01-05', '17:02:57', '1M single speaker', 400, 400),
(60, '2025-01-05', '17:02:57', 'Wired studio microphone with muffler', 60, 24);

-- --------------------------------------------------------

--
-- Table structure for table `store_and_warehouses`
--

CREATE TABLE `store_and_warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_and_warehouses`
--

INSERT INTO `store_and_warehouses` (`id`, `location_name`, `location_type`, `created_at`, `updated_at`) VALUES
(1, 'London', 'Store', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Sheffield', 'Store', NULL, NULL),
(3, 'Reading', 'Warehouse', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_level` int(11) NOT NULL DEFAULT 1,
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `job_role` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permission_level`, `first_name`, `surname`, `dob`, `job_role`, `location`) VALUES
(5, 'T@test.t3', NULL, '$2y$12$xmRVRHsVgc1UFLiVlYa.q.QaWs9G84hZYlMyPEaysxLG8WlEdkJCi', NULL, '2024-12-22 12:24:26', '2024-12-22 12:24:26', 1, NULL, NULL, NULL, 'clerk', NULL),
(8, 'Dudley.M@IMS.com', NULL, '$2y$12$MIF4vvDz6ubRxv2/qJ2CaukQyIteaNL/RKupEvvcugVzXXPwue8fm', NULL, '2024-12-29 15:33:51', '2024-12-29 15:33:51', 2, 'Matt', 'Dudley', '1111-11-11', 'admin', 'London'),
(9, 'Evans.T@IMS', NULL, '$2y$12$2GuqxOYd/xTvJlG82QOoHeIgDPF97rCGy0MZfvjrdWE5VaNeWfVc6', NULL, '2024-12-29 16:45:33', '2024-12-29 16:45:33', 1, 'Thalia', 'Evans', '1111-11-11', 'clerk', 'Sheffield'),
(10, 'Brown.A@IMS.com', NULL, '$2y$12$Q0RYkFLve/3rp61ayguASOiQJTC7EPWUGN2Zq3K2nHexmkEIVxFiy', NULL, '2024-12-29 16:49:33', '2024-12-29 16:49:33', 1, 'Adam', 'Brown', '1111-11-11', 'clerk', 'Sheffield'),
(11, 'Clark.O@IMS.com', NULL, '$2y$12$B7t3pc.SR/gCDjZPcBquueywMziNXIUDB5TFEIZyK390.uDSrFpO6', NULL, '2024-12-29 16:53:03', '2024-12-29 16:53:03', 2, 'Oliver', 'Clark', '1111-11-11', 'admin', 'Reading'),
(15, 't@IMS.COM', NULL, '$2y$12$.lSBL7TcCeYNVjXNmJt2Q.gvrWAa.mLEbinVxk/AqZSzyCPrXaACy', NULL, '2025-01-05 17:06:16', '2025-01-05 17:06:16', 1, 'test', 'te', '2025-01-05', 'clerk', 'London');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_roles`
--
ALTER TABLE `job_roles`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `saleshistory`
--
ALTER TABLE `saleshistory`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `sales_avg_report`
--
ALTER TABLE `sales_avg_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `stock_reports`
--
ALTER TABLE `stock_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_and_warehouses`
--
ALTER TABLE `store_and_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_roles`
--
ALTER TABLE `job_roles`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saleshistory`
--
ALTER TABLE `saleshistory`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_avg_report`
--
ALTER TABLE `sales_avg_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stock_reports`
--
ALTER TABLE `stock_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `store_and_warehouses`
--
ALTER TABLE `store_and_warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
