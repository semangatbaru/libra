-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 07:55 AM
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
('1', 90, '2019-10-31'),
('2', 90, '2019-10-30'),
('3', 90, '2019-10-10'),
('4', 90, '2019-09-16'),
('5', 90, '2018-10-16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `debit_all`
-- (See below for the actual view)
--
CREATE TABLE `debit_all` (
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
-- Stand-in structure for view `detail`
-- (See below for the actual view)
--
CREATE TABLE `detail` (
`id_pemesanan` varchar(15)
,`nama_gambar` varchar(255)
,`token` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailnya`
-- (See below for the actual view)
--
CREATE TABLE `detailnya` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`nama` varchar(30)
,`hp` varchar(14)
,`alamat` text
,`nama_barang` varchar(30)
,`harga` int(8)
,`jumlah` int(4)
,`total` int(8)
,`bayar` int(8)
,`sisa` bigint(12)
,`username` varchar(30)
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

--
-- Dumping data for table `detail_gambar`
--

INSERT INTO `detail_gambar` (`id_pemesanan`, `nama_gambar`, `token`) VALUES
('PS10102019-01', 'desain-seragam-pdh.png', '0.22688736874032012'),
('PS10102019-01', 'desain-seragam-pdh1.png', '0.3330923281564706'),
('PS28102019-01', 'jj.png', '0.8686519776843579');

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

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_pemesanan`, `nama_barang`, `harga`, `jumlah`) VALUES
('PS19102019-05', 'tahu', 1000, 1),
('PS19102019-05', 'kk', 900, 1),
('PS28102019-01', 'dwioktari', 12, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detg`
-- (See below for the actual view)
--
CREATE TABLE `detg` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`nama` varchar(30)
,`hp` varchar(14)
,`alamat` text
,`nama_barang` varchar(30)
,`harga` int(8)
,`jumlah` int(4)
,`total` int(8)
,`bayar` int(8)
,`sisa` bigint(12)
,`username` varchar(30)
,`ambil` date
);

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
('1', '2019-10-31', 90),
('2', '2019-10-30', 90),
('3', '2019-10-10', 90),
('4', '2019-09-16', 90),
('5', '2018-10-16', 90);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kredit_all`
-- (See below for the actual view)
--
CREATE TABLE `kredit_all` (
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
('1', 'Dhani', '085047658934', 'nganjuk');

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
  `id_user` varchar(2) NOT NULL,
  `ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `total`, `bayar`, `tanggal`, `id_user`, `ambil`) VALUES
('PS19102019-05', '1', 1900, 2000, '2019-10-19', 'P2', '2019-11-10'),
('PS28102019-01', '1', 12, 90, '2019-10-28', 'P2', '2019-11-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkbulanan`
-- (See below for the actual view)
--
CREATE TABLE `sumkbulanan` (
`sumkredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkharian`
-- (See below for the actual view)
--
CREATE TABLE `sumkharian` (
`sumkredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkmingguan`
-- (See below for the actual view)
--
CREATE TABLE `sumkmingguan` (
`sumkredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumkredital`
-- (See below for the actual view)
--
CREATE TABLE `sumkredital` (
`sumkredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumktahunan`
-- (See below for the actual view)
--
CREATE TABLE `sumktahunan` (
`sumkredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dbulanan`
-- (See below for the actual view)
--
CREATE TABLE `sum_dbulanan` (
`sumdebit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_debital`
-- (See below for the actual view)
--
CREATE TABLE `sum_debital` (
`sumdebit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dharian`
-- (See below for the actual view)
--
CREATE TABLE `sum_dharian` (
`sumdebit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dmingguan`
-- (See below for the actual view)
--
CREATE TABLE `sum_dmingguan` (
`sumdebit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_dtahunan`
-- (See below for the actual view)
--
CREATE TABLE `sum_dtahunan` (
`sumdebit` decimal(32,0)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `databelanja`  AS  select `barangmasuk`.`id_barangmasuk` AS `id_barangmasuk`,`barangmasuk`.`total` AS `total` from (`barangmasuk` join `detail_belanja`) where `detail_belanja`.`id_barangmasuk` = `barangmasuk`.`id_barangmasuk` ;

-- --------------------------------------------------------

--
-- Structure for view `debit_all`
--
DROP TABLE IF EXISTS `debit_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debit_all`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit`,`debit`.`tanggal` AS `tanggal` from `debit` ;

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
-- Structure for view `detail`
--
DROP TABLE IF EXISTS `detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`detail_gambar`.`nama_gambar` AS `nama_gambar`,`detail_gambar`.`token` AS `token` from (`pemesanan` join `detail_gambar`) where `pemesanan`.`id_pemesanan` = `detail_gambar`.`id_pemesanan` ;

-- --------------------------------------------------------

--
-- Structure for view `detailnya`
--
DROP TABLE IF EXISTS `detailnya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailnya`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`hp` AS `hp`,`pelanggan`.`alamat` AS `alamat`,`detail_pemesanan`.`nama_barang` AS `nama_barang`,`detail_pemesanan`.`harga` AS `harga`,`detail_pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`total` AS `total`,`pemesanan`.`bayar` AS `bayar`,`pemesanan`.`total` - `pemesanan`.`bayar` AS `sisa`,`tb_user`.`username` AS `username` from ((((`pemesanan` join `detail_pemesanan`) join `detail_gambar`) join `pelanggan`) join `tb_user`) where `pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan` and `pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan` and `pemesanan`.`id_user` = `tb_user`.`id_user` ;

-- --------------------------------------------------------

--
-- Structure for view `detg`
--
DROP TABLE IF EXISTS `detg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detg`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`hp` AS `hp`,`pelanggan`.`alamat` AS `alamat`,`detail_pemesanan`.`nama_barang` AS `nama_barang`,`detail_pemesanan`.`harga` AS `harga`,`detail_pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`total` AS `total`,`pemesanan`.`bayar` AS `bayar`,`pemesanan`.`bayar` - `pemesanan`.`total` AS `sisa`,`tb_user`.`username` AS `username`,`pemesanan`.`ambil` AS `ambil` from ((((`pemesanan` join `detail_pemesanan`) join `detail_gambar`) join `pelanggan`) join `tb_user`) where `pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan` and `pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan` and `pemesanan`.`id_user` = `tb_user`.`id_user` group by `pemesanan`.`id_pemesanan` ;

-- --------------------------------------------------------

--
-- Structure for view `kredit_all`
--
DROP TABLE IF EXISTS `kredit_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredit_all`  AS  select `kredit`.`id_pemesanan` AS `id_pemesanan`,`kredit`.`tanggal` AS `tanggal`,`kredit`.`kredit` AS `kredit` from `kredit` ;

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
-- Structure for view `sumkbulanan`
--
DROP TABLE IF EXISTS `sumkbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkbulanan`  AS  select sum(`kredit`.`kredit`) AS `sumkredit` from `kredit` where month(`kredit`.`tanggal`) = month(current_timestamp()) and year(`kredit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkharian`
--
DROP TABLE IF EXISTS `sumkharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkharian`  AS  select sum(`kredit`.`kredit`) AS `sumkredit` from `kredit` where `kredit`.`tanggal` = cast(current_timestamp() as date) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkmingguan`
--
DROP TABLE IF EXISTS `sumkmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkmingguan`  AS  select sum(`kredit`.`kredit`) AS `sumkredit` from `kredit` where yearweek(`kredit`.`tanggal`,0) = yearweek(current_timestamp(),0) ;

-- --------------------------------------------------------

--
-- Structure for view `sumkredital`
--
DROP TABLE IF EXISTS `sumkredital`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkredital`  AS  select sum(`kredit`.`kredit`) AS `sumkredit` from `kredit` ;

-- --------------------------------------------------------

--
-- Structure for view `sumktahunan`
--
DROP TABLE IF EXISTS `sumktahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumktahunan`  AS  select sum(`kredit`.`kredit`) AS `sumkredit` from `kredit` where year(`kredit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dbulanan`
--
DROP TABLE IF EXISTS `sum_dbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dbulanan`  AS  select sum(`debit`.`debit`) AS `sumdebit` from `debit` where month(`debit`.`tanggal`) = month(current_timestamp()) and year(`debit`.`tanggal`) = year(current_timestamp()) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_debital`
--
DROP TABLE IF EXISTS `sum_debital`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_debital`  AS  select sum(`debit`.`debit`) AS `sumdebit` from `debit` ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dharian`
--
DROP TABLE IF EXISTS `sum_dharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dharian`  AS  select sum(`debit`.`debit`) AS `sumdebit` from `debit` where `debit`.`tanggal` = cast(current_timestamp() as date) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dmingguan`
--
DROP TABLE IF EXISTS `sum_dmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dmingguan`  AS  select sum(`debit`.`debit`) AS `sumdebit` from `debit` where yearweek(`debit`.`tanggal`,0) = yearweek(current_timestamp(),0) ;

-- --------------------------------------------------------

--
-- Structure for view `sum_dtahunan`
--
DROP TABLE IF EXISTS `sum_dtahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sum_dtahunan`  AS  select sum(`debit`.`debit`) AS `sumdebit` from `debit` where year(`debit`.`tanggal`) = year(current_timestamp()) ;

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
-- Constraints for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD CONSTRAINT `detail_belanja_ibfk_1` FOREIGN KEY (`id_barangmasuk`) REFERENCES `barangmasuk` (`id_barangmasuk`) ON DELETE CASCADE ON UPDATE CASCADE;

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
