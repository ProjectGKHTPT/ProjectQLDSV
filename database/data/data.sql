-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: qlsv1
-- ------------------------------------------------------
-- Server version	5.7.19

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

--
-- Table structure for table `diems`
--

DROP TABLE IF EXISTS `diems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diemcc` float DEFAULT NULL,
  `diemtx` float DEFAULT NULL,
  `diemgk` float DEFAULT NULL,
  `diemck` float DEFAULT NULL,
  `diemthilai` float DEFAULT NULL,
  `monhoc_id` int(10) unsigned DEFAULT NULL,
  `sinhvien_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diems_sinhvien_id_foreign` (`sinhvien_id`),
  KEY `diems_monhoc_id_foreign` (`monhoc_id`),
  CONSTRAINT `diems_monhoc_id_foreign` FOREIGN KEY (`monhoc_id`) REFERENCES `monhocs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `diems_sinhvien_id_foreign` FOREIGN KEY (`sinhvien_id`) REFERENCES `sinhviens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diems`
--

LOCK TABLES `diems` WRITE;
/*!40000 ALTER TABLE `diems` DISABLE KEYS */;
INSERT INTO `diems` VALUES (1,5,5,1,5,NULL,1,1,NULL,'2018-01-23 21:57:20'),(2,10,10,10,10,NULL,2,1,NULL,'2018-01-11 18:34:01'),(3,10,10,10,10,NULL,4,1,NULL,'2018-01-11 18:34:18'),(4,10,10,10,10,NULL,5,1,NULL,'2018-01-11 18:34:33'),(5,10,10,10,10,NULL,6,1,NULL,'2018-01-11 18:34:47'),(6,10,10,10,10,NULL,7,1,NULL,'2018-01-11 18:35:01'),(7,10,10,10,10,NULL,8,1,NULL,'2018-01-11 18:35:18'),(8,10,10,10,10,NULL,10,1,NULL,'2018-01-11 18:35:33'),(9,10,10,10,10,NULL,11,1,NULL,'2018-01-11 18:35:50'),(10,4,10,10,NULL,0,12,1,NULL,'2018-01-11 20:31:43'),(11,NULL,NULL,NULL,NULL,NULL,1,2,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL,4,2,NULL,NULL),(14,NULL,NULL,NULL,NULL,NULL,5,2,NULL,NULL),(15,NULL,NULL,NULL,NULL,NULL,6,2,NULL,NULL),(16,NULL,NULL,NULL,NULL,NULL,7,2,NULL,NULL),(17,NULL,NULL,NULL,NULL,NULL,8,2,NULL,NULL),(18,NULL,NULL,NULL,NULL,NULL,10,2,NULL,NULL),(19,NULL,NULL,NULL,NULL,NULL,11,2,NULL,NULL),(20,NULL,NULL,NULL,NULL,NULL,12,2,NULL,NULL),(21,NULL,NULL,NULL,NULL,NULL,1,3,NULL,NULL),(22,NULL,NULL,NULL,NULL,NULL,2,3,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,4,3,NULL,NULL),(24,NULL,NULL,NULL,NULL,NULL,5,3,NULL,NULL),(25,NULL,NULL,NULL,NULL,NULL,6,3,NULL,NULL),(26,NULL,NULL,NULL,NULL,NULL,7,3,NULL,NULL),(27,NULL,NULL,NULL,NULL,NULL,8,3,NULL,NULL),(28,NULL,NULL,NULL,NULL,NULL,10,3,NULL,NULL),(29,NULL,NULL,NULL,NULL,NULL,11,3,NULL,NULL),(30,NULL,NULL,NULL,NULL,NULL,12,3,NULL,NULL),(49,9,9,9,9,NULL,1,7,NULL,'2018-01-11 18:33:34'),(50,9,9,9,9,NULL,2,7,NULL,'2018-01-11 18:34:05'),(51,9,9,9,9,NULL,4,7,NULL,'2018-01-11 18:34:20'),(52,10,10,10,10,NULL,5,7,NULL,'2018-01-11 18:34:35'),(53,9,9,9,9,NULL,6,7,NULL,'2018-01-11 18:34:49'),(54,9,9,9,9,NULL,7,7,NULL,'2018-01-11 18:35:03'),(55,9,9,9,9,NULL,8,7,NULL,'2018-01-11 18:35:23'),(56,9,9,9,9,NULL,10,7,NULL,'2018-01-11 18:35:35'),(57,9,9,9,9,NULL,11,7,NULL,'2018-01-11 18:35:53'),(58,5,4,4,4,NULL,12,7,NULL,'2018-01-11 18:36:25'),(79,NULL,NULL,NULL,NULL,NULL,3,10,NULL,NULL),(80,NULL,NULL,NULL,NULL,NULL,4,10,NULL,NULL),(81,NULL,NULL,NULL,NULL,NULL,6,10,NULL,NULL),(82,NULL,NULL,NULL,NULL,NULL,8,10,NULL,NULL),(83,NULL,NULL,NULL,NULL,NULL,10,10,NULL,NULL),(84,NULL,NULL,NULL,NULL,NULL,12,10,NULL,NULL),(85,NULL,NULL,NULL,NULL,NULL,3,11,NULL,NULL),(86,NULL,NULL,NULL,NULL,NULL,4,11,NULL,NULL),(87,NULL,NULL,NULL,NULL,NULL,6,11,NULL,NULL),(88,NULL,NULL,NULL,NULL,NULL,8,11,NULL,NULL),(89,NULL,NULL,NULL,NULL,NULL,10,11,NULL,NULL),(90,NULL,NULL,NULL,NULL,NULL,12,11,NULL,NULL),(91,NULL,NULL,NULL,NULL,NULL,3,12,NULL,NULL),(92,NULL,NULL,NULL,NULL,NULL,4,12,NULL,NULL),(93,NULL,NULL,NULL,NULL,NULL,6,12,NULL,NULL),(94,NULL,NULL,NULL,NULL,NULL,8,12,NULL,NULL),(95,NULL,NULL,NULL,NULL,NULL,10,12,NULL,NULL),(96,NULL,NULL,NULL,NULL,NULL,12,12,NULL,NULL),(97,NULL,NULL,NULL,NULL,NULL,1,13,NULL,NULL),(98,NULL,NULL,NULL,NULL,NULL,2,13,NULL,NULL),(99,NULL,NULL,NULL,NULL,NULL,4,13,NULL,NULL),(100,NULL,NULL,NULL,NULL,NULL,5,13,NULL,NULL),(101,NULL,NULL,NULL,NULL,NULL,6,13,NULL,NULL),(102,NULL,NULL,NULL,NULL,NULL,7,13,NULL,NULL),(103,NULL,NULL,NULL,NULL,NULL,8,13,NULL,NULL),(104,NULL,NULL,NULL,NULL,NULL,10,13,NULL,NULL),(105,NULL,NULL,NULL,NULL,NULL,11,13,NULL,NULL),(106,NULL,NULL,NULL,NULL,NULL,12,13,NULL,NULL),(107,NULL,NULL,NULL,NULL,NULL,1,14,NULL,NULL),(108,NULL,NULL,NULL,NULL,NULL,2,14,NULL,NULL),(109,NULL,NULL,NULL,NULL,NULL,4,14,NULL,NULL),(110,NULL,NULL,NULL,NULL,NULL,5,14,NULL,NULL),(111,NULL,NULL,NULL,NULL,NULL,6,14,NULL,NULL),(112,NULL,NULL,NULL,NULL,NULL,7,14,NULL,NULL),(113,NULL,NULL,NULL,NULL,NULL,8,14,NULL,NULL),(114,NULL,NULL,NULL,NULL,NULL,10,14,NULL,NULL),(115,NULL,NULL,NULL,NULL,NULL,11,14,NULL,NULL),(116,NULL,NULL,NULL,NULL,NULL,12,14,NULL,NULL),(117,8,8,8,8,NULL,1,15,NULL,'2018-01-11 18:33:42'),(118,8,8,8,8,NULL,2,15,NULL,'2018-01-11 18:34:07'),(119,9,9,9,9,NULL,4,15,NULL,'2018-01-11 18:34:24'),(120,10,10,10,10,NULL,5,15,NULL,'2018-01-11 18:34:37'),(121,8,8,8,8,NULL,6,15,NULL,'2018-01-11 18:34:53'),(122,8,8,8,8,NULL,7,15,NULL,'2018-01-11 18:35:07'),(123,8,8,8,8,NULL,8,15,NULL,'2018-01-11 18:35:25'),(124,8,8,8,8,NULL,10,15,NULL,'2018-01-11 18:35:38'),(125,8,8,8,8,NULL,11,15,NULL,'2018-01-11 18:35:59'),(126,8,2,2,8,NULL,12,15,NULL,'2018-01-11 18:36:32');
/*!40000 ALTER TABLE `diems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giangviens`
--

DROP TABLE IF EXISTS `giangviens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giangviens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `magv` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hogv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tengv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `hocham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hocvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `giangviens_magv_unique` (`magv`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giangviens`
--

LOCK TABLES `giangviens` WRITE;
/*!40000 ALTER TABLE `giangviens` DISABLE KEYS */;
INSERT INTO `giangviens` VALUES (1,'GV01','Trần','Thị Mỹ Hiền','2018-01-12',0,NULL,NULL,'2018-01-11 08:00:26','2018-01-11 08:00:26'),(15,'GV02','Đỗ','Văn Tuấn','2018-01-09',1,NULL,NULL,'2018-01-11 08:03:35','2018-01-11 08:03:35'),(16,'GV03','Bùi','Chí Thành','2018-01-05',1,NULL,NULL,'2018-01-11 08:04:39','2018-01-11 08:04:39'),(17,'GV04','Lê','Thị Giang','2018-01-02',0,NULL,NULL,'2018-01-11 08:05:10','2018-01-11 08:05:10'),(18,'GV05','Cao','Mạnh Hùng','2018-01-26',1,NULL,NULL,'2018-01-11 08:06:27','2018-01-11 08:06:27'),(19,'GV06','Hà','Văn Muôn','2018-01-08',1,NULL,NULL,'2018-01-11 08:07:21','2018-01-11 08:07:21'),(20,'GV07','Đào','Văn Tôn','2018-01-03',1,NULL,NULL,'2018-01-11 08:08:27','2018-01-11 08:08:27'),(21,'GV08','Phan','Thanh Sơn','2018-01-03',1,NULL,NULL,'2018-01-11 08:10:22','2018-01-11 08:10:22'),(22,'GV09','Nguyễn','Thanh Hải','2018-01-03',1,NULL,NULL,'2018-01-11 08:10:45','2018-01-11 08:10:45'),(23,'GV10','Đinh','Văn Thế','2018-01-03',1,NULL,NULL,'2018-01-11 08:11:07','2018-01-11 08:11:07');
/*!40000 ALTER TABLE `giangviens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hockys`
--

DROP TABLE IF EXISTS `hockys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hockys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hocky` int(11) NOT NULL,
  `namhoc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hockys`
--

LOCK TABLES `hockys` WRITE;
/*!40000 ALTER TABLE `hockys` DISABLE KEYS */;
INSERT INTO `hockys` VALUES (1,1,'2017-2018'),(2,2,'2017-2018');
/*!40000 ALTER TABLE `hockys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khoas`
--

DROP TABLE IF EXISTS `khoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `makhoa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khoas`
--

LOCK TABLES `khoas` WRITE;
/*!40000 ALTER TABLE `khoas` DISABLE KEYS */;
INSERT INTO `khoas` VALUES (1,'ĐC','Công nghệ thông tin',NULL,NULL),(2,'ĐV','Đại học viễn thông',NULL,NULL);
/*!40000 ALTER TABLE `khoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lops`
--

DROP TABLE IF EXISTS `lops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `malop` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenlop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lops_malop_unique` (`malop`),
  KEY `lops_khoa_id_foreign` (`khoa_id`),
  CONSTRAINT `lops_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lops`
--

LOCK TABLES `lops` WRITE;
/*!40000 ALTER TABLE `lops` DISABLE KEYS */;
INSERT INTO `lops` VALUES (1,'ĐHCN3A','Đại học công nghệ 3A',1,'2018-01-11 07:52:07','2018-01-11 07:52:07'),(2,'ĐHCN3B','Đại học công nghệ 3B',1,'2018-01-11 07:52:42','2018-01-11 07:52:42'),(3,'ĐHCN3C','Đại học công nghệ 3C',1,'2018-01-11 07:53:08','2018-01-11 07:53:08'),(4,'ĐHVT13','Đại học viễn thông 13',2,'2018-01-11 07:54:03','2018-01-11 07:54:03');
/*!40000 ALTER TABLE `lops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_11_15_134153_add_checkcodeemail_to_users_table',1),(4,'2017_12_09_143449_create_khoas_table',1),(5,'2017_12_10_033502_create_lops_table',2),(8,'2017_12_10_042847_create_sinhviens_table',3),(9,'2017_12_10_064613_create_diems_table',4),(10,'2017_12_10_065359_create_monhocs_table',5),(11,'2017_12_10_065807_add_monhocid_to_diems_table',6),(12,'2017_12_10_070622_create_monhoc_lop_table',7),(13,'2017_12_13_043759_create_sinhvien_monhoc_table',8),(14,'2017_12_27_033758_create_giangviens_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monhocs`
--

DROP TABLE IF EXISTS `monhocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monhocs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mamon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenmon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên môn học',
  `sotinchi` int(11) NOT NULL,
  `sotiet` int(11) NOT NULL,
  `hocky_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `monhocs_mamon_unique` (`mamon`),
  KEY `monhocs_hocky_id_foreign` (`hocky_id`),
  CONSTRAINT `monhocs_hocky_id_foreign` FOREIGN KEY (`hocky_id`) REFERENCES `hockys` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monhocs`
--

LOCK TABLES `monhocs` WRITE;
/*!40000 ALTER TABLE `monhocs` DISABLE KEYS */;
INSERT INTO `monhocs` VALUES (1,'4204','Cơ sở dữ liệu',3,75,1,NULL,NULL),(2,'4208','Lập trình Java',4,75,1,NULL,NULL),(3,'3306','Cấu kiện điện tử',3,65,1,NULL,NULL),(4,'2206','Giáo dục thể chất',1,75,1,NULL,NULL),(5,'4225','Nhập môn lập trình',4,70,1,NULL,NULL),(6,'2208','Toán rời rạc',2,65,1,NULL,NULL),(7,'3308','Công nghệ phần mềm',4,75,1,NULL,NULL),(8,'2216','Giải tích 1',2,65,1,NULL,NULL),(10,'4306','Kỹ năng mềm',2,45,1,NULL,NULL),(11,'4221','Lập trình web',4,75,2,NULL,NULL),(12,'1107','Bóng chuyền',1,45,2,NULL,NULL);
/*!40000 ALTER TABLE `monhocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
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
-- Table structure for table `phancong`
--

DROP TABLE IF EXISTS `phancong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phancong` (
  `monhoc_id` int(10) unsigned NOT NULL,
  `lop_id` int(10) unsigned NOT NULL,
  `giangvien_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `monhoc_lop_monhoc_id_foreign` (`monhoc_id`),
  KEY `monhoc_lop_lop_id_foreign` (`lop_id`),
  KEY `giangvien_id` (`giangvien_id`),
  CONSTRAINT `giangvien_id` FOREIGN KEY (`giangvien_id`) REFERENCES `giangviens` (`id`),
  CONSTRAINT `monhoc_lop_lop_id_foreign` FOREIGN KEY (`lop_id`) REFERENCES `lops` (`id`) ON DELETE CASCADE,
  CONSTRAINT `monhoc_lop_monhoc_id_foreign` FOREIGN KEY (`monhoc_id`) REFERENCES `monhocs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phancong`
--

LOCK TABLES `phancong` WRITE;
/*!40000 ALTER TABLE `phancong` DISABLE KEYS */;
INSERT INTO `phancong` VALUES (1,1,1,NULL,NULL),(1,2,1,NULL,NULL),(1,3,1,NULL,NULL),(2,1,17,NULL,NULL),(2,2,17,NULL,NULL),(2,3,17,NULL,NULL),(3,4,15,NULL,NULL),(4,1,20,NULL,NULL),(4,2,20,NULL,NULL),(4,3,20,NULL,NULL),(4,4,20,NULL,NULL),(5,1,19,NULL,NULL),(5,2,19,NULL,NULL),(5,3,19,NULL,NULL),(6,1,18,NULL,NULL),(6,2,18,NULL,NULL),(6,3,18,NULL,NULL),(6,4,18,NULL,NULL),(7,1,15,NULL,NULL),(7,2,15,NULL,NULL),(7,3,15,NULL,NULL),(8,1,21,NULL,NULL),(8,2,21,NULL,NULL),(8,3,21,NULL,NULL),(8,4,21,NULL,NULL),(10,1,22,NULL,NULL),(10,2,22,NULL,NULL),(10,3,22,NULL,NULL),(10,4,22,NULL,NULL),(11,1,16,NULL,NULL),(11,2,16,NULL,NULL),(11,3,16,NULL,NULL),(12,1,20,NULL,NULL),(12,2,20,NULL,NULL),(12,3,20,NULL,NULL),(12,4,20,NULL,NULL);
/*!40000 ALTER TABLE `phancong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinhviens`
--

DROP TABLE IF EXISTS `sinhviens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sinhviens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `masv` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sinhviens_masv_unique` (`masv`),
  KEY `sinhviens_lop_id_foreign` (`lop_id`),
  CONSTRAINT `sinhviens_lop_id_foreign` FOREIGN KEY (`lop_id`) REFERENCES `lops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinhviens`
--

LOCK TABLES `sinhviens` WRITE;
/*!40000 ALTER TABLE `sinhviens` DISABLE KEYS */;
INSERT INTO `sinhviens` VALUES (1,'18ĐC001','Nguyễn','Trọng Lâm',0,'2018-01-04','Đăk Nông',1,NULL,NULL),(2,'18ĐC002','Dương','Trung Kiên',0,'2018-01-04','Khánh Hòa',2,NULL,NULL),(3,'18ĐC003','Lê','Thị Khang',0,'2018-01-04','Quảng Bình',3,NULL,NULL),(7,'18ĐC007','Nguyễn','Văn Thắng',1,'2018-01-04','Bắc ninh',1,NULL,NULL),(10,'18ĐC0010','Ngô','Thừa Ân',1,'2018-01-04','Bình Định',4,NULL,NULL),(11,'18ĐC011','Nguyễn','Thị Mỹ Linh',0,'2018-01-04','Quảng Ngãi',4,NULL,NULL),(12,'18ĐV012','Trần','Minh Cường',1,'2018-01-04','Khánh Hòa',4,NULL,NULL),(13,'18ĐC013','Trần','Minh Thắng',1,'2018-01-04','Khánh Hòa',2,NULL,NULL),(14,'18ĐC014','Nguyễn','Đăng Khoa',1,'2018-01-04','Khánh Hòa',3,NULL,NULL),(15,'18ĐC015','Nguyễn trọng','Quân',1,'2018-01-12','....',1,NULL,NULL);
/*!40000 ALTER TABLE `sinhviens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongkes`
--

DROP TABLE IF EXISTS `thongkes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thongkes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sinhvien_id` int(10) unsigned NOT NULL DEFAULT '0',
  `diemrl` float DEFAULT '0',
  `hocbong` varchar(15) DEFAULT NULL,
  `thongke_hocky_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sinhvien_id` (`sinhvien_id`),
  KEY `thongke_hocky_id` (`thongke_hocky_id`),
  CONSTRAINT `sinhvien_id` FOREIGN KEY (`sinhvien_id`) REFERENCES `sinhviens` (`id`),
  CONSTRAINT `thongke_hocky_id` FOREIGN KEY (`thongke_hocky_id`) REFERENCES `hockys` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongkes`
--

LOCK TABLES `thongkes` WRITE;
/*!40000 ALTER TABLE `thongkes` DISABLE KEYS */;
INSERT INTO `thongkes` VALUES (1,14,NULL,'0',1),(2,1,10,'0',1),(3,15,NULL,'1',1),(4,7,0,'0',1),(5,2,0,'0',1),(6,13,0,'1',1);
/*!40000 ALTER TABLE `thongkes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checkcodeemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','$2y$10$xRFsfZBnRzl8sqiTREW7.ezlVb/Dd9DbcuQGxPjebMRgQKCZbbhv.','user.png',0,NULL,NULL,NULL,NULL),(2,'user','user@gmail.com','$2y$10$xRFsfZBnRzl8sqiTREW7.ezlVb/Dd9DbcuQGxPjebMRgQKCZbbhv.','user.png',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-25  8:52:21
