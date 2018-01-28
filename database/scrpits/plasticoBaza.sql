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


-- Zrzut struktury bazy danych plasticobaza
CREATE DATABASE IF NOT EXISTS `plasticobaza` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `plasticobaza`;

-- Zrzut struktury tabela plasticobaza.admins
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

-- Zrzucanie danych dla tabeli plasticobaza.admins: ~0 rows (około)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', '$2y$10$/TKx.2N4F8rHtBdqyMJj.ecy/ebhlBTLiy5ZphdaK8FgxV5WEbGmW', NULL, NULL, NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.customers
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

-- Zrzucanie danych dla tabeli plasticobaza.customers: ~2 rows (około)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `imie`, `nazwisko`, `adres`, `telefon`, `email`, `nip`, `kod`, `poczta`, `created_at`, `updated_at`) VALUES
	(1, 'Jan', 'Kowalski', 'asd', 'asda', 'asd', 'asd', 'asdasd', 'asd', NULL, '2018-01-02 17:11:33'),
	(2, 'Andrzej', 'Nowak', 'asd', '444333444', 'asd', 'asd1312312', 'asdasd', 'dasdssd', '2017-10-25 00:23:18', '2018-01-17 12:33:12');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.events
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.events: ~7 rows (około)
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
	(25, NULL, 'asdasd', '2018-01-03 16:45:45', '2018-01-16 16:41:51', NULL, NULL, '2018-01-16 15:41:56', '2018-01-16 15:41:56'),
	(26, NULL, 'asd', '2018-01-10 20:30:45', '2018-01-25 20:28:45', NULL, NULL, '2018-01-25 19:28:46', '2018-01-25 19:28:46');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.eventtypes
CREATE TABLE IF NOT EXISTS `eventtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.eventtypes: ~4 rows (około)
/*!40000 ALTER TABLE `eventtypes` DISABLE KEYS */;
INSERT INTO `eventtypes` (`id`, `nazwa`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Inna sprawa...', NULL, NULL, NULL),
	(2, 'Konsultacja', NULL, NULL, NULL),
	(3, 'Pomiar', NULL, NULL, NULL),
	(4, 'Montaz', NULL, NULL, NULL);
/*!40000 ALTER TABLE `eventtypes` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.migrations: ~5 rows (około)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_06_05_153753_create_admins_table', 1),
	(4, '2017_08_24_123504_create_klients_table', 1),
	(5, '2017_09_19_102420_create_events_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.orderproducts
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

-- Zrzucanie danych dla tabeli plasticobaza.orderproducts: ~0 rows (około)
/*!40000 ALTER TABLE `orderproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderproducts` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.orders
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.orders: ~8 rows (około)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `nazwa`, `kosztCalkowity`, `terminRealizacji`, `dataRealizacji`, `customer_id`, `created_at`, `updated_at`) VALUES
	(29, 'asd', NULL, '2017-11-29', '2017-11-29', 1, '2017-11-29 12:54:47', '2017-11-29 12:54:47'),
	(30, 'asd', NULL, '2017-11-29', '2017-11-29', 1, '2017-11-29 13:03:17', '2017-11-29 13:03:17'),
	(34, 'asdasd', NULL, '2018-01-26', '2018-01-26', 1, '2018-01-26 20:10:34', '2018-01-26 20:10:34'),
	(35, 'asd', NULL, '2018-01-26', '2018-01-26', 1, '2018-01-26 20:11:19', '2018-01-26 20:11:19'),
	(36, '123', NULL, '2018-01-26', '2018-01-26', 1, '2018-01-26 20:11:46', '2018-01-26 20:11:46'),
	(37, '123', NULL, '2018-01-26', '2018-01-26', 1, '2018-01-26 20:13:11', '2018-01-26 20:13:11'),
	(38, '123', NULL, '2018-01-26', '2018-01-26', 1, '2018-01-26 20:14:08', '2018-01-26 20:14:08'),
	(39, '123', NULL, '2018-01-26', '2018-01-26', 1, '2018-01-26 20:14:13', '2018-01-26 20:14:13');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.parameters
CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.parameters: ~0 rows (około)
/*!40000 ALTER TABLE `parameters` DISABLE KEYS */;
INSERT INTO `parameters` (`id`, `nazwa`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Wysokość\r\n', NULL, NULL, NULL),
	(2, 'Szerokość', NULL, NULL, NULL),
	(3, 'Długość', NULL, NULL, NULL),
	(4, 'Szerokość profilu', NULL, NULL, NULL),
	(5, 'Kolor', NULL, NULL, NULL),
	(6, 'Kolor ciepłej ramki', NULL, NULL, NULL),
	(7, 'Klamki', NULL, NULL, NULL),
	(8, 'Oscieżnica', NULL, NULL, NULL),
	(9, 'Wizjer', NULL, NULL, NULL),
	(10, 'Typ', NULL, NULL, NULL),
	(11, 'Tworzywo', NULL, NULL, NULL),
	(12, 'Zakończenie', NULL, NULL, NULL),
	(13, 'Klipsy', NULL, NULL, NULL);
/*!40000 ALTER TABLE `parameters` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.paramvalue
CREATE TABLE IF NOT EXISTS `paramvalue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderProduct_id` int(10) unsigned NOT NULL,
  `producttypeparam_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paramvalue_orderProduct_id_foreign` (`orderProduct_id`),
  KEY `paramvalue_parameters_id_foreign` (`producttypeparam_id`),
  CONSTRAINT `paramvalue_orderProduct_id_foreign` FOREIGN KEY (`orderProduct_id`) REFERENCES `orderproducts` (`id`),
  CONSTRAINT `paramvalue_parameters_id_foreign` FOREIGN KEY (`producttypeparam_id`) REFERENCES `producttypeparams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.paramvalue: ~0 rows (około)
/*!40000 ALTER TABLE `paramvalue` DISABLE KEYS */;
/*!40000 ALTER TABLE `paramvalue` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.password_resets: ~0 rows (około)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.products
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.products: ~8 rows (około)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `nazwa`, `opis`, `productType_id`, `created_at`, `updated_at`) VALUES
	(40, 'COs tasd', 'asd', 1, '2018-01-21 19:22:50', '2018-01-21 19:22:50'),
	(42, 'asdasd', 'cost tam', 1, '2018-01-21 19:23:48', '2018-01-21 19:40:57'),
	(43, 'Parapet Amino', 'Marmurowy', 5, '2018-01-25 18:17:15', '2018-01-25 18:17:15'),
	(44, 'asd', 'sad', 2, '2018-01-26 11:55:03', '2018-01-26 11:55:03'),
	(45, 'ALUPLAST IDEAL 8000', NULL, 1, '2018-01-26 18:30:42', '2018-01-26 18:30:42'),
	(46, 'ALUPLAST IDEAL 7000', NULL, 1, '2018-01-26 18:31:59', '2018-01-26 18:31:59'),
	(47, 'asd', NULL, 1, '2018-01-26 18:46:51', '2018-01-26 18:46:51'),
	(48, 'Standardowa', NULL, 9, '2018-01-26 19:00:30', '2018-01-26 19:00:30');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.producttypeparams
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
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.producttypeparams: ~0 rows (około)
/*!40000 ALTER TABLE `producttypeparams` DISABLE KEYS */;
INSERT INTO `producttypeparams` (`id`, `opis`, `productType_id`, `parameters_id`, `created_at`, `updated_at`) VALUES
	(1, 'Wysokość okna', 1, 1, NULL, NULL),
	(2, 'Szerokość okna', 1, 2, NULL, NULL),
	(3, 'Szerokość profilu', 1, 4, NULL, NULL),
	(4, 'Kolor okna', 1, 5, NULL, NULL),
	(5, 'Kolor ciepłej ramki', 1, 6, NULL, NULL),
	(6, 'Klamki', 1, 7, NULL, NULL),
	(7, 'Wysokość drzwi', 2, 1, NULL, NULL),
	(8, 'Szerokość drzwi', 2, 2, NULL, NULL),
	(9, 'Ościeżnica', 2, 8, NULL, NULL),
	(10, 'Wizjer', 2, 9, NULL, NULL),
	(11, 'Klamki', 2, 7, NULL, NULL),
	(12, 'Wysokość drzwi', 3, 1, NULL, NULL),
	(13, 'Szerokość drzwi', 3, 2, NULL, NULL),
	(14, 'Ościeżnica', 3, 8, NULL, NULL),
	(15, 'Klamki', 3, 7, NULL, NULL),
	(16, 'Wysokość bramy', 4, 1, NULL, NULL),
	(17, 'Szerokość bramy', 4, 2, NULL, NULL),
	(18, 'Kolor bramy', 4, 5, NULL, NULL),
	(19, 'Typ bramy', 4, 10, NULL, NULL),
	(20, 'Długość parapetu', 5, 3, NULL, NULL),
	(21, 'Szerokość parapetu', 5, 2, NULL, NULL),
	(22, 'Tworzywo', 5, 11, NULL, NULL),
	(23, 'Zakończenie', 5, 12, NULL, NULL),
	(24, 'Długość parapetu', 6, 3, NULL, NULL),
	(25, 'Szerokość parapetu', 6, 2, NULL, NULL),
	(26, 'Tworzywo', 6, 11, NULL, NULL),
	(27, 'Zakończenie', 6, 12, NULL, NULL),
	(28, 'Długość Rolety', 7, 3, NULL, NULL),
	(29, 'Szerokość Rolety', 7, 2, NULL, NULL),
	(30, 'Typ Rolety', 7, 10, NULL, NULL),
	(31, 'Tworzywo', 7, 11, NULL, NULL),
	(32, 'Kolor Rolety', 7, 5, NULL, NULL),
	(33, 'Długość Rolety', 8, 3, NULL, NULL),
	(34, 'Szerokość Rolety', 8, 2, NULL, NULL),
	(35, 'Typ Rolety', 8, 10, NULL, NULL),
	(36, 'Kolor Materiału', 8, 5, NULL, NULL),
	(37, 'Wysokość moskitiery', 9, 1, NULL, NULL),
	(38, 'Szerokość moskitiery', 9, 2, NULL, NULL),
	(39, 'Kolor moskitiery', 9, 5, NULL, NULL),
	(40, 'Klipsy', 9, 13, NULL, NULL);
/*!40000 ALTER TABLE `producttypeparams` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.producttypes
CREATE TABLE IF NOT EXISTS `producttypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.producttypes: ~0 rows (około)
/*!40000 ALTER TABLE `producttypes` DISABLE KEYS */;
INSERT INTO `producttypes` (`id`, `nazwa`, `created_at`, `updated_at`) VALUES
	(1, 'Okno', NULL, NULL),
	(2, 'Drzwi Zewnętrzne', NULL, NULL),
	(3, 'Drzwi Wewnętrzne', NULL, NULL),
	(4, 'Brama Garażowa', NULL, NULL),
	(5, 'Parapet Zewnętrzny', NULL, NULL),
	(6, 'Parapet Wewnętrzny', NULL, NULL),
	(7, 'Roleta Zewnętrzna', NULL, NULL),
	(8, 'Roleta Wewnętrzna', NULL, NULL),
	(9, 'Moskitiera', NULL, NULL);
/*!40000 ALTER TABLE `producttypes` ENABLE KEYS */;

-- Zrzut struktury tabela plasticobaza.users
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

-- Zrzucanie danych dla tabeli plasticobaza.users: ~0 rows (około)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Andrzej', 'andrzej@gmail.com', '$2y$10$PTnDtvFhq1HQu/4ZdZfiOeGD2mkk.wXyAFLs9LZDwxgeCV8C/XFcC', 'olmdVpqnjz8aDv9uHwfn8blPjpScFfqISJ3anYnurDHzBkVJKqVwD0ufu3Yr', '2017-10-24 21:58:34', '2017-10-24 21:58:34'),
	(2, 'bluczak', 'anclaan@gmail.com', '$2y$10$fVWCqn9BLMMfrfmI0YlGeefVofwHT4dEPvHDFpDiA89F6PSGNVlY2', 'YIklQY3VlifwURdETTCeQIZGCBkf9mwcsAhbDxmvFC0r68HbLD2Pp8uT6Q9q', '2017-10-24 22:16:53', '2017-10-24 22:16:53'),
	(3, 'jnowak', 'jnowak@wp.pl', '$2y$10$kq8nt3B2Hi5OX9MOpgKgq.oYYZx20apmrSNUMF6bIu7ip8bWe3BcC', 'ixCDVHgi2YyTzKHC10Kt54FSLFdodmB9bPvAu7JYzuyZNzaNARHWitDIv668', '2017-10-24 22:17:13', '2017-10-24 22:17:13'),
	(4, 'user123', 'user123@gmail.com', '$2y$10$0ALvcUA6f4cX1ynOoJmjCeBd.3Z17yWDEZVLcTHYgX779auby/JRW', 'iwhEk0MtMbfv16sX1b126KjIdUJUByLSSQENhuy3hUEUIHd7R83uDPiP30Mz', '2017-10-24 22:17:38', '2017-10-24 22:17:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
