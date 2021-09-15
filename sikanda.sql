-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2021 at 10:48 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 7),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 14),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 10),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 13),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 15),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 11),
(22, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 5, 'jenis_dokumen_id', 'hidden', 'Jenis Dokumen Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(24, 5, 'dinas_id', 'hidden', 'Dinas Id', 1, 1, 1, 1, 1, 1, '{}', 4),
(25, 5, 'tanggal', 'date', 'Tanggal', 1, 1, 1, 1, 1, 1, '{}', 6),
(26, 5, 'ukuran', 'hidden', 'Ukuran', 0, 1, 1, 1, 1, 1, '{}', 7),
(27, 5, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 9),
(28, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 0, '{}', 10),
(31, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(32, 9, 'nm_jenis_dokumen', 'text', 'Jenis Dokumen', 1, 1, 1, 1, 1, 1, '{}', 2),
(33, 9, 'table_name', 'text', 'Table Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(34, 9, 'primary_key', 'text', 'Primary Key', 1, 1, 1, 1, 1, 1, '{}', 4),
(35, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(36, 10, 'kd_urusan', 'text', 'Kd Urusan', 1, 1, 1, 1, 1, 1, '{}', 2),
(37, 10, 'kd_bidang', 'text', 'Kd Bidang', 1, 1, 1, 1, 1, 1, '{}', 3),
(38, 10, 'kd_unit', 'text', 'Kd Unit', 1, 1, 1, 1, 1, 1, '{}', 4),
(39, 10, 'kd_sub', 'text', 'Kd Sub', 1, 1, 1, 1, 1, 1, '{}', 5),
(40, 10, 'nm_dinas', 'text', 'Nm Dinas', 1, 1, 1, 1, 1, 1, '{}', 6),
(41, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 7),
(42, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 0, '{}', 8),
(43, 5, 'tb_dokuman_belongsto_tb_jenis_dokuman_relationship', 'relationship', 'Jenis Dokumen', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\JenisDokumen\",\"table\":\"tb_jenis_dokumen\",\"type\":\"belongsTo\",\"column\":\"jenis_dokumen_id\",\"key\":\"id\",\"label\":\"nm_jenis_dokumen\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(44, 5, 'tb_dokuman_belongsto_tb_dinas_relationship', 'relationship', 'Dinas', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dinas\",\"table\":\"tb_dinas\",\"type\":\"belongsTo\",\"column\":\"dinas_id\",\"key\":\"id\",\"label\":\"nm_dinas\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(45, 5, 'file', 'file', 'File', 1, 0, 1, 1, 1, 1, '{}', 8),
(46, 1, 'user_belongsto_tb_dina_relationship', 'relationship', 'Dinas', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dinas\",\"table\":\"tb_dinas\",\"type\":\"belongsTo\",\"column\":\"dinas_id\",\"key\":\"id\",\"label\":\"nm_dinas\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(47, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 0, 0, 0, 0, '{}', 8),
(48, 1, 'dinas_id', 'hidden', 'Dinas Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(50, 5, 'no_dokumen', 'text', 'No Dokumen', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"unique:tb_dokumen,no_dokumen\",\"messages\":{\"unique\":\"No Dokumen telah digunakan.\"}}}', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'App\\Http\\Controllers\\UserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2021-06-01 05:22:26', '2021-06-06 03:41:13'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(5, 'tb_dokumen', 'dokumen', 'Dokumen', 'Dokumen', 'voyager-documentation', 'App\\Models\\Dokumen', NULL, 'App\\Http\\Controllers\\DokumenController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"currentUser\"}', '2021-06-05 06:38:13', '2021-06-06 03:57:15'),
(9, 'tb_jenis_dokumen', 'jenis-dokumen', 'Jenis Dokumen', 'Jenis Dokumen', 'voyager-receipt', 'App\\Models\\JenisDokumen', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-06-05 06:43:54', '2021-06-05 11:31:52'),
(10, 'tb_dinas', 'dinas', 'Dinas', 'Dinas', 'voyager-company', 'App\\Models\\Dinas', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-06-05 06:49:16', '2021-06-06 02:53:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-06-01 05:22:26', '2021-06-01 05:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-06-01 05:22:26', '2021-06-01 05:22:26', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 7, '2021-06-01 05:22:26', '2021-09-15 01:46:35', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 6, '2021-06-01 05:22:26', '2021-09-15 01:35:17', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 5, '2021-06-01 05:22:26', '2021-09-15 01:35:04', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 8, '2021-06-01 05:22:26', '2021-09-15 01:46:35', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-06-01 05:22:26', '2021-06-05 11:25:04', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-06-01 05:22:26', '2021-06-05 11:25:04', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-06-01 05:22:26', '2021-06-05 11:25:04', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-06-01 05:22:26', '2021-06-05 11:25:04', 'voyager.bread.index', NULL),
(10, 1, 'Pengaturan', '', '_self', 'voyager-settings', '#000000', NULL, 9, '2021-06-01 05:22:26', '2021-09-15 01:46:25', 'voyager.settings.index', 'null'),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2021-06-01 05:22:26', '2021-06-05 11:25:04', 'voyager.hooks', NULL),
(13, 1, 'Jenis Dokumen', '', '_self', 'voyager-receipt', '#000000', NULL, 3, '2021-06-05 06:41:15', '2021-08-25 16:29:53', 'voyager.jenis-dokumen.index', 'null'),
(14, 1, 'Dinas', '', '_self', 'voyager-company', '#000000', NULL, 4, '2021-06-05 06:49:16', '2021-09-15 01:35:04', 'voyager.dinas.index', 'null'),
(16, 1, 'Dokumen', '', '_self', 'voyager-search', '#000000', NULL, 2, '2021-06-06 03:09:37', '2021-08-25 16:29:51', 'voyager.dokumen.index', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
(23, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(2, 'browse_bread', NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(3, 'browse_database', NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(4, 'browse_media', NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(5, 'browse_compass', NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(6, 'browse_menus', 'menus', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(7, 'read_menus', 'menus', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(8, 'edit_menus', 'menus', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(9, 'add_menus', 'menus', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(10, 'delete_menus', 'menus', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(11, 'browse_roles', 'roles', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(12, 'read_roles', 'roles', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(13, 'edit_roles', 'roles', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(14, 'add_roles', 'roles', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(15, 'delete_roles', 'roles', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(16, 'browse_users', 'users', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(17, 'read_users', 'users', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(18, 'edit_users', 'users', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(19, 'add_users', 'users', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(20, 'delete_users', 'users', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(21, 'browse_settings', 'settings', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(22, 'read_settings', 'settings', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(23, 'edit_settings', 'settings', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(24, 'add_settings', 'settings', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(25, 'delete_settings', 'settings', '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(26, 'browse_hooks', NULL, '2021-06-01 05:22:26', '2021-06-01 05:22:26'),
(27, 'browse_tb_dokumen', 'tb_dokumen', '2021-06-05 06:38:13', '2021-06-05 06:38:13'),
(28, 'read_tb_dokumen', 'tb_dokumen', '2021-06-05 06:38:13', '2021-06-05 06:38:13'),
(29, 'edit_tb_dokumen', 'tb_dokumen', '2021-06-05 06:38:13', '2021-06-05 06:38:13'),
(30, 'add_tb_dokumen', 'tb_dokumen', '2021-06-05 06:38:13', '2021-06-05 06:38:13'),
(31, 'delete_tb_dokumen', 'tb_dokumen', '2021-06-05 06:38:13', '2021-06-05 06:38:13'),
(37, 'browse_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 06:43:54', '2021-06-05 06:43:54'),
(38, 'read_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 06:43:54', '2021-06-05 06:43:54'),
(39, 'edit_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 06:43:54', '2021-06-05 06:43:54'),
(40, 'add_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 06:43:54', '2021-06-05 06:43:54'),
(41, 'delete_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 06:43:54', '2021-06-05 06:43:54'),
(42, 'browse_tb_dinas', 'tb_dinas', '2021-06-05 06:49:16', '2021-06-05 06:49:16'),
(43, 'read_tb_dinas', 'tb_dinas', '2021-06-05 06:49:16', '2021-06-05 06:49:16'),
(44, 'edit_tb_dinas', 'tb_dinas', '2021-06-05 06:49:16', '2021-06-05 06:49:16'),
(45, 'add_tb_dinas', 'tb_dinas', '2021-06-05 06:49:16', '2021-06-05 06:49:16'),
(46, 'delete_tb_dinas', 'tb_dinas', '2021-06-05 06:49:16', '2021-06-05 06:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
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
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', '2021-06-01 05:22:26', '2021-06-01 13:24:17'),
(2, 'admin', 'Admin', '2021-06-01 05:22:26', '2021-06-01 13:24:41'),
(3, 'user', 'User', '2021-06-01 06:06:04', '2021-06-01 06:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'SIKANDA', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Sistem Kearsipan Daerah', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\June2021\\htfU7QFFLwBJ9eqR0tG9.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'SIKANDA', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Sistem Kearsipan Daerah', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/August2021/ak2Obb2682SwogK7cbWP.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_urusan` tinyint(4) NOT NULL,
  `kd_bidang` tinyint(4) NOT NULL,
  `kd_unit` tinyint(4) NOT NULL,
  `kd_sub` tinyint(4) NOT NULL,
  `nm_dinas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_dinas`
--

INSERT INTO `tb_dinas` (`id`, `kd_urusan`, `kd_bidang`, `kd_unit`, `kd_sub`, `nm_dinas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'DINAS PENDIDIKAN', NULL, NULL),
(2, 1, 1, 1, 2, 'SMP NEGERI 1 KARIMUN', NULL, NULL),
(3, 1, 1, 1, 3, 'SMP NEGERI 2 KARIMUN', NULL, NULL),
(4, 1, 1, 1, 4, 'SMP NEGERI 3 KARIMUN', NULL, NULL),
(5, 1, 1, 1, 5, 'SMP NEGERI 1 KUNDUR', NULL, NULL),
(6, 1, 1, 1, 6, 'SMP NEGERI 2 KUNDUR', NULL, NULL),
(7, 1, 1, 1, 7, 'SMP NEGERI 1 UNGAR', NULL, NULL),
(8, 1, 1, 1, 8, 'SMP NEGERI 1 KUNDUR UTARA', NULL, NULL),
(9, 1, 1, 1, 9, 'SMP NEGERI 2 KUNDUR UTARA', NULL, NULL),
(10, 1, 1, 1, 10, 'SMP NEGERI 3 KUNDUR UTARA', NULL, NULL),
(11, 1, 1, 1, 11, 'SMP NEGERI 1 BELAT', NULL, NULL),
(12, 1, 1, 1, 12, 'SMP NEGERI 1 KUNDUR BARAT', NULL, NULL),
(13, 1, 1, 1, 13, 'SMP NEGERI 2 KUNDUR BARAT', NULL, NULL),
(14, 1, 1, 1, 14, 'SMP NEGERI 3 KUNDUR BARAT', NULL, NULL),
(15, 1, 1, 1, 15, 'SMP NEGERI 1 MORO', NULL, NULL),
(16, 1, 1, 1, 16, 'SMP NEGERI 2 MORO', NULL, NULL),
(17, 1, 1, 1, 17, 'SMP NEGERI 1 DURAI', NULL, NULL),
(18, 1, 1, 1, 18, 'SMP NEGERI 1 MERAL', NULL, NULL),
(19, 1, 1, 1, 19, 'SMP NEGERI 2 MERAL', NULL, NULL),
(20, 1, 1, 1, 20, 'SMP NEGERI 3 MERAL', NULL, NULL),
(21, 1, 1, 1, 21, 'SMP NEGERI 1 MERAL BARAT', NULL, NULL),
(22, 1, 1, 1, 22, 'SMP NEGERI 2 MERAL BARAT', NULL, NULL),
(23, 1, 1, 1, 23, 'SMP NEGERI 1 TEBING', NULL, NULL),
(24, 1, 1, 1, 24, 'SMP NEGERI 2 TEBING ', NULL, NULL),
(25, 1, 1, 1, 25, 'SMP NEGERI 3 TEBING', NULL, NULL),
(26, 1, 1, 1, 26, 'SMP NEGERI 1 BURU', NULL, NULL),
(27, 1, 1, 1, 27, 'SMP NEGERI 2 BURU', NULL, NULL),
(28, 1, 2, 1, 1, 'DINAS KESEHATAN', NULL, NULL),
(29, 1, 2, 1, 2, 'UPT BALAI PENGELOLAAN FARMASI DAN ALAT KESEHATAN (BPFAK)', NULL, NULL),
(30, 1, 2, 1, 3, 'UPT PUSKESMAS TANJUNG BALAI KECAMATAN KARIMUN (APBD)', NULL, NULL),
(31, 1, 2, 1, 4, 'UPT PUSKESMAS TANJUNG BALAI KECAMATAN KARIMUN (BLUD)', NULL, NULL),
(32, 1, 2, 1, 5, 'UPT PUSKESMAS MERAL KECAMATAN MERAL (APBD)', NULL, NULL),
(33, 1, 2, 1, 6, 'UPT PUSKESMAS MERAL KECAMATAN MERAL (BLUD)', NULL, NULL),
(34, 1, 2, 1, 7, 'UPT PUSKESMAS BURU KECAMATAN BURU', NULL, NULL),
(35, 1, 2, 1, 8, 'UPT PUSKESMAS TANJUNG BATU KECAMATAN KUNDUR (APBD)', NULL, NULL),
(36, 1, 2, 1, 9, 'UPT PUSKESMAS TANJUNG BATU KECAMATAN KUNDUR (BLUD)', NULL, NULL),
(37, 1, 2, 1, 10, 'UPT PUSKESMAS KUNDUR BARAT KECAMATAN KUNDUR BARAT (APBD)', NULL, NULL),
(38, 1, 2, 1, 11, 'UPT PUSKESMAS KUNDUR BARAT KECAMATAN KUNDUR BARAT (BLUD)', NULL, NULL),
(39, 1, 2, 1, 12, 'UPT PUSKESMAS TANJUNG BERLIAN KECAMATAN KUNDUR UTARA (APBD)', NULL, NULL),
(40, 1, 2, 1, 13, 'UPT PUSKESMAS TANJUNG BERLIAN KECAMATAN KUNDUR UTARA (BLUD)', NULL, NULL),
(41, 1, 2, 1, 14, 'UPT PUSKESMAS MORO KECAMATAN MORO', NULL, NULL),
(42, 1, 2, 1, 15, 'UPT PUSKESMAS TEBING KECAMATAN TEBING (APBD)', NULL, NULL),
(43, 1, 2, 1, 16, 'UPT PUSKESMAS TEBING KECAMATAN TEBING (BLUD)', NULL, NULL),
(44, 1, 2, 1, 17, 'UPT PUSKESMAS DURAI KECAMATAN DURAI', NULL, NULL),
(45, 1, 2, 1, 18, 'UPT PUSKESMAS NIUR PERMAI KECAMATAN MORO', NULL, NULL),
(46, 1, 2, 1, 19, 'UPT PUSKESMAS BELAT KECAMATAN BELAT', NULL, NULL),
(47, 1, 2, 1, 20, 'UPT PUSKESMAS UNGAR KECAMATAN UNGAR', NULL, NULL),
(48, 1, 2, 1, 21, 'UPT PUSKESMAS MERAL BARAT KECAMATAN MERAL BARAT', NULL, NULL),
(49, 1, 2, 2, 1, 'RSUD MUHAMMAD SANI (APBD)', NULL, NULL),
(50, 1, 2, 2, 2, 'RSUD MUHAMMAD SANI (BLUD)', NULL, NULL),
(51, 1, 3, 1, 1, 'DINAS PEKERJAAN UMUM dan PENATAAN RUANG', NULL, NULL),
(52, 1, 3, 1, 2, 'BIDANG PENGEMBANGAN SUMBER DAYA AIR', NULL, NULL),
(53, 1, 3, 1, 3, 'BIDANG BINA MARGA', NULL, NULL),
(54, 1, 3, 1, 4, 'BIDANG CIPTA KARYA', NULL, NULL),
(55, 1, 3, 1, 5, 'BIDANG TATA RUANG', NULL, NULL),
(56, 1, 4, 1, 1, 'DINAS PERUMAHAN KAWASAN PERMUKIMAN dan KEBERSIHAN', NULL, NULL),
(57, 1, 5, 1, 1, 'SATUAN POLISI PAMONG PRAJA', NULL, NULL),
(58, 1, 6, 1, 1, 'DINAS SOSIAL', NULL, NULL),
(59, 2, 1, 1, 1, 'DINAS TENAGA KERJA dan PERINDUSTRIAN', NULL, NULL),
(60, 2, 3, 1, 1, 'DINAS PANGAN dan PERTANIAN ', NULL, NULL),
(61, 2, 5, 1, 1, 'DINAS LINGKUNGAN HIDUP', NULL, NULL),
(62, 2, 6, 1, 1, 'DINAS KEPENDUDUKAN DAN  PENCATATAN SIPIL ', NULL, NULL),
(63, 2, 7, 1, 1, 'DINAS PEMBERDAYAAN MASYARAKAT dan DESA ', NULL, NULL),
(64, 2, 8, 1, 1, 'DINAS PENGENDALIAN PENDUDUK, KELUARGA BERENCANA, PEMBERDAYAAN PEREMPUAN dan PERLINDUNGAN ANAK', NULL, NULL),
(65, 2, 9, 1, 1, 'DINAS PERHUBUNGAN', NULL, NULL),
(66, 2, 12, 1, 1, 'DINAS PENANAMAN MODAL dan PELAYANAN TERPADU SATU PINTU', NULL, NULL),
(67, 2, 13, 1, 1, 'DINAS  KEPEMUDAAN dan OLAHRAGA', NULL, NULL),
(68, 2, 17, 1, 1, 'DINAS PERPUSTAKAAN dan KEARSIPAN', NULL, NULL),
(69, 3, 1, 1, 1, 'DINAS PERIKANAN', NULL, NULL),
(70, 3, 2, 1, 1, 'DINAS PARIWISATA dan KEBUDAYAAN', NULL, NULL),
(71, 3, 6, 1, 1, 'DINAS PERDAGANGAN, KOPERASI USAHA KECIL MENENGAH dan ENERGI SUMBER DAYA MINERAL', NULL, NULL),
(72, 4, 1, 1, 1, 'DEWAN PERWAKILAN RAKYAT DAERAH', NULL, NULL),
(73, 4, 1, 2, 1, 'KEPALA DAERAH DAN WAKIL KEPALA DAERAH', NULL, NULL),
(74, 4, 1, 3, 1, 'SEKRETARIAT DAERAH ', NULL, NULL),
(75, 4, 1, 3, 2, 'BAGIAN HUKUM', NULL, NULL),
(76, 4, 1, 3, 3, 'BAGIAN PEMERINTAHAN UMUM', NULL, NULL),
(77, 4, 1, 3, 4, 'BAGIAN HUBUNGAN MASYARAKAT', NULL, NULL),
(78, 4, 1, 3, 5, 'BAGIAN KESEJAHTERAAN DAN KEMASYARAKATAN', NULL, NULL),
(79, 4, 1, 3, 6, 'BAGIAN PEREKONOMIAN', NULL, NULL),
(80, 4, 1, 3, 7, 'BAGIAN LAYANAN PENGADAAN', NULL, NULL),
(81, 4, 1, 3, 8, 'BAGIAN ADMINISTRASI PEMBANGUNAN', NULL, NULL),
(82, 4, 1, 3, 9, 'BAGIAN ORGANISASI DAN KORPRI', NULL, NULL),
(83, 4, 1, 3, 10, 'BAGIAN PROTOKOL DAN RUMAH TANGGA', NULL, NULL),
(84, 4, 1, 3, 11, 'BAGIAN UMUM', NULL, NULL),
(85, 4, 1, 3, 12, 'BAGIAN PERLENGKAPAN', NULL, NULL),
(86, 4, 1, 3, 13, 'BAGIAN PENGELOLA PERBATASAN', NULL, NULL),
(87, 4, 1, 4, 1, 'SEKRETARIAT DPRD', NULL, NULL),
(88, 4, 1, 5, 1, 'BADAN KESATUAN BANGSA dan POLITIK', NULL, NULL),
(89, 4, 1, 6, 1, 'KECAMATAN KARIMUN', NULL, NULL),
(90, 4, 1, 7, 1, 'KECAMATAN MERAL', NULL, NULL),
(91, 4, 1, 8, 1, 'KECAMATAN MERAL BARAT', NULL, NULL),
(92, 4, 1, 9, 1, 'KECAMATAN TEBING', NULL, NULL),
(93, 4, 1, 10, 1, 'KECAMATAN KUNDUR', NULL, NULL),
(94, 4, 1, 11, 1, 'KECAMATAN UNGAR', NULL, NULL),
(95, 4, 1, 12, 1, 'KECAMATAN KUNDUR UTARA', NULL, NULL),
(96, 4, 1, 13, 1, 'KECAMATAN BELAT', NULL, NULL),
(97, 4, 1, 14, 1, 'KECAMATAN KUNDUR BARAT', NULL, NULL),
(98, 4, 1, 15, 1, 'KECAMATAN MORO', NULL, NULL),
(99, 4, 1, 16, 1, 'KECAMATAN BURU', NULL, NULL),
(100, 4, 1, 17, 1, 'KECAMATAN DURAI', NULL, NULL),
(101, 4, 2, 1, 1, 'INSPEKTORAT DAERAH', NULL, NULL),
(102, 4, 3, 1, 1, 'BADAN PERENCANAAN PENELITIAN dan PENGEMBANGAN', NULL, NULL),
(103, 4, 4, 6, 1, 'BADAN PENDAPATAN DAERAH', NULL, NULL),
(104, 4, 4, 7, 1, 'BADAN PENGELOLA KEUANGAN dan ASET DAERAH (PPKD)', NULL, NULL),
(105, 4, 4, 7, 2, 'BADAN PENGELOLA KEUANGAN dan ASET DAERAH (SKPD)', NULL, NULL),
(106, 4, 5, 1, 1, 'BADAN KEPEGAWAIAN dan PENGEMBANGAN SUMBER DAYA MANUSIA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_dokumen_id` int(10) UNSIGNED NOT NULL,
  `dinas_id` int(10) UNSIGNED NOT NULL,
  `no_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longblob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id`, `jenis_dokumen_id`, `dinas_id`, `no_dokumen`, `tanggal`, `ukuran`, `file`, `created_at`, `updated_at`) VALUES
(9, 1, 1, '001/ADUM/1.02.01.21/XI/2019', '2021-06-05', '32.82 KB', 0x5b7b22646f776e6c6f61645f6c696e6b223a22646f6b756d656e5c5c4a756e65323032315c5c357034726e615766416b674a524e554f325364782e706466222c226f726967696e616c5f6e616d65223a2253414d504c452e706466227d5d, '2021-06-05 11:53:31', '2021-06-05 11:53:31'),
(10, 5, 1, '001', '2017-06-07', '695.87 KB', 0x5b7b22646f776e6c6f61645f6c696e6b223a22646f6b756d656e5c2f53657074656d626572323032315c2f79714c707a344d3867365630326362444a316a762e706466222c226f726967696e616c5f6e616d65223a22357034726e615766416b674a524e554f325364782e706466227d2c7b22646f776e6c6f61645f6c696e6b223a22646f6b756d656e5c2f53657074656d626572323032315c2f47376156745972614b477765696f6876627967682e706466222c226f726967696e616c5f6e616d65223a22313635322d312d31303837382d312d31302d32303137303931352e706466227d5d, '2021-09-15 08:33:39', '2021-09-15 09:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_dokumen`
--

CREATE TABLE `tb_jenis_dokumen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nm_jenis_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_jenis_dokumen`
--

INSERT INTO `tb_jenis_dokumen` (`id`, `nm_jenis_dokumen`, `table_name`, `primary_key`) VALUES
(1, 'Kontrak', 'ta_kontrak', 'No_Kontrak'),
(2, 'Tagihan', 'ta_tagihan', 'No_Tagihan'),
(3, 'SPP', 'ta_spp', 'No_SPP'),
(4, 'SPM', 'ta_spm', 'No_SPM'),
(5, 'SP2D', 'ta_sp2d', 'No_SP2D'),
(6, 'SPJ', 'ta_spj', 'No_SPJ'),
(7, 'SPD', 'ta_spd', 'No_SPD');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dinas_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `dinas_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, 'Admin', 'admin@linoxida.us', 'users/default.png', NULL, '$2y$10$KlEyx92LJl9KTX4TUg5kTepd042Yn05Qyje4aFjtjP2ORWfzNxkSa', 'bjV12tq7t46eKpZEsVHapL4gTzfMO1RWPCpnIkW39JjcyCZKR6CECqqXeFHz', '{\"locale\":\"id\"}', '2021-06-01 13:22:01', '2021-08-25 15:14:35'),
(3, 3, 1, 'User', 'user@linoxida.us', 'users/default.png', NULL, '$2y$10$Kam1bHuuKUqaXkthnyaY5Oj3240D6t11nhSv.S3MXibRO/kEWuFW2', NULL, '{\"locale\":\"id\"}', '2021-06-06 03:34:51', '2021-09-15 01:38:30'),
(4, 1, NULL, 'sikanda', 'sikanda@linoxida.us', 'users/default.png', NULL, '$2y$10$2KkPfS5zRdkPRkBffvi0p.jPLUvWlfNWZPAyxQMKu3Qo92xGiFr7u', NULL, '{\"locale\":\"id\"}', '2021-08-25 15:11:51', '2021-08-25 15:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`) USING BTREE;

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `data_types_name_unique` (`name`) USING BTREE,
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `menus_name_unique` (`name`) USING BTREE;

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `permissions_key_index` (`key`) USING BTREE;

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  ADD KEY `permission_role_permission_id_index` (`permission_id`) USING BTREE,
  ADD KEY `permission_role_role_id_index` (`role_id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `roles_name_unique` (`name`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `settings_key_unique` (`key`) USING BTREE;

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `tb_dokumen_kode_unique` (`no_dokumen`) USING BTREE;

--
-- Indexes for table `tb_jenis_dokumen`
--
ALTER TABLE `tb_jenis_dokumen`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `users_role_id_foreign` (`role_id`) USING BTREE;

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`) USING BTREE,
  ADD KEY `user_roles_user_id_index` (`user_id`) USING BTREE,
  ADD KEY `user_roles_role_id_index` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jenis_dokumen`
--
ALTER TABLE `tb_jenis_dokumen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
