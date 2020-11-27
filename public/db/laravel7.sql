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

/*Table structure for table `todos` */

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` float(11,2) DEFAULT NULL,
  `consign_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `refund_applied` tinyint(4) DEFAULT '0',
  `refund_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `delivered` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `todos` */

insert  into `todos`(`id`,`order_no`,`buyer_name`,`buyer_phone`,`buyer_address`,`price`,`consign_no`,`order_date`,`refund_applied`,`refund_reason`,`delivered`,`created_at`,`updated_at`) values (1,'408-6732014-1464326','Indranil Majumder',NULL,'813 Mahaveer Maples Thubharahalli, Varthur Road BENGALURU, KARNATAKA 560066',695.00,'EJ121934142IN','2020-08-28',0,NULL,0,'2020-10-21 15:35:21','2020-10-22 19:44:06'),(2,'408-1639114-4416300','Rajendra Kumar',NULL,'Rajendra Kumar Flat No- 75, Top Camp, Noamundi Noamundi West Singhbhum, JHARKHAND 833217',230.00,'EJ828628614IN','2020-10-22',0,NULL,0,'2020-10-21 18:54:52','2020-10-22 19:44:24'),(3,'402-3018000-3177920','Gudera Divya Rei',NULL,'24. 26th Block, SBM Colony Srirampura 2nd Stage MYSURU, KARNATAKA 570023',1540.00,'EJ127399655IN','2020-09-05',0,NULL,0,'2020-10-21 18:59:50','2020-10-22 19:44:37'),(4,'402-6538386-9101916','Anamika Chaudhury',NULL,'M-211 Jalvayu Towers, Sector 56 GURUGRAM, HARYANA 122011',1815.00,'EJ111692910IN','2020-09-06',0,NULL,0,'2020-10-21 19:00:46','2020-10-22 19:44:47'),(5,'407-7524819-2574731','Shuvadip Banerjee',NULL,'E 702 The Icon, Thansindra Main Road, Behind Elements Mall BENGALURU, KARNATAKA 560077',695.00,'EJ121927141IN','2020-09-10',1,'Item damaged due to poor packaging',0,'2020-10-21 19:11:50','2020-11-14 14:41:47'),(6,'402-9560141-4331502','Shital K Ushir',NULL,'FN - 10, Park View App, Cdc - 12, Purna Nagar Near Shahu Nagar PIMPRI CHINCHWAD, MAHARASHTRA 411019',395.00,'EJ121927022IN','2020-09-11',1,'Item damaged due to poor packaging',0,'2020-10-22 12:59:30','2020-11-14 14:40:43'),(7,'407-8959682-1141919','Arindam',NULL,'26 S M Compound Satellite Road AHMEDABAD, GUJARAT 380015',1280.00,'EJ121925945IN','2020-09-13',0,NULL,0,'2020-10-22 12:59:30','2020-10-22 19:53:16'),(8,'407-0498427-8993961','Anubha Dey',NULL,'FN - 10, Park View App, Cdc - 12, PurK2/618 Mahipalpur Extension K2/618 Mahipalpur Extension New Delhi, DELHI 110037',1540.00,'EJ121925993IN','2020-09-14',0,NULL,0,'2020-10-23 07:10:47','2020-10-23 07:12:06'),(9,'403-6691824-0321929','Premangshu Mukherjee',NULL,'136, Jasmine Block,L&t Serene County Telecom Nagar, Gachibowli HYDERABAD, TELANGANA 500032\n',1482.00,'EJ121926720IN','2020-09-17',0,NULL,0,'2020-10-23 07:10:47','2020-10-27 04:55:23'),(10,'404-9128204-1651504','Vijaykumar Dashathrao Patil',NULL,'C/o Sujay Vijaykumar Ushir Nashik, Maharashtra 422013\n',220.00,'EJ121926716IN','2020-09-17',0,NULL,0,'2020-10-23 07:10:47','2020-10-27 04:55:23'),(11,'405-5654743-1893112','Vishnupriya Lethboria','7898204983','House No.75 Panchvati Colony RAIGARH, CHHATTISGARH 496001',230.00,'EJ114257021IN','2020-10-24',0,NULL,0,'2020-10-27 04:55:23','2020-10-27 05:17:17'),(12,'407-6601920-0769932','Jeff Seung Yeob Nam','9629331199','KUKDONG COOLANT INDIA Plot No.G78. Sipcot Industrial Park, Vadagal B, Pondur Post\nSRIPERUMBUDUR, Kancheepuram Dist 602105, TAMIL NADU 602105',1485.00,'EJ114257786IN','2020-10-25',0,NULL,0,'2020-10-27 04:55:23','2020-11-05 19:03:14'),(13,'408-3131288-0549966','Nikita Patel','9807670224','274/66 Rajendra Nargar 2 Street Lucknow, Lucknow, UTTAR PRADESH 226004',180.00,'EJ114287235IN','2020-10-26',0,NULL,0,'2020-10-27 04:55:23','2020-11-05 19:03:14'),(14,'171-8776383-0032368','Samrat Mukherjee','8527412714','Flat 2294, Tower 2, ATS DOLCE Sector- Zeta 1 GREATER NOIDA, UTTAR PRADESH 201306',1482.00,'EJ187827268IN','2020-11-01',0,NULL,0,'2020-11-01 18:12:56','2020-11-03 04:31:26'),(15,'408-0345475-1119510','T. M. Vasudevan','9249408019','Akshaya, 32/2024 C1, Mythri Lane, Punathilpadam Road, Edappally, ERNAKULAM, KERALA 682024',230.00,'EJ114288077IN','2020-11-02',0,NULL,0,'2020-11-03 04:28:14','2020-11-05 19:17:23'),(16,'403-4758095-8905925','Preeti Vinayak','9818807460','Preeti Vinayak 79b, Gh-10, Sunder Apartments, Paschim Vihar Sunder Apts NEW DELHI, DELHI 110087',570.00,'EJ114288085IN','2020-11-02',0,NULL,0,'2020-11-03 04:30:08','2020-11-05 19:17:42'),(17,'403-6409062-3697943','Preeti Vinayak','9818807460','Preeti Vinayak 79b, Gh-10, Sunder Apartments, Paschim Vihar Sunder Apts NEW DELHI, DELHI 110087',475.00,'EJ121932725IN','2020-10-21',0,NULL,0,'2020-11-03 04:30:57','2020-11-03 04:30:57'),(18,'171-4261575-2709952','Lakshmi Krishna',NULL,'B6,407 Sonighara Kesar,Kaspate Wasti PUNE, MAHARASHTRA 411057',395.00,'EJ121926733IN','2020-09-17',0,NULL,0,'2020-11-05 18:58:09','2020-11-05 18:58:09'),(19,'405-2882966-8289145','Pooja Puri',NULL,'1401,Tower 3, The Palms, South City 1 GURGAON, HARYANA 122007',950.00,'EJ127398663IN','2020-09-24',0,NULL,0,'2020-11-05 18:58:09','2020-11-05 18:58:09'),(20,'407-3530134-5765912','Kuntal Chandra',NULL,'Kuntal Chandra Uniidus Breeze/ Block - 4/ 2nd Floor/ Flat - 106 Sy No. 77/2, Munnekolalu, Marathahalli, Laxminarayana Layout BENGALURU, KARNATAKA 560037',1280.00,'EJ121928725IN','2020-09-26',1,'Ordered in error, Already have one, No longer needed',0,'2020-11-05 18:58:09','2020-11-14 15:03:03'),(21,'406-2828155-3605115','Sanjoy Ghose',NULL,'254 Abhinav Apartment CGHS LTD. B 12 Vasundhara Enclave NEW DELHI, DELHI 110096',1080.00,'EJ121934690IN','2020-09-29',0,NULL,0,'2020-11-05 19:03:14','2020-11-05 19:03:14'),(22,'405-0003340-2511505','Sujit Sircar',NULL,'A 2004 Salarpuria Magnificia 78 Doorvani Nagar , Old Madras Road BENGALURU, KARNATAKA 560016',2560.00,'EJ121934709IN','2020-09-29',0,NULL,0,'2020-11-05 19:03:14','2020-11-05 19:03:14'),(23,'403-6625863-8021113','Surabhi Roy','9897539929','Sri Puram,badaun Road Near Baga Properties BAREILLY, UTTAR PRADESH 243001',1482.00,'EJ187825602IN','2020-10-12',0,NULL,0,'2020-11-05 19:07:53','2020-11-05 19:07:53'),(24,'407-7470233-3842716','Abhijit Ghosh','9434855087','134/4/a Bishnupur Road, P O Berhampore, Dist Murshidabad Bishnupur Road BERHAMPORE, WEST BENGAL 742101',374.00,'EJ200306105IN','2020-10-15',0,NULL,0,'2020-11-05 19:07:53','2020-11-05 19:08:14'),(25,'402-5972451-3762761','Purba Grexter','9804424960','Grexter Halcyon, House No 1153, Room No 1A 21st Cross , Sector 3 Hsr Layout BENGALURU, KARNATAKA 560102',980.00,'EJ187826545IN','2020-10-16',1,'Available at a cheaper price, Product was damaged, the cost is 4 time high rather than real value.',0,'2020-11-05 19:16:47','2020-11-14 15:02:12'),(26,'171-2524249-3556358','Satyajit Sahu','9937051786','C305/4th Floor/C-block SLV VAJRA BENGALURU, KARNATAKA 560043',980.00,'EJ187826792IN','2020-10-17',1,'Damaged during delivery',0,'2020-11-05 19:16:47','2020-11-14 14:52:33'),(27,'404-4064476-6963556','Rishabh Mishra',NULL,'S6, Durga Saffron Square Outer Ring Road, Devarabeesanahalli BENGALURU, KARNATAKA 560103',980.00,'EJ187826660IN','2020-10-16',0,NULL,0,'2020-11-14 14:58:09','2020-11-14 14:58:09'),(28,'406-2656145-6110730','Avijit Bhattacharjee','9561566956','13/B, SAVITRI SANKUL APARTMENT, FULSUNDARMALA, TAKLI ROAD, UPANAGAR, NASIK ROAD,  NASHIK, MAHARASHTRA 422006',260.00,NULL,'2020-11-27',0,NULL,0,'2020-11-27 17:10:30','2020-11-27 17:10:30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
