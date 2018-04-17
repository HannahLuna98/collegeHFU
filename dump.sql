-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: hire_from_us
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `car_registration` char(8) NOT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `capacity` int(10) unsigned DEFAULT NULL,
  `car_price` decimal(10,2) DEFAULT NULL,
  `car_available` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`car_registration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES ('AK02 MDF','Mazda','B-Series Plus','Red',5,250.00,0),('BM09 PLO','Chevrolet','Silverado 1500','Blue',5,120.00,1),('BY07 OLD','Isuzu','Hombre','Black',5,150.00,1),('DU18 MDK','Volkswagen','GTI','Silver',5,200.00,1),('DY04 MUG','Buick','Coachbuilder','Silver',5,250.00,1),('HN09 HJO','Infiniti','FX','Black',5,150.00,1),('LO05 SWD','Subaru','Justy','Blue',5,280.00,1),('PO98 QWF','Chevrolet','Silverado 2500','Silver',5,120.00,1);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL,
  `street` varchar(35) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `post_code` varchar(7) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Andyy','Pandy','1 Street','Yughy','BE9 2RE','07657458374','pandy@gmail.com'),(2,'Minda','Brimm','23 Road','Mibu','DY7 3EP','07485763453','mbrimmicombe1@imdb.com'),(3,'Marieann','McCall','32 Lake Rd','Ribeiro','BU9 9PK','07534985112','mmccall2@utexas.edu'),(4,'Tinky','Winky','LalaLand','Po Land','D1p 5y','07564736587','teletubbies@tummies.com');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hire`
--

DROP TABLE IF EXISTS `hire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hire` (
  `hire_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `salesperson_id` int(10) unsigned DEFAULT NULL,
  `car_registration` varchar(8) DEFAULT NULL,
  `insurance_cover` tinyint(1) DEFAULT NULL,
  `rent_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `days_hired` int(10) unsigned DEFAULT NULL,
  `hire_price` decimal(10,2) DEFAULT '0.00',
  `total_wage` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`hire_id`),
  KEY `fk_hire_customer` (`customer_id`),
  KEY `fk_hire_salesperson` (`salesperson_id`),
  KEY `fk_hire_car` (`car_registration`),
  CONSTRAINT `fk_hire_car` FOREIGN KEY (`car_registration`) REFERENCES `car` (`car_registration`),
  CONSTRAINT `fk_hire_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_hire_salesperson` FOREIGN KEY (`salesperson_id`) REFERENCES `salesperson` (`salesperson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hire`
--

LOCK TABLES `hire` WRITE;
/*!40000 ALTER TABLE `hire` DISABLE KEYS */;
INSERT INTO `hire` VALUES (1,1,1,'AK02 MDF',1,'2018-04-16','2018-04-17',2,500.00,25.00),(14,4,1,'HN09 HJO',0,'2013-01-04','2013-01-04',1,210.00,10.50),(15,3,1,'AK02 MDF',1,'2013-01-01','2013-01-01',1,250.00,12.50);
/*!40000 ALTER TABLE `hire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesperson`
--

DROP TABLE IF EXISTS `salesperson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesperson` (
  `salesperson_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`salesperson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesperson`
--

LOCK TABLES `salesperson` WRITE;
/*!40000 ALTER TABLE `salesperson` DISABLE KEYS */;
INSERT INTO `salesperson` VALUES (1,'John','Doe');
/*!40000 ALTER TABLE `salesperson` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-17 12:20:47
