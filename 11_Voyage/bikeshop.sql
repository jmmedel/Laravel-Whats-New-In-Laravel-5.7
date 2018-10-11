-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 03:10 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_book` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `content_book`, `created_at`, `updated_at`) VALUES
(4, 'Media title goes here  bike this', '2018-08-05 16:25:50', '2018-08-05 16:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 10, 'NEWS', 'NEWS', '2018-08-01 16:26:26', '2018-08-04 00:52:30'),
(3, NULL, 1, 'KONA', 'kona', '2018-08-04 00:43:51', '2018-08-04 00:43:51'),
(4, NULL, 1, 'Merida', 'merida', '2018-08-04 00:44:06', '2018-08-04 00:44:06'),
(5, NULL, 1, 'Scott', 'scott', '2018-08-04 00:44:30', '2018-08-04 00:44:30'),
(6, NULL, 1, 'Accessories', 'accessories', '2018-08-04 00:44:38', '2018-08-04 00:44:38'),
(7, NULL, 1, 'Specialized', 'specialized', '2018-08-04 00:45:00', '2018-08-04 00:45:00'),
(8, NULL, 1, 'Cannondale', 'cannondale', '2018-08-04 00:45:03', '2018-08-04 00:45:03'),
(9, NULL, 1, 'TREK', 'trek', '2018-08-04 00:45:16', '2018-08-04 00:45:16'),
(10, NULL, 1, 'Santa Cruz', 'santa-cruz', '2018-08-04 00:45:27', '2018-08-04 00:45:27'),
(11, NULL, 1, 'Marin', 'marin', '2018-08-04 00:45:37', '2018-08-04 00:45:37'),
(12, NULL, 1, 'GT', 'gt', '2018-08-04 00:45:55', '2018-08-04 00:45:55'),
(13, NULL, 1, 'Giant', 'giant', '2018-08-04 00:46:06', '2018-08-04 00:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Comment_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `Comment_content`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'start', '2018-08-06 23:03:03', '2018-08-06 23:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'locale', 'text', 'Locale', 0, 1, 1, 1, 1, 0, '', 12),
(12, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '', 12),
(13, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(14, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(15, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '', 3),
(16, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 4),
(17, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(18, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(19, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '', 3),
(20, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 4),
(21, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(22, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, '', 9),
(23, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(24, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(25, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(26, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 4),
(27, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(28, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '', 6),
(29, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(30, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(31, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(32, 5, 'category_id', 'text', 'Category', 0, 0, 1, 1, 1, 0, NULL, 3),
(33, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(34, 5, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, NULL, 5),
(35, 5, 'body', 'text_area', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(36, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(37, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(38, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, NULL, 9),
(39, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, NULL, 10),
(40, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(41, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(42, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(43, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(44, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(45, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(46, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, '', 2),
(47, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 3),
(48, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(49, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 5),
(50, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(51, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 7),
(52, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 8),
(53, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(54, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, '', 10),
(55, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, '', 11),
(56, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, '', 12),
(57, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(58, 7, 'productname', 'text', 'Productname', 0, 1, 1, 1, 1, 1, NULL, 2),
(59, 7, 'productcontent', 'text_area', 'Productcontent', 0, 1, 1, 1, 1, 1, NULL, 3),
(60, 7, 'productprice', 'text', 'Productprice', 0, 1, 1, 1, 1, 1, NULL, 4),
(61, 7, 'WheelSize', 'text', 'WheelSize', 0, 1, 1, 1, 1, 1, NULL, 5),
(62, 7, 'ModelNumber', 'text', 'ModelNumber', 0, 1, 1, 1, 1, 1, NULL, 6),
(63, 7, 'Color', 'color', 'Color', 0, 1, 1, 1, 1, 1, NULL, 7),
(64, 7, 'category_id', 'select_dropdown', 'Category Id', 0, 1, 1, 1, 1, 1, NULL, 8),
(65, 7, 'Wattage', 'text', 'Wattage', 0, 1, 1, 1, 1, 1, NULL, 9),
(66, 7, 'image', 'multiple_images', 'Image', 0, 1, 1, 1, 1, 1, NULL, 10),
(67, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 11),
(68, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 12),
(69, 7, 'product_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(70, 7, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"productname\",\"forceUpdate\":true}}', 13),
(71, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(72, 8, 'content_book', 'text_area', 'Content Book', 0, 1, 1, 1, 1, 1, NULL, 2),
(73, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 3),
(74, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(75, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(76, 9, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, NULL, 2),
(77, 9, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, NULL, 3),
(78, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 4),
(79, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 5),
(80, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(81, 10, 'user_id', 'select_dropdown', 'User Id', 1, 1, 1, 1, 1, 1, NULL, 2),
(82, 10, 'product_id', 'select_dropdown', 'Product Id', 1, 1, 1, 1, 1, 1, NULL, 3),
(83, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 4),
(84, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 5),
(85, 10, 'wishlist_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"books\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(86, 10, 'wishlist_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"productname\",\"pivot_table\":\"books\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(87, 7, 'FrameMaterial', 'text', 'FrameMaterial', 0, 1, 1, 1, 1, 1, NULL, 14),
(88, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(89, 11, 'post_id', 'text', 'Post Id', 0, 1, 1, 1, 1, 1, NULL, 2),
(90, 11, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, NULL, 3),
(91, 11, 'Comment_content', 'text', 'Comment Content', 0, 1, 1, 1, 1, 1, NULL, 4),
(92, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 5),
(93, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, NULL, '2018-08-01 16:26:18', '2018-08-01 16:26:18'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2018-08-01 16:26:18', '2018-08-01 16:26:18'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2018-08-01 16:26:18', '2018-08-01 16:26:18'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2018-08-01 16:26:25', '2018-08-01 16:26:25'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-01 16:26:27', '2018-08-06 23:12:28'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2018-08-01 16:26:28', '2018-08-01 16:26:28'),
(7, 'products', 'products', 'Product', 'Products', NULL, 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-04 16:14:03', '2018-08-04 16:14:03'),
(8, 'books', 'books', 'Book', 'Books', NULL, 'App\\Book', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-05 16:09:28', '2018-08-05 16:09:28'),
(9, 'wishlist', 'wishlist', 'Wishlist', 'Wishlists', NULL, 'App\\Wishlist', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-05 17:53:38', '2018-08-05 17:53:38'),
(10, 'wishlists', 'wishlists', 'Wishlist', 'Wishlists', NULL, 'App\\Wishlist', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-05 18:06:44', '2018-08-05 18:06:44'),
(11, 'comments', 'comments', 'Comment', 'Comments', NULL, 'App\\Comment', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-06 22:53:51', '2018-08-06 22:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-08-01 16:26:19', '2018-08-01 16:26:19'),
(2, 'HOME', '2018-08-02 21:42:00', '2018-08-02 21:42:00'),
(3, 'Footer', '2018-08-03 23:50:14', '2018-08-03 23:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2018-08-01 16:26:19', '2018-08-01 16:26:19', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2018-08-01 16:26:19', '2018-08-01 16:26:19', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2018-08-01 16:26:26', '2018-08-01 16:26:26', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2018-08-01 16:26:27', '2018-08-01 16:26:27', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2018-08-01 16:26:28', '2018-08-01 16:26:28', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2018-08-01 16:26:31', '2018-08-01 16:26:31', 'voyager.hooks', NULL),
(15, 2, 'HOME', '/', '_blank', NULL, '#000000', NULL, 15, '2018-08-02 21:42:25', '2018-08-02 21:42:25', NULL, ''),
(16, 2, 'All Categories', '/category', '_blank', NULL, '#000000', NULL, 16, '2018-08-02 21:43:47', '2018-08-07 18:17:27', NULL, ''),
(17, 2, 'NEWS', '/news', '_blank', NULL, '#000000', NULL, 17, '2018-08-02 21:53:30', '2018-08-07 18:17:48', NULL, ''),
(18, 2, 'Contact Us', '/contact', '_blank', NULL, '#000000', NULL, 18, '2018-08-02 21:53:57', '2018-08-07 18:18:17', NULL, ''),
(19, 3, 'HOME', '', '_self', NULL, '#000000', NULL, 1, '2018-08-03 23:50:42', '2018-08-07 18:24:29', NULL, ''),
(20, 3, 'NEWS', '/news', '_self', NULL, '#000000', NULL, 3, '2018-08-03 23:50:51', '2018-08-07 18:24:42', NULL, ''),
(21, 3, 'CATEGORES', '/category', '_self', NULL, '#000000', NULL, 2, '2018-08-03 23:57:43', '2018-08-07 18:24:48', NULL, ''),
(22, 3, 'CONTACT US', '/contact', '_self', NULL, '#000000', NULL, 4, '2018-08-03 23:58:01', '2018-08-07 18:24:55', NULL, ''),
(23, 1, 'Products', '', '_self', 'voyager-basket', '#000000', NULL, 23, '2018-08-04 16:14:04', '2018-08-04 16:18:30', 'voyager.products.index', 'null'),
(24, 1, 'Books', '', '_self', 'voyager-truck', '#000000', NULL, 24, '2018-08-05 16:09:33', '2018-08-05 18:56:53', 'voyager.books.index', 'null');

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
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2018-08-01 16:26:29', '2018-08-01 16:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@Stores2.com', '$2y$10$oYURGJQC4Fq/tiMH52IjluznwLec6IARYFM/zH864Kl72FCU9lo0a', '2018-08-07 17:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(2, 'browse_bread', NULL, '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(3, 'browse_database', NULL, '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(4, 'browse_media', NULL, '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(5, 'browse_compass', NULL, '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(6, 'browse_menus', 'menus', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(7, 'read_menus', 'menus', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(8, 'edit_menus', 'menus', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(9, 'add_menus', 'menus', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(10, 'delete_menus', 'menus', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(11, 'browse_roles', 'roles', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(12, 'read_roles', 'roles', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(13, 'edit_roles', 'roles', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(14, 'add_roles', 'roles', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(15, 'delete_roles', 'roles', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(16, 'browse_users', 'users', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(17, 'read_users', 'users', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(18, 'edit_users', 'users', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(19, 'add_users', 'users', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(20, 'delete_users', 'users', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(21, 'browse_settings', 'settings', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(22, 'read_settings', 'settings', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(23, 'edit_settings', 'settings', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(24, 'add_settings', 'settings', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(25, 'delete_settings', 'settings', '2018-08-01 16:26:20', '2018-08-01 16:26:20'),
(26, 'browse_categories', 'categories', '2018-08-01 16:26:26', '2018-08-01 16:26:26'),
(27, 'read_categories', 'categories', '2018-08-01 16:26:26', '2018-08-01 16:26:26'),
(28, 'edit_categories', 'categories', '2018-08-01 16:26:26', '2018-08-01 16:26:26'),
(29, 'add_categories', 'categories', '2018-08-01 16:26:26', '2018-08-01 16:26:26'),
(30, 'delete_categories', 'categories', '2018-08-01 16:26:26', '2018-08-01 16:26:26'),
(31, 'browse_posts', 'posts', '2018-08-01 16:26:27', '2018-08-01 16:26:27'),
(32, 'read_posts', 'posts', '2018-08-01 16:26:27', '2018-08-01 16:26:27'),
(33, 'edit_posts', 'posts', '2018-08-01 16:26:27', '2018-08-01 16:26:27'),
(34, 'add_posts', 'posts', '2018-08-01 16:26:27', '2018-08-01 16:26:27'),
(35, 'delete_posts', 'posts', '2018-08-01 16:26:27', '2018-08-01 16:26:27'),
(36, 'browse_pages', 'pages', '2018-08-01 16:26:28', '2018-08-01 16:26:28'),
(37, 'read_pages', 'pages', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(38, 'edit_pages', 'pages', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(39, 'add_pages', 'pages', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(40, 'delete_pages', 'pages', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(41, 'browse_hooks', NULL, '2018-08-01 16:26:31', '2018-08-01 16:26:31'),
(42, 'browse_products', 'products', '2018-08-04 16:14:03', '2018-08-04 16:14:03'),
(43, 'read_products', 'products', '2018-08-04 16:14:03', '2018-08-04 16:14:03'),
(44, 'edit_products', 'products', '2018-08-04 16:14:03', '2018-08-04 16:14:03'),
(45, 'add_products', 'products', '2018-08-04 16:14:03', '2018-08-04 16:14:03'),
(46, 'delete_products', 'products', '2018-08-04 16:14:03', '2018-08-04 16:14:03'),
(47, 'browse_books', 'books', '2018-08-05 16:09:33', '2018-08-05 16:09:33'),
(48, 'read_books', 'books', '2018-08-05 16:09:33', '2018-08-05 16:09:33'),
(49, 'edit_books', 'books', '2018-08-05 16:09:33', '2018-08-05 16:09:33'),
(50, 'add_books', 'books', '2018-08-05 16:09:33', '2018-08-05 16:09:33'),
(51, 'delete_books', 'books', '2018-08-05 16:09:33', '2018-08-05 16:09:33'),
(52, 'browse_wishlist', 'wishlist', '2018-08-05 17:53:47', '2018-08-05 17:53:47'),
(53, 'read_wishlist', 'wishlist', '2018-08-05 17:53:47', '2018-08-05 17:53:47'),
(54, 'edit_wishlist', 'wishlist', '2018-08-05 17:53:47', '2018-08-05 17:53:47'),
(55, 'add_wishlist', 'wishlist', '2018-08-05 17:53:47', '2018-08-05 17:53:47'),
(56, 'delete_wishlist', 'wishlist', '2018-08-05 17:53:47', '2018-08-05 17:53:47'),
(57, 'browse_wishlists', 'wishlists', '2018-08-05 18:06:46', '2018-08-05 18:06:46'),
(58, 'read_wishlists', 'wishlists', '2018-08-05 18:06:46', '2018-08-05 18:06:46'),
(59, 'edit_wishlists', 'wishlists', '2018-08-05 18:06:46', '2018-08-05 18:06:46'),
(60, 'add_wishlists', 'wishlists', '2018-08-05 18:06:46', '2018-08-05 18:06:46'),
(61, 'delete_wishlists', 'wishlists', '2018-08-05 18:06:46', '2018-08-05 18:06:46'),
(62, 'browse_comments', 'comments', '2018-08-06 22:53:52', '2018-08-06 22:53:52'),
(63, 'read_comments', 'comments', '2018-08-06 22:53:52', '2018-08-06 22:53:52'),
(64, 'edit_comments', 'comments', '2018-08-06 22:53:52', '2018-08-06 22:53:52'),
(65, 'add_comments', 'comments', '2018-08-06 22:53:52', '2018-08-06 22:53:52'),
(66, 'delete_comments', 'comments', '2018-08-06 22:53:52', '2018-08-06 22:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'posts\\August2018\\PDFizvhRGcfW5wwue977.png', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-08-01 16:26:27', '2018-08-08 21:28:42'),
(5, 1, 1, 'With Integrated', NULL, 'With Integrated', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'posts\\August2018\\dzR05TcirPECOUVEXgnQ.png', 'with-integrated', 'With Integrated', 'With Integrated', 'PUBLISHED', 0, '2018-08-06 18:57:08', '2018-08-08 21:28:37'),
(6, 1, 1, 'several methods', NULL, NULL, 'several methods that describe the result set. In addition to these helpers methods, the paginator instances are iterators and mayseveral methods that describe the result set. In addition to these helpers methods, the paginator instances are iterators and may', 'posts\\August2018\\d8lv7iHp5REdMYIb8y7N.png', 'several-methods', NULL, NULL, 'PUBLISHED', 0, '2018-08-06 21:53:12', '2018-08-08 21:28:32'),
(7, 1, 1, 'describe the result bike', NULL, NULL, 'several methods that describe the result set. In addition to these helpers methods, the paginator instances are iterators and may be looped as an array. So, once you have retrieved the results, you may display the results and render the page links u', 'posts\\August2018\\FoV7MzMEiuitTTMhnMd9.png', 'describe-the-result-bike', NULL, NULL, 'PUBLISHED', 0, '2018-08-06 21:53:43', '2018-08-08 21:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productname` text COLLATE utf8mb4_unicode_ci,
  `productcontent` text COLLATE utf8mb4_unicode_ci,
  `productprice` text COLLATE utf8mb4_unicode_ci,
  `WheelSize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ModelNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `Wattage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `FrameMaterial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `productcontent`, `productprice`, `WheelSize`, `ModelNumber`, `Color`, `category_id`, `Wattage`, `image`, `created_at`, `updated_at`, `slug`, `FrameMaterial`) VALUES
(6, 'Balance Bike', '12 inch Wooden Kids Balance Bike', 'US $5.00-$20.00 / Set', '3.5kg', 'Kids\' Bike', '#ff0000', 12, 'wood', '[\"products\\\\August2018\\\\FSBdEoOcJjtRFrFUkXjm.png\"]', '2018-08-05 22:07:00', '2018-08-08 21:27:31', 'balance-bike', 'plastic'),
(7, '700C Fixie bike (TM-FG01)', '700C Fixie bike (TM-FG01)', 'US $82.00-$99.00 / Set', '700C', 'Fixed Gear Bike', '#ffff00', 3, 'Aluminum Alloy', '[\"products\\\\August2018\\\\CsbzHuHxV4kduFuHzZi0.png\"]', '2018-08-05 22:10:00', '2018-08-08 21:27:18', '700c-fixie-bike-tm-fg01', 'Steel'),
(8, 'chopper bike', '2018 low price latest chopper bike/ bicycle/beach bike', 'US $158.10-$213.90 / Set', '24', 'Chopper Bike', '#000000', 4, 'Aluminum Alloy', '[\"products\\\\August2018\\\\iBSdLb8LoGhAMNnZgFE5.png\"]', '2018-08-05 22:16:00', '2018-08-08 21:27:01', 'chopper-bike', 'Steel'),
(9, 'mountain bike', 'humtto snow mountain bicycle spare parts MTB mountain bike', 'US $120.00-$170.00 / Set', '25kg', 'Mountain Bike', '#00ff00', 4, 'Aluminum', '[\"products\\\\August2018\\\\BHRuo3hc8ZOo1PZyIIyH.png\"]', '2018-08-05 22:18:00', '2018-08-08 21:26:50', 'mountain-bike', 'Steel'),
(10, 'bicycle downhill', 'Professional 21 speeds racing 24\'\' steel frame mtb bicycle downhill china mountain bike for sale', 'US $129.38-$258.76 / Piece', '24', '21 Speed', '#ff0080', 9, 'Mountain Bike', '[\"products\\\\August2018\\\\FuqDXUUKlK1T0gCMrR2z.png\"]', '2018-08-05 22:21:00', '2018-08-08 21:26:37', 'bicycle-downhill', 'Mountain Bike'),
(11, 'Factory price', 'Factory price walking bike kid running bicycle mini baiance bike for sale cheap', 'US $6.00-$16.00 / Piece', '15kg,3.8kg', '16\",12\",etc', '#0000ff', 3, 'Chopper Bike,balance bike', '[\"products\\\\August2018\\\\8PbCv3BnAKkT2KErqP3q.png\"]', '2018-08-05 22:22:00', '2018-08-08 21:25:37', 'factory-price', 'Aluminum');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Reviews_content` text COLLATE utf8mb4_unicode_ci,
  `Reviews_one` int(11) DEFAULT NULL,
  `Reviews_two` int(11) DEFAULT NULL,
  `Reviews_three` int(11) DEFAULT NULL,
  `Reviews_four` int(11) DEFAULT NULL,
  `Reviews_five` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `Reviews_content`, `Reviews_one`, `Reviews_two`, `Reviews_three`, `Reviews_four`, `Reviews_five`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 'Place scalable vector icons anywhere in your content.', 1, NULL, NULL, NULL, NULL, '2018-08-05 01:36:54', '2018-08-05 01:36:54'),
(8, 16, 1, 'this good bike', NULL, 2, NULL, NULL, NULL, '2018-08-05 22:39:07', '2018-08-05 22:39:07'),
(9, 22, 1, 'i like this one', NULL, NULL, NULL, 4, NULL, '2018-08-06 23:11:51', '2018-08-06 23:11:51'),
(11, 12, 1, NULL, NULL, NULL, NULL, NULL, 5, '2018-08-07 15:11:01', '2018-08-07 15:11:01'),
(12, 19, 1, 'GOOD ONE', NULL, NULL, NULL, NULL, 5, '2018-08-07 19:49:22', '2018-08-07 19:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-08-01 16:26:19', '2018-08-01 16:26:19'),
(2, 'user', 'Normal User', '2018-08-01 16:26:19', '2018-08-01 16:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Bike SHOP - Simble Bike Shop', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Bike SHOP - Simble Bike Shop', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\August2018\\7v24mXg7YGd9ZbI8SIoE.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\August2018\\pTfdOihPNZzZ8ce0kZmJ.png', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Bikeshop', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to bikeshop Admin for Store', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings\\August2018\\lPiIBtuEjnLwgQcZ43fy.png', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'social-media.Facebook', 'Facebook', 'LINK', NULL, 'text', 6, 'social media'),
(12, 'social-media.Twitter', 'Twitter', 'LINK', NULL, 'text', 7, 'social media'),
(13, 'social-media.Instagram', 'Instagram', 'LINK', NULL, 'text', 8, 'social media'),
(14, 'social-media.Pinterest', 'Pinterest', 'LINK', NULL, 'text', 9, 'social media'),
(15, 'contact.adress', 'adress', '140 London 20-36m', NULL, 'text', 10, 'contact'),
(16, 'contact.Phone', 'Phone', '+92 120 500 32', NULL, 'text', 11, 'contact'),
(17, 'contact.Email', 'Email', 'admin@admin.com', NULL, 'text', 12, 'contact'),
(18, 'contact.IMAGECONTACT', 'IMAGECONTACT', 'settings\\August2018\\fcOEtPQlHLMvThxDCu2D.png', NULL, 'image', 13, 'contact'),
(19, 'site.backgroundvideo', 'backgroundvideo', 'https://www.youtube.com/embed/OB2Fb6TqCfI', NULL, 'text', 14, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2018-08-01 16:26:29', '2018-08-01 16:26:29'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2018-08-01 16:26:30', '2018-08-01 16:26:30'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2018-08-01 16:26:30', '2018-08-01 16:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users\\August2018\\qAsP3VbsUCEVtjubrVbj.png', '$2y$10$y2yAjBzHsnzdHUQISwXkEubd0PRiJfrL1xs1Y2m8Z/C1S4cNoz.9.', 'w99X9JbRO26WTYbQckdTVtzwFUJGDKfVRhKvjuShDbsdy1cXu5gRJaIS0CAb', '{\"locale\":\"en\"}', '2018-08-01 16:26:27', '2018-08-03 19:18:05'),
(2, 2, 'MHND', 'admin@Stores2.com', 'users/default.png', '$2y$10$BBOmmUS4YtRqi42wsuOZN.KREAqcYbLFGVz03FK8TNmkSIhUQmjcq', 'jIAXM4dIu061Kb7DwDBO9S0gaDP7zpLBWru5qLuiJROVjvcL0t1GKaSEHA9h', NULL, '2018-08-07 16:20:15', '2018-08-07 16:20:16'),
(3, 2, 'MEDO', 'admin@StoresR.com', 'users/default.png', '$2y$10$BHX1AFrlagavnOfztvYIxuQ8dPyzI0XrU37V/aWJBWD9hXebbZ7RW', 'Y1HSWKJ0PSan2hvvOlhLQtqfxAdWRoueBaT5nHRcx3GwIdQIGh787DeEEeGF', NULL, '2018-08-08 15:57:34', '2018-08-08 15:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(11, 2, 19, '2018-08-07 22:03:21', '2018-08-07 22:03:21'),
(12, 2, 9, '2018-08-07 22:03:22', '2018-08-07 22:03:22'),
(13, 2, 3, '2018-08-07 22:03:29', '2018-08-07 22:03:29'),
(16, 3, 19, '2018-08-08 15:57:49', '2018-08-08 15:57:49'),
(17, 3, 3, '2018-08-08 16:24:33', '2018-08-08 16:24:33'),
(18, 3, 2, '2018-08-08 16:24:36', '2018-08-08 16:24:36'),
(19, 3, 11, '2018-08-08 16:24:38', '2018-08-08 16:24:38'),
(20, 3, 5, '2018-08-08 16:24:42', '2018-08-08 16:24:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
