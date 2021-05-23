-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2019 at 09:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marina`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number_with` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `image`, `account_number`, `account_number_with`, `name_of_owner`, `number_of_owner`, `created_at`, `updated_at`) VALUES
(1, 'Elraj7y bank', 'banks/March2019/WU8OKY3qgaEpJmbdzXdQ.png', '544054514015025', '5025020502052', 'elryal', '0953562456232', '2019-03-19 17:34:43', '2019-03-19 17:34:43');

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
(1, NULL, 1, 'Category 1', 'category-1', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(2, NULL, 1, 'Category 2', 'category-2', '2019-03-10 11:47:40', '2019-03-10 11:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `name`, `country_id`) VALUES
(1, '2019-03-10 12:15:00', '2019-03-10 12:48:34', 'city1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `created_at`, `updated_at`, `condition`) VALUES
(1, '2019-03-10 13:52:23', '2019-03-10 13:52:23', 'condittion with english'),
(2, '2019-03-10 13:52:32', '2019-03-10 13:52:32', 'condittion with english2');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2019-03-10 12:10:00', '2019-03-10 12:49:07', 'ksa');

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
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(58, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(59, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(60, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(61, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(62, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(63, 9, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(76, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(77, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(78, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(79, 12, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\"}}', 6),
(80, 12, 'country_id', 'text', 'Country Id', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\"}}', 2),
(81, 12, 'city_id', 'text', 'City Id', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\"}}', 3),
(82, 12, 'state_belongsto_country_relationship', 'relationship', 'countries', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(83, 12, 'state_belongsto_city_relationship', 'relationship', 'cities', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\City\",\"table\":\"cities\",\"type\":\"belongsTo\",\"column\":\"city_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(84, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(85, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(86, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(87, 14, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(88, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(89, 15, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(90, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(91, 15, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 5),
(92, 15, 'country_id', 'text', 'Country Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(93, 15, 'city_belongsto_country_relationship', 'relationship', 'countries', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(94, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(95, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(96, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(97, 16, 'condition', 'text', 'Condition', 1, 1, 1, 1, 1, 1, '{}', 4),
(98, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(99, 17, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(100, 17, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(101, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(102, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(103, 18, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(104, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(105, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(106, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(107, 19, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(108, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(109, 19, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{}', 4),
(110, 21, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(111, 21, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 14),
(112, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(113, 21, 'number_bridal', 'text', 'Number Bridal', 0, 0, 1, 1, 1, 1, '{}', 16),
(114, 21, 'name_bridal', 'text', 'Name Bridal', 0, 0, 1, 1, 1, 1, '{}', 17),
(115, 21, 'identity', 'text', 'Identity', 0, 0, 1, 1, 1, 1, '{}', 18),
(116, 21, 'birthday', 'text', 'Birthday', 0, 0, 1, 1, 1, 1, '{}', 19),
(117, 21, 'nationalty', 'text', 'Nationalty', 0, 0, 1, 1, 1, 1, '{}', 20),
(118, 21, 'identity_source', 'text', 'Identity Source', 0, 0, 1, 1, 1, 1, '{}', 21),
(119, 21, 'identity_image', 'image', 'Identity Image', 0, 0, 1, 1, 1, 1, '{}', 22),
(120, 21, 'email_address', 'text', 'Email Address', 0, 0, 1, 1, 1, 1, '{}', 23),
(121, 21, 'phone_bridal', 'text', 'Phone Bridal', 0, 0, 1, 1, 1, 1, '{}', 24),
(122, 21, 'singer_gender', 'text', 'Singer Gender', 0, 0, 1, 1, 1, 1, '{}', 25),
(123, 21, 'singer_name', 'text', 'Singer Name', 0, 0, 1, 1, 1, 1, '{}', 26),
(124, 21, 'singer_name_optional', 'text', 'Singer Name Optional', 0, 0, 1, 1, 1, 1, '{}', 27),
(125, 21, 'code_number', 'text', 'Code', 0, 1, 1, 1, 1, 1, '{}', 28),
(126, 21, 'carol_type', 'text', 'Carol', 0, 0, 1, 1, 1, 1, '{}', 29),
(127, 21, 'hejry_date', 'hejry', 'Hejry Date', 0, 1, 1, 1, 1, 1, '{}', 31),
(128, 21, 'date', 'text', 'Date', 0, 0, 1, 1, 1, 1, '{}', 33),
(129, 21, 'hotel_name', 'text', 'Hotel Name', 0, 0, 1, 1, 1, 1, '{}', 35),
(130, 21, 'start_time', 'time', 'Start Time', 0, 0, 1, 1, 1, 1, '{}', 37),
(131, 21, 'end_time', 'time', 'End Time', 0, 0, 1, 1, 1, 1, '{}', 39),
(132, 21, 'street_name', 'text', 'Street Name', 0, 0, 1, 1, 1, 1, '{}', 41),
(133, 21, 'hall_id', 'text', 'Hall Id', 0, 0, 1, 1, 1, 1, '{}', 42),
(134, 21, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 9),
(135, 21, 'country_id', 'text', 'Country Id', 1, 0, 1, 1, 1, 1, '{}', 10),
(136, 21, 'city_id', 'text', 'City Id', 1, 0, 1, 1, 1, 1, '{}', 11),
(137, 21, 'state_id', 'text', 'State Id', 1, 0, 1, 1, 1, 1, '{}', 12),
(138, 21, 'tune_id', 'hidden', 'Tune Id', 0, 0, 1, 1, 1, 1, '{}', 13),
(139, 21, 'occasion_id', 'text', 'Occasion Id', 0, 0, 1, 1, 1, 1, '{}', 45),
(140, 21, 'rhythms', 'array', 'Rhythms', 0, 0, 1, 0, 0, 1, '{}', 47),
(141, 21, 'machines', 'array', 'Machines', 0, 0, 1, 0, 0, 1, '{}', 48),
(142, 21, 'agreements', 'array', 'Agreements', 0, 0, 1, 0, 0, 1, '{}', 49),
(143, 21, 'approved', 'checkbox', 'Status', 1, 1, 1, 1, 1, 1, '{\"on\":\"Deposited\",\"off\":\"Pending\",\"checked\":false}', 51),
(145, 21, 'contacts', 'array', 'Contacts', 0, 0, 1, 0, 0, 1, '{}', 50),
(147, 21, 'order_belongsto_country_relationship', 'relationship', 'County', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(148, 21, 'order_belongsto_city_relationship', 'relationship', 'City', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\City\",\"table\":\"cities\",\"type\":\"belongsTo\",\"column\":\"city_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(149, 21, 'order_belongsto_user_relationship', 'relationship', 'User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(150, 21, 'order_belongsto_hall_relationship', 'relationship', 'Hall', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Halls\",\"table\":\"halls\",\"type\":\"belongsTo\",\"column\":\"hall_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(151, 21, 'order_belongsto_state_relationship', 'relationship', 'states', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\State\",\"table\":\"states\",\"type\":\"belongsTo\",\"column\":\"state_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(152, 21, 'order_belongsto_occasion_relationship', 'relationship', 'occasions', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Occasion\",\"table\":\"occasions\",\"type\":\"belongsTo\",\"column\":\"occasion_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(153, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(154, 22, 'bank_name', 'text', 'Bank Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(155, 22, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 3),
(156, 22, 'account_number', 'number', 'Account Number', 1, 1, 1, 1, 1, 1, '{}', 4),
(157, 22, 'account_number_with', 'text', 'Account Number With', 1, 1, 1, 1, 1, 1, '{}', 5),
(158, 22, 'name_of_owner', 'text', 'Name Of Owner', 1, 1, 1, 1, 1, 1, '{}', 6),
(159, 22, 'number_of_owner', 'number', 'Number Of Owner', 1, 1, 1, 1, 1, 1, '{}', 7),
(160, 22, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(161, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(177, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 0, 0, 0, 0, '{}', 6),
(178, 1, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 8),
(179, 1, 'singer_id', 'hidden', 'Singer Id', 0, 0, 0, 0, 0, 0, '{}', 13),
(180, 21, 'singer_id', 'text', 'Singer Id', 0, 0, 1, 1, 1, 1, '{}', 44),
(181, 21, 'company_type', 'text', 'Company Type', 0, 0, 1, 1, 1, 1, '{}', 30),
(182, 21, 'company_name', 'text', 'Company Name', 0, 0, 1, 1, 1, 1, '{}', 32),
(183, 21, 'commercial_registration_no', 'text', 'Commercial Registration No', 0, 0, 1, 1, 1, 1, '{}', 34),
(184, 21, 'company_owner_name', 'text', 'Company Owner Name', 0, 0, 1, 1, 1, 1, '{}', 36),
(185, 21, 'registration_id_number', 'text', 'Registration Id Number', 0, 0, 1, 1, 1, 1, '{}', 38),
(186, 21, 'director_name', 'text', 'Director Name', 0, 0, 1, 1, 1, 1, '{}', 40),
(187, 21, 'price', 'text', 'Price', 1, 1, 1, 1, 1, 1, '{}', 43),
(188, 21, 'concert', 'text', 'Concert', 0, 0, 1, 1, 1, 1, '{}', 46),
(189, 21, 'order_type', 'text', 'Order Type', 0, 1, 1, 1, 1, 1, '{}', 2),
(190, 21, 'permits', 'text', 'Permits', 0, 0, 1, 1, 1, 1, '{}', 46),
(191, 24, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(192, 24, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(193, 24, 'identity', 'text', 'Identity', 0, 1, 1, 1, 1, 1, '{}', 4),
(194, 24, 'birthday', 'text', 'Birthday', 0, 1, 1, 1, 1, 1, '{}', 5),
(195, 24, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 6),
(196, 24, 'order_id', 'text', 'Order id', 1, 1, 1, 1, 1, 1, '{}', 2),
(197, 24, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(198, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(200, 21, 'reason_of_edit', 'text_area', 'Reason Of Edit', 0, 0, 1, 1, 1, 1, '{}', 47),
(201, 21, 'new_date', 'date', 'New Date', 0, 0, 1, 1, 1, 1, '{}', 48),
(202, 21, 'canceled', 'checkbox', 'Canceled', 0, 0, 1, 1, 1, 1, '{\"on\":\"Canceled\",\"off\":\"Active\",\"checked\":false}', 49),
(203, 21, 'closed', 'checkbox', 'Closed', 0, 0, 1, 1, 1, 1, '{\"on\":\"Closed\",\"off\":\"Opened\",\"checked\":false}', 50),
(204, 21, 'order_belongsto_user_relationship_1', 'relationship', 'Singer', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"singer_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"banks\",\"pivot\":\"0\",\"taggable\":\"0\"}', 52),
(205, 21, 'attach_proof', 'text', 'Attach Proof', 0, 1, 1, 1, 1, 1, '{}', 51);

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
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'App\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":\"currentUser\"}', '2019-03-09 09:42:51', '2019-03-21 19:41:04'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-03-09 09:42:51', '2019-03-09 09:42:51'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-03-09 09:42:51', '2019-03-09 09:42:51'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2019-03-09 09:45:13', '2019-03-09 09:45:13'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2019-03-09 09:45:13', '2019-03-09 09:45:13'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2019-03-09 09:45:14', '2019-03-09 09:45:14'),
(8, 'occasions', 'occasions', 'Occasion', 'Occasions', NULL, 'App\\Models\\Occasion', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-03-09 16:21:31', '2019-03-10 12:05:44'),
(9, 'countries', 'countries', 'Country', 'Countries', NULL, 'App\\Models\\Country', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-03-10 10:17:15', '2019-03-10 12:05:29'),
(12, 'states', 'states', 'State', 'States', NULL, 'App\\Models\\State', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-03-10 11:04:35', '2019-03-10 12:08:18'),
(14, 'halls', 'halls', 'Hall', 'Halls', NULL, 'App\\Models\\Halls', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-03-10 11:26:19', '2019-03-10 12:05:36'),
(15, 'cities', 'cities', 'City', 'Cities', NULL, 'App\\Models\\City', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-03-10 12:04:54', '2019-03-10 12:14:11'),
(16, 'conditions', 'conditions', 'Condition', 'Conditions', NULL, 'App\\Models\\Condition', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-10 13:49:35', '2019-03-10 13:49:35'),
(17, 'rhythms', 'rhythms', 'Rhythm', 'Rhythms', NULL, 'App\\Models\\Rhythms', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-10 21:37:59', '2019-03-10 21:37:59'),
(18, 'machines', 'machines', 'Machine', 'Machines', NULL, 'App\\Models\\Machine', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-10 21:38:21', '2019-03-10 21:38:21'),
(19, 'prices', 'prices', 'Price', 'Prices', NULL, 'App\\Models\\Price', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-11 19:32:48', '2019-03-11 19:32:48'),
(21, 'orders', 'orders', 'Order', 'Orders', NULL, 'App\\Models\\Order', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"order_type\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"currentSinger\"}', '2019-03-16 16:44:28', '2019-04-03 21:02:33'),
(22, 'banks', 'banks', 'Bank', 'Banks', NULL, 'App\\Models\\Bank', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-19 17:32:28', '2019-03-19 17:32:28'),
(24, 'grooms', 'grooms', 'Groom', 'Grooms', NULL, 'App\\Models\\Grooms', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-04-03 12:09:57', '2019-04-03 12:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `grooms`
--

CREATE TABLE `grooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grooms`
--

INSERT INTO `grooms` (`id`, `name`, `identity`, `birthday`, `phone`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Hamish Brock', '4324234234234', '2001-03-22', '5345345345345', 41, '2019-04-03 12:03:59', '2019-04-03 12:03:59'),
(2, 'Brennan Monroe', '42342342', '2019-04-24', '4234234234234', 41, '2019-04-03 12:04:50', '2019-04-03 12:04:50'),
(3, 'Desiree Ball', '4125125125125', '2019-04-24', '123123123123123', 41, '2019-04-03 12:06:54', '2019-04-03 12:06:54'),
(4, 'Rhonda Beck', '423423', '2019-04-23', '42352352', 41, '2019-04-03 12:08:17', '2019-04-03 12:08:17'),
(5, 'Rigel Brady', '65464564', '2001-03-22', '346346346346346', 40, '2019-04-03 23:45:00', '2019-04-03 23:45:00'),
(6, 'Jada Hull', '5345345345', '2001-04-25', '6456456456', 40, '2019-04-03 23:54:00', '2019-04-03 23:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2019-03-12 18:54:25', '2019-03-12 18:54:25', 'qa3a'),
(2, '2019-03-12 18:54:41', '2019-03-12 18:54:41', 'qa3a2');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Machine1', '2019-03-10 21:42:14', '2019-03-10 21:42:14'),
(2, 'orge', '2019-03-10 21:42:32', '2019-03-10 21:42:32');

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
(1, 'admin', '2019-03-09 09:42:51', '2019-03-09 09:42:51');

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
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2019-03-09 09:42:51', '2019-03-14 16:35:44', 'voyager.dashboard', 'null'),
(2, 1, 'Media', '', '_self', 'voyager-images', '#000000', NULL, 4, '2019-03-09 09:42:51', '2019-03-14 16:36:18', 'voyager.media.index', 'null'),
(3, 1, 'Users', '', '_self', 'voyager-person', '#000000', NULL, 3, '2019-03-09 09:42:51', '2019-03-12 20:17:19', 'voyager.users.index', 'null'),
(4, 1, 'Roles', '', '_self', 'voyager-lock', '#000000', NULL, 2, '2019-03-09 09:42:51', '2019-03-14 16:35:55', 'voyager.roles.index', 'null'),
(5, 1, 'Tools', '', '_self', 'voyager-tools', '#000000', NULL, 8, '2019-03-09 09:42:51', '2019-03-14 16:36:31', NULL, ''),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', '#000000', 5, 1, '2019-03-09 09:42:51', '2019-03-14 16:36:50', 'voyager.menus.index', 'null'),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-03-09 09:42:51', '2019-03-10 21:39:53', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-03-09 09:42:51', '2019-03-10 21:39:53', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-03-09 09:42:51', '2019-03-10 21:39:53', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', '#000000', NULL, 9, '2019-03-09 09:42:51', '2019-03-14 16:37:12', 'voyager.settings.index', 'null'),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-03-09 09:42:52', '2019-03-10 21:39:53', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-categories', '#000000', NULL, 7, '2019-03-09 09:45:13', '2019-03-21 23:38:21', 'voyager.categories.index', 'null'),
(13, 1, 'Posts', '', '_self', 'voyager-news', '#000000', NULL, 5, '2019-03-09 09:45:14', '2019-03-21 23:37:58', 'voyager.posts.index', 'null'),
(14, 1, 'Pages', '', '_self', 'voyager-file-text', '#000000', NULL, 6, '2019-03-09 09:45:14', '2019-03-21 23:38:09', 'voyager.pages.index', 'null'),
(15, 1, 'Occasions', '', '_self', 'voyager-music', '#000000', 25, 1, '2019-03-09 16:21:31', '2019-03-16 16:40:32', 'voyager.occasions.index', 'null'),
(16, 1, 'Countries', '', '_self', 'voyager-window-list', '#000000', 25, 2, '2019-03-10 10:17:15', '2019-03-12 20:19:51', 'voyager.countries.index', 'null'),
(19, 1, 'States', '', '_self', 'voyager-window-list', '#000000', 25, 3, '2019-03-10 11:04:35', '2019-03-14 16:26:03', 'voyager.states.index', 'null'),
(20, 1, 'Halls', '', '_self', 'voyager-handle', '#000000', 25, 4, '2019-03-10 11:26:19', '2019-03-14 16:26:03', 'voyager.halls.index', 'null'),
(21, 1, 'Cities', '', '_self', 'voyager-window-list', '#000000', 25, 5, '2019-03-10 12:04:54', '2019-03-14 16:26:03', 'voyager.cities.index', 'null'),
(22, 1, 'Conditions', '', '_self', 'voyager-receipt', '#000000', 25, 6, '2019-03-10 13:49:35', '2019-03-12 20:21:09', 'voyager.conditions.index', 'null'),
(23, 1, 'Rhythms', '', '_self', 'voyager-bell', '#000000', 25, 7, '2019-03-10 21:37:59', '2019-03-12 20:21:29', 'voyager.rhythms.index', 'null'),
(24, 1, 'Machines', '', '_self', 'voyager-hook', '#000000', 25, 8, '2019-03-10 21:38:21', '2019-03-12 20:22:15', 'voyager.machines.index', 'null'),
(25, 1, 'management', '', '_self', 'voyager-music', '#000000', NULL, 10, '2019-03-10 21:39:47', '2019-03-10 21:40:38', NULL, ''),
(26, 1, 'Prices', '', '_self', 'voyager-basket', '#000000', 25, 9, '2019-03-11 19:32:48', '2019-03-12 20:19:19', 'voyager.prices.index', 'null'),
(27, 1, 'Orders', '', '_self', 'voyager-credit-card', '#000000', NULL, 11, '2019-03-16 16:44:29', '2019-03-17 00:14:40', 'voyager.orders.index', 'null'),
(28, 1, 'Banks', '', '_self', 'voyager-credit-card', '#000000', 25, 10, '2019-03-19 17:32:28', '2019-03-19 17:54:02', 'voyager.banks.index', 'null'),
(29, 1, 'Newly Added Bridal', '', '_self', 'voyager-star-half', '#000000', NULL, 12, '2019-04-03 12:09:57', '2019-04-03 15:44:42', 'voyager.grooms.index', 'null'),
(30, 1, 'The hindsight', '/admin/orders?new_date=new_date', '_self', 'voyager-medal-rank-star', '#000000', NULL, 13, '2019-04-03 15:38:15', '2019-04-03 15:42:57', NULL, ''),
(31, 1, 'Closed Contracts', '/admin/orders?closed=closed', '_self', 'voyager-x', '#000000', NULL, 14, '2019-04-03 16:31:59', '2019-04-03 16:33:00', NULL, ''),
(32, 1, 'Contracts canceled', '/admin/orders?canceled=canceled', '_self', 'voyager-key', '#000000', NULL, 15, '2019-04-03 20:57:54', '2019-04-03 20:57:54', NULL, '');

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
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_03_09_110458_create_cities_table', 1),
(28, '2019_03_09_110458_create_countries_table', 1),
(29, '2019_03_09_110458_create_orders_table', 1),
(30, '2019_03_09_110458_create_states_table', 1),
(31, '2019_03_09_110459_create_Conditions_table', 1),
(32, '2019_03_09_110459_create_Halls_table', 1),
(33, '2019_03_09_110459_create_Occasions_table', 1),
(34, '2019_03_09_110459_create_Remittances_table', 1),
(35, '2019_03_09_110459_create_contacts_table', 1),
(36, '2019_03_09_110459_create_prices_table', 1),
(37, '2019_03_09_110459_create_tunes_table', 1),
(38, '2019_03_09_110509_create_foreign_keys', 1),
(39, '2019_03_10_232834_create_machines_table', 2),
(40, '2019_03_10_233258_create_rhythms_table', 2),
(41, '2019_03_19_172203_create_banks_table', 3),
(42, '2019_04_03_132138_create_grooms_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `modrators`
--

CREATE TABLE `modrators` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(188) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modrators`
--

INSERT INTO `modrators` (`id`, `name`, `email`, `password`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'modratot', 'asdasda@yahoo.com', '$2y$10$TS15FM6X8eFxCQETbs3hpeoUAfIB9yHM.m8v8vj6GvShPtqgCyKGS', NULL, '2019-03-21 17:37:39', '2019-03-21 17:37:39'),
(2, 'ahmed', 'myhishamad2@gmail.com', '$2y$10$t/UpQhxqzyr1gpuTE4ErvOOOa7X/iXySv19w.aoK/NEhDDm2nPIy2', 4, '2019-03-21 19:09:14', '2019-03-21 19:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2019-03-10 12:13:00', '2019-03-10 12:31:06', 'esm el qa3a');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_bridal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bridal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `nationalty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_bridal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singer_gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singer_name_optional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carol_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hejry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hotel_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `street_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_registration_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `concert` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'personal',
  `hall_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `tune_id` int(10) UNSIGNED DEFAULT NULL,
  `occasion_id` int(10) UNSIGNED DEFAULT NULL,
  `rhythms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `machines` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `contacts` longtext COLLATE utf8mb4_unicode_ci,
  `agreements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `singer_id` int(10) UNSIGNED DEFAULT NULL,
  `permits` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_of_edit` text COLLATE utf8mb4_unicode_ci,
  `new_date` date DEFAULT NULL,
  `canceled` int(1) DEFAULT NULL,
  `closed` int(1) DEFAULT NULL,
  `attach_proof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `number_bridal`, `name_bridal`, `identity`, `birthday`, `nationalty`, `identity_source`, `identity_image`, `email_address`, `phone_bridal`, `singer_gender`, `singer_name`, `singer_name_optional`, `code_number`, `carol_type`, `hejry_date`, `date`, `hotel_name`, `start_time`, `end_time`, `street_name`, `company_type`, `company_name`, `commercial_registration_no`, `company_owner_name`, `registration_id_number`, `director_name`, `price`, `concert`, `order_type`, `hall_id`, `user_id`, `country_id`, `city_id`, `state_id`, `tune_id`, `occasion_id`, `rhythms`, `machines`, `contacts`, `agreements`, `approved`, `singer_id`, `permits`, `reason_of_edit`, `new_date`, `canceled`, `closed`, `attach_proof`) VALUES
(35, '2019-03-28 14:59:12', '2019-03-28 14:59:12', '2', 'Cameron Perry', 'Do et quaerat suscipit ea nobis nesciunt quia perspiciatis impedit ullam autem itaque consequat', NULL, 'اماراتي', 'Molestiae beatae aliqua Suscipit numquam veniam ea eum voluptatum dolore quia et consectetur aperi', 'identity/pVQgK6vKrYzYdgsSemvWg132ZTygVkLLhBOCN8R2.jpeg', 'diquxyhe@mailinator.net', '+1 (984) 844-3179', 'male', NULL, NULL, '9242', 'مطربة', NULL, NULL, 'hotel3', NULL, NULL, 'Nevada Woodward', NULL, NULL, NULL, NULL, NULL, NULL, 8000, NULL, 'personal', 2, 2, 1, 1, 1, NULL, 1, '{\"2\":\"\\u0627\\u064a\\u0642\\u0627\\u0639\\u0627\\u062a \\u0639\\u0627\\u062f\\u064a\\u0629\"}', '{\"2\":\"\\u0639\\u0627\\u0632\\u0641 \\u0627\\u0648\\u0631\\u062c\"}', '{\"contact_name\":[\"Pearl Fulton\"],\"contact_relation\":[\"\\u0627\\u062e\"],\"contact_phone\":[\"+1 (786) 613-1464\"]}', '{\"_token\":\"5gMpB5N63oN2JiwckBohHRHnWyiT3dudpYRfgtol\",\"sender_name\":\"Levi Summers\",\"relative_relation\":\"\\u0627\\u062e\",\"bank_name\":\"\\u0627\\u0644\\u0628\\u0646\\u0643 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\",\"account_number\":\"697\",\"sender_phone\":\"966500711887\"}', 0, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2019-03-29 13:18:00', '2019-03-29 13:25:57', '256', 'hisham', 'Non sed deleniti unde nostrud provident ut', '2019-03-20', 'سعودي', 'Ut ut qui qui aliqua Asperiores sapiente ut deserunt officia aute', 'identity/xNLvLQT903nmVNhAlRJMcku6lsW0u89vWk5GCxyE.jpeg', 'adminweb@adminweb.com', '4703809312', 'female', 'Rylee Mcclain', 'Uma Howard', '7146', 'مطرب', '1440-06-17', '2019-02-20', 'hotel1', '17:16:00', '17:16:00', '111 Silicon Valley Road', NULL, NULL, NULL, NULL, NULL, NULL, 8000, NULL, 'personal', 1, 2, 1, 1, 1, NULL, 1, NULL, NULL, '{\"contact_name\":[\"Kirsten Elliott\"],\"contact_relation\":[\"\\u0627\\u062e\"],\"contact_phone\":[\"+1 (399) 107-8636\"]}', '{\"number_of_hits\":\"1\",\"price\":\"8000\",\"deposit\":\"3000\",\"remaining_amount\":\"5000\"}', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2019-04-02 09:42:00', '2019-04-03 23:57:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Courtney Bond', 'Zachery Watkins', '3975', NULL, NULL, '2019-03-17', NULL, '13:39:00', '03:39:00', 'Dieter Decker', 'تجارية', 'Harris Mccoy Co', '5345345345', 'Miranda and Warner Trading', '116', 'Michael Mueller', 8000, 'عيد ميلاد', 'companies', NULL, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, NULL, 'ظروف خاصه', '2019-04-25', 1, 1, NULL),
(41, '2019-04-02 11:20:06', '2019-04-02 11:20:06', '88', 'Ramona Welch', 'Deleniti voluptatem Minima saepe asperiores sed impedit et reprehenderit', '2001-11-15', 'سعودي', 'Cum quasi sint commodo quia expedita autem exercitationem', 'identity/8k4rtVGpV0oGkXGgqsDi23T9xOFTfTBKmsmrX5CL.png', 'myfe@mailinator.com', '+1 (506) 537-6931', 'female', NULL, NULL, '5931', 'مطرب', '1440-06-08 00:00:00', '2019-02-15', 'hotel1', '15:19:00', '17:19:00', 'gfdg', NULL, NULL, NULL, NULL, NULL, NULL, 8000, NULL, 'personal', 1, 2, 1, 1, 1, NULL, 1, NULL, NULL, '{\"contact_name\":[\"Oprah Maxwell\"],\"contact_relation\":[\"\\u0627\\u062e\"],\"contact_phone\":[\"+1 (523) 901-3125\"]}', '{\"number_of_hits\":\"1\",\"price\":\"8000\",\"deposit\":\"3000\",\"remaining_amount\":\"5000\"}', 0, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2019-04-06 18:07:29', '2019-04-06 18:07:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Allegra Lambert', 'Phoebe Wilkins', '1591', NULL, '1440-07-20 00:00:00', '2019-03-25', NULL, '20:07:00', '20:07:00', 'Venus Stark', 'تجارية', 'Mitchell and Rich Plc', '6546456456', 'Weber and Mccarty LLC', '303', 'Elaine Rosales', 8000, 'امسية طربية', 'companies', NULL, 3, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2019-03-10 11:47:41', '2019-03-10 11:47:41');

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
('myhishamad2@gmail.com', '$2y$10$WtP4Z0w6LkwOEavBuRz4fePc71/z1tfpfItZDIJIbXR74pot.SRdK', '2019-03-24 00:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(2, 'browse_bread', NULL, '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(3, 'browse_database', NULL, '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(4, 'browse_media', NULL, '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(5, 'browse_compass', NULL, '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(6, 'browse_menus', 'menus', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(7, 'read_menus', 'menus', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(8, 'edit_menus', 'menus', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(9, 'add_menus', 'menus', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(10, 'delete_menus', 'menus', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(11, 'browse_roles', 'roles', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(12, 'read_roles', 'roles', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(13, 'edit_roles', 'roles', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(14, 'add_roles', 'roles', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(15, 'delete_roles', 'roles', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(16, 'browse_users', 'users', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(17, 'read_users', 'users', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(18, 'edit_users', 'users', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(19, 'add_users', 'users', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(20, 'delete_users', 'users', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(21, 'browse_settings', 'settings', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(22, 'read_settings', 'settings', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(23, 'edit_settings', 'settings', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(24, 'add_settings', 'settings', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(25, 'delete_settings', 'settings', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(26, 'browse_categories', 'categories', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(27, 'read_categories', 'categories', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(28, 'edit_categories', 'categories', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(29, 'add_categories', 'categories', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(30, 'delete_categories', 'categories', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(31, 'browse_posts', 'posts', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(32, 'read_posts', 'posts', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(33, 'edit_posts', 'posts', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(34, 'add_posts', 'posts', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(35, 'delete_posts', 'posts', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(36, 'browse_pages', 'pages', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(37, 'read_pages', 'pages', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(38, 'edit_pages', 'pages', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(39, 'add_pages', 'pages', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(40, 'delete_pages', 'pages', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(41, 'browse_hooks', NULL, '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(42, 'browse_cities', 'cities', '2019-03-10 12:04:54', '2019-03-10 12:04:54'),
(43, 'read_cities', 'cities', '2019-03-10 12:04:54', '2019-03-10 12:04:54'),
(44, 'edit_cities', 'cities', '2019-03-10 12:04:54', '2019-03-10 12:04:54'),
(45, 'add_cities', 'cities', '2019-03-10 12:04:54', '2019-03-10 12:04:54'),
(46, 'delete_cities', 'cities', '2019-03-10 12:04:54', '2019-03-10 12:04:54'),
(47, 'browse_countries', 'countries', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(48, 'read_countries', 'countries', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(49, 'edit_countries', 'countries', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(50, 'add_countries', 'countries', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(51, 'delete_countries', 'countries', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(52, 'browse_halls', 'halls', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(53, 'read_halls', 'halls', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(54, 'edit_halls', 'halls', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(55, 'add_halls', 'halls', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(56, 'delete_halls', 'halls', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(57, 'browse_occasions', 'occasions', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(58, 'read_occasions', 'occasions', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(59, 'edit_occasions', 'occasions', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(60, 'add_occasions', 'occasions', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(61, 'delete_occasions', 'occasions', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(62, 'browse_states', 'states', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(63, 'read_states', 'states', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(64, 'edit_states', 'states', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(65, 'add_states', 'states', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(66, 'delete_states', 'states', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(67, 'browse_conditions', 'conditions', '2019-03-10 13:49:35', '2019-03-10 13:49:35'),
(68, 'read_conditions', 'conditions', '2019-03-10 13:49:35', '2019-03-10 13:49:35'),
(69, 'edit_conditions', 'conditions', '2019-03-10 13:49:35', '2019-03-10 13:49:35'),
(70, 'add_conditions', 'conditions', '2019-03-10 13:49:35', '2019-03-10 13:49:35'),
(71, 'delete_conditions', 'conditions', '2019-03-10 13:49:35', '2019-03-10 13:49:35'),
(72, 'browse_rhythms', 'rhythms', '2019-03-10 21:37:59', '2019-03-10 21:37:59'),
(73, 'read_rhythms', 'rhythms', '2019-03-10 21:37:59', '2019-03-10 21:37:59'),
(74, 'edit_rhythms', 'rhythms', '2019-03-10 21:37:59', '2019-03-10 21:37:59'),
(75, 'add_rhythms', 'rhythms', '2019-03-10 21:37:59', '2019-03-10 21:37:59'),
(76, 'delete_rhythms', 'rhythms', '2019-03-10 21:37:59', '2019-03-10 21:37:59'),
(77, 'browse_machines', 'machines', '2019-03-10 21:38:21', '2019-03-10 21:38:21'),
(78, 'read_machines', 'machines', '2019-03-10 21:38:21', '2019-03-10 21:38:21'),
(79, 'edit_machines', 'machines', '2019-03-10 21:38:21', '2019-03-10 21:38:21'),
(80, 'add_machines', 'machines', '2019-03-10 21:38:21', '2019-03-10 21:38:21'),
(81, 'delete_machines', 'machines', '2019-03-10 21:38:21', '2019-03-10 21:38:21'),
(82, 'browse_prices', 'prices', '2019-03-11 19:32:48', '2019-03-11 19:32:48'),
(83, 'read_prices', 'prices', '2019-03-11 19:32:48', '2019-03-11 19:32:48'),
(84, 'edit_prices', 'prices', '2019-03-11 19:32:48', '2019-03-11 19:32:48'),
(85, 'add_prices', 'prices', '2019-03-11 19:32:48', '2019-03-11 19:32:48'),
(86, 'delete_prices', 'prices', '2019-03-11 19:32:48', '2019-03-11 19:32:48'),
(87, 'browse_orders', 'orders', '2019-03-16 16:44:28', '2019-03-16 16:44:28'),
(88, 'read_orders', 'orders', '2019-03-16 16:44:28', '2019-03-16 16:44:28'),
(89, 'edit_orders', 'orders', '2019-03-16 16:44:28', '2019-03-16 16:44:28'),
(90, 'add_orders', 'orders', '2019-03-16 16:44:28', '2019-03-16 16:44:28'),
(91, 'delete_orders', 'orders', '2019-03-16 16:44:28', '2019-03-16 16:44:28'),
(92, 'browse_banks', 'banks', '2019-03-19 17:32:28', '2019-03-19 17:32:28'),
(93, 'read_banks', 'banks', '2019-03-19 17:32:28', '2019-03-19 17:32:28'),
(94, 'edit_banks', 'banks', '2019-03-19 17:32:28', '2019-03-19 17:32:28'),
(95, 'add_banks', 'banks', '2019-03-19 17:32:28', '2019-03-19 17:32:28'),
(96, 'delete_banks', 'banks', '2019-03-19 17:32:28', '2019-03-19 17:32:28'),
(97, 'browse_grooms', 'grooms', '2019-04-03 12:09:57', '2019-04-03 12:09:57'),
(98, 'read_grooms', 'grooms', '2019-04-03 12:09:57', '2019-04-03 12:09:57'),
(99, 'edit_grooms', 'grooms', '2019-04-03 12:09:57', '2019-04-03 12:09:57'),
(100, 'add_grooms', 'grooms', '2019-04-03 12:09:57', '2019-04-03 12:09:57'),
(101, 'delete_grooms', 'grooms', '2019-04-03 12:09:57', '2019-04-03 12:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(2, 3),
(3, 3),
(4, 1),
(4, 3),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 3),
(16, 1),
(16, 3),
(16, 4),
(17, 1),
(17, 3),
(17, 4),
(18, 1),
(18, 3),
(18, 4),
(19, 1),
(19, 3),
(19, 4),
(20, 1),
(20, 3),
(20, 4),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(65, 3),
(66, 1),
(66, 3),
(67, 1),
(67, 3),
(68, 1),
(68, 3),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(87, 4),
(87, 5),
(88, 1),
(88, 3),
(88, 4),
(88, 5),
(89, 1),
(89, 3),
(89, 4),
(89, 5),
(90, 1),
(90, 3),
(90, 4),
(90, 5),
(91, 1),
(91, 3),
(91, 4),
(91, 5),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(96, 1),
(96, 3),
(97, 1),
(97, 3),
(97, 4),
(97, 5),
(98, 1),
(98, 3),
(98, 4),
(98, 5),
(99, 1),
(99, 3),
(99, 4),
(99, 5),
(100, 1),
(100, 3),
(100, 4),
(100, 5),
(101, 1),
(101, 3),
(101, 4),
(101, 5);

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
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-03-10 11:47:41', '2019-03-10 11:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `created_at`, `updated_at`, `price`) VALUES
(1, '2019-03-11 19:33:13', '2019-03-11 19:33:13', '8000'),
(2, '2019-03-11 19:33:20', '2019-03-11 19:33:20', '10000'),
(3, '2019-03-11 19:33:27', '2019-03-11 19:33:27', '15000'),
(4, '2019-03-11 19:33:34', '2019-03-11 19:33:34', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `remittances`
--

CREATE TABLE `remittances` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative_relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remittances`
--

INSERT INTO `remittances` (`id`, `created_at`, `updated_at`, `sender_name`, `relative_relation`, `bank_name`, `account_number`, `sender_phone`, `order_id`) VALUES
(1, '2019-03-28 14:59:12', '2019-03-28 14:59:12', 'Levi Summers', 'اخ', 'البنك السعودي', '697', '966500711887', 35),
(2, '2019-03-29 13:18:17', '2019-03-29 13:18:17', 'Stacy Summers', 'اخ', 'البنك السعودي', '214', '966580621314', 39),
(3, '2019-04-02 11:20:06', '2019-04-02 11:20:06', 'Porter Bradshaw', 'اخ', 'البنك السعودي', '519', '966551031660', 41);

-- --------------------------------------------------------

--
-- Table structure for table `rhythms`
--

CREATE TABLE `rhythms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rhythms`
--

INSERT INTO `rhythms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'shabab 3eda', '2019-03-10 21:41:20', '2019-03-10 21:41:20'),
(2, 'normal rhythm', '2019-03-10 21:41:50', '2019-03-10 21:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(2, 'user', 'Normal User', '2019-03-10 11:47:40', '2019-03-10 11:47:40'),
(3, 'developer', 'Developer', '2019-03-10 12:03:38', '2019-03-10 12:03:38'),
(4, 'singer', 'Singer', '2019-03-21 17:16:53', '2019-03-21 17:16:53'),
(5, 'moderator', 'Moderator', '2019-03-21 17:17:29', '2019-03-21 17:17:29');

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
(1, 'site.title', 'Site Title', 'Marina', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'marina description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings/March2019/ZRGL91nfdnPV4LMPr3xX.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', 'AIzaSyDa44Wo4rz0dzvTwgZG6DHdqgyCmMJkd0c', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings/March2019/2wioKtNAweLMISesjVZH.png', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Marina', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Marina Admin Panel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings/March2019/pF9iuJ0GFlShBbiQaOl6.png', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/March2019/8mOVDBGjfHdeQEfO5kHn.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.text_header', 'text header', 'فـرقــة مــاريـنـــا الـغــربـيـــة', NULL, 'text', 6, 'Site'),
(13, 'site.logo_text', 'Logo Text', 'settings/March2019/HNjf5pIWeoWIRyvGvCCO.png', NULL, 'image', 7, 'Site'),
(14, 'site.facebook', 'facebook', 'https://www.facebook.com/', NULL, 'text', 8, 'Site'),
(15, 'site.twitter', 'twitter', 'https://www.twitter.com', NULL, 'text', 9, 'Site'),
(16, 'site.instagram', 'instagram', 'https://www.instagram.com', NULL, 'text', 10, 'Site'),
(17, 'site.price_per_birdal', 'price per birdal', '50', NULL, 'text', 11, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `created_at`, `updated_at`, `name`, `country_id`, `city_id`) VALUES
(1, '2019-03-10 12:48:00', '2019-03-17 00:07:24', 'state1', 1, 1);

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
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(22, 'menu_items', 'title', 13, 'pt', 'Publicações', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(24, 'menu_items', 'title', 12, 'pt', 'Categorias', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(25, 'menu_items', 'title', 14, 'pt', 'Páginas', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-03-10 11:47:41', '2019-03-10 11:47:41'),
(31, 'data_types', 'display_name_singular', 9, 'ar', 'Country', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(32, 'data_types', 'display_name_plural', 9, 'ar', 'Countries', '2019-03-10 12:05:13', '2019-03-10 12:05:13'),
(33, 'data_types', 'display_name_singular', 14, 'ar', 'Hall', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(34, 'data_types', 'display_name_plural', 14, 'ar', 'Halls', '2019-03-10 12:05:36', '2019-03-10 12:05:36'),
(35, 'data_types', 'display_name_singular', 8, 'ar', 'Occasion', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(36, 'data_types', 'display_name_plural', 8, 'ar', 'Occasions', '2019-03-10 12:05:44', '2019-03-10 12:05:44'),
(37, 'data_types', 'display_name_singular', 12, 'ar', 'State', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(38, 'data_types', 'display_name_plural', 12, 'ar', 'States', '2019-03-10 12:06:57', '2019-03-10 12:06:57'),
(39, 'countries', 'name', 1, 'ar', 'السعودية', '2019-03-10 12:10:05', '2019-03-10 12:49:07'),
(40, 'occasions', 'name', 1, 'ar', 'زواج', '2019-03-10 12:13:03', '2019-03-10 12:31:06'),
(41, 'data_types', 'display_name_singular', 15, 'ar', 'City', '2019-03-10 12:14:11', '2019-03-10 12:14:11'),
(42, 'data_types', 'display_name_plural', 15, 'ar', 'Cities', '2019-03-10 12:14:11', '2019-03-10 12:14:11'),
(43, 'cities', 'name', 1, 'ar', 'مدينه1', '2019-03-10 12:15:23', '2019-03-10 12:48:34'),
(44, 'states', 'name', 1, 'ar', 'منطقه1', '2019-03-10 12:48:55', '2019-03-17 00:07:24'),
(45, 'conditions', 'condition', 1, 'ar', 'شرط', '2019-03-10 13:52:23', '2019-03-10 13:52:23'),
(46, 'conditions', 'condition', 2, 'ar', 'شرط2', '2019-03-10 13:52:32', '2019-03-10 13:52:32'),
(47, 'menu_items', 'title', 25, 'ar', 'التحكم', '2019-03-10 21:39:47', '2019-03-12 20:26:51'),
(48, 'rhythms', 'name', 1, 'ar', 'شباب عده', '2019-03-10 21:41:20', '2019-03-10 21:41:20'),
(49, 'rhythms', 'name', 2, 'ar', 'ايقاعات عادية', '2019-03-10 21:41:50', '2019-03-10 21:41:50'),
(50, 'machines', 'name', 1, 'ar', 'عازف عود', '2019-03-10 21:42:14', '2019-03-10 21:42:14'),
(51, 'machines', 'name', 2, 'ar', 'عازف اورج', '2019-03-10 21:42:32', '2019-03-10 21:42:32'),
(52, 'halls', 'name', 1, 'ar', 'قاعه1', '2019-03-12 18:54:25', '2019-03-12 18:54:25'),
(53, 'halls', 'name', 2, 'ar', 'قاعه2', '2019-03-12 18:54:41', '2019-03-12 18:54:41'),
(54, 'menu_items', 'title', 3, 'ar', 'الاعضاء', '2019-03-12 20:17:18', '2019-03-14 16:36:05'),
(55, 'menu_items', 'title', 26, 'ar', 'الاسعار المتاحة', '2019-03-12 20:18:29', '2019-03-12 20:25:51'),
(56, 'menu_items', 'title', 15, 'ar', 'المناسبات', '2019-03-12 20:19:25', '2019-03-12 20:22:44'),
(57, 'menu_items', 'title', 16, 'ar', 'الدول', '2019-03-12 20:19:50', '2019-03-12 20:23:51'),
(58, 'menu_items', 'title', 19, 'ar', 'المناطق', '2019-03-12 20:20:00', '2019-03-12 20:24:04'),
(59, 'menu_items', 'title', 20, 'ar', 'القاعات', '2019-03-12 20:20:24', '2019-03-12 20:24:43'),
(60, 'menu_items', 'title', 21, 'ar', 'المدن', '2019-03-12 20:20:39', '2019-03-12 20:24:18'),
(61, 'menu_items', 'title', 22, 'ar', 'شروط العقد', '2019-03-12 20:21:09', '2019-03-12 20:24:55'),
(62, 'menu_items', 'title', 23, 'ar', 'الإيقاعات', '2019-03-12 20:21:29', '2019-03-12 20:25:20'),
(63, 'menu_items', 'title', 24, 'ar', 'آلات', '2019-03-12 20:22:15', '2019-03-12 20:25:38'),
(64, 'menu_items', 'title', 1, 'ar', 'الرئيسية', '2019-03-14 16:35:43', '2019-03-14 16:35:43'),
(65, 'menu_items', 'title', 4, 'ar', 'الصلاحيات', '2019-03-14 16:35:55', '2019-03-14 16:35:55'),
(66, 'menu_items', 'title', 2, 'ar', 'مكتبة الصور', '2019-03-14 16:36:18', '2019-03-14 16:36:18'),
(67, 'menu_items', 'title', 5, 'ar', 'الادوات', '2019-03-14 16:36:31', '2019-03-14 16:36:31'),
(68, 'menu_items', 'title', 6, 'ar', 'بناء القائمة', '2019-03-14 16:36:50', '2019-03-14 16:36:50'),
(69, 'menu_items', 'title', 10, 'ar', 'الاعدادات', '2019-03-14 16:37:12', '2019-03-14 16:37:12'),
(70, 'data_types', 'display_name_singular', 21, 'ar', 'Order', '2019-03-16 16:45:42', '2019-03-16 16:45:42'),
(71, 'data_types', 'display_name_plural', 21, 'ar', 'Orders', '2019-03-16 16:45:42', '2019-03-16 16:45:42'),
(72, 'menu_items', 'title', 27, 'ar', 'الحجوزات', '2019-03-17 00:14:40', '2019-03-17 00:14:40'),
(73, 'banks', 'bank_name', 1, 'ar', 'مصرف الراجحي', '2019-03-19 17:34:43', '2019-03-19 17:34:43'),
(74, 'menu_items', 'title', 28, 'ar', 'الحسابات البنكية المتاحة', '2019-03-19 17:54:02', '2019-03-19 17:54:21'),
(79, 'menu_items', 'title', 30, 'ar', 'الافراح الماجلة', '2019-03-21 19:04:39', '2019-04-03 15:42:57'),
(80, 'data_types', 'display_name_singular', 1, 'ar', 'User', '2019-03-21 19:22:41', '2019-03-21 19:22:41'),
(81, 'data_types', 'display_name_plural', 1, 'ar', 'Users', '2019-03-21 19:22:41', '2019-03-21 19:22:41'),
(82, 'menu_items', 'title', 13, 'ar', 'المقالات', '2019-03-21 23:37:58', '2019-03-21 23:37:58'),
(83, 'menu_items', 'title', 14, 'ar', 'الصفحات', '2019-03-21 23:38:09', '2019-03-21 23:38:09'),
(84, 'menu_items', 'title', 12, 'ar', 'الاقسام', '2019-03-21 23:38:21', '2019-03-21 23:38:21'),
(85, 'data_types', 'display_name_singular', 24, 'ar', 'Groom', '2019-04-03 12:17:52', '2019-04-03 12:17:52'),
(86, 'data_types', 'display_name_plural', 24, 'ar', 'Grooms', '2019-04-03 12:17:52', '2019-04-03 12:17:52'),
(87, 'menu_items', 'title', 29, 'ar', 'العرسان المضافة حديثا', '2019-04-03 15:44:03', '2019-04-03 15:44:03'),
(88, 'menu_items', 'title', 31, 'ar', 'العقود المغلقة', '2019-04-03 16:31:59', '2019-04-03 16:33:00'),
(89, 'menu_items', 'title', 32, 'ar', 'العقود الملغاه', '2019-04-03 20:57:54', '2019-04-03 20:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `tunes`
--

CREATE TABLE `tunes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `singer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `phone`, `remember_token`, `settings`, `created_at`, `updated_at`, `singer_id`) VALUES
(2, 3, 'hisham', 'myhishamad2@gmail.com', 'users/March2019/vUxJ1H65SAwyLNYdbzWt.png', NULL, '$2y$10$KTN5dP05XKBmM6tnDgj8TOAJaBh3HjmaNFk0H6lzwO1eYqaeWnGYq', '966580621314', 'CHkGUGPnayedvFAlzUJQCro1NO7S7zWg2tfZ8lIsdLYgX7eqNQtmnmdlH8fj', '{\"locale\":null}', '2019-03-10 12:03:57', '2019-03-17 09:44:42', NULL),
(3, 1, 'admin', 'admin@admin.com', 'users/March2019/PNMPkrBQMHT2KK0tvVGn.png', NULL, '$2y$10$XRQYqdVk7JFwCUvkz4VG4eOi8euVPrgkfyrmkTZB7kv/5tps7wFyG', '966580621314', 'b1JjYbcNHTlteDGmao2SkU776Itxocg4vzjiotra58kVzSrh3fBLkZHWvZHC', '{\"locale\":null}', '2019-03-14 16:33:37', '2019-03-17 09:44:30', NULL),
(4, 4, 'singer', 'singer@gmail.com', 'users/March2019/hJShgXiplLB3Vum7wqBe.png', NULL, '$2y$10$By0GlEhhv0J70onu0LDE0OBsB7PmMqqzfc9sLY0mfl8JGenn2Hlea', NULL, 'cyeecnarESWKFnBjXsEnZcV2uuo5K6Md3VZ2Qi1idG3vttIkv1I565tIv1eZ', '{\"locale\":\"en\"}', '2019-03-21 19:01:43', '2019-04-03 20:23:16', 4),
(5, 5, 'moder gded', 'modrator@gmail.com', 'users/default.png', NULL, '$2y$10$rgZzg4T6Il8uvmNbLvKy4elbELP0oGO6CNLX0CdUP1LR.Qu9tCowq', '966580621314', 'seWE8B8zeGwAOYBV5K1wfhZrmL0bGsT8UwIYnzT7Db6faPoTN7HZ6ZHYkvVJ', '{\"locale\":null}', '2019-03-21 19:36:50', '2019-03-21 19:36:50', 4),
(8, 5, 'modrator2', 'modrator2@gmail.com', 'users/default.png', NULL, '$2y$10$gDjKmgiqJ1ZuTaCFsO76DeQcwTFlmdqYzVchrnfd1ouNFqf2cpW/.', '966580621314', NULL, '{\"locale\":null}', '2019-03-22 18:04:20', '2019-03-22 18:04:20', 4),
(10, 5, 'modrator3', 'modrator3@gmail.com', 'users/default.png', NULL, '$2y$10$0bqN/IIfsmqwii4DgDW4Y.6nlOglZCQ53wTQ3NWSDElSD5BgH2Zau', '966580621314', NULL, '{\"locale\":null}', '2019-03-22 18:08:09', '2019-03-22 18:08:09', 4),
(11, 4, 'مطرب2', 'singer2@gmail.com', 'users/default.png', NULL, '$2y$10$QS/HMB4sSHXm3G2uGVuLOeM9hJFmXsxj/E1dhL6O7ZaZjcvAIN0Ya', NULL, NULL, '{\"locale\":null}', '2019-04-03 20:23:44', '2019-04-03 20:23:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_order_id_foreign` (`order_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- Indexes for table `grooms`
--
ALTER TABLE `grooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grooms_order_id_foreign` (`order_id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `modrators`
--
ALTER TABLE `modrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`),
  ADD KEY `orders_city_id_foreign` (`city_id`),
  ADD KEY `orders_state_id_foreign` (`state_id`),
  ADD KEY `orders_tune_id_foreign` (`tune_id`);

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
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remittances`
--
ALTER TABLE `remittances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remittances_order_id_foreign` (`order_id`);

--
-- Indexes for table `rhythms`
--
ALTER TABLE `rhythms`
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
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`),
  ADD KEY `states_city_id_foreign` (`city_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `tunes`
--
ALTER TABLE `tunes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `grooms`
--
ALTER TABLE `grooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `modrators`
--
ALTER TABLE `modrators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `remittances`
--
ALTER TABLE `remittances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rhythms`
--
ALTER TABLE `rhythms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tunes`
--
ALTER TABLE `tunes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grooms`
--
ALTER TABLE `grooms`
  ADD CONSTRAINT `grooms_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_tune_id_foreign` FOREIGN KEY (`tune_id`) REFERENCES `tunes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `remittances`
--
ALTER TABLE `remittances`
  ADD CONSTRAINT `remittances_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
