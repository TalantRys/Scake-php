-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: scake
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
-- Table structure for table `cakes`
--

DROP TABLE IF EXISTS `cakes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `weight` varchar(10) NOT NULL,
  `calories` float NOT NULL,
  `compound` text NOT NULL,
  `allergens` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `cakes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cakes_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cakes`
--

LOCK TABLES `cakes` WRITE;
/*!40000 ALTER TABLE `cakes` DISABLE KEYS */;
INSERT INTO `cakes` VALUES (1,1,3,'Любимый','Шоколадный бисквит, медовый полуфабрикат',1000,'assets/images/cakes/cake-1.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(2,1,3,'Шоколадный','Шоколадный бисквит на основе натуральной миндальной пасты',2000,'assets/images/cakes/cake-2.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(3,1,4,'Ягодный','Шоколадный бисквит, ягодный соус, ягодное кремю с ягодами черники и вишни',3000,'assets/images/cakes/cake-3.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(4,1,4,'Черёмуха','Нежные коржи черемухового бисквита, прослоенные сметано-сливочным кремом',4000,'assets/images/cakes/cake-4.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(5,1,2,'Йогуртовый с клубникой','Нежный бисквит, пропитанный сиропом',5000,'assets/images/cakes/cake-5.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(6,1,2,'Медовая ночь','Медовые коржи, прослоенные смородиновым желе и заварным кремом',6000,'assets/images/cakes/cake-6.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(7,1,1,'Карамель','Молочный бисквит, пропитанный карамелью, прослоен натуральными сливками',7000,'assets/images/cakes/cake-7.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(8,1,1,'Наполеон','Слоёное тесто с ванильно-сливочным заварным кремом',8000,'assets/images/cakes/cake-8.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.'),(9,2,4,'Мороженка','Шоколадный бисквит, мусс, крем-брюле с вишней, мороженое',9000,'assets/images/cakes/cake-9.jpg','1,4',214,'Яйцо, пшеничная мука, сливочное масло, сливки, фундук, сахар, разрыхлитель теста, какао порошок, молочный шоколад, темный шоколад','яйцо, глютен, лактоза, шоколад. Может содержать следы корицы.');
/*!40000 ALTER TABLE `cakes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Новинки'),(2,'Свадебные'),(3,'Праздничные'),(4,'Детям');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop-cart`
--

DROP TABLE IF EXISTS `shop-cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop-cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `counted_price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cake_id` (`cake_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `shop-cart_ibfk_1` FOREIGN KEY (`cake_id`) REFERENCES `cakes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shop-cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop-cart`
--

LOCK TABLES `shop-cart` WRITE;
/*!40000 ALTER TABLE `shop-cart` DISABLE KEYS */;
INSERT INTO `shop-cart` VALUES (1,1,3,1,0),(2,2,3,2,0);
/*!40000 ALTER TABLE `shop-cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Одноярусный'),(2,'Двухярусный');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin','rtalant02@mail.ru','c5b49ca7c975f797abad9decba03d4a9',0),(4,'TalantRys','rtalant02@mail.ru','c5b49ca7c975f797abad9decba03d4a9',0),(5,'Талант','rtalant02@mail.ru','c5b49ca7c975f797abad9decba03d4a9',0),(6,'admina','rtalant02@mail.ru','c5b49ca7c975f797abad9decba03d4a9',0),(7,'123','r@r.ru','c5b49ca7c975f797abad9decba03d4a9',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-19 22:53:19
