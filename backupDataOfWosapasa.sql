-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: wosapasa
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Men Clothing',0),(2,'Women Clothing',0),(5,'children clothing',0),(6,'Jacket',1),(7,'Jeans',1),(8,'T-Shirt',1),(9,'Suits',1),(10,'Sweater',1),(11,'Tops',1),(12,'Hoodies',1),(13,'Shirt',1),(14,'Socks',1),(15,'Shoes',1),(16,'Watch',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `c_id` int NOT NULL,
  `price` int NOT NULL,
  `gender` varchar(10) NOT NULL,
  `number_of_stock` int NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Blue T-Shirt','A must-have in your wardrobe is this T-shirt. Highlighted with attractive design, this short-sleeved T-shirt is a steal deal. Made from cotton, this T-shirt is comfortable to wear with track pants and sports shoes.','WP20220324074932.jpg',8,999,'Male',8,1),(2,'Grey Cotton T-Shirts','Have coolest t-shirt for this summer in affordable price','WP20220327081901.jpg',8,499,'All',9,1),(3,'Grey Leather Jacket','Inspired by old-school biker style (and some boyfriends past and present), our signature leather jacket combines buttery soft, pebbled leather with chunky silver hardware. Guaranteed to up the cool quotient of pretty much any outfit','WP20220325030306.jpeg',6,3000,'Female',6,1),(4,'KTM CTY Men Polyfiber Jacket Without Hoodie (KPJ05911-8a)','For winter and best jacket ','WP20220325075849.jpg',6,1200,'Male',3,1),(5,'Cotton Plain Shirt','Cotton Plain Mens Casual Shirt','WP20220327072121.jpg',13,2500,'Male',5,1),(6,'Checked shirt','black and white checked shirt ','WP20220327072522.jpg',13,1500,'All',4,1),(7,'Navy Blue shirt','Men\'s casual and plain linen navy blue shirt long sleeves slim fit','WP20220327073231.jpg',13,1700,'Male',3,1),(8,'Cotton  Shirt ','Cotton Fancy Casual Shirt For Men','WP20220327073531.jpg',13,1000,'Male',8,1),(9,'Unisex Baseball T-Shirt','Play ball! Take to the field or the classroom in this classic contrasting baseball tee by Tultex. An always-fashionable style, this baseball T-shirt is great by itself or as a layer under a T-shirt or hoodie.','WP20220327073831.jpg',8,1500,'All',6,1),(10,'MenΓÇÖs Premium T-Shirt','This premium T-shirt is as close to perfect as can be. It\'s optimized for all types of print and will quickly become your favorite T-shirt. Soft, comfortable and durable, this is a definite must-own.','WP20220327075316.jpg',8,900,'Male',5,1),(11,'Garphyttan Crafter Carpenter Shirt Red M','The Garphyttan Crafter Carpenter Shirt is a strong flannel shirt for both work and leisure. The durable and comfortable fabric has made it a real favourite among our customers. It is excellent as a reinforcement garment','WP20220327100034.jpg',13,2200,'Male',4,1),(12,'Garphyttan Specialist Jacket Green M','The Garphyttan Specialist Jacket is designed for those who want to be able to move smoothly and easily through the countryside and forests. Stretch panels contribute to increased freedom of movement and flexibility, even when carrying a backpack.','WP20220327100308.jpg',6,19000,'Male',5,1),(14,'Elevate Silverton insulated jacket','Best for winter for men. This is best for people age between 20 -30.','WP20220327101548.jpg',6,12000,'Male',8,1),(15,'Grey insulated jacket ','It is a warm insulated jacket with quality and durability. Best for winter','WP20220327073709.jpg',6,6000,'All',11,1),(16,'Firstgear Kenya Mens Textile Motorcycle Jacket','Style with utility? That\'s what the new black Firstgear Kenya Mens Textile Motorcycle Jacket is all about! With its superb fit, classic lines, and soft hand, slipping into the Kenya motorcycle jacket is like putting on a favorite pair of jeans. Traditionally styled chest cargo pockets and copious front venting compliment the new Firstgear Kenya\'s utilitarian sensibility. A Hypertex waterproof and breathable shell keeps you dry and comfortable and underarm and rear zipper-vents allow ample environmental control. Kenya; form and function defined.','WP20220327102720.jpg',6,16000,'Male',5,1),(17,'Reversible Bomber Jacket','It is a jacket which can be reversed in two different colors. It is like having two jackets in a price of one.','WP20220327103022.jpg',6,7000,'Female',8,1),(18,'Diamante women jeans','Diamante Womens Plus Size Strech Straight Leg Denim jeans Pants Blue','WP20220327103338.jpeg',7,8800,'Female',8,1),(19,'Casual Stretch Faded Ripped Slim Fit Skinny Denim Jeans','It is a casual stretch faded ripped slim fit jeans. It is blue in colour. It comes in different sizes of small, medium, large, XL. ','WP20220327104001.jpg',7,9000,'Female',10,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_customer` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rohil','rohilprajapati@gmail.com','$2y$10$SrKFxhCgNxBad.lnBppFjOvTufWRcxW9k/DlCZAkksr68sSrPo/ca',1,0,1),(2,'Customer','test_customer@gmail.com','$2y$10$RJe/dvYWShIuklElNO6Av.ejDeTkSQRRJ2/LlCck07KII4fpDanka',0,1,1),(4,'test_customer','customer@gmail.com','$2y$10$VIEzR9thuCcF9yG//ywH5.ndKt4UGWKRRo8Vl/q2WNMakJ.iPKPKW',0,1,1),(5,'nhujan','nhujan@gmail.com','$2y$10$wIQShz4g0.tbB29JdBRCNOTAHIphLhxx0bKBi3McjcUUPV3CL.jh2',0,1,1),(6,'alan','alan@gmail.com','$2y$10$5uSIVwb4FbIGghNLxXtaAevHbYfDDCOmqEUJLU9lhoapsljlIIjoi',0,1,1),(7,'reena','reena@gmail.com','$2y$10$zmcmhymx0rztyZ0eyCkxCOSMnB8aq/BhzSQDPerahmTmqq9bVnog.',0,1,1),(8,'admin','admin@gmail.com','$2y$10$ZC48zFTKq6AZPOKaV0kgLOu8WcuI.xMMadEaB9oqwCxa2cBWfFTv.',1,1,1),(9,'test_admin','test_admin@gmail.com','$2y$10$FhGD6Cm8W1euVMr7AG3oV.vnpehszdbFLSKLk4XR3Xq0MvP4/ElJm',1,1,1),(10,'ritush','ritushrex@gmail.com','$2y$10$jeY3SFgoeBnbDVFSPgsQsegde0MXcLhdTt.3wRslNQ90jQpEMxgku',1,1,1);
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

-- Dump completed on 2022-03-27 22:06:46
