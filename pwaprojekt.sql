-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pwaprojekt
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `articleText` text COLLATE utf8_croatian_ci NOT NULL,
  `slikica` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `arhiva` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'kultura','MOJ NASLOV','Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis mauris sit amet massa vitae tortor. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id. A condimentum vitae sapien pellentesque habitant. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Aliquet nec ullamcorper sit amet risus nullam eget felis. Sed felis eget velit aliquet sagittis id. At elementum eu facilisis sed odio morbi quis commodo. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque habitant morbi tristique senectus et netus. Hendrerit gravida rutrum quisque non tellus orci ac auctor.','2022_06_19_10_55_102022_06_18_15_45_17wheat.jpg',0),(2,'sport','MOJ NASLOV','Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis mauris sit amet massa vitae tortor. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id. A condimentum vitae sapien pellentesque habitant. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Aliquet nec ullamcorper sit amet risus nullam eget felis. Sed felis eget velit aliquet sagittis id. At elementum eu facilisis sed odio morbi quis commodo. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque habitant morbi tristique senectus et netus. Hendrerit gravida rutrum quisque non tellus orci ac auctor.','2022_06_19_10_56_302022_06_18_15_45_17wheat.jpg',0),(5,'kultura','MOJ NASLOV','Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis mauris sit amet massa vitae tortor. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id. A condimentum vitae sapien pellentesque habitant. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Aliquet nec ullamcorper sit amet risus nullam eget felis. Sed felis eget velit aliquet sagittis id. At elementum eu facilisis sed odio morbi quis commodo. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque habitant morbi tristique senectus et netus. Hendrerit gravida rutrum quisque non tellus orci ac auctor.','2022_06_19_10_54_322022_06_19_10_31_352022_06_19_10_30_472022_06_18_15_45_00mountains.png',0),(6,'sport','MOJ NASLOV','Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis mauris sit amet massa vitae tortor. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id. A condimentum vitae sapien pellentesque habitant. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Aliquet nec ullamcorper sit amet risus nullam eget felis. Sed felis eget velit aliquet sagittis id. At elementum eu facilisis sed odio morbi quis commodo. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque habitant morbi tristique senectus et netus. Hendrerit gravida rutrum quisque non tellus orci ac auctor.','2022_06_19_10_54_122022_06_18_15_25_27rocket.jpg',0),(7,'sport','MOJ NASLOV','Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis mauris sit amet massa vitae tortor. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id. A condimentum vitae sapien pellentesque habitant. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Aliquet nec ullamcorper sit amet risus nullam eget felis. Sed felis eget velit aliquet sagittis id. At elementum eu facilisis sed odio morbi quis commodo. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque habitant morbi tristique senectus et netus. Hendrerit gravida rutrum quisque non tellus orci ac auctor.','2022_06_19_10_54_042022_06_18_15_48_14forest.jpg',0),(9,'sport','MOJ NASLOV123','Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis mauris sit amet massa vitae tortor. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Morbi tristique senectus et netus et. Amet nulla facilisi morbi tempus iaculis urna id. A condimentum vitae sapien pellentesque habitant. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Aliquet nec ullamcorper sit amet risus nullam eget felis. Sed felis eget velit aliquet sagittis id. At elementum eu facilisis sed odio morbi quis commodo. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque habitant morbi tristique senectus et netus. Hendrerit gravida rutrum quisque non tellus orci ac auctor.','2022_06_19_11_20_572022_06_18_09_05_10MOVING-jumbo-809205717.jpg',1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,'123','123','admin','$2y$10$SpXTyeoXAVyWhsNLlSssuOR13Q58pl5we2TjV0QxAXSXk36QK4cQS',1),(2,'123','123','123123','$2y$10$QtjVEn0iJr4o6b4K698/ouRyfCii7liu2wWAgcBTTVgDio21HaBvu',0),(4,'123','24124','4124124124124','$2y$10$eRRZheKM3Agv.1K/sNebI.soZe04St6Vj8ohmU4ndN9BARNTJm87.',0),(5,'123','42','55123','$2y$10$8oOix8dTbNekfdnBkvllfOvkIChQtCOSNZigqPp2/dLi4f6kNg53u',0),(6,'123','123123','123123123123','$2y$10$80iEYKq2NfclZ5on8SBjnOC6zN00LSlXislRYa/T118qZ4Th3p9b2',0),(7,'123','123','korisnickoIme','$2y$10$Hz9srPHFsq97CXFLXBrcV.hAJ1yGBK.Tacik1PwhtsfEJOUCg5Ava',0),(8,'Luka','Luka','Luka123','$2y$10$hhLyYocL6E1noGEKxEMW0ueG3ojmRcjdtYHdYJiLnqCoLCwk6YvhO',0);
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 16:38:32
