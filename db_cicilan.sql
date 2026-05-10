-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2026 at 01:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cicilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

CREATE TABLE `cicilan` (
  `id_cicilan` int(11) NOT NULL,
  `nama_cicilan` varchar(100) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `terbayar` int(11) DEFAULT NULL,
  `sisa_hutang` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tenor` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `nama_cicilan`, `total_harga`, `terbayar`, `sisa_hutang`, `status`, `tenor`, `id_user`) VALUES
(15, 'iphone 18 promagh', 24000000, 2000001, 21999999, 'aktif', 24, 1),
(18, 'iphone 18 promagh', 222, 0, 222, 'aktif', 1, 2),
(19, 'Handphone VIVO', 7000000, 700000, 6300000, 'aktif', 24, 1),
(21, 'Iphone 17 Pro Max', 24000000, 0, 24000000, 'aktif', 12, 7),
(24, 'Ipad Gen 11', 11000000, 0, 11000000, 'aktif', 10, 1),
(26, 'Laptop Acer', 12000000, 0, 12000000, 'aktif', 11, 8),
(27, 'Handphone Samsung', 17000000, 0, 17000000, 'aktif', 11, 8),
(28, 'Ipad Gen 10 ', 7000000, 1166666, 5833334, 'aktif', 12, 9),
(29, 'Handphone Samsung', 17000000, 1545455, 15454545, 'aktif', 11, 9),
(30, 'Iphone 18', 20000000, 1666667, 18333333, 'aktif', 12, 9),
(31, 'Ipad Gen 11', 11000000, 1100000, 9900000, 'aktif', 10, 9),
(32, 'Ipad Gen 10', 7000000, 0, 7000000, 'aktif', 12, 9),
(33, 'Iphone 17 Pro Max', 24000000, 0, 24000000, 'aktif', 22, 1),
(34, 'Iphone 17 Pro Max', 24000000, 0, 24000000, 'aktif', 22, 1),
(35, 'Iphone 17 Pro Max', 24000000, 0, 24000000, 'aktif', 22, 1),
(36, 'Iphone 17 Pro Max', 24000000, 0, 24000000, 'aktif', 22, 1),
(37, 'Laptop Acer', 10000000, 0, 10000000, 'aktif', 12, 1),
(38, 'Iphone 17 Pro Max', 20000000, 2536232, 17463768, 'aktif', 23, 10),
(39, 'Handphone Samsung', 15000000, 0, 15000000, 'aktif', 23, 10);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_cicilan` int(11) DEFAULT NULL,
  `aksi` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_cicilan`, `aksi`, `waktu`) VALUES
(1, 19, 'edit', '2026-05-10 10:04:16'),
(2, 20, 'bayar', '2026-05-10 10:08:32'),
(3, 20, 'bayar', '2026-05-10 10:08:35'),
(4, 20, 'bayar', '2026-05-10 10:08:40'),
(5, 20, 'bayar', '2026-05-10 10:08:42'),
(6, 20, 'edit', '2026-05-10 10:08:47'),
(7, 20, 'bayar', '2026-05-10 10:08:53'),
(8, 20, 'edit', '2026-05-10 10:09:01'),
(9, 20, 'bayar', '2026-05-10 10:09:05'),
(10, 20, 'bayar', '2026-05-10 10:09:08'),
(11, 20, 'hapus', '2026-05-10 10:09:10'),
(12, 15, 'bayar', '2026-05-10 10:15:55'),
(13, 36, 'tambah', '2026-05-10 10:18:44'),
(14, 37, 'tambah', '2026-05-10 10:19:25'),
(15, 19, 'Edit', '2026-05-10 11:18:58'),
(16, 0, 'Tambah', '2026-05-10 11:40:45'),
(17, 38, 'Bayar', '2026-05-10 11:45:01'),
(18, 39, 'Tambah', '2026-05-10 11:45:23'),
(19, 38, 'Edit', '2026-05-10 11:45:38'),
(20, 38, 'Bayar', '2026-05-10 11:45:55'),
(21, 40, 'Tambah', '2026-05-10 11:46:25'),
(22, 40, 'Edit', '2026-05-10 11:46:31'),
(23, 40, 'Bayar', '2026-05-10 11:46:36'),
(24, 40, 'Bayar', '2026-05-10 11:46:38'),
(25, 40, 'Hapus', '2026-05-10 11:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'raisyaGhazy', '125133', 'raisyaGhazy@gmail.com'),
(2, 'Raisya', '125', 'Raisya@gmail.com'),
(3, 'Ghozy', '133', 'Ghozy@gmail.com'),
(7, 'neptunus', '1111111', 'neptunus@gmail.com'),
(8, 'saturnus', '222222', 'saturnus@gmail.com'),
(9, 'bumi', '333333', 'bumi@gmail.com'),
(10, 'pluto', '101010', 'pluto@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_cicilan`),
  ADD KEY `fk_user_cicilan` (`id_user`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cicilan`
--
ALTER TABLE `cicilan`
  MODIFY `id_cicilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD CONSTRAINT `fk_user_cicilan` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
