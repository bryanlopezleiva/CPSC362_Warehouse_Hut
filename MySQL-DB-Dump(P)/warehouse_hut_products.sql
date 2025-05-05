-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: warehouse_hut
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productsID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) DEFAULT NULL,
  `productType` varchar(100) DEFAULT NULL,
  `productPrice` int DEFAULT NULL,
  `stockDate` varchar(50) DEFAULT NULL,
  `stockQuantity` int DEFAULT NULL,
  `areaSourced` varchar(100) DEFAULT NULL,
  `companyID` int DEFAULT NULL,
  PRIMARY KEY (`productsID`),
  KEY `companyID` (`companyID`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (6,'Pear','Fruit',2,'2025-03-25',2,'Walmart',NULL),(7,'Mountain Dew','Drink',5,'2025-03-12',10,'Walmart',NULL),(8,'Bacon','Food',7,'2025-03-12',8,'Walmart',NULL),(9,'Chicken Breast','Food',12,'2025-03-12',7,'Walmart',NULL),(10,'Gloves','Clothing',10,'2025-04-08',2,'Target',NULL),(11,'Grapes','Fruit',10,'2025-04-08',2,'Aldi',NULL),(12,'Coca Cola','Drink',5,'2025-04-08',1,'Target',NULL),(13,'Hershey\'s Milk Chocolate','Candy',8,'2025-04-08',2,'Target',NULL),(15,'Lego: Mario Set','Toy',50,'2025-04-09',1,'Target',NULL),(17,'Samsung Television','Electronic',400,'2025-04-08',1,'Target',NULL),(19,'Nokia Lumia','Electronics',200,'2025-05-05',1,'Target',NULL);
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

-- Dump completed on 2025-05-05  1:19:45
