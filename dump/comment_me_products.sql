CREATE DATABASE  IF NOT EXISTS `heroku_04a54f22da0d1b9` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `heroku_04a54f22da0d1b9`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: heroku_04a54f22da0d1b9
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL, -- DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `image_UNIQUE` (`image`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (42,'Women&#39;s Nike Revolution 4','Women-Nike-Revolution-4.jpg',2,'Lorem ipsum dolor sit amet, sit cu nonumy praesent, et autem percipit eos, enim recteque ut vel. Nec justo quaeque mediocritatem in, pri omnis dissentiunt ad. Sit et vulputate suscipiantur, pro oportere scribentur ad, cu sea quas platonem. Quo elitr populo recusabo ut, autem persius mnesarchum ei duo. Ad mel virtute molestie .','2018-05-22 03:03:14','2018-05-22 03:03:14'),(43,'ASICS Kids GEL Resolution 7','ASICS-Kids-GEL-Resolution-7.jpg',2,'Lorem ipsum dolor sit amet, sit cu nonumy praesent, et autem percipit eos, enim recteque ut vel. Nec justo quaeque mediocritatem in, pri omnis dissentiunt ad. Sit et vulputate suscipiantur, pro oportere scribentur ad, cu sea quas platonem. Quo elitr populo recusabo ut, autem persius mnesarchum ei duo. Ad mel virtute molestie.','2018-05-22 03:04:34','2018-05-22 03:04:34'),(44,'Women\'s Nike Flex Contact','Women-Nike-Flex-Contact.jpg',2,'Lorem ipsum dolor sit amet, sit cu nonumy praesent, et autem percipit eos, enim recteque ut vel. Nec justo quaeque mediocritatem in, pri omnis dissentiunt ad. Sit et vulputate suscipiantur, pro oportere scribentur ad, cu sea quas platonem. Quo elitr populo recusabo ut, autem persius mnesarchum ei duo. Ad mel virtute molestie.','2018-05-22 03:05:19','2018-05-22 03:11:48'),(45,'1960s Fashion','1960s-Fashion.jpg',1,'Ei sea malis reprimique, ut expetenda sadipscing omittantur ius, ei omnesque deserunt eos. Tamquam rationibus et pri, ipsum animal interesset eum cu. Mei case periculis et, an summo oportere suavitate eos, mei facer meliore omittam cu. Ei tamquam aliquando vix. Diam habemus quo ad. Nam docendi efficiantur at.','2018-05-22 03:40:34','2018-05-22 03:40:34'),(46,'2017 New Style ummer 60s','2017-New-style-Summer-60s-robe.jpg',1,'Ei sea malis reprimique, ut expetenda sadipscing omittantur ius, ei omnesque deserunt eos. Tamquam rationibus et pri, ipsum animal interesset eum cu. Mei case periculis et, an summo oportere suavitate eos, mei facer meliore omittam cu. Ei tamquam aliquando vix. Diam habemus quo ad. Nam docendi efficiantur at.','2018-05-22 03:42:09','2018-05-22 03:42:09'),(47,'Round Neck Printed Front Slit Dress','Round-Neck-Printed-Front-Slit-Dress.jpg',1,'Ei sea malis reprimique, ut expetenda sadipscing omittantur ius, ei omnesque deserunt eos. Tamquam rationibus et pri, ipsum animal interesset eum cu. Mei case periculis et, an summo oportere suavitate eos, mei facer meliore omittam cu. Ei tamquam aliquando vix. Diam habemus quo ad. Nam docendi efficiantur at.','2018-05-22 03:44:10','2018-05-22 03:44:10'),(48,'Child Of Mine By Carter&#39;s','Child-of-Mine-by-Carters.jpeg',5,'Eripuit maluisset pri ad, id vim sint utroque eleifend, rebum persius cu duo. Affert consulatu in vel, vel at urbanitas vituperata, saepe quaeque qui eu. At mei tempor oblique dolorum, eum eu dico eligendi. Nec posse deserunt ad, cu per vocibus delectus quaerendum.','2018-05-22 03:59:28','2018-05-22 03:59:28'),(49,'365 Kids From Garanimals','365-Kids-From-Garanimals.jpeg',5,'Eripuit maluisset pri ad, id vim sint utroque eleifend, rebum persius cu duo. Affert consulatu in vel, vel at urbanitas vituperata, saepe quaeque qui eu. At mei tempor oblique dolorum, eum eu dico eligendi. Nec posse deserunt ad, cu per vocibus delectus quaerendum.','2018-05-22 04:01:02','2018-05-22 04:01:02'),(50,'Wonder Nation','Wonder-Nation.jpeg',5,'Eripuit maluisset pri ad, id vim sint utroque eleifend, rebum persius cu duo. Affert consulatu in vel, vel at urbanitas vituperata, saepe quaeque qui eu. At mei tempor oblique dolorum, eum eu dico eligendi. Nec posse deserunt ad, cu per vocibus delectus quaerendum.','2018-05-22 04:03:01','2018-05-22 04:03:01'),(57,'Isabelle Lace Maternity Dress Cocoa','Isabelle-Lace-Dress-Cocoa.jpg',3,'Eu per fugit viris, mollis viderer eum eu. Per laudem accusamus at. Et sit odio illud viris, tale legendos gloriatur nam et. Quo tale feugiat no. Et vero cibo reformidans pri, velit nominati maiestatis id has. Zril volumus necessitatibus qui in. Ut nam sint populo, ut discere propriae vix.','2018-05-22 04:26:46','2018-05-22 04:26:46'),(58,'Prairie Fox Maternity Clothes','Prairie-Fox-Maternity-Clothes.jpg',3,'Eu per fugit viris, mollis viderer eum eu. Per laudem accusamus at. Et sit odio illud viris, tale legendos gloriatur nam et. Quo tale feugiat no. Et vero cibo reformidans pri, velit nominati maiestatis id has. Zril volumus necessitatibus qui in. Ut nam sint populo, ut discere propriae vix.','2018-05-22 04:39:52','2018-05-22 04:39:52');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-21 23:00:23
