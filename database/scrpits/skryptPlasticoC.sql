CREATE DATABASE IF NOT EXISTS `plastico` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `plastico`;

CREATE TABLE IF NOT EXISTS `productmaintype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `producttype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productMainType_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producttype_productMainType_id_foreign` (`productMainType_id`),
  CONSTRAINT `producttype_productMainType_id_foreign` FOREIGN KEY (`productMainType_id`) REFERENCES `productmaintype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productType_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_productType_id_foreign` (`productType_id`),
  CONSTRAINT `product_productType_id_foreign` FOREIGN KEY (`productType_id`) REFERENCES `producttype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NIP` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `imie`, `nazwisko`, `adres`, `telefon`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Jan', 'Kowalski', 'Borysławice 15', '608103310', 'janekKowal@gmail.com', NULL, NULL),
	(2, 'Andrzej', 'Wisniewski', 'Romanow 29', '509332201', 'awisnia@gmail.com', '2017-10-25 00:23:18', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

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

-- Zrzucanie danych dla tabeli plastico.admins: ~1 rows (około)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', '$2y$10$/TKx.2N4F8rHtBdqyMJj.ecy/ebhlBTLiy5ZphdaK8FgxV5WEbGmW', NULL, NULL, NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `eventtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `eventtypes` (`id`, `nazwa`,`remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Pomiar',NULL, NULL, NULL);
-- Zrzut struktury tabela plastico.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `eventType_id` int(10) unsigned DEFAULT NULL,
  `opis` varchar(500) COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_customer_id_foreign` (`customer_id`),
  CONSTRAINT `events_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  KEY `events_eventType_id_foreign` (`eventType_id`),
  CONSTRAINT `events_klient_id_foreign` FOREIGN KEY (`eventType_id`) REFERENCES `eventtypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.events: ~6 rows (około)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `customer_id`, `title`, `start`, `end`, `eventType_id`, `created_at`, `updated_at`) VALUES
	(3, NULL, 'asd', '2017-10-05 22:00:30', '2017-10-05 21:56:54', 1, '2017-10-24 19:57:05', '2017-10-24 19:57:05'),
	(6, NULL, 'hhh', '2017-10-04 22:00:45', '2017-10-04 21:59:49', 1, '2017-10-24 19:59:54', '2017-10-24 19:59:54'),
	(12, NULL, 'montaz', '2017-11-05 22:00:15', '2017-11-05 23:49:23', 1, '2017-11-05 20:49:27', '2017-11-05 20:49:27'),
	(13, NULL, 'montaz', '2017-11-05 22:00:30', '2017-11-05 22:52:30', 1, '2017-11-05 20:52:35', '2017-11-05 20:52:35'),
	(14, NULL, 'kkk', '2017-11-05 22:15:15', '2017-11-05 23:05:06', 1, '2017-11-05 21:05:12', '2017-11-05 21:05:12'),
	(15, 2, 'montazz', '2017-11-05 22:15:30', '2017-11-05 23:15:29', 1, '2017-11-05 21:15:41', '2017-11-05 21:15:41');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.klients
CREATE TABLE IF NOT EXISTS `klients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.klients: ~2 rows (około)
/*!40000 ALTER TABLE `klients` DISABLE KEYS */;
INSERT INTO `klients` (`id`, `imie`, `nazwisko`, `adres`, `telefon`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Jan', 'Kowalski', 'Borysławice 15', '608103310', 'janekKowal@gmail.com', NULL, NULL),
	(2, 'Andrzej', 'Wisniewski', 'Romanow 29', '509332201', 'awisnia@gmail.com', '2017-10-25 00:23:18', NULL);
/*!40000 ALTER TABLE `klients` ENABLE KEYS */;

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
  `kosztCalkowity` decimal(8,2) NOT NULL,
  `terminRealizacji` date DEFAULT NULL,
  `dataRealizacji` date DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customers_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customers_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.orders: ~0 rows (około)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Zrzut struktury tabela plastico.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli plastico.password_resets: ~0 rows (około)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

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
	(4, 'user123', 'user123@gmail.com', '$2y$10$0ALvcUA6f4cX1ynOoJmjCeBd.3Z17yWDEZVLcTHYgX779auby/JRW', 'zignTuWWNa57iJbKatTG8qlpDwYlNHukK8NYmGJOObJFTvh877npAule3GRU', '2017-10-24 22:17:38', '2017-10-24 22:17:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `orderproduct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cenaProduktu` decimal NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `opis` varchar(500) COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderproduct_order_id_foreign` (`order_id`),
  CONSTRAINT `orderproduct_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  KEY `orderproduct_product_id_foreign` (`product_id`),
  CONSTRAINT `orderproduct_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
