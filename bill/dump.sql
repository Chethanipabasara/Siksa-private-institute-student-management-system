-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: student_fees
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

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
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,'Bio Science 12'),(2,'Bio Science 13'),(3,'Combined Maths 12'),(4,'Combined Maths 13'),(5,'Chemistry 12'),(6,'Chemistry 13');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `particulars`
--

DROP TABLE IF EXISTS `particulars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `particulars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `particulars`
--

LOCK TABLES `particulars` WRITE;
/*!40000 ALTER TABLE `particulars` DISABLE KEYS */;
INSERT INTO `particulars` VALUES (1,'New Admission',1200.00),(2,'Yearly',250.00),(3,'Diary',50.00),(4,'Tie',40.00),(5,'Belt',50.00),(6,'Ad Form',50.00),(7,'ID Card',30.00);
/*!40000 ALTER TABLE `particulars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt_month`
--

DROP TABLE IF EXISTS `receipt_month`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt_month` (
  `receipt_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`,`month`),
  CONSTRAINT `receipt_month___fk_receipt_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt_month`
--

LOCK TABLES `receipt_month` WRITE;
/*!40000 ALTER TABLE `receipt_month` DISABLE KEYS */;
INSERT INTO `receipt_month` VALUES (7,8),(7,9),(7,10),(7,11),(7,12),(8,4),(8,5),(8,6),(8,7),(8,8),(8,9),(9,6),(9,7),(9,8),(9,9);
/*!40000 ALTER TABLE `receipt_month` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt_particular`
--

DROP TABLE IF EXISTS `receipt_particular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt_particular` (
  `receipt_id` int(11) NOT NULL,
  `particular_id` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`,`particular_id`),
  KEY `receipt_particular___fk_particular_id` (`particular_id`),
  CONSTRAINT `receipt_particular___fk_particular_id` FOREIGN KEY (`particular_id`) REFERENCES `particulars` (`id`),
  CONSTRAINT `receipt_particular___fk_receipt_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt_particular`
--

LOCK TABLES `receipt_particular` WRITE;
/*!40000 ALTER TABLE `receipt_particular` DISABLE KEYS */;
INSERT INTO `receipt_particular` VALUES (7,1),(7,2),(7,3),(8,1),(8,4),(8,5),(8,7),(9,1),(9,2),(9,5),(9,6),(9,7);
/*!40000 ALTER TABLE `receipt_particular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stdName` varchar(50) NOT NULL,
  `regNo` varchar(20) DEFAULT NULL,
  `classId` int(11) NOT NULL,
  `depositDate` date NOT NULL,
  `depositedBy` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classId` (`classId`),
  CONSTRAINT `fk_classId` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT INTO `receipts` VALUES (7,'Randika','1',1,'2019-08-05','Father'),(8,'Sandun','2',6,'2019-08-05','Randika'),(9,'Sandun','2',6,'2019-08-05','Randika');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-06  7:18:28
