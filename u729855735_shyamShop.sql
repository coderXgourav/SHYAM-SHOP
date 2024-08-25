-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2024 at 05:18 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u729855735_shyamShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `username`, `email`, `password`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'Gourav', 'gourav', 'admin@gmail.com', 'Admin@2024', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_admin` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` text NOT NULL,
  `category_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_admin`, `category_name`, `category_image`, `category_active`, `created_at`, `updated_at`) VALUES
(1, '1', 'oneTabmak', '1713965967.webp', 1, '2024-04-24 12:39:28', '2024-04-24 14:45:40'),
(3, '1', 'dd', '1714036169.webp', 1, '2024-04-25 08:09:29', '2024-04-25 08:09:29'),
(4, '4', 'testeey', '1714041029.webp', 1, '2024-04-25 09:30:29', '2024-04-25 09:30:29'),
(5, '4', 'new category', '1714372664.png', 1, '2024-04-29 01:07:44', '2024-04-29 01:07:44'),
(6, '4', 'test', '1714731450.webp', 1, '2024-05-03 04:47:30', '2024-05-03 04:47:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_12_132413_create_seller_table', 1),
(6, '2024_04_22_123433_create_category_table', 1),
(10, '2024_04_29_073131_create_product_table', 2),
(11, '2024_05_03_091513_create_admins_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` bigint(20) UNSIGNED NOT NULL,
  `product_admin` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `product_category_id` text NOT NULL,
  `description` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `product_admin`, `title`, `product_category_id`, `description`, `images`, `price`, `quantity`, `product_status`, `created_at`, `updated_at`) VALUES
(1, '4', 'this is testing title', '5', '<p>this is tesing description </p>', '[\"679093.webp\"]', 15.00, 132, 1, '2024-04-29 05:49:15', '2024-05-01 08:25:31'),
(4, '4', 'this  is test', '5', NULL, '[\"819852.webp\"]', 12.00, 12, 1, '2024-04-29 07:16:21', '2024-04-29 07:16:21'),
(5, '4', 'test update', '4', NULL, '[\"132279.webp\"]', 420.00, 45, 1, '2024-05-01 08:26:12', '2024-05-01 08:26:50'),
(6, '4', 'HI', '5', NULL, '[\"305620.webp\"]', 15.00, 12, 1, '2024-05-03 04:51:26', '2024-05-03 04:51:26'),
(7, '4', 'Rice and roni', '6', NULL, '[\"504894.jpg\"]', 10.00, 10, 1, '2024-08-16 18:11:17', '2024-08-16 18:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerId` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerId`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'test', 'test@gmail.com', 'eyJpdiI6Ikt1WGk0aXRkV09CWGhXU3pRak4vMkE9PSIsInZhbHVlIjoiSm84NjB2R3o3eWJyZzZlV09tenlBUT09IiwibWFjIjoiN2I3NWMzOGI3OGIyZTFkNTAwYjQ1MThmYTQyYzVmMWJhYTI2YzNkYzIzNTdlNjhmMDkxZDEyMWEwZmI2YWFkMSIsInRhZyI6IiJ9', '2024-04-25 09:11:58', '2024-04-25 09:11:58'),
(4, 'Gourav1', 'gourav@gmail.com', 'eyJpdiI6ImZPY0N1aGZQclFnSk1kK3ZtUVhweFE9PSIsInZhbHVlIjoiUFNXZXJFTWtiRzBIYWF4NUJNU1VONjVVSTVxS3FhbmkxOUJxRklPa1ZmND0iLCJtYWMiOiIwOGE5NTY2OGY2YWUxYjUwOTU3MGZkMmRjMTU1MjEwOGM3NDQ3ZTY2MTRlNTM3ZmU2NWJmNmViNGE2NTBiZGVhIiwidGFnIjoiIn0=', '2024-04-25 09:14:48', '2024-04-29 07:19:44'),
(5, 'gourav', 'test6@gmail.com', 'eyJpdiI6InFBSVRNWW53T3kwM3FNOU5lZHYvZWc9PSIsInZhbHVlIjoiMW83eHJBTllJbWxyb2hOR002NENOQT09IiwibWFjIjoiNTk5ZmJlZWMxNjFkZjMxMWZkZmYxYzg0NjVmMTVkMjIyNmU2OWUxZmE3MGI0MTQ5MWUyNTE4OTg3NzJkNmViZiIsInRhZyI6IiJ9', '2024-05-03 01:20:01', '2024-05-03 01:20:01'),
(6, 'testtt', 'testq@gmail.com', 'eyJpdiI6IlVOa1RGSVVqWFFyQXEwNDhyS1NCM0E9PSIsInZhbHVlIjoiK3FXOXMwQUwzRDNTSnVXc0JXd2ZLZz09IiwibWFjIjoiMmJjYzdiOTI5MDdlNDJjNGJkMDExOTFkNWIxMmRjMmM2YjczODk4M2VlZDc3MDQ1MzFmOTdlY2I1OWQzMGMxZSIsInRhZyI6IiJ9', '2024-05-03 01:21:39', '2024-05-03 01:21:39'),
(7, 'dfdsfasfas', 'fasfasfsaf@gmail.com', 'eyJpdiI6ImhTWnF0dm9hVzFubEpteFd5L2kvREE9PSIsInZhbHVlIjoidnFWTFBZVGRWdXREcnNodWJiZ0Vkdz09IiwibWFjIjoiYTFjYjJlMWFlODU4MjM2ODNjNDFkZDZkYTJlMzlhMTEwOTYzNjgzNGE2MzVkMTNiMWY2MDZlZTBlNzk1YzU0YSIsInRhZyI6IiJ9', '2024-05-03 01:33:06', '2024-05-03 01:33:06'),
(8, 'test9', 'test9@gmail.com', 'eyJpdiI6IlpZcDJZVlNNVjdsSkVHNDZ4dmdueEE9PSIsInZhbHVlIjoiMExjZmt4Nk4yaThjUVdxSmFDYWtJdz09IiwibWFjIjoiOGM3NWY4MDM3ZjcyYjVkMTM4MGE1MjY3ODJkZDVjMzllMDgxYjk5NmUyZmUzMjdiNTVjYjVhOTZmN2ZiM2FlYyIsInRhZyI6IiJ9', '2024-05-03 01:46:51', '2024-05-03 01:46:51'),
(9, 'testing', 'testing@gmail.com', 'eyJpdiI6InAvQ0Jza3lGMyt4T2xPSG5HL1NlSFE9PSIsInZhbHVlIjoiTWxlNXpNT0pjMHhWSGYvRkFrb3FQUT09IiwibWFjIjoiYjIwYjRhNmJjODUyZDA0NjZkYTljMjRjOGQ5OWU1NGMwMDRiMTAyMWI5YzhkZWY2MWI3MWNhMjZkNzE3MzRlNSIsInRhZyI6IiJ9', '2024-05-03 11:38:02', '2024-05-03 11:38:02'),
(10, 'john', 'neel@kyptronix.us', 'eyJpdiI6Ik5IV2VnbVNYajA5RzRDK1RTN045VFE9PSIsInZhbHVlIjoiQ09jbWZMNmQzYnl6NU53VTNvVVVnZll2TFZKeFJzMzBwQzBDSzV4OUJ5WT0iLCJtYWMiOiI0ZjhjZGY5MTFmYjYxNTkyODE4MTliNmEwNzA4MDUxNzY2MWYzYTI3NWIyYmFlNDQ3NDUxY2U2OWY5ZGMzOTVlIiwidGFnIjoiIn0=', '2024-05-03 20:11:19', '2024-05-03 20:11:19'),
(11, 'Jhon', 'john@gmail.com', 'eyJpdiI6Im9ldnhUeFE3TzF0aDd5aHFhOEhveFE9PSIsInZhbHVlIjoiV0h5dWJDWEJwVUkraVZtVzlHZ2xhUT09IiwibWFjIjoiYmExMzZkZDAzZjY2NzYyYTk5MWY4ZjAwNTllMjYzMzU1MGJhNjRjYjU2ODVjZjk5NjU3MWFkMWY3NGI2ZDU2ZSIsInRhZyI6IiJ9', '2024-05-09 11:04:46', '2024-05-09 11:04:46'),
(12, 'test1', 'testing1@gmail.com', 'eyJpdiI6IkVQSm9OSVdmTFQ3V0xISHFrSmVvOGc9PSIsInZhbHVlIjoiQ3M4VjJxelFmQWM3Tm5sRDhxdVVxQT09IiwibWFjIjoiODk5MmNjNTBiZWNjMzk5ZjM5OWEwYjczOTliMTUwZTMwNGRjMzQ1MzY4YTgwNzFlOGZlZDdhNmMyNDJhMThkMyIsInRhZyI6IiJ9', '2024-05-09 11:05:33', '2024-05-09 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerId`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellerId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
