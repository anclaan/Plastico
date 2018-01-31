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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.customers: ~7 rows (około)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `imie`, `nazwisko`, `adres`, `telefon`, `email`, `nip`, `kod`, `poczta`, `created_at`, `updated_at`) VALUES
	(1, 'Jan', 'Kowalski', 'Wójcice 29', '506607798', 'janek23@gmail.com', '5233466548', '98-235', 'Błaszki', NULL, '2018-01-28 21:06:38'),
	(2, 'Andrzej', 'Nowak', 'Łubna 22', '444333444', 'anowak@gmail.com', '7856455296', '98-235', 'Błaszki', '2017-10-25 00:23:18', '2018-01-28 21:07:07'),
	(7, 'Janusz', 'Krupczyński', 'ul. Sulwińskiego 11', '565498976', 'krupaaa123@gmail.com', '7895642345', '98-235', 'Błaszki', '2018-01-28 21:08:04', '2018-01-28 21:08:04'),
	(8, 'Anna', 'Andrzejewska', 'Kokoszki 10', '789564231', 'aandrzejewskaa@gmail.com', '7862314665', '98-235', 'Błaszki', '2018-01-28 21:08:48', '2018-01-28 21:08:48'),
	(9, 'Joanna', 'Pieszkowska', 'Kaliska 11', '756426582', 'pieszkowska.a@wp.pl', '7564215248', '98-235', 'Błaszki', '2018-01-28 21:09:54', '2018-01-28 21:09:54'),
	(10, 'Maciej', 'Furmaniak', 'Brudzew 29', '603845655', 'furmaniak.m@tt.com.pl', NULL, '98-235', 'Błaszki', '2018-01-31 01:39:52', '2018-01-31 01:39:52'),
	(11, 'Bartosz', 'Dębicki', 'Biała 69', '608892523', 'debicki.b@gmail.com', '9874653211', '00-700', 'Tumidaj', '2018-01-31 01:43:40', '2018-01-31 01:43:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.events: ~13 rows (około)
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
	(27, NULL, 'Montaż okien i parapetów w Łubnej', '2018-01-05 12:45:15', '2018-01-05 15:39:58', NULL, NULL, '2018-01-28 19:40:16', '2018-01-28 19:40:16');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.orderproducts: ~27 rows (około)
/*!40000 ALTER TABLE `orderproducts` DISABLE KEYS */;
INSERT INTO `orderproducts` (`id`, `cenaProduktu`, `order_id`, `product_id`, `opis`, `created_at`, `updated_at`) VALUES
	(16, 123, 64, 40, '123', '2018-01-27 11:34:27', '2018-01-27 11:34:27'),
	(17, 123, 65, 40, '123', '2018-01-27 11:34:35', '2018-01-27 11:34:35'),
	(18, 123, 66, 40, '123', '2018-01-27 11:41:24', '2018-01-27 11:41:24'),
	(19, 123, 67, 40, '123', '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(20, 123, 68, 40, '123', '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(21, 123, 68, 45, '123', '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(22, 123, 69, 40, '123', '2018-01-27 11:47:43', '2018-01-27 11:47:43'),
	(23, 123, 70, 40, '123', '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(24, 123, 70, 45, '123', '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(25, 0, 70, 44, NULL, '2018-01-27 11:52:13', '2018-01-27 11:52:13'),
	(26, 123, 71, 40, '123', '2018-01-27 12:04:33', '2018-01-27 12:04:33'),
	(27, 123, 71, 45, '123', '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(28, 0, 71, 44, NULL, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(29, 123, 71, 40, '123', '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(31, 0, 72, 40, NULL, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(32, 0, 72, 44, NULL, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(33, 0, 72, 56, NULL, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(34, 0, 72, 57, NULL, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(35, 0, 72, 43, NULL, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(36, 0, 72, 52, NULL, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(37, 0, 72, 53, NULL, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(38, 0, 72, 54, NULL, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(39, 0, 72, 55, NULL, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(40, 0, 73, 54, '1000', '2018-01-30 23:00:13', '2018-01-30 23:00:13'),
	(42, 123, 74, 56, NULL, '2018-01-30 23:01:37', '2018-01-30 23:01:37'),
	(43, 123, 75, 56, NULL, '2018-01-30 23:03:28', '2018-01-30 23:03:28'),
	(44, 111, 75, 52, NULL, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(45, 123, 76, 56, NULL, '2018-01-30 23:05:14', '2018-01-30 23:05:14'),
	(46, 111, 76, 52, NULL, '2018-01-30 23:05:15', '2018-01-30 23:05:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.orders: ~13 rows (około)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `nazwa`, `kosztCalkowity`, `terminRealizacji`, `dataRealizacji`, `customer_id`, `created_at`, `updated_at`) VALUES
	(64, '2018/01/23/01', 3045.00, '2018-01-27', '2018-01-27', 10, '2018-01-27 11:34:27', '2018-01-27 11:34:27'),
	(65, '2018/01/23/02', 2099.00, '2018-01-27', '2018-01-27', 8, '2018-01-27 11:34:35', '2018-01-27 11:34:35'),
	(66, '2018/01/23/03', 899.00, '2018-01-27', '2018-01-27', 1, '2018-01-27 11:41:23', '2018-01-27 11:41:23'),
	(67, '2018/01/24/01', 576.00, '2018-01-27', '2018-01-27', 7, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(68, '2018/01/24/02', 7323.00, '2018-01-21', '2018-01-27', 9, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(69, '2018/01/24/02', 1085.00, '2018-01-27', '2018-01-27', 2, '2018-01-27 11:47:42', '2018-01-27 11:47:42'),
	(70, '2018/01/24/03', 4037.00, '2018-01-27', '2018-01-27', 1, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(71, '2018/01/24/04', 544.00, '2018-01-27', '2018-01-27', 11, '2018-01-27 12:04:33', '2018-01-27 12:04:33'),
	(72, '2018/01/24/05', 1223.00, '2018-01-27', '2018-01-27', 1, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(73, '2018/01/24/06', 783.00, '2018-01-31', NULL, 1, '2018-01-30 23:00:13', '2018-01-30 23:00:13'),
	(74, '2018/01/25/01', 1230.00, '2018-01-31', NULL, 1, '2018-01-30 23:01:37', '2018-01-30 23:01:37'),
	(75, '2018/01/25/02', 4323.00, '2018-01-31', NULL, 1, '2018-01-30 23:03:28', '2018-01-30 23:03:28'),
	(76, '2018/01/25/03', 900.00, '2018-01-31', NULL, 1, '2018-01-30 23:05:14', '2018-01-30 23:05:14');
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

-- Zrzucanie danych dla tabeli plasticobaza.parameters: ~13 rows (około)
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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.paramvalue: ~111 rows (około)
/*!40000 ALTER TABLE `paramvalue` DISABLE KEYS */;
INSERT INTO `paramvalue` (`id`, `value`, `orderProduct_id`, `producttypeparam_id`, `created_at`, `updated_at`) VALUES
	(16, '123', 18, 6, '2018-01-27 11:41:24', '2018-01-27 11:41:24'),
	(17, '123', 19, 1, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(18, '123', 19, 2, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(19, NULL, 19, 3, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(20, 'Biały', 19, 4, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(21, 'Biały', 19, 5, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(22, '123', 19, 6, '2018-01-27 11:42:07', '2018-01-27 11:42:07'),
	(23, '123', 20, 1, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(24, '123', 20, 2, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(25, NULL, 20, 3, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(26, 'Biały', 20, 4, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(27, 'Biały', 20, 5, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(28, '123', 20, 6, '2018-01-27 11:43:46', '2018-01-27 11:43:46'),
	(29, '123', 21, 1, '2018-01-27 11:43:47', '2018-01-27 11:43:47'),
	(30, '123', 21, 2, '2018-01-27 11:43:47', '2018-01-27 11:43:47'),
	(31, NULL, 21, 3, '2018-01-27 11:43:47', '2018-01-27 11:43:47'),
	(32, 'Aluminium', 21, 4, '2018-01-27 11:43:47', '2018-01-27 11:43:47'),
	(33, 'Brązowy', 21, 5, '2018-01-27 11:43:47', '2018-01-27 11:43:47'),
	(34, '123', 21, 6, '2018-01-27 11:43:47', '2018-01-27 11:43:47'),
	(35, '123', 23, 1, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(36, '123', 23, 2, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(37, NULL, 23, 3, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(38, 'Biały', 23, 4, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(39, 'Biały', 23, 5, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(40, '123', 23, 6, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(41, '123', 24, 1, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(42, '123', 24, 2, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(43, NULL, 24, 3, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(44, 'Aluminium', 24, 4, '2018-01-27 11:52:12', '2018-01-27 11:52:12'),
	(45, 'Brązowy', 24, 5, '2018-01-27 11:52:13', '2018-01-27 11:52:13'),
	(46, '123', 24, 6, '2018-01-27 11:52:13', '2018-01-27 11:52:13'),
	(47, '123', 26, 1, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(48, '123', 26, 2, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(49, NULL, 26, 3, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(50, 'Biały', 26, 4, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(51, 'Biały', 26, 5, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(52, '123', 26, 6, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(53, '123', 27, 1, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(54, '123', 27, 2, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(55, NULL, 27, 3, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(56, 'Aluminium', 27, 4, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(57, 'Brązowy', 27, 5, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(58, '123', 27, 6, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(59, NULL, 28, 7, '2018-01-27 12:04:34', '2018-01-27 12:04:34'),
	(60, NULL, 28, 8, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(61, NULL, 28, 9, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(62, 'Brak', 28, 10, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(63, 'Plastikowe', 28, 11, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(64, '123', 29, 1, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(65, '123', 29, 2, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(66, '123', 29, 3, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(67, 'Biały', 29, 4, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(68, 'Biały', 29, 5, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(69, '123', 29, 6, '2018-01-27 12:04:35', '2018-01-27 12:04:35'),
	(70, NULL, 31, 1, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(71, NULL, 31, 2, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(72, NULL, 31, 3, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(73, 'Biały', 31, 4, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(74, 'Biały', 31, 5, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(75, NULL, 31, 6, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(76, NULL, 32, 7, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(77, NULL, 32, 8, '2018-01-27 12:33:38', '2018-01-27 12:33:38'),
	(78, NULL, 32, 9, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(79, 'Brak', 32, 10, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(80, 'Plastikowe', 32, 11, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(81, NULL, 33, 12, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(82, NULL, 33, 13, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(83, NULL, 33, 14, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(84, NULL, 34, 16, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(85, NULL, 34, 17, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(86, 'Złoty Dąb', 34, 18, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(87, NULL, 35, 20, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(88, NULL, 35, 21, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(89, 'PVC', 35, 22, '2018-01-27 12:33:39', '2018-01-27 12:33:39'),
	(90, NULL, 36, 24, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(91, NULL, 36, 25, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(92, 'PVC', 36, 26, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(93, NULL, 37, 28, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(94, NULL, 37, 29, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(95, 'Elewacyjna', 37, 30, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(96, 'Brak', 37, 32, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(97, NULL, 38, 33, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(98, NULL, 38, 34, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(99, 'Zwykła', 38, 35, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(100, NULL, 39, 37, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(101, NULL, 39, 38, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(102, 'Czarny', 39, 39, '2018-01-27 12:33:40', '2018-01-27 12:33:40'),
	(103, NULL, 40, 33, '2018-01-30 23:00:13', '2018-01-30 23:00:13'),
	(104, NULL, 40, 34, '2018-01-30 23:00:13', '2018-01-30 23:00:13'),
	(105, 'Zwykła', 40, 35, '2018-01-30 23:00:13', '2018-01-30 23:00:13'),
	(106, 'Biały', 40, 36, '2018-01-30 23:00:13', '2018-01-30 23:00:13'),
	(107, NULL, 42, 12, '2018-01-30 23:01:37', '2018-01-30 23:01:37'),
	(108, NULL, 42, 13, '2018-01-30 23:01:37', '2018-01-30 23:01:37'),
	(109, NULL, 42, 14, '2018-01-30 23:01:37', '2018-01-30 23:01:37'),
	(110, 'Plastikowe', 42, 15, '2018-01-30 23:01:37', '2018-01-30 23:01:37'),
	(111, NULL, 43, 12, '2018-01-30 23:03:28', '2018-01-30 23:03:28'),
	(112, NULL, 43, 13, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(113, NULL, 43, 14, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(114, 'Plastikowe', 43, 15, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(115, NULL, 44, 24, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(116, NULL, 44, 25, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(117, 'PVC', 44, 26, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(118, 'Brak', 44, 27, '2018-01-30 23:03:29', '2018-01-30 23:03:29'),
	(119, NULL, 45, 12, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(120, NULL, 45, 13, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(121, NULL, 45, 14, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(122, 'Plastikowe', 45, 15, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(123, NULL, 46, 24, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(124, NULL, 46, 25, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(125, 'PVC', 46, 26, '2018-01-30 23:05:15', '2018-01-30 23:05:15'),
	(126, 'Brak', 46, 27, '2018-01-30 23:05:15', '2018-01-30 23:05:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.products: ~12 rows (około)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `nazwa`, `opis`, `productType_id`, `created_at`, `updated_at`) VALUES
	(40, 'ALUPLAST IDEAL 5000', 'Zaawansowany system pięciokomorowy o głębokości zabudowy 70 mm z systemem trzech uszczelek, o możliwości szklenia pakietami szybowymi do 41 mm szerokości.', 1, '2018-01-21 19:22:50', '2018-01-31 02:30:22'),
	(42, 'ALUPLAST IDEAL 7000', 'Ideal 7000 to doskonała propozycja dla wszystkich, którzy oczekują komfortu mieszkania na najwyższym poziomie.', 1, '2018-01-21 19:23:48', '2018-01-31 02:31:04'),
	(43, 'Parapet Amino', 'Marmurowy', 5, '2018-01-25 18:17:15', '2018-01-25 18:17:15'),
	(44, 'PORTA Metalowe 90cm', 'Pancerne drzwi zewnętrzne z zamkami antywłamaniowymi', 2, '2018-01-26 11:55:03', '2018-01-31 02:31:36'),
	(45, 'ALUPLAST IDEAL 8000', 'Ideal 8000 to doskonała propozycja dla wszystkich, którzy oczekują komfortu mieszkania na najwyższym poziomie.', 1, '2018-01-26 18:30:42', '2018-01-31 02:31:42'),
	(49, 'Drzwi Zewnętrzne', 'Drzwi zewnętrzne wykonane z PVC', 2, '2018-01-27 12:06:17', '2018-01-31 02:31:59'),
	(51, 'Parapet Zewnętrzny PVC', 'Parapet wykonany z PVC', 5, '2018-01-27 12:06:35', '2018-01-31 02:33:35'),
	(52, 'VEKA Alphaline', 'Okno o najwyższej klasie energooszczędności', 6, '2018-01-27 12:06:47', '2018-01-31 02:35:01'),
	(53, 'ALUPLAST 6000', 'Ideal 6000 to doskonała propozycja dla wszystkich, którzy oczekują komfortu mieszkania na najwyższym poziomie.', 1, '2018-01-27 12:07:00', '2018-01-31 02:35:25'),
	(54, 'Veka Artline 92', 'Ultranowoczesny system profili okiennych VEKA ARTLINE z PVC to przełomowa pod względem funkcjonalności i wzornictwa propozycja. Jego wyróżniającą cechą jest tzw. optyka przeszkleń bezramowych, czyli taka konstrukcja profili, która polega, analizując wygląd fasady zewnętrznej, na optycznym ukryciu ramy skrzydła za ramą ościeżnicy, a następnie możliwości niemal całkowitego ukrycia ramy ościeżnicy za ociepleniem budynku (wykonanym np. ze styropianiu).', 1, '2018-01-27 12:07:09', '2018-01-31 02:36:15'),
	(55, 'Moskitiera', NULL, 9, '2018-01-27 12:07:17', '2018-01-27 12:07:17'),
	(56, 'Drzwi wew', NULL, 3, '2018-01-27 12:10:04', '2018-01-27 12:10:04'),
	(57, 'Brama garazowa', NULL, 4, '2018-01-27 12:23:26', '2018-01-27 12:23:26'),
	(58, 'PIETRUCHA Parapet zewnętrzny', NULL, 5, '2018-01-28 16:53:11', '2018-01-28 16:53:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plasticobaza.producttypeparams: ~40 rows (około)
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

-- Zrzucanie danych dla tabeli plasticobaza.producttypes: ~9 rows (około)
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

-- Zrzucanie danych dla tabeli plasticobaza.users: ~4 rows (około)
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
