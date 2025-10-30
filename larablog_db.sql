-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: larablog_db
-- ------------------------------------------------------
-- Server version	5.7.44

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
-- Table structure for table `blog_social_media`
--

DROP TABLE IF EXISTS `blog_social_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_social_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bsm_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bsm_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bsm_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bsm_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_social_media`
--

LOCK TABLES `blog_social_media` WRITE;
/*!40000 ALTER TABLE `blog_social_media` DISABLE KEYS */;
INSERT INTO `blog_social_media` VALUES (1,'https://www.facebook.com/profile.php?id=100008309922495','https://www.instagram.com/hs_camilo/','https://www.youtube.com/@perdadetempo8026','https://www.linkedin.com/in/henderson-camilo-gomes-da-silva-5468a1211/','2025-08-11 23:36:20','2025-08-11 23:37:58');
/*!40000 ALTER TABLE `blog_social_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '10000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (10,'App dev.',2,'2025-08-19 02:11:18','2025-08-24 00:49:31'),(11,'Web dev.',1,'2025-08-19 02:11:35','2025-08-24 00:49:31'),(12,'Linguagens',4,'2025-08-19 02:12:10','2025-08-24 00:46:35'),(13,'Games',3,'2025-08-24 00:46:32','2025-08-24 00:49:31');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `general_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description` text COLLATE utf8mb4_unicode_ci,
  `blog_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings`
--

LOCK TABLES `general_settings` WRITE;
/*!40000 ALTER TABLE `general_settings` DISABLE KEYS */;
INSERT INTO `general_settings` VALUES (1,'Henderson','henderson.larablog@gmail.com','Developer Laravel','1755564580_33683blog_logo.png','1755564558_528_blog_favicon.ico','2025-08-06 01:05:33','2025-08-19 00:49:40');
/*!40000 ALTER TABLE `general_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_09_28_150050_create_types_table',1),(6,'2023_10_02_145347_create_general_settings_table',1),(7,'2023_10_05_190307_create_blog_social_media_table',1),(8,'2023_10_29_015942_create_categories_table',1),(9,'2023_10_29_020117_create_sub_categories_table',1),(10,'2025_08_06_011330_add_username_to_users_table',2),(11,'2025_08_08_015335_add_type_to_users_table',3),(12,'2025_08_08_020815_add_biography_to_users_table',4),(13,'2025_08_08_020815_add_biography_to_users_table copy',5),(14,'2025_08_08_022744_add_picture_to_users_table',5),(15,'2025_08_12_004222_add_direct_publish_to_users_table',6),(16,'2025_08_12_004432_add_blocked_to_users_table',7),(17,'2025_08_15_165654_create_posts_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('henderson.larablog@gmail.com','MHc3YjZJZndwTFlVbEYxUmxOYVpFcmZFYmY0a1VpSmlqRDhlM2dXVHlxSGg3OFdibmMzcko0b1ZYc2l2Um9ZUA==','2025-08-23 16:10:54'),('henderson.larablog@gmail.com','MW9BTXo5SmFGeDNweGI3Q3dFOHBkQk9WblBjVkhPQnhUaUJjcGpDSm1Ydjc1SWdVUGR6cVNQemp6U3lQQ0ZFSA==','2025-08-23 23:41:11'),('henderson.larablog@gmail.com','Z05UaTAwaHhpVTF6eDBMY1J3U1A0WXFpNFJ0ajg5SDZJNWRnMkljNVZyWkxQZDBoY1Bpa0EyQ2hmd1paWE9ERQ==','2025-08-23 23:42:47'),('henderson.larablog@gmail.com','TTVlQVZodXphekNPVUVnNmVHbGtBZVFrUlhaRDdaZVh1b2hDQVMzQVpTMnJVbWVYVjh3Zk4zUEhHb2lSYWZnOA==','2025-08-23 23:46:15'),('henderson.larablog@gmail.com','T2t2TjVORnJXMFhBRDdadllGT1FVTnZPRHE3MVFOSjh2anJMdG9mcU1NaUJWTnM1NnBvZ2lsdmZ1eVBVQVVmVw==','2025-08-23 23:52:58'),('henderson.larablog@gmail.com','ODdiYmp2ODgyRmxTSnJyVDlIaFZIdFFpWmNEd0J6TVBVNzJMajVTZzFWUkI5MTVhSmF3RlhlZzYzc0JWeVBjbQ==','2025-08-23 23:59:15'),('henderson.larablog@gmail.com','WXFsaktxcjFMeEtnYURQcFhGYlhSRHY1ZEFhZ1EzNEdKVWJ2VjluQ0JZdmFST2NHTzZ5MVFJSDBmZGdpaG5tcg==','2025-08-24 00:11:14'),('henderson.larablog@gmail.com','QTUzWHgwbWhLdzZNWFpVd09INjFSeGR5d2tBWmJBRklYWklrQWtwOEp0ano3TW5oODhlMEkyNHVlMnJhVXV0Uw==','2025-08-24 00:12:40'),('henderson.larablog@gmail.com','dVNCV2tMZHpLSkp3R0RFOXl4Mll1bTV6THp4YkNmRHpVR3JtNFh1OWJVY29VRkhqUEI2S2RDeW9aYXFsUjRmVw==','2025-08-24 00:13:17'),('henderson.larablog@gmail.com','Tk9KaWNLY2VUV0hRR3QzN2IzNmFtN1U4RHFwWDJ1SHpmcFRBd0VLUlF3ek15dnM4YTRTY0pwRzhPeTJrMEc1aQ==','2025-08-24 00:17:32'),('henderson.larablog@gmail.com','aXBxSGhVNmMyRENTMzAzc3NOQUM2aUt1enVhS25aYmNiVWRYUWtpTWRlM0k0N04zYnp3NEZZMWZhVEhySU9pSw==','2025-08-24 00:19:08'),('henderson.larablog@gmail.com','VjgzalFZYlVQNGJnQkhic1ZzeU82V0prQ3BWOGVMYlladG9RVTV5cDdhV2lMU1hHdEtDYWtTSFdNSkllZ1ZUeA==','2025-08-24 00:19:49'),('henderson.larablog@gmail.com','Z296ZTdQZW5PcExlSFlnYW91bkZHNXd0WW1QZW5VVGdqSk9KczNOclM2QnJtYkZiSEFJZFV2Q0loT0xUN3dBbQ==','2025-08-24 00:20:29'),('henderson.larablog@gmail.com','cHl5MVVOU0kyTVdHOWdpTmxBcVpUUHNUVUZqankxbVZBUDNqM2FSdUo2a1Y1Z2xTYllQaXBKVXExSVFmdXYwWg==','2025-08-24 00:27:28'),('henderson.larablog@gmail.com','RDZSRGJpSHk4ZU1IdkdjV1MxUWxibThzTjB6WmpRYWJMelhLNmNWVUEyRW5wQ3ZyQng2VWljOE9hbEN1ZzRxVw==','2025-08-24 00:27:54'),('henderson.larablog@gmail.com','bGJmb2V4MjRDQzBuSWR6eDFLVnU2WlVlT25sbVFtRG03SEVTOXo5Y3paMFdvdVVjM1pDck9wS3lSalQ4VWpJSQ==','2025-08-24 00:31:16'),('henderson.larablog@gmail.com','cDlFNkJ2Unc3VUhyQXFwZFJjSkI1akZkWloxQVhOOXRjMHVNZTM0NDBuYTFxVGVaZmpwTDA3RnVyamI3emZyVg==','2025-08-24 00:31:48'),('henderson.larablog@gmail.com','WDI5d1l6Sm53NlFWMTFOeGk0NVlrY0ROSmRXWUNON0VzQ2UxdGlZZ2xyOVg3SXJLaE9BdlV4Y3Z2aDVEejR5RA==','2025-08-24 00:32:33'),('henderson.larablog@gmail.com','OE82bjJrWGQ2cm0wcmVyUXA3YWo0R2VpaGpKSnpSNnRjTTFsa0VRVjhVdzhLOU9IZFZnbjBlRjh0dXJ2RkxuUQ==','2025-08-24 00:37:45'),('henderson.larablog@gmail.com','eXJROW9tTlRHcTNtYmNhbTZGcjZtTGJhcFVwN0plVEJ5NGJoQWJzbUJSODdadDRRTUJIalR4RHNqemlERzcwdA==','2025-08-24 00:45:12'),('henderson.larablog@gmail.com','cGhZSkh2Rk1aWnI0QnUwTVNjNUtOU0FGbzFUTkppUW5FQ3hwNTFyMjZFeHZ3RmVnUVhnNlUyTnZ6UURMMVZJeg==','2025-08-24 00:45:33'),('henderson.larablog@gmail.com','RHNvYXBEcXpGaWdac0hIb2hyaEJMc0ptZXVJQWFHYmNURHE1RVpmV2plZTdmbVc4dVczdkJSR1VjQmdDVkJ0Zg==','2025-08-24 01:06:06'),('henderson.larablog@gmail.com','VG8xcnJDb2x1emgweG1iTTNGS3o4Z1hlbHJ0Y2o3MVZMMXVkV1hvSW1lR2paWXBtQmd5SDY1dEZ5YkRZOEFpZw==','2025-08-24 01:08:02'),('henderson.larablog@gmail.com','T2pFWnJtTXBISko3QkJlZkhLMXVJeXg1Y0VmWWRDc0hyZE83MmRxRzk1Nnd5cHFUYlFndkpaMFd6NVR4Y0U5bA==','2025-08-24 01:17:25'),('henderson.larablog@gmail.com','ZVA2c1RWRERyVWV2SmJCNW15WjdyZXZTb1FRMXdiMEd4Z1N1Q2FuTWJ2bTQ1ZE4zYVhzWlVvV21SeVRBNndVdg==','2025-08-24 01:22:29'),('henderson.larablog@gmail.com','VFQ5MnhTYmR4NTFieWRqbnViRzBoTVZnOEJEeDI3WFpoRWhGNmQzeWZvenlXUUhEcG9iZXlmM0o1bUlERTBhZw==','2025-08-24 14:41:20'),('henderson.larablog@gmail.com','YVhrNnZqSDN0ODc2WUNSUGc3T0ZOa1lDSVdxUmpUMWJBdWNlcVRVVXBmSkdYd0RqWE5OU0lUNEVPWU1HMTNUdQ==','2025-08-24 14:43:42'),('henderson.larablog@gmail.com','SE16Y1R5ZW1hTXdkQlBPMk91a0F6dGhsTFZCTlQ0SGJSTHpQR0YzS2p2NU9FTXBERm50UGlHOElUTFVBNlFFVQ==','2025-08-24 15:29:42'),('henderson.larablog@gmail.com','c0h2b0E5eFlTVjU5OTF2T08wQklKRWNPUDJ1Ums2YWZxUXNBRE1JeUgyVWNwNUV1MGY2aWR3MXZwdVgyak5MOQ==','2025-08-24 15:32:38'),('henderson.larablog@gmail.com','OWhkWFpWOTlUdDhaaTJGMXUzMkI3OFpwSVJYdnZmTVVZeld0aEhKY2Z4alFnSGFEc25UZURQU2wwZkJMUGpONg==','2025-08-24 15:35:31'),('hendimghost2801@gmail.com','bDh1WUpqcklSTXU5RlljSFdEc1FsdUxwQ3lENjZxcWJnOVd2OXhWcUxuR285bjhsb0hXNXAxTmpjWTN0QlZjMg==','2025-08-24 16:09:26'),('Gabrielbertolo@hotmail.com','TWFWT2NQQ0hXZFRadmc5ZjVkdGdRazY5RTdOem5CTWl5RWRjMVF1bmJpRGRmTDd3aFc1dzZtNFcxYXRxQU1WcA==','2025-08-24 16:37:08');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci,
  `post_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (14,1,18,'CodeIgniter 4: Framework PHP Rápido e Elegante','codeigniter-4-framework-php-rapido-e-elegante','<p><!--StartFragment --></p>\r\n\r\n<p>O CodeIgniter 4 &eacute; a vers&atilde;o mais recente de um dos frameworks PHP mais leves e eficientes do mercado. Projetado para desenvolvedores que buscam simplicidade sem abrir m&atilde;o da performance, ele traz melhorias significativas em rela&ccedil;&atilde;o &agrave; vers&atilde;o anterior.</p>\r\n\r\n<p>? <strong>Principais novidades do CodeIgniter 4:</strong></p>\r\n\r\n<ul>\r\n	<li>Suporte completo ao PHP 7.4+ e 8.x</li>\r\n	<li>Estrutura orientada a namespaces e PSR-4</li>\r\n	<li>Sistema de rotas mais flex&iacute;vel e poderoso</li>\r\n	<li>CLI integrada para gera&ccedil;&atilde;o de c&oacute;digo e execu&ccedil;&atilde;o de tarefas</li>\r\n	<li>Migrations e Seeds para gerenciamento de banco de dados</li>\r\n</ul>\r\n\r\n<p>? <strong>Por que usar CodeIgniter 4?</strong> Se voc&ecirc; precisa desenvolver aplica&ccedil;&otilde;es web r&aacute;pidas, seguras e com baixo consumo de recursos, o CodeIgniter 4 &eacute; uma excelente escolha. Ele &eacute; ideal tanto para projetos pequenos quanto para sistemas robustos, com uma curva de aprendizado suave e documenta&ccedil;&atilde;o clara.</p>\r\n\r\n<p>? Comece agora: <a href=\"https://codeigniter.com/\">https://codeigniter.com</a></p>\r\n\r\n<p><!--EndFragment --></p>','tag,teste','1755570084_codeIgniter.png','2025-08-19 02:17:05','2025-08-23 02:08:38'),(15,1,20,'Flutter: Crie Apps Nativos com Uma Única Base de Código','flutter-crie-apps-nativos-com-uma-unica-base-de-codigo','<p><!--StartFragment -->O Flutter &eacute; o framework da Google para desenvolvimento de aplica&ccedil;&otilde;es nativas para Android, iOS, Web e Desktop &mdash; tudo com uma &uacute;nica base de c&oacute;digo em Dart. Com uma abordagem declarativa e componentes visuais altamente personaliz&aacute;veis, Flutter tem conquistado desenvolvedores no mundo todo.</p>\r\n\r\n<p>⚡ <strong>Principais vantagens do Flutter:</strong></p>\r\n\r\n<ul>\r\n	<li>Hot Reload: veja mudan&ccedil;as no c&oacute;digo em tempo real</li>\r\n	<li>UI rica e responsiva com widgets prontos e customiz&aacute;veis</li>\r\n	<li>Excelente performance com renderiza&ccedil;&atilde;o nativa</li>\r\n	<li>Comunidade ativa e vasta cole&ccedil;&atilde;o de pacotes</li>\r\n</ul>\r\n\r\n<p>? <strong>Ideal para quem quer:</strong></p>\r\n\r\n<ul>\r\n	<li>Criar apps bonitos e r&aacute;pidos sem duplicar c&oacute;digo</li>\r\n	<li>Lan&ccedil;ar em m&uacute;ltiplas plataformas com agilidade</li>\r\n	<li>Ter controle total sobre a interface e anima&ccedil;&otilde;es</li>\r\n</ul>\r\n\r\n<p>? Comece agora: <a href=\"https://flutter.dev\">https://flutter.dev</a></p>\r\n\r\n<p><!--EndFragment --></p>','tag,teste','1755570125_flutter.png','2025-08-19 02:18:44','2025-08-23 02:09:20'),(16,1,19,'CakePHP: Desenvolvimento Web Rápido com PHP','cakephp-desenvolvimento-web-rapido-com-php','<p>O CakePHP &eacute; um framework PHP maduro e robusto que segue o padr&atilde;o MVC e oferece uma estrutura s&oacute;lida para construir aplica&ccedil;&otilde;es web com rapidez e seguran&ccedil;a. Com conven&ccedil;&otilde;es inteligentes e ferramentas integradas, ele acelera o desenvolvimento sem sacrificar a organiza&ccedil;&atilde;o do c&oacute;digo.<br />\r\n? Destaques do CakePHP:<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Estrutura MVC clara e bem definida<br />\r\n&bull; &nbsp;&nbsp; &nbsp;ORM poderoso para manipula&ccedil;&atilde;o de banco de dados<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Sistema de rotas flex&iacute;vel e intuitivo<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Ferramentas de scaffolding e bake para gera&ccedil;&atilde;o autom&aacute;tica de c&oacute;digo<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Seguran&ccedil;a integrada com prote&ccedil;&atilde;o contra CSRF, SQL Injection e XSS<br />\r\n?&zwj;? Ideal para quem busca:<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Produtividade com c&oacute;digo limpo e organizado<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Conven&ccedil;&otilde;es que evitam decis&otilde;es repetitivas<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Um framework est&aacute;vel com comunidade ativa<br />\r\n? Comece agora: https://cakephp.org</p>\r\n\r\n<p><br />\r\n&nbsp;</p>','tag,teste','1755570061_cakePHP.png','2025-08-19 02:21:01','2025-08-23 02:09:28'),(17,1,15,'Laravel 8: Elegância e Poder no Desenvolvimento Web com PHP','laravel-8-elegancia-e-poder-no-desenvolvimento-web-com-php','<p>O Laravel 8 &eacute; uma das vers&otilde;es mais refinadas do framework PHP mais popular da atualidade. Com foco em produtividade, legibilidade e recursos modernos, ele oferece tudo o que voc&ecirc; precisa para criar aplica&ccedil;&otilde;es web robustas e escal&aacute;veis.<br />\r\n? Principais recursos do Laravel 8:<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Novos componentes de roteamento com &nbsp;e&nbsp;<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Jetstream: sistema de autentica&ccedil;&atilde;o moderno com Livewire ou Inertia.js<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Model Factory Classes para testes mais limpos e organizados<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Tailwind CSS integrado para interfaces modernas<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Melhorias no Job Batching e nas filas de tarefas<br />\r\n? Por que escolher Laravel 8?<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Sintaxe expressiva e intuitiva<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Ecossistema completo: Eloquent ORM, Blade, Artisan CLI, entre outros<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Comunidade vibrante e documenta&ccedil;&atilde;o impec&aacute;vel<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Ideal para projetos de qualquer escala &mdash; de MVPs a sistemas corporativos<br />\r\n? Comece agora: https://laravel.com<br />\r\n&nbsp;</p>','tag,teste','1755570180_Captura de tela 2025-08-16 163930.png','2025-08-19 02:23:00','2025-08-23 02:09:34'),(18,1,17,'Java: A Linguagem que Move o Mundo da Tecnologia','java-a-linguagem-que-move-o-mundo-da-tecnologia','<p>Java &eacute; uma das linguagens de programa&ccedil;&atilde;o mais populares e confi&aacute;veis do planeta. Criada em 1995, ela continua sendo a espinha dorsal de milh&otilde;es de aplica&ccedil;&otilde;es &mdash; de sistemas banc&aacute;rios a apps Android &mdash; gra&ccedil;as &agrave; sua portabilidade, seguran&ccedil;a e robustez.<br />\r\n? Por que Java ainda &eacute; essencial?<br />\r\n&bull; &nbsp;&nbsp; &nbsp;&ldquo;Escreva uma vez, execute em qualquer lugar&rdquo; com a JVM<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Forte tipagem e orienta&ccedil;&atilde;o a objetos<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Comunidade global e vasto ecossistema de bibliotecas<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Suporte corporativo s&oacute;lido com atualiza&ccedil;&otilde;es constantes<br />\r\n?️ Ideal para:<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Desenvolvimento de aplica&ccedil;&otilde;es empresariais<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Backend de sistemas web escal&aacute;veis<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Aplica&ccedil;&otilde;es m&oacute;veis (via Android)<br />\r\n&bull; &nbsp;&nbsp; &nbsp;Internet das Coisas (IoT) e Big Data<br />\r\n? Comece agora: Download Java<br />\r\n&nbsp;</p>','tag,teste','1755570234_Captura de tela 2025-08-16 163944.png','2025-08-19 02:23:54','2025-08-23 02:09:48'),(19,1,21,'Computadores','computadores','<p>Teste de RAM</p>','Tags,Post','1755571262_Captura de tela 2025-08-16 152311.png','2025-08-19 02:41:02','2025-08-23 02:06:39'),(20,1,20,'Testando a nova Tag','testando-a-nova-tag','<p>Post para testes da nova fun&ccedil;&atilde;o de salvar tags<br />\r\n<br />\r\n&nbsp;</p>','laravel,javascript,jquery,update','1755645966_Captura de tela 2025-08-16 163944.png','2025-08-19 23:26:06','2025-08-19 23:26:27'),(21,1,15,'Hensson: Criação da minha marca de desenvolvedor','hensson-criacao-da-minha-marca-de-desenvolvedor','<p>Inicio de um projeto que pode se tornar um sonho</p>','henderson,dev fullstak,dev web','1755646261_HendersonProfile.jpeg','2025-08-19 23:31:01','2025-08-19 23:31:01'),(22,1,15,'Blog: Um projeto de ponta pé inicial','blog-um-projeto-de-ponta-pe-inicial','<p>Cria&ccedil;&atilde;o de um blog somente para conhecimento integrando varias funcionalidades</p>','e-commerce,blog,portfolio','1755646335_HenssoAzulPNG.png','2025-08-19 23:32:15','2025-08-19 23:32:15'),(27,1,15,'Teste de Relatos','teste-de-relatos','<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>','Tag igual','1755915593_sekiro-shadows-die-twice-art-uhdpaper.com-8K-39.jpg','2025-08-23 02:19:54','2025-08-23 02:19:54'),(28,1,15,'Tesde de relatos 2','tesde-de-relatos-2','<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>','Tag igual','1755915618_Paisagem.jpg','2025-08-23 02:20:19','2025-08-23 02:20:19'),(29,1,22,'Pré-Venda EA SPORTS FC™ 26','pre-venda-ea-sports-fc-26','<h3>JOGABILIDADE REFORMULADA, IMPULSIONADA PELOS COMENT&Aacute;RIOS DA COMUNIDADE</h3>\r\n\r\n<p>Jogue do seu jeito no EA SPORTS FC&trade; 26 com condu&ccedil;&atilde;o mais responsiva, posicionamento de IA mais inteligente e movimentos mais precisos e explosivos com base nos coment&aacute;rios da comunidade. Os goleiros e goleiras agora reagem de forma mais natural com melhor posicionamento, anima&ccedil;&otilde;es mais realistas, e novos Estilos de jogo e Fun&ccedil;&otilde;es de atletas oferecem mais maneiras de moldar como sua equipe joga.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<h3>JOGUE DO SEU JEITO COM DUAS PREDEFINI&Ccedil;&Otilde;ES DE JOGABILIDADE DISTINTAS</h3>\r\n\r\n<p>O FC 26 apresenta duas novas predefini&ccedil;&otilde;es de jogabilidade, cada uma projetada para uma maneira diferente de jogar. Competitiva &eacute; ajustada para a&ccedil;&atilde;o frente a frente no Ultimate Team e Clubs, com passes mais r&aacute;pidos, rebotes mais inteligentes de goleiros e goleiras e controle mais direto, enquanto o Aut&ecirc;ntico traz uma sensa&ccedil;&atilde;o fiel ao futebol a modos como Carreira, com defensores mais respons&aacute;veis em termos de posicionamento, taxas de sucesso em escanteio realistas, disputas na pequena &aacute;rea mais pr&oacute;ximas da realidade, e mais.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<h3>CRIE E DESENVOLVA SUA ESTRELA PERFEITA COM ARQU&Eacute;TIPOS</h3>\r\n\r\n<p>Novos Arqu&eacute;tipos, inspirados por craques do esporte, introduzem novas classes ao Clubs e &agrave; Carreira de Atleta para trazer mais individualidade &agrave; personaliza&ccedil;&atilde;o e progress&atilde;o de atletas. Selecione um Arqu&eacute;tipo base e desenvolva suas qualidades ao longo da temporada, ganhando XP de Arqu&eacute;tipo, aprimorando qualidades e desbloqueando Vantagens de Arqu&eacute;tipo para ter um estilo verdadeiramente &uacute;nico em campo.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<h3>DESCUBRA MAIS MANEIRAS DE COMPETIR NO FOOTBALL ULTIMATE TEAM</h3>\r\n\r\n<p>Participe de novas formas de competi&ccedil;&atilde;o no Football Ultimate Team&trade; com torneios e eventos ao vivo, al&eacute;m de uma experi&ecirc;ncia renovada no Rivals e Champions. Os torneios v&atilde;o testar suas habilidades com at&eacute; quatro rodadas eliminat&oacute;rias, enquanto os Eventos ao Vivo adicionam mais variedade com competi&ccedil;&otilde;es tem&aacute;ticas e conte&uacute;do durante toda a temporada. Novas recompensas permitem ganhar mais ou acelerar seu progresso semanal. Al&eacute;m disso, o EA SPORTS FC&trade; 26 lan&ccedil;a Desafiantes, uma nova competi&ccedil;&atilde;o de segunda divis&atilde;o, voltada para quem est&aacute; nas divis&otilde;es de acesso.</p>\r\n\r\n<p>&nbsp;</p>','Games,Futebol','1755996519_Captura de tela 2025-08-23 214738.png','2025-08-24 00:48:39','2025-08-24 00:48:39');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category` int(11) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '10000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` VALUES (15,'Laravel 8','laravel-8',11,1,'2025-08-19 02:13:08','2025-08-19 23:08:04'),(16,'Kotlin','kotlin',10,4,'2025-08-19 02:13:18','2025-08-19 23:08:07'),(17,'Java','java',10,5,'2025-08-19 02:13:31','2025-08-19 23:08:03'),(18,'CodeIgniter','codeigniter',11,2,'2025-08-19 02:14:23','2025-08-19 23:08:06'),(19,'CakePHP','cakephp',11,3,'2025-08-19 02:14:31','2025-08-19 23:08:07'),(20,'Flutter','flutter',10,6,'2025-08-19 02:14:49','2025-08-19 23:07:53'),(21,'Computer','computer',0,7,'2025-08-19 02:40:36','2025-08-19 23:06:10'),(22,'Fifa 26','fifa-26',13,10000,'2025-08-24 00:46:47','2025-08-24 00:46:47');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Admin/Super Author','2025-08-08 01:41:52','2025-08-08 01:41:52'),(2,'Author','2025-08-12 00:36:30','2025-08-12 00:36:30');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` bigint(20) unsigned DEFAULT NULL,
  `direct_publish` text COLLATE utf8mb4_unicode_ci,
  `blocked` text COLLATE utf8mb4_unicode_ci,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_type_foreign` (`type`),
  CONSTRAINT `users_type_foreign` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Henderson','henderson.larablog@gmail.com','henderson',1,'1','0','/backend/dist/img/authors/AIMG1175556722875504.jpg','Blogger Developer',NULL,'$2y$10$NJfkZ/STpa8wta1shrohde1LVVFYyDNTQ.t5Tie4tEp3UfYC9gHDO',NULL,'2025-08-06 01:08:43','2025-08-19 01:33:48'),(2,'Vitu Catingueiro','hendimghost2801@gmail.com','henderson250',1,'1','0','/backend/dist/img/authors/AIMG2175496026543364.jpg','Developer Hidden',NULL,'$2y$10$YMUUF/gXwFRNcrUZOlWvRutVX1ySfIlWZ9OPnDZjbNi6/GZg3x1C2',NULL,'2025-08-12 00:43:54','2025-08-24 15:46:03'),(3,'André','andrezinhomatador@gmail.com','andre250',2,'1','0','/backend/dist/img/authors/AIMG3175496046222133.jpg','Desenvolver Full Stack',NULL,'$2y$10$352g.vJUIfoq.k3vx1xVaufdiTaufjTvBGWIBYqUHb3gfna215sIK',NULL,'2025-08-12 00:58:31','2025-08-12 21:56:28'),(10,'Giovanna','giovanna.blog@gmail.com','gigi250',1,'1','0','/backend/dist/img/authors/AIMG10175496384885312.jpg','Teste de criação de usuarios com a Esposa',NULL,'$2y$10$aQXPDM9bJv38Rt6Sbatcj.fs3F8m5UDU0.4afxi8Nd.xO4vJskZCK',NULL,'2025-08-12 01:56:13','2025-08-16 04:33:17'),(12,'Higor Faria','higuinho@gmail.com','higraun',2,'1','0','/backend/dist/img/authors/default.jpg',NULL,NULL,'$2y$10$Em2vYdIWMb7bfCFK6XZNM.pTDckMYG2kCSz8dKLvj0Lago78l5hom',NULL,'2025-08-12 02:13:57','2025-08-12 02:13:57'),(16,'Felipe Camilo','felipe.camilo@gmail.com','felipinho',1,'1','0','/backend/dist/img/authors/AIMG16175529774789175.jpg',NULL,NULL,'$2y$10$QGN74HvHqT.LBv1SepY5Cu8yV/8iC1Wg45EorPYi3JkifZTehGJi.',NULL,'2025-08-15 22:40:54','2025-08-15 22:43:05'),(19,'Gabriel Bertolo','Gabrielbertolo@hotmail.com','gabriel250',1,'1',NULL,'/backend/dist/img/authors/default.jpg',NULL,NULL,'$2y$10$GSBuK2jkAZfXDySk/kd48OGjYl2J0jXqtgJ8g7irkpxsxVkZi.zra',NULL,'2025-08-24 16:34:37','2025-08-24 16:34:37'),(20,'Henderson Dev','hensson.dev@gmail.com','hensso',1,'1',NULL,'/backend/dist/img/authors/default.jpg',NULL,NULL,'$2y$10$0wRkvrqTwIZnHjG9qrfXz..nyYJEWagAJTFwl8n0ytHsKeCO4dtqy',NULL,'2025-08-24 16:35:22','2025-08-24 16:44:58');
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

-- Dump completed on 2025-08-24 13:56:36
