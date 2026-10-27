-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: shopquanao
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_03_24_075642_create_tbl_admin_table',1),(6,'2025_03_30_021711_create_tbl_category_product',2),(7,'2025_03_30_022337_create_tbl_category_product',3),(8,'2025_03_30_050613_create_tbl_brand_product',4),(9,'2025_03_30_050748_create_tbl_brand_product',5),(10,'2025_03_30_055733_create_tbl_product',6),(11,'2025_04_05_095701_tbl_customer',7),(12,'2025_04_05_104100_tbl_shipping',8),(13,'2025_04_06_141736_tbl_payment',9),(14,'2025_04_06_141816_tbl_order',9),(15,'2025_04_06_141907_tbl_order_details',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','thang','0326608210','2025-03-29 09:59:54',NULL);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_brand` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_brand`
--

LOCK TABLES `tbl_brand` WRITE;
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
INSERT INTO `tbl_brand` VALUES (1,'BXT','Thương hiệu BXT','',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(2,'Adidas','Thương hiệu thể thao Adidas','',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(3,'Gucci','Thương hiệu cao cấp Gucci','',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(4,'Versace','Thương hiệu thời trang Versace','',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(5,'Nike','Phong cách thể thao hiện đại và hiệu năng cao.','',1,'2026-10-27 00:54:53','2026-10-27 00:54:53'),(6,'Puma','Thời trang thể thao năng động, cá tính.','',1,'2026-10-27 00:54:53','2026-10-27 00:54:53'),(7,'Dior','Thời trang cao cấp với dấu ấn couture tinh tế.','',1,'2026-10-27 00:54:53','2026-10-27 00:54:53');
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category_product`
--

DROP TABLE IF EXISTS `tbl_category_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category_product` (
  `category_id` int(10) unsigned NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category_product`
--

LOCK TABLES `tbl_category_product` WRITE;
/*!40000 ALTER TABLE `tbl_category_product` DISABLE KEYS */;
INSERT INTO `tbl_category_product` VALUES (1,'Thời trang nam','Áo quần nam hiện đại',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(2,'Thời trang nữ','Phong cách nữ thanh lịch',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(3,'Phụ kiện','Phụ kiện thời trang',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(4,'Giày dép','Giày dép chính hãng',1,'2026-10-27 01:11:08','2026-10-27 01:11:08');
/*!40000 ALTER TABLE `tbl_category_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_customers` (
  `customer_id` int(10) unsigned NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customers`
--

LOCK TABLES `tbl_customers` WRITE;
/*!40000 ALTER TABLE `tbl_customers` DISABLE KEYS */;
INSERT INTO `tbl_customers` VALUES (1,'Thang','thang@gmail.com','c33367701511b4f6020ec61ded352059','123456789','',NULL,NULL),(3,'Hoang','Hoang@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456789','',NULL,NULL);
/*!40000 ALTER TABLE `tbl_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery`
--

LOCK TABLES `tbl_gallery` WRITE;
/*!40000 ALTER TABLE `tbl_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order` (
  `order_id` bigint(20) unsigned NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `payos_order_code` bigint(20) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` VALUES (11,'',0,1,12,14,'2000000.00 VND','2','',NULL,NULL),(12,'',0,1,13,15,'2000000.00 VND','2','',NULL,NULL),(14,'',0,1,14,17,'2000000.00 VND','2','',NULL,NULL);
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order_details` (
  `order_details_id` bigint(20) unsigned NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order_details`
--

LOCK TABLES `tbl_order_details` WRITE;
/*!40000 ALTER TABLE `tbl_order_details` DISABLE KEYS */;
INSERT INTO `tbl_order_details` VALUES (9,10,12,'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses','2000000',1,NULL,NULL),(10,11,12,'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses','2000000',1,NULL,NULL),(11,12,12,'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses','2000000',1,NULL,NULL),(12,14,12,'Kính Mát Nam Gucci GG0746S 001 Men\'s Sunglasses','2000000',1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment` (
  `payment_id` bigint(20) unsigned NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment`
--

LOCK TABLES `tbl_payment` WRITE;
/*!40000 ALTER TABLE `tbl_payment` DISABLE KEYS */;
INSERT INTO `tbl_payment` VALUES (13,'2','2',NULL,NULL),(14,'2','2',NULL,NULL),(15,'2','2',NULL,NULL),(16,'2','2',NULL,NULL),(17,'2','2',NULL,NULL);
/*!40000 ALTER TABLE `tbl_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product` (
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,1,'Áo thun basic premium','20',1,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','299000','1905086_ELMM_149.webp',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(2,2,'Áo polo nam cotton','25',2,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','474000','1905131_OLIV_198.webp',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(3,3,'Áo khoác thể thao','30',3,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','649000','1905160_WHIT_237.webp',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(4,4,'Áo ba lỗ Adidas','35',2,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','824000','adidas_Basketball_Sleeveless_Tee_Gender_Neutral_Beige_JD6135_21_model51.avif',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(5,1,'Áo tennis Adidas','40',2,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','999000','adidas_Heritage_Tennis_Tee_White_JC6742_HM136.avif',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(6,2,'Áo Real Madrid chính hãng','45',2,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','1174000','Ao_Real_Madrid_US_Pack_trang_JN3073_21_model81.avif',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(7,3,'Đồng hồ Gucci Dive','50',3,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','1349000','796763_IEZA0_8652_001_100_0000_Light-Gucci-Dive-watch-40mm75.avif',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(8,4,'Đồng hồ Gucci Timeless','55',3,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','1524000','796777_IEWA0_1000_001_100_0000_Light-Gucci-Dive-watch-40mm46.jpg',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(9,1,'Kính mát Versace Oval','60',4,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','1699000','90_O2285-O10025A64_ONUL_20_SignatureOvalSunglasses-Sunglasses-Versace-online-store_0_112.avif',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(10,2,'Kính mát Versace Signature','65',4,'Sản phẩm chất lượng cao, thiết kế hiện đại.','Thông tin sản phẩm và chính sách bảo hành chính hãng.','1874000','90_O4489U-OGB18755_ONUL_20_SignatureRectangularSunglasses-Sunglasses-Versace-online-store_0_117.avif',1,'2026-10-27 01:11:08','2026-10-27 01:11:08'),(11,1,'Áo thun BXT Essential đen','28',1,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','349000','1905086_ELMM_197.webp',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(12,1,'Áo polo BXT Motion olive','24',1,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','529000','1905131_OLIV_198.webp',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(13,1,'Áo khoác BXT Windrunner trắng','18',1,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','879000','1905160_WHIT_237.webp',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(14,1,'Áo tennis Adidas xanh lá','22',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','749000','Ao_Thun_Tennis_adidas_Heritage_mau_xanh_la_JC6741_HM183.avif',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(15,1,'Áo tennis Adidas xanh navy','20',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','799000','Ao_thun_hinh_anh_quan_vot_mau_xanh_la_JV8496_21_model43.avif',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(16,1,'Áo polo Nike Tour Solid','16',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo polo Nike Tour Solid. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','899000','AS+M+NK+DF+TOUR+SOLID+POLO17.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(17,1,'Quần short Nike Club Flow','32',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Quần short Nike Club Flow. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','599000','AS+M+NK+CLUB+FLOW+SHORT9.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(18,1,'Áo thun Nike NSW Remix','26',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo thun Nike NSW Remix. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','679000','AS+U+NSW+TEE+M90+OC+REMIX87.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(19,2,'Áo nữ Nike Court Advantage','18',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo nữ Nike Court Advantage. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','729000','AS+W+NKCT+DF+ADVTG+SS+TOP33.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(20,2,'Váy tennis Nike Slam Dress','14',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Váy tennis Nike Slam Dress. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','1099000','AS+W+NKCT+DF+SLAM+DRESS+LN34.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(21,3,'Áo len nữ Gucci monogram','8',3,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','2399000','ao-len-nu-gucci-with-gg-monogram-logo-731007xkcm8-1040-mau-do-size-s-67736be5a5a90-3112202410582919.webp',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(22,3,'Áo khoác nữ Gucci GG','6',3,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','3299000','ao-khoac-nu-gucci-grey-with-gg-logo-embroidered-717469-xkcqx-1060-mau-xam-1-jpg-1735616015-3112202410333559.webp',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(23,3,'Đồng hồ Gucci Dive Sport','10',3,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','1749000','796779_I18B0_8605_001_100_0000_Light-Gucci-Dive-watch-40mm9.avif',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(24,3,'Đồng hồ Gucci Timeless Gold','9',3,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','1899000','827376_I1600_8535_001_100_0000_Light-G-Timeless-watch-38mm97.avif',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(25,3,'Kính Versace Signature Black','12',4,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','1999000','90_O4489U-OGB18755_ONUL_20_SignatureRectangularSunglasses-Sunglasses-Versace-online-store_0_190.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(26,3,'Kính Versace Square Pink','7',4,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','2199000','90_O4494D-O1087156_ONUL_20_SignatureLow~BridgeSquaredSunglasses-Sunglasses-Versace-online-store_0_164.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(27,3,'Kính Versace Square Black','7',4,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','2299000','90_O4494D-OGB11156_ONUL_22_SignatureLow~BridgeSquaredSunglasses-Sunglasses-Versace-online-store_0_153.avif',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(28,3,'Gọng kính Versace Cat Eye','11',4,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','1499000','gong-kinh-nu-versace-cat-eye-0ve3344f-5434-mau-hong-6791ca26d5efe-2301202511483834.webp',1,'2026-10-27 00:40:09','2026-10-27 00:55:29'),(29,4,'Giày Adidas Samba OG trắng','13',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','1899000','Giay_Samba_OG_trang_IG1024_01_standard52.avif',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(30,4,'Giày Adidas Ultraboost 5','15',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','2499000','Giay_Ultraboost_5_DJen_ID8812_HM112.avif',1,'2026-10-27 00:40:09','2026-10-27 00:40:09'),(31,2,'Áo knit Nike Chill nữ','21',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo knit Nike Chill nữ. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','799000','AS+W+NSW+NK+CHLL+KNT+MD+CRP14.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(32,2,'Áo thun Nike NSW Graphic','25',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo thun Nike NSW Graphic. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','629000','AS+W+NSW+SS+TEE+GCEL12.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(33,1,'Áo polo Nike Tour màu đen','18',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo polo Nike Tour màu đen. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','899000','AS+M+NK+DF+TOUR+SOLID+POLO17.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(34,1,'Quần short Nike Club Flow','30',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Quần short Nike Club Flow. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','549000','AS+M+NK+CLUB+FLOW+SHORT9.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(35,2,'Áo thun PUMA Playmobil trẻ em','20',6,'Sản phẩm Puma chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo thun PUMA Playmobil trẻ em. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','399000','Áo-thun-PUMA-x-PLAYMOBIL®-cho-trẻ-em21.avif',1,'2026-10-27 00:51:16','2026-10-27 00:54:53'),(36,3,'Ba lô PUMA Playmobil','16',6,'Sản phẩm Puma chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Ba lô PUMA Playmobil. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','699000','Ba-lô-PUMA-x-PLAYMOBIL®-cho-trẻ-em76.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(37,3,'Ba lô Adidas Adicolor đen','17',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','899000','balo-adidas-adicolor-backpack-ij0761-mau-den-656eac8488f11-0512202311522023.webp',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(38,3,'Ba lô Adidas Adicolor bản mới','14',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','949000','balo-adidas-adicolor-backpack-ij0761-mau-den-656eac8488f11-0512202311522078.webp',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(39,4,'Giày Adidas Handball Spezial xanh','12',2,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','1799000','Giay_Handball_Spezial_Mau_xanh_da_troi_IF7087_15_hover_standard19.avif',1,'2026-10-27 00:51:16','2026-10-27 00:51:16'),(40,4,'Giày PUMA Easy Rider Lovers','10',6,'Sản phẩm Puma chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Giày PUMA Easy Rider Lovers. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','1699000','Giày-thể-thao-Easy-Rider-Lovers-Unisex (1)94.avif',1,'2026-10-27 00:51:16','2026-10-27 00:54:53'),(41,4,'Giày PUMA Palermo cổ điển','11',6,'Sản phẩm Puma chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Giày PUMA Palermo cổ điển. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','1899000','Giày-thể-thao-kết-hợp-cổ-điển-và-hiện-đại-Palermo (1)4.avif',1,'2026-10-27 00:51:16','2026-10-27 00:54:53'),(42,4,'Giày PUMA Suede XL','9',6,'Sản phẩm Puma chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Giày PUMA Suede XL. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','1599000','Giày-thể-thao-da-lộn-XL-PUMA-x-TNMT (3)70.avif',1,'2026-10-27 00:51:16','2026-10-27 00:54:53'),(43,3,'Khăn lụa Dior Mitzah','8',7,'Sản phẩm Dior chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Khăn lụa Dior Mitzah. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','1499000','khan-dior-mitzah-silk-toile-de-jouy-flowers-mau-xanh-navy-676a20a65a4ef-2412202409470265.webp',1,'2026-10-27 00:51:16','2026-10-27 00:54:53'),(44,2,'Áo thun Dior Tree Frame','6',7,'Sản phẩm Dior chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo thun Dior Tree Frame. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','2799000','ao-phong-nu-dior-white-with-tree-frame-printed-tshirt-3wbm23teeu-mau-trang-6508199f6953e-1809202316342348.webp',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(45,3,'Túi đeo chéo Versace Jeans','7',4,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','2299000','tui-deo-cheo-nu-versace-jeans-couture-handbag-mau-hong-kem-tui-nho-n-hm-67e9f70b25134-3103202508593971.webp',1,'2026-10-27 00:51:16','2026-10-27 00:51:16'),(46,3,'Kính Gucci GG0746S','8',3,'Thiết kế hiện đại, chất liệu chọn lọc và dễ phối cho phong cách hằng ngày.','Sản phẩm BXT-shopper chính hãng, kiểm tra kỹ trước khi giao đến khách hàng.','2099000','kinh-mat-nam-gucci-gg0746s-001-men-s-sunglasses-mau-xam-den-size-57-651531ae47fbc-2809202314563090.webp',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(47,2,'Áo thun Nike NSW Graphic bản trắng','26',5,'Sản phẩm Nike chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Áo thun Nike NSW Graphic bản trắng. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','429000','AS+W+NSW+SS+TEE+GCEL12.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(48,4,'Giày Adidas Samba OG phiên bản trắng','15',2,'Sản phẩm Adidas chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Giày Adidas Samba OG phiên bản trắng. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','1199000','Giay_Samba_OG_trang_IG1024_01_standard52.avif',1,'2026-10-27 00:51:16','2026-10-27 00:54:53'),(49,3,'Kính Versace Signature phối màu','19',4,'Sản phẩm Versace chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Kính Versace Signature phối màu. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','899000','90_O4489U-OGB18755_ONUL_20_SignatureRectangularSunglasses-Sunglasses-Versace-online-store_0_190.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29'),(50,3,'Đồng hồ Gucci Timeless phiên bản mới','22',3,'Sản phẩm Gucci chính hãng, thiết kế phù hợp với phong cách hiện đại và nhu cầu sử dụng hằng ngày.','Đồng hồ Gucci Timeless phiên bản mới. Chất liệu và kiểu dáng được tuyển chọn để mang lại trải nghiệm thoải mái, dễ phối đồ và bền đẹp.','499000','827376_I1600_8535_001_100_0000_Light-G-Timeless-watch-38mm97.avif',1,'2026-10-27 00:51:16','2026-10-27 00:55:29');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) unsigned NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shipping`
--

LOCK TABLES `tbl_shipping` WRITE;
/*!40000 ALTER TABLE `tbl_shipping` DISABLE KEYS */;
INSERT INTO `tbl_shipping` VALUES (11,'thang','6 ngo 33 duong an tho , an khanh , hoai duc , ha noi','0904430029','thang@gmail.com','1',NULL,NULL),(12,'thang','6 ngo 33 duong an tho , an khanh , hoai duc , ha noi','0904430029','thang@gmail.com','12',NULL,NULL),(13,'thang','6 ngo 33 duong an tho , an khanh , hoai duc , ha noi','1111111','thang@gmail.com','11',NULL,NULL),(14,'aiia','6 ngo 33 duong an tho , an khanh , hoai duc , ha noi','11111','thang@gmail.com','11',NULL,NULL);
/*!40000 ALTER TABLE `tbl_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_social`
--

DROP TABLE IF EXISTS `tbl_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_social` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_social`
--

LOCK TABLES `tbl_social` WRITE;
/*!40000 ALTER TABLE `tbl_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_social_customer`
--

DROP TABLE IF EXISTS `tbl_social_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_social_customer` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider_user_email` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_social_customer`
--

LOCK TABLES `tbl_social_customer` WRITE;
/*!40000 ALTER TABLE `tbl_social_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_social_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'shopquanao'
--

--
-- Dumping routines for database 'shopquanao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-27 15:11:47
