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
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (28,24,13,1),(30,21,7,1),(32,25,14,1),(45,22,1,1);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Men Clothing',0),(2,'Women Clothing',0),(5,'children clothing',0),(6,'Jackets',1),(7,'Jeans',1),(8,'T-Shirt',1),(9,'Suits',1),(10,'Sweater',1),(11,'Tops',1),(12,'Hoodies',1),(13,'Shirts',1),(14,'Socks',1),(15,'Shoes',1),(16,'Watch',1),(17,'Pants',1),(18,'glasses',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `fb_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`fb_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,'This  is first test feedback from rohil update test','This  is the first feedback from rohil this is  description update test',1),(4,'This is second text feedback','This is second text feedback hello test 3',1),(6,'User name and password of admin','username : admin@gmail.com\r\npassword  : admin12345',8),(7,'hello test feedback from mobile phone','Work fine and ui looks good',8),(9,'Hello Check Feedback','This is feedback check',17);
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `price` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `payment_id` (`payment_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,2500,24,28,1),(2,1,1900,23,29,1),(3,1,7000,22,29,1),(4,1,7000,16,30,8),(5,1,900,10,31,1),(6,1,100,25,32,1),(7,1,100,25,33,1),(8,1,100,25,34,1),(9,1,100,25,35,1),(10,1,100,25,36,1),(11,1,499,20,37,1),(12,1,2900,14,38,1),(13,3,1700,7,39,13),(14,6,100,25,40,7),(15,1,100,25,41,14),(16,3,2500,26,42,15),(17,1,6000,15,42,15),(18,1,2500,26,43,1),(19,1,100,25,44,1),(20,1,2900,14,45,17),(21,1,7000,16,45,17),(22,1,499,20,46,17),(23,1,7000,22,47,1),(24,1,1200,21,48,1),(25,1,1200,21,49,1),(26,1,1200,21,50,1),(27,1,1200,21,51,1),(28,1,1200,21,52,1),(29,1,1200,21,53,1),(30,1,2900,14,54,1),(31,1,1500,6,55,1),(32,1,2200,11,56,1),(33,1,1200,21,57,1),(34,1,2500,5,58,1),(35,1,7000,16,59,1),(36,1,999,1,60,1),(37,1,2500,26,61,1),(38,1,6000,15,61,1),(39,1,1200,21,61,1),(40,1,400,28,62,1),(41,1,1900,12,63,1),(42,1,1900,12,64,1),(43,1,2500,26,65,1),(44,1,2500,26,66,1),(45,5,1900,23,67,1),(46,1,1200,21,70,17),(47,1,2500,26,71,17),(48,1,400,28,72,17),(49,1,1200,21,72,17),(50,1,1900,12,72,17),(51,1,2900,14,73,17),(52,1,2500,26,74,1),(53,1,2500,26,75,1),(54,1,1900,23,76,1),(55,1,1200,4,77,1),(56,1,400,28,78,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `total_amt` int NOT NULL,
  `payment_uid` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `payment_status` tinyint(1) DEFAULT '0',
  `delivery_status` tinyint(1) DEFAULT '0',
  `payment_method` varchar(255) NOT NULL,
  `payment_by` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `cancel_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`payment_id`),
  UNIQUE KEY `payment_uid` (`payment_uid`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (28,2500,'WP20220511044111','2022-05-11','0003HZ6','Samakhusi','9860687243',1,1,'esewa','rohil',1,0),(29,8900,'WP20220511050041','2022-05-11','0003Y66','samakhusi','986067243',1,1,'esewa','rohil',1,0),(30,7000,'WP20220521080353','2022-05-21',NULL,'Swoyambhu','1234567890',1,1,'esewa','admin',8,0),(31,900,'WP20220525013955','2022-05-25','0003Y7M','Samakhusi','9860687243',1,1,'esewa','rohil',1,0),(32,100,'WP20220525042412','2022-05-25','0003YJ0','Samakhusi','9860687243',1,0,'esewa','rohil',1,1),(33,100,'WP20220527043825','2022-05-27','0003YNA','samakhushi','90000000000',1,1,'esewa','rohil',1,0),(34,100,'WP20220527052441','2022-05-27',NULL,'Samakhusi','9860687243',0,0,'esewa','rohil',1,1),(35,100,'WP20220527052555','2022-05-27',NULL,'Samakhusi','9860687243',0,0,'esewa','rohil',1,1),(36,100,'WP20220527062343','2022-05-27','00042RB','Samakhusi','9860687243',1,1,'esewa','rohil',1,0),(37,499,'WP20220527110054','2022-05-27','00049OT','Samakhusi','986067243',1,1,'esewa','rohil',1,0),(38,2900,'WP20220528084048','2022-05-28',NULL,'samakhusi','9860687243',1,1,'esewa','rohil',1,0),(39,5100,'WP20220529090806','2022-05-29',NULL,'samakhusi ','9803064551',1,1,'esewa','Ritush',13,0),(40,600,'WP20220529101955','2022-05-29',NULL,'kathmandu','9843019944',0,0,'esewa','reena',7,0),(41,100,'WP20220529104757','2022-05-29',NULL,'balaju','1234567890',0,0,'esewa','sailendra',14,0),(42,13500,'WP20220529112011','2022-05-29',NULL,'samakhusi','9841123456',0,0,'esewa','tilak',15,0),(43,2500,'WP20220529113144','2022-05-29',NULL,'Samakhusi','9860687243',0,0,'esewa','rohil',1,0),(44,100,'WP20220530082634','2022-05-30',NULL,'Samakhusi','9841123456',0,0,'Cash','rohil',1,0),(45,9900,'WP20220605112755','2022-06-05','00040SH','samakhusi','9841123456',1,1,'esewa','rohil_college',17,0),(46,499,'WP20220605113052','2022-06-05',NULL,'Thamel','9831123456',0,0,'Cash','rohil_college',17,1),(47,7000,'WP20220608042016','2022-06-08',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(48,1200,'WP20220608042245','2022-06-08',NULL,'samakhusi','9860687243',0,0,'Cash','rohil',1,0),(49,1200,'WP20220608042325','2022-06-08',NULL,'samakhusi','9860687243',0,0,'Cash','rohil',1,0),(50,1200,'WP20220608042403','2022-06-08',NULL,'samakhusi','9860687243',0,0,'Cash','rohil',1,0),(51,1200,'WP20220608042502','2022-06-08',NULL,'samakhusi','9860687243',0,0,'Cash','rohil',1,0),(52,1200,'WP20220608042742','2022-06-08',NULL,'samakhusi','9860687243',0,0,'Cash','rohil',1,0),(53,1200,'WP20220608042833','2022-06-08',NULL,'samakhusi','9860687243',0,0,'Cash','rohil',1,0),(54,2900,'WP20220609093805','2022-06-09',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(55,1500,'WP20220609094149','2022-06-09',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(56,2200,'WP20220612111924','2022-06-12','00041T2','Samakhusi','9841123456',1,0,'esewa','rohil',1,0),(57,1200,'WP20220612112712','2022-06-12','00041T3','panchdhara','1234567',1,0,'esewa','rohil',1,0),(58,2500,'WP20220612020137','2022-06-12',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(59,7000,'WP20220612020525','2022-06-12',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(60,999,'WP20220612021800','2022-06-12',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(61,9700,'WP20220617065644','2022-06-17',NULL,'Samakhusi','9860687243',1,1,'esewa','rohil',1,0),(62,400,'WP20220628022959','2022-06-28',NULL,'Samakhusi','9841123456',1,0,'Cash','rohil',1,0),(63,1900,'WP20220814022715','2022-08-14',NULL,'Samakhusi,Kathmandu','9860687243',0,0,'esewa','rohil',1,0),(64,1900,'WP20220814022723','2022-08-14',NULL,'Samakhusi,Kathmandu','9860687243',0,0,'esewa','rohil',1,0),(65,2500,'WP20220814024248','2022-08-14',NULL,'thamel','92',0,0,'Cash','rohil',1,0),(66,2500,'WP20220814024255','2022-08-14',NULL,'thamel','92',0,0,'Cash','rohil',1,1),(67,9500,'WP20220814045137','2022-08-14',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(68,9500,'WP20220814045147','2022-08-14',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,0),(69,9500,'WP20220814045157','2022-08-14',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil',1,1),(70,1200,'WP20220817112439','2022-08-17',NULL,'Samakhusi','9860687243',0,0,'Cash','rohil_college',17,0),(71,2500,'WP20220817115340','2022-08-17',NULL,'samakhusi ','986069821',0,0,'Cash','rohil_college',17,0),(72,3500,'WP20220913060001','2022-09-13',NULL,'samakhusi','9860687243',0,0,'esewa','rohil_college',17,1),(73,2900,'WP20220921100030','2022-09-21',NULL,'dsfkl','9860687243',0,0,'Cash','rohil_college',17,0),(74,2500,'WP20221115111213','2022-11-15',NULL,'samakhusi','9860687243',0,0,'esewa','rohil',1,0),(75,2500,'WP20221227110026','2022-12-27',NULL,'Samakhusi','Prajapati',0,0,'esewa','rohil',1,0),(76,1900,'WP20221228124735','2022-12-28',NULL,'samakhusi','9860687243',0,0,'esewa','rohil',1,0),(77,1200,'WP20221229123920','2022-12-29','0004WFZ','Samakhusi','9860687243',1,0,'esewa','rohil',1,0),(78,400,'WP20230112020808','2023-01-12','0004YGC','Samakhusi','9860687243',1,0,'esewa','rohil',1,0);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
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
  `keyword` varchar(255) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Blue T-Shirt','A must-have in your wardrobe is this T-shirt. Highlighted with attractive design, this short-sleeved T-shirt is a steal deal. Made from cotton, this T-shirt is comfortable to wear with track pants and sports shoes.','WP20220324074932.jpg',8,999,'Male',10,'t-Shirt, blue, Confortable, tshirt,t-shirts, ',1),(2,'Grey Cotton T-Shirts','Have coolest t-shirt for this summer in affordable price','WP20220327081901.jpg',8,499,'All',9,'cotton, t-shirt, casual, grey, confortable,tshirt,',1),(3,'Grey Leather Jacket','Inspired by old-school biker style (and some boyfriends past and present), our signature leather jacket combines buttery soft, pebbled leather with chunky silver hardware. Guaranteed to up the cool quotient of pretty much any outfit','WP20220325030306.jpeg',6,3000,'Female',6,'jackets, jacket, female, women ,girls, girl, winter, bike',1),(4,'KTM CTY Men Polyfiber Jacket Without Hoodie (KPJ05911-8a)','For winter and best jacket ','WP20220330123310.jpg',6,1200,'Male',2,'black, jackets,men',1),(5,'Cotton Plain Shirt','Cotton Plain Mens Casual Shirt','WP20220327072121.jpg',13,2500,'Male',4,'blue, shirt, formal',1),(6,'Checked shirt','black and white checked shirt ','WP20220327072522.jpg',13,1500,'All',3,'casual, sport, shirt, chess',1),(7,'Navy Blue shirt','Men\'s casual and plain linen navy blue shirt long sleeves slim fit','WP20220327073231.jpg',13,1700,'Male',6,'Blue, Navy, Shirts ',1),(8,'Cotton  Shirt ','Cotton Fancy Casual Shirt For Men','WP20220327073531.jpg',13,1000,'Male',8,'cotton, shirt, formal',1),(9,'Unisex Baseball T-Shirt','Play ball! Take to the field or the classroom in this classic contrasting baseball tee by Tultex. An always-fashionable style, this baseball T-shirt is great by itself or as a layer under a T-shirt or hoodie.','WP20220327073831.jpg',8,1500,'All',6,'casual, sport, T-shirts,tshirt,t-shirt',1),(10,'MenΓÇÖs Premium T-Shirt','This premium T-shirt is as close to perfect as can be. It\'s optimized for all types of print and will quickly become your favorite T-shirt. Soft, comfortable and durable, this is a definite must-own.','WP20220327075316.jpg',8,900,'Male',3,'white, printed, print, boy, gents, male, confortable,summer, white shirt',1),(11,'Garphyttan Crafter Carpenter Shirt Red M','The Garphyttan Crafter Carpenter Shirt is a strong flannel shirt for both work and leisure. The durable and comfortable fabric has made it a real favourite among our customers. It is excellent as a reinforcement garment','WP20220327100034.jpg',13,2200,'Male',3,'chess, shirt, red, black,cold, winter',1),(12,'Garphyttan Specialist Jacket Green M','The Garphyttan Specialist Jacket is designed for those who want to be able to move smoothly and easily through the countryside and forests. Stretch panels contribute to increased freedom of movement and flexibility, even when carrying a backpack.','WP20220327100308.jpg',6,1900,'Male',3,'jackets, casual, winter, cold',1),(14,'Elevate Silverton insulated jacket','Best for winter for men. This is best for people age between 20 -30.','WP20220327101548.jpg',6,2900,'Male',5,NULL,1),(15,'Grey insulated jacket ','It is a warm insulated jacket with quality and durability. Best for winter','WP20220327073709.jpg',6,6000,'All',11,NULL,1),(16,'Firstgear Kenya Mens Textile Motorcycle Jacket','Style with utility? That\'s what the new black Firstgear Kenya Mens Textile Motorcycle Jacket is all about! With its superb fit, classic lines, and soft hand, slipping into the Kenya motorcycle jacket is like putting on a favorite pair of jeans. Traditionally styled chest cargo pockets and copious front venting compliment the new Firstgear Kenya\'s utilitarian sensibility. A Hypertex waterproof and breathable shell keeps you dry and comfortable and underarm and rear zipper-vents allow ample environmental control. Kenya; form and function defined.','WP20220327102720.jpg',6,7000,'Male',3,NULL,1),(17,'Reversible Bomber Jacket','It is a jacket which can be reversed in two different colors. It is like having two jackets in a price of one.','WP20220327103022.jpg',6,3500,'Female',8,NULL,1),(18,'Diamante women jeans','Diamante Womens Plus Size Strech Straight Leg Denim jeans Pants Blue','WP20220327103338.jpeg',7,2800,'Female',8,'chose, stretch, fit jeans, pants, legs',1),(19,'Casual Stretch Faded Ripped Slim Fit Skinny Denim Jeans','It is a casual stretch faded ripped slim fit jeans. It is blue in colour. It comes in different sizes of small, medium, large, XL. ','WP20220327104001.jpg',7,1800,'Female',10,'chose, stretch, fit jeans, pants, legs',1),(20,'3 pair of socks for girls','Come in 6 difference color. Cute socks for girls','WP20220329091253.jpg',14,499,'Female',7,'socks, shoes, leg, girl, winter, style, warm, comfortable',1),(21,'Goldstar Concord Lace Up Casual Shoes For Men- White ','Goldstar Concord Casual Shoes is one of the comfortable shoes with casual/sports and fashionable features. It can be used for light sports activities like jugging, running, racket sports or with casual outfit.\r\n\r\nGoldstar is one of the oldest Shoes manufacturers in Nepal, serving with varieties of Ladies and Gents footwear that meets all your requirement and suits all your need.','WP20220330045801.jpg',15,1200,'Male',7,'shoes, goldstar,casual, legs, comfortable,sport',1),(22,'OSCO Men Dress Shoes Men Formal Shoes Leather Luxury','Formal Shoes for party, and event . Best for Interview formal events or meeting','WP20220330050737.jpg',15,7000,'Male',11,'shoes, men, adult, legs, formal, office, party, events, interview',1),(23,'Skinny Khaki Pants - Twill Pants','Casual pants for hanging out with friends and family.','WP20220330053117.jpg',17,1900,'Male',4,'Pants, casual, summer',1),(24,'Moss London Mens Grey Suit Trousers Skinny Fit Speckled','Checked pants for office and meeting. Formal pants for you office and Interview','WP20220330053350.jpg',17,2500,'Male',2,'formal, pants, office, meeting, interview,male ,gents, checked, grey',1),(25,'socks','1 pair or socks ','WP20220427063121.jpg',14,100,'All',3,'socks, shoes, leg, girl, winter, style, warm, comfortable',1),(26,'jacket test','very cool \'nice\'','WP20220529100558.jpg',6,2500,'Male',0,'test jacket winter',1),(27,'jackets','this is jackets','WP20220529112307.jpg',6,1200,'Male',12,'test jacket winter',0),(28,'Socks pair of 4','This is socks is made of cotton','WP20220605012431.jpg',14,400,'All',11,'socks, winter, warm',1),(29,'test product','test product','WP20220921012636.jpg',10,1200,'Female',12,'',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rohil','rohilprajapati@gmail.com','$2y$10$SrKFxhCgNxBad.lnBppFjOvTufWRcxW9k/DlCZAkksr68sSrPo/ca',1,0,1),(2,'Customer','test_customer@gmail.com','$2y$10$RJe/dvYWShIuklElNO6Av.ejDeTkSQRRJ2/LlCck07KII4fpDanka',0,1,1),(4,'test_customer','customer@gmail.com','$2y$10$VIEzR9thuCcF9yG//ywH5.ndKt4UGWKRRo8Vl/q2WNMakJ.iPKPKW',0,1,1),(5,'nhujan','nhujan@gmail.com','$2y$10$wIQShz4g0.tbB29JdBRCNOTAHIphLhxx0bKBi3McjcUUPV3CL.jh2',0,1,1),(6,'alan','alan@gmail.com','$2y$10$5uSIVwb4FbIGghNLxXtaAevHbYfDDCOmqEUJLU9lhoapsljlIIjoi',0,1,1),(7,'reena','reena@gmail.com','$2y$10$zmcmhymx0rztyZ0eyCkxCOSMnB8aq/BhzSQDPerahmTmqq9bVnog.',0,1,1),(8,'admin','admin@gmail.com','$2y$10$ZC48zFTKq6AZPOKaV0kgLOu8WcuI.xMMadEaB9oqwCxa2cBWfFTv.',1,1,1),(9,'test_admin','test_admin@gmail.com','$2y$10$FhGD6Cm8W1euVMr7AG3oV.vnpehszdbFLSKLk4XR3Xq0MvP4/ElJm',1,1,1),(10,'ritush','ritushrex@gmail.com','$2y$10$jeY3SFgoeBnbDVFSPgsQsegde0MXcLhdTt.3wRslNQ90jQpEMxgku',1,1,1),(11,'AmanMhrjn','amanmaharjan@gmail.com','$2y$10$GWhM/wngtdIE0FjKtSFfJeOkrKhXENDIseB4w1GUwkWawRoNgjVe2',0,1,1),(13,'Ritush','reitz@gmail.com','$2y$10$mN4TN.aKvOthEo0wc/9NtOp1jpUsp7G0so/PDmUdvZtmX6p7pC62i',1,1,1),(14,'sailendra','haha@gmail.com','$2y$10$QkIOnZPQ4O1Xf4lqP6/eQ.KEZAjscbi9g6jfWW5X3xUEefjoL/sLS',0,1,1),(15,'tilak','tilakpeace0000@gmail.com','$2y$10$jSX6LtTJi0CTXCnNNuWuCeVqaSaxjj7ZwH9KlaQDNwwyYKow7EpeO',0,1,0),(17,'rohil_college','bca190602_rohil@achsnepal.edu.np','$2y$10$u4tmqas8SeXJgpDGsg7Nd.NKfoCTQwGYbXrlj.AuH9SyW.I8o5Exm',0,1,1);
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

-- Dump completed on 2023-02-14 18:13:07
