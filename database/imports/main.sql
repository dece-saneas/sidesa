INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-12-10 04:22:25', '2020-12-10 04:22:25'),
(2, 'Kepala Dusun', 'web', '2020-12-10 04:22:25', '2020-12-10 04:22:25'),
(3, 'Ketua RW', 'web', '2020-12-10 04:22:25', '2020-12-10 04:22:25'),
(4, 'Ketua RT', 'web', '2020-12-10 04:22:25', '2020-12-10 04:22:25'),
(5, 'Warga', 'web', '2020-12-10 04:22:25', '2020-12-10 04:22:25'),
(6, 'Jurnalis', 'web', '2020-12-10 04:22:25', '2020-12-10 04:22:25');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'penduduk', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(2, 'penduduk-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(3, 'penduduk-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(4, 'penduduk-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(5, 'rukun-warga', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(6, 'rukun-warga-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(7, 'rukun-warga-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(8, 'rukun-warga-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(9, 'rukun-tetangga', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(10, 'rukun-tetangga-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(11, 'rukun-tetangga-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(12, 'rukun-tetangga-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(13, 'dusun', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(14, 'dusun-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(15, 'dusun-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(16, 'dusun-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(17, 'jurnalis', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(18, 'jurnalis-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(19, 'jurnalis-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(20, 'jurnalis-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(21, 'article', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(22, 'article-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(23, 'article-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(24, 'article-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(25, 'article-confirm', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(26, 'aspirasi', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(27, 'aspirasi-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(28, 'aspirasi-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(29, 'aspirasi-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(30, 'aspirasi-confirm', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(31, 'anggaran', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(32, 'anggaran-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(33, 'anggaran-edit', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(34, 'anggaran-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(35, 'surat', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(36, 'surat-create', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(37, 'surat-process', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29'),
(38, 'surat-destroy', 'web', '2020-12-10 04:22:29', '2020-12-10 04:22:29');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
-- Admin
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(25, 1),
(26, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(37, 1),
-- Kepala Dusun
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(31, 2),
-- Ketua RW
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(31, 3),
-- Ketua RT
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(31, 4),
-- Warga
(26, 5),
(27, 5),
(29, 5),
(31, 5),
(35, 5),
(36, 5),
(38, 5),
-- Jurnalis
(21, 6),
(22, 6),
(23, 6),
(24, 6);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('1','Admin Pertama','admin@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'1985-11-24 12:06:47','2010-01-30 15:05:57');

INSERT INTO `nomor_induk_kependudukan` (`id`, `user_id`, `father_id`, `mother_id`, `code`, `place_of_birth`, `date_of_birth`, `gender`, `blood_type`, `address`, `dusun_id`, `rukun_warga_id`, `rukun_tetangga_id`, `religion`, `married_status`, `job_status`, `created_at`, `updated_at`) VALUES
('1','1',NULL,NULL,'3579013105780002','Dominiquefort','2013-02-18 05:07:08','Laki-Laki',NULL,'9936 Becker Islands\nNorth Marge, AK 98508',NULL,NULL,NULL,NULL,NULL,NULL,'1985-05-10 23:21:14','2019-03-06 15:58:17'); 

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
-- Admin
(1, 'App\\Models\\User', 1);