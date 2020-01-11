-- MySQL dump 10.13  Distrib 5.7.25, for macos10.14 (x86_64)
--
-- Host: localhost    Database: lc_rec
-- ------------------------------------------------------
-- Server version	5.7.25

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D765F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admindoing`
--

DROP TABLE IF EXISTS `admindoing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admindoing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DB4771435F37A13B` (`token`),
  KEY `IDX_DB477143642B8210` (`admin_id`),
  CONSTRAINT `FK_DB477143642B8210` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admindoing`
--

LOCK TABLES `admindoing` WRITE;
/*!40000 ALTER TABLE `admindoing` DISABLE KEYS */;
/*!40000 ALTER TABLE `admindoing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminlog`
--

DROP TABLE IF EXISTS `adminlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `login_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `logout_at` datetime NOT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mac_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D552FE55F37A13B` (`token`),
  KEY `IDX_8D552FE5642B8210` (`admin_id`),
  CONSTRAINT `FK_8D552FE5642B8210` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlog`
--

LOCK TABLES `adminlog` WRITE;
/*!40000 ALTER TABLE `adminlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alcoholic`
--

DROP TABLE IF EXISTS `alcoholic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alcoholic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_82E7D6DB5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alcoholic`
--

LOCK TABLES `alcoholic` WRITE;
/*!40000 ALTER TABLE `alcoholic` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcoholic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_659DF2AA8C518555` (`user1`),
  KEY `IDX_659DF2AA1558D4EF` (`user2`),
  CONSTRAINT `FK_659DF2AA1558D4EF` FOREIGN KEY (`user2`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_659DF2AA8C518555` FOREIGN KEY (`user1`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,3,2,3,'halo',1,0,'2019-07-08 10:11:23',NULL,'bada067ddf3475d09a52dfbc77733602dccdf4da'),(2,2,3,3,'halo',1,0,'2019-07-08 10:11:23',NULL,'eee939a63e33f0dc134a3457c7d79e816d803473'),(3,3,2,3,'halo lagi',1,0,'2019-07-08 10:12:24',NULL,'22539a550938420d6a27b2c2f5c5e1fe80f1cbd8'),(4,2,3,3,'halo lagi',1,0,'2019-07-08 10:12:24',NULL,'dc30264bf2a7036b58253304ee333341bbc8c9eb'),(5,2,3,2,'iya bro',1,0,'2019-07-08 10:13:08',NULL,'34aa7df46efd6709e351bacafa039efc4ecfc038'),(6,3,2,2,'iya bro',1,0,'2019-07-08 10:13:08',NULL,'54bc096f9017af399635c7ae9b7b49780232a25d'),(7,2,3,2,'halo bro',1,0,'2019-07-08 11:03:14',NULL,'8706e3b8c34b3b2d3bc6771cdcf66af3de999e10'),(8,3,2,2,'halo bro',1,0,'2019-07-08 11:03:14',NULL,'b3b531821ae7d43f5ecc8dc9106440d463608010'),(9,5,2,5,'halo bro',1,0,'2019-07-13 16:22:24',NULL,'a9d483d576d9cdaf554430c4b473a1bfe7544c85'),(10,2,5,5,'halo bro',1,0,'2019-07-13 16:22:24',NULL,'29eaa55bf1fe677656eead15fe6b2df92b354f19'),(11,5,2,5,'ok bro',1,0,'2019-07-13 16:28:08',NULL,'5082aafeb3c8595e2427a915bbc5477e79892b3e'),(12,2,5,5,'ok bro',1,0,'2019-07-13 16:28:08',NULL,'bb0ba73c105faa682e4d879bcabd150c9a2d1c37'),(13,5,2,5,'halo bro',1,0,'2019-07-13 16:28:33',NULL,'def0c94b6af0736b3c03c5f6ada6061fed9c0732'),(14,2,5,5,'halo bro',1,0,'2019-07-13 16:28:33',NULL,'60f3b178c9d887899c0801efc0b3d99071387fe7'),(15,2,5,2,'ok bro',1,0,'2019-07-13 16:28:57',NULL,'da9d4f3e83d55749318a57f0de74f8c808a1cde1'),(16,5,2,2,'ok bro',1,0,'2019-07-13 16:28:57',NULL,'e058c3f367f1ebf7f269b87c52f04da914b1249c'),(17,5,2,5,'Your mileage may vary with Animations in React Native, but the experts will agree that I’ve either cheated or hacked the RN profiler, because they know that can’t be achieved with the current built in infrastructure (aka Animated API)…until now',1,0,'2019-07-13 16:31:13',NULL,'01a508ff15d1e70e9cdfa88cb91fda90e790a356'),(18,2,5,5,'Your mileage may vary with Animations in React Native, but the experts will agree that I’ve either cheated or hacked the RN profiler, because they know that can’t be achieved with the current built in infrastructure (aka Animated API)…until now',1,0,'2019-07-13 16:31:13',NULL,'7e8fa88234711e04b5139cea16306776b5c2694b');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2D5B02345F37A13B` (`token`),
  KEY `IDX_2D5B0234E946114A` (`province_id`),
  CONSTRAINT `FK_2D5B0234E946114A` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controllerlist`
--

DROP TABLE IF EXISTS `controllerlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controllerlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_838FC0CE5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controllerlist`
--

LOCK TABLES `controllerlist` WRITE;
/*!40000 ALTER TABLE `controllerlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `controllerlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criteria`
--

DROP TABLE IF EXISTS `criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B61F9B815E237E06` (`name`),
  UNIQUE KEY `UNIQ_B61F9B815F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criteria`
--

LOCK TABLES `criteria` WRITE;
/*!40000 ALTER TABLE `criteria` DISABLE KEYS */;
/*!40000 ALTER TABLE `criteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DB0A5ED25F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fcomment`
--

DROP TABLE IF EXISTS `fcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feeling_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7ABEFB475F37A13B` (`token`),
  KEY `IDX_7ABEFB47CB9214C2` (`feeling_id`),
  KEY `IDX_7ABEFB47A76ED395` (`user_id`),
  CONSTRAINT `FK_7ABEFB47A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_7ABEFB47CB9214C2` FOREIGN KEY (`feeling_id`) REFERENCES `feeling` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fcomment`
--

LOCK TABLES `fcomment` WRITE;
/*!40000 ALTER TABLE `fcomment` DISABLE KEYS */;
INSERT INTO `fcomment` VALUES (1,2,5,'<p>test</p>',1,'2fb9d9221c54b530efec9d61659842b74bfa9bab','2019-07-10 14:36:01',NULL),(2,17,5,'<p>halo bro</p>',1,'b3ca349737f0b9e6fc142d5e06f1d1e8769db47e','2019-07-13 16:09:32',NULL),(3,39,5,'<p>halo brooo</p>',1,'5461e0cd23839761b164707a9e0173b24bcbdb58','2019-07-13 16:43:40',NULL);
/*!40000 ALTER TABLE `fcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feeling`
--

DROP TABLE IF EXISTS `feeling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feeling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shared` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feel` longtext COLLATE utf8_unicode_ci NOT NULL,
  `liked` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commented` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_62BFCAB35F37A13B` (`token`),
  KEY `IDX_62BFCAB3138CF4BB` (`shared`),
  KEY `IDX_62BFCAB3A76ED395` (`user_id`),
  CONSTRAINT `FK_62BFCAB3138CF4BB` FOREIGN KEY (`shared`) REFERENCES `feeling` (`id`),
  CONSTRAINT `FK_62BFCAB3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeling`
--

LOCK TABLES `feeling` WRITE;
/*!40000 ALTER TABLE `feeling` DISABLE KEYS */;
INSERT INTO `feeling` VALUES (1,NULL,14,'<p>test status</p>',NULL,'5d22f7ddc4e87.png',NULL,1,'2019-07-08 09:59:25',NULL,'c047156db2a2141595a09153045c8d68a5fa85fb',NULL),(2,NULL,1,'<p>testing</p>',NULL,'5d22f82d3efa4.png',NULL,1,'2019-07-08 10:00:45',NULL,'f2fbde65a436eeb217b825c159e3074486240375',NULL),(3,NULL,1,'<p>testing lagi</p>',NULL,'5d22f83b01e57.png',NULL,1,'2019-07-08 10:00:59',NULL,'e3b184b0c7b3269dace68372779abcee2accc6ea',NULL),(4,NULL,2,'<p>halo 1<br></p>',NULL,'5d22fc5a7a358.jpeg',NULL,1,'2019-07-08 10:18:34',NULL,'4feccb7e559a63dce74b828ad5acc098e43f4832',NULL),(5,NULL,2,'halo 2<br>',NULL,'5d22fc702d7a7.jpeg',NULL,1,'2019-07-08 10:18:56',NULL,'44aeb9b222e78bcee94455406b8d89a6f3f750bc',NULL),(6,NULL,2,'<p>halo 4<br></p>',NULL,'5d22fc7fb5daf.jpeg',NULL,1,'2019-07-08 10:19:11',NULL,'4d8db2ea3ee78471ce9c3dd10f3f522909102d6c',NULL),(7,NULL,2,'<p>halo 5<br></p>',NULL,'5d22fc9099e72.png',NULL,1,'2019-07-08 10:19:28',NULL,'fd80becdd33a0f5c078e75bea0e05c67d54c1da9',NULL),(8,NULL,2,'<p>halo 6<br></p>',NULL,'5d22fc9cbc989.jpeg',NULL,1,'2019-07-08 10:19:40',NULL,'4bf689324bda367bd9db609814611d93853ddd68',NULL),(9,NULL,2,'<p>halo 7<br></p>',NULL,'5d22fcab4eae9.jpeg',NULL,1,'2019-07-08 10:19:55',NULL,'4859d8f5ecbd6249550bf31f794a4b759143efba',NULL),(10,NULL,2,'<p>halo 8<br></p>',NULL,'5d22fcb6a1312.jpeg',NULL,1,'2019-07-08 10:20:06',NULL,'dd7745ee1c1b15257e9220fce18821b691e7e29e',NULL),(11,NULL,2,'<p>halo 9<br></p>',NULL,'5d22fcc7d0de2.png',NULL,1,'2019-07-08 10:20:23',NULL,'809265e28231ff064f287849b12693072098a37f',NULL),(12,NULL,2,'<p>halo 10<br></p>',NULL,'5d22fcd67275f.png',NULL,1,'2019-07-08 10:20:38',NULL,'f92b0f9d00fd4bd8608baa28234c62ee9577263a',NULL),(13,NULL,2,'<p>halo 11<br></p>',NULL,'5d22fce37d970.jpeg',NULL,1,'2019-07-08 10:20:51',NULL,'6f871272af1e85db70999706a7661f676cca3293',NULL),(14,NULL,2,'<p>halo 12<br></p>',NULL,'5d22fcf17d55e.jpeg',NULL,1,'2019-07-08 10:21:05',NULL,'d8588eed3f62445dbac759dc206a60f7716073dc',NULL),(15,NULL,2,'<p>halo 13<br></p>',NULL,'5d22fcff0ce0a.jpeg',NULL,1,'2019-07-08 10:21:19',NULL,'a3fcbd92c434e5c8ba5a19e53fa9fda2171cab73',NULL),(16,NULL,2,'<p>halo 14<br></p>',NULL,'5d22fd0d0eb95.jpeg',NULL,1,'2019-07-08 10:21:33',NULL,'4efa8d48042798116b1431ecd231517ac4055e27',NULL),(17,NULL,2,'<p>halo 15<br></p>',NULL,'5d22fd205a988.jpeg',NULL,1,'2019-07-08 10:21:52',NULL,'23608e3432e6ec900a88a100660a7e8fd867aeba',NULL),(18,NULL,3,'<p>halo 1</p>',NULL,'5d22fd6ca5d07.png',NULL,1,'2019-07-08 10:23:08',NULL,'a2af955fbdfdd85ace920c541fb0b6156606957d',NULL),(19,NULL,3,'<p>halo 2</p>',NULL,'5d22fd790310f.jpeg',NULL,1,'2019-07-08 10:23:21',NULL,'da22ac5d32e8ecc39a5f18ca18ef6a9c2904ff37',NULL),(20,NULL,3,'<p>halo 3</p>',NULL,'5d22fd86bc63c.jpeg',NULL,1,'2019-07-08 10:23:34',NULL,'15ca7181329758f3f49d0e0b69f113c5cc1390cd',NULL),(21,NULL,3,'<p>halo 4</p>',NULL,'5d22fd900be5a.jpeg',NULL,1,'2019-07-08 10:23:44',NULL,'db5fe96e03634d8611ed586b9850447067e64d9b',NULL),(22,NULL,3,'<p>halo 5</p>',NULL,'5d22fda0e95fa.jpeg',NULL,1,'2019-07-08 10:24:00',NULL,'57ad17bb6e93e0a570fa36043a427f2c74b0dfc0',NULL),(23,NULL,3,'<p>halo 6</p>',NULL,'5d22fdaeb342a.jpeg',NULL,1,'2019-07-08 10:24:14',NULL,'5b4736d9b2df3ff6ff3f5d54f74bdaddfdc49970',NULL),(24,NULL,3,'<p>halo 7</p>',NULL,'5d22fdba1c4c1.jpeg',NULL,1,'2019-07-08 10:24:26',NULL,'a4e9a6d029241d9ea0745cc0a81ebe2e84747441',NULL),(25,NULL,3,'<p>halo 9</p>',NULL,'5d22fdc64f304.png',NULL,1,'2019-07-08 10:24:38',NULL,'3035d2f4627badcd0151b32acb074ac61e0b4ca2',NULL),(26,NULL,3,'<p>halo 10</p>',NULL,'5d22fdd4d0477.png',NULL,1,'2019-07-08 10:24:52',NULL,'db771842982080579dfc817f0976a40a94a3c30f',NULL),(27,NULL,3,'<p>halo 11</p>',NULL,'5d22fde19a46a.png',NULL,1,'2019-07-08 10:25:05',NULL,'99f9de0bb3a2f39863acebcd4eb39a6da61fb527',NULL),(28,NULL,3,'<p>halo 12</p>',NULL,'5d22fdefb93b6.jpeg',NULL,1,'2019-07-08 10:25:19',NULL,'f3b30779af54f6727571be3864126cf885dc83f4',NULL),(29,NULL,3,'<p>halo 13</p>',NULL,'5d22fe0055506.jpeg',NULL,1,'2019-07-08 10:25:36',NULL,'4fa0bc067eb7f49cb9c704d22643a369c84d7a58',NULL),(30,NULL,3,'<p>halo 14</p>',NULL,'5d22fe17ab1f5.png',NULL,1,'2019-07-08 10:25:59',NULL,'c6959e958388e011f8ef76de49206273e3f03e51',NULL),(31,NULL,3,'<p>halo 15</p>',NULL,'5d22fe2385101.png',NULL,1,'2019-07-08 10:26:11',NULL,'d6cd4adffce74f2d78fb324cd7e342aeeac7652d',NULL),(32,NULL,3,'<p>halo 16</p>',NULL,'5d22fe480efce.jpeg',NULL,1,'2019-07-08 10:26:48',NULL,'2e8a19f9a7b2c9f978dda15d1f487195ab0787f6',NULL),(33,NULL,3,'<p>halo 17</p>',NULL,'5d22fe6b1b157.jpeg',NULL,1,'2019-07-08 10:27:23',NULL,'9bdef0fbe6fb35598634e6dcededf6d7629a1f7d',NULL),(34,2,5,'<p>testing</p>',NULL,'5d22f82d3efa4.png',NULL,1,'2019-07-10 14:35:51',NULL,'50add9768f51dc411384bee9c594570ef4f668b3',NULL),(35,NULL,5,'<p>test</p>',NULL,NULL,NULL,1,'2019-07-13 10:46:11',NULL,'88f8f40706c4cde88aae7d90d162d6f0ed92d468',NULL),(36,NULL,2,'<p>testing<br></p>',NULL,NULL,NULL,1,'2019-07-13 10:52:07',NULL,'1aa9fcbbd6af0cb4a309abdaba0d2ff4baabb5ba',NULL),(37,NULL,5,'<p>test</p>',NULL,NULL,NULL,1,'2019-07-13 16:01:52',NULL,'2c9824c8e62494984b04ce707c494376dd2fb342',NULL),(38,16,5,'<p>halo 14<br></p>',NULL,'5d22fd0d0eb95.jpeg',NULL,1,'2019-07-13 16:13:09',NULL,'1fba809c18467cf8305af934ca0b41ab3861f5fe',NULL),(39,NULL,5,'<p>Your mileage may vary with Animations in React Native, but the experts will agree that I’ve either cheated or hacked the RN profiler, because they know that can’t be achieved with the current built in infrastructure (aka Animated API)…until now.<br></p>',NULL,NULL,NULL,1,'2019-07-13 16:36:50',NULL,'cd927737982a320b81a409e38c17b0658134401e',NULL),(40,NULL,5,'<p>Your mileage may vary with Animations in React Native, but the experts will agree that I’ve either cheated or hacked the RN profiler, because they know that can’t be achieved with the current built in infrastructure (aka Animated API)…until now.<br></p>',NULL,NULL,NULL,1,'2019-07-13 16:36:58',NULL,'e94b909dc4e77356489dc1e6456378608934f767',NULL),(41,NULL,5,'<p>halo brooo</p>',NULL,'5d29ed9d1ad61.jpeg',NULL,1,'2019-07-13 16:41:33',NULL,'5ec17bfbf35643b414eee174a689f7d38420cf48',NULL),(42,NULL,6,'<p>tes</p>',NULL,NULL,NULL,1,'2019-07-15 10:22:44',NULL,'4dd1a7b8de01470a1a08891fa9fe206f96e23c31',NULL),(43,NULL,6,'<p>test</p>',NULL,NULL,NULL,1,'2019-07-15 10:23:00',NULL,'a129d1e68d0c8dae1cef2d77005ee8b16e228ed8',NULL),(44,NULL,6,'<p>test</p>',NULL,NULL,NULL,1,'2019-07-15 10:23:56',NULL,'07d93fbad15d727375c5f783df5438c660db035b',NULL),(45,NULL,6,'<p>haloo...</p>',NULL,NULL,NULL,1,'2019-07-15 16:06:30',NULL,'d5fc65bb2134ec2224875c35327e79c30abefd89','tbk'),(46,NULL,2,'<p>halo juga<br></p>',NULL,NULL,NULL,1,'2019-07-15 16:07:10',NULL,'b44e57c9cb92c2c7ff229c1e2d0b4503a712354a','tbk'),(47,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:04',NULL,'bf5dde7beb94b1c72bc2f9c9e32b0283f4c18164','tbk'),(48,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:07',NULL,'46136a35569161e4428fb802f588766219374818','tbk'),(49,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:10',NULL,'7c8e9f4e81ceb446cd3cadb5afd44b1fc8009d9b','tbk'),(50,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:13',NULL,'f0e66842e30bce0a73b0aeb8b7a5b7c561750d18','tbk'),(51,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:16',NULL,'e6da7a1be0acf48869ef006c6d338af4f99a050e','tbk'),(52,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:19',NULL,'b94a3b04e3063eb2b04b02e01881161b64b2ad9d','tbk'),(53,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:23',NULL,'9837361f0e7869e654e5ea353a720a156aa43c68','tbk'),(54,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:26',NULL,'944df3e7b9b0a8af5193c0664ed475ccb5cd5a0e','tbk'),(55,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:29',NULL,'66b89f0e8c92b79509368bb41fd29f5372e7c6e5','tbk'),(56,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:33',NULL,'45a949297e8a55d88976c710ca82e546dc3478fc','tbk'),(57,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:36',NULL,'cbb4cf25aebb19b33ffc4f5dcfeed37ea4b62516','tbk'),(58,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:39',NULL,'0142182121742e905ee406595d8f07a41c35909b','tbk'),(59,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:42',NULL,'9cce1e06b9013aab2061fc83d663216a6318e4e1','tbk'),(60,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:46',NULL,'20a0162b6f9bdb4521c927c7451c16b35087491b','tbk'),(61,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:49',NULL,'d79ee3080deae41f7203fe6b7c5e9038c8253d13','tbk'),(62,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:16:53',NULL,'e2b7d2862f28ab8476f3904e13ca0c5d50debe94','tbk'),(63,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:02',NULL,'7abde3fb762036e13bdd2d481073336d66e5bc45','tbk'),(64,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:05',NULL,'9f58ac359daf76a674016ec108b5103ca700690f','tbk'),(65,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:08',NULL,'d2c93b31a8030215d4cb68c02f3ebddfa718b49a','tbk'),(66,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:11',NULL,'78f2b30105d87421ec6b3228ca3c548c4c07b465','tbk'),(67,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:15',NULL,'fb5adaaa9cc7ab573448b324ff8be5a55c7601c8','tbk'),(68,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:19',NULL,'3ba21e6ab2ebb90e07294896ad9d45aef7c0a65e','tbk'),(69,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:22',NULL,'04c022e1298b81c9310563e2d7d17d9ef1f40e2f','tbk'),(70,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:26',NULL,'15cd3ee52161dd13bed5667cdf924da03cf6e472','tbk'),(71,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:30',NULL,'adc1e23b8d298df313333746cdf15d3c6cc876f2','tbk'),(72,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:34',NULL,'6d575cb1d7b5793e0105ac001f81aad1a1590df1','tbk'),(73,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:37',NULL,'694f3594640e02244ec56025b038b30005641d2f','tbk'),(74,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:41',NULL,'d56f454436f036025e1f81c93dcd35f0387b7bc4','tbk'),(75,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:53',NULL,'5918b516e75bb98d49789a5b021183d207311e54','tbk'),(76,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:17:56',NULL,'7e9394217baa6058d26fd9e7f48756e1db379a35','tbk'),(77,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:00',NULL,'64bdf5d9b82a2a4028f93ff075ef7a66f412fe36','tbk'),(78,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:03',NULL,'d573919d829179204fa2d879d714fe3fa53056bc','tbk'),(79,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:06',NULL,'d98cc698815509214f408b47ab39e56282f611ec','tbk'),(80,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:10',NULL,'00193c2f4a65df1fa6544c2b523d8408cc0d4faa','tbk'),(81,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:13',NULL,'0d6609be80fd4fc44cc4d9dc761033ee48c4c420','tbk'),(82,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:17',NULL,'5b113bac4599c33ac4b22a261b8c1d5acaf03301','tbk'),(83,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:20',NULL,'f7f79a94d9f992f4d06024805c85548a34d68a5f','tbk'),(84,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:24',NULL,'f7bb23ccb9829ecad3b2a148c965ac75b15d228a','tbk'),(85,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:41',NULL,'4eaffc3c6d041acbd0e9652e69a9de21a9c8b602','tbk'),(86,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:45',NULL,'d5f3e8ce92c8acb02ac2a0411d289d4e19f67b36','tbk'),(87,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:48',NULL,'ff5ccb60f090fbf6503e0af773ab0b0c7634b546','tbk'),(88,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:51',NULL,'1b56c38aee33fab86e6f38d28ed544a05cb5670d','tbk'),(89,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:55',NULL,'0014a15cef082f52bb06c7d4b63289e901a09aba','tbk'),(90,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:18:59',NULL,'bc1bb1ed833a931e68bd7a8e502dfe1256493330','tbk'),(91,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:03',NULL,'98d5ba575fe9c4b091ac7734009e050bda8b5c9a','tbk'),(92,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:06',NULL,'6676689590cee1e84f9eb93a011a9d9f00f2487a','tbk'),(93,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:10',NULL,'a2aea700c7ca3ce3f73b68432e815b17acea40f6','tbk'),(94,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:14',NULL,'7bf99415eded01ea53fa598dfe0c60aabe232ac1','tbk'),(95,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:17',NULL,'ea908f67d8fadf093c766f5d7ced1c0dfbefce0f','tbk'),(96,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:21',NULL,'cef97a54df70820bc81278c8520d64b78a8deded','tbk'),(97,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:25',NULL,'361c0675150cb50801ced07373a5763716747b01','tbk'),(98,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:29',NULL,'8eb8141f85b8a3644affd9c876bc9a18d341e587','tbk'),(99,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:32',NULL,'45ffb86051a35ac541ae489926635f44a07edb89','tbk'),(100,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:36',NULL,'1988a3c1028951b1eef9c4c1220a928a6d004697','tbk'),(101,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:40',NULL,'c1cabaddc28520f5948a4ed6965f8952965cd435','tbk'),(102,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:44',NULL,'b2fa9e9b464da1667cd3e362a11012473407f47f','tbk'),(103,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:48',NULL,'c5b5b91fb323210744067480ace6acab9e806573','tbk'),(104,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:51',NULL,'f6658d1a1c1f6dd2aaee962eeeeb4529b6e09b34','tbk'),(105,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:55',NULL,'965649f9cff2d7182a7dcc08c0908e71cc840542','tbk'),(106,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:19:58',NULL,'d6433f6d66f23986277c7dda5a7bbeae670b2327','tbk'),(107,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:20:02',NULL,'f51f6987d8d509f0346964b574f1c5fd962ef51c','tbk'),(108,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:20:06',NULL,'34c2e9082f46f4fea68b89800d5c42708b057af8','tbk'),(109,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:20:09',NULL,'dfd1d1d949e6502b5a4f38983f8a0951a1c906dd','tbk'),(110,NULL,2,'<p><span style=\"color: rgb(129, 136, 146); font-family: Roboto, arial, sans-serif; font-size: 15px; background-color: rgb(245, 246, 247);\">Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur laboris sunt venison, et laborum dolore minim non meatbal</span><br></p>',NULL,NULL,NULL,1,'2019-07-30 09:20:25',NULL,'a70ad1086ee48a9c8ad0b5bb00dc0f4c9e076fc0','tbk');
/*!40000 ALTER TABLE `feeling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flike`
--

DROP TABLE IF EXISTS `flike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feeling_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5D77EA5F5F37A13B` (`token`),
  KEY `IDX_5D77EA5FCB9214C2` (`feeling_id`),
  KEY `IDX_5D77EA5FA76ED395` (`user_id`),
  CONSTRAINT `FK_5D77EA5FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_5D77EA5FCB9214C2` FOREIGN KEY (`feeling_id`) REFERENCES `feeling` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flike`
--

LOCK TABLES `flike` WRITE;
/*!40000 ALTER TABLE `flike` DISABLE KEYS */;
INSERT INTO `flike` VALUES (1,2,5,'2019-07-10 14:35:47',NULL,1,'528bc691b7981b2b2655ac233c0e2cd664027381'),(2,37,5,'2019-07-13 16:03:22',NULL,1,'9960377cc3c2317f230b240f99a62af43f390d44'),(3,36,5,'2019-07-13 16:03:30',NULL,1,'d5abb1851fdd74c059da798232ee0609a7c2e807'),(4,46,2,'2019-07-28 17:11:13',NULL,1,'3110989e33423f53d998046ae99325e144fdaba9');
/*!40000 ALTER TABLE `flike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `friend` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `cast` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_55EEAC615F37A13B` (`token`),
  KEY `IDX_55EEAC618D93D649` (`user`),
  KEY `IDX_55EEAC6155EEAC61` (`friend`),
  CONSTRAINT `FK_55EEAC6155EEAC61` FOREIGN KEY (`friend`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_55EEAC618D93D649` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend`
--

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend` DISABLE KEYS */;
INSERT INTO `friend` VALUES (1,1,1,1,1,1,'2019-07-08 10:00:25',NULL,'c4912078cedcb2f9cb00cf14ba758b1ad835c6dc'),(2,1,1,1,1,1,'2019-07-08 10:00:25',NULL,'b6b7f2a7deec9f36d280f033193a05d6e1c6b486'),(3,2,1,1,1,1,'2019-07-08 10:01:35',NULL,'396e6d597e35ebc3df4a5f75fbaba2fc74eecb80'),(4,1,2,1,1,1,'2019-07-08 10:01:35',NULL,'81edcda5ffa45f869c57de1464ad1f516e2ca104'),(5,3,1,1,1,1,'2019-07-08 10:03:28',NULL,'87fb0e3d0433fc38ce7ecf4fb23882b65ca44ce2'),(6,1,3,1,1,1,'2019-07-08 10:03:28',NULL,'fa29537fec1f4e6a99055e57843559a2685f03e6'),(7,2,3,1,1,0,'2019-07-08 10:06:58','2019-07-08 10:09:33','9b8ce78539d6d8e1392d1d64ef6a9e5dae665d6e'),(8,3,2,1,1,0,'2019-07-08 10:09:33',NULL,'8f3da53b306bdbc7cbacff4d23584435741a6cfb'),(9,4,1,1,1,1,'2019-07-10 13:43:08',NULL,'907e9c9d6aa47664dfc11fad55b445fd76c48fb0'),(10,1,4,1,1,1,'2019-07-10 13:43:08',NULL,'568ca07d3a69d41bca59a83a41d0acec4b4b9cfb'),(11,5,1,1,1,1,'2019-07-10 14:14:44',NULL,'a61133dce0a0641c2c4f99ccc1462f8f83cd8914'),(12,1,5,1,1,1,'2019-07-10 14:14:44',NULL,'61915bf65be7bb461968e69315b39c147c4f3f38'),(13,5,4,1,0,0,'2019-07-10 14:36:30',NULL,'d57089aca0c30bbb75d8d8875c05f751474ab5b9'),(14,2,5,1,1,0,'2019-07-13 10:42:34','2019-07-13 10:42:47','455e52d72f18601abfc87833398bca10418fb2ae'),(15,5,2,1,1,0,'2019-07-13 10:42:47',NULL,'3e16f63187d16202c55b2cccdd8665edbc85b18b'),(16,6,1,1,1,1,'2019-07-13 17:52:32',NULL,'3817b6765ff8c4bdac91e86e3e32f355074ab3d0'),(17,1,6,1,1,1,'2019-07-13 17:52:32',NULL,'f9970106fa2e6aa507c2829b8c94ee84188729a7');
/*!40000 ALTER TABLE `friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fshare`
--

DROP TABLE IF EXISTS `fshare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fshare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feeling_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_464B27A35F37A13B` (`token`),
  KEY `IDX_464B27A3CB9214C2` (`feeling_id`),
  KEY `IDX_464B27A3A76ED395` (`user_id`),
  CONSTRAINT `FK_464B27A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_464B27A3CB9214C2` FOREIGN KEY (`feeling_id`) REFERENCES `feeling` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fshare`
--

LOCK TABLES `fshare` WRITE;
/*!40000 ALTER TABLE `fshare` DISABLE KEYS */;
INSERT INTO `fshare` VALUES (1,2,5,'2019-07-10 14:35:51',NULL,1,'a42c99bc6fb915d5799d743d32321bd0840aa0aa'),(2,16,5,'2019-07-13 16:13:09',NULL,1,'d0e1807df3b324f0682e03ddfb3528c546e582ac');
/*!40000 ALTER TABLE `fshare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `shared` int(11) DEFAULT NULL,
  `liked` int(11) DEFAULT NULL,
  `commented` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_472B783A5F37A13B` (`token`),
  KEY `IDX_472B783AA76ED395` (`user_id`),
  CONSTRAINT `FK_472B783AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gcomment`
--

DROP TABLE IF EXISTS `gcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B614FBD95F37A13B` (`token`),
  KEY `IDX_B614FBD94E7AF8F` (`gallery_id`),
  KEY `IDX_B614FBD9A76ED395` (`user_id`),
  CONSTRAINT `FK_B614FBD94E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`),
  CONSTRAINT `FK_B614FBD9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gcomment`
--

LOCK TABLES `gcomment` WRITE;
/*!40000 ALTER TABLE `gcomment` DISABLE KEYS */;
/*!40000 ALTER TABLE `gcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glike`
--

DROP TABLE IF EXISTS `glike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6017C3EF5F37A13B` (`token`),
  KEY `IDX_6017C3EF4E7AF8F` (`gallery_id`),
  KEY `IDX_6017C3EFA76ED395` (`user_id`),
  CONSTRAINT `FK_6017C3EF4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`),
  CONSTRAINT `FK_6017C3EFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glike`
--

LOCK TABLES `glike` WRITE;
/*!40000 ALTER TABLE `glike` DISABLE KEYS */;
/*!40000 ALTER TABLE `glike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gshare`
--

DROP TABLE IF EXISTS `gshare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gshare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D17F4065F37A13B` (`token`),
  KEY `IDX_8D17F4064E7AF8F` (`gallery_id`),
  KEY `IDX_8D17F406A76ED395` (`user_id`),
  CONSTRAINT `FK_8D17F4064E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`),
  CONSTRAINT `FK_8D17F406A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gshare`
--

LOCK TABLES `gshare` WRITE;
/*!40000 ALTER TABLE `gshare` DISABLE KEYS */;
/*!40000 ALTER TABLE `gshare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3964F3375F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hobby`
--

LOCK TABLES `hobby` WRITE;
/*!40000 ALTER TABLE `hobby` DISABLE KEYS */;
/*!40000 ALTER TABLE `hobby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FBD8E0F85F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lived`
--

DROP TABLE IF EXISTS `lived`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lived` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DEE7FB995F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lived`
--

LOCK TABLES `lived` WRITE;
/*!40000 ALTER TABLE `lived` DISABLE KEYS */;
/*!40000 ALTER TABLE `lived` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `methodlist`
--

DROP TABLE IF EXISTS `methodlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `methodlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controllerlist_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B1B8F5B35F37A13B` (`token`),
  KEY `IDX_B1B8F5B34B8D3706` (`controllerlist_id`),
  CONSTRAINT `FK_B1B8F5B34B8D3706` FOREIGN KEY (`controllerlist_id`) REFERENCES `controllerlist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `methodlist`
--

LOCK TABLES `methodlist` WRITE;
/*!40000 ALTER TABLE `methodlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `methodlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  `viewed` tinyint(1) NOT NULL,
  `from_page` int(11) NOT NULL,
  `self_page` int(11) DEFAULT NULL,
  `from_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BF5476CA5F37A13B` (`token`),
  KEY `IDX_BF5476CA8C518555` (`user1`),
  KEY `IDX_BF5476CA1558D4EF` (`user2`),
  CONSTRAINT `FK_BF5476CA1558D4EF` FOREIGN KEY (`user2`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_BF5476CA8C518555` FOREIGN KEY (`user1`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,2,3,1,1,0,NULL,'2019-07-08 10:06:54',NULL,'286fc6130fa99960f64c864293c2c0ffff95dbfa'),(2,2,3,1,4,0,NULL,'2019-07-08 10:06:58',NULL,'1bdb15eebd781da15c0a2f9c4bc837e43cea1d33'),(3,2,3,1,1,0,NULL,'2019-07-08 10:06:58',NULL,'aee5015acdb1680e99a7f8dd38d6f53ab585884c'),(4,3,2,1,5,0,NULL,'2019-07-08 10:09:33',NULL,'408cf3e7ba672fd6cf9adfd719956befb712663a'),(5,2,3,1,1,0,NULL,'2019-07-10 12:07:18',NULL,'105aec55670c2c6ed7be320507fb75862d74ed34'),(6,3,2,1,1,0,NULL,'2019-07-10 12:07:55',NULL,'e108d5be71d887a117a2dd6a2288fa9ebb9e2ba2'),(7,3,2,1,1,0,NULL,'2019-07-10 12:18:55',NULL,'bdd1ae14b582e8c8c8c17665915807bfd275d463'),(8,2,3,1,1,0,NULL,'2019-07-10 12:22:25',NULL,'a326f13de1c5dbcc9e50e1023b0e1d59bdb9b19d'),(9,3,2,1,1,0,NULL,'2019-07-10 12:22:59',NULL,'127d1ca6a22c5e3518d61ef6f45f23ce225af01a'),(10,4,3,1,1,0,NULL,'2019-07-10 14:00:49',NULL,'9812ceae467c1a2c920f42f059c05c995a0f32c3'),(11,5,1,0,2,0,'f2fbde65a436eeb217b825c159e3074486240375','2019-07-10 14:35:47',NULL,'169cdb9d2f32f8f087b2b604a112b7844ed9a0b6'),(12,5,1,0,6,0,'50add9768f51dc411384bee9c594570ef4f668b3','2019-07-10 14:35:51',NULL,'01b286f7e91cdf89f8fed8928e44ced42bf3221f'),(13,5,1,0,3,0,'f2fbde65a436eeb217b825c159e3074486240375','2019-07-10 14:36:01',NULL,'9bd1b9956bbd2fbc567e82e41f0673870547f138'),(14,5,4,0,1,0,NULL,'2019-07-10 14:36:24',NULL,'1b9e9229aef52ef93deb8ad610b8ff62531fcd95'),(15,5,4,0,4,0,NULL,'2019-07-10 14:36:30',NULL,'c0de79edb31393ed05cc16859aa62d6e9e6c9829'),(16,5,4,0,1,0,NULL,'2019-07-10 14:36:31',NULL,'f077eae12a3d028673148f2546518a014fe9aaf9'),(17,5,2,1,1,0,NULL,'2019-07-10 14:36:39',NULL,'d7c215abfe96759fdcc7af229c68229d00e28071'),(18,5,3,1,1,0,NULL,'2019-07-10 14:41:25',NULL,'52d38dc92079b2ecfb908c6f2b218dd678ca21fa'),(19,5,3,1,1,0,NULL,'2019-07-10 14:42:51',NULL,'60eb4fe37d840998824825fd2e91b85c0505a7eb'),(20,2,5,1,1,0,NULL,'2019-07-13 10:42:32',NULL,'5c2f567cd235c0e89f793208b6490d5e9fca51da'),(21,2,5,1,4,0,NULL,'2019-07-13 10:42:34',NULL,'783e961d0317e12cfa1d98763b750420ca71d6aa'),(22,2,5,1,1,0,NULL,'2019-07-13 10:42:35',NULL,'fea9004f73faeb7bf34dd9f5c6f555c1239f18c3'),(23,5,2,1,5,0,NULL,'2019-07-13 10:42:47',NULL,'d15b9854f18c9b73bad8535ac06ed5ab04da8b4e'),(24,5,5,0,2,5,'2c9824c8e62494984b04ce707c494376dd2fb342','2019-07-13 16:03:22',NULL,'dbcb2aa668f74425e6a3d146b104553ca5d5086f'),(25,5,2,1,2,0,'1aa9fcbbd6af0cb4a309abdaba0d2ff4baabb5ba','2019-07-13 16:03:30',NULL,'8337bcfab17f3d141de813c2998950bf30abca28'),(26,5,2,1,3,0,'23608e3432e6ec900a88a100660a7e8fd867aeba','2019-07-13 16:09:32',NULL,'ef6b5328a6f657bb090b7eedb46bf6577b5baa1d'),(27,5,2,1,6,0,'1fba809c18467cf8305af934ca0b41ab3861f5fe','2019-07-13 16:13:09',NULL,'99fed9f6f3f9b32b5c05f426d4a6086708f007c8'),(28,5,5,0,3,5,'cd927737982a320b81a409e38c17b0658134401e','2019-07-13 16:43:40',NULL,'a8883228811f1a3436177e4d7c1b5c883d3c0109'),(29,6,5,0,1,0,NULL,'2019-07-16 03:16:38',NULL,'a738f5b76788f98419988c8753a44daf95b590bb'),(30,2,2,0,2,2,'b44e57c9cb92c2c7ff229c1e2d0b4503a712354a','2019-07-28 17:11:13',NULL,'caefa2a7c1a27c5e09efc6181c60f10ddd5ce881'),(31,3,5,0,1,0,NULL,'2020-01-11 06:28:46',NULL,'682a2dfdc543955bb6357268012515e08366ba3e');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DD5A5B7D5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `about` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8157AA0F5F37A13B` (`token`),
  UNIQUE KEY `UNIQ_8157AA0FA76ED395` (`user_id`),
  CONSTRAINT `FK_8157AA0FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,1,'Bukuteman Official',NULL,NULL,NULL,NULL,NULL,'2019-07-08 10:00:25','2019-07-08 10:05:08','3b94447551d42d08ddedb5afbd15ed02f50dae72'),(2,2,'jaka1',NULL,NULL,NULL,NULL,NULL,'2019-07-08 10:01:35',NULL,'2c07bad07e79a68304218699c40289fc6668f767'),(3,3,'jaka2',NULL,NULL,NULL,NULL,NULL,'2019-07-08 10:03:28',NULL,'9c5b5a77557ac703ad3cad5c58920068f7428986'),(4,4,'jaka3',NULL,NULL,NULL,NULL,NULL,'2019-07-10 13:43:08',NULL,'0322cd2799fa98ab1b340241ca0df09d5036c81f'),(5,5,'Jaka sanjaya',NULL,NULL,NULL,NULL,NULL,'2019-07-10 14:14:44','2019-07-13 17:21:00','01375c471a9011637a30ee73f3ae1522c2d30053'),(6,6,'Rani Kusuma',NULL,NULL,NULL,NULL,NULL,'2019-07-13 17:52:32','2019-07-15 16:05:29','88fd140269126021fe916b588dc965130513d689');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4ADAD40B5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religy`
--

DROP TABLE IF EXISTS `religy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_936979B85F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religy`
--

LOCK TABLES `religy` WRITE;
/*!40000 ALTER TABLE `religy` DISABLE KEYS */;
/*!40000 ALTER TABLE `religy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sallary`
--

DROP TABLE IF EXISTS `sallary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sallary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D3B3683B5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sallary`
--

LOCK TABLES `sallary` WRITE;
/*!40000 ALTER TABLE `sallary` DISABLE KEYS */;
/*!40000 ALTER TABLE `sallary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sex`
--

DROP TABLE IF EXISTS `sex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EFA269F75F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sex`
--

LOCK TABLES `sex` WRITE;
/*!40000 ALTER TABLE `sex` DISABLE KEYS */;
/*!40000 ALTER TABLE `sex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smoking`
--

DROP TABLE IF EXISTS `smoking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smoking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6C6DDBAF5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smoking`
--

LOCK TABLES `smoking` WRITE;
/*!40000 ALTER TABLE `smoking` DISABLE KEYS */;
/*!40000 ALTER TABLE `smoking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7B00651C5F37A13B` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `broad` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D6495F37A13B` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,'jaka@juki.com','zKgdNE7BHguhCKv+42U0WnRCbF8DgMJRQCi2aqzk3vMGfP0ZNIIes6SK+aE6cZtlVm4rEKfY4earvqcNGIMuSA==','jaka@juki.com',NULL,NULL,NULL,NULL,1,NULL,NULL,'jaka@juki.com.png','2007-07-20',1,1,'2019-07-08 10:00:25','2019-07-08 10:00:59','b784a1744779f21064d0cce6fcd8e5a3c9395d7d'),(2,NULL,'jaka1@juki.com','zKgdNE7BHguhCKv+42U0WnRCbF8DgMJRQCi2aqzk3vMGfP0ZNIIes6SK+aE6cZtlVm4rEKfY4earvqcNGIMuSA==','jaka1@juki.com',NULL,NULL,NULL,NULL,1,NULL,NULL,'5d22fc3bf2016.jpeg','2007-07-19',0,1,'2019-07-08 10:01:35','2019-07-30 09:20:25','bc73d997371e61f75f38c8553d2617f32926dd90'),(3,NULL,'jaka2@juki.com','zKgdNE7BHguhCKv+42U0WnRCbF8DgMJRQCi2aqzk3vMGfP0ZNIIes6SK+aE6cZtlVm4rEKfY4earvqcNGIMuSA==','jaka2@juki.com',NULL,NULL,NULL,NULL,1,NULL,NULL,'jaka2@juki.com.png','2007-07-06',0,1,'2019-07-08 10:03:28','2019-07-08 10:27:23','8f6c3785a64366f30992136659ba83f0ede231fd'),(4,NULL,'jaka3@juki.com','zKgdNE7BHguhCKv+42U0WnRCbF8DgMJRQCi2aqzk3vMGfP0ZNIIes6SK+aE6cZtlVm4rEKfY4earvqcNGIMuSA==','jaka3@juki.com',NULL,NULL,NULL,NULL,2,NULL,NULL,'jaka3@juki.com.png','2002-07-10',0,1,'2019-07-10 13:43:08','2019-07-10 13:43:08','c296d1695bef7db1d3718d1c8b4ef383c7c7f98e'),(5,NULL,'jaka4@juki.com','zKgdNE7BHguhCKv+42U0WnRCbF8DgMJRQCi2aqzk3vMGfP0ZNIIes6SK+aE6cZtlVm4rEKfY4earvqcNGIMuSA==','jaka4@juki.com',NULL,NULL,NULL,NULL,1,NULL,NULL,'5d29fcc3ae9aa.png','2002-07-10',0,1,'2019-07-10 14:14:44','2019-07-13 17:46:11','3ab28e01cfb5db92e78db5c7b94b11a689dc6860'),(6,NULL,'jaka6@juki.com','zKgdNE7BHguhCKv+42U0WnRCbF8DgMJRQCi2aqzk3vMGfP0ZNIIes6SK+aE6cZtlVm4rEKfY4earvqcNGIMuSA==','jaka6@juki.com',NULL,NULL,NULL,NULL,2,NULL,NULL,'jaka6@juki.com.png','2002-07-19',0,1,'2019-07-13 17:52:32','2019-07-15 16:06:30','50c9d72eb3bb04c6a4e5262ecc2e4b3050a6276f');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usercriteria`
--

DROP TABLE IF EXISTS `usercriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usercriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `hobby_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `education_id` int(11) DEFAULT NULL,
  `sallary_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `lived_id` int(11) DEFAULT NULL,
  `smoking_id` int(11) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `religy_id` int(11) DEFAULT NULL,
  `alcoholic_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9A5A64F65F37A13B` (`token`),
  UNIQUE KEY `UNIQ_9A5A64F6A76ED395` (`user_id`),
  KEY `IDX_9A5A64F66BF700BD` (`status_id`),
  KEY `IDX_9A5A64F6322B2123` (`hobby_id`),
  KEY `IDX_9A5A64F6BE04EA9` (`job_id`),
  KEY `IDX_9A5A64F62CA1BD71` (`education_id`),
  KEY `IDX_9A5A64F6B133CC0B` (`sallary_id`),
  KEY `IDX_9A5A64F6E946114A` (`province_id`),
  KEY `IDX_9A5A64F68BAC62AF` (`city_id`),
  KEY `IDX_9A5A64F65DA5093C` (`lived_id`),
  KEY `IDX_9A5A64F6E5AADE30` (`smoking_id`),
  KEY `IDX_9A5A64F65A2DB2A0` (`sex_id`),
  KEY `IDX_9A5A64F6679F7148` (`religy_id`),
  KEY `IDX_9A5A64F6E910A21` (`alcoholic_id`),
  KEY `IDX_9A5A64F6E899029B` (`plan_id`),
  CONSTRAINT `FK_9A5A64F62CA1BD71` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`),
  CONSTRAINT `FK_9A5A64F6322B2123` FOREIGN KEY (`hobby_id`) REFERENCES `hobby` (`id`),
  CONSTRAINT `FK_9A5A64F65A2DB2A0` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id`),
  CONSTRAINT `FK_9A5A64F65DA5093C` FOREIGN KEY (`lived_id`) REFERENCES `lived` (`id`),
  CONSTRAINT `FK_9A5A64F6679F7148` FOREIGN KEY (`religy_id`) REFERENCES `religy` (`id`),
  CONSTRAINT `FK_9A5A64F66BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_9A5A64F68BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `FK_9A5A64F6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_9A5A64F6B133CC0B` FOREIGN KEY (`sallary_id`) REFERENCES `sallary` (`id`),
  CONSTRAINT `FK_9A5A64F6BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  CONSTRAINT `FK_9A5A64F6E5AADE30` FOREIGN KEY (`smoking_id`) REFERENCES `smoking` (`id`),
  CONSTRAINT `FK_9A5A64F6E899029B` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`),
  CONSTRAINT `FK_9A5A64F6E910A21` FOREIGN KEY (`alcoholic_id`) REFERENCES `alcoholic` (`id`),
  CONSTRAINT `FK_9A5A64F6E946114A` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usercriteria`
--

LOCK TABLES `usercriteria` WRITE;
/*!40000 ALTER TABLE `usercriteria` DISABLE KEYS */;
INSERT INTO `usercriteria` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-08 10:00:25',NULL,'9ed31dfb6538587f77a607b56550aa228e5e760e'),(2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-08 10:01:35',NULL,'78f119611794a331ebe2cbf13d65d67dbb77e061'),(3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-08 10:03:28',NULL,'ce769e43d1768205fad117d4744b68d7f8eec3ef'),(4,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-10 13:43:08',NULL,'7fa81c98cb4f462b89e466bb5a342e790c3cad68'),(5,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-10 14:14:44',NULL,'ae6b2d2691fa6b6f32c4af0b5bb7eccec0d21ea1'),(6,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-13 17:52:32',NULL,'71d3ed17bd7d1e0f1edaf32bf9cc83fa58029bed');
/*!40000 ALTER TABLE `usercriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdoing`
--

DROP TABLE IF EXISTS `userdoing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdoing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_81DFBF6A5F37A13B` (`token`),
  KEY `IDX_81DFBF6AA76ED395` (`user_id`),
  CONSTRAINT `FK_81DFBF6AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdoing`
--

LOCK TABLES `userdoing` WRITE;
/*!40000 ALTER TABLE `userdoing` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdoing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `login_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `logout_at` datetime NOT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mac_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4E107E605F37A13B` (`token`),
  KEY `IDX_4E107E60A76ED395` (`user_id`),
  CONSTRAINT `FK_4E107E60A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlog`
--

LOCK TABLES `userlog` WRITE;
/*!40000 ALTER TABLE `userlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `userlog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-11 12:32:21
