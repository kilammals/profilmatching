-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 06:44 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-promatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aspek`
--

CREATE TABLE `tbl_aspek` (
  `id_aspek` tinyint(3) UNSIGNED NOT NULL,
  `nama_aspek` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `bobot_core` float NOT NULL,
  `bobot_secondary` float NOT NULL,
  `nama_singkat` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aspek`
--

INSERT INTO `tbl_aspek` (`id_aspek`, `nama_aspek`, `bobot`, `bobot_core`, `bobot_secondary`, `nama_singkat`) VALUES
(1, 'Kecerdasan', 20, 60, 40, 'I'),
(2, 'Sikap Kerja', 30, 60, 40, 'S'),
(3, 'Perilaku', 50, 60, 40, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `selisih` tinyint(3) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(0, 5, 'Tidak ada  selisih (kompetensi,sesuai dgn yang dibutuhkan)'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(-1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(-2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(3, 2.5, 'Kompetensi individu kelebihan 3 tingkat'),
(-3, 2, 'Kompetensi individu kekurangan 3 tingkat'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat'),
(-4, 1, 'Kompetensi individu kekurangan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faktor`
--

CREATE TABLE `tbl_faktor` (
  `id_faktor` tinyint(3) UNSIGNED NOT NULL,
  `aspek` tinyint(3) UNSIGNED NOT NULL COMMENT 'FK tbl_aspek',
  `nama_faktor` varchar(30) NOT NULL,
  `target` tinyint(3) NOT NULL,
  `jenis` enum('1','2') DEFAULT NULL COMMENT '1=Core;2=Secondary'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faktor`
--

INSERT INTO `tbl_faktor` (`id_faktor`, `aspek`, `nama_faktor`, `target`, `jenis`) VALUES
(1, 1, 'Common Sense', 3, '1'),
(2, 1, 'Verbalisasi Ide', 3, '1'),
(3, 1, 'Sistematika Berpikir', 4, '2'),
(4, 1, 'Penalaran dan Solusi Real', 4, '2'),
(5, 1, 'Konsentrasi', 3, '1'),
(6, 1, 'Logika Praktis', 4, '2'),
(7, 1, 'Fleksibilitas Berpikir', 4, '2'),
(8, 1, 'Imajinasi Kreatif', 5, '1'),
(9, 1, 'Antisipasi', 3, '1'),
(10, 1, 'Potensi Kecerdasan', 4, '2'),
(11, 2, 'Energi Psikis', 3, '1'),
(12, 2, 'Ketelitian dan tanggung jawab', 4, '1'),
(13, 2, 'Kehati-hatian', 2, '2'),
(14, 2, 'Pengendalian Perasaan', 3, '2'),
(15, 2, 'Dorongan Berprestasi', 3, '1'),
(16, 2, 'Vitalitas dan Perencanaan', 5, '2'),
(17, 3, 'Dominance (Kekuasaan)', 3, '1'),
(18, 3, 'Influences (Pengaruh)', 3, '1'),
(19, 3, 'Steadiness (Keteguhan Hati)', 4, '2'),
(20, 3, 'Compliance (Pemenuhan)', 5, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id`, `nama_karyawan`, `nilai`) VALUES
(55, 'GILANG', 4.412),
(56, 'MALIK', 4.372),
(57, 'UDIN', 4.315),
(58, 'IFHA', 4.278),
(59, 'FITRI', 4.227),
(60, 'FAHIM', 3.774);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` tinyint(3) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`) VALUES
(1, 'IFHA'),
(2, 'FITRI'),
(3, 'FAHIM'),
(4, 'MALIK'),
(5, 'UDIN'),
(6, 'GILANG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id_sample` int(11) UNSIGNED NOT NULL,
  `karyawan` tinyint(3) UNSIGNED DEFAULT NULL,
  `faktor` tinyint(3) UNSIGNED DEFAULT NULL,
  `nilai` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id_sample`, `karyawan`, `faktor`, `nilai`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 4),
(3, 1, 3, 3),
(4, 1, 4, 3),
(5, 1, 5, 2),
(6, 1, 6, 2),
(7, 1, 7, 4),
(8, 1, 8, 3),
(9, 1, 9, 2),
(10, 1, 10, 3),
(11, 1, 11, 3),
(12, 1, 12, 4),
(13, 1, 13, 3),
(14, 1, 14, 1),
(15, 1, 15, 3),
(16, 1, 16, 1),
(17, 1, 17, 4),
(18, 1, 18, 4),
(19, 1, 19, 4),
(20, 1, 20, 4),
(21, 2, 1, 3),
(22, 2, 2, 4),
(23, 2, 3, 3),
(24, 2, 4, 3),
(25, 2, 5, 2),
(26, 2, 6, 3),
(27, 2, 7, 4),
(28, 2, 8, 2),
(29, 2, 9, 4),
(30, 2, 10, 4),
(31, 2, 11, 4),
(32, 2, 12, 5),
(33, 2, 13, 5),
(34, 2, 14, 1),
(35, 2, 15, 4),
(36, 2, 16, 1),
(37, 2, 17, 4),
(38, 2, 18, 3),
(39, 2, 19, 4),
(40, 2, 20, 4),
(41, 3, 1, 4),
(42, 3, 2, 4),
(43, 3, 3, 3),
(44, 3, 4, 3),
(45, 3, 5, 4),
(46, 3, 6, 3),
(47, 3, 7, 2),
(48, 3, 8, 3),
(49, 3, 9, 3),
(50, 3, 10, 2),
(51, 3, 11, 4),
(52, 3, 12, 2),
(53, 3, 13, 2),
(54, 3, 14, 4),
(55, 3, 15, 5),
(56, 3, 16, 2),
(57, 3, 17, 4),
(58, 3, 18, 5),
(59, 3, 19, 5),
(60, 3, 20, 2),
(61, 4, 1, 3),
(62, 4, 2, 5),
(63, 4, 3, 4),
(64, 4, 4, 3),
(65, 4, 5, 4),
(66, 4, 6, 4),
(67, 4, 7, 3),
(68, 4, 8, 5),
(69, 4, 9, 4),
(70, 4, 10, 3),
(71, 4, 11, 1),
(72, 4, 12, 5),
(73, 4, 13, 5),
(74, 4, 14, 5),
(75, 4, 15, 5),
(76, 4, 16, 2),
(77, 4, 17, 3),
(78, 4, 18, 3),
(79, 4, 19, 4),
(80, 4, 20, 5),
(81, 5, 1, 3),
(82, 5, 2, 3),
(83, 5, 3, 3),
(84, 5, 4, 1),
(85, 5, 5, 2),
(86, 5, 6, 5),
(87, 5, 7, 3),
(88, 5, 8, 2),
(89, 5, 9, 5),
(90, 5, 10, 4),
(91, 5, 11, 4),
(92, 5, 12, 5),
(93, 5, 13, 4),
(94, 5, 14, 3),
(95, 5, 15, 5),
(96, 5, 16, 3),
(97, 5, 17, 4),
(98, 5, 18, 3),
(99, 5, 19, 3),
(100, 5, 20, 5),
(140, 6, 20, 3),
(139, 6, 19, 3),
(138, 6, 18, 3),
(137, 6, 17, 3),
(136, 6, 16, 3),
(135, 6, 15, 3),
(134, 6, 14, 3),
(133, 6, 13, 3),
(132, 6, 12, 3),
(131, 6, 11, 3),
(130, 6, 10, 3),
(129, 6, 9, 3),
(128, 6, 8, 3),
(127, 6, 7, 3),
(126, 6, 6, 3),
(125, 6, 5, 3),
(124, 6, 4, 3),
(123, 6, 3, 3),
(122, 6, 2, 3),
(121, 6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Mukis Aditya'),
(5, 'user', '202cb962ac59075b964b07152d234b70', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `tbl_faktor`
--
ALTER TABLE `tbl_faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id_sample`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  MODIFY `id_aspek` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faktor`
--
ALTER TABLE `tbl_faktor`
  MODIFY `id_faktor` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id_sample` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
