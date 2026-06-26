/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.4.9-MariaDB, for Linux (x86_64)
--
-- Host: mariadb    Database: engelsystem
-- ------------------------------------------------------
-- Server version	10.7.8-MariaDB-1:10.7.8+maria~ubu2004

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `angel_types`
--

DROP TABLE IF EXISTS `angel_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `angel_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `contact_name` varchar(255) NOT NULL DEFAULT '',
  `contact_dect` varchar(255) NOT NULL DEFAULT '',
  `contact_email` varchar(255) NOT NULL DEFAULT '',
  `restricted` tinyint(1) NOT NULL DEFAULT 0,
  `requires_driver_license` tinyint(1) NOT NULL DEFAULT 0,
  `requires_ifsg_certificate` tinyint(1) NOT NULL DEFAULT 0,
  `shift_self_signup` tinyint(1) NOT NULL DEFAULT 0,
  `show_on_dashboard` tinyint(1) NOT NULL DEFAULT 1,
  `hide_register` tinyint(1) NOT NULL DEFAULT 0,
  `hide_on_shift_view` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `angel_types_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `angel_types`
--

LOCK TABLES `angel_types` WRITE;
/*!40000 ALTER TABLE `angel_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `angel_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_config`
--

DROP TABLE IF EXISTS `event_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_config` (
  `name` varchar(255) NOT NULL,
  `value` longtext NOT NULL CHECK (json_valid(`value`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `event_config_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_config`
--

LOCK TABLES `event_config` WRITE;
/*!40000 ALTER TABLE `event_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_tags`
--

DROP TABLE IF EXISTS `faq_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `faq_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faq_tags_faq_id_tag_id_unique` (`faq_id`,`tag_id`),
  KEY `faq_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `faq_tags_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faq` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_tags`
--

LOCK TABLES `faq_tags` WRITE;
/*!40000 ALTER TABLE `faq_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_privileges`
--

DROP TABLE IF EXISTS `group_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `privilege_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_privileges_group_id_index` (`group_id`),
  KEY `group_privileges_privilege_id_index` (`privilege_id`),
  CONSTRAINT `group_privileges_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_privileges_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_privileges`
--

LOCK TABLES `group_privileges` WRITE;
/*!40000 ALTER TABLE `group_privileges` DISABLE KEYS */;
INSERT INTO `group_privileges` VALUES
(23,10,2),
(24,10,5),
(85,90,10),
(88,10,1),
(207,80,7),
(209,80,21),
(212,80,6),
(235,60,27),
(236,60,32),
(237,60,19),
(238,60,14),
(239,60,28),
(240,60,16),
(241,60,5),
(242,60,25),
(243,20,36),
(244,20,34),
(245,20,30),
(246,20,4),
(247,20,3),
(248,20,15),
(249,20,35),
(250,20,37),
(251,20,17),
(252,20,9),
(253,20,26),
(255,20,8),
(256,20,24),
(258,50,31),
(259,20,40),
(262,60,43),
(264,30,27),
(265,10,44),
(266,20,44),
(267,60,45),
(268,20,46),
(269,60,47),
(271,50,48),
(272,50,27),
(273,60,49),
(274,35,49),
(276,80,50),
(277,80,51),
(278,40,51),
(279,80,53),
(280,60,52),
(282,80,54),
(283,80,55),
(284,60,38),
(285,80,56),
(286,60,57),
(288,60,58),
(290,80,59),
(291,60,31),
(292,60,33),
(293,90,39),
(294,60,48),
(295,80,19),
(296,50,60),
(297,60,60),
(298,35,60),
(299,30,60),
(300,50,61),
(301,60,62),
(302,50,52),
(303,60,63),
(304,30,63),
(305,50,63),
(306,60,64);
/*!40000 ALTER TABLE `group_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES
(20,'Angel'),
(40,'API'),
(80,'Bureaucrat'),
(90,'Developer'),
(50,'Goodie Manager'),
(10,'Guest'),
(60,'Shift Coordinator'),
(35,'Voucher Angel'),
(30,'Welcome Angel');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `map_url` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dect` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rooms_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_entries`
--

DROP TABLE IF EXISTS `log_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `level` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_entries_user_id_foreign` (`user_id`),
  CONSTRAINT `log_entries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_entries`
--

LOCK TABLES `log_entries` WRITE;
/*!40000 ALTER TABLE `log_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `receiver_id` int(10) unsigned NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_user_id_foreign` (`user_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(2,'2018_01_01_000001_import_install_sql'),
(3,'2018_01_01_000002_import_update_sql'),
(4,'2018_01_01_000003_fix_old_tables'),
(5,'2018_01_01_000004_cleanup_group_privileges'),
(6,'2018_01_01_000005_add_angel_supporter_permissions'),
(7,'2018_08_30_000000_create_log_entries_table'),
(8,'2018_09_11_000000_create_sessions_table'),
(9,'2018_09_24_000000_create_event_config_table'),
(10,'2018_10_01_000000_create_users_tables'),
(11,'2018_12_21_000000_change_users_contact_dect_field_size'),
(12,'2018_12_27_000000_fix_missing_arrival_dates'),
(13,'2019_06_12_000000_fix_user_languages'),
(14,'2019_09_07_000000_migrate_admin_schedule_permissions'),
(15,'2019_09_07_000001_create_schedule_shift_table'),
(16,'2019_10_15_000000_create_news_table'),
(17,'2019_11_12_000000_create_news_comments_table'),
(18,'2019_11_25_000000_create_messages_table'),
(19,'2019_11_29_000000_create_questions_table'),
(20,'2019_12_03_000000_user_personal_data_add_pronoun_field'),
(21,'2020_04_07_000000_change_mysql_database_encoding_to_utf8mb4'),
(22,'2020_09_02_000000_create_rooms_table'),
(23,'2020_09_07_000000_create_worklogs_table'),
(24,'2020_09_12_000000_create_welcome_angel_permissions_group'),
(25,'2020_09_27_000000_add_timestamps_to_questions'),
(26,'2020_09_28_000000_create_faq_table_and_permissions'),
(27,'2020_09_30_000000_create_questions_permissions'),
(28,'2020_11_08_000000_create_oauth_table'),
(29,'2020_11_20_000000_add_name_minutes_and_timestamps_to_schedules'),
(30,'2020_12_25_000000_add_email_news_to_users_settings'),
(31,'2020_12_25_000000_oauth_add_tokens'),
(32,'2020_12_26_000000_news_add_is_pinned'),
(33,'2020_12_28_000001_oauth_change_tokens_to_text'),
(34,'2021_05_23_000000_create_first_user'),
(35,'2021_05_23_000000_set_admin_password'),
(36,'2021_08_26_000000_add_shirt_edit_permissions'),
(37,'2021_10_12_000000_add_shifts_description'),
(38,'2021_12_19_000000_create_user_licenses_table'),
(39,'2021_12_25_000000_increase_sessions_table_payload_size'),
(40,'2021_12_29_000000_users_settings_add_email_goody'),
(41,'2021_12_30_000000_remove_admin_news_html_privilege'),
(42,'2022_05_23_000000_increase_tshirt_field_width'),
(43,'2022_06_02_000000_create_voucher_edit_permission'),
(44,'2022_06_03_000000_shifts_add_transaction_id'),
(45,'2022_07_21_000000_fix_old_groups_table_id_and_name'),
(46,'2022_10_16_000000_add_mobile_show_to_users_settings'),
(47,'2022_10_17_000000_add_dect_to_rooms'),
(48,'2022_10_21_000000_add_hide_register_to_angeltypes'),
(49,'2022_10_23_000000_create_privileges_and_groups_related_tables'),
(50,'2022_10_23_000001_fill_privileges_and_groups_related_tables'),
(51,'2022_11_06_000000_shifttype_remove_angeltype'),
(52,'2022_11_06_000001_create_shift_types_table'),
(53,'2022_11_08_000000_create_angel_types_table'),
(54,'2022_11_28_000000_create_user_angel_types_table'),
(55,'2022_12_06_000000_change_api_key_length'),
(56,'2022_12_15_000000_create_shifts_table'),
(57,'2022_12_30_000000_create_shift_entries_table'),
(58,'2023_01_17_000000_create_needed_angel_types_table'),
(59,'2023_02_03_000000_add_set_news_flag_important_permissions'),
(60,'2023_02_06_000000_add_is_important_to_news'),
(61,'2023_02_25_000000_fix_email_messages_migration_name'),
(62,'2023_02_26_000000_add_email_messages_to_users_settings'),
(63,'2023_02_28_000000_rename_shirt_manager'),
(64,'2023_05_21_000000_create_api_permissions'),
(65,'2023_05_21_000001_cleanup_short_api_keys'),
(66,'2023_08_07_000000_add_ifsg_cerificates_to_users_licenses'),
(67,'2023_08_08_000000_add_requires_ifsg_cerificate_to_angeltypes'),
(68,'2023_08_26_000000_angeltypes_rename_no_self_signup_to_shift_self_signup'),
(69,'2023_08_27_000000_add_hide_on_shift_view_to_angeltypes'),
(70,'2023_09_17_000000_add_user_to_sessions_table'),
(71,'2023_09_18_000000_news_rename_important_to_highlight'),
(72,'2023_10_13_000000_rename_rooms_to_locations'),
(73,'2023_10_22_000000_add_missing_schedule_foreign_keys'),
(74,'2023_10_25_000000_degender_shirt_sizes'),
(75,'2023_11_16_000000_add_user_info_to_users_state'),
(76,'2023_11_16_000001_add_user_info_permissions'),
(77,'2023_11_24_000000_add_signup_advance_hours_to_shift_types'),
(78,'2023_12_06_000000_add_user_id_to_log_entries'),
(79,'2023_12_06_000000_change_edit_shirt_require_bureaucrat'),
(80,'2023_12_06_000001_add_logs_all_permission'),
(81,'2023_12_19_000000_schedule_shift_type_needed_angel_types'),
(82,'2023_12_21_000000_add_user_edit_permission'),
(83,'2023_12_23_000000_add_tags_to_faq'),
(84,'2023_12_26_000000_create_schedule_locations_table'),
(85,'2023_12_27_000000_add_shifttypes_edit_permission_and_shifttypes_requires_shico'),
(86,'2024_03_05_000000_add_ifsg_confirmed_to_users_licenses'),
(87,'2024_03_05_000001_add_user_ifsg_edit_permission'),
(88,'2024_03_13_000000_add_drive_confirmed_to_users_licenses'),
(89,'2024_03_13_000001_add_user_drive_edit_permission'),
(90,'2024_04_06_000000_add_user_fa_edit_permission'),
(91,'2024_04_10_000000_rename_goody_to_goodie'),
(92,'2024_04_10_000001_rename_shirt_to_goodie'),
(93,'2024_04_20_000000_refactor_permissions_and_groups'),
(94,'2024_04_21_000000_add_users_arrive_list_permission'),
(95,'2024_07_10_000000_add_config_edit_permission'),
(96,'2024_08_20_000000_add_missing_schedule_shift_schedule_foreign_key'),
(97,'2024_08_21_000000_shift_entries_freeloaded_to_freeload_user_id'),
(98,'2024_08_25_000000_rename_locations_permissions'),
(99,'2024_10_27_000000_add_angeltype_goodie_list_permission'),
(100,'2024_12_13_000000_add_tag_permission'),
(101,'2024_12_29_000000_goodie_manager_show_user_info'),
(102,'2025_01_16_000000_add_worklog_nightshift'),
(103,'2025_02_09_000000_add_user_info_show_info_permission'),
(104,'2025_02_09_000000_edit_permission_descriptions'),
(105,'2025_09_23_000000_worklog_rename_comment_to_description'),
(106,'2025_09_24_000000_add_force_food'),
(107,'2025_10_19_000000_remove_user_arrived_state'),
(108,'2025_12_12_000000_change_oauth_identifier_database_encoding_to_bin'),
(109,'2025_12_20_000000_add_tags_to_shifts');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `needed_angel_types`
--

DROP TABLE IF EXISTS `needed_angel_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `needed_angel_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` int(10) unsigned DEFAULT NULL,
  `shift_id` int(10) unsigned DEFAULT NULL,
  `shift_type_id` int(10) unsigned DEFAULT NULL,
  `angel_type_id` int(10) unsigned NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `needed_angel_types_shift_id_foreign` (`shift_id`),
  KEY `needed_angel_types_angel_type_id_foreign` (`angel_type_id`),
  KEY `needed_angel_types_room_id_angel_type_id_index` (`location_id`,`angel_type_id`),
  KEY `needed_angel_types_count_index` (`count`),
  KEY `needed_angel_types_shift_type_id_foreign` (`shift_type_id`),
  CONSTRAINT `needed_angel_types_angel_type_id_foreign` FOREIGN KEY (`angel_type_id`) REFERENCES `angel_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `needed_angel_types_room_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `needed_angel_types_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `needed_angel_types_shift_type_id_foreign` FOREIGN KEY (`shift_type_id`) REFERENCES `shift_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `needed_angel_types`
--

LOCK TABLES `needed_angel_types` WRITE;
/*!40000 ALTER TABLE `needed_angel_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `needed_angel_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `is_meeting` tinyint(1) NOT NULL DEFAULT 0,
  `is_pinned` tinyint(1) NOT NULL DEFAULT 0,
  `is_highlighted` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_user_id_foreign` (`user_id`),
  CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_comments`
--

DROP TABLE IF EXISTS `news_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_comments_news_id_foreign` (`news_id`),
  KEY `news_comments_user_id_foreign` (`user_id`),
  CONSTRAINT `news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_comments`
--

LOCK TABLES `news_comments` WRITE;
/*!40000 ALTER TABLE `news_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth`
--

DROP TABLE IF EXISTS `oauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(255) NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `access_token` text DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_provider_identifier_unique` (`provider`,`identifier`),
  KEY `oauth_user_id_foreign` (`user_id`),
  CONSTRAINT `oauth_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth`
--

LOCK TABLES `oauth` WRITE;
/*!40000 ALTER TABLE `oauth` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `user_id` int(10) unsigned NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `password_resets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `privileges_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES
(1,'start','Start page'),
(2,'login','Login'),
(3,'news','View news'),
(4,'logout','Logout'),
(5,'register','Register users'),
(6,'locations.edit','Edit locations'),
(7,'admin_angel_types','Edit angel types'),
(8,'user_settings','User profile settings'),
(9,'user_messages','Writing and reading messages from user to user'),
(10,'admin_groups','Manage usergroups and their rights'),
(14,'admin_news','Administrate the news section'),
(15,'news_comments','User can comment news'),
(16,'admin_user','Administrate the angels'),
(17,'user_meetings','Lists meetings (news)'),
(19,'admin_log','Display recent changes'),
(21,'schedule.import','Import locations and shifts from schedule.xml'),
(24,'user_shifts','Signup for shifts'),
(25,'user_shifts_admin','Signup other angels for shifts.'),
(26,'user_myshifts','Allow angels to view their own shifts and cancel them.'),
(27,'admin_arrive','Mark angels when they arrive.'),
(28,'admin_shifts','Create shifts'),
(30,'ical','iCal shift export'),
(31,'admin_active','Mark angels as active and if they got a goodie.'),
(32,'admin_free','Show a list of free/unemployed angels.'),
(33,'admin_user_angeltypes','Confirm restricted angel types'),
(34,'atom',' Atom news export'),
(35,'shifts_json_export','Export shifts in JSON format'),
(36,'angeltypes','View angeltypes'),
(37,'user_angeltypes','Join angeltypes.'),
(38,'shifttypes.view','View shift types'),
(39,'config.edit','Edit the application configuration'),
(40,'locations.view','View locations'),
(43,'admin_user_worklog','Manage user work log entries.'),
(44,'faq.view','View FAQ entries'),
(45,'faq.edit','Edit FAQ entries'),
(46,'question.add','Ask questions'),
(47,'question.edit','Answer questions'),
(48,'user.goodie.edit','Edit user goodies'),
(49,'voucher.edit','Edit vouchers'),
(50,'news.highlight','Highlight news'),
(51,'api','Use the API'),
(52,'user.info.view','View user info'),
(53,'user.info.edit','Edit user info'),
(54,'logs.all','View all logs'),
(55,'user.nick.edit','Edit user nick'),
(56,'shifttypes.edit','Edit shift types'),
(57,'user.ifsg.edit','Edit IfSG certificate'),
(58,'user.drive.edit','Edit driving license'),
(59,'user.fa.edit','Edit user force active state'),
(60,'users.arrive.list','View arrive angels list'),
(61,'angeltype.goodie.list','Add edit goodies to angel type view'),
(62,'tag.edit','Edit tags'),
(63,'user.info.hint','Show hint that user info exists'),
(64,'user.ff.edit','Edit user force food state');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `answer` text DEFAULT NULL,
  `answerer_id` int(10) unsigned DEFAULT NULL,
  `answered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_user_id_foreign` (`user_id`),
  KEY `questions_answerer_id_foreign` (`answerer_id`),
  CONSTRAINT `questions_answerer_id_foreign` FOREIGN KEY (`answerer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_locations`
--

DROP TABLE IF EXISTS `schedule_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule_locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_locations_location_id_foreign` (`location_id`),
  KEY `schedule_locations_schedule_id_location_id_index` (`schedule_id`,`location_id`),
  CONSTRAINT `schedule_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `schedule_locations_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_locations`
--

LOCK TABLES `schedule_locations` WRITE;
/*!40000 ALTER TABLE `schedule_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_shift`
--

DROP TABLE IF EXISTS `schedule_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule_shift` (
  `shift_id` int(10) unsigned NOT NULL,
  `schedule_id` int(10) unsigned NOT NULL,
  `guid` char(36) NOT NULL,
  UNIQUE KEY `schedule_shift_shift_id_unique` (`shift_id`),
  KEY `schedule_shift_schedule_id_foreign` (`schedule_id`),
  CONSTRAINT `schedule_shift_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `schedule_shift_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_shift`
--

LOCK TABLES `schedule_shift` WRITE;
/*!40000 ALTER TABLE `schedule_shift` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shift_type` int(10) unsigned NOT NULL,
  `needed_from_shift_type` tinyint(1) NOT NULL DEFAULT 0,
  `minutes_before` int(11) NOT NULL,
  `minutes_after` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_shift_type_foreign` (`shift_type`),
  CONSTRAINT `schedules_shift_type_foreign` FOREIGN KEY (`shift_type`) REFERENCES `shift_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `payload` mediumtext NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `last_activity` datetime NOT NULL DEFAULT current_timestamp(),
  UNIQUE KEY `sessions_id_unique` (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift_entries`
--

DROP TABLE IF EXISTS `shift_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shift_id` int(10) unsigned NOT NULL,
  `angel_type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_comment` mediumtext NOT NULL DEFAULT '',
  `freeloaded_by` int(10) unsigned DEFAULT NULL,
  `freeloaded_comment` mediumtext NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `shift_entries_shift_id_foreign` (`shift_id`),
  KEY `shift_entries_user_id_foreign` (`user_id`),
  KEY `shift_entries_angel_type_id_shift_id_index` (`angel_type_id`,`shift_id`),
  KEY `shift_entries_freeloaded_by_foreign` (`freeloaded_by`),
  CONSTRAINT `shift_entries_angel_type_id_foreign` FOREIGN KEY (`angel_type_id`) REFERENCES `angel_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shift_entries_freeloaded_by_foreign` FOREIGN KEY (`freeloaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shift_entries_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shift_entries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift_entries`
--

LOCK TABLES `shift_entries` WRITE;
/*!40000 ALTER TABLE `shift_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `shift_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift_tags`
--

DROP TABLE IF EXISTS `shift_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shift_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shift_tags_shift_id_tag_id_unique` (`shift_id`,`tag_id`),
  KEY `shift_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `shift_tags_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shift_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift_tags`
--

LOCK TABLES `shift_tags` WRITE;
/*!40000 ALTER TABLE `shift_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `shift_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift_types`
--

DROP TABLE IF EXISTS `shift_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `signup_advance_hours` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shift_types_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift_types`
--

LOCK TABLES `shift_types` WRITE;
/*!40000 ALTER TABLE `shift_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `shift_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `shift_type_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `transaction_id` char(36) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shifts_shift_type_id_foreign` (`shift_type_id`),
  KEY `shifts_room_id_foreign` (`location_id`),
  KEY `shifts_created_by_foreign` (`created_by`),
  KEY `shifts_updated_by_foreign` (`updated_by`),
  KEY `shifts_start_index` (`start`),
  KEY `shifts_transaction_id_index` (`transaction_id`),
  CONSTRAINT `shifts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shifts_room_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shifts_shift_type_id_foreign` FOREIGN KEY (`shift_type_id`) REFERENCES `shift_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shifts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_angel_type`
--

DROP TABLE IF EXISTS `user_angel_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_angel_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `angel_type_id` int(10) unsigned NOT NULL,
  `confirm_user_id` int(10) unsigned DEFAULT NULL,
  `supporter` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_angel_type_user_id_angel_type_id_unique` (`user_id`,`angel_type_id`),
  KEY `user_angel_type_user_id_angel_type_id_confirm_user_id_index` (`user_id`,`angel_type_id`,`confirm_user_id`),
  KEY `user_angel_type_angel_type_id_index` (`angel_type_id`),
  KEY `user_angel_type_confirm_user_id_index` (`confirm_user_id`),
  KEY `user_angel_type_supporter_index` (`supporter`),
  CONSTRAINT `user_angel_type_angel_type_id_foreign` FOREIGN KEY (`angel_type_id`) REFERENCES `angel_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_angel_type_confirm_user_id_foreign` FOREIGN KEY (`confirm_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_angel_type_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_angel_type`
--

LOCK TABLES `user_angel_type` WRITE;
/*!40000 ALTER TABLE `user_angel_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_angel_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(64) NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','admin@localhost','$2y$12$lXFX.R1dclvSDhHWjDFFyuK19V02/8iUHWpBPDir/xMSFG4rnwyVS','',NULL,'2026-03-03 17:40:31',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_contact`
--

DROP TABLE IF EXISTS `users_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_contact` (
  `user_id` int(10) unsigned NOT NULL,
  `dect` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `users_contact_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_contact`
--

LOCK TABLES `users_contact` WRITE;
/*!40000 ALTER TABLE `users_contact` DISABLE KEYS */;
INSERT INTO `users_contact` VALUES
(1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_groups_user_id_index` (`user_id`),
  KEY `users_groups_group_id_index` (`group_id`),
  CONSTRAINT `users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES
(1,1,20),
(2,1,60),
(4,1,80),
(5,1,90);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_licenses`
--

DROP TABLE IF EXISTS `users_licenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_licenses` (
  `user_id` int(10) unsigned NOT NULL,
  `has_car` tinyint(1) NOT NULL DEFAULT 0,
  `drive_forklift` tinyint(1) NOT NULL DEFAULT 0,
  `drive_car` tinyint(1) NOT NULL DEFAULT 0,
  `drive_3_5t` tinyint(1) NOT NULL DEFAULT 0,
  `drive_7_5t` tinyint(1) NOT NULL DEFAULT 0,
  `drive_12t` tinyint(1) NOT NULL DEFAULT 0,
  `drive_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `ifsg_certificate_light` tinyint(1) NOT NULL DEFAULT 0,
  `ifsg_certificate` tinyint(1) NOT NULL DEFAULT 0,
  `ifsg_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `users_licenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_licenses`
--

LOCK TABLES `users_licenses` WRITE;
/*!40000 ALTER TABLE `users_licenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_licenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_personal_data`
--

DROP TABLE IF EXISTS `users_personal_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_personal_data` (
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `pronoun` varchar(15) DEFAULT NULL,
  `shirt_size` varchar(10) DEFAULT NULL,
  `planned_arrival_date` date DEFAULT NULL,
  `planned_departure_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `users_personal_data_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_personal_data`
--

LOCK TABLES `users_personal_data` WRITE;
/*!40000 ALTER TABLE `users_personal_data` DISABLE KEYS */;
INSERT INTO `users_personal_data` VALUES
(1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users_personal_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_settings`
--

DROP TABLE IF EXISTS `users_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_settings` (
  `user_id` int(10) unsigned NOT NULL,
  `language` varchar(64) NOT NULL,
  `theme` tinyint(4) NOT NULL,
  `email_human` tinyint(1) NOT NULL DEFAULT 0,
  `email_messages` tinyint(1) NOT NULL DEFAULT 0,
  `email_goodie` tinyint(1) NOT NULL DEFAULT 0,
  `email_shiftinfo` tinyint(1) NOT NULL DEFAULT 0,
  `email_news` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_show` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `users_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_settings`
--

LOCK TABLES `users_settings` WRITE;
/*!40000 ALTER TABLE `users_settings` DISABLE KEYS */;
INSERT INTO `users_settings` VALUES
(1,'en_US',1,0,0,0,0,0,0);
/*!40000 ALTER TABLE `users_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_state`
--

DROP TABLE IF EXISTS `users_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_state` (
  `user_id` int(10) unsigned NOT NULL,
  `arrival_date` datetime DEFAULT NULL,
  `user_info` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_active` tinyint(1) NOT NULL DEFAULT 0,
  `force_food` tinyint(1) NOT NULL,
  `got_goodie` tinyint(1) NOT NULL DEFAULT 0,
  `got_voucher` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `users_state_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_state`
--

LOCK TABLES `users_state` WRITE;
/*!40000 ALTER TABLE `users_state` DISABLE KEYS */;
INSERT INTO `users_state` VALUES
(1,NULL,NULL,0,0,0,0,0);
/*!40000 ALTER TABLE `users_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worklogs`
--

DROP TABLE IF EXISTS `worklogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `worklogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `hours` decimal(8,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `worked_at` date NOT NULL,
  `night_shift` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `worklogs_user_id_foreign` (`user_id`),
  KEY `worklogs_creator_id_foreign` (`creator_id`),
  CONSTRAINT `worklogs_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `worklogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worklogs`
--

LOCK TABLES `worklogs` WRITE;
/*!40000 ALTER TABLE `worklogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `worklogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-03-03 17:40:32
