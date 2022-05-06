-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para catalogo
CREATE DATABASE IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `catalogo`;

-- Volcando estructura para tabla catalogo.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.ciudades: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` (`id`, `nombre`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
	(1, 'Cali2', '3.3950619', '-76.5957046', NULL, '2022-05-06 15:21:28'),
	(2, 'Pasto', '1.2135252', '-77.3122422', NULL, NULL),
	(3, 'Medellin', '6.2441988', '-75.6512522', NULL, NULL),
	(4, 'Bogota', '4.6482837', '-74.2478941', NULL, NULL),
	(5, 'Popayan', '2.4573845', '-76.6349536', NULL, NULL),
	(6, 'Pereira', '4.8047737', '-75.7487811', NULL, NULL);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.migrations: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2022_05_06_000001_create_ciudades_table', 1),
	(5, '2022_05_06_000002_create_productociudad_table', 1),
	(6, '2022_05_06_000003_create_productos_table', 1),
	(7, '2022_05_06_009001_add_foreigns_to_productociudad_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.productociudad
CREATE TABLE IF NOT EXISTS `productociudad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ciudades_id` bigint(20) unsigned NOT NULL,
  `productos_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productociudad_ciudades_id_foreign` (`ciudades_id`),
  KEY `productociudad_productos_id_foreign` (`productos_id`),
  CONSTRAINT `productociudad_ciudades_id_foreign` FOREIGN KEY (`ciudades_id`) REFERENCES `ciudades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productociudad_productos_id_foreign` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.productociudad: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `productociudad` DISABLE KEYS */;
INSERT INTO `productociudad` (`id`, `ciudades_id`, `productos_id`, `cantidad`) VALUES
	(1, 2, 1, 2),
	(2, 1, 2, 3),
	(3, 3, 1, 3),
	(4, 4, 1, 4),
	(7, 1, 9, 1),
	(8, 2, 9, 2),
	(9, 5, 1, 8);
/*!40000 ALTER TABLE `productociudad` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.productos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `observacion`, `created_at`, `updated_at`) VALUES
	(1, 'PC Gamer Asus', '3000000', '', 'ninguna', NULL, NULL),
	(2, 'Impresora', '650000', '', 'referencia 365', NULL, NULL),
	(3, 'mouse', '40000', '', 'referencia 888', NULL, NULL),
	(4, 'Teclado', '40000', '', 'referencia 999', NULL, NULL),
	(9, 'Borrador', '12000', 'public/XrQjoayEkOGAWRC9fa0O2VPkoRxlDuZZtJLLDJK1.png', '1', '2022-05-06 16:35:58', '2022-05-06 16:35:58');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.users: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Bernice Casper', 'admin@admin.com', '2022-05-06 14:31:07', '$2y$10$aGtJEVUcQu8H24yqDHiMu.MwoUnVavquZEWulVOcI9iiKWfmPZu6G', '6UnaTmn4vC6mkgDJDKvYOf6DpGN51Vx7pHwjKs4Ccqxp1cvq1UDQSzCV3iQM', '2022-05-06 14:31:08', '2022-05-06 14:31:08'),
	(2, 'Mrs. Mittie Padberg', 'henri82@gaylord.net', '2022-05-06 14:31:08', '$2y$10$BWb3jkj3NcxPNZEPqtUfTOkXwYpMkVWtk1go4jX6upvCQP7SI38Rm', 'XTnaIBo4sr', '2022-05-06 14:31:09', '2022-05-06 14:31:09'),
	(3, 'Meghan Bode', 'krystina.nitzsche@kulas.com', '2022-05-06 14:31:08', '$2y$10$fGtRWZuZrjP2hrsALPL8Ou13NFzOK/tZ/cYt8SwtNO2ZYXipHiJa6', 'Z625JhMnsB', '2022-05-06 14:31:09', '2022-05-06 14:31:09'),
	(4, 'Cristian Dicki MD', 'idella82@kshlerin.com', '2022-05-06 14:31:08', '$2y$10$rLlVsB07yrbMtDrWD4krOOnN6ZSfm9/S0O6c7v3d1WRHV4fF16tda', 'zz6vxJ40qx', '2022-05-06 14:31:09', '2022-05-06 14:31:09'),
	(5, 'Jamil Streich', 'bogan.leatha@kassulke.com', '2022-05-06 14:31:08', '$2y$10$DxNTbIdjnWoA9QlIc7URduvLCdqeMdAbdg1BgH7uBUeKMgfpkDwdK', 'aiOnFHsG4N', '2022-05-06 14:31:09', '2022-05-06 14:31:09'),
	(6, 'Ben Dicki DDS', 'taurean.wyman@gmail.com', '2022-05-06 14:31:09', '$2y$10$bP5ZYL0yqxRn.xk/V1fjn.g64SBF.CwHwUR6gEW6bOybFoubEsr7m', 'DUjd40o5Pz', '2022-05-06 14:31:09', '2022-05-06 14:31:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
