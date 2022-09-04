-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 10:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(39, 'Human Resources', 'Human resources is the set of people who make up the workforce of an organization, business sector, industry, or economy.', '2022-09-04 14:05:35', '2022-09-04 14:05:35'),
(40, 'IT', 'An IT organization (information technology organization) is the department within a company that is charged with establishing, monitoring and maintaining information technology systems and services.', '2022-09-04 14:06:16', '2022-09-04 14:06:16'),
(41, 'Accounting and Finance', 'The accounting and finance department is at the centre of any organization and is responsible for ensuring the efficient financial management and financial controls necessary to support all business activities.', '2022-09-04 14:06:52', '2022-09-04 14:06:52'),
(42, 'Marketing', 'A marketing department drives the promotional engine of a business. It is responsible for increasing brand awareness overall, while also driving potential and recurring customers to a company\'s products or services.', '2022-09-04 14:07:25', '2022-09-04 14:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `department_id`, `created_at`, `updated_at`) VALUES
(8, 'Akshay Gurav', 'akshayg732@gmail.com', '9665273737', 'abc apartment, pqr Road,  Mumbai', '40', '2022-09-04 14:08:27', '2022-09-04 14:08:27'),
(9, 'Ajay', 'test@gmail.com', '23232344', 'Test apt, New York', '39', '2022-09-04 14:08:57', '2022-09-04 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(5, '2022_09_03_113135_create_departments_table', 2),
(6, '2022_09_04_095804_create_employees_table', 3),
(7, '2022_09_04_124131_add_s_token_to_users_table', 4);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 1, 'myapptoken', '63a4f5387ae7e0b4a14b9caeed71eea75a5cb539b68c51ec7ad0512760d64b8f', '[\"*\"]', NULL, '2022-09-04 06:13:13', '2022-09-04 06:13:13'),
(2, 'App\\User', 1, 'myapptoken', '7b02ab336a48e096eee7b319ab64a78749e8c8bae1533a0d75671bdd835ecf93', '[\"*\"]', '2022-09-04 11:49:40', '2022-09-04 06:15:30', '2022-09-04 11:49:40'),
(3, 'App\\User', 1, 'myapptoken', '007aaa7bc065f4d316a876c63baec8c50e8a0917505e3e93c4d7b10f4254d69a', '[\"*\"]', NULL, '2022-09-04 06:27:48', '2022-09-04 06:27:48'),
(4, 'App\\User', 1, 'myapptoken', '3f7a6e7840e43ae2969d0d71aa3f4843454db2d1050d3b9aae3cbcf272489463', '[\"*\"]', NULL, '2022-09-04 06:33:53', '2022-09-04 06:33:53'),
(5, 'App\\User', 1, 'myapptoken', '728c241f1ecaaa76e0cc03a1f60f53e0f05c6d6a221481386b1f384147f20ed1', '[\"*\"]', NULL, '2022-09-04 06:35:01', '2022-09-04 06:35:01'),
(6, 'App\\User', 1, 'myapptoken', '64bdcf1bd02dd50445b42b02b4ba7cf69c354f16d37933f3b7893b3c481703c1', '[\"*\"]', NULL, '2022-09-04 06:57:28', '2022-09-04 06:57:28'),
(7, 'App\\User', 1, 'myapptoken', 'b671977c89397234fe79112e8245068b174f3fbfce857fc7421eb53c98b18a9a', '[\"*\"]', NULL, '2022-09-04 06:58:57', '2022-09-04 06:58:57'),
(8, 'App\\User', 1, 'myapptoken', '767ace9831423c521e71aecca9d76d9e79eaac10da4e587a00d08d7953290e09', '[\"*\"]', NULL, '2022-09-04 07:00:23', '2022-09-04 07:00:23'),
(9, 'App\\User', 1, 'myapptoken', 'a91c11aa4b4217798f47fa49243b9672dfb0ef23bc826250a1d4384a8f70f4ae', '[\"*\"]', NULL, '2022-09-04 07:01:19', '2022-09-04 07:01:19'),
(10, 'App\\User', 1, 'myapptoken', '36ea20085fbe33d9362dc18e0fe16313e0350f00c8c516b1c69a9206e45cbf4c', '[\"*\"]', NULL, '2022-09-04 07:07:30', '2022-09-04 07:07:30'),
(11, 'App\\User', 1, 'myapptoken', 'b0c75a0cb4265311a3028afbbfe23e18ed761c900e7e1f8c09e81c87e0242c05', '[\"*\"]', '2022-09-04 12:20:46', '2022-09-04 07:14:36', '2022-09-04 12:20:46'),
(12, 'App\\User', 1, 'myapptoken', 'c7f15b46e38117e5e8c1c7fecc8d3e6b4f357ddccfa0be3180d8c30974fd1200', '[\"*\"]', '2022-09-04 13:44:32', '2022-09-04 12:43:50', '2022-09-04 13:44:32'),
(13, 'App\\User', 1, 'myapptoken', '56ef2353ffedccbbb8d7f4cc9636dd06aed96d5fdd36f0117a910a4860afca3a', '[\"*\"]', NULL, '2022-09-04 13:44:37', '2022-09-04 13:44:37'),
(14, 'App\\User', 1, 'myapptoken', 'cd81b09f198e78a3065f5e4d19aa5837813cc2e63e32f9fdb962bdee4fcc3420', '[\"*\"]', NULL, '2022-09-04 13:51:11', '2022-09-04 13:51:11'),
(15, 'App\\User', 1, 'myapptoken', '944aaeed9d6c058936d542afe9c6dda294f89d3a170dd5d18973f547210bfc46', '[\"*\"]', NULL, '2022-09-04 13:58:28', '2022-09-04 13:58:28'),
(16, 'App\\User', 1, 'myapptoken', '69493e280ec609978f2dd8897cf74cc44a670f6e201d642e2c66c67e61b5c23d', '[\"*\"]', NULL, '2022-09-04 13:59:49', '2022-09-04 13:59:49'),
(17, 'App\\User', 1, 'myapptoken', '3fb509ff93623c4482aac3b7ba0554021076152cd1c4a7c02af71c56e97ee7c5', '[\"*\"]', '2022-09-04 14:09:51', '2022-09-04 13:59:59', '2022-09-04 14:09:51'),
(18, 'App\\User', 1, 'myapptoken', 'd9c0a7df7476f01407ce0d68e3ab512163e91afb8c61e248a3d53d00afbe1e60', '[\"*\"]', '2022-09-04 14:13:59', '2022-09-04 14:11:07', '2022-09-04 14:13:59'),
(19, 'App\\User', 1, 'myapptoken', '83a0cab20ae9a1ed99fe01de4d927e629c84fd03470b5057c0d66b4e576d5e34', '[\"*\"]', NULL, '2022-09-04 14:20:37', '2022-09-04 14:20:37'),
(20, 'App\\User', 1, 'myapptoken', '508ab90ef98a8503acbdcfbf681655b53320c9ccabdafaf6054bc581c29b7426', '[\"*\"]', NULL, '2022-09-04 14:21:14', '2022-09-04 14:21:14'),
(21, 'App\\User', 1, 'myapptoken', 'e8c8551637ebfb223492e99208f8b38ef31f846eb697d48494d5d48313a69048', '[\"*\"]', '2022-09-04 14:37:33', '2022-09-04 14:37:30', '2022-09-04 14:37:33');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `s_token` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `s_token`) VALUES
(1, 'test', 'admin@admin.com', NULL, '$2y$10$Tu8wohuIaT3OMo2RKVo53.l1qRJ4JT5xRri20Zdsfppqt7kRdYo22', 'TOCcFOr7M3Z77bXZ27haIAgH31WmPkMUeDWfSJ0KNq1dyQ1lVUWrEno0e3de', '2022-09-03 00:25:18', '2022-09-04 14:37:30', '21|dNZkDpOjhw6LxFGKhzRLjdxfAKmeAqI5wbSkQSQu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
