-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: sl-eu-lon-2-portal.12.dblayer.com    Database: my_eschool_2
-- ------------------------------------------------------
-- Server version	5.7.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED='591d9542-cd56-11e8-a616-be0913e6b91a:1-13,
6e3d912f-29d1-4e88-ba10-0028f68ca4fd:1-1597';

--
-- Table structure for table `academic_year_medical_information_student`
--

DROP TABLE IF EXISTS `academic_year_medical_information_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_year_medical_information_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academic_year_id` int(11) NOT NULL,
  `medical_information_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_year_medical_information_student`
--

LOCK TABLES `academic_year_medical_information_student` WRITE;
/*!40000 ALTER TABLE `academic_year_medical_information_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `academic_year_medical_information_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academic_years`
--

DROP TABLE IF EXISTS `academic_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_years`
--

LOCK TABLES `academic_years` WRITE;
/*!40000 ALTER TABLE `academic_years` DISABLE KEYS */;
INSERT INTO `academic_years` VALUES (1,'Année scolaire 2018 - 2019','2018-01-01 00:00:00','2019-01-01 00:00:00',1,1,'2018-08-20 10:58:42','2018-09-12 16:19:34'),(2,'Année 2','1970-01-01 00:00:00','1970-01-01 00:00:00',1,0,'2018-09-15 22:44:21','2018-09-15 22:44:28'),(11,'Année scolaire 2018 - 2019','2018-01-09 00:00:00','2019-01-01 00:00:00',4,1,'2018-10-11 15:04:47','2018-10-14 23:03:01');
/*!40000 ALTER TABLE `academic_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `allergy_medical_information`
--

DROP TABLE IF EXISTS `allergy_medical_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allergy_medical_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `allergy_id` int(11) NOT NULL,
  `medical_information_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergy_medical_information`
--

LOCK TABLES `allergy_medical_information` WRITE;
/*!40000 ALTER TABLE `allergy_medical_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `allergy_medical_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood_groups`
--

DROP TABLE IF EXISTS `blood_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blood_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_groups`
--

LOCK TABLES `blood_groups` WRITE;
/*!40000 ALTER TABLE `blood_groups` DISABLE KEYS */;
INSERT INTO `blood_groups` VALUES (1,'O +','2018-08-31 18:12:32','2018-08-31 18:12:37'),(2,'O -','2018-08-31 18:12:32','2018-08-31 18:12:37'),(3,'A +','2018-08-31 18:12:33','2018-08-31 18:12:36'),(4,'A -','2018-08-31 18:12:34','2018-08-31 18:12:35'),(5,'AB +','2018-08-31 18:12:51','2018-08-31 18:12:52'),(6,'AB -','2018-08-31 18:12:58','2018-08-31 18:12:59'),(7,'B +','2018-08-31 18:13:07','2018-08-31 18:13:08'),(8,'B -','2018-08-31 18:13:16','2018-08-31 18:13:17');
/*!40000 ALTER TABLE `blood_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_matieres`
--

DROP TABLE IF EXISTS `categorie_matieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_matieres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_categorie_matiere` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `ordre_categorie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_matieres`
--

LOCK TABLES `categorie_matieres` WRITE;
/*!40000 ALTER TABLE `categorie_matieres` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie_matieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `childhood_disease_medical_information`
--

DROP TABLE IF EXISTS `childhood_disease_medical_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `childhood_disease_medical_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `childhood_disease_id` int(11) NOT NULL,
  `medical_information_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `childhood_disease_medical_information`
--

LOCK TABLES `childhood_disease_medical_information` WRITE;
/*!40000 ALTER TABLE `childhood_disease_medical_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `childhood_disease_medical_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_student`
--

DROP TABLE IF EXISTS `class_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classe_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `academic_year_id` int(10) unsigned NOT NULL,
  `studylevel_id` int(10) unsigned NOT NULL,
  `previous_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_file` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_student`
--

LOCK TABLES `class_student` WRITE;
/*!40000 ALTER TABLE `class_student` DISABLE KEYS */;
INSERT INTO `class_student` VALUES (1,91,1,4,11,81,'cm2Habitat','N/A','2018-10-31 16:39:15','2018-10-31 16:39:15');
/*!40000 ALTER TABLE `class_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `study_level_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,'PRE K - Pré-Maternelle - Classe',1,1,'2018-08-27 13:57:58','2018-10-14 23:41:21'),(3,'K1 - Petite Section - Classe',2,1,'2018-08-27 15:12:14','2018-10-14 23:37:10'),(5,'K2 - Moyenne Section - Classe',3,1,'2018-08-27 15:12:50','2018-10-14 23:38:31'),(9,'CP - Year 1 - Classe',5,1,'2018-08-27 15:14:39','2018-10-14 23:36:03'),(11,'CE1 - Year 2 - Classe',6,1,'2018-08-27 15:15:13','2018-10-14 23:13:57'),(12,'CE2 - Year 3 - Classe',7,1,'2018-08-27 15:15:46','2018-10-14 23:14:55'),(15,'CM1 - Year 4 - Classe',8,1,'2018-08-27 15:19:09','2018-10-14 23:33:15'),(18,'CM2 - Year 5 - Classe',9,1,'2018-08-27 15:22:30','2018-10-14 23:34:24'),(21,'PRE K - Pré-Maternelle - Classe',11,4,'2018-10-11 20:45:43','2018-10-14 23:47:27'),(31,'K1 - Petite Section - Classe',21,4,'2018-10-11 20:46:15','2018-10-14 23:30:19'),(41,'K2 - Moyenne Section - Classe',31,4,'2018-10-11 20:46:46','2018-10-14 23:29:35'),(51,'CP - Year 1 - Classe',41,4,'2018-10-11 20:47:51','2018-10-14 23:31:07'),(61,'K3 - Grande Section - Classe',51,4,'2018-10-11 20:48:16','2018-10-14 23:46:38'),(71,'CE1 - Year 2 - Classe',61,4,'2018-10-11 22:14:02','2018-10-14 23:42:57'),(81,'CE2 - Year 3 - Classe',71,4,'2018-10-11 22:17:36','2018-10-14 23:43:46'),(91,'CM1 - Year 4 - Classe',81,4,'2018-10-11 22:18:34','2018-10-14 23:44:58'),(101,'CM2 - Year 5 - Classe',91,4,'2018-10-11 22:47:35','2018-10-14 23:45:53'),(121,'K3 - Grande Section - Classe',4,1,'2018-10-14 23:27:47','2018-10-14 23:42:13');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_subject`
--

DROP TABLE IF EXISTS `day_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_subject`
--

LOCK TABLES `day_subject` WRITE;
/*!40000 ALTER TABLE `day_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_timetable`
--

DROP TABLE IF EXISTS `day_timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_timetable` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_timetable`
--

LOCK TABLES `day_timetable` WRITE;
/*!40000 ALTER TABLE `day_timetable` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_timetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (1,'Lundi',NULL,NULL),(2,'Mardi',NULL,NULL),(3,'Mercredi',NULL,NULL),(4,'Jeudi',NULL,NULL),(5,'Vendredi',NULL,NULL),(6,'Samedi',NULL,NULL);
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `echeances`
--

DROP TABLE IF EXISTS `echeances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `echeances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `echeance_date` varchar(191) DEFAULT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `echeances`
--

LOCK TABLES `echeances` WRITE;
/*!40000 ALTER TABLE `echeances` DISABLE KEYS */;
/*!40000 ALTER TABLE `echeances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(255) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiants`
--

LOCK TABLES `etudiants` WRITE;
/*!40000 ALTER TABLE `etudiants` DISABLE KEYS */;
/*!40000 ALTER TABLE `etudiants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_configuration_student_bill`
--

DROP TABLE IF EXISTS `expense_configuration_student_bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_configuration_student_bill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `expense_configuration_id` int(11) unsigned NOT NULL,
  `student_bill_id` int(11) unsigned NOT NULL,
  `unitaire` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `remise` double NOT NULL,
  `montant_attendu` double NOT NULL,
  `montant_paye` double NOT NULL,
  `montant_restant` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_configuration_student_bill`
--

LOCK TABLES `expense_configuration_student_bill` WRITE;
/*!40000 ALTER TABLE `expense_configuration_student_bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_configuration_student_bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_configurations`
--

DROP TABLE IF EXISTS `expense_configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_configurations` (
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
) ENGINE=InnoDB AUTO_INCREMENT=1222 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_configurations`
--

LOCK TABLES `expense_configurations` WRITE;
/*!40000 ALTER TABLE `expense_configurations` DISABLE KEYS */;
INSERT INTO `expense_configurations` VALUES (13,1,1,7,1,120000,'2012-01-01',1,'2018-09-11 13:34:20','2018-09-11 13:34:20'),(14,1,1,1,1,120000,'2018-09-17',1,'2018-09-11 14:42:24','2018-09-17 05:35:09'),(15,1,1,1,4,250000,'2018-10-01',1,'2018-09-11 16:26:02','2018-09-17 05:35:41'),(17,1,1,9,1,123000,'2018-09-12',1,'2018-09-11 18:09:32','2018-09-11 18:09:32'),(18,1,1,1,2,450000,'2019-01-01',1,'2018-09-17 05:29:52','2018-09-17 05:35:55'),(19,1,1,1,3,350000,'2019-04-01',1,'2018-09-17 05:30:32','2018-09-17 05:36:09'),(21,1,1,5,11,20000,'2018-10-01',0,'2018-09-17 16:45:38','2018-09-17 16:45:38'),(31,1,1,1,31,300000,'2019-06-30',0,'2018-10-16 14:12:14','2018-10-16 14:12:14'),(41,1,1,1,41,150000,'2019-06-30',0,'2018-10-16 14:13:35','2018-10-16 14:13:35'),(51,1,1,1,51,50000,'2019-06-30',0,'2018-10-16 14:14:26','2018-10-16 14:14:26'),(61,1,1,1,61,10000,'2019-06-30',0,'2018-10-16 14:15:26','2018-10-16 14:15:26'),(71,1,1,1,11,350000,'2009-06-30',0,'2018-10-16 14:17:12','2018-10-16 14:17:12'),(81,1,1,2,1,120000,'2019-06-30',0,'2018-10-16 14:19:39','2018-10-16 14:19:39'),(91,1,1,2,4,250000,'2019-06-30',0,'2018-10-16 14:20:33','2018-10-16 14:20:33'),(101,1,1,2,2,450000,'2019-06-30',0,'2018-10-16 14:21:20','2018-10-16 14:21:20'),(111,1,1,2,3,350000,'2019-06-30',0,'2018-10-16 14:22:05','2018-10-16 14:22:05'),(121,1,1,2,31,300000,'2019-06-30',0,'2018-10-16 14:23:17','2018-10-16 14:23:17'),(131,1,1,2,11,350000,'2019-06-30',0,'2018-10-16 14:24:50','2018-10-16 14:24:50'),(141,1,1,2,41,150000,'2019-06-30',0,'2018-10-16 14:26:05','2018-10-16 14:26:05'),(151,1,1,2,51,50000,'2019-06-30',0,'2018-10-16 14:27:02','2018-10-16 14:27:02'),(161,1,1,2,61,10000,'2019-06-30',0,'2018-10-16 14:27:59','2018-10-16 14:27:59'),(171,1,1,3,1,120000,'2019-06-30',0,'2018-10-16 14:29:17','2018-10-16 14:29:17'),(181,1,1,3,4,250000,'2019-06-30',0,'2018-10-16 14:30:10','2018-10-16 14:30:10'),(191,1,1,3,2,450000,'2019-06-30',0,'2018-10-16 14:31:57','2018-10-16 14:31:57'),(201,1,1,3,3,350000,'2019-06-30',0,'2018-10-16 14:33:46','2018-10-16 14:33:46'),(211,1,1,3,31,300000,'2019-06-30',0,'2018-10-16 14:34:51','2018-10-16 14:34:51'),(221,1,1,3,11,350000,'2019-06-30',0,'2018-10-16 14:35:57','2018-10-16 14:35:57'),(231,1,1,3,41,150000,'2019-06-30',0,'2018-10-16 14:37:10','2018-10-16 14:37:10'),(241,1,1,3,51,50000,'2019-06-30',0,'2018-10-16 14:38:13','2018-10-16 14:38:13'),(251,1,1,3,61,10000,'2019-06-30',0,'2018-10-16 14:40:15','2018-10-16 14:40:15'),(271,1,1,4,1,120000,'2019-06-30',0,'2018-10-16 14:46:55','2018-10-16 14:46:55'),(281,1,1,4,4,250000,'2019-06-30',0,'2018-10-16 14:48:20','2018-10-16 14:48:20'),(291,1,1,4,2,450000,'2019-06-30',0,'2018-10-16 14:49:32','2018-10-16 14:49:32'),(301,1,1,4,3,350000,'2019-06-30',0,'2018-10-16 14:51:57','2018-10-16 14:51:57'),(311,1,1,4,31,300000,'2019-06-30',0,'2018-10-16 14:53:25','2018-10-16 14:53:25'),(321,1,1,4,11,350000,'2019-06-30',0,'2018-10-16 14:56:38','2018-10-16 14:56:38'),(331,1,1,4,41,150000,'2019-06-30',0,'2018-10-16 14:57:58','2018-10-16 14:57:58'),(341,1,1,4,51,50000,'2019-06-30',0,'2018-10-16 14:59:12','2018-10-16 14:59:12'),(351,1,1,4,61,10000,'2019-06-30',0,'2018-10-16 15:01:29','2018-10-16 15:01:29'),(361,4,11,11,91,120000,'2019-06-30',1,'2018-10-16 15:03:48','2018-10-17 10:50:33'),(371,4,11,11,141,250000,'2019-06-30',1,'2018-10-16 15:05:16','2018-10-17 10:51:28'),(381,4,11,11,151,450000,'2019-06-30',1,'2018-10-16 15:06:41','2018-10-17 10:52:25'),(391,4,11,11,161,350000,'2019-06-30',1,'2018-10-16 15:14:57','2018-10-17 10:53:10'),(401,4,11,11,181,300000,'2019-06-30',0,'2018-10-16 15:16:13','2018-10-16 15:16:13'),(411,4,11,11,111,350000,'2019-06-30',0,'2018-10-16 15:17:38','2018-10-16 15:17:38'),(421,4,11,11,101,10000,'2019-06-30',0,'2018-10-16 15:20:37','2018-10-16 15:20:37'),(431,4,11,11,131,150000,'2019-06-30',1,'2018-10-16 15:23:08','2018-10-17 10:54:09'),(441,4,11,21,91,120000,'2019-06-30',1,'2018-10-16 15:32:17','2018-10-17 11:02:27'),(461,4,11,21,141,250000,'2019-06-30',1,'2018-10-16 16:14:20','2018-10-17 11:04:42'),(471,4,11,21,151,450000,'2019-06-30',1,'2018-10-16 16:23:03','2018-10-17 11:06:19'),(481,4,11,21,161,350000,'2019-06-30',0,'2018-10-16 16:26:24','2018-10-16 16:26:24'),(491,4,11,21,181,300000,'2019-06-30',0,'2018-10-16 16:37:46','2018-10-16 16:37:46'),(501,4,11,11,191,50000,'2019-06-30',0,'2018-10-16 20:46:05','2018-10-16 20:46:05'),(511,4,11,21,111,350000,'2019-06-30',0,'2018-10-16 20:49:16','2018-10-16 20:49:16'),(521,4,11,21,131,150000,'2009-06-30',0,'2018-10-16 20:50:54','2018-10-16 20:50:54'),(531,4,11,21,191,50000,'2019-06-30',0,'2018-10-16 20:52:36','2018-10-16 20:52:36'),(541,4,11,21,101,10000,'2019-06-30',0,'2018-10-16 20:54:07','2018-10-16 20:54:07'),(551,4,11,31,91,120000,'2019-06-30',0,'2018-10-16 20:55:46','2018-10-16 20:55:46'),(561,4,11,31,141,250000,'2019-06-30',0,'2018-10-16 20:57:22','2018-10-16 20:57:22'),(571,4,11,31,151,450000,'2019-06-30',1,'2018-10-16 20:58:53','2018-10-17 11:15:38'),(581,4,11,31,161,350000,'2019-06-30',0,'2018-10-16 21:02:44','2018-10-16 21:02:44'),(591,4,11,31,181,300000,'2019-06-30',0,'2018-10-16 21:07:55','2018-10-16 21:07:55'),(611,4,11,31,111,350000,'2019-06-30',0,'2018-10-16 21:12:07','2018-10-16 21:12:07'),(621,4,11,31,131,150000,'2019-06-30',0,'2018-10-16 21:14:15','2018-10-16 21:14:15'),(631,4,11,31,191,50000,'2019-06-30',0,'2018-10-16 21:15:52','2018-10-16 21:15:52'),(641,4,11,31,101,10000,'2019-06-30',0,'2018-10-16 21:17:30','2018-10-16 21:17:30'),(651,4,11,51,91,120000,'2019-06-30',0,'2018-10-16 21:21:43','2018-10-16 21:21:43'),(661,4,11,51,141,250000,'2019-06-30',0,'2018-10-16 21:46:28','2018-10-16 21:46:28'),(671,4,11,21,111,350000,'2019-06-30',1,'2018-10-17 10:47:20','2018-10-17 10:47:20'),(681,4,11,21,131,150000,'2019-06-30',1,'2018-10-17 11:23:47','2018-10-17 11:23:47'),(691,4,11,21,191,50000,'2019-06-30',0,'2018-10-17 11:28:41','2018-10-17 11:28:41'),(701,4,11,21,101,10000,'2019-06-30',0,'2018-10-17 11:32:11','2018-10-17 11:32:11'),(711,4,11,31,91,120000,'2019-06-30',1,'2018-10-17 11:34:29','2018-10-17 11:34:29'),(721,4,11,31,141,250000,'2019-06-30',1,'2018-10-17 11:36:27','2018-10-17 11:36:27'),(731,4,11,31,151,450000,'2019-06-30',1,'2018-10-17 11:39:00','2018-10-17 11:39:00'),(741,4,11,31,161,350000,'2019-06-30',1,'2018-10-17 11:40:29','2018-10-17 11:40:29'),(751,4,11,31,181,300000,'2019-06-30',1,'2018-10-17 11:42:20','2018-10-17 11:42:20'),(761,4,11,31,111,350000,'2019-06-30',0,'2018-10-17 11:45:46','2018-10-17 11:45:46'),(771,4,11,31,131,150000,'2019-06-30',1,'2018-10-17 11:52:34','2018-10-17 11:52:34'),(781,4,11,31,191,50000,'2019-06-30',1,'2018-10-17 11:54:29','2018-10-17 11:54:29'),(791,4,11,31,101,10000,'2019-06-30',0,'2018-10-17 11:56:21','2018-10-17 11:56:21'),(801,4,11,51,91,120000,'2019-06-30',1,'2018-10-17 11:59:34','2018-10-17 11:59:34'),(811,4,11,51,141,250000,'2019-06-30',1,'2018-10-17 12:01:33','2018-10-17 12:01:33'),(821,4,11,51,151,450000,'2019-06-30',1,'2018-10-17 12:03:50','2018-10-17 12:03:50'),(831,4,11,51,161,350000,'2019-06-30',1,'2018-10-17 12:29:24','2018-10-17 12:29:24'),(841,4,11,51,161,350000,'2019-06-30',1,'2018-10-17 12:42:11','2018-10-17 12:42:11'),(851,4,11,51,181,300000,'2019-06-30',0,'2018-10-17 12:44:03','2018-10-17 12:44:03'),(861,4,11,51,111,350000,'2019-06-30',0,'2018-10-17 12:55:09','2018-10-17 12:55:09'),(871,4,11,51,131,150000,'2019-06-30',1,'2018-10-17 12:59:13','2018-10-17 12:59:13'),(881,4,11,51,191,50000,'2019-06-30',1,'2018-10-17 13:01:40','2018-10-17 13:01:40'),(891,4,11,51,101,10000,'2019-06-30',0,'2018-10-17 13:45:26','2018-10-17 13:45:26'),(901,4,11,41,91,120000,'2019-06-30',1,'2018-10-17 14:23:10','2018-10-17 14:23:10'),(911,4,11,41,141,350000,'2019-06-30',1,'2018-10-17 14:26:09','2018-10-17 14:26:09'),(921,4,11,41,151,500000,'2019-06-30',1,'2018-10-17 14:28:20','2018-10-17 14:28:20'),(931,4,11,41,161,400000,'2019-06-30',1,'2018-10-17 14:30:27','2018-10-17 14:30:27'),(941,4,11,41,181,300000,'2019-06-30',0,'2018-10-17 14:34:58','2018-10-17 14:34:58'),(951,4,11,41,111,350000,'2019-06-30',0,'2018-10-17 14:42:37','2018-10-17 14:42:37'),(961,4,11,41,131,185000,'2019-06-30',1,'2018-10-17 14:44:50','2018-10-17 14:44:50'),(971,4,11,41,191,50000,'2019-06-30',1,'2018-10-17 14:50:51','2018-10-17 14:50:51'),(981,4,11,41,101,10000,'2019-06-30',0,'2018-10-17 14:53:12','2018-10-17 14:53:12'),(991,4,11,61,91,120000,'2019-06-30',1,'2018-10-17 15:03:38','2018-10-17 15:03:38'),(1001,4,11,61,141,350000,'2019-06-30',1,'2018-10-17 15:07:46','2018-10-17 15:07:46'),(1011,4,11,61,151,500000,'2019-06-30',1,'2018-10-17 15:33:28','2018-10-17 15:33:28'),(1021,4,11,61,161,400000,'2019-06-30',1,'2018-10-17 15:35:45','2018-10-17 15:35:45'),(1031,4,11,61,181,300000,'2019-06-30',0,'2018-10-17 15:40:29','2018-10-17 15:40:29'),(1041,4,11,61,111,350000,'2019-06-30',0,'2018-10-17 15:53:52','2018-10-17 15:53:52'),(1061,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 15:59:42','2018-10-17 15:59:42'),(1071,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:04:54','2018-10-17 16:04:54'),(1081,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:10:14','2018-10-17 16:10:14'),(1091,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:14:32','2018-10-17 16:14:32'),(1101,1,1,1,51,100000,'2018-12-13',1,'2018-10-17 16:18:56','2018-10-17 16:18:56'),(1111,4,11,61,131,185000,'2019-06-30',0,'2018-10-17 16:21:22','2018-10-17 16:21:22'),(1121,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:21:29','2018-10-17 16:21:29'),(1131,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:21:31','2018-10-17 16:21:31'),(1141,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:21:32','2018-10-17 16:21:32'),(1151,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:21:32','2018-10-17 16:21:32'),(1161,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:26:38','2018-10-17 16:26:38'),(1171,4,11,61,131,185000,'2019-06-30',0,'2018-10-17 16:30:33','2018-10-17 16:30:33'),(1181,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:31:32','2018-10-17 16:31:32'),(1191,4,11,61,131,185000,'2019-06-30',1,'2018-10-17 16:40:35','2018-10-17 16:40:35'),(1201,1,1,1,71,1200,'2018-03-04',1,'2018-10-17 16:47:56','2018-10-17 16:47:56'),(1211,1,1,1,71,12000,'2018-02-11',1,'2018-10-17 18:01:00','2018-10-17 18:01:00'),(1221,4,11,61,131,185000,'2019-06-30',1,'2018-10-18 14:48:49','2018-10-18 14:48:49');
/*!40000 ALTER TABLE `expense_configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `school_id` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'Frais d\'inscription (Registraton Fees)',1,NULL,'2018-09-04 19:16:51','2018-10-15 21:55:13'),(2,'Scolarité Annuelle (Annual School Fee) - 2e versement',1,NULL,'2018-09-04 19:22:15','2018-10-15 21:56:57'),(3,'Scolarité Annuelle (Annual School Fee) - 3e versement',1,NULL,'2018-09-04 19:56:29','2018-10-15 21:56:29'),(4,'Scolarité Annuelle (Annual School Fee) - 1er versement',1,NULL,'2018-09-04 19:57:20','2018-10-15 21:56:09'),(11,'Cantine',1,NULL,'2018-09-17 16:40:50','2018-09-17 16:40:50'),(31,'Transport (School Bus)',1,NULL,'2018-10-15 21:52:59','2018-10-15 21:52:59'),(41,'Matériel Scolaire (School Supply)',1,NULL,'2018-10-15 21:53:33','2018-10-15 21:53:33'),(51,'Uniforme',1,NULL,'2018-10-15 21:53:57','2018-10-15 21:53:57'),(61,'Blouse & Tablier (Apron & Gown & Science & Art)',1,NULL,'2018-10-15 21:54:25','2018-10-15 21:54:25'),(71,'Divers',1,NULL,'2018-10-15 21:54:44','2018-10-15 21:54:44'),(81,'Scolarité Annuelle (Annual School Fee) - 4e versement',1,NULL,'2018-10-15 21:57:26','2018-10-15 21:57:26'),(91,'Frais d\'inscription (Registraton Fees)',4,NULL,'2018-10-15 21:58:43','2018-10-15 21:59:05'),(101,'Blouse & Tablier (Apron & Gown & Science & Art)',4,NULL,'2018-10-15 21:59:30','2018-10-15 21:59:30'),(111,'Cantine',4,NULL,'2018-10-15 21:59:56','2018-10-15 21:59:56'),(121,'Divers',4,NULL,'2018-10-15 22:00:25','2018-10-15 22:00:25'),(131,'Matériel Scolaire (School Supply)',4,NULL,'2018-10-15 22:00:54','2018-10-15 22:00:54'),(141,'Scolarité Annuelle (Annual School Fee) - 1er versement',4,NULL,'2018-10-15 22:01:31','2018-10-15 22:01:31'),(151,'Scolarité Annuelle (Annual School Fee) - 2e versement',4,NULL,'2018-10-15 22:02:08','2018-10-15 22:02:08'),(161,'Scolarité Annuelle (Annual School Fee) - 3e versement',4,NULL,'2018-10-15 22:02:36','2018-10-15 22:02:36'),(171,'Scolarité Annuelle (Annual School Fee) - 4e versement',4,NULL,'2018-10-15 22:03:14','2018-10-15 22:03:14'),(181,'Transport (School Bus)',4,NULL,'2018-10-15 22:03:42','2018-10-15 22:03:42'),(191,'Uniforme',4,NULL,'2018-10-15 22:04:18','2018-10-15 22:04:18'),(201,'Blouse & Tablier (Apron & Gown & Science & Art)',11,NULL,'2018-10-15 22:05:32','2018-10-15 22:05:32'),(211,'Cantine',11,NULL,'2018-10-15 22:05:57','2018-10-15 22:05:57'),(221,'Divers',11,NULL,'2018-10-15 22:06:23','2018-10-15 22:06:23'),(231,'Frais d\'inscription (Registraton Fees)',11,NULL,'2018-10-15 22:06:51','2018-10-15 22:06:51'),(241,'Matériel Scolaire (School Supply)',11,NULL,'2018-10-15 22:07:35','2018-10-15 22:07:35'),(251,'Scolarité Annuelle (Annual School Fee) - 1er versement',11,NULL,'2018-10-15 22:08:07','2018-10-15 22:08:07'),(261,'Scolarité Annuelle (Annual School Fee) - 2e versement',11,NULL,'2018-10-15 22:08:38','2018-10-15 22:08:38'),(271,'Scolarité Annuelle (Annual School Fee) - 4e versement',11,NULL,'2018-10-15 22:09:13','2018-10-15 22:09:13'),(281,'Transport (School Bus)',11,NULL,'2018-10-15 22:09:45','2018-10-15 22:09:45'),(291,'Uniforme',11,NULL,'2018-10-15 22:10:20','2018-10-15 22:10:20');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frais`
--

DROP TABLE IF EXISTS `frais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frais`
--

LOCK TABLES `frais` WRITE;
/*!40000 ALTER TABLE `frais` DISABLE KEYS */;
/*!40000 ALTER TABLE `frais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frais_configs`
--

DROP TABLE IF EXISTS `frais_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frais_configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `annee_id` int(10) unsigned NOT NULL,
  `frais_id` int(10) unsigned NOT NULL,
  `classe_id` int(10) unsigned NOT NULL,
  `echeance_id` int(10) unsigned NOT NULL,
  `montant` double unsigned NOT NULL,
  `frais_obligatoire` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frais_configs`
--

LOCK TABLES `frais_configs` WRITE;
/*!40000 ALTER TABLE `frais_configs` DISABLE KEYS */;
/*!40000 ALTER TABLE `frais_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guardian_student`
--

DROP TABLE IF EXISTS `guardian_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guardian_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guardian_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guardian_student`
--

LOCK TABLES `guardian_student` WRITE;
/*!40000 ALTER TABLE `guardian_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `guardian_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guardian_types`
--

DROP TABLE IF EXISTS `guardian_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guardian_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guardian_types`
--

LOCK TABLES `guardian_types` WRITE;
/*!40000 ALTER TABLE `guardian_types` DISABLE KEYS */;
INSERT INTO `guardian_types` VALUES (1,'father','PERE / FATHER','2018-08-31 01:49:29','2018-08-31 01:49:30'),(2,'mother','MERE / MOTHER','2018-08-31 01:49:49','2018-08-31 01:49:50'),(3,'guardian','TUTEUR / GUARDIAN','2018-08-31 01:50:15','2018-08-31 01:50:16');
/*!40000 ALTER TABLE `guardian_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guardians`
--

DROP TABLE IF EXISTS `guardians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guardians` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guardian_type_id` int(11) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `given_names` varchar(191) NOT NULL,
  `career` varchar(191) NOT NULL,
  `employer` varchar(191) NOT NULL,
  `mailing_address` varchar(191) NOT NULL,
  `tel_work` varchar(191) NOT NULL,
  `tel_home` varchar(191) NOT NULL,
  `cell` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guardians_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guardians`
--

LOCK TABLES `guardians` WRITE;
/*!40000 ALTER TABLE `guardians` DISABLE KEYS */;
/*!40000 ALTER TABLE `guardians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `study_level_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `academic_file` varchar(191) NOT NULL,
  `previous_school` varchar(191) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ltm_translations`
--

DROP TABLE IF EXISTS `ltm_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ltm_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `key` text NOT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ltm_translations`
--

LOCK TABLES `ltm_translations` WRITE;
/*!40000 ALTER TABLE `ltm_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ltm_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matiere_professeur`
--

DROP TABLE IF EXISTS `matiere_professeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matiere_professeur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matiere_id` int(11) NOT NULL,
  `professeur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matiere_professeur`
--

LOCK TABLES `matiere_professeur` WRITE;
/*!40000 ALTER TABLE `matiere_professeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `matiere_professeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matieres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_matiere` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `categorie_matiere_id` int(11) NOT NULL,
  `categorie_classe_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matieres`
--

LOCK TABLES `matieres` WRITE;
/*!40000 ALTER TABLE `matieres` DISABLE KEYS */;
/*!40000 ALTER TABLE `matieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_history_information`
--

DROP TABLE IF EXISTS `medical_history_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_history_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `medical_history_id` int(11) NOT NULL,
  `medical_information_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_history_information`
--

LOCK TABLES `medical_history_information` WRITE;
/*!40000 ALTER TABLE `medical_history_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `medical_history_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_informations`
--

DROP TABLE IF EXISTS `medical_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bloodgroup_id` varchar(191) NOT NULL,
  `emergency_clinic` varchar(191) NOT NULL,
  `family_doctor` varchar(191) NOT NULL,
  `family_doctor_tel` varchar(191) NOT NULL,
  `medical_history` longtext,
  `allergies` longtext,
  `childhood_diseases` longtext,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_informations`
--

LOCK TABLES `medical_informations` WRITE;
/*!40000 ALTER TABLE `medical_informations` DISABLE KEYS */;
INSERT INTO `medical_informations` VALUES (4,'1','BLUE MARINE','DR KONAN','01 05 35 54',NULL,NULL,NULL,8,'2018-10-21 18:15:25','2018-10-21 18:15:25'),(5,'2','BLUE MARINE','Dr Joel','02 02 00 30','-test\r\n-test 2','N/A','N/A',1,'2018-10-22 18:37:08','2018-10-22 18:37:08'),(6,'1','Clinique','kouassi','22 22 22 22','non','pollen','rougeole',3,'2018-10-25 10:04:02','2018-10-25 10:04:02'),(7,'5','SAINT VIATEUR','AHMED COULIBALY','09 12 38 45','ASTHME','POUSSIERE','NA',4,'2018-10-25 10:11:21','2018-10-25 10:11:21');
/*!40000 ALTER TABLE `medical_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_07_31_021854_create_permission_tables',1),(4,'2014_04_02_193005_create_translations_table',2),(5,'2018_07_31_053528_create_schools_table',3),(6,'2018_07_31_054902_create_pays_table',3),(7,'2018_07_31_055001_create_villes_table',3),(8,'2018_08_15_194708_create_annees_table',4),(9,'2018_08_20_111013_create_niveaux_d_etudes_tables',5),(10,'2018_08_20_125614_create_classes_table',6),(16,'2018_08_30_161601_create_allegies_table',7),(17,'2018_08_30_161706_create_medical_histories_table',7),(18,'2018_08_30_161929_create_childhood_diseases_table',7),(19,'2018_08_30_205403_create_students_table',8),(20,'2018_08_31_010324_create_inscriptions_table',9),(21,'2018_08_31_010712_create_guardian_types_table',9),(22,'2018_08_31_010814_create_guardians_table',9),(24,'2018_08_31_181051_create_bloodgroups_table',10),(28,'2018_09_02_200841_create_medical_informations_table',12),(31,'2018_09_03_111434_create_subjects_table',14),(32,'2018_09_03_120111_create_professors_table',15),(36,'2018_09_03_135614_create_days_table',19),(37,'2018_09_04_035143_create_sessions_table',19),(41,'2018_09_04_035904_create_timetables_table',20),(42,'2018_09_04_152801_create_professor_subject_timetable_table',21),(45,'2018_09_04_185837_create_expenses_table',24),(46,'2018_09_04_192500_create_expense_configurations_table',25),(48,'2018_09_05_003317_create_student_bills_table',27),(49,'2018_09_06_113536_create_echeances_table',27),(50,'2018_09_10_153817_create_payments_table',28),(51,'2018_08_27_153939_create_matieres_table',29),(52,'2018_08_27_154436_create_categorie_matieres_table',29),(53,'2018_08_27_162803_create_professeur_matieres_table',29),(54,'2018_08_28_081500_create_matiere_professeur_table',29),(55,'2018_08_29_164056_create_frais_table',29),(56,'2018_08_29_181345_create_frais_configs_table',29),(57,'2018_08_30_182025_create_factures_table',30),(58,'2018_08_31_143608_create_termes_table',31),(59,'2018_08_31_143931_create_etudiants_table',31),(60,'2018_09_14_144224_create_facture_payment_table',31),(61,'2018_09_15_225808_create_expense_config_student_bill_table',31),(63,'2018_09_17_021559_create_payment_types_table',32),(64,'2018_08_31_011008_create_guardian_student_table',33),(65,'2018_08_31_184154_create_medical_history_student_table',33),(66,'2018_08_31_184403_create_allergy_student_table',33),(67,'2018_08_31_184449_create_childhood_disease_student_table',33),(68,'2018_09_02_201413_create_medical_information_student',33),(69,'2018_09_03_081200_create_subject_categories_table',33),(70,'2018_09_03_124432_create_professor_subject_table',33),(71,'2018_09_04_162659_create_day_timetable_table',33),(72,'2018_09_04_173538_create_day_subject_table',33),(73,'2018_09_04_221245_create_class_student_table',33);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(3,'App\\Models\\User',4),(3,'App\\Models\\User',6),(3,'App\\Models\\User',11),(1,'App\\Models\\User',21),(3,'App\\Models\\User',41),(3,'App\\Models\\User',51),(3,'App\\Models\\User',61),(3,'App\\Models\\User',71),(3,'App\\Models\\User',81),(3,'App\\Models\\User',91),(3,'App\\Models\\User',101),(3,'App\\Models\\User',111),(3,'App\\Models\\User',121),(3,'App\\Models\\User',131),(3,'App\\Models\\User',141),(1,'App\\Models\\User',151),(3,'App\\Models\\User',152),(3,'App\\Models\\User',153),(3,'App\\Models\\User',154);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_types`
--

DROP TABLE IF EXISTS `payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_types`
--

LOCK TABLES `payment_types` WRITE;
/*!40000 ALTER TABLE `payment_types` DISABLE KEYS */;
INSERT INTO `payment_types` VALUES (1,'espece','Espèce','2018-09-17 02:19:25','2018-09-17 02:19:26'),(2,'cheque','Chèque','2018-09-17 02:19:37','2018-09-17 02:19:37'),(3,'virement','Virement','2018-09-17 02:19:48','2018-09-17 02:19:48');
/*!40000 ALTER TABLE `payment_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL DEFAULT '0',
  `montant_recu` double NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_type_num` varchar(191) DEFAULT NULL,
  `student_bill_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (31,1,150000,1,NULL,32,'2018-10-25 10:53:53','2018-10-25 10:53:53'),(32,1,250000,2,NULL,31,'2018-10-25 10:55:08','2018-10-25 10:55:08');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `code_iso` varchar(191) NOT NULL,
  `indicatif` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (1,'Côte d\'ivoire','CIV','+225','2018-07-31 06:00:47','2018-07-31 06:00:47'),(2,'Côte d\'ivoire','CIV','+225','2018-10-21 14:53:11','2018-10-21 14:53:11');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view_users',NULL,'web','2018-07-31 03:13:25','2018-07-31 03:13:25'),(2,'add_users',NULL,'web','2018-07-31 03:13:25','2018-07-31 03:13:25'),(3,'edit_users',NULL,'web','2018-07-31 03:13:26','2018-07-31 03:13:26'),(4,'delete_users',NULL,'web','2018-07-31 03:13:26','2018-07-31 03:13:26'),(5,'view_roles',NULL,'web','2018-07-31 03:13:26','2018-07-31 03:13:26'),(6,'add_roles',NULL,'web','2018-07-31 03:13:26','2018-07-31 03:13:26'),(7,'edit_roles',NULL,'web','2018-07-31 03:13:26','2018-07-31 03:13:26'),(8,'delete_roles',NULL,'web','2018-07-31 03:13:26','2018-07-31 03:13:26'),(9,'view_schools',NULL,'web','2018-07-31 06:29:51','2018-07-31 06:29:51'),(10,'add_schools',NULL,'web','2018-07-31 06:29:51','2018-07-31 06:29:51'),(11,'edit_schools',NULL,'web','2018-07-31 06:29:51','2018-07-31 06:29:51'),(12,'delete_schools',NULL,'web','2018-07-31 06:29:51','2018-07-31 06:29:51'),(13,'view_annees',NULL,'web','2018-08-20 10:54:18','2018-08-20 10:54:18'),(14,'add_annees',NULL,'web','2018-08-20 10:54:18','2018-08-20 10:54:18'),(15,'edit_annees',NULL,'web','2018-08-20 10:54:18','2018-08-20 10:54:18'),(16,'delete_annees',NULL,'web','2018-08-20 10:54:19','2018-08-20 10:54:19'),(21,'view_niveaux',NULL,'web','2018-08-20 11:23:41','2018-08-20 11:23:41'),(22,'add_niveaux',NULL,'web','2018-08-20 11:23:42','2018-08-20 11:23:42'),(23,'edit_niveaux',NULL,'web','2018-08-20 11:23:42','2018-08-20 11:23:42'),(24,'delete_niveaux',NULL,'web','2018-08-20 11:23:42','2018-08-20 11:23:42'),(25,'view_classes',NULL,'web','2018-08-20 13:21:14','2018-08-20 13:21:14'),(26,'add_classes',NULL,'web','2018-08-20 13:21:14','2018-08-20 13:21:14'),(27,'edit_classes',NULL,'web','2018-08-20 13:21:14','2018-08-20 13:21:14'),(28,'delete_classes',NULL,'web','2018-08-20 13:21:14','2018-08-20 13:21:14'),(29,'view_students',NULL,'web','2018-08-28 18:55:35','2018-08-28 18:55:35'),(30,'add_students',NULL,'web','2018-08-28 18:55:35','2018-08-28 18:55:35'),(31,'edit_students',NULL,'web','2018-08-28 18:55:35','2018-08-28 18:55:35'),(32,'delete_students',NULL,'web','2018-08-28 18:55:35','2018-08-28 18:55:35'),(33,'view_allergies',NULL,'web','2018-08-30 17:30:32','2018-08-30 17:30:32'),(34,'add_allergies',NULL,'web','2018-08-30 17:30:32','2018-08-30 17:30:32'),(35,'edit_allergies',NULL,'web','2018-08-30 17:30:32','2018-08-30 17:30:32'),(36,'delete_allergies',NULL,'web','2018-08-30 17:30:32','2018-08-30 17:30:32'),(37,'view_medicalhistories',NULL,'web','2018-08-30 18:37:29','2018-08-30 18:37:29'),(38,'add_medicalhistories',NULL,'web','2018-08-30 18:37:29','2018-08-30 18:37:29'),(39,'edit_medicalhistories',NULL,'web','2018-08-30 18:37:29','2018-08-30 18:37:29'),(40,'delete_medicalhistories',NULL,'web','2018-08-30 18:37:29','2018-08-30 18:37:29'),(41,'view_childhooddiseases',NULL,'web','2018-08-30 20:40:55','2018-08-30 20:40:55'),(42,'add_childhooddiseases',NULL,'web','2018-08-30 20:40:55','2018-08-30 20:40:55'),(43,'edit_childhooddiseases',NULL,'web','2018-08-30 20:40:55','2018-08-30 20:40:55'),(44,'delete_childhooddiseases',NULL,'web','2018-08-30 20:40:55','2018-08-30 20:40:55'),(45,'view_inscriptions',NULL,'web','2018-08-31 01:17:10','2018-08-31 01:17:10'),(46,'add_inscriptions',NULL,'web','2018-08-31 01:17:10','2018-08-31 01:17:10'),(47,'edit_inscriptions',NULL,'web','2018-08-31 01:17:10','2018-08-31 01:17:10'),(48,'delete_inscriptions',NULL,'web','2018-08-31 01:17:10','2018-08-31 01:17:10'),(49,'view_guardians',NULL,'web','2018-09-03 01:21:51','2018-09-03 01:21:51'),(50,'add_guardians',NULL,'web','2018-09-03 01:21:52','2018-09-03 01:21:52'),(51,'edit_guardians',NULL,'web','2018-09-03 01:21:52','2018-09-03 01:21:52'),(52,'delete_guardians',NULL,'web','2018-09-03 01:21:52','2018-09-03 01:21:52'),(53,'view_academic_years',NULL,'web','2018-09-03 04:47:18','2018-09-03 04:47:18'),(54,'add_academic_years',NULL,'web','2018-09-03 04:47:18','2018-09-03 04:47:18'),(55,'edit_academic_years',NULL,'web','2018-09-03 04:47:18','2018-09-03 04:47:18'),(56,'delete_academic_years',NULL,'web','2018-09-03 04:47:18','2018-09-03 04:47:18'),(57,'view_academicyears',NULL,'web','2018-09-03 04:49:27','2018-09-03 04:49:27'),(58,'add_academicyears',NULL,'web','2018-09-03 04:49:27','2018-09-03 04:49:27'),(59,'edit_academicyears',NULL,'web','2018-09-03 04:49:27','2018-09-03 04:49:27'),(60,'delete_academicyears',NULL,'web','2018-09-03 04:49:27','2018-09-03 04:49:27'),(61,'view_studylevels',NULL,'web','2018-09-03 05:53:21','2018-09-03 05:53:21'),(62,'add_studylevels',NULL,'web','2018-09-03 05:53:21','2018-09-03 05:53:21'),(63,'edit_studylevels',NULL,'web','2018-09-03 05:53:22','2018-09-03 05:53:22'),(64,'delete_studylevels',NULL,'web','2018-09-03 05:53:22','2018-09-03 05:53:22'),(65,'view_subjectcategories',NULL,'web','2018-09-03 09:34:53','2018-09-03 09:34:53'),(66,'add_subjectcategories',NULL,'web','2018-09-03 09:34:53','2018-09-03 09:34:53'),(67,'edit_subjectcategories',NULL,'web','2018-09-03 09:34:53','2018-09-03 09:34:53'),(68,'delete_subjectcategories',NULL,'web','2018-09-03 09:34:53','2018-09-03 09:34:53'),(69,'view_subjects',NULL,'web','2018-09-03 11:25:52','2018-09-03 11:25:52'),(70,'add_subjects',NULL,'web','2018-09-03 11:25:52','2018-09-03 11:25:52'),(71,'edit_subjects',NULL,'web','2018-09-03 11:25:52','2018-09-03 11:25:52'),(72,'delete_subjects',NULL,'web','2018-09-03 11:25:52','2018-09-03 11:25:52'),(73,'view_professors',NULL,'web','2018-09-03 12:18:34','2018-09-03 12:18:34'),(74,'add_professors',NULL,'web','2018-09-03 12:18:34','2018-09-03 12:18:34'),(75,'edit_professors',NULL,'web','2018-09-03 12:18:34','2018-09-03 12:18:34'),(76,'delete_professors',NULL,'web','2018-09-03 12:18:34','2018-09-03 12:18:34'),(77,'view_timetables',NULL,'web','2018-09-03 13:50:29','2018-09-03 13:50:29'),(78,'add_timetables',NULL,'web','2018-09-03 13:50:29','2018-09-03 13:50:29'),(79,'edit_timetables',NULL,'web','2018-09-03 13:50:29','2018-09-03 13:50:29'),(80,'delete_timetables',NULL,'web','2018-09-03 13:50:29','2018-09-03 13:50:29'),(81,'view_sessions',NULL,'web','2018-09-04 04:43:12','2018-09-04 04:43:12'),(82,'add_sessions',NULL,'web','2018-09-04 04:43:12','2018-09-04 04:43:12'),(83,'edit_sessions',NULL,'web','2018-09-04 04:43:12','2018-09-04 04:43:12'),(84,'delete_sessions',NULL,'web','2018-09-04 04:43:12','2018-09-04 04:43:12'),(85,'view_expenses',NULL,'web','2018-09-04 19:00:40','2018-09-04 19:00:40'),(86,'add_expenses',NULL,'web','2018-09-04 19:00:40','2018-09-04 19:00:40'),(87,'edit_expenses',NULL,'web','2018-09-04 19:00:40','2018-09-04 19:00:40'),(88,'delete_expenses',NULL,'web','2018-09-04 19:00:40','2018-09-04 19:00:40'),(89,'view_expense-configurations',NULL,'web','2018-09-04 19:25:22','2018-09-04 19:25:22'),(90,'add_expense-configurations',NULL,'web','2018-09-04 19:25:22','2018-09-04 19:25:22'),(91,'edit_expense-configurations',NULL,'web','2018-09-04 19:25:22','2018-09-04 19:25:22'),(92,'delete_expense-configurations',NULL,'web','2018-09-04 19:25:22','2018-09-04 19:25:22'),(93,'view_student_bills',NULL,'web','2018-09-16 00:33:43','2018-09-16 00:33:43'),(94,'add_student_bills',NULL,'web','2018-09-16 00:33:43','2018-09-16 00:33:43'),(95,'edit_student_bills',NULL,'web','2018-09-16 00:33:43','2018-09-16 00:33:43'),(96,'delete_student_bills',NULL,'web','2018-09-16 00:33:43','2018-09-16 00:33:43'),(97,'view_payments',NULL,'web','2018-09-17 02:34:24','2018-09-17 02:34:24'),(98,'add_payments',NULL,'web','2018-09-17 02:34:24','2018-09-17 02:34:24'),(99,'edit_payments',NULL,'web','2018-09-17 02:34:24','2018-09-17 02:34:24'),(100,'delete_payments',NULL,'web','2018-09-17 02:34:24','2018-09-17 02:34:24'),(101,'view_users','view_users','web','2018-10-21 14:53:05','2018-10-21 14:53:05'),(102,'add_users','add_users','web','2018-10-21 14:53:05','2018-10-21 14:53:05'),(103,'edit_users','edit_users','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(104,'delete_users','delete_users','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(105,'view_roles','view_roles','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(106,'add_roles','add_roles','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(107,'edit_roles','edit_roles','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(108,'delete_roles','delete_roles','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(109,'view_schools','view_schools','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(110,'add_schools','add_schools','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(111,'edit_schools','edit_schools','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(112,'delete_schools','delete_schools','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(113,'view_annees','view_annees','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(114,'add_annees','add_annees','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(115,'edit_annees','edit_annees','web','2018-10-21 14:53:06','2018-10-21 14:53:06'),(116,'delete_annees','delete_annees','web','2018-10-21 14:53:06','2018-10-21 14:53:06');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professeur_matieres`
--

DROP TABLE IF EXISTS `professeur_matieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professeur_matieres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `annee_id` int(10) unsigned NOT NULL,
  `matiere_id` int(10) unsigned NOT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professeur_matieres`
--

LOCK TABLES `professeur_matieres` WRITE;
/*!40000 ALTER TABLE `professeur_matieres` DISABLE KEYS */;
/*!40000 ALTER TABLE `professeur_matieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor_subject`
--

DROP TABLE IF EXISTS `professor_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor_subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor_subject`
--

LOCK TABLES `professor_subject` WRITE;
/*!40000 ALTER TABLE `professor_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor_subject_timetable`
--

DROP TABLE IF EXISTS `professor_subject_timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor_subject_timetable` (
  `subject_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor_subject_timetable`
--

LOCK TABLES `professor_subject_timetable` WRITE;
/*!40000 ALTER TABLE `professor_subject_timetable` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor_subject_timetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professors`
--

DROP TABLE IF EXISTS `professors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `prenoms` varchar(191) NOT NULL,
  `contact_1` varchar(191) NOT NULL,
  `contact_2` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `professor_files` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `professors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professors`
--

LOCK TABLES `professors` WRITE;
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT INTO `professors` VALUES (5,'Zouon','gerard','01 01 01 01',NULL,'ibrahimkhalilcisse92@gmail.com',1,'2018-09-10 12:27:39','2018-09-10 12:27:39',''),(6,'KONAN','CISSE','01 01 01 00',NULL,'auguste@sntci.net',1,'2018-09-12 16:39:54','2018-09-12 16:39:54','');
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(1,2),(5,2),(9,2),(10,2),(11,2),(12,2),(9,3),(11,3),(13,3),(14,3),(15,3),(16,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(45,3),(46,3),(47,3),(48,3),(49,3),(50,3),(51,3),(52,3),(53,3),(54,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(62,3),(63,3),(64,3),(65,3),(66,3),(67,3),(68,3),(69,3),(70,3),(71,3),(72,3),(73,3),(74,3),(75,3),(76,3),(81,3),(82,3),(83,3),(84,3),(85,3),(86,3),(87,3),(88,3),(89,3),(90,3),(91,3),(92,3),(93,3),(94,3),(95,3),(96,3),(97,3),(98,3),(99,3),(100,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','web','2018-07-31 03:13:26','2018-07-31 04:33:48'),(2,'manager','Manager','web','2018-07-31 04:31:42','2018-07-31 04:36:35'),(3,'school-manager','School manager','web','2018-07-31 04:36:17','2018-07-31 04:36:46');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `slogan` varchar(191) DEFAULT NULL,
  `siteweb` varchar(191) DEFAULT NULL,
  `contact_1` varchar(191) NOT NULL,
  `contact_2` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `adresse` varchar(191) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `pays_id` int(11) NOT NULL,
  `nom_banque` varchar(191) DEFAULT NULL,
  `nom_compte_banque` varchar(191) DEFAULT NULL,
  `numero_compte_banque` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `revoked` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `schools_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'IBSA RIVIERA','L’avenir est dans nos mains, construisons-le ensemble.','http://www.ibsa.africa','49 42 08 06','53 57 66 66','info@ibsa.africa',NULL,NULL,'II Plateaux, 7eme tranche',1,1,'ECOBANK','International Bilingual Schools of Africa','CI053 01010 28123928340169',NULL,'2018-07-31 07:17:50','2018-09-17 16:15:16',1),(2,'Etablissement 2',NULL,NULL,'21 00 00 02',NULL,'etablissement2@example.com',NULL,NULL,'Lorem ipsum',1,1,NULL,NULL,NULL,NULL,'2018-07-31 08:07:38','2018-07-31 08:07:38',1),(4,'IBSA II PLATEAUX','International Bilingual School of Africa','http://www.ibsa.africa','53 57 66 66','49 42 08 06','contact@ibsa.africa',NULL,NULL,'Deux plateaux, 7eme tranche, Cocody, Abidjan',1,1,'BICICI','IBSA','002839212123',NULL,'2018-08-28 16:42:39','2018-10-11 15:03:20',1),(11,'IBSA II PLATEAUX Test','la réussite pour tous','www.ibsa.africa','77 43 26 35',NULL,'infos@ibsa.africa',NULL,NULL,'II Plateaux',1,1,'ECOBANK','IBSA','00932299322',NULL,'2018-10-15 16:40:13','2018-10-15 21:49:18',1);
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,'1er semestre','2018-09-10 00:00:00','2019-02-28 00:00:00',1,1,'2018-09-04 04:42:52','2018-09-04 05:01:07'),(2,'2e semestre','2019-03-01 00:00:00','2019-05-30 00:00:00',1,1,'2018-09-04 04:57:56','2018-09-04 05:02:07'),(11,'Trimestre 1','2018-09-01 00:00:00','2018-12-31 00:00:00',11,4,'2018-10-11 15:06:29','2018-10-11 15:06:29'),(21,'Trimestre 2','2019-01-01 00:00:00','2019-03-30 00:00:00',11,4,'2018-10-11 15:08:29','2018-10-11 15:08:29'),(31,'Trimestre 3','2019-04-01 00:00:00','2019-07-30 00:00:00',11,4,'2018-10-11 15:09:36','2018-10-11 15:09:36');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_bills`
--

DROP TABLE IF EXISTS `student_bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_bills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) NOT NULL,
  `school_id` int(11) unsigned NOT NULL,
  `academic_year_id` int(11) unsigned NOT NULL,
  `classe_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `montant_total_attendu` double NOT NULL,
  `montant_total_paye` double NOT NULL,
  `montant_total_restant` double NOT NULL,
  `revoked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_bills`
--

LOCK TABLES `student_bills` WRITE;
/*!40000 ALTER TABLE `student_bills` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matricule` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) NOT NULL,
  `given_names` varchar(191) NOT NULL,
  `dob` datetime NOT NULL,
  `school_id` int(10) unsigned DEFAULT NULL,
  `place_birth` varchar(191) DEFAULT 'N/A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `citizenship` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_avatar` varchar(191) DEFAULT '',
  `code` varchar(191) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'0912CI','CISSE','IBRAHIM KALIL','2009-12-22 00:00:00',4,'Abidjan','2018-10-31 16:56:04','ivoirienne','+22558093306, II-Plateaux','2018-10-31 16:39:15','2018-10-31 16:56:04','git.jpg',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_levels`
--

DROP TABLE IF EXISTS `study_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `study_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_levels`
--

LOCK TABLES `study_levels` WRITE;
/*!40000 ALTER TABLE `study_levels` DISABLE KEYS */;
INSERT INTO `study_levels` VALUES (1,'PRE K',1,'2018-08-20 12:03:25','2018-08-27 12:49:29'),(2,'K1 - Petite Section',1,'2018-08-20 12:41:06','2018-08-27 12:49:49'),(3,'K2 - Moyenne Section',1,'2018-08-27 12:50:16','2018-08-27 12:50:16'),(4,'K3 - Grande Section',1,'2018-08-27 13:10:53','2018-08-27 13:10:53'),(5,'CP - Year 1',1,'2018-08-27 13:11:09','2018-08-27 13:11:09'),(6,'CE1 - Year 2',1,'2018-08-27 13:11:38','2018-09-03 05:55:27'),(7,'CE2 - Year 3',1,'2018-08-27 13:12:29','2018-08-27 13:12:29'),(8,'CM1 - Year 4',1,'2018-08-27 13:13:08','2018-08-27 13:13:08'),(9,'CM2 - Year 5',1,'2018-08-27 13:13:27','2018-08-27 13:13:27'),(11,'PRE K - Pré-Maternelle',4,'2018-10-11 15:11:11','2018-10-14 22:35:31'),(21,'K1 - Petite Section',4,'2018-10-11 15:12:06','2018-10-14 22:34:29'),(31,'K2 - Moyenne Section',4,'2018-10-11 15:12:44','2018-10-14 22:33:03'),(41,'CP - Year 1',4,'2018-10-11 15:13:16','2018-10-14 22:53:48'),(51,'K3 - Grande Section',4,'2018-10-11 15:14:13','2018-10-14 23:48:56'),(61,'CE1 - Year 2',4,'2018-10-11 15:14:52','2018-10-14 22:54:34'),(71,'CE2 - Year 3',4,'2018-10-11 15:15:25','2018-10-14 22:56:58'),(81,'CM1 - Year 4',4,'2018-10-11 15:16:11','2018-10-14 22:57:49'),(91,'CM2 - Year 5',4,'2018-10-11 15:17:07','2018-10-14 22:58:33');
/*!40000 ALTER TABLE `study_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_categories`
--

DROP TABLE IF EXISTS `subject_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_categories`
--

LOCK TABLES `subject_categories` WRITE;
/*!40000 ALTER TABLE `subject_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `category_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Histoire',1,1,'2018-09-03 11:40:47','2018-09-03 11:50:22'),(2,'Anglais',1,1,'2018-09-03 11:49:33','2018-09-03 11:49:33'),(3,'Francais',1,1,'2018-09-03 11:49:44','2018-09-03 11:49:44'),(4,'Mathématiques',2,1,'2018-09-03 11:50:34','2018-09-03 11:50:34'),(5,'Chimie',2,1,'2018-09-03 11:50:44','2018-09-03 11:50:44'),(6,'Biologie',2,1,'2018-09-03 11:50:57','2018-09-03 11:50:57');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `termes`
--

DROP TABLE IF EXISTS `termes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `termes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `nom_terme` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `termes`
--

LOCK TABLES `termes` WRITE;
/*!40000 ALTER TABLE `termes` DISABLE KEYS */;
/*!40000 ALTER TABLE `termes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `class_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetables`
--

LOCK TABLES `timetables` WRITE;
/*!40000 ALTER TABLE `timetables` DISABLE KEYS */;
INSERT INTO `timetables` VALUES (1,'Emploi du temps du premier semestre',11,1,1,1,'2018-09-04 15:20:49','2018-09-04 15:20:49'),(2,'Emploi du temps du premier semestre',2,1,1,1,'2018-09-17 08:59:57','2018-09-17 08:59:57');
/*!40000 ALTER TABLE `timetables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `prenoms` varchar(191) NOT NULL,
  `contact_1` varchar(191) NOT NULL,
  `contact_2` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Cissé','Ibrahim','01 00 00 02','02 00 00 02','ibrahim.cisse@example.com','$2y$10$FoZ/x/q6ls4Wb4556kxfU.vtnOZnsQuTiQjhb5N6UoQxRmAqohoNK',NULL,1,'QJdvcAys8udI0aaL1sYrxBaSR8Tvlo5wgCYEMfAosOLlrVns2lIYRTu9Yszd','2018-07-31 05:15:58','2018-07-31 05:24:37'),(3,'Doe','John','01 00 00 03',NULL,'john.doe0@example.com','$2y$10$G7pyRe/ogZJ.KD29G5Wb0OSSxgdK3hKiCBc6zlt8rGk5xbw6iu/..',4,1,'apeD8R8I43zudRwf4q4ZVendc29cf1go3GK8dOBw0vPQjqF2Y2h0ii0dqhMq','2018-07-31 07:17:50','2018-07-31 07:17:50'),(4,'Doe','Jane','01 00 00 02',NULL,'jane.doe@example.com','$2y$10$/0yxliBPE3R3XYuvmhpkMujD6r3kg8t10PobbrSri68pRH04kW7.a',2,1,'r3tQr2VqOArKeYsjUWPUr0kJzm6s5L8F3tEY9yg7LStXin56YpObBADoX3Ba','2018-07-31 08:07:38','2018-07-31 08:07:38'),(6,'John','Doe','21 21 21 21',NULL,'john.doe@example.com','$2y$10$tIM3dH10Gsb4kC5HLBN2.OHmDuvHQRcQEmiUCv85aUvnZnkr.40Be',4,1,'Nd5U23ubRFm88sVdqNlzN2dCFo9GVYIyL5vOvFPHiKouiXczLThBcd0f7BEu','2018-08-28 16:42:39','2018-08-28 16:42:39'),(11,'KONAN','GERARD','02 02 03 03',NULL,'gerard.konan@codesprt.com','$2y$10$Qtl3pPmpvzHJYx7aYfG9X.VbtXnij4QCI.VC7ZElne3W1gha/XnkO',4,1,'voZS6drtZ4E4pWq8UcaJmg7ip9i4IehNb0CpphzLwnvPoqrkektqzSWFSMEm','2018-10-12 06:57:57','2018-10-12 06:57:57'),(21,'N\'Guessan','Yves','02 01 01 01',NULL,'jnguessan@brightech-africa.com','$2y$10$5svA0mho/PZCDzS9gbUgu.hQdY3D9mq1eBBskZTfzI7YnQuVIEJEe',NULL,1,'v6uvB2cU0ws9ZU3pwPL0ewGXv2NNKJQBMHxLj7qNrZC45rQIRk8rCWt2MKe1','2018-10-15 12:30:44','2018-10-15 12:30:44'),(41,'N\'GUESSAN','Jean Yves','02 65 81 95',NULL,'nbjy@live.fr','$2y$10$vpJGk9G0Yv8vu//X3oSiVO.mQn/WoIwtEFtcNcJLeT5I2sQMaAQ0u',21,1,NULL,'2018-10-15 16:46:05','2018-10-15 16:46:05'),(51,'Coulibaly','Valerie','22 00 14 22',NULL,'zoudiet@ibsa.africa','$2y$10$Wk1XYAOzT1fMqbzpLVYrjOj4hW2LX.lOSBkZbwYEs2Z0o1jR4px/C',4,1,'w58EtmYMJfNlqbBv6Y2hM58jFipEtMUJ0EAHVqFsmekNFS440ZOuggeD8reb','2018-10-16 15:49:24','2018-10-16 15:49:24'),(61,'Navigué','Myriam','22 00 14 22',NULL,'myriam@ibsa.africa','$2y$10$1UG72DUDnbwAdn/T7Y0x7uwlQfuD8.25kkgO6AYZ/NB.CTZPYy0xm',4,1,NULL,'2018-10-16 15:51:02','2018-10-16 15:51:02'),(71,'Konaté','Isabelle','22 00 14 22',NULL,'isabelle@ibsa.africa','$2y$10$PhkPnPNlD3a.KYIr2QCP1uKo4AkmnUFpUboJUacTP6i9s5XGnWaCC',4,1,NULL,'2018-10-16 17:00:07','2018-10-16 17:00:07'),(81,'Biao','Annick','22 00 14 22',NULL,'annick@ibsa.africa','$2y$10$MZbdQXY3cjqX3seeLih1BOIGHMLCt585/ZIN1nu83ZASiogwpmgEW',4,1,NULL,'2018-10-16 17:06:06','2018-10-16 17:06:06'),(91,'Ly','Fatima','22 00 14 22',NULL,'info@ibsa.africa','$2y$10$ftUswOODBsy8UCi6dFsCKeijVdAKVPaaN84TwS.L7b1zHBgxWp1ry',4,1,NULL,'2018-10-16 17:08:28','2018-10-16 17:08:28'),(101,'N\'Zi','Henri','22 00 14 22',NULL,'nzi@ibsa.africa','$2y$10$UJvDKi6aV.CPBtWy95KBTO0i0vUNF5Iah5967sjVTUvZO6shettGO',1,1,'zZvcvBlVsm40LGT1vPbq62moelMrEHfRIes9lMYLFLhkOJwAvqiVMR44kehE','2018-10-16 17:28:44','2018-10-16 17:28:44'),(111,'Coulibaly','Hamed','22 00 14 22',NULL,'riviera@ibsa.africa','$2y$10$k2V3roEWPYAYdCAGO0/wU.lRA/13Z3tdifE8gyWyqw9ArgFxBO7j.',1,1,'VUjFlmWguQTLYOtK7rmNOchA5zx1iJot8dD1gC8jXqYsNU0k7Ei4RVh5uBSH','2018-10-16 17:29:44','2018-10-16 17:29:44'),(131,'Clero','Viviane','20 00 14 22',NULL,'viviane@ibsa.africa','$2y$10$D7kc85WUvUKDgUe4FDM1Jetud5JZtEvOFl8UP28q5HZtZPJD457mO',1,1,NULL,'2018-10-16 19:33:04','2018-10-16 19:33:04'),(141,'Dapa','Paulin','02 02 02 02',NULL,'dapa.yao@ibsa.net','$2y$10$WbZwm.HyoUqZxOpp3nCue.MFz.FrAsrQJrSHv7RhHpQxsJCP9xUv2',4,1,'sAGBNsddk0qrZcQagCd2xnCWhTCFEBvamD8xCCPIT47LIEh6NkhOCyPTJq2K','2018-10-17 10:39:20','2018-10-17 10:39:20'),(151,'Dosso','Mory Souahlio','09 52 54 60',NULL,'mory.itduck@gmail.com','$2y$10$Vp7YBmKPJ.LFnxJXbTfWHe8YsKpnVC02AeXEPq6NOYH71XY503gve',NULL,1,'YiVvyRnR2Ot2bfIOlO0CX3HYCFl4AWHoRDjrqFyDndhqE9dbsV6Qo51Yo7pI','2018-10-21 14:53:11','2018-10-21 14:53:11'),(152,'Coulibaly','Valerie','09 87 78 78',NULL,'direction@ibsa.africa','$2y$10$Z91ydw8CdaisGRVR/H.ADumUu9BAyWpNd385hx5Yed0FcbnZNCU.G',4,1,NULL,'2018-10-22 18:28:56','2018-10-22 18:28:56'),(153,'Coulibaly','Hamed','08 66 57 67',NULL,'hamed@ibsa.africa','$2y$10$vqLUcvNr3RQpeuDNHJ3Fau7t/wcVMO8Jg/AWeknL0ojZbyHpRq2Mm',1,1,'bCMtdkSQf9tDP5tuUZoNYWCQ6expsXPCZvbjIpmcIOe16wUeDedhbbcEP5ut','2018-10-25 09:30:45','2018-10-25 09:30:45'),(154,'Konaté','Isabelle','09 88 76 64','09 96 54 54','riviera_@ibsa.africa','$2y$10$FWO.pyLC8C8Y19RXjawycOmRhaTgOmxWAiFP6bgJ1w13lcU75lBci',1,1,NULL,'2018-10-25 09:45:13','2018-10-25 09:45:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `pays_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `villes`
--

LOCK TABLES `villes` WRITE;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` VALUES (1,'Abidjan',1,'2018-07-31 06:00:47','2018-07-31 06:00:47'),(2,'Bouaké',1,'2018-07-31 06:00:47','2018-07-31 06:00:47'),(3,'Daloa',1,'2018-07-31 06:00:47','2018-07-31 06:00:47'),(4,'Yamoussoukro',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(5,'San-Pédro',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(6,'Divo',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(7,'Korhogo',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(8,'Anyama',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(9,'Abengourou',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(10,'Man',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(11,'Gagnoa',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(12,'Soubré',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(13,'Agboville',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(14,'Dabou',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(15,'Grand-Bassam',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(16,'Bouaflé',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(17,'Issia',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(18,'Sinfra',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(19,'Katiola',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(20,'Bingerville',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(21,'Adzopé',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(22,'Séguéla',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(23,'Bondoukou',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(24,'Oumé',1,'2018-07-31 06:00:48','2018-07-31 06:00:48'),(25,'Ferkessedougou',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(26,'Dimbokro',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(27,'Odienné',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(28,'Duékoué',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(29,'Danané',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(30,'Tingréla',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(31,'Guiglo',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(32,'Boundiali',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(33,'Agnibilékrou',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(34,'Daoukro',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(35,'Vavoua',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(36,'Zuénoula',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(37,'Tiassalé',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(38,'Toumodi',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(39,'Akoupé',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(40,'Lakota',1,'2018-07-31 06:00:49','2018-07-31 06:00:49'),(41,'Abidjan',1,'2018-10-21 14:53:11','2018-10-21 14:53:11'),(42,'Bouaké',1,'2018-10-21 14:53:11','2018-10-21 14:53:11'),(43,'Daloa',1,'2018-10-21 14:53:11','2018-10-21 14:53:11'),(44,'Yamoussoukro',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(45,'San-Pédro',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(46,'Divo',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(47,'Korhogo',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(48,'Anyama',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(49,'Abengourou',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(50,'Man',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(51,'Gagnoa',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(52,'Soubré',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(53,'Agboville',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(54,'Dabou',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(55,'Grand-Bassam',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(56,'Bouaflé',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(57,'Issia',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(58,'Sinfra',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(59,'Katiola',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(60,'Bingerville',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(61,'Adzopé',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(62,'Séguéla',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(63,'Bondoukou',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(64,'Oumé',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(65,'Ferkessedougou',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(66,'Dimbokro',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(67,'Odienné',1,'2018-10-21 14:53:12','2018-10-21 14:53:12'),(68,'Duékoué',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(69,'Danané',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(70,'Tingréla',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(71,'Guiglo',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(72,'Boundiali',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(73,'Agnibilékrou',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(74,'Daoukro',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(75,'Vavoua',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(76,'Zuénoula',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(77,'Tiassalé',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(78,'Toumodi',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(79,'Akoupé',1,'2018-10-21 14:53:13','2018-10-21 14:53:13'),(80,'Lakota',1,'2018-10-21 14:53:13','2018-10-21 14:53:13');
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-03 14:14:49
