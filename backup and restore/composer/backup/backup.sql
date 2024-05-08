-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: tesis
-- ------------------------------------------------------
-- Server version 	10.4.32-MariaDB
-- Date: Wed, 08 May 2024 22:08:12 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `clave` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `clientes` VALUES (1,'Juan d','Gutierrez A','10702701','M','Urb Santa Fe 1','04241221213','jdgutierrez@gmail.com','Maracaibo','1234'),(2,'Stefano','Casa','30123456','M','Nose','0412111555','stefano@gmail.com','Ciudad Ojeda','123456'),(3,'dffsfds','dsfdsfdsf','323213213','M','dsfdsffsd','','fsdf@gmail.com','dsfsdfsd','');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `clientes` with 3 row(s)
--

--
-- Table structure for table `empleados`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `clave` varchar(16) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `empleados` VALUES (1,'Juan','Gutierrez','admin','maracaibo','La rosaleda','juan@gmail.com','0412123456','30238697','m','admin'),(2,'sadaasd','asdadsa','1234','maracaibo','Bella vista','ajdka@gmail.com','0424555887','3215455','F','Empleado'),(4,'fdsfsd','dsfsd','sdfdsfds','dsfdsf','dsfdsf','dfsfdsf@gmail.com','32132132','4324234','M','Admin');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `empleados` with 3 row(s)
--

--
-- Table structure for table `paquetes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquetes` (
  `package_id` varchar(20) NOT NULL,
  `package_sucursal_id` int(11) NOT NULL,
  `package_remitente_id` varchar(12) NOT NULL,
  `package_consignatario_id` varchar(12) NOT NULL,
  `package_peso` float NOT NULL,
  `package_precio` float DEFAULT NULL,
  `package_description` text NOT NULL,
  `package_qr_code` longblob NOT NULL,
  `package_status` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paquetes` VALUES ('PAQ202494132616',0,'30123456','30123456',20,NULL,'gdfgdfgfd',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000103494441546881EDD8410E83201085E149388047E2EA1CC90398501846505B4D10BAFBDF462DDF0A46982A420821BFE2A2654D0F7E7551FCFE0B640229579F4819C8778701C818F165C096C2EE56C86C12964D207F22F60899493456DE9B3CED2F906E62596DEE9FCE4648276971F5CCBB0DA493D419CF6D45D99AF747C830C9AD9A6EC369B415F5A5BC212F89B3B9D784B21E691564814C203979EE432DF450461D649CEC33EE0F079FEE209B4086899C706B2B6E8F404807397DE8C9852EED4F08649C94AB95B7BA18AF6F00E435D1C9F67B6F215FCD316416B1424FE7206436A95BF3FD02403A89A67E60D7D87A408689257F46D3BED83AE4E302405E12420839E703A402C74D7A510B8B0000000049454E44AE426082,'1');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paquetes` with 1 row(s)
--

--
-- Table structure for table `sucursales`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sucursales` with 0 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Wed, 08 May 2024 22:08:12 +0200
