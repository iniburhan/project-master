-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 01:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_laravel_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_categories`
--

CREATE TABLE `ms_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_categories`
--

INSERT INTO `ms_categories` (`id`, `name`, `description`, `flag`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'T-Shirt', 'ini T-Shirt', 1, 1, '2023-11-03 01:25:19', 1, '2023-11-09 18:55:24'),
(2, 'Jacket', 'ini Jacket', 1, 1, '2023-11-03 01:26:29', 1, '2023-11-02 23:33:09'),
(3, 'Hoodie', 'ini Hoodieeeaa', 1, 1, '2023-11-03 01:44:35', 1, '2023-11-02 19:13:51'),
(12, 'test', 'testtttTEST', 0, 1, '2023-11-03 02:08:15', 1, '2023-11-02 19:09:42'),
(13, 'helo', 'testttt', 0, 1, '2023-11-03 02:11:36', 1, '2023-11-09 18:55:33'),
(14, 'test', 'tset', 1, 1, '2023-11-03 04:12:56', 1, '2023-11-02 23:38:17'),
(15, 'test', 'test', 1, 1, '2023-11-03 04:12:56', 1, '2023-11-02 23:23:58'),
(16, 'test', 'test', 1, 1, '2023-11-03 06:24:06', 1, '2023-11-03 00:48:09'),
(17, 'test', 'test', 0, 1, '2023-11-03 06:33:25', NULL, '2023-11-02 23:33:59'),
(18, 'burhan', 'ini T-Shirt', 1, 1, '2023-11-15 03:19:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_customers`
--

CREATE TABLE `ms_customers` (
  `id` int(10) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_customers`
--

INSERT INTO `ms_customers` (`id`, `name`, `email`, `address`, `phone`, `flag`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'test', 'imamz.patria@gmail.com', 'fdsfasf', '00333', 0, 1, '2023-11-09 07:18:43', 1, '2023-11-16 00:43:03'),
(2, 'Ridwan', 'ridawn@gmail.com', 'Tambun Selatan', '0895678910', 0, 1, '2023-11-09 07:19:08', 1, '2023-11-16 17:40:28'),
(3, 'test', 'imamz.patria@gmail.com', 'fdsfasf', '00333', 0, 1, '2023-11-09 07:53:50', 1, '2023-11-16 00:42:59'),
(4, 'Fernandos', 'fernandos@gmail.com', 'Tambun', '089', 1, 1, '2023-11-10 01:43:16', 1, '2023-11-16 07:41:52'),
(5, 'test', 'imamz.patria@gmail.com', 'fdsfasf', '00333', 0, 1, '2023-11-10 01:48:46', 1, '2023-11-16 00:42:55'),
(6, 'test', 'imamz.patria@gmail.com', 'fdsfasf', '00333', 0, 1, '2023-11-10 01:58:40', 1, '2023-11-16 00:42:49'),
(7, 'Naruto', 'naruto@gmail.com', 'Konoha', '082297666242', 1, 1, '2023-11-15 01:59:08', NULL, '2023-11-16 07:41:52'),
(8, 'Sasuke', 'sasuke@gmail.com', 'Konoha', '082237666248', 0, 1, '2023-11-15 02:00:02', NULL, '2023-11-16 01:11:12'),
(9, 'Konohamaru', 'superadmin@gmail.com', 'Konoha', '089', 1, 1, '2023-11-15 03:05:08', 1, '2023-11-16 07:41:52'),
(10, 'May', 'may@gmail.com', 'Tambun', '089', 1, 1, '2023-11-15 03:53:59', 1, '2023-11-16 07:41:52'),
(11, 'Burhanudin Azzis', 'burhanpandhawa5@gmail.com', 'Purwokerto', '082297666242', 0, 1, '2023-11-16 07:43:33', 1, '2023-11-16 00:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `ms_kendaraan`
--

CREATE TABLE `ms_kendaraan` (
  `id` int(11) NOT NULL,
  `jenis_kendaraan` varchar(255) DEFAULT NULL,
  `keterangan_kendaraan` varchar(255) DEFAULT NULL,
  `pajak_pertahun` float DEFAULT NULL,
  `denda_telat_perbulan` float DEFAULT NULL,
  `no_polisi` varchar(64) DEFAULT NULL,
  `pembayar` varchar(255) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_kendaraan`
--

INSERT INTO `ms_kendaraan` (`id`, `jenis_kendaraan`, `keterangan_kendaraan`, `pajak_pertahun`, `denda_telat_perbulan`, `no_polisi`, `pembayar`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Roda 2 under 150cc', 'Honda Scoopy', 225000, 22500, 'test', 'test', 0, '2023-11-17 02:21:56', 1, '2023-11-16 20:01:27', 1),
(2, 'Roda 2 up 150', 'Honda Vario', 225000, 22500, 'B 5678 RR', 'Ridwan Fernandos', 1, '2023-11-17 02:40:31', 1, '2023-11-17 01:53:22', 1),
(3, 'Roda 2 under 150cc', 'Honda Blade', 225000, 22500, 'B 1234 RR', 'Fernandos', 1, '2023-11-17 02:52:59', 1, NULL, NULL),
(4, 'Roda 2 up 150', 'Yamaha Nmax', 500000, 50000, 'R 2566 SJ', 'Burhan', 1, '2023-11-17 09:51:14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_pegawai`
--

CREATE TABLE `ms_pegawai` (
  `id` int(11) NOT NULL,
  `nrp` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_pegawai`
--

INSERT INTO `ms_pegawai` (`id`, `nrp`, `nama_pegawai`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '14045', 'Rubby Rainbow', 0, '2023-11-17 02:59:43', 1, '2023-11-16 20:01:10', 1),
(2, '14046', 'Rubby 2', 1, '2023-11-17 03:01:47', 1, '2023-11-16 20:03:30', 1),
(3, '14045', 'Imam', 1, '2023-11-17 09:51:43', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_product`
--

CREATE TABLE `ms_product` (
  `id` int(10) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `stock` varchar(191) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('burhan@gmail.com', '$2y$10$IUgOlllpWNIYCeB5iCltPOZgiDj27EOZUpr9/qWi7/q7u2UV8YuXm', '2023-10-24 23:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trx_orders`
--

CREATE TABLE `trx_orders` (
  `id` int(10) NOT NULL,
  `invoice` varchar(191) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trx_order_details`
--

CREATE TABLE `trx_order_details` (
  `id` int(10) NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pembayaran`
--

CREATE TABLE `trx_pembayaran` (
  `id` int(11) NOT NULL,
  `resi_pajak` varchar(255) DEFAULT NULL,
  `bulan_lewat_pajak` int(64) DEFAULT NULL,
  `total_denda` float DEFAULT NULL,
  `total_pajak_dibayar` float DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_pembayaran`
--

INSERT INTO `trx_pembayaran` (`id`, `resi_pajak`, `bulan_lewat_pajak`, `total_denda`, `total_pajak_dibayar`, `id_kendaraan`, `id_pegawai`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'test', 1, 1, 1, 1, 1, 0, '2023-11-17 04:04:00', 1, '2023-11-17 02:49:28', NULL),
(2, 'test', 1, 1, 1, 2, 2, 0, '2023-11-17 08:31:58', 1, '2023-11-17 01:57:21', NULL),
(3, 'R', 1, 1, 1, 3, 2, 0, '2023-11-17 08:34:17', 1, '2023-11-17 01:57:26', NULL),
(4, 'R1001', 0, 22500, 22500, 2, 2, 1, '2023-11-17 08:53:51', 1, '2023-11-17 09:54:05', NULL),
(5, 'R1002', 1, 30000, 30000, 3, 2, 1, '2023-11-17 09:49:57', 1, '2023-11-17 09:54:08', NULL),
(6, 'R1003', 1, 50000, 550000, 4, 3, 1, '2023-11-17 09:52:49', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'burhan', 'burhan@gmail.com', NULL, '$2y$10$tZOr8ynueAjWvpJAAdkc0.AZY2xTg2utJCYj4n5YgCEDqhwZSOX.2', NULL, '2023-10-23 23:47:23', '2023-10-23 23:47:23'),
(2, 'burhan', 'superadmin@gmail.com', NULL, '$2y$10$qKGGc8nVfJkFPgP2A3rTKeEAY9ix4JQJQFp//dbXvjv31fr7kvKFa', NULL, '2023-10-24 22:51:31', '2023-10-24 22:51:31');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pembayaran_denda_max`
-- (See below for the actual view)
--
CREATE TABLE `vw_pembayaran_denda_max` (
`id` int(11)
,`resi_pajak` varchar(255)
,`jenis_kendaraan` varchar(255)
,`keterangan_kendaraan` varchar(255)
,`pajak_pertahun` float
,`denda_telat_perbulan` float
,`no_polisi` varchar(64)
,`pembayar` varchar(255)
,`bulan_lewat_pajak` int(64)
,`total_denda` float
,`total_pajak_dibayar` float
,`nrp` varchar(255)
,`nama_pegawai` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_pembayaran_denda_max`
--
DROP TABLE IF EXISTS `vw_pembayaran_denda_max`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pembayaran_denda_max`  AS SELECT `tp`.`id` AS `id`, `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda_max` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai` FROM ((`ms_kendaraan` `mk` join (select `trx_pembayaran`.`id` AS `id`,`trx_pembayaran`.`resi_pajak` AS `resi_pajak`,`trx_pembayaran`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`,`trx_pembayaran`.`total_denda` AS `total_denda`,`trx_pembayaran`.`total_pajak_dibayar` AS `total_pajak_dibayar`,`trx_pembayaran`.`id_kendaraan` AS `id_kendaraan`,`trx_pembayaran`.`id_pegawai` AS `id_pegawai`,`trx_pembayaran`.`flag` AS `flag`,`trx_pembayaran`.`created_at` AS `created_at`,`trx_pembayaran`.`created_by` AS `created_by`,`trx_pembayaran`.`updated_at` AS `updated_at`,`trx_pembayaran`.`updated_by` AS `updated_by`,max(`trx_pembayaran`.`total_denda`) AS `total_denda_max` from `trx_pembayaran` where `trx_pembayaran`.`flag` = 1 group by `trx_pembayaran`.`id`) `tp` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 GROUP BY `tp`.`total_denda` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_categories`
--
ALTER TABLE `ms_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_customers`
--
ALTER TABLE `ms_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_kendaraan`
--
ALTER TABLE `ms_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_pegawai`
--
ALTER TABLE `ms_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_product`
--
ALTER TABLE `ms_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trx_orders`
--
ALTER TABLE `trx_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_order_details`
--
ALTER TABLE `trx_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_pembayaran`
--
ALTER TABLE `trx_pembayaran`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ms_categories`
--
ALTER TABLE `ms_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ms_customers`
--
ALTER TABLE `ms_customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ms_kendaraan`
--
ALTER TABLE `ms_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ms_pegawai`
--
ALTER TABLE `ms_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_product`
--
ALTER TABLE `ms_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_orders`
--
ALTER TABLE `trx_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_order_details`
--
ALTER TABLE `trx_order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_pembayaran`
--
ALTER TABLE `trx_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
