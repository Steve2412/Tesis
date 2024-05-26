-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: tesis
-- ------------------------------------------------------
-- Server version 	10.4.32-MariaDB
-- Date: Sun, 19 May 2024 19:21:41 +0200

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
-- Table structure for table `calc_sucursales`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calc_sucursales` (
  `id` int(11) NOT NULL,
  `remitente_1` varchar(100) NOT NULL,
  `destinatario_1` varchar(100) NOT NULL,
  `remitente_2` varchar(100) NOT NULL,
  `destinatario_2` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calc_sucursales`
--

LOCK TABLES `calc_sucursales` WRITE;
/*!40000 ALTER TABLE `calc_sucursales` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `calc_sucursales` VALUES (3,'Maracaibo','Caracas','Caracas','Maracaibo',100);
/*!40000 ALTER TABLE `calc_sucursales` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `calc_sucursales` with 1 row(s)
--

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
INSERT INTO `clientes` VALUES (1,'Juan','Gutierrez A','10702701','M','La rosaleda','0412123456','juan@gmail.com','Maracaibo','1234'),(2,'Stefano','Casa','30123456','M','Nose','0412111555','stefano@gmail.com','Ciudad Ojeda','123456'),(3,'dffsfds','dsfdsfdsf','323213213','M','dsfdsffsd','','fsdf@gmail.com','dsfsdfsd','');
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
  `sucursal` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `sucursal` (`sucursal`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `empleados` VALUES (1,'Juan','Gutierrez','admin',1,'nose','juan@gmail.com','0412123456','30238697','m','Admin'),(2,'sadaasd','asdadsa','1234',2,'nose','ajdka@gmail.com','0424555887','3215455','F','Empleado'),(4,'fdsfsd','dsfsd','sdfdsfds',3,'nose','dfsfdsf@gmail.com','32132132','4324234','M','Admin');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `empleados` with 3 row(s)
--

--
-- Table structure for table `pagos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `numero_referencia` varchar(255) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto_pago` decimal(10,2) NOT NULL,
  `imagen_pago` longblob NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_paquete` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `id_paquete` (`id_paquete`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`package_id`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `pagos` VALUES (1,'34234324','Banco de Venezuela','2024-05-12',4324324.00,0x433A5C66616B65706174685C31333034373332393433342E706E67,NULL,'PAQ2024139024737');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pagos` with 1 row(s)
--

--
-- Table structure for table `paquetes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquetes` (
  `package_id` varchar(20) NOT NULL,
  `package_sucursal_origen_id` int(11) NOT NULL,
  `package_sucursal_destino_id` int(11) NOT NULL,
  `package_remitente_id` varchar(12) NOT NULL,
  `package_consignatario_id` varchar(12) NOT NULL,
  `package_peso` decimal(10,3) NOT NULL,
  `package_description` text NOT NULL,
  `package_qr_code` longblob NOT NULL,
  `package_status` enum('1','2','3','4') NOT NULL DEFAULT '1',
  PRIMARY KEY (`package_id`),
  KEY `package_sucursal_origen_id` (`package_sucursal_origen_id`),
  KEY `package_sucursal_destino_id` (`package_sucursal_destino_id`),
  CONSTRAINT `paquetes_ibfk_1` FOREIGN KEY (`package_sucursal_origen_id`) REFERENCES `sucursales` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `paquetes_ibfk_2` FOREIGN KEY (`package_sucursal_destino_id`) REFERENCES `sucursales` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paquetes` VALUES ('PAQ2024139014604',0,1,'10702701','30123456',10.000,'dsfdfsd',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000104494441546881EDD84D0E84200C05E0261C608EC4D53D120730E9405B2C18E3849FD9BDB740A3DF4A9A5A25421004794A604B0ABA50AC574036103DC6244B21A9BB01B246CA13D7BBF4B133DD0A907DA4DD0590BF90F07B03408688C4FBC64B7F011926FEE233F7F66E0419227D3EE7F37590397215359F648FBDB878EB2F20D3844F3DCB354EC447267961902DA43CF17CBB56B6348F833C20D3E4BA568BBA69D220AB24B094B25576BEA0670CB2837864C0B042BF9737C81CE97FF470DD0A4E205B881E7DB69036D28E6F202B24B27D2C5B1BF1F10D6427D1A29629A32F6F905552476219DFE2E306808C1349FB7BC717905562A9539AF58DEE730E6492200882F4F9029C7CBC0D1C86267A0000000049454E44AE426082,'1'),('PAQ2024139021004',0,1,'30123456','10702701',10.000,'gfdgfdg',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000102494441546881EDD8C10DC3200C05504B0CD091B27A4662804834B63F895355AD52BBB7FF0F09827782C84044188661DEA50DA4B721CBD8647F202405C4DF4B17F1016D8501921C597C40FB1EBA00BD613D48EA88AEC220F91B410521A924161B58BD751920491164CEFDB7BD91E4068919AB96E68F21B9455AA8CA3B1961F72349133BAA6D3EF7281E2726499236AF19BEDDE15CEC98244FAC2A5BDFFEB0D62CD2245922C7ED1855D9F1202922083EF4504648B2241EDAAC20A382749212E26FBBCEF9DCDBC92D1CDF4832448B871CBFD1AC8CD88BA496ACD6A5ABF0F2799364493B56017FD9492A88E5FC8D86BE46524190794A43DDB85CE7487E240CC330D73C016505DAA3BF48BB050000000049454E44AE426082,'1'),('PAQ2024139021026',0,1,'30123456','10702701',10.000,'gfdgfdg',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000103494441546881EDD8410E8320108561120FE091B8BA47F20024C8CC8068439B28D3DDFF16ADC2972E840C534320849051965CB3CBD55E46621B813810FB8E7BBBED571007224FBC4C9405D8D614EC4AD603E24842C89B2D00E41F446721BE44137B69FE5E5F208F493FF8EA02FC3A1B218FC83565388DC6216F49EB2362992D079F3CF676FA41A68944274618324DF4B6EF6C2B1CDBF52720EF49EB867562C9BD738378905A2DCEF5D0558078118B76145A3752F8DCDE9077E4FEA2A7D50D6B8E21F3C4BEAF679E14E935415C48CCE79F655D00D9DE12882FB128B96F6FC82CA9AF22B2B66F71B80090E744A32F296B33D13F20B3A4A67569B56EAC19324F0821E49E03283C4A9D92A267910000000049454E44AE426082,'1'),('PAQ2024139021144',0,2,'30123456','10702701',6.000,'ghfhfghf',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B0000010A494441546881EDD9CB0D84300C04D0485B0025D17A4A4A01486C3C8EF361111271F63673E0FB4E38322184C0300C7397CF599242C026EC76856401D1FD9E328E5BBEB1A7E106898FC813C70D23529444B298E02EC95F486923246B09A22D633BECE8B6BF90BC262536B29FDE8D242F491F9D563C86E415A98F5D276D18D4B291814EE22767B46B79481FB50A43F3209926B56F80683D2E05209925361B4601A4216F3FDD9BC443F0BA93272E2E626E41B282B4A08D482970D60D6F9269D22FF4747D43EB41E226BAD70E6257DB118993A051B44FE4B62841B28EC8195A33EA310E6F122F6993B6F6E941E2264829C0A9ABECBA184CE227F6E2C3EF8BC37E645C3EE748A608C330CC982FDC2267ADAF892F6E0000000049454E44AE426082,'1'),('PAQ2024139021211',0,2,'30123456','10702701',6.000,'ghfhfghf',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B000000FC494441546881EDD8410E84200C05D0261E802371758FC40126E9006D1D60C649842E8CF97FA1093C37D46085084110E45736D6A48D29D68B8D803810B99759DE0317D74D80AC91B2E24A48AB20F500F1234479C24A01E24CEE54E907911A2900FFDF5F402E13CD2DBEB04F236D4E27402649798BC367C58F1DA4AB11C8349131B25DD99E7811881B69DA8A3C9B9B631017A22EE8447E82C88A02B24674D9E5B23763202EC4620D46ADC2D92710E412E99A363A5EEAD8FD70804C9376AC1EF4307F771E20B344C6921EA375F500F123BAEC61D85A401C880E70ED860583AC939A98C84E7BA414434B0C3247DADD42FA62E6F19F04648E200882F47903D3B50F329FE53CFA0000000049454E44AE426082,'1'),('PAQ2024139021304',0,3,'10702701','30123456',20.000,'ccxvvx',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000104494441546881EDD8410E8320108561120FC091BC3A47F20026B4F318058D695287E5FF164AE55B0161A0291142C85396EAD9969AD6EF5B0F053281B4F7BAD9A3EEDEEA1D901869C3BE75BCF87C40E6114D8063C87CE23B08642651D6D69B7EEE2F90BFC958F88EEA772B7C9097644C2D797FFA0E794BCE45AD1385863DEF69A8839018D11A2FB90EB8FD84C4C9D16BAD64D5CF52520F2440BEEBB9B6C7B83FDF9637E43569C36E8B5AADF3F80689921E1D30ACF065C79030B91CDAB4C6AD57B3009940DA5BD7B9A2B1CF3E0B901964ADC765B9687FB66DC402994CF4C966E1B6BC2151A2BF77BC04FAD50312278A4F80DF3F860E4888782E170E3F264382841042AEF900C5489DB38674E2EA0000000049454E44AE426082,'1'),('PAQ2024139021522',0,0,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000103494441546881EDD84B0E83300C04D09172801E2957E7481C00C90DFE10A2A256E07437B34801BF5541C601601886B94A11CF5A045536B4C5433281D86F5D61553BEA05921CF142BB15CB6BBF01FB91DE0F927904680590FC8D2C7A4A329368BC007CEB2F24B78967F5FFFED7BB91E40639A75DDEAEAE933C254562A2F0790D88B71FC91CB29FBE5A7981E3366008499EC04EA379E8331E98244BA2351F13C56921C992B80BDA956B8C15C3D0469225F0E1788BE6F15927B94F86A10DD6466263479227F66BDBB97DA2405F48F2A4CAF129429B74ABEA01C954E2FB6425E3E34D9225C5463591BEF520C913CDF9F34E5F48B2C413539AF78D61C747F290300CC38C790343767BD5913D7F530000000049454E44AE426082,'1'),('PAQ2024139021958',0,1,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000100494441546881EDD8410E84200C05D09F70008FC4D53D120798A4836D1198D18580BBFF172AF0DC88C122C0300C7395209E1404D844104B0FC90262E7981CE7AB6E80648E441BC864D7A6E244B2941CADED03925748680E24CB884627A0998ACBF585E431F1D409283D24D3A4CF763740324482956AE5899F5FBF6E8E488689ECF973970F657DF63B3E20992628A3B92FAF20805D1DB791AC20A2D570E7EC1D279925B554D30138F9ADEB4886488DCF82AE1B376505C943D2166D65B30CF8224D324DEC7C7EF3EABF349215449BB1599F7D3E485E207FBB0E920504F63F42B41ABE7EBD499E134D43EC7F44BB272119269EA457BEB1EB361C24C3846118A6CF17DD385A321E2D41740000000049454E44AE426082,'1'),('PAQ2024139022319',0,1,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000100494441546881EDD84B0E83300C45514B2CA04B62EB2C89052051F2EC347CFA11493ABB6F0222A793DA7513CC0821E45D863532EB6E311BF3134807E2D771CE4FE26E807421E91BD7C23A3D7437783D201D89165400C83FC80143FA10450B933EF179BE406E93880A90ABA0409A49890AF03D909B445D7C9C1B29D3F91700A921167BE0B4A3D0C276B798FF05425A493CDBDCE2F3D9EC719D2F905A925DAE423AD35DB715904AA27D44EA7155A19C3A20CDA4243ADBDDBEBD21D5E4F2A24753D9AB0069277EDDBFE8C9E31AD281F8DC781D91CBB119D28FA4A6B6DCE3A7F686B4138BF95C3A1BD24C94B2B748E47AE283D491888F8C5FFF8D905B8410428E790259D3350CB669A4420000000049454E44AE426082,'1'),('PAQ2024139023054',0,1,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000101494441546881EDD8410E84200C05D0261CC02371758EE4014C18DA02157526113ABBFF37A2BC15652A0E118220C85342AED9CB28955B8AED098803D16BDC898AABA3D304C81AE11557A205E052703D401C093FDB32C8DF481F81B81149B4D6FCBDBF80BC26F6E2B32A5C5E7C2093C4121E9E81AC119918FB06275D7F012033A41ED572DA8ED641CA488F6F20AB441A727772BBDDFB0BC81CE1F08AEBB2CB8416208078905680BAB3ED5C0CE2405AEC44D14B01B248C6431BCF26924E0DE242F45AFF8AB0FE7C108807E14D6D9FC8AD144301405649EBCFD23C2EDB1BC481E867C66967832C13891620B743DBED8B0F648ED4ECA19F867FBD1B41DE10044190311FAD0B3F5CBA076C710000000049454E44AE426082,'1'),('PAQ2024139023102',0,1,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000100494441546881EDD8C10D8420108561120BB0245AB7240B2061C78111216C36027BFBDF4585CF0BE0283A470821BD6C31E7940B7F6ED1796B812C20E9E82FE2F660677707648E5C23AE635F6641CE20CB490C907F1159DE652A206B882611BDE37B7D81BC2639FACEFBF16E84BC2425828FBDD7011926F788CBA2CEB360979069221DD7B0C74327C08A47B3BC21C3E4F9BA93CF0AB923E436C82CD1F55CB7A5B30DB282A482AC1F1317B60A121C649AB8164B05D122DD1190B7E4F9A3C74AB36D4220F3241D9B8EFA09808C13EDF0D586C3F6749085E49E0FAD2090A52446FBC0E8ED4920434493B619E92F7B990FC82CC9D1B6B4D708EDF2860C124208A9F301181B72CFC6C5172B0000000049454E44AE426082,'1'),('PAQ2024139023310',0,1,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000103494441546881EDD8CD0DC3200C05604B0CC048AC9E911820128DB1F9719B460AF8F8DE21A5E1CB25203021421004B94B289A7CB58E580AA57607C481C86F127272CB7480EC117EE34AEA5F6EF1788038121E858E419C49982E206EA446968CD886E27E7D01794DC6C6A703F0BBF1812C923952563C06E415E1591CC71BEFBB9F1923906572E5A45151B4274E02D926445345C1D12722880FD149DD7BB9754C1B1FC832A90BC538C4B1CBF502E240465A81C133BBADD4207BC47EE891F599481769906D22BF7DCFD3D35D29202E44EEE530F53E9CA74156491D00FA3E75803810A2515BFC99DE20EF494DCAA6A248E64C02B24C34ADA37E8F30070E906582200862F3013F0013E24F28753B0000000049454E44AE426082,'1'),('PAQ2024139023549',0,1,'30123456','10702701',300.000,'dfsdfds',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000100494441546881ED98410E84200C009BF0009FC4D77D120F3071A52D8AC69828DDDBCCC56AE74449A9880000DC9156A76CD13C2D22B97D410950EC998B88256AD42550C6946C092F8547052554390A80F21765D657944845F184C8537F4179AD38C5D7FEF96C4479A59CC8EB72FB1DE5A3927C8EA8D96D68ABCBAE93DBA5BFA07C52DA71D7B59143461957F4D5FA86956263961E9401A5ADBD46C76C8112A06CDD4277F8226D72AB5B1E254A31DA55446DCD97ED8DF251390D6D5A8A9AB5E118655CB1A7FD66D8359A57012542A9275D7F1551C70A8D5062955685EBF6461955D25E05BF65478950142F40DA7F3D124A84E294D4CE3C5DFB694519570000CEFC0006388B4D908172020000000049454E44AE426082,'1'),('PAQ2024139023829',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000105494441546881EDD8C10D83300C05504B0C9091583D233100925B7F3B40284202A7B7FF0F34857702CB3188300CC35C65D2C882D52A32B733240388FFCE8B1D4096EE02498ED81DFF5EB0732556781E240389489437C97F48C55F929104C185EAABEE02498AEC1B9F7790DBBD91E411E9828DEF3E244FC8A4FB44A1D5363E29D19F49C610EB1B0535DE639224B161A2ED74D19ACD563986244750D4CDB5264D922731A5E94F3D938C20117490D5DF3A4EE54DF2929C3EF444DFF0264D9227FEEBAF73982830B9959564089955B7C9CD568A1AEF270F923489A2F62D70BBFF24230826B7ED5BDAE50320794E102F6F1F26F603499644DA94167DA37BE3237949188661FA7C001716C1AD7827DB480000000049454E44AE426082,'1'),('PAQ2024139023834',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000102494441546881EDD84D0E84200C8661120FE091E6EA1E890390A09456C08C936899DDFB2D94C0B312537E422084906F59B2265ACFC77A2013880EC4036FB5350C407CA47C711B309C236432C9DB9A20FF21A56FD516641A91F413300C405CC416BE4567E1C7DA087948FA747B8BBB401E91F3B34721F2534B1949103F29390AB2ECD78E573A6761C91037291BE173B92BA55967619823C84B12CAF92D85EA823DAEA519F28EB4E2611350F7169019A445EBB36EDA2EA519F28AF4173D52376C022053487DD70387F5B616C449A450D4E2D1FDE3C3890FE2257A58D69BCAF1F7867889B4F42AE2FE2E08F29048EA40C9B6EA033281D8C2D726C0CA08C44B082164CC0EAA7625EFE6F7E5800000000049454E44AE426082,'1'),('PAQ2024139024609',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000108494441546881EDD9410E83201085E1493C8047E2EA1E890334A132CCA0B4860461F9BF456DF15B0961062B4208214FD992258AA4238F041F812C20E51AE2898FFC33C4E606648EE4275E6ED8B73C2911B298F80440D6933CB6F72700324E34B6BC3FD2DB5F20C3C40B9FADEC5E6D840C927BB4B7E8073244EA63AF5B7359D9FB07324FC47AE052F3CECDC367614B9069A2454EC4266057F23747909744FCACA163DA563C6CCD9077C40ADF3501D65B4056902B7A58166FDADAE50D79479A173DA5734B3E0B907952AE215AD3767BA106594042AA87E55B1D6C4E7C9059E26D853EFB9FE50D9925DEAA85BA8D4016108D95BB94DB37FB802C205EF86ACD8BFE470664961042489B2FDA344F4DBECA215B0000000049454E44AE426082,'1'),('PAQ2024139024618',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000111494441546881ED98510E84300844493C8047EAD53D920730A93280DA5DD7C4CAFECD7CD846DF17204C2B42511475A5A1BA66113CA4C41B220988AD65DE76A52EBA6B3E10798768C4F1615B1783B7541049464446227F42F4DDE83B22690884F29EC6FBFE42E43112836FA8D19F7FCE46220F91461EFB3B117982EC6147795B51A38D2C4472103513DA95ABDA0AF3C55FA68D480F82868CE62102D867DE290144BA91C1C33E1D06E3B27B13E943FCACA156CD6C054E1D4432904330C212D3AFF903887422E78B1E3F6BD4C80291F788AD6E2BFC2E0D3B22198835E439FC5A8954104944FCB06CB1FF286F226F9130C7FB1C2492814056D4DA98E190F541240189C1772440ED5B73E223D289501445B55A019F447851A614CD200000000049454E44AE426082,'1'),('PAQ2024139024634',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000102494441546881EDD8490EC3200C05504B1CA047E2EA39520E10C92D1E129C745030DDFDBF69036F85A921254210047997C296B5B08E541F0199406C6225E2A53DB66FDD04488EB415D789BA0A297D3D40A69036F660907F115E40A6138916E0477F01B94DBA834F9BC7D7B311E40E39229BFA3A0C9220FBA6D615F77A2CE75F00C828690D991E1B797FDE2894026498BC2EC2D63CEC4A2CA7DFA979800C125B71BBAFE99C14A080E409E956B631D9D9BCDF9041D22494827B079225F1D2C6D6950D83A4897EDA5F11477FDE086406A9DE2DA40A5E8A5000902CB1479683EFB4BD412690EAA75F0848864894B01F7C97373E903162096F721FCF46905B04411024E6096DD12B705CC119390000000049454E44AE426082,'1'),('PAQ2024139024643',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000100494441546881EDD8410E84200C05D0261E802379758FE4014CAAF4B701CCB818E8F2FF853AC39B0D9D4051846118E65736F59C9BCAFEDCED62214920B8EF9548B9EAD33040B24630ED67FF847A90E411113DA21424D9E41938EC234926114C7BBD162F453740B244FA8D2F5690D7C6473249C694AF01922962CD44CC78B7820C35229927E8D7DA137E7109C932199CF51675548F4292426C55B6EF7051B46F6DE323592082DD2F0AE0553849B288BBB66E7CB415247F92BE69B33F753BD3912410DC7188538DD39D2A490AC177419EF5D9EB41924A7CDADFA70E9204E2AFD1D4BA6160927562F1D73BD151ECE3998464967862008B477FE02099260CC330636E63960D8EE8161D140000000049454E44AE426082,'1'),('PAQ2024139024737',0,1,'10702701','30123456',200.000,'dfsdfs',0x89504E470D0A1A0A0000000D494844520000010E0000010E0103000000427F6BE600000006504C5445FFFFFF00000055C2D37E000000097048597300000EC400000EC401952B0E1B00000105494441546881EDD84D0E8320108661120FE091B8BA47F2002628F3A3505B1384EEDE6FA16D79BA01328E84400821DF3225CB9ABFCD2985E8BF400610BDC7753217D76A00D247F28CCB405A0A0C194EE60DF21F720C2CB37F828C22927201AA014817F107DFA473FFF46C8434922A36F74F81B49073DAF5C1279B3A5FF24687F49263C0CAB00D58735C140FC86B72558B4D4BB3FDE3638D20AF886D6AE986ADADB89766C84BE2A3B200E7451B39482FB962D5C20F25B6BB80B492F2A04737BA2D006408D17B2CCE78FC5002328048A1D09765AF25DAC841C691A09BDA48BDBD21BDC45B3579F5F87516046925125B80A46769DABE41FA893FF8AE05B03202E926841052670762D5503D2C91DB650000000049454E44AE426082,'1');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paquetes` with 20 row(s)
--

--
-- Table structure for table `paquetes_historial`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquetes_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pac` varchar(20) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  `id_emp` int(11) NOT NULL,
  `fecha_camb` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_pac` (`id_pac`),
  KEY `id_emp` (`id_emp`),
  CONSTRAINT `paquetes_historial_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paquetes` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `paquetes_historial_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes_historial`
--

LOCK TABLES `paquetes_historial` WRITE;
/*!40000 ALTER TABLE `paquetes_historial` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paquetes_historial` VALUES (1,'PAQ202494132616','1',1,'2024-05-11 22:59:17'),(2,'PAQ202494132616','2',1,'2024-05-11 22:59:17'),(3,'PAQ202494132616','3',1,'2024-05-11 22:59:17');
/*!40000 ALTER TABLE `paquetes_historial` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paquetes_historial` with 3 row(s)
--

--
-- Table structure for table `reportes_paquetes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reportes_paquetes` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo_problema` enum('retraso','daño','perdida','otro') NOT NULL,
  `fecha_reporte` datetime NOT NULL DEFAULT current_timestamp(),
  `solucion` text DEFAULT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes_paquetes`
--

LOCK TABLES `reportes_paquetes` WRITE;
/*!40000 ALTER TABLE `reportes_paquetes` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `reportes_paquetes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `reportes_paquetes` with 0 row(s)
--

--
-- Table structure for table `sucursales`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sucursal` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sucursales` VALUES (1,'Caracas','Urbanizacion el Paraiso, Callejon Machado, Dentrol del Club Recracional el Paraiso, Local 12 y 13','1020','04246651295'),(2,'Maracaibo','Sector Monte Bello, 18 de Octubre, Av. 2 con Calle 1. Maracaibo Estado Zulia.','4001','04246519054'),(3,'Valencia','Centro Industrial Vista, Galpon 7, Zona Industrial Sur, Municipio Valencia','2003','04246651295');
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sucursales` with 3 row(s)
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

-- Dump completed on: Sun, 19 May 2024 19:21:41 +0200
