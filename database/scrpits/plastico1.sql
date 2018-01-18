-- --------------------------------------------------------
-- Host:                         localhost
-- Wersja serwera:               10.2.6-MariaDB-log - mariadb.org binary distribution
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych plastico
CREATE DATABASE IF NOT EXISTS `plasticoBaza` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `plasticoBaza`;

-- Zrzut struktury tabela plastico.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.admins: ~0 rows (około)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', '$2y$10$/TKx.2N4F8rHtBdqyMJj.ecy/ebhlBTLiy5ZphdaK8FgxV5WEbGmW', NULL, NULL, NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kod` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poczta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.customers: ~3 rows (około)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `imie`, `nazwisko`, `adres`, `telefon`, `email`, `nip`, `kod`, `poczta`, `created_at`, `updated_at`) VALUES
	(1, 'Jan', 'Kowalski', 'asd', 'asda', 'asd', 'asd', 'asdasd', 'asd', NULL, '2018-01-02 17:11:33'),
	(2, 'Andrzej', 'Nowak', 'asd', '444333444', 'asd', 'asd1312312', 'asdasd', 'dasdssd', '2017-10-25 00:23:18', '2018-01-17 12:33:12'),
	(5, 'Joanna', 'Kwasniewska', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'sdsdasdasdasdasds', '2017-12-10 11:31:08', '2018-01-13 16:22:47');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `eventType_id` int(10) unsigned DEFAULT NULL,
  `opis` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_customer_id_foreign` (`customer_id`),
  KEY `events_eventType_id_foreign` (`eventType_id`),
  CONSTRAINT `events_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `events_klient_id_foreign` FOREIGN KEY (`eventType_id`) REFERENCES `eventtypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.events: ~12 rows (około)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `customer_id`, `title`, `start`, `end`, `eventType_id`, `opis`, `created_at`, `updated_at`) VALUES
	(3, NULL, 'asd', '2017-10-05 22:00:30', '2017-10-05 21:56:54', 1, NULL, '2017-10-24 19:57:05', '2017-10-24 19:57:05'),
	(6, NULL, 'hhh', '2017-10-04 22:00:45', '2017-10-04 21:59:49', 1, NULL, '2017-10-24 19:59:54', '2017-10-24 19:59:54'),
	(12, NULL, 'montaz', '2017-11-05 22:00:15', '2017-11-05 23:49:23', 1, NULL, '2017-11-05 20:49:27', '2017-11-05 20:49:27'),
	(13, NULL, 'montaz', '2017-11-05 22:00:30', '2017-11-05 22:52:30', 1, NULL, '2017-11-05 20:52:35', '2017-11-05 20:52:35'),
	(15, 2, 'montazz', '2017-11-05 22:15:30', '2017-11-05 23:15:29', 1, NULL, '2017-11-05 21:15:41', '2017-11-05 21:15:41'),
	(16, NULL, 'Okna dachowe, Kalinowa', '2017-11-03 14:15:15', '2017-11-03 16:04:45', NULL, NULL, '2017-11-23 21:06:31', '2017-11-24 16:08:51'),
	(19, NULL, 'Pomiar Andrzej', '2017-11-02 17:15:30', '2017-11-02 19:21:26', NULL, NULL, '2017-11-24 16:21:44', '2017-11-24 16:50:09'),
	(20, NULL, '123123', '2017-12-09 12:45:45', '2017-12-10 12:31:48', NULL, NULL, '2017-12-10 11:31:51', '2017-12-10 11:32:04'),
	(21, NULL, '123', '2017-12-09 12:45:00', '2017-12-10 12:31:55', NULL, '123', '2017-12-10 11:31:57', '2017-12-10 11:31:57'),
	(22, NULL, 'Montaż Okien Jakubice', '2018-01-02 14:15:30', '2018-01-02 16:13:24', NULL, NULL, '2018-01-02 17:10:31', '2018-01-02 17:13:33'),
	(23, 1, 'Konsultacja', '2018-01-02 08:15:00', '2018-01-02 13:12:51', 16, NULL, '2018-01-02 17:12:59', '2018-01-02 17:12:59'),
	(24, NULL, 'Pomiar parapetów Kosciuszki 29', '2018-01-04 12:15:45', '2018-01-04 13:15:11', NULL, NULL, '2018-01-02 17:15:22', '2018-01-02 17:15:22'),
	(25, NULL, 'asdasd', '2018-01-03 16:45:45', '2018-01-16 16:41:51', NULL, NULL, '2018-01-16 15:41:56', '2018-01-16 15:41:56');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.eventtypes
CREATE TABLE IF NOT EXISTS `eventtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.eventtypes: ~4 rows (około)
/*!40000 ALTER TABLE `eventtypes` DISABLE KEYS */;
INSERT INTO `eventtypes` (`id`, `nazwa`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Inna sprawa...', NULL, NULL, NULL),
	(2, 'Konsultacja', NULL, NULL, NULL),
	(3, 'Pomiar', NULL, NULL, NULL),
	(4, 'Montaz', NULL, NULL, NULL);
/*!40000 ALTER TABLE `eventtypes` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.migrations: ~5 rows (około)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_06_05_153753_create_admins_table', 1),
	(4, '2017_08_24_123504_create_klients_table', 1),
	(5, '2017_09_19_102420_create_events_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Zrzut struktury tabela plastico.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kosztCalkowity` decimal(8,2) DEFAULT NULL,
  `terminRealizacji` date DEFAULT NULL,
  `dataRealizacji` date DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customers_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customers_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.orders: ~2 rows (około)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `nazwa`, `kosztCalkowity`, `terminRealizacji`, `dataRealizacji`, `customer_id`, `created_at`, `updated_at`) VALUES
	(29, 'asd', NULL, '2017-11-29', '2017-11-29', 1, '2017-11-29 12:54:47', '2017-11-29 12:54:47'),
	(30, 'asd', NULL, '2017-11-29', '2017-11-29', 1, '2017-11-29 13:03:17', '2017-11-29 13:03:17');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.parameters
CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.parameters: ~0 rows (około)
/*!40000 ALTER TABLE `parameters` DISABLE KEYS */;
/*!40000 ALTER TABLE `parameters` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.paramvalue
CREATE TABLE IF NOT EXISTS `paramvalue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `producttypeparam_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paramvalue_product_id_foreign` (`product_id`),
  KEY `paramvalue_parameters_id_foreign` (`producttypeparam_id`),
  CONSTRAINT `paramvalue_parameters_id_foreign` FOREIGN KEY (`producttypeparam_id`) REFERENCES `producttypeparams` (`id`),
  CONSTRAINT `paramvalue_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.paramvalue: ~0 rows (około)
/*!40000 ALTER TABLE `paramvalue` DISABLE KEYS */;
/*!40000 ALTER TABLE `paramvalue` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- Zrzut struktury tabela plastico.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productType_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_productType_id_foreign` (`productType_id`),
  CONSTRAINT `products_productType_id_foreign` FOREIGN KEY (`productType_id`) REFERENCES `producttypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.products: ~0 rows (około)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.producttypeparams
CREATE TABLE IF NOT EXISTS `producttypeparams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productType_id` int(10) unsigned NOT NULL,
  `parameters_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producttypeparams_producttype_id_foreign` (`productType_id`),
  KEY `producttypeparams_parameters_id_foreign` (`parameters_id`),
  CONSTRAINT `producttypeparams_parameters_id_foreign` FOREIGN KEY (`parameters_id`) REFERENCES `parameters` (`id`),
  CONSTRAINT `producttypeparams_producttype_id_foreign` FOREIGN KEY (`productType_id`) REFERENCES `producttypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.producttypeparams: ~0 rows (około)
/*!40000 ALTER TABLE `producttypeparams` DISABLE KEYS */;
/*!40000 ALTER TABLE `producttypeparams` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.producttypes
CREATE TABLE IF NOT EXISTS `producttypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.producttypes: ~2 rows (około)
/*!40000 ALTER TABLE `producttypes` DISABLE KEYS */;
INSERT INTO `producttypes` (`id`, `nazwa`, `created_at`, `updated_at`) VALUES
	(3, 'Okno Wewnętrzne', NULL, NULL),
	(4, 'Drzwi Zewnętrzne', NULL, NULL);
/*!40000 ALTER TABLE `producttypes` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.users: ~4 rows (około)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Andrzej', 'andrzej@gmail.com', '$2y$10$PTnDtvFhq1HQu/4ZdZfiOeGD2mkk.wXyAFLs9LZDwxgeCV8C/XFcC', 'olmdVpqnjz8aDv9uHwfn8blPjpScFfqISJ3anYnurDHzBkVJKqVwD0ufu3Yr', '2017-10-24 21:58:34', '2017-10-24 21:58:34'),
	(2, 'bluczak', 'anclaan@gmail.com', '$2y$10$fVWCqn9BLMMfrfmI0YlGeefVofwHT4dEPvHDFpDiA89F6PSGNVlY2', 'YIklQY3VlifwURdETTCeQIZGCBkf9mwcsAhbDxmvFC0r68HbLD2Pp8uT6Q9q', '2017-10-24 22:16:53', '2017-10-24 22:16:53'),
	(3, 'jnowak', 'jnowak@wp.pl', '$2y$10$kq8nt3B2Hi5OX9MOpgKgq.oYYZx20apmrSNUMF6bIu7ip8bWe3BcC', 'ixCDVHgi2YyTzKHC10Kt54FSLFdodmB9bPvAu7JYzuyZNzaNARHWitDIv668', '2017-10-24 22:17:13', '2017-10-24 22:17:13'),
	(4, 'user123', 'user123@gmail.com', '$2y$10$0ALvcUA6f4cX1ynOoJmjCeBd.3Z17yWDEZVLcTHYgX779auby/JRW', 'iwhEk0MtMbfv16sX1b126KjIdUJUByLSSQENhuy3hUEUIHd7R83uDPiP30Mz', '2017-10-24 22:17:38', '2017-10-24 22:17:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `producttypeparams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opis` varchar(255) NULL,
  `productType_id` int(10) unsigned NOT NULL,
  `parameters_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producttypeparams_producttype_id_foreign` (`productType_id`),
  KEY `producttypeparams_parameters_id_foreign` (`parameters_id`),
  CONSTRAINT `producttypeparams_producttype_id_foreign` FOREIGN KEY (`productType_id`) REFERENCES `producttypes` (`id`),
  CONSTRAINT `producttypeparams_parameters_id_foreign` FOREIGN KEY (`parameters_id`) REFERENCES `parameters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `orderproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cenaProduktu` decimal(10,0) NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `opis` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderproducts_order_id_foreign` (`order_id`),
  KEY `orderproducst_product_id_foreign` (`product_id`),
  CONSTRAINT `orderproducts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `orderproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `paramvalue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opis` varchar(255) NULL,
  `orderproduct_id` int(10) unsigned NOT NULL,
  `producttypeparam_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paramvalue_orderproduct_id_foreign` (`orderproduct_id`),
  KEY `paramvalue_parameters_id_foreign` (`producttypeparam_id`),
  CONSTRAINT `paramvalue_orderproduct_id_foreign` FOREIGN KEY (`orderproduct_id`) REFERENCES `orderproducts` (`id`),
  CONSTRAINT `paramvalue_parameters_id_foreign` FOREIGN KEY (`producttypeparam_id`) REFERENCES `producttypeparams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
