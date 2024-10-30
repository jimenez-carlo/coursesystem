-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: coursesystem
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_tbl` (
  `admin_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_profile` longblob NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_firstname` text NOT NULL,
  `admin_lastname` text NOT NULL,
  `admin_position` enum('Registrar','Dept Chair','Faculty','') NOT NULL,
  `admin_status` enum('Active','Deactivated','','') NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_tbl`
--

LOCK TABLES `admin_tbl` WRITE;
/*!40000 ALTER TABLE `admin_tbl` DISABLE KEYS */;
INSERT INTO `admin_tbl` VALUES (21,'../../img/670d2a0da7d36_webcam-toy-photo28.jpg','knlbjkbhvhjhb@gmail.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','mic','ioi','Dept Chair','Active'),(26,'../../img/6714ee76c109a_webcam-toy-photo26.jpg','asdfg@gmail.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','Hshd','haha','Faculty','Active'),(28,'../../img/6716f198156bb_WIN_20240921_17_12_45_Pro.jpg','zhainegabriel@gmail.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','Zhaine','Gabriel','Dept Chair','Active');
/*!40000 ALTER TABLE `admin_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_details_tbl`
--

DROP TABLE IF EXISTS `curriculum_details_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_details_tbl` (
  `cdetails_id` int(50) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(50) NOT NULL,
  `code_id` int(50) NOT NULL,
  `year_id` int(50) NOT NULL,
  `semester_id` int(50) NOT NULL,
  PRIMARY KEY (`cdetails_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_details_tbl`
--

LOCK TABLES `curriculum_details_tbl` WRITE;
/*!40000 ALTER TABLE `curriculum_details_tbl` DISABLE KEYS */;
INSERT INTO `curriculum_details_tbl` VALUES (1,9,62,1,1),(2,9,62,2,1);
/*!40000 ALTER TABLE `curriculum_details_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_tbl`
--

DROP TABLE IF EXISTS `curriculum_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_tbl` (
  `curriculum_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `curriculum_name` varchar(100) NOT NULL,
  `curriculum_semester` varchar(100) NOT NULL,
  `year_semester_id` varchar(100) NOT NULL,
  `pre_requisite` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`curriculum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_tbl`
--

LOCK TABLES `curriculum_tbl` WRITE;
/*!40000 ALTER TABLE `curriculum_tbl` DISABLE KEYS */;
INSERT INTO `curriculum_tbl` VALUES (9,13,'BSIT WMT','','1','',NULL),(10,13,'BSIT WMT','','1','',NULL),(11,13,'BSIT WMT','','1','',NULL),(12,13,'BSIT DA 2024 ','','1','',NULL),(13,13,'BSIT WMT','','1','',NULL),(14,13,'test1','','2','','test1');
/*!40000 ALTER TABLE `curriculum_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_tbl`
--

DROP TABLE IF EXISTS `department_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_tbl` (
  `department_id` int(100) NOT NULL AUTO_INCREMENT,
  `department_course` varchar(100) NOT NULL,
  `department_status` enum('Active','Deactivated','','') NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_tbl`
--

LOCK TABLES `department_tbl` WRITE;
/*!40000 ALTER TABLE `department_tbl` DISABLE KEYS */;
INSERT INTO `department_tbl` VALUES (13,'BSIT','Active'),(19,'BPA','Active'),(20,'ABEL','Active'),(21,'BSBA','Active');
/*!40000 ALTER TABLE `department_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluated_tbl`
--

DROP TABLE IF EXISTS `evaluated_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluated_tbl` (
  `evaluated_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  `student_name` int(11) NOT NULL,
  PRIMARY KEY (`evaluated_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluated_tbl`
--

LOCK TABLES `evaluated_tbl` WRITE;
/*!40000 ALTER TABLE `evaluated_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluated_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_range_tbl`
--

DROP TABLE IF EXISTS `grade_range_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_range_tbl` (
  `range_id` int(50) NOT NULL AUTO_INCREMENT,
  `grade` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_range_tbl`
--

LOCK TABLES `grade_range_tbl` WRITE;
/*!40000 ALTER TABLE `grade_range_tbl` DISABLE KEYS */;
INSERT INTO `grade_range_tbl` VALUES (1,'1.00','1.00'),(2,'1.25','1.25'),(3,'1.50','1.50'),(4,'1.75','1.75'),(5,'2.00','2.00'),(6,'2.25','2.25'),(7,'2.50','2.50'),(8,'2.75','2.75'),(9,'3.00','3.00'),(10,'INC','Incomplete'),(11,'5.00','Failed'),(12,'W','Withdrawn'),(13,'Drop','Dropped');
/*!40000 ALTER TABLE `grade_range_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades_tbl`
--

DROP TABLE IF EXISTS `grades_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades_tbl` (
  `grades_id` int(50) NOT NULL AUTO_INCREMENT,
  `student_id` int(50) NOT NULL,
  `currdetails_id` int(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `semesters` int(50) NOT NULL,
  `school_year` int(50) NOT NULL,
  `confirmations` int(50) NOT NULL,
  PRIMARY KEY (`grades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades_tbl`
--

LOCK TABLES `grades_tbl` WRITE;
/*!40000 ALTER TABLE `grades_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_requisite_tbl`
--

DROP TABLE IF EXISTS `pre_requisite_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_requisite_tbl` (
  `pre_requisite_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `sub_pre_requisite` varchar(100) NOT NULL,
  PRIMARY KEY (`pre_requisite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_requisite_tbl`
--

LOCK TABLES `pre_requisite_tbl` WRITE;
/*!40000 ALTER TABLE `pre_requisite_tbl` DISABLE KEYS */;
INSERT INTO `pre_requisite_tbl` VALUES (1,'','',''),(2,'','',''),(3,'','',''),(4,'','','');
/*!40000 ALTER TABLE `pre_requisite_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_tbl`
--

DROP TABLE IF EXISTS `program_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_tbl` (
  `program_id` int(50) NOT NULL AUTO_INCREMENT,
  `dept_program` enum('BSIT WEB AND MOBILE TECHNOLOGIES','ABEL','BPA','BSBA','BSIT DATA ANALYTICS') NOT NULL,
  `program_status` enum('Active','Deactivated','','') NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_tbl`
--

LOCK TABLES `program_tbl` WRITE;
/*!40000 ALTER TABLE `program_tbl` DISABLE KEYS */;
INSERT INTO `program_tbl` VALUES (21,'ABEL','Active'),(24,'BSIT DATA ANALYTICS','Deactivated');
/*!40000 ALTER TABLE `program_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_tbl`
--

DROP TABLE IF EXISTS `registered_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_tbl` (
  `register_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `curriculum_name` varchar(100) NOT NULL,
  `sem_name` enum('First Semestral','Second Semestral','','') NOT NULL,
  `student_year` enum('First','Second','Third','Fourth') NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  PRIMARY KEY (`register_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_tbl`
--

LOCK TABLES `registered_tbl` WRITE;
/*!40000 ALTER TABLE `registered_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `registered_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_year_tbl`
--

DROP TABLE IF EXISTS `school_year_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_year_tbl` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` int(11) NOT NULL,
  `curriculum_name` int(11) NOT NULL,
  `school_year` int(11) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_year_tbl`
--

LOCK TABLES `school_year_tbl` WRITE;
/*!40000 ALTER TABLE `school_year_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_year_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester_tbl`
--

DROP TABLE IF EXISTS `semester_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester_tbl` (
  `sem_id` int(50) NOT NULL AUTO_INCREMENT,
  `semester` varchar(50) NOT NULL,
  `sem_status` enum('Active','Deactivated','','') NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester_tbl`
--

LOCK TABLES `semester_tbl` WRITE;
/*!40000 ALTER TABLE `semester_tbl` DISABLE KEYS */;
INSERT INTO `semester_tbl` VALUES (1,'1st Semester','Active'),(2,'2nd Semester','Active'),(3,'Summer','Active');
/*!40000 ALTER TABLE `semester_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_tbl`
--

DROP TABLE IF EXISTS `subject_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_tbl` (
  `code_id` int(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_unit` varchar(100) NOT NULL,
  `subject_prerequisite` varchar(100) NOT NULL,
  `course_status` enum('Active','Deactivated','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `department_id` int(100) DEFAULT 1,
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_tbl`
--

LOCK TABLES `subject_tbl` WRITE;
/*!40000 ALTER TABLE `subject_tbl` DISABLE KEYS */;
INSERT INTO `subject_tbl` VALUES (2,'GEE 2','Entrepreneurship','3','','','2024-10-05 15:26:22',1),(6,'GEE 2','Elective 101','3','','','2024-10-05 15:26:22',1),(9,'GE 1','UNDERSTANDING THE SELF','3','','','2024-10-05 15:26:22',1),(10,'GE 7','MATHEMATICS IN THE MODERN WORLD','3','','','2024-10-05 15:26:22',1),(12,'GE 5','THE CONTEMPORARY WORLD','3','','','2024-10-05 15:26:22',1),(13,'PE 101','PHYSICAL ACTIVITY TOWARDS HEALTH and FITNESS 1','2','','','2024-10-05 15:26:22',1),(14,'CC 103','INTERMEDIATE PROGRAMMING','3','','','2024-10-05 15:26:22',1),(15,'CO 101','COMPUTER ORGANIZATION','3','','','2024-10-05 15:26:22',1),(16,'MS 101','DISCRETE MATHEMATICS','3','','','2024-10-05 15:26:22',1),(17,'GE 2','READING IN PHILIPPINE HISTORY','3','','','2024-10-05 15:26:22',1),(18,'GE 8','LIFE WORKS OF RIZAL','3','','','2024-10-05 15:26:22',1),(19,'GE 3','ARTS APPRECIATION','3','','','2024-10-05 15:26:22',1),(21,'PE 102','PHYSICAL ACTIVITY TOWARDS HEALTH and FITNESS 2','2','','','2024-10-05 15:26:22',1),(22,'NET 102','NETWORKING 102','3','','','2024-10-05 15:26:22',1),(23,'NET 101 ','NETWORKING 101','2','','','2024-10-05 15:28:31',1),(45,'CC 101','FUNDAMENTAL OF PROGRAMMING','2','','Deactivated','2024-10-17 15:18:46',1),(54,'GE','Ethics','3','','Active','2024-10-20 12:02:26',1),(62,'CC 102','FUNDAMENTAL OF PROGRAMMING','2','CC 101','Active','2024-10-20 15:05:54',1),(66,'CC 102','FUNDAMENTAL OF PROGRAMMING','2','CC 101','Active','2024-10-20 15:38:14',1),(67,'CC 102','FUNDAMENTAL OF PROGRAMMING','3','CC 101','Active','2024-10-20 15:48:17',1),(68,'CC 101','INTRODUCTION TO COMPUTING ','3','NONE','Deactivated','2024-10-20 15:48:32',1),(69,'CC 109','RIZAL','3','NONE','Active','2024-10-22 02:34:38',1);
/*!40000 ALTER TABLE `subject_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_tbl`
--

DROP TABLE IF EXISTS `upload_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_tbl` (
  `upload_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `ier_upload` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_tbl`
--

LOCK TABLES `upload_tbl` WRITE;
/*!40000 ALTER TABLE `upload_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type_tbl`
--

DROP TABLE IF EXISTS `user_type_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type_tbl` (
  `type_id` int(50) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type_tbl`
--

LOCK TABLES `user_type_tbl` WRITE;
/*!40000 ALTER TABLE `user_type_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_type_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_profile` longblob NOT NULL,
  `student_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `program_id` int(11) NOT NULL,
  `curriculum_year` int(11) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`student_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'','lyjumawid@gmail.com','cutee','','','',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year_levels_tbl`
--

DROP TABLE IF EXISTS `year_levels_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `year_levels_tbl` (
  `year_id` int(50) NOT NULL AUTO_INCREMENT,
  `year_year` varchar(50) NOT NULL,
  `yearlevel_status` enum('Active','Deactivated','','') NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_levels_tbl`
--

LOCK TABLES `year_levels_tbl` WRITE;
/*!40000 ALTER TABLE `year_levels_tbl` DISABLE KEYS */;
INSERT INTO `year_levels_tbl` VALUES (1,'1st Year','Active'),(2,'2nd Year','Active'),(3,'3rd Year','Active'),(4,'4th Year','Active');
/*!40000 ALTER TABLE `year_levels_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year_semester_tbl`
--

DROP TABLE IF EXISTS `year_semester_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `year_semester_tbl` (
  `year_semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `year_from` varchar(45) DEFAULT NULL,
  `year_to` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`year_semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_semester_tbl`
--

LOCK TABLES `year_semester_tbl` WRITE;
/*!40000 ALTER TABLE `year_semester_tbl` DISABLE KEYS */;
INSERT INTO `year_semester_tbl` VALUES (1,'2022','2023'),(2,'2023','2024'),(3,'2024','2025'),(4,'2026','2027');
/*!40000 ALTER TABLE `year_semester_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-30 14:56:44
