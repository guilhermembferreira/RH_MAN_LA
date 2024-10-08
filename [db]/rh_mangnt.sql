-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para db_rh_mangnt
CREATE DATABASE IF NOT EXISTS `db_rh_mangnt` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_rh_mangnt`;

-- A despejar estrutura para tabela db_rh_mangnt.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela db_rh_mangnt.departments: ~0 rows (aproximadamente)
INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Administração', '2024-09-25 20:14:37', '2024-09-25 20:14:37');

-- A despejar estrutura para tabela db_rh_mangnt.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela db_rh_mangnt.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2024_09_25_205429_create_users_table', 1),
	(2, '2024_09_25_205450_create_user_details_table', 1),
	(3, '2024_09_25_205458_create_user_departments_table', 1),
	(4, '2024_09_25_215737_add_two_factor_columns_to_users_table', 2),
	(5, '2024_10_06_142904_add_remember_token_to_users_table', 2);

-- A despejar estrutura para tabela db_rh_mangnt.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela db_rh_mangnt.password_reset_tokens: ~1 rows (aproximadamente)

-- A despejar estrutura para tabela db_rh_mangnt.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela db_rh_mangnt.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`id`, `department_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `two_factor_secret`, `two_factor_recovery_codes`, `role`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Administrador', 'admin@rhmangnt.com', '2024-09-25 20:14:36', '$2y$12$2dkGO.ymNLs7Bz1fEY0TYuXbDdb5gtCApXs0G9JMRR7vYHQms4wRO', 'gnIW6LfYfy7lZzh2Euw3IMdo0UfAwKkhhkk5f2LXSkhAb4Vlwq40wAZg5WMU', NULL, NULL, 'admin', '["admin"]', '2024-09-25 20:14:37', '2024-10-08 09:30:24', NULL);

-- A despejar estrutura para tabela db_rh_mangnt.user_details
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `admission_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela db_rh_mangnt.user_details: ~0 rows (aproximadamente)
INSERT INTO `user_details` (`id`, `user_id`, `address`, `zip_code`, `city`, `phone`, `salary`, `admission_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Rua do Administrador, 123', '1234-123', 'Lisboa', '900000001', 8000.00, '2020-01-01', '2024-09-25 20:14:37', '2024-09-25 20:14:37');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
