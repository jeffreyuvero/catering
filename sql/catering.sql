CREATE DATABASE  IF NOT EXISTS `catering` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `catering`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: catering
-- ------------------------------------------------------
-- Server version	5.6.25

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
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL COMMENT 'a group name for the user',
  `desciption` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='it containes the list of group of the user';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,'sysprog','super user of the website'),(2,'admin','administrator'),(3,'staff','admin staff'),(4,'client','client ');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `contact_num` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='it contained the basic information of the user';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (1,1,'Janine',NULL,'dummy',NULL),(2,2,'John',NULL,'Doe',NULL),(3,3,'Hello',NULL,'Kitty',NULL),(4,4,'Jerry',NULL,'Yan',NULL),(5,5,'Ericson',NULL,'Rodriguez',NULL),(6,6,'Joshua',NULL,'Sibalde',NULL),(7,7,'Corney',NULL,'Quirino',NULL),(8,8,'Rachel Anne',NULL,'Dalida',NULL),(9,9,'Kyle ',NULL,'Garret',NULL),(10,10,'Phil',NULL,'Coulson',NULL),(11,11,'Phil',NULL,'Coulson',NULL),(12,12,'Leofold',NULL,'Fitz',NULL),(13,13,'Jeffrey',NULL,'Uvero',NULL);
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `time_register` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='it contained the security information of the user (e,g username and password)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,'$2y$10$WcOsPFPNMLCD0LWUVP3CGeOXkHniyNP40iXKPta3E.GYUlkdHrfaC','janine@gmail.com',0,'2018-08-11','07:08:41'),(2,NULL,'$2y$10$8nRGojxdLz7aaIQ5NfBRSOJzjFFL3JOdKGgIOeOsWXm03rrJF0/Qa','jdoe@gmail.com',0,'2018-08-12','02:41:20'),(3,NULL,'$2y$10$3j8apDfTGz3CaqNdRnBDMOFvtA/Um.WqIY/PfYxFFyQGkxKh75OaK','hkitty@gmail.com',0,'2018-08-12','02:51:50'),(4,NULL,'$2y$10$sgtBygNpU344/m30ZZ/kw.NYKnEoA.CkY6wRfACP4MgBKs/.2FjmG','jyan@gmail.com',0,'2018-08-12','02:53:38'),(5,NULL,'$2y$10$QNopH5ZjwJNz6tD1KP6vTuE./dAHYv6vKkefNMSi.5UviMCSAWFG6','erod@gmail.com',0,'2018-08-12','02:54:34'),(6,NULL,'$2y$10$TLF42O4QMGYlbCYsp8p07.B3qIJNvX7PnL6Z8KLcXwN4SzDudOQee','js@gmail.com',0,'2018-08-12','03:06:44'),(7,NULL,'$2y$10$cjbmJTm0N5/Mf.pHmNEp6ejnsC1QB9nIJ3wy8DBTytswWZQOyCCuq','cquirino@gmail.com',0,'2018-08-12','03:07:42'),(8,NULL,'$2y$10$4I.3aSJA/WuMsGtF56wHZeqVX7kJEmfe/Zgwx864N1BFIbwNJV5UK','radalida@gmail.com',0,'2018-08-12','03:08:48'),(9,NULL,'$2y$10$u.bZ8ps37bx0vK.scnVSauZDOuwUzeXKcbKkRHiEZUVadFl6yjrIK','kgarret@gmail.com',0,'2018-08-12','03:14:47'),(10,NULL,'$2y$10$aFX4.OU8M6YKRGztCtsVdeJOfUObEpIh4yWzkvqJ3DZCLuMdBHXsi','pcolson@gmail.com',0,'2018-08-12','03:16:29'),(11,NULL,'$2y$10$674KTvJSehP9UmF9PpQehu2gs2Sm1dhW4gFA4WhDYfVcqeG6iroEy','pcolson111@gmail.com',0,'2018-08-12','03:17:50'),(12,NULL,'$2y$10$c8JPUqgpay8aBdutHjmYt.SbTneGRttltAeX9cJhrSFrokhJ9Tzfa','fitz@gmail.com',0,'2018-08-12','03:20:59'),(13,NULL,'$2y$10$U72lIg2JYNMvF9KGd2M4mucigvbzPzrxqY3BNns1WSgrpgjRrnXxC','admin@admin.com',0,'2018-08-14','15:20:45');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='this table containes the relation of the user table and the group table. it will determine the group of the user. ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,2,1),(2,4,2),(3,4,3),(4,2,4),(5,4,5),(6,4,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,1,11),(12,1,12),(13,4,13);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-15 22:36:07
