CREATE DATABASE  IF NOT EXISTS `ummrn` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ummrn`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: ummrn
-- ------------------------------------------------------
-- Server version	8.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcement` (
  `id_announcement` int NOT NULL AUTO_INCREMENT,
  `id_cop` int NOT NULL,
  `id_researcher` int NOT NULL,
  `announcement` text NOT NULL,
  `attachment` text NOT NULL,
  PRIMARY KEY (`id_announcement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cfps`
--

DROP TABLE IF EXISTS `cfps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cfps` (
  `id_cfp` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `criterion` text NOT NULL,
  `funding` float NOT NULL,
  `quota` int NOT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`id_cfp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cfps`
--

LOCK TABLES `cfps` WRITE;
/*!40000 ALTER TABLE `cfps` DISABLE KEYS */;
INSERT INTO `cfps` VALUES (1,3,'1. Experienced in Web Programming <br />\r\n2. Mobile programming is also considered <br />\r\n3. Willing to cooperate with other researchers <br />\r\n4. Willing to be supervised/contacted anytime when needed. <br />\r\n5. Having a strong motivation to complete in the appointed time.',2000000,3,'2020-11-30');
/*!40000 ALTER TABLE `cfps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `id_student` int NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`),
  KEY `id_project` (`id_project`),
  KEY `id_student` (`id_student`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (4,1,1,'Great project, very insightful!','2024-11-28 11:59:14'),(5,2,3,'Can you share the dataset for this project?','2024-11-28 11:59:14'),(6,3,1,'Looking forward to seeing more progress on this!','2024-11-28 12:05:52'),(7,3,3,'Hai!','2024-11-28 12:06:42'),(8,3,4,'Halo aku ulum','2024-11-28 19:23:31'),(9,3,4,'Ini project apa?','2024-11-28 19:24:38'),(10,3,4,'test1','2024-11-28 19:25:46'),(11,3,4,'test2','2024-11-28 19:26:04'),(12,3,4,'test2','2024-11-28 19:26:28'),(13,3,4,'test3','2024-11-28 19:28:42');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cops`
--

DROP TABLE IF EXISTS `cops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cops` (
  `id_cop` int NOT NULL AUTO_INCREMENT,
  `id_researcher` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_cop`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cops`
--

LOCK TABLES `cops` WRITE;
/*!40000 ALTER TABLE `cops` DISABLE KEYS */;
INSERT INTO `cops` VALUES (1,1,'Knowledge Management','Forum Group Discussion about Knowledge Management and its application.'),(2,2,'Software Engineering','Forum Group Discussion about Software Engineering and its cycles.');
/*!40000 ALTER TABLE `cops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cv` (
  `id_cv` int NOT NULL AUTO_INCREMENT,
  `id_researcher` int NOT NULL,
  `education` text NOT NULL,
  `skill` text NOT NULL,
  `teaching` text NOT NULL,
  `organization` text NOT NULL,
  `awards` text NOT NULL,
  `topics` text NOT NULL,
  `publications` text NOT NULL,
  PRIMARY KEY (`id_cv`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
INSERT INTO `cv` VALUES (1,1,'2011-2013 Master in Informatics (M.Kom) - Modeling and prototyping the Knowledge Management System on the higher education environment <br />\r\n2005-2009 Bachelor in Informatics (S.Kom) - Designing a clustering (High Availability) server on the intranet','1. Database Administrator <br />\r\n2. Web programming<br />\r\n3. Linux','1. Database Design <br/>\r\n2. Software Engineering<br/>\r\n3. Information System<br/>\r\n4. Software Project Management','-','-','1. Information System <br />\r\n2. Knowledge Management<br />\r\n3. e-Government<br />\r\n4. Reengineering (BRP & SR)<br />\r\n5. Project Management','[1] I. Nuryasin, Y. Prayudi, and T. Dirgahayu, “Prototype of Knowledge Management System for the Higher Education Institution in Indonesia,” Semin. Nas. Apl. Tenologi Inf., pp. 6–12, 2013. <br/>\r\n[2] I. Nuryasin, “Model Communities of Practice (CoP) Pada Kelas Paralel di Jurusan Teknik Informatika, Universitas Muhammadmiyah Malang,” Semin. Nas. Teknol. dan Rekayasa, vol. 2, pp. v78–v82, 2016. <br/>\r\n[3] I. Nuryasin, “Prototype of Personal Knowledge Management on Higher Education,” INFORMATIKA, vol. 1, 2018. Professional Membership - Association for Information Systems – Indonesia Chapter (AISINDO)');
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joinresearch`
--

DROP TABLE IF EXISTS `joinresearch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `joinresearch` (
  `id_joinresearch` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `id_student` int NOT NULL,
  `motivation` text NOT NULL,
  `status` enum('Waiting for Approval','Accepted','Declined') NOT NULL DEFAULT 'Waiting for Approval',
  PRIMARY KEY (`id_joinresearch`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joinresearch`
--

LOCK TABLES `joinresearch` WRITE;
/*!40000 ALTER TABLE `joinresearch` DISABLE KEYS */;
INSERT INTO `joinresearch` VALUES (1,3,1,'Ingin mendalami KM','Waiting for Approval'),(2,3,3,'I want to be an expert in KM.','Waiting for Approval');
/*!40000 ALTER TABLE `joinresearch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `id_cop` int NOT NULL,
  `id_researcher` int NOT NULL,
  `id_student` int NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,1,1,1),(2,1,2,2);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_members`
--

DROP TABLE IF EXISTS `project_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_members` (
  `id_project_member` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `id_researcher` int NOT NULL,
  PRIMARY KEY (`id_project_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_members`
--

LOCK TABLES `project_members` WRITE;
/*!40000 ALTER TABLE `project_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id_project` int NOT NULL AUTO_INCREMENT,
  `id_researcher` int NOT NULL,
  `title` text NOT NULL,
  `published_year` int NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(50) DEFAULT NULL,
  `status` enum('Open','Active','Completed') NOT NULL DEFAULT 'Open',
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'Modeling Knowledge Management in Higher Education',2013,'This project aimed to propose a model of KM implementation in Higher Education Institution.','https://bit.ly/sdfao3452dg','Completed'),(2,2,'Generating Protein Composition Using DEXTROID Algorithm',2017,'Generating RNA Combination by coloring protein code using DEXTROID Algorithm.','https://bit.ly/Kt68w49jsd','Active'),(3,1,'Model of Communities of Practice in Paralel Class ',2020,'Developing a model and prototype of CoP to achieve comprehensive learning in paralel class.','-','Open');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `researchers`
--

DROP TABLE IF EXISTS `researchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `researchers` (
  `id_researcher` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usr` varchar(25) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_researcher`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `researchers`
--

LOCK TABLES `researchers` WRITE;
/*!40000 ALTER TABLE `researchers` DISABLE KEYS */;
INSERT INTO `researchers` VALUES (1,'Ilyas Nuryasin','Knowledge Management','081553114556','ilyas@umm.ac.id','ilyas','3ea4a8e4d7a95ace878f907ab8b72d1b','ilyas.jpg'),(2,'Roni Kateman','Information Retrieval','085639532235','roni@umm.ac.id','roni','d78b154c99fe7f06ebc02ebd63d1c87c','roni.jpg'),(3,'Robert Himada','Ontology','08532645237','himada@umm.ac.id','himada','afb4aadc1d36ed26a9083873d76a2feb','himada.jpg');
/*!40000 ALTER TABLE `researchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id_student` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usr` varchar(25) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_student`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Andi Sukirman','20207239423423','081642364723','sukirman@student.umm.ac.id','andi','ce0e5bf55e4f71749eade7a8b95c4e46',''),(3,'Tatang Sumantri','2019384534239','089234234824','tatang@student.umm.ac.id','tatang','d060186e5e6b83b4622443175089328a',''),(4,'Ulum','202110370311462','085731513332','ulum@gmail.com','ulumfr','d50cc0f7fb51f02baa3a846e1ad03561','UlumBaik');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-29 11:16:38
