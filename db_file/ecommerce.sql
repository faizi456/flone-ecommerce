-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 05:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_auths`
--

CREATE TABLE `admin_auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_auths`
--

INSERT INTO `admin_auths` (`id`, `name`, `email`, `password`, `image`, `admin_role`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'admin@gmail.com', '$2y$10$m1LTX2XsfVwmCNxDvq2RLeljDH.lDiIqg/yso/obN8cMVcWqwbcTK', NULL, NULL, '2022-07-18 18:58:47', '2022-07-18 18:58:47'),
(4, 'Faiza Sharif', 'step.faizasharif@gmail.com', '$2y$10$1jFUrpNwIvAn22.mfrBYHO0I7jN6WDKsW.C.ZJobQSKJArZ6dZam.', NULL, 'Manager', '2022-07-19 08:34:30', '2022-07-19 08:34:30'),
(5, 'Noor', 'noor@gmail.com', '$2y$10$gDsdvW7vN0AMoNFiGDmrd.l9jx4mXFeP8niIt49VuAuSJpprmRUIe', NULL, 'Employee', '2022-07-19 08:35:49', '2022-07-19 08:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Size', '2022-08-08 14:27:31', '2022-08-08 14:27:31'),
(3, 'Color', '2022-08-08 14:28:22', '2022-08-08 14:28:22'),
(6, 'dummy', '2022-08-10 07:00:10', '2022-08-10 07:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attr_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attr_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 3, 'Black', '2022-08-10 03:18:49', '2022-08-10 03:18:49'),
(2, 3, 'White', '2022-08-10 04:50:26', '2022-08-10 04:50:26'),
(6, 6, 'abc', '2022-08-10 07:12:14', '2022-08-10 07:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitPrice` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srp` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_type`, `product_code`, `product_name`, `unitPrice`, `srp`, `mac`, `created_at`, `updated_at`) VALUES
(18, 59, 'Single Product', 'PC-2008', 'Casual Wear', '3000', '4000', '84-7B-EB-35-D4-A3', '2022-08-11 08:04:18', '2022-08-11 08:04:18'),
(20, 51, 'Single Product', 'PC-2001', 'Jigswar women shirts', '2000', '2500', '84-7B-EB-35-D4-A3', '2022-08-11 08:18:54', '2022-08-11 08:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(27, 'Apparel', 'Apparel is just another word for what you wear', '2022-08-07 11:17:48', '2022-08-07 11:17:48'),
(28, 'Jewellery', 'decorative items worn for personal adornment', '2022-08-07 11:18:27', '2022-08-07 11:18:27'),
(29, 'Shoes', 'footwear intended to protect and comfort the human foot.', '2022-08-07 11:18:47', '2022-08-07 11:18:47');

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
(5, '2022_06_19_153350_create_categories_table', 1),
(6, '2022_06_20_132632_create_suppliers_table', 2),
(7, '2022_06_21_041036_create_subcategories_table', 3),
(8, '2022_06_22_174116_create_products_table', 4),
(9, '2022_07_06_090455_create_admin_auths_table', 4),
(10, '2022_07_06_130902_create_admin_auths_table', 5),
(11, '2022_07_19_135434_create_attributes_table', 6),
(12, '2022_07_20_110540_create_products_table', 7),
(13, '2022_07_20_111007_create_products_table', 8),
(14, '2022_07_20_123909_create_variations_table', 9),
(15, '2022_08_08_172011_create_attributes_table', 10),
(16, '2022_08_08_172154_create_attribute_values_table', 10),
(17, '2022_08_10_145617_create_carts_table', 11);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainCategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantityType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type`, `product_name`, `product_code`, `description`, `mainCategory`, `subCategory`, `supplier`, `size`, `color`, `unitPrice`, `srp`, `quantityType`, `stock`, `images`, `status`, `created_at`, `updated_at`) VALUES
(50, 'Single Product', 'Ariat T-Shirt', 'PC-2000', 'business clothes and attire for the executive and professional work place', '27', '20', '8', NULL, NULL, '1000', '1200', 'Single', '20', '/storage/products/9161ab7a1b61012c4c303f10b4c16b2c.jpg,/storage/products/d57edf2d2082b0865e15d11edaecdb20.jpg', '1', '2022-08-07 11:42:09', '2022-08-07 11:42:09'),
(51, 'Single Product', 'Jigswar women shirts', 'PC-2001', 'personal attire : clothing of a particular kind', '27', '21', '8', NULL, NULL, '2000', '2500', 'Single', '30', '/storage/products/cc3f5463bc4d26bc38eadc8bcffbc654.jpg,/storage/products/bd0cc810b580b35884bd9df37c0e8b0f.jpg', '1', '2022-08-07 11:47:08', '2022-08-07 11:47:08'),
(52, 'Variation Product', 'Gucci sports wear', 'PC-2002', 'Sportswear or active wear is clothing, including footwear, worn for sport or physical exercise.', '27', '22', '8', 'Large,Small', 'a:2:{s:5:\"Large\";s:4:\"Grey\";s:5:\"Small\";s:5:\"Black\";}', 'a:2:{s:5:\"Large\";s:4:\"1700\";s:5:\"Small\";s:4:\"1900\";}', 'a:2:{s:5:\"Large\";s:4:\"2400\";s:5:\"Small\";s:4:\"2200\";}', 'a:2:{s:5:\"Large\";s:6:\"Single\";s:5:\"Small\";s:6:\"Single\";}', 'a:2:{s:5:\"Large\";s:1:\"8\";s:5:\"Small\";s:1:\"5\";}', '/storage/products/e8b1cbd05f6e6a358a81dee52493dd06.jpg,/storage/products/4747f5ca63b8e8bd670b26e4b1573961.jpg,/storage/products/dc0439caeb74ffc2795571af07a7eab1.jpg,/storage/products/24bfde45b5790f04b1d096565157f6a4.jpg', '1', '2022-08-07 12:26:09', '2022-08-07 12:26:09'),
(54, 'Variation Product', 'Antique Jewellery', 'PC-2003', 'jewellery made around 1920 or before is technically antique.', '28', '23', '8', 'Common,Common', 'a:1:{s:6:\"Common\";s:6:\"Yellow\";}', 'a:1:{s:6:\"Common\";s:3:\"600\";}', 'a:1:{s:6:\"Common\";s:4:\"1000\";}', 'a:1:{s:6:\"Common\";s:6:\"Single\";}', 'a:1:{s:6:\"Common\";s:1:\"5\";}', '/storage/products/eb1e78328c46506b46a4ac4a1e378b91.jpg,/storage/products/5c5a93a042235058b1ef7b0ac1e11b67.jpg', '1', '2022-08-07 12:41:25', '2022-08-07 12:41:25'),
(55, 'Variation Product', 'Latest Temple jewellery', 'PC-2004', 'Temple Jewellery is a kind of Ethnic Jewellery which is designed in various forms of Gods and Goddesses', '28', '24', '8', 'Common,Common', 'a:1:{s:6:\"Common\";s:6:\"golden\";}', 'a:1:{s:6:\"Common\";s:4:\"5000\";}', 'a:1:{s:6:\"Common\";s:4:\"7000\";}', 'a:1:{s:6:\"Common\";s:1:\"8\";}', 'a:1:{s:6:\"Common\";s:2:\"10\";}', '/storage/products/5588902a8054f6e22ed3484c140ffc62.jpg,/storage/products/1f50d0737a738a9ba3206543d1102cbc.jpg', '1', '2022-08-07 12:47:01', '2022-08-07 12:47:01'),
(56, 'Variation Product', 'Jogging Shoes', 'PC-2005', 'Jogging shoes reduce foot stress, multiplying running performance.', '29', '17', '8', 'Large,Medium', 'a:2:{s:5:\"Large\";s:5:\"Black\";s:6:\"Medium\";s:4:\"Blue\";}', 'a:2:{s:5:\"Large\";s:3:\"900\";s:6:\"Medium\";s:3:\"700\";}', 'a:2:{s:5:\"Large\";s:4:\"1200\";s:6:\"Medium\";s:3:\"800\";}', 'a:2:{s:5:\"Large\";s:1:\"4\";s:6:\"Medium\";s:1:\"6\";}', 'a:2:{s:5:\"Large\";s:1:\"6\";s:6:\"Medium\";s:1:\"8\";}', '/storage/products/8ce8b102d40392a688f8c04b3cd6cae0.jpg,/storage/products/b0ba5c44aaf65f6ca34cf116e6d82ebf.jpg', '1', '2022-08-07 12:49:58', '2022-08-07 12:49:58'),
(57, 'Variation Product', 'The Trail running shoes', 'PC-2006', 'Trail shoes are designed to protect you from rocks and debris.', '29', '18', '8', 'Large,Small', 'a:2:{s:5:\"Large\";s:5:\"Black\";s:5:\"Small\";s:3:\"Red\";}', 'a:2:{s:5:\"Large\";s:4:\"2000\";s:5:\"Small\";s:4:\"1300\";}', 'a:2:{s:5:\"Large\";s:4:\"2300\";s:5:\"Small\";s:4:\"1700\";}', 'a:2:{s:5:\"Large\";s:5:\"Pairs\";s:5:\"Small\";s:5:\"Pairs\";}', 'a:2:{s:5:\"Large\";s:2:\"80\";s:5:\"Small\";s:2:\"40\";}', '/storage/products/5ec829debe54b19a5f78d9a65b900a39.jpg,/storage/products/ddf9029977a61241841edeae15e9b53f.jpg,/storage/products/90248d0a98105fa534cf2b0696ddd12f.jpg,/storage/products/a03fa30821986dff10fc66647c84c9c3.jpg', '1', '2022-08-07 12:53:34', '2022-08-07 12:53:34'),
(58, 'Variation Product', 'Part wear shoes', 'PC-2007', 'Shoe to be worn at smart casual or more formal events.', '29', '19', '8', 'Medium,Small', 'a:2:{s:6:\"Medium\";s:5:\"Black\";s:5:\"Small\";s:5:\"Black\";}', 'a:2:{s:6:\"Medium\";s:4:\"3900\";s:5:\"Small\";s:4:\"3300\";}', 'a:2:{s:6:\"Medium\";s:4:\"4600\";s:5:\"Small\";s:4:\"3800\";}', 'a:2:{s:6:\"Medium\";s:5:\"Pairs\";s:5:\"Small\";s:5:\"Pairs\";}', 'a:2:{s:6:\"Medium\";s:2:\"46\";s:5:\"Small\";s:2:\"50\";}', '/storage/products/b837305e43f7e535a1506fc263eee3ed.jpg,/storage/products/958ad0d05d3259750be0b041d10adbb1.jpeg,/storage/products/2e74c2cf88f68a68c84e9509abc7ea56.jpg,/storage/products/cffb6e2288a630c2a787a64ccc67097c.jpg', '1', '2022-08-07 12:56:52', '2022-08-07 12:56:52'),
(59, 'Single Product', 'Casual Wear', 'PC-2008', 'Western dress code that is relaxed, occasional, spontaneous and suited for everyday use.', '27', '21', '8', NULL, NULL, '3000', '4000', 'Single', '30', '/storage/products/8ca696ca160520b1cf5a569b4be525e8.jpg,/storage/products/3f504658ddff2e41061b89bdc726a160.jpg,/storage/products/3fe230348e9a12c13120749e3f9fa4cd.jpg', '1', '2022-08-07 13:00:52', '2022-08-07 13:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_id` bigint(20) UNSIGNED NOT NULL,
  `subcat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_cat` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_id`, `subcat_name`, `main_cat`, `description`, `created_at`, `updated_at`) VALUES
(17, 'Jogging Shoes', 29, 'Jogging shoes reduce foot stress, multiplying running performance.', '2022-08-07 11:24:37', '2022-08-07 11:24:37'),
(18, 'The Trail running shoes', 29, 'Trail shoes are designed to protect you from rocks and debris.', '2022-08-07 11:26:18', '2022-08-07 11:26:18'),
(19, 'Part wear shoes', 29, 'Shoe to be worn at smart casual or more formal events.', '2022-08-07 11:28:00', '2022-08-07 11:28:00'),
(20, 'Business attire apparel', 27, 'business clothes and attire for the executive and professional work place', '2022-08-07 11:29:07', '2022-08-07 11:29:07'),
(21, 'Casual wear', 27, 'Western dress code that is relaxed, occasional, spontaneous and suited for everyday use.', '2022-08-07 11:29:45', '2022-08-07 11:29:45'),
(22, 'Sports Wear', 27, 'Sportswear or active wear is clothing, including footwear, worn for sport or physical exercise.', '2022-08-07 11:31:03', '2022-08-07 11:31:03'),
(23, 'Antique Jewellery', 28, 'In jewellery trade terms, \'antique\' describes a piece that was made at least 100 years ago. That means that any jewellery made around 1920 or before is technically antique.', '2022-08-07 11:33:50', '2022-08-07 11:33:50'),
(24, 'Temple Jewellery', 28, 'Temple Jewellery is a kind of Ethnic Jewellery which is designed in various forms of Gods and Goddesses', '2022-08-07 11:34:19', '2022-08-07 11:34:19'),
(25, 'Bridal Jewellery', 28, 'Jewellery draws out the best in a bride and upgrades her look instantly.', '2022-08-07 11:35:11', '2022-08-07 11:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(8, 'Common Brand', 'common.brand@gmail.com', '03745632818', '2022-08-07 11:36:28', '2022-08-07 11:36:28');

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
(1, 'Admin', 'admin@gmail.com', NULL, 'admin123', NULL, '2022-07-05 19:18:33', '2022-07-12 19:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productCode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitPrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantityType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attr_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `productCode`, `stock`, `srp`, `unitPrice`, `size`, `color`, `quantityType`, `attr_images`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ECC-V-1', '10', '1000', '200', 'Large', 'Red', 'Pieces', '/storage/products/2fd0fd3efa7c4cfb034317b21f3c2d93.png,/storage/products/1f5795e7b93f423c397e6f7aaff80133.png,/storage/products/d0921d442ee91b896ad95059d13df618.jpg', 1, '2022-07-20 08:49:47', '2022-07-20 08:49:47'),
(4, 'dje5333', '57', '786', '8786', 'kj', 'jhg', 'jgu', '/storage/products/c2e7b5bb0ec8bb7e2aaf8a5516ca5387.jpg,/storage/products/b9ed18a301c9f3d183938c451fa183df.png', NULL, '2022-07-20 10:40:32', '2022-07-20 10:40:32'),
(6, '343876', '7386', '3867', '687', 'mnsngdj', 'msndgjh', 'dmsn', '/storage/products/c03afab54002887e7e1d27a1069e206c.jpg,/storage/products/9abe36658bff8131d5a0923ebc196d0e.png', NULL, '2022-07-20 10:59:01', '2022-07-20 10:59:01'),
(7, 'mhmf', 'hgf', 'vnh', 'mhg', 'nbv', 'mn', 'nbv', '/storage/products/2b323d6eb28422cef49b266557dd31ad.jpg', NULL, '2022-07-20 11:25:31', '2022-07-20 11:25:31'),
(8, 'y545', '7386,57', '7667,876', '767,687', 'hgg,nvhf', 'jsaiu,mgh', 'nbhg,dmsn', '/storage/products/fe2b421b8b5f0e7c355ace66a9fe0206.png,/storage/products/c3a690be93aa602ee2dc0ccab5b7b67e.png,/storage/products/2d5951d1e3b31dfb7fd2dcc172df17fd.png,/storage/products/3cc697419ea18cc98d525999665cb94a.png', NULL, '2022-07-20 20:54:06', '2022-07-20 20:54:06'),
(9, '786hss', '6556,7386,6556', '8764,76876,8764', '687,3938,75576', 'kj,nvhf,mnsngdj', 'hgh,mgh,msndgjhjhffj', 'uiweyi,uiweyi,dmsn', '/storage/products/2172fde49301047270b2897085e4319d.jpg,/storage/products/6fe43269967adbb64ec6149852b5cc3e.png,/storage/products/4275f89744278864da88c2fda68ec4e9.png,/storage/products/b0f2ad44d26e1a6f244201fe0fd864d1.jpg,/storage/products/79cae1be0fbae74dafbf8399ee2209cb.jpg,/storage/products/17d187eaf6157b4e219552d6a187290a.png', NULL, '2022-07-21 00:28:20', '2022-07-21 00:28:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_auths`
--
ALTER TABLE `admin_auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_auths`
--
ALTER TABLE `admin_auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
