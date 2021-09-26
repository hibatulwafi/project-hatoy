-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 04:42 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hatoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id_aset` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penyusutan` varchar(10) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT current_timestamp(),
  `diupdate_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id_aset`, `tanggal`, `jumlah`, `keterangan`, `penyusutan`, `dibuat_pada`, `diupdate_pada`) VALUES
(2, '2021-08-19', '3000000', 'Meja', '3', '2021-08-20 00:22:06', NULL),
(4, '2021-09-11', '5000000000', 'Gedung Madinah', '20', '2021-09-03 04:47:15', NULL),
(5, '2015-06-11', '15000000', 'Gazebo', '5', '2021-09-03 05:48:00', NULL),
(6, '2018-01-11', '5000000', 'Komputer', '5', '2021-09-03 06:12:28', NULL),
(7, '2021-08-06', '250000', 'Kursi', '3', '2021-09-03 07:10:59', NULL),
(8, '2021-08-10', '200000000', 'Mobil', '10', '2021-09-03 08:33:35', NULL),
(9, '2020-01-01', '10000000', 'Gazebo Usman', '5', '2021-09-15 13:50:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya`
--

CREATE TABLE `tb_biaya` (
  `id_biaya` int(11) NOT NULL,
  `id_master_biaya` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diupdate_pada` timestamp NULL DEFAULT NULL,
  `tipe` varchar(10) NOT NULL DEFAULT 'kredit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya`
--

INSERT INTO `tb_biaya` (`id_biaya`, `id_master_biaya`, `tanggal`, `jumlah`, `keterangan`, `status`, `dibuat_pada`, `diupdate_pada`, `tipe`) VALUES
(1, 1, '2021-06-11', '400000', 'Pembayaran Gaji Guru/Karyawan	', 1, '2021-07-23 07:42:11', NULL, 'kredit'),
(3, 2, '2021-07-23', '550000', 'Pembayaran Token Listrik Bulan Juli', 1, '2021-07-23 07:47:14', NULL, 'kredit'),
(6, 6, '2021-07-15', '1000000', 'Biaya A', 1, '2021-07-23 09:03:58', NULL, 'kredit'),
(8, 6, '2021-07-30', '600000', 'Biaya UTS', 1, '2021-07-23 09:22:40', NULL, 'kredit'),
(9, 2, '2021-07-13', '400000', 'Biaya Token Ke 2', 1, '2021-07-23 09:23:18', NULL, 'kredit'),
(10, 7, '2021-07-22', '600000', 'Cetak Spanduk', 1, '2021-07-23 09:25:27', NULL, 'kredit'),
(11, 7, '2021-07-14', '30000', 'Cetak Banner', 1, '2021-07-23 09:25:53', NULL, 'kredit'),
(12, 1, '2021-07-29', '81000000', 'Gaji Karyawan / Guru', 1, '2021-07-30 04:11:46', NULL, 'kredit'),
(13, 6, '2021-07-29', '600000', 'Pembelian Buku Perpustakaan', 1, '2021-07-30 07:00:35', NULL, 'kredit'),
(14, 3, '2021-07-30', '450000', 'Biaya Koran', 1, '2021-08-06 02:07:21', NULL, 'kredit'),
(15, 2, '2021-08-06', '400000', 'Pembelian Token Listrik', 1, '2021-08-06 09:15:13', NULL, 'kredit'),
(17, 1, '2021-08-31', '6000000', 'Gaji Guru bulan Agst', 1, '2021-08-27 04:40:18', NULL, 'kredit'),
(18, 7, '2021-07-29', '600000', 'Biaya A', 1, '2021-08-27 04:41:00', NULL, 'kredit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan_ajaran`
--

CREATE TABLE `tb_bulan_ajaran` (
  `id_ajaran` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `no_bulan` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bulan_ajaran`
--

INSERT INTO `tb_bulan_ajaran` (`id_ajaran`, `posisi`, `bulan`, `keterangan`, `no_bulan`) VALUES
(1, 1, 'Juli', 'Bulan ke 1', '07'),
(2, 2, 'Agustus', 'Bulan ke 2', '08'),
(3, 3, 'September', 'Bulan ke 3', '09'),
(4, 4, 'Oktober', 'Bulan ke 4', '10'),
(5, 5, 'November', 'Bulan ke 5', '11'),
(6, 6, 'Desember', 'Bulan ke 6', '12'),
(7, 7, 'Januari', 'Bulan ke 7', '01'),
(8, 8, 'Februari', 'Bulan ke 8', '02'),
(9, 9, 'Maret', 'Bulan ke 9', '03'),
(10, 10, 'April', 'Bulan ke 10', '04'),
(11, 11, 'Mei', 'Bulan ke 11', '05'),
(12, 12, 'Juni', 'Bulan ke 12', '06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembayaran`
--

CREATE TABLE `tb_detail_pembayaran` (
  `id_detail_pem` int(11) NOT NULL,
  `id_jenis_pem` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diupdate_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembayaran`
--

INSERT INTO `tb_detail_pembayaran` (`id_detail_pem`, `id_jenis_pem`, `jumlah`, `tahun_ajaran`, `dibuat_pada`, `diupdate_pada`) VALUES
(1, 1, '500000', '2021', '2021-04-30 09:05:23', '2021-07-13 10:00:29'),
(2, 2, '1600000', '2021', '2021-04-30 09:05:23', '2021-07-13 10:00:29'),
(3, 3, '5200000', '2021', '2021-04-30 09:05:23', '2021-07-13 10:00:29'),
(4, 1, '400000', '2020', '2021-04-30 09:24:32', '2021-04-30 04:10:27'),
(5, 2, '1000000', '2020', '2021-04-30 09:24:32', '2021-04-30 04:10:27'),
(6, 3, '6000000', '2020', '2021-04-30 09:24:32', '2021-04-30 04:10:27'),
(10, 1, '480000', '2019', '2021-04-30 03:17:36', '2021-04-30 04:09:57'),
(11, 2, '1300000', '2019', '2021-04-30 03:17:36', '2021-04-30 04:09:57'),
(12, 3, '4400000', '2019', '2021-04-30 03:17:36', '2021-04-30 04:09:57'),
(13, 1, '500000', '2018', '2021-04-30 04:11:13', '2021-04-30 04:11:25'),
(14, 2, '1200000', '2018', '2021-04-30 04:11:13', '2021-04-30 04:11:25'),
(15, 3, '4000000', '2018', '2021-04-30 04:11:13', '2021-04-30 04:11:25'),
(16, 1, '500000', '2022', '2021-07-13 09:58:42', '2021-07-13 11:35:25'),
(17, 2, '100000', '2022', '2021-07-13 09:58:42', '2021-07-13 11:35:25'),
(18, 3, '6000000', '2022', '2021-07-13 09:58:42', '2021-07-13 11:35:25'),
(19, 1, '400000', '2017', '2021-07-13 10:50:38', NULL),
(20, 2, '1200000', '2017', '2021-07-13 10:50:38', NULL),
(21, 3, '5000000', '2017', '2021-07-13 10:50:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pem` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `dibuat_pada` datetime NOT NULL,
  `diupdate_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_pembayaran`
--

INSERT INTO `tb_jenis_pembayaran` (`id_jenis_pem`, `jenis_pembayaran`, `keterangan`, `dibuat_pada`, `diupdate_pada`) VALUES
(1, 'SPP', 'Uang SPP adalah ...', '2021-03-19 06:19:27', '2021-03-19 11:37:42'),
(2, 'Uang Kegiatan', 'Uang Kegiatan adalah ...', '2021-03-19 10:01:29', NULL),
(3, 'Uang Pangkal', 'Uang Pangkal Adalah ...', '2021-03-19 10:02:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diupdate_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `dibuat_pada`, `diupdate_pada`) VALUES
(1, '7A', '2021-03-19 10:04:48', NULL),
(2, '7B', '2021-03-19 10:05:06', NULL),
(3, '7C', '2021-03-19 10:05:24', NULL),
(4, '7D', '2021-03-19 10:05:24', NULL),
(5, '7E', '2021-03-19 10:07:17', NULL),
(6, '7F', '2021-03-19 10:07:17', NULL),
(7, '7G', '2021-03-19 10:07:17', NULL),
(8, '7H', '2021-03-19 10:07:17', NULL),
(9, '8A', '2021-03-19 10:07:17', NULL),
(10, '8B', '2021-03-19 10:07:17', NULL),
(11, '8C', '2021-03-19 10:07:17', NULL),
(12, '8D', '2021-03-19 10:07:17', NULL),
(13, '8E', '2021-03-19 10:07:17', NULL),
(14, '8F', '2021-03-19 10:07:17', NULL),
(15, '8G', '2021-03-19 10:07:17', NULL),
(16, '8H', '2021-03-19 10:07:17', NULL),
(17, '9A', '2021-03-19 10:07:17', NULL),
(18, '9B', '2021-03-19 10:07:17', NULL),
(19, '9C', '2021-03-19 10:07:17', NULL),
(20, '9D', '2021-03-19 10:07:17', NULL),
(21, '9E', '2021-03-19 10:07:17', NULL),
(22, '9F', '2021-03-19 10:07:17', NULL),
(23, '9G', '2021-03-19 10:07:17', NULL),
(24, '9H', '2021-03-19 10:07:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat_ip` varchar(20) NOT NULL,
  `device` varchar(100) NOT NULL,
  `keterangan_log` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `id_user`, `alamat_ip`, `device`, `keterangan_log`, `tanggal`) VALUES
(1, 2, '', '', 'Bendahara 1 input pembayaran siswa nim 123 a/n Hibatul Wafi', '2021-03-19 10:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `status_akun` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `email`, `username`, `password`, `name`, `level`, `remember_token`, `status_akun`, `created_at`, `updated_at`) VALUES
(1, 'kepsek001@gmail.com', 'kepsek001@gmail.com', '$2y$12$k2LgHWcXV3/SyAuUJtxISOU.1DLgfJ4HUOex9Zuo7hf4la3C45442', 'Kepala Sekolah', 1, '', 1, '2021-03-19 10:29:29', NULL),
(2, 'root@hatoy', 'root@hatoy', '$2y$10$QvC6d8OT0bs4MPzD5jyDTO3m7fACkNEICMSVUytsyVPLBoX6LuxBW', 'SuperUser', 0, '', 1, '2021-06-18 09:17:17', NULL),
(6, 'akunting001@gmail.com', 'akunting001@gmail.com', '$2y$12$k2LgHWcXV3/SyAuUJtxISOU.1DLgfJ4HUOex9Zuo7hf4la3C45442', 'Akunting 001', 2, '', 1, '2021-06-11 09:04:52', '2021-06-11 09:04:52'),
(7, 'bendahara001@gmail.com', 'bendahara001@gmail.com', '$2y$12$k2LgHWcXV3/SyAuUJtxISOU.1DLgfJ4HUOex9Zuo7hf4la3C45442', 'Bendahara 002', 3, '', 1, '2021-06-11 09:26:17', '2021-06-11 09:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_biaya`
--

CREATE TABLE `tb_master_biaya` (
  `id_master_biaya` int(11) NOT NULL,
  `kategori_operasional` varchar(50) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diupdate_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_biaya`
--

INSERT INTO `tb_master_biaya` (`id_master_biaya`, `kategori_operasional`, `nama_biaya`, `status`, `dibuat_pada`, `diupdate_pada`) VALUES
(1, 'Operasional I', 'Gaji Guru/Karyawan', 1, '2021-07-23 06:29:13', NULL),
(2, 'Operasional I', 'Token Listrik', 1, '2021-07-23 06:29:13', NULL),
(3, 'Operasional II', 'Biaya Koran', 1, '2021-07-23 08:38:40', '2021-07-23 08:44:02'),
(4, 'Operasional I', 'THR', 1, '2021-07-23 08:47:00', NULL),
(5, 'Operasional II', 'Jumlah Biaya Kurikulum & SDM', 1, '2021-07-23 08:47:17', NULL),
(6, 'Operasional II', 'Kurikulum & SDM', 1, '2021-07-23 09:03:36', NULL),
(7, 'Operasional II', 'Jumlah Biaya Humas & Marketing', 1, '2021-07-23 09:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_kas`
--

CREATE TABLE `tb_master_kas` (
  `id_mst_kas` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_kas`
--

INSERT INTO `tb_master_kas` (`id_mst_kas`, `jumlah`, `created_at`) VALUES
(1, '452000000', '2021-08-06 09:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_jenis_pem` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `pembayaran_bulan` varchar(10) NOT NULL,
  `pembayaran_tahun` varchar(10) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_petugas` int(11) NOT NULL DEFAULT 0,
  `diskon` varchar(255) DEFAULT NULL,
  `tanggal_bayar` date NOT NULL DEFAULT current_timestamp(),
  `status_pembayaran` int(11) NOT NULL DEFAULT 1,
  `method` varchar(25) NOT NULL DEFAULT 'Tunai',
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `tipe` varchar(10) NOT NULL DEFAULT 'debet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_jenis_pem`, `nis`, `pembayaran_bulan`, `pembayaran_tahun`, `jumlah`, `keterangan`, `id_petugas`, `diskon`, `tanggal_bayar`, `status_pembayaran`, `method`, `dibuat_pada`, `tipe`) VALUES
(1, 3, '1818.07.001', '3', '2021', '350000', 'Pembayaran Bertahap', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-03-19 10:38:15', 'debet'),
(2, 2, '1818.07.001', '-', '2020', '1000000', 'Pembayaran Uang Kegiatan', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-03-19 12:39:54', 'debet'),
(4, 3, '1818.07.001', '-', '2021', '50000', 'Cicilan Uang Pangkal', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-04-30 06:22:23', 'debet'),
(5, 3, '1818.07.001', '-', '2021', '800000', 'Cicilan Uang Pangkal', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-04-30 06:25:19', 'debet'),
(6, 3, '1818.07.001', '-', '2021', '2000000', 'Cicilan Uang Pangkal', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-04-30 07:09:16', 'debet'),
(7, 2, '1818.07.001', '-', '2021', '600000', 'Lunas', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-04-30 07:49:37', 'debet'),
(8, 2, '1819.07.005', '-', '2021', '500000', 'Keterangan', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-04-30 08:12:45', 'debet'),
(9, 1, '1819.07.005', '1', '2019', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-04-30 08:14:35', 'debet'),
(10, 1, '1819.07.002', '12', '2021', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 01:56:42', 'debet'),
(11, 1, '1819.07.002', '11', '2021', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 01:59:57', 'debet'),
(12, 3, '1818.07.001', '-', '2021', '2000000', 'Pelunasan Uang Pangkal', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 02:28:18', 'debet'),
(18, 1, '1818.07.001', '2', '2021', '300000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 16:44:09', 'debet'),
(19, 1, '1819.07.002', '1', '2021', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 16:52:58', 'debet'),
(20, 1, '1819.07.003', '12', '2021', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 16:53:54', 'debet'),
(21, 1, '1819.07.003', '1', '2022', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-04 16:54:50', 'debet'),
(22, 1, '085863046869', '5', '2020', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-06-18 09:39:45', 'debet'),
(29, 1, '085863046869', '1', '2020', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-10 11:08:17', 'debet'),
(33, 1, '085863046869', '2', '2020', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 10:36:20', 'debet'),
(46, 1, '1819.07.003', '1', '2021', '500000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 11:15:27', 'debet'),
(47, 1, '1819.07.004', '1', '2021', '500000', 'SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 11:18:32', 'debet'),
(48, 1, '1819.07.004', '2', '2021', '500000', 'SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 11:18:32', 'debet'),
(49, 1, '1819.07.005', '1', '2021', '500000', 'SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 11:18:32', 'debet'),
(50, 1, '1819.07.005', '2', '2021', '500000', 'SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 11:18:32', 'debet'),
(52, 1, '085863046869', '3', '2020', '400000', 'Pembayaran SPP', 0, NULL, '2021-07-30', 1, 'Tunai', '2021-07-13 12:15:47', 'debet'),
(53, 1, '085863046869', '4', '2020', '400000', 'Pembayaran SPP', 0, '100000', '2021-07-30', 1, 'Tunai', '2021-07-13 14:43:55', 'debet'),
(54, 1, '1819.07.006', '1', '2021', '400000', 'Pembayaran SPP', 0, '100000', '2021-07-30', 1, 'Tunai', '2021-07-13 15:28:01', 'debet'),
(55, 1, '085863046869', '6', '2020', '400000', 'Pembayaran SPP', 0, '100000', '2021-01-31', 1, 'Transfer', '2021-07-13 16:09:35', 'debet'),
(56, 1, '3121031001', '1', '2017', '400000', 'Pembayaran SPP', 0, NULL, '2021-08-20', 1, 'Tunai', '2021-08-20 12:50:11', 'debet'),
(58, 1, '1819.07.002', '2', '2021', '500000', 'Pembayaran SPP', 0, NULL, '2021-08-27', 1, 'Tunai', '2021-08-27 09:06:43', 'debet'),
(59, 1, '1818.07.001', '3', '2021', '400000', 'Pembayaran SPP', 0, NULL, '2021-08-27', 1, 'Tunai', '2021-08-27 11:00:44', 'debet'),
(60, 1, '1818.07.001', '1', '2021', '400000', 'Pembayaran SPP', 0, '100000', '2021-09-15', 1, 'Tunai', '2021-09-15 22:47:39', 'debet'),
(61, 1, '1818.07.001', '2', '2021', '200000', 'Pembayaran SPP', 0, NULL, '2021-09-15', 1, 'Tunai', '2021-09-15 22:48:46', 'debet'),
(62, 1, '1818.07.001', '3', '2021', '100000', 'Pembayaran Cicilan SPP', 0, NULL, '2021-09-15', 1, 'Tunai', '2021-09-15 22:49:41', 'debet'),
(63, 1, '1819.07.002', '5', '2021', '40000', 'SPP', 0, '0', '2021-09-15', 1, 'Tunai', '2021-09-15 23:00:26', 'debet'),
(64, 1, '1819.07.002', '6', '2021', '40000', 'SPP', 0, '0', '2021-09-15', 1, 'Tunai', '2021-09-15 23:00:26', 'debet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kas`
--

CREATE TABLE `tb_riwayat_kas` (
  `id_riwayat_kas` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat_kas`
--

INSERT INTO `tb_riwayat_kas` (`id_riwayat_kas`, `jumlah`, `bulan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '1000000', '6', '2021', '2021-07-30 02:36:40', NULL),
(2, '120000000', '7', '2021', '2021-07-30 02:36:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(25) NOT NULL,
  `nisn` varchar(25) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `pendidikan_ayah` varchar(20) DEFAULT NULL,
  `pendidikan_ibu` varchar(100) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `alamat_lengkap` varchar(255) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `status_dlm_keluarga` varchar(50) DEFAULT NULL,
  `anak_ke` varchar(10) DEFAULT NULL,
  `tahun_masuk` varchar(20) DEFAULT NULL,
  `status_siswa` varchar(20) DEFAULT NULL,
  `no_seri_ijazah` varchar(50) DEFAULT NULL,
  `no_seri_skhun` varchar(50) DEFAULT NULL,
  `no_peserta_un` varchar(50) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT 'default.jpg',
  `keterangan` text DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diupdate_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nisn`, `nama_siswa`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `jk`, `nik`, `ttl`, `no_telepon`, `asal_sekolah`, `alamat_lengkap`, `kelas`, `agama`, `status_dlm_keluarga`, `anak_ke`, `tahun_masuk`, `status_siswa`, `no_seri_ijazah`, `no_seri_skhun`, `no_peserta_un`, `foto_siswa`, `keterangan`, `dibuat_pada`, `diupdate_pada`) VALUES
('085863046869', '085863046869', 'Levi Arckerman', 'nama ayah', 'nama ibu', 'pekerjaan ayah', 'pekerjaan ibu', 'pendidikan ayah', 'pendidikan ibu', 'P', '0858630468691', 'Sukabumi, 10 Maret 2006', '085811233321', 'SMI', 'almat', 'Alumni A', 'Islam', 'Anak Kandung', '2', '2018', 'Aktif', '123', 'sk', 'asa', 'levi-arckerman-2-60c2eb6e0fbae.jpeg', NULL, '2021-06-11 11:49:50', '2021-06-11 12:45:09'),
('1818.07.001', '0065790101', 'Adinda Putri F', 'Haris Fadillah', 'Irma Masuray Priati', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA', 'P', '3272014605060001', 'Sukabumi, 06 Mei 2006', '0857 9875 0876', 'SD IT Adzkia 1', 'Jl. Bhineka Karya No.64A Rt.04/07 Kel. Karamat Kec. Gunungpuyuh Kota Sukabumi', 'VII E', 'Islam', 'Anak Kandung', '4', '2021', 'Aktif', 'DN-02 Dd/06 2702966', 'DN-02 Dd 24149126', '1-18-02-24-149-126-3', 'adinda-putri-f-60e7c3e18913c.jpeg', NULL, '2021-07-09 10:34:57', NULL),
('1819.07.002', '0067648555', 'Afzaal Rahadian Maulidhan', 'Surip', 'Heni', 'Wiraswasta ', 'Wiraswasta ', 'SMA', 'SMA', 'L', '3272041004060061', 'Sukabumi, 10 April 2006', '0858 9008 2613', 'SDN Benteng 2', 'Jl. Benteng Tengah Rt.03/02 Kel. Benteng Kec. Warudoyong Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2902227', 'DN-02 Dd 08069001', '1-18-02-08-069-001-8', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.003', '0068784269', 'Ahmad Ghazy Nurfallah ', 'Sunaryo', 'Cucu Hotimah', 'PNS', 'PNS', 'S2', 'S1', 'L', '3272011003060001', 'Sukabumi, 10 Maret 2006', '0857 9427 0201', 'SD IT Adzkia 1', 'Jl. Bhineka Karya No.11 Kel. Karamat Kec. Gunungpuyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2702998', 'DN-02 Dd 24149158', '1-18-02-24-149-158-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.004', '0058959637', 'Al-Kindy Zia Rabani ', 'Agus Rojab Maulana', 'Neni Heryani', 'PNS', 'Guru', 'S1', 'S1', 'L', '3272031711050021', 'Sukabumi, 17 November 2005', '0857 2424 3457', 'SDN Cijangkar 2', 'Jl. Otto Iskandar Dinata Rt.02/02 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2901293', 'DN-02 Dd 08045040', '1-18-02-08-045-040-9', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.005', '0064641044', 'Algifari Tri Andaru ', 'Ence Supriatna', 'Risma Nuraida', 'PNS', 'Ibu Rumah Tangga', 'Diploma ', 'SMA ', 'L', '3272023103060001', 'Sukabumi, 31 Maret 2006', '0812 3235 6404', 'SDN Cimanggah 1', 'Jl. Selabintana No.33 Rt.09/07 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900322', 'DN-02 Dd 08021003', '1-18-02-08-021-003-6', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.006', '0051709284', 'Ali Wardana ', 'Drs. H. Heri Sukarno', 'Hj. Susi Puspitasari', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3272020110050002', 'Sukabumi, 01 Oktober 2005', '0857 2310 5897', 'SDN Dewi Sartika CBM ', 'Jl. Kabandungan No.14 Rt.02/05 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337242', 'DN-02 Dd 08019034', '1-18-02-08-019-034-7', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.007', '0051137870', 'Almer Azzikra ', 'Agung Budiman', 'Dewi Safarida', 'PNS', 'Ibu Rumah Tangga', 'S1', 'MA', 'L', '3272040511050923', 'Sukabumi, 05 November 2005', '0815 6355 5454', 'SDN Suryakencana CBM ', 'Jl. Arief Rachman Hakim Gg.Loa No.11 Rt.01/05 Kel. Benteng Kec. Warudoyong Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337372', 'DN-02 Dd 08020044', '1-18-02-08-020-044-5', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.008', '0061628360', 'Althaf Haidar Baladraf ', 'Ali Akbar Baladraf', 'Andi Eva Ayu Kartika', NULL, NULL, NULL, NULL, 'L', '3202321101060002', 'Malang, 11 Januari 2006', '0812 9198 1609', 'SDN Suryakencana CBM ', 'Jl. Selabintana KM.5 No.882 Rt.22/05 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', NULL, '2021', 'Aktif', 'DN-02 Dd/13 0337411', 'DN-02 Dd 08020083', '1-18-02-08-020-083-6', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.009', '0055904304', 'Alya Siti Khofiyya', 'Denny Achmad Supriyady, Amd', 'Kimiawati', 'Pegawai Swasta', 'Pegawai Swasta', 'Diploma ', 'SMA', 'P', '3174014211050003', 'Klaten, 02 November 2005', '0815 6368 5000', 'SDN Cimanggah 1', 'Jl. Bhayangkara Gg. Kaswari No.25 Rt.06/08 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900325', 'DN-02 Dd 08021006', '1-18-02-08-021-006-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.010', '0061570406', 'Amal Abdelsalam Yousif Al-Naqbi', 'Abdel Salam Yousf', 'Fazat Rofiah', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3272016806060003', 'Sukabumi, 28 Juli 2006', '0857 2222 2202', 'SD IT Adzkia 1', 'Perum Mega Residence Blok C7 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2702968', 'DN-02 Dd 24149128', '1-18-02-24-149-128-9', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.011', '0054331591', 'Anisa Fauziah', 'Yustia Guntara', 'Dedeh Rohaenah', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'P', '3272014112050900', 'Sukabumi, 01 Desember 2005', '0877 2078 7002', 'SDN Karamat Randu ', 'Perum Assyifa Jl. KH. Abdul Aziz Blok E No.8 Rt.06/08 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2899938', 'DN-02 Dd 08007003', '1-18-02-08-007-003-6', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.012', '0079341852', 'Annisa Zukhroful Jannah ', 'Dindin Amedin', 'Dewi Apriyani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3202335403070004', 'Sukabumi, 14 Maret 2007', '0857 5971 1666', 'SD IT Adzkia 2', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903884', 'DN-02 Dd 08120062', '1-18-02-08-120-062-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.013', '0055926496', 'Aridho Syaeful Azis', 'Alpian', 'Nani Mulyani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'L', '3202323010050002', 'Sukabumi, 30 Oktober 2005', '0857 1835 8115', 'SDN 1 Parungseah ', 'Kp. Parungseah Wetan Rt.05/06 Desa Parungseah Kec. Sukabumi Kab. Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2697303', 'DN-02 Dd 24001004', '1-18-02-24-001-004-5', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.014', '0053048576', 'Aru Fahrudin ', 'Wawan Rusdiawan', 'Erva Fiestecha Ferdiana', 'POLRI ', 'Ibu Rumah Tangga', 'S2', 'SMA ', 'L', '3203161906050002', 'Jakarta, 19 Juni 2005', '0857 2322 2010', 'SDN Dewi Sartika CBM ', 'Komplek Setukpa Blok D No.14 Jl. Bhayangkara No. 166 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337271', 'DN-02 Dd 08019063', '1-18-02-08-019-063-2', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.015', '0062175017', 'Atthira Reta Zahra Darmawan ', 'Dani Darmawan', 'Anggi Heidy Octaviani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'P', '3272025807060902', 'Sukabumi, 18 Juli 2006', '0815 4600 0403', 'SD IT Adzkia 1', 'Jl. Cikole Dalam No.18 Rt.07/07 Kel. Cikole Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2703000', 'DN-02 Dd 27030000', '1-18-02-24-149-160-9', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.016', '0067494304', 'Aura Lintang Prabowo', 'Jarot Purwanto', 'Epin Susiana', 'Wiraswasta ', 'Wiraswasta ', 'SMA', 'SMA', 'L', '3272013101060900', 'Sukabumi, 31 Januari 2006', '0816 4602 3871', 'SDN Benteng 1', 'Perum Tanjung Sari Jl. Cempaka No.20 Rt.03/14 Kel. Karang Tengah Kec. Gunungpuyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2902191', 'DN-02 Dd 08068003', '1-18-02-08-068-003-6', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.017', '0055134957', 'Aura Nisa Dwi Aninda', 'Nanang Suwarna', 'Elis Sulastri', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'SMA', 'P', '3272055203060002', 'Sukabumi, 12 Maret 2006', '0812 9384 8901', 'SD Islam Al-Azhar 7 ', 'Mega Residence B23 Rt.03/02 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900519', 'DN-02 Dd 08028023', '1-18-02-08-028-023-2', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.018', '0069593736', 'Azhar Gadzi Azidan ', 'Jeri Ginanjar', 'Dewi Febrianty, S.Sos', 'Wiraswasta ', 'Pegawai Swasta ', 'Diploma ', 'S1', 'L', '3202330903060007', 'Sukabumi, 09 Maret 2006', '0813 1127 0828', 'SD IT Adzkia 2', 'Jl. Siliwangi No.30 Rt.04/04 Desa Pasirhalang Kec. Sukaraja Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903854', 'DN-02 Dd 08120032', '1-18-02-08-120-032-9', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.019', '0052960241', 'Azka Antika Wiguna ', 'Irawan Wiguna', 'Ineu Antika', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA', 'P', '3272075007050001', 'Sukabumi, 10 Juli 2005', '0815 6343 4322', 'SDN Baros Kencana CBM ', 'Perum Sindangpalay Jl. Bougenvil No.38 Rt.04/07 Kel. Sindangpalay Kec. Cibeureum Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337818', 'DN-02 Dd 08090046', '1-18-02-08-090-046-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.020', '0068785026', 'Bayu Teja Samudera', 'Saepudin Juhri', 'Siti Komariah', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SD ', 'SD ', 'L', '3202040102060004', 'Sukabumi, 05 Februari 2006', '0857 2112 6473', 'SDN Bojongsoka ', 'Kp. Citamiang Rt.01/02 Desa Limusnunggal Kec. Bantargadung Kab. Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '5', '2021', 'Aktif', 'DN-02 Dd/06 2721274', 'DN-02 Dd 24634008', '1-18-02-24-634-008-9', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.021', '0062789348', 'Bunga Amelia Putri Juansyah ', 'Uce Rahmat Juansyah', 'Leni Marlina', 'POLRI ', 'Ibu Rumah Tangga', 'SMA ', 'Diploma ', 'P', '3202306912050002', 'Sukabumi, 29 Desember 2006', '0857 2444 0766', 'SD IT Yaspida ', 'Kp. Renged Rt.12/04 Desa Cipetir Kec. Kadudampit Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2704425', 'DN-02 Dd 24954006', '1-18-02-24-954-006-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.022', '0064111480', 'Chantika Nurani Rahmah ', 'Dayat Mulyadi', 'Nina Kustinawati', 'PNS', 'Ibu Rumah Tangga', 'S2', 'SMA', 'P', '3202336401060001', 'Sukabumi, 24 Januari 2006', NULL, 'SD Aisyiyah ', 'Kp. Cibeureum Rt.03/14 Kec. Sukaraja Kab. Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '5', '2021', 'Aktif', 'DN-02 Dd/06 2902117', 'DN-02 Dd 08122026', '1-18-02-08-122-026-7', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.023', '0058261652', 'Chelsea Zulfah Nabila ', 'Desyuan', 'Susanti', 'Wiraswasta ', 'Pegawai Swasta', 'SMA', 'SMA', 'P', '3272045911050001', 'Sukabumi, 19 November 2005', '0815 6328 2099', 'SDN Suryakencana CBM ', 'Jl. Arief Rahman Hakim No.77 Rt.01/05 Kel. Benteng Kec. Warudoyong Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337335', 'DN-02 Dd 08020007', '1-18-02-08-020-007-2', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.024', '0067405330', 'Daffa Dhiyaa Candra ', 'Dindin Diani', 'Ajeng Laras Wulan', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'S1', 'L', '3272011201060001', 'Sukabumi, 12 Januari 2006', '0856 9097 729', 'SDN Gunungpuyuh CBM ', 'Jl. Karamat Rt.02/04 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337173', 'DN-02 Dd 08001038', '1-18-02-08-001-038-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.025', '0068182940', 'Daima Chayyira Fahima ', 'Dede Andi Heryanto', 'Ela Nurlaelasari', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'P', '3272035104060001', 'Sukabumi, 11 April 2006', '0858 6301 7320', 'SDN Suryakencana CBM ', 'Jl. Tipar No.35 Rt.01/01 Kel. Tipar Kec. Citamiang Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337379', 'DN-02 Dd 08020051', '1-18-02-08-020-051-6', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.026', '0061700149', 'Dareen Syachira Fatinah ', 'Feri Firmansyah', 'Dian Handayani', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3175075807060010', 'Jakarta, 18 Juli 2006', '0812 1021 9577', 'SD Islam Al-Azhar 7 ', 'Jl. Pemuda 2 Rt.09/04 Kel. Tipar Kec. Citamiang Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900523', 'DN-02 Dd 08028027', '1-18-02-08-208-027-6', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.027', '0064796524', 'Deffa Haidar Darmansyah ', 'Edi Darmaji', 'Nourma Syahidawati', 'PNS', 'PNS', 'SMA', 'S2', 'L', '3272050107060001', 'Sukabumi, 01 Juli 2006', '0858 6300 0522', 'SD IT Adzkia 2', 'Jl.Cipeujeuh Rt.02/03 Kel. Baros Kec. Baros Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903828', 'DN-02 Dd 08120006', '1-18-02-08-120-006-3', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.028', '0059625724', 'Deysi Aulia Dwi Haryanto', 'Evi Haryanto', 'Siti Imas Masyikah', 'POLRI ', 'Ibu Rumah Tangga', 'S1', 'SMA', 'P', '3272045812050001', 'Sukabumi, 18 Desember 2005', '0815 6317 7714', 'SDN Suryakencana CBM ', 'Kp. Tegal Wangi Rt.01/02 Kel. Sukakarya Kec. Warudoyong Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337380', 'DN-02 Dd 08020052', '1-18-02-08-020-052-5', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.029', '0068928369', 'Dhefanendra Muhafi Al Fatillah Djuliyanto', 'Sriyanto', 'Djuli Sri Wuryanti', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA', 'L', '3272070202060899', 'Sukabumi, 02 Februari 2006', '0815 6002 708', 'SD Islam Al-Azhar 7 ', 'Pesona Cibeureum Blok T No.1 Rt.04/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900504', 'DN-02 Dd 08028008', '1-18-02-08-028-008-9', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1819.07.030', '0057070270', 'Exa Egista Herliandi ', 'Hendi Suyandi', 'Ely Eristina', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA', 'L', '3202331808050006', 'Sukabumi, 18 Agustus 2005', '0813 8585 8603', 'MI Babakan Limbangan ', 'Kp. Astana Genteng No.1 Rt.03/16 Desa Sukaraja Kec.Sukaraja Kab. Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'MI-13 100086567', 'DN-02 Dd 45311006', '1-18-02-45-311-006-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.031', '0065840343', 'Fadhil Hafiz ', 'Tutun Kamaludin', 'Nenden Widiasih', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA', 'L', '3202331501060001', 'Sukabumi, 15 Januari 2006', '0857 2221 1528', 'SDN Cibeureumhilir 5 ', 'Jl. Kaliandra II Blok J PCP 2 No.8 Rt.09/09 Kel. Babakan Kec.Cibeureum Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903391', 'DN-02 Dd 08098078', '1-18-02-08-098-078-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.032', '0055714575', 'Fakhira Maryam ', 'Yandi Irawan Maulana Hidayat', 'Ella Nurlaela', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMP ', 'P', '3272017011050002', 'Sukabumi, 30 November 2005', '0857 2121 2232', 'SDN Brawijaya ', 'Jl. Brawijaya Gg. Brawijaya III Rt.03/06 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2899770', 'DN-02 Dd 08002047', '1-18-02-08-002-047-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.033', '0061170260', 'Fakhreza Yudhistira Wiharsa ', 'Drs. H. Yudhi Wiharsa, M.Si', 'Wanti Kuswanti', 'PNS', 'Wiraswasta ', 'S2', 'SMA', 'L', '3272020201450899', 'Sukabumi, 12 Oktober 2006', '0821 1177 5422', 'SD Islam Al-Azhar 7 ', 'Griya Selabumi Estate Jl.Alam Utama Blok B No.9 Rt.05/01 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2900525', 'DN-02 Dd 08028029', '1-18-02-08-028-029-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.034', '0069149512', 'Famous Aveto Rakhasya Kusnadi', 'James Yusuf Kusnadi', 'Dian Putri Pratiwi', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA', 'L', '3272022204060001', 'Sukabumi, 22 April 2006', '0857 2121 6699', 'SD Aisyiyah ', 'Perum Taman Asri B23 No.14 Rt.09/14 Kel. Subangjaya Kec. Cikole Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2902095', 'DN-02 Dd 08122004', '1-18-02-08-122-004-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.035', '0063621656', 'Farras Hannan ', 'Nonda Muldani', 'Atin Jeny Rupiatni', 'Pegawai Swasta', 'Pegawai Swasta ', 'S2', 'S1', 'L', '3272021002060001', 'Sukabumi, 10 Februari 2006', '0816 4633 388', 'SD Islam Fathia ', 'Perum Taman Asri B10 No.2 Rt.05/14 Kel. Subangjaya Kec. Cikole Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903966', 'DN-02 Dd 08121029', '1-18-02-08-121-029-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.036', '0063805420', 'Farrel Alfathly Santosa ', 'Bayu Santosa', 'Teni Marliani', 'Wiraswasta ', 'PNS', 'S1', 'S1', 'L', '3272040908060001', 'Bandung, 09 Agustus 2006', '0813 1119 6977', 'SD IT Adzkia 2', 'Perum Genting Puri Jl. Maros Blok C2 No.6 Rt.05/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', NULL, NULL, NULL, 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.037', '0044755603', 'Fathul Ilmi Ahsanul Ihsan ', 'Syaiful Bahri', 'Siti Arafah', 'Pegawai Swasta', NULL, 'S1', NULL, 'L', NULL, 'Jakarta, 18 September 2004', '0858 9550 0499', 'SDN Jatinegara 06, Jakarta', 'Jl. Pajajaran No.125 Rt.15/04 Desa Babakan Kec. Cisaat Kab. Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-01 Dd/06 0117307', 'DN-01 Dd 0061016', '1-18-01-05-262-014-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.039', '0051792545', 'Fauzan Nafizha Ahmad ', 'Fredi Ahmad Muharam', 'Tati Haryati', 'PNS', 'Pegawai Swasta ', 'S2', 'Diploma ', 'L', '3272020110050001', 'Bandung, 01 Oktober 2005', '0812 2443 141', 'SDN Dewi Sartika CBM ', 'Perum Taman Asri Blok B9 No.11 Rt.03/14 Kel. Subangjaya Kec. Cikole Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337278', 'DN-02 Dd 08019070', '1-18-02-08-019-070-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.040', '0064090221', 'Fierriziq Hanafi', 'Raden Parkos', 'Riska Kristine', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3272032802060001', 'Sukabumi, 28 Februari 2006', '0858 6183 3864', 'SD IT Adzkia 1', 'Perum Gading Kencana Blok B/VIII Rt.07/15 Kel. Karang Tengah Kec. Gunungpuyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2702948', 'DN-02 Dd 24149108', '1-18-02-24-149-108-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.041', '0057110195', 'Ghaly Thifaldi Nathanala', 'Rusliadi Suandi', 'Yayu Rahayu', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'L', '3272022211050001', 'Bandung, 22 November 2005', '0813 8501 0600', 'SD Islam Al-Azhar 7 ', 'Jl. Sriwedari Mega Residence No. B19 Kel. Sriwedari Kec. Gunung Puyuh Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900545', 'DN-02 Dd 08028049', '1-18-02-08-028-049-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.042', '0054121433', 'Haidar Ryan Mustafa ', 'Achmad Saepudin', 'Nonoy Novalia', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'L', '3203050407050002', 'Sukabumi, 04 Juli 2005', '0858 7201 2185', 'SDN Karang Tengah ', 'Perum Gading Regency Blok D2 No.12 Rt.10/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900153', 'DN-02 Dd 08013030', '1-18-02-08-013-030-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.043', '0061707848', 'Haikal Fatza Alifi', 'Ade Hidayat', 'Adita Indah Pratiwi', 'POLRI ', 'PNS', 'S1', 'Diploma ', 'L', '3272013007060002', 'Sukabumi, 30 Juli 2006', '0857 2135 0002', 'SDN Gunungpuyuh CBM ', 'Jl. Karamat Rt.04/05 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337180', 'DN-02 Dd 08001045', '1-18-02-08-001-045-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.044', '0051573403', 'Haura Zahra', 'Gandi Lesmana, M.Si', 'Wahyuningsih', 'PNS', 'PNS', 'S2', 'S1', 'P', '3272024911050041', 'Sukabumi, 09 November 2005', '0857 5988 5175', 'SDN Dewi Sartika CBM ', 'Jl. Bhayangkara Gg. Merak No.7 Rt.02/03 Kel. Gunungpuyuh Kec. Gunungpuyuh Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337302', 'DN-02 Dd 08019095', '1-18-02-08-019-095-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.045', '0063555000', 'Herliandra Muhamad Nasywa', 'Herman Suherman', 'Hesti Trestiawati', 'Wiraswasta ', 'PNS', 'SMA', 'S1', 'L', '3272031810060002', 'Sukabumi, 18 Oktober 2006', '0812 1398 3717', 'SD IT Adzkia 2', 'Jl. Pelda Suryanta No.92 Rt.03/11 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903862', 'DN-02 Dd 08120040', '1-18-02-08-120-040-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.046', '0061905402', 'Hilmi Zain Muhtadhi ', 'Yana Duyana, S.Pd.,M.Si', 'Sri Yumiarti, S.Pd', 'PNS', 'Ibu Rumah Tangga', 'S1', 'S1', 'L', '3272071301060001', 'Garut, 13 Januari 2006', '0815 6089 122', 'SDN Baros Kencana CBM ', 'Jl.Cibuntu No.11 Rt.01/01 Kel.Sindangpalay Kec.Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337787', 'DN-02 Dd 08090015', '1-18-02-08-090-015-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.047', '0066264771', 'Humaira Fathisa ', 'Hendra Deswandi', 'Novarida Mustikawati', 'PNS ', 'PNS ', 'S2', 'S2', 'P', '3272314708060004', 'Bandung, 31 Agustus 2006', '081 1110 2712', 'SD Islam Fathia ', 'Komplek Pesona Cibeureum S-5 Pasir Halang Kec. Sukaraja Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903939', 'DN-02 Dd 08121002', '1-18-02-08-121-002-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.048', '0056851620', 'Iqbal Defli Maulana', 'Edi Susanto', 'Ani Mufliha', 'PNS', 'Ibu Rumah Tangga', 'Diploma ', 'SMA', 'L', '3204441907050002', 'Bandung, 19 Juli 2005', '0813 2008 0268', 'SDN Dewi Sartika CBM ', 'Jl. Siliwangi Gg. Mutholib No. 24 Rt.02/03 Kel. Cikole Kec. Cikole Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337281', 'DN-02 Dd 08019073', '1-18-02-08-019-073-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.049', '0058473945', 'Isnaya Ariana Septian ', 'H. Denda Riana', 'Hj. Dede Surtini', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'SMA ', 'S1', 'P', '3202324709060002', 'Sukabumi, 07 September 2006', '0856 5909 6497', 'SD Islam Al-Azhar 7 ', 'Jl. Selabintana Kp. Panjalu Rt.13/03 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900530', 'DN-02 Dd 08028034', '1-18-02-08-028-034-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.050', '0062823298', 'Isti\'adzah Billahilhaqq', 'Tugino Suprayitno', 'Ai Atikah', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'P', '3202325609060002', 'Sukabumi, 16 September 2006', '0857 2064 3304', 'SDN Suryakencana CBM ', 'Jl. Selabintana Kp. Selaawi III Rt.20/05 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337424', 'DN-02 Dd 08020096', '1-18-02-08-020-096-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.051', '0064707083', 'Jihan Azzahra Firmansyah ', 'Firmansyah Saepudin', 'Joeliana Eli Azar', 'Pegawai Swasta', 'Pegawai Swasta ', 'SMA ', 'SMA ', 'P', '3272074110060901', 'Sukabumi, 01 Oktober 2006', '0857 2095 6808', 'SDN Dewi Sartika CBM ', 'Perum Cisuda Permai No.51 Rt.04/01 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337305', 'DN-02 Dd 08019098', '1-18-02-08-019-098-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.052', '0061776822', 'Jilan Nasywaa Firmansyah ', 'Firmansyah Saepudin', 'Joeliana Eli Azar', 'Pegawai Swasta', 'Pegawai Swasta ', 'SMA ', 'SMA ', 'P', '3272074110060900', 'Sukabumi, 01 Oktober 2006', '0857 2095 6808', 'SDN Dewi Sartika CBM ', 'Perum Cisuda Permai No.51 Rt.04/01 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337306', 'DN-02 Dd 08019099', '1-18-02-08-019-099-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.053', '0058651672', 'Kahla Khalishah ', 'Danny Ramdhani', 'Lisa Saraswati Roseno', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3272025312050021', 'Sukabumi, 13 Desember 2005', '0858 6345 8963', 'SD IT Adzkia 1', 'Jl. Babakan Jampang Rt.02/11 Kel. Cisarua Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', NULL, NULL, NULL, 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.054', '0069557704', 'Kanaya Nakisha Putri Azzahra', 'Muhammad Azzam', 'Herawati', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3202355804060001', 'Sukabumi, 18 April 2006', '0857 9595 3674', 'SD Islam Fathia ', 'JL. Tugu Sukaraja Cibeureum Rt.06/02 Desa Tegalpanjang Kec. Cireunghas Kab. Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903941', 'DN-02 Dd 08121004', '1-18-02-08-121-004-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.055', '0061037605', 'Khairunnisa Salwa Novariani', 'Hendra Suhendar', 'Rina Ariani', 'Wiraswasta ', 'Pegawai BUMN ', 'S1', 'S1', 'P', '3272034611060902', 'Sukabumi, 06 November 2006', '0857 9313 7241', 'SD Islam Al-Azhar 7 ', 'Jl. Letda T Asmita No.43B Rt.01/06 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900532', 'DN-02 Dd 08028036', '1-18-02-08-028-036-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.056', '0053274504', 'Khalid Ahmad Nashrulloh ', 'Dinul Atiq', 'Wiwik Widyastuti', 'Pegawai Swasta', 'Dokter', 'S1', 'S1', 'L', '3272061911050901', 'Madiun, 19 November 2005', '0857 2494 7960', 'SD IT Adzkia 2', 'Bumi Purnawira Asri Blok J/20 Rt.01/05 Kel. Cipanengah Kec. Lembur Situ Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903832', 'DN-02 Dd 08120010', '1-18-02-08-120-010-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.058', '0066774067', 'Latisa Jannie Almayra', 'Restu Hermawan', 'Renny Susilowati', 'Pegawai Swasta', 'Pegawai Swasta ', 'SMA ', 'SMA ', 'P', '3272016101060899', 'Sukabumi, 21 Januari 2006', '0877 2096 6711', 'SDN Gunungpuyuh CBM ', 'Perum Panggon Mas Jl. Mawar No.11 Rt.03/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337182', 'DN-02 Dd 08001047', '1-18-02-08-001-047-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.059', '0061000361', 'Leon Al-Gozali ', 'Arip Gojali', 'Yuliawati', 'Wiraswasta ', 'Wiraswasta ', 'Diploma ', 'Diploma ', 'L', '3272063001060001', 'Sukabumi, 30 Januari 2006', '0856 2495 1371', 'SDN Dewi Sartika CBM ', 'Perum Purnawira Asri Blok K 21  Cipanengah Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337282', 'DN-02 Dd 08019074', '1-18-02-08-019-074-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.060', '0073398660', 'Luthfiyyah Lasminingrum ', 'Lala Raspatala, SP', 'Hj. Eulis Kuswaty', 'Wiraswasta ', 'Wiraswasta ', 'S1', 'Diploma ', 'P', '3202334803070002', 'Sukabumi, 08 Maret 2007', '0815 4632 107', 'SD IT Adzkia 2', 'Jl. Parkit No.30 B Cimahpar II Rt.02/11 Desa Pasir Halang Kec. Sukaraja Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 2903865', 'DN-02 Dd 08120043', '1-18-02-08-120-043-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.061', '0061253719', 'M. Fahmi Rasyid Abqori', 'Zaenal Arifin', 'Rohati', 'Pegawai Swasta', 'Pegawai Swasta ', 'S2', 'S1', 'L', '3272012409060001', 'Sukabumi, 24 September 2006', '0857 9434 9323', 'MI Negeri Kota Sukabumi ', 'Jl. Bhayangkara Gg. Merak No.08 Rt.03/03 Kel. Gunungpuyuh Kec. Gunungpuyuh Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'MI-13 100016353', 'DN-02 Dd 08322034', '1-18-02-08-322-034-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.062', '0055716120', 'M. Ilyas Ardiansyah ', 'Mami Ardian', 'Eva Ladia', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMP', 'SMA', 'L', '3202321504050001', 'Sukabumi, 15 April 2005', '0858 6346 7455', 'MI Bojong Duren ', 'Kp. Bojong Duren Rt.03/02 Desa Parungseah Kec. Sukabumi Kab. Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'MI-13 100086385', 'DN-02 Dd 45307015', '1-18-02-45-307-015-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.064', '0064197162', 'M.Caesar Rayvha Ul Haque', 'Ikram Ul Haque', 'Rini Mustikawati', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'L', '3202352102060001', 'Sukabumi, 21 Februari 2006', '0858 4623 4286', 'SD Islam Fathia ', 'Perum Sukaraja Indah Regency Blok B 13 Sukaraja Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903942', 'DN-02 Dd 08121005', '1-18-02-08-121-005-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.065', '0062293542', 'Maitsaa Fauziyyah Ali', 'Asep Ali Nurdin', 'Tati Rosidah', 'Pegawai Swasta', 'PNS', 'S1', 'Diploma ', 'P', '3202304707090001', 'Sukabumi, 07 Juli 2006', '0857 9356 3226', 'SDN I Cipetir ', 'Kp. Cijarian Panday Rt.15/05 Desa Cipetir Kec. Kadudampit Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2704072', 'DN-02 Dd 24174053', '1-18-02-24-174-053-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.066', '0066505796', 'Marsya Ananda Firmansyah ', 'Donny Firmansyah', 'Rima Hasyanah', 'PNS', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3272025906060042', 'Sukabumi, 19 Juni 2006', '0856 5941 6226', 'SDN Suryakencana CBM ', 'Gg. Cipelang Leutik Rt.02/02 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', NULL, NULL, NULL, 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.067', '0061843617', 'Mega Ayu Balqis ', 'Encep Rahman', 'Aat Yuniarti', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMP ', 'S1', 'P', '3272036304060021', 'Sukabumi, 23 April 2006', '0858 6336 6894', 'SD Aisyiyah ', 'Jl. Pelabuhan II Gg. Sejahtera II No.12 Rt. 04 Rw. 07 Kel. Cikondang Kec. Citamiang Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2902124', 'DN-02 Dd 08122033', '1-18-02-08-122-033-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.068', '0068600598', 'Melva Zahra Juniar ', 'Aris Rismansyah', 'Rina Rusmiati', 'PNS', 'PNS', 'S1', 'S1', 'P', '3272016206060002', 'Sukabumi, 22 Juni 2006', '0858 4641 8328', 'SDN Gunungpuyuh CBM ', 'Jl. Gotong Royong Tegal Pari Rt.02/11 Kel. Gunung Puyuh Kec. Gunungpuyuh Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337155', 'DN-02 Dd 08001020', '1-18-02-08-001-020-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.069', '0068119476', 'Mihaduddin Sukatma ', 'Toni Faisal', 'Elva Susanti Yuliawati', 'PNS', 'Wiraswasta ', 'S1', 'S1', 'L', '3202302004060001', 'Sukabumi, 20 April 2006', '0858 6177 4063', 'MI MWB Jalancagak', 'Kp. Kadudampit Rt.12/03 Desa/Kec. Kadudampit Kab. Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'MI-13 100087606', 'DN-02 Dd 45341057', '1-18-02-45-341-057-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.070', '0051253898', 'Mirza Nazwa Attahira ', 'Suhikmat', 'Neneng Ahriani', 'PNS', 'PNS', 'S1', 'S1', 'P', '3272017011030001', 'Sukabumi, 30 November 2005', '0858 6425 0222', 'SDN Gunungpuyuh CBM ', 'Jl. Bhineka Karya No.34 Rt.02/06 Kel.Karamat Kec.Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337184', 'DN-02 Dd 08001049', '1-18-02-08-001-049-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.071', '0055537481', 'Moch. Akram Ziyad ', 'Harry Khairul Falah', 'Lika Kartika', 'Wiraswasta ', 'Wiraswasta ', 'Diploma ', 'Diploma ', 'L', '3202323012050002', 'Sukabumi, 30 Desember 2005', '0857 9883 7464', 'SDN Selabintana 2', 'Jl. Selabintana Kp. Selaawi Rt.14/06 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2697390', 'DN-02 Dd 24003010', '1-18-02-24-003-010-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.072', '0065188335', 'Moch. Nabil Fawaz Homusi', 'M. Soewan Homusi', 'Eva Intan Rianti Saputra', 'Pegawai Swasta', 'Pegawai Swasta', 'SMA', 'SMA', 'L', '3272013103060001', 'Sukabumi, 31 Maret 2006', '0856 2428 5258', 'SDN Sriwidari 1', 'Perum Gading Kencana Asri Blok G2 No.6 Rt.09/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2899829', 'DN-02 Dd 08003015', '1-18-02-08-003-015-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.073', '0064039309', 'Moch Radhit Julian Randito ', 'Rukminto Adhi', 'Rani Lia Mulyani', 'PNS', 'Ibu Rumah Tangga', 'Diploma ', 'SMA', 'L', '3202010907060001', 'Sukabumi, 09 Juli 2006', '0858 7126 9023', 'SDN Karang Tengah ', 'Perum Asyifa Blok K No.5 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2900144', 'DN-02 Dd 08013021', '1-18-02-08-013-021-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.074', '0068708631', 'Mochamad Haikal Rizky Muzaky', 'Toha Rianto', 'Endang Wahyuningsih', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272010811050002', 'Bandung, 08 November 2005', '0813 1130 0882', 'SDN Suryakencana CBM ', 'Jl. Ciaul Pasir Griya Sukabumi Rt.04/12 Kel. Cisarua Kec. Cikole Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337450', 'DN-02 Dd 08020127', '1-18-02-08-020-127-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.075', '0051589172', 'Mochamad Zaki', 'Taji Sutaji', 'Sri Susilo Widiantini S', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3202110108050003', 'Sukabumi, 01 Agustus 2005', '0813 8954 4468', 'SDN 1 Karang Tengah ', 'Kp. Kaum Kaler Rt.02/01 Kel. Karangtengah Kec. Cibadak Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2705017', 'DN-02 Dd 24197067', '1-18-02-24-197-067-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.076', '0065202110', 'Mochammad Reno Armada Bagastara', 'Muchlis Suntana', 'Sulastri Mauretna', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3272021407060001', 'Sukabumi, 14 Juli 2006', '0852 1741 0556', 'SD Islam Al-Azhar 7 ', 'Jl. Aminta Azmali Kp. Kuta Rt.06/10 Kel. Sriwidari Kec. Gunungpuyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2900534', 'DN-02 Dd 08028038', '1-18-02-08-028-038-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.077', '0065770849', 'Moh.Fardan Ridho', 'Dace Iswandi ', 'Lina Parlina ', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'L', '3272011710060001', 'Sukabumi, 17 Oktober 2006', '0812 1088 9550', 'SDN Karang Tengah ', 'Jl. Karamat Pasir Pogor Rt.03/08 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900145', 'DN-02 Dd 08013022', '1-18-02-08-013-022-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.078', '0058608817', 'Mohamad Ibnu Nizar Husaini', 'Har Akbar', 'Yuyu Yulianingsih', 'Pegawai Swasta', 'PNS', 'S2', 'S1', 'L', '3272023112050001', 'Sukabumi, 31 Desember 2005', '0812 8818 6957', 'SDN Dewi Sartika CBM ', 'Jl.Suryakencana Gg. Karimin No.14 Rt.04/08 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337220', 'DN-02 Dd 08019012', '1-18-02-08-019-012-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.079', '0064346264', 'Mohammad Zufar Mardiansyah', 'Dian Mardiana', 'Mia Mayasari', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'Diploma ', 'SMA ', 'L', '3272020906060001', 'Sukabumi, 09 Juni 2006', '0856 2439 7917', 'SDN Sriwidari 1', 'Jl. Merbabu Rt.10/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2899832', 'DN-02 Dd 08003018', '1-18-02-08-002-018-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.080', '0061126068', 'Muhamad Akhmal Renstrana', 'Ade Suryaman', 'Erni', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272032901060001', 'Sukabumi, 29 Januari 2006', '0815 6334 1260', 'SDN Suryakencana CBM ', 'PCP I Jl. Anak Krakatau Blok A4 No.7 Rt.03/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337471', 'DN-02 Dd 08020128', '1-18-02-08-020-128-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.081', '0065557593', 'Muhamad Alvin Anggara Rohmatulloh ', 'Yudi Efendi', 'Inis Hikmatini', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272011104060001', 'Sukabumi, 11 April 2006', '0853 1361 4410', 'SD IT Adzkia 1', 'Perum Gading Kencana Asri No.5 Rt.06/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2702982', 'DN-02 Dd 24149142', '1-18-02-24-149-142-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.082', '0069750035', 'Muhamad Cahya Agus Setiawan', 'Yeyeh Sumarna', 'Cucu Nurhayati', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SD', 'SMA ', 'L', '3202322908060003', 'Sukabumi, 29 Agustus 2006', '0813 8245 3761', 'SDN Cimanggah 1', 'Jl. Selabintana Kp. Panjalu Rt.13/03 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2900340', 'DN-02 Dd 08021021', '1-18-02-08-021-021-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.083', '0063893258', 'Muhamad Febra Ayuditama', 'Asep Yudi', 'Mila Falami', 'PNS', 'PNS', 'S1', 'S2', 'L', '3272010802060001', 'Jakarta, 08 Februari 2006', '0856 7080 059', 'SDN Suryakencana CBM ', 'Perum Gading Kencana Asri No. 14 Rt.09/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337464', 'DN-02 Dd 08020129', '1-18-02-08-020-129-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.084', '0066257375', 'Muhamnad Gidzane Mustofa ', 'Teguh Mustofa Rosid', 'Neng Rika Susanti', 'Wiraswasta ', 'PNS', 'S1', 'S2', 'L', '3272010612060001', 'Sukabumi, 06 Desember 2006', '0838 2801 123', 'SDN 1 Nanggeleng ', 'Jl. Pasir Makmur No. IA Rt.01/08 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2901401', 'DN-02 Dd 08048015', '1-18-02-08-048-015-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.085', '0059221021', 'Muhamad Ramadhan Hermawan', 'Yudi Hermawan', 'Irma Rosmayanti', 'Pegawai BUMN ', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3272070510050001', 'Sukabumi, 05 Oktober 2005', '0812 9650 6990', 'SDN Cibeureumhilir 5 ', 'PCP I Blok II No.07 Rt.02/11 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2903327', 'DN-02 Dd 08098020', '1-18-02-08-098-020-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.086', '0069852654', 'Muhamad Randi Ramadan ', 'Imam Hasanudin', 'Hanifah', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA', 'L', '3272042610060004', 'Sukabumi, 26 Oktober 2006', '0815 6344 4616', 'SDN Dayeuh Luhur CBM ', 'Jl. Pabuaran Rt.04/06 Kel. Dayeuhluhur Kec. Warudoyong Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337720', 'DN-02 Dd 08079024', '1-18-02-08-079-024-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.087', '0063467358', 'Muhammad Adirajasa Gumilar', 'Ade Gumilar', 'Elin Herlina', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272061805060001', 'Ciamis, 18 Mei 2006', '0812 8061 2789', 'SD Islam Fathia ', 'Jl. Pelabuhan II KM.6 No.7 Rt.03/01 Kel. Lembursitu Kec. Lembur Situ Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903971', 'DN-02 Dd 08121034', '1-18-02-08-121-034-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.088', '0068376620', 'Muhammad Ahfigas Haq', 'H. Ahdar Suhana', 'Hj. Devi Yulianti', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA', 'L', '3202332606060001', 'Sukabumi, 26 Juni 2006', '0858 6329 3335', 'SDN Suryakencana CBM ', 'Jl. Goalpara Cisarua No.1195 Rt.04/04 Desa Cisarua Kec.Sukaraja Kab. Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337452', 'DN-02 Dd 08020130', '1-18-02-08-020-130-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.089', '0054170541', 'Muhammad Amsar Faizal ', 'Faizal Hariyadi', 'Hetty Hermiati', NULL, 'Ibu Rumah Tangga', 'SMA', 'SMA', 'L', '3272011411050900', 'Jakarta, 14 November 2005', '0821 1221 9883', 'SD Islam Al-Azhar 7 ', 'Jl. Sriwidari No.113/89 Rt.04/02 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900548', 'DN-02 Dd 08028052', '1-18-02-08-028-052-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.090', '0067627009', 'Muhammad Arya Nabil', 'Mohamad Rusmana', 'Gina Yulviana Aditia', 'PNS', 'Honorer', 'SMA ', 'S1', 'L', '3272012103060001', 'Sukabumi, 21 Maret 2006', '0857 9399 0901', 'SDN Lembursitu', 'Perum Gading Regency Blok D No.16 Rt.10/15 Kel. Karangtengah Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900309', 'DN-02 Dd 08018024', '1-18-02-08-018-024-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.091', '0065410175', 'Muhammad Fajar Taufik Sa\'id', 'Edi Sopiandi', 'Lindawati', 'PNS', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'L', '3272011902060001', 'Sukabumi, 19 Februari 2006', '0858 6049 5328', 'SDN Suryakencana CBM ', 'Jl. Kopeng Kaler Rt.03/07 Kel. Karamat Kec.Gunungpuyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337436', 'DN-02 Dd 08020108', '1-18-02-08-020-108-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.092', '0062853019', 'Muhammad Fajrillah', 'Oping', 'Iis Kasnawati', 'Pegawai BUMN ', 'Ibu Rumah Tangga', 'SMA ', 'SMP ', 'L', '3202321805060001', 'Sukabumi, 18 Mei 2006', '0858 6315 9943', 'SDN Cimanggah 1', 'Jl. Selabintana Kp. Panjalu Rt.13/03 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '8', '2021', 'Aktif', 'DN-02 Dd/06 2900345', 'DN-02 Dd 08021026', '1-18-02-08-021-026-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.093', '0069342580', 'Muhammad Gavin Al-Faiz ', 'Jaka Subagja', 'Yussi Rahmawati', 'Pegawai BUMN ', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'L', '3272071003060002', 'Sukabumi, 10 Maret 2006', '0895 0546 5712', 'SD IT Adzkia 2', 'Perum Genting Puri Jl. Maros C-2 No.7 Rt.05/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903836', 'DN-02 Dd 08120014', '1-18-02-08-120-014-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.094', '0063718762', 'Muhammad Ghyfari Ramadhan ', 'Hendra', 'Nila Irawati', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'L', '3272010510060021', 'Sukabumi, 05 Oktober 2006', '0813 8556 1667', 'SDN Sriwidari 1', 'Jl. Karamat Rt.05/04 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '4', '2021', 'Aktif', 'DN-02 Dd/06 2899835', 'DN-02 Dd 08003021', '1-18-02-08-003-021-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.095', '0066831641', 'Muhammad Giri Damaraga', 'Arif Budiman', 'Rindawati', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3272022507060001', 'Sukabumi, 25 Juli 2006', '0812 1934 5671', 'SD Islam Al-Azhar 7 ', 'Jl. RA Kosasih No.124 Rt.02/02 Kel. Subangjaya Kec. Cikole Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900511', 'DN-02 Dd 08028015', '1-18-02-08-028-015-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.097', '0054674259', 'Muhammad Kholqi Fadhillah Kartadiredja', 'Mohammad Achjar Kartadiredja', 'Lia Nurlaela', 'Pensiunan ', 'PNS', 'S1', 'S2', 'L', '3272062909050002', 'Sukabumi, 29 September 2005', '0815 6321  0405', 'SD Islam Al-Azhar 7 ', 'Bumi Purnawira Asri Blok I No.10 Rt. 01/05 Kel. Cipanengah Kec. Lembursitu Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 2900549', 'DN-02 Dd 08028053', '1-18-02-08-028-053-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.098', '0061112969', 'Muhammad Maulana Subagja ', 'Yuyus Yustriana', 'Deys Ika Padmawati', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3202270905060002', 'Sukabumi, 09 Mei 2006', '0815 6336 9077', 'SDN 1 Limusnunggal ', 'Jl. Cibungur Rt.01/01 Kel. Limus Nunggal Kec. Cibeureum Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903781', 'DN-02 Dd 08108020', '1-18-02-08-108-020-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.099', '0058184560', 'Muhammad Najma Aulia Azzakka', 'Dindin Amedin', 'Dewi Apriyani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'S1', 'L', '3202331811050003', 'Sukabumi, 18 November 2005', '0823 1199 9887', 'SD IT Adzkia 2', 'Pesona Cibeureum Permai Jasmine M 05 Rt.02/24 Sukaraja Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903838', 'DN-02 Dd 08120016', '1-18-02-08-120-016-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.100', '0055113991', 'Muhammad Naufal Rajab ', 'Ripan Sophian', 'Desti Silvia Ningrum', 'PNS', 'Ibu Rumah Tangga', 'S1', 'S1', 'L', '3272030708050002', 'Sukabumi, 07 Agustus 2005', '081 662 9766', 'SD Aisyiyah ', 'Jl. Pelabuhan II No.19 RT.01/02 Kel. Cikondang Kec. Citamiang Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2902105', 'DN-02 Dd 08122014', '1-18-02-08-122-014-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.101', '0062608404', 'Muhammad Nuur Fauzi ', 'Ir.H. Heri Hendriawan', 'R.Hj. Rani Setiani, SE.,MM', 'Pegawai Swasta', 'PNS', 'S1', 'S2', 'L', '3272071311060001', 'Sukabumi, 13 November 2006', '0857 2327 6629', 'SDN Suryakencana CBM ', 'PCP I Blok F No.1/2 Kec. Cibeureum Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337479', 'DN-02 Dd 08020136', '1-18-02-08-020-136-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.102', '0062289963', 'Muhammad Raffa Adityaputra', 'Moh. Rifki, S.E', 'Dewi Anggraesti', 'PNS', 'Pegawai Swasta ', 'S2', 'SMA ', 'L', '3272011806060001', 'Sukabumi, 18 Juni 2006', '0857 2415 1360', 'SDN Suryakencana CBM ', 'Jl. Cipelang Leutik Rt.03/01 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337456', 'DN-02 Dd 08020137', '1-18-02-08-020-137-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.103', '0064233576', 'Muhammad Randika ', 'Saripudin', 'Ani Mutoharoh', 'Wiraswasta ', 'Pegawai Swasta ', 'SD ', 'S1', 'L', '3272031101060021', 'Sukabumi, 11 Januari 2006', '0857 2026 9820', 'SDN Cijangkar 1', 'Jl. Otista Rt.03/10 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2901229', 'DN-02 Dd 08044039', '1-18-02-08-044-039-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.104', '0056089319', 'Muhammad Reinald Maulana ', 'Asep Maulana', 'Hana Utami', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'L', '3272072012050002', 'Sukabumi, 20 Desember 2005', '0857 2320 3266', 'SD IT Adzkia 2', 'PCP II Jl. Matahari No.13 Rt.07/09 Kel. Babakan Kec. Cibeureum Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903922', 'DN-02 Dd 08120100', '1-18-02-08-120-100-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.105', '0061577969', 'Muhammad Ridho Ilahirizki', 'Eko Novianda Susanto', 'Ila Karmila', 'PNS ', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'L', '3273101302060001', 'Sukabumi, 13 Februari 2006', '0813 1377 6210', 'SDN 039 Tegallega Bandung', 'Aspol Tegallega Blok A No.23 Rt.01/07 Kel. Pelindung Hewan Kec. Astana Anyar Kota Bandung', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2784443', 'DN-02 Dd 01039051', '1-18-02-01-039-051-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL);
INSERT INTO `tb_siswa` (`nis`, `nisn`, `nama_siswa`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `jk`, `nik`, `ttl`, `no_telepon`, `asal_sekolah`, `alamat_lengkap`, `kelas`, `agama`, `status_dlm_keluarga`, `anak_ke`, `tahun_masuk`, `status_siswa`, `no_seri_ijazah`, `no_seri_skhun`, `no_peserta_un`, `foto_siswa`, `keterangan`, `dibuat_pada`, `diupdate_pada`) VALUES
('1819.07.106', '0053176926', 'Muhammad Sulthan Rasikh Priyadi', 'Dr. Arief Priyadi', 'Dr. Kote Noordhianta', 'PNS', 'PNS', 'S2', 'S2', 'L', '3273100512050003', 'Bandung, 05 Desember 2005', '0812 2368 196', 'SDN CBM Dewi Sartika ', 'Pesona Cibeureum Permai, Chrysant B-6 Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337309', 'DN-02 Dd 08019102', '1-18-02-08-019-102-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.107', '0059621658', 'Nabila Azzahra ', 'Ujang Ahmad Sobandi', 'Leni Mardiana', 'PNS', 'PNS', 'S2', 'S2', 'P', '3272044706050002', 'Surabaya, 07 Juni 2005', '0813 2148 5585', 'SD Islam Al-Azhar 7 ', 'Jl. Cemerlang Kp. Tegal Wangi Rt.04/02 Kel. Sukakarya Kec. Warudoyong Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900550', 'DN-02 Dd 08028054', '1-18-02-08-028-054-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.108', '0067037109', 'Nadhilah Azfa Khairina', 'Rachmat Djumadi Salleng', 'Yenti Rokhmulyenti', 'Wiraswasta ', 'PNS ', 'S1', 'S1', 'P', '3272026608060899', 'Sukabumi, 29 Agustus 2006', '0857 2145 6966', 'SD IT Adzkia 2', 'Jl. Siliwangi Gg. H. Muhtar No.7 Rt.01/07 Kel. Kebonjati Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903871', 'DN-02 Dd 08120049', '1-18-02-08-120-049-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.109', '0065880268', 'Nadia Aulia Fabiani ', 'Eka Kelana', 'Yanti Jumiati', 'Wiraswasta ', 'Pegawai BUMN ', 'S1', 'S1', 'P', '3272045007060001', 'Sukabumi, 10 Juli 2006', '0857 9800 3939', 'SDN Dewi Sartika CBM ', 'Jl. Taman Bahagia No.14 Rt.05/02 Kel. Nyomplong Kec. Waudoyong Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337222', 'DN-02 Dd 08019014', '1-18-02-08-019-014-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.110', '0056694953', 'Nadwa Salfia Putri Adiwarta', 'Yayang Firman Adiwarta', 'Dewi Nuraeni', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Advokat', 'S1', 'P', '3272024207050041', 'Sukabumi, 02 Juli 2005', '0815 6390 2275', 'SDN Dewi Sartika CBM ', 'Jl. Kabandungan No.44 Rt.05/06 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337312', 'DN-02 Dd 08019105', '1-18-02-08-019-105-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.111', '0065069014', 'Naifa Qanita Khansa', 'Gatot Sugiharto', 'Fitri Suci Arlia', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'P', '3307094707060005', 'Malang, 07 Juli 2006', '0812 3376 6106', 'SDN Dewi Sartika CBM ', 'Perum Pesona Pangrango Blok AC No.9 Rt.06/12 Desa Parungseah Kec. Sukabumi Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337286', 'DN-02 Dd 08019078', '1-18-02-08-019-078-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.112', '0053673958', 'Naila Indra Davina ', 'Indra Novian', 'Mira Mutiara', 'Pegawai BUMN ', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3202336712050003', 'Sukabumi, 27 Desember 2005', '0858 6314 3838', 'SD Islam Fathia ', 'Villa Edelweiss No. B21 Rt.04/15 Sukaraja Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903947', 'DN-02 Dd 08121010 ', '1-18-02-08-121-010-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.113', '0065108643', 'Najla Fathina Aulia ', 'Dede Hermawan', 'Fitriyani Dewi', 'Wiraswasta ', 'Pegawai Swasta ', 'Diploma ', 'S1', 'P', '3272034202060004', 'Sukabumi, 02 Februari 2006', '0858 6335 5176', 'SDN Benteng 1', 'Perum Genting Puri Jl. Aceh Blok G19 Rt.02/10 Kel. Babakan Kec. Cibeureum Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2902214', 'DN-02 Dd 08068026', '1-18-02-08-068-026-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.114', '0062789650', 'Najla Nailah Nahdah ', 'Usep Bagja, S.Pd', 'Ema Rohimah, S.Pd', 'PNS', 'PNS', 'S1', 'S1', 'P', '3272076304060001', 'Sukabumi, 23 April 2006', '0815 4685 5304', 'SD IT Adzkia 2', 'Jl. Taklar Perum Genting Puri Blok E2 No.7 Rt.06/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903927', 'DN-02 Dd 08120105', '1-18-02-08-120-105-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.115', '0056117168', 'Nanda Anissa Lestari', 'Yusup Setiadi', 'Erni Andriani', 'Pegawai BUMD ', 'Wiraswasta ', 'SMA', 'SMA', 'P', '3272075012050003', 'Sukabumi, 10 Desember 2005', '0857 9705 4705', 'SD Islam Fathia ', 'PCP II Jl. Kemuning No.10 Rt.04/09 Kel. Babakan Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903977', 'DN-02 Dd 08121040', '1-18-02-08-121-040-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.116', '0065658288', 'Nasywa Alifah Nabila ', 'Alex Widjaja', 'Pilda Herlina', 'PNS ', 'PNS', 'Diploma ', 'S1', 'P', '3272026911090001', 'Sukabumi, 12 Juli 2006', '0812 8224 0000', 'SDN Dewi Sartika CBM ', 'Jl. Gudang Gg. Ridogalih No.2 Rt.01/05 Kel. Kebonjati Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337225', 'DN-02 Dd 08019017', '1-18-02-08-019-017-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.117', '0054439326', 'Nasywa Athaya ', 'Iwan Juanda (Alm)', 'Nurheti', '-', 'Pegawai Swasta', '-', 'SMA', 'P', '3202326408050002', 'Sukabumi, 24 Agustus 2005', '0858 6004 1970', 'SDN Suryakencana CBM ', 'Jl. Selabintana Kp. Cisarua Girang Rt.09/02 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337398', 'DN-02 Dd 08020070', '1-18-02-08-020-070-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.118', '0069860274', 'Naufal Bardan Winara ', 'Hilman Raffel', 'Lina Herlina', 'PNS', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'L', '3272073108060901', 'Sukabumi, 31 Agustus 2006', '0815 7333 0789', 'SD Islam Fathia ', 'PCP II Jl. Wijaya Kusuma Blok B1 No.18 Rt.09/09 Kel. Babakan Kec. Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903950', 'DN-02 Dd 08121013', '1-18-02-08-121-013-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.119', '0066445069', 'Naufal Muhammad Fadhilah ', 'Abdul Rohman', 'Ati Nursusanti', 'PNS', 'PNS', 'S1', 'S1', 'L', '3272052505060001', 'Sukabumi, 25 Mei 2006', '0858 8616 8994', 'SDN Baros Kencana CBM ', 'Jl. Akik V No.68 Perum Baros Kencana Rt.02/16 Kel. Baros Kec. Baros Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337838', 'DN-02 Dd 08090066', '1-18-02-08-090-066-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.120', '0063236457', 'Nazhira Putriwinata ', 'Budi Cucu Winata', 'Rini Kurniawati', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA', 'P', '3272045306060001', 'Sukabumi, 13 Juni 2006', '0815 7212 2284', 'SD Aisyiyah ', 'Jl. Benteng Kidul Kp.Baru Liung Tutut Rt.03/03 Kel. Dayeuhluhur Kec. Warudoyong Kota sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2902130', 'DN-02 Dd 08122039', '1-18-02-08-122-039-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.121', '0052503350', 'Nazwa Chalisya Safa Suryadi', 'Yadi Suryadi', 'Dwi Retno Dewi', 'POLRI ', 'PNS', 'S1', 'S1', 'P', '3272014211050001', 'Sukabumi, 02 November 2005', '0812 9006 1975', 'SDN Dewi Sartika CBM ', 'Komplek Setukpa Blok E No.14 Rt.02/09 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337315', 'DN-02 Dd 08019108', '1-18-02-08-019-108-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.122', '0064135612', 'Nesya Aprilia Sursan ', 'Surimansa', 'Riska Sandra', 'POLRI ', 'PNS', 'S1', 'Diploma ', 'P', '3272014304060001', 'Sukabumi, 03 April 2006', '0812 9730 036', 'SDN Sriwidari 1', 'Komplek Setukpa Jl. Aminta Azmali Trip Rt.01/13 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2899842', 'DN-02 Dd 08003028', '1-18-02-08-003-028-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.123', '0064693688', 'Nizmah Annisa Rahmah ', 'Eki Radiana Rizki', 'Yani Mulyani', 'PNS', 'Ibu Rumah Tangga', 'S2', 'S1', 'P', '3272016603060900', 'Sukabumi, 26 Maret 2006', '0858 6200 3004', 'SDN Dewi Sartika CBM ', 'Perum Panggon Mas Jl. Sedap Malam No.21 Rt.01/15 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337316', 'DN-02 Dd 08019109', '1-18-02-08-019-109-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.124', '0051663508', 'Nur Cinta Adinda ', 'M. Jeffry', 'Ratna Sari', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'P', '3272014408050002', 'Sukabumi, 04 Agustus 2005', '0858 4643 5531', 'SDN Suryakencana CBM ', 'Perum Gading Kencana Asri Jl. Soka Blok A2 No.12 Kel. Karangtengah Kec. Gunung Puyuh Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337485', 'DN-02 Dd 08020146', '1-18-02-08-020-146-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.125', '0061303541', 'Nur Naila Masrifah', 'Dani Hendarwan', 'Neng Rina Sagita', 'PNS', 'PNS', 'S1', 'S1', 'P', '3272024202060001', 'Sukabumi, 02 Februari 2006', '0858 6357 8045', 'SDN Cisarua ', 'Jl. RA Kosasih Ciaul Gg. Mahmud Rt.04/05 Kel. Cisarua Kec. Cikole Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900995', 'DN-02 Dd 08039029', '1-18-02-08-039-029-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.126', '0067125744', 'Nursyifa Fauziyyah Putri', 'Iwan Setiawan', 'Nia Puspita', 'PNS', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'P', '3272025809060900', 'Bandung, 18 September 2006', '0857 7744 4858', 'SDN Suryakencana CBM ', 'PCP I Jl. Gunung Agung Blok S No.4 Rt. 04 Rw. 12 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337438', 'DN-02 Dd 08020110', '1-18-02-08-020-110-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.127', '0058494955', 'Putri Rahmadhani', 'Tosriadi', 'Syafrieni', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA ', 'Diploma ', 'P', '3272026210050923', 'Sukabumi, 22 Oktober 2005', '0813 1145 1605', 'SDN Cikole', 'Jl. RS. Belakang Rt.05/04 Kel. Cikole Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2900491', 'DN-02 Dd 08025047', '1-18-02-08-025-047-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.128', '0056631278', 'Qonita Sai\'dah', 'Rafdi', 'Hermawati', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'P', '3272025308050021', 'Sukabumi, 13 Agustus 2005', '0858 6214 5547', 'SD Islam Al-Azhar 7 ', 'Perum Taman Asri No.14 Rt.02/14 Kel. Subangjaya Kec. Cikole Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900515', 'DN-02 Dd 08028019', '1-18-02-08-028-019-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.129', '0054972184', 'Qqy Al Fauzan ', 'Usman Setiawan', 'Mulyati Lipyanti', 'Pegawai Swasta', 'Wiraswasta ', 'S1', 'SMA', 'L', '3272031109050001', 'Sukabumi, 11 September 2005', '0819 3439 7999', 'SD Islam Al-Azhar 7 ', 'Gading Kencana Blok A6 No.13 Rt.07/15 Kel. Karang Tengah Kec. Gunung Puyuh kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900536', 'DN-02 Dd 08028040', '1-18-02-08-028-040-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.130', '0064776864', 'Radhitya Izazqi ', 'Edwar', 'Sari Riga Wati', 'PNS', 'Ibu Rumah Tangga', 'S2', NULL, 'L', '3205050906060008', 'Meulaboh, 09 Juni 2006', '0812 6927 7773', 'SD IT Adzkia 2', 'Perum Cimahpar Endah 24 No.2 Jl. Nuri Rt.03/11 Pasir Halang Sukaraja Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903902', 'DN-02 Dd 08120080', '1-18-02-08-120-080-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.131', '0062038054', 'Rafa Raissa Pramudya', 'Sunandar', 'Dede Maryani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA ', 'SMA', 'L', '3272031505060001', 'Sukabumi, 15 Mei 2006', '0858 6345 6718', 'SD Khoiru Ummah ', 'Jl. Pemuda I Gg. H. Enoh No.13 Rt.02/07 Kel. Cikondang Kec. Citamiang Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'MI-13 100015746', 'DN-02 Dd 08301018', '1-18-02-08-301-018-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.132', '0064632834', 'Rafi Muhammad Zam Zam ', 'Hendra Koswara', 'Neneng Kurniasih Ibrahim', 'Pegawai Swasta', 'Pegawai Swasta ', 'Diploma ', 'Diploma ', 'L', '3272010501060021', 'Sukabumi, 05 Januari 2006', '0815 6311 9424', 'SDN Brawijaya ', 'Jl. Bhineka Karya No.44 Rt.03/06 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2899790', 'DN-02 Dd 08002067', '1-18-02-08-002-067-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.133', '0054307399', 'Rafly Adi Bahtera Oktavo', 'Kalih Oktavo', 'Rusi Nurhayati', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'L', '3272070512050002', 'Sidoarjo, 05 Desember 2005', '0812 8095 1210', 'SD IT Adzkia 2', 'PCP I Jl. Talaga Bodas Blok C No.11 Rt.01/12 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903903', 'DN-02 Dd 08120081', '1-18-02-08-120-081-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.134', '0058301478', 'Raggat Paciano Putra Chandra ', 'H.Tejo Condro Nugroho', 'Hj. Joice Soraya Frimasari', 'PNS', 'Pegawai Swasta ', 'S2', 'S1', 'L', '3272010911050001', 'Sukabumi, 09 November 2005', '0858 6333 6667', 'SDN Dewi Sartika CBM ', 'Jl. Gotong Royong No.18 Rt.04/05 Kel. Gunung Puyuh Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337232', 'DN-02 Dd 08019024', '1-18-02-08-019-024-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.135', '0052790895', 'Rahma Annisa Salsabila', 'Edi Setiadi', 'Mimin Kurniasih', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA ', 'SMA ', 'P', '3202327011050003', 'Sukabumi, 30 November 2005', '0857 9543 7268', 'SDN Dewi Sartika CBM ', 'Kp. Selabintana Wetan Rt.13/04 Desa Sudajaya Girang Kec. Sukabumi Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '4', '2021', 'Aktif', 'DN-02 Dd/13 0337290', 'DN-02 Dd 08019082', '1-18-02-08-019-082-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.136', '0059648357', 'Raid Fadhil Syarif Vidiaksana ', 'Adi Tisna Rayadi, ST.,MT', 'Maya Syanti Dewi Amir', 'Pegawai BUM ', 'Pegawai Swasta ', 'S2', 'S2', 'L', '3175071712050003', 'Jakarta, 17 Desember 2005', '0815 8800 513', 'SD IT Adzkia 2', 'Pesona Cibeureum Blom F No.38A Rt.03/05 Sukaraja Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903876', 'DN-02 Dd 08120054', '1-18-02-08-120-054-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.137', '0065078525', 'Raihan Riyadhul Jinan ', 'Yayan Mulyana', 'Ai Rohayati', 'PNS', 'Pegawai Swasta ', 'S1', 'S1', 'L', '3202322601060005', 'Sukabumi, 26 Januari 2006', '0815 6324 8501', 'SDN Dewi Sartika CBM ', 'Kp. Babakan Situ Rt.01/04 Desa Perbawati Kec. Sukabumi Kab. Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337291', 'DN-02 Dd 08019083', '1-18-02-08-019-083-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.138', '0056422089', 'Rajendra Salhudar ', 'H. R. Imran Wardhani, M.Si', 'Andre Nurhayati', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272030310050021', 'Sukabumi, 03 Oktober 2005', '0856 2285 833', 'SD IT Adzkia 2', 'Jl. Letda T Asmita No.8 Perum BPR Rt.01/06 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903877', 'DN-02 Dd 08120055', '1-18-02-08-120-055-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.139', '0064445947', 'Rajwa Nayla  Prameswari ', 'Wishnu Eka Saputra', 'Sanny Agustina', 'PNS', 'PNS', 'S1', 'S2', 'P', '3272064306060041', 'Sukabumi, 03 Juni 2006', '0877 7833 7778', 'SD IT Adzkia 1', 'Jl. Caringin Ngumbang No.35 Rt.04/10 Kel. Benteng Kec. Warudoyong Kota sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2702991', 'DN-02 Dd 24149151', '1-18-02-24-149-151-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.140', '0051805512', 'Rasendriya Rais ', 'Gunawan Wibisana', 'Iin Indriani', 'PNS', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'L', '3202330812050002', 'Sukabumi, 08 Desember 2005', '081 822 1177', 'SD IT Adzkia 2', 'Pesona Cibeureum Permai Blok Crysant C 15 Rt.05/19 Sukaraja Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2903904', 'DN-02 Dd 08120082', '1-18-02-08-120-082-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.141', '0057847882', 'Ravindra Pramudya Swasono ', 'Sumitro Swasono', 'Nurul Baety', 'Pegawai Swasta', 'Wiraswasta ', 'S1', 'S1', 'L', '3272071909050899', 'Garut, 19 September 2005', '0812 1029 9202', 'SD Islam Fathia ', 'PCP I Jl. Tangkuban Perahu Blok N/M 4 Rt.02/12 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903955', 'DN-02 Dd 08121018', '1-18-02-08-121-018-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.142', '0063273232', 'Raysa Ayu Natasha ', 'Hadi Syahyanto', 'Desi Hadi Hastuti', 'Wiraswasta ', 'PNS', 'Diploma ', 'Diploma ', 'P', '3272074806060001', 'Sukabumi, 08 Juni 2006', '0857 2252 4499', 'SDN Dewi Sartika CBM ', 'PCP I Jl. Gunung Agung No.33 Rt.04/12 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337319', 'DN-02 Dd 08019112', '1-18-02-08-019-112-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.143', '0066992914', 'Rehan Riady Basmala ', 'Rahmat Sukandar', 'Merinda Haris', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272022310060021', 'Sukabumi, 23 Oktober 2006', '0815 6399 5663', 'SDN Dewi Sartika CBM ', 'Gg. Kaswari No.24 Rt.02/05 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337233', 'DN-02 Dd 08019025', '1-18-02-08-019-025-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.144', '0068756920', 'Reva Izzatun Qisthi Widiyanto', 'Dwi Widiyanto', 'Erna Sari', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'P', '3272076705060001', 'Sukabumi, 27 Mei 2006', '0858 4621 7199', 'SD Islam Fathia ', 'PCP I Jl. Tampomas No.7 Rt.04/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 2903979', 'DN-02 Dd 08121042', '1-18-02-08-121-042-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.145', '0058172026', 'Rizqi Jadida Manik ', 'Dr. Hasian Hamonangan Manik', 'Wagimen', 'Dokter ', 'Ibu Rumah Tangga', 'S1', 'S1', 'L', '3272071511050002', 'Depok , 15 November 2005', '0852 1495 5307', 'SD Islam Fathia ', 'PCP I Jl.Pangrango Blok C9 No.17 Rt.01/12 Kel.Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903956', 'DN-02 Dd 08121019', '1-18-02-08-121-019-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.146', '0068112639', 'Robie Sahall Fauzan', 'Lili Ade Suhaemi', 'Hilda Halidah', 'POLRI ', 'Ibu Rumah Tangga', 'S1', 'SMA', 'L', '3272010703060002', 'Kuningan, 07 Agustus 2006', '0896 5795 4732', 'SDN Dewi Sartika CBM ', 'Jl. Bhayangkara No.33 Rt.03/13 Kel. Sriwidari Kec.Gunung Puyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337236', 'DN-02 Dd 08019028', '1-18-02-08-019-028-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.147', '0059071019', 'Rosa Agustia Intan Gumilar ', 'Agus Widodo', 'Dewi Pratiwi', 'Wiraswasta ', 'PNS', 'SMA', 'S1', 'P', '3272044808050001', 'Sukabumi, 08 Agustus 2005', '0812 8437 2433', 'SDN Dayeuh Luhur CBM ', 'Jl. Pabuaran No.10 Rt. 02 Rw. 01 Kel. Nyomplong Kec. Warudoyong Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337766', 'DN-02 Dd 08079069', '1-18-02-08-079-069-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.148', '0063797350', 'Salsa Bilala Amra', 'Drs. Enjang Subia', 'Nenden Rusmiawati', 'PNS', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'P', '3272016602060021', 'Sukabumi, 26 Februari 2006', '0812 2266 3369', 'SDN Brawijaya ', 'Jl. Kopeng No.58 Rt.01/05 Kel.Karamat Kec.Gunungpuyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2899751', 'DN-02 Dd 08002028', '1-18-02-08-002-028-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.149', '0067956069', 'Salwa Ula Husna ', 'Zaenal Abidin', 'Nina Marlina', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'P', '3202014606060008', 'Sukabumi, 06 Juni 2006', '0857 2363 4845', 'SDN Dewi Sartika CBM ', 'PCP II Jl. Kasablanca Blok D2 No.12 Rt.02/09 Kel.Babakan Kec. Cibeureum Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337257', 'DN-02 Dd 08019049', '1-18-02-08-019-049-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.150', '0065394844', 'Samagaha Rizq\'aileen Anargya', 'Angga Purnama', 'Samhah Samsiah', 'Wiraswasta ', 'Wiraswasta ', 'S1', 'SMA', 'L', '3202322005060002', 'Sukabumi, 22 Mei 2006', '0858 6018 7899', 'SD IT Adzkia 1', 'Kp. Cisarua Girang Rt.04/01 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2702933', 'DN-02 Dd 24149093', '1-18-02-24-149-093-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.151', '0065334752', 'Sariska Bunga Widara ', 'Andi Warner', 'Suhestiansyah', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'P', '3272015104060041', 'Sukabumi, 11 April 2006', '0813 1732 0669', 'SDN Tanjung Sari II ', 'Perum Gading Kencana Asri Rt.05/15 Kel. Karangtengah Kec. Gunungpuyuh Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900113', 'DN-02 Dd 08012074', '1-18-02-08-012-074-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.152', '0055732085', 'Saskia Salsabila Setiawan ', 'Agus Setiawan', 'Neni Cahyani', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'SMA ', 'SMA ', 'P', '3202327012050008', 'Sukabumi, 30 Desember 2005', '0858 6325 34356', 'SDN Dewi Sartika CBM ', 'Perum Panghegar Permai Rt.04/10 Desa Pasirhalang  Kec. Sukaraja Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337324', 'DN-02 Dd 08019117', '1-18-02-08-019-117-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.153', '0064679768', 'Shafwan Rakha Pandya Sukma', 'Nanan Sukmanatalia', 'Maya Fujie Lestari', 'Analis ', 'Pegawai Swasta ', 'S1', 'S1', 'L', '3272010602060001', 'Sukabumi, 06 Februari 2006', '0815 7370 0738', 'SDN CBM Dewi Sartika ', 'Jl. Merbabu Babakan Jampang No.1 Rt.03/10 Kel. Karang Tengah Kec. Gunungpuyuh Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337325', 'DN-02 Dd 08019118', '1-18-02-08-019-118-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.154', '0066370610', 'Shana Luna Davina ', 'Fachrizal', 'Rensie Oktadiantie', 'Pegawai Swasta', 'Pegawai Swasta ', 'S1', 'S1', 'P', '3272024710060001', 'Sukabumi, 07 Oktober 2006', '0819 1198 8883', 'SD Islam Al-Azhar 7 ', 'Jl. Cijangkar Wetan Rt.01/06 Kel. Cisarua Kec. Cikole Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900558', 'DN-02 Dd 08028062', '1-18-02-08-028-062-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.155', '0068110423', 'Shidqi Ahmad Fauzi Gumilar', 'Muliayawan Gumilar', 'Susilawati', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'SMA ', 'L', '3272010702060081', 'Sukabumi, 07 Februari 2006', '0822 4692 2662', 'SDN Kopeng 2', 'Jl. Karamat No.124 Rt.01/04 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900282', 'DN-02 Dd 08017025', '1-18-02-08-017-025-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.156', '0058909124', 'Sidqi Syaidan Yusuf ', 'Supyadin', 'Djeje', 'PNS', 'Pegawai Swasta ', 'S2', 'S1', 'L', '3272072112050905', 'Sukabumi, 21 Desember 2005', '0857 2148 634', 'SDN Pakujajar CBM ', 'Kp. Baru Legok Bitung Jembatan Merah Rt.04/12 Kel. Limusnunggal Cibeureum Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337561', 'DN-02 Dd 08043025', '1-18-02-08-043-025-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.157', '0053314314', 'Siti Aisyah Amelida ', 'Lukman', 'Nani Lustiani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SD ', 'SMP ', 'P', '3202326804050003', 'Sukabumi, 28 April 2005', '0856 2426 5740', 'SDN 2 Selabintana ', 'Kp. Kalapa Condong Rt.31/09 Desa Sudajaya Girang Kec. Sukabumi Kab. Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2697478', 'DN-02 Dd 24004021', '1-18-02-24-004-021-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.158', '0061346112', 'Siti Nur Azizah Alfiani Bilqis', 'Halfi', 'Mila Nurmilawati', 'Wiraswasta ', 'Wiraswasta ', 'SMA', 'SMA', 'P', '3272045811050002', 'Sukabumi, 18 November 2005', '0813 8610 9025', 'SDN Suryakencana CBM ', 'Jl. Pelabuhan II No.190 Rt.04/03 Kel. Waudoyong Kec. Warudoyong Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0337459', 'DN-02 Dd 08020152', '1-18-02-08-020-152-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.159', '0062132156', 'Sri Inten Kusuma Dewi ', 'Drs.Aam Ammar Halim Malik, M.Si', 'Mila Permasih', 'PNS', 'PNS', 'S2', 'Diploma ', 'P', '3202336903060001', 'Bandung, 29 Maret 2006', '0815 6395 3001', 'SDN Dewi Sartika CBM ', 'Jl. Goalpara No.58 Rt.01/14 Sukaraja Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 0037260', 'DN-02 Dd 08019052', '1-18-02-08-019-052-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.160', '0067974718', 'Sultan Muhammad Syakir ', 'Hilman Taufik', 'Shofia Nur Azizah', 'Pegawai BUMN ', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3217083101060004', 'Bandung, 31 Januari 2006', '0852 2120 7050', 'SD Islam Al-Azhar 7 ', 'PCP II Jl. Cendana Blok G No.3 Rt.04/09 Kel.Babakan Kec. Cibeureum Kota Sukabumi', 'VII D', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2900518', 'DN-02 Dd 08028022', '1-18-02-08-028-022-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.161', '0055957148', 'Sultan Syahbaa Nuthila Afzah ', 'Asep Wahyu Nurjaman', 'Halizah Azis', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'Diploma ', 'L', '3202320709050001', 'Sukabumi, 07 September 2005', '0858 7115 5567', 'SDN Dewi Sartika CBM ', 'Jl. Selabintana Kp. Nyangkokot No.19 Rt.03/11 Desa Perbawati Kec. Sukabumi Kab. Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/13 0337261', 'DN-02 Dd 08019053', '1-18-02-08-019-053-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.162', '0054926260', 'Sulthan Syawal Al Athallah Hadian', 'Edi Hadian', 'Lina Herlina', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'Diploma ', 'Diploma ', 'L', '3272010811050001', 'Sukabumi, 08 November 2005', '0819 1004 0913', 'SDN Brawijaya ', 'Jl. Brawijaya No.540 Rt.02/12 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/13 2899754', 'DN-02 Dd 08002031', '1-18-02-08-002-031-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.163', '0059423598', 'Surya Putra Permana ', 'Indra Permana', 'Novi Kurnia Melani', 'PNS', 'PNS', 'S1', 'Diploma ', 'L', '3272071009050899', 'Sukabumi, 10 September 2005', '0856 5953 1991', 'SDN Baros Kencana CBM ', 'Perum Sindang Palay Jl. Mangga Rt.08/07 Kel. Sindang Palay Kec. Cibeureum Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337808', 'DN-02 Dd 08090036', '1-18-02-08-090-036-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.164', '0068784916', 'Syahdan Nur Aqli ', 'Sugandi Wiria Atmaja', 'Destyurini Siregar', 'TNI AD ', 'Ibu Rumah Tangga', 'SMA', 'Diploma ', 'L', '1671101602060005', 'Palembang, 16 Februari 2006', '0896 2558 1661', 'SD Muhammadiyah 9 ', 'Jl. Parungseah Gede No.41 Rt.02/05 Desa Parungseah Kec. Sukabumi Kab. Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-11 Dd/06 1774981', 'DN-02 Dd 01295034', '01-295-034-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.165', '0059626464', 'Syahrani Putrianti Falah', 'Syamsul Falah', 'Arni Yuniarti', 'Pelayaran ', 'Ibu Rumah Tangga', 'S1', 'SMA', 'P', '3202334407050001', 'Sukabumi, 04 Juli 2005', '0815 6340 7906', 'SDN Suryakencana CBM ', 'Perum Griya Goalpara Asri No.7 Rt.04/08 Desa Cisarua Kec. Sukaraja Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337444', 'DN-02 Dd 08020116', '1-18-02-08-020-116-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.166', '0055355896', 'Syahwa Pranaya Hermawan ', 'Irvan Hermawan', 'Herni Haryani', 'Wiraswasta ', 'Ibu Rumah Tangga', 'Diploma ', 'SMA', 'P', '3202326111050002', 'Sukabumi, 21 November 2005', '0857 2316 1989', 'SDN Dewi Sartika CBM ', 'Jl. Pondok Halimun Rt.11/02 Desa Perbawati Kec. Sukabumi Kab. Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337293', 'DN-02 Dd 08019085', '1-18-02-08-019-085-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.167', '0054409070', 'Syarifah Zahra Abdurachman Isa', 'Arief Abdurachman', 'Alma Nako Isa', 'Wiraswasta ', 'Ibu Rumah Tangga', 'S1', 'S1', 'P', '3272025510050901', 'Gorontalo, 15 Oktober 2005', '0823 2053 6737', 'SDN Pintukisi ', 'Jl. RA Kosasih Gg.Limus No.16 Rt.03/02 Kel. Cisarua Kec. Cikole Kota Sukabumi', 'VII G', 'Islam ', 'Anak Kandung ', '3', '2021', 'Aktif', 'DN-02 Dd/06 2900908', 'DN-02 Dd 08037054', '1-18-02-08-037-054-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.168', '0069030949', 'Tangguh Musyaffa Azzurra', 'Azhari Mufti', 'Yossi Iksan Talib', 'PNS', 'PNS', 'S2', 'S1', 'L', '3276051107060002', 'Jakarta, 11 Juli 2006', '0878 8099 4846', 'SD Islam Fathia ', 'Puri Cibeureum I Jl. Galunggung No.15 Rt.04/10 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903958', 'DN-02 Dd 08121021', '1-18-02-08-121-021-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.169', '0063511132', 'Tantri Nabilla ', 'Drs. H. Tatang', 'Hj. Yeti Kurnaesih', 'POLRI ', 'Ibu Rumah Tangga', 'S2', 'SMA ', 'P', '3272046806060002', 'Sukabumi, 28 Juni 2006', '0813 8714 1967', 'SDN Dewi Sartika CBM ', 'Jl. Nagrak Taman Bahagia No.01 Rt.02/08 Kel. Benteng Kec. Warudoyong Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '4', '2021', 'Aktif', 'DN-02 Dd/13 0337294', 'DN-02 Dd 08019086', '1-18-02-08-019-086-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.170', '0062450122', 'Tata Ayugea Maharani ', 'Miftahul Munir, SH', 'Yesi Rahayu, S.Km', 'POLRI ', 'PNS ', 'S1', 'S1', 'P', '1771056105060001', 'Bengkulu, 21 Mei 2006', '0813 7751 1982', 'SDN 5 Kota Bengkulu ', 'Asrama Setukpa Jl. Bhayangkara 166 Blok F No.30 Rt.03/09 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-26 Dd/06 1630357', NULL, '1-18-26-01-005-106-7', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.171', '0063819617', 'Tubagus Rikat Baskara ', 'Giras Andaka', 'Ratu Mulyahati', 'Wiraswasta ', 'Pegawai Swasta', 'S1', 'S1', 'L', '3272020710060001', 'Sukabumi, 07 Oktober 2006', '0815 9966 988', 'SD Islam Fathia ', 'Perum Bukit Ciaul Indah Blok H/9 Rt.03/11 Kel. Subang Jaya Kec. Cikole Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903981', 'DN-02 Dd 08121044', '1-18-02-08-121-044-5', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.172', '0051086956', 'Widya Amalia ', 'Ruslan Permadi', 'Heni Anggraeni', 'Pegawai Swasta', 'PNS ', 'SMA ', 'SMA ', 'P', '3272015405060001', 'Sukabumi, 14 Mei 2005', '0858 6185 0552', 'SDN Babakan Karamat ', 'Jl. Kopeng Gg. Mawar II No.15A Rt.03/03 Kel. Karamat Kec. Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900039', 'DN-02 Dd 08010029', '1-18-02-08-010-029-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.173', '0061258164', 'Widya Salma Kusmana', 'Asep Kusmana', 'Linda Yulindawati', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'Diploma ', 'SMA', 'P', '3272014701060002', 'Sukabumi, 07 Januari 2006', '0858 6335 0706', 'SDN Karang Tengah ', 'Perum Assyifa Jl. KH. Abdul Aziz No. B12 Rt.08/08 Kel. Karang Tengah Kec. Gunung Puyuh Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2900171', 'DN-02 Dd 08013048', '1-18-02-08-013-048-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.174', '0061567337', 'Wildan Taufik\'kurohman ', 'H. Ma\'sum', 'Hj. Herlina', 'Wiraswasta ', 'Ibu Rumah Tangga', 'SD', 'SD ', 'L', '3272030112060001', 'Sukabumi, 01 Desember 2006', '0815 6213 719', 'SD Islam Al-Azhar 7 ', 'Jl. Pelabuhan II Cipoho Gg. Satria Rt.02/05 Kel. Cikondang Kec. Citamiang Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '4', '2021', 'Aktif', 'DN-02 Dd/06 2900561', 'DN-02 Dd 08028065', '1-18-02-08-028-065-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.175', '0064528725', 'Yasir Amry ', 'Zeni Manshur', 'Siti Asiyah', 'PNS', 'PNS', 'S2', 'Diploma ', 'L', '3272070805060021', 'Sukabumi, 09 Mei 2006', '0816 4639 237', 'SD IT Adzkia 2', 'Jl. Ciandam Sudajaya No.18 Cibeureum Hilir Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903879', 'DN-02 Dd 08120057', '1-18-02-08-120-057-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.176', '0061652204', 'Yasmin Maulida Azizah ', 'Nurkholid Aziz, S.Ag', 'Canya Tamara, SH', 'PNS', 'PNS', 'S1', 'S1', 'P', '3202335604060005', 'Sukabumi, 16 April 2006', '0858 6483 6106', 'SD Islam Fathia ', 'Jl. Raya Sukaraja No.350 Rt.01/01 Kec. Sukaraja Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903982', 'DN-02 Dd 08121045', '1-18-02-08-121-045-4', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.177', '0068340337', 'Yuski Nugraha ', 'Diki Hermawan', 'Yusiana', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'L', '3272012307060901', 'Sukabumi, 23 Juli 2006', '0813 8474 5958', 'SDN Gunungpuyuh CBM ', 'Jl. Gotong Royong Tegal Pari Rt.03/08 Kel. Gunung Puyuh Kec. Gunung Puyuh Kota Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337170', 'DN-02 Dd 08001035', '1-18-02-08-001-035-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.178', '0061511269', 'Zaneta Lu\'lu Nursyamsya ', 'Drs. Sobali Suswandy, M.Si', 'Lusi Damayanti', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'P', '3272025205060041', 'Sukabumi, 12 Mei 2006', '0815 6353 6667', 'SDN Dewi Sartika CBM ', 'Perum Genting Puri Jl. Aceh Blok G No.16 Rt.02/10 Kel. Babakan Kec. Cibeureum Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '4', '2021', 'Aktif', 'DN-02 Dd/13 0337297', 'DN-02 Dd 08019089', '1-18-02-08-019-089-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.179', '0068055489', 'Zaqy Arrayyan ', 'Dr. Neizar Alwan', 'Dhien Suryani, ST', 'PNS', 'Ibu Rumah Tangga', 'S2', 'Diploma ', 'L', '3272022801060001', 'Bandung, 28 Januari 2006', '0812 6937 8910', 'SD Islam Fathia ', 'Pesona Cibeureum Permai Blok O No.11 Rt.03/24 Sukaraja Sukabumi', 'VII B', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903983', 'DN-02 Dd 08121046', '1-18-02-08-121-046-3', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.180', '0054909115', 'Zikri Muhammad Fauzan ', 'Rachmat Mulyana', 'Ine Suandani', 'PNS', 'PNS', 'S2', 'S2', 'L', '3272031412050901', 'Sukabumi, 14 Desember 2005', '0815 6371 3377', 'SD IT Adzkia 1', 'Perum Genting Puri Baros Blok E2 No.7 Rt.03/08 Kel. Baros Kec. Baros Kota Sukabumi', 'VII C', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2702995', 'DN-02 Dd 24149155', '1-18-02-24-149-155-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.182', '0063195070', 'Vira Nurul Aulia', 'Adeng Mawardi', 'Rini Setiawati', 'Pegawai Swasta', 'Pegawai Swasta', 'SMA ', 'SMA ', 'P', '3272076908060001', 'Sukabumi, 29 Agustus 2006', '0857 2358 6897', 'SDN Selakaso ', 'Selakaso Rt.01/02 Kel. Babakan Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2903584', 'DN-02 Dd 08102031', '1-18-02-08-102-031-2', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1819.07.183', '0061457228', 'Mukhbita Ainul Yaqin', 'Sutisna', 'Ade Sopiah', 'Pegawai Swasta', 'Ibu Rumah Tangga', 'S1', 'SMA', 'P', '3272076810060901', 'Sukabumi, 28 Oktober 2006', '0812 1817 072', 'SDN Pakujajar CBM ', 'Bumi Cisuda Permai Jl. Mawar A/36 Rt.04/01 Kel. Cibeureum Hilir Kec. Cibeureum Kota Sukabumi', 'VII E', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/13 0337552', 'DN-02 Dd 08043016', '1-18-02-08-043-016-9', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1920.08.001', '0064860441', 'Najla Ghata Adriana ', 'William Salim ', 'Neal Veronica Ashar ', 'Wiraswasta ', 'Wiraswasta ', 'SMA', 'SMA', 'P', '3272034509060001', 'Sukabumi, 05 September 2006', NULL, 'MTs Assalam ', 'Jl. Pelabuhan II 168 RT 005 RW 003 Kel. Warudoyong Kec. Warudoyong Kota Sukabumi ', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2990053', 'DN-02 Dd 08028057', '1-18-02-08-028-057-8', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('1920.08.002', '0062798141', 'Daffa Satrya Bara Pratama ', 'Ganjar Saepulloh ', 'Widaningsih', 'POLRI ', 'PNS', 'Diploma ', 'S1', 'L', '3202361303060002', 'Cianjur, 13 Maret 2006', '0858 6081 0181', 'MTs Assalam ', 'Kp. Sukalarang RT 002 RW 007 Kel. Sukalarang Kec. Sukalarang Kab. Sukabumi ', 'VII A', 'Islam ', 'Anak Kandung ', '1', '2021', 'Aktif', 'DN-02 Dd/06 2699728', 'DN-02 Dd 24054009', '1-18-02-24-054-009-8', 'default.jpg', NULL, '2021-04-20 13:57:34', NULL),
('1920.08.003', '0058699881', 'Nazwa Azzahra ', 'Alex Rif\'atulloh', 'Junengsih ', 'POLRI ', 'Ibu Rumah Tangga', 'SMA', 'SMA ', 'P', '3272017012050002', 'Purwakarta, 30 Desember 2005', NULL, 'MTs Assalam ', 'Jl. Bhayangkara Gg. Titiran RT 003 RW 013 Kel. Srwidari Kecamatan Gunung Puyuh Kota Sukabumi', 'VII F', 'Islam ', 'Anak Kandung ', '2', '2021', 'Aktif', 'DN-02 Dd/06 2899841', 'DN-02 Dd 08003027', '1-18-02-08-003-027-6', 'default.jpg', NULL, '2021-04-20 13:57:35', NULL),
('312017030', '312017030', 'Ghina Miellati', NULL, NULL, NULL, NULL, NULL, NULL, 'P', '3272001212', 'Sukabumi, 11 - 06 - 1999', '085863046869', 'SDN Gunung Puyuh', 'Jl Bhayangkara Gg Karya 1 , RT03/09', 'Alumni A', 'Islam', 'Anak Kandung', '1', '2017', 'Aktif', 'Dlb - 199210 -1001', 'SK 012 - 12', '12 - 12', 'default.jpg', NULL, '2021-08-20 10:54:40', NULL),
('3121031001', '678910', 'Hibatul wafi Putra Agustiani', 'Agus kustawan', 'Rini Nuraeni', 'Pengajar', 'Ibu Rumah Tangga', 'D3', 'SMK', 'L', '3272001212', 'Sukabumi, 11 - 06 - 1999', '085863046869', 'SDN Gunung Puyuh', 'Jl Bhayangkara Gg Karya 1 , RT03/09', 'Alumni A', 'Islam', 'Anak Kandung', '1', '2017', 'Aktif', 'Dlb - 199210 -1001', 'SK 012 - 12', '12 - 12', 'hibatul-wafi-putra-agustiani-60e7c427ad510.jpeg', NULL, '2021-07-13 10:25:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_tahun`, `tahun_ajaran`, `keterangan`, `dibuat_pada`) VALUES
(1, '2019', 'Tahun Ajaran 2019 - 2020', '2021-03-19 11:43:20'),
(2, '2020', 'Tahun Ajaran 2020 - 2021', '2021-03-19 11:43:20'),
(3, '2021', 'Tahun Ajaran 2021 - 2022', '2021-04-30 09:13:10'),
(4, '2018', 'Tahun Ajaran 2018  - 2019', '2021-04-30 10:00:01'),
(8, '2022', 'Tahun Ajaran 2022 - 2023', '2021-04-30 04:36:21'),
(9, '2023', 'Tahun Ajaran 2023 - 2024', '2021-07-09 11:37:38'),
(10, '2017', 'Tahun Ajajar 2017 - 2018', '2021-07-13 10:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tb_bulan_ajaran`
--
ALTER TABLE `tb_bulan_ajaran`
  ADD PRIMARY KEY (`id_ajaran`);

--
-- Indexes for table `tb_detail_pembayaran`
--
ALTER TABLE `tb_detail_pembayaran`
  ADD PRIMARY KEY (`id_detail_pem`);

--
-- Indexes for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pem`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_biaya`
--
ALTER TABLE `tb_master_biaya`
  ADD PRIMARY KEY (`id_master_biaya`);

--
-- Indexes for table `tb_master_kas`
--
ALTER TABLE `tb_master_kas`
  ADD PRIMARY KEY (`id_mst_kas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_riwayat_kas`
--
ALTER TABLE `tb_riwayat_kas`
  ADD PRIMARY KEY (`id_riwayat_kas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_bulan_ajaran`
--
ALTER TABLE `tb_bulan_ajaran`
  MODIFY `id_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_detail_pembayaran`
--
ALTER TABLE `tb_detail_pembayaran`
  MODIFY `id_detail_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id_jenis_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_master_biaya`
--
ALTER TABLE `tb_master_biaya`
  MODIFY `id_master_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_master_kas`
--
ALTER TABLE `tb_master_kas`
  MODIFY `id_mst_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_riwayat_kas`
--
ALTER TABLE `tb_riwayat_kas`
  MODIFY `id_riwayat_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
