-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gymnsb
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'admin','f2d0ff370380124029c2b807a924156c','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (7,'This is to announce that our GYM will remain close for 51 days due to COVID-19.','2020-03-30'),(8,'Opening of GYM Halls and Clubs are not fixed yet. Stay tuned for more updates!!','2020-04-03'),(9,'Renovation Going On...','2020-04-04'),(10,'This is a demo announcement from admin','2022-06-03');
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `amount` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (3,'Treadmill',902,4,'DnS','Edited Description','Kampala, Uga','8521479633','2019-03-07'),(4,'Vertical Press Machine',949,3,'SS Industries','For Biceps And Triceps, Upper Back, Chest','Wakiso, Ugan','1245558980','2020-03-19'),(5,'Dumbell - Adjustable',102,26,'Uptown Suppliers','Material: Steel, Rubber Plastic, Concrete','Mukono, Ugan','9875552100','2020-03-29'),(6,'Multi Bench Press Machine',219,2,'DnS Suppliers','6 In 1 Multi Bench With Incline, Flat, Decline Ben','Jinja, Ugand','7410001010','2020-04-05'),(7,'Demo',265,5,'Demo','This is a demo test.','Mbale, Ugand','8524445452','2020-04-03'),(10,'RowWarrior Fitness Rowing Mach',5616,12,'Roww Stores','HIGHEST QUALITY: This best of class air rowing mac','Uganda, 52 Weekley S','7412585555','2021-06-12'),(11,'Dumb',40,10,'Kampala Gym','For muscles','Kireka','0785957495','2024-02-26');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dor` date NOT NULL,
  `services` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `paid_date` date NOT NULL,
  `p_year` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `attendance_count` int(100) NOT NULL,
  `ini_weight` int(100) NOT NULL DEFAULT 0,
  `curr_weight` int(100) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(50) NOT NULL,
  `curr_bodytype` varchar(50) NOT NULL,
  `progress_date` date NOT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (8,'Charles Wasswa','charles','cac29d7a34687eb14b37068ee4708e7b','Male','2020-01-02','',6105000,'2020-04-01',2020,'30','Kamwakya','8520258520','Active',14,92,85,'Fat','Bulked','2020-04-22',1),(11,'Justin Sserwadda','justin','cac29d7a34687eb14b37068ee4708e7b','Male','2019-01-25','Cardio',129500,'2020-03-31',2020,'3','14 Blair Court','7535752220','Active',9,0,0,'','','0000-00-00',0),(14,'Ryan Mukasa','ryan','cac29d7a34687eb14b37068ee4708e7b','Male','2019-07-13','Fitness',203500,'2020-04-02',2020,'12','34 Twin Oaks Drive','1578880010','Active',13,59,63,'Slim','Slim','2020-04-23',0),(16,'TrialsChanged Nansub','trials','cac29d7a34687eb14b37068ee4708e7b','Female','2020-04-01','Fitness',0,'2021-06-12',2021,'0','4 Demo Lane','741111110','Expired',26,50,61,'Slim','Slim','2021-06-11',1),(17,'Karen Nakato','karen','cac29d7a34687eb14b37068ee4708e7b','Female','2020-04-02','Cardio',444000,'2022-05-31',2020,'3','23 Rubaiyat Road','7441002540','Active',12,0,0,'','','0000-00-00',0),(18,'Jeanne Nalubega','prattj','cac29d7a34687eb14b37068ee4708e7b','Female','2020-04-04','Fitness',203500,'2021-06-11',2021,'1','86 Hilltop Street','7854445410','Active',11,0,0,'','','0000-00-00',0),(19,'George Mukasa','george','cac29d7a34687eb14b37068ee4708e7b','Male','2019-04-02','Fitness',203500,'2021-06-11',2021,'1','43 Oak Drive','0258987850','Active',22,0,0,'','','0000-00-00',1),(20,'Wendy Nakato','wendy','cac29d7a34687eb14b37068ee4708e7b','Female','2020-03-21','Fitness',203500,'2021-06-11',2021,'1','24 Cody Ridge Road','8547896520','Active',18,0,0,'','','0000-00-00',0),(21,'Patrick Wasswa','patrick','cac29d7a34687eb14b37068ee4708e7b','Male','2020-04-02','Cardio',444000,'2022-06-01',2021,'3','24 Cody Ridge Road','9874568520','Active',11,0,0,'','','0000-00-00',0),(22,'Tommy Kato','tommy','cac29d7a34687eb14b37068ee4708e7b','Male','2020-04-01','Fitness',203500,'2020-04-05',2020,'3','22 Franklin Street','8529997500','Active',7,0,0,'','','0000-00-00',0),(23,'Keith Wasswa','martin','cac29d7a34687eb14b37068ee4708e7b','Male','2020-04-02','Cardio',444000,'2022-06-02',2021,'3','89 Smithfield Avenue','7895456250','Active',24,51,68,'Slim','Muscular','2022-06-02',0),(24,'Richard Kato','richard','cac29d7a34687eb14b37068ee4708e7b','Male','1990-02-02','Sauna',1554000,'2022-05-31',2022,'12','541  Raoul Wallenber','7012545580','Active',2,0,0,'','','0000-00-00',0),(25,'Raymond Wasswa','raymond','cac29d7a34687eb14b37068ee4708e7b','Male','1986-02-19','Cardio',1776000,'2022-06-02',2022,'12','2954  Robinson Lane','4785450002','Active',2,0,0,'','','0000-00-00',0),(26,'Mattie Nakato','mattie','cac29d7a34687eb14b37068ee4708e7b','Female','1995-05-18','Sauna',1554000,'2022-06-01',2022,'12','73 Settlers Lane','9995554444','Active',0,0,0,'','','0000-00-00',0),(27,'Justin Wasswa','justin','cac29d7a34687eb14b37068ee4708e7b','Male','1995-12-12','Cardio',148000,'2022-05-30',2022,'1','45 Bell Street','3545785540','Active',1,0,0,'','','0000-00-00',0),(29,'Kathy Nakato','kathy','cac29d7a34687eb14b37068ee4708e7b','Female','2022-06-02','Fitness',1221000,'2022-06-02',0,'6','87 Harry Place','7896587458','Active',0,0,0,'','','0000-00-00',0),(30,'Pius Sserwadda','@pius','202cb962ac59075b964b07152d234b70','Male','2024-02-23','Fitness',0,'0000-00-00',0,'3','kampala','7893784927','Pending',0,0,0,'','','0000-00-00',0),(31,'Nakato','','d41d8cd98f00b204e9800998ecf8427e','Male','2024-02-23','',0,'0000-00-00',0,'','','','Pending',0,0,0,'','','0000-00-00',0),(32,'Pius Mukasa','pius','202cb962ac59075b964b07152d234b70','Male','2024-02-23','Sauna',0,'0000-00-00',0,'1','Kampala','434556443','Pending',0,0,0,'','','0000-00-00',0),(33,'Pius Baguma','pius','202cb962ac59075b964b07152d234b70','Male','2008-02-13','Fitness',610500,'2024-02-26',2024,'3','Bukoto','0766432216','Active',0,0,0,'','','0000-00-00',0);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,'Fitness','55'),(2,'Sauna','35'),(3,'Cardio','40');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminder`
--

LOCK TABLES `reminder` WRITE;
/*!40000 ALTER TABLE `reminder` DISABLE KEYS */;
INSERT INTO `reminder` VALUES (12,'staff','asd','unread','2020-04-16 22:39:59',0),(13,'staff','asdasdas','unread','2020-04-16 22:40:49',0),(14,'staff','ASasA','unread','2020-04-16 22:41:59',0),(15,'staff','asdasdasd','unread','2020-04-16 22:42:28',0);
/*!40000 ALTER TABLE `reminder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (1,'bruno','cac29d7a34687eb14b37068ee4708e7b','samuel@mail.com','Samuel Ssebunya','Kampala','Cashier','Male',752123456),(2,'michelle','cac29d7a34687eb14b37068ee4708e7b','sarah@mail.com','Sarah Namutebi','Entebbe','Trainer','Female',752234567),(3,'james','cac29d7a34687eb14b37068ee4708e7b','joseph@mail.com','Joseph Ssekandi','Jinja','Trainer','Male',752345678),(4,'bruce','cac29d7a34687eb14b37068ee4708e7b','rebecca@mail.com','Rebecca Nakato','Kampala','Manager','Male',752456789),(5,'gerald','202cb962ac59075b964b07152d234b70','gerald@gym.com','Gerald Walugada','Kireka','Cashier','Male',789273924);
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todo`
--

DROP TABLE IF EXISTS `todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(30) NOT NULL,
  `user_id` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todo`
--

LOCK TABLES `todo` WRITE;
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` VALUES (20,'In Progress','Test Completed',14),(21,'Pending','Mastering Crunches',6),(22,'In Progress','Standing Workouts For Flat Abs',6),(23,'In Progress','Triceps Buildup - 3 set',14),(24,'Pending','Decline dumbbell bench press',6),(27,'Pending','dddd',0),(28,'In Progress','Test 1',23),(30,'In Progress','I will be Doing Jumping Jacks',33);
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-02 10:42:42
