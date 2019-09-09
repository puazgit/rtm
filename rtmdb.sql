-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for rtmdb
CREATE DATABASE IF NOT EXISTS `rtmdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rtmdb`;

-- Dumping structure for table rtmdb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_07_29_163140_create_permission_tables', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table rtmdb.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table rtmdb.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.model_has_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\user', 1),
	(2, 'App\\User', 2),
	(3, 'App\\User', 3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table rtmdb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table rtmdb.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.permissions: ~3 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view post', 'web', '2019-08-01 20:53:03', '2019-08-01 20:53:04'),
	(2, 'edit post', 'web', '2019-08-01 20:53:14', '2019-08-01 20:53:16'),
	(3, 'delete post', 'web', '2019-08-01 20:53:26', '2019-08-01 20:53:27');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table rtmdb.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2019-08-01 20:51:35', '2019-08-01 20:51:38'),
	(2, 'editor', 'web', '2019-08-01 20:52:03', '2019-08-01 20:52:04'),
	(3, 'viewer', 'web', '2019-08-01 20:52:15', '2019-08-01 20:52:16'),
	(4, 'writer', 'web', '2019-08-01 14:10:34', '2019-08-01 14:10:34');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table rtmdb.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.role_has_permissions: ~6 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(1, 2),
	(2, 2),
	(1, 3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table rtmdb.rtm_uraian
CREATE TABLE IF NOT EXISTS `rtm_uraian` (
  `rtm_id` int(5) NOT NULL,
  `uraian_id` int(5) NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  KEY `rtm_id` (`rtm_id`),
  KEY `uraian_id` (`uraian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.rtm_uraian: ~0 rows (approximately)
/*!40000 ALTER TABLE `rtm_uraian` DISABLE KEYS */;
INSERT INTO `rtm_uraian` (`rtm_id`, `uraian_id`, `status`) VALUES
	(1, 1, 0),
	(2, 1, 0);
/*!40000 ALTER TABLE `rtm_uraian` ENABLE KEYS */;

-- Dumping structure for table rtmdb.tb_departemen
CREATE TABLE IF NOT EXISTS `tb_departemen` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `departemen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_departemen: ~18 rows (approximately)
/*!40000 ALTER TABLE `tb_departemen` DISABLE KEYS */;
INSERT INTO `tb_departemen` (`id`, `departemen`) VALUES
	(1, 'Divisi Inventarisasi dan Pengendalian Aset'),
	(2, 'Sekretariat Perusahaan'),
	(3, 'Divisi Sumber Daya Manusia'),
	(4, 'Divisi Umum dan PKBL'),
	(5, 'Divisi Keuangan dan Akuntansi'),
	(6, 'Divisi Pengendalian Kinerja dan Sistem Manajemen'),
	(7, 'Satuan Pengawasan Intern'),
	(8, 'Divisi Pengelolaan Proyek'),
	(9, 'Divisi SDA dan SDL'),
	(10, 'Divisi Rencana Strategis dan Litbang'),
	(11, 'Divisi Pengusahaan dan Pelayanan Pelanggan'),
	(12, 'Unit Usaha Wilayah II'),
	(13, 'Unit Usaha PLTA'),
	(14, 'Unit Usaha Pariwisata dan AMDK'),
	(15, 'Unit Usaha Wilayah I'),
	(16, 'Unit Usaha Wilayah IV'),
	(17, 'Unit Usaha Wilayah III'),
	(18, 'Unit Layanan Pengadaan');
/*!40000 ALTER TABLE `tb_departemen` ENABLE KEYS */;

-- Dumping structure for table rtmdb.tb_index
CREATE TABLE IF NOT EXISTS `tb_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `index_masalah` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_index: ~29 rows (approximately)
/*!40000 ALTER TABLE `tb_index` DISABLE KEYS */;
INSERT INTO `tb_index` (`id`, `index_masalah`, `created_at`, `updated_at`) VALUES
	(1, 'Hasil Kuesioner/Indeks Kepuasan Pelanggan 7.2.a.1', '2019-08-13 10:11:34', '2019-08-13 10:11:35'),
	(2, 'Indeks Keterikatan Karyawan 7.3.a.(3).3', '2019-08-13 10:11:58', '2019-08-13 10:11:58'),
	(3, 'Indeks Kepuasan Karyawan (%) 7.3.a.3.1', '2019-08-13 10:15:47', '2019-08-13 10:15:49'),
	(4, 'Indeks kepuasan pemasok 7.1.c.5', '2019-08-13 10:15:48', '2019-08-13 10:15:49'),
	(5, 'Keuangan dan Pasar 7.4.b.(2).11.1', '2019-08-13 10:15:52', '2019-08-13 10:15:50'),
	(6, 'Fokus Pelanggan 7.4.b.(2).11.2', '2019-08-13 10:15:51', '2019-08-13 10:15:51'),
	(7, 'Efektifitas produk dan proses 7.4.b.(2).11.3', '2019-08-13 10:15:54', '2019-08-13 10:15:53'),
	(8, 'Fokus tenaga kerja 7.4.b.(2).11.4', '2019-08-13 10:15:54', '2019-08-13 10:15:55'),
	(9, 'Kepemimpinan 7.4.b.(2).11.5', '2019-08-13 10:15:56', '2019-08-13 10:15:55'),
	(10, 'Layanan Penyaluran Listrik Total (PLTA + PLTMH) 7.1.a.(1).1', '2019-08-13 10:15:56', '2019-08-13 10:15:57'),
	(11, 'Layanan Air Baku Total 7.1.a.(1).2', '2019-08-13 10:15:58', '2019-08-13 10:15:57'),
	(12, 'Layanan Air Bersih / Spam Total 7.1.a.(1).3', '2019-08-13 10:15:59', '2019-08-13 10:15:59'),
	(13, 'Layanan Air Minum Dalam Kemasan Galon 19Ltr  7.1.a.(1).4.1', '2019-08-13 10:16:00', '2019-08-13 10:16:00'),
	(14, 'Layanan Air Minum Dalam Kemasan Botol 600ml 7.1.a.(1).4.2', '2019-08-13 10:16:02', '2019-08-13 10:16:02'),
	(15, 'Layanan Air Minum Dalam Kemasan Botol 330ml 7.1.a.(1).4.3', '2019-08-13 10:16:03', '2019-08-13 10:16:04'),
	(16, 'Layanan Air Minum Dalam Kemasan Gelas 240ml 7.1.a.(1).4.4', '2019-08-13 10:16:14', '2019-08-13 10:16:04'),
	(17, 'Layanan Air Minum Dalam Kemasan Botol 1500ml 7.1.a.(1).4.5', '2019-08-13 10:16:13', '2019-08-13 10:16:05'),
	(18, 'Pendapatan Jasa Listrik 7.5.a.(1).1.1', '2019-08-13 10:16:12', '2019-08-13 10:16:05'),
	(19, 'Pendapatan Jasa Air 7.5.a.(1).1.2', '2019-08-13 10:16:14', '2019-08-13 10:16:06'),
	(20, 'Pendapatan Air Bersih 7.5.a.(1).1.3', '2019-08-13 10:16:15', '2019-08-13 10:16:07'),
	(21, 'Pendapatan AMDK 7.5.a.(1).1.4', '2019-08-13 10:16:16', '2019-08-13 10:16:09'),
	(22, 'Tingkat Kesesuaian Penyaluran Air Baku Total 7.1.b.(1).2. (kesediaan air)', '2019-08-13 10:16:16', '2019-08-13 10:16:08'),
	(23, 'Tingkat kehandalan PLTA 7.1.b.(1).5.2\r\n', '2019-08-13 10:16:17', '2019-08-13 10:16:10'),
	(24, 'Temuan Audit Internal (SMM ISO 9001) yang ditindaklanjuti 7.4.a.(2).4\r\n', '2019-08-13 10:16:17', '2019-08-13 10:16:11'),
	(25, 'Temuan Audit Eksternal (Survaillance) yang ditindaklanjuti 7.4.a.(2).6\r\n', '2019-08-13 10:16:23', '2019-08-13 10:16:12'),
	(26, 'Temuan Audit Internal (SPI) yang ditindaklanjuti 7.4.a.(2).3\r\n', '2019-08-13 10:16:24', '2019-08-13 10:16:19'),
	(27, 'Temuan Audit Eksternal (KAP) yang ditindaklanjuti 7.4.a.(2).5\r\n', '2019-08-13 10:16:22', '2019-08-13 10:16:19'),
	(28, 'Tingkat Pencapaian Skor GCG 7.4.a.(2).1\r\n', '2019-08-13 10:16:25', '2019-08-13 10:16:20'),
	(29, '7.1.c.4 Kinerja Pemasok\r\n', '2019-08-13 10:16:21', '2019-08-13 10:16:21');
/*!40000 ALTER TABLE `tb_index` ENABLE KEYS */;

-- Dumping structure for table rtmdb.tb_menu
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `link` varchar(50) NOT NULL DEFAULT '0',
  `icon` varchar(50) DEFAULT '0',
  `is_parent` varchar(50) NOT NULL DEFAULT '0',
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_menu: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`id`, `name`, `link`, `icon`, `is_parent`, `role`) VALUES
	(1, 'Beranda', '/', 'icon-home', '0', 'admin,editor,viewer'),
	(2, 'User', 'user', 'icon-users', '4', 'admin'),
	(3, 'Dokumen', 'dokumen', 'icon-docs', '0', ''),
	(4, 'Menu Admin', '#', 'icon-user', '0', 'admin'),
	(5, 'Daftar Rtm', '/rtm', 'icon-bar-chart', '0', 'admin,editor,viewer'),
	(6, 'Daftar Permasalahan', '/masalah', 'icon-docs', '0', 'admin,editor,viewer');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;

-- Dumping structure for table rtmdb.tb_progres
CREATE TABLE IF NOT EXISTS `tb_progres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `target` float NOT NULL DEFAULT '0',
  `realisasi` float NOT NULL DEFAULT '0',
  `competitor` float NOT NULL DEFAULT '0',
  `year` varchar(20) NOT NULL DEFAULT '',
  `uraian_id` varchar(20) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_progres: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_progres` DISABLE KEYS */;
INSERT INTO `tb_progres` (`id`, `target`, `realisasi`, `competitor`, `year`, `uraian_id`, `created_at`, `updated_at`) VALUES
	(1, 78, 77.29, 75.66, '2014', '1', '2019-09-08 21:36:18', '2019-09-08 21:36:19'),
	(2, 79, 78.2, 78.31, '2015', '1', '2019-09-08 21:38:04', '2019-09-08 21:38:05'),
	(3, 80, 85.25, 79.25, '2016', '1', '2019-09-08 21:38:33', '2019-09-08 21:38:34'),
	(4, 82, 82.2, 80.45, '2017', '1', '2019-09-08 21:38:57', '2019-09-08 21:38:58'),
	(5, 82, 0, 0, '2018', '1', '2019-09-08 21:39:23', '2019-09-08 21:39:24'),
	(6, 82, 0, 0, '2019', '1', '2019-09-08 21:39:45', '2019-09-08 21:39:46'),
	(7, 0, 0, 0, '2014', '2', '2019-09-08 15:24:42', '2019-09-08 15:24:42'),
	(8, 0, 0, 0, '2015', '2', '2019-09-08 15:24:42', '2019-09-08 15:24:42'),
	(9, 70, 74.6, 82, '2016', '2', '2019-09-08 15:24:42', '2019-09-08 15:24:42'),
	(10, 70, 73.7, 81.6, '2017', '2', '2019-09-08 15:24:42', '2019-09-08 15:24:42');
/*!40000 ALTER TABLE `tb_progres` ENABLE KEYS */;

-- Dumping structure for table rtmdb.tb_rtm
CREATE TABLE IF NOT EXISTS `tb_rtm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rtm_ke` int(5) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `rkt` int(5) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_rtm: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_rtm` DISABLE KEYS */;
INSERT INTO `tb_rtm` (`id`, `rtm_ke`, `tingkat`, `rkt`, `tahun`, `created_at`, `updated_at`) VALUES
	(1, 71, 'pusat', 4, 2018, '2019-09-08 20:50:27', '2019-09-08 20:50:28'),
	(2, 72, 'pusat', 1, 2019, '2019-09-09 22:21:35', '2019-09-09 22:21:36');
/*!40000 ALTER TABLE `tb_rtm` ENABLE KEYS */;

-- Dumping structure for table rtmdb.tb_uraian
CREATE TABLE IF NOT EXISTS `tb_uraian` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `uraian` mediumtext,
  `analisis` text,
  `r_uraian` text,
  `r_target` text,
  `r_pic` text,
  `tindak` text,
  `p_rencana` text,
  `p_realisasi` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_uraian: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_uraian` DISABLE KEYS */;
INSERT INTO `tb_uraian` (`id`, `uraian`, `analisis`, `r_uraian`, `r_target`, `r_pic`, `tindak`, `p_rencana`, `p_realisasi`, `status`, `created_at`, `updated_at`) VALUES
	(1, '1.	Hasil Kuesioner/Indeks Kepuasan Pelanggan 7.2.a.1', 'Berdasarkan grafik  dapat disimpulkan bahwa Hasil Kuesioner/Indeks Kepuasan Pelanggan menunjukan trend/kecenderungan yang meningkat (positif)', 'Indeks kepuasan pelanggan untuk tahun 2017 masih menggunakan prognosa, menunggu laporan survey kepuasan pelanggan yang masih disusun, ', '1', '8', '1', '1', '1', 1, '2019-09-08 13:30:41', '2019-09-08 13:30:41'),
	(2, '<p class="MsoListParagraph" style="margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1"><span lang="EN-US" style="font-size:9.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;">Indeks Keterikatan Karyawan 7.3.a.(3).3<o:p></o:p></span></p>', '<p class="MsoNormal" style="text-align:justify"><span lang="EN-US" style="font-size: 9pt; font-family: Arial, sans-serif;">Berdasarkan\r\ngrafik dapat disimpulkan bahwa </span><span lang="EN-US" style="font-size:9.0pt;\r\nmso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;">Hasil Kuesioner/Indeks Keterikatan Karyawan menunjukan\r\ntrend/kecenderungan yang menurun (Negatif)<o:p></o:p></span></p>', '<span lang="IN" style="font-size:9.0pt;mso-bidi-font-size:\r\n10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:IN;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA">Indeks keterikatan karyawan untuk tahun 2017\r\nmasih menggunakan data prognosa</span>', '0', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18', '0', '0', '0', 1, '2019-09-08 15:24:42', '2019-09-08 15:24:42');
/*!40000 ALTER TABLE `tb_uraian` ENABLE KEYS */;

-- Dumping structure for table rtmdb.users
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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.users: ~150 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', '2019-07-29 16:42:00', '$2y$10$c57iAqV4J37/gx6AsUaOeuq2m/fzMM6Hgw2zPkW9W/noh6U5DYs8i', '', '2019-07-29 16:42:00', '2019-07-29 16:42:00'),
	(2, 'Pia Tiara Haryanti', 'editor', '2019-07-29 16:42:00', '$2y$10$5M0X5XM3ljhBQ/lG/7fwAuO0ZojCVFxSRwF3Kd65aoDWXNT/t9zhm', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(3, 'Jindra Sabri Prabowo', 'viewer', '2019-07-29 16:42:01', '$2y$10$W17ALurAVFYMD6KZNG5zpu.x/Em2OfLc0c9c2Ubfv2FMCNtrnMsYK', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(4, 'Tami Pudjiastuti S.Psi', 'MtNLAw09So@gmail.com', '2019-07-29 16:42:01', '$2y$10$ePMxDtGzMn/yCF3AMV4pS.wDAMGjJXevP8c9nhkcto2rG0gFc/6lq', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(5, 'Maimunah Mandasari', 'Bz8WdvwLGp@gmail.com', '2019-07-29 16:42:01', '$2y$10$rblgLvhOICWjAWYgVfmz2.Vmw4XZfftX0IMlIO9mJoJszZatx1CWW', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(6, 'Elon Suwarno S.Pd', 's2n3uFrVPT@gmail.com', '2019-07-29 16:42:01', '$2y$10$Qw9sDg4QS6IP8etBz6ASSu5NUPaGAHjiWxPLeWO7E0rERq0UBjNKm', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(7, 'Vivi Wani Wahyuni', 'uxK0cAZat2@gmail.com', '2019-07-29 16:42:01', '$2y$10$8oFS2JVVPyGTY9Dxj6W0deJqcUD7Rc7ReQVDhLQjZtyYUwi8NL23S', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(8, 'Gabriella Yance Puspita', 'zrYI3dDVNi@gmail.com', '2019-07-29 16:42:01', '$2y$10$J60R1Z.PqtUAy1a6IhuWVecl3kMNG9q8IjDq1VIXC4gGXvnuCk0.y', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(9, 'Diana Handayani', 'bSkYbRSHq1@gmail.com', '2019-07-29 16:42:02', '$2y$10$oPDOwumhg9TizAh5jPu63ueB18X5NeDm4vbmM76Oo1ooripNPPcQG', '', '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(10, 'Luthfi Natsir S.Pd', 'eXNv8jT3cu@gmail.com', '2019-07-29 16:42:02', '$2y$10$J7FEmRFqatzBgMafryDNKuNIuXWyjr20K3/7PhVgvBotiBVS/lyH.', '', '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(11, 'Maras Prakasa M.Kom.', 'DaRLYkhQdx@gmail.com', '2019-07-29 16:42:02', '$2y$10$GctnIUblLrq/Wk0lIzw4ReZ3k.oylLv1Zm6XtECSeEvqvzqMoMnWa', '', '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(12, 'Cayadi Kuswoyo', '3HoOT1ToSN@gmail.com', '2019-07-29 16:42:02', '$2y$10$IoIW72dPFZwWJest3yO9p.5MkeeHb85LlgC3M.S667wvdZCkA1QJO', '', '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(13, 'Gilang Santoso', 'hG023a5sdG@gmail.com', '2019-07-29 16:42:02', '$2y$10$W2tQMOF41jg5kZXJLOgpnufVNYQ5PM85RvmauQ7YFjQAHShLjsj6y', '', '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(14, 'Jindra Saefullah S.Sos', 'sAvwjl69gm@gmail.com', '2019-07-29 16:42:02', '$2y$10$Vt2vtcDZT94a9KknRS0yHecUktGsaZTwrpQIHQalfT2OpInFMMb1i', '', '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(15, 'Rizki Jamal Winarno S.Kom', '3zy5DT8pKn@gmail.com', '2019-07-29 16:42:02', '$2y$10$Q8mvWRyNDKk3Zify7Fw6MuZiIXVVBPHsqM2UySIxtjj/DwusnpTeW', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(16, 'Jane Purnawati S.I.Kom', 'GsDAclVC42@gmail.com', '2019-07-29 16:42:03', '$2y$10$eIeR8z/EK./.ClURBqicQutWS0P4wXGD0Dvd.Q/d99sXMwjRqqF.W', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(17, 'Uda Prabowo', 'w4rUyusrh9@gmail.com', '2019-07-29 16:42:03', '$2y$10$rtkqmiTT0fm3OHnrkEgkp.YoElrYpQKsQoVHRi8qVJw1rtOxfdvSm', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(18, 'Maimunah Syahrini Kusmawati S.Pt', 'vXUU07qZyY@gmail.com', '2019-07-29 16:42:03', '$2y$10$22ZwB6P6ehENujRgQcRF/ucR6sAHEk5gylnAn/466L2TDztEfjfhG', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(19, 'Fathonah Irma Wahyuni S.Ked', 'HFvIoRmHXm@gmail.com', '2019-07-29 16:42:03', '$2y$10$wia1/WKg6A0.iQ3.WQgJjelVO.L60/4j5H8KjsH1XcH1J1BJ2vFMu', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(20, 'Amalia Pudjiastuti S.Kom', 'hArcu94oOI@gmail.com', '2019-07-29 16:42:03', '$2y$10$5U6aB1pDYhn5qplZtjRzzekCwVkAdzs6FRLqLl1ADMNae7nQ86bsS', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(21, 'Makara Prayoga', 'xmGnpewmrC@gmail.com', '2019-07-29 16:42:03', '$2y$10$QrWJsnTYLKy9cjN17c/yoOCNtGGXU40bvh7tYxNc5cSGhpw3iTtJ2', '', '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(22, 'Darsirah Kuswoyo', 'S0pQHm8FxP@gmail.com', '2019-07-29 16:42:04', '$2y$10$0/yUULjZxdxCaQdlrjs5jeHFqK/ptUdqH.YwycKsXbwCogwOwzfWS', '', '2019-07-29 16:42:04', '2019-07-29 16:42:04'),
	(23, 'Emas Dongoran M.Pd', 'CwPGJjQWas@gmail.com', '2019-07-29 16:42:04', '$2y$10$bZSVwJ1HvuVUh19pzyN4bOGEFT7v00t5w2GUS9QiOtg1oL9xxUW5q', '', '2019-07-29 16:42:04', '2019-07-29 16:42:04'),
	(24, 'Aditya Damanik', 'LReKSdcEuo@gmail.com', '2019-07-29 16:42:04', '$2y$10$4X1h69SQLwTI9H1Qp3zCIe4pKmg7iGyEGw./WdcXjWca8bKq1Tphu', '', '2019-07-29 16:42:04', '2019-07-29 16:42:04'),
	(25, 'Latif Lega Mansur', '3uTg7C9zXA@gmail.com', '2019-07-29 16:42:04', '$2y$10$Pcq3E1eGRqmzIUkMiV5EPekWWQ1Uih/7eSpjG7MieRugHpYorQCXe', '', '2019-07-29 16:42:04', '2019-07-29 16:42:04'),
	(26, 'Ibun Lembah Saefullah M.Pd', 'yPepsQVd7H@gmail.com', '2019-07-29 16:42:04', '$2y$10$ybgea95pQ5DB0hvD.gQdl.eZQbzU6w3lr50izPKuPjyRIzeHJtUWK', '', '2019-07-29 16:42:04', '2019-07-29 16:42:04'),
	(27, 'Oni Agnes Nasyiah', 'R0jS70lHYO@gmail.com', '2019-07-29 16:42:04', '$2y$10$huz.dS039Lujd/W4Sib.o.9MKcHnc3X.y1zlqGFhPdwDDyOVI3Hdy', '', '2019-07-29 16:42:04', '2019-07-29 16:42:04'),
	(28, 'Olga Pangestu', 'tpDNKDv7rW@gmail.com', '2019-07-29 16:42:04', '$2y$10$JjI4aBhcwyr2V0phIcLNYe9DhbTlWW3CAYo6E8PuMOSCJll1nBk8e', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(29, 'Padmi Michelle Purnawati S.Pt', '0fjMqvKJWT@gmail.com', '2019-07-29 16:42:05', '$2y$10$6AR9SxF/EMwlF7ZE.1uk8uEdmpfC8KY9j8f08XDPJkHbsDUx4KJ6a', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(30, 'Raisa Tiara Hasanah S.Farm', 'AphiSGzHig@gmail.com', '2019-07-29 16:42:05', '$2y$10$0RVv5ULPSNd9CeOeSlVkPeREr1u1STKjk82ISqAoEwmHif.RbSwC6', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(31, 'Tasdik Mustofa', 'tXYDYubtTq@gmail.com', '2019-07-29 16:42:05', '$2y$10$3zSe0v9TPi029UeM2UiTG.MhMoe2FVyotN/.fFH4SCItq7CdCRqm2', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(32, 'Oliva Hastuti', 'ZmIlvSz2lJ@gmail.com', '2019-07-29 16:42:05', '$2y$10$CMCODXrywLufrWymY.UH1Op1X2h142fOO5FaplMsVOXCsL0Cqvpky', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(33, 'Estiawan Karya Halim', 'QEpLvErTVZ@gmail.com', '2019-07-29 16:42:05', '$2y$10$chzqZsZsZMLj0/xx1aM.2O7ejxBWaDC1TYEa0O6Z9c.CRGYHRyjj2', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(34, 'Olga Halim', 'YGqAgPOsFi@gmail.com', '2019-07-29 16:42:05', '$2y$10$kS8IXTPvrLqqPVQXekchTevBooPeNpa/I1cMx8CLBvAEEoveR/Y9G', '', '2019-07-29 16:42:05', '2019-07-29 16:42:05'),
	(35, 'Parman Emin Dongoran M.Farm', 'VIK4HmCc1k@gmail.com', '2019-07-29 16:42:06', '$2y$10$KnkxLj.euV5GbCWdqOsZ9uF9O5xrYbD8mOhcnEtbvEnpK.Oa8xilC', '', '2019-07-29 16:42:06', '2019-07-29 16:42:06'),
	(36, 'Sadina Vera Prastuti', 'rieHbeMD4Z@gmail.com', '2019-07-29 16:42:06', '$2y$10$n2M1lrbz/8KcWpRviHpL6ehAPLdWwvsnElhxJDB0s9DApqNb8AP12', '', '2019-07-29 16:42:06', '2019-07-29 16:42:06'),
	(37, 'Mumpuni Najmudin M.Ak', 'xlpEhafuGO@gmail.com', '2019-07-29 16:42:06', '$2y$10$3WCEpX6lffvWM5dLt9K2E.6HcvqSTMnPAiy5k6eC77uWm.pfatSoe', '', '2019-07-29 16:42:06', '2019-07-29 16:42:06'),
	(38, 'Maman Budi Januar', '4svcH8YHIC@gmail.com', '2019-07-29 16:42:06', '$2y$10$0Uz7SSR4jPht5d9W0Ws5COEuEHMxu159k8KWQ6whvxdFWz9OcllYu', '', '2019-07-29 16:42:06', '2019-07-29 16:42:06'),
	(39, 'Yoga Putra', 'RtugXrA2fs@gmail.com', '2019-07-29 16:42:06', '$2y$10$xg.ZY2WTLYE0yyOxiEpZpOtz97R1NgYVAGi4LDLKip6Lhs8hvbMim', '', '2019-07-29 16:42:06', '2019-07-29 16:42:06'),
	(40, 'Maimunah Betania Haryanti M.M.', 'nopJS5zaCv@gmail.com', '2019-07-29 16:42:06', '$2y$10$OTWmT8Fj8XL6EGnjppgGpumvUQEMj1lfscPZkixnKtZWNLVfTEBMS', '', '2019-07-29 16:42:06', '2019-07-29 16:42:06'),
	(41, 'Darijan Nababan S.Kom', 'itnlMHuUY8@gmail.com', '2019-07-29 16:42:06', '$2y$10$SNYfAcDPApus8WqkwMwdM.YKQ4vvNnCIM9dv6LfJvwN6V8mW9iLIq', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(42, 'Darmana Hakim', 'rmr7cvanzu@gmail.com', '2019-07-29 16:42:07', '$2y$10$MZdKFl1UYy5zCwa1QM73kOAh1Lns7xM9ZLTh2ba.7Y.detQEighri', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(43, 'Tania Suryatmi', 'lpOJWB0tSz@gmail.com', '2019-07-29 16:42:07', '$2y$10$T6146wutXdgbLDWrs.jia.FrdGDXargUoqJTsO4G9Rp7NoZrRw7zu', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(44, 'Cecep Adriansyah S.T.', 'XZDPXucdm2@gmail.com', '2019-07-29 16:42:07', '$2y$10$Bf2h9H6oT.umfu6VgY3epurt1cX1kt5OA6cupcGD8K/UFwUMUZeyy', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(45, 'Belinda Zulaika', 'uK1YwutyZR@gmail.com', '2019-07-29 16:42:07', '$2y$10$3h6.ORWOVWCeR3Fr.74kUu/34exCCvnIE/hICWT7xE/uUoHiR/Vry', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(46, 'Damar Uwais S.Farm', 'BsVUGbTd7l@gmail.com', '2019-07-29 16:42:07', '$2y$10$HNx2X4TaF4.Tzu7VUhjh7.IH2MUN51Dh9WpvWDa76dgIMttVVESBa', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(47, 'Prabu Prasasta', 'Laf5uKYqdz@gmail.com', '2019-07-29 16:42:07', '$2y$10$TkZhGJNCVo.KG2ZG2Amet.yEfnIQLQxJ2YnH/Orhj0uQgaMcr2eRy', '', '2019-07-29 16:42:07', '2019-07-29 16:42:07'),
	(48, 'Gaduh Ardianto S.Farm', '9oAz7ZFVup@gmail.com', '2019-07-29 16:42:08', '$2y$10$.ynWnXrwQw8t3RVaDoGOKOCok7i2lyXAkdrewMtlE6mn3/Oy4HdDq', '', '2019-07-29 16:42:08', '2019-07-29 16:42:08'),
	(49, 'Queen Kuswandari', 'N7u2zdGFo6@gmail.com', '2019-07-29 16:42:08', '$2y$10$bT0onrI8thkOS0MHZh3hUuikUiMfcUAXdYVLSmQFjgicZmGbyFnXm', '', '2019-07-29 16:42:08', '2019-07-29 16:42:08'),
	(50, 'Farhunnisa Handayani', '5Thze85GPw@gmail.com', '2019-07-29 16:42:08', '$2y$10$du2CNcbvpfCpGFkYf/8l2u//dMRf/nXjnDZXHU7nhitFBukML9d5q', '', '2019-07-29 16:42:08', '2019-07-29 16:42:08'),
	(51, 'Dr. Hermina Towne Sr.', 'tia27@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I5exn18hyr', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(52, 'Hoyt Goyette II', 'adavis@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qyu7I2sMNy', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(53, 'Mellie Hermiston I', 'treutel.rhoda@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L5YoQipaEt', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(54, 'Ernie Cole PhD', 'tschimmel@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Tzo5xIHVVc', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(55, 'Dr. Mackenzie Halvorson DVM', 'kylie36@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5QdDp41J9W', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(56, 'Ana Keebler III', 'eliseo.predovic@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U8HHRhWLmg', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(57, 'Paige Ruecker', 'jeramie.emmerich@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kLfSVG8IgN', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(58, 'Mr. Matt Becker I', 'griffin.lowe@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sg9BscwuqO', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(59, 'Mr. Nathen Bednar', 'dickinson.kathryn@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uCE1KX5N5W', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(60, 'Tressie Watsica', 'zsenger@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L9hH4rgykM', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(61, 'Olga Corkery', 'okuneva.nella@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9jnY45QWZ9', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(62, 'Mr. Trent Willms IV', 'rbotsford@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nAT9uGtBrA', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(63, 'Miss Trisha Smith', 'makenna61@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WNbggD9dyp', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(64, 'Claud Boyle', 'michel90@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jvXgihgAxR', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(65, 'Kristian Haag DDS', 'horacio.daniel@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VvE2ONY7fh', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(66, 'Miss Cortney Kirlin', 'shanahan.josie@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I0CaUwv7Pm', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(67, 'Lowell Ritchie', 'jayce50@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KHWbaOxJes', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(68, 'Caleb Zboncak Sr.', 'louie90@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R7HRkbspBH', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(69, 'Ellie Koepp III', 'keeling.carrie@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MkV38k7D7w', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(70, 'Zita Langosh', 'lakin.kendrick@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SE0oQlewFw', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(71, 'Prof. Tiffany Wisozk', 'mhoeger@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OGEIIt8nAl', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(72, 'Gerson Paucek', 'herbert51@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'x3oBcYHYmn', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(73, 'Elyssa Runolfsdottir', 'louisa.armstrong@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9AhbEHMjlf', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(74, 'Matilde Bradtke', 'kaci.braun@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QlNVDltJVc', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(75, 'Dave Muller', 'devin.nikolaus@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FThEsCnJtB', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(76, 'Macy Koelpin III', 'kihn.eduardo@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fOfd2goHSP', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(77, 'Raoul Nolan', 'croob@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'd6QA27FneR', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(78, 'Wallace Parker', 'lela10@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8Wm1ycQ3cs', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(79, 'Prof. Cecile Hoeger', 'pagac.brandt@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Uk8HEVa7Rb', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(80, 'Nova Rogahn', 'theodore.spencer@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FsoP8ua6Sc', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(81, 'Leopold Waelchi', 'haskell60@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QILotw6PEl', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(82, 'Ms. Sharon McCullough', 'glover.joey@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9MSredEQlh', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(83, 'Vella Keebler', 'caesar.bernier@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E13YsRukuu', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(84, 'Mrs. Delta O\'Conner', 'dickens.brody@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mxDVbAS7oD', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(85, 'Prof. Nyasia Turcotte V', 'quinten25@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vR2BGwUue7', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(86, 'Edwina Rowe', 'naomi.orn@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WJT2pLqBH2', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(87, 'Zackery Quigley', 'arnulfo.gleichner@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zANVfzOGwS', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(88, 'Mariela Jerde', 'darrel.bruen@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UssLJsraX0', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(89, 'Maud Ondricka', 'larkin.daisha@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QYDzj3NlwH', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(90, 'Gennaro Kunde', 'webert@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0bqMNdwVYs', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(91, 'Samara Hayes', 'richie.mante@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z6kUlyMAIj', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(92, 'Nasir Oberbrunner', 'carrie.thompson@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'K3BEVFGqvl', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(93, 'Abby Tremblay', 'bridie19@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ck6UuesCQS', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(94, 'Lesley Larson', 'littel.freddy@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '719xDfKKPu', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(95, 'Alta Roberts', 'larkin.yadira@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NniJut537Z', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(96, 'Mr. Demarco Ledner', 'lubowitz.lou@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yaMpWv3mai', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(97, 'Miss Kitty Collier PhD', 'david66@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Rbmx4Os3EI', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(98, 'Hyman Fahey', 'padberg.dorothy@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1FpLJbGvOk', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(99, 'Darby Gutkowski', 'annabel22@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VIYPEjeNt1', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(100, 'Gabe Beer', 'progahn@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1PvRdIerWP', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(101, 'Crystal Welch', 'bosco.leopold@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VYPJ7uIDVM', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(102, 'Tre Wyman', 'barrows.vida@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r6GXqEClCi', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(103, 'Dr. Dylan Doyle', 'bryon.stark@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UGYtSKzFo6', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(104, 'Carmen Smith', 'ohansen@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gWbpeRx83c', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(105, 'Shyann Hettinger', 'valentine.hills@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QYHk0OPZAR', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(106, 'Dr. Jaime Turcotte Sr.', 'damien.bashirian@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MfDXLES8O3', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(107, 'Kiana Kuphal', 'nzieme@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OQfGboeEQd', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(108, 'Lawrence Block', 'kasey.dooley@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jeds26fbve', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(109, 'Mrs. Dandre McGlynn III', 'sanford.luciano@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kozwjxj9bw', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(110, 'David Bartell', 'joana.bode@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'x4EWGoFgCa', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(111, 'Mr. Delaney Mayer', 'awhite@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jjbWBYVNWX', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(112, 'Dr. Anjali Weissnat', 'schmeler.magali@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pO2w00JwEZ', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(113, 'Alysson Nitzsche', 'mbernier@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OO5b7zCoDB', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(114, 'Joshuah VonRueden', 'runolfsson.kathleen@example.org', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EN7cKRjH0c', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(115, 'Jake McDermott V', 'tdoyle@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DAT1m155SA', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(116, 'Weldon White', 'vrutherford@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EQKtgB73E4', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(117, 'Miss Iliana Dickinson III', 'elise08@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YpnWyfpPza', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(118, 'Mr. Floyd Marquardt I', 'glover.vance@example.com', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xJCMd8AcKf', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(119, 'Fernando Bruen', 'pearline.hamill@example.net', '2019-08-14 14:14:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2p0pLcSXCZ', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(120, 'Wade Christiansen', 'oconner.warren@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EgfYryznO7', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(121, 'Prof. Angus Reichert', 'hspinka@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kwnsgwOpsz', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(122, 'Fritz Harris Jr.', 'josiane13@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0a2tSutl5i', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(123, 'Delpha Reynolds', 'webster22@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WoAkdixTOw', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(124, 'Misty Baumbach', 'kobe64@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gSc9t1jbEX', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(125, 'Mrs. Retta Tremblay IV', 'marques.morar@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GFYyZdPz9G', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(126, 'Ashleigh Smith', 'strosin.aida@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gFGoVl0a2r', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(127, 'Mr. Cullen Kemmer', 'trey14@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QxQjn1COqH', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(128, 'Miss Susie Reichert', 'ihudson@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rNGWCNbCFU', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(129, 'Dr. Royal Schuster II', 'kay.romaguera@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gZ3bxnsbyx', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(130, 'Miss Priscilla Okuneva', 'zmckenzie@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lApXMhi6XM', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(131, 'Prof. Delilah Lakin Jr.', 'emmerich.jana@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AWLSka65xl', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(132, 'Katelynn McClure', 'hessel.hortense@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oPeBB9XD49', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(133, 'Dr. Sandy Hintz', 'titus94@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R10czm7Crj', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(134, 'Rickie Fahey I', 'damien.padberg@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '79rvoSonRL', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(135, 'Dario Konopelski', 'kdubuque@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ASSMDxgKDx', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(136, 'Rosalee Russel', 'dante.hoeger@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n1JL35WSE3', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(137, 'Mitchel Grant IV', 'stamm.demetris@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9JKKEkIsfy', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(138, 'Prof. Jesse Luettgen MD', 'timothy18@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IA207qFHM5', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(139, 'Idell Effertz', 'nnikolaus@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kQ7qYQsUuh', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(140, 'Liliana O\'Connell MD', 'kemmer.candido@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fPjUvOhDSt', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(141, 'Johann Barrows', 'dickinson.mary@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WRvEytYqyR', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(142, 'Tyreek Marquardt', 'jordy39@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'f6Un6uhAUT', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(143, 'Bella Herman', 'ghayes@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QbobcRsWvr', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(144, 'Mr. Alfonso Gleason I', 'mckayla82@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MO2bJGWhD0', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(145, 'Mr. Freddie Mante', 'cielo.sanford@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yflyJdob8b', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(146, 'Prof. Jess Gulgowski', 'rey05@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mnEcoEZSuH', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(147, 'Rossie Swift I', 'pdooley@example.net', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NlAYMOStA9', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(148, 'Viviane Rippin MD', 'cordia.lind@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r8pL8d6sZA', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(149, 'Margarete Tillman MD', 'niko.hand@example.com', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bvFRZsPvwG', '2019-08-14 14:14:06', '2019-08-14 14:14:06'),
	(150, 'Ms. Emilia Lehner', 'martina.hilpert@example.org', '2019-08-14 14:14:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r3AzOQKMo0', '2019-08-14 14:14:06', '2019-08-14 14:14:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
