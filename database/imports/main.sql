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
(1,'Admin','admin@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'1985-11-24 12:06:47','2010-01-30 15:05:57'),
(2,'Kepala Dusun','kadus@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'1986-06-27 10:55:17','2000-06-14 05:46:59'),
(3,'Ketua RW','rw@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'2008-11-01 01:11:31','2001-10-04 20:00:59'),
(4,'Ketua RT','rt@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'2005-08-20 15:16:45','2016-09-01 14:33:05'),
(5,'Warga','warga@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'1993-03-03 23:09:08','2003-04-04 17:37:58'),
(6,'Jurnalis','jurnalis@sidesa.id',NULL,'$2y$10$7AGIBGeVGc7E9IjTp.hGbuU1uLY.ZAKOTFr7IM/ut7iKfSJZGoQ/G',NULL,'1996-12-26 13:31:21','2014-11-11 04:29:58');

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
-- Admin
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6);

INSERT INTO `data_dusun` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dusun I', 2, '2020-12-10 04:22:29', '2020-12-10 04:22:29');

INSERT INTO `data_rukun_warga` (`id`, `number`, `dusun_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '002', 1, 3, '2020-12-10 04:22:30', '2020-12-10 04:22:30');

INSERT INTO `data_rukun_tetangga` (`id`, `number`, `rukun_warga_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '001', 1, 4, '2020-12-10 04:22:30', '2020-12-10 04:22:30');

INSERT INTO `data_jurnalis` (`id`, `code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'BJ0001', 6, '2020-12-10 04:22:29', '2020-12-10 04:22:29');

INSERT INTO `nomor_induk_kependudukan` (`id`, `user_id`, `father_id`, `mother_id`, `code`, `place_of_birth`, `date_of_birth`, `gender`, `blood_type`, `address`, `dusun_id`, `rukun_warga_id`, `rukun_tetangga_id`, `religion`, `married_status`, `job_status`, `created_at`, `updated_at`) VALUES
('1','1',NULL,NULL,'3579013105780002','Dominiquefort','2013-02-18 05:07:08','Laki-Laki',NULL,'9936 Becker Islands\nNorth Marge, AK 98508',NULL,NULL,NULL,NULL,NULL,NULL,'1985-05-10 23:21:14','2019-03-06 15:58:17'),
('2','2',NULL,NULL,'3579034809880001','Lake Laury','1980-08-02 04:58:19','Laki-Laki',NULL,'97675 Thea Shore Apt. 542\nKeelymouth, IA 90216',NULL,NULL,NULL,NULL,NULL,NULL,'1998-10-05 22:35:48','2005-08-29 13:19:26'),
('3','3',NULL,NULL,'3579031308090001','Port Randiview','1977-05-29 13:28:23','Perempuan',NULL,'717 McKenzie Trafficway\nRaemouth, VA 00365',NULL,NULL,NULL,NULL,NULL,NULL,'1992-12-30 04:51:52','2009-04-23 18:24:09'),
('4','4',NULL,NULL,'3579030510700002','Makennafurt','1992-05-01 02:24:22','Perempuan',NULL,'666 Derek Garden\nLeonieberg, RI 03521',NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-20 13:28:12','1982-03-16 08:47:02'),
('5','5',2,6,'3579034802710002','North Ezra','1995-11-25 11:26:13','Laki-Laki','O','80093 Griffin Forges\nPort Alysa, SD 72243-6142',1,1,1,'Islam','Kawin','Pegawai Swasta','1986-08-23 21:45:02','2010-10-09 13:48:14'),
('6','6',NULL,NULL,'3579030406940006','Marksmouth','1991-11-21 06:04:37','Laki-Laki',NULL,'42691 Domingo Centers\nNew Alexandre, IL 56592-6821',NULL,NULL,NULL,NULL,NULL,NULL,'1997-01-28 18:48:35','2020-01-13 12:02:43'); 

INSERT INTO `set_visimisi` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Tercapainya masyarakat Desa Blang Kolak II yang Maju sejahtera, berkeadilan, berakhlak mulia dan perekonomian yang meningkat melalui peningkatan kualitas SDM yang lebih baik yang dilandasi dengan kebersamaan dan pemberdayaan masyarakat.', NULL, NULL),
(2, 'Meningkatkan Perekonomian desa melalui pemanfaatan sumber daya yang ada serta potensi desa yang dimiliki.', NULL, NULL),
(3, 'Meningkatkan pelayanan dibidang Pendidikan dan kesehatan untuk menciptakan kualitas sumber daya Manusia di Desa Blang Kolak II yang handal dan bermoral tinggi.', NULL, NULL),
(4, 'Menciptakan serta meningkatkan ketertiban masyarakat, agar tercipta kehidupan bermasyarakat yang rukun dan damai didesa Blang Kolak II.', NULL, NULL);

INSERT INTO `settings` (`id`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', 'provinsi.png', 'Aceh Tengah', 'kabupaten.png', 'Bebesan', 'Blang Kolak II', 'desa.png', NULL, NULL),
(2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5624.079267218182!2d96.83909119273355!3d4.625364547065412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3038ec09a78fe1bb%3A0xe1f38378e4c24887!2sBlang%20Kolak%20II%2C%20Bebesen%2C%20Kabupaten%20Aceh%20Tengah%2C%20Aceh!5e0!3m2!1sid!2sid!4v1607861569683!5m2!1sid!2sid', 'Senin-Jumat | 09:00 - 17:00', '+6221345678910', 'blangkolakdua@sidesa.id', 'https://www.facebook.com', 'https://twitter.com', 'https://www.instagram.com', NULL, NULL),
(3, 'info.jpg', 'Bank Aceh Syariah terus berupaya memanjakan nasabahnya dengan meningkatkan pelayanan dan menambah akses keuangan. Kemudahan terbaru yang diberikan bank milik daerah ini adalah menyediakan fasilitas atau aplikasi mobile banking yang diberi nama <strong>Aceh Transaction Online (ACTION)</strong>', '<p style="text-align: justify;">&nbsp; &nbsp; &nbsp;Desa Blang Kolak II adalah sebuah desa yang terletak di bibir ( tepi ) pantai berada di ketinggian 4 mdl dengan suhu 30<sup>o</sup>C pulau jawa tepatnya secara administratif berada di kecamatan paciran kabupaten Lamongan, yang mayoritas mata pencaharian penduduk setempat yaitu mencari ikan di laut (nelayan).</p><br>
				<p style="text-align: justify;">&nbsp; &nbsp; &nbsp;konon sebelum ada nama Blang Kolak II, masyarakat setempat menyukai berkumpul didekat pohon palang atau yang lebih dikenal dengan palang rejo yang terletak disebuah bangunan masjid yang belum jadi,menurut kepercayaan masyarakat setempat sering mendapat rezeki yang melimpah dari hasil tangkapan ikannya sewaktu mereka sering berkumpul di pohon palang rejo yang dijadikan sebagai Pos Nelayan, maka dari seringnya berkumpul dan mendapat banyak rezeki maka desa tersebut dinamakan Desa Blang Kolak II, dengan harapan dapat membawa keberkahan dan kesejahteraan bagi masyarakat Desa&nbsp;<span style="font-size: 1rem;">Blang Kolak II</span><span style="font-size: 1rem;">.</span></p><br>
				<p style="text-align: justify;">Desa Blang Kolak II terdiri dari 1 dusun yaitu Dusun Blang Kolak II, 9 RT dan 3 RW</p><br>
				<p style="text-align: justify;">&nbsp; &nbsp; &nbsp;Demikian selanyang pandang atau sejarah singkat Desa Blang Kolak II&nbsp;yang dapat kami sampaikan kepada para pegiat Medsos, semoga dapat bermanfaat untuk kita semua, terima kasih.</p>', '<p style="text-align: justify;">&nbsp; &nbsp; &nbsp;<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, NULL, NULL, NULL);

INSERT INTO `carousels` (`id`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'carousel1.jpg', '<p>Selamat datang di</p><h5>Website Desa Blank Kolak II<br><span class="font-weight-lighter">Kec. Bebesan, Kab. Aceh Tengah</span></h5>','1985-11-24 12:06:47','2010-01-30 15:05:57'),
(2, 'carousel2.jpg', '<p>Selamat datang di</p><h5>Website Desa Blank Kolak II<br><span class="font-weight-lighter">Kec. Bebesan, Kab. Aceh Tengah</span></h5>','1985-11-24 12:06:47','2010-01-30 15:05:57');

INSERT INTO `aparatur` (`id`, `image`, `name`, `position`, `created_at`, `updated_at`) VALUES
(1, 'aparatur1.jpg', 'Padlika', 'Kepala Kelurahan', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(2, 'aparatur2.jpg', 'Hafiza', 'Wakil Kelurahan', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(3, 'aparatur3.jpg', 'Angga', 'Sekretaris', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(4, 'aparatur4.jpg', 'Fajar', 'Bendahara', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(5, 'aparatur5.jpg', 'Sultan', 'Admin', '1985-11-24 12:06:47','2010-01-30 15:05:57');

INSERT INTO `facilities` (`id`, `type`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pendidikan', 'SDN Maju I', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(2, 'pendidikan', 'SDN Pagi Sore', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(3, 'kesehatan', 'RS Sumber Waras', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(4, 'kesehatan', 'Puskesmas Instant', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(5, 'transportasi', 'Angkot 08', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(6, 'transportasi', 'Becak', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(7, 'transportasi', 'Sapi Racing', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(8, 'ibadah', 'Masjid Al-Ikhlas', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(9, 'ibadah', 'Gereja Baptis Indonesia', '1985-11-24 12:06:47','2010-01-30 15:05:57'),
(10, 'olahraga', 'GOR Mama Muda', '1985-11-24 12:06:47','2010-01-30 15:05:57');

