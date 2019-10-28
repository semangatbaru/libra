-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2019 pada 07.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id_barangmasuk` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pemesanan` varchar(15) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barangmasuk`
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
-- Stand-in struktur untuk tampilan `databelanja`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `databelanja` (
`id_barangmasuk` varchar(15)
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `debit`
--

CREATE TABLE `debit` (
  `id_barangmasuk` varchar(15) NOT NULL,
  `debit` int(9) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `debit`
--

INSERT INTO `debit` (`id_barangmasuk`, `debit`, `tanggal`) VALUES
('BL28102019-01', 810, '2019-10-28'),
('BL28102019-01', 810, '2019-10-28');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `debitbulanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `debitbulanan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `debitharian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `debitharian` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `debitmingguan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `debitmingguan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `debittahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `debittahunan` (
`id_barangmasuk` varchar(15)
,`debit` int(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail` (
`id_pemesanan` varchar(15)
,`nama_gambar` varchar(255)
,`token` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detailnya`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur dari tabel `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_barangmasuk` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga_beli` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_gambar`
--

CREATE TABLE `detail_gambar` (
  `id_pemesanan` varchar(15) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_gambar`
--

INSERT INTO `detail_gambar` (`id_pemesanan`, `nama_gambar`, `token`) VALUES
('PS10102019-01', 'desain-seragam-pdh.png', '0.22688736874032012'),
('PS10102019-01', 'desain-seragam-pdh1.png', '0.3330923281564706'),
('PS28102019-01', 'jj.png', '0.8686519776843579');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pemesanan` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(8) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_pemesanan`, `nama_barang`, `harga`, `jumlah`) VALUES
('PS19102019-05', 'tahu', 1000, 1),
('PS19102019-05', 'kk', 900, 1),
('PS28102019-01', 'dwioktari', 12, 1),
('PS28102019-04', 'ad', 10, 12);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detg`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur dari tabel `kredit`
--

CREATE TABLE `kredit` (
  `id_pemesanan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kredit` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kredit`
--

INSERT INTO `kredit` (`id_pemesanan`, `tanggal`, `kredit`) VALUES
('PS19102019-04', '1970-01-01', 1900),
('PS19102019-04', '2019-10-19', 1900),
('2', '2019-09-04', 908),
('PS00001', '2019-10-16', 1000000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `kreditbulanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `kreditbulanan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `kreditharian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `kreditharian` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `kreditmingguan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `kreditmingguan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `kredittahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `kredittahunan` (
`id_pemesanan` varchar(15)
,`tanggal` date
,`total` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_pemesanan`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `hp`, `alamat`) VALUES
('1', 'Dhani', '085047658934', 'nganjuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
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
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `total`, `bayar`, `tanggal`, `id_user`, `ambil`) VALUES
('PS19102019-05', '1', 1900, 2000, '2019-10-19', 'P2', '2019-11-10'),
('PS28102019-01', '1', 12, 90, '2019-10-28', 'P2', '2019-11-01'),
('PS28102019-04', '1', 120, 100, '2019-10-28', 'P2', '2029-11-10');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumdebitbulanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumdebitbulanan` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumdebitharian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumdebitharian` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumdebitmingguan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumdebitmingguan` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumdebittahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumdebittahunan` (
`totalpemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumkreditbulanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumkreditbulanan` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumkreditharian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumkreditharian` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumkreditmingguan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumkreditmingguan` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sumkredittahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sumkredittahunan` (
`totalpengeluaran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','kasir','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
('1', 'stay', 'stay', 'admin'),
('P2', 'staydev', '$2y$10$gwd7zh79bu7jf8DYuSD.CegeaFK7geKR.fNKuyxwyCMhS4aQ/TkNi', 'admin');

-- --------------------------------------------------------

--
-- Struktur untuk view `databelanja`
--
DROP TABLE IF EXISTS `databelanja`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `databelanja`  AS  select `barangmasuk`.`id_barangmasuk` AS `id_barangmasuk`,`barangmasuk`.`total` AS `total` from (`barangmasuk` join `detail_belanja`) where (`detail_belanja`.`id_barangmasuk` = `barangmasuk`.`id_barangmasuk`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `debitbulanan`
--
DROP TABLE IF EXISTS `debitbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debitbulanan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `debitharian`
--
DROP TABLE IF EXISTS `debitharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debitharian`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `debitmingguan`
--
DROP TABLE IF EXISTS `debitmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debitmingguan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `debittahunan`
--
DROP TABLE IF EXISTS `debittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `debittahunan`  AS  select `debit`.`id_barangmasuk` AS `id_barangmasuk`,`debit`.`debit` AS `debit` from `debit` where (`debit`.`tanggal` = year(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail`
--
DROP TABLE IF EXISTS `detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`detail_gambar`.`nama_gambar` AS `nama_gambar`,`detail_gambar`.`token` AS `token` from (`pemesanan` join `detail_gambar`) where (`pemesanan`.`id_pemesanan` = `detail_gambar`.`id_pemesanan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detailnya`
--
DROP TABLE IF EXISTS `detailnya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailnya`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`hp` AS `hp`,`pelanggan`.`alamat` AS `alamat`,`detail_pemesanan`.`nama_barang` AS `nama_barang`,`detail_pemesanan`.`harga` AS `harga`,`detail_pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`total` AS `total`,`pemesanan`.`bayar` AS `bayar`,(`pemesanan`.`total` - `pemesanan`.`bayar`) AS `sisa`,`tb_user`.`username` AS `username` from ((((`pemesanan` join `detail_pemesanan`) join `detail_gambar`) join `pelanggan`) join `tb_user`) where ((`pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan`) and (`pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) and (`pemesanan`.`id_user` = `tb_user`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detg`
--
DROP TABLE IF EXISTS `detg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detg`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`hp` AS `hp`,`pelanggan`.`alamat` AS `alamat`,`detail_pemesanan`.`nama_barang` AS `nama_barang`,`detail_pemesanan`.`harga` AS `harga`,`detail_pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`total` AS `total`,`pemesanan`.`bayar` AS `bayar`,(`pemesanan`.`bayar` - `pemesanan`.`total`) AS `sisa`,`tb_user`.`username` AS `username`,`pemesanan`.`ambil` AS `ambil` from ((((`pemesanan` join `detail_pemesanan`) join `detail_gambar`) join `pelanggan`) join `tb_user`) where ((`pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan`) and (`pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) and (`pemesanan`.`id_user` = `tb_user`.`id_user`)) group by `pemesanan`.`id_pemesanan` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `kreditbulanan`
--
DROP TABLE IF EXISTS `kreditbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kreditbulanan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `kreditharian`
--
DROP TABLE IF EXISTS `kreditharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kreditharian`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `kreditmingguan`
--
DROP TABLE IF EXISTS `kreditmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kreditmingguan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `kredittahunan`
--
DROP TABLE IF EXISTS `kredittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kredittahunan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`total` AS `total` from `pemesanan` where (`pemesanan`.`tanggal` = year(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_pemesanan`
--
DROP TABLE IF EXISTS `laporan_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_pemesanan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pelanggan`.`nama` AS `nama`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`bayar` AS `bayar`,(`pemesanan`.`total` - `pemesanan`.`bayar`) AS `sisa` from (`pemesanan` join `pelanggan`) where (`pemesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumdebitbulanan`
--
DROP TABLE IF EXISTS `sumdebitbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebitbulanan`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumdebitharian`
--
DROP TABLE IF EXISTS `sumdebitharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebitharian`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumdebitmingguan`
--
DROP TABLE IF EXISTS `sumdebitmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebitmingguan`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumdebittahunan`
--
DROP TABLE IF EXISTS `sumdebittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumdebittahunan`  AS  select sum(`debit`.`debit`) AS `totalpemasukan` from `debit` where (`debit`.`tanggal` = year(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumkreditbulanan`
--
DROP TABLE IF EXISTS `sumkreditbulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkreditbulanan`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = month(now())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumkreditharian`
--
DROP TABLE IF EXISTS `sumkreditharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkreditharian`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = cast(now() as date)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumkreditmingguan`
--
DROP TABLE IF EXISTS `sumkreditmingguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkreditmingguan`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = yearweek(now(),0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sumkredittahunan`
--
DROP TABLE IF EXISTS `sumkredittahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumkredittahunan`  AS  select sum(`kredit`.`kredit`) AS `totalpengeluaran` from `kredit` where (`kredit`.`tanggal` = year(now())) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD KEY `id_barangmasuk` (`id_barangmasuk`);

--
-- Indeks untuk tabel `detail_gambar`
--
ALTER TABLE `detail_gambar`
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD CONSTRAINT `detail_belanja_ibfk_1` FOREIGN KEY (`id_barangmasuk`) REFERENCES `barangmasuk` (`id_barangmasuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
