-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 02:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indonesia_peduli`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balas_komentar`
--

CREATE TABLE `balas_komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `komentar_id` bigint(20) UNSIGNED NOT NULL,
  `komentar_balas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cara_kerja`
--

CREATE TABLE `cara_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `doa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_donasi`
--

CREATE TABLE `kategori_donasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_donasi`
--

INSERT INTO `kategori_donasi` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Program Donasi Utama', '2022-04-04 14:36:45', '2022-04-04 14:36:45'),
(2, 'Kemanusiaan', '2022-04-04 14:36:45', '2022-04-04 14:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `user_id`, `program_donasi_id`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 2, 21, 'Semoga lekas membaik', '2022-04-05 11:32:53', '2022-04-05 11:32:53'),
(2, 2, 21, 'Semoga lekas sembuh', '2022-04-05 11:33:38', '2022-04-05 11:33:38'),
(3, 2, 21, 'Amiin', '2022-04-05 11:33:50', '2022-04-05 11:33:50'),
(4, 2, 21, 'Amiin', '2022-04-05 11:34:03', '2022-04-05 11:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `like_balas_komentar`
--

CREATE TABLE `like_balas_komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balas_komentar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_komentar`
--

CREATE TABLE `like_komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `komentar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_program_donasi`
--

CREATE TABLE `like_program_donasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2022_02_04_064937_create_kategori_donasis_table', 1),
(3, '2022_02_08_091419_create_program_donasis_table', 1),
(4, '2022_02_11_203508_create_donasis_table', 1),
(5, '2022_02_19_214624_create_komentars_table', 1),
(6, '2022_02_20_001113_create_balas_komentars_table', 1),
(7, '2022_02_20_125335_create_like_program_donasis_table', 1),
(8, '2022_02_20_221951_create_like_komentars_table', 1),
(9, '2022_02_20_232438_create_like_balas_komentars_table', 1),
(10, '2022_02_24_125442_create_penyaluran_danas_table', 1),
(11, '2022_03_06_164137_create_tentang_kamis_table', 1),
(12, '2022_03_20_005303_create_partner_kamis_table', 1),
(13, '2022_03_20_220121_create_cara_kerjas_table', 1),
(14, '2022_03_20_231031_create_anggota_tims_table', 1),
(15, '2022_03_21_010842_create_pertanyaans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner_kami`
--

CREATE TABLE `partner_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deksripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran_dana`
--

CREATE TABLE `penyaluran_dana` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawab` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_donasi`
--

CREATE TABLE `program_donasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_dana` int(11) NOT NULL,
  `batas_akhir_donasi` date NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kisah` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_donasi`
--

INSERT INTO `program_donasi` (`id`, `user_id`, `judul`, `kategori_donasi_id`, `deskripsi`, `kebutuhan_dana`, `batas_akhir_donasi`, `gambar`, `kisah`, `created_at`, `updated_at`) VALUES
(17, 1, 'Aceng Badru', 1, 'Derita Kelainan Pergerakan, Pak Ustad Aceng Butuh Pertolonganmu Segera!', 15000000, '2022-06-25', '1648995324.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(18, 1, 'An Naura Eka Putri', 1, 'Mari Bantu Adik Naura Sembuh dari Penyakit Lumpuh Otak!', 20000000, '2022-04-25', '1648995563.jpg', 'Sejak bayi, Naura (8) terindikasi mengalami kelainan. Kakinya terlilit usus saat dalam kandungan yang menyebabkan pertumbuhan fisiknya terhambat. Naura divonis dokter mengidap penyakit microcephali dan cerebral palsy yang membuat ukuran kepalanya lebih kecil dari ukuran normal. Kondisinya semakin hari semakin memprihatinkan. Pasalnya, anak tunggal dari Bu Dewi dan Pak Indra (37) harus selalu diberi asupan nutrisi dari susu tiap 2 jam sekali. Ia bisa menghabiskan 7 kg susu per minggunya. Dulu, sudah 2 tahun lebih Naura menjalani fisioterapi. Segala macam pengobatan yang direkomendasikan pasti selalu dicoba demi kesembuhan Naura. Namun, karena kondisi ekonomi yang serba sulit, Naura berhenti berobat. Saat ini ia hanya bisa terbaring kaku di kasur dan lemah tak berdaya.', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(19, 1, 'Sri Rahayu', 1, 'Yuk Bantu Ibu Sri Lawan Kanker Serviks!', 15000000, '2022-06-25', '1648996042.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(20, 1, 'Suracmat', 2, 'Yuk Ulurkan Tanganmu untuk Pak Suracmat agar Sembuh dari Penyakit Kanker Usus!', 25000000, '2022-06-25', '1648995955.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(21, 1, 'Muhamad Rayyan Dzaky Winata', 2, 'Derita Lumpuh Otak Hingga Penyakit Jantung, Rayyan Butuh Pertolonganmu Segera!', 30000000, '2022-06-25', '1648995393.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(22, 1, 'Jihan Aisyah Fadhila', 2, 'Jihan Bocah 2 tahun Alami Keterlambatan Tumbuh Kembang dan Gangguan Pendengaran, Bantuanmu sangat diharapkan', 50000000, '2022-06-25', '1646558673.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(23, 1, 'Ferisetiawan', 2, 'Masa Remajanya Terenggut Akibat Tumor Tulang, Feri Mengharapkan Bantuanmu', 11000000, '2022-06-25', '1645977191.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42'),
(24, 1, 'Rakha Putra Gunawan', 2, 'Lahir Tanpa Lubang Anus, Adik Putra Butuh Biaya untuk Operasi Lanjutan', 8000000, '2022-06-25', '1645977056.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?', '2022-04-04 14:57:42', '2022-04-04 14:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deksripsi_singkat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deksripsi_footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deksripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_utama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `deksripsi_singkat`, `deksripsi_footer`, `deksripsi`, `gambar_utama`, `alamat`, `email`, `nomor_hp`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque dolores dolorem provident accusamus, ad asperiores officiis minima corporis ipsum dicta laborum quam, laboriosam quae placeat ullam numquam! Placeat, porro quis?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at voluptatum sapiente vero, accusamus, minima autem repellendus voluptatibus iure corrupti, laudantium inventore fugiat animi itaque incidunt delectus? Debitis, voluptate optio? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at voluptatum sapiente vero, accusamus, minima autem repellendus voluptatibus iure corrupti, laudantium inventore fugiat animi itaque incidunt delectus? Debitis, voluptate optio? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at voluptatum sapiente vero, accusamus, minima autem repellendus voluptatibus iure corrupti, laudantium inventore fugiat animi itaque incidunt delectus? Debitis, voluptate optio?', 'mainImages.png', 'Jl.Indonesia Jakarta Timur', 'indonesiapeduli@gmail.com', '085232077932', 'IndonesiaPeduli', '@indonesiaPeduli', 'indonesia.peduli', 'Indonesia Peduli', '2022-04-04 14:24:22', '2022-04-04 14:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `nomor_hp`, `password`, `role`, `jenis_kelamin`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'indonesiapeduli@gmail.com', '085232077931', '$2y$10$0EYchM9yeZ//4q7Y9LBzcepaTYxNLm7akXYZSnurC/sRI7NbCcQ5G', '1', 'L', 'default.png', NULL, '2022-04-04 14:24:18', '2022-04-04 14:24:18'),
(2, 'Member', 'memberpeduli@gmail.com', '085232077932', '$2y$10$Tc2gZ6YkvB7PgRkmINXOe.P4QaQMlCQ0TFmCKZ/HgeILaL2/.az9a', '2', 'L', 'default.png', NULL, '2022-04-04 14:24:18', '2022-04-04 14:24:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balas_komentar_user_id_foreign` (`user_id`),
  ADD KEY `balas_komentar_komentar_id_foreign` (`komentar_id`);

--
-- Indexes for table `cara_kerja`
--
ALTER TABLE `cara_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donasi_user_id_foreign` (`user_id`),
  ADD KEY `donasi_program_donasi_id_foreign` (`program_donasi_id`);

--
-- Indexes for table `kategori_donasi`
--
ALTER TABLE `kategori_donasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_donasi_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_user_id_foreign` (`user_id`),
  ADD KEY `komentar_program_donasi_id_foreign` (`program_donasi_id`);

--
-- Indexes for table `like_balas_komentar`
--
ALTER TABLE `like_balas_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_balas_komentar_user_id_foreign` (`user_id`),
  ADD KEY `like_balas_komentar_balas_komentar_id_foreign` (`balas_komentar_id`);

--
-- Indexes for table `like_komentar`
--
ALTER TABLE `like_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_komentar_user_id_foreign` (`user_id`),
  ADD KEY `like_komentar_komentar_id_foreign` (`komentar_id`);

--
-- Indexes for table `like_program_donasi`
--
ALTER TABLE `like_program_donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_program_donasi_user_id_foreign` (`user_id`),
  ADD KEY `like_program_donasi_program_donasi_id_foreign` (`program_donasi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_kami`
--
ALTER TABLE `partner_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyaluran_dana`
--
ALTER TABLE `penyaluran_dana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyaluran_dana_user_id_foreign` (`user_id`),
  ADD KEY `penyaluran_dana_program_donasi_id_foreign` (`program_donasi_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_donasi`
--
ALTER TABLE `program_donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_donasi_user_id_foreign` (`user_id`),
  ADD KEY `program_donasi_kategori_donasi_id_foreign` (`kategori_donasi_id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD UNIQUE KEY `user_nomor_hp_unique` (`nomor_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cara_kerja`
--
ALTER TABLE `cara_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_donasi`
--
ALTER TABLE `kategori_donasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `like_balas_komentar`
--
ALTER TABLE `like_balas_komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_komentar`
--
ALTER TABLE `like_komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_program_donasi`
--
ALTER TABLE `like_program_donasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partner_kami`
--
ALTER TABLE `partner_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyaluran_dana`
--
ALTER TABLE `penyaluran_dana`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_donasi`
--
ALTER TABLE `program_donasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD CONSTRAINT `balas_komentar_komentar_id_foreign` FOREIGN KEY (`komentar_id`) REFERENCES `komentar` (`id`),
  ADD CONSTRAINT `balas_komentar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_program_donasi_id_foreign` FOREIGN KEY (`program_donasi_id`) REFERENCES `program_donasi` (`id`),
  ADD CONSTRAINT `donasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_program_donasi_id_foreign` FOREIGN KEY (`program_donasi_id`) REFERENCES `program_donasi` (`id`),
  ADD CONSTRAINT `komentar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `like_balas_komentar`
--
ALTER TABLE `like_balas_komentar`
  ADD CONSTRAINT `like_balas_komentar_balas_komentar_id_foreign` FOREIGN KEY (`balas_komentar_id`) REFERENCES `balas_komentar` (`id`),
  ADD CONSTRAINT `like_balas_komentar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `like_komentar`
--
ALTER TABLE `like_komentar`
  ADD CONSTRAINT `like_komentar_komentar_id_foreign` FOREIGN KEY (`komentar_id`) REFERENCES `komentar` (`id`),
  ADD CONSTRAINT `like_komentar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `like_program_donasi`
--
ALTER TABLE `like_program_donasi`
  ADD CONSTRAINT `like_program_donasi_program_donasi_id_foreign` FOREIGN KEY (`program_donasi_id`) REFERENCES `program_donasi` (`id`),
  ADD CONSTRAINT `like_program_donasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `penyaluran_dana`
--
ALTER TABLE `penyaluran_dana`
  ADD CONSTRAINT `penyaluran_dana_program_donasi_id_foreign` FOREIGN KEY (`program_donasi_id`) REFERENCES `program_donasi` (`id`),
  ADD CONSTRAINT `penyaluran_dana_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `program_donasi`
--
ALTER TABLE `program_donasi`
  ADD CONSTRAINT `program_donasi_kategori_donasi_id_foreign` FOREIGN KEY (`kategori_donasi_id`) REFERENCES `kategori_donasi` (`id`),
  ADD CONSTRAINT `program_donasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
