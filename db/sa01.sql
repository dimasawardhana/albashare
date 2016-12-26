-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 08:25 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sa01`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `initial` varchar(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_cabang` int(3) NOT NULL,
  `role` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `initial`, `username`, `password`, `id_cabang`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Erlangga Wulung', '', 'erlanggawulung@yahoo.com', 'ac43724f16e9241d990427ab7c8f4228', 1, 1, 1, '0000-00-00', '0000-00-00'),
(3, 'ALBASHAR-E', 'ALB', 'albasharepdsk@gmail.com', 'f93ef5c3dc84c747de8cf43780c163a6', 1, 1, 1, '2016-11-14', '2016-11-14'),
(4, 'Rizka Hammam', 'RZK', 'rizka.hammam@gmail.com', 'fce63c140ac312bd3ecb86ca0fbe4265', 1, 1, 1, '2016-11-14', '0000-00-00'),
(5, 'Admin Cilegon', 'ACL', 'albashare.cilegon@gmail.com', '82a1024d1bdc5fa237658554002b4fde', 2, 0, 1, '2016-11-14', '0000-00-00'),
(6, 'Admin Serang', 'ASR', 'albashareserang@gmail.com', '353abe918e77e5dbdf6fe68347b25533', 3, 0, 1, '2016-11-14', '0000-00-00'),
(10, 'Dimas Aji W', '', 'dimasawardhana@gmail.com', '4dd5cf1bf0a8567f382ccd63c51d92b7', 1, 1, 1, '2016-11-21', '2016-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `cabang` int(3) NOT NULL,
  `City` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `ZIP` int(5) NOT NULL,
  `ibu` varchar(25) NOT NULL,
  `HP` varchar(15) NOT NULL,
  `TP` varchar(15) NOT NULL,
  `job` varchar(25) NOT NULL,
  `identity` varchar(20) NOT NULL,
  `spouse` varchar(25) NOT NULL,
  `TTL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `email`, `alamat`, `cabang`, `City`, `jenis_kelamin`, `ZIP`, `ibu`, `HP`, `TP`, `job`, `identity`, `spouse`, `TTL`) VALUES
(1, 'Amyra Hanifah', 'amyrahanifah@gmail.com', 'Jalan Padasuka Indah No A5', 1, 'CIMAHI', 'P', 0, 'ibunya', '2147483647', '0', 'kerja', '123123123123', '', '1993-12-01'),
(2, 'Erna Ningsih', 'ernaningsih@gmail.com', 'Jalan Purbasari II No 8', 1, '0', '0', 0, '0', '0', '0', '0', '', '', '0000-00-00'),
(3, 'Dimas Aji Wardhana', 'dimasajiwardhana@live.com', 'Jl. Kebon Manggu No 26', 1, 'Cimahi', 'L', 40526, 'Warsinah', '081235850354', '0', 'Mahasiswa', '151524007', '', '2016-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `bagi_hasil_tarekah_a`
--

CREATE TABLE `bagi_hasil_tarekah_a` (
  `id` int(11) NOT NULL,
  `id_tarekah_a` int(11) NOT NULL,
  `nominal_bagi_hasil` float NOT NULL,
  `nominal_ke_anggota` float NOT NULL,
  `nominal_ke_albashare` float NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 sudah dipindah ke tabarok, 0 masih disimpan di tarekah',
  `date` date NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagi_hasil_tarekah_a`
--

INSERT INTO `bagi_hasil_tarekah_a` (`id`, `id_tarekah_a`, `nominal_bagi_hasil`, `nominal_ke_anggota`, `nominal_ke_albashare`, `status`, `date`, `keterangan`) VALUES
(1, 1, 100000, 0, 0, 0, '2016-08-02', ''),
(2, 1, 100000, 0, 0, 0, '2016-09-02', ''),
(3, 2, 0, 0, 0, 0, '2016-08-31', ''),
(4, 7, 32500, 19500, 13000, 1, '2016-12-19', 'bagi hasil'),
(5, 7, 32500, 19500, 13000, 0, '2017-01-19', 'bagi hasil'),
(6, 7, 32500, 19500, 13000, 0, '2017-02-19', 'bagi hasil'),
(7, 7, 32500, 19500, 13000, 0, '2017-03-19', 'bagi hasil'),
(8, 7, 32500, 19500, 13000, 0, '2017-04-19', 'bagi hasil'),
(9, 7, 32500, 19500, 13000, 0, '2017-05-19', 'bagi hasil'),
(10, 7, 32500, 19500, 13000, 0, '2017-06-19', 'bagi hasil'),
(11, 7, 32500, 19500, 13000, 0, '2017-07-19', 'bagi hasil'),
(12, 7, 32500, 19500, 13000, 0, '2017-08-19', 'bagi hasil'),
(13, 7, 32500, 19500, 13000, 0, '2017-09-19', 'bagi hasil'),
(14, 7, 32500, 19500, 13000, 0, '2017-10-19', 'bagi hasil'),
(15, 7, 32500, 19500, 13000, 0, '2017-11-19', 'bagi hasil'),
(16, 7, 130000, 78000, 52000, 0, '2017-11-19', 'sisa nisbah');

-- --------------------------------------------------------

--
-- Table structure for table `bagi_hasil_tarekah_b`
--

CREATE TABLE `bagi_hasil_tarekah_b` (
  `id` int(11) NOT NULL,
  `id_nominal_tarekah_b` int(11) NOT NULL,
  `date` date NOT NULL,
  `nominal_bagi_hasil` float NOT NULL,
  `nominal_ke_anggota` float NOT NULL,
  `nominal_ke_albashare` float NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 sudah dipindah ke tabarok, 0 masih disimpan di tarekah'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagi_hasil_tarekah_b`
--

INSERT INTO `bagi_hasil_tarekah_b` (`id`, `id_nominal_tarekah_b`, `date`, `nominal_bagi_hasil`, `nominal_ke_anggota`, `nominal_ke_albashare`, `status`) VALUES
(1, 1, '2016-08-03', 0, 0, 0, 0),
(2, 2, '2016-08-03', 1000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `kota`, `cabang`, `alamat`) VALUES
(1, 'Cimahi', 'Padasuka', 'Komplek Padasuka Indah'),
(2, 'Cilegon', 'Cilegon', 'Jalan Ketileng'),
(3, 'Serang', '3', 'Serang');

-- --------------------------------------------------------

--
-- Table structure for table `failed_attempt`
--

CREATE TABLE `failed_attempt` (
  `no` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_attempt`
--

INSERT INTO `failed_attempt` (`no`, `username`, `password`, `time_stamp`) VALUES
(1, 'Jancukers@jajan.com', 'jajajan', '2016-06-15 09:03:43'),
(2, '', '', '2016-06-15 09:48:16'),
(3, '', '', '2016-06-15 09:48:18'),
(4, 'erlanggawulung@yahoo.com', 'r4h4514', '2016-06-22 06:03:09'),
(5, 'erlanggawulung@yahoo.com', 'r4h4514', '2016-06-23 07:59:04'),
(6, 'erlanggawulung@yahoo.com', 'r4h4514', '2016-06-29 21:54:53'),
(7, 'erlanggawulung@yahoo.com', 'rahaia', '2016-09-16 22:48:06'),
(8, 'erlanggawulung@yaoo.cm', 'rahasia', '2016-09-19 03:45:45'),
(9, 'erlanggawulung@yahoo.com', 'rahaisa', '2016-09-19 04:08:39'),
(10, '1=1or1=1', '1=1or1=1', '2016-09-19 04:10:18'),
(11, 'erlanggawulung@yahoo,com', 'rahasia', '2016-09-19 07:58:09'),
(12, 'erlanggawulung@yahooo.com', 'rahasia', '2016-09-22 18:45:25'),
(13, 'erlanggawulung@yahooo.com', 'rahasia', '2016-09-22 18:45:39'),
(14, 'erlanggawulung@yahoo.com', 'rahasisa', '2016-09-24 22:42:05'),
(15, 'erlanggawulung@yahoo.com\\', 'rahasia', '2016-09-24 22:48:37'),
(16, 'erlanggawulung@yahoo.com', 'rahsaia', '2016-09-24 22:48:44'),
(17, 'erlanggawulung@yahoo.com', '', '2016-09-25 01:17:25'),
(18, 'erlanggawulung@yahoo.com', 'Pengalaman354', '2016-11-13 17:50:02'),
(19, 'adminserang@gmail.com', 'admin35403', '2016-11-13 19:01:49'),
(20, 'dimasawardhana@gmail.com', 'Pengalaman354', '2016-11-20 22:34:12'),
(21, 'dimasawardhana@gmail.com', 'pengalaman', '2016-11-22 20:35:19'),
(22, 'dimasawardhana@gmail.com', 'pengalaman', '2016-11-22 20:36:40'),
(23, 'erlanggawulung@yahoo.com', 'pengalaman', '2016-11-28 01:04:30'),
(24, 'erlanggawulung@yahoo.com', 'raahsia', '2016-11-28 01:15:13'),
(25, 'erlanggawulung@yahoo.com', 'rahasia', '2016-11-29 22:08:41'),
(26, 'erlanggawulung@yahoo.com', 'rahasia', '2016-11-29 22:08:54'),
(27, 'dimasawardhana@gmail.com', 'Pengalaman354', '2016-12-15 16:42:49'),
(28, 'dimasawardhana@gmail.com', 'prngalaman', '2016-12-15 16:42:58'),
(29, 'dimasawardhana@gmail.com', '', '2016-12-16 00:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `no` int(255) NOT NULL,
  `no_admin` int(3) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`no`, `no_admin`, `time_stamp`) VALUES
(2, 0, '2016-06-15 08:21:03'),
(3, 1, '2016-06-15 08:54:47'),
(4, 1, '2016-06-15 08:57:15'),
(5, 1, '2016-06-15 08:57:25'),
(6, 1, '2016-06-15 09:07:38'),
(7, 1, '2016-06-15 09:07:48'),
(8, 1, '2016-06-15 09:08:05'),
(9, 1, '2016-06-15 09:08:40'),
(10, 1, '2016-06-15 09:09:33'),
(11, 1, '2016-06-15 09:22:38'),
(12, 1, '2016-06-15 09:25:39'),
(13, 1, '2016-06-15 09:26:37'),
(14, 1, '2016-06-15 09:51:07'),
(15, 1, '2016-06-15 09:52:16'),
(16, 1, '2016-06-15 09:54:25'),
(17, 1, '2016-06-15 09:55:28'),
(18, 1, '2016-06-15 10:03:07'),
(19, 1, '2016-06-22 06:04:02'),
(20, 1, '2016-06-23 07:52:49'),
(21, 1, '2016-06-23 07:59:11'),
(22, 1, '2016-06-29 21:53:44'),
(23, 1, '2016-06-29 21:55:00'),
(24, 1, '2016-07-01 07:26:27'),
(25, 1, '2016-07-02 05:58:54'),
(26, 1, '2016-07-12 14:39:45'),
(27, 1, '2016-07-17 05:18:55'),
(28, 1, '2016-07-17 15:06:44'),
(29, 1, '2016-08-02 07:01:55'),
(30, 1, '2016-08-03 05:34:02'),
(31, 1, '2016-09-16 22:48:18'),
(32, 1, '2016-09-19 03:36:01'),
(33, 1, '2016-09-19 03:45:58'),
(34, 1, '2016-09-19 04:08:50'),
(35, 1, '2016-09-19 04:11:01'),
(36, 1, '2016-09-19 07:58:29'),
(37, 1, '2016-09-19 08:30:04'),
(38, 1, '2016-09-19 08:42:36'),
(39, 1, '2016-09-19 11:23:09'),
(40, 1, '2016-09-20 07:13:15'),
(41, 1, '2016-09-20 20:42:44'),
(42, 1, '2016-09-20 23:31:41'),
(43, 1, '2016-09-21 01:38:49'),
(44, 1, '2016-09-22 18:45:51'),
(45, 1, '2016-09-24 12:02:22'),
(46, 1, '2016-09-24 12:03:14'),
(47, 1, '2016-09-24 12:03:25'),
(48, 1, '2016-09-24 13:12:15'),
(49, 1, '2016-09-24 22:42:15'),
(50, 1, '2016-09-24 22:48:49'),
(51, 1, '2016-09-25 01:17:33'),
(52, 1, '2016-09-28 17:10:32'),
(53, 1, '2016-09-28 17:51:46'),
(54, 1, '2016-09-28 17:52:02'),
(55, 1, '2016-09-28 17:52:12'),
(56, 1, '2016-09-28 20:20:37'),
(57, 1, '2016-10-09 00:26:29'),
(58, 1, '2016-11-01 22:27:29'),
(59, 1, '2016-11-08 02:06:54'),
(60, 1, '2016-11-13 17:50:09'),
(61, 4, '2016-11-13 18:58:53'),
(62, 6, '2016-11-13 19:02:19'),
(63, 6, '2016-11-13 19:04:33'),
(64, 5, '2016-11-13 19:05:25'),
(65, 5, '2016-11-13 19:05:56'),
(66, 1, '2016-11-17 13:39:59'),
(67, 1, '0000-00-00 00:00:00'),
(68, 1, '0000-00-00 00:00:00'),
(69, 1, '2016-11-18 05:52:43'),
(70, 1, '2016-11-18 05:53:00'),
(71, 1, '2016-11-21 04:12:28'),
(72, 1, '2016-11-21 04:34:01'),
(73, 1, '2016-11-21 04:35:34'),
(74, 10, '2016-11-21 04:36:29'),
(75, 10, '2016-11-21 04:37:22'),
(76, 1, '2016-11-21 07:04:18'),
(77, 1, '2016-11-23 02:37:45'),
(78, 1, '2016-11-28 06:30:57'),
(79, 1, '2016-11-28 07:03:15'),
(80, 1, '2016-11-28 07:15:18'),
(81, 1, '2016-11-28 12:07:14'),
(82, 1, '2016-11-30 03:59:16'),
(83, 10, '2016-11-30 04:08:19'),
(84, 10, '2016-11-30 04:09:11'),
(85, 10, '2016-12-01 04:51:46'),
(86, 10, '2016-12-03 15:54:52'),
(87, 10, '2016-12-05 02:09:57'),
(88, 10, '2016-12-05 06:56:41'),
(89, 1, '2016-12-10 02:28:43'),
(90, 10, '2016-12-15 22:43:07'),
(91, 10, '2016-12-16 03:04:03'),
(92, 10, '2016-12-16 06:27:07'),
(93, 10, '2016-12-19 01:58:00'),
(94, 10, '2016-12-19 13:58:12'),
(95, 10, '2016-12-21 02:32:54'),
(96, 10, '2016-12-26 04:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `nominal_tarekah_b`
--

CREATE TABLE `nominal_tarekah_b` (
  `id` int(11) NOT NULL,
  `id_tarekah_b` int(11) NOT NULL,
  `debit_kredit` tinyint(1) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bagi_hasil` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominal_tarekah_b`
--

INSERT INTO `nominal_tarekah_b` (`id`, `id_tarekah_b`, `debit_kredit`, `nominal`, `bagi_hasil`, `date`) VALUES
(1, 1, 1, 100000, 0, '2016-08-02'),
(2, 1, 1, 100000, 1000, '2016-08-10'),
(3, 2, 1, 100000, 0, '2016-08-03'),
(4, 3, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `no_rekening`
--

CREATE TABLE `no_rekening` (
  `id` int(4) NOT NULL,
  `no_rekening` varchar(11) NOT NULL,
  `cabang` int(3) NOT NULL,
  `id_anggota` int(4) NOT NULL,
  `saldo_pokok_wajib` float NOT NULL,
  `saldo_tabarok_a` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_rekening`
--

INSERT INTO `no_rekening` (`id`, `no_rekening`, `cabang`, `id_anggota`, `saldo_pokok_wajib`, `saldo_tabarok_a`) VALUES
(1, '35401150001', 1, 1, 120000, 4611210),
(2, '35401216002', 1, 3, 0, 719500),
(3, '35401160025', 1, 3, 0, 0),
(4, '35401160026', 1, 3, 0, 910000),
(5, '35401160027', 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pokok_wajib`
--

CREATE TABLE `pokok_wajib` (
  `id` int(3) NOT NULL,
  `id_rekening` int(4) NOT NULL,
  `pokok_wajib` tinyint(1) NOT NULL,
  `nominal` int(7) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokok_wajib`
--

INSERT INTO `pokok_wajib` (`id`, `id_rekening`, `pokok_wajib`, `nominal`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 100000, '2016-08-02', '2016-08-02 07:24:32', '0000-00-00 00:00:00'),
(2, 1, 1, 10000, '2016-08-02', '2016-08-02 07:24:32', '0000-00-00 00:00:00'),
(3, 1, 0, 10000, '2016-10-09', '2016-10-08 19:23:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabarok_a`
--

CREATE TABLE `tabarok_a` (
  `id` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `debit_kredit` tinyint(1) NOT NULL,
  `nominal` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `petugas` varchar(5) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabarok_a`
--

INSERT INTO `tabarok_a` (`id`, `id_rekening`, `kode`, `debit_kredit`, `nominal`, `date`, `created_at`, `updated_at`, `petugas`, `no_transaksi`, `keterangan`) VALUES
(1, 1, '', 1, 1000000, '2016-08-02', '2016-09-19 15:12:44', '0000-00-00 00:00:00', '', '', ''),
(2, 1, '', 1, 100000, '2016-08-02', '2016-09-19 15:12:47', '0000-00-00 00:00:00', '', '', ''),
(3, 1, '', 1, 100000, '2016-09-19', '2016-09-19 16:09:23', '0000-00-00 00:00:00', '', '', ''),
(4, 1, '', 0, 100000, '2016-09-19', '2016-09-19 04:17:02', '0000-00-00 00:00:00', '', '', ''),
(5, 1, '', 0, 400000, '2016-09-19', '2016-09-19 04:18:38', '0000-00-00 00:00:00', '', '', ''),
(6, 1, '', 1, 200000, '2016-09-19', '2016-09-19 04:24:19', '0000-00-00 00:00:00', '', '', ''),
(7, 1, '', 1, 700000, '2016-09-19', '2016-09-19 04:33:56', '0000-00-00 00:00:00', '', '', ''),
(8, 4, '', 0, 0, '2016-09-24', '2016-09-24 19:15:01', '0000-00-00 00:00:00', '', '', ''),
(9, 1, '', 1, 300000, '2016-09-25', '2016-09-25 04:31:53', '0000-00-00 00:00:00', '', '', ''),
(10, 1, '', 1, 100000, '2016-09-25', '2016-09-25 04:32:47', '0000-00-00 00:00:00', '', '', ''),
(11, 1, '', 1, 300000, '2016-09-25', '2016-09-25 04:33:35', '0000-00-00 00:00:00', '', '', 'sisa duit kemarin'),
(12, 1, '1', 1, 90000, '2016-10-09', '2016-10-08 19:56:33', '0000-00-00 00:00:00', '', '', 'cek'),
(13, 1, '2', 1, 10000, '2016-10-09', '2016-10-08 19:58:36', '0000-00-00 00:00:00', '', '', '01'),
(14, 1, '2', 1, 20000, '2016-10-09', '2016-10-08 20:00:40', '0000-00-00 00:00:00', '', '', '02'),
(15, 1, '2', 1, 10000, '2016-10-09', '2016-10-08 20:03:38', '0000-00-00 00:00:00', '', '', '02'),
(16, 1, '2', 1, 20000, '2016-10-09', '2016-10-08 20:05:13', '0000-00-00 00:00:00', '', '', '02'),
(17, 1, '3', 1, 121212, '2016-10-09', '2016-10-08 20:09:14', '0000-00-00 00:00:00', '', '', '3'),
(18, 1, '2', 0, 20000, '2016-10-09', '2016-10-08 20:16:48', '0000-00-00 00:00:00', '', '', 'yahuu 02'),
(19, 1, '1', 1, 10000, '2016-10-09', '2016-10-08 20:50:15', '0000-00-00 00:00:00', '', 'TB110', 'cihuuy'),
(20, 1, '2', 0, 90000, '2016-10-09', '2016-10-08 20:51:38', '0000-00-00 00:00:00', '', 'TB0110', 'yiiha'),
(21, 1, '1', 1, 90000, '2016-10-09', '2016-10-08 20:52:36', '0000-00-00 00:00:00', '', 'TB0110', 'yiiha'),
(22, 1, '1', 1, 10000, '2016-10-09', '2016-10-08 21:39:00', '0000-00-00 00:00:00', '', 'TB0110010', 'yiihu'),
(23, 1, '1', 1, 10000, '2016-10-09', '2016-10-08 21:40:11', '0000-00-00 00:00:00', '', 'TB0110012', 'dimas'),
(24, 1, '1', 1, 20000, '2016-10-09', '2016-10-08 21:40:39', '0000-00-00 00:00:00', '', 'TB0110013', 'iiha'),
(25, 1, '2', 0, 100000, '2016-10-09', '2016-10-08 22:45:02', '0000-00-00 00:00:00', 'ERL', 'TB0110014', 'dosunda'),
(26, 1, '1', 1, 1000000, '2016-11-14', '2016-11-14 00:36:05', '0000-00-00 00:00:00', 'ERL', 'TB111001', 'nabung'),
(27, 4, '1', 1, 1000000, '2016-12-10', '2016-12-10 03:20:23', '0000-00-00 00:00:00', '', 'TB112001', ''),
(28, 4, '1', 1, 10000, '2016-12-10', '2016-12-10 03:20:36', '0000-00-00 00:00:00', '', 'TB112002', ''),
(29, 4, '1', 1, 10000, '2016-12-10', '2016-12-10 03:23:27', '0000-00-00 00:00:00', '', 'TB112003', ''),
(30, 4, '1', 1, 1000000, '2016-12-10', '2016-12-10 03:23:37', '0000-00-00 00:00:00', '', 'TB112004', ''),
(31, 4, '2', 0, 100000, '2016-12-10', '2016-12-10 03:24:02', '0000-00-00 00:00:00', '', 'TB112005', ''),
(32, 2, '6', 1, 19500, '2016-12-19', '2016-12-19 09:44:05', '0000-00-00 00:00:00', '', 'TB112006', 'Pindah dari tarekah dengan id : 7'),
(33, 2, '1', 1, 700000, '2016-12-21', '2016-12-21 04:28:12', '0000-00-00 00:00:00', '', 'TB112007', 'telolet'),
(34, 1, '6', 1, 10000000, '2016-12-26', '2016-12-25 22:48:24', '0000-00-00 00:00:00', '', 'TB112008', 'tarekah dengan id : 1berakhir, dan dipindah ketabarok');

-- --------------------------------------------------------

--
-- Table structure for table `tarekah_a`
--

CREATE TABLE `tarekah_a` (
  `id` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `debit_kredit` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `waktu` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `petugas` varchar(5) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `keterangan` varchar(35) NOT NULL,
  `bagihasil` float DEFAULT NULL,
  `awal` float DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '1 sudah diambil, 0 masih dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarekah_a`
--

INSERT INTO `tarekah_a` (`id`, `id_rekening`, `kode`, `date`, `debit_kredit`, `nominal`, `waktu`, `created_at`, `updated_at`, `petugas`, `no_transaksi`, `keterangan`, `bagihasil`, `awal`, `status`) VALUES
(1, 1, '', '2016-08-02', 1, 10000000, 3, '2016-12-26 04:48:24', '0000-00-00 00:00:00', '', '', '', 40, 30, 1),
(2, 1, '', '2016-08-31', 1, 1000000, 6, '2016-12-16 03:19:33', '0000-00-00 00:00:00', '', '', '', 40, 30, 0),
(3, 4, '', '2016-09-24', 0, 0, 0, '2016-09-24 19:15:01', '0000-00-00 00:00:00', '', '', '', NULL, NULL, 0),
(4, 2, '', '2016-12-19', 0, 3000000, 6, '2016-12-19 02:26:46', '0000-00-00 00:00:00', '', 'TB0112006', '', NULL, NULL, 0),
(5, 2, '', '2016-12-19', 1, 200000, 3, '2016-12-19 02:51:03', '0000-00-00 00:00:00', '', 'TB0112006', '', NULL, NULL, 0),
(6, 2, '', '2016-12-19', 1, 10000000, 3, '2016-12-19 04:37:39', '0000-00-00 00:00:00', '', 'TB0112006', '', 40, 30, 0),
(7, 2, '', '2016-12-19', 1, 1300000, 12, '2016-12-19 14:23:05', '0000-00-00 00:00:00', '', 'TB0112006', '', 40, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tarekah_b`
--

CREATE TABLE `tarekah_b` (
  `id` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `waktu` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `petugas` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `keterangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarekah_b`
--

INSERT INTO `tarekah_b` (`id`, `id_rekening`, `kode`, `date`, `waktu`, `created_at`, `updated_at`, `petugas`, `no_transaksi`, `keterangan`) VALUES
(1, 1, '', '2016-08-02', 12, '2016-08-02 15:20:35', '0000-00-00 00:00:00', 0, '', ''),
(2, 1, '', '2016-08-03', 6, '2016-08-03 05:42:32', '0000-00-00 00:00:00', 0, '', ''),
(3, 4, '', '2016-09-24', 0, '2016-09-24 19:15:01', '0000-00-00 00:00:00', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagi_hasil_tarekah_a`
--
ALTER TABLE `bagi_hasil_tarekah_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagi_hasil_tarekah_b`
--
ALTER TABLE `bagi_hasil_tarekah_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_attempt`
--
ALTER TABLE `failed_attempt`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `nominal_tarekah_b`
--
ALTER TABLE `nominal_tarekah_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_rekening`
--
ALTER TABLE `no_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pokok_wajib`
--
ALTER TABLE `pokok_wajib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabarok_a`
--
ALTER TABLE `tabarok_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarekah_a`
--
ALTER TABLE `tarekah_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarekah_b`
--
ALTER TABLE `tarekah_b`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bagi_hasil_tarekah_a`
--
ALTER TABLE `bagi_hasil_tarekah_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bagi_hasil_tarekah_b`
--
ALTER TABLE `bagi_hasil_tarekah_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `failed_attempt`
--
ALTER TABLE `failed_attempt`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `nominal_tarekah_b`
--
ALTER TABLE `nominal_tarekah_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `no_rekening`
--
ALTER TABLE `no_rekening`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pokok_wajib`
--
ALTER TABLE `pokok_wajib`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabarok_a`
--
ALTER TABLE `tabarok_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tarekah_a`
--
ALTER TABLE `tarekah_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tarekah_b`
--
ALTER TABLE `tarekah_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
