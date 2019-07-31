/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `academic_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `academic_years` DISABLE KEYS */;
INSERT INTO `academic_years` (`id`, `name`, `start`, `end`, `school_id`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Année scolaire 2018 - 2019', '2018-01-01 00:00:00', '2019-01-01 00:00:00', 1, 1, '2018-08-20 10:58:42', '2018-09-04 22:04:59');
/*!40000 ALTER TABLE `academic_years` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `blood_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `blood_groups` DISABLE KEYS */;
INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'O +', '2018-08-31 18:12:32', '2018-08-31 18:12:37'),
	(2, 'O -', '2018-08-31 18:12:32', '2018-08-31 18:12:37'),
	(3, 'A +', '2018-08-31 18:12:33', '2018-08-31 18:12:36'),
	(4, 'A -', '2018-08-31 18:12:34', '2018-08-31 18:12:35'),
	(5, 'AB +', '2018-08-31 18:12:51', '2018-08-31 18:12:52'),
	(6, 'AB -', '2018-08-31 18:12:58', '2018-08-31 18:12:59'),
	(7, 'B +', '2018-08-31 18:13:07', '2018-08-31 18:13:08'),
	(8, 'B -', '2018-08-31 18:13:16', '2018-08-31 18:13:17');
/*!40000 ALTER TABLE `blood_groups` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_level_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `name`, `study_level_id`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'PRE K - CLASSE 1', 1, 1, '2018-08-27 13:57:58', '2018-08-27 13:57:58'),
	(2, 'PRE K - CLASSE 2', 1, 1, '2018-08-27 15:11:33', '2018-08-27 15:11:33'),
	(3, 'K1 - CLASSE 1', 2, 1, '2018-08-27 15:12:14', '2018-08-27 15:12:14'),
	(4, 'K1 - CLASSE 2', 2, 1, '2018-08-27 15:12:32', '2018-08-27 15:12:32'),
	(5, 'K2 - CLASSE 1', 3, 1, '2018-08-27 15:12:50', '2018-08-27 15:12:50'),
	(6, 'K2 - CLASSE 2', 3, 1, '2018-08-27 15:13:24', '2018-08-27 15:13:24'),
	(7, 'K3 - CLASSE 3', 4, 1, '2018-08-27 15:13:44', '2018-08-27 15:13:44'),
	(8, 'K3 - CLASSE 2', 4, 1, '2018-08-27 15:14:00', '2018-08-27 15:14:00'),
	(9, 'CP - CLASSE 1', 5, 1, '2018-08-27 15:14:39', '2018-08-27 15:14:39'),
	(10, 'CP - CLASSE 2', 5, 1, '2018-08-27 15:14:54', '2018-08-27 15:14:54'),
	(11, 'CE1 - CLASSE 1', 6, 1, '2018-08-27 15:15:13', '2018-09-03 06:08:17'),
	(12, 'CE2 - CLASSE 1', 7, 1, '2018-08-27 15:15:46', '2018-08-27 15:15:46'),
	(13, 'CE1 - CLASSE 2', 6, 1, '2018-08-27 15:17:52', '2018-08-27 15:17:52'),
	(14, 'CE2 - CLASSE 2', 7, 1, '2018-08-27 15:18:18', '2018-08-27 15:18:18'),
	(15, 'CM1 - CLASSE 1', 8, 1, '2018-08-27 15:19:09', '2018-08-27 15:19:09'),
	(16, 'CM1 - CLASSE 2', 8, 1, '2018-08-27 15:19:36', '2018-08-27 15:19:36'),
	(17, 'CE2 - CLASSE 2', 7, 1, '2018-08-27 15:21:25', '2018-08-27 15:21:25'),
	(18, 'CM2 - CLASSE 1', 9, 1, '2018-08-27 15:22:30', '2018-08-27 15:22:30'),
	(19, 'CM2 - CLASSE 2', 9, 1, '2018-08-27 15:22:48', '2018-08-27 15:22:48');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `class_student` (
  `classe_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `academic_year_id` int(10) unsigned NOT NULL,
  `studylevel_id` int(10) unsigned NOT NULL,
  `previous_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `class_student` DISABLE KEYS */;
INSERT INTO `class_student` (`classe_id`, `student_id`, `school_id`, `academic_year_id`, `studylevel_id`, `previous_school`, `academic_file`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 'Test school', '7GVDGRpbVvc6wBni9IKQcW6XbTTXHDyWBF27zpqM.docx', '2018-09-04 22:45:08', '2018-09-04 22:45:08');
/*!40000 ALTER TABLE `class_student` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Lundi', NULL, NULL),
	(2, 'Mardi', NULL, NULL),
	(3, 'Mercredi', NULL, NULL),
	(4, 'Jeudi', NULL, NULL),
	(5, 'Vendredi', NULL, NULL),
	(6, 'Samedi', NULL, NULL);
/*!40000 ALTER TABLE `days` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `day_subject` (
  `day_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `day_subject` DISABLE KEYS */;
INSERT INTO `day_subject` (`day_id`, `subject_id`, `professor_id`, `start`, `end`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '08:00:00', '10:00:00', '2018-09-04 18:17:46', '2018-09-04 18:17:46'),
	(1, 2, 2, '10:00:00', '12:00:00', '2018-09-04 18:18:00', '2018-09-04 18:18:00'),
	(2, 1, 2, '08:00:00', '10:00:00', '2018-09-04 18:18:25', '2018-09-04 18:18:25'),
	(2, 2, 1, '10:00:00', '12:00:00', '2018-09-04 18:18:48', '2018-09-04 18:18:48');
/*!40000 ALTER TABLE `day_subject` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `day_timetable` (
  `day_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `day_timetable` DISABLE KEYS */;
INSERT INTO `day_timetable` (`day_id`, `timetable_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(2, 1, NULL, NULL),
	(3, 1, NULL, NULL),
	(4, 1, NULL, NULL),
	(5, 1, NULL, NULL);
/*!40000 ALTER TABLE `day_timetable` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` (`id`, `name`, `school_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Frais d\'inscription', 1, NULL, '2018-09-04 19:16:51', '2018-09-04 19:21:58'),
	(2, '2e versement', 1, NULL, '2018-09-04 19:22:15', '2018-09-04 20:03:06'),
	(3, '3e versement', 1, NULL, '2018-09-04 19:56:29', '2018-09-04 20:02:53'),
	(4, '1er versement', 1, NULL, '2018-09-04 19:57:20', '2018-09-04 20:02:14');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `expense_configurations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `academic_year_id` int(10) unsigned NOT NULL,
  `studylevel_id` int(10) unsigned NOT NULL,
  `expense_id` int(10) unsigned NOT NULL,
  `amount` double unsigned NOT NULL,
  `echeance` date DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `expense_configurations` DISABLE KEYS */;
INSERT INTO `expense_configurations` (`id`, `school_id`, `academic_year_id`, `studylevel_id`, `expense_id`, `amount`, `echeance`, `is_required`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 120000, NULL, 1, '2018-09-04 20:57:26', '2018-09-04 21:20:25'),
	(2, 1, 1, 1, 4, 250000, '2018-04-30', 1, '2018-09-04 20:59:55', '2018-09-04 21:20:37'),
	(3, 1, 1, 1, 2, 450000, '2018-10-31', 1, '2018-09-04 21:21:26', '2018-09-04 21:21:26'),
	(4, 1, 1, 1, 3, 350000, '2019-02-28', 1, '2018-09-04 21:21:57', '2018-09-04 21:21:57');
/*!40000 ALTER TABLE `expense_configurations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `guardians` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guardian_type_id` int(11) NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `given_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_home` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guardians_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `guardians` DISABLE KEYS */;
INSERT INTO `guardians` (`id`, `guardian_type_id`, `last_name`, `given_names`, `career`, `employer`, `mailing_address`, `tel_work`, `tel_home`, `cell`, `email`, `address`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Harden', 'Davis Anthony', 'Comptable', 'Employeur 1', '01 BP 0101 ABIDJAN 01', '21 11 11 11', '20 11 11 11', '01 11 11 11', 'davis.harden@example.com', 'Rivéra palmeraie, Cocody, Abidjan, Côte d\'ivoire', '2018-09-03 01:56:09', '2018-09-03 01:56:09'),
	(2, 2, 'Harden', 'Tracy', 'Commercial', 'Employeur 2', '01 BP 0101 ABIDJAN 01', '22 00 00 01', '22 00 00 02', '02 00 00 01', 'tracy.harden@example.com', 'Rivéra palmeraie, Cocody, Abidjan, Côte d\'ivoire', '2018-09-03 02:33:25', '2018-09-03 02:33:25');
/*!40000 ALTER TABLE `guardians` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `guardian_student` (
  `guardian_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `guardian_student` DISABLE KEYS */;
INSERT INTO `guardian_student` (`guardian_id`, `student_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2018-09-03 01:56:09', '2018-09-03 01:56:09'),
	(2, 1, '2018-09-03 02:33:25', '2018-09-03 02:33:25');
/*!40000 ALTER TABLE `guardian_student` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `guardian_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `guardian_types` DISABLE KEYS */;
INSERT INTO `guardian_types` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'father', 'PERE / FATHER', '2018-08-31 01:49:29', '2018-08-31 01:49:30'),
	(2, 'mother', 'MERE / MOTHER', '2018-08-31 01:49:49', '2018-08-31 01:49:50'),
	(3, 'guardian', 'TUTEUR / GUARDIAN', '2018-08-31 01:50:15', '2018-08-31 01:50:16');
/*!40000 ALTER TABLE `guardian_types` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `study_level_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `academic_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `ltm_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `ltm_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ltm_translations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `medical_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bloodgroup_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_clinic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_doctor_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_history` longtext COLLATE utf8mb4_unicode_ci,
  `allergies` longtext COLLATE utf8mb4_unicode_ci,
  `childhood_diseases` longtext COLLATE utf8mb4_unicode_ci,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `medical_informations` DISABLE KEYS */;
INSERT INTO `medical_informations` (`id`, `bloodgroup_id`, `emergency_clinic`, `family_doctor`, `family_doctor_tel`, `medical_history`, `allergies`, `childhood_diseases`, `student_id`, `created_at`, `updated_at`) VALUES
	(1, '1', 'Clinique 1', 'John Doe', '01 00 01 00', NULL, NULL, NULL, 0, '2018-09-03 03:48:40', '2018-09-03 03:48:40'),
	(2, '1', 'Clinique 1', 'John Doe', '21 00 00 00', 'Asthme', 'Nivaquine\r\nPéniciline', 'Rougeole\r\nOreillons', 1, '2018-09-03 04:11:58', '2018-09-04 22:08:13');
/*!40000 ALTER TABLE `medical_informations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_07_31_021854_create_permission_tables', 1),
	(4, '2014_04_02_193005_create_translations_table', 2),
	(5, '2018_07_31_053528_create_schools_table', 3),
	(6, '2018_07_31_054902_create_pays_table', 3),
	(7, '2018_07_31_055001_create_villes_table', 3),
	(8, '2018_08_15_194708_create_annees_table', 4),
	(9, '2018_08_20_111013_create_niveaux_d_etudes_tables', 5),
	(10, '2018_08_20_125614_create_classes_table', 6),
	(16, '2018_08_30_161601_create_allegies_table', 7),
	(17, '2018_08_30_161706_create_medical_histories_table', 7),
	(18, '2018_08_30_161929_create_childhood_diseases_table', 7),
	(19, '2018_08_30_205403_create_students_table', 8),
	(20, '2018_08_31_010324_create_inscriptions_table', 9),
	(21, '2018_08_31_010712_create_guardian_types_table', 9),
	(22, '2018_08_31_010814_create_guardians_table', 9),
	(23, '2018_08_31_011008_create_guardian_student_table', 9),
	(24, '2018_08_31_181051_create_bloodgroups_table', 10),
	(25, '2018_08_31_184154_create_medical_history_student_table', 11),
	(26, '2018_08_31_184403_create_allergy_student_table', 11),
	(27, '2018_08_31_184449_create_childhood_disease_student_table', 11),
	(28, '2018_09_02_200841_create_medical_informations_table', 12),
	(29, '2018_09_02_201413_create_medical_information_student', 12),
	(30, '2018_09_03_081200_create_subject_categories_table', 13),
	(31, '2018_09_03_111434_create_subjects_table', 14),
	(32, '2018_09_03_120111_create_professors_table', 15),
	(33, '2018_09_03_124432_create_professor_subject_table', 16),
	(36, '2018_09_03_135614_create_days_table', 19),
	(37, '2018_09_04_035143_create_sessions_table', 19),
	(41, '2018_09_04_035904_create_timetables_table', 20),
	(42, '2018_09_04_152801_create_professor_subject_timetable_table', 21),
	(43, '2018_09_04_162659_create_day_timetable_table', 22),
	(44, '2018_09_04_173538_create_day_subject_table', 23),
	(45, '2018_09_04_185837_create_expenses_table', 24),
	(46, '2018_09_04_192500_create_expense_configurations_table', 25),
	(47, '2018_09_04_221245_create_class_student_table', 26);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 6);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` (`id`, `nom`, `code_iso`, `indicatif`, `created_at`, `updated_at`) VALUES
	(1, 'Côte d\'ivoire', 'CIV', '+225', '2018-07-31 06:00:47', '2018-07-31 06:00:47');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_users', NULL, 'web', '2018-07-31 03:13:25', '2018-07-31 03:13:25'),
	(2, 'add_users', NULL, 'web', '2018-07-31 03:13:25', '2018-07-31 03:13:25'),
	(3, 'edit_users', NULL, 'web', '2018-07-31 03:13:26', '2018-07-31 03:13:26'),
	(4, 'delete_users', NULL, 'web', '2018-07-31 03:13:26', '2018-07-31 03:13:26'),
	(5, 'view_roles', NULL, 'web', '2018-07-31 03:13:26', '2018-07-31 03:13:26'),
	(6, 'add_roles', NULL, 'web', '2018-07-31 03:13:26', '2018-07-31 03:13:26'),
	(7, 'edit_roles', NULL, 'web', '2018-07-31 03:13:26', '2018-07-31 03:13:26'),
	(8, 'delete_roles', NULL, 'web', '2018-07-31 03:13:26', '2018-07-31 03:13:26'),
	(9, 'view_schools', NULL, 'web', '2018-07-31 06:29:51', '2018-07-31 06:29:51'),
	(10, 'add_schools', NULL, 'web', '2018-07-31 06:29:51', '2018-07-31 06:29:51'),
	(11, 'edit_schools', NULL, 'web', '2018-07-31 06:29:51', '2018-07-31 06:29:51'),
	(12, 'delete_schools', NULL, 'web', '2018-07-31 06:29:51', '2018-07-31 06:29:51'),
	(13, 'view_annees', NULL, 'web', '2018-08-20 10:54:18', '2018-08-20 10:54:18'),
	(14, 'add_annees', NULL, 'web', '2018-08-20 10:54:18', '2018-08-20 10:54:18'),
	(15, 'edit_annees', NULL, 'web', '2018-08-20 10:54:18', '2018-08-20 10:54:18'),
	(16, 'delete_annees', NULL, 'web', '2018-08-20 10:54:19', '2018-08-20 10:54:19'),
	(21, 'view_niveaux', NULL, 'web', '2018-08-20 11:23:41', '2018-08-20 11:23:41'),
	(22, 'add_niveaux', NULL, 'web', '2018-08-20 11:23:42', '2018-08-20 11:23:42'),
	(23, 'edit_niveaux', NULL, 'web', '2018-08-20 11:23:42', '2018-08-20 11:23:42'),
	(24, 'delete_niveaux', NULL, 'web', '2018-08-20 11:23:42', '2018-08-20 11:23:42'),
	(25, 'view_classes', NULL, 'web', '2018-08-20 13:21:14', '2018-08-20 13:21:14'),
	(26, 'add_classes', NULL, 'web', '2018-08-20 13:21:14', '2018-08-20 13:21:14'),
	(27, 'edit_classes', NULL, 'web', '2018-08-20 13:21:14', '2018-08-20 13:21:14'),
	(28, 'delete_classes', NULL, 'web', '2018-08-20 13:21:14', '2018-08-20 13:21:14'),
	(29, 'view_students', NULL, 'web', '2018-08-28 18:55:35', '2018-08-28 18:55:35'),
	(30, 'add_students', NULL, 'web', '2018-08-28 18:55:35', '2018-08-28 18:55:35'),
	(31, 'edit_students', NULL, 'web', '2018-08-28 18:55:35', '2018-08-28 18:55:35'),
	(32, 'delete_students', NULL, 'web', '2018-08-28 18:55:35', '2018-08-28 18:55:35'),
	(33, 'view_allergies', NULL, 'web', '2018-08-30 17:30:32', '2018-08-30 17:30:32'),
	(34, 'add_allergies', NULL, 'web', '2018-08-30 17:30:32', '2018-08-30 17:30:32'),
	(35, 'edit_allergies', NULL, 'web', '2018-08-30 17:30:32', '2018-08-30 17:30:32'),
	(36, 'delete_allergies', NULL, 'web', '2018-08-30 17:30:32', '2018-08-30 17:30:32'),
	(37, 'view_medicalhistories', NULL, 'web', '2018-08-30 18:37:29', '2018-08-30 18:37:29'),
	(38, 'add_medicalhistories', NULL, 'web', '2018-08-30 18:37:29', '2018-08-30 18:37:29'),
	(39, 'edit_medicalhistories', NULL, 'web', '2018-08-30 18:37:29', '2018-08-30 18:37:29'),
	(40, 'delete_medicalhistories', NULL, 'web', '2018-08-30 18:37:29', '2018-08-30 18:37:29'),
	(41, 'view_childhooddiseases', NULL, 'web', '2018-08-30 20:40:55', '2018-08-30 20:40:55'),
	(42, 'add_childhooddiseases', NULL, 'web', '2018-08-30 20:40:55', '2018-08-30 20:40:55'),
	(43, 'edit_childhooddiseases', NULL, 'web', '2018-08-30 20:40:55', '2018-08-30 20:40:55'),
	(44, 'delete_childhooddiseases', NULL, 'web', '2018-08-30 20:40:55', '2018-08-30 20:40:55'),
	(45, 'view_inscriptions', NULL, 'web', '2018-08-31 01:17:10', '2018-08-31 01:17:10'),
	(46, 'add_inscriptions', NULL, 'web', '2018-08-31 01:17:10', '2018-08-31 01:17:10'),
	(47, 'edit_inscriptions', NULL, 'web', '2018-08-31 01:17:10', '2018-08-31 01:17:10'),
	(48, 'delete_inscriptions', NULL, 'web', '2018-08-31 01:17:10', '2018-08-31 01:17:10'),
	(49, 'view_guardians', NULL, 'web', '2018-09-03 01:21:51', '2018-09-03 01:21:51'),
	(50, 'add_guardians', NULL, 'web', '2018-09-03 01:21:52', '2018-09-03 01:21:52'),
	(51, 'edit_guardians', NULL, 'web', '2018-09-03 01:21:52', '2018-09-03 01:21:52'),
	(52, 'delete_guardians', NULL, 'web', '2018-09-03 01:21:52', '2018-09-03 01:21:52'),
	(53, 'view_academic_years', NULL, 'web', '2018-09-03 04:47:18', '2018-09-03 04:47:18'),
	(54, 'add_academic_years', NULL, 'web', '2018-09-03 04:47:18', '2018-09-03 04:47:18'),
	(55, 'edit_academic_years', NULL, 'web', '2018-09-03 04:47:18', '2018-09-03 04:47:18'),
	(56, 'delete_academic_years', NULL, 'web', '2018-09-03 04:47:18', '2018-09-03 04:47:18'),
	(57, 'view_academicyears', NULL, 'web', '2018-09-03 04:49:27', '2018-09-03 04:49:27'),
	(58, 'add_academicyears', NULL, 'web', '2018-09-03 04:49:27', '2018-09-03 04:49:27'),
	(59, 'edit_academicyears', NULL, 'web', '2018-09-03 04:49:27', '2018-09-03 04:49:27'),
	(60, 'delete_academicyears', NULL, 'web', '2018-09-03 04:49:27', '2018-09-03 04:49:27'),
	(61, 'view_studylevels', NULL, 'web', '2018-09-03 05:53:21', '2018-09-03 05:53:21'),
	(62, 'add_studylevels', NULL, 'web', '2018-09-03 05:53:21', '2018-09-03 05:53:21'),
	(63, 'edit_studylevels', NULL, 'web', '2018-09-03 05:53:22', '2018-09-03 05:53:22'),
	(64, 'delete_studylevels', NULL, 'web', '2018-09-03 05:53:22', '2018-09-03 05:53:22'),
	(65, 'view_subjectcategories', NULL, 'web', '2018-09-03 09:34:53', '2018-09-03 09:34:53'),
	(66, 'add_subjectcategories', NULL, 'web', '2018-09-03 09:34:53', '2018-09-03 09:34:53'),
	(67, 'edit_subjectcategories', NULL, 'web', '2018-09-03 09:34:53', '2018-09-03 09:34:53'),
	(68, 'delete_subjectcategories', NULL, 'web', '2018-09-03 09:34:53', '2018-09-03 09:34:53'),
	(69, 'view_subjects', NULL, 'web', '2018-09-03 11:25:52', '2018-09-03 11:25:52'),
	(70, 'add_subjects', NULL, 'web', '2018-09-03 11:25:52', '2018-09-03 11:25:52'),
	(71, 'edit_subjects', NULL, 'web', '2018-09-03 11:25:52', '2018-09-03 11:25:52'),
	(72, 'delete_subjects', NULL, 'web', '2018-09-03 11:25:52', '2018-09-03 11:25:52'),
	(73, 'view_professors', NULL, 'web', '2018-09-03 12:18:34', '2018-09-03 12:18:34'),
	(74, 'add_professors', NULL, 'web', '2018-09-03 12:18:34', '2018-09-03 12:18:34'),
	(75, 'edit_professors', NULL, 'web', '2018-09-03 12:18:34', '2018-09-03 12:18:34'),
	(76, 'delete_professors', NULL, 'web', '2018-09-03 12:18:34', '2018-09-03 12:18:34'),
	(77, 'view_timetables', NULL, 'web', '2018-09-03 13:50:29', '2018-09-03 13:50:29'),
	(78, 'add_timetables', NULL, 'web', '2018-09-03 13:50:29', '2018-09-03 13:50:29'),
	(79, 'edit_timetables', NULL, 'web', '2018-09-03 13:50:29', '2018-09-03 13:50:29'),
	(80, 'delete_timetables', NULL, 'web', '2018-09-03 13:50:29', '2018-09-03 13:50:29'),
	(81, 'view_sessions', NULL, 'web', '2018-09-04 04:43:12', '2018-09-04 04:43:12'),
	(82, 'add_sessions', NULL, 'web', '2018-09-04 04:43:12', '2018-09-04 04:43:12'),
	(83, 'edit_sessions', NULL, 'web', '2018-09-04 04:43:12', '2018-09-04 04:43:12'),
	(84, 'delete_sessions', NULL, 'web', '2018-09-04 04:43:12', '2018-09-04 04:43:12'),
	(85, 'view_expenses', NULL, 'web', '2018-09-04 19:00:40', '2018-09-04 19:00:40'),
	(86, 'add_expenses', NULL, 'web', '2018-09-04 19:00:40', '2018-09-04 19:00:40'),
	(87, 'edit_expenses', NULL, 'web', '2018-09-04 19:00:40', '2018-09-04 19:00:40'),
	(88, 'delete_expenses', NULL, 'web', '2018-09-04 19:00:40', '2018-09-04 19:00:40'),
	(89, 'view_expense-configurations', NULL, 'web', '2018-09-04 19:25:22', '2018-09-04 19:25:22'),
	(90, 'add_expense-configurations', NULL, 'web', '2018-09-04 19:25:22', '2018-09-04 19:25:22'),
	(91, 'edit_expense-configurations', NULL, 'web', '2018-09-04 19:25:22', '2018-09-04 19:25:22'),
	(92, 'delete_expense-configurations', NULL, 'web', '2018-09-04 19:25:22', '2018-09-04 19:25:22');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `professors_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT INTO `professors` (`id`, `nom`, `prenoms`, `contact_1`, `contact_2`, `email`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'McFly', 'Ibrahim', '01 55 25 21', NULL, 'ibrahim.mcfly@example.com', 1, '2018-09-03 12:49:20', '2018-09-03 13:24:19'),
	(2, 'Kouassi', 'Delphine', '01 14 15 85', NULL, 'delphine.kouassi@example.com', 1, '2018-09-03 14:21:19', '2018-09-03 14:21:19'),
	(3, 'COULibaly', 'Cheick', '01 08 00 77', NULL, 'vxyzbshgud@bb.com', 1, '2018-09-03 15:16:56', '2018-09-03 15:16:56');
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `professor_subject` (
  `professor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `professor_subject` DISABLE KEYS */;
INSERT INTO `professor_subject` (`professor_id`, `subject_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(1, 2, NULL, NULL),
	(2, 1, NULL, NULL),
	(2, 2, NULL, NULL),
	(3, 2, NULL, NULL),
	(3, 5, NULL, NULL),
	(3, 6, NULL, NULL);
/*!40000 ALTER TABLE `professor_subject` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `professor_subject_timetable` (
  `subject_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `professor_subject_timetable` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor_subject_timetable` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', 'web', '2018-07-31 03:13:26', '2018-07-31 04:33:48'),
	(2, 'manager', 'Manager', 'web', '2018-07-31 04:31:42', '2018-07-31 04:36:35'),
	(3, 'school-manager', 'School manager', 'web', '2018-07-31 04:36:17', '2018-07-31 04:36:46');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
	(41, 1),
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
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(77, 1),
	(78, 1),
	(79, 1),
	(80, 1),
	(81, 1),
	(82, 1),
	(83, 1),
	(84, 1),
	(85, 1),
	(86, 1),
	(87, 1),
	(88, 1),
	(89, 1),
	(90, 1),
	(91, 1),
	(92, 1),
	(1, 2),
	(5, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(9, 3),
	(11, 3),
	(13, 3),
	(14, 3),
	(15, 3),
	(16, 3),
	(21, 3),
	(22, 3),
	(23, 3),
	(24, 3),
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
	(42, 3),
	(43, 3),
	(44, 3),
	(45, 3),
	(46, 3),
	(47, 3),
	(48, 3),
	(49, 3),
	(50, 3),
	(51, 3),
	(52, 3),
	(53, 3),
	(54, 3),
	(55, 3),
	(56, 3),
	(57, 3),
	(58, 3),
	(59, 3),
	(60, 3),
	(61, 3),
	(62, 3),
	(63, 3),
	(64, 3),
	(65, 3),
	(66, 3),
	(67, 3),
	(68, 3),
	(69, 3),
	(70, 3),
	(71, 3),
	(72, 3),
	(73, 3),
	(74, 3),
	(75, 3),
	(76, 3),
	(81, 3),
	(82, 3),
	(83, 3),
	(84, 3),
	(85, 3),
	(86, 3),
	(87, 3),
	(88, 3),
	(89, 3),
	(90, 3),
	(91, 3),
	(92, 3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` int(11) NOT NULL,
  `pays_id` int(11) NOT NULL,
  `nom_banque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_compte_banque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_compte_banque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `revoked` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `schools_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` (`id`, `nom`, `slogan`, `siteweb`, `contact_1`, `contact_2`, `email`, `latitude`, `longitude`, `adresse`, `ville_id`, `pays_id`, `nom_banque`, `nom_compte_banque`, `numero_compte_banque`, `logo`, `created_at`, `updated_at`, `revoked`) VALUES
	(1, 'IBSA', 'L’avenir est dans nos mains, construisons-le ensemble.', 'http://www.ibsa.africa', '49 42 08 06', '53 57 66 66', 'info@ibsa.africa', NULL, NULL, 'II Plateaux, 7eme tranche', 1, 1, 'ECOBANK', 'International Bilingual Schools of Africa', 'CI053 01010 28123928340169', NULL, '2018-07-31 07:17:50', '2018-09-03 05:49:47', 1),
	(2, 'Etablissement 2', NULL, NULL, '21 00 00 02', NULL, 'etablissement2@example.com', NULL, NULL, 'Lorem ipsum', 1, 1, NULL, NULL, NULL, NULL, '2018-07-31 08:07:38', '2018-07-31 08:07:38', 1),
	(4, 'Agilly', NULL, NULL, '22 22 22 22', NULL, 'info@agilly.net', NULL, NULL, 'Adresse agilly', 1, 1, NULL, NULL, NULL, NULL, '2018-08-28 16:42:39', '2018-08-28 16:42:39', 1);
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `name`, `start`, `end`, `academic_year_id`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, '1er semestre', '2018-09-10 00:00:00', '2019-02-28 00:00:00', 1, 1, '2018-09-04 04:42:52', '2018-09-04 05:01:07'),
	(2, '2e semestre', '2019-03-01 00:00:00', '2019-05-30 00:00:00', 1, 1, '2018-09-04 04:57:56', '2018-09-04 05:02:07');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `given_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `place_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `matricule`, `last_name`, `given_names`, `dob`, `place_birth`, `citizenship`, `address`, `county`, `district`, `street_no`, `created_at`, `updated_at`) VALUES
	(1, 'IBSA-001', 'Harden', 'James', '2011-01-01 00:00:00', 'Angré, Cocody, Abidjan', 'Ivoirienne', 'Angré', 'Lagunes', 'Abidjan', '0001', '2018-09-02 21:58:33', '2018-09-03 06:31:41'),
	(2, 'IBSA-001', 'Haward', 'Dwight', '2010-01-01 00:00:00', 'Yopougon, Abidjan', 'Ivoirienne', 'Lorem ipsum', 'Lagunes', 'Abidjan', '1', '2018-09-03 06:36:56', '2018-09-03 06:36:56');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `study_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `study_levels` DISABLE KEYS */;
INSERT INTO `study_levels` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'PRE K', 1, '2018-08-20 12:03:25', '2018-08-27 12:49:29'),
	(2, 'K1 - Petite Section', 1, '2018-08-20 12:41:06', '2018-08-27 12:49:49'),
	(3, 'K2 - Moyenne Section', 1, '2018-08-27 12:50:16', '2018-08-27 12:50:16'),
	(4, 'K3 - Grande Section', 1, '2018-08-27 13:10:53', '2018-08-27 13:10:53'),
	(5, 'CP - Year 1', 1, '2018-08-27 13:11:09', '2018-08-27 13:11:09'),
	(6, 'CE1 - Year 2', 1, '2018-08-27 13:11:38', '2018-09-03 05:55:27'),
	(7, 'CE2 - Year 3', 1, '2018-08-27 13:12:29', '2018-08-27 13:12:29'),
	(8, 'CM1 - Year 4', 1, '2018-08-27 13:13:08', '2018-08-27 13:13:08'),
	(9, 'CM2 - Year 5', 1, '2018-08-27 13:13:27', '2018-08-27 13:13:27');
/*!40000 ALTER TABLE `study_levels` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `name`, `category_id`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'Histoire', 1, 1, '2018-09-03 11:40:47', '2018-09-03 11:50:22'),
	(2, 'Anglais', 1, 1, '2018-09-03 11:49:33', '2018-09-03 11:49:33'),
	(3, 'Francais', 1, 1, '2018-09-03 11:49:44', '2018-09-03 11:49:44'),
	(4, 'Mathématiques', 2, 1, '2018-09-03 11:50:34', '2018-09-03 11:50:34'),
	(5, 'Chimie', 2, 1, '2018-09-03 11:50:44', '2018-09-03 11:50:44'),
	(6, 'Biologie', 2, 1, '2018-09-03 11:50:57', '2018-09-03 11:50:57'),
	(7, 'Musique', 3, 1, '2018-09-03 11:51:10', '2018-09-03 11:51:10'),
	(8, 'Dessin', 3, 1, '2018-09-03 11:51:28', '2018-09-03 11:51:28');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `subject_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `subject_categories` DISABLE KEYS */;
INSERT INTO `subject_categories` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'Littérature', 1, '2018-09-03 11:00:56', '2018-09-03 11:00:56'),
	(2, 'Science', 1, '2018-09-03 11:03:53', '2018-09-03 11:13:39'),
	(3, 'Art', 1, '2018-09-03 11:14:00', '2018-09-03 11:14:00');
/*!40000 ALTER TABLE `subject_categories` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `timetables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `timetables` DISABLE KEYS */;
INSERT INTO `timetables` (`id`, `name`, `class_id`, `school_id`, `academic_year_id`, `session_id`, `created_at`, `updated_at`) VALUES
	(1, 'Emploi du temps du premier semestre', 11, 1, 1, 1, '2018-09-04 15:20:49', '2018-09-04 15:20:49');
/*!40000 ALTER TABLE `timetables` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom`, `prenoms`, `contact_1`, `contact_2`, `email`, `password`, `school_id`, `revoked`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Dosso', 'Mory Souahlio', '09 52 54 61', NULL, 'mory.itduck@gmail.com', '$2y$10$wvcdWu3Q61mioY50XF.7SOpdSFk0JXt/7pfsrqAfQU1ls2wPOFaDC', NULL, 1, 'Wr2YNIcqhcodSonTTiGke5BBGPBgw7Gss9sRXgGBYNQpYDkt4lsoe8ROTkmf', '2018-07-31 03:13:27', '2018-07-31 05:33:09'),
	(2, 'Cissé', 'Ibrahim', '01 00 00 02', '02 00 00 02', 'ibrahim.cisse@example.com', '$2y$10$FoZ/x/q6ls4Wb4556kxfU.vtnOZnsQuTiQjhb5N6UoQxRmAqohoNK', NULL, 1, NULL, '2018-07-31 05:15:58', '2018-07-31 05:24:37'),
	(3, 'Doe', 'John', '01 00 00 03', NULL, 'john.doe0@example.com', '$2y$10$G7pyRe/ogZJ.KD29G5Wb0OSSxgdK3hKiCBc6zlt8rGk5xbw6iu/..', 1, 1, 'PZarVErPqxXYaviAAwRxiUWkPSN3JY2SAf6Y6YlQU23BFMO2w31tRSm6RJF0', '2018-07-31 07:17:50', '2018-07-31 07:17:50'),
	(4, 'Doe', 'Jane', '01 00 00 02', NULL, 'jane.doe@example.com', '$2y$10$/0yxliBPE3R3XYuvmhpkMujD6r3kg8t10PobbrSri68pRH04kW7.a', 2, 1, 'r3tQr2VqOArKeYsjUWPUr0kJzm6s5L8F3tEY9yg7LStXin56YpObBADoX3Ba', '2018-07-31 08:07:38', '2018-07-31 08:07:38'),
	(6, 'John', 'Doe', '21 21 21 21', NULL, 'john.doe@example.com', '$2y$10$tIM3dH10Gsb4kC5HLBN2.OHmDuvHQRcQEmiUCv85aUvnZnkr.40Be', 4, 1, 'Nd5U23ubRFm88sVdqNlzN2dCFo9GVYIyL5vOvFPHiKouiXczLThBcd0f7BEu', '2018-08-28 16:42:39', '2018-08-28 16:42:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `villes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` (`id`, `nom`, `pays_id`, `created_at`, `updated_at`) VALUES
	(1, 'Abidjan', 1, '2018-07-31 06:00:47', '2018-07-31 06:00:47'),
	(2, 'Bouaké', 1, '2018-07-31 06:00:47', '2018-07-31 06:00:47'),
	(3, 'Daloa', 1, '2018-07-31 06:00:47', '2018-07-31 06:00:47'),
	(4, 'Yamoussoukro', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(5, 'San-Pédro', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(6, 'Divo', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(7, 'Korhogo', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(8, 'Anyama', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(9, 'Abengourou', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(10, 'Man', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(11, 'Gagnoa', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(12, 'Soubré', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(13, 'Agboville', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(14, 'Dabou', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(15, 'Grand-Bassam', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(16, 'Bouaflé', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(17, 'Issia', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(18, 'Sinfra', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(19, 'Katiola', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(20, 'Bingerville', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(21, 'Adzopé', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(22, 'Séguéla', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(23, 'Bondoukou', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(24, 'Oumé', 1, '2018-07-31 06:00:48', '2018-07-31 06:00:48'),
	(25, 'Ferkessedougou', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(26, 'Dimbokro', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(27, 'Odienné', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(28, 'Duékoué', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(29, 'Danané', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(30, 'Tingréla', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(31, 'Guiglo', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(32, 'Boundiali', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(33, 'Agnibilékrou', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(34, 'Daoukro', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(35, 'Vavoua', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(36, 'Zuénoula', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(37, 'Tiassalé', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(38, 'Toumodi', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(39, 'Akoupé', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49'),
	(40, 'Lakota', 1, '2018-07-31 06:00:49', '2018-07-31 06:00:49');
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
