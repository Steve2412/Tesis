-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: prueba
-- ------------------------------------------------------
-- Server version 	10.4.28-MariaDB
-- Date: Wed, 19 Jul 2023 07:45:23 +0200

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
-- Table structure for table `cursos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `ID_cur` varchar(11) NOT NULL,
  `nomb_cur` varchar(45) NOT NULL,
  `horar_cur` varchar(100) NOT NULL,
  `prec_cur` float(5,2) NOT NULL,
  `cupos_cur_min` int(11) NOT NULL,
  `cupos_cur_max` int(11) NOT NULL,
  `conte_text` longtext DEFAULT NULL,
  PRIMARY KEY (`ID_cur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `cursos` VALUES ('Eng_II_A','Ingles II','Lunes a Viernes 08:00am a 10:00am',20,20,40,''),('E_1','Ingles I','Lunes a Viernes 08:00am a 10:00am',10,10,40,'<h1 style=\"text-align: center;\"><span style=\"font-size: 24pt;\">Curso online de INGLES II</span></h1>\r\n<p><span style=\"font-size: 14pt;\">En este curso aprenderas los temas basicos de ingles, como pronombres, verbo to be, como crear oraciones, entre otras cosas</span></p>\r\n<h2><span style=\"font-size: 18pt;\">Contenido Program&aacute;tico</span></h2>\r\n<h3><span style=\"font-size: 18pt;\">TEMA 1:</span></h3>\r\n<ul>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Saludos y presentaciones: Formales e Informales.</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Verbo to Be: Forma Interrogativa y afirmativa.</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Palabras interrogativas: What/where/how/who.</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Alfabeto</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Oficios,profesiones (ocupaciones).</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Pronombres personales sujeto</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Pa&iacute;ses, nacionalidades e idiomas.</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">N&uacute;meros cardinales (0-100)</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Art&iacute;culos indefinidos (a / an)</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Adjetivos posesivos</span></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\">TEMA 2:</span></h3>\r\n<ul>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Imperativo: Forma afirmativa y negativa (instrucciones dentro del sal&oacute;n de clase).</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Expresiones dentro del sal&oacute;n de clase.</span></li>\r\n<li style=\"font-size: 18pt;\"><span style=\"font-size: 18pt;\">Vocabulario sobre objetos del sal&oacute;n de clase y personales.</span></li>\r\n</ul>\r\n<h3><span style=\"font-size: 36pt;\">TEMA 3:</span></h3>\r\n<ul>\r\n<li style=\"font-size: 36pt;\"><span style=\"font-size: 36pt;\">Verbo have</span></li>\r\n<li style=\"font-size: 36pt;\"><span style=\"font-size: 36pt;\">Vocabulario relaciones interpersonales y la familia</span></li>\r\n<li><span style=\"font-size: 36pt;\">Caso</span> posesivo (s)</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3>TEMA 4:</h3>\r\n<ul>\r\n<li>Preposiciones de lugar</li>\r\n<li>Sustantivos plurales regulares e irregulares.</li>\r\n<li>Vocabulario de las partes y objetos de la casa. Adjetivos para describirla.</li>\r\n<li>Adjetivos demostrativos</li>\r\n<li>Art&iacute;culo definido (the)</li>\r\n</ul>\r\n<div style=\"max-width: 650px;\" data-ephox-embed-iri=\"https://www.youtube.com/embed/9p-_NhWuuZQ\">\r\n<div style=\"left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;\"><iframe style=\"top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;\" src=\"https://www.youtube.com/embed/9p-_NhWuuZQ?rel=0\" scrolling=\"no\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share;\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div style=\"max-width: 650px;\" data-ephox-embed-iri=\"https://www.youtube.com/embed/f0IhZBb0BQg\">\r\n<div style=\"left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;\"><iframe style=\"top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;\" src=\"https://www.youtube.com/embed/f0IhZBb0BQg?rel=0\" scrolling=\"no\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share;\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n</div>'),('IT_1','Italiano I','Sabado de 08:00am a 12:00pm',15,15,20,'a'),('Port_1','Portugues 1','Lunes a Viernes 08:00am a 10:00am',15,15,20,'a');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cursos` with 4 row(s)
--

--
-- Table structure for table `foro`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foro` (
  `id_foro` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_foro` varchar(11) DEFAULT NULL,
  `curso_id_foro` varchar(8) DEFAULT NULL,
  `mensaje_foro` longtext DEFAULT NULL,
  `fecha_mensaje_foro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_foro`),
  KEY `foro_ibfk_1` (`usuario_id_foro`),
  KEY `foro_ibfk_2` (`curso_id_foro`),
  CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`usuario_id_foro`) REFERENCES `usuario` (`cedu_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `foro_ibfk_2` FOREIGN KEY (`curso_id_foro`) REFERENCES `cursos` (`ID_cur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foro`
--

LOCK TABLES `foro` WRITE;
/*!40000 ALTER TABLE `foro` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `foro` VALUES (5,'V-8032002','E_1','Que prueba?','2023-07-18 18:34:54');
/*!40000 ALTER TABLE `foro` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `foro` with 1 row(s)
--

--
-- Table structure for table `notifipago`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifipago` (
  `id_notifipago` int(11) NOT NULL AUTO_INCREMENT,
  `monto_notifipago` float DEFAULT NULL,
  `banco_notifipago` varchar(30) DEFAULT NULL,
  `cedu_titular_notifipago` varchar(11) DEFAULT NULL,
  `fecha_notifipago` date DEFAULT NULL,
  `referencia_notifipago` int(11) DEFAULT NULL,
  `motivo_notifipago` text DEFAULT NULL,
  `usuario_notifipago` varchar(11) DEFAULT NULL,
  `estado_notifipago` enum('Pendiente','Procesado','Rechazado') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`id_notifipago`),
  KEY `notifipago_ibfk_1` (`usuario_notifipago`),
  CONSTRAINT `notifipago_ibfk_1` FOREIGN KEY (`usuario_notifipago`) REFERENCES `usuario` (`cedu_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifipago`
--

LOCK TABLES `notifipago` WRITE;
/*!40000 ALTER TABLE `notifipago` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `notifipago` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `notifipago` with 0 row(s)
--

--
-- Table structure for table `periodo`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `ID_peri` varchar(8) NOT NULL,
  `nomb_peri` varchar(45) NOT NULL,
  `fech_ini_peri` date NOT NULL,
  `fech_fin_peri` date NOT NULL,
  PRIMARY KEY (`ID_peri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `periodo` VALUES ('2020_1','Enero Abril 2022','2001-01-09','2001-04-09'),('2023_2','Periodo Mayo Agosto 2023','2023-05-01','2023-08-01'),('2023_3','Enero Abril 2023','2023-01-09','2023-04-15');
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `periodo` with 3 row(s)
--

--
-- Table structure for table `usuario`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cedu_user` varchar(11) NOT NULL,
  `nomb_user` varchar(25) NOT NULL,
  `apelli_user` varchar(25) NOT NULL,
  `correo_user` varchar(45) NOT NULL,
  `contra_user` varchar(16) NOT NULL,
  `dirre_user` varchar(150) NOT NULL,
  `numer_user` varchar(15) NOT NULL,
  `fech_naci_user` date NOT NULL,
  `sexo_user` enum('M','F') NOT NULL,
  `estado_user` enum('Activo','Inactivo') DEFAULT 'Activo',
  PRIMARY KEY (`cedu_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuario` VALUES ('V-10214983','Jaime','Acosta','JaimeAcosta@yahoo.es','Admin2023.','Campo Claro','0416-7813428','1990-07-04','M','Activo'),('V-28409157','Stefano','Casa','Stefano007Casa@hotmail.com','Prueba2001.','Palaima','0414-9664100','2001-12-24','M','Activo'),('V-8032002','Jose','Rodriguez','JoseRodriguez@gmail.com','Profesor2001.','Bella Vista','0412-6987425','1983-04-13','M','Activo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usuario` with 3 row(s)
--

--
-- Table structure for table `usuario_has_cursos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_has_cursos` (
  `Usuario_ID_user` varchar(11) NOT NULL,
  `Cursos_ID_cur` varchar(8) DEFAULT NULL,
  `Periodo_ID_peri` varchar(8) DEFAULT NULL,
  `calificacion_user` float DEFAULT 0,
  `Usuario_rol` enum('Profesor','Estudiante','Administrador') NOT NULL,
  KEY `usuario_has_cursos_ibfk_1` (`Usuario_ID_user`),
  KEY `usuario_has_cursos_ibfk_2` (`Cursos_ID_cur`),
  KEY `usuario_has_cursos_ibfk_3` (`Periodo_ID_peri`),
  CONSTRAINT `usuario_has_cursos_ibfk_1` FOREIGN KEY (`Usuario_ID_user`) REFERENCES `usuario` (`cedu_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_has_cursos_ibfk_2` FOREIGN KEY (`Cursos_ID_cur`) REFERENCES `cursos` (`ID_cur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_has_cursos_ibfk_3` FOREIGN KEY (`Periodo_ID_peri`) REFERENCES `periodo` (`ID_peri`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_cursos`
--

LOCK TABLES `usuario_has_cursos` WRITE;
/*!40000 ALTER TABLE `usuario_has_cursos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuario_has_cursos` VALUES ('V-28409157','E_1','2023_2',20,'Estudiante'),('V-8032002','E_1','2023_2',0,'Profesor'),('V-10214983',NULL,NULL,0,'Administrador');
/*!40000 ALTER TABLE `usuario_has_cursos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usuario_has_cursos` with 3 row(s)
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

-- Dump completed on: Wed, 19 Jul 2023 07:45:24 +0200
