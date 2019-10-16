-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 08:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libra`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id_barangmasuk` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pemesanan` varchar(15) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`id_barangmasuk`, `tanggal`, `id_pemesanan`, `total`) VALUES
('1', '2019-10-16', '2', 9000);

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `debit` BEFORE DELETE ON `barangmasuk` FOR EACH ROW BEGIN
	INSERT INTO debit (id_barangmasuk, debit, tanggal) VALUES
    (old.id_barangmasuk, old.total, old.tanggal);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `databelanja`
-- (See below for the actual view)
--
CREATE TABLE `databelanja` (
`id_barangmasuk` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id_barangmasuk` varchar(15) NOT NULL,
  `debit` int(9) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`id_barangmasuk`, `debit`, `tanggal`) VALUES
('2', 90, '2019-10-15'),
('3', 90, '2019-10-10'),
('4', 90, '2019-09-16'),
('5', 90, '2018-10-16'),
('1', 90, '2019-10-16'),
('8', 90, '2019-10-16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `debit_al`
-- (See below for the actual view)
--
CREATE TABLE `debit_al` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debit_bulanan`
-- (See below for the actual view)
--
CREATE TABLE `debit_bulanan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debit_harian`
-- (See below for the actual view)
--
CREATE TABLE `debit_harian` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debit_mingguan`
-- (See below for the actual view)
--
CREATE TABLE `debit_mingguan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debit_tahunan`
-- (See below for the actual view)
--
CREATE TABLE `debit_tahunan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_barangmasuk` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga_beli` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_barangmasuk`, `nama_barang`, `jumlah`, `harga_beli`) VALUES
('1', 'jj', 9, 90),
('1', 'k', 90, 900);

-- --------------------------------------------------------

--
-- Table structure for table `detail_gambar`
--

CREATE TABLE `detail_gambar` (
  `id_pemesanan` varchar(15) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pemesanan` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(8) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kredit`
--

CREATE TABLE `kredit` (
  `id_pemesanan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kredit` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kredit`
--

INSERT INTO `kredit` (`id_pemesanan`, `tanggal`, `kredit`) VALUES
('1', '2019-09-03', 90),
('1', '2019-09-03', 90),
('1', '0000-00-00', 1993),
('2', '2019-10-15', 90),
('3', '2019-10-16', 90),
('4', '2019-09-16', 90),
('5', '2018-10-16', 90);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredit_al`
-- (See below for the actual view)
--
CREATE TABLE `kredit_al` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`kredit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredit_bulanan`
-- (See below for the actual view)
--
CREATE TABLE `kredit_bulanan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`kredit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredit_harian`
-- (See below for the actual view)
--
CREATE TABLE `kredit_harian` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`kredit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredit_mingguan`
-- (See below for the actual view)
--
CREATE TABLE `kredit_mingguan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`kredit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredit_tahunan`
-- (See below for the actual view)
--
CREATE TABLE `kredit_tahunan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`kredit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_pemesanan`
-- (See below for the actual view)
--
CREATE TABLE `laporan_pemesanan` (
`id_pemesanan` varchar(15)
,`nama` varchar(30)
,`tanggal` date
,`bayar` int(8)
,`sisa` bigint(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `hp`, `alamat`) VALUES
('1', 'dani', '0987765', 'jksdafh');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(15) NOT NULL,
  `id_pelanggan` varchar(3) NOT NULL,
  `total` int(8) NOT NULL,
  `bayar` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `total`, `bayar`, `tanggal`, `id_user`) VALUES
('2', '1', 908, 900, '2019-09-04', '1');

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `kredit` BEFORE DELETE ON `pemesanan` FOR EACH ROW BEGIN
	INSERT INTO kredit (id_pemesanan, tanggal, kredit) VALUES
    (old.id_pemesanan, old.tanggal, old.total);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dbulanan`
-- (See below for the actual view)
--
CREATE TABLE `sum_dbulanan` (
`sum(debit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_debital`
-- (See below for the actual view)
--
CREATE TABLE `sum_debital` (
`sum(debit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dharian`
-- (See below for the actual view)
--
CREATE TABLE `sum_dharian` (
`sum(debit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dmingguan`
-- (See below for the actual view)
--
CREATE TABLE `sum_dmingguan` (
`sum(debit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dtahunan`
-- (See below for the actual view)
--
CREATE TABLE `sum_dtahunan` (
`sum(debit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_kbulanan`
-- (See below for the actual view)
--
CREATE TABLE `sum_kbulanan` (
`sum(kredit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_kharian`
-- (See below for the actual view)
--
CREATE TABLE `sum_kharian` (
`sum(kredit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_kmingguan`
-- (See below for the actual view)
--
CREATE TABLE `sum_kmingguan` (
`sum(kredit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_kredital`
-- (See below for the actual view)
--
CREATE TABLE `sum_kredital` (
`sum(kredit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_ktahunan`
-- (See below for the actual view)
--
CREATE TABLE `sum_ktahunan` (
`sum(kredit)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','kasir','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
('1', 'stay', 'stay', 'admin'),
('P2', 'staydev', '$2y$10$gwd7zh79bu7jf8DYuSD.CegeaFK7geKR.fNKuyxwyCMhS4aQ/TkNi', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `databelanja`
--
DROP TABLE IF EXISTS `databelanja`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `databelanja`  AS  select `barangmasuk`.`id_barangmasuk` AS `id_barangmasuk`,`barangmasuk`.`tanggal` AS `tanggal`,`barangmasuk`.`total` AS `total` from `barangmasuk` ;

-- --------------------------------------------------------

--
-- Structure for view `debit_al`
--
DROP TABLE IF EXISTS `debit_al`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debit_al`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit`,`debit`.`tanggal` AS `tanggal` from `debit` ;

-- --------------------------------------------------------

--
-- Structure for view `debit_bulanan`
--
DROP TABLE IF EXISTS `debit_bulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debit_bulanan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit`,`debit`.`tanggal` AS `tanggal` from `debit` where month(`debit`.`tanggal`) = month(current_timestamp()) and year(`debit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `debit_harian`
--
DROP TABLE IF EXISTS `debit_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debit_harian`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit`,`debit`.`tanggal` AS `tanggal` from `debit` where `debit`.`tanggal` = cast(current_timestamp() as date) ;

-- --------------------------------------------------------

--
-- Structure for view `debit_mingguan`
--
DROP TABLE IF EXISTS `debit_mingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debit_mingguan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit`,`debit`.`tanggal` AS `tanggal` from `debit` where yearweek(`debit`.`tanggal`,0) = yearweek(current_timestamp(),0) ;

-- --------------------------------------------------------

--
-- Structure for view `debit_tahunan`
--
DROP TABLE IF EXISTS `debit_tahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debit_tahunan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit`,`debit`.`tanggal` AS `tanggal` from `debit` where year(`debit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `kredit_al`
--
DROP TABLE IF EXISTS `kredit_al`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredit_al`  AS  select `kredit`.`id_pemesanan` AS `id_pemesanan`,`kredit`.`tanggal` AS `tanggal`,`kredit`.`kredit` AS `kredit` from `kredit` ;

-- --------------------------------------------------------

--
-- Structure for view `kredit_bulanan`
--
DROP TABLE IF EXISTS `kredit_bulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredit_bulanan`  AS  select `kredit`.`id_pemesanan` AS `id_pemesanan`,`kredit`.`tanggal` AS `tanggal`,`kredit`.`kredit` AS `kredit` from `kredit` where month(`kredit`.`tanggal`) = month(current_timestamp()) and year(`kredit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `kredit_harian`
--
DROP TABLE IF EXISTS `kredit_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredit_harian`  AS  select `kredit`.`id_pemesanan` AS `id_pemesanan`,`kredit`.`tanggal` AS `tanggal`,`kredit`.`kredit` AS `kredit` from `kredit` where `kredit`.`tanggal` = cast(current_timestamp() as date) ;

-- --------------------------------------------------------

--
-- Structure for view `kredit_mingguan`
--
DROP TABLE IF EXISTS `kredit_mingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredit_mingguan`  AS  select `kredit`.`id_pemesanan` AS `id_pemesanan`,`kredit`.`tanggal` AS `tanggal`,`kredit`.`kredit` AS `kredit` from `kredit` where yearweek(`kredit`.`tanggal`,0) = yearweek(current_timestamp(),0) ;

-- --------------------------------------------------------

--
-- Structure for view `kredit_tahunan`
--
DROP TABLE IF EXISTS `kredit_tahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredit_tahunan`  AS  select `kredit`.`id_pemesanan` AS `id_pemesanan`,`kredit`.`tanggal` AS `tanggal`,`kredit`.`kredit` AS `kredit` from `kredit` where year(`kredit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_pemesanan`
--
DROP TABLE IF EXISTS `laporan_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_pemesanan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pelanggan`.`nama` AS `nama`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`bayar` AS `bayar`,`pemesanan`.`total` - `pemesanan`.`bayar` AS `sisa` from (`pemesanan` join `pelanggan`) where `pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan` ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dbulanan`
--
DROP TABLE IF EXISTS `sum_dbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dbulanan`  AS  select sum(`debit`.`debit`) AS `sum(debit)` from `debit` where month(`debit`.`tanggal`) = month(current_timestamp()) and year(`debit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_debital`
--
DROP TABLE IF EXISTS `sum_debital`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_debital`  AS  select sum(`debit`.`debit`) AS `sum(debit)` from `debit` ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dharian`
--
DROP TABLE IF EXISTS `sum_dharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dharian`  AS  select sum(`debit`.`debit`) AS `sum(debit)` from `debit` where `debit`.`tanggal` = cast(current_timestamp() as date) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dmingguan`
--
DROP TABLE IF EXISTS `sum_dmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dmingguan`  AS  select sum(`debit`.`debit`) AS `sum(debit)` from `debit` where yearweek(`debit`.`tanggal`,0) = yearweek(current_timestamp(),0) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dtahunan`
--
DROP TABLE IF EXISTS `sum_dtahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dtahunan`  AS  select sum(`debit`.`debit`) AS `sum(debit)` from `debit` where year(`debit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_kbulanan`
--
DROP TABLE IF EXISTS `sum_kbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_kbulanan`  AS  select sum(`kredit`.`kredit`) AS `sum(kredit)` from `kredit` where month(`kredit`.`tanggal`) = month(current_timestamp()) and year(`kredit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_kharian`
--
DROP TABLE IF EXISTS `sum_kharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_kharian`  AS  select sum(`kredit`.`kredit`) AS `sum(kredit)` from `kredit` where `kredit`.`tanggal` = cast(current_timestamp() as date) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_kmingguan`
--
DROP TABLE IF EXISTS `sum_kmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_kmingguan`  AS  select sum(`kredit`.`kredit`) AS `sum(kredit)` from `kredit` where yearweek(`kredit`.`tanggal`,0) = yearweek(current_timestamp(),0) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_kredital`
--
DROP TABLE IF EXISTS `sum_kredital`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_kredital`  AS  select sum(`kredit`.`kredit`) AS `sum(kredit)` from `kredit` ;

-- --------------------------------------------------------

--
-- Structure for view `sum_ktahunan`
--
DROP TABLE IF EXISTS `sum_ktahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_ktahunan`  AS  select sum(`kredit`.`kredit`) AS `sum(kredit)` from `kredit` where month(`kredit`.`tanggal`) = month(current_timestamp()) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD KEY `id_barangmasuk` (`id_barangmasuk`);

--
-- Indexes for table `detail_gambar`
--
ALTER TABLE `detail_gambar`
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD CONSTRAINT `detail_belanja_ibfk_1` FOREIGN KEY (`id_barangmasuk`) REFERENCES `barangmasuk` (`id_barangmasuk`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
