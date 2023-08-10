-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 04:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisonal`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `reviewer1`
-- (See below for the actual view)
--
CREATE TABLE `reviewer1` (
`submission` int(11)
,`nama` varchar(55)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reviewer2`
-- (See below for the actual view)
--
CREATE TABLE `reviewer2` (
`submission` int(11)
,`nama` varchar(55)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailjurnal`
--

CREATE TABLE `tb_detailjurnal` (
  `submission` int(11) NOT NULL,
  `id_reviewer` int(11) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detailjurnal`
--

INSERT INTO `tb_detailjurnal` (`submission`, `id_reviewer`, `status`) VALUES
(62345, 12, 0),
(62345, 11, 1),
(1234, 12, 0),
(12345, 12, 0),
(2222, 12, 0),
(2222, 11, 1),
(3333, 12, 0),
(1234, 15, 1),
(3333, 14, 1),
(12345, 13, 1),
(4444, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisseminar`
--

CREATE TABLE `tb_jenisseminar` (
  `kode_seminar` int(11) NOT NULL,
  `jenis_seminar` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenisseminar`
--

INSERT INTO `tb_jenisseminar` (`kode_seminar`, `jenis_seminar`) VALUES
(11, 'SENIATI'),
(12, 'SEMSINA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `submission` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `kode_seminar` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pembayaran` tinyint(1) NOT NULL,
  `kehadiran` tinyint(4) NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`submission`, `judul`, `nama`, `email`, `prodi`, `pt`, `no_wa`, `kode_seminar`, `status`, `pembayaran`, `kehadiran`, `catatan`) VALUES
(1234, 'Pengaruh Hidup', 'Lakiam', 'x6perb@gmail.com', 'Informatika', 'ITN Malang', '62895601150286', 11, 6, 1, 1, 'Edit Di Junal\r\nEdit Kesek\r\nEdiit Koor'),
(2222, 'Pengaruh Hidup Mati', 'Ibnu', 'ibnu.hmm@gmail.com', 'Informatika', 'ITN Malang', '62895601150286', 12, 1, 1, 1, 'jjjjjjjj'),
(3333, 'Pengaruh Bapak Kau dan Mamak Kau di Dunia', 'Ibnu', 'ibnu.hmm@gmail.com', 'Informatika S1', 'ITN Malang', '62895601150286', 12, 3, 2, 2, 'Ini Create\r\nIni Update\r\n============Jurnal End\r\nIni Kesek update Belum Lunas\r\nLunas by Login Kesek\r\n=========\r\nIni Koor\r\nWoi Kesek Ini Koor aowkwkwkwkwk'),
(4444, '2', 'Ibnu', 'ibnu.hmm@gmail.com', 'Informatika', 'ITN Malang', '62895601150286', 11, 1, 1, 2, NULL),
(12345, 'Pengaruh Bapak Kau dan Mamak Kau ini', 'Joni', 'ibnu.hmm@gmail.com', 'tttt', 'itn', '62895601150286', 11, 3, 2, 1, 'uu'),
(62345, 'Pengaruh Bapak Kau dan Mamak Kau ini', 'Ibnu', 'ibnu.hmm@gmail.com', 'tttt', 'itn', '62895601150286', 12, 4, 2, 2, 'ttttuuu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reviewer`
--

CREATE TABLE `tb_reviewer` (
  `id_reviewer` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_reviewer`
--

INSERT INTO `tb_reviewer` (`id_reviewer`, `nama`) VALUES
(11, 'Ibnu'),
(12, 'Michael'),
(13, 'Joni'),
(14, 'Lakiam'),
(15, 'Kristin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$Jo/ezqin.neF2bsml6BVouUGlwYUyi7RUlqJzrAqmc0XRTOyK1XP.', 'Admin'),
(2, 'ibnu', '$2y$10$QKNoIsHEnbYsOtdKhxbFXuXsJynopGofsTPISjuy6FIj9z8iu3Y9m', 'Koordinator'),
(3, 'michael', '$2y$10$k2FTEssP/WMFQrPCWcBMoepVYzn66.vvYQzYKweAfwBIRAVexZ40C', 'Kesekretariat');

-- --------------------------------------------------------

--
-- Structure for view `reviewer1`
--
DROP TABLE IF EXISTS `reviewer1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reviewer1`  AS SELECT `tb_jurnal`.`submission` AS `submission`, `tb_reviewer`.`nama` AS `nama` FROM ((`tb_jurnal` left join `tb_detailjurnal` on(`tb_jurnal`.`submission` = `tb_detailjurnal`.`submission`)) join `tb_reviewer` on(`tb_detailjurnal`.`id_reviewer` = `tb_reviewer`.`id_reviewer`)) WHERE `tb_detailjurnal`.`status` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `reviewer2`
--
DROP TABLE IF EXISTS `reviewer2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reviewer2`  AS SELECT `tb_jurnal`.`submission` AS `submission`, `tb_reviewer`.`nama` AS `nama` FROM ((`tb_jurnal` left join `tb_detailjurnal` on(`tb_jurnal`.`submission` = `tb_detailjurnal`.`submission`)) join `tb_reviewer` on(`tb_detailjurnal`.`id_reviewer` = `tb_reviewer`.`id_reviewer`)) WHERE `tb_detailjurnal`.`status` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_detailjurnal`
--
ALTER TABLE `tb_detailjurnal`
  ADD KEY `submission` (`submission`),
  ADD KEY `id_reviewer` (`id_reviewer`);

--
-- Indexes for table `tb_jenisseminar`
--
ALTER TABLE `tb_jenisseminar`
  ADD PRIMARY KEY (`kode_seminar`);

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`submission`),
  ADD KEY `id_jenisseminar` (`kode_seminar`);

--
-- Indexes for table `tb_reviewer`
--
ALTER TABLE `tb_reviewer`
  ADD PRIMARY KEY (`id_reviewer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detailjurnal`
--
ALTER TABLE `tb_detailjurnal`
  ADD CONSTRAINT `tb_detailjurnal_ibfk_1` FOREIGN KEY (`submission`) REFERENCES `tb_jurnal` (`submission`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detailjurnal_ibfk_2` FOREIGN KEY (`id_reviewer`) REFERENCES `tb_reviewer` (`id_reviewer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD CONSTRAINT `tb_jurnal_ibfk_1` FOREIGN KEY (`kode_seminar`) REFERENCES `tb_jenisseminar` (`kode_seminar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
