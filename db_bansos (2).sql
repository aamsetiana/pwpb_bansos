-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bansos`
--

CREATE TABLE `bansos` (
  `id_bantuan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_bantuan` enum('Uang','Sembako') NOT NULL,
  `jumlah_bantuan` varchar(150) NOT NULL,
  `tanggal_bantuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bansos`
--

INSERT INTO `bansos` (`id_bantuan`, `nama`, `alamat`, `jenis_bantuan`, `jumlah_bantuan`, `tanggal_bantuan`) VALUES
(1, 'alex', 'Kuningan', 'Uang', '5 Juta', '2023-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bansos`
--

CREATE TABLE `jenis_bansos` (
  `kode_bansos` int(11) NOT NULL,
  `tipe_bantuan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_bansos`
--

INSERT INTO `jenis_bansos` (`kode_bansos`, `tipe_bantuan`) VALUES
(111, 'PIP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `jenis_bansos`
--
ALTER TABLE `jenis_bansos`
  ADD PRIMARY KEY (`kode_bansos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
