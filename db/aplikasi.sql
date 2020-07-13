-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 07:40 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aplikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `nopenjualan` varchar(20) NOT NULL,
  `tglpenjualan` date NOT NULL,
  `id_produk` int(11) NOT NULL,
  `itemterjual` int(11) NOT NULL,
  `total_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`nopenjualan`, `tglpenjualan`, `id_produk`, `itemterjual`, `total_penjualan`) VALUES
('PJLN2020070001', '2020-07-10', 27, 12, 1080000),
('PJLN2020070002', '2020-07-10', 30, 1, 85000),
('PJLN2020070003', '2020-07-10', 39, 2, 130000),
('PJLN2020070004', '2020-07-10', 49, 3, 255000),
('PJLN2020070005', '2020-07-10', 30, 4, 340000),
('PJLN2020070006', '2020-07-11', 29, 1, 85000),
('PJLN2020070007', '2020-07-12', 43, 2, 240000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stokproduk` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tglmasuk` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stokproduk`, `satuan`, `tglmasuk`) VALUES
(27, 'T-Shirt Deus Hitam', 90000, 69, 'pcs', '2020-06-01'),
(28, 'T-Shirt Deus Putih', 90000, 94, 'pcs', '2020-06-01'),
(29, 'T-Shirt Unionmade Maroon', 85000, 13, 'pcs', '2020-06-01'),
(30, 'T-Shirt Unionmade Putih', 85000, 15, 'pcs', '2020-06-02'),
(31, 'T-Shirt Unionmade Biru', 85000, 40, 'pcs', '2020-06-01'),
(32, 'T-Shirt  Nevermind Abu-Abu', 85000, 29, 'pcs', '2020-06-02'),
(33, 'T-Shirt  Nevermind Putih', 85000, 68, 'pcs', '2020-06-02'),
(34, 'T-Shirt Huf Putih', 90000, 65, 'pcs', '2020-06-02'),
(35, 'T-Shirt Huf Hitam', 90000, 34, 'pcs', '2020-06-02'),
(36, 'T-shirt Polos Putih', 65000, 81, 'pcs', '2020-06-03'),
(37, 'T-shirt Polos Hitam', 65000, 100, 'pcs', '2020-06-04'),
(38, 'T-shirt Polos Biru Dongker', 65000, 50, 'pcs', '2020-06-03'),
(39, 'T-shirt Polos Maroon', 65000, 48, 'pcs', '2020-06-03'),
(41, 'Sweater Polos Putih', 115000, 26, 'pcs', '2020-06-04'),
(42, 'Hoodie Jumper Biru Dongker', 120000, 32, 'pcs', '2020-06-05'),
(43, 'Hoodie Jumper Hitam', 120000, 21, 'pcs', '2020-06-05'),
(49, 'T-shirt Polos kuning', 85000, 19, 'pcs', '2020-06-30'),
(50, 'Sweater Polos Biru', 90000, 35, 'pcs', '2020-07-12'),
(51, 'Sweater Polos Maroon', 90000, 50, 'pcs', '2020-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` enum('admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`nopenjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
