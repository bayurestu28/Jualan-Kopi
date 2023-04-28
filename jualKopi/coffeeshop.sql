-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 01:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `nama`, `alamat`, `tanggal_lahir`, `no_telp`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 'adminkopi', '$2y$10$X98TCWSB8lCQ88I6WY0UJeOJBJpVGnQrjjH/qbN9Vfcc5xdSmG71O', 'Admin Kopi', 'jln. Admin ,Kota Admin', '2000-11-29', '083245990099', 'laki-laki', NULL, '2020-12-05 02:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `nama`, `alamat`, `tanggal_lahir`, `no_telp`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(5, 'customer1', '$2y$10$ivSPagruNinQL', 'Diana', 'Jln. customer', '2010-10-10', '083123321221', 'perempuan', '2020-11-29 09:42:52', '2020-12-05 17:29:36'),
(8, 'bayurestu28', '$2y$10$F0XhvzfD0ZFNYiQbx1cinO6iMTwxYdLw80oJp7gmTGq2MkSAAX8BO', 'Bayu Restu Adji', 'Jalan Lekipali no.10', '2000-09-28', '085268553848', 'laki-laki', '2020-12-09 09:55:29', '2020-12-10 05:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksis`
--

CREATE TABLE `detil_transaksis` (
  `id_detil` int(10) UNSIGNED NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detil_transaksis`
--

INSERT INTO `detil_transaksis` (`id_detil`, `id_transaksi`, `id_produk`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2020-12-04 15:24:38', '2020-12-05 17:11:39'),
(7, 5, 5, 2, '2020-12-05 14:27:19', '2020-12-05 14:31:02'),
(10, 5, 4, 1, '2020-12-05 15:08:22', '2020-12-05 15:08:22'),
(11, 1, 3, 1, '2020-12-05 17:11:32', '2020-12-05 17:11:32'),
(12, 6, 2, 1, '2020-12-05 21:50:16', '2020-12-05 21:50:20'),
(14, 7, 5, 1, '2020-12-06 00:05:09', '2020-12-06 00:05:09'),
(16, 8, 5, 1, '2020-12-06 21:36:51', '2020-12-06 21:36:55'),
(17, 9, 4, 1, '2020-12-09 05:45:14', '2020-12-09 05:45:18'),
(18, 10, 2, 1, '2020-12-09 06:41:22', '2020-12-09 06:41:27'),
(19, 11, 2, 1, '2020-12-10 19:57:50', '2020-12-10 19:57:53'),
(20, 12, 5, 1, '2020-12-10 20:07:30', '2020-12-10 20:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE `kurirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kurir` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'Ready',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurirs`
--

INSERT INTO `kurirs` (`id`, `username`, `password`, `nama`, `alamat`, `tanggal_lahir`, `no_telp`, `jenis_kelamin`, `status_kurir`, `created_at`, `updated_at`) VALUES
(1, 'kurirke1', '$2y$10$GTQMb95nNt6M.576vrBOuOkTGIiuYjTXzeAbQ0HhRjsroEhJOZfC.', 'Indah', 'jln. Kurir ,Kota Kurir', '2000-12-30', '081431321221', 'perempuan', 'Ready', NULL, '2020-12-09 06:11:53'),
(2, 'kurirke2', '$2y$10$1TQLYVoDPBHVma5inT3ea.coPFauoMH2tUZn2GkVhl/PFBCY2G0c2', 'Bayu A.', 'Kota Yogyakarta', '1999-05-12', '085235221321', 'laki-laki', 'On Work', '2020-12-05 00:55:29', '2020-12-09 06:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `nama_produk`, `gambar`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'Leite Black Coffee Powder', '1607095217_GambarProduk.jpg', 45000, 13, '2020-12-04 07:28:37', '2020-12-10 21:05:32'),
(3, 'Sida Mulia Coffee Powder', '1607169329_GambarProduk.jpg', 30000, 99, '2020-12-05 04:55:29', '2020-12-05 17:13:03'),
(4, 'Madjoe Coffee Powder', '1607169434_GambarProduk.jpg', 40000, 40, '2020-12-05 04:57:14', '2020-12-09 06:08:31'),
(5, 'Leite Robusta Powder', '1607169803_GambarProduk.jpg', 50000, 5, '2020-12-05 05:03:23', '2020-12-10 21:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_kurir` int(10) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `waktu_transaksi` datetime DEFAULT NULL,
  `pemesan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pemesan` text COLLATE utf8mb4_unicode_ci,
  `nohp_pemesan` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pengiriman` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_transaksi` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id_transaksi`, `id_customer`, `id_kurir`, `biaya`, `waktu_transaksi`, `pemesan`, `alamat_pemesan`, `nohp_pemesan`, `jenis_pengiriman`, `status_transaksi`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 85000, '2020-12-06 00:11:44', 'Diana', 'Jln. customer', '083123321221', 'JNE', 'Diterima', '2020-12-04 15:23:33', '2020-12-05 17:27:24'),
(5, 5, 2, 150000, '2020-12-05 23:41:44', 'Diana', 'Jln. customer', '083123321221', 'JNE', 'Diterima', '2020-12-05 14:27:19', '2020-12-05 17:14:12'),
(11, 8, NULL, 55000, '2020-12-11 02:58:10', 'Bayu Restu Adji', 'Jalan Lekipali no.10', '085268553848', 'JNE', 'Lunas', '2020-12-10 19:57:50', '2020-12-10 21:05:32'),
(12, 8, NULL, 60000, '2020-12-11 03:07:50', 'Bayu', 'Jalan Lekipali no.10', '085268553848', 'SiiCepat', 'Lunas', '2020-12-10 20:07:30', '2020-12-10 21:20:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detil_transaksis`
--
ALTER TABLE `detil_transaksis`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_produk`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`,`id_kurir`),
  ADD KEY `id_customer_2` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detil_transaksis`
--
ALTER TABLE `detil_transaksis`
  MODIFY `id_detil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
