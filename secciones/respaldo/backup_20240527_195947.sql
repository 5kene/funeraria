-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cementerio
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
-- Table structure for table `canton`
--

DROP TABLE IF EXISTS `canton`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canton` (
  `id_can` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_can` varchar(100) NOT NULL,
  PRIMARY KEY (`id_can`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canton`
--

LOCK TABLES `canton` WRITE;
/*!40000 ALTER TABLE `canton` DISABLE KEYS */;
INSERT INTO `canton` VALUES (1,'Manta'),(2,'Portoviejo'),(3,'Chone'),(4,'Guayaquil'),(5,'Balzar'),(6,'Colimes'),(7,'Durán');
/*!40000 ALTER TABLE `canton` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `causa_muerte`
--

DROP TABLE IF EXISTS `causa_muerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `causa_muerte` (
  `id_causa_muerte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_causa_muerte` varchar(100) NOT NULL,
  PRIMARY KEY (`id_causa_muerte`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `causa_muerte`
--

LOCK TABLES `causa_muerte` WRITE;
/*!40000 ALTER TABLE `causa_muerte` DISABLE KEYS */;
INSERT INTO `causa_muerte` VALUES (1,'Neumonia'),(2,'Covid-19'),(3,'Accidente de transito'),(4,'Diabetes'),(5,'Cancer'),(6,'Homicidio');
/*!40000 ALTER TABLE `causa_muerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificado`
--

DROP TABLE IF EXISTS `certificado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `id_tramite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `id_tramite` (`id_tramite`),
  CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`id_tramite`) REFERENCES `tramite` (`id_tramite`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificado`
--

LOCK TABLES `certificado` WRITE;
/*!40000 ALTER TABLE `certificado` DISABLE KEYS */;
INSERT INTO `certificado` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11);
/*!40000 ALTER TABLE `certificado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_clien` int(11) NOT NULL AUTO_INCREMENT,
  `id_ubicacion` int(11) DEFAULT NULL,
  `ci_clien` varchar(10) NOT NULL,
  `nombre_clien` varchar(100) NOT NULL,
  `apellido_clien` varchar(100) NOT NULL,
  `fecha_nacimiento_clien` date NOT NULL,
  `telefono1` varchar(10) DEFAULT NULL,
  `telefono2` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_clien`),
  KEY `id_ubicacion` (`id_ubicacion`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubi`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,1,'1321545845','Eber','Alarcon','1998-11-10','0997545121','0997545121'),(2,1,'1354545144','Jose','Arteaga','1990-12-11','0986537212','0986537212'),(3,1,'1351545411','Juan','Cedeño','1995-01-17','0995845411','0995845411'),(4,2,'1312545412','Anthony','Holguin','1980-05-09','0947878511','0947878511'),(5,3,'1354547899','Helen','Lucas','1992-06-26','0984513265','0984513265'),(6,4,'1312356548','Nahomi','Machuca','1985-07-23','0988751451','0988751451'),(7,5,'1364895987','Brando','Mero','1998-06-07','0978451210','0978451210'),(8,6,'1315447123','Kelvin','Muñoz','1997-04-04','0988451326','0988451326'),(9,7,'1314558866','Luis','Navarrete','1988-06-06','0947845123','0947845123'),(10,7,'1354665847','Antony','Palacios','1979-08-14','0915454758','0915454758'),(11,6,'1312454763','Kevin','Ponce','1995-10-22','0988754512','0988754512');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `difunto`
--

DROP TABLE IF EXISTS `difunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `difunto` (
  `id_difunto` int(11) NOT NULL AUTO_INCREMENT,
  `id_causa_muerte` int(11) DEFAULT NULL,
  `nombre_difunto` varchar(100) NOT NULL,
  `apellido_difunto` varchar(100) NOT NULL,
  `fecha_nacimiento_difunto` date NOT NULL,
  `fecha_defuncion_difunto` date NOT NULL,
  `codigo_acta_difunto` int(11) NOT NULL,
  PRIMARY KEY (`id_difunto`),
  KEY `id_causa_muerte` (`id_causa_muerte`),
  CONSTRAINT `difunto_ibfk_1` FOREIGN KEY (`id_causa_muerte`) REFERENCES `causa_muerte` (`id_causa_muerte`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `difunto`
--

LOCK TABLES `difunto` WRITE;
/*!40000 ALTER TABLE `difunto` DISABLE KEYS */;
INSERT INTO `difunto` VALUES (1,1,'Carlos','Palma','1960-11-10','2022-12-30',1),(2,2,'Jordy','Pico','1962-08-01','2021-01-04',2),(3,2,'Jean','Pin','1940-09-29','2020-12-30',3),(4,2,'Manuel','Pincay','1975-04-17','2024-01-04',4),(5,2,'Leonardo','Quiñonez','1965-07-16','2023-12-30',5),(6,3,'Karen','Torres','1969-12-15','2023-01-04',6),(7,3,'Vera','Pedro','1987-11-07','2020-05-28',7),(8,4,'Luiggi','Zambrano','1989-12-15','2022-10-06',8),(9,5,'Edisson','Zambrano','1980-09-15','2023-05-28',9),(10,6,'Branly','Yudeh','1982-09-07','2024-09-06',10),(11,6,'María','Villamar','1970-12-20','2021-05-05',11),(12,6,'Juan','Mera','1979-10-10','2021-05-13',12);
/*!40000 ALTER TABLE `difunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_estructura`
--

DROP TABLE IF EXISTS `estado_estructura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_estructura` (
  `id_estado_estructura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_est_estruc` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado_estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_estructura`
--

LOCK TABLES `estado_estructura` WRITE;
/*!40000 ALTER TABLE `estado_estructura` DISABLE KEYS */;
INSERT INTO `estado_estructura` VALUES (1,'Disponible'),(2,'Ocupado'),(3,'En construcción'),(4,'En mantenimiento');
/*!40000 ALTER TABLE `estado_estructura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estructura`
--

DROP TABLE IF EXISTS `estructura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estructura` (
  `id_estructura` int(11) NOT NULL AUTO_INCREMENT,
  `id_lugar_estructura` int(11) DEFAULT NULL,
  `id_tipo_estructura` int(11) DEFAULT NULL,
  `id_estado_estructura` int(11) DEFAULT NULL,
  `cruces` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_estructura`),
  KEY `id_lugar_estructura` (`id_lugar_estructura`),
  KEY `id_tipo_estructura` (`id_tipo_estructura`),
  KEY `id_estado_estructura` (`id_estado_estructura`),
  CONSTRAINT `estructura_ibfk_1` FOREIGN KEY (`id_lugar_estructura`) REFERENCES `lugar_estructura` (`id_lugar_estructura`),
  CONSTRAINT `estructura_ibfk_2` FOREIGN KEY (`id_tipo_estructura`) REFERENCES `tipo_estructura` (`id_tipo_estructura`),
  CONSTRAINT `estructura_ibfk_3` FOREIGN KEY (`id_estado_estructura`) REFERENCES `estado_estructura` (`id_estado_estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estructura`
--

LOCK TABLES `estructura` WRITE;
/*!40000 ALTER TABLE `estructura` DISABLE KEYS */;
INSERT INTO `estructura` VALUES (1,1,1,1,0),(2,2,1,1,0),(3,3,1,3,0),(4,4,2,2,1),(5,5,2,3,0),(6,6,3,2,1),(7,6,3,2,1),(8,6,3,2,1),(9,6,3,1,1),(10,7,3,1,1),(11,7,3,1,1),(12,7,3,1,1),(13,7,3,2,1),(14,8,4,2,1),(15,8,4,1,1),(16,9,4,1,1),(17,9,4,1,1),(18,10,5,1,1),(19,11,5,3,0);
/*!40000 ALTER TABLE `estructura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar_estructura`
--

DROP TABLE IF EXISTS `lugar_estructura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar_estructura` (
  `id_lugar_estructura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_zona` varchar(100) NOT NULL,
  `nombre_manzana` varchar(100) NOT NULL,
  PRIMARY KEY (`id_lugar_estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar_estructura`
--

LOCK TABLES `lugar_estructura` WRITE;
/*!40000 ALTER TABLE `lugar_estructura` DISABLE KEYS */;
INSERT INTO `lugar_estructura` VALUES (1,'Zona 1','Manzana 1'),(2,'Zona 1','Manzana 2'),(3,'Zona 1','Manzana 3'),(4,'Zona 2','Manzana 1'),(5,'Zona 2','Manzana 2'),(6,'Zona 3','Manzana 1'),(7,'Zona 3','Manzana 2'),(8,'Zona 4','Manzana 1'),(9,'Zona 4','Manzana 2'),(10,'Zona 5','Manzana 1'),(11,'Zona 5','Manzana 2');
/*!40000 ALTER TABLE `lugar_estructura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_pago` int(11) DEFAULT NULL,
  `id_tramite` int(11) DEFAULT NULL,
  `cantidad_pago` decimal(6,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `id_tipo_pago` (`id_tipo_pago`),
  KEY `id_tramite` (`id_tramite`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipo_pago` (`id_tipo_pago`),
  CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_tramite`) REFERENCES `tramite` (`id_tramite`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,1,1,5000.75,'2020-12-31'),(2,2,2,3000.15,'2020-01-05'),(3,3,3,3000.15,'2020-12-31'),(4,1,4,3000.15,'2020-01-05'),(5,2,5,3500.25,'2020-12-31'),(6,3,6,3500.25,'2020-01-05'),(7,1,7,3500.25,'2020-05-29'),(8,2,8,3500.25,'2020-10-07'),(9,3,9,3000.15,'2020-05-29'),(10,1,10,4000.75,'2020-09-07'),(11,2,11,4500.15,'2020-05-06');
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_personal` int(11) DEFAULT NULL,
  `ci_personal` varchar(10) NOT NULL,
  `nombre_personal` varchar(100) NOT NULL,
  `apellido_personal` varchar(100) NOT NULL,
  `fecha_nacimiento_personal` date NOT NULL,
  `telefono1_personal` varchar(10) DEFAULT NULL,
  `telefono2_personal` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_personal`),
  KEY `id_tipo_personal` (`id_tipo_personal`),
  CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_tipo_personal`) REFERENCES `tipo_personal` (`id_tipo_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,1,'1305178051','Welinton','Guerrero','1998-12-22','0989194770','0989194770'),(2,1,'1315250025','Cristhoper','Alcivar','1998-12-22','0997480125','0997480125'),(3,1,'1301456874','Axel','Arteaga','2000-02-15','0987845163','0987845163'),(4,2,'1315484778','Benjie','Gonzalez','1998-05-30','0984578451','0984578451'),(5,2,'1305465454','Sergio','Lino','1995-01-01','0996558458','0996558458'),(6,2,'1347889941','Julexi','Marquez','1998-03-25','0993211456','0993211456'),(7,3,'1305458781','Isaac','Cedeño','1998-05-30','0987451657','0987451657'),(8,3,'1354445441','Joffre','Rodriguez','2000-12-02','0987451211','0987451211'),(9,3,'1396654712','Erick','Carreño','1998-05-30','0987455120','0987455120'),(10,4,'1315454781','Gustavo','Rodriguez','1998-05-30','0994551121','0975451121'),(11,4,'1305451451','Jose','Reyes','1999-12-10','0987451211','0987451211'),(12,4,'1306454411','Erick','Carreño','1998-05-30','0987455120','0987455120');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincia` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pro` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'Manabí'),(2,'Guayas');
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte_incidente`
--

DROP TABLE IF EXISTS `reporte_incidente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte_incidente` (
  `id_incidente` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_incidente` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `fecha_reporte_incidente` date NOT NULL,
  PRIMARY KEY (`id_incidente`),
  KEY `id_tipo_incidente` (`id_tipo_incidente`),
  KEY `id_personal` (`id_personal`),
  CONSTRAINT `reporte_incidente_ibfk_1` FOREIGN KEY (`id_tipo_incidente`) REFERENCES `tipo_incidente` (`id_tipo_incidente`),
  CONSTRAINT `reporte_incidente_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte_incidente`
--

LOCK TABLES `reporte_incidente` WRITE;
/*!40000 ALTER TABLE `reporte_incidente` DISABLE KEYS */;
INSERT INTO `reporte_incidente` VALUES (1,1,10,'2020-04-05'),(2,1,10,'2020-12-09'),(3,2,10,'2021-02-11'),(4,3,10,'2020-07-23'),(5,2,11,'2021-08-04'),(6,3,11,'2020-09-16'),(7,4,11,'2021-10-30'),(8,4,11,'2020-01-28'),(9,1,12,'2021-05-13'),(10,2,12,'2020-09-08'),(11,3,12,'2021-11-03'),(12,4,12,'2020-11-12');
/*!40000 ALTER TABLE `reporte_incidente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_estructura`
--

DROP TABLE IF EXISTS `tipo_estructura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_estructura` (
  `id_tipo_estructura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_estruc` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_estructura`
--

LOCK TABLES `tipo_estructura` WRITE;
/*!40000 ALTER TABLE `tipo_estructura` DISABLE KEYS */;
INSERT INTO `tipo_estructura` VALUES (1,'Edificaciones del Personal'),(2,'Panteon'),(3,'Tumba'),(4,'Nicho'),(5,'Columbario');
/*!40000 ALTER TABLE `tipo_estructura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_incidente`
--

DROP TABLE IF EXISTS `tipo_incidente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_incidente` (
  `id_tipo_incidente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_incidente` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_incidente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_incidente`
--

LOCK TABLES `tipo_incidente` WRITE;
/*!40000 ALTER TABLE `tipo_incidente` DISABLE KEYS */;
INSERT INTO `tipo_incidente` VALUES (1,'Robo de feretros'),(2,'Actos vandalicos'),(3,'Uso de sustancias psicoactivas'),(4,'Acto sexual');
/*!40000 ALTER TABLE `tipo_incidente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago`
--

DROP TABLE IF EXISTS `tipo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_pago` (
  `id_tipo_pago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_pago` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago`
--

LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
INSERT INTO `tipo_pago` VALUES (1,'Debito bancario'),(2,'Pago con efectivo en ventanilla'),(3,'Pago con tarjeta de credito en ventanilla');
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_personal`
--

DROP TABLE IF EXISTS `tipo_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_personal` (
  `id_tipo_personal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_personal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_personal`
--

LOCK TABLES `tipo_personal` WRITE;
/*!40000 ALTER TABLE `tipo_personal` DISABLE KEYS */;
INSERT INTO `tipo_personal` VALUES (1,'Administrador'),(2,'Sepulturero'),(3,'Encargado de limpieza'),(4,'Guardia de seguridad');
/*!40000 ALTER TABLE `tipo_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_tramite`
--

DROP TABLE IF EXISTS `tipo_tramite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_tramite` (
  `id_tipo_tramite` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_tramite` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_tramite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_tramite`
--

LOCK TABLES `tipo_tramite` WRITE;
/*!40000 ALTER TABLE `tipo_tramite` DISABLE KEYS */;
INSERT INTO `tipo_tramite` VALUES (1,'Inhumación'),(2,'Exhumación');
/*!40000 ALTER TABLE `tipo_tramite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tramite`
--

DROP TABLE IF EXISTS `tramite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tramite` (
  `id_tramite` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_tramite` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_difunto` int(11) DEFAULT NULL,
  `id_estructura` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `fecha_tramite` date NOT NULL,
  `fecha_cumpli_tramite` date NOT NULL,
  `mensaje_tramite` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tramite`),
  KEY `id_tipo_tramite` (`id_tipo_tramite`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_difunto` (`id_difunto`),
  KEY `id_personal` (`id_personal`),
  KEY `id_estructura` (`id_estructura`),
  CONSTRAINT `tramite_ibfk_1` FOREIGN KEY (`id_tipo_tramite`) REFERENCES `tipo_tramite` (`id_tipo_tramite`),
  CONSTRAINT `tramite_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_clien`),
  CONSTRAINT `tramite_ibfk_3` FOREIGN KEY (`id_difunto`) REFERENCES `difunto` (`id_difunto`),
  CONSTRAINT `tramite_ibfk_4` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  CONSTRAINT `tramite_ibfk_5` FOREIGN KEY (`id_estructura`) REFERENCES `estructura` (`id_estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramite`
--

LOCK TABLES `tramite` WRITE;
/*!40000 ALTER TABLE `tramite` DISABLE KEYS */;
INSERT INTO `tramite` VALUES (1,1,1,1,4,4,'2020-12-31','2021-01-03','El trámite se realizará en la fecha y por el personal estipulado.'),(2,1,2,2,6,4,'2020-01-05','2020-01-08','El trámite se realizará en la fecha y por el personal estipulado.'),(3,1,3,3,7,4,'2020-12-31','2021-01-03','El trámite se realizará en la fecha y por el personal estipulado.'),(4,1,4,4,8,4,'2020-01-05','2020-01-08','El trámite se realizará en la fecha y por el personal estipulado.'),(5,2,5,5,9,5,'2020-12-31','2021-01-03','El trámite se realizará en la fecha y por el personal estipulado.'),(6,2,6,6,10,5,'2020-01-05','2020-01-08','El trámite se realizará en la fecha y por el personal estipulado.'),(7,1,7,7,11,5,'2020-05-29','2020-06-02','El trámite se realizará en la fecha y por el personal estipulado.'),(8,2,8,8,12,5,'2020-10-07','2020-10-10','El trámite se realizará en la fecha y por el personal estipulado.'),(9,1,9,9,13,6,'2020-05-29','2020-06-02','El trámite se realizará en la fecha y por el personal estipulado.'),(10,1,10,10,14,6,'2020-09-07','2020-09-10','El trámite se realizará en la fecha y por el personal estipulado.'),(11,2,11,11,16,6,'2020-05-06','2020-05-09','El trámite se realizará en la fecha y por el personal estipulado.');
/*!40000 ALTER TABLE `tramite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `id_ubi` int(11) NOT NULL AUTO_INCREMENT,
  `id_canton` int(11) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ubi`),
  KEY `id_canton` (`id_canton`),
  KEY `id_provincia` (`id_provincia`),
  CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`id_canton`) REFERENCES `canton` (`id_can`),
  CONSTRAINT `ubicacion_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,2),(5,5,2),(6,6,2),(7,7,2);
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-27 12:59:49
