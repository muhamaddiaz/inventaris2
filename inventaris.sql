-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 12:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_inventaris`
--

CREATE TABLE `data_inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status_barang` varchar(50) NOT NULL,
  `kondisi_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_inventaris`
--

INSERT INTO `data_inventaris` (`id_inventaris`, `id_user`, `nama_barang`, `tanggal_pembelian`, `status_barang`, `kondisi_barang`, `jumlah_barang`, `created_at`) VALUES
(15, 15, 'Komputer Lenovo', '2013-11-26', 'Bekas', 'Kurang baik', 5, '2018-03-29 08:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `address`, `phone_number`, `password`, `admin`) VALUES
(15, 'Muhamad Diaz R', 'diazram', 'PBB A11', '087721921992', 'helloworld', 1),
(16, 'Steven Carlos', 'steven', 'PBB A11', '085711953304', 'ÿÉ½øw¤„z', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_inventaris`
--
ALTER TABLE `data_inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `user_fk` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_inventaris`
--
ALTER TABLE `data_inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_inventaris`
--
ALTER TABLE `data_inventaris`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
