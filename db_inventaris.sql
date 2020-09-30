-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2020 at 02:29 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_log`
--

CREATE TABLE `access_log` (
  `tanggal_access` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `path` varchar(150) NOT NULL,
  `methods` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access_log`
--

INSERT INTO `access_log` (`tanggal_access`, `ip`, `path`, `methods`, `id_user`) VALUES
('2020-02-11 20:32:14', '127.0.0.1', 'peminjaman', 'GET', 6),
('2020-02-12 09:11:01', '127.0.0.1', 'admin-login', 'POST', 6),
('2020-02-12 09:11:02', '127.0.0.1', 'inventaris', 'GET', 6),
('2020-02-12 09:11:06', '127.0.0.1', 'peminjaman', 'GET', 6),
('2020-07-18 18:40:32', '127.0.0.1', 'admin-login', 'POST', 0),
('2020-07-18 18:40:37', '127.0.0.1', 'admin-login', 'POST', 0),
('2020-07-18 18:40:43', '127.0.0.1', 'admin-login', 'POST', 6),
('2020-07-18 18:40:44', '127.0.0.1', 'inventaris', 'GET', 6),
('2020-07-18 18:40:57', '127.0.0.1', 'inventaris', 'GET', 6),
('2020-07-18 18:41:05', '127.0.0.1', 'ruang', 'GET', 6),
('2020-07-18 18:41:17', '127.0.0.1', 'jenis', 'GET', 6),
('2020-07-18 18:41:21', '127.0.0.1', 'ruang', 'GET', 6),
('2020-07-18 18:41:24', '127.0.0.1', 'inventaris', 'GET', 6),
('2020-07-18 18:41:32', '127.0.0.1', 'inventaris', 'GET', 6),
('2020-07-18 18:42:03', '127.0.0.1', 'peminjaman', 'GET', 6),
('2020-07-18 18:42:08', '127.0.0.1', 'peminjaman/req-kembali', 'GET', 6),
('2020-07-18 18:42:11', '127.0.0.1', 'peminjaman/history', 'GET', 6),
('2020-07-18 18:42:16', '127.0.0.1', 'peminjaman/show-history/28', 'GET', 6),
('2020-07-18 18:42:25', '127.0.0.1', 'peminjaman/history', 'GET', 6),
('2020-07-18 18:42:29', '127.0.0.1', 'peminjaman/show-history/28', 'GET', 6),
('2020-07-18 18:42:32', '127.0.0.1', 'peminjaman/history', 'GET', 6),
('2020-07-18 18:42:34', '127.0.0.1', 'peminjaman', 'GET', 6),
('2020-07-18 18:42:38', '127.0.0.1', 'peminjaman/show/29', 'GET', 6),
('2020-07-18 18:43:08', '127.0.0.1', 'peminjaman', 'GET', 6),
('2020-07-18 18:43:15', '127.0.0.1', 'peminjaman/acc-pinjam/29', 'GET', 6),
('2020-07-18 18:43:15', '127.0.0.1', 'peminjaman', 'GET', 6),
('2020-07-18 18:43:23', '127.0.0.1', 'peminjaman/index-acc-pinjam', 'GET', 6),
('2020-07-18 18:43:27', '127.0.0.1', 'peminjaman/show/23', 'GET', 6);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id` int(11) NOT NULL,
  `jumlah` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id`, `jumlah`, `created_at`, `updated_at`, `id_peminjaman`, `id_inventaris`) VALUES
(28, '12', '2020-02-03 09:07:49', '2020-02-03 09:09:33', 23, 8),
(29, '1', '2020-02-03 09:09:42', '2020-02-03 09:09:42', 23, 9),
(30, '50', '2020-02-03 09:12:11', '2020-02-03 09:12:11', 24, 8),
(31, '20', '2020-02-03 09:12:25', '2020-02-03 09:12:25', 24, 8),
(32, '12', '2020-02-03 09:32:17', '2020-02-03 09:32:17', 25, 8),
(33, '12', '2020-02-03 09:32:27', '2020-02-03 09:32:27', 25, 8),
(35, '23', '2020-02-03 11:36:27', '2020-02-03 11:36:27', 26, 8),
(36, '12', '2020-02-04 10:44:38', '2020-02-04 10:47:38', 28, 10),
(37, '10', '2020-02-04 10:44:47', '2020-02-04 10:44:47', 28, 12),
(38, '7', '2020-02-04 15:22:34', '2020-02-04 15:22:34', 29, 9);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kondisi` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_register` date NOT NULL,
  `kode_inventaris` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama`, `kondisi`, `keterangan`, `jumlah`, `tanggal_register`, `kode_inventaris`, `created_at`, `updated_at`, `id_jenis`, `id_ruang`, `id_petugas`) VALUES
(8, 'Sepatu Kaca', 'Rusak', 'Sangat sangat sangat baik', 100, '2019-11-15', 'J160610-R98176', '2019-11-15 18:13:31', '2020-02-04 10:47:02', 4, 7, 1),
(9, 'Adidas', 'Baik', 'Baik', 7, '2019-11-15', 'J160610-R77210', '2019-11-15 18:13:45', '2020-02-04 15:22:34', 4, 11, 1),
(10, 'Nike', 'Baik', '-', 12, '2020-02-03', 'J160610-R98176', '2020-02-03 11:29:19', '2020-02-04 11:07:45', 4, 7, 1),
(11, 'Rusak', 'Baik', '-', 1, '2020-02-03', 'J160610-R98176', '2020-02-03 11:29:55', '2020-02-03 11:29:55', 4, 7, 1),
(12, 'Blitar EDU', 'Baik', '-', 100, '2020-02-03', '03022020-J160610-R98176-P1-B6', '2020-02-03 11:41:49', '2020-02-04 11:07:45', 4, 7, 1),
(13, 'kj', 'Hilang', 'up', 1, '2020-02-03', '03022020-J05339-R42541-P1-B17', '2020-02-03 11:58:18', '2020-02-03 11:58:18', 7, 10, 1),
(14, '12uwu', 'Baik', 'Hukum yang dibuat oleh pusat pemerintahan', 1, '2020-02-03', '03022020-J05339-R42541-P1-B10', '2020-02-03 11:58:58', '2020-02-03 11:58:58', 7, 10, 1),
(15, 'Defri Indra Mahardika', 'Baik', 'uwu', 4, '2020-02-03', '03022020-J05339-R42541-P1-B74', '2020-02-03 12:01:21', '2020-02-03 12:01:21', 7, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL,
  `kode_jenis` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`, `kode_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'Sepatu', '160610', 'Baru Uy', '2019-11-15 18:07:53', '2019-11-15 18:07:53'),
(5, 'Baju', '891016', 'Sangat sangat sangat baik', '2019-11-15 18:08:03', '2019-11-15 18:08:03'),
(6, 'Celana', '22312', 'Baik1', '2019-11-15 18:09:20', '2019-11-15 18:09:20'),
(7, 'Otomotif', '05339', 'Alat sepeda motor', '2020-02-03 11:57:34', '2020-02-03 11:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', NULL, NULL),
(3, 'Operator', NULL, NULL),
(6, 'Peminjam', '2019-11-12 13:57:08', '2019-11-12 13:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `alamat` text,
  `status` int(11) NOT NULL COMMENT '0 = not active , 1 = active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `nip`, `alamat`, `status`, `created_at`, `updated_at`, `id_user`) VALUES
(4, 'Renaldi Arfi S', '3916969114303160', 'Ds. Kabut, Konohagakure', 1, '2019-11-15 17:29:11', '2019-11-15 17:30:04', 24),
(5, 'Muhammad Choirul Fachruddin', '5694883949537346', 'Ds. Hujan, Konohagakure', 1, '2019-11-15 17:30:50', '2019-11-15 17:30:50', 25),
(6, 'Arsyad Rifa\'i', '4335012366348391', 'Ds. Kabut, Konohagakure', 1, '2019-11-15 17:31:22', '2019-11-15 17:31:22', 26),
(7, 'testPegawai', '2932764962782104', 'Jalan Serenggek kudu jeung harti', 0, '2020-02-04 11:48:54', '2020-02-08 07:21:34', 34),
(8, 'testPegawai2', '1881650692383840', 'jalan panjang terbentang', 0, '2020-02-08 07:06:02', '2020-02-08 07:06:02', 39);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `created_at`, `updated_at`, `id_pegawai`) VALUES
(23, '2020-02-03', '2020-02-03', 1, '2020-02-03 09:07:28', '2020-02-03 09:07:28', 4),
(24, '2020-02-03', '2020-02-04', 3, '2020-02-03 09:11:55', '2020-02-03 09:11:55', 4),
(25, '2020-02-03', '2020-02-03', 1, '2020-02-03 09:32:04', '2020-02-03 09:32:04', 5),
(26, '2020-02-03', NULL, 0, '2020-02-03 11:36:16', '2020-02-03 11:36:16', 5),
(27, '2020-02-03', NULL, 0, '2020-02-03 11:47:49', '2020-02-03 11:47:49', 6),
(28, '2020-02-04', '2020-02-04', 3, '2020-02-04 10:41:49', '2020-02-04 10:41:49', 4),
(29, '2020-02-04', NULL, 1, '2020-02-04 12:58:51', '2020-02-04 12:58:51', 4);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'admin', '2019-11-12 13:11:25', '2019-11-12 13:11:25', 6),
(3, 'Defri Indra M', '2019-11-15 17:32:09', '2019-11-15 17:32:09', 27),
(5, 'User 519020', '2019-11-15 17:49:49', '2019-11-15 17:49:49', 33);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(45) DEFAULT NULL,
  `kode_ruang` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `kode_ruang`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, 'RUANG 0', '98176', 'Ruangan Baru Digrebek', '2019-11-15 17:54:35', '2019-11-15 17:56:37'),
(8, 'RUANG 2', '94394', 'Baik', '2019-11-15 17:56:44', '2019-11-15 17:56:44'),
(10, 'RUANG 1', '42541', 'err', '2019-11-15 18:04:37', '2019-11-15 18:04:37'),
(11, 'RUANG 3', '77210', 'Ini Adalah Keterangan', '2019-11-15 18:06:01', '2019-11-15 18:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `updated_at`, `id_level`) VALUES
(6, 'admin', '$2y$10$HmgUQ0WWy1nXwi6OnYp0xum1.H2uYueNgXb1oesq82nBm1vczr81K', '2019-11-12 12:57:58', '2019-11-15 17:31:36', 2),
(24, 'renaldi51', '$2y$10$8/6eEFXOouH.5Y/8oyPEuu9P0b6prUgV6wZxaHhy4VB9Tmw5sKeC6', '2019-11-15 17:29:11', '2019-11-15 17:29:11', 6),
(25, 'fachrud1n', '$2y$10$/dcII1pqQN6zecxXShbVx.97NfykJ0gPSAj97U6FtPWo4MMzsP4s6', '2019-11-15 17:30:50', '2019-11-15 17:30:50', 6),
(26, 'ars5y4d', '$2y$10$rrXfpvjL27H3a3o2.c5FAuOAMbR541tV0HQ/QcX90DD1xicpKVaOO', '2019-11-15 17:31:22', '2019-11-15 17:31:22', 6),
(27, 'defri', '$2y$10$6mzbGkmy/dG5uufS.YUDpukn0WC5G1.nZIMEPnc4i2lMSH.ws3S1a', '2019-11-15 17:32:09', '2019-11-15 17:32:09', 3),
(33, 'user519020', '$2y$10$pYrYTo/s59FhAhjg0yTbuO4b7nkffvHOnbu4NPwkgnDqEdgW04lCS', '2019-11-15 17:49:49', '2019-11-15 17:49:49', 3),
(34, 'testPegawai', '$2y$10$95n7E8hPeUm8gwrrVK5Z9urnPirIS4sA9w.B80ouygGdnkmonZbcy', '2020-02-04 11:48:54', '2020-02-04 11:48:54', 6),
(39, 'testPegawai2', '$2y$10$qnCvYIpE7WZZLTvFVjirQu6ikaYth5IQfebobDrKgd5OR2sy4zvnm', '2020-02-08 07:06:02', '2020-02-08 07:06:02', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_pinjam_peminjaman1_idx` (`id_peminjaman`),
  ADD KEY `fk_detail_pinjam_inventaris1_idx` (`id_inventaris`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventaris_jenis1_idx` (`id_jenis`),
  ADD KEY `fk_inventaris_ruang1_idx` (`id_ruang`),
  ADD KEY `fk_inventaris_petugas1_idx` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_user1_idx` (`id_user`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peminjaman_pegawai1_idx` (`id_pegawai`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petugas_user1_idx` (`id_user`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_user_level1_idx` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `fk_detail_pinjam_inventaris1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id`),
  ADD CONSTRAINT `fk_detail_pinjam_peminjaman1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `fk_inventaris_jenis1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventaris_petugas1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventaris_ruang1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_petugas_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_level1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
