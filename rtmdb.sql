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

-- Dumping data for table rtmdb.model_has_roles: ~2 rows (approximately)
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

-- Dumping structure for table rtmdb.tb_menu
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `link` varchar(50) NOT NULL DEFAULT '0',
  `icon` varchar(50) DEFAULT '0',
  `is_parent` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table rtmdb.tb_menu: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`id`, `name`, `link`, `icon`, `is_parent`) VALUES
	(1, 'Beranda', '/', 'icon-home', '0'),
	(2, 'User', 'user', 'icon-users', '4'),
	(3, 'Dokumen', 'dokumen', 'icon-docs', '0'),
	(4, 'Menu Admin', '#', 'icon-user', '0');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rtmdb.users: ~50 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Puas Apriyampon', 'admin', '2019-07-29 16:42:00', '$2y$10$c57iAqV4J37/gx6AsUaOeuq2m/fzMM6Hgw2zPkW9W/noh6U5DYs8i', '', '2019-07-29 16:42:00', '2019-07-29 16:42:00'),
	(2, 'Pia Tiara Haryanti', 'editor@gmail.com', '2019-07-29 16:42:00', '$2y$10$5M0X5XM3ljhBQ/lG/7fwAuO0ZojCVFxSRwF3Kd65aoDWXNT/t9zhm', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
	(3, 'Jindra Sabri Prabowo', '1PPVd71rwm@gmail.com', '2019-07-29 16:42:01', '$2y$10$W17ALurAVFYMD6KZNG5zpu.x/Em2OfLc0c9c2Ubfv2FMCNtrnMsYK', '', '2019-07-29 16:42:01', '2019-07-29 16:42:01'),
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
	(50, 'Farhunnisa Handayani', '5Thze85GPw@gmail.com', '2019-07-29 16:42:08', '$2y$10$du2CNcbvpfCpGFkYf/8l2u//dMRf/nXjnDZXHU7nhitFBukML9d5q', '', '2019-07-29 16:42:08', '2019-07-29 16:42:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
