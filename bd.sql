-- MySQL dump 10.14  Distrib 5.5.59-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: sf4_db
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant`
--

LOCK TABLES `applicant` WRITE;
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` VALUES (11,'applicant36b7743b'),(12,'applicant4293783c'),(13,'applicant04ddf9a3'),(14,'applicant9575f3d9'),(15,'applicant835805b4'),(16,'applicant3da2db63'),(17,'applicant1398c1dc'),(18,'applicant307e8648'),(19,'applicanta39bcea5'),(20,'applicant7d26bd23');
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_offer`
--

DROP TABLE IF EXISTS `applicant_offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_offer` (
  `applicant_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  PRIMARY KEY (`applicant_id`,`offer_id`),
  KEY `IDX_C4EE7D3D97139001` (`applicant_id`),
  KEY `IDX_C4EE7D3D53C674EE` (`offer_id`),
  CONSTRAINT `FK_C4EE7D3D53C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C4EE7D3D97139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_offer`
--

LOCK TABLES `applicant_offer` WRITE;
/*!40000 ALTER TABLE `applicant_offer` DISABLE KEYS */;
INSERT INTO `applicant_offer` VALUES (11,31),(11,32),(12,33),(12,34),(13,35),(13,36),(14,37),(14,38),(15,39),(15,40),(16,41),(16,42),(17,43),(17,44),(18,45),(18,46),(19,47),(19,48),(20,49),(20,50);
/*!40000 ALTER TABLE `applicant_offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (32,'company 0','company0@company.com'),(33,'company 1','company1@company.com'),(34,'company 2','company2@company.com'),(35,'company 3','company3@company.com'),(36,'company 4','company4@company.com');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20201126124121','2020-11-29 17:20:51',1845),('DoctrineMigrations\\Version20201126140124','2020-11-29 17:20:53',35),('DoctrineMigrations\\Version20201126160931','2020-11-29 17:20:53',211),('DoctrineMigrations\\Version20201126171824','2020-11-29 17:20:53',48);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29D6873E7E3C61F9` (`owner_id`),
  CONSTRAINT `FK_29D6873E7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES (31,32,'oferta 69f2b440'),(32,32,'oferta 9e2e2fa9'),(33,32,'oferta 87507662'),(34,32,'oferta d8f5bda9'),(35,33,'oferta a4e03469'),(36,33,'oferta 9b810147'),(37,33,'oferta 7afc40f4'),(38,33,'oferta 7b8a14be'),(39,34,'oferta 799719b1'),(40,34,'oferta c4a6b562'),(41,34,'oferta a57072e1'),(42,34,'oferta 6f898a58'),(43,35,'oferta 6a7ad394'),(44,35,'oferta 6eb1745c'),(45,35,'oferta c72d947c'),(46,35,'oferta 3bbae5c1'),(47,36,'oferta c07780e3'),(48,36,'oferta 6f2bac69'),(49,36,'oferta f2484e97'),(50,36,'oferta f9a77d59');
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'admin@admin.com','[\"[\\\\\\\"ROLE_ADMIN\\\\\\\"]\"]','\\$argon2id\\$v=19\\$m=65536,t=4,p=1\\$zHd8/9QmaFCkXITvBXNcKg\\$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I',1),(8,'aplicante1@aplicant.com','[\"[\\\\\\\"ROLE_APPLICANT\\\\\\\"]\"]','\\$argon2id\\$v=19\\$m=65536,t=4,p=1\\$zHd8/9QmaFCkXITvBXNcKg\\$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I',1),(9,'aplicante2@aplicant.com','[\"[\\\\\\\"ROLE_APPLICANT\\\\\\\"]\"]','\\$argon2id\\$v=19\\$m=65536,t=4,p=1\\$zHd8/9QmaFCkXITvBXNcKg\\$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I',1),(10,'company1@company.com','[\"[\\\\\\\"ROLE_COMPANY\\\\\\\"]\"]','\\$argon2id\\$v=19\\$m=65536,t=4,p=1\\$zHd8/9QmaFCkXITvBXNcKg\\$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I',1),(11,'company2@company.com','[\"[\\\\\\\"ROLE_COMPANY\\\\\\\"]\"]','\\$argon2id\\$v=19\\$m=65536,t=4,p=1\\$zHd8/9QmaFCkXITvBXNcKg\\$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-29 23:11:44
