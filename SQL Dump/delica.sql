-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2026 at 09:51 AM
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
-- Database: `delica`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Delica Admin', 'delicaadmin@gmail.com', '$2y$12$Twl/DOnwpCnkNJi63ElW8uUUhn2LMx6r4FNKcsIO0asSVOkNMLfri', '2025-12-27 06:12:58', '2025-12-27 06:12:58');

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
('laravel-cache-07b10e29f117b6fd45600e2e3f9bf5c3', 'i:1;', 1767946838),
('laravel-cache-07b10e29f117b6fd45600e2e3f9bf5c3:timer', 'i:1767946838;', 1767946838),
('laravel-cache-a41656a72aec02ab5fbcb3030ec2157b', 'i:1;', 1767936519),
('laravel-cache-a41656a72aec02ab5fbcb3030ec2157b:timer', 'i:1767936519;', 1767936519),
('laravel-cache-c7c4c8b816e42f09086da1eec79d287a', 'i:1;', 1767946173),
('laravel-cache-c7c4c8b816e42f09086da1eec79d287a:timer', 'i:1767946173;', 1767946173),
('laravel-cache-cbf082b30d6e582bad0e33d4dd88d83e', 'i:1;', 1767947426),
('laravel-cache-cbf082b30d6e582bad0e33d4dd88d83e:timer', 'i:1767947426;', 1767947426);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`, `selected`) VALUES
(1, 1, '2026-01-07 02:15:56', '2026-01-07 02:15:56', 1),
(2, 2, '2026-01-07 12:22:03', '2026-01-07 12:22:03', 1),
(3, 3, '2026-01-08 09:41:07', '2026-01-08 09:41:07', 1),
(4, 4, '2026-01-09 00:25:30', '2026-01-09 00:25:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(15, 4, 6, 1, '2026-01-09 00:25:30', '2026-01-09 00:25:30'),
(16, 1, 5, 1, '2026-01-09 00:26:15', '2026-01-09 00:26:15'),
(17, 1, 6, 2, '2026-01-09 00:26:19', '2026-01-09 01:20:42'),
(18, 1, 14, 1, '2026-01-09 03:00:26', '2026-01-09 03:00:26');

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
(4, '2025_12_19_133807_add_two_factor_columns_to_users_table', 1),
(5, '2025_12_19_133853_create_personal_access_tokens_table', 1),
(6, '2025_12_20_044855_add_role_and_approved_to_users_table', 2),
(7, '2025_12_27_104007_create_admins_table', 3),
(8, '2026_01_05_064915_create_orders_table', 4),
(9, '2026_01_05_065029_create_products_table', 4),
(10, '2026_01_05_065042_create_order_items_table', 4),
(11, '2026_01_05_173925_add_category_to_products_table', 5),
(12, '2026_01_05_174429_add_image_to_products_table', 6),
(15, '2026_01_06_155734_create_carts_table', 7),
(16, '2026_01_06_155838_create_cart_items_table', 7),
(17, '2026_01_07_074248_add_profile_image_to_users_table', 7),
(18, '2026_01_07_074820_add_phone_and_address_to_users_table', 8),
(19, '2026_01_07_161136_add_selected_to_carts_table', 9),
(20, '2026_01_08_132729_add_payment_method_to_orders_table', 10),
(21, '2026_01_08_144223_set_default_order_date_on_orders_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `order_date`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 1, 1450.00, '2026-01-08 14:44:22', 'pending', 'COD', '2026-01-08 09:14:22', '2026-01-08 09:14:22'),
(2, 1, 550.00, '2026-01-08 09:22:10', 'confirmed', 'COD', '2026-01-08 09:22:10', '2026-01-08 09:22:10'),
(3, 1, 1750.00, '2026-01-08 09:23:17', 'confirmed', 'COD', '2026-01-08 09:23:17', '2026-01-08 09:23:17'),
(4, 1, 1450.00, '2026-01-08 09:25:27', 'confirmed', 'COD', '2026-01-08 09:25:27', '2026-01-08 09:25:27'),
(5, 2, 1600.00, '2026-01-08 09:29:43', 'confirmed', 'COD', '2026-01-08 09:29:43', '2026-01-08 09:29:43'),
(6, 2, 400.00, '2026-01-08 09:32:54', 'confirmed', 'COD', '2026-01-08 09:32:54', '2026-01-08 09:32:54'),
(7, 2, 400.00, '2026-01-08 09:35:41', 'pending', 'COD', '2026-01-08 09:35:41', '2026-01-08 09:35:41'),
(8, 3, 400.00, '2026-01-08 09:41:44', 'pending', 'COD', '2026-01-08 09:41:44', '2026-01-08 09:41:44'),
(9, 1, 1750.00, '2026-01-08 22:19:08', 'pending', 'COD', '2026-01-08 22:19:08', '2026-01-08 22:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 1200.00, '2026-01-08 09:14:22', '2026-01-08 09:14:22'),
(2, 2, 3, 2, 150.00, '2026-01-08 09:22:10', '2026-01-08 09:22:10'),
(3, 3, 2, 1, 1500.00, '2026-01-08 09:23:17', '2026-01-08 09:23:17'),
(4, 4, 4, 1, 1200.00, '2026-01-08 09:25:27', '2026-01-08 09:25:27'),
(5, 5, 4, 1, 1200.00, '2026-01-08 09:29:43', '2026-01-08 09:29:43'),
(6, 5, 3, 1, 150.00, '2026-01-08 09:29:43', '2026-01-08 09:29:43'),
(7, 6, 3, 1, 150.00, '2026-01-08 09:32:54', '2026-01-08 09:32:54'),
(8, 7, 3, 1, 150.00, '2026-01-08 09:35:41', '2026-01-08 09:35:41'),
(9, 8, 3, 1, 150.00, '2026-01-08 09:41:44', '2026-01-08 09:41:44'),
(10, 9, 6, 1, 1500.00, '2026-01-08 22:19:08', '2026-01-08 22:19:08');

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
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'PostmanToken', '3b55167102c1bec565748d7ed1c9878bf50ae3b4233c576beb061caacb7d1bc3', '[\"*\"]', NULL, NULL, '2026-01-06 12:40:06', '2026-01-06 12:40:06'),
(2, 'App\\Models\\User', 1, 'Postman', 'aeaa725fc1a0728ad8803bb409e1b358c9e70f0a06f01f9e10d3243e11ade197', '[\"*\"]', NULL, NULL, '2026-01-06 12:49:00', '2026-01-06 12:49:00'),
(3, 'App\\Models\\User', 1, 'Postman', '445f01904b4084a424dfd23061c923dd88ca608959dc42683fa9c4b9ef270661', '[\"*\"]', NULL, NULL, '2026-01-07 01:44:36', '2026-01-07 01:44:36'),
(4, 'App\\Models\\User', 1, 'postman-test', '36bf634a4c0e9f1d6403b5aa70a289bc9533c2a3afd6ef8ce36a9b1e7eb5b0df', '[\"*\"]', NULL, NULL, '2026-01-07 05:28:31', '2026-01-07 05:28:31'),
(5, 'App\\Models\\User', 1, 'postman-test', 'eb0b6479d3602462a7324a185b734e4fdaac7af239917d001d4891be95f81a9e', '[\"*\"]', '2026-01-07 05:39:35', NULL, '2026-01-07 05:32:01', '2026-01-07 05:39:35'),
(6, 'App\\Models\\User', 1, 'postman', '0dff1cf7f7cffa77826c823b9c08132c836bef0bfde6fdffb82ed003ee9c00d2', '[\"*\"]', '2026-01-09 00:26:24', NULL, '2026-01-09 00:24:13', '2026-01-09 00:26:24'),
(7, 'App\\Models\\User', 1, 'postman', '66d7173a94aaf57b11c972721def816f7d03870537a2d54b3d60276d53fb1a55', '[\"*\"]', '2026-01-09 00:27:25', NULL, '2026-01-09 00:27:04', '2026-01-09 00:27:25'),
(8, 'App\\Models\\User', 1, 'postman', '8e7808ee2b8ee56b22467b13f7bda593fbedeab7e4d7bdcc08b858aa3f9fd4a4', '[\"*\"]', NULL, NULL, '2026-01-09 00:39:02', '2026-01-09 00:39:02'),
(9, 'App\\Models\\User', 1, 'PostmanToken', 'a1970bb409adb3369276812f0c8e81aa290f80a0637c3d4cec5d4a3e1d165550', '[\"*\"]', NULL, NULL, '2026-01-09 01:02:18', '2026-01-09 01:02:18'),
(10, 'App\\Models\\User', 1, 'PostmanToken', '73f6f529294d7c5cb13f98b47332ce139f2c7d0d19dc6afb6868d1955722a2e0', '[\"*\"]', NULL, NULL, '2026-01-09 01:06:11', '2026-01-09 01:06:11'),
(11, 'App\\Models\\User', 1, 'PostmanToken', '4af44508c84136704d638cdabc2a273766c6a89abd37e86656855c8eca6a5307', '[\"*\"]', '2026-01-09 01:32:58', NULL, '2026-01-09 01:08:16', '2026-01-09 01:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Penne pasta', 'Pasta', 600.00, 'products/wxIdycJSq6w9aZYkWoo3ebRlHoBTEVDaOrgC7jHE.png', 'Penne pasta is a versatile and iconic Italian pasta shape, known for its tubular form and ability to hold sauces well.', 5, '2026-01-05 12:19:28', '2026-01-05 12:19:28'),
(2, 'Olive oil', 'Oil', 1500.00, 'products/XpSZwwirxUp3KWjNGbbn4jLSNAffF4nSnaeTFnOL.jpg', 'Cold-pressed from handpicked olives at peak ripeness, our extra virgin olive oil delivers a rich, golden-green hue and a smooth, well-balanced flavor. With delicate notes of fresh herbs and a gentle peppery finish, it’s perfect for drizzling over salads, enhancing pasta dishes, or elevating your favorite recipes. Packed with natural antioxidants and heart-healthy fats, it’s as nourishing as it is delicious', 5, '2026-01-06 00:15:08', '2026-01-06 00:15:08'),
(3, 'Mars Chocolate', 'Chocolate', 150.00, 'products/Zd5w2MlCHnLFsrfiICgF70XkOoeXLGVKk6C9y5hd.jpg', 'The Mars Chocolate Bar is a classic treat that combines the rich flavors of chocolate, caramel, and nougat.', 5, '2026-01-06 00:15:59', '2026-01-06 00:15:59'),
(4, 'Nutella', 'Chocolate', 1200.00, 'products/VcVzQsKOpQkzhNGmqmd0gaXF04qJGHp8LFGea0x7.jpg', 'Nutella is a popular sweet spread made primarily from hazelnuts, cocoa powder, sugar, and a small amount of vegetable oil. It has a creamy texture and a rich,', 6, '2026-01-06 00:22:43', '2026-01-06 00:22:43'),
(5, 'Coco Mademoiselle CHANEL Parfume', 'Parfume', 12000.00, 'products/1GQsPdwIy02xXdm3BcmlTu0YFpWXNoN9DbuSI4u4.png', 'Coco Mademoiselle by Chanel is a fresh, feminine amber fragrance that embodies the spirit of independence and self-expression.', 6, '2026-01-06 00:24:15', '2026-01-06 00:24:15'),
(6, 'Jordans simply granola', 'Granola', 1500.00, 'products/43j4a5vJt4L5Oqh9Zg4BYPvmrE9l2slPCoJhXvvu.jpg', 'Jordans Simply Granola is a wholesome breakfast option made with 100% natural ingredients. It features a blend of wholegrain rolled oats (81%) and is sweetened with a hint of honey.', 5, '2026-01-08 12:29:42', '2026-01-08 12:29:42'),
(10, 'Chocolate Busket with 5 items', 'Chocolate', 3000.00, 'products/msqminy4A2XwQnZ0wYkPalPoyhTNVSkQs0VKJ9Id.jpg', '2 Mars \r\n2 Cadbury\r\n1 Grape juice\r\n2 Hershey', 5, '2026-01-08 12:43:29', '2026-01-08 12:43:29'),
(11, 'Sauvage perfume', 'Perfume', 3000.00, 'products/ZOivJ1lPQ3gABCnwuXk03Wsjd9j0gCKCHwYn5rdP.webp', 'Dior Sauvage is a bold and sophisticated fragrance that embodies raw freshness and natural strength, inspired by wide-open spaces and the rugged beauty of nature.', 7, '2026-01-09 02:42:05', '2026-01-09 02:42:05'),
(12, 'lays Chips', 'Chips', 300.00, 'products/8GBwcGOGoEOg33GzQQTknMgtfRxjQ09Mk122Bg8J.jpg', 'Lay\'s is one of the world\'s most recognizable snack brands, famous for its thin, crispy potato chips and a massive variety of flavors.', 7, '2026-01-09 02:44:00', '2026-01-09 02:44:00'),
(13, 'The image shows Moser Roth Smooth Milk Chocolate', 'Chocolate', 1000.00, 'products/XeeFlH9VyrW6wp5kQkcsBUa8kSlpsEHXmqvEqtuF.jpg', 'a premium confectionery product known for its rich and creamy texture.', 7, '2026-01-09 02:48:36', '2026-01-09 02:48:36'),
(14, 'Kinder Chocolate', 'Chocolate', 500.00, 'products/CmfRY9CqAVqS8NMO9HXc5nd34PbWGsuCmB20IVuC.webp', 'Nutrition & Ingredients\r\nWhile recipes vary slightly by region, the core components generally include:\r\n\r\nMilk Solids: Usually around 33% (one of the highest in mass-market chocolate).\r\n\r\nCocoa Solids: Around 13%.\r\n\r\nPortion Control: As seen on the box, there are 8 bars inside, each weighing roughly 12.5g.', 8, '2026-01-09 02:51:38', '2026-01-09 02:51:38'),
(15, 'Lindt Lindor Milk Chocolate truffles', 'Chocolate', 600.00, 'products/3h9bBUTi176hkZYFefsTcmItd0ms9nQCNqGVraE1.webp', 'Product Details\r\nType: Milk Chocolate truffles with a smooth melting filling.\r\n\r\nWeight: 200g.\r\n\r\nPackaging: The iconic red hexagonal box featuring a transparent window that shows the individually foil-wrapped truffles.', 8, '2026-01-09 02:52:33', '2026-01-09 02:52:33');

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
('nD6eGxR890fgbpYe7LdfwHCxgYFvyoul3AJclNUN', NULL, '127.0.0.1', 'PostmanRuntime/7.51.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZE9LcmxMc2xuMHhPWFlLd2pSc1hOaktVSWI1SGNuT1lzaGozNDRmdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2N1c3RvbWVyL3Byb2ZpbGUiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767938779),
('wzTkxE9yocNFjZ1R01nf8AkhLjmKvYLMLXIsZpaw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2UyOTFHM3hHcW5VbnFIcmZkbW81RVo1bVV6NDlxbG1Sd2M4ajJGRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lci9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTg6ImN1c3RvbWVyLmRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkYTFhN1FJcE9kc1NVVEpzR0tpYUwwT1cuSjJiLjRRaW1SM3BydkhKYW8uN2ZzVG5QSUVQVjYiO30=', 1767947453);

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
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `is_approved`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'Sumba', 'sumba@gmail.com', NULL, '$2y$12$a1a7QIpOdsSUTJsGKiaL0OW.J2b.4QimR3prvHJao.7fsTnPIEPV6', 'customer', '071035672', 'no 40 hill street', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 22:37:48', '2026-01-07 02:31:32', 'profiles/b2B8q7AZuDUrUdfmZruM0tJNNQa59WY8GYF0Cad4.jpg'),
(2, 'Luna', 'luna@gmail.com', NULL, '$2y$12$zYRzP0kKdCeFiCej4ZDq9.j.5c.W7VFsAONCM/aFIMM0BkVGMOT4G', 'customer', '0714672935', 'no 39 Lake road mirissawala', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 22:42:08', '2026-01-08 09:29:31', NULL),
(3, 'Mimosa', 'mimosa@gmail.com', NULL, '$2y$12$HLfbLPW6f.Kyl7Uw1jTJOOCKcYtAO7LiNsPhmJn6h6YserTVdi7Ty', 'customer', '0713472493', 'No 13/A malbe Rd', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 23:21:44', '2026-01-08 09:41:03', NULL),
(4, 'ST Products', 'stproducts@gmail.com', NULL, '$2y$12$gultAFMsKECo1Oyopja.cuZ5bO6eCX8L171/QVqLSZmOa1EYZ3T/S', 'customer', '0746326943', 'No oak wood street', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 23:33:43', '2026-01-08 23:58:11', NULL),
(5, 'Cherry', 'cherry@gmail.com', NULL, '$2y$12$b1x1R1/XO8J.SL76WxlRBOptIsaoxBWGx/D0q0gdNgV5uDERysGs.', 'provider', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 23:37:03', '2026-01-05 00:54:14', NULL),
(6, 'Labanda', 'laban@gmail.com', NULL, '$2y$12$br.f9nAX9QygUwPRi/1H4OX8LhtCeuy7Il09rREl5M1/tgqVuhrUC', 'provider', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-05 03:11:40', '2026-01-06 00:20:17', NULL),
(7, 'Shila', 'shila@gmail.com', NULL, '$2y$12$Bl7IDS2N27//H6jl/ga9H.sNf9aqw68w.VkG6eyDPfe5MMEU/P7Hy', 'provider', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-09 02:35:35', '2026-01-09 02:39:18', NULL),
(8, 'Mina', 'mina@gmail.com', NULL, '$2y$12$qQrQvnME.wKZzKXE1gUxqOpDzHPel6QqM1jIxYOefa8cSMLP1AZoe', 'provider', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-09 02:37:23', '2026-01-09 02:39:16', NULL),
(9, 'Monara', 'monara@gmail.com', NULL, '$2y$12$SV6v4RksM4OSknqqXkXWk.YogHfAqkO5mm32Ke80dI7PNrglNMhgO', 'provider', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-09 02:37:59', '2026-01-09 02:39:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_created_by_foreign` (`created_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
