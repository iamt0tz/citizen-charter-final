-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for charter
CREATE DATABASE IF NOT EXISTS `charter` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `charter`;

-- Dumping structure for table charter.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.areas: ~3 rows (approximately)
INSERT INTO `areas` (`id`, `title`, `purpose`, `created_at`, `updated_at`) VALUES
	(1, 'qwe', 'qwe', '2023-10-04 19:26:50', '2023-10-04 19:26:50'),
	(2, 'SWAD Bohol', 'for swad bohol', '2023-10-04 19:27:37', '2023-10-04 19:27:37'),
	(3, 'Swad siq', 'Swad siq', '2023-10-04 19:31:30', '2023-10-04 19:31:30');

-- Dumping structure for table charter.areas_programs
CREATE TABLE IF NOT EXISTS `areas_programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `program_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.areas_programs: ~10 rows (approximately)
INSERT INTO `areas_programs` (`id`, `program_id`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, '1', '100', NULL, NULL),
	(2, '1', '101', NULL, NULL),
	(3, '1', '205', NULL, NULL),
	(4, '2', '99', NULL, NULL),
	(5, '2', '100', NULL, NULL),
	(6, '2', '101', NULL, NULL),
	(7, '2', '205', NULL, NULL),
	(8, '88', '3', NULL, NULL),
	(9, '89', '3', NULL, NULL),
	(10, '90', '3', NULL, NULL);

-- Dumping structure for table charter.divisions
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.divisions: ~14 rows (approximately)
INSERT INTO `divisions` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administrative Division', 'AD', '2023-08-02 00:06:52', '2023-08-02 00:06:52', NULL),
	(2, 'Pantawid Pamilyang Pilipino Program', '4Ps', '2023-08-02 00:06:52', '2023-10-01 23:57:55', NULL),
	(3, 'Disaster Response Management Division', 'DRMD', '2023-08-02 00:06:52', '2023-08-02 00:06:52', NULL),
	(5, 'Human Resource Management & Development Division', 'HRMDD', '2023-08-02 00:06:52', '2023-10-02 01:34:12', NULL),
	(6, 'Office of the Regional Director', 'ORD', '2023-08-02 00:06:52', '2023-08-02 00:06:52', NULL),
	(7, 'Policy & Plans Division', 'PPD', '2023-08-02 00:06:52', '2023-08-02 00:06:52', NULL),
	(8, 'Promotive Services Division', 'Promotive', '2023-08-02 00:06:52', '2023-08-02 00:06:52', NULL),
	(9, 'Protective Services Division', 'PSD', '2023-08-02 00:06:52', '2023-08-02 00:06:52', NULL),
	(12, 'Center and Residential Care Facilities', 'CRCF', '2023-09-09 04:27:52', '2023-09-09 04:27:52', NULL),
	(13, 'SWAD Bohol', 'SWAD-Bohol', '2023-09-14 17:30:37', '2023-09-14 17:31:00', NULL),
	(14, 'SWAD Negros', 'SWAD-Negros', '2023-09-14 17:30:59', '2023-09-14 17:31:02', NULL),
	(15, 'SWAD Siquijor', 'SWAD-Siquijor', '2023-09-14 17:31:56', '2023-09-14 17:31:58', NULL),
	(18, 'NEW DIVISION', 'NEW', '2023-09-28 19:37:26', '2023-10-01 18:09:18', '2023-10-01 18:09:18'),
	(19, 'QQQQQQQq', 'QQQQQQq', '2023-09-28 22:39:41', '2023-10-01 18:09:21', '2023-10-01 18:09:21');

-- Dumping structure for table charter.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table charter.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `program_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_program_id_foreign` (`program_id`),
  CONSTRAINT `files_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.files: ~0 rows (approximately)

-- Dumping structure for table charter.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.migrations: ~19 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_26_074150_create_divisions_table', 1),
	(6, '2023_07_27_033728_create_sections_table', 1),
	(7, '2023_07_27_033828_create_programs_table', 1),
	(8, '2023_08_01_054807_create_files_table', 1),
	(16, '2023_08_16_045124_create_areas_table', 3),
	(17, '2023_08_16_101013_add_requirements_steps_to_programs_table', 4),
	(18, '2023_08_17_083104_remove_description_column_from_programs_table', 5),
	(19, '2023_09_08_051427_add_file_column_to_sections', 6),
	(20, '2023_09_09_032954_add_has_external_to_sections', 7),
	(21, '2014_10_12_100000_create_password_resets_table', 8),
	(22, '2023_09_20_073622_add_division_id_to_users_table', 9),
	(23, '2023_09_20_075406_add_is_admin_to_users_table', 10),
	(24, '2023_09_27_015344_add_soft_delete_to_users_table', 11),
	(25, '2023_09_29_030014_add_deleted_at_to_divisions_table', 12),
	(26, '2023_09_29_054146_add_soft_delete_to_sections_table', 13);

-- Dumping structure for table charter.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.password_resets: ~0 rows (approximately)

-- Dumping structure for table charter.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.password_reset_tokens: ~0 rows (approximately)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('rltabasa@dswd.gov.ph', '$2y$10$ODNjxKj2P1NZgrFzsID64eWxIo9SxVC5GAaViiLlyRGHhG5TTP4/m', '2023-09-20 22:09:18');

-- Dumping structure for table charter.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table charter.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `steps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs_section_id_foreign` (`section_id`),
  CONSTRAINT `programs_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.programs: ~46 rows (approximately)
INSERT INTO `programs` (`id`, `section_id`, `name`, `created_at`, `updated_at`, `file`, `requirements`, `steps`) VALUES
	(52, 1, 'Grievance Intake and Response', '2023-08-13 21:08:11', '2023-08-30 23:17:56', '1692505750.pdf', '', ''),
	(53, 2, 'Request for Use and Monitoring of Vehicle', '2023-08-13 21:08:11', '2023-08-19 20:24:01', '1692505441.pdf', '', ''),
	(54, 2, 'Request for Technical Assistance relative to Building and Grounds Management', '2023-08-13 21:08:11', '2023-08-19 20:24:13', '1692505453.pdf', NULL, NULL),
	(55, 3, 'Procurement under Shopping under Section 52.1 (B)', '2023-08-13 21:08:11', '2023-08-19 20:22:16', '1692505336.pdf', NULL, NULL),
	(56, 3, 'Competitive Bidding of Goods and Services', '2023-08-13 21:08:11', '2023-08-19 20:22:59', '1692505379.pdf', NULL, NULL),
	(57, 3, 'Procurement under Direct Retail Purchase of Petroleum Fuel, Oil and Lubricant (POL) Products and Airline Tickets', '2023-08-13 21:08:11', '2023-08-19 20:23:21', '1692505401.pdf', NULL, NULL),
	(58, 3, 'Procurement under Small Value Procurement', '2023-08-13 21:08:11', '2023-08-19 20:23:37', '1692505417.pdf', NULL, NULL),
	(59, 4, 'Recording, Documentation and Issuance of Expendable or Consumable Supplies', '2023-08-13 21:08:11', '2023-08-19 20:25:51', '1692505551.pdf', NULL, NULL),
	(60, 4, 'Recording, Documentation and Issuance of PPE and Semi-Expendable Properties', '2023-08-13 21:08:11', '2023-08-13 21:08:11', '1692505551.pdf', NULL, NULL),
	(61, 4, 'Transfer of Property Accountability', '2023-08-13 21:08:11', '2023-08-13 21:08:11', '1692505551.pdf', NULL, NULL),
	(62, 4, 'Issuance of Sticker Pass', '2023-08-13 21:08:11', '2023-08-13 21:08:11', '1692505551.pdf', NULL, NULL),
	(63, 4, 'Issuance of Property Clearance for Separated Official and Employees', '2023-08-13 21:08:11', '2023-08-13 21:08:11', '1692505551.pdf', NULL, NULL),
	(64, 5, 'Recording, Documentation and Issuance of PPE and Semi-Expendable Properties', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(65, 5, 'Transfer of Property Accountability', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(66, 5, 'Issuance of Gate Pass for Service Providers and Suppliers', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(67, 5, 'Surrender/Turnover of Property and Cancellation of Property Accountability', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(68, 5, 'Issuance of Property Clearance for Separated Official and Employees', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(69, 5, 'Recording, Documentation and Issuance of Expendable or Consumable Supplies', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(70, 6, 'Processing of Outgoing Documents', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(71, 6, 'Processing of Incoming of Documents', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(72, 6, 'Disposal of Valueless Records', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(73, 7, 'Processing of Relief Augmentation Request by DSWD Field Offices', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(77, 10, 'Provision of Assistance to Distressed Employees', '2023-08-13 21:08:11', '2023-08-19 20:32:49', '1692505969.pdf', NULL, NULL),
	(78, 11, 'Certification of Performance Rating', '2023-08-13 21:08:11', '2023-08-19 20:33:18', '1692505998.pdf', NULL, NULL),
	(79, 11, 'Recruitment, Selection and Placement in the Field Office', '2023-08-13 21:08:11', '2023-08-19 20:33:31', '1692506011.pdf', NULL, NULL),
	(80, 12, 'Issuance of Certificate of Employment to current officials, employees and Contract of Service Workers', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(81, 12, 'Issuance of Certificate of Employment to Separated Officials, Employees, and Contract of Service Workers', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(82, 12, 'Issuance of Service Record to current Officials and Employees', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(83, 12, 'Issuance of Service Record to Separated Officials and Employees', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(84, 13, 'Handling of 8888 Complaints and Grievances (Group: Program wide/Division Wide)', '2023-08-13 21:08:11', '2023-08-13 21:08:11', NULL, NULL, NULL),
	(85, 14, 'Technical Assistance on STB-developed Programs and Projects', '2023-08-13 21:08:11', '2023-08-19 20:35:03', '1692506103.pdf', NULL, NULL),
	(86, 15, 'ICT Support Services', '2023-08-13 21:08:11', '2023-08-19 20:35:29', '1692506129.pdf', NULL, NULL),
	(87, 16, 'Data-sharing. Statistics/Raw Data Request', '2023-08-13 21:08:11', '2023-08-19 20:35:42', '1692506142.pdf', NULL, NULL),
	(88, 16, 'Data Sharing with DSWD OBSUs- Name Matching', '2023-08-13 21:08:11', '2023-08-19 20:35:56', '1692506156.pdf', NULL, NULL),
	(89, 17, 'Accreditation of Pre - Marriage Counselors', '2023-08-13 21:08:11', '2023-08-19 20:36:50', '1692506210.pdf', '', NULL),
	(90, 17, 'Registration of Private Social Welfare and Development Agencies (SWDAS) - Operating in one Region', '2023-08-13 21:08:11', '2023-08-19 20:38:18', '1692506298.pdf', '', ''),
	(91, 18, 'Referral Management Process for SLP-RPMO', '2023-08-13 21:08:11', '2023-08-19 20:38:56', '1692506336.pdf', NULL, NULL),
	(92, 18, 'Grievance Management Process for SLP-RPMO', '2023-08-13 21:08:11', '2023-08-19 20:39:06', '1692506346.pdf', NULL, NULL),
	(95, 20, 'Implementation of the Assistance to Individuals in Crisis Situation Program for Clients Transacting with the DSWD Offices (CIU/CIS/SWAD OFFICES)', '2023-08-13 21:08:11', '2023-09-07 18:58:14', '1692506499.pdf', '1693304910.pdf', '1694141894.pdf'),
	(96, 20, 'Implementation of the Assistance to Individuals in Crisis Situation Program for Clients Tagged as Group of Individuals', '2023-08-13 21:08:11', '2023-08-19 20:41:53', '1692506513.pdf', NULL, NULL),
	(97, 21, 'Provision of Assistance under the Recovery and Reintegration Program for Trafficked Persons (RRPTP)', '2023-08-13 21:08:11', '2023-08-19 20:43:59', '1692506639.pdf', NULL, NULL),
	(98, 22, 'Procedure for Social Pension Provision to Indigent Senior Citizens', '2023-08-13 21:08:11', '2023-08-19 20:50:09', '1692507009.pdf', NULL, NULL),
	(99, 22, 'Provision of Centenarian Gift to Centenarians', '2023-08-13 21:08:11', '2023-08-19 20:50:23', '1692507023.pdf', NULL, NULL),
	(100, 23, 'Securing Travel Clearance for Minors Traveling Abroad', '2023-08-13 21:08:11', '2023-08-19 20:43:40', '1692506620.pdf', '', ''),
	(101, 24, 'Provision of Resource Person to DSWD Intermediaries and Stakeholders', '2023-08-13 21:08:11', '2023-08-19 20:42:52', '1692506572.pdf', NULL, NULL),
	(205, 30, 'Supplementary Feeding Program', '2023-08-19 20:49:09', '2023-08-30 22:27:36', '1692506974.pdf', NULL, NULL);

-- Dumping structure for table charter.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_external` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_division_id_foreign` (`division_id`),
  CONSTRAINT `sections_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.sections: ~46 rows (approximately)
INSERT INTO `sections` (`id`, `division_id`, `name`, `description`, `created_at`, `updated_at`, `file`, `has_external`, `deleted_at`) VALUES
	(1, 2, 'Data Management and Integration Section', 'DMIS', '2023-08-02 00:07:10', '2023-10-01 18:46:14', '1694568484.pdf', 1, NULL),
	(2, 1, 'General Services Management Section', 'GSMS', '2023-08-02 00:07:10', '2023-10-02 22:46:46', NULL, 0, NULL),
	(3, 1, 'Procurement Management Section', 'PMS', '2023-08-02 00:07:10', '2023-09-11 13:14:36', NULL, 0, NULL),
	(4, 1, 'Property and Asset Management Section', 'PAMS', '2023-08-02 00:07:10', '2023-09-11 08:12:26', '1694394746.pdf', 1, NULL),
	(5, 1, 'Property and Asset Section', 'PSS', '2023-08-02 00:07:10', '2023-09-11 08:13:20', NULL, 0, NULL),
	(6, 1, 'Records and Archives Management Section wwww', 'RAMS', '2023-08-02 00:07:10', '2023-10-03 01:19:19', '1696324759.pdf', 1, NULL),
	(7, 3, 'Disaster Response and Rehabilitation Section', 'DRRS', '2023-08-02 00:07:10', '2023-09-11 08:16:37', '1694394997.pdf', 1, NULL),
	(10, 5, 'HR Welfare Section', 'HRWS', '2023-08-02 00:07:10', '2023-09-08 21:23:44', NULL, 0, NULL),
	(11, 5, 'Human Resource Planning and Performance Management Section', 'HRPPMS', '2023-08-02 00:07:10', '2023-10-02 01:33:36', NULL, 0, NULL),
	(12, 5, 'Personnel Administration Section', 'PAS', '2023-08-02 00:07:10', '2023-09-11 08:18:58', '1694395138.pdf', 1, NULL),
	(13, 6, 'Social Marketing Section', 'SMS', '2023-08-02 00:07:10', '2023-09-11 08:19:34', '1694395174.pdf', 1, NULL),
	(14, 6, 'Social Technology Unit', 'STU', '2023-08-02 00:07:10', '2023-09-11 16:29:55', '1694424595.pdf', 1, NULL),
	(15, 7, 'Information and Communications Technology Section', 'ICTS', '2023-08-02 00:07:10', '2023-09-17 21:46:53', '1695016013.pdf', 0, NULL),
	(16, 7, 'National Household Targeting Section', 'NHTS', '2023-08-02 00:07:10', '2023-09-07 23:29:03', '1694158143.pdf', 1, NULL),
	(17, 7, 'Standards Section', 'SS', '2023-08-02 00:07:10', '2023-09-11 08:07:17', '1694394437.pdf', 1, NULL),
	(18, 8, 'Sustainable Livelihood Program Regional Program Management Office', 'SLP', '2023-08-02 00:07:10', '2023-09-12 08:42:13', '1694482933.pdf', 1, NULL),
	(20, 9, 'Crisis Intervention Section', 'CIS', '2023-08-02 00:07:10', '2023-09-11 08:21:06', '1694395266.pdf', 1, NULL),
	(21, 9, 'Recovery and Reintegration Program for Trafficked Persons', 'RRPTP', '2023-08-02 00:07:10', '2023-09-11 08:22:45', '1694395365.pdf', 1, NULL),
	(22, 9, 'Social Pension Program', 'SOCPEN', '2023-08-02 00:07:10', '2023-09-12 12:08:45', '1694495325.pdf', 1, NULL),
	(23, 9, 'Welfare and Development Cebu', 'SWAD-MTA', '2023-08-02 00:07:10', '2023-09-11 08:22:31', '1694395351.pdf', 1, NULL),
	(24, 9, 'Capability Building Section', 'CBS', '2023-08-02 00:07:10', '2023-09-11 08:21:42', '1694395302.pdf', 1, NULL),
	(30, 9, 'Supplementary Feeding Program', 'SFP', '2023-08-19 20:46:13', '2023-09-12 12:07:26', '1694495246.pdf', 1, NULL),
	(33, 12, 'Regional Rehabilitation Center for Youth', 'RRCY', '2023-09-08 20:30:54', '2023-09-11 08:15:45', '1694394945.pdf', 1, NULL),
	(34, 12, 'Reception and Study Center for Children', 'RSCC', '2023-09-08 20:31:11', '2023-09-13 07:20:13', '1694564413.pdf', 1, NULL),
	(35, 12, 'Home For Girls', 'HFG', '2023-09-08 20:31:23', '2023-09-11 08:15:10', '1694394910.pdf', 1, NULL),
	(36, 12, 'Regional Haven for Women', 'RHW', '2023-09-08 20:31:41', '2023-09-11 08:15:32', '1694394932.pdf', 1, NULL),
	(37, 9, 'Provision of Assistance to People Living with HIV', 'PLHIV', '2023-09-08 21:20:09', '2023-09-11 14:37:45', '1694417865.pdf', 1, NULL),
	(38, 7, 'Policy Development and Planning Section', 'PDPS', '2023-09-09 16:25:08', '2023-09-13 09:35:39', '1694572539.pdf', 1, NULL),
	(39, 9, 'Youth - Government Internship Program', 'GIP', '2023-09-11 14:36:39', '2023-09-11 14:36:39', '1694417799.pdf', 1, NULL),
	(40, 13, 'Sustainable Livelihood Program', 'SLP', '2023-09-14 14:55:49', '2023-09-14 14:55:49', '1694678149.pdf', 1, NULL),
	(41, 13, 'Pantawid Pamilyang Pilipino Program', '4Ps', '2023-09-14 14:56:27', '2023-09-14 14:56:27', NULL, 1, NULL),
	(42, 13, 'Supplementary Feeding Program', 'SFP', '2023-09-14 14:56:41', '2023-09-14 14:56:41', NULL, 1, NULL),
	(43, 13, 'Crisis Intervention Section', 'CIS', '2023-09-14 14:57:20', '2023-09-14 14:57:20', NULL, 1, NULL),
	(44, 13, 'Social Pension Program', 'SOCPEN', '2023-09-14 14:57:57', '2023-09-14 14:57:57', NULL, 1, NULL),
	(45, 14, 'Sustainable Livelihood Program', 'SLP', '2023-09-14 14:58:29', '2023-09-14 14:58:29', NULL, 1, NULL),
	(46, 14, 'Pantawid Pamilyang Pilipino Program', '4Ps', '2023-09-14 14:58:37', '2023-09-14 14:58:37', NULL, 1, NULL),
	(47, 14, 'Supplementary Feeding Program', 'SLP', '2023-09-14 14:59:08', '2023-09-14 14:59:08', NULL, 1, NULL),
	(48, 14, 'Crisis Intervention Section', 'CIS', '2023-09-14 14:59:18', '2023-09-14 14:59:18', NULL, 1, NULL),
	(49, 14, 'Social Pension Program', 'SOCPEN', '2023-09-14 14:59:34', '2023-09-14 14:59:34', NULL, 1, NULL),
	(50, 15, 'Sustainable Livelihood Program', 'SLP', '2023-09-14 15:07:45', '2023-09-14 15:07:45', NULL, 1, NULL),
	(51, 15, 'Pantawid Pamilyang Pilipino Program', '4Ps', '2023-09-14 15:07:59', '2023-09-14 15:07:59', NULL, 1, NULL),
	(52, 15, 'Supplementary Feeding Program', 'SLP', '2023-09-14 15:08:09', '2023-09-14 15:08:09', NULL, 1, NULL),
	(53, 15, 'Crisis Intervention Section', 'CIS', '2023-09-14 15:08:17', '2023-09-19 23:15:22', '1695194122.pdf', 1, NULL),
	(54, 15, 'Social Pension Program', 'SOCPEN', '2023-09-14 15:08:26', '2023-09-14 15:08:26', NULL, 1, NULL),
	(58, 18, 'eee', 'eeee', '2023-09-28 22:28:51', '2023-10-01 18:09:18', NULL, 1, '2023-10-01 18:09:18'),
	(59, 19, 'WWWWWWWWW', 'WWW', '2023-09-28 22:39:50', '2023-10-01 18:09:21', NULL, 1, '2023-10-01 18:09:21'),
	(60, 1, 'TESTQQQQQQQ', 'TTT', '2023-09-29 02:00:43', '2023-10-03 01:15:02', '1696324502.pdf', 1, NULL),
	(61, 5, 'qwe', 'qwe', '2023-10-02 01:33:47', '2023-10-02 01:33:47', NULL, 1, NULL),
	(62, 1, 'zzzzzzzzzzzzzzzzzzzzzzzz', 'zzzz', '2023-10-02 23:31:37', '2023-10-03 01:11:43', '1696324303.pdf', 1, NULL);

-- Dumping structure for table charter.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `division_id` bigint unsigned DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_division_id_foreign` (`division_id`),
  CONSTRAINT `users_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table charter.users: ~7 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `division_id`, `is_admin`, `deleted_at`) VALUES
	(1, 'admin', 'resty@gmail.com', NULL, '$2y$10$UtSde8To6jG7Y.bSy2b9YeLr6Y8JTbD21AAimUT8h2uKxaV0Tgx56', 'glpQdOGbFQGLvYN5H74YnEjtCwbHcnTgeMjeb2QKEd6IFrfGoYAveQg9CgIL', '2023-09-18 19:26:23', '2023-09-25 19:15:16', 1, 1, NULL),
	(2, 'Test User 2', 'qw@gmail.com', NULL, '$2y$10$rE8t77AQ4kwBXH7vcwcYEuiJtCjf1LbKAuTmCD1j6UAhSaux3Nyte', NULL, '2023-09-20 22:09:09', '2023-09-27 21:43:53', 2, 0, NULL),
	(3, 'Test user 1', 'q@gmail.com', NULL, '$2y$10$z8DejKqGCqgK60DfZgQqiuaz1v94OAnTk1A7/zrbiXZ.Qr3YbNnfG', NULL, '2023-09-20 23:44:05', '2023-09-28 02:25:21', 1, 0, NULL),
	(10, 'Test User 3', 'qwe@gmail.com', NULL, '$2y$10$0HrZhB9WqjL6yWOz0kEaIuDGZ353.CLX/Nf1.D.meHGee4FduczG.', NULL, '2023-09-27 21:45:02', '2023-10-04 01:33:11', 3, 0, NULL),
	(11, 'Test User 4', 'w@gmail.com', NULL, '$2y$10$Mi3.pbAh0/FsMTf1yb86auNJF8bSP9w6Zlv/vztVQUOiBcn2ES9AS', NULL, '2023-09-28 00:53:07', '2023-10-04 17:33:44', 5, 0, '2023-10-04 17:33:44'),
	(12, 'Test User 4', 'we@admin.com', NULL, '$2y$10$I7oE5fzTohZimgzHOnLXfe/j7r9CrdjBSEoY9TbPWnOxJ4j37bYsi', NULL, '2023-09-28 00:53:56', '2023-09-28 17:10:04', 6, 1, NULL),
	(13, 'Test User 5', 'qwer@gmail.com', NULL, '$2y$10$tA98Dyb5Ry3CJt1napYyP.Je77MgX5kquJGau0xn8d0p8caAYQUDy', NULL, '2023-09-28 00:54:55', '2023-09-28 15:56:04', 7, 1, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
