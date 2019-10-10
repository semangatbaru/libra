-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 06:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
--
CREATE TABLE `databelanja` (
`id_barangmasuk` varchar(15)
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
('12', 89, '2019-09-03');

-- --------------------------------------------------------

--
-- Stand-in structure for view `debitbulanan`
--
CREATE TABLE `debitbulanan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debitharian`
--
CREATE TABLE `debitharian` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debitmingguan`
--
CREATE TABLE `debitmingguan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `debittahunan`
--
CREATE TABLE `debittahunan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
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
('1', '2019-09-03', 90);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kreditbulanan`
--
CREATE TABLE `kreditbulanan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kreditharian`
--
CREATE TABLE `kreditharian` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kreditmingguan`
--
CREATE TABLE `kreditmingguan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredittahunan`
--
CREATE TABLE `kredittahunan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_pemesanan`
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
-- Stand-in structure for view `sumdebitbulanan`
--
CREATE TABLE `sumdebitbulanan` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumdebitharian`
--
CREATE TABLE `sumdebitharian` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumdebitmingguan`
--
CREATE TABLE `sumdebitmingguan` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumdebittahunan`
--
CREATE TABLE `sumdebittahunan` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkreditbulanan`
--
CREATE TABLE `sumkreditbulanan` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkreditharian`
--
CREATE TABLE `sumkreditharian` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkreditmingguan`
--
CREATE TABLE `sumkreditmingguan` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkredittahunan`
--
CREATE TABLE `sumkredittahunan` (
`totalpengeluaran` decimal(32,0)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `databelanja`  AS  select `barangmasuk`.`id_barangmasuk` AS `id_barangmasuk`,`barangmasuk`.`total` AS `total` from (`barangmasuk` join `detail_belanja`) where (`detail_belanja`.`id_barangmasuk` = `barangmasuk`.`id_barangmasuk`) ;

-- --------------------------------------------------------

--
-- Structure for view `debitbulanan`
--
DROP TABLE IF EXISTS `debitbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debitbulanan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `debitharian`
--
DROP TABLE IF EXISTS `debitharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debitharian`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Structure for view `debitmingguan`
--
DROP TABLE IF EXISTS `debitmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debitmingguan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Structure for view `debittahunan`
--
DROP TABLE IF EXISTS `debittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debittahunan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = year(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `kreditbulanan`
--
DROP TABLE IF EXISTS `kreditbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kreditbulanan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `kreditharian`
--
DROP TABLE IF EXISTS `kreditharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kreditharian`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Structure for view `kreditmingguan`
--
DROP TABLE IF EXISTS `kreditmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kreditmingguan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Structure for view `kredittahunan`
--
DROP TABLE IF EXISTS `kredittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredittahunan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = year(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_pemesanan`
--
DROP TABLE IF EXISTS `laporan_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_pemesanan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pelanggan`.`nama` AS `nama`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`bayar` AS `bayar`,(`pemesanan`.`total` - `pemesanan`.`bayar`) AS `sisa` from (`pemesanan` join `pelanggan`) where (`pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) ;

-- --------------------------------------------------------

--
-- Structure for view `sumdebitbulanan`
--
DROP TABLE IF EXISTS `sumdebitbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebitbulanan`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `sumdebitharian`
--
DROP TABLE IF EXISTS `sumdebitharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebitharian`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Structure for view `sumdebitmingguan`
--
DROP TABLE IF EXISTS `sumdebitmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebitmingguan`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Structure for view `sumdebittahunan`
--
DROP TABLE IF EXISTS `sumdebittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebittahunan`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = year(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkreditbulanan`
--
DROP TABLE IF EXISTS `sumkreditbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkreditbulanan`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkreditharian`
--
DROP TABLE IF EXISTS `sumkreditharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkreditharian`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkreditmingguan`
--
DROP TABLE IF EXISTS `sumkreditmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkreditmingguan`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkredittahunan`
--
DROP TABLE IF EXISTS `sumkredittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkredittahunan`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = year(now())) ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
