-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2023 at 12:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galangdana`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Bencana Alam', '2022-11-08 22:54:00', '2022-11-08 22:54:00'),
(2, 'Yatim Piatu', '2022-11-08 22:56:25', '2022-11-08 22:56:25'),
(3, 'Renovasi Mesjid', '2022-11-08 23:26:55', '2022-11-08 23:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `developments`
--

CREATE TABLE `developments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `id_transaksi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_donatur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_donasi` int(11) NOT NULL,
  `dukungan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `program_id`, `users_id`, `id_transaksi`, `nama_donatur`, `email`, `nominal_donasi`, `dukungan`, `bukti_pembayaran`, `isVerified`, `created_at`, `updated_at`) VALUES
(2, 6, NULL, '128002', 'Ilham', NULL, 25000, 'Cepat pulih', 'contoh.jpg', 1, '2023-01-15 05:00:59', '2023-01-15 05:01:16'),
(5, 6, NULL, '128003', 'Donatur', NULL, 12000, 'ppp', 'Screenshot from 2023-01-08 14-46-52.png', 1, '2023-01-15 05:25:43', '2023-01-15 05:26:09'),
(6, 6, NULL, '128006', 'Donatur', NULL, 15000, 'iiopiop', NULL, 0, '2023-01-15 05:27:50', '2023-01-15 05:27:50'),
(7, 6, NULL, '128007', 'Donatur', NULL, 15000, 'rtrh', 'ss (2).png', 1, '2023-01-15 05:33:58', '2023-01-15 07:50:27'),
(8, 6, NULL, '128008', 'Raihan', 'raihan@mail.com', 90000, 'ppp', NULL, 0, '2023-01-15 07:51:27', '2023-01-15 07:51:27'),
(9, 6, NULL, '128009', 'Donatur', 'adit@mail.com', 50000, 'ytjtyj', 'ss (3).png', 1, '2023-01-15 11:12:05', '2023-01-15 11:15:50'),
(10, 6, NULL, '128010', 'Fardan', 'fardanfh@gmail.com', 10000, 'cepat pulih', 'ss.png', 1, '2023-01-16 02:40:37', '2023-01-16 02:41:21'),
(11, 6, NULL, '128011', 'Donatur', NULL, 40000, 'p', NULL, 0, '2023-01-16 03:16:48', '2023-01-16 03:16:48');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_25_153845_create_programs', 1),
(6, '2022_10_25_153948_create_categories', 1),
(7, '2022_10_25_154149_create_developments', 1),
(8, '2022_10_25_154211_create_donations', 1),
(9, '2022_10_25_154248_create_reports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_explanation` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_target` int(11) NOT NULL,
  `time_is_up` date NOT NULL,
  `shelter_account_number` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_collected` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPublished` tinyint(4) NOT NULL DEFAULT 0,
  `isSelected` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `users_id`, `category_id`, `title`, `photo`, `brief_explanation`, `donation_target`, `time_is_up`, `shelter_account_number`, `donation_collected`, `description`, `isPublished`, `isSelected`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'Anak yatim di Panti Asuhan', 'panti.jpg', 'Ayo berdonasi supaya Anak Yatim disini bisa merasakan makanan lagi.', 10000000, '2022-11-28', '99034-42-434', 100000, 'Sudah sekitar 7 hari 7 malam Anak-anak Panti Asuhan kami menahan rasa lapar. disini kehabisan makanan, kami perlu bantuan dari Anda untuk membeli makanan yang banyak untu para Anak yatim disini.', 0, 1, '2022-11-09 05:13:45', NULL),
(4, 1, 1, 'Bencana Alam Hujan Api', 'pppp.jpg', 'Yu berdonasi kebaikan', 8000000, '2022-12-16', '899-5495-245', NULL, 'Bencana alam hujan api terjadi di luar dunia', 0, 0, '2022-11-15 10:26:51', '2022-11-15 10:26:51'),
(5, 1, 1, 'Bencana Alam Gempa Bumi di Cianjur & Sekitarnya', 'gempa.jpg', 'Yu berdonasi', 12000000, '2022-12-31', '999-999-999', NULL, 'Gempa 5,6mg terjadi di kabupaten cianjur provinsi jawabarat', 0, 0, '2022-11-26 07:41:02', '2023-01-15 01:34:57'),
(6, 1, 1, 'Gempa Cianjur', 'gempa.jpg', 'Yu berdonasi', 5000000, '2023-01-31', '999-999-999', 217000, 'sfdfsfesfesf', 1, 0, '2023-01-09 10:06:26', '2023-01-16 02:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `report` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_hp`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fardan', '0986789899', 'fardanfh@gmail.com', NULL, '$2y$10$OGgAl8IH.0WMspZzaaQE7ODRg4Pve7HfNUxu3L2NeMPSULEyUM.Mu', 0, NULL, '2022-11-08 06:54:46', '2022-11-08 06:54:46'),
(2, 'admin', '089482834', 'admin@mail.com', NULL, '$2y$10$Bffg4Us7YjL43YSOazVpfe7zDRHm5Z0Cpwe8AVUOVmWL.praC8VEi', 1, NULL, '2022-11-08 09:56:31', '2022-11-08 09:56:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developments`
--
ALTER TABLE `developments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `developments`
--
ALTER TABLE `developments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
