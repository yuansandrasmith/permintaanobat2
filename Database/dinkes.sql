-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 11:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinkes`
--

-- --------------------------------------------------------

--
-- Table structure for table `alkes`
--

CREATE TABLE `alkes` (
  `kd_alkes` char(11) NOT NULL,
  `nama_alkes` varchar(50) NOT NULL,
  `jenis_alkes` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alkes`
--

INSERT INTO `alkes` (`kd_alkes`, `nama_alkes`, `jenis_alkes`, `stok`) VALUES
('ALK001', 'asf', 'asf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kd_jabatan` char(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
('K001', 'Supervisor'),
('K002', 'Divisi SDM');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` char(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `kd_jabatan` char(11) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(15) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `kd_jabatan`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`, `agama`, `telp`) VALUES
('09345632', 'Airi', 'K001', 'Laki - Laki', 'banjarmasin', '2021-03-27', 'asf', 'Islam', '0812501791');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` char(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`, `jenis_obat`, `stok`) VALUES
('OBT001', 'asf', 'asf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` char(11) NOT NULL,
  `kd_obat` char(11) NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nama_peminta` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_alkes`
--

CREATE TABLE `permintaan_alkes` (
  `id_permintaan_alkes` char(11) NOT NULL,
  `kd_alkes` char(11) NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nama_peminta` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL,
  `id_karyawan` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `level`, `id_karyawan`) VALUES
('09345632', 'karyawan', 'karyawan', 'karyawan', '09345632'),
('U001', 'admin', 'admin', 'admin', '001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`kd_alkes`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `kd_jabatan` (`kd_jabatan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `kd_obat` (`kd_obat`);

--
-- Indexes for table `permintaan_alkes`
--
ALTER TABLE `permintaan_alkes`
  ADD PRIMARY KEY (`id_permintaan_alkes`),
  ADD KEY `kd_alkes` (`kd_alkes`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
