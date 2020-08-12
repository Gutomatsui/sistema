-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: arquivos
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contato_externo`
--

DROP TABLE IF EXISTS `contato_externo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contato_externo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `assunto` varchar(50) NOT NULL,
  `cnpj_cpf` varchar(30) NOT NULL,
  `nome_contato` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `messagem` longtext NOT NULL,
  `fl_migrar` bit(1) NOT NULL,
  `newsletters` varchar(20) DEFAULT NULL,
  `tipo_empresa` varchar(50) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_externo`
--

LOCK TABLES `contato_externo` WRITE;
/*!40000 ALTER TABLE `contato_externo` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato_externo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diretorio_arquivos`
--

DROP TABLE IF EXISTS `diretorio_arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diretorio_arquivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pai` int DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `fl_diretorio` bit(1) NOT NULL,
  `nome_arquivo` varchar(200) DEFAULT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `id_usuario` int NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `id_empresa` int NOT NULL,
  `dt_bloqueio` date DEFAULT NULL,
  `fl_bloqueado` bit(1) NOT NULL,
  `caminho` varchar(500) DEFAULT NULL,
  `fl_privado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_diretorio_arquivos_user_idx` (`id_usuario`),
  KEY `tyrttrr_idx` (`id_pai`),
  CONSTRAINT `fk_diretorio_arquivos_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `fkfkfk` FOREIGN KEY (`id_pai`) REFERENCES `diretorio_arquivos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diretorio_arquivos`
--

LOCK TABLES `diretorio_arquivos` WRITE;
/*!40000 ALTER TABLE `diretorio_arquivos` DISABLE KEYS */;
INSERT INTO `diretorio_arquivos` VALUES (13,NULL,'copel.pdf',_binary '\0','copel.pdf',_binary '','2019-12-22 21:21:55',2,'copel 1',68,NULL,_binary '\0',NULL,_binary '\0'),(16,NULL,'3343',_binary '','3343',_binary '','2019-12-22 21:57:47',2,'343',68,NULL,_binary '\0','3343',_binary ''),(17,NULL,'ttt6',_binary '','ttt6',_binary '','2019-12-22 22:02:36',2,'tryeryte',68,NULL,_binary '\0','ttt6',_binary '\0'),(19,16,'44444444',_binary '','44444444',_binary '','2019-12-22 22:03:30',2,'4444',68,NULL,_binary '\0','3343 / 44444444',_binary '\0'),(20,16,'5555',_binary '','5555',_binary '','2019-12-22 22:03:34',2,'5555',68,NULL,_binary '\0','3343 / 5555',_binary '\0'),(21,17,'54333',_binary '','54333',_binary '','2019-12-22 22:03:43',2,'3222',68,NULL,_binary '\0','ttt6 / 54333',_binary '\0'),(22,19,'999',_binary '','999',_binary '','2019-12-22 22:03:56',2,'999',68,NULL,_binary '\0','3343 / 44444444 / 999',_binary '\0'),(23,22,'000',_binary '','000',_binary '','2019-12-22 22:04:00',2,'0000',68,NULL,_binary '\0','3343 / 44444444 / 999 / 000',_binary '\0'),(11007,NULL,'3343',_binary '','3343',_binary '','2019-12-22 21:57:47',2,'343',68,NULL,_binary '\0','3343',_binary ''),(11008,11007,'44444444',_binary '','44444444',_binary '','2019-12-22 22:03:30',2,'4444',68,NULL,_binary '\0','3343 / 44444444',_binary '\0'),(11009,11008,'999',_binary '','999',_binary '','2019-12-22 22:03:56',2,'999',68,NULL,_binary '\0','3343 / 44444444 / 999',_binary '\0'),(11010,11009,'000',_binary '','000',_binary '','2019-12-22 22:04:00',2,'0000',68,NULL,_binary '\0','3343 / 44444444 / 999 / 000',_binary '\0'),(11011,11007,'5555',_binary '','5555',_binary '','2019-12-22 22:03:34',2,'5555',68,NULL,_binary '\0','3343 / 5555',_binary '\0');
/*!40000 ALTER TABLE `diretorio_arquivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `razao_social` varchar(150) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `id_tipo_empresa` int NOT NULL,
  `id_tipo_porte_empresa` int NOT NULL,
  `id_tipo_regime` int NOT NULL,
  `id_tipo_tributacao` int NOT NULL,
  `id_tipo_cliente` int NOT NULL,
  `fone1` varchar(25) NOT NULL,
  `fone2` varchar(25) DEFAULT NULL,
  `contrato` varchar(200) DEFAULT NULL,
  `dt_contrato` datetime DEFAULT NULL,
  `dt_inicio_contrato` date DEFAULT NULL,
  `dt_fim_cotrato` date DEFAULT NULL,
  `dias_fim_contrato` int DEFAULT NULL,
  `fl_contrato_vencido` bit(1) DEFAULT b'0',
  `endereco` varchar(150) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_empresa_idx` (`id_tipo_empresa`),
  KEY `fk_tipo_porte_emrpesa_idx` (`id_tipo_porte_empresa`),
  KEY `fk_tipo_regime_empresa_idx` (`id_tipo_regime`),
  KEY `fk_tipo_tributacao_idx` (`id_tipo_tributacao`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'SSH Sistemas','SSH Sistemas','29.269.540/0001-57','2019-11-05 20:11:22',_binary '','','jean@sshsitemas.com.br',1,1,1,2,1,'(41)9729-8876',NULL,'ipad-820272_1920.jpg','2019-12-01 19:11:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,'Empresa de teste','Empresa de teste RZ','56.641.780/0001-03','2019-11-16 22:42:49',_binary '','','jean@sshsistemas.com.br',1,1,1,2,1,'(41)9999-9999','','WhatsApp Image 2019-11-30 at 1.49.35 PM.jpeg','2019-12-01 18:59:59',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,'teste 2','teste 3','21.977.963/0001-10','2019-11-16 23:58:51',_binary '','','jeanbieda@gmail.com',4,1,1,3,1,'(12)1212-1212','','working-791175_640.jpg','2019-12-01 19:11:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,'undefined','undefined','undefined','2019-12-01 03:37:57',_binary '','','undefined',0,0,0,0,0,'undefined','undefined','working-791175_640.jpg','2019-12-01 19:11:03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,'1111','undefined','undefined','2019-12-01 03:46:14',_binary '','','undefined',0,0,0,0,0,'undefined','undefined','ipad-820272_1920 (1).jpg','2019-12-02 18:26:11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(67,'aaaaaaaaaaaaaaaaaaaaa','SSH Sistemas','56.842.260/0001-69','2019-12-01 03:58:16',_binary '','','jeanbieda@gmail.com',1,1,2,2,1,'(33)3333-3333','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,'22222222222','33333333333','277.380.060-00','2020-01-11 22:56:58',_binary '','','jeanbied1a@gmail.com',4,1,3,2,2,'(11)1111-1111','','template-orcamento.docx','2019-12-22 22:46:44','2019-12-01','2019-12-27',NULL,NULL,'7','8','10','11','12','82110-444','9'),(69,'03.493.563/0001-57','03.493.563/0001-57','03.493.563/0001-57','2019-12-31 16:30:38',_binary '','','jeanteste@gmail.com',1,1,1,2,1,'(41)9972-9887','','xampp-control.log','2019-12-31 16:31:32','2020-01-01','2020-12-31',5,_binary '',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_certificado`
--

DROP TABLE IF EXISTS `empresa_certificado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa_certificado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `certificado` varchar(200) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_validade` date NOT NULL,
  `fl_vencido` bit(1) NOT NULL,
  `dias_vencimento` int NOT NULL,
  `id_empresa` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_certificado_empresa_idx` (`id_empresa`),
  CONSTRAINT `fk_certificado_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_certificado`
--

LOCK TABLES `empresa_certificado` WRITE;
/*!40000 ALTER TABLE `empresa_certificado` DISABLE KEYS */;
INSERT INTO `empresa_certificado` VALUES (14,'1','1','0000-00-00','2019-11-30',_binary '\0',2,63,2),(15,'2','2','0000-00-00','0000-00-00',_binary '\0',2,63,2),(17,'421','421','0000-00-00','0019-09-02',_binary '\0',87,63,2),(18,'11','111','2019-12-04','2019-12-04',_binary '\0',6,63,2),(20,'3','4','2019-12-05','2020-01-05',_binary '\0',5,68,2);
/*!40000 ALTER TABLE `empresa_certificado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pai` int DEFAULT NULL,
  `titulo` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `icone` varchar(45) DEFAULT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `fl_unico` bit(1) NOT NULL,
  `ordem` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item`
--

LOCK TABLES `menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item` DISABLE KEYS */;
INSERT INTO `menu_item` VALUES (1,NULL,'Home','home','gi gi-home',_binary '',_binary '',1),(2,NULL,'Empresa','','fa fa-institution',_binary '',_binary '\0',2),(3,2,'Listagem','empresa',' ',_binary '',_binary '\0',1),(4,2,'Novo','empresa/create',NULL,_binary '',_binary '\0',2),(5,NULL,'Usuario',' ','fa fa-user',_binary '',_binary '\0',3),(8,5,'Listagem','usuario',NULL,_binary '',_binary '\0',1),(9,5,'Novo','usuario/create',NULL,_binary '',_binary '\0',2),(10,NULL,'Diretório','','fa fa-folder-open',_binary '',_binary '\0',4),(11,10,'Documentos','diretorio',' ',_binary '',_binary '\0',1);
/*!40000 ALTER TABLE `menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_perfil`
--

DROP TABLE IF EXISTS `menu_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_perfil` int NOT NULL,
  `id_menu_item` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_perfil_idx` (`id_perfil`),
  KEY `fk_menu_item_idx` (`id_menu_item`),
  CONSTRAINT `fk_menu_item` FOREIGN KEY (`id_menu_item`) REFERENCES `menu_item` (`id`),
  CONSTRAINT `fk_menu_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_perfil`
--

LOCK TABLES `menu_perfil` WRITE;
/*!40000 ALTER TABLE `menu_perfil` DISABLE KEYS */;
INSERT INTO `menu_perfil` VALUES (12,2,1),(13,2,2),(14,2,3),(15,2,4),(20,2,10),(21,2,11);
/*!40000 ALTER TABLE `menu_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_interno` int DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (2,1,'Admin','Admin',_binary ''),(3,2,'Basico','Basico',_binary ''),(5,3,'Admin Cliente','Admin Cliente',_binary ''),(6,4,'Basico Cliente','Basico Cliente',_binary '');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_url` text,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabela_apoio_replica`
--

DROP TABLE IF EXISTS `tabela_apoio_replica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tabela_apoio_replica` (
  `id_antigo` int DEFAULT NULL,
  `id_novo` int DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `id_pai` int DEFAULT NULL,
  `id_pai_novo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabela_apoio_replica`
--

LOCK TABLES `tabela_apoio_replica` WRITE;
/*!40000 ALTER TABLE `tabela_apoio_replica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabela_apoio_replica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabela_simples`
--

DROP TABLE IF EXISTS `tabela_simples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tabela_simples` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ano` int NOT NULL,
  `id_empresa` int NOT NULL,
  `mes` int DEFAULT NULL,
  `receita` decimal(10,2) DEFAULT NULL,
  `despesa` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fl_status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabela_simples`
--

LOCK TABLES `tabela_simples` WRITE;
/*!40000 ALTER TABLE `tabela_simples` DISABLE KEYS */;
INSERT INTO `tabela_simples` VALUES (1,2020,1,1,1.00,2.00,3.00,_binary '\0'),(2,2020,1,2,3.00,4.00,0.00,_binary '\0'),(3,2020,1,3,0.00,0.00,0.00,_binary '\0'),(4,2020,1,4,0.00,0.00,0.00,_binary '\0'),(5,2020,1,5,0.00,0.00,0.00,_binary '\0'),(6,2020,1,6,0.00,0.00,0.00,_binary '\0'),(7,2020,1,7,0.00,0.00,0.00,_binary '\0'),(8,2020,1,8,0.00,0.00,0.00,_binary '\0'),(9,2020,1,9,0.00,0.00,0.00,_binary '\0'),(10,2020,1,10,0.00,0.00,0.00,_binary '\0'),(11,2020,1,11,0.00,0.00,0.00,_binary '\0'),(12,2020,1,12,6.00,7.00,13.00,_binary '\0');
/*!40000 ALTER TABLE `tabela_simples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` VALUES (1,'PJ'),(2,'PF'),(3,'CAEPF');
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_empresa`
--

DROP TABLE IF EXISTS `tipo_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_empresa`
--

LOCK TABLES `tipo_empresa` WRITE;
/*!40000 ALTER TABLE `tipo_empresa` DISABLE KEYS */;
INSERT INTO `tipo_empresa` VALUES (1,' Prestação de Serviço',_binary ''),(4,'Comercio',_binary ''),(5,'E-domestica',_binary ''),(7,'Profissional Liberal',_binary ''),(9,'Imposto de Renda',_binary ''),(10,'Imposto de Renda( Carne Leão)',_binary '');
/*!40000 ALTER TABLE `tipo_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_porte_empresa`
--

DROP TABLE IF EXISTS `tipo_porte_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_porte_empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_porte_empresa`
--

LOCK TABLES `tipo_porte_empresa` WRITE;
/*!40000 ALTER TABLE `tipo_porte_empresa` DISABLE KEYS */;
INSERT INTO `tipo_porte_empresa` VALUES (1,'ME',_binary ''),(2,'EPP',_binary ''),(3,'MEI',_binary ''),(5,'Liberal',_binary ''),(6,'Outros',_binary '');
/*!40000 ALTER TABLE `tipo_porte_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_regime_apuracao`
--

DROP TABLE IF EXISTS `tipo_regime_apuracao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_regime_apuracao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_regime_apuracao`
--

LOCK TABLES `tipo_regime_apuracao` WRITE;
/*!40000 ALTER TABLE `tipo_regime_apuracao` DISABLE KEYS */;
INSERT INTO `tipo_regime_apuracao` VALUES (1,'Competência',_binary ''),(2,'Caixa',_binary ''),(3,'Outros',_binary '');
/*!40000 ALTER TABLE `tipo_regime_apuracao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_tributacao`
--

DROP TABLE IF EXISTS `tipo_tributacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_tributacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_tributacao`
--

LOCK TABLES `tipo_tributacao` WRITE;
/*!40000 ALTER TABLE `tipo_tributacao` DISABLE KEYS */;
INSERT INTO `tipo_tributacao` VALUES (2,' Lucro Real',_binary ''),(3,'Presumido',_binary ''),(4,'Simples Nacional',_binary ''),(5,'CAEPF',_binary ''),(6,'Outros',_binary '');
/*!40000 ALTER TABLE `tipo_tributacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `id_empresa` int NOT NULL,
  `id_perfil` int NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_perfil_idx` (`id_perfil`),
  KEY `fk_usuario_empresa_idx` (`id_empresa`),
  CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Jean','Bieda','jeanbieda@gmail.com','2019-08-10 00:59:46',_binary '',1,2,'123456'),(18,'JEAN FILIPE BIEDA 1','','jean@sshsistemas.com.br','2019-11-27 03:45:54',_binary '',63,5,'123456');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'arquivos'
--

--
-- Dumping routines for database 'arquivos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-13 21:53:59
