-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 08:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h2laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `no_hp_admin` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_hp_admin`, `password`) VALUES
(1, 'admin', '65676767', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk_barang` varchar(30) NOT NULL,
  `stok` int(10) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `merk_barang`, `stok`, `total_harga`, `tgl_input`) VALUES
(1, 'soffel', 'Autan', 10, 300002, '2017-01-01 19:22:23'),
(3, 'byclean', 'aqua', 10, 90000, '2017-01-01 19:22:23'),
(4, 'setrika', 'tamiya', 3, 1000000, '2017-01-04 14:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `paket` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `paket`, `harga`) VALUES
(1, 'express', 7000),
(3, 'murah meriah', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelgn` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass_pelgn` varchar(50) NOT NULL,
  `nama_pelgn` varchar(50) NOT NULL,
  `no_hp_pelgn` varchar(12) NOT NULL,
  `almt_pelgn` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelgn`, `username`, `pass_pelgn`, `nama_pelgn`, `no_hp_pelgn`, `almt_pelgn`, `status`) VALUES
(7, 'ads', '2deb000b57bfac9d72c14d4ed967b572', 'asd', '544', 'asda', 1),
(8, 'asd', 'd9729feb74992cc3482b350163a1a010', 'ads', '56', 'ads', 1),
(9, 'sfds', '7b064dad507c266a161ffc73c53dcdc5', 'ada', 'fa', 'afs', 1),
(10, 'ossas', '0502cf93993504b19c5a31eb36e61f48', 'Uvuvuwevuwe onyetvwevewve ugwemubwem ossas', '085208210813', 'jalan raya', 1),
(11, 'ad', '0502cf93993504b19c5a31eb36e61f48', 'orea', '08122121221', 'asa', 1),
(12, 'ossasu', '0502cf93993504b19c5a31eb36e61f48', 'ossasu', '085208120813', 'jalan raya', 1),
(15, 'sahabatossas', '0502cf93993504b19c5a31eb36e61f48', 'ossasas', '085208210813', 'jalan raya', 0),
(16, 'sahabatossass', '0502cf93993504b19c5a31eb36e61f48', 'ossasass', '085208210813', 'jalan raya', 1),
(17, 'ran', '21232f297a57a5a743894a0e4a801fc3', 'Arneni ', '08236422341', 'Jl aripin ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelgn` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `status_cucian` int(11) NOT NULL DEFAULT '0',
  `status_bayar` int(11) DEFAULT '0',
  `tgl_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `berat` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelgn`, `id_paket`, `status_cucian`, `status_bayar`, `tgl_pemesanan`, `berat`, `total_harga`, `status`) VALUES
(22, 10, 3, 1, 1, '2017-01-04 15:01:02', 90, 450000, 1),
(23, 10, 1, 1, 1, '2017-01-04 15:03:56', 5, 35000, 1),
(25, 10, 1, 1, 1, '2017-01-05 07:55:27', 12, 90000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `nama_admin` (`nama_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelgn`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelgn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
