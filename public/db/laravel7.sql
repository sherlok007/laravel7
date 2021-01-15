/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 8.0.18 : Database - laravel7
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel7` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `laravel7`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2014_10_12_000000_create_users_table',1),(4,'2014_10_12_100000_create_password_resets_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1),(6,'2020_10_04_092636_create_todos_table',2),(7,'2016_06_01_000001_create_oauth_auth_codes_table',3),(8,'2016_06_01_000002_create_oauth_access_tokens_table',3),(9,'2016_06_01_000003_create_oauth_refresh_tokens_table',3),(10,'2016_06_01_000004_create_oauth_clients_table',3),(11,'2016_06_01_000005_create_oauth_personal_access_clients_table',3);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('11e272028e228743d43025880865f01c06d0a0c384a92b0b81bb43a5138ee048ea5b449e3c13a831',2,1,'Laravel Password Grant Client','[]',0,'2020-12-14 10:52:25','2020-12-14 10:52:25','2021-12-14 10:52:25'),('21e927e24039a30d8b9046687c89554a67b5f64cd3329311a59c10ecb2e996a665e55761064d8509',2,1,'Laravel Password Grant Client','[]',0,'2020-12-14 10:58:02','2020-12-14 10:58:02','2021-12-14 10:58:02'),('2fcb88360e40c13fc86278a69cf07aeeb363bf91962e786a226067d924a550b45f92683bad4237cc',2,1,'Laravel Password Grant Client','[]',0,'2020-12-14 10:59:05','2020-12-14 10:59:05','2021-12-14 10:59:05'),('4525fd4c040ddb3e8ecddb1cd4ec08ef433748b910b901fcb21a569d1929d66bb89e080920e55408',1,1,'Personal Access Token','[]',0,'2020-12-16 12:49:04','2020-12-16 12:49:04','2021-12-16 12:49:04'),('a0d676d616e1cc4c11f4f843e77a375496b65a31a37abcdcfa57145115751718d67d248078a9b18e',1,1,'Personal Access Token','[]',0,'2020-12-16 12:48:11','2020-12-16 12:48:11','2021-12-16 12:48:11'),('c79acd54a0a5f8d213b8e7eb001e2b0f39b32ae5b9d4ad17f6e756a664d8f5226e3c94f5f249c334',1,1,'Personal Access Token','[]',0,'2020-12-16 09:44:11','2020-12-16 09:44:11','2021-12-16 09:44:11');

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (1,NULL,'Laravel Personal Access Client','UbptymSxKuEWHJQpuxhkQxxWMR5goJ5UVdUfhXVx',NULL,'http://localhost',1,0,0,'2020-12-14 10:26:46','2020-12-14 10:26:46'),(2,NULL,'Laravel Password Grant Client','QGmiKsRufzjwOjTJzSlos7IlItX9GHnWGVLWveiY','users','http://localhost',0,1,0,'2020-12-14 10:26:46','2020-12-14 10:26:46');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (1,1,'2020-12-14 10:26:46','2020-12-14 10:26:46');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `state_wise_order` */

DROP TABLE IF EXISTS `state_wise_order`;

CREATE TABLE `state_wise_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `state_wise_order` */

insert  into `state_wise_order`(`id`,`order_no`,`code`,`value`) values (1,'402-9560141-4331502','MH','Maharashtra'),(2,'404-9128204-1651504','MH','Maharashtra'),(3,'171-4261575-2709952','MH','Maharashtra'),(4,'406-2656145-6110730','MH','Maharashtra'),(5,'407-9364498-4429157','MH','Maharashtra'),(6,'171-8528229-8209107','MH','Maharashtra'),(7,'407-7470233-3842716','WB','West Bengal'),(8,'408-4056980-7233908','WB','West Bengal');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `states` */

insert  into `states`(`id`,`code`,`value`) values (1,'35','Andaman and Nicobar Islands'),(2,'37','Andhra Pradesh'),(3,'12','Arunachal Pradesh'),(4,'18','Assam'),(5,'04','Chandigarh'),(6,'22','Chhattisgarh'),(7,'26','Dadra and Nagar Haveli and Daman and Diu'),(8,'25','Daman and Diu'),(9,'07','Delhi'),(10,'30','Goa'),(11,'24','Gujarat'),(12,'06','Haryana'),(13,'02','Himachal Pradesh'),(14,'01','Jammu and Kashmir'),(15,'20','Jharkhand'),(16,'29','Karnataka'),(17,'32','Kerala'),(18,'38','Ladakh'),(19,'31','Lakshadweep'),(20,'23','Madhya Pradesh'),(21,'27','Maharashtra'),(22,'14','Manipur'),(23,'17','Meghalaya'),(24,'15','Mizoram'),(25,'13','Nagaland'),(26,'21','Odisha'),(27,'97','Other Territory'),(28,'34','Puducherry'),(29,'03','Punjab'),(30,'08','Rajasthan'),(31,'11','Sikkim'),(32,'33','Tamil Nadu'),(33,'36','Telangana'),(34,'16','Tripura'),(35,'09','Uttar Pradesh'),(36,'05','Uttarakhand'),(37,'19','West Bengal');

/*Table structure for table `todos` */

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `buyer_state` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  `consign_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `refund_applied` tinyint(4) DEFAULT '0',
  `refund_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_sku` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `todos` */

insert  into `todos`(`id`,`order_no`,`buyer_name`,`buyer_phone`,`buyer_address`,`buyer_state`,`price`,`consign_no`,`order_date`,`refund_applied`,`refund_reason`,`product_sku`,`product`,`created_at`,`updated_at`) values (1,'408-6732014-1464326','Indranil Majumder',NULL,'813 Mahaveer Maples Thubharahalli, Varthur Road BENGALURU, KARNATAKA 560066','29',695.00,'EJ121934142IN','2020-08-28',0,NULL,NULL,'0','2020-10-21 15:35:21','2020-10-22 19:44:06'),(2,'408-1639114-4416300','Rajendra Kumar',NULL,'Rajendra Kumar Flat No- 75, Top Camp, Noamundi Noamundi West Singhbhum, JHARKHAND 833217','20',230.00,'EJ828628614IN','2020-10-22',0,NULL,NULL,'0','2020-10-21 18:54:52','2020-10-22 19:44:24'),(3,'402-3018000-3177920','Gudera Divya Rei',NULL,'24. 26th Block, SBM Colony Srirampura 2nd Stage MYSURU, KARNATAKA 570023','29',1540.00,'EJ127399655IN','2020-09-05',0,NULL,NULL,'0','2020-10-21 18:59:50','2020-10-22 19:44:37'),(4,'402-6538386-9101916','Anamika Chaudhury',NULL,'M-211 Jalvayu Towers, Sector 56 GURUGRAM, HARYANA 122011','06',1815.00,'EJ111692910IN','2020-09-06',0,NULL,NULL,'0','2020-10-21 19:00:46','2020-10-22 19:44:47'),(5,'407-7524819-2574731','Shuvadip Banerjee',NULL,'E 702 The Icon, Thansindra Main Road, Behind Elements Mall BENGALURU, KARNATAKA 560077','29',695.00,'EJ121927141IN','2020-09-10',1,'Item damaged due to poor packaging',NULL,'0','2020-10-21 19:11:50','2020-11-14 14:41:47'),(6,'402-9560141-4331502','Shital K Ushir',NULL,'FN - 10, Park View App, Cdc - 12, Purna Nagar Near Shahu Nagar PIMPRI CHINCHWAD, MAHARASHTRA 411019','27',395.00,'EJ121927022IN','2020-09-11',1,'Item damaged due to poor packaging',NULL,'0','2020-10-22 12:59:30','2020-11-14 14:40:43'),(7,'407-8959682-1141919','Arindam',NULL,'26 S M Compound Satellite Road AHMEDABAD, GUJARAT 380015',NULL,1280.00,'EJ121925945IN','2020-09-13',0,NULL,NULL,'0','2020-10-22 12:59:30','2020-10-22 19:53:16'),(8,'407-0498427-8993961','Anubha Dey',NULL,'FN - 10, Park View App, Cdc - 12, PurK2/618 Mahipalpur Extension K2/618 Mahipalpur Extension New Delhi, DELHI 110037','07',1540.00,'EJ121925993IN','2020-09-14',0,NULL,NULL,'0','2020-10-23 07:10:47','2020-10-23 07:12:06'),(9,'403-6691824-0321929','Premangshu Mukherjee',NULL,'136, Jasmine Block,L&t Serene County Telecom Nagar, Gachibowli HYDERABAD, TELANGANA 500032\n',NULL,1482.00,'EJ121926720IN','2020-09-17',0,NULL,NULL,'0','2020-10-23 07:10:47','2020-10-27 04:55:23'),(10,'404-9128204-1651504','Vijaykumar Dashathrao Patil',NULL,'C/o Sujay Vijaykumar Ushir Nashik, Maharashtra 422013\n','27',220.00,'EJ121926716IN','2020-09-17',0,NULL,NULL,'0','2020-10-23 07:10:47','2020-10-27 04:55:23'),(11,'405-5654743-1893112','Vishnupriya Lethboria','7898204983','House No.75 Panchvati Colony RAIGARH, CHHATTISGARH 496001','',230.00,'EJ114257021IN','2020-10-24',0,'',NULL,'0','2020-10-27 04:55:23','2021-01-14 14:33:55'),(12,'407-6601920-0769932','Jeff Seung Yeob Nam','9629331199','KUKDONG COOLANT INDIA Plot No.G78. Sipcot Industrial Park, Vadagal B, Pondur Post\nSRIPERUMBUDUR, Kancheepuram Dist 602105, TAMIL NADU 602105','33',1485.00,'EJ114257786IN','2020-10-25',0,'',NULL,'0','2020-10-27 04:55:23','2021-01-14 14:31:45'),(13,'408-3131288-0549966','Nikita Patel','9807670224','274/66 Rajendra Nargar 2 Street Lucknow, Lucknow, UTTAR PRADESH 226004','09',180.00,'EJ114287235IN','2020-10-26',0,'',NULL,'0','2020-10-27 04:55:23','2021-01-14 14:31:45'),(14,'171-8776383-0032368','Samrat Mukherjee','8527412714','Flat 2294, Tower 2, ATS DOLCE Sector- Zeta 1 GREATER NOIDA, UTTAR PRADESH 201306','09',1482.00,'EJ187827268IN','2020-11-01',0,NULL,NULL,'0','2020-11-01 18:12:56','2020-11-03 04:31:26'),(15,'408-0345475-1119510','T. M. Vasudevan','9249408019','Akshaya, 32/2024 C1, Mythri Lane, Punathilpadam Road, Edappally, ERNAKULAM, KERALA 682024','32',230.00,'EJ114288077IN','2020-11-02',0,NULL,NULL,'0','2020-11-03 04:28:14','2020-11-05 19:17:23'),(16,'403-4758095-8905925','Preeti Vinayak','9818807460','Preeti Vinayak 79b, Gh-10, Sunder Apartments, Paschim Vihar Sunder Apts NEW DELHI, DELHI 110087','07',570.00,'EJ114288085IN','2020-11-02',0,NULL,NULL,'0','2020-11-03 04:30:08','2020-11-05 19:17:42'),(17,'403-6409062-3697943','Preeti Vinayak','9818807460','Preeti Vinayak 79b, Gh-10, Sunder Apartments, Paschim Vihar Sunder Apts NEW DELHI, DELHI 110087','07',475.00,'EJ121932725IN','2020-10-21',0,NULL,NULL,'0','2020-11-03 04:30:57','2020-11-03 04:30:57'),(18,'171-4261575-2709952','Lakshmi Krishna',NULL,'B6,407 Sonighara Kesar,Kaspate Wasti PUNE, MAHARASHTRA 411057','27',395.00,'EJ121926733IN','2020-09-17',0,'',NULL,'0','2020-11-05 18:58:09','2021-01-14 14:31:45'),(19,'405-2882966-8289145','Pooja Puri',NULL,'1401,Tower 3, The Palms, South City 1 GURGAON, HARYANA 122007','06',950.00,'EJ127398663IN','2020-09-24',0,'',NULL,'0','2020-11-05 18:58:09','2021-01-14 14:31:45'),(20,'407-3530134-5765912','Kuntal Chandra',NULL,'Kuntal Chandra Uniidus Breeze/ Block - 4/ 2nd Floor/ Flat - 106 Sy No. 77/2, Munnekolalu, Marathahalli, Laxminarayana Layout BENGALURU, KARNATAKA 560037','29',1280.00,'EJ121928725IN','2020-09-26',1,'Ordered In Error, Already Have One, No Longer Needed',NULL,'0','2020-11-05 18:58:09','2021-01-14 14:31:45'),(21,'406-2828155-3605115','Sanjoy Ghose',NULL,'254 Abhinav Apartment CGHS LTD. B 12 Vasundhara Enclave NEW DELHI, DELHI 110096','07',1080.00,'EJ121934690IN','2020-09-29',0,'',NULL,'0','2020-11-05 19:03:14','2021-01-14 14:31:45'),(22,'405-0003340-2511505','Sujit Sircar',NULL,'A 2004 Salarpuria Magnificia 78 Doorvani Nagar , Old Madras Road BENGALURU, KARNATAKA 560016','29',2560.00,'EJ121934709IN','2020-09-29',0,'',NULL,'0','2020-11-05 19:03:14','2021-01-14 14:31:45'),(23,'403-6625863-8021113','Surabhi Roy','9897539929','Sri Puram,badaun Road Near Baga Properties BAREILLY, UTTAR PRADESH 243001','09',1482.00,'EJ187825602IN','2020-10-12',0,'',NULL,'0','2020-11-05 19:07:53','2021-01-14 14:31:45'),(24,'407-7470233-3842716','Abhijit Ghosh','9434855087','134/4/a Bishnupur Road, P O Berhampore, Dist Murshidabad Bishnupur Road BERHAMPORE, WEST BENGAL 742101','19',374.00,'EJ200306105IN','2020-10-15',0,'',NULL,'0','2020-11-05 19:07:53','2021-01-14 14:31:45'),(25,'402-5972451-3762761','Purba Grexter','9804424960','Grexter Halcyon, House No 1153, Room No 1A 21st Cross , Sector 3 Hsr Layout BENGALURU, KARNATAKA 560102','29',980.00,'EJ187826545IN','2020-10-16',1,'Available At A Cheaper Price, Product Was Damaged, The Cost Is 4 Time High Rather Than Real Value.',NULL,'0','2020-11-05 19:16:47','2021-01-14 14:31:45'),(26,'171-2524249-3556358','Satyajit Sahu','9937051786','C305/4th Floor/C-block SLV VAJRA BENGALURU, KARNATAKA 560043','29',980.00,'EJ187826792IN','2020-10-17',1,'Damaged during delivery',NULL,'0','2020-11-05 19:16:47','2020-11-14 14:52:33'),(27,'404-4064476-6963556','Satyajit Sahu','9937051786','C305/4th Floor/C-block SLV VAJRA BENGALURU, KARNATAKA 560043','',980.00,'EJ187826792IN','2020-10-17',1,'',NULL,'0','2020-11-14 14:58:09','2021-01-14 14:33:55'),(28,'406-2656145-6110730','Avijit Bhattacharjee','9561566956','13/B, Savitri Sankul Apartment, Fulsundarmala, Takli Road, Upanagar, Nasik Road, Nasik, MAHARASHTRA 422006','27',260.00,'EJ201185955IN','2020-11-27',0,NULL,NULL,'0','2020-12-05 04:59:38','2020-12-05 04:59:38'),(29,'403-3039335-7838726','Neha Kumra','9711164343','Neha Kumra Apartment No. 264, Tower F The Crest, Park Drive, Golf Course Road, Sector 54 GURUGRAM, HARYANA 122011','06',830.00,'EJ201183773IN','2020-12-05',0,NULL,NULL,'0','2020-12-08 04:37:25','2020-12-08 04:37:25'),(30,'402-0227563-8629971','Shiksha Bhatia','9529074228','331 b sector 1 jawahar nagar Sindhi coloney JAIPUR, RAJASTHAN 302004','08',510.00,'EJ201183645IN','2020-12-05',0,NULL,NULL,'0','2020-12-08 04:38:23','2020-12-08 04:38:23'),(31,'407-9364498-4429157','Rema Halder','6290818241','Building 2, Flat - 603 Daffodil, Pride Residency Kasarvadavli, Thane west THANE, MAHARASHTRA 400615','27',1582.00,'EJ123002965IN','2020-12-28',0,NULL,NULL,'0','2021-01-04 05:15:38','2021-01-04 05:15:38'),(32,'171-8528229-8209107','Joshna','9768300272','Rickys salon Shop 5 Raheja residency m.g complex NAVI MUMBAI, MAHARASHTRA 400705','27',240.00,'EJ123006450IN','2021-01-01',0,NULL,NULL,'0','2021-01-04 05:16:28','2021-01-04 05:16:28'),(33,'408-4056980-7233908','Benedict Jonny Gomes','9831206373','67/B P.K Guha Road,Nilanjana Apartment Kumarpara Bazaar, Dum Dum Cantonment KOLKATA, WEST BENGAL 700028','19',600.00,'EJ195670964IN','2021-01-07',0,NULL,NULL,'0','2021-01-11 04:32:21','2021-01-11 18:38:30'),(34,'407-0403318-6449911','KARTHIK SHANMUGAM',NULL,'NO,10, DEODAR APARTMENT FLAT 3B, DEODAR STREET KOLKATA, WEST BENGAL, 700019','19',290.00,'EJ481413080IN','2018-01-03',0,'','RANG002','Colourful Rangoli Sticker Round 3 Pieces (Dia 9 inches)','2021-01-14 14:33:55','2021-01-14 14:41:00'),(35,'407-1214132-5289155','Vasudha K S',NULL,'#632, Pride Vatika Layout, Near Nisarga Layout, Koppa Gate, Bannerghatta Anekal Road, Jigani, Bangalore, Karnataka, 560083','29',580.00,'EJ481413076IN','2018-01-03',0,'','SKDECOR63','Owl made of Jute - 1 Pair (Each H5 x L2 x W2 in)','2021-01-14 14:41:00','2021-01-14 14:41:00'),(36,'407-0751769-9748304','Ankur Verma',NULL,'Ahad Euphoria Wing II (Daisy) #1401, Kodathi Village Varathur Hubli Sarjapur Rd. BENGALURU, KARNATAKA, 560035','29',312.00,'EJ481967883IN','2018-01-04',1,'','KR02','Adorable Handmade Couple Doll Keyrings (Each 3 x 4.3 inches)','2021-01-14 14:41:00','2021-01-14 14:41:00'),(37,'403-8625099-2609144','S DHARMARAJ',NULL,'11/2 11TH STREET, JOGPALYA HALASURU BENGALURU, KARNATAKA, 560008','29',230.00,'EJ481414893IN','2018-01-10',0,'','RANG003','Colourful Rangoli Sticker Round 3 Pieces (Dia 9 inches)','2021-01-14 14:50:28','2021-01-14 14:50:28'),(38,'402-2598256-1961120','Preeti Wadhwa',NULL,'Flat No 11,bpcl Complex, BKC, BANDRA(E) MUMBAI, MAHARASHTRA, 400051','27',1040.00,'EJ482271459IN','2018-01-11',0,'','DOU005','Panchmukhi Dhokra Elephant Showpiece (L 3 x W 2.5 x H 3 inches)','2021-01-14 14:50:28','2021-01-14 14:50:28'),(39,'402-2872180-5678738','Dr.Priyadarshini Rajarajan',NULL,'Type III/4, ICAR, Central Agroforestry Research Institute Gwalior Road Jhansi, UTTAR PRADESH, 284003','09',210.00,'EJ482271462IN','2018-01-11',0,'','SR031','Set of Two Colourful Rangoli Stickers (Dia 9 inches)','2021-01-14 14:50:28','2021-01-14 14:50:28'),(40,'406-5513364-1030700','Anurag Chaturvedi','8349705522','In front of Annapurna rice mill, Kharsiya naka Ambikapur Ambikapur, CHHATTISGARH 497001','22',930.00,NULL,'2021-01-14',0,NULL,NULL,'0','2021-01-14 14:52:24','2021-01-14 14:52:24'),(41,'403-6793871-7245944','Raghuram Ganjikunta',NULL,'Mercedes Benz Research And Development India Pvt. Ltd., Gopalan Global Axis, E-Block, EPIP Zone, Whitefield Road BENGALURU, KARNATAKA, 560066','29',220.00,'EJ481415125IN','2018-01-12',0,'',NULL,NULL,'2021-01-15 04:03:17','2021-01-15 04:03:17'),(42,'408-1327883-2567537','Devjani Shelat',NULL,'IDP Education ,201 Jeevan Jyoti Arcade, Bcabin Railway Quarter Road THANE, MAHARASHTRA, 400602','27',370.00,'EJ481415474IN','2018-01-14',0,'',NULL,NULL,'2021-01-15 04:03:17','2021-01-15 04:03:17'),(43,'406-5012049-3586734','Latha. S',NULL,'Block K3 Flat No 206 Vgn Stafford, Sudharsanam Thirunandhavanam Nagar Main Road Avadi CHENNAI, TAMIL NADU, 600062 ','33',230.00,'EJ482269089IN','2018-01-17',0,'',NULL,NULL,'2021-01-15 04:03:17','2021-01-15 04:03:17'),(44,'402-7803383-7844314','MUDIT GOEL',NULL,'POOJA CYBERTECH, MOH SAHUWAN DHAMPUR, UTTAR PRADESH, 246761','09',220.00,'EJ48226891IN','2018-01-18',0,'',NULL,NULL,'2021-01-15 04:03:17','2021-01-15 04:03:17'),(45,'408-0025924-8815552','SASIREKHA T ',NULL,'Old No : 143, New No 213, Valluvar Kottam High Road CHENNAI, TAMIL NADU, 600034','33',230.00,'EJ481416894IN','2018-01-19',0,'',NULL,NULL,'2021-01-15 04:03:17','2021-01-15 04:03:17'),(46,'406-5279251-9946747','Dipak Dube',NULL,'Gammon India Limited, Tata Highway Road, Namkum Sidraul Palandu RANCHI, JHARKHAND, 834010','20',220.00,'EJ481416885IN','2018-01-19',0,'',NULL,NULL,'2021-01-15 04:03:17','2021-01-15 04:03:17');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`avatar`,`remember_token`,`created_at`,`updated_at`) values (1,'Abhishek Pramanik','abhishek@hotmail.com',NULL,'$2y$10$YRfT.IRI5uKofJICGJV3bunz0A/8AjRitpVj4TS4uSAeTeXrkf9My',NULL,NULL,'2020-12-14 12:19:00','2020-12-14 12:19:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
