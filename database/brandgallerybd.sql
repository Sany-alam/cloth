-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 01:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandgallerybd`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Hello Word',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'lorem ipsum doller teller botkisu etcettrera',
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hello Word', 'lorem ipsum doller teller botkisu etcettrera', 'banner1.jpg', '2020-07-14 05:05:59', '2020-07-14 05:05:59'),
(2, 'Brand gallery', 'lorem ipsum doller teller botkisu etcettrera', 'banner2.jpg', '2020-07-14 05:06:00', '2020-07-14 05:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `domain_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Top Wear', 'top-wear', '2020-07-14 05:06:00', '2020-07-14 05:06:00'),
(2, 1, 'Bottom Wear', 'bottom-wear', '2020-07-14 05:06:01', '2020-07-14 05:06:01'),
(3, 1, 'Foot Wear', 'foot-wear', '2020-07-14 05:06:01', '2020-07-14 05:06:01'),
(4, 1, 'Sports & Active Wear', 'sports-active-wear', '2020-07-14 05:06:01', '2020-07-14 05:06:01'),
(5, 1, 'Fashion Accessories', 'fashion-accessories', '2020-07-14 05:06:01', '2020-07-14 05:06:01'),
(6, 2, 'Bangladeshi & Fusion Wear', 'bangladeshi-fusion-wear', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(7, 2, 'Foot Wear', 'foot-wear', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(8, 2, 'Lingerie & Sleepwear', 'lingerie-sleepwear', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(9, 3, 'Boys Clothing', 'boys-clothing', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(10, 3, 'Girls Clothing', 'girls-clothing', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(11, 3, 'Boys Footwear', 'boys-footwear', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(12, 3, 'Girls Footwear', 'girls-footwear', '2020-07-14 05:06:02', '2020-07-14 05:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '018762652654', 'johndoe@gmail.com', '2020-07-14 05:05:58', '2020-07-14 05:05:58'),
(2, 'Mark zuckerberg', '0183525645', 'zuckerberg@gmail.com', '2020-07-14 05:05:59', '2020-07-14 05:05:59'),
(3, 'Bill Gates', '0184548697', 'Gates@gmail.com', '2020-07-14 05:05:59', '2020-07-14 05:05:59'),
(4, 'Newton', '01875896321', 'Newton@gmail.com', '2020-07-14 05:05:59', '2020-07-14 05:05:59'),
(5, 'Lorem Ipsan', '01878958697', 'Ipsan@gmail.com', '2020-07-14 05:05:59', '2020-07-14 05:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'men', '2020-07-14 05:06:00', '2020-07-14 05:06:00'),
(2, 'Women', 'women', '2020-07-14 05:06:00', '2020-07-14 05:06:00'),
(3, 'Kids', 'kids', '2020-07-14 05:06:00', '2020-07-14 05:06:00');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'jeans1.jpg', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(2, 2, 'jeans1.jpg', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(3, 3, 'jeans1.jpg', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(4, 4, 'jeans1.jpg', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(5, 5, 'jeans1.jpg', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(6, 6, 'jeans1.jpg', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(7, 7, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(8, 8, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(9, 9, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(10, 10, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(11, 11, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(12, 12, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(13, 13, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(14, 14, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(15, 15, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(16, 16, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(17, 17, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(18, 18, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(19, 19, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09'),
(20, 20, 'jeans1.jpg', '2020-07-14 05:06:09', '2020-07-14 05:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_19_000000_create_domains_table', 1),
(5, '2020_06_07_002025_create_categories_table', 1),
(6, '2020_06_07_012025_create_subcategories_table', 1),
(7, '2020_06_07_042933_create_products_table', 1),
(8, '2020_06_07_051600_create_images_table', 1),
(9, '2020_06_08_222721_create_banners_table', 1),
(10, '2020_06_16_091201_create_couriers_table', 1),
(11, '2020_06_17_194726_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `courier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `payment_methode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_confirmation` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Order in queue',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `weight` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `fabric` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `stock` tinyint(1) DEFAULT 0,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `name`, `slug`, `price`, `size`, `weight`, `fabric`, `stock`, `description`, `brand`, `color`, `created_at`, `updated_at`) VALUES
(1, 7, 'fada jeans', 'fada-jeans', 0.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(2, 7, 'shada jeans', 'shada-jeans', 110.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(3, 7, 'kala jeans', 'kala-jeans', 220.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(4, 7, 'nil jeans', 'nil-jeans', 330.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(5, 7, 'fada jeans', 'fada-jeans', 1001.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(6, 7, 'shada jeans', 'shada-jeans', 1111.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(7, 7, 'kala jeans', 'kala-jeans', 1221.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(8, 7, 'nil jeans', 'nil-jeans', 1331.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(9, 7, 'fada jeans', 'fada-jeans', 2002.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(10, 7, 'shada jeans', 'shada-jeans', 2112.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(11, 7, 'kala jeans', 'kala-jeans', 2222.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(12, 7, 'nil jeans', 'nil-jeans', 2332.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(13, 7, 'fada jeans', 'fada-jeans', 3003.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(14, 7, 'shada jeans', 'shada-jeans', 3113.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(15, 7, 'kala jeans', 'kala-jeans', 3223.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(16, 7, 'nil jeans', 'nil-jeans', 3333.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(17, 7, 'fada jeans', 'fada-jeans', 4004.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(18, 7, 'shada jeans', 'shada-jeans', 4114.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(19, 7, 'kala jeans', 'kala-jeans', 4224.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:08', '2020-07-14 05:06:08'),
(20, 7, 'nil jeans', 'nil-jeans', 4334.00, 'M,L', 'none', 'none', 0, NULL, 'none', 'blue,black', '2020-07-14 05:06:08', '2020-07-14 05:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'T-Shirts', 't-shirts', '2020-07-14 05:06:02', '2020-07-14 05:06:02'),
(2, 1, 'Casual Shirts', 'casual-shirts', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(3, 1, 'Formal Shirts', 'formal-shirts', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(4, 1, 'Sweatshirts', 'sweatshirts', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(5, 1, 'Sweaters', 'sweaters', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(6, 1, 'Jackets', 'jackets', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(7, 2, 'Jeans', 'jeans', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(8, 2, 'Casual Trousers', 'casual-trousers', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(9, 2, 'Formal Trousers', 'formal-trousers', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(10, 2, 'Shorts', 'shorts', '2020-07-14 05:06:03', '2020-07-14 05:06:03'),
(11, 2, 'Track Pants & Joggers', 'track-pants-joggers', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(12, 3, 'Casual Shoes', 'casual-shoes', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(13, 3, 'Sports Shoes', 'sports-shoes', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(14, 3, 'Formal Shoes', 'formal-shoes', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(15, 3, 'Sneakers', 'sneakers', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(16, 3, 'Sandals & Floaters', 'sandals-floaters', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(17, 3, 'Flip Flops', 'flip-flops', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(18, 3, 'Socks', 'socks', '2020-07-14 05:06:04', '2020-07-14 05:06:04'),
(19, 4, 'Sports Shoes', 'sports-shoes', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(20, 4, 'Sports Sandals', 'sports-sandals', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(21, 4, 'Active T-Shirts', 'active-t-shirts', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(22, 4, 'Track Pants & Shorts', 'track-pants-shorts', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(23, 4, 'Tracksuits', 'tracksuits', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(24, 4, 'Jackets & Sweatshirts', 'jackets-sweatshirts', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(25, 5, 'Wallets', 'wallets', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(26, 5, 'Belts', 'belts', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(27, 5, 'Mufflers, Scarves & Gloves', 'mufflers-scarves-gloves', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(28, 5, 'Ties, Cufflinks & Pocket Squares', 'ties-cufflinks-pocket-squares', '2020-07-14 05:06:05', '2020-07-14 05:06:05'),
(29, 5, 'Caps & Hats', 'caps-hats', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(30, 6, 'Kurtas & Suits', 'kurtas-suits', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(31, 6, 'Ethnic Dresses', 'ethnic-dresses', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(32, 6, 'Kurtis, Tunics & Tops', 'kurtis-tunics-tops', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(33, 6, 'Skirts & Palazzos', 'skirts-palazzos', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(34, 7, 'Flats', 'flats', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(35, 7, 'Casual Shoes', 'casual-shoes', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(36, 7, 'Heels', 'heels', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(37, 7, 'Boots', 'boots', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(38, 7, 'Sports Shoes & Floaters', 'sports-shoes-floaters', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(39, 8, 'Bras & Lingerie Sets', 'bras-lingerie-sets', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(40, 8, 'Briefs', 'briefs', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(41, 8, 'Shapewear', 'shapewear', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(42, 8, 'Sleepwear & Loungewear', 'sleepwear-loungewear', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(43, 9, 'T-Shirts', 't-shirts', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(44, 9, 'Shirts', 'shirts', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(45, 9, 'Shorts', 'shorts', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(46, 9, 'Jeans', 'jeans', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(47, 9, 'Trousers', 'trousers', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(48, 9, 'Clothing Sets', 'clothing-sets', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(49, 10, 'Dresses', 'dresses', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(50, 10, 'Tops', 'tops', '2020-07-14 05:06:06', '2020-07-14 05:06:06'),
(51, 10, 'Tshirts', 'tshirts', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(52, 10, 'Clothing Sets', 'clothing-sets', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(53, 10, 'Skirts & shorts', 'skirts-shorts', '2020-07-14 05:06:07', '2020-07-14 05:06:07'),
(54, 10, 'Jeans, Trousers & Capris', 'jeans-trousers-capris', '2020-07-14 05:06:07', '2020-07-14 05:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sany', 'mazharulalam26@gmail.com', '01876626011', NULL, 1, '$2y$10$0UDn4Mc4TA/qA/Zy85uvm.69LdKg2xchP/v4VdfKOfComq2CSWJG.', NULL, '2020-07-14 05:05:58', '2020-07-14 05:05:58'),
(2, 'Sabbir', 'Sabbir@gmail.com', '01876625555', NULL, 0, '$2y$10$LP.awGAwPxlIdfmjimXHSurN31kFMHhC.jgJ3wARnLXSo5uLRMdRO', NULL, '2020-07-14 05:05:58', '2020-07-14 05:05:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_domain_id_foreign` (`domain_id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domains_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

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
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_courier_id_foreign` (`courier_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
