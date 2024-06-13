-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 11:30 AM
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
-- Database: `kominfo_sudinsos`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `isi_konten` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `src_image_lama` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `publish` varchar(1) NOT NULL COMMENT '0=draft,1=publish',
  `publish_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL COMMENT '1=aktif,0=tdk_aktif',
  `pembaca` int(11) NOT NULL DEFAULT 0,
  `rating` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `deskripsi`, `isi_konten`, `penulis`, `thumbnail`, `src_image_lama`, `created_by`, `created_date`, `modified_by`, `modified_date`, `publish`, `publish_date`, `status`, `pembaca`, `rating`) VALUES
('20240613162624berita', 'Test Judul Berita', 'Test-Judul-Berita', 'Test Deskripsi', '<p>Test Isi Konten<br></p>', 'Test Penulis;Test Editor;Test Fotografer', '202406131626_dinsos.png', NULL, 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:26:24', NULL, NULL, '1', '2024-06-13 16:26:24', '1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_berita_kategori`
--

CREATE TABLE `detail_berita_kategori` (
  `id_news_kategori` varchar(255) NOT NULL,
  `id_news` varchar(255) NOT NULL,
  `id_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_berita_kategori`
--

INSERT INTO `detail_berita_kategori` (`id_news_kategori`, `id_news`, `id_kategori`) VALUES
('20230817223017kategori', '20230817223017berita', '3'),
('20240613162624kategori', '20240613162624berita', '3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL COMMENT '1=aktif,0=tdk_aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori`, `nama_kategori`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
('0', '', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '0'),
('1', 'PEREKONOMIAN DAN PEMBANGUNAN', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('2', 'PEREKONOMIAN DAN PEMBANGUNAN', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('3', 'KESEJAHTERAAN RAKYAT', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('4', 'PEMERINTAHAN', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('5', 'UMUM', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('525', 'PEMERINTAH', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('536', 'PENDIDIKAN', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('537', 'BERITA SELATAN', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('540', 'SOSIAL BUDAYA', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('541', 'Walikota', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('542', 'Wakil Walikota', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('712', 'Pertumbuhan Ekonomi', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('714', 'UKM', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('727', 'Kanal Aspirasi Qlue', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1'),
('728', 'Kanal Aspirasi SMS', 'rpihL', '2018-08-30 10:14:40', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `isi_konten` longtext NOT NULL,
  `penulis` varchar(25) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `publish` varchar(1) NOT NULL COMMENT '0=draft,1=publish',
  `publish_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL COMMENT '1=aktif,0=tdk_aktif',
  `pembaca` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `url`, `judul`, `deskripsi`, `isi_konten`, `penulis`, `thumbnail`, `created_by`, `created_date`, `modified_by`, `modified_date`, `publish`, `publish_date`, `status`, `pembaca`) VALUES
('20230817224608', 'profil', 'Profil - Visi Misi', NULL, '<p>Konten</p>', NULL, NULL, 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2023-08-14 00:00:00', 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:11:59', '1', NULL, '1', 0),
('20230817224911', 'profil', 'Profil - Maklumat Pelayanan', NULL, '<p>Konten</p>', NULL, NULL, 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2023-08-14 00:00:00', 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:12:16', '1', NULL, '1', 0),
('20230818074846', 'profil', 'Profil - Kanal Aduan', NULL, '<p>Konten</p>', NULL, NULL, 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2023-08-14 00:00:00', 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:12:32', '1', NULL, '1', 0),
('20230818075029', 'profil', 'Profil - Kepuasan Masyarakat', NULL, '<p>Konten</p>', NULL, NULL, 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2023-08-14 00:00:00', 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:12:48', '1', NULL, '1', 0),
('20240613162049', 'pelayanan', 'Pelayanan', NULL, '<p>1. Standar pelayanan Rekomendasi tanda daftar lembaga kesejahteraan sosial atau izin kegiatan lembaga kesejahteraan sosial</p><p>2. Standar pelayanan pemberian bantuan sosial pemenuhan kebutuhan dasar korban bencana</p><p>3. Standar pelayanan pemberian surat pengantar rekomendasi pemulangan warga binaan sosial</p><p>4. Standar pelayanan pemberian surat keterangan terdaftar Data Terpadun Kesejahteraan Sosial</p><p>5. Standar pelayanan pengurusan re-aktivasi PBI JK APBN</p><p>6. Standar pelayanan prosedur pengajuan alat bantu fisik</p><p>7. Standar pelayanan pemberian surat pengantar rekomendasi bantuan hibah daerah/pusat</p>', NULL, NULL, 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:20:49', 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', '2024-06-13 16:24:38', '1', NULL, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(1) NOT NULL COMMENT '1=aktif,0=tdk_aktif',
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `hak_akses` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `hak_akses`) VALUES
('VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~', 'Admin', '', 'admin', '$2y$10$ULsM36lcnow0x79SKZO71.5yX7hx1sZNOoqzp/tMK7E5V4pPStrWK', '1', '', '2024-06-13 15:00:00', '', '2024-06-13 15:00:00', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id_visitor` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id_visitor`, `ip_address`, `url`, `tanggal`, `jumlah`) VALUES
(1, '127.0.0.1', 'http://localhost/sudinsos/', '2024-06-13 16:09:46', 1),
(2, '127.0.0.1', 'http://localhost/sudinsos/profil', '2024-06-13 16:12:52', 1),
(3, '127.0.0.1', 'http://localhost/sudinsos/berita-selatan', '2024-06-13 16:13:48', 1),
(4, '127.0.0.1', 'http://localhost/sudinsos/pelayanan', '2024-06-13 16:21:50', 1),
(5, '127.0.0.1', 'http://localhost/sudinsos/berita', '2024-06-13 16:24:52', 1),
(6, '127.0.0.1', 'http://localhost/sudinsos/berita/detail/Test-Judul-Berita', '2024-06-13 16:26:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `visi_misi` text NOT NULL,
  `gambar` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `nama`, `jabatan`, `visi_misi`, `gambar`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Munjirin, S.Sos, M.Si', 'Walikota Kota Administrasi Jakarta Selatan', 'Kota Administrasi Jakarta Selatan yang berbudaya, berorientasi pada pelayanan publik dan berwawasan lingkungan.', '202211041424-munjirin--s.sos--m.si.png', 1, '2022-11-04 13:59:32', '2022-11-07 09:09:24'),
(2, 'Heru Budi Hartono', 'Pj Gubernur DKI Jakarta', 'Mari melangkah bersama, #terusbekerja membangun dan memajukan Jakarta, kota tercinta kita bersama', '202211041423-heru-budi-hartono.png', 1, '2022-11-04 14:23:06', '2022-11-04 14:23:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `detail_berita_kategori`
--
ALTER TABLE `detail_berita_kategori`
  ADD PRIMARY KEY (`id_news_kategori`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visitor`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
