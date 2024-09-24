-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: webtech_db
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `cache`
--
CREATE SCHEMA IF NOT EXISTS `ioasyste_project` DEFAULT CHARACTER SET utf8 ;
USE `ioasyste_project` ;

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(50) DEFAULT NULL,
  `cat_cod` char(3) DEFAULT NULL,
  `cat_estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Camaras y Accesorios','CAM',_binary ''),(2,'Auriculares','AUR',_binary ''),(3,'Cables Audio, Fichas y Adaptadores','CAA',_binary ''),(4,'Cables Computacion','CAC',_binary ''),(5,'Controles Remotos','COR',_binary ''),(6,'Computacion: Coolers y Disipadores','CCD',_binary ''),(7,'Case Disco Duro','CDD',_binary ''),(8,'Computacion: Gabinetes','CGA',_binary ''),(9,'Pendrives, Memorias y Accesorios','PMA',_binary ''),(10,'Computacion: Memoria RAM','CMR',_binary ''),(11,'Computacion: Microprocesadores','CMP',_binary ''),(12,'Computacion: Monitores, Soportes','CMS',_binary ''),(13,'Otros','OTR',_binary ''),(14,'Tablets','TAB',_binary ''),(15,'Accesorios de Tablets','ACT',_binary ''),(16,'Computacion: Teclados & Mouses','CTM',_binary ''),(17,'Fuentes, Estabilizadores, UPSs','FEU',_binary ''),(18,'Audio y Video varios','AVV',_binary ''),(19,'Iluminación','ILU',_binary ''),(20,'Telefonia Fija & Accesorios','TCA',_binary ''),(21,'Computadoras','COM',_binary ''),(22,'Teléfonos Móviles','TMO',_binary ''),(23,'Audio','AUD',_binary ''),(24,'Almacenamiento','ALM',_binary ''),(25,'Drones','DRO',_binary ''),(26,'Wearables','WEA',_binary ''),(27,'Redes','RED',_binary ''),(28,'Periféricos','PER',_binary ''),(29,'Componentes','COP',_binary ''),(30,'Realidad Virtual','REV',_binary ''),(31,'Consolas','CON',_binary ''),(32,'Testxxxxx','tet',_binary '\0'),(33,'Testxxxxx','tet',_binary '\0'),(34,'Test2','tes',_binary ''),(35,'rtes','cat',_binary ''),(36,'ca','cat',_binary ''),(37,'Test2','sa',_binary '');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_08_24_222541_create_personal_access_tokens_table',1),(5,'2024_08_25_194016_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'edit articles','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(2,'delete articles','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(3,'publish articles','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(4,'unpublish articles','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(5,'listar_producto','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(6,'editar_producto','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(7,'listar_categoria','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(8,'editar_categoria','api','2024-08-29 20:40:39','2024-08-29 20:40:39');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_pro` int NOT NULL AUTO_INCREMENT,
  `pro_nombre_producto` varchar(100) DEFAULT NULL,
  `pro_cantidad` int DEFAULT NULL,
  `pro_precio` decimal(10,2) DEFAULT NULL,
  `pro_costo_unitario` decimal(10,2) DEFAULT NULL,
  `pro_destino` varchar(5) DEFAULT NULL,
  `pro_estado` bit(1) DEFAULT NULL,
  `id_sbc` int DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `id_sbc` (`id_sbc`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_sbc`) REFERENCES `sub_categorias` (`id_sbc`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Tripode Noganet NGT-045 Para Camaras',171,200.00,190.00,NULL,_binary '',2),(2,'Tripode Noganet NGT-121 Para Camaras',168,300.00,294.00,NULL,_binary '',2),(3,'Auricular Vincha Con Microfono Genius HS-200C',117,160.00,153.60,NULL,_binary '',3),(4,'Auricular Nuca Con Microfono Genius HS-300N',52,160.00,150.40,NULL,_binary '',3),(5,'Auricular Con Microfono Genius HS-04SU ',131,260.00,244.40,NULL,_binary '',3),(6,'Auricular Con Microfono Genius HS-04S',111,185.00,177.60,NULL,_binary '',3),(7,'Auricular Overtech Mod. Solo 50',136,149.00,140.06,NULL,_binary '',3),(8,'Auricular Con Microfono para PC Netmak NN747',23,200.00,196.00,NULL,_binary '',3),(9,'Auricular Con Manos Libres Netmak NM-970',181,90.00,87.30,NULL,_binary '',3),(10,'Auricular Tipo Cierre Con manos Libres Kelyx',89,85.00,80.75,NULL,_binary '',3),(11,'Auricular Bluetooth Mod R505',39,280.00,266.00,NULL,_binary '',3),(12,'Auricular Bluetooth Mod R550',118,300.00,288.00,NULL,_binary '',3),(13,'Auricular Noganet NG-613',167,100.00,97.00,NULL,_binary '',3),(14,'Auricular Vincha y Manos Libres Genius HS-M430',19,215.00,208.55,NULL,_binary '',3),(15,'Cable Audio y Video - 2 RCA A 2 RCA x 1.5mts',61,40.00,38.80,NULL,_binary '',4),(16,'Cable Audio y Video - 3 RCA a 3 RCA x 1.5mts',95,40.00,38.80,NULL,_binary '',4),(17,'Cable Audio y Video - 3 RCA a 3 RCA x 3.0mts',104,60.00,58.20,NULL,_binary '',4),(18,'Ficha Adaptador Plug 3.5mm Stereo A 2 Jack Rca',133,25.00,24.00,NULL,_binary '',5),(19,'Ficha Adaptador HDMI Hembra a DVI Macho (18+1)',166,100.00,94.00,NULL,_binary '',5),(20,'Ficha Adaptador HDMI Hembra a DVI Macho (24+1)',20,100.00,96.00,NULL,_binary '',5),(21,'Ficha Adaptador HDMI Macho a DVI Hembra (24+1)',154,100.00,97.00,NULL,_binary '',5),(22,'Ficha Adaptador HDMI Macho a DVI Hembra (24+5)',133,100.00,98.00,NULL,_binary '',5),(23,'Ficha Plug 6.5mm Mono Plastico',149,10.00,9.40,NULL,_binary '',6),(24,'Ficha Plug 3.5mm Stereo Plástico',194,10.00,9.40,NULL,_binary '',6),(25,'Ficha Adaptador Jack 3.5mm A Plug 6.5mm Mono',116,20.00,19.00,NULL,_binary '',5),(26,'Ficha Adaptador Jack 3.5 A Plug 6.5mm Stereo',70,20.00,19.60,NULL,_binary '',5),(27,'Ficha Adaptador Jack 3.5 A Plug 2.5mm Stereo',125,20.00,18.80,NULL,_binary '',5),(28,'Ficha Adaptador Plug 3,5mm A 2 Jack 3.5mm Stereo',195,30.00,28.50,NULL,_binary '',5),(29,'Ficha Adaptador Jack 6.5 A Plug 3.5mm Stereo',183,20.00,19.20,NULL,_binary '',5),(30,'Ficha Adaptador Jack 6.5mm A Plug 3.5mm Mono',165,20.00,19.60,NULL,_binary '',5),(31,'Cable Adaptador USB 2.0 A SATA / IDE con fuente (ST-2023)',198,330.00,310.20,NULL,_binary '',7),(32,'Cable Adaptador USB 2,0 a SATA / IDE con fuente y luces de estado (WLX682)',131,330.00,320.10,NULL,_binary '',7),(33,'Cable Adaptador Power de Fuente de PC Molex a SATA',185,40.00,38.80,NULL,_binary '',7),(34,'Cable Adaptador USB 2.0 6 en 1 (extensión y usos varios)',150,215.00,206.40,NULL,_binary '',7),(35,'Cable Adaptador DB25 Hembra a Plug 3.5mm Stereo',194,30.00,29.10,NULL,_binary '',7),(36,'Cable Interlcok Tipo 8 Dos Patas Chatas (para Electrodomesticos en general)',82,40.00,39.20,NULL,_binary '',8),(37,'Cable para Impresora Paralelo Bidireccional DB25M a Cent.36M x 1.8mts',28,50.00,49.00,NULL,_binary '',9),(38,'Cable para Impresoras USB 2.0 (Tipo USB A a USB B)',124,45.00,42.75,NULL,_binary '',9),(39,'Cable para Impresoras USB 2.0 (Tipo USB A a USB B) Netmak NM-C03 1.8mts',97,45.00,42.30,NULL,_binary '',9),(40,'Cable Power Interlock CPU / Monitor 2 Patas Chastas 1 Pata Redonda ',196,40.00,39.20,NULL,_binary '',10),(41,'Cable Power Interlcok CPU / Monitor 3 Patas Chatas (economico)',61,45.00,43.20,NULL,_binary '',10),(42,'Cable Power Interlcok CPU / Monitor 3 Patas Chatas (mejor calidad)',38,70.00,65.80,NULL,_binary '',10),(43,'Cable Power Interlcok Trebol para cargadores de Notebook',102,70.00,66.50,NULL,_binary '',10),(44,'Cable Power Interno Para Monitor',24,35.00,33.95,NULL,_binary '',10),(45,'Cable SATA 0.35cm Color: Rojo (Datos PC / CPU) Discos Rigidos, Lectograbadoras',47,30.00,28.20,NULL,_binary '',11),(46,'Cable HDMI a HDMI Kelix 5 Mtrs Mod Sup-0809',47,180.00,174.60,NULL,_binary '',12),(47,'Cable HDMI a HDMI 1.5mts Mallado y Con Filtro',96,120.00,116.40,NULL,_binary '',12),(48,'Cable HDMI a Mini HDMI (con doble Nucleo) x 1mts',63,100.00,97.00,NULL,_binary '',12),(49,'Cable HDMI a Micro HDMI x 1,5mts',198,100.00,97.00,NULL,_binary '',12),(50,'Cable Adaptador USB a Paralelo Db25 Netmak NM-C35',115,150.00,142.50,NULL,_binary '',7),(51,'Cable Adaptador USB a Serie (DB9 - RS232) Netmak NM-C14',150,150.00,145.50,NULL,_binary '',7),(52,'Cable Splitter VGA (1 a 2 VGA)',131,95.00,89.30,NULL,_binary '',13),(53,'Cable Super VGA a Super VGA con Doble Nucleo 1.8mts',91,80.00,78.40,NULL,_binary '',14),(54,'Cable Super VGA a Super VGA con Doble Nucleo 3.0 Mts',40,100.00,97.00,NULL,_binary '',14),(55,'Cable Plano IDE de datos de 40 y 80 Hilos',157,20.00,18.80,NULL,_binary '',15),(56,'Cable Plano Floppy 34 Hilos P/disquetera 3.5',97,30.00,29.40,NULL,_binary '',15),(57,'Cable USB para Iphone Ipod Ipad y Compatibles',13,50.00,49.00,NULL,_binary '',16),(58,'Cable USB Prolongador (USB Macho a USB Hembra) x 1,8mts',34,45.00,42.30,NULL,_binary '',16),(59,'Cable USB Prolongador (USB Macho a USB Hembra) x 3 mts Netmak NM-C09 3',138,60.00,57.00,NULL,_binary '',16),(60,'Cable USB Macho a Micro USB Macho Plano Marca: Netmak x 1,8mts NM-C68',184,45.00,44.10,NULL,_binary '',16),(61,'Control Remoto Universal para Aire Acondicionado Marca GHUNGHOP Mod. K-1018E ',143,130.00,126.10,NULL,_binary '',17),(62,'Control Remoto para PC Overtech ',56,200.00,196.00,NULL,_binary '',17),(63,'Cooler Con Disipador Amd Am2 Am2+ Am3 Am3',39,75.00,73.50,NULL,_binary '',18),(64,'Cooler con Disipador 775 Intel Original ',101,100.00,94.00,NULL,_binary '',18),(65,'Cooler Netmak 8x8 Fuente Y Gabinete Pc',137,50.00,49.00,NULL,_binary '',18),(66,'Cooler 8x8 Transparente con luz',166,50.00,48.50,NULL,_binary '',18),(67,'Turbina Metalica 4 Pulg. 220v C/ruleman',31,265.00,251.75,NULL,_binary '',19),(68,'Turbina Metalica 4 Pulg. 220v + Soporte Pared',108,565.00,548.05,NULL,_binary '',19),(69,'Disco Rigido IDE 20GB',84,100.00,97.00,NULL,_binary '',20),(70,'Disco Rigido IDE 40GB WD Wester Digital Mod. WD400-00CPF0  [Tiene Windows 7 32bits Instalado]',147,100.00,94.00,NULL,_binary '',20),(71,'Disco Rigido IDE 40GB Hitachi Mod. HDS728040PLAT20  [Tiene Windows 7 32bits Instalado]',172,100.00,96.00,NULL,_binary '',20),(72,'Disco Rigido IDE 160GB Wester Digital WD1600BB',195,300.00,294.00,NULL,_binary '',20),(73,'Disco Rigido SATA WD 80GB',185,200.00,188.00,NULL,_binary '',20),(74,'Disco Rigido SATA 160GB para Notebook Netbook PS3 Marcas vs.',107,350.00,343.00,NULL,_binary '',20),(75,'Disco Rigido SATA 160GB Samsung HD161GJ (7200rpm Cache 8MB)',94,400.00,384.00,NULL,_binary '',20),(76,'Disco Rigido SATA 320GB Notebook HITACHI HTS545032B9A300 (5400rpm SATA 3,0Gb/s)',156,450.00,432.00,NULL,_binary '',20),(77,'Disco Rigido SATA 1TB WD (Wester Digital) 7200 64MB SATA 3',10,1180.00,1156.40,NULL,_binary '',20),(78,'Disco Rigido SATA 1TB Notebook SEAGATE BarraCuda 7200 SATA 3',21,1350.00,1269.00,NULL,_binary '',20),(79,'Disco Rigido SATA 500GB Notebook WD (Wester Digital) WD5000LPCX',27,1000.00,980.00,NULL,_binary '',20),(80,'Disco Rígido Externo 2.5 500GB USB 3.0 TOURO',89,1200.00,1176.00,NULL,_binary '',20),(81,'Disco Rigido Externo 2.5 1TB USB 3,0 SEAGATE',12,1400.00,1344.00,NULL,_binary '',20),(82,'External Case SATA 2.5 Para HDD (Discos Rigidos) de hasta 1 Tera Byte',45,200.00,196.00,NULL,_binary '',21),(83,'Lote 2 Disco Rigido HD IDE Funcionando',186,50.00,48.50,NULL,_binary '',20),(84,'Gabinete Kit con Fuente Lector Mem Kelyx 725-03 (Fuente Teclado Mouse Parlantes Lector de Memorias)',58,1000.00,960.00,NULL,_binary '',22),(85,'Gabinete SFX G713NE (con Fuente y KIT Teclado Mouse Parlantes)',74,850.00,833.00,NULL,_binary '',22),(86,'Gabinete SFX G713NE con Fuente (Sin Kit TMP)',58,650.00,630.50,NULL,_binary '',22),(87,'Gabinete SFX G713NE con Kit TMP (Sin Fuente)',71,600.00,582.00,NULL,_binary '',22),(88,'Gabinete SFX G713NE sin Kit TMP y sin Fuente (solo gabinete)',189,340.00,319.60,NULL,_binary '',22),(89,'Gabinete SFX G543 (con Fuente y KIT Teclado Mouse Parlantes)',198,750.00,727.50,NULL,_binary '',22),(90,'Gabinete SFX 543 con Fuente (Sin KIT TMP)',155,600.00,564.00,NULL,_binary '',22),(91,'Gabinete SFX 543 con Kit TMP (Sin Fuente)',191,500.00,485.00,NULL,_binary '',22),(92,'Gabinete SFX 543 sin Kit TMP y sin Fuente (solo gabinete)',19,280.00,268.80,NULL,_binary '',22),(93,'Gabinete CPU (sin fuente) Color Gris. Audio y USB Frontal 4 Bahias 5,25\" y 2 Bahias 3,5\"\"\"',26,150.00,145.50,NULL,_binary '',22),(94,'Gabinete CPU (sin fuente) Color Gris. USB Delantero, 4 Bahias 5,25 y 2 Bahias 3,5\"\"',126,220.00,211.20,NULL,_binary '',22),(95,'Lector De Memorias Multiple Externo USB Encore ENUCR-3',26,165.00,160.05,NULL,_binary '',23),(96,'Lector Adaptador Micro SD a USB Netmak NM-T55',89,180.00,172.80,NULL,_binary '',23),(97,'Multilector de Memoria Interno con Puerto USB Kelyx Mod. DL-YF2007',75,360.00,338.40,NULL,_binary '',24),(98,'Disco Rigido IDE 40GB WD Wester Digital Mod. WD400BB-22DEA0 [Tiene Windows 7 32bits Instlado]',180,100.00,94.00,NULL,_binary '',20),(99,'Pendrive Kingston 16GB USB 2.0 Mod. DT SE9 Metalico',156,380.00,361.00,NULL,_binary '',25),(100,'Pendrive Kingston 16GB USB 2.0 Mod. Cruzer Blade',123,380.00,364.80,NULL,_binary '',25),(101,'Pendrive Kingston 16GB USB 2.0 Mod. DataTraveler 101 G2',22,140.00,135.80,NULL,_binary '',25),(102,'Pendrive Kingston 32GB USB 2.0 Mod. DataTraveler DT SE9 Metalico',59,120.00,117.60,NULL,_binary '',25),(103,'Pendrive Kingston 32GB USB 3.1 3.0 2.0 Mod.100 G3',26,150.00,145.50,NULL,_binary '',25),(104,'Pendrive Kingston 32GB USB 3.1 3.0 2.0 mod. DT50',153,200.00,194.00,NULL,_binary '',25),(105,'Pendrive Con Formas Varias 8GB (Minios, Perry, etc.)',133,340.00,326.40,NULL,_binary '',25),(106,'Memoria Micro SD 8GB Kingston Clase 4 con adaptador.',45,100.00,96.00,NULL,_binary '',26),(107,'Memoria Micro SD 8GB Kingston Clase 10 con adaptador',77,380.00,364.80,NULL,_binary '',26),(108,'Memoria Micro SD 16GB Sandisk con adaptador',45,400.00,384.00,NULL,_binary '',26),(109,'Memoria Micro SD 32GB Kingston Clase 4 con adaptador',44,800.00,784.00,NULL,_binary '',26),(110,'Memoria RAM DDR3 1GB para Notebook Netbook',155,100.00,97.00,NULL,_binary '',27),(111,'Memoria RAM DDR2 2GB 800 (Samsung, Kynix, Nanya) disponibilidad según stock',31,100.00,96.00,NULL,_binary '',27),(112,'Memoria RAM DDR3 2GB 1600 Saikano',165,700.00,672.00,NULL,_binary '',27),(113,'Memoria RAM DDR3 4GB Kingston 12800 KVR16N118S/4',159,700.00,665.00,NULL,_binary '',27),(114,'Memoria RAM DDR (DDR1) 512MB 400MHz',66,80.00,76.80,NULL,_binary '',27),(115,'Memoria RAM DDR2 512MB Marca: TITAN',20,50.00,49.00,NULL,_binary '',27),(116,'Microprocesador AMD Sempron AM1 2650 1.45GHz (Dual-Core)',40,100.00,96.00,NULL,_binary '',28),(117,'Microprocesador AMD A4 4000 Dualcore 3.2ghz ',175,100.00,94.00,NULL,_binary '',28),(118,'Microprocesador Intel Pentium 4 3.00ghz 2mb 800 Socket 775',189,50.00,49.00,NULL,_binary '',28),(119,'Microprocesador Intel Celeron 3.46ghz 512kb 533 Socket 775',148,1100.00,1056.00,NULL,_binary '',28),(120,'Microprocesador Intel Pentium E2180 Dualcore 2.0ghz Socket 775',194,1200.00,1140.00,NULL,_binary '',28),(121,'Microprocesador Intel Pentium 4 3.00ghz 1mb 800 Socket 775',93,3200.00,3008.00,NULL,_binary '',28),(122,'Microprocesador Intel Pentium 4 2.80ghz 1mb 533 Socket 775',24,1500.00,1425.00,NULL,_binary '',28),(123,'Monitor LCD 15 Pulgadas Benq FP567s Sin cable. Excelente imagen.',194,1600.00,1504.00,NULL,_binary '',29),(124,'Monitor LCD 15 Pulgadas Benq FP567s Con Cable Power y Cable VGA. Excelente imagen.',121,1600.00,1536.00,NULL,_binary '',29),(125,'Monitor LED 19 Pulgadas LG Mod. 19M35A-B ',44,1700.00,1632.00,NULL,_binary '',29),(126,'Monitor LCD 19 Pulgadas ViewSonic VA1903wb. Sin cables. Excelente imagen',22,250.00,235.00,NULL,_binary '',29),(127,'Monitor LCD 19 Pulgadas ViewSonic VA1903wb. Con Cable Power y Cable VGA. Excelente imagne',34,1200.00,1152.00,NULL,_binary '',29),(128,'Monitor LCD 19 Pulgadas Samsung SyncMastar 943NWX Sin cables. Excelente imagen',25,6.00,5.82,NULL,_binary '',29),(129,'Monitor LCD 19 Pulgadas Samsung SyncMastar 943NWX Con Cable Power y Cable VGA. Excelente imagen',173,10.00,9.50,NULL,_binary '',29),(130,'Soporte Para Tv Led Lcd Plasma Hasta 42 Pulg',70,40.00,38.40,NULL,_binary '',30),(131,'Cable UTP Para Red Kelyx Cat.5E (Interior) X 305mts ',98,160.00,156.80,NULL,_binary '',31),(132,'Cable UTP Para Red Cat. 5E (interior) x metro',81,50.00,48.00,NULL,_binary '',31),(133,'Cable UTP Para Red Noganet C-788E (exterior) x metro',77,100.00,96.00,NULL,_binary '',31),(134,'Ficha Conector RJ45 (Bolsa x 10u.)',45,300.00,285.00,NULL,_binary '',32),(135,'Ficha Conector RJ45 (Bolsa x 50u.)',105,200.00,196.00,NULL,_binary '',32),(136,'Ficha Prolongador RJ45 Hembra a Hembra',19,180.00,174.60,NULL,_binary '',33),(137,'Placa de Red PCI TP-Link TF-3200',29,220.00,215.60,NULL,_binary '',34),(138,'Placa de Red PCI Inalambrica TP-Link TL-WN751ND 150Mbps (LN) Antena Desmontable',179,350.00,329.00,NULL,_binary '',34),(139,'Placa de Red USB Inalambrica TP-Link TL-WN723N Mini 150Mbps (LN)',36,190.00,184.30,NULL,_binary '',34),(140,'Placa de Red USB Inalambrica TP-Link TL-WN725N Nano 150Mbps (LN)',106,220.00,206.80,NULL,_binary '',34),(141,'Placa de Red USB Inalambrico TP-Link TL-WN722N',135,330.00,320.10,NULL,_binary '',34),(142,'Placa de Red PCI Inalambrica Wi-fi Totolink N150pc',90,350.00,336.00,NULL,_binary '',34),(143,'Placa de Red PCI-E TP-Link Gigabit TG-3468 1000Mbps ',107,380.00,357.20,NULL,_binary '',34),(144,'Placa de Red PCI-E Inalambrico TP-Link TL-WN781ND',101,440.00,431.20,NULL,_binary '',34),(145,'Placa de Red PCI-E Inalambrico TP-Link TL- WN881ND',128,500.00,470.00,NULL,_binary '',34),(146,'Router Inalambrico Wi-Fi ZTE Mod. ZXHN F660 ',154,660.00,646.80,NULL,_binary '',35),(147,'Router Inalambrico Wi-Fi Noganet NG-150D 150Mbps',173,660.00,620.40,NULL,_binary '',35),(148,'Router Inalambrico Wi-Fi TP-Link TL-WR840N 300Mbps (2 Antenas Fija)',164,350.00,336.00,NULL,_binary '',35),(149,'Router Inalambrico Wi-Fi TP-Link TL-WR841N 300Mbps (2 Antenas Fija)',39,500.00,470.00,NULL,_binary '',35),(150,'Router Inalambrico Wi-Fi TP-Link TL-WR940N 450Mbps (3 Antenas Fijas)',197,40.00,37.60,NULL,_binary '',35),(151,'Router Inalambrico Wi-Fi TP-Link TL-WR945N 450Mbps (3 Antenas)',197,30.00,29.40,NULL,_binary '',35),(152,'Extensor de Rango Inalambrico TP-Link WA820RE 300Mbps',110,1400.00,1372.00,NULL,_binary '',36),(153,'Extensor De Rango Inalámbrico N 300mbpstl-wa850re',170,1500.00,1455.00,NULL,_binary '',36),(154,'Cable de Red (RJ45 a RJ45) x 2 mts. CAT. 5E Netmak Mod. NM-C04',155,2260.00,2124.40,NULL,_binary '',37),(155,'Cable de Red (RJ45 a RJ45) x 2 mts. CAT. 5E (CK-2M)',55,180.00,171.00,NULL,_binary '',37),(156,'Tablet 7 Pulgadas Marca: Kelyx Mod. KL753 ',78,200.00,190.00,NULL,_binary '',59),(157,'Tablet 7 Pulgadas Marca: Silverstone Mod. ST-795',72,180.00,174.60,NULL,_binary '',59),(158,'Tablet 10 Pulgadas Marca Kelyx Mod. KL1045',42,90.00,86.40,NULL,_binary '',59),(159,'Funda Con Teclado y Lapiz Para Tablet 7\" Mod Dle 7 Bw\"',161,95.00,93.10,NULL,_binary '',39),(160,'Funda Con Teclado Int.CO Para Tablet 7 Pulg',120,170.00,159.80,NULL,_binary '',39),(161,'Funda Con Teclado Para Tablet 10\" Kelyx\"',40,200.00,196.00,NULL,_binary '',39),(162,'Cargador de Tablet 220V - 5V 2A Micro USB',195,185.00,173.90,NULL,_binary '',40),(163,'Mouse Optico USB NOGANET NG-611U Color Rosa y Negro',56,120.00,116.40,NULL,_binary '',41),(164,'Mouse Optico USB Genius DX-110 / DX-120',112,130.00,123.50,NULL,_binary '',41),(165,'Mouse Optico USB 1200DPI Marca: Kelyx o Magnum tech',52,120.00,116.40,NULL,_binary '',41),(166,'Mouse Optico USB SFX Mod. SFX1380',199,120.00,112.80,NULL,_binary '',41),(167,'Mouse Inalambrico Genius NX-7010',127,140.00,134.40,NULL,_binary '',41),(168,'Mouse Inalambrico Genius NX-7000X',136,150.00,142.50,NULL,_binary '',41),(169,'Mouse Inalambrico Genius NX-7000',130,150.00,144.00,NULL,_binary '',41),(170,'Mouse Retractil Mini Shark Net Mod. SN-baby',167,220.00,215.60,NULL,_binary '',41),(171,'Mouse Retractil Netmak NM-M06',138,260.00,244.40,NULL,_binary '',41),(172,'Mouse Retractil Eurocase EUMO-124',39,160.00,153.60,NULL,_binary '',41),(173,'Mouse USB Genis Micro Traveler Retractil',189,440.00,418.00,NULL,_binary '',41),(174,'Teclado Genius PS2 o USB KB-110X',79,365.00,343.10,NULL,_binary '',42),(175,'Teclado Multimedia USB Marca: Kelyx o Magnum tech Color: Negro',102,130.00,126.10,NULL,_binary '',42),(176,'Teclado Multimedia USB SFX Mod. SFX2496 Color: Negro',11,220.00,211.20,NULL,_binary '',42),(177,'Combo Teclado + Mouse Genius Slimstarc130',175,90.00,86.40,NULL,_binary '',43),(178,'Combo Teclado USB + Mouse USB + Parlantes Marca: SFX',10,100.00,98.00,NULL,_binary '',43),(179,'Teclado Numérico Genius Mod. I110',108,150.00,145.50,NULL,_binary '',42),(180,'Estabilizador de Tension Sur Electric 1000VA 6 Tomas.',120,180.00,171.00,NULL,_binary '',44),(181,'Estabilizador / Protector De Tensión Lyonn Lnp-3p',158,380.00,361.00,NULL,_binary '',44),(182,'Fuente Multiple Voltajes Noganet NG-105 500mAh',85,115.00,111.55,NULL,_binary '',45),(183,'Fuente Multiple Voltajes Noganet Noga79 800mAh',15,180.00,169.20,NULL,_binary '',45),(184,'Zapatilla Prolongador 4 Tomas TOP (tomas universales, tecla On-Off) Largo cable 1,5mts',34,360.00,349.20,NULL,_binary '',46),(185,'Zapatilla / Prolongador  TAAD 4 Tomas  con Termina Normalizada Largo Cable. 1.37mts Tecla On-Off',172,450.00,427.50,NULL,_binary '',46),(186,'Fuente 5V 2A USB Hembra (220VAC) para Celulares, Tablets, etc. (solo fuente)',139,460.00,450.80,NULL,_binary '',45),(187,'Fuente 5V 2A USB Embra (220VAC) para Celulares, Tablet, etc. (con bale USB a Micro USB) Marca: Kolke',52,660.00,640.20,NULL,_binary '',45),(188,'Modulador/Conversor de Audio y Video a RF 75 Ohms Mod. RF-602 ',157,1100.00,1078.00,NULL,_binary '',47),(189,'Selector de Audio y Video 3 Entradas 1 Salida',24,760.00,737.20,NULL,_binary '',48),(190,'Selector de Audio y Video 4 Entradas 1 Salida (con Super Video)',108,700.00,672.00,NULL,_binary '',48),(191,'Conversor HDMI a 3 RCA (AV) FULL-HD 1080P + Cable USB a Mini USB (Sin Fuente)',35,120.00,116.40,NULL,_binary '',49),(192,'Conversor HDMI a 3 RCA (AV) FULL-HD 1080P + Cable USB a Mini USB (cin Fuente 220V a 5VDC USB)',86,38.00,37.24,NULL,_binary '',49),(193,'Conversor VGA + AUDIO (2 RCA) a HDMI FULL-HD 1080P (Sin fuente ni cables)',172,50.00,47.00,NULL,_binary '',49),(194,'Conversor VGA + AUDIO (2 RCA) a HDMI FULL-HD 1080P con Fuente 5V 2A (Sin cables)',19,25.00,24.00,NULL,_binary '',49),(195,'Splitter HDMI 1 a 4 Activo FULL-HD 1080P (Sin fuente ni cables)',55,25.00,24.00,NULL,_binary '',50),(196,'Splitter HDMI 1 a 4 Activo FULL-HD 1080P con Fuente 5V 2A (Sin cables)',148,65.00,62.40,NULL,_binary '',50),(197,'Reflector 54 Leds Bajo Consumo 8W Potencia 150W 220V (Luz blanca)',124,90.00,87.30,NULL,_binary '',51),(198,'Reflector 54 Leds Bajo Consumo 8W Potencia 150W 12V para Automotor',79,100.00,95.00,NULL,_binary '',51),(199,'Linterna 32 Leds Alto Brillo Cuerpo Metal ',105,24.00,23.52,NULL,_binary '',52),(200,'Linterna Llavero 9 Leds Alta Brillo',196,35.00,34.30,NULL,_binary '',52),(201,'Linterna De Bolsillo De Aluminio',78,200.00,192.00,NULL,_binary '',52),(202,'Lampara Halogena 53W (75W) Rosca Estándar E23',88,80.00,77.60,NULL,_binary '',53),(203,'Lampara Halogena 72W (100W) Rosca Estándar E23',159,80.00,77.60,NULL,_binary '',53),(204,'Lampara de Led Potencia 11W Raca Estándar E23',148,80.00,77.60,NULL,_binary '',53),(205,'Palo Para Selfie Mini para Celular',46,15.00,14.00,NULL,_binary '',54),(206,'Palo Para Selfie para Celular',154,15.00,14.00,NULL,_binary '',54),(207,'Roseta Derivador Telefonico RJ11 1 a 2',122,14.00,13.00,NULL,_binary '',55),(208,'Prolongador Telefonico RJ11 Hembra - Hembra',66,30.00,27.00,NULL,_binary '',56),(209,'Cargador Portatil Para Celular 2200mAh',87,30.00,27.00,NULL,_binary '',40),(210,'Cargador Viajero De Pared Iphone & Samsung',146,30.00,27.00,NULL,_binary '',40),(211,'Cargador Viajero De Pared Ficha Mini USB',182,80.00,77.60,NULL,_binary '',40),(212,'Cargador Viajero de Pered para Celulares Ficha Micro USB',100,80.00,78.40,NULL,_binary '',40),(213,'Cargador de Pared 5V 2A conector USB + Cable USB a Micro USB (ideal celulares, tablets, etc.)',100,180.00,174.60,NULL,_binary '',40),(214,'Telefono ARPAT KX-T071CID con Identificador de llamadas (Caller ID)',100,250.00,235.00,NULL,_binary '',57),(215,'Telefono ARPAT KX-T5002CID con Identificador de llamadas (Caller ID)',100,250.00,237.50,NULL,_binary '',57),(216,'MacBook Pro 16\"\"',100,2399.00,2379.00,NULL,_binary '',58),(217,'Dell XPS 13',100,999.00,979.00,NULL,_binary '',58),(218,'HP Spectre x360',100,1199.00,1179.00,NULL,_binary '',58),(219,'Lenovo ThinkPad X1 Carbon',100,1299.00,1279.00,NULL,_binary '',58),(220,'Asus ROG Zephyrus G14',10,1449.00,1429.00,NULL,_binary '',58),(221,'Acer Predator Helios 300',20,1299.00,1279.00,NULL,_binary '',58),(222,'Surface Laptop 4',12,999.00,979.00,NULL,_binary '',58),(223,'iPad Pro 12.9\"\"',12,1099.00,1079.00,NULL,_binary '',59),(224,'Samsung Galaxy Tab S7',9,649.00,629.00,NULL,_binary '',59),(225,'Amazon Fire HD 10',9,149.00,129.00,NULL,_binary '',59),(226,'iPhone 13 Pro',15,999.00,979.00,NULL,_binary '',60),(227,'Samsung Galaxy S21 Ultra',20,1199.00,1179.00,NULL,_binary '',60),(228,'Google Pixel 6 Pro',5,899.00,879.00,NULL,_binary '',60),(229,'OnePlus 9 Pro',7,969.00,949.00,NULL,_binary '',60),(230,'Sony WH-1000XM4',10,349.00,329.00,NULL,_binary '',3),(231,'Bose QuietComfort 35 II',10,299.00,279.00,NULL,_binary '',3),(232,'Apple AirPods Pro',10,249.00,229.00,NULL,_binary '',3),(233,'Jabra Elite 85t',10,229.00,209.00,NULL,_binary '',3),(234,'Samsung Galaxy Buds Pro',10,199.00,179.00,NULL,_binary '',3),(235,'Logitech MX Master 3',10,30.00,28.00,NULL,_binary '',41),(236,'Razer DeathAdder V2',10,30.00,28.00,NULL,_binary '',41),(237,'Apple Magic Mouse 2',10,30.00,28.00,NULL,_binary '',41),(238,'Microsoft Surface Mouse',10,30.00,28.00,NULL,_binary '',41),(239,'Samsung 970 EVO Plus 1TB',10,169.00,149.00,NULL,_binary '',61),(240,'Western Digital Black 2TB',10,99.00,79.00,NULL,_binary '',62),(241,'Seagate Backup Plus 5TB',10,129.00,109.00,NULL,_binary '',62),(242,'Kingston A2000 1TB',10,129.00,109.00,NULL,_binary '',61),(243,'Sandisk Extreme Pro 1TB',10,199.00,179.00,NULL,_binary '',61),(244,'Canon EOS R5',10,3899.00,3879.00,NULL,_binary '',1),(245,'Nikon Z7 II',10,2999.00,2979.00,NULL,_binary '',1),(246,'Sony Alpha a7 III',10,1999.00,1979.00,NULL,_binary '',1),(247,'Fujifilm X-T4',10,1699.00,1679.00,NULL,_binary '',1),(248,'Panasonic Lumix GH5',10,1299.00,1279.00,NULL,_binary '',1),(249,'DJI Mavic Air 2',10,799.00,779.00,NULL,_binary '',63),(250,'Parrot Anafi',10,699.00,679.00,NULL,_binary '',63),(251,'GoPro HERO9 Black',10,399.00,379.00,NULL,_binary '',1),(252,'Fitbit Charge 5',10,179.00,159.00,NULL,_binary '',64),(253,'Apple Watch Series 7',10,399.00,379.00,NULL,_binary '',65),(254,'Samsung Galaxy Watch 4',10,249.00,229.00,NULL,_binary '',65),(255,'Garmin Forerunner 945',10,599.00,579.00,NULL,_binary '',65),(256,'Anker PowerCore 10000',10,29.00,27.00,NULL,_binary '',66),(257,'RavPower 20000mAh',10,49.00,29.00,NULL,_binary '',66),(258,'TP-Link Archer AX6000',10,299.00,279.00,NULL,_binary '',67),(259,'Netgear Nighthawk AX12',10,399.00,379.00,NULL,_binary '',67),(260,'Ubiquiti UniFi AP AC Pro',10,129.00,109.00,NULL,_binary '',68),(261,'Linksys Velop MX10',10,499.00,479.00,NULL,_binary '',67),(262,'Logitech C920 HD Pro',10,79.00,69.00,NULL,_binary '',1),(263,'Elgato Stream Deck',10,149.00,129.00,NULL,_binary '',69),(264,'Corsair K95 RGB Platinum',10,199.00,179.00,NULL,_binary '',42),(265,'Razer BlackWidow Elite',10,169.00,149.00,NULL,_binary '',42),(266,'Tarjetas Gráficas',10,799.00,779.00,NULL,_binary '',70),(267,'Tarjetas Gráficas',10,499.00,479.00,NULL,_binary '',70),(268,'AMD Ryzen 9 5950X',10,799.00,779.00,NULL,_binary '',71),(269,'Intel Core i9-11900K',10,549.00,529.00,NULL,_binary '',71),(270,'Corsair Vengeance LPX 16GB',10,89.00,79.00,NULL,_binary '',27),(271,'G.Skill Trident Z RGB 32GB',10,199.00,179.00,NULL,_binary '',27),(272,'Kingston HyperX Fury 16GB',10,89.00,69.00,NULL,_binary '',27),(273,'Dell Ultrasharp U2720Q',10,539.00,519.00,NULL,_binary '',29),(274,'LG UltraGear 27GL850',10,399.00,379.00,NULL,_binary '',29),(275,'Samsung Odyssey G7',10,699.00,679.00,NULL,_binary '',29),(276,'MSI Optix MAG274QRF-QD',10,449.00,429.00,NULL,_binary '',29),(277,'Asus TUF Gaming VG27AQ',10,349.00,329.00,NULL,_binary '',29),(278,'Apple Mac Mini M1',10,699.00,679.00,NULL,_binary '',72),(279,'HP Omen 30L',10,1499.00,1479.00,NULL,_binary '',72),(280,'Alienware Aurora R12',10,2099.00,2079.00,NULL,_binary '',72),(281,'Lenovo Legion Tower 5i',10,999.00,979.00,NULL,_binary '',72),(282,'Corsair One i160',10,2999.00,2979.00,NULL,_binary '',72),(283,'Oculus Quest 2',10,299.00,279.00,NULL,_binary '',73),(284,'HTC Vive Pro 2',10,799.00,779.00,NULL,_binary '',73),(285,'Sony PlayStation 5',10,499.00,479.00,NULL,_binary '',74),(286,'Xbox Series X',10,499.00,479.00,NULL,_binary '',74),(287,'Nintendo Switch',10,299.00,279.00,NULL,_binary '',74),(288,'Razer Kishi',10,99.00,79.00,NULL,_binary '',69),(289,'SteelSeries Arctis 7',10,149.00,129.00,NULL,_binary '',3),(290,'Apple HomePod Mini',10,99.00,79.00,NULL,_binary '',75),(291,'Amazon Echo Dot (4th Gen)',10,49.00,39.00,NULL,_binary '',75),(292,'Google Nest Audio',16,99.00,89.00,NULL,_binary '',75),(293,'Sonos One',16,199.00,179.00,NULL,_binary '',75),(294,'Yamaha YAS-209',16,349.00,329.00,NULL,_binary '',76),(295,'JBL Bar 5.1',16,499.00,479.00,NULL,_binary '',76),(296,'Klipsch Cinema 600',16,549.00,529.00,NULL,_binary '',76),(297,'Samsung HW-Q950A',16,1200.00,1180.00,NULL,_binary '',76),(298,'Bose Soundbar 700',16,300.00,280.00,NULL,_binary '',76);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id_prov` int NOT NULL AUTO_INCREMENT,
  `prov_nombre_proveedor` varchar(100) DEFAULT NULL,
  `prov_direccion` varchar(100) DEFAULT NULL,
  `prov_telefono` varchar(20) DEFAULT NULL,
  `prov_codigo_postal` varchar(20) DEFAULT NULL,
  `prov_pagina_web` varchar(100) DEFAULT NULL,
  `prov_fechacreacion` datetime DEFAULT NULL,
  `prov_estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'CASA GOYO','CALLE 45 Y RUTA 8','996013399','2720','http://www.padraniaceros.com.ar/','2024-08-12 19:49:30',_binary ''),(2,'TRANSCADEN ','OV. LAGOS 62','947596133','2000','https://transcaden.com/','2024-08-12 19:49:30',_binary ''),(3,'INDUSTRIAL CONTROLES','AV. BELGRANO 3985','907431411','0','https://industrialcontroles.com.ar/','2024-08-12 19:49:30',_binary ''),(4,'ROGIRO S.A','Avenida de las Palmeras 4515 A - Parque Industrial Rosario Oeste (S2009GBY)','900798965','2000','www.rogiroaceros.com','2024-08-12 19:49:30',_binary ''),(5,'INTOR','AV. 25 DE MAYO 265','977441123','3170','http://www.intor.com.ar/','2024-08-12 19:49:30',_binary ''),(6,'NIVIHE S.A.','OVIDIO LAGOS 5990','985894099','2000','https://www.chapasoro.com.ar/','2024-08-12 19:49:30',_binary ''),(7,'SERYVEN SUMINISTROS Y SERVICIOS INFORMATICOS','MAIPU 2212','927739571','2000','http://www.seryvensrl.com.ar/','2024-08-12 19:49:30',_binary ''),(8,'OLEODINAMICA Soluciones informáticas','AV. EVA PERON 1917','954668115','1834','https://www.oleodinamicasa.com.ar/','2024-08-12 19:49:30',_binary ''),(9,'PLEGA-DIGITAL','RUTA 8 KM 280','910389043','2720','https://plegamex.com.ar/','2024-08-12 19:49:30',_binary ''),(10,'OLYMPIC SAN LUIS ','CARRIEGO 940','992426044','2000','http://www.olympicsanluis.com.ar/','2024-08-12 19:49:30',_binary ''),(11,'JL COMPUTO','AV. MITRE 3380','990852485','1678','https://www.jlmetales.com.ar/','2024-08-12 19:49:30',_binary ''),(12,'CASA GOYO','RIO CUARTO 3113','902073657','1992','http://www.casagoyo.com.ar/','2024-08-12 19:49:30',_binary ''),(13,'KADAE S.A.','JUAN MANUEL DE ROSAS 176','909554049','2505','https://kadae.com.ar/','2024-08-12 19:49:30',_binary ''),(14,'RUEDAS  HOFER','H. YIRIGOYEN 860','997710910','1706','www.ruedashofer.com.ar','2024-08-12 19:49:30',_binary ''),(15,'ISCAR TOOLS','MONTEAGUDO 222','907952462','0','https://www.iscar.com/index.aspx/countryid/27/lang/en','2024-08-12 19:49:30',_binary ''),(16,'AISLANTES SH','JUAN D. PERON 3513','951703709','1754','https://www.aislantessh.com.ar/','2024-08-12 19:49:30',_binary ''),(17,'EA Importaciones Tecnologicas','FLOR DEL AIRE Nº 4928','912728245','0','http://www.extrusora-argentina.com.ar/','2024-08-12 19:49:30',_binary ''),(18,'FERRATECNO','S. del Estero 2565-Lanus, Buenos Aires','979451099',NULL,'http://www.ferrarielectromecanica.com/','2024-08-12 19:49:30',_binary ''),(19,'FIBROCAR ','Chile 2541 ','983193109','2124','http://www.fibrocar.com.ar/','2024-08-12 19:49:30',_binary ''),(20,'PIMAQ','VERA MUJICA 185','985462121','2000','http://www.pimaq.com.ar/','2024-08-12 19:49:30',_binary ''),(21,'POLEAS MIOR ','RUTA AO-12 Y Z. MARTINEZ','917031182','2000','http://www.poleasmior.com.ar/web2015/index.html','2024-08-12 19:49:30',_binary ''),(22,'CHAVETAS GALAS ','BOLIVIA 3260','907735577','1678','http://www.chavetasgalas.com.ar/','2024-08-12 19:49:30',_binary ''),(23,'INDETEC Ingenieria y desarrollos tecnologicos','DE LOS POETAS 2026','967223284','7203','https://indeplast.com.ar/','2024-08-12 19:49:30',_binary ''),(24,'ARGENCORT ','EMILIO MITRE 601','986275832','1704','www.argencort.com.ar','2024-08-12 19:49:30',_binary ''),(25,'POLYPERFIL','RUTA 5 KM 160','999213631','6620','http://www.polyperfil.com.ar/','2024-08-12 19:49:30',_binary ''),(26,'ACPLIND','LERMA 63','921517976','0','http://www.acplind.com/','2024-08-12 19:49:30',_binary ''),(27,'SHENZHOU HUAMIN MACHINERY CO.','5th Floor, Household Plaza, Daqing Road, Taocheng District, Hengshui City, Hebei Province','912087089',NULL,'www.huaminplastic.en.alibaba.com','2024-08-12 19:49:30',_binary ''),(28,'DONGGUAN BOKE PRECISE MOLDING TECHNOLOGY CO LTD','FENGSHEN INDUSTRIAL ZONE, CHINA','934466753',NULL,'www.boke3d.com','2024-08-12 19:49:30',_binary ''),(29,'IMDAL SRL','CALLE 47 1064 (ex Combet 1058)','973850673','1653','http://www.imdal.com.ar/','2024-08-12 19:49:30',_binary ''),(30,'KRAUS TECHNOLOGY','ADA. CENTENARIO 831','907273530','6005','http://maderaskraus.com.ar/','2024-08-12 19:49:30',_binary ''),(31,'BULONERA V','RODOLFO LOPEZ 440','907229167','1878','https://bulonerav.negocio.site/?utm_source=gmb&utm_medium=referral','2024-08-12 19:49:30',_binary ''),(32,'KATRIEL SRL','CARLOS CALVO 2152','938068841','0','http://www.katrielsrl.com.ar/','2024-08-12 19:49:30',_binary ''),(33,'ACEROS FB','MARCOS PAZ 869','954325746','1648','http://www.acerosfb.com.ar/','2024-08-12 19:49:30',_binary ''),(34,'BP SOLUCIONES TECNOLOGICAS','SAN MARTIN 1301','900002126','4000','www.bpsolucioneselectricas.com.ar','2024-08-12 19:49:30',_binary ''),(35,'LIESA','MONTIEL 3060','977096876','0','https://liesa.com.ar/','2024-08-12 19:49:30',_binary ''),(36,'DYM TECHNOLOGY','AV 101 (RUTA 8) 4644','975362760',NULL,'https://www.dymmetal.com.ar/','2024-08-12 19:49:30',_binary ''),(37,'TECNO ELIZALDE','Martin Fierro 6154','922055745','1754','https://aceroselizaldesa.com.ar/','2024-08-12 19:49:30',_binary ''),(38,'DONGGUAN NANBO MOTION MACHINERY CO., LTD','Guanchang Road, Dongcheng Street, Dongguan City, Guangdong Province','900003106',NULL,'www.nbmotion.en.alibaba.com','2024-08-12 19:49:30',_binary ''),(39,'INDUSTRIAL TECNOLOGICAS ','NAVARRO 7928','978034400','2000','http://industrialaceros.com/','2024-08-12 19:49:30',_binary ''),(40,'ROSARIO BURLETES ','Boman 3151','900003106','2000','https://www.rosarioburletes.com.ar/website/','2024-08-12 19:49:30',_binary ''),(41,'ARMANDO TESSORE','Bv. Alsina 74','900065606','2700','https://www.armandotessore.com.ar/','2024-08-12 19:49:30',_binary ''),(42,'BULONERA VIVAS ','Av.Alberdi 126','900656706','2000','https://rodolfovivas.com.ar/','2024-08-12 19:49:30',_binary ''),(43,'TECNOLOGICAS RADIO SUR Componentes y accesorios','Uruguay 1074','996003106','2000','https://electronicaradiosur.com.ar/#!/-inicio/','2024-08-12 19:49:30',_binary ''),(44,'E.B.A ELECTRICA BUENOS AIRES ','Av.Alsina 841','990642106','1828','https://www.eba.com.ar/','2024-08-12 19:49:30',_binary ''),(45,'ID GROUP Soluciones integrales  identificación','Suarez 2778','900426019','0','https://idgroup.com.ar/','2024-08-12 19:49:30',_binary ''),(46,'INBELT','Biedma 7257','930706064','2000','http://inbelt.com.ar/','2024-08-12 19:49:30',_binary ''),(47,'TENGEN (WUHAN) ELECTRIC CO.,LTD   ','    WANHUA SQUARE, XINGGANG ROAD, HANGZHOU AREA, HUANGGANG CITY, CHINA                    ','900003106',NULL,'www.hooyeegroup.com','2024-08-12 19:49:30',_binary ''),(48,'MASTRANGELO PRODUCTOS ELECTRICOS Y TECNOLOGICOS','Laprida 2444','903587735','2124','https://www.mastrangeloneored.com.ar/','2024-08-12 19:49:30',_binary ''),(49,'ARI TECNOLOGIA','COLEGIALES 2406','900003106','2000','https://arigalvanizados.com.ar/','2024-08-12 19:49:30',_binary ''),(50,'MIGNANI ','Mendoza 3242','920329273','2000','http://www.mignanisrl.com.ar/','2024-08-12 19:49:30',_binary ''),(51,'TRANSFORMADORES PERGAMINO','Gral. Paz 1826','983684143','2700','https://www.trafoper.com.ar/trafoper2017/','2024-08-12 19:49:30',_binary ''),(52,'CINT-BROC','GENERAL GUIDO 433','900003203','1704','https://cintbrocsa.mercadoshops.com.ar/','2024-08-12 19:49:30',_binary ''),(53,'RESORTES LACAS Fabricacion en serie para todas tipo de computadora','Av Francia 3849','959388983','2000','http://www.resortes-lacas.com.ar/','2024-08-12 19:49:30',_binary ''),(54,'DINOBA S.A','Blvd. Alsina 851','976456610','2700','http://www.dinoba.com/','2024-08-12 19:49:30',_binary ''),(55,'TECNO INDUSIL Tecnologia en silicona ','JOSE LEON SUAREZ 2272 ','900003106','0','www.tecno-indusil.com','2024-08-12 19:49:30',_binary ''),(56,'ELECTRO UNIVERSO Materiales electricos e iluminacion','JUJUY AV. 1061','910813979','1229','http://www.electrouniverso.com.ar/','2024-08-12 19:49:30',_binary ''),(57,'ROVERE TECNOLOGI','MONTEAGUDO 347','900003106','2000','https://www.roveremetales.com.ar/','2024-08-12 19:49:30',_binary ''),(58,'SEGUTECNICA Global Industrial Protection Web','HUMBERTO PRIMO 985','915056220','11030','https://www.segutecnica.com/ofertas.php','2024-08-12 19:49:30',_binary ''),(59,'FORNIS ','Joaquin V Gonzalez 1080','915056220','1407','https://www.fornis.com.ar/','2024-08-12 19:49:30',_binary '');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,2),(4,2),(1,4),(2,4),(1,23),(2,23),(5,24),(6,24),(7,25),(8,25),(7,26),(8,26);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'writer','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(2,'admin','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(3,'Super-Admin','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(4,'tester','api','2024-08-29 20:40:39','2024-08-29 20:40:39'),(12,'h','api','2024-09-03 03:12:45','2024-09-03 03:12:45'),(13,'u','api','2024-09-03 03:24:15','2024-09-03 03:24:15'),(14,'v','api','2024-09-03 03:26:06','2024-09-03 03:26:06'),(15,'ce','api','2024-09-03 03:28:29','2024-09-03 03:28:29'),(16,'ter','api','2024-09-03 03:30:50','2024-09-03 03:30:50'),(17,'c','api','2024-09-03 03:36:08','2024-09-03 03:36:08'),(18,'n','api','2024-09-03 03:37:56','2024-09-03 03:37:56'),(19,'m','api','2024-09-03 03:40:11','2024-09-03 03:40:11'),(20,'ms','api','2024-09-03 03:43:44','2024-09-03 03:43:44'),(21,'mds','api','2024-09-03 03:44:47','2024-09-03 03:44:47'),(22,'w','api','2024-09-03 03:45:48','2024-09-03 03:45:48'),(23,'j','api','2024-09-03 04:17:12','2024-09-03 04:17:12'),(24,'chema','api','2024-09-03 04:21:54','2024-09-03 04:21:54'),(25,'celi','api','2024-09-03 04:32:19','2024-09-03 04:32:19'),(26,'vf','api','2024-09-03 04:37:35','2024-09-03 04:37:35');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7EpxG9oafJrn18Oeg4CxOTm1voGxUTQASgMuaKyV',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVpYaFRuN3Zod3k0VVAxcW41UU0xcDgwY3B5VWRsWDIzNmd2OGI3ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1725020039);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categorias`
--

DROP TABLE IF EXISTS `sub_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_categorias` (
  `id_sbc` int NOT NULL AUTO_INCREMENT,
  `sbc_nombre` varchar(50) DEFAULT NULL,
  `sub_estado` bit(1) DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  PRIMARY KEY (`id_sbc`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `sub_categorias_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categorias`
--

LOCK TABLES `sub_categorias` WRITE;
/*!40000 ALTER TABLE `sub_categorias` DISABLE KEYS */;
INSERT INTO `sub_categorias` VALUES (1,'Cámaras',_binary '',1),(2,'Tripode',_binary '',1),(3,'Auriculares',_binary '',2),(4,'Cable Audio',_binary '',3),(5,'Ficha Adaptador',_binary '',3),(6,'Ficha Plug',_binary '',3),(7,'Cable Adaptador',_binary '',4),(8,'Cable InterIcok',_binary '',4),(9,'Cable Impresora',_binary '',4),(10,'Cable Power',_binary '',4),(11,'Cable Sata',_binary '',4),(12,'Cable HDMI',_binary '',4),(13,'Cable Splitter',_binary '',4),(14,'Cable Super',_binary '',4),(15,'Cable Plano',_binary '',4),(16,'Cable USB',_binary '',4),(17,'Control Remoto',_binary '',5),(18,'Cooler',_binary '',6),(19,'Turbina',_binary '',6),(20,'Disco Rigido',_binary '',24),(21,'Case External',_binary '',7),(22,'Gabinetes',_binary '',8),(23,'Lector',_binary '',9),(24,'Multilector',_binary '',9),(25,'Pendrive',_binary '',9),(26,'Memoria Micro',_binary '',9),(27,'Memoria Ram',_binary '',10),(28,'Microprocesador',_binary '',11),(29,'Monitores',_binary '',12),(30,'Soporte TV',_binary '',12),(31,'Cable UTP',_binary '',4),(32,'Ficha Conector',_binary '',3),(33,'Ficha Prolongador',_binary '',3),(34,'Placa de Red',_binary '',27),(35,'Router Inalambrico',_binary '',27),(36,'Extensor',_binary '',27),(37,'Cable de Red',_binary '',4),(38,'Otros',_binary '',13),(39,'Funda',_binary '',15),(40,'Cargador',_binary '',20),(41,'Mouse',_binary '',16),(42,'Teclado',_binary '',16),(43,'Combo: Teclado y Mouse',_binary '',16),(44,'Estabilizador',_binary '',17),(45,'Fuente',_binary '',17),(46,'Zapatilla',_binary '',17),(47,'Modulador',_binary '',18),(48,'Selector de Audio y Video',_binary '',18),(49,'Conversor',_binary '',18),(50,'Splitter',_binary '',18),(51,'Reflector',_binary '',19),(52,'Linterna',_binary '',19),(53,'Lampara',_binary '',19),(54,'Palo Selfie',_binary '',20),(55,'Roseta Telef.',_binary '',20),(56,'Prolongador',_binary '',20),(57,'Telefono',_binary '',20),(58,'Laptops',_binary '',21),(59,'Tablets',_binary '',14),(60,'Smartphones',_binary '',22),(61,'SSD',_binary '',24),(62,'HDD',_binary '',24),(63,'Drones',_binary '',25),(64,'Smartbands',_binary '',26),(65,'Smartwatches',_binary '',26),(66,'Power Banks',_binary '',17),(67,'Router',_binary '',27),(68,'Access Points',_binary '',27),(69,'Controladores',_binary '',28),(70,'Tarjetas',_binary '',29),(71,'Procesadores',_binary '',29),(72,'Desktops',_binary '',21),(73,'VR Headsets',_binary '',30),(74,'Consolas de Videojuegos',_binary '',31),(75,'Altavoces',_binary '',23),(76,'Barras de Sonido',_binary '',23);
/*!40000 ALTER TABLE `sub_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Example User','test@example.com','2024-08-29 20:40:40','$2y$12$Odn.Z47ECkVV77E28wjJ.uwzLc4ecjEIEMlc2sO71fiZVt.4BMdvi','3hj5rrpdTP','2024-08-29 20:40:41','2024-08-29 20:40:41'),(2,'Example Admin User','admin@example.com','2024-08-29 20:40:41','$2y$12$UTh6nvo0AJBG361G7iVAEe.LJvwMxGXlwu0.u6y5z0FMamZPfsCo.','uwyB8o3Yao','2024-08-29 20:40:41','2024-08-29 20:40:41'),(3,'Example Super-Admin User','Jonndoe@gmail.com','2024-08-29 20:40:41','$2y$12$hgGbfRjPZQ30VLSswXAshem2pSuLJabKjxth6EIxp9BLSZ.Gi6BFm','5i02KIc01G','2024-08-29 20:40:41','2024-08-29 20:40:41'),(4,'Tester User','tester@gmail.com','2024-08-29 20:40:41','$2y$12$axw36aoY/e02..m.cGqvnez7o7oZyqQ5h1w30FFilj8UZmDOPkGzu','Rh11X9u1Lq','2024-08-29 20:40:42','2024-08-29 20:40:42'),(5,'Jonh Doe','Jonndoe2@gmail.com',NULL,'$2y$12$Qp0yL2pOIQhIYZNEUvTTT.qhb0aaBO2ZXpEkyygBzE0VHkSK9eh1K',NULL,'2024-08-31 19:37:25','2024-08-31 19:37:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-04 22:53:56
