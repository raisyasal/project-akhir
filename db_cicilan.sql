-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 12:42 PM
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
  `tenor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `nama_cicilan`, `total_harga`, `terbayar`, `sisa_hutang`, `status`, `tenor`) VALUES
(3, 'Headset Gaming', 500000, 500000, 0, 'lunas', 1),
(10, 'Handphone VIVO', 4000000, 333333, 3666667, 'aktif', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'raisyaGhazy', '125133'),
(2, 'Raisya', '125');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_cicilan`);

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
  MODIFY `id_cicilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
