-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 04:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes_daftar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_level` int(12) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_level`, `nama_level`, `email`, `password`, `create_at`, `update_at`) VALUES
(1, 1, 'Admin Aplikasi', 'adminapk@gmail.com', '123', 0, 0),
(3, 3, 'Administrator', 'admin@gmail.com', '1234', 0, 0),
(4, 2, 'PIC Jurusan', 'PIC@gmail.com', '123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` text NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `subjek`, `pesan`, `created_at`) VALUES
(1, 'tio nugraba', 'ucup@gmail.com', 'aassdsdesd', 'dfdfdffg', '2024-10-30 07:13:35'),
(5, 'yunus jambul ijo', 'firo@wulo.com', 'holaaa guestt', 'lorem123', '2024-10-30 14:46:17'),
(8, 'indra baja ringan', 'baja_ringan@gmail.com', 'holaaa guestt', '1222', '2024-10-30 14:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `ig` varchar(50) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `deskripsi`, `twitter`, `telepon`, `ig`, `fb`, `linkedin`) VALUES
(0, 'ini lorem ipsum dolor ', 'http://localhost/angkatan1/', '223244334', 'http://localhost/angkatan2/', 'http://localhost/angkatan3', 'http://localhost/angkatan3/myperpusw');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(12) NOT NULL,
  `nama_gelombang` varchar(23) NOT NULL,
  `status` tinyint(12) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `status`, `create_at`, `update_at`) VALUES
(1, 'Gelombang 1', 0, '2024-11-12 03:32:07', '2024-11-12 03:32:07'),
(2, 'Gelombang 2', 0, '2024-11-12 03:32:12', '2024-11-12 03:32:12'),
(3, 'Gelombang 3', 0, '2024-11-12 03:32:16', '2024-11-12 03:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `header` varchar(50) NOT NULL,
  `sub_judul` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `header`, `sub_judul`, `foto`, `created_at`) VALUES
(1, 'Lorem Website', 'lorem dolor', '1297122.jpg', '2024-11-16 12:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(12) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `update_at`) VALUES
(10, 'Teknik Komputer', '2024-11-11 15:05:38', '2024-11-11 15:05:38'),
(11, 'Teknik Jaringan', '2024-11-11 15:05:42', '2024-11-11 15:05:42'),
(12, 'Web Programming', '2024-11-11 15:05:54', '2024-11-11 15:05:54'),
(13, 'Desain Grafis', '2024-11-11 15:05:59', '2024-11-11 15:05:59'),
(14, 'Content Creator', '2024-11-11 15:06:03', '2024-11-11 15:06:03'),
(15, 'Vidio Editor', '2024-11-11 15:06:14', '2024-11-11 15:06:14'),
(16, 'Teknik Otomotip', '2024-11-11 15:06:17', '2024-11-11 15:06:17'),
(17, 'Teknik Pendingin', '2024-11-11 15:06:20', '2024-11-11 15:06:20'),
(18, 'Barista', '2024-11-11 15:06:23', '2024-11-11 15:06:23'),
(19, 'Bahasi Inggris', '2024-11-11 15:06:26', '2024-11-11 15:06:26'),
(20, 'Bahasa Korea', '2024-11-11 15:06:36', '2024-11-11 15:06:36'),
(21, 'Tata Graha', '2024-11-11 15:06:38', '2024-11-11 15:06:38'),
(22, 'Mek Up Artist', '2024-11-11 15:06:40', '2024-11-11 15:06:40'),
(23, 'Tata Boga', '2024-11-11 15:06:50', '2024-11-11 15:06:50'),
(24, 'Tata Busana', '2024-11-11 15:06:52', '2024-11-11 15:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(12) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `update_at`) VALUES
(1, 'Admin Aplikasi', '2024-11-12 02:19:50', '2024-11-12 02:19:50'),
(2, 'PIC Jurusan', '2024-11-12 02:19:50', '2024-11-12 02:19:50'),
(3, 'Administrator', '2024-11-12 02:20:12', '2024-11-12 02:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id`, `username`, `email`, `password`, `update_at`, `created_at`) VALUES
(1, 'admin123', 'admin@gmail.com', '1234', '2024-10-28 03:41:46', '2024-10-28 03:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `nama_gelombang` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `kejuruan` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_ad` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id`, `id_jurusan`, `id_gelombang`, `nama_gelombang`, `nama_lengkap`, `nik`, `kartu_keluarga`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `nama_sekolah`, `kejuruan`, `no_telepon`, `email`, `aktivitas`, `status`, `create_ad`, `update_at`) VALUES
(33, 23, 2, 'Gelombang 2', 'jayanti', '54545', 'apple-touch-icon.png', 'laki-laki', 'sdsdfsdf', '12-12-1998', 'SMA', ' Global Hidayah', 'Tata Boga', '545454', 'jayanti@gmail.com', 'Surabaya', 1, '2024-11-12 04:57:14', '2024-11-17 15:26:29'),
(34, 10, 3, 'Gelombang 3', 'raiden makoto', '32232343', '1297122.jpg', 'perempuan', 'fdfg', '2024-11-19', 'ffgfg', 'fgtffg', 'Teknik Komputer', '566556', 'firo@wulo.com', 'fdhhggh', 1, '2024-11-16 14:02:05', '2024-11-17 15:26:26'),
(43, 14, 2, 'Gelombang 2', 'ibnu ibrahim', '32232343', NULL, 'laki-laki', 'fdfg', '2024-11-06', 'SMA', 'fgtffg', 'Content Creator', '566556', 'firo@wulo.com', 'fdhhggh', 0, '2024-11-17 14:12:53', '2024-11-17 15:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `id_level` int(12) NOT NULL,
  `nama_level` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `nama_level`, `nama_lengkap`, `email`, `password`, `update_at`, `create_at`) VALUES
(16, 2, 'PIC Jurusan', 'raiden makoto', 'baal@gmail.com', '123', '2024-11-16 14:41:05', '2024-11-12 14:49:00'),
(20, 2, 'PIC Jurusan', 'yae miko', 'miko@gmail.com', '123', '2024-11-16 14:43:17', '2024-11-16 14:43:17'),
(21, 3, 'Administrator', 'admin', 'admin@gmail.com', '123', '2024-11-16 14:43:33', '2024-11-16 14:43:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gelombang_to_gelombang_id` (`id_gelombang`),
  ADD KEY `id_jurusan_to_jurusan_id` (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level_to_id_user` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `id_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD CONSTRAINT `id_gelombang_to_gelombang_id` FOREIGN KEY (`id_gelombang`) REFERENCES `gelombang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jurusan_to_jurusan_id` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_level_to_id_user` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
