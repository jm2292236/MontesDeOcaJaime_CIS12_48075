-- CREATE DATABASE  IF NOT EXISTS `48075` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `48075`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: 48075
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `jm2292236_e_car`
--

DROP TABLE IF EXISTS `jm2292236_e_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_e_car` (
  `car_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `xr_maker_model_id` int(10) unsigned NOT NULL,
  `year` int(4) unsigned DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `plate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_e_car`
--

-- LOCK TABLES `jm2292236_e_car` WRITE;
/*!40000 ALTER TABLE `jm2292236_e_car` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_e_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_e_order`
--

DROP TABLE IF EXISTS `jm2292236_e_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_e_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `tax` int(10) unsigned NOT NULL,
  `shipping_id` int(10) unsigned DEFAULT NULL,
  `cc_type_id` int(10) unsigned DEFAULT NULL,
  `cc_number` char(16) DEFAULT NULL,
  `cc_exp_month` int(2) unsigned DEFAULT NULL,
  `cc_exp_year` int(4) unsigned DEFAULT NULL,
  `cc_verification` int(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_e_order`
--

-- LOCK TABLES `jm2292236_e_order` WRITE;
/*!40000 ALTER TABLE `jm2292236_e_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_e_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_e_product`
--

DROP TABLE IF EXISTS `jm2292236_e_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_e_product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_e_product`
--

-- LOCK TABLES `jm2292236_e_product` WRITE;
/*!40000 ALTER TABLE `jm2292236_e_product` DISABLE KEYS */;
INSERT INTO `jm2292236_e_product` VALUES (1,'ABC','Primero',123.56),(2,'ABC123','Segundo',123456789.12);
/*!40000 ALTER TABLE `jm2292236_e_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_e_refuel`
--

DROP TABLE IF EXISTS `jm2292236_e_refuel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_e_refuel` (
  `refuel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `car_id` int(10) unsigned NOT NULL,
  `gas_brand_id` int(10) unsigned NOT NULL,
  `odometer` int(10) unsigned NOT NULL,
  `price_per_gallon` decimal(11,2) NOT NULL,
  `gallons` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `octane` char(2) DEFAULT NULL,
  PRIMARY KEY (`refuel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_e_refuel`
--

-- LOCK TABLES `jm2292236_e_refuel` WRITE;
/*!40000 ALTER TABLE `jm2292236_e_refuel` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_e_refuel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_e_user`
--

DROP TABLE IF EXISTS `jm2292236_e_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_e_user` (
  `user_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `registration_date` datetime NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_id` int(7) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_e_user`
--

-- LOCK TABLES `jm2292236_e_user` WRITE;
/*!40000 ALTER TABLE `jm2292236_e_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_e_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_enum_creditcard`
--

DROP TABLE IF EXISTS `jm2292236_enum_creditcard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_enum_creditcard` (
  `cc_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(20) NOT NULL,
  PRIMARY KEY (`cc_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_enum_creditcard`
--

-- LOCK TABLES `jm2292236_enum_creditcard` WRITE;
/*!40000 ALTER TABLE `jm2292236_enum_creditcard` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_enum_creditcard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_enum_gasbrand`
--

DROP TABLE IF EXISTS `jm2292236_enum_gasbrand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_enum_gasbrand` (
  `gas_brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`gas_brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_enum_gasbrand`
--

-- LOCK TABLES `jm2292236_enum_gasbrand` WRITE;
/*!40000 ALTER TABLE `jm2292236_enum_gasbrand` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_enum_gasbrand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_enum_maker`
--

DROP TABLE IF EXISTS `jm2292236_enum_maker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_enum_maker` (
  `maker_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`maker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_enum_maker`
--

-- LOCK TABLES `jm2292236_enum_maker` WRITE;
/*!40000 ALTER TABLE `jm2292236_enum_maker` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_enum_maker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_enum_maker_model`
--

DROP TABLE IF EXISTS `jm2292236_enum_maker_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_enum_maker_model` (
  `xr_maker_model_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maker_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`xr_maker_model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_enum_maker_model`
--

-- LOCK TABLES `jm2292236_enum_maker_model` WRITE;
/*!40000 ALTER TABLE `jm2292236_enum_maker_model` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_enum_maker_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_enum_model`
--

DROP TABLE IF EXISTS `jm2292236_enum_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_enum_model` (
  `model_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_enum_model`
--

-- LOCK TABLES `jm2292236_enum_model` WRITE;
/*!40000 ALTER TABLE `jm2292236_enum_model` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_enum_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_enum_shipping`
--

DROP TABLE IF EXISTS `jm2292236_enum_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_enum_shipping` (
  `shipping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(20) NOT NULL,
  `cost` decimal(11,2) NOT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_enum_shipping`
--

-- LOCK TABLES `jm2292236_enum_shipping` WRITE;
/*!40000 ALTER TABLE `jm2292236_enum_shipping` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_enum_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jm2292236_xr_product_order`
--

DROP TABLE IF EXISTS `jm2292236_xr_product_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jm2292236_xr_product_order` (
  `xr_prod_order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` decimal(11,2) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`xr_prod_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jm2292236_xr_product_order`
--

-- LOCK TABLES `jm2292236_xr_product_order` WRITE;
/*!40000 ALTER TABLE `jm2292236_xr_product_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `jm2292236_xr_product_order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-08  1:33:47
