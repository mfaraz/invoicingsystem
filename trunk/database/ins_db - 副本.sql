-- MySQL dump 10.13  Distrib 5.1.42, for Win32 (ia32)
--
-- Host: localhost    Database: ins_db
-- ------------------------------------------------------
-- Server version	5.1.42-community-log

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
-- Table structure for table `ins_admins`
--

DROP TABLE IF EXISTS `ins_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(50) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_admins`
--

LOCK TABLES `ins_admins` WRITE;
/*!40000 ALTER TABLE `ins_admins` DISABLE KEYS */;
INSERT INTO `ins_admins` VALUES (1,'admin','jeO+T2gyDhiaK78oIuGuTLEC/bbaE9twNh47MiEuWEzHLh7Te9E4+37LGg8tzdg+/mGvylRD5M3CSKrgNLbZ1w==');
/*!40000 ALTER TABLE `ins_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_members`
--

DROP TABLE IF EXISTS `ins_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `qq` varchar(12) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_members`
--

LOCK TABLES `ins_members` WRITE;
/*!40000 ALTER TABLE `ins_members` DISABLE KEYS */;
INSERT INTO `ins_members` VALUES (2,'asdfa','343','434','343','3',2,'34'),(3,'334','4','4343','3','d',2,'343');
/*!40000 ALTER TABLE `ins_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_other_cost_detail`
--

DROP TABLE IF EXISTS `ins_other_cost_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_other_cost_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_other_cost_detail`
--

LOCK TABLES `ins_other_cost_detail` WRITE;
/*!40000 ALTER TABLE `ins_other_cost_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_other_cost_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_other_cost_main`
--

DROP TABLE IF EXISTS `ins_other_cost_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_other_cost_main` (
  `main_id` int(11) NOT NULL AUTO_INCREMENT,
  `insert_date` date NOT NULL,
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`main_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_other_cost_main`
--

LOCK TABLES `ins_other_cost_main` WRITE;
/*!40000 ALTER TABLE `ins_other_cost_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_other_cost_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_product`
--

DROP TABLE IF EXISTS `ins_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_real_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_remarks` varchar(200) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_product`
--

LOCK TABLES `ins_product` WRITE;
/*!40000 ALTER TABLE `ins_product` DISABLE KEYS */;
INSERT INTO `ins_product` VALUES (198,'松鹤延年','66400','','2010-04-22 19:59:05','2010-04-22 11:59:05','26.00'),(199,'马到成功','d0032','','2010-04-22 19:59:05','2010-04-22 11:59:05','35.20'),(200,'大展宏图','d0004','','2010-04-22 19:59:05','2010-04-22 11:59:05','36.80'),(201,'百福','66098','','2010-04-22 19:59:05','2010-04-22 11:59:05','28.80'),(202,'寿比南山','66108','','2010-04-22 19:59:05','2010-04-22 11:59:05','22.40'),(203,'暧昧','66483','','2010-04-22 19:59:05','2010-04-22 11:59:05','16.00'),(204,'和气志祥','66128','','2010-04-22 19:59:05','2010-04-22 11:59:05','18.00'),(205,'收纳盒','tx-008','','2010-04-22 19:59:05','2010-04-22 11:59:05','15.20'),(206,'化妆包','hz-003','','2010-04-22 19:59:05','2010-04-22 11:59:05','15.20'),(207,'我爱我家','66560','','2010-04-22 19:59:05','2010-04-22 11:59:05','19.20'),(208,'百寿','66099','','2010-04-22 19:59:05','2010-04-22 11:59:05','28.80'),(209,'八骏奔腾','66006','','2010-04-22 19:59:05','2010-04-22 11:59:05','20.80'),(210,'家和福顺-顺','z0120','','2010-04-22 20:31:16','2010-04-22 12:31:16','16.00'),(211,'约定今生','66538','','2010-04-22 20:31:16','2010-04-22 12:31:16','22.40'),(212,'宝宝的脚印','b0002','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.00'),(213,'小嘟嘟','k0059','','2010-04-22 20:31:16','2010-04-22 12:31:16','12.00'),(214,'甜美','k0016','','2010-04-22 20:31:16','2010-04-22 12:31:16','16.00'),(215,'琴棋书画','z0090','','2010-04-22 20:31:16','2010-04-22 12:31:16','16.00'),(216,'玫瑰情人','h0110','','2010-04-22 20:31:16','2010-04-22 12:31:16','11.20'),(217,'年年有余','d0022','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.00'),(218,'品味','k0057','','2010-04-22 20:31:16','2010-04-22 12:31:16','8.00'),(219,'一帆风顺','f0026','','2010-04-22 20:31:16','2010-04-22 12:31:16','12.80'),(220,'红色妖姬','h0081','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.00'),(221,'花之语','h0049','','2010-04-22 20:31:16','2010-04-22 12:31:16','7.20'),(222,'和','z0115','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.00'),(223,'成功、祝福','r0036','','2010-04-22 20:31:16','2010-04-22 12:31:16','11.20'),(224,'不能不爱','97056','','2010-04-22 20:31:16','2010-04-22 12:31:16','12.00'),(225,'相拥','97009','','2010-04-22 20:31:16','2010-04-22 12:31:16','12.00'),(226,'彩蝶双飞','97073','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.40'),(227,'舞蝶','97019','','2010-04-22 20:31:16','2010-04-22 12:31:16','12.00'),(228,'快乐伙伴','97078','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.00'),(229,'梅兰竹菊','66013','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.00'),(230,'生意兴隆','z0039','','2010-04-22 20:31:16','2010-04-22 12:31:16','11.20'),(231,'悠悠华香','h0018','','2010-04-22 20:31:16','2010-04-22 12:31:16','10.40'),(232,'新婚','r0034','','2010-04-22 20:31:16','2010-04-22 12:31:16','15.20'),(233,'慈祥观音','r0077','','2010-04-22 20:31:16','2010-04-22 12:31:16','18.00'),(234,'钱包','qb013','','2010-04-22 20:31:16','2010-04-22 12:31:16','18.00'),(235,'三折带扣钱包','b-104','','2010-04-22 20:31:16','2010-04-22 12:31:16','23.60'),(236,'三折钱包','b-085','','2010-04-22 20:31:16','2010-04-22 12:31:16','22.40'),(237,'家和万事兴','z0057','','2010-04-22 20:31:16','2010-04-22 12:31:16','18.00'),(238,'淡雅四季','f0042','','2010-04-22 20:31:16','2010-04-22 12:31:16','18.00'),(239,'家和万事兴11','z0011','','2010-04-22 20:31:16','2010-04-22 12:31:16','18.00'),(240,'布加迪威龙','f0020','','2010-04-22 20:31:16','2010-04-22 12:31:16','16.00'),(241,'平安是福','z0105','','2010-04-22 20:31:16','2010-04-22 12:31:16','16.00'),(242,'honey','66568','','2010-04-22 20:31:16','2010-04-22 12:31:16','16.00'),(243,'心中只有你','r0047','','2010-04-22 20:50:39','2010-04-22 12:50:39','15.20'),(244,'一生的承诺','r0039','','2010-04-22 20:50:39','2010-04-22 12:50:39','18.00'),(245,'相伴一生','k0008','','2010-04-22 20:50:39','2010-04-22 12:50:39','10.00'),(246,'爱你的心','r0097','','2010-04-22 20:50:39','2010-04-22 12:50:39','13.20'),(247,'生意兴隆(富贵版）','z0073','','2010-04-22 20:50:39','2010-04-22 12:50:39','19.20'),(248,'','无花边抱枕','','2010-04-22 20:50:39','2010-04-22 12:50:39','14.00'),(249,'','蕾丝抱枕','','2010-04-22 20:50:39','2010-04-22 12:50:39','16.80'),(250,'','抱枕','','2010-04-22 20:50:39','2010-04-22 12:50:39','18.00'),(251,'幸福恋人','k0066','','2010-04-22 20:50:39','2010-04-22 12:50:39','13.20'),(252,'','口罩','','2010-04-22 20:50:39','2010-04-22 12:50:39','4.80'),(253,'','卡套','','2010-04-22 20:50:39','2010-04-22 12:50:39','3.30'),(254,'','月月包','','2010-04-22 20:50:39','2010-04-22 12:50:39','7.20'),(255,'','卡包','','2010-04-22 20:50:39','2010-04-22 12:50:39','6.40'),(256,'','零钱包','','2010-04-22 20:50:39','2010-04-22 12:50:39','8.80'),(257,'','手机袋','','2010-04-22 20:50:39','2010-04-22 12:50:39','3.60'),(258,'','手机挂链','','2010-04-22 20:50:39','2010-04-22 12:50:39','2.90'),(259,'','中国结','','2010-04-22 20:50:39','2010-04-22 12:50:39','5.20'),(260,'福如东海','66113','','2010-04-22 20:58:16','2010-04-22 12:58:16','22.00'),(261,'财源广进（元宝版）','z0185','','2010-04-22 20:58:16','2010-04-22 12:58:16','18.00'),(262,'','梦娜','','2010-04-22 20:58:16','2010-04-22 12:58:16','5.00'),(263,'','浪莎网袜','','2010-04-22 20:58:16','2010-04-22 12:58:16','7.20'),(264,'','维纳斯','','2010-04-22 20:58:16','2010-04-22 12:58:16','4.20'),(265,'','浪莎短袜','','2010-04-22 20:58:16','2010-04-22 12:58:16','1.20'),(266,'','花边肩带','','2010-04-22 21:01:10','2010-04-22 13:01:10','1.50'),(267,'','肩带','','2010-04-22 21:01:10','2010-04-22 13:01:10','1.30');
/*!40000 ALTER TABLE `ins_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_sale_detail`
--

DROP TABLE IF EXISTS `ins_sale_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_sale_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `main_id` (`main_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_sale_detail`
--

LOCK TABLES `ins_sale_detail` WRITE;
/*!40000 ALTER TABLE `ins_sale_detail` DISABLE KEYS */;
INSERT INTO `ins_sale_detail` VALUES (3,43,114,2,'2.00'),(4,43,141,1,'33.00'),(5,44,104,2,'33.00'),(6,45,199,1,'222.00'),(10,49,198,1,'45.00'),(11,49,244,1,'40.00'),(12,49,242,1,'40.00'),(13,49,229,1,'20.00'),(14,49,215,2,'30.00'),(15,49,255,1,'15.00'),(16,49,268,2,'2.00'),(17,50,255,2,'12.50'),(18,50,268,2,'2.00'),(19,50,259,1,'8.00'),(20,50,237,1,'40.00'),(21,50,241,1,'30.00'),(23,52,237,1,'40.00'),(24,52,255,4,'12.00'),(25,52,249,2,'25.00'),(26,52,262,2,'5.50'),(27,52,246,1,'25.00'),(28,52,216,1,'30.00'),(29,52,222,1,'18.00'),(30,52,224,1,'20.00'),(31,52,217,1,'20.00'),(32,52,221,1,'20.00'),(33,52,238,1,'25.00'),(34,53,263,1,'10.00'),(35,53,262,2,'6.00'),(36,53,229,1,'20.00'),(37,53,257,2,'7.00'),(38,54,217,1,'25.00'),(39,54,237,1,'30.00'),(40,54,270,1,'49.00'),(41,55,218,1,'22.00'),(42,55,213,1,'30.00'),(43,55,277,1,'100.00'),(44,56,255,2,'12.00'),(45,56,231,1,'25.00'),(46,56,255,1,'11.00'),(47,56,249,1,'25.00'),(48,56,249,1,'40.00'),(49,56,245,1,'20.00'),(50,57,253,2,'9.00'),(51,57,217,1,'20.00'),(52,57,234,1,'25.00'),(53,57,281,1,'20.00'),(54,58,280,1,'70.00'),(55,58,288,1,'20.00'),(56,59,237,2,'30.00'),(57,59,271,1,'23.00'),(58,59,255,1,'15.00'),(59,59,258,1,'6.00'),(60,59,204,1,'38.00'),(61,59,288,1,'20.00'),(62,59,248,1,'30.00'),(63,59,210,1,'35.00'),(65,61,244,1,'25.00'),(66,61,225,1,'20.00'),(67,61,248,1,'20.00'),(68,61,206,1,'20.00'),(69,61,229,1,'20.00'),(70,61,293,1,'35.00'),(71,62,249,1,'25.00'),(72,62,253,1,'9.00'),(73,62,262,1,'6.00'),(74,62,259,1,'7.00'),(75,63,257,3,'6.00'),(76,63,256,1,'12.00'),(77,63,213,1,'20.00'),(78,63,244,1,'35.00'),(80,63,251,1,'28.00'),(81,63,243,1,'35.00'),(83,58,214,1,'35.00');
/*!40000 ALTER TABLE `ins_sale_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_sale_main`
--

DROP TABLE IF EXISTS `ins_sale_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_sale_main` (
  `main_id` int(11) NOT NULL AUTO_INCREMENT,
  `insert_date` datetime NOT NULL,
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`main_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_sale_main`
--

LOCK TABLES `ins_sale_main` WRITE;
/*!40000 ALTER TABLE `ins_sale_main` DISABLE KEYS */;
INSERT INTO `ins_sale_main` VALUES (43,'2010-04-20 00:00:00','2010-04-20 23:22:48',''),(44,'2010-04-19 00:00:00','2010-04-21 08:38:19',''),(45,'2013-03-01 00:00:00','2013-03-26 12:07:11',''),(49,'2010-04-23 00:00:00','2010-04-23 13:14:36',''),(50,'2010-04-24 00:00:00','2010-04-24 08:05:22',''),(52,'2010-04-25 00:00:00','2010-04-25 14:01:47',''),(53,'2010-04-27 00:00:00','2010-04-27 14:46:20',''),(54,'2010-04-28 00:00:00','2010-04-28 11:48:43',''),(55,'2010-04-29 00:00:00','2010-04-29 10:43:33',''),(56,'2010-04-30 00:00:00','2010-05-01 12:21:58',''),(57,'2010-05-01 00:00:00','2010-05-01 12:24:55',''),(58,'2010-05-10 00:00:00','2010-05-01 12:26:14',''),(59,'2010-05-02 00:00:00','2010-05-02 14:40:55',''),(61,'2010-05-03 00:00:00','2010-05-03 13:28:54',''),(62,'2010-05-08 00:00:00','2010-05-10 23:51:33',''),(63,'2010-05-09 00:00:00','2010-05-10 23:55:24','');
/*!40000 ALTER TABLE `ins_sale_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_stock_detail`
--

DROP TABLE IF EXISTS `ins_stock_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_stock_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `main_id` (`main_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_stock_detail`
--

LOCK TABLES `ins_stock_detail` WRITE;
/*!40000 ALTER TABLE `ins_stock_detail` DISABLE KEYS */;
INSERT INTO `ins_stock_detail` VALUES (1,1,1,23),(2,1,1,23),(3,2,1,23),(4,2,1,343),(5,3,1,43),(6,4,1,2),(7,5,28,2),(8,5,31,3),(9,5,31,34),(10,5,33,34),(11,5,37,34),(12,5,38,34),(13,17,27,2),(14,18,65,2),(15,18,66,34),(16,19,67,2),(17,20,68,2),(18,21,43,2),(19,22,69,55),(20,23,69,34),(163,49,198,1),(164,49,199,1),(165,49,200,1),(166,49,201,1),(167,49,202,1),(168,49,203,1),(169,49,204,1),(170,49,205,2),(171,49,206,2),(172,49,207,1),(173,49,208,1),(174,49,209,1),(175,49,210,1),(176,49,211,1),(177,49,212,2),(178,49,213,2),(179,49,214,1),(180,49,215,2),(181,49,216,1),(182,49,217,3),(183,49,218,1),(184,49,219,1),(185,49,220,1),(186,49,221,3),(187,49,222,1),(188,49,223,2),(189,49,224,1),(190,49,225,1),(191,49,226,1),(192,49,227,1),(193,49,228,1),(194,49,229,5),(195,49,230,2),(196,49,231,1),(197,49,232,1),(198,49,233,1),(199,49,234,3),(200,49,235,2),(201,49,236,1),(202,49,237,1),(203,49,238,1),(204,49,239,1),(205,49,240,1),(206,49,241,1),(207,49,242,1),(208,49,243,1),(209,49,244,1),(210,49,245,1),(211,49,246,1),(212,49,247,1),(213,49,248,3),(214,49,249,6),(215,49,250,2),(216,49,251,1),(217,49,252,8),(218,49,253,4),(219,49,254,4),(220,49,255,4),(221,49,256,1),(222,49,257,7),(223,49,258,10),(224,49,259,1),(225,49,260,1),(226,49,261,1),(227,49,262,17),(228,49,263,1),(229,49,264,6),(230,49,265,10),(231,49,266,11),(232,49,267,7);
/*!40000 ALTER TABLE `ins_stock_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_stock_main`
--

DROP TABLE IF EXISTS `ins_stock_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_stock_main` (
  `main_id` int(11) NOT NULL AUTO_INCREMENT,
  `insert_date` datetime NOT NULL,
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`main_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_stock_main`
--

LOCK TABLES `ins_stock_main` WRITE;
/*!40000 ALTER TABLE `ins_stock_main` DISABLE KEYS */;
INSERT INTO `ins_stock_main` VALUES (1,'2010-04-14 00:00:00','2010-04-17 03:46:06','	343	'),(2,'2010-04-15 00:00:00','2010-04-17 03:46:24','	343	'),(3,'2010-04-19 00:00:00','2010-04-17 04:16:06','	43'),(4,'2010-04-15 00:00:00','2010-04-17 05:14:45','	343	'),(5,'2010-04-12 00:00:00','2010-04-17 16:27:05','	34		'),(6,'2010-04-13 00:00:00','2010-04-18 04:04:28','	3		'),(7,'2010-04-19 00:00:00','2010-04-18 04:14:26','asdf'),(8,'2010-04-19 00:00:00','2010-04-18 04:14:28',''),(9,'2010-04-19 00:00:00','2010-04-18 04:14:39',''),(10,'2010-04-12 00:00:00','2010-04-18 04:18:22','2'),(11,'2010-04-12 00:00:00','2010-04-18 04:18:37','2'),(12,'2010-04-10 00:00:00','2010-04-18 05:32:38',''),(13,'2010-04-13 00:00:00','2010-04-19 06:07:33','4'),(14,'2010-04-13 00:00:00','2010-04-19 06:09:36','4'),(15,'2010-04-13 00:00:00','2010-04-19 06:09:43','4'),(16,'2010-04-13 00:00:00','2010-04-19 06:09:55','4'),(17,'2010-04-13 00:00:00','2010-04-19 06:11:07','4'),(18,'2010-04-12 00:00:00','2010-04-19 06:18:04','34'),(19,'2010-04-20 00:00:00','2010-04-19 06:18:23','34'),(20,'2010-04-21 00:00:00','2010-04-19 06:20:01','2'),(21,'2010-04-20 00:00:00','2010-04-19 06:37:06',''),(22,'2010-04-13 00:00:00','2010-04-19 06:37:34','3'),(23,'2010-04-12 00:00:00','2010-04-19 06:37:42','34'),(26,'2010-04-14 00:00:00','2010-04-19 10:09:27','23'),(27,'2010-04-14 00:00:00','2010-04-19 10:09:31','23343'),(28,'2010-04-14 00:00:00','2010-04-19 10:11:13','23'),(29,'2010-04-14 00:00:00','2010-04-19 10:11:39','23'),(30,'2010-04-14 00:00:00','2010-04-19 10:14:34','23'),(49,'2010-04-22 00:00:00','2010-04-22 11:59:05','');
/*!40000 ALTER TABLE `ins_stock_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ins_v_other_cost`
--

DROP TABLE IF EXISTS `ins_v_other_cost`;
/*!50001 DROP VIEW IF EXISTS `ins_v_other_cost`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ins_v_other_cost` (
  `price` decimal(20,2),
  `remarks` varchar(250),
  `main_id` int(11),
  `detail_id` int(11),
  `insert_date` date
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ins_v_storage`
--

DROP TABLE IF EXISTS `ins_v_storage`;
/*!50001 DROP VIEW IF EXISTS `ins_v_storage`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ins_v_storage` (
  `type` bigint(20),
  `product_id` int(11),
  `quantity` bigint(20),
  `insert_date` date
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `ins_v_other_cost`
--

/*!50001 DROP TABLE IF EXISTS `ins_v_other_cost`*/;
/*!50001 DROP VIEW IF EXISTS `ins_v_other_cost`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ins_v_other_cost` AS select `detail`.`price` AS `price`,`detail`.`remarks` AS `remarks`,`main`.`main_id` AS `main_id`,`detail`.`detail_id` AS `detail_id`,`main`.`insert_date` AS `insert_date` from (`ins_other_cost_detail` `detail` join `ins_other_cost_main` `main` on((`main`.`main_id` = `detail`.`main_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ins_v_storage`
--

/*!50001 DROP TABLE IF EXISTS `ins_v_storage`*/;
/*!50001 DROP VIEW IF EXISTS `ins_v_storage`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ins_v_storage` AS select 1 AS `type`,`detail`.`product_id` AS `product_id`,`detail`.`quantity` AS `quantity`,cast(`main`.`insert_date` as date) AS `insert_date` from (`ins_stock_detail` `detail` join `ins_stock_main` `main` on((`main`.`main_id` = `detail`.`main_id`))) union all select 2 AS `type`,`detail`.`product_id` AS `product_id`,-(`detail`.`quantity`) AS `-detail.quantity`,cast(`main`.`insert_date` as date) AS `inert_date` from (`ins_sale_detail` `detail` join `ins_sale_main` `main` on((`main`.`main_id` = `detail`.`main_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-26 22:16:57
