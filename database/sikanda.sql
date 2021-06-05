/*
 Navicat Premium Data Transfer

 Source Server         : laragon
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : sikanda

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 05/06/2021 14:52:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_rows
-- ----------------------------
DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE `data_rows`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_rows_data_type_id_foreign`(`data_type_id`) USING BTREE,
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_rows
-- ----------------------------
INSERT INTO `data_rows` VALUES (1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 7);
INSERT INTO `data_rows` VALUES (6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 8);
INSERT INTO `data_rows` VALUES (7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10);
INSERT INTO `data_rows` VALUES (8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 11);
INSERT INTO `data_rows` VALUES (9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13);
INSERT INTO `data_rows` VALUES (10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 14);
INSERT INTO `data_rows` VALUES (11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 15);
INSERT INTO `data_rows` VALUES (12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3);
INSERT INTO `data_rows` VALUES (15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3);
INSERT INTO `data_rows` VALUES (19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5);
INSERT INTO `data_rows` VALUES (21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 12);
INSERT INTO `data_rows` VALUES (22, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (23, 5, 'jenis_dokumen_id', 'hidden', 'Jenis Dokumen Id', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (24, 5, 'dinas_id', 'hidden', 'Dinas Id', 1, 1, 1, 1, 1, 1, '{}', 4);
INSERT INTO `data_rows` VALUES (25, 5, 'tanggal', 'date', 'Tanggal', 1, 1, 1, 1, 1, 1, '{}', 6);
INSERT INTO `data_rows` VALUES (26, 5, 'ukuran', 'hidden', 'Ukuran', 0, 1, 1, 1, 1, 1, '{}', 7);
INSERT INTO `data_rows` VALUES (27, 5, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 9);
INSERT INTO `data_rows` VALUES (28, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 0, '{}', 10);
INSERT INTO `data_rows` VALUES (31, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (32, 9, 'nm_jenis_dokumen', 'text', 'Jenis Dokumen', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (33, 9, 'table_name', 'text', 'Table Name', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (34, 9, 'primary_key', 'text', 'Primary Key', 1, 1, 1, 1, 1, 1, '{}', 4);
INSERT INTO `data_rows` VALUES (35, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (36, 10, 'kd_urusan', 'text', 'Kd Urusan', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (37, 10, 'kd_bidang', 'text', 'Kd Bidang', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (38, 10, 'kd_unit', 'text', 'Kd Unit', 1, 1, 1, 1, 1, 1, '{}', 4);
INSERT INTO `data_rows` VALUES (39, 10, 'kd_sub', 'text', 'Kd Sub', 1, 1, 1, 1, 1, 1, '{}', 5);
INSERT INTO `data_rows` VALUES (40, 10, 'nm_dinas', 'text', 'Nm Dinas', 1, 1, 1, 1, 1, 1, '{}', 6);
INSERT INTO `data_rows` VALUES (41, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 7);
INSERT INTO `data_rows` VALUES (42, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 0, '{}', 8);
INSERT INTO `data_rows` VALUES (43, 5, 'tb_dokuman_belongsto_tb_jenis_dokuman_relationship', 'relationship', 'Jenis Dokumen', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\JenisDokumen\",\"table\":\"tb_jenis_dokumen\",\"type\":\"belongsTo\",\"column\":\"jenis_dokumen_id\",\"key\":\"id\",\"label\":\"nm_jenis_dokumen\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3);
INSERT INTO `data_rows` VALUES (44, 5, 'tb_dokuman_belongsto_tb_dinas_relationship', 'relationship', 'Dinas', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dinas\",\"table\":\"tb_dinas\",\"type\":\"belongsTo\",\"column\":\"dinas_id\",\"key\":\"id\",\"label\":\"nm_dinas\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5);
INSERT INTO `data_rows` VALUES (45, 5, 'file', 'file', 'File', 1, 0, 1, 1, 1, 1, '{}', 8);
INSERT INTO `data_rows` VALUES (46, 1, 'user_belongsto_tb_dina_relationship', 'relationship', 'Dinas', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dinas\",\"table\":\"tb_dinas\",\"type\":\"belongsTo\",\"column\":\"dinas_id\",\"key\":\"id\",\"label\":\"nm_dinas\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6);
INSERT INTO `data_rows` VALUES (47, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 9);
INSERT INTO `data_rows` VALUES (48, 1, 'dinas_id', 'text', 'Dinas Id', 0, 1, 1, 1, 1, 1, '{}', 5);

-- ----------------------------
-- Table structure for data_types
-- ----------------------------
DROP TABLE IF EXISTS `data_types`;
CREATE TABLE `data_types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `policy_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `data_types_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `data_types_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_types
-- ----------------------------
INSERT INTO `data_types` VALUES (1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2021-06-01 12:22:26', '2021-06-05 14:51:47');
INSERT INTO `data_types` VALUES (2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `data_types` VALUES (3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `data_types` VALUES (5, 'tb_dokumen', 'dokumen', 'Dokuman', 'Dokumen', NULL, 'App\\Models\\Dokumen', NULL, 'App\\Http\\Controllers\\DokumenController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-06-05 13:38:13', '2021-06-05 14:25:11');
INSERT INTO `data_types` VALUES (9, 'tb_jenis_dokumen', 'jenis-dokumen', 'Jenis Dokumen', 'Jenis Dokumen', NULL, 'App\\Models\\JenisDokumen', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-06-05 13:43:54', '2021-06-05 14:10:24');
INSERT INTO `data_types` VALUES (10, 'tb_dinas', 'dinas', 'Dinas', 'Dinas', NULL, 'App\\Models\\Dinas', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-06-05 13:49:16', '2021-06-05 13:49:16');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_items_menu_id_foreign`(`menu_id`) USING BTREE,
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES (1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.dashboard', NULL);
INSERT INTO `menu_items` VALUES (2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.media.index', NULL);
INSERT INTO `menu_items` VALUES (3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.users.index', NULL);
INSERT INTO `menu_items` VALUES (4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.roles.index', NULL);
INSERT INTO `menu_items` VALUES (5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2021-06-01 12:22:26', '2021-06-01 12:22:26', NULL, NULL);
INSERT INTO `menu_items` VALUES (6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.menus.index', NULL);
INSERT INTO `menu_items` VALUES (7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.database.index', NULL);
INSERT INTO `menu_items` VALUES (8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.compass.index', NULL);
INSERT INTO `menu_items` VALUES (9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.bread.index', NULL);
INSERT INTO `menu_items` VALUES (10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.settings.index', NULL);
INSERT INTO `menu_items` VALUES (11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2021-06-01 12:22:26', '2021-06-01 12:22:26', 'voyager.hooks', NULL);
INSERT INTO `menu_items` VALUES (12, 1, 'Dokumen', '', '_self', NULL, NULL, NULL, 15, '2021-06-05 13:38:13', '2021-06-05 13:38:13', 'voyager.dokumen.index', NULL);
INSERT INTO `menu_items` VALUES (13, 1, 'Jenis Dokumen', '', '_self', NULL, NULL, NULL, 16, '2021-06-05 13:41:15', '2021-06-05 13:41:15', 'voyager.jenis-dokumen.index', NULL);
INSERT INTO `menu_items` VALUES (14, 1, 'Dinas', '', '_self', NULL, NULL, NULL, 17, '2021-06-05 13:49:16', '2021-06-05 13:49:16', 'voyager.dinas.index', NULL);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `menus_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'admin', '2021-06-01 12:22:26', '2021-06-01 12:22:26');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_01_01_000000_add_voyager_user_fields', 1);
INSERT INTO `migrations` VALUES (4, '2016_01_01_000000_create_data_types_table', 1);
INSERT INTO `migrations` VALUES (5, '2016_05_19_173453_create_menu_table', 1);
INSERT INTO `migrations` VALUES (6, '2016_10_21_190000_create_roles_table', 1);
INSERT INTO `migrations` VALUES (7, '2016_10_21_190000_create_settings_table', 1);
INSERT INTO `migrations` VALUES (8, '2016_11_30_135954_create_permission_table', 1);
INSERT INTO `migrations` VALUES (9, '2016_11_30_141208_create_permission_role_table', 1);
INSERT INTO `migrations` VALUES (10, '2016_12_26_201236_data_types__add__server_side', 1);
INSERT INTO `migrations` VALUES (11, '2017_01_13_000000_add_route_to_menu_items_table', 1);
INSERT INTO `migrations` VALUES (12, '2017_01_14_005015_create_translations_table', 1);
INSERT INTO `migrations` VALUES (13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1);
INSERT INTO `migrations` VALUES (14, '2017_03_06_000000_add_controller_to_data_types_table', 1);
INSERT INTO `migrations` VALUES (15, '2017_04_21_000000_add_order_to_data_rows_table', 1);
INSERT INTO `migrations` VALUES (16, '2017_07_05_210000_add_policyname_to_data_types_table', 1);
INSERT INTO `migrations` VALUES (17, '2017_08_05_000000_add_group_to_settings_table', 1);
INSERT INTO `migrations` VALUES (18, '2017_11_26_013050_add_user_role_relationship', 1);
INSERT INTO `migrations` VALUES (19, '2017_11_26_015000_create_user_roles_table', 1);
INSERT INTO `migrations` VALUES (20, '2018_03_11_000000_add_user_settings', 1);
INSERT INTO `migrations` VALUES (21, '2018_03_14_000000_add_details_to_data_types_table', 1);
INSERT INTO `migrations` VALUES (22, '2018_03_16_000000_make_settings_value_nullable', 1);
INSERT INTO `migrations` VALUES (23, '2019_08_19_000000_create_failed_jobs_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_permission_id_index`(`permission_id`) USING BTREE,
  INDEX `permission_role_role_id_index`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (4, 1);
INSERT INTO `permission_role` VALUES (5, 1);
INSERT INTO `permission_role` VALUES (6, 1);
INSERT INTO `permission_role` VALUES (7, 1);
INSERT INTO `permission_role` VALUES (8, 1);
INSERT INTO `permission_role` VALUES (9, 1);
INSERT INTO `permission_role` VALUES (10, 1);
INSERT INTO `permission_role` VALUES (11, 1);
INSERT INTO `permission_role` VALUES (12, 1);
INSERT INTO `permission_role` VALUES (13, 1);
INSERT INTO `permission_role` VALUES (14, 1);
INSERT INTO `permission_role` VALUES (15, 1);
INSERT INTO `permission_role` VALUES (16, 1);
INSERT INTO `permission_role` VALUES (16, 2);
INSERT INTO `permission_role` VALUES (17, 1);
INSERT INTO `permission_role` VALUES (17, 2);
INSERT INTO `permission_role` VALUES (18, 1);
INSERT INTO `permission_role` VALUES (18, 2);
INSERT INTO `permission_role` VALUES (19, 1);
INSERT INTO `permission_role` VALUES (19, 2);
INSERT INTO `permission_role` VALUES (20, 1);
INSERT INTO `permission_role` VALUES (20, 2);
INSERT INTO `permission_role` VALUES (21, 1);
INSERT INTO `permission_role` VALUES (21, 2);
INSERT INTO `permission_role` VALUES (22, 1);
INSERT INTO `permission_role` VALUES (22, 2);
INSERT INTO `permission_role` VALUES (23, 1);
INSERT INTO `permission_role` VALUES (23, 2);
INSERT INTO `permission_role` VALUES (24, 1);
INSERT INTO `permission_role` VALUES (25, 1);
INSERT INTO `permission_role` VALUES (26, 1);
INSERT INTO `permission_role` VALUES (27, 1);
INSERT INTO `permission_role` VALUES (27, 2);
INSERT INTO `permission_role` VALUES (28, 1);
INSERT INTO `permission_role` VALUES (28, 2);
INSERT INTO `permission_role` VALUES (29, 1);
INSERT INTO `permission_role` VALUES (29, 2);
INSERT INTO `permission_role` VALUES (30, 1);
INSERT INTO `permission_role` VALUES (30, 2);
INSERT INTO `permission_role` VALUES (31, 1);
INSERT INTO `permission_role` VALUES (31, 2);
INSERT INTO `permission_role` VALUES (37, 1);
INSERT INTO `permission_role` VALUES (37, 2);
INSERT INTO `permission_role` VALUES (38, 1);
INSERT INTO `permission_role` VALUES (38, 2);
INSERT INTO `permission_role` VALUES (39, 1);
INSERT INTO `permission_role` VALUES (39, 2);
INSERT INTO `permission_role` VALUES (40, 1);
INSERT INTO `permission_role` VALUES (40, 2);
INSERT INTO `permission_role` VALUES (41, 1);
INSERT INTO `permission_role` VALUES (41, 2);
INSERT INTO `permission_role` VALUES (42, 1);
INSERT INTO `permission_role` VALUES (42, 2);
INSERT INTO `permission_role` VALUES (43, 1);
INSERT INTO `permission_role` VALUES (43, 2);
INSERT INTO `permission_role` VALUES (44, 1);
INSERT INTO `permission_role` VALUES (44, 2);
INSERT INTO `permission_role` VALUES (45, 1);
INSERT INTO `permission_role` VALUES (45, 2);
INSERT INTO `permission_role` VALUES (46, 1);
INSERT INTO `permission_role` VALUES (46, 2);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permissions_key_index`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'browse_admin', NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (2, 'browse_bread', NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (3, 'browse_database', NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (4, 'browse_media', NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (5, 'browse_compass', NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (6, 'browse_menus', 'menus', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (7, 'read_menus', 'menus', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (8, 'edit_menus', 'menus', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (9, 'add_menus', 'menus', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (10, 'delete_menus', 'menus', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (11, 'browse_roles', 'roles', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (12, 'read_roles', 'roles', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (13, 'edit_roles', 'roles', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (14, 'add_roles', 'roles', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (15, 'delete_roles', 'roles', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (16, 'browse_users', 'users', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (17, 'read_users', 'users', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (18, 'edit_users', 'users', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (19, 'add_users', 'users', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (20, 'delete_users', 'users', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (21, 'browse_settings', 'settings', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (22, 'read_settings', 'settings', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (23, 'edit_settings', 'settings', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (24, 'add_settings', 'settings', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (25, 'delete_settings', 'settings', '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (26, 'browse_hooks', NULL, '2021-06-01 12:22:26', '2021-06-01 12:22:26');
INSERT INTO `permissions` VALUES (27, 'browse_tb_dokumen', 'tb_dokumen', '2021-06-05 13:38:13', '2021-06-05 13:38:13');
INSERT INTO `permissions` VALUES (28, 'read_tb_dokumen', 'tb_dokumen', '2021-06-05 13:38:13', '2021-06-05 13:38:13');
INSERT INTO `permissions` VALUES (29, 'edit_tb_dokumen', 'tb_dokumen', '2021-06-05 13:38:13', '2021-06-05 13:38:13');
INSERT INTO `permissions` VALUES (30, 'add_tb_dokumen', 'tb_dokumen', '2021-06-05 13:38:13', '2021-06-05 13:38:13');
INSERT INTO `permissions` VALUES (31, 'delete_tb_dokumen', 'tb_dokumen', '2021-06-05 13:38:13', '2021-06-05 13:38:13');
INSERT INTO `permissions` VALUES (37, 'browse_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 13:43:54', '2021-06-05 13:43:54');
INSERT INTO `permissions` VALUES (38, 'read_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 13:43:54', '2021-06-05 13:43:54');
INSERT INTO `permissions` VALUES (39, 'edit_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 13:43:54', '2021-06-05 13:43:54');
INSERT INTO `permissions` VALUES (40, 'add_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 13:43:54', '2021-06-05 13:43:54');
INSERT INTO `permissions` VALUES (41, 'delete_tb_jenis_dokumen', 'tb_jenis_dokumen', '2021-06-05 13:43:54', '2021-06-05 13:43:54');
INSERT INTO `permissions` VALUES (42, 'browse_tb_dinas', 'tb_dinas', '2021-06-05 13:49:16', '2021-06-05 13:49:16');
INSERT INTO `permissions` VALUES (43, 'read_tb_dinas', 'tb_dinas', '2021-06-05 13:49:16', '2021-06-05 13:49:16');
INSERT INTO `permissions` VALUES (44, 'edit_tb_dinas', 'tb_dinas', '2021-06-05 13:49:16', '2021-06-05 13:49:16');
INSERT INTO `permissions` VALUES (45, 'add_tb_dinas', 'tb_dinas', '2021-06-05 13:49:16', '2021-06-05 13:49:16');
INSERT INTO `permissions` VALUES (46, 'delete_tb_dinas', 'tb_dinas', '2021-06-05 13:49:16', '2021-06-05 13:49:16');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', 'Super Admin', '2021-06-01 12:22:26', '2021-06-01 20:24:17');
INSERT INTO `roles` VALUES (2, 'admin', 'Admin', '2021-06-01 12:22:26', '2021-06-01 20:24:41');
INSERT INTO `roles` VALUES (3, 'user', 'User', '2021-06-01 13:06:04', '2021-06-01 13:06:16');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `settings_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'site.title', 'Site Title', 'SIKANDA', '', 'text', 1, 'Site');
INSERT INTO `settings` VALUES (2, 'site.description', 'Site Description', 'Sistem Kearsipan Daerah', '', 'text', 2, 'Site');
INSERT INTO `settings` VALUES (3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site');
INSERT INTO `settings` VALUES (4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site');
INSERT INTO `settings` VALUES (5, 'admin.bg_image', 'Admin Background Image', 'settings\\June2021\\htfU7QFFLwBJ9eqR0tG9.jpg', '', 'image', 5, 'Admin');
INSERT INTO `settings` VALUES (6, 'admin.title', 'Admin Title', 'SIKANDA', '', 'text', 1, 'Admin');
INSERT INTO `settings` VALUES (7, 'admin.description', 'Admin Description', 'Sistem Kearsipan Daerah', '', 'text', 2, 'Admin');
INSERT INTO `settings` VALUES (8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin');
INSERT INTO `settings` VALUES (9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin');
INSERT INTO `settings` VALUES (10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- ----------------------------
-- Table structure for tb_dinas
-- ----------------------------
DROP TABLE IF EXISTS `tb_dinas`;
CREATE TABLE `tb_dinas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kd_urusan` tinyint(4) NOT NULL,
  `kd_bidang` tinyint(4) NOT NULL,
  `kd_unit` tinyint(4) NOT NULL,
  `kd_sub` tinyint(4) NOT NULL,
  `nm_dinas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 107 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_dinas
-- ----------------------------
INSERT INTO `tb_dinas` VALUES (1, 1, 1, 1, 1, 'DINAS PENDIDIKAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (2, 1, 1, 1, 2, 'SMP NEGERI 1 KARIMUN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (3, 1, 1, 1, 3, 'SMP NEGERI 2 KARIMUN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (4, 1, 1, 1, 4, 'SMP NEGERI 3 KARIMUN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (5, 1, 1, 1, 5, 'SMP NEGERI 1 KUNDUR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (6, 1, 1, 1, 6, 'SMP NEGERI 2 KUNDUR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (7, 1, 1, 1, 7, 'SMP NEGERI 1 UNGAR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (8, 1, 1, 1, 8, 'SMP NEGERI 1 KUNDUR UTARA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (9, 1, 1, 1, 9, 'SMP NEGERI 2 KUNDUR UTARA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (10, 1, 1, 1, 10, 'SMP NEGERI 3 KUNDUR UTARA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (11, 1, 1, 1, 11, 'SMP NEGERI 1 BELAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (12, 1, 1, 1, 12, 'SMP NEGERI 1 KUNDUR BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (13, 1, 1, 1, 13, 'SMP NEGERI 2 KUNDUR BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (14, 1, 1, 1, 14, 'SMP NEGERI 3 KUNDUR BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (15, 1, 1, 1, 15, 'SMP NEGERI 1 MORO', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (16, 1, 1, 1, 16, 'SMP NEGERI 2 MORO', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (17, 1, 1, 1, 17, 'SMP NEGERI 1 DURAI', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (18, 1, 1, 1, 18, 'SMP NEGERI 1 MERAL', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (19, 1, 1, 1, 19, 'SMP NEGERI 2 MERAL', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (20, 1, 1, 1, 20, 'SMP NEGERI 3 MERAL', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (21, 1, 1, 1, 21, 'SMP NEGERI 1 MERAL BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (22, 1, 1, 1, 22, 'SMP NEGERI 2 MERAL BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (23, 1, 1, 1, 23, 'SMP NEGERI 1 TEBING', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (24, 1, 1, 1, 24, 'SMP NEGERI 2 TEBING ', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (25, 1, 1, 1, 25, 'SMP NEGERI 3 TEBING', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (26, 1, 1, 1, 26, 'SMP NEGERI 1 BURU', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (27, 1, 1, 1, 27, 'SMP NEGERI 2 BURU', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (28, 1, 2, 1, 1, 'DINAS KESEHATAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (29, 1, 2, 1, 2, 'UPT BALAI PENGELOLAAN FARMASI DAN ALAT KESEHATAN (BPFAK)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (30, 1, 2, 1, 3, 'UPT PUSKESMAS TANJUNG BALAI KECAMATAN KARIMUN (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (31, 1, 2, 1, 4, 'UPT PUSKESMAS TANJUNG BALAI KECAMATAN KARIMUN (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (32, 1, 2, 1, 5, 'UPT PUSKESMAS MERAL KECAMATAN MERAL (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (33, 1, 2, 1, 6, 'UPT PUSKESMAS MERAL KECAMATAN MERAL (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (34, 1, 2, 1, 7, 'UPT PUSKESMAS BURU KECAMATAN BURU', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (35, 1, 2, 1, 8, 'UPT PUSKESMAS TANJUNG BATU KECAMATAN KUNDUR (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (36, 1, 2, 1, 9, 'UPT PUSKESMAS TANJUNG BATU KECAMATAN KUNDUR (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (37, 1, 2, 1, 10, 'UPT PUSKESMAS KUNDUR BARAT KECAMATAN KUNDUR BARAT (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (38, 1, 2, 1, 11, 'UPT PUSKESMAS KUNDUR BARAT KECAMATAN KUNDUR BARAT (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (39, 1, 2, 1, 12, 'UPT PUSKESMAS TANJUNG BERLIAN KECAMATAN KUNDUR UTARA (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (40, 1, 2, 1, 13, 'UPT PUSKESMAS TANJUNG BERLIAN KECAMATAN KUNDUR UTARA (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (41, 1, 2, 1, 14, 'UPT PUSKESMAS MORO KECAMATAN MORO', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (42, 1, 2, 1, 15, 'UPT PUSKESMAS TEBING KECAMATAN TEBING (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (43, 1, 2, 1, 16, 'UPT PUSKESMAS TEBING KECAMATAN TEBING (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (44, 1, 2, 1, 17, 'UPT PUSKESMAS DURAI KECAMATAN DURAI', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (45, 1, 2, 1, 18, 'UPT PUSKESMAS NIUR PERMAI KECAMATAN MORO', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (46, 1, 2, 1, 19, 'UPT PUSKESMAS BELAT KECAMATAN BELAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (47, 1, 2, 1, 20, 'UPT PUSKESMAS UNGAR KECAMATAN UNGAR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (48, 1, 2, 1, 21, 'UPT PUSKESMAS MERAL BARAT KECAMATAN MERAL BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (49, 1, 2, 2, 1, 'RSUD MUHAMMAD SANI (APBD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (50, 1, 2, 2, 2, 'RSUD MUHAMMAD SANI (BLUD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (51, 1, 3, 1, 1, 'DINAS PEKERJAAN UMUM dan PENATAAN RUANG', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (52, 1, 3, 1, 2, 'BIDANG PENGEMBANGAN SUMBER DAYA AIR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (53, 1, 3, 1, 3, 'BIDANG BINA MARGA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (54, 1, 3, 1, 4, 'BIDANG CIPTA KARYA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (55, 1, 3, 1, 5, 'BIDANG TATA RUANG', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (56, 1, 4, 1, 1, 'DINAS PERUMAHAN KAWASAN PERMUKIMAN dan KEBERSIHAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (57, 1, 5, 1, 1, 'SATUAN POLISI PAMONG PRAJA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (58, 1, 6, 1, 1, 'DINAS SOSIAL', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (59, 2, 1, 1, 1, 'DINAS TENAGA KERJA dan PERINDUSTRIAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (60, 2, 3, 1, 1, 'DINAS PANGAN dan PERTANIAN ', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (61, 2, 5, 1, 1, 'DINAS LINGKUNGAN HIDUP', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (62, 2, 6, 1, 1, 'DINAS KEPENDUDUKAN DAN  PENCATATAN SIPIL ', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (63, 2, 7, 1, 1, 'DINAS PEMBERDAYAAN MASYARAKAT dan DESA ', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (64, 2, 8, 1, 1, 'DINAS PENGENDALIAN PENDUDUK, KELUARGA BERENCANA, PEMBERDAYAAN PEREMPUAN dan PERLINDUNGAN ANAK', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (65, 2, 9, 1, 1, 'DINAS PERHUBUNGAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (66, 2, 12, 1, 1, 'DINAS PENANAMAN MODAL dan PELAYANAN TERPADU SATU PINTU', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (67, 2, 13, 1, 1, 'DINAS  KEPEMUDAAN dan OLAHRAGA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (68, 2, 17, 1, 1, 'DINAS PERPUSTAKAAN dan KEARSIPAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (69, 3, 1, 1, 1, 'DINAS PERIKANAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (70, 3, 2, 1, 1, 'DINAS PARIWISATA dan KEBUDAYAAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (71, 3, 6, 1, 1, 'DINAS PERDAGANGAN, KOPERASI USAHA KECIL MENENGAH dan ENERGI SUMBER DAYA MINERAL', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (72, 4, 1, 1, 1, 'DEWAN PERWAKILAN RAKYAT DAERAH', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (73, 4, 1, 2, 1, 'KEPALA DAERAH DAN WAKIL KEPALA DAERAH', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (74, 4, 1, 3, 1, 'SEKRETARIAT DAERAH ', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (75, 4, 1, 3, 2, 'BAGIAN HUKUM', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (76, 4, 1, 3, 3, 'BAGIAN PEMERINTAHAN UMUM', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (77, 4, 1, 3, 4, 'BAGIAN HUBUNGAN MASYARAKAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (78, 4, 1, 3, 5, 'BAGIAN KESEJAHTERAAN DAN KEMASYARAKATAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (79, 4, 1, 3, 6, 'BAGIAN PEREKONOMIAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (80, 4, 1, 3, 7, 'BAGIAN LAYANAN PENGADAAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (81, 4, 1, 3, 8, 'BAGIAN ADMINISTRASI PEMBANGUNAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (82, 4, 1, 3, 9, 'BAGIAN ORGANISASI DAN KORPRI', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (83, 4, 1, 3, 10, 'BAGIAN PROTOKOL DAN RUMAH TANGGA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (84, 4, 1, 3, 11, 'BAGIAN UMUM', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (85, 4, 1, 3, 12, 'BAGIAN PERLENGKAPAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (86, 4, 1, 3, 13, 'BAGIAN PENGELOLA PERBATASAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (87, 4, 1, 4, 1, 'SEKRETARIAT DPRD', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (88, 4, 1, 5, 1, 'BADAN KESATUAN BANGSA dan POLITIK', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (89, 4, 1, 6, 1, 'KECAMATAN KARIMUN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (90, 4, 1, 7, 1, 'KECAMATAN MERAL', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (91, 4, 1, 8, 1, 'KECAMATAN MERAL BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (92, 4, 1, 9, 1, 'KECAMATAN TEBING', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (93, 4, 1, 10, 1, 'KECAMATAN KUNDUR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (94, 4, 1, 11, 1, 'KECAMATAN UNGAR', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (95, 4, 1, 12, 1, 'KECAMATAN KUNDUR UTARA', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (96, 4, 1, 13, 1, 'KECAMATAN BELAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (97, 4, 1, 14, 1, 'KECAMATAN KUNDUR BARAT', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (98, 4, 1, 15, 1, 'KECAMATAN MORO', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (99, 4, 1, 16, 1, 'KECAMATAN BURU', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (100, 4, 1, 17, 1, 'KECAMATAN DURAI', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (101, 4, 2, 1, 1, 'INSPEKTORAT DAERAH', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (102, 4, 3, 1, 1, 'BADAN PERENCANAAN PENELITIAN dan PENGEMBANGAN', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (103, 4, 4, 6, 1, 'BADAN PENDAPATAN DAERAH', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (104, 4, 4, 7, 1, 'BADAN PENGELOLA KEUANGAN dan ASET DAERAH (PPKD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (105, 4, 4, 7, 2, 'BADAN PENGELOLA KEUANGAN dan ASET DAERAH (SKPD)', NULL, NULL);
INSERT INTO `tb_dinas` VALUES (106, 4, 5, 1, 1, 'BADAN KEPEGAWAIAN dan PENGEMBANGAN SUMBER DAYA MANUSIA', NULL, NULL);

-- ----------------------------
-- Table structure for tb_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `tb_dokumen`;
CREATE TABLE `tb_dokumen`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis_dokumen_id` int(10) UNSIGNED NOT NULL,
  `dinas_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `ukuran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file` longblob NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_dokumen
-- ----------------------------
INSERT INTO `tb_dokumen` VALUES (5, 1, 1, '2021-06-05', '32.82 KB', 0x5B7B22646F776E6C6F61645F6C696E6B223A22646F6B756D656E5C5C4A756E65323032315C5C38734750726C3062737772554C776F766E5633772E706466222C226F726967696E616C5F6E616D65223A2253414D504C452E706466227D5D, '2021-06-05 14:38:48', '2021-06-05 14:38:48');
INSERT INTO `tb_dokumen` VALUES (6, 1, 2, '2021-06-05', '2241.56 KB', 0x5B7B22646F776E6C6F61645F6C696E6B223A22646F6B756D656E5C5C4A756E65323032315C5C426C3975797A384A466A444C57304D4A323946392E706466222C226F726967696E616C5F6E616D65223A2253494B41524441323032302E706466227D5D, '2021-06-05 14:39:08', '2021-06-05 14:39:08');

-- ----------------------------
-- Table structure for tb_jenis_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_dokumen`;
CREATE TABLE `tb_jenis_dokumen`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nm_jenis_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jenis_dokumen
-- ----------------------------
INSERT INTO `tb_jenis_dokumen` VALUES (1, 'Kontrak', 'ta_kontrak', 'No_Kontrak');
INSERT INTO `tb_jenis_dokumen` VALUES (2, 'Tagihan', 'ta_tagihan', 'No_Tagihan');
INSERT INTO `tb_jenis_dokumen` VALUES (3, 'SPP', 'ta_spp', 'No_SPP');
INSERT INTO `tb_jenis_dokumen` VALUES (4, 'SPM', 'ta_spm', 'No_SPM');
INSERT INTO `tb_jenis_dokumen` VALUES (5, 'SP2D', 'ta_sp2d', 'No_SP2D');
INSERT INTO `tb_jenis_dokumen` VALUES (6, 'SPJ', 'ta_spj', 'No_SPJ');
INSERT INTO `tb_jenis_dokumen` VALUES (7, 'SPD', 'ta_spd', 'No_SPD');

-- ----------------------------
-- Table structure for translations
-- ----------------------------
DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `translations_table_name_column_name_foreign_key_locale_unique`(`table_name`, `column_name`, `foreign_key`, `locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of translations
-- ----------------------------

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `user_roles_user_id_index`(`user_id`) USING BTREE,
  INDEX `user_roles_role_id_index`(`role_id`) USING BTREE,
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_roles
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `dinas_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'users/default.png',
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, NULL, 'Super Admin', 'sikanda@sikanda.com', 'users/default.png', NULL, '$2y$10$2RSJ0QM3N28gQk8j6oRgWuDAr5X57VRLdPJ7XmtabseNWDiYxF.dC', NULL, '{\"locale\":\"id\"}', '2021-06-01 12:22:59', '2021-06-01 20:25:11');
INSERT INTO `users` VALUES (2, 2, NULL, 'Admin', 'admin@sikanda.com', 'users/default.png', NULL, '$2y$10$DFloSE3P2AFq9YM9LdXbxeeFSZZfNk8R6yTpPBi8a4aIJ/XkgbKtS', NULL, '{\"locale\":\"id\"}', '2021-06-01 20:22:01', '2021-06-01 20:24:57');

SET FOREIGN_KEY_CHECKS = 1;
