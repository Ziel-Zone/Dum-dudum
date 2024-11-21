-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 12:11 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_cs` char(6) NOT NULL,
  `nama_cs` char(25) NOT NULL,
  `jk_cs` enum('P','L') NOT NULL,
  `alamat_cs` varchar(50) NOT NULL,
  `no_ktp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_cs`, `nama_cs`, `jk_cs`, `alamat_cs`, `no_ktp`) VALUES
('CS001', 'Fahmi Fadillah Septiana', 'L', 'Kp. Pasar Wetan RT/RW 02/01, Cisurupan Garut.', '3205201509980001');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` char(6) NOT NULL,
  `nama_kasir` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `plat_nomor` char(10) NOT NULL,
  `merk_mobil` char(10) NOT NULL,
  `tipe_mobil` char(15) NOT NULL,
  `thn_buat` int(4) NOT NULL,
  `kapasitas` int(2) NOT NULL,
  `stok_mobil` int(2) NOT NULL,
  `biaya_rental` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`plat_nomor`, `merk_mobil`, `tipe_mobil`, `thn_buat`, `kapasitas`, `stok_mobil`, `biaya_rental`) VALUES
('D 1823 AF', 'Honda', 'Jazz', 2018, 4, 5, 500000),
('Z 1111 DD', 'Daihatsu', 'Ayla', 2017, 4, 5, 250000),
('Z 1822 DF', 'Daihatsu', 'Xenia', 2017, 7, 2, 500000),
('Z 1824 FM', 'Toyota', 'Avanza', 2016, 5, 3, 400000),
('Z 1897 DZ', 'Honda', 'Mobillio', 2016, 10, 3, 450000),
('z 2312 aa', 'asdas', 'wqe', 2132, 12, 1, 1212121);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `no_nota` char(6) NOT NULL,
  `jaminan` char(10) NOT NULL,
  `denda` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nik` varchar(20) NOT NULL,
  `plat_nomor` char(10) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `jk_pelanggan` enum('P','L') NOT NULL,
  `alamat_pelanggan` varchar(50) NOT NULL,
  `telp_pelanggan` varchar(12) NOT NULL,
  `waktu_sewa` datetime NOT NULL,
  `waktu_kembali` datetime NOT NULL,
  `lama_sewa` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`plat_nomor`),
  ADD KEY `thn_buat` (`thn_buat`),
  ADD KEY `thn_buat_2` (`thn_buat`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `plat_nomor` (`plat_nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `thn_buat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2133;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`plat_nomor`) REFERENCES `mobil` (`plat_nomor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
