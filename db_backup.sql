-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: testing
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `signup`
--

LOCK TABLES `signup` WRITE;
/*!40000 ALTER TABLE `signup` DISABLE KEYS */;
INSERT INTO `signup` VALUES (1,'Alex','tatefu@gmail.com','dz','0000-00-00'),(2,'Loyiso','tatefu@gmail.com','as','0000-00-00'),(3,'TEbogo','tatefu@gmail.com','er','0000-00-00'),(4,'Refu','tatefu@gmail.com','ai','0000-00-00'),(5,'King','Mosh','ba','0000-00-00'),(6,'Loyiso','Ngqwebo','ag','0000-00-00'),(7,'Hlonipha','regina@gmail.com','no','0000-00-00'),(8,'Hlonipha','regina@gmail.com','no','0000-00-00'),(9,'Reatlegile','tefurea@gmail.com','au','0000-00-00'),(10,'Reatlegile','tefurea@gmail.com','au','0000-00-00'),(11,'Reatlegile','tefurea@gmail.com','au','0000-00-00'),(12,'Clify','clify@gmail.com','at','0000-00-00'),(13,'Clify','clify@gmail.com','at','0000-00-00'),(14,'Morena','mor@test.com','bt','0000-00-00'),(15,'Morena','mor@test.com','bt','0000-00-00'),(16,'Morena','mor@test.com','bt','0000-00-00'),(17,'Morena','mor@test.com','bt','0000-00-00'),(18,'Morena','mor@test.com','bt','0000-00-00'),(19,'','','','0000-00-00'),(20,'','','','0000-00-00'),(21,'','','','0000-00-00'),(22,'','','','0000-00-00'),(23,'','','','0000-00-00'),(24,'','','','0000-00-00'),(25,'','','','0000-00-00'),(26,'','','','0000-00-00'),(27,'','','','0000-00-00'),(28,'','','','0000-00-00'),(29,'','','','0000-00-00'),(30,'','','','0000-00-00'),(31,'','','','0000-00-00'),(32,'','','','0000-00-00'),(33,'','','','0000-00-00'),(34,'','','','0000-00-00'),(35,'','','','0000-00-00'),(36,'','','','0000-00-00'),(37,'John','','bs','0000-00-00'),(38,'John','Tefu@John.com','bs','0000-00-00'),(39,'John','Tefu@John.com','bs','0000-00-00'),(40,'John','Tefu@John.com','bs','0000-00-00'),(41,'John','Tefu@John.com','bs','0000-00-00'),(42,'John','Tefu@John.com','bs','0000-00-00'),(43,'Tefu','tefuta@taf.com','Aruba','0000-00-00'),(44,'Tefu','tefuta@taf.com','Aruba','0000-00-00'),(45,'Tefu','tefuta@taf.com','Aruba','0000-00-00'),(46,'Tebogo','tatefu@gmail.com','Argentina','0000-00-00'),(47,'Tebogo','tatefu@gmail.com','Argentina','0000-00-00'),(48,'Alex','alex@gmail.com','Azerbaijan','0000-00-00'),(49,'Alex','alex@gmail.com','Azerbaijan','0000-00-00'),(50,'Alex','alex@gmail.com','Azerbaijan','0000-00-00'),(51,'Alex','alex@gmail.com','Azerbaijan','0000-00-00'),(52,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(53,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(54,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(55,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(56,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(57,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(58,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(59,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(60,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(61,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(62,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(63,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(64,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(65,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(66,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(67,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(68,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(69,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(70,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(71,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(72,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(73,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(74,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(75,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(76,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(77,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(78,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(79,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(80,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(81,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(82,'expression','Ngqwebo@gmail.com','Australia','0000-00-00'),(83,'expression','Ngqwebo@gmail.com','Australia','0000-00-00');
/*!40000 ALTER TABLE `signup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-04  9:18:05
