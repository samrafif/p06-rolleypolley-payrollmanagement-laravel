-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2025 at 01:59 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p06_rolleypolley_payrollmanagement_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `attendance_date`, `check_in`, `check_out`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-05-14', '14:46:34', '20:52:34', NULL, '2025-05-14 00:46:34', '2025-05-14 00:46:34'),
(3, 3, '2025-05-15', '08:43:58', '16:52:57', NULL, NULL, NULL),
(4, 1, '2025-05-13', '07:32:46', '17:32:46', NULL, '2025-05-15 04:32:46', '2025-05-15 04:32:46'),
(5, 2, '2025-05-09', '09:32:46', '17:32:46', NULL, '2025-05-15 04:32:46', '2025-05-15 04:32:46'),
(6, 3, '2025-05-01', '07:35:04', '17:35:04', NULL, '2025-05-15 04:35:04', '2025-05-15 04:35:04'),
(7, 3, '2025-05-13', '09:35:04', '16:35:04', NULL, '2025-05-15 04:35:04', '2025-05-15 04:35:04'),
(8, 1, '2025-05-15', '13:05:33', '13:23:58', 'late:04_35_33', '2025-05-14 23:05:33', '2025-05-14 23:23:58'),
(9, 2, '2025-05-15', '13:24:04', '13:28:35', 'late:04_54_04', '2025-05-14 23:24:04', '2025-05-14 23:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `name`, `description`, `address`, `created_at`, `updated_at`, `phone`, `currency_prefix`) VALUES
(1, 'PT Rumput Abdullah Jaya Abadi', 'Abdullah Yasir\'s very successful feed business', 'Balls st, Bollocks ave, 1298', '2025-05-11 19:38:38', '2025-05-11 19:38:38', '+62 23028398289392', '$');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Research & Development', NULL, '2025-05-11 19:40:32', '2025-05-11 19:40:32'),
(2, 'Site Security & Safety', NULL, '2025-05-11 19:40:43', '2025-05-11 19:40:43'),
(3, 'Manufacturing', NULL, '2025-05-11 19:41:10', '2025-05-11 19:42:04'),
(4, 'Logistics & Storage', NULL, '2025-05-11 19:42:16', '2025-05-11 19:42:16'),
(5, 'Information Technology', NULL, '2025-05-11 19:42:26', '2025-05-11 19:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire_date` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position_id` bigint UNSIGNED NOT NULL,
  `card_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fullname`, `phone_number`, `hire_date`, `address`, `bank_name`, `bank_number`, `npwp`, `created_at`, `updated_at`, `position_id`, `card_id`) VALUES
(1, 'Abrisam Rafif Maulana', '+6281281091461', '2025-04-07', 'Lippo Cikarang', 'Bank of Indonesia', '983247843', '12-23894TE', '2025-05-11 19:45:58', '2025-05-14 00:46:16', 1, 'EBC3C630'),
(2, 'Jane Doe', '0000000000000', '2025-03-13', 'Null', 'Ethereum Central', '0x71C7656EC7ab88b098defB751B7401B5f6d8976F', '12-23894NTE', '2025-05-11 19:47:20', '2025-05-14 23:18:53', 4, 'F9578B9D'),
(3, 'Von Lycaon', '0000000000000', '2025-04-15', 'New Eridu', 'Central Bank of New Eridu', '2934786233', '12-23894NTE', '2025-05-11 19:48:21', '2025-05-14 23:18:36', 5, '63AE7004');

-- --------------------------------------------------------

--
-- Table structure for table `employee_allowances`
--

CREATE TABLE `employee_allowances` (
  `id` bigint UNSIGNED NOT NULL,
  `allowance_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `effective_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_deductions`
--

CREATE TABLE `employee_deductions` (
  `id` bigint UNSIGNED NOT NULL,
  `deduction_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `leave_type` enum('sakit','cuti','izin','dinas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approval_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_16_041328_create_departments_table', 1),
(5, '2025_04_16_041335_create_employees_table', 1),
(6, '2025_04_16_041343_create_positions_table', 1),
(7, '2025_04_16_041413_create_leaves_table', 1),
(8, '2025_04_16_041424_create_attendances_table', 1),
(9, '2025_04_16_041434_create_overtimes_table', 1),
(10, '2025_04_16_041448_create_salaries_table', 1),
(11, '2025_04_16_041502_create_allowances_table', 1),
(12, '2025_04_16_041516_create_deductions_table', 1),
(13, '2025_04_16_041538_create_taxes_table', 1),
(14, '2025_04_16_041614_create_company_settings_table', 1),
(15, '2025_04_16_073418_modify_employees_table', 1),
(16, '2025_04_16_073434_modify_users_table', 1),
(17, '2025_04_17_063153_update_company_settings_table', 1),
(18, '2025_04_18_031734_create_employee_allowances_table', 1),
(19, '2025_04_18_033205_create_employee_deductions_table', 1),
(20, '2025_04_18_033321_create_payrolls_table', 1),
(21, '2025_04_18_033325_create_payroll_details_table', 1),
(22, '2025_04_24_072149_update_employees_table', 1),
(23, '2025_05_06_033307_update_allowances_table', 1),
(24, '2025_05_06_062338_update_deductions_table', 1),
(25, '2025_05_06_073229_update_taxes_table', 1),
(26, '2025_05_07_132512_update_company_settings_table', 1),
(27, '2025_05_13_021241_create_ran_payrolls_table', 2),
(28, '2025_05_13_021606_update_payroll_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `overtime_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `duration_hours` decimal(5,2) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `payroll_period_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payroll_period_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `payroll_period_start`, `payroll_period_end`, `payment_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, '20', '28', NULL, 'I Don\'t Know', '2025-05-12 18:51:46', '2025-05-12 18:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `payrolls_details`
--

CREATE TABLE `payrolls_details` (
  `id` bigint UNSIGNED NOT NULL,
  `payroll_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `basic_salary` decimal(15,2) NOT NULL,
  `gross_salary` decimal(15,2) NOT NULL,
  `total_deductions` decimal(15,2) NOT NULL,
  `total_taxes` decimal(15,2) NOT NULL,
  `net_salary` decimal(15,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_references` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ran_payroll_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `shift_clock_in_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_duration` int NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `shift_clock_in_time`, `shift_duration`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Lead Researcher', NULL, '08:30', 7, 1, '2025-05-11 19:43:22', '2025-05-11 19:43:22'),
(2, 'Research Technician', NULL, '07:00', 7, 1, '2025-05-11 19:43:46', '2025-05-11 19:43:46'),
(3, 'Research Assistant', NULL, '07:00', 7, 1, '2025-05-11 19:44:20', '2025-05-11 19:44:20'),
(4, 'Head of Security', NULL, '08:30', 7, 2, '2025-05-11 19:44:44', '2025-05-11 19:44:44'),
(5, 'Head of Safety', NULL, '08:30', 7, 2, '2025-05-11 19:44:57', '2025-05-11 19:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `ran_payrolls`
--

CREATE TABLE `ran_payrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `payroll_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `pay_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Copi72uHUKLe79cpM77H1NDzdDxVMoh0ypbSfgEY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUmFablRnN3c3T1NoTkkzaEl6VXRQSkE2emhDTkZOVWljQ0VMbzdyViI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Rhc2hib2FyZC90aW1lLWF0dGVuZGFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747295321);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rate` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `threshold_range` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'Admin Pookie', 'admin@rumputabdul.com', '2025-05-11 19:38:38', '$2y$12$kHVdy7Sxcymc6rAbyOXZe.osJJKiYuHAkOuQURq9v8RP3B9h5HEoG', 1, 'RyvZFmh3M1', '2025-05-11 19:38:38', '2025-05-11 19:38:38', NULL),
(2, 'Jane Doe', 'janedoe@pubsec.gov', NULL, '$2y$12$3qVYE72Kicek2JB6h5...uxCzc3CWDRmk15DyYS99jnO4GVqnc4g6', 0, NULL, '2025-05-11 20:03:58', '2025-05-11 20:03:58', 2),
(3, 'Von Lycaon', 'von.lycaon@victoria-hk.com', NULL, '$2y$12$9a.kt2/YSGgRCsDsKbDDCeUh36vYR42Wa50nwRGoX3LxilU.k.mFy', 0, NULL, '2025-05-11 20:04:10', '2025-05-11 20:04:10', 3),
(4, 'Abrisam Rafif Maulana', 'abrisam.rm@gmail.com', NULL, '$2y$12$oXKRijUVuBtKpUZW5qvaluxeX2D5K3ZdNAYp85rV/ttJv14bGb6zS', 0, NULL, '2025-05-11 20:04:21', '2025-05-11 20:04:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `allowances_name_unique` (`name`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_settings_name_unique` (`name`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deductions_name_unique` (`name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_position_id_foreign` (`position_id`);

--
-- Indexes for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_allowances_allowance_id_foreign` (`allowance_id`),
  ADD KEY `employee_allowances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_deductions_deduction_id_foreign` (`deduction_id`),
  ADD KEY `employee_deductions_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtimes_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolls_details`
--
ALTER TABLE `payrolls_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_details_payroll_id_foreign` (`payroll_id`),
  ADD KEY `payrolls_details_employee_id_foreign` (`employee_id`),
  ADD KEY `payrolls_details_ran_payroll_id_foreign` (`ran_payroll_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_department_id_foreign` (`department_id`);

--
-- Indexes for table `ran_payrolls`
--
ALTER TABLE `ran_payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ran_payrolls_payroll_id_foreign` (`payroll_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taxes_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payrolls_details`
--
ALTER TABLE `payrolls_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ran_payrolls`
--
ALTER TABLE `ran_payrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  ADD CONSTRAINT `employee_allowances_allowance_id_foreign` FOREIGN KEY (`allowance_id`) REFERENCES `allowances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_allowances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  ADD CONSTRAINT `employee_deductions_deduction_id_foreign` FOREIGN KEY (`deduction_id`) REFERENCES `deductions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_deductions_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls_details`
--
ALTER TABLE `payrolls_details`
  ADD CONSTRAINT `payrolls_details_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payrolls_details_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payrolls_details_ran_payroll_id_foreign` FOREIGN KEY (`ran_payroll_id`) REFERENCES `ran_payrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ran_payrolls`
--
ALTER TABLE `ran_payrolls`
  ADD CONSTRAINT `ran_payrolls_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
