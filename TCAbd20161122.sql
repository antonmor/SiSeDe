-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: TCAbd
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `AnexoPDF`
--

DROP TABLE IF EXISTS `AnexoPDF`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AnexoPDF` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla',
  `Folio` varchar(45) NOT NULL,
  `id_Tipo` int(11) NOT NULL COMMENT 'Tipo de anexo guardado',
  `id_Expediente` int(11) NOT NULL COMMENT 'Expediente',
  `FechaUp` datetime NOT NULL COMMENT 'Fecha de subida',
  `PathAnexo` varchar(50) NOT NULL COMMENT 'Directorio electrónico del documento',
  `NomFile` varchar(45) NOT NULL COMMENT 'Nombre del documento asignado por el usuario',
  `NomFileSis` varchar(45) DEFAULT NULL COMMENT 'Nombre del documento otorgado por el sistema',
  `Status` int(11) NOT NULL COMMENT 'borrado lógico',
  `StatusCrea` int(11) NOT NULL COMMENT 'Creado el documento a través del sistema\n0: Se subió directamente el oficio\n1: Se redacto una promoción',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AnexoPDF`
--

LOCK TABLES `AnexoPDF` WRITE;
/*!40000 ALTER TABLE `AnexoPDF` DISABLE KEYS */;
INSERT INTO `AnexoPDF` VALUES (6,'0001',3,12,'2016-11-21 02:02:00','./Historico/0001','1479570056.pdf','null',0,0),(7,'0002',3,13,'2016-11-21 02:03:00','./Historico/0002','1479570056.pdf','null',0,0),(8,'0003',3,14,'0000-00-00 00:00:00','./Historico/0003','1479570056.pdf','null',0,0);
/*!40000 ALTER TABLE `AnexoPDF` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Domicilio`
--

DROP TABLE IF EXISTS `Domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Domicilio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Persona` int(11) DEFAULT NULL,
  `Domicilio` varchar(50) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Cp` varchar(10) DEFAULT NULL,
  `Referencia` varchar(50) DEFAULT NULL,
  `Oir` int(11) DEFAULT NULL COMMENT 'oír:\n0: Domicilio no apto para notificar\n1: Domicilio permitido para notificar',
  `NInterior` varchar(10) DEFAULT NULL,
  `NExterior` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: desahabilitado\n1: activo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Domicilio_Persona1_idx` (`id_Persona`),
  CONSTRAINT `fk_Domicilio_Persona1` FOREIGN KEY (`id_Persona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Domicilio`
--

LOCK TABLES `Domicilio` WRITE;
/*!40000 ALTER TABLE `Domicilio` DISABLE KEYS */;
INSERT INTO `Domicilio` VALUES (1,1,'Benito Juarez # 130, El Trapiche, Colima',NULL,'CUAUHTEMOC','COLIMA','28550',NULL,0,NULL,NULL,1),(2,11,'TORRES QUINTERO','CENTRO','COLIMA','COLIMA',NULL,NULL,1,NULL,'85',1),(3,13,'TAMAULIPAS','SANTA AMALIA','COLIMA','COLIMA','28048',NULL,1,NULL,'301',1);
/*!40000 ALTER TABLE `Domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Expediente`
--

DROP TABLE IF EXISTS `Expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Expediente` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla',
  `id_Persona` int(11) NOT NULL COMMENT 'Persona que crea el expediente\nusuario interno {Oficial de Partes}\nusuario externo ',
  `id_Ppresenta` int(11) NOT NULL COMMENT 'Persona representante legal que presenta la demanda.',
  `id_PDemandante` int(11) NOT NULL COMMENT 'Persona que se le considera como Demandante',
  `id_PDemandado` int(11) NOT NULL COMMENT 'Persona Institución pública que recibe demanda',
  `Fecha` datetime NOT NULL COMMENT 'Fecha en que ingresa demanda, promoción, documentos.',
  `Expediente` varchar(45) NOT NULL COMMENT 'Numero de Expediente',
  `Descripcion` longtext NOT NULL COMMENT 'Breve descripción/resumen(250 palabras) del expediente.',
  `Status` int(11) NOT NULL COMMENT 'Indica si permanece activo el expediente (borrado lógico)',
  PRIMARY KEY (`Id`),
  KEY `fk_Expediente_Persona1_idx` (`id_Persona`),
  KEY `fk_Expediente_Persona2_idx` (`id_Ppresenta`),
  CONSTRAINT `fk_Expediente_Persona1` FOREIGN KEY (`id_Persona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Expediente_Persona2` FOREIGN KEY (`id_Ppresenta`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Expediente`
--

LOCK TABLES `Expediente` WRITE;
/*!40000 ALTER TABLE `Expediente` DISABLE KEYS */;
INSERT INTO `Expediente` VALUES (12,1,1,12,13,'2016-11-21 02:02:00','0001','Demanda la base de antiguedad de mas de 2 ciclos',1),(13,1,1,12,13,'2016-11-21 02:03:00','0002','Iniciando propuesta',1),(14,1,1,12,13,'0000-00-00 00:00:00','0003','Describe la relacion de la demanda ...',1);
/*!40000 ALTER TABLE `Expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Notificacion`
--

DROP TABLE IF EXISTS `Notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Notificacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'control de tabla',
  `id_PActuario` int(11) NOT NULL COMMENT 'Persona <Actuario> que notifica a las partes interesadas',
  `id_Expediente` int(11) NOT NULL COMMENT 'Expediente',
  `id_PDestinatario` int(11) NOT NULL COMMENT 'Persona a quien se le notifica.',
  `FechaEnvio` datetime NOT NULL COMMENT 'Fecha en que se envía',
  `AnexoPDF_id` int(11) NOT NULL COMMENT 'Folio del documento a notificar.',
  `Status` int(11) NOT NULL COMMENT 'borrado lógico',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_Notifica_Persona1_idx` (`id_PActuario`),
  KEY `fk_Notifica_Expediente1_idx` (`id_Expediente`),
  KEY `fk_Notifica_Persona2_idx` (`id_PDestinatario`),
  KEY `fk_Notifica_AnexoPDF1_idx` (`AnexoPDF_id`),
  CONSTRAINT `fk_Notifica_AnexoPDF1` FOREIGN KEY (`AnexoPDF_id`) REFERENCES `AnexoPDF` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notifica_Expediente1` FOREIGN KEY (`id_Expediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notifica_Persona1` FOREIGN KEY (`id_PActuario`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notifica_Persona2` FOREIGN KEY (`id_PDestinatario`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notificacion`
--

LOCK TABLES `Notificacion` WRITE;
/*!40000 ALTER TABLE `Notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Persona`
--

DROP TABLE IF EXISTS `Persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RazonSocial` varchar(100) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apat` varchar(45) DEFAULT NULL,
  `Amat` varchar(45) DEFAULT NULL,
  `Tel` varchar(45) DEFAULT NULL,
  `Cel` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `CURP` varchar(45) DEFAULT NULL,
  `TipodePersona` varchar(45) DEFAULT NULL,
  `IDoficial` varchar(45) DEFAULT NULL,
  `NumeroIDOficial` varchar(45) DEFAULT NULL,
  `Cuentaelectronica` varchar(45) DEFAULT NULL,
  `Usuario` varchar(10) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Persona`
--

LOCK TABLES `Persona` WRITE;
/*!40000 ALTER TABLE `Persona` DISABLE KEYS */;
INSERT INTO `Persona` VALUES (1,NULL,'Antonio','Moreno','Jáuregui','3150021','3121316325','ingantonmor@gmail.com','MOJA841127HCMRRN02','FISICA','','123456879',NULL,'ingantonmo','moreno84'),(2,NULL,'CESAR IVAN','MORAN','BONALES',NULL,'3121319564','ivano_100@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'ivano_100@','test'),(3,NULL,'JORGE RICARDO','ANGUIANO','BARBOSA',NULL,'3121336920','rich_73@live.com.mx',NULL,'FISICA',NULL,NULL,NULL,'rich_73@li','test'),(4,NULL,'ERICKA','PEÑA','LLERENAS',NULL,'3121324044','zueri18@yahoo.com.mx',NULL,'FISICA',NULL,NULL,NULL,'zueri18@ya','test'),(5,NULL,'LIZETH YEMELI','MARTINEZ','GARCIA',NULL,'3121046253','lizyemely@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'lizyemely@','test'),(6,NULL,'ADRIANA VANESSA','PEREZ','MESTAS',NULL,'3121037327','l.vanneh.mestas@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'l.vanneh.m','test'),(7,NULL,'ANGEL FERNANDO','PRADO','LOPEZ',NULL,'3121095386','angelnet111@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'angelnet11','test'),(8,NULL,'HECTOR ULISES','PULIDO','CHAVEZ',NULL,'3123399877','heulipch@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'heulipch@h','test'),(9,NULL,'FERNANDO','TINTOS','HERRERA',NULL,'3121131796','fotsha@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'fotsha@hot','test'),(10,NULL,'RENE','RODRIGUEZ','ALCARAZ',NULL,'3129439949','rene_rdgza@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'rene_rdgza','test'),(11,'Director de Tránsito y Vialidad del H. Ayuntamiento Constitucional de Colima','JOSE','PEREZ','CANTU',NULL,NULL,NULL,NULL,'INSTITUCION',NULL,NULL,NULL,'transito','test'),(12,NULL,'JAVIER','MORENO','MENDOZA',NULL,NULL,'recartcolima@hotmail.com',NULL,'FISICA',NULL,NULL,NULL,'recart','test'),(13,'Dirección de Transporte de Gobierno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'INSTITUCION',NULL,NULL,NULL,'transporte','test');
/*!40000 ALTER TABLE `Persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Promocion`
--

DROP TABLE IF EXISTS `Promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Promocion` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'control de la tabla',
  `id_Expediente` int(11) NOT NULL COMMENT 'id del expediente',
  `id_Pcrea` int(11) NOT NULL COMMENT 'Persona que crea redactando un documento, promoción, demanda, entre otros.',
  `id_Anexopdf` int(11) NOT NULL,
  `Fecha` datetime NOT NULL COMMENT 'Fecha y hora en que se inicia a redactar.',
  `Redaccion` longtext NOT NULL COMMENT 'Redacción de las promociones.',
  `Status` int(11) NOT NULL COMMENT 'Eliminación lógica.',
  `Status1` int(11) NOT NULL COMMENT 'Validado por magistrado',
  PRIMARY KEY (`id`,`id_Expediente`,`id_Pcrea`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Persona_has_Expediente_Expediente1_idx` (`id_Expediente`),
  KEY `fk_Redacta_Persona1_idx` (`id_Pcrea`),
  KEY `fk_Promocion_AnexoPDF1_idx` (`id_Anexopdf`),
  CONSTRAINT `fk_Persona_has_Expediente_Expediente1` FOREIGN KEY (`id_Expediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Promocion_AnexoPDF1` FOREIGN KEY (`id_Anexopdf`) REFERENCES `AnexoPDF` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Redacta_Persona1` FOREIGN KEY (`id_Pcrea`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Promocion`
--

LOCK TABLES `Promocion` WRITE;
/*!40000 ALTER TABLE `Promocion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rol`
--

DROP TABLE IF EXISTS `Rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rol` (
  `idRoles` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRoles`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rol`
--

LOCK TABLES `Rol` WRITE;
/*!40000 ALTER TABLE `Rol` DISABLE KEYS */;
INSERT INTO `Rol` VALUES (1,'Administrador'),(2,'Oficial de Partes'),(3,'Secretario de Acuerdos'),(4,'Proyectista'),(5,'Actuario'),(6,'Magistrado'),(7,'Usuario'),(8,'Institución');
/*!40000 ALTER TABLE `Rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RolesPeriodo`
--

DROP TABLE IF EXISTS `RolesPeriodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RolesPeriodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla',
  `idPersona` int(11) NOT NULL COMMENT 'Persona',
  `idRoles` int(11) NOT NULL COMMENT 'Relación con la tabla de roles',
  `Fecha` datetime NOT NULL COMMENT 'Periodo del tipo de rol',
  `Status` int(11) NOT NULL COMMENT '0: Inactivo\n1: Activo',
  PRIMARY KEY (`id`),
  KEY `fk_Personas_has_Roles_Personas_idx` (`idPersona`),
  KEY `fk_Personas_has_Roles_Roles1_idx` (`idRoles`),
  CONSTRAINT `fk_Personas_has_Roles_Personas` FOREIGN KEY (`idPersona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personas_has_Roles_Roles1` FOREIGN KEY (`idRoles`) REFERENCES `Rol` (`idRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RolesPeriodo`
--

LOCK TABLES `RolesPeriodo` WRITE;
/*!40000 ALTER TABLE `RolesPeriodo` DISABLE KEYS */;
INSERT INTO `RolesPeriodo` VALUES (1,1,1,'2016-07-21 00:00:00',1),(2,1,2,'0000-00-00 00:00:00',0),(4,2,2,'2016-08-05 00:00:00',1),(5,3,3,'2016-08-05 00:00:00',1),(6,4,3,'2016-08-05 00:00:00',1),(7,5,5,'2016-08-05 00:00:00',1),(8,6,5,'2016-08-05 00:00:00',1),(9,7,4,'2016-08-05 00:00:00',1),(10,8,4,'2016-08-05 00:00:00',1),(11,9,1,'2016-08-05 00:00:00',1),(12,10,6,'2016-08-05 00:00:00',1),(13,11,8,'2016-08-05 00:00:00',1),(14,12,7,'2016-08-05 00:00:00',1),(15,13,8,'2016-08-05 00:00:00',1);
/*!40000 ALTER TABLE `RolesPeriodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Seguimiento`
--

DROP TABLE IF EXISTS `Seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Seguimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla',
  `id_Expediente` int(11) NOT NULL COMMENT 'Expediente creado',
  `Status` int(11) NOT NULL COMMENT 'Status\n0.- Ingresado, en espera…\n1.- Validando por Secretario de Acuerdo\n2.- Solicitud de promoción faltante.\n3.- Solicitud de Alegatos.\n4.- Enviado a Proyectista.\n5.- En elaboración de proyecto.\n6.- Proyecto elaborado, en espera de sentencia.\n7.- Sentencia.',
  `Fecha` datetime NOT NULL COMMENT 'Fecha y hora del seguimiento.',
  `Status1` int(11) NOT NULL COMMENT 'Borrado lógico.',
  `id_AnexoPDF` int(11) NOT NULL COMMENT 'Folio del documento agregado al expediente <secuencia del tramite>',
  `FechaVisto` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idSeguimiento_UNIQUE` (`id`),
  KEY `fk_Seguimiento_Expediente1_idx` (`id_Expediente`),
  KEY `fk_Seguimiento_AnexoPDF1_idx` (`id_AnexoPDF`),
  CONSTRAINT `fk_Seguimiento_AnexoPDF1` FOREIGN KEY (`id_AnexoPDF`) REFERENCES `AnexoPDF` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Seguimiento_Expediente1` FOREIGN KEY (`id_Expediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Seguimiento`
--

LOCK TABLES `Seguimiento` WRITE;
/*!40000 ALTER TABLE `Seguimiento` DISABLE KEYS */;
INSERT INTO `Seguimiento` VALUES (2,12,0,'2016-11-21 02:02:00',0,6,'0000-00-00 00:00:00'),(3,13,0,'2016-11-21 02:03:00',0,7,'0000-00-00 00:00:00'),(4,14,0,'0000-00-00 00:00:00',0,8,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo`
--

DROP TABLE IF EXISTS `Tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo` (
  `IdTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipo`),
  UNIQUE KEY `idPromo_UNIQUE` (`IdTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo`
--

LOCK TABLES `Tipo` WRITE;
/*!40000 ALTER TABLE `Tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `data` blob NOT NULL,
  `Persona_id` int(11) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ci_sessions_Persona1_idx` (`Persona_id`),
  CONSTRAINT `fk_ci_sessions_Persona1` FOREIGN KEY (`Persona_id`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('040e586a80e2c0d246796704664c21fd9952d80d','::1',1479849610,'__ci_last_regenerate|i:1479849604;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('0b69f0da1c08553d1687f98828095b7b4e61ac4f','::1',1479853478,'__ci_last_regenerate|i:1479853478;',NULL,NULL),('10adca26004daee06d373e1e7061b8882a17ba1f','::1',1479851879,'__ci_last_regenerate|i:1479851879;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('11717bff43bd024d7520e877155e126e3ef962c7','::1',1479854602,'__ci_last_regenerate|i:1479854601;',NULL,NULL),('38246d4f7d5fcba8e08bd52f1cc4528daef6edc0','::1',1479856157,'__ci_last_regenerate|i:1479856157;',NULL,NULL),('66cc4917527b9dc15ed0334c618dc69529fba78c','::1',1479849406,'__ci_last_regenerate|i:1479849399;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('6a9265e9a9d12f8f388067873408903385e8eb01','::1',1479860549,'__ci_last_regenerate|i:1479860549;',NULL,NULL),('6ce69f47a9e8a355ac5ff628926c45e87bf8d697','::1',1479857027,'__ci_last_regenerate|i:1479857027;',NULL,NULL),('71c84ddc2b7934ca8051ac8e659af6b10f3708dc','::1',1479857962,'__ci_last_regenerate|i:1479857955;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('72820c3ba1b6f1283caa90b1b1427403aa656324','::1',1479856717,'__ci_last_regenerate|i:1479856717;',NULL,NULL),('7284ff9af15c90d2ffe2a978a6ecf982b6ab2228','::1',1479850744,'__ci_last_regenerate|i:1479850744;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('8bae9d3524a1b14c983b8d244dccd89f25f12880','::1',1479855303,'__ci_last_regenerate|i:1479855303;',NULL,NULL),('9f101d518883a42ac261b88c8d0e61e6db0c4410','::1',1479853963,'__ci_last_regenerate|i:1479853963;',NULL,NULL),('ac46206c7750ff9cfb15e46a20270a05d79a61d4','::1',1479853156,'__ci_last_regenerate|i:1479853156;',NULL,NULL),('b9d111fea8e5f7110e427be8d1b4c1bb83e67339','::1',1479852718,'__ci_last_regenerate|i:1479852718;',NULL,NULL),('c89e0ecac35393dcdfa4c4a06f691ae6fabd34d9','::1',1479850446,'__ci_last_regenerate|i:1479850403;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('daff130f6c99c55af67fd28cc644e0cf5d44960c','::1',1479851548,'__ci_last_regenerate|i:1479851548;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL),('ea380dd7c12178106db9ec5e542c614d65b004a2','::1',1479849821,'__ci_last_regenerate|i:1479849821;Persona_id|s:1:\"1\";Nombre|s:7:\"Antonio\";Apat|s:6:\"Moreno\";Amat|s:9:\"Jáuregui\";email|s:21:\"ingantonmor@gmail.com\";Cel|s:10:\"3121316325\";Rol|s:13:\"Administrador\";Persona|s:6:\"FISICA\";',NULL,NULL);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'TCAbd'
--

--
-- Dumping routines for database 'TCAbd'
--
/*!50003 DROP PROCEDURE IF EXISTS `Expediente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Expediente`()
BEGIN

select * from Expediente e join AnexoPDF a on e.id = a.id_Expediente
join Persona pr on pr.id = e.id_Ppresenta
join Persona pd on pd.id = e.id_PDemandante
join Persona pdo on pdo.id= e.id_PDemandado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PersonaDom` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PersonaDom`(
in tipo varchar(50),
in nombre varchar(45),
in apat varchar(45),
in amat varchar(45),
in rsocial varchar(45),
in genero varchar(45),
in identificacion varchar(45),
in referencia varchar(45),
in tf varchar(45),
in movil varchar(45),
in email varchar(45),
in cemail varchar(45),
in Estado varchar(45),
in Municipio varchar(45),
in Dom varchar(45),
in interior varchar(45),
in exterior varchar(45),
in cp varchar(45),
in Estado1 varchar(45),
in Municipio1 varchar(45),
in Dom1 varchar(45),
in interior1 varchar(45),
in exterior1 varchar(45),
in cp1 varchar(45),
in refe varchar(45),
in user varchar(45),
in pass varchar(45),
in curp varchar(45)

)
BEGIN
    DECLARE _id_persona INT DEFAULT 0;
    DECLARE _id_domicilio INT DEFAULT 0;
   

insert into Persona
	  (`RazonSocial`,`Nombre`,`Apat`,`Amat`,`Tel`,`Cel`,`Email`,`CURP`,`Tipo de Persona`,`IDoficial`,`NumeroIDOficial`,`Usuario`,`Password`)
values(rsocial,nombre,apat,amat,tf,movil,email,curp,tipo,identificacion,referencia,user,pass);

SET _id_persona = last_insert_id();    

insert into Domicilio(`id_Persona`,	`Domicilio`,	`Municipio`,	`Estado`,	`Cp`,	`Referencia`,	`Oir`,	`NInterior`,	`NExterior`,	`status`) 
values(_id_persona,	Dom,Municipio,Estado,cp,'NULL','0',interior,exterior,'1');  

insert into Domicilio(`id_Persona`,	`Domicilio`,	`Municipio`,	`Estado`,	`Cp`,	`Referencia`,	`Oir`,	`NInterior`,	`NExterior`,	`status`) 
values(_id_persona,	Dom1,Municipio1,Estado1,cp1,refe,'1',interior1,exterior1,'1');

insert into RolesPeriodo(`idPersona`,	`idRoles`,	`Fecha`,	`Status`)
values(_id_persona,'7',now(),'1');

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-22 18:48:00
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: usuario
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('4fd4e9bd71030eab647de3aab13bd538bea1e541','::1','',1472851215,'__ci_last_regenerate|i:1472851215;'),('dbb9500abb86c7e2ca7a3e58c0bc938ae3998cf3','::1','',1472850306,'__ci_last_regenerate|i:1472850306;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `edad` int(4) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'anton','moreno','Antonio Moreno Jáuregui',31,1,'21.png'),(2,'xime','moreno','Ximena',4,1,'10.png'),(3,'dan','moreno','Daniel Antonio',3,1,'10.png'),(4,'mayra','moreno','Mayra Selene',32,0,'10.png'),(5,'toby','moreno','Tobias',8,0,'10.png'),(7,'Antonio Mo','12','anton12',1234,0,'10.png'),(8,'Juan','1234','jj',21,0,'10.png'),(9,'localhost','12345','juan',12,0,'10.png'),(10,'Juan Pedro','1209','Pedro',90,0,'10.png'),(11,'antonio','1234','32MORENO',21,0,'10.png'),(12,'localhost','moreno','juer12',32,0,'10.png');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'usuario'
--

--
-- Dumping routines for database 'usuario'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-22 18:48:00
