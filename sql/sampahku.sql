-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sampahku
CREATE DATABASE IF NOT EXISTS `sampahku` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sampahku`;

-- Dumping structure for table sampahku.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sampahku.faqs: ~4 rows (approximately)
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
REPLACE INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
	(1, 'Kapan sampah saya akan diambil?', 'Sampah Anda akan diambil setelah dikonfirmasi oleh admin bank sampah. Setelah Anda mengajukan permintaan pengambilan sampah melalui aplikasi Sampahku!, tim admin bank sampah akan memverifikasi permintaan tersebut.', '2024-05-22 13:38:31', '2024-05-22 13:38:31'),
	(2, 'Bagaimana sampah saya ditukarkan?', 'Sampah ditukarkan dengan poin/imbalan setelah dipisahkan, diverifikasi, dan ditimbang di titik pengumpulan atau melalui layanan penjemputan.', '2024-05-22 13:38:31', '2024-05-22 13:38:31'),
	(3, 'Bagaimana mekanisme penjemputan sampah?', 'Jadwalkan penjemputan melalui aplikasi/situs, tim akan menjemput sampah yang sudah dipisahkan sesuai kategori pada waktu yang ditentukan.', '2024-05-22 13:38:31', '2024-05-22 13:38:31'),
	(4, 'Apakah ada kategori sampah tertentu yang harus dipisahkan?', 'Ya, pisahkan sampah organik, anorganik, berbahaya, dan khusus sesuai panduan layanan pengelolaan sampah yang Anda gunakan.', '2024-05-22 13:38:31', '2024-05-22 13:38:31');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

-- Dumping structure for table sampahku.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sampahku.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_05_22_132432_create_faqs_table', 2),
	(5, '2024_05_22_140608_create_pickup_requests_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sampahku.pickup_requests
CREATE TABLE IF NOT EXISTS `pickup_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sampah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_sampah` double NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `status` enum('tunggu','terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT 'tunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pickup_requests_user_id_foreign` (`user_id`),
  CONSTRAINT `pickup_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sampahku.pickup_requests: ~1 rows (approximately)
/*!40000 ALTER TABLE `pickup_requests` DISABLE KEYS */;
REPLACE INTO `pickup_requests` (`id`, `user_id`, `alamat`, `jenis_sampah`, `berat_sampah`, `tanggal`, `jam`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'ad', 'organik', 12, '2024-05-24', '11:22:00', 'terima', '2024-05-23 00:18:14', '2024-05-23 06:02:17');
/*!40000 ALTER TABLE `pickup_requests` ENABLE KEYS */;

-- Dumping structure for table sampahku.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sampahku.sessions: ~1 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('WvgwN5Tv9nQwc2jfhltlHxRUx1jgLRnp2XrN3z3q', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzBaQ3VJbERDSHJINEZ3elNKRWhjRnVjd3dWejB4YWVrWU5TcG14ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1716452665);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table sampahku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sampahku.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `nama`, `jenis_kelamin`, `email`, `password`, `role`, `alamat`, `no_telepon`, `foto_profil`, `kota`, `kecamatan`, `desa`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', 'Laki-laki', 'admin@gmail.com', '$2y$12$E0wIjKMEsX2fbkKtBRoS5.LqjA1JmWsTvF170.vWhiRRaZ.4PqiVm', 'admin', 'Jl. Sigura-gura No. 1', '081234567890', '', '', '', '', NULL, NULL, '2024-05-23 08:02:02'),
	(2, 'yusuf123', 'yusuf', 'Laki-laki', 'yusuf@gmail.com', '$2y$12$2C.ATCFjQA0cY66GSHNEtevVDpCFnntA0OUXFO5d2o5ivHYr2SKeO', 'user', 'jl soekarno hatta', '082222222222', '1716448887.png', 'Malang', 'Lowokwaru', 'Ketawanggede', NULL, '2024-05-22 09:21:47', '2024-05-23 07:21:27'),
	(4, 'yusuf12', 'asdasda', 'Laki-laki', 'increatesh@trippin.id', '$2y$12$vCBYBeO.zaEYeVIyKk3H5eycAL/HaGk8YqN.w0L27ajSoscWD5.i.', 'user', 'jl soekarno hatta', '082222222222', '', '', '', '', NULL, '2024-05-22 09:34:52', '2024-05-22 09:34:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
