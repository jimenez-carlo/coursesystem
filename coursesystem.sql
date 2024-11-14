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
-- Table structure for table `access_tbl`
--

DROP TABLE IF EXISTS `access_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_tbl` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_role` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_tbl`
--

LOCK TABLES `access_tbl` WRITE;
/*!40000 ALTER TABLE `access_tbl` DISABLE KEYS */;
INSERT INTO `access_tbl` VALUES (1,'ADMIN',0),(2,'REGISTRAR',1),(3,'DEPARTMENT CHAIR',0),(4,'FACULTY',0),(5,'STUDENT',1);
/*!40000 ALTER TABLE `access_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_tbl` (
  `admin_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_profile` varchar(255) NOT NULL DEFAULT '../../dist/img/profile.png',
  `admin_email` varchar(45) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_firstname` text NOT NULL,
  `admin_lastname` text NOT NULL,
  `access_id` int(11) DEFAULT 1,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `admin_username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_tbl`
--

LOCK TABLES `admin_tbl` WRITE;
/*!40000 ALTER TABLE `admin_tbl` DISABLE KEYS */;
INSERT INTO `admin_tbl` VALUES (21,'../../img/670d2a0da7d36_webcam-toy-photo28.jpg','admin@gmail.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','mic','ioi',3,0,'2024-11-07 12:28:36','admin123'),(26,'../../img/6714ee76c109a_webcam-toy-photo26.jpg','admin2@gmail.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','Hshd','haha',1,0,'2024-11-07 12:28:36',NULL),(28,'../../img/6716f198156bb_WIN_20240921_17_12_45_Pro.jpg','admin3@gmail.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','Zhaine','Gabriel',1,0,'2024-11-07 12:28:36',NULL),(31,'../../img/672c404ccc039_CatPic123.jpg','admin4@gmail.com','$2y$10$8oe0ibsqtIiPwXBdXn0ZjuW731.31W5GIvWL9XJOPRPqYhvvHzus2','test2t','test2',1,0,'2024-11-07 12:28:36',NULL),(33,'../../dist/img/profile.png','admin5@gmail.com','$2y$10$QDGmG.h3BsIIZ/Fk1R1m5.w44707i.KylWNXg5GBitWvJp0HmSr5O','test','test',1,0,'2024-11-07 12:28:36',NULL);
/*!40000 ALTER TABLE `admin_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `civil_status_tbl`
--

DROP TABLE IF EXISTS `civil_status_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `civil_status_tbl` (
  `civil_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `civil_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`civil_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `civil_status_tbl`
--

LOCK TABLES `civil_status_tbl` WRITE;
/*!40000 ALTER TABLE `civil_status_tbl` DISABLE KEYS */;
INSERT INTO `civil_status_tbl` VALUES (1,'SINGLE',0),(2,'MARRIED',0),(3,'DIVORCED',0),(4,'WIDOWED',0);
/*!40000 ALTER TABLE `civil_status_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_type_tbl`
--

DROP TABLE IF EXISTS `class_type_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_type_tbl` (
  `class_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_type_name` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`class_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_type_tbl`
--

LOCK TABLES `class_type_tbl` WRITE;
/*!40000 ALTER TABLE `class_type_tbl` DISABLE KEYS */;
INSERT INTO `class_type_tbl` VALUES (1,'LEC',0),(2,'LAB',0);
/*!40000 ALTER TABLE `class_type_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_semester_tbl`
--

DROP TABLE IF EXISTS `curriculum_semester_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_semester_tbl` (
  `curriculum_semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_semester_year_from` varchar(45) DEFAULT NULL,
  `curriculum_semester_year_to` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`curriculum_semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_semester_tbl`
--

LOCK TABLES `curriculum_semester_tbl` WRITE;
/*!40000 ALTER TABLE `curriculum_semester_tbl` DISABLE KEYS */;
INSERT INTO `curriculum_semester_tbl` VALUES (1,'2022','2023',0),(2,'2023','2024',0),(3,'2024','2025',0),(4,'2026','2027',0);
/*!40000 ALTER TABLE `curriculum_semester_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_subjects_tbl`
--

DROP TABLE IF EXISTS `curriculum_subjects_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_subjects_tbl` (
  `curriculum_subjects_id` int(50) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(50) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `year_id` int(50) NOT NULL,
  `semester_id` int(50) NOT NULL,
  `pre_subject_id` int(50) DEFAULT 0,
  PRIMARY KEY (`curriculum_subjects_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_subjects_tbl`
--

LOCK TABLES `curriculum_subjects_tbl` WRITE;
/*!40000 ALTER TABLE `curriculum_subjects_tbl` DISABLE KEYS */;
INSERT INTO `curriculum_subjects_tbl` VALUES (1,9,62,1,1,0),(2,9,62,2,1,0),(6,9,62,3,2,0),(7,9,66,1,2,0),(8,9,2,0,1,0),(9,9,54,1,1,18),(10,9,19,1,1,0),(11,10,2,1,1,0),(13,12,2,1,1,0),(14,16,72,1,1,72),(15,16,72,1,2,0),(16,16,72,1,3,0),(17,16,73,1,1,0);
/*!40000 ALTER TABLE `curriculum_subjects_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_tbl`
--

DROP TABLE IF EXISTS `curriculum_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_tbl` (
  `curriculum_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `curriculum_title` varchar(100) NOT NULL,
  `curriculum_description` text DEFAULT NULL,
  `curriculum_semester_id` int(11) NOT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`curriculum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_tbl`
--

LOCK TABLES `curriculum_tbl` WRITE;
/*!40000 ALTER TABLE `curriculum_tbl` DISABLE KEYS */;
INSERT INTO `curriculum_tbl` VALUES (9,4,'BSIT WMT',NULL,1,0),(10,4,'BSIT WMT',NULL,2,0),(11,4,'BSIT WMT',NULL,3,0),(12,4,'BSIT DA 2024 ',NULL,4,0),(13,1,'test123','test123',4,1),(16,3,'BSBA','test',1,0);
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
  `department_code` varchar(100) DEFAULT NULL,
  `department_title` varchar(100) NOT NULL,
  `deleted_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_tbl`
--

LOCK TABLES `department_tbl` WRITE;
/*!40000 ALTER TABLE `department_tbl` DISABLE KEYS */;
INSERT INTO `department_tbl` VALUES (1,'ABEL','ABEL Department',0),(2,'BPA','BPA Department',0),(3,'BSBA','BSBA Department',0),(4,'BSIT','BSIT Department',0),(5,'BSEd','BSEd Department',0),(6,'BSEEd','BSEEd Department',0),(7,'BSECEd','BSECEd Department',0),(8,'BPEd','BPEd Department',0),(9,'BTLEd','BTLEd Department',0),(10,'BSN','BSN Department',0);
/*!40000 ALTER TABLE `department_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation_status_tbl`
--

DROP TABLE IF EXISTS `evaluation_status_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation_status_tbl` (
  `evaluation_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`evaluation_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation_status_tbl`
--

LOCK TABLES `evaluation_status_tbl` WRITE;
/*!40000 ALTER TABLE `evaluation_status_tbl` DISABLE KEYS */;
INSERT INTO `evaluation_status_tbl` VALUES (1,'PENDING',0),(2,'EVALUATED',0),(3,'INCOMPLETE',0);
/*!40000 ALTER TABLE `evaluation_status_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender_tbl`
--

DROP TABLE IF EXISTS `gender_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender_tbl` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender_tbl`
--

LOCK TABLES `gender_tbl` WRITE;
/*!40000 ALTER TABLE `gender_tbl` DISABLE KEYS */;
INSERT INTO `gender_tbl` VALUES (1,'MALE',0),(2,'FEMALE',0),(3,'OTHER',0);
/*!40000 ALTER TABLE `gender_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_range_tbl`
--

DROP TABLE IF EXISTS `grade_range_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_range_tbl` (
  `grade_id` int(50) NOT NULL AUTO_INCREMENT,
  `grade` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_range_tbl`
--

LOCK TABLES `grade_range_tbl` WRITE;
/*!40000 ALTER TABLE `grade_range_tbl` DISABLE KEYS */;
INSERT INTO `grade_range_tbl` VALUES (1,'TBD','To be determine',0),(2,'1.00','1.00',0),(3,'1.25','1.25',0),(4,'1.50','1.50',0),(5,'1.75','1.75',0),(6,'2.00','2.00',0),(7,'2.25','2.25',0),(8,'2.50','2.50',0),(9,'2.75','2.75',0),(10,'3.00','3.00',0),(11,'INC','Incomplete',0),(12,'5.00','Failed',0),(13,'W','Withdrawn',0),(14,'Drop','Dropped',0);
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
-- Table structure for table `program_category_btl`
--

DROP TABLE IF EXISTS `program_category_btl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_category_btl` (
  `program_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_category_name` varchar(255) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`program_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_category_btl`
--

LOCK TABLES `program_category_btl` WRITE;
/*!40000 ALTER TABLE `program_category_btl` DISABLE KEYS */;
INSERT INTO `program_category_btl` VALUES (1,'College of Arts, Sciences and Technology',0),(2,'College of Teacher Education',0),(3,'Institute of Nursing',0);
/*!40000 ALTER TABLE `program_category_btl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_tbl`
--

DROP TABLE IF EXISTS `program_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_tbl` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_category_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `program_code` varchar(255) DEFAULT NULL,
  `program_title` varchar(255) DEFAULT NULL,
  `program_description` text DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_tbl`
--

LOCK TABLES `program_tbl` WRITE;
/*!40000 ALTER TABLE `program_tbl` DISABLE KEYS */;
INSERT INTO `program_tbl` VALUES (1,1,1,'ABEL','Bachelor of Arts in English Language','Bachelor of Arts in English Language',0),(2,1,2,'BPA','Bachelor of Public Administration','Bachelor of Public Administration',0),(3,1,3,'BSBA','Bachelor of Science Business Administration','Bachelor of Science Business Administration',0),(4,1,4,'BSIT','Bachelor of Science in Information Technology','Bachelor of Science in Information Technology',0),(5,2,5,'BSEd','Bachelor of Secondary Education','Bachelor of Secondary Education',0),(6,2,6,'BSEEd','Bachelor of Elementary Education','Bachelor of Elementary Education',0),(7,2,7,'BSECEd','Bachelor of Early Childhood Education','Bachelor of Early Childhood Education',0),(8,2,8,'BPEd','Bachelor of Physical Educaction','Bachelor of Physical Educaction',0),(9,2,9,'BTLEd','Bachelor of Technology Livelihood Education','Bachelor of Technology Livelihood Education',0),(10,3,10,'BSN','Bachelor of Science in Nursing','Bachelor of Science in Nursing',0),(12,2,2,'test123','test123',NULL,1);
/*!40000 ALTER TABLE `program_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommended_subjects_tbl`
--

DROP TABLE IF EXISTS `recommended_subjects_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommended_subjects_tbl` (
  `recommended_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `year_id` int(50) NOT NULL,
  `semester_id` int(50) NOT NULL,
  `pre_subject_id` int(50) DEFAULT 0,
  PRIMARY KEY (`recommended_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommended_subjects_tbl`
--

LOCK TABLES `recommended_subjects_tbl` WRITE;
/*!40000 ALTER TABLE `recommended_subjects_tbl` DISABLE KEYS */;
INSERT INTO `recommended_subjects_tbl` VALUES (1,2,62,1,2,0),(2,2,2,1,1,0);
/*!40000 ALTER TABLE `recommended_subjects_tbl` ENABLE KEYS */;
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
-- Table structure for table `semester_tbl`
--

DROP TABLE IF EXISTS `semester_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester_tbl` (
  `semester_id` int(50) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(50) NOT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester_tbl`
--

LOCK TABLES `semester_tbl` WRITE;
/*!40000 ALTER TABLE `semester_tbl` DISABLE KEYS */;
INSERT INTO `semester_tbl` VALUES (1,'1st Semester',0),(2,'2nd Semester',0),(3,'Summer',0),(15,'test123',1);
/*!40000 ALTER TABLE `semester_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studen_file_tbl`
--

DROP TABLE IF EXISTS `studen_file_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studen_file_tbl` (
  `studen_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `evaluation_status_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `feedback` text DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`studen_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studen_file_tbl`
--

LOCK TABLES `studen_file_tbl` WRITE;
/*!40000 ALTER TABLE `studen_file_tbl` DISABLE KEYS */;
INSERT INTO `studen_file_tbl` VALUES (1,2,3,'../../img/67345822da6bc_CatPic123.jpg',0,'2024-11-13 15:41:22',NULL,NULL,NULL),(2,2,2,'../../img/6734582f72d05_CatPic123.jpg',0,'2024-11-13 15:41:35','test',NULL,NULL);
/*!40000 ALTER TABLE `studen_file_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_status_tbl`
--

DROP TABLE IF EXISTS `student_status_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_status_tbl` (
  `student_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_status` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`student_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_status_tbl`
--

LOCK TABLES `student_status_tbl` WRITE;
/*!40000 ALTER TABLE `student_status_tbl` DISABLE KEYS */;
INSERT INTO `student_status_tbl` VALUES (1,'REGULAR',0),(2,'IRREGULAR',0),(3,'DROP',0);
/*!40000 ALTER TABLE `student_status_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_subjects_tbl`
--

DROP TABLE IF EXISTS `student_subjects_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_subjects_tbl` (
  `student_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `year_id` int(50) NOT NULL,
  `semester_id` int(50) NOT NULL,
  `pre_subject_id` int(50) DEFAULT 0,
  `first_sem` varchar(45) DEFAULT NULL,
  `second_sem` varchar(45) DEFAULT NULL,
  `third_sem` varchar(45) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_subjects_tbl`
--

LOCK TABLES `student_subjects_tbl` WRITE;
/*!40000 ALTER TABLE `student_subjects_tbl` DISABLE KEYS */;
INSERT INTO `student_subjects_tbl` VALUES (1,2,62,1,1,0,NULL,NULL,NULL,2),(2,2,62,2,1,0,NULL,NULL,NULL,NULL),(3,2,62,3,2,0,NULL,NULL,NULL,NULL),(4,2,66,1,2,0,NULL,NULL,NULL,2),(5,2,2,0,1,0,NULL,NULL,NULL,NULL),(7,2,9,1,1,9,NULL,NULL,NULL,11),(8,2,2,1,1,2,NULL,NULL,NULL,NULL),(9,2,2,2,1,0,NULL,NULL,NULL,NULL),(10,3,72,1,1,72,NULL,NULL,NULL,2),(11,3,72,1,2,0,NULL,NULL,NULL,NULL),(12,3,72,1,3,0,NULL,NULL,NULL,NULL),(13,3,73,1,1,0,NULL,NULL,NULL,NULL),(17,3,73,1,3,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `student_subjects_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_tbl`
--

DROP TABLE IF EXISTS `student_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_tbl` (
  `student_id` int(100) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) DEFAULT NULL,
  `student_status_id` int(11) DEFAULT NULL,
  `student_profile` varchar(255) NOT NULL DEFAULT '../../dist/img/profile.png',
  `student_email` varchar(100) NOT NULL,
  `student_password` varchar(100) NOT NULL,
  `student_firstname` varchar(100) NOT NULL,
  `student_middlename` varchar(100) DEFAULT NULL,
  `student_lastname` varchar(100) NOT NULL,
  `student_address` text DEFAULT NULL,
  `student_place_of_birth` varchar(100) DEFAULT NULL,
  `student_birth_date` date DEFAULT NULL,
  `student_mobile` varchar(100) DEFAULT NULL,
  `student_age` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT 5,
  `gender_id` int(11) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `civil_status_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT 1,
  `semester_id` int(11) DEFAULT 1,
  `student_username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_tbl`
--

LOCK TABLES `student_tbl` WRITE;
/*!40000 ALTER TABLE `student_tbl` DISABLE KEYS */;
INSERT INTO `student_tbl` VALUES (2,9,1,'../../img/6735f4170d1bb_CatPic123.jpg','john@doe.com','$2y$10$cowl7a1hzA4LdbO1l6bB.ektXVqWKBzkZvzDGCIV1a4ODa1ZEHReG','john','c','doe','test',NULL,'0000-00-00','099999999',0,5,1,0,'2024-11-07 13:11:23',1,1,1,'student123'),(3,16,1,'../../img/672dde24d6e4e_CatPic123.jpg','john123@doe.com','$2y$10$PhFOnlOcYbDakm1Nh2nKnOYqTl.M.MtNtILAMooeEQAedmHs51NEu','john','c','doe','test',NULL,'2024-01-01','0999999999',23,5,1,0,'2024-11-08 17:47:16',1,1,1,NULL);
/*!40000 ALTER TABLE `student_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_tbl`
--

DROP TABLE IF EXISTS `subject_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_tbl` (
  `subject_id` int(100) NOT NULL AUTO_INCREMENT,
  `program_id` int(100) DEFAULT 1,
  `class_type_id` int(100) DEFAULT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_unit` varchar(100) NOT NULL,
  `deleted_flag` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_tbl`
--

LOCK TABLES `subject_tbl` WRITE;
/*!40000 ALTER TABLE `subject_tbl` DISABLE KEYS */;
INSERT INTO `subject_tbl` VALUES (2,4,1,'GEE 2','Entrepreneurship','3',0,'2024-10-05 15:26:22'),(6,4,1,'GEE 2','Elective 101','3',0,'2024-10-05 15:26:22'),(9,4,1,'GE 1','UNDERSTANDING THE SELF','3',0,'2024-10-05 15:26:22'),(10,4,1,'GE 7','MATHEMATICS IN THE MODERN WORLD','3',0,'2024-10-05 15:26:22'),(12,4,1,'GE 5','THE CONTEMPORARY WORLD','3',0,'2024-10-05 15:26:22'),(13,4,1,'PE 101','PHYSICAL ACTIVITY TOWARDS HEALTH and FITNESS 1','2',0,'2024-10-05 15:26:22'),(14,4,1,'CC 103','INTERMEDIATE PROGRAMMING','3',0,'2024-10-05 15:26:22'),(15,4,1,'CO 101','COMPUTER ORGANIZATION','3',0,'2024-10-05 15:26:22'),(16,4,1,'MS 101','DISCRETE MATHEMATICS','3',0,'2024-10-05 15:26:22'),(17,4,1,'GE 2','READING IN PHILIPPINE HISTORY','3',0,'2024-10-05 15:26:22'),(18,4,1,'GE 8','LIFE WORKS OF RIZAL','3',0,'2024-10-05 15:26:22'),(19,4,1,'GE 3','ARTS APPRECIATION','3',0,'2024-10-05 15:26:22'),(21,4,1,'PE 102','PHYSICAL ACTIVITY TOWARDS HEALTH and FITNESS 2','2',0,'2024-10-05 15:26:22'),(22,4,1,'NET 102','NETWORKING 102','3',0,'2024-10-05 15:26:22'),(23,4,1,'NET 101 ','NETWORKING 101','2',0,'2024-10-05 15:28:31'),(45,4,1,'CC 101','FUNDAMENTAL OF PROGRAMMING','2',0,'2024-10-17 15:18:46'),(54,4,1,'GE','Ethics','3',0,'2024-10-20 12:02:26'),(62,4,1,'CC 102','FUNDAMENTAL OF PROGRAMMING','2',0,'2024-10-20 15:05:54'),(66,4,1,'CC 102','FUNDAMENTAL OF PROGRAMMING','2',0,'2024-10-20 15:38:14'),(67,4,1,'CC 102','FUNDAMENTAL OF PROGRAMMING','3',0,'2024-10-20 15:48:17'),(68,4,1,'CC 101','INTRODUCTION TO COMPUTING ','3',0,'2024-10-20 15:48:32'),(69,4,1,'CC 109','RIZAL','3',0,'2024-10-22 02:34:38'),(70,4,NULL,'test','test','',0,'2024-11-05 06:31:24'),(71,4,2,'test123','test123','2',1,'2024-11-05 06:32:51'),(72,3,1,'PED','Physical Education','3',0,'2024-11-08 09:44:14'),(73,3,2,'MAT016','Algebra','3',0,'2024-11-08 09:45:13');
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
-- Table structure for table `year_levels_tbl`
--

DROP TABLE IF EXISTS `year_levels_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `year_levels_tbl` (
  `year_id` int(50) NOT NULL AUTO_INCREMENT,
  `year_code` varchar(50) NOT NULL,
  `year_name` varchar(50) NOT NULL,
  `deleted_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_levels_tbl`
--

LOCK TABLES `year_levels_tbl` WRITE;
/*!40000 ALTER TABLE `year_levels_tbl` DISABLE KEYS */;
INSERT INTO `year_levels_tbl` VALUES (1,'1st','1st Year',0),(2,'2nd','2nd Year',0),(3,'3rd','3rd Year',0),(4,'4th','4th Year',0),(18,'test123','test123',1);
/*!40000 ALTER TABLE `year_levels_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-14 21:44:22
