# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.23)
# Database: selling
# Generation Time: 2018-11-14 01:41:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `meta_title`, `description`, `status`, `parent_id`, `created_at`, `updated_at`)
VALUES
	(1,'Men','men',NULL,1,1,'2018-11-07 13:29:26','2018-11-07 13:29:26'),
	(2,'Women','women','for women',NULL,1,'2018-11-08 02:33:23','2018-11-08 02:33:23');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_rows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
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
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`)
VALUES
	(13,2,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(14,2,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(15,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),
	(16,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),
	(17,3,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(18,3,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(19,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),
	(20,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),
	(21,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),
	(30,5,'id','hidden','Id',1,0,0,0,0,0,'{}',1),
	(31,5,'product_code','text','Product Code',1,1,1,1,1,1,'{}',3),
	(32,5,'name','text','Name',1,1,1,1,1,1,'{}',4),
	(33,5,'meta_title','text','Meta Title',0,1,1,1,1,1,'{}',5),
	(34,5,'description','text','Description',0,1,1,1,1,1,'{}',6),
	(35,5,'unit_price','text','Unit Price',0,1,1,1,1,1,'{}',7),
	(36,5,'promotion_price','text','Promotion Price',0,1,1,1,1,1,'{}',8),
	(37,5,'representative_image','image','Representative Image',0,1,1,1,1,1,'{}',9),
	(38,5,'status','text','Status',0,1,1,1,1,1,'{}',10),
	(39,5,'category_id','text','Category Id',1,1,1,1,1,1,'{}',2),
	(40,5,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',11),
	(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),
	(42,7,'id','text','Id',1,1,0,0,0,0,'{}',1),
	(43,7,'name','text','Name',1,1,1,1,1,1,'{}',3),
	(44,7,'meta_title','text','Meta Title',0,1,1,1,1,1,'{}',4),
	(45,7,'description','text_area','Description',0,1,1,1,1,1,'{}',5),
	(46,7,'status','text','Status',0,1,1,1,1,1,'{}',6),
	(47,7,'parent_id','text','Parent Id',1,1,1,1,1,1,'{}',2),
	(48,7,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',7),
	(49,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),
	(50,8,'id','text','Id',1,1,0,0,0,0,'{}',1),
	(51,8,'role_id','text','Role Id',0,1,1,1,1,1,'{}',2),
	(52,8,'username','text','Username',1,1,1,1,1,1,'{}',3),
	(53,8,'password','hidden','Password',1,0,0,0,0,0,'{}',4),
	(54,8,'email','text','Email',1,1,1,1,1,1,'{}',5),
	(55,8,'avatar','image','Avatar',0,1,1,1,1,1,'{}',6),
	(56,8,'fullname','text','Fullname',0,1,1,1,1,1,'{}',7),
	(57,8,'address','text','Address',0,1,1,1,1,1,'{}',8),
	(58,8,'phone','text','Phone',0,1,1,1,1,1,'{}',9),
	(59,8,'status','text','Status',0,1,1,1,1,1,'{}',10),
	(60,8,'remember_token','text','Remember Token',0,1,1,1,1,1,'{}',11),
	(61,8,'settings','text','Settings',0,1,1,1,1,1,'{}',12),
	(62,8,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',13),
	(63,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',14),
	(64,12,'id','text','Id',1,1,0,0,0,0,'{}',1),
	(65,12,'image','image','Image',1,1,1,1,1,1,'{}',3),
	(66,12,'status','text','Status',0,1,1,1,1,1,'{}',4),
	(67,12,'product_id','text','Product Id',1,1,1,1,1,1,'{}',2),
	(68,12,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',5),
	(69,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),
	(70,13,'id','text','Id',1,1,0,0,0,0,'{}',1),
	(71,13,'size','text','Size',1,1,1,1,1,1,'{}',3),
	(72,13,'color','text','Color',1,1,1,1,1,1,'{}',4),
	(73,13,'quantity','text','Quantity',1,1,1,1,1,1,'{}',5),
	(74,13,'status','text','Status',0,1,1,1,1,1,'{}',6),
	(75,13,'product_id','text','Product Id',1,1,1,1,1,1,'{}',2),
	(76,13,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',7),
	(77,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8);

/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`)
VALUES
	(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(5,'products','products','Product','Products','voyager-bag','App\\Product',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-11-07 13:00:45','2018-11-08 02:30:26'),
	(7,'categories','categories','Category','Categories','voyager-categories','App\\Category',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-11-07 13:27:15','2018-11-07 13:30:31'),
	(8,'users','users','User','Users','voyager-person','App\\User',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-11-07 14:31:19','2018-11-07 14:32:28'),
	(12,'more_images','more-images','More Image','More Images',NULL,'App\\MoreImages',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-11-08 02:16:52','2018-11-08 02:16:52'),
	(13,'size_colors','size-colors','Size Color','Size Colors',NULL,'App\\SizeColors',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-11-08 02:17:37','2018-11-08 02:17:37');

/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
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
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`)
VALUES
	(1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2018-11-07 12:50:58','2018-11-07 12:50:58','voyager.dashboard',NULL),
	(2,1,'Media','','_self','voyager-images',NULL,NULL,4,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.media.index',NULL),
	(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2018-11-07 12:50:58','2018-11-07 12:50:58','voyager.users.index',NULL),
	(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2018-11-07 12:50:58','2018-11-07 12:50:58','voyager.roles.index',NULL),
	(5,1,'Tools','','_self','voyager-tools',NULL,NULL,7,'2018-11-07 12:50:58','2018-11-07 13:28:50',NULL,NULL),
	(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.menus.index',NULL),
	(7,1,'Database','','_self','voyager-data',NULL,5,2,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.database.index',NULL),
	(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.compass.index',NULL),
	(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.bread.index',NULL),
	(10,1,'Settings','','_self','voyager-settings',NULL,NULL,8,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.settings.index',NULL),
	(11,1,'Categories','','_self','voyager-categories',NULL,NULL,6,'2018-11-07 12:50:58','2018-11-07 13:28:50','voyager.categories.index',NULL),
	(12,1,'Products','','_self','voyager-bag',NULL,NULL,5,'2018-11-07 13:00:45','2018-11-07 13:28:50','voyager.products.index',NULL),
	(13,1,'More Images','','_self',NULL,NULL,NULL,9,'2018-11-08 02:16:52','2018-11-08 02:16:52','voyager.more-images.index',NULL),
	(14,1,'Size Colors','','_self',NULL,NULL,NULL,10,'2018-11-08 02:17:37','2018-11-08 02:17:37','voyager.size-colors.index',NULL);

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2018-11-07 12:50:58','2018-11-07 12:50:58');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2016_01_01_000000_add_voyager_user_fields',1),
	(4,'2016_01_01_000000_create_data_types_table',1),
	(5,'2016_01_01_000000_create_pages_table',1),
	(6,'2016_01_01_000000_create_posts_table',1),
	(7,'2016_05_19_173453_create_menu_table',1),
	(8,'2016_10_21_190000_create_roles_table',1),
	(9,'2016_10_21_190000_create_settings_table',1),
	(10,'2016_11_30_135954_create_permission_table',1),
	(11,'2016_11_30_141208_create_permission_role_table',1),
	(12,'2016_12_26_201236_data_types__add__server_side',1),
	(13,'2017_01_13_000000_add_route_to_menu_items_table',1),
	(14,'2017_01_14_005015_create_translations_table',1),
	(15,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),
	(16,'2017_03_06_000000_add_controller_to_data_types_table',1),
	(17,'2017_04_11_000000_alter_post_nullable_fields_table',1),
	(18,'2017_04_21_000000_add_order_to_data_rows_table',1),
	(19,'2017_07_05_210000_add_policyname_to_data_types_table',1),
	(20,'2017_08_05_000000_add_group_to_settings_table',1),
	(21,'2017_11_26_013050_add_user_role_relationship',1),
	(22,'2017_11_26_015000_create_user_roles_table',1),
	(23,'2018_03_11_000000_add_user_settings',1),
	(24,'2018_03_14_000000_add_details_to_data_types_table',1),
	(25,'2018_03_16_000000_make_settings_value_nullable',1),
	(26,'2018_11_07_040455_create_categories_table',1),
	(27,'2018_11_07_040608_create_slides_table',1),
	(28,'2018_11_07_040735_create_admin_table',1),
	(29,'2018_11_07_051113_create_products_table',1),
	(30,'2018_11_07_051125_create_more_images_table',1),
	(31,'2018_11_07_051135_create_size_colors_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table more_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `more_images`;

CREATE TABLE `more_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `more_images_product_id_foreign` (`product_id`),
  CONSTRAINT `more_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `more_images` WRITE;
/*!40000 ALTER TABLE `more_images` DISABLE KEYS */;

INSERT INTO `more_images` (`id`, `image`, `status`, `product_id`, `created_at`, `updated_at`)
VALUES
	(1,'more-images/November2018/C6PWQLAOWS7gvjFJQT7n.jpg',NULL,1,'2018-11-08 02:20:05','2018-11-08 02:20:05'),
	(2,'more-images/November2018/flQElfnfcHk2yi02REso.jpg',NULL,1,'2018-11-08 02:20:21','2018-11-08 02:20:21'),
	(3,'more-images/November2018/d259eC61FXjI4eOUond1.jpg',NULL,2,'2018-11-08 02:24:04','2018-11-08 02:24:04'),
	(4,'more-images/November2018/FjPWmo4WnhfrpF4vNNSS.jpg',NULL,2,'2018-11-08 02:24:18','2018-11-08 02:24:18'),
	(5,'more-images/November2018/g18kOMhKYPHuhDvLj5JW.jpg',NULL,3,'2018-11-08 02:38:34','2018-11-08 02:38:34'),
	(6,'more-images/November2018/mHAzZAUbsyqXvZqE802l.jpg',NULL,3,'2018-11-08 02:38:54','2018-11-08 02:38:54');

/*!40000 ALTER TABLE `more_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(35,1),
	(36,1),
	(37,1),
	(38,1),
	(39,1),
	(40,1),
	(41,1),
	(42,1),
	(43,1),
	(44,1),
	(45,1),
	(46,1),
	(47,1),
	(48,1),
	(49,1),
	(50,1),
	(51,1),
	(52,1),
	(53,1),
	(54,1),
	(55,1);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`)
VALUES
	(1,'browse_admin',NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(2,'browse_bread',NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(3,'browse_database',NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(4,'browse_media',NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(5,'browse_compass',NULL,'2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(6,'browse_menus','menus','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(7,'read_menus','menus','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(8,'edit_menus','menus','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(9,'add_menus','menus','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(10,'delete_menus','menus','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(11,'browse_roles','roles','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(12,'read_roles','roles','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(13,'edit_roles','roles','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(14,'add_roles','roles','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(15,'delete_roles','roles','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(21,'browse_settings','settings','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(22,'read_settings','settings','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(23,'edit_settings','settings','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(24,'add_settings','settings','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(25,'delete_settings','settings','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(31,'browse_products','products','2018-11-07 13:00:45','2018-11-07 13:00:45'),
	(32,'read_products','products','2018-11-07 13:00:45','2018-11-07 13:00:45'),
	(33,'edit_products','products','2018-11-07 13:00:45','2018-11-07 13:00:45'),
	(34,'add_products','products','2018-11-07 13:00:45','2018-11-07 13:00:45'),
	(35,'delete_products','products','2018-11-07 13:00:45','2018-11-07 13:00:45'),
	(36,'browse_categories','categories','2018-11-07 13:27:15','2018-11-07 13:27:15'),
	(37,'read_categories','categories','2018-11-07 13:27:15','2018-11-07 13:27:15'),
	(38,'edit_categories','categories','2018-11-07 13:27:15','2018-11-07 13:27:15'),
	(39,'add_categories','categories','2018-11-07 13:27:15','2018-11-07 13:27:15'),
	(40,'delete_categories','categories','2018-11-07 13:27:15','2018-11-07 13:27:15'),
	(41,'browse_users','users','2018-11-07 14:31:19','2018-11-07 14:31:19'),
	(42,'read_users','users','2018-11-07 14:31:19','2018-11-07 14:31:19'),
	(43,'edit_users','users','2018-11-07 14:31:19','2018-11-07 14:31:19'),
	(44,'add_users','users','2018-11-07 14:31:19','2018-11-07 14:31:19'),
	(45,'delete_users','users','2018-11-07 14:31:19','2018-11-07 14:31:19'),
	(46,'browse_more_images','more_images','2018-11-08 02:16:52','2018-11-08 02:16:52'),
	(47,'read_more_images','more_images','2018-11-08 02:16:52','2018-11-08 02:16:52'),
	(48,'edit_more_images','more_images','2018-11-08 02:16:52','2018-11-08 02:16:52'),
	(49,'add_more_images','more_images','2018-11-08 02:16:52','2018-11-08 02:16:52'),
	(50,'delete_more_images','more_images','2018-11-08 02:16:52','2018-11-08 02:16:52'),
	(51,'browse_size_colors','size_colors','2018-11-08 02:17:37','2018-11-08 02:17:37'),
	(52,'read_size_colors','size_colors','2018-11-08 02:17:37','2018-11-08 02:17:37'),
	(53,'edit_size_colors','size_colors','2018-11-08 02:17:37','2018-11-08 02:17:37'),
	(54,'add_size_colors','size_colors','2018-11-08 02:17:37','2018-11-08 02:17:37'),
	(55,'delete_size_colors','size_colors','2018-11-08 02:17:37','2018-11-08 02:17:37');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `unit_price` double(8,2) DEFAULT NULL,
  `promotion_price` double(8,2) DEFAULT NULL,
  `representative_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_product_code_unique` (`product_code`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `product_code`, `name`, `meta_title`, `description`, `unit_price`, `promotion_price`, `representative_image`, `status`, `category_id`, `created_at`, `updated_at`)
VALUES
	(1,'SKU123','Zara Jeans','zara-jeans','It is a pants',100000.00,90000.00,'products/November2018/Dl3iHU8LdmSXeWfwyq0E.jpg',1,2,'2018-11-07 13:37:00','2018-11-08 02:36:29'),
	(2,'2','Somi Toan','somi-toan','It is a shirt',60000.00,50000.00,'products/November2018/4ut3DH5CrPuCmzj0z3HI.jpg',NULL,2,'2018-11-08 02:23:00','2018-11-08 02:36:22'),
	(3,'SKU456','Jacket','jacket','It is a jacket',500000.00,400000.00,'products/November2018/3VQqSLl9sZ7uhMQqWw4Y.jpg',NULL,1,'2018-11-08 02:37:54','2018-11-08 02:37:54');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Administrator','2018-11-07 12:50:58','2018-11-07 12:50:58'),
	(2,'user','Normal User','2018-11-07 12:50:58','2018-11-07 12:50:58');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`)
VALUES
	(1,'site.title','Site Title','Site Title','','text',1,'Site'),
	(2,'site.description','Site Description','Site Description','','text',2,'Site'),
	(3,'site.logo','Site Logo','','','image',3,'Site'),
	(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),
	(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),
	(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),
	(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),
	(8,'admin.loader','Admin Loader','','','image',3,'Admin'),
	(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),
	(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table size_colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `size_colors`;

CREATE TABLE `size_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `size_colors_product_id_foreign` (`product_id`),
  CONSTRAINT `size_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `size_colors` WRITE;
/*!40000 ALTER TABLE `size_colors` DISABLE KEYS */;

INSERT INTO `size_colors` (`id`, `size`, `color`, `quantity`, `status`, `product_id`, `created_at`, `updated_at`)
VALUES
	(1,'L','Blue',100,NULL,1,'2018-11-08 09:48:09','2018-11-08 09:48:12'),
	(4,'M','Red',100,NULL,1,'2018-11-08 09:48:45','2018-11-08 09:48:48'),
	(5,'S','White',50,NULL,2,'2018-11-08 09:49:14',NULL),
	(6,'XL','Red',70,NULL,2,'2018-11-08 09:49:40','2018-11-08 09:49:40'),
	(7,'XXL','Blue',50,NULL,3,'2018-11-08 09:50:04',NULL),
	(8,'XS','Pink',40,NULL,3,'2018-11-08 09:50:23',NULL);

/*!40000 ALTER TABLE `size_colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table slides
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slides`;

CREATE TABLE `slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `fullname` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `avatar`, `fullname`, `address`, `phone`, `status`, `remember_token`, `settings`, `created_at`, `updated_at`)
VALUES
	(1,1,'Huu Vu','$2y$10$lhtfyWEbH25bUZPQletoPO44Nng18fqSSiD.fWT9BJXuRE3wi5iji','vutrinhhuu@gmail.com','users/default.png',NULL,NULL,NULL,NULL,'wgK3pKSp8BlGfO7fPX8RF7sLJjdph4AMsf70d8oUn4o8xeboN8S6uzWOAMqv',NULL,'2018-11-07 12:49:42','2018-11-07 12:49:42');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;