-- MySQL dump 10.13  Distrib 5.6.43, for Linux (x86_64)
--
-- Host: localhost    Database: cp951329_idmc
-- ------------------------------------------------------
-- Server version	5.6.43

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
-- Table structure for table `customer_db`
--

DROP TABLE IF EXISTS `customer_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_db` (
  `c_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL DEFAULT '',
  `lname` varchar(100) NOT NULL,
  `christian` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `pic1` varchar(100) NOT NULL DEFAULT '',
  `pic2` varchar(100) NOT NULL DEFAULT '',
  `pic3` varchar(100) NOT NULL DEFAULT '',
  `approved` varchar(2) NOT NULL DEFAULT '',
  `site_id` varchar(11) NOT NULL DEFAULT '',
  `status_regis` datetime DEFAULT NULL,
  `status_gift` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_db`
--

LOCK TABLES `customer_db` WRITE;
/*!40000 ALTER TABLE `customer_db` DISABLE KEYS */;
INSERT INTO `customer_db` VALUES (8,'SN20012453','Kanokwan','Lerd','Devx','0954732233','savesepo@gmail.com','20200124142405.png','Qr_SN20012453.png','','1','',NULL,NULL),(9,'GD20012494','ณรงค์ ทดสอบ','ทดสอบการอก','แห่งพันธสัญญากรุงเทพ','0891246249','narong3000@gmail.com','','Qr_GD20012494.png','','','',NULL,NULL),(10,'QI20012480','Wadchara','Itthipoowadol ','COC ','0820202678','wicovenant@gmail.com','20200124154318.jpeg','Qr_QI20012480.png','','','1',NULL,NULL),(11,'JH20012761','ณรงค์','กิจ','พธสญ','0891246249','popnarong@gmail.com','20200127114004.jpeg','Qr_JH20012761.png','','','1',NULL,NULL),(12,'LU20012884','Yod','Ketudom','คริสตจักรต้นไม้แห่งชีวิต','0803679533','yod_lion@icloud.com','20200128100813.jpeg','Qr_LU20012884.png','','','1',NULL,NULL),(13,'YD20012952','พาโชค','สังวาลย์เพชร','พลังชีวิต','0812976757','phachok@gmail.con','20200129094637.jpeg','Qr_YD20012952.png','','','1',NULL,NULL),(14,'MP20012963','อภิรมย์ ','สุทธินาถ','คริสตจักรแห่งพันธสัญญาชลบุรี','0863335366','apiromsutt@gmail.com','20200129141153.jpeg','Qr_MP20012963.png','','','1',NULL,NULL),(17,'RE20013149','กุลธิดา','สุวรรณพานิช','สืบสัมพันธวงศ์','+66869792544','yam_s@ics.ac.th','20200131191535.jpeg','Qr_RE20013149.png','','','1',NULL,NULL),(18,'RX20013125','กุลธิดา','สุวรรณพานิช','สืบสัมพันธวงศ์','+66869792544','yam_s@ics.ac.th','','Qr_RX20013125.png','','','1',NULL,NULL),(19,'DD20013132','กุลธิดา','สุวรรณพานิช','สืบสัมพันธวงศ์','+66869792544','yam_s@ics.ac.th','20200131191620.jpeg','Qr_DD20013132.png','','','1',NULL,NULL),(20,'RJ20013128','กุลธิดา','สุวรรณพานิช','สืบสัมพันธวงศ์','+66869792544','yam_s@ics.ac.th','','Qr_RJ20013128.png','','','1',NULL,NULL),(21,'GA20013112','พัฒน์','สุวรรณพานิช','สืบสัมพันธวงศ์','+66819397788','pat.suw@gmail.com','','Qr_GA20013112.png','','','1',NULL,NULL),(22,'NW20013165','พัฒน์','สุวรรณพานิช','สืบสัมพันธวงศ์','+66819397788','pat.suw@gmail.com','','Qr_NW20013165.png','','','1',NULL,NULL),(23,'EO20021375','Kanokwan','','','','savesepo@gmail.com','20200213135533.png','Qr_EO20021375.png','','','1',NULL,NULL),(24,'WV20021572','พรเทพ','เศรษฐทรัพย์ทวี','คริสตจักรสานสัมพันธ์ธนบุรี','0816555762','porntep2025@gmail.com','20200215133819.jpeg','Qr_WV20021572.png','','','1',NULL,NULL),(25,'WM20021504','อังคณา','รื่นฤทธิ์','สานสัมพันธ์ธนบุรี','0802261117','angkanaruen@gmail.com','20200215194329.jpeg','Qr_WM20021504.png','','','1',NULL,NULL),(26,'DW20021525','ทีปพรัตน์','แซ่อึ๊ง','สานสัมพันธ์ธนบุรี','0864150532','tipparat.s@nexusfellowship.com','20200215194744.png','Qr_DW20021525.png','','','1',NULL,NULL),(27,'ED20021540','ทัศมณ','ศุภมิตร','คริสตจักรสานสัมพันธ์ธนบุรี','+66856389669','s.tassamon@gmail.com','20200215194820.jpeg','Qr_ED20021540.png','','','1',NULL,NULL);
/*!40000 ALTER TABLE `customer_db` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `l_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL DEFAULT '',
  `c_id` int(20) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` varchar(11) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'1','logo','20200130162302.png'),(2,'1','project_name','IDMC 2020'),(3,'1','sj_email_first','IDMC Thailand 2020 แจ้งผลการลงทะเบียน'),(4,'1','dt_email_first','เราได้รับข้อมูลการลงทะเบียนแล้ว <br>เมื่อ จนท. ตรวจสอบการชำระเงินและข้อมูลครบถ้วนแล้ว จะส่ง QR Code กลับมายืนยันให้ท่านเป็นขั้นตอนสุดท้าย เพื่อนำไปเป็นหลักฐานรับเอกสารและเข้างานสัมมนา'),(5,'1','sj_email_second','IDMC Thailand 2020 แจ้งยืนยันผลการลงทะเบียน'),(6,'1','dt_email_second','ยืนยันการลงทะเบียนสำเร็จ');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_admin` (
  `u_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` varchar(11) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_admin`
--

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;
INSERT INTO `user_admin` VALUES (1,'1','admin','admin','thaiidmc2020'),(2,'1','admin2','admin2','2020thaiidmc'),(3,'1','admin3','admin3','idmc2020'),(4,'1','admin4','admin4','thaiidmc2020');
/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-21 10:49:01
