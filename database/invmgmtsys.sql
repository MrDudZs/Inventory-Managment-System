-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 02:43 PM
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('matthewrdudley@gmail.com|127.0.0.1', 'i:1;', 1733491827),
('matthewrdudley@gmail.com|127.0.0.1:timer', 'i:1733491827;', 1733491827);

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
(7, '2024_12_22_120054_drop_name_from_users_table', 5);

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
('ih9kwOQmrTSf5YlZrK21AA4KfhW1U9l2pIBW1s2v', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMGNTODl0RTc3S3piVFp6S1lYbW14NXRKTzVhMXd2SUVQVlUzdlVaeiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1734874975);

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
(3, 0, 'test', 'test', '$2y$10$7k3dTAKPhElm8xwnVnLseOFWCSwablZgv1uHxoCjDemAwXrt2CL4i', '0000-00-00', 'Test@test.co', 1, 'Clerk'),
(4, 0, 'Admin', 'Admin', '$2y$10$R6mYTykOnre2VdYwGNUZlupyPcqoT28G..UFPd5cuVgB31LJXpS5i', '1111-11-11', 'Admin@admin.admin', 2, 'Admin');

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
(1, 'Gaming headset', 300, 'Headset', 31.99, 'Corsair', 400),
(2, 'RGB keyboard', 100, 'Keyboard', 17.5, 'Corsair', 100),
(3, '52 inch, 4k monitor', 20, 'Monitor', 95.99, 'ASUS', 50),
(4, '45 inch 1080p monitor', 700, 'Monitor', 72.99, 'HP', 50),
(5, 'Wireless optical gaming mouse', 36, 'Mouse', 16.5, 'ASUS', 60),
(6, 'Wired gaming mouse', 39, 'Mouse', 25.99, 'Logitech', 15),
(7, 'Precision wireless mouse', 7, 'Mouse', 20.5, 'Logitech', 10),
(8, 'Dual wired speakers', 10, 'Speakers', 10.99, 'Bose', 60),
(9, '1M single speaker', 400, 'Speakers', 35.99, 'JBL', 400),
(10, 'Wired studio microphone with muffler', 24, 'Microphone', 29.99, 'Rode', 24);

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
  `job_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permission_level`, `first_name`, `surname`, `dob`, `job_role`) VALUES
(5, 'T@test.t3', NULL, '$2y$12$xmRVRHsVgc1UFLiVlYa.q.QaWs9G84hZYlMyPEaysxLG8WlEdkJCi', NULL, '2024-12-22 12:24:26', '2024-12-22 12:24:26', 1, NULL, NULL, NULL, 'clerk');

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
