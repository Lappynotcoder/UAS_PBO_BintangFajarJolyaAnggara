-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260526.9a43c2e222
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2026 at 01:32 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1b_bintangfajarjolyaanggara`
--
CREATE DATABASE IF NOT EXISTS `db_uas_pbo_trpl1b_bintangfajarjolyaanggara` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_uas_pbo_trpl1b_bintangfajarjolyaanggara`;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
(1, 'Budi Santoso', 'IT', 22, 250000.00, 'Tetap', NULL, NULL, 500000.00, 'ESOP-001', NULL, NULL),
(2, 'Siti Aminah', 'HRD', 20, 200000.00, 'Tetap', NULL, NULL, 450000.00, 'ESOP-002', NULL, NULL),
(3, 'Andi Wijaya', 'Finance', 21, 230000.00, 'Tetap', NULL, NULL, 500000.00, 'ESOP-003', NULL, NULL),
(4, 'Dewi Lestari', 'Marketing', 22, 210000.00, 'Tetap', NULL, NULL, 400000.00, 'ESOP-004', NULL, NULL),
(5, 'Eko Prasetyo', 'Operations', 23, 190000.00, 'Tetap', NULL, NULL, 400000.00, 'ESOP-005', NULL, NULL),
(6, 'Rinaawati', 'IT', 20, 260000.00, 'Tetap', NULL, NULL, 550000.00, 'ESOP-006', NULL, NULL),
(7, 'Fajar Nugroho', 'Legal', 22, 240000.00, 'Tetap', NULL, NULL, 500000.00, 'ESOP-007', NULL, NULL),
(8, 'Gita Permata', 'Marketing', 22, 180000.00, 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
(9, 'Hendra Kurniawan', 'IT', 21, 220000.00, 'Kontrak', 6, 'PT Tech Talent', NULL, NULL, NULL, NULL),
(10, 'Indah Sari', 'HRD', 20, 170000.00, 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
(11, 'Joko Susilo', 'Operations', 22, 160000.00, 'Kontrak', 6, 'PT Outsourceindo', NULL, NULL, NULL, NULL),
(12, 'Kevin Sanjaya', 'IT', 19, 210000.00, 'Kontrak', 12, 'PT Tech Talent', NULL, NULL, NULL, NULL),
(13, 'Lestari Putri', 'Finance', 21, 185000.00, 'Kontrak', 6, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
(14, 'Muhammad Rizky', 'Marketing', 22, 175000.00, 'Kontrak', 12, 'PT Outsourceindo', NULL, NULL, NULL, NULL),
(15, 'Nadia Utami', 'IT', 20, 100000.00, 'Magang', NULL, NULL, NULL, NULL, 2000000.00, 'MSIB-001'),
(16, 'Oki Setiawan', 'Marketing', 18, 90000.00, 'Magang', NULL, NULL, NULL, NULL, 1800000.00, 'MSIB-002'),
(17, 'Putri Sabrina', 'HRD', 21, 95000.00, 'Magang', NULL, NULL, NULL, NULL, 1900000.00, 'Mandiri-001'),
(18, 'Qori Ahmad', 'Finance', 20, 100000.00, 'Magang', NULL, NULL, NULL, NULL, 2000000.00, 'MSIB-003'),
(19, 'Rian Hidayat', 'IT', 22, 105000.00, 'Magang', NULL, NULL, NULL, NULL, 2100000.00, 'MSIB-004'),
(20, 'Siti Rahma', 'Design', 19, 90000.00, 'Magang', NULL, NULL, NULL, NULL, 1800000.00, 'Mandiri-002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
