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

-- Dumping structure for table rtmdb.departemen
CREATE TABLE IF NOT EXISTS `departemen` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `departemen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.departemen: ~19 rows (approximately)
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
INSERT INTO `departemen` (`id`, `departemen`) VALUES
	(1, 'Divisi Inventarisasi dan Pengendalian Aset (IPA)'),
	(2, 'Sekretariat Perusahaan (Sekper)'),
	(3, 'Divisi Sumber Daya Manusia (SDM)'),
	(4, 'Divisi Umum dan PKBL'),
	(5, 'Divisi Keuangan dan Akuntansi (Akuntansi)'),
	(6, 'Divisi Pengendalian Kinerja dan Sistem Manajemen (PKSM)'),
	(7, 'Satuan Pengawasan Intern (SPI)'),
	(8, 'Divisi Pengelolaan Proyek (DPP)'),
	(9, 'Divisi SDA dan SDL (SDASDL)'),
	(10, 'Divisi Rencana Strategis dan Litbang (Renstra & Litbang)'),
	(11, 'Divisi Pengusahaan dan Pelayanan Pelanggan (P3)'),
	(12, 'Unit Usaha Wilayah II (UUW II)'),
	(13, 'Unit Usaha PLTA'),
	(14, 'Unit Usaha Pariwisata dan AMDK'),
	(15, 'Unit Usaha Wilayah I (UUW I)'),
	(16, 'Unit Usaha Wilayah IV (UUW IV)'),
	(17, 'Unit Usaha Wilayah III (UUW III)'),
	(18, 'Unit Layanan Pengadaan (ULP)'),
	(19, 'Anak Perusahaan');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;

-- Dumping structure for table rtmdb.departemen_uraian
CREATE TABLE IF NOT EXISTS `departemen_uraian` (
  `departemen_id` int(5) NOT NULL,
  `uraian_id` int(5) NOT NULL,
  PRIMARY KEY (`departemen_id`,`uraian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.departemen_uraian: ~4 rows (approximately)
/*!40000 ALTER TABLE `departemen_uraian` DISABLE KEYS */;
INSERT INTO `departemen_uraian` (`departemen_id`, `uraian_id`) VALUES
	(3, 2),
	(3, 4),
	(6, 1),
	(6, 3),
	(9, 5);
/*!40000 ALTER TABLE `departemen_uraian` ENABLE KEYS */;

-- Dumping structure for table rtmdb.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_masalah` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.jenis: ~6 rows (approximately)
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`id`, `jenis_masalah`, `created_at`, `updated_at`) VALUES
	(1, 'Hasil Audit', '2019-08-13 10:11:34', '2019-08-13 10:11:35'),
	(2, 'Umpan Balik (Feedback) Pelanggan', '2019-08-13 10:11:58', '2019-08-13 10:11:58'),
	(3, 'Kinerja Proses dan Kesesuaian Produk', '2019-08-13 10:15:47', '2019-08-13 10:15:49'),
	(4, 'Status Tindakan Koreksi dan Tindakan Pencegahan', '2019-08-13 10:15:48', '2019-08-13 10:15:49'),
	(5, 'Perubahan yang dapat mempengaruhi pada sistem manajemen', '2019-08-13 10:15:52', '2019-08-13 10:15:50'),
	(6, 'Saran untuk koreksi', '2019-08-13 10:15:51', '2019-08-13 10:15:51');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;

-- Dumping structure for table rtmdb.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.media: ~1 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Rtm', 1, 'document', '5db404e9d3651_MANUAL_BOOK_MANRISK', '5db404e9d3651_MANUAL_BOOK_MANRISK.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 1241149, '[]', '[]', '[]', 1, '2019-10-26 15:33:48', '2019-10-26 15:33:48'),
	(2, 'App\\Uraian', 5, 'lampiran', '5db483478bfba_buffing4', '5db483478bfba_buffing4.jpg', 'image/jpeg', 'public', 399401, '[]', '[]', '[]', 2, '2019-10-27 00:33:02', '2019-10-27 00:33:02');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table rtmdb.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `link` varchar(50) NOT NULL DEFAULT '0',
  `icon` varchar(50) DEFAULT '0',
  `is_parent` varchar(50) NOT NULL DEFAULT '0',
  `role` varchar(20) DEFAULT NULL,
  `urutan` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_parent`, `role`, `urutan`) VALUES
	(1, 'Beranda', '/', 'icon-home', '0', 'admin,unit,viewer', 1),
	(2, 'User', 'user', 'icon-users', '6', 'admin', 7),
	(3, 'Dokumen', 'dokumen', 'icon-docs', '0', '', 8),
	(4, 'Evaluasi RTM', '/evaluasi', 'icon-docs', '8', 'admin,unit,viewer', 5),
	(5, 'Bahan RTM', '/bahan', 'icon-notebook', '8', 'admin,unit,viewer', 3),
	(6, 'Menu Admin', '#', 'icon-user', '0', 'admin', 6),
	(7, 'Risalah RTM', '/risalah', 'icon-folder-alt', '8', 'admin,unit,viewer', 4),
	(8, 'RTM', '#', ' icon-puzzle', '0', 'admin,unit,viewer', 2);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table rtmdb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_07_29_163140_create_permission_tables', 1),
	(5, '2019_10_14_110202_create_media_table', 2);
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

-- Dumping data for table rtmdb.model_has_roles: ~20 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(2, 'App\\user', 1),
	(2, 'App\\user', 2),
	(2, 'App\\user', 3),
	(2, 'App\\user', 4),
	(2, 'App\\user', 5),
	(2, 'App\\user', 6),
	(2, 'App\\user', 7),
	(2, 'App\\user', 8),
	(2, 'App\\user', 9),
	(2, 'App\\user', 10),
	(2, 'App\\user', 11),
	(2, 'App\\user', 12),
	(2, 'App\\user', 13),
	(2, 'App\\user', 14),
	(2, 'App\\user', 15),
	(2, 'App\\user', 16),
	(2, 'App\\user', 17),
	(2, 'App\\user', 18),
	(2, 'App\\user', 19),
	(1, 'App\\user', 20);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.permissions: ~4 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view post', 'web', '2019-08-01 20:53:03', '2019-08-01 20:53:04'),
	(2, 'edit post', 'web', '2019-08-01 20:53:14', '2019-08-01 20:53:16'),
	(3, 'delete post', 'web', '2019-08-01 20:53:26', '2019-08-01 20:53:27'),
	(4, 'add post', 'web', '2019-09-16 09:56:19', '2019-09-16 09:56:20');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table rtmdb.progres
CREATE TABLE IF NOT EXISTS `progres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `target` float NOT NULL DEFAULT '0',
  `realisasi` float NOT NULL DEFAULT '0',
  `competitor` float NOT NULL DEFAULT '0',
  `year` varchar(20) NOT NULL DEFAULT '',
  `uraian_id` varchar(20) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.progres: ~2 rows (approximately)
/*!40000 ALTER TABLE `progres` DISABLE KEYS */;
INSERT INTO `progres` (`id`, `target`, `realisasi`, `competitor`, `year`, `uraian_id`, `created_at`, `updated_at`) VALUES
	(1, 100, 200, 300, '2019', '1', '2019-10-26 22:47:38', '2019-10-26 22:47:38'),
	(2, 100, 250, 300, '2020', '1', '2019-10-26 23:26:14', '2019-10-26 23:26:14');
/*!40000 ALTER TABLE `progres` ENABLE KEYS */;

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
	(2, 'unit', 'web', '2019-08-01 20:52:03', '2019-08-01 20:52:04'),
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

-- Dumping structure for table rtmdb.rtm
CREATE TABLE IF NOT EXISTS `rtm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rtm_ke` int(5) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `rkt` varchar(5) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rtm_ke` (`rtm_ke`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.rtm: ~0 rows (approximately)
/*!40000 ALTER TABLE `rtm` DISABLE KEYS */;
INSERT INTO `rtm` (`id`, `rtm_ke`, `tingkat`, `rkt`, `tahun`, `enabled`, `created_at`, `updated_at`) VALUES
	(1, 71, 'Pusat', 'I', '2019', 1, '2019-10-26 15:33:47', '2019-10-26 15:33:47');
/*!40000 ALTER TABLE `rtm` ENABLE KEYS */;

-- Dumping structure for table rtmdb.rtm_uraian
CREATE TABLE IF NOT EXISTS `rtm_uraian` (
  `rtm_id` int(5) NOT NULL,
  `uraian_id` int(5) NOT NULL,
  `status` smallint(6) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rtm_id`,`uraian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.rtm_uraian: ~4 rows (approximately)
/*!40000 ALTER TABLE `rtm_uraian` DISABLE KEYS */;
INSERT INTO `rtm_uraian` (`rtm_id`, `uraian_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(1, 2, 1, NULL, NULL),
	(1, 3, 1, NULL, NULL),
	(1, 4, 1, NULL, NULL),
	(1, 5, 1, NULL, NULL);
/*!40000 ALTER TABLE `rtm_uraian` ENABLE KEYS */;

-- Dumping structure for table rtmdb.statusn
CREATE TABLE IF NOT EXISTS `statusn` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.statusn: ~3 rows (approximately)
/*!40000 ALTER TABLE `statusn` DISABLE KEYS */;
INSERT INTO `statusn` (`id`, `nama`) VALUES
	(1, 'bahan'),
	(2, 'risalah'),
	(3, 'ditindaklanjuti');
/*!40000 ALTER TABLE `statusn` ENABLE KEYS */;

-- Dumping structure for table rtmdb.uraian
CREATE TABLE IF NOT EXISTS `uraian` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `uraian` mediumtext,
  `analisis` text,
  `r_uraian` text,
  `r_target` text,
  `ket` text,
  `tindak` text,
  `p_rencana` text,
  `p_realisasi` text,
  `jenis_id` int(5) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sbahan` tinyint(1) DEFAULT '1',
  `srisalah` tinyint(1) DEFAULT '0',
  `stindak` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.uraian: ~4 rows (approximately)
/*!40000 ALTER TABLE `uraian` DISABLE KEYS */;
INSERT INTO `uraian` (`id`, `uraian`, `analisis`, `r_uraian`, `r_target`, `ket`, `tindak`, `p_rencana`, `p_realisasi`, `jenis_id`, `status`, `sbahan`, `srisalah`, `stindak`, `created_at`, `updated_at`) VALUES
	(1, 'permasalahan PKSM 1<br>', 'permasalahan PKSM 1<br>', 'permasalahan PKSM 1<br>', 'permasalahan PKSM 1<br>', 'permasalahan PKSM 1<br>', 'Evaluasi Tindaklanjut RTM 1234<br>', '<p>  Evaluasi Tindaklanjut RTM 1234<br></p>', '<p>  Evaluasi Tindaklanjut RTM 1234<br></p>', 1, 1, 1, 1, 0, '2019-10-26 15:35:24', '2019-10-26 23:26:14'),
	(2, 'permasalahan SDM 1', '<span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>permasalahan SDM 1</span><span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>&nbsp;</span>', '<span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>permasalahan SDM 1</span><span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>&nbsp;</span>', '<span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>permasalahan SDM 1</span><span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>&nbsp;</span>', '<span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>permasalahan SDM 1</span><span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>&nbsp;</span>', NULL, NULL, NULL, 1, 1, 1, 0, 0, '2019-10-26 15:37:41', '2019-10-26 15:37:41'),
	(3, 'permasalahan PKSM 2', 'permasalahan PKSM 2', 'permasalahan PKSM 2', 'permasalahan PKSM 2', 'permasalahan PKSM 2', NULL, NULL, NULL, 2, 1, 1, 0, 0, '2019-10-26 16:31:59', '2019-10-26 16:31:59'),
	(4, '<p>permasalahan sdm&nbsp; 2</p><p><br></p><p><br></p><table class="table table-bordered"><tbody><tr><td><span style="font-size: 13px;">permasalahan sdm&nbsp; 23</span><br></td><td><span style="font-size: 13px;">permasalahan sdm&nbsp; 23</span><br></td></tr><tr><td><span style="font-size: 13px;">permasalahan sdm&nbsp; 23</span><br></td><td><span style="font-size: 13px;">permasalahan sdm&nbsp; 23</span><br></td></tr><tr><td><span style="font-size: 13px;">permasalahan sdm&nbsp; 23</span><br></td><td><span style="font-size: 13px;">permasalahan sdm&nbsp; 23</span><br></td></tr></tbody></table><p> </p>', '<span style="display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;">permasalahan sdm&nbsp; 23</span>', '<span style="display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;">permasalahan sdm&nbsp; 23</span>', '<span style="display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;">permasalahan sdm&nbsp; 23</span>', '<span style=\'display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-family: "Open Sans",sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\'>permasalahan sdm&nbsp; 2</span>', NULL, NULL, NULL, 3, 1, 1, 1, 0, '2019-10-26 16:32:24', '2019-10-26 18:05:36'),
	(5, 'permasalahan SDASDL<br>', 'permasalahan SDASDL', 'permasalahan SDASDL', 'permasalahan SDASDL', 'permasalahan SDASDL', 'Tindak lanjut SDASDL<br>', '<p>  Tindak lanjut SDASDL<br></p>', '<p>  Tindak lanjut SDASDL<br></p>', 4, 1, 1, 1, 0, '2019-10-26 23:47:23', '2019-10-27 00:33:01');
/*!40000 ALTER TABLE `uraian` ENABLE KEYS */;

-- Dumping structure for table rtmdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen_id` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.users: ~20 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `departemen_id`, `created_at`, `updated_at`) VALUES
	(1, 'Divisi Inventarisasi dan Pengendalian Aset', 'ipa', 'ipa@gmail.com', '2019-07-29 16:42:00', '$2y$10$c57iAqV4J37/gx6AsUaOeuq2m/fzMM6Hgw2zPkW9W/noh6U5DYs8i', '', 1, '2019-07-29 16:42:00', '2019-07-29 16:42:00'),
	(2, 'Sekretariat Perusahaan', 'sekper', 'sekper@gmail.com', '2019-07-29 16:42:00', '$2y$10$5M0X5XM3ljhBQ/lG/7fwAuO0ZojCVFxSRwF3Kd65aoDWXNT/t9zhm', '', 2, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(3, 'Divisi Sumber Daya Manusia', 'sdm', 'sdm@gmail.com', '2019-07-29 16:42:01', '$2y$10$W17ALurAVFYMD6KZNG5zpu.x/Em2OfLc0c9c2Ubfv2FMCNtrnMsYK', '', 3, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(4, 'Divisi Umum dan PKBL', 'umum', 'umum@gmail.com', '2019-07-29 16:42:01', '$2y$10$ePMxDtGzMn/yCF3AMV4pS.wDAMGjJXevP8c9nhkcto2rG0gFc/6lq', '', 4, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(5, 'Divisi Keuangan dan Akuntansi', 'akuntansi', 'akuntansi@gmail.com', '2019-07-29 16:42:01', '$2y$10$rblgLvhOICWjAWYgVfmz2.Vmw4XZfftX0IMlIO9mJoJszZatx1CWW', '', 5, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(6, 'Divisi Pengendalian Kinerja dan Sistem Manajemen', 'pksm', 'pksm@gmail.com', '2019-07-29 16:42:01', '$2y$10$Qw9sDg4QS6IP8etBz6ASSu5NUPaGAHjiWxPLeWO7E0rERq0UBjNKm', '', 6, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(7, 'Satuan Pengawasan Intern', 'spi', 'spi@gmail.com', '2019-07-29 16:42:01', '$2y$10$8oFS2JVVPyGTY9Dxj6W0deJqcUD7Rc7ReQVDhLQjZtyYUwi8NL23S', '', 7, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(8, 'Divisi Pengelolaan Proyek', 'dpp', 'dpp@gmail.com', '2019-07-29 16:42:01', '$2y$10$J60R1Z.PqtUAy1a6IhuWVecl3kMNG9q8IjDq1VIXC4gGXvnuCk0.y', '', 8, '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(9, 'Divisi SDA dan SDL', 'sdasdl', 'sdasdl@gmail.com', '2019-07-29 16:42:02', '$2y$10$oPDOwumhg9TizAh5jPu63ueB18X5NeDm4vbmM76Oo1ooripNPPcQG', '', 9, '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(10, 'Divisi Rencana Strategis dan Litbang', 'renstra', 'renstra@gmail.com', '2019-07-29 16:42:02', '$2y$10$J7FEmRFqatzBgMafryDNKuNIuXWyjr20K3/7PhVgvBotiBVS/lyH.', '', 10, '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(11, 'Divisi Pengusahaan dan Pelayanan Pelanggan', 'p3', 'p3@gmail.com', '2019-07-29 16:42:02', '$2y$10$GctnIUblLrq/Wk0lIzw4ReZ3k.oylLv1Zm6XtECSeEvqvzqMoMnWa', '', 11, '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(12, 'Unit Usaha Wilayah II', 'uuw2', 'uuw2@gmail.com', '2019-07-29 16:42:02', '$2y$10$IoIW72dPFZwWJest3yO9p.5MkeeHb85LlgC3M.S667wvdZCkA1QJO', '', 12, '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(13, 'Unit Usaha PLTA', 'plta', 'plta@gmail.com', '2019-07-29 16:42:02', '$2y$10$W2tQMOF41jg5kZXJLOgpnufVNYQ5PM85RvmauQ7YFjQAHShLjsj6y', '', 13, '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(14, 'Unit Usaha Pariwisata dan AMDK', 'pariwisata', 'pariwisata@gmail.com', '2019-07-29 16:42:02', '$2y$10$Vt2vtcDZT94a9KknRS0yHecUktGsaZTwrpQIHQalfT2OpInFMMb1i', '', 14, '2019-07-29 16:42:02', '2019-07-29 16:42:02'),
	(15, 'Unit Usaha Wilayah I', 'uuw1', 'uuw1@gmail.com', '2019-07-29 16:42:02', '$2y$10$Q8mvWRyNDKk3Zify7Fw6MuZiIXVVBPHsqM2UySIxtjj/DwusnpTeW', '', 15, '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(16, 'Unit Usaha Wilayah IV', 'uuw4', 'uuw4@gmail.com', '2019-07-29 16:42:03', '$2y$10$eIeR8z/EK./.ClURBqicQutWS0P4wXGD0Dvd.Q/d99sXMwjRqqF.W', '', 16, '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(17, 'Unit Usaha Wilayah III', 'uuw3', 'uuw3@gmail.com', '2019-07-29 16:42:03', '$2y$10$rtkqmiTT0fm3OHnrkEgkp.YoElrYpQKsQoVHRi8qVJw1rtOxfdvSm', '', 17, '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(18, 'Unit Layanan Pengadaan', 'ulp', 'ulp@gmail.com', '2019-07-29 16:42:03', '$2y$10$22ZwB6P6ehENujRgQcRF/ucR6sAHEk5gylnAn/466L2TDztEfjfhG', '', 18, '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(19, 'Anak Perusahaan', 'ap', 'ap@gmail.com', '2019-07-29 16:42:03', '$2y$10$wia1/WKg6A0.iQ3.WQgJjelVO.L60/4j5H8KjsH1XcH1J1BJ2vFMu', NULL, 19, '2019-07-29 16:42:03', '2019-07-29 16:42:03'),
	(20, 'Administrator', 'admin', 'admin@admin.com', '2019-07-29 16:42:03', '$2y$10$wia1/WKg6A0.iQ3.WQgJjelVO.L60/4j5H8KjsH1XcH1J1BJ2vFMu', '', 0, '2019-07-29 16:42:03', '2019-07-29 16:42:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
