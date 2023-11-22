-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 03:00 AM
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
(1, 'Roda 2 under 150cc', 'Honda Blade', 125000, 12500, 'B 17046', 'Mubarak', 1, '2023-11-20 00:31:25', 1, NULL, NULL),
(2, 'Roda 2 under 150cc', 'Honda Blade', 125000, 12500, 'B 17047', 'Sadil', 1, '2023-11-20 00:33:01', 1, NULL, NULL),
(3, 'Roda 2 up 150', 'Honda ADV', 500000, 5000, 'B 17048', 'Witan', 1, '2023-11-20 00:34:22', 1, NULL, NULL),
(4, 'Mobil 1000cc', 'Toyota Agya', 1000000, 100000, 'B 17049', 'Ferdi', 1, '2023-11-20 00:35:11', 1, NULL, NULL),
(5, 'Roda 2 up 150', 'Honda Vario', 350000, 35000, 'B 17050', 'Sandi', 1, '2023-11-20 00:36:16', 1, NULL, NULL),
(6, 'Roda 2 up 150', 'Yamaha Nmax', 450000, 45000, 'B 17051', 'Feri', 1, '2023-11-20 00:37:00', 1, NULL, NULL),
(7, 'Roda 2 up 150', 'Yamaha Aerox', 450000, 45000, 'B 17052', 'Luna', 1, '2023-11-20 00:37:44', 1, NULL, NULL),
(8, 'Roda 2 under 150cc', 'Honda Supra X', 125000, 12500, 'B 17053', 'Luna', 1, '2023-11-20 00:38:24', 1, NULL, NULL),
(9, 'Roda 2 under 150cc', 'Honda Scoopy', 125000, 12500, 'B 17054', 'Sandi', 1, '2023-11-20 00:39:56', 1, NULL, NULL),
(10, 'Mobil 1000cc', 'Toyota Sigra', 1100000, 110000, 'B 17055', 'Egy', 1, '2023-11-20 00:40:51', 1, NULL, NULL),
(11, 'Roda 2 up 150', 'Honda ADV', 500000, 5000, 'B 17056', 'Mubarak', 1, '2023-11-20 00:41:45', 1, '2023-11-19 17:43:08', 1),
(12, 'Mobil 1000cc', 'Toyota Agya', 1000000, 100000, 'B 17057', 'Mubarak', 1, '2023-11-20 00:43:57', 1, NULL, NULL),
(13, 'Roda 2 up 150', 'Honda Vario', 350000, 35000, 'B 17058', 'Mubarak', 1, '2023-11-20 00:44:40', 1, '2023-11-19 17:46:12', 1),
(14, 'Roda 2 up 150', 'Yamaha Nmax', 450000, 45000, 'B 17059', 'Dedi', 1, '2023-11-20 00:45:19', 1, '2023-11-19 17:46:25', 1),
(15, 'Roda 2 up 150', 'Yamaha Aerox', 450000, 45000, 'B 17060', 'Bagas', 1, '2023-11-20 00:47:24', 1, NULL, NULL),
(16, 'Mobil 1000cc', 'Toyota Agya', 1000000, 100000, 'B 17061', 'Edi', 1, '2023-11-20 00:48:00', 1, NULL, NULL),
(17, 'Roda 2 up 150', 'Honda Vario', 350000, 35000, 'B 17062', 'Dimas', 1, '2023-11-20 00:48:54', 1, NULL, NULL),
(18, 'Roda 2 up 150', 'Yamaha Nmax', 450000, 45000, 'B 17063', 'Gilang', 1, '2023-11-20 00:49:41', 1, NULL, NULL),
(19, 'Roda 2 up 150', 'Honda ADV', 500000, 5000, 'B 17064', 'Bagas', 1, '2023-11-20 00:50:34', 1, NULL, NULL),
(20, 'Mobil 1000cc', 'Toyota Agya', 1000000, 100000, 'B 17065', 'Nurul', 1, '2023-11-20 00:51:09', 1, NULL, NULL),
(21, 'Roda 2 up 150', 'Honda Vario', 350000, 35000, 'B 17066', 'Nina', 1, '2023-11-20 00:51:40', 1, NULL, NULL);

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
(1, '14045', 'Rubby', 1, '2023-11-20 00:52:37', 1, NULL, NULL),
(2, '14046', 'Bane', 1, '2023-11-20 00:52:48', 1, NULL, NULL),
(3, '14047', 'Fanny', 1, '2023-11-20 00:53:03', 1, NULL, NULL);

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
(1, 'PJK00116012022', 0, 0, 125000, 1, 1, 1, '2023-11-20 02:07:18', 1, NULL, NULL),
(2, 'PJK00116012023', 1, 12500, 137500, 2, 2, 1, '2023-11-20 02:07:51', 1, NULL, NULL),
(3, 'PJK00116012024', 2, 10000, 510000, 3, 3, 1, '2023-11-20 02:09:26', 1, NULL, NULL),
(4, 'PJK00116012025', 0, 0, 1000000, 4, 1, 1, '2023-11-20 02:10:12', 1, NULL, NULL),
(5, 'PJK00116012026', 0, 0, 350000, 5, 2, 1, '2023-11-20 02:11:15', 1, NULL, NULL),
(6, 'PJK00116012027', 0, 0, 450000, 6, 3, 1, '2023-11-20 02:12:37', 1, NULL, NULL),
(7, 'PJK00116012028', 0, 0, 450000, 7, 2, 1, '2023-11-20 02:13:13', 1, NULL, NULL),
(8, 'PJK00116012029', 0, 0, 125000, 8, 3, 1, '2023-11-20 02:14:00', 1, NULL, NULL),
(9, 'PJK00116012030', 0, 0, 125000, 9, 1, 1, '2023-11-20 02:16:17', 1, NULL, NULL),
(10, 'PJK00116012031', 0, 0, 1100000, 10, 2, 1, '2023-11-20 02:17:04', 1, NULL, NULL),
(11, 'PJK00116012032', 0, 0, 500000, 11, 2, 1, '2023-11-20 02:17:45', 1, NULL, NULL),
(12, 'PJK00116012033', 0, 0, 1000000, 12, 3, 1, '2023-11-20 02:20:03', 1, NULL, NULL),
(13, 'PJK00116012034', 0, 0, 350000, 13, 1, 1, '2023-11-20 02:20:40', 1, NULL, NULL),
(14, 'PJK00116012035', 0, 0, 450000, 14, 2, 1, '2023-11-20 02:21:18', 1, NULL, NULL),
(15, 'PJK00116012036', 0, 0, 450000, 15, 2, 1, '2023-11-20 02:21:58', 1, NULL, NULL),
(16, 'PJK00116012037', 4, 400000, 1400000, 16, 3, 1, '2023-11-20 02:22:44', 1, NULL, NULL),
(17, 'PJK00116012038', 3, 105000, 455000, 17, 1, 1, '2023-11-20 02:24:49', 1, NULL, NULL),
(18, 'PJK00116012039', 5, 225000, 675000, 18, 2, 1, '2023-11-20 02:26:01', 1, NULL, NULL),
(19, 'PJK00116012040', 1, 5000, 505000, 19, 2, 1, '2023-11-20 02:26:35', 1, NULL, NULL),
(20, 'PJK00116012041', 1, 100000, 1100000, 20, 3, 1, '2023-11-20 02:27:04', 1, NULL, NULL),
(21, 'PJK00116012042', 1, 35000, 385000, 21, 1, 1, '2023-11-20 02:27:25', 1, NULL, NULL);

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
-- Stand-in structure for view `vw_jenis_pajak_terbanyak_dibayar`
-- (See below for the actual view)
--
CREATE TABLE `vw_jenis_pajak_terbanyak_dibayar` (
`resi_pajak` varchar(255)
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
,`jumlah_kendaraan` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_jml_denda_setiap_pembayar`
-- (See below for the actual view)
--
CREATE TABLE `vw_jml_denda_setiap_pembayar` (
`resi_pajak` varchar(255)
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
,`jumlah_denda` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_jumlah_pajak_dari_kategori`
-- (See below for the actual view)
--
CREATE TABLE `vw_jumlah_pajak_dari_kategori` (
`resi_pajak` varchar(255)
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
,`sum_pajak` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pegawai_paling_jarang_melayani`
-- (See below for the actual view)
--
CREATE TABLE `vw_pegawai_paling_jarang_melayani` (
`resi_pajak` varchar(255)
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
,`jumlah_pelayanan` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pembayaran`
-- (See below for the actual view)
--
CREATE TABLE `vw_pembayaran` (
`id` int(11)
,`resi_pajak` varchar(255)
,`bulan_lewat_pajak` int(64)
,`total_denda` float
,`total_pajak_dibayar` float
,`no_polisi` varchar(64)
,`jenis_kendaraan` varchar(255)
,`keterangan_kendaraan` varchar(255)
,`pajak_pertahun` float
,`denda_telat_perbulan` float
,`pembayar` varchar(255)
,`nrp` varchar(255)
,`nama_pegawai` varchar(255)
);

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
-- Stand-in structure for view `vw_pembayaran_denda_max_ke2`
-- (See below for the actual view)
--
CREATE TABLE `vw_pembayaran_denda_max_ke2` (
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
-- Stand-in structure for view `vw_pemilik_kendaraan_terbanyak`
-- (See below for the actual view)
--
CREATE TABLE `vw_pemilik_kendaraan_terbanyak` (
`pembayar` varchar(255)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_jenis_pajak_terbanyak_dibayar`
--
DROP TABLE IF EXISTS `vw_jenis_pajak_terbanyak_dibayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jenis_pajak_terbanyak_dibayar`  AS SELECT `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai`, count(`mk`.`jenis_kendaraan`) AS `jumlah_kendaraan` FROM ((`trx_pembayaran` `tp` join `ms_kendaraan` `mk` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 GROUP BY `mk`.`jenis_kendaraan` ORDER BY count(`mk`.`jenis_kendaraan`) DESC LIMIT 0, 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jml_denda_setiap_pembayar`
--
DROP TABLE IF EXISTS `vw_jml_denda_setiap_pembayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jml_denda_setiap_pembayar`  AS SELECT `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai`, sum(`tp`.`total_denda`) AS `jumlah_denda` FROM ((`trx_pembayaran` `tp` join `ms_kendaraan` `mk` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 GROUP BY `mk`.`pembayar` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jumlah_pajak_dari_kategori`
--
DROP TABLE IF EXISTS `vw_jumlah_pajak_dari_kategori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jumlah_pajak_dari_kategori`  AS SELECT `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai`, sum(`tp`.`total_pajak_dibayar`) AS `sum_pajak` FROM ((`trx_pembayaran` `tp` join `ms_kendaraan` `mk` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 AND `mk`.`jenis_kendaraan` like '%Roda 2 up 150%' ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pegawai_paling_jarang_melayani`
--
DROP TABLE IF EXISTS `vw_pegawai_paling_jarang_melayani`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pegawai_paling_jarang_melayani`  AS SELECT `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai`, count(`mp`.`nama_pegawai`) AS `jumlah_pelayanan` FROM ((`trx_pembayaran` `tp` join `ms_kendaraan` `mk` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 GROUP BY `mp`.`nama_pegawai` ORDER BY count(`mp`.`nama_pegawai`) ASC LIMIT 0, 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pembayaran`
--
DROP TABLE IF EXISTS `vw_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pembayaran`  AS SELECT `tp`.`id` AS `id`, `tp`.`resi_pajak` AS `resi_pajak`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`pembayar` AS `pembayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai` FROM ((`trx_pembayaran` `tp` join `ms_kendaraan` `mk` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pembayaran_denda_max`
--
DROP TABLE IF EXISTS `vw_pembayaran_denda_max`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pembayaran_denda_max`  AS SELECT `tp`.`id` AS `id`, `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda_max` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai` FROM ((`ms_kendaraan` `mk` join (select `trx_pembayaran`.`id` AS `id`,`trx_pembayaran`.`resi_pajak` AS `resi_pajak`,`trx_pembayaran`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`,`trx_pembayaran`.`total_denda` AS `total_denda`,`trx_pembayaran`.`total_pajak_dibayar` AS `total_pajak_dibayar`,`trx_pembayaran`.`id_kendaraan` AS `id_kendaraan`,`trx_pembayaran`.`id_pegawai` AS `id_pegawai`,`trx_pembayaran`.`flag` AS `flag`,`trx_pembayaran`.`created_at` AS `created_at`,`trx_pembayaran`.`created_by` AS `created_by`,`trx_pembayaran`.`updated_at` AS `updated_at`,`trx_pembayaran`.`updated_by` AS `updated_by`,max(`trx_pembayaran`.`total_denda`) AS `total_denda_max` from `trx_pembayaran` where `trx_pembayaran`.`flag` = 1 group by `trx_pembayaran`.`id`) `tp` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 GROUP BY `tp`.`total_denda` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pembayaran_denda_max_ke2`
--
DROP TABLE IF EXISTS `vw_pembayaran_denda_max_ke2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pembayaran_denda_max_ke2`  AS SELECT `tp`.`id` AS `id`, `tp`.`resi_pajak` AS `resi_pajak`, `mk`.`jenis_kendaraan` AS `jenis_kendaraan`, `mk`.`keterangan_kendaraan` AS `keterangan_kendaraan`, `mk`.`pajak_pertahun` AS `pajak_pertahun`, `mk`.`denda_telat_perbulan` AS `denda_telat_perbulan`, `mk`.`no_polisi` AS `no_polisi`, `mk`.`pembayar` AS `pembayar`, `tp`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`, `tp`.`total_denda_max` AS `total_denda`, `tp`.`total_pajak_dibayar` AS `total_pajak_dibayar`, `mp`.`nrp` AS `nrp`, `mp`.`nama_pegawai` AS `nama_pegawai` FROM ((`ms_kendaraan` `mk` join (select `trx_pembayaran`.`id` AS `id`,`trx_pembayaran`.`resi_pajak` AS `resi_pajak`,`trx_pembayaran`.`bulan_lewat_pajak` AS `bulan_lewat_pajak`,`trx_pembayaran`.`total_denda` AS `total_denda`,`trx_pembayaran`.`total_pajak_dibayar` AS `total_pajak_dibayar`,`trx_pembayaran`.`id_kendaraan` AS `id_kendaraan`,`trx_pembayaran`.`id_pegawai` AS `id_pegawai`,`trx_pembayaran`.`flag` AS `flag`,`trx_pembayaran`.`created_at` AS `created_at`,`trx_pembayaran`.`created_by` AS `created_by`,`trx_pembayaran`.`updated_at` AS `updated_at`,`trx_pembayaran`.`updated_by` AS `updated_by`,max(`trx_pembayaran`.`total_denda`) AS `total_denda_max` from `trx_pembayaran` where `trx_pembayaran`.`flag` = 1 group by `trx_pembayaran`.`id`) `tp` on(`mk`.`id` = `tp`.`id_kendaraan`)) join `ms_pegawai` `mp` on(`mp`.`id` = `tp`.`id_pegawai`)) WHERE `tp`.`flag` = 1 GROUP BY `tp`.`total_denda` LIMIT 1, 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pemilik_kendaraan_terbanyak`
--
DROP TABLE IF EXISTS `vw_pemilik_kendaraan_terbanyak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pemilik_kendaraan_terbanyak`  AS SELECT `a`.`pembayar` AS `pembayar`, `a`.`total` AS `total` FROM (select count(`ms_kendaraan`.`keterangan_kendaraan`) AS `total`,`ms_kendaraan`.`pembayar` AS `pembayar` from `ms_kendaraan` where `ms_kendaraan`.`flag` = 1 group by `ms_kendaraan`.`pembayar` order by count(`ms_kendaraan`.`keterangan_kendaraan`) desc) AS `a` LIMIT 0, 1 ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
