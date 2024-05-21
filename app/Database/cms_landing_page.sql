-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 03:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_landing_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_artikel` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `nama_artikel`, `deskripsi`) VALUES
(1, 'UU RI No. 29 Tahun 2004 tentang praktik kedokteran Pasal 79, huruf b', 'Dipidana dengan pidana kurungan paling lama 1 (satu) tahun atau denda paling banyak Rp50.000.000,00 (lima puluh juta rupiah), setiap dokter atau dokter gigi yang dengan sengaja tidak membuat rekam medis'),
(2, 'Permenkes No. 24 Tahun 2022 tentang RM Pasal 45', 'Seluruh Fasilitas Kesehatan harus menyelenggarakan Rekam Medis Elektronik sesuai dengan ketentuan dalam Peraturan Menteri ini paling lambat tanggal 31 Desember 2023.'),
(3, 'Kemenkes Meluncurkan Program IHS Satu Sehat', 'Pada 26 Juli 2022 lalu Kemenkes RI meluncurkan Program IHS Satu Sehat, sebuah platform yang akan menyediakan integrasi data dan menyajikan berbagai macam data tersebut, mulai dari rekam medis hingga resume medis dari berbagai macam standarisasi menjadi satu kesatuan yang seragam dalam format dan protokol pertukarannya.');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Mrs.Lrona', 'default', 'uploads/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `benefit`
--

CREATE TABLE `benefit` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_paket_harga` int(5) UNSIGNED NOT NULL,
  `nama_benefit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefit`
--

INSERT INTO `benefit` (`id`, `id_paket_harga`, `nama_benefit`) VALUES
(2, 2, 'dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `detail_fitur`
--

CREATE TABLE `detail_fitur` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul_detail` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_fitur` int(5) UNSIGNED NOT NULL,
  `layout` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_fitur` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_solusi` int(5) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`id`, `nama_fitur`, `deskripsi`, `id_solusi`, `icon`) VALUES
(1, 'Cek kesehatan', 'Ketahui kesehatan anda disini', 2, 'uploads/device-heart-monitor.png'),
(2, 'Ambulannnnn', 'Ketahui cara menghubungi ambulan', 3, 'uploads/ambulance (1).png'),
(3, 'Ruangan', 'Cara melihat kamar yang tersedia', 2, 'uploads/emergency-bed.png'),
(4, 'Obat-obatan', 'Cara  mengambil resep / obat', 2, 'uploads/medical-cross.png');

-- --------------------------------------------------------

--
-- Table structure for table `headeraboutus`
--

CREATE TABLE `headeraboutus` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul_banner` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `headeraboutus`
--

INSERT INTO `headeraboutus` (`id`, `judul_banner`, `deskripsi`, `gambar`) VALUES
(1, 'PT Goldstep Teknologi Indonesia', 'default', 'uploads/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `headerartikel`
--

CREATE TABLE `headerartikel` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `headerartikel`
--

INSERT INTO `headerartikel` (`id`, `judul_artikel`, `deskripsi`) VALUES
(1, 'Penerapan Rekam Medis Elektronik sebagai ujung tombak transformasi digital fasilitas kesehatan', 'deskripsi artikel');

-- --------------------------------------------------------

--
-- Table structure for table `headersolusi`
--

CREATE TABLE `headersolusi` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul_solusi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `headersolusi`
--

INSERT INTO `headersolusi` (`id`, `judul_solusi`, `deskripsi`) VALUES
(1, 'Solusi', 'Beberapa contoh solusi untuk memindahkan dalam menjalankan bisnis'),
(2, 'default', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_layout` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`id`, `nama_layout`, `layout`) VALUES
(1, 'A', 'layout/layout-A.png'),
(2, 'B', 'layout/layout-B.png'),
(3, 'C', 'layout/layout-C.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(34, '2024-05-11-110828', 'App\\Database\\Migrations\\CreateUsers', 'default', 'App', 1715428798, 1),
(99, '2024-05-11-104853', 'App\\Database\\Migrations\\CreateSolusi', 'default', 'App', 1715920450, 2),
(100, '2024-05-11-105049', 'App\\Database\\Migrations\\CreateFitur', 'default', 'App', 1715920450, 2),
(101, '2024-05-11-105411', 'App\\Database\\Migrations\\CreateDetailFitur', 'default', 'App', 1715920451, 2),
(102, '2024-05-11-105931', 'App\\Database\\Migrations\\CreatePaketHarga', 'default', 'App', 1715920451, 2),
(103, '2024-05-11-110600', 'App\\Database\\Migrations\\CreateBenefit', 'default', 'App', 1715920451, 2),
(104, '2024-05-07-054411', 'App\\Database\\Migrations\\CreateBanner', 'default', 'App', 1715920507, 3),
(105, '2024-05-11-115309', 'App\\Database\\Migrations\\CreateHistori', 'default', 'App', 1715920534, 4),
(106, '2024-05-15-062956', 'App\\Database\\Migrations\\CreateHeaderSolusi', 'default', 'App', 1715920535, 4),
(107, '2024-05-16-054537', 'App\\Database\\Migrations\\CreateHeaderArtikel', 'default', 'App', 1715920535, 4),
(108, '2024-05-16-054544', 'App\\Database\\Migrations\\CreateArtikel', 'default', 'App', 1715920536, 4),
(109, '2024-05-11-113919', 'App\\Database\\Migrations\\CreateAboutUs', 'default', 'App', 1715998493, 5),
(110, '2024-05-18-041846', 'App\\Database\\Migrations\\CreateHeaderAboutUs', 'default', 'App', 1716006000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `paket_harga`
--

CREATE TABLE `paket_harga` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `kategori_harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `id_solusi` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_harga`
--

INSERT INTO `paket_harga` (`id`, `nama_paket`, `kategori_harga`, `deskripsi`, `harga`, `id_solusi`) VALUES
(2, 'Paket harga klinik ', 'Standard', 'Paket harga untuk klinik', 1500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_solusi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id`, `nama_solusi`, `deskripsi`, `gambar`) VALUES
(1, 'Dokter', 'solusi dokter dan harga', 'uploads/dokter.png'),
(2, 'Klinik', 'Solusi klinik dan harga', 'uploads/klinik.png'),
(3, 'Rumah Sakit', 'Solusi rumah sakit dan harga', 'uploads/rumah sakit.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `judul`, `deskripsi`) VALUES
(3, 'PT Goldstep Teknologi Indonesia', 'Perusahaan Software-as-a-Service (SaaS) terdepan yang menyediakan solusi digital berbasis cloud untuk mendukung fasilitas kesehatan di indonesia dari mulai apotek, klinik, puskesmas hingga rumah sakit, melalui penggunaan teknologi.'),
(4, 'h', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket_harga` (`id_paket_harga`);

--
-- Indexes for table `detail_fitur`
--
ALTER TABLE `detail_fitur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fitur` (`id_fitur`),
  ADD KEY `layout` (`layout`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `headeraboutus`
--
ALTER TABLE `headeraboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headerartikel`
--
ALTER TABLE `headerartikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headersolusi`
--
ALTER TABLE `headersolusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_harga`
--
ALTER TABLE `paket_harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefit`
--
ALTER TABLE `benefit`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_fitur`
--
ALTER TABLE `detail_fitur`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `headeraboutus`
--
ALTER TABLE `headeraboutus`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `headerartikel`
--
ALTER TABLE `headerartikel`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `headersolusi`
--
ALTER TABLE `headersolusi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `paket_harga`
--
ALTER TABLE `paket_harga`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benefit`
--
ALTER TABLE `benefit`
  ADD CONSTRAINT `benefit_ibfk_1` FOREIGN KEY (`id_paket_harga`) REFERENCES `paket_harga` (`id`);

--
-- Constraints for table `detail_fitur`
--
ALTER TABLE `detail_fitur`
  ADD CONSTRAINT `detail_fitur_ibfk_1` FOREIGN KEY (`id_fitur`) REFERENCES `fitur` (`id`),
  ADD CONSTRAINT `detail_fitur_ibfk_2` FOREIGN KEY (`layout`) REFERENCES `layout` (`id`);

--
-- Constraints for table `fitur`
--
ALTER TABLE `fitur`
  ADD CONSTRAINT `fitur_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id`);

--
-- Constraints for table `paket_harga`
--
ALTER TABLE `paket_harga`
  ADD CONSTRAINT `paket_harga_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
