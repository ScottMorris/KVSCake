-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kvs
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Scott','Morris','scott.moris@gmail.com','2014-04-02 06:22:40','2014-04-02 06:22:40'),(2,'Scott','Morris','scottIBM@facebook.com','2014-04-02 06:26:37','2014-04-02 06:26:37'),(4,'Gerhard','Negrazis','','2014-04-04 07:18:15','2014-04-04 07:18:15'),(5,'Anthony','Smith','anthony@smith.com','2014-06-10 22:32:22','2014-06-10 22:32:22');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_item_id` int(10) unsigned NOT NULL,
  `warehouse_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_item_id` (`inventory_item_id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `inventories_ibfk_1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items` (`id`),
  CONSTRAINT `inventories_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES (3,6,20,12,'2014-04-02 22:24:57','2014-04-02 22:24:57'),(4,7,10,100,'2014-04-02 23:43:14','2014-04-02 23:43:14'),(5,9,10,5,'2014-04-03 03:42:45','2014-04-03 03:42:45'),(6,8,10,0,'2014-04-03 03:43:00','2014-04-03 03:43:00'),(7,8,13,12,'2014-04-03 11:44:01','2014-04-03 11:44:01'),(8,17,20,10,'2014-04-03 12:30:39','2014-04-03 12:30:39'),(9,20,10,40,'2014-04-04 07:47:04','2014-04-04 07:47:04'),(10,20,13,2,'2014-04-04 07:47:24','2014-04-04 07:47:24'),(11,22,10,3,'2014-04-04 07:52:40','2014-04-04 07:52:40'),(12,8,10,12,'2014-04-05 06:24:22','2014-04-05 06:24:22'),(13,22,20,1,'2014-04-05 06:45:11','2014-04-05 06:45:11'),(21,24,13,148,'2014-05-01 04:03:11','2014-05-01 04:03:11'),(22,24,20,10,'2014-05-01 04:05:17','2014-05-01 04:05:17');
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_items`
--

DROP TABLE IF EXISTS `inventory_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `description` text,
  `size` int(10) unsigned DEFAULT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `unit_cost` decimal(14,4) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unit_id` (`unit_id`),
  CONSTRAINT `inventory_items_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_items`
--

LOCK TABLES `inventory_items` WRITE;
/*!40000 ALTER TABLE `inventory_items` DISABLE KEYS */;
INSERT INTO `inventory_items` VALUES (5,'Ibuprofen','123456','Pain Killer',100,2,NULL,0,'2014-04-02 21:31:35','2014-04-02 21:31:35'),(6,'Tylenol','123457','Pain Killer',203,2,NULL,0,'2014-04-02 21:33:57','2014-04-02 21:33:57'),(7,'Penicillin (Procaine)','46711035','Dosage: 	1ml/100 lbs. Once a day\r\nIndication: Bacterial pneumonia, Organisms susceptible',150,3,NULL,1,'2014-04-02 23:42:39','2014-04-02 23:42:39'),(8,'Mineral Oil','456789','Stuff',1,4,5.5000,1,NULL,NULL),(9,'CovexinÂ®-8','94575641','Vaccine',50,3,50.0000,1,'2014-04-03 00:33:38','2014-04-03 00:33:38'),(17,'Water','1234555','Wet',12,4,12.0000,0,'2014-04-03 12:27:39','2014-04-03 12:27:39'),(20,'Anafen','012345','NSAID',100,3,102.3600,1,'2014-04-04 07:36:41','2014-04-04 07:36:41'),(22,'Bob','','BOb',NULL,1,NULL,0,'2014-04-04 07:52:17','2014-04-04 07:52:17'),(23,'Anafen','0123454634','fsf',3,1,1.0000,1,'2014-04-29 01:13:43','2014-04-29 01:13:43'),(24,'Kenney','12358971','Him',1,4,150.0000,1,'2014-05-01 04:02:54','2014-05-01 04:02:54');
/*!40000 ALTER TABLE `inventory_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_outgoing_items`
--

DROP TABLE IF EXISTS `inventory_outgoing_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_outgoing_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_item_id` int(10) unsigned NOT NULL,
  `warehouse_id` int(10) unsigned NOT NULL,
  `inventory_status_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `note_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_item_id` (`inventory_item_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `inventory_status_id` (`inventory_status_id`),
  KEY `client_id` (`client_id`),
  KEY `inventory_outgoing_items_ibfk_5` (`note_id`),
  CONSTRAINT `inventory_outgoing_items_ibfk_1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items` (`id`),
  CONSTRAINT `inventory_outgoing_items_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  CONSTRAINT `inventory_outgoing_items_ibfk_3` FOREIGN KEY (`inventory_status_id`) REFERENCES `inventory_statuses` (`id`),
  CONSTRAINT `inventory_outgoing_items_ibfk_4` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `inventory_outgoing_items_ibfk_5` FOREIGN KEY (`note_id`) REFERENCES `notes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_outgoing_items`
--

LOCK TABLES `inventory_outgoing_items` WRITE;
/*!40000 ALTER TABLE `inventory_outgoing_items` DISABLE KEYS */;
INSERT INTO `inventory_outgoing_items` VALUES (1,9,10,1,1,NULL,NULL,NULL),(2,5,10,1,1,NULL,'2014-04-30 04:09:26','2014-04-30 04:09:26'),(3,5,10,1,1,NULL,'2014-05-01 01:56:25','2014-05-01 01:56:25'),(4,5,10,1,1,NULL,'2014-05-01 02:00:04','2014-05-01 02:00:04'),(5,5,10,1,1,NULL,'2014-05-01 02:01:39','2014-05-01 02:01:39'),(6,5,10,1,1,NULL,'2014-05-01 02:03:13','2014-05-01 02:03:13'),(8,5,10,1,1,5,'2014-05-01 02:06:20','2014-05-01 02:06:20'),(9,5,10,1,1,6,'2014-05-01 02:11:50','2014-05-01 02:11:50'),(10,5,10,1,1,7,'2014-05-01 02:12:38','2014-05-01 02:12:38');
/*!40000 ALTER TABLE `inventory_outgoing_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_statuses`
--

DROP TABLE IF EXISTS `inventory_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_statuses` (
  `id` int(10) unsigned NOT NULL COMMENT 'Record ID',
  `name` varchar(45) NOT NULL COMMENT 'Status Name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_statuses`
--

LOCK TABLES `inventory_statuses` WRITE;
/*!40000 ALTER TABLE `inventory_statuses` DISABLE KEYS */;
INSERT INTO `inventory_statuses` VALUES (0,'Defective'),(1,'Sold');
/*!40000 ALTER TABLE `inventory_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Record ID',
  `text` text COMMENT 'Body of the Note',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'cat'),(2,'cat'),(3,'cat'),(4,'cat'),(5,'cat'),(6,'cat'),(7,'cat'),(8,'cow');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'The title','This is the post body.','2014-04-02 01:24:49',NULL),(2,'A title once again','And the post body follows.','2014-04-02 01:24:49',NULL),(3,'Title strikes back','This is really exciting! Not.','2014-04-02 01:24:49',NULL),(4,'This my first post entered throug the WebUI','Here is some body text.  It made the textarea for me!  I didn\'t have to do anything.  Pretty Slick!\r\n\r\nThis is an edit!','2014-04-02 02:54:58','2014-04-02 03:19:32'),(6,'Test 2','Yup','2014-04-02 03:48:49','2014-04-02 03:48:49');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `long_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'kg','Kilogram'),(2,'g','Gram'),(3,'mL','Milliliters'),(4,'L','Liters'),(5,'cm','centimetre');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_types`
--

DROP TABLE IF EXISTS `warehouse_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_types`
--

LOCK TABLES `warehouse_types` WRITE;
/*!40000 ALTER TABLE `warehouse_types` DISABLE KEYS */;
INSERT INTO `warehouse_types` VALUES (1,'Main'),(2,'Truck');
/*!40000 ALTER TABLE `warehouse_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `warehouse_type_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_type_id` (`warehouse_type_id`),
  CONSTRAINT `warehouses_ibfk_1` FOREIGN KEY (`warehouse_type_id`) REFERENCES `warehouse_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (10,'Hall','Jeff\'s Hall in the country',1,'2014-04-02 13:04:56','2014-04-02 13:04:56'),(13,'Kevin','The Open Road',2,'2014-04-02 13:25:33','2014-04-02 13:25:33'),(20,'Andrew','The Wilderness',2,'2014-04-02 19:45:18','2014-04-02 19:45:18');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-26  2:50:21
