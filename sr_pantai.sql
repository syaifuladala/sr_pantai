-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 10:36 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sr_pantai`
--

-- --------------------------------------------------------

--
-- Table structure for table `covid`
--

CREATE TABLE `covid` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `positif` int(11) NOT NULL,
  `sembuh` int(11) NOT NULL,
  `meninggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid`
--

INSERT INTO `covid` (`id`, `kecamatan`, `positif`, `sembuh`, `meninggal`) VALUES
(1, 'Galur', 276, 89, 0),
(2, 'Panjatan', 390, 78, 1),
(3, 'Temon', 323, 73, 4),
(4, 'Girisubo', 18, 12, 1),
(5, 'Panggang', 79, 40, 3),
(6, 'Sapto Sari', 52, 21, 1),
(7, 'Tanjungsari', 40, 28, 1),
(8, 'Tepus', 18, 25, 1),
(9, 'Kretek', 118, 130, 8),
(10, 'Sanden', 178, 137, 4),
(11, 'Srandakan', 171, 142, 7);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy`
--

CREATE TABLE `fuzzy` (
  `id_pantai` int(11) NOT NULL,
  `covid_rendah` double DEFAULT NULL,
  `covid_sedang` double DEFAULT NULL,
  `covid_tinggi` double DEFAULT NULL,
  `prokes_longgar` double DEFAULT NULL,
  `prokes_standar` double DEFAULT NULL,
  `prokes_ketat` double DEFAULT NULL,
  `sentimen_buruk` double DEFAULT NULL,
  `sentimen_cukup` double DEFAULT NULL,
  `sentimen_baik` double DEFAULT NULL,
  `firestrength` double DEFAULT NULL,
  `fscrank` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuzzy`
--

INSERT INTO `fuzzy` (`id_pantai`, `covid_rendah`, `covid_sedang`, `covid_tinggi`, `prokes_longgar`, `prokes_standar`, `prokes_ketat`, `sentimen_buruk`, `sentimen_cukup`, `sentimen_baik`, `firestrength`, `fscrank`) VALUES
(1, 0.29, 0.58, 0.71, 0.18, 0.4, 0.82, 0.15, 0.3, 0.85, 0.18, 0.18),
(2, 0, 0, 1, 0.64, 0.67, 0.36, 0.12, 0.24, 0.88, 0, 0),
(3, 0.17, 0.34, 0.83, 0.18, 0.4, 0.82, 0.16, 0.32, 0.84, 0.17, 0.17),
(4, 0.17, 0.34, 0.83, 0.64, 0.67, 0.36, 0.14, 0.27, 0.86, 0.17, 0.17),
(5, 0.95, 0.09, 0.05, 0.18, 0.4, 0.82, 0.13, 0.27, 0.87, 0.18, 0.18),
(6, 0.8, 0.41, 0.2, 0.18, 0.4, 0.82, 0.12, 0.24, 0.88, 0.18, 0.18),
(7, 0.87, 0.27, 0.13, 0.18, 0.4, 0.82, 0.09, 0.19, 0.91, 0.18, 0.18),
(8, 0.9, 0.21, 0.1, 0.18, 0.4, 0.82, 0.12, 0.24, 0.88, 0.18, 0.18),
(9, 0.9, 0.21, 0.1, 0.18, 0.4, 0.82, 0.1, 0.2, 0.9, 0.18, 0.18),
(10, 0.95, 0.09, 0.05, 0.27, 0.6, 0.73, 0.08, 0.16, 0.92, 0.27, 0.27),
(11, 0.95, 0.09, 0.05, 0.18, 0.4, 0.82, 0.19, 0.37, 0.81, 0.18, 0.18),
(12, 0.95, 0.09, 0.05, 0.18, 0.4, 0.82, 0.1, 0.2, 0.9, 0.18, 0.18),
(13, 0.7, 0.61, 0.3, 0.27, 0.6, 0.73, 0.14, 0.28, 0.86, 0.27, 0.27),
(14, 0.7, 0.61, 0.3, 0.27, 0.6, 0.73, 0.11, 0.22, 0.89, 0.27, 0.27),
(15, 0.7, 0.61, 0.3, 0.27, 0.6, 0.73, 0.12, 0.23, 0.88, 0.27, 0.27),
(16, 0.54, 0.91, 0.46, 0.36, 0.8, 0.64, 0.11, 0.22, 0.89, 0.36, 0.36),
(17, 0.54, 0.91, 0.46, 0.36, 0.8, 0.64, 0.18, 0.37, 0.82, 0.36, 0.36),
(18, 0.56, 0.88, 0.44, 0.36, 0.8, 0.64, 0.1, 0.2, 0.9, 0.36, 0.36);

-- --------------------------------------------------------

--
-- Table structure for table `pantai`
--

CREATE TABLE `pantai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pantai`
--

INSERT INTO `pantai` (`id`, `nama`, `latitude`, `longitude`, `id_kecamatan`, `alamat`, `gambar`) VALUES
(1, 'Trisik', '-7.974.839', '-7.974.839', 1, 'Area Sawah, Banaran, Kec. Galur, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55661', 'image/Trisik.jpg'),
(2, 'Bugel', '-7.951.043', '110.152.837', 2, 'Gumuk Waru, Bugel, Panjatan, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55655', 'image/Bugel.jpg'),
(3, 'Glagah', '-7.915.363', '110.073.121', 3, 'Glagah, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', 'image/Glagah.jpg'),
(4, 'Congot', '-7.900.590', '110.033.947', 3, 'Sangkaran, Jangkaran, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', 'image/Congot.jpg'),
(5, 'Wediombo', '-8.190.273', '110.710.374', 4, 'Pendowo, Jepitu, Girisubo, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta', 'image/Wediombo.jpg'),
(6, 'Tanjung Kesirat', '-8.096.191', '110.435.016', 5, 'Karang, Girikarto, Panggang, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55872', 'image/Tanjung_Kesirat.jpg'),
(7, 'Ngrenehan', '-8.121.148', '110.514.314', 6, 'Wonosari, Kanigoro, Sapto Sari, Kanigoro, Sapto Sari, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55871', 'image/Ngrenehan.jpg'),
(8, 'Baron', '-8.128.922', '110.548.552', 7, 'Rejosari, Kemadang, Kec. Tanjungsari, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta', 'image/Baron.jpg'),
(9, 'Drini', '-8.138.239', '110.577.243', 7, 'Wonosobo, Banjarejo, Kec. Tanjungsari, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55881', 'image/Drini.jpg'),
(10, 'Siung', '-8.182.074', '110.683.481', 8, 'Duwet, Purwodadi, Tepus, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55881', 'image/Siung.jpg'),
(11, 'Timang', '-8.176.208', '110.662.507', 8, 'Jl. Pantai Sel. Jawa, Pantai, Purwodadi, Tepus, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55881', 'image/Timang.jpg'),
(12, 'Indrayanti', '-8.150.559', '110.612.568', 8, 'Ngasem, Sidoharjo, Tepus, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55881', 'image/Indrayanti.jpg'),
(13, 'Parangtritis', '-8.026.089', '110.334.519', 9, 'Pantai, Parangtritis, Kec. Kretek, Bantul, Daerah Istimewa Yogyakarta 55772', 'image/Parangtritis.jpg'),
(14, 'Cemara Sewu', '-8.019.771', '110.314.473', 9, 'Jl. Pantai Parangkusumo, Pantai, Parangtritis, Kec. Kretek, Bantul, Daerah Istimewa Yogyakarta 55772', 'image/Cemara_Sewu.jpg'),
(15, 'Depok', '-8.013.948', '110.292.127', 9, 'Parangtritis, Pantai, Parangtritis, Kec. Kretek, Bantul, Daerah Istimewa Yogyakarta', 'image/Depok.jpg'),
(16, 'Goa Cemara', '-7.999.234', '110.248.963', 10, 'Jl. Lintas Sel., Patihan, Gadingsari, Sanden, Bantul, Daerah Istimewa Yogyakarta 55763', 'image/Goa_Cemara.jpg'),
(17, 'Samas', '-8.005.123', '110.264.403', 10, 'Dodogan, Srigading, Sanden, Bantul, Daerah Istimewa Yogyakarta 55763', 'image/Samas.jpg'),
(18, 'Baru', '-7.988.805', '110.220.504', 11, 'Ngentak, Poncosari, Kec. Srandakan, Bantul, Daerah Istimewa Yogyakarta 55762', 'image/Baru.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prokes`
--

CREATE TABLE `prokes` (
  `id` int(11) NOT NULL,
  `prokes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokes`
--

INSERT INTO `prokes` (`id`, `prokes`) VALUES
(1, 'Pengecekan suhu tubuh'),
(2, 'Tersedia tempat cuci tangan dan handsanitazer'),
(3, 'Penerapan pemakaian masker'),
(4, 'Pembatasan jumlah pengunjung'),
(5, 'Persyaratan rapid / SWAB untuk kunjungan'),
(6, 'Pengawasan jaga jarak'),
(7, 'Penyemprotan disinfektan secara berkala'),
(8, 'Memiliki posko penanganan covid'),
(9, 'Penutupan lokasi lebih awal (dibawah jam 16.00)'),
(10, 'Memasang media informasi di lokasi-lokasi strategis untuk mengingatkan protokol kesehatan'),
(11, 'Melakukan sosialisasi dan edukasi kepada pekerja, pedagang, dan masyarakat sekitar mengenai protokol kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `prokes_pantai`
--

CREATE TABLE `prokes_pantai` (
  `id_pantai` int(11) NOT NULL,
  `id_prokes` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokes_pantai`
--

INSERT INTO `prokes_pantai` (`id_pantai`, `id_prokes`, `status`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 0),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 0),
(1, 10, 1),
(1, 11, 1),
(2, 1, 0),
(2, 2, 1),
(2, 3, 1),
(2, 4, 0),
(2, 5, 0),
(2, 6, 1),
(2, 7, 0),
(2, 8, 0),
(2, 9, 0),
(2, 10, 1),
(2, 11, 0),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(3, 4, 1),
(3, 5, 0),
(3, 6, 1),
(3, 7, 1),
(3, 8, 1),
(3, 9, 0),
(3, 10, 1),
(3, 11, 1),
(4, 1, 0),
(4, 2, 1),
(4, 3, 1),
(4, 4, 0),
(4, 5, 0),
(4, 6, 1),
(4, 7, 0),
(4, 8, 0),
(4, 9, 0),
(4, 10, 1),
(4, 11, 0),
(5, 1, 1),
(5, 2, 1),
(5, 3, 1),
(5, 4, 1),
(5, 5, 0),
(5, 6, 1),
(5, 7, 1),
(5, 8, 1),
(5, 9, 0),
(5, 10, 1),
(5, 11, 1),
(6, 1, 1),
(6, 2, 1),
(6, 3, 1),
(6, 4, 1),
(6, 5, 0),
(6, 6, 1),
(6, 7, 1),
(6, 8, 1),
(6, 9, 0),
(6, 10, 1),
(6, 11, 1),
(7, 1, 1),
(7, 2, 1),
(7, 3, 1),
(7, 4, 1),
(7, 5, 0),
(7, 6, 1),
(7, 7, 1),
(7, 8, 1),
(7, 9, 0),
(7, 10, 1),
(7, 11, 1),
(8, 1, 1),
(8, 2, 1),
(8, 3, 1),
(8, 4, 1),
(8, 5, 0),
(8, 6, 1),
(8, 7, 1),
(8, 8, 1),
(8, 9, 0),
(8, 10, 1),
(8, 11, 1),
(9, 1, 1),
(9, 2, 1),
(9, 3, 1),
(9, 4, 1),
(9, 5, 0),
(9, 6, 1),
(9, 7, 1),
(9, 8, 1),
(9, 9, 0),
(9, 10, 1),
(9, 11, 1),
(10, 1, 1),
(10, 2, 1),
(10, 3, 1),
(10, 4, 1),
(10, 5, 0),
(10, 6, 1),
(10, 7, 1),
(10, 8, 0),
(10, 9, 0),
(10, 10, 1),
(10, 11, 1),
(11, 1, 1),
(11, 2, 1),
(11, 3, 1),
(11, 4, 1),
(11, 5, 0),
(11, 6, 1),
(11, 7, 1),
(11, 8, 1),
(11, 9, 0),
(11, 10, 1),
(11, 11, 1),
(12, 1, 1),
(12, 2, 1),
(12, 3, 1),
(12, 4, 1),
(12, 5, 0),
(12, 6, 1),
(12, 7, 1),
(12, 8, 1),
(12, 9, 0),
(12, 10, 1),
(12, 11, 1),
(13, 1, 1),
(13, 2, 1),
(13, 3, 1),
(13, 4, 0),
(13, 5, 0),
(13, 6, 1),
(13, 7, 1),
(13, 8, 1),
(13, 9, 0),
(13, 10, 1),
(13, 11, 1),
(14, 1, 1),
(14, 2, 1),
(14, 3, 1),
(14, 4, 0),
(14, 5, 0),
(14, 6, 1),
(14, 7, 1),
(14, 8, 1),
(14, 9, 0),
(14, 10, 1),
(14, 11, 1),
(15, 1, 1),
(15, 2, 1),
(15, 3, 1),
(15, 4, 0),
(15, 5, 0),
(15, 6, 1),
(15, 7, 1),
(15, 8, 1),
(15, 9, 0),
(15, 10, 1),
(15, 11, 1),
(16, 1, 1),
(16, 2, 1),
(16, 3, 1),
(16, 4, 0),
(16, 5, 0),
(16, 6, 1),
(16, 7, 1),
(16, 8, 0),
(16, 9, 0),
(16, 10, 1),
(16, 11, 1),
(17, 1, 1),
(17, 2, 1),
(17, 3, 1),
(17, 4, 0),
(17, 5, 0),
(17, 6, 1),
(17, 7, 1),
(17, 8, 0),
(17, 9, 0),
(17, 10, 1),
(17, 11, 1),
(18, 1, 1),
(18, 2, 1),
(18, 3, 1),
(18, 4, 0),
(18, 5, 0),
(18, 6, 1),
(18, 7, 1),
(18, 8, 0),
(18, 9, 0),
(18, 10, 1),
(18, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sentimen`
--

CREATE TABLE `sentimen` (
  `id_pantai` int(11) NOT NULL,
  `s_positif` int(11) DEFAULT NULL,
  `s_negatif` int(11) DEFAULT NULL,
  `s_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sentimen`
--

INSERT INTO `sentimen` (`id_pantai`, `s_positif`, `s_negatif`, `s_total`) VALUES
(1, 419, 75, 494),
(2, 447, 62, 509),
(3, 782, 148, 930),
(4, 354, 56, 410),
(5, 806, 124, 930),
(6, 817, 113, 930),
(7, 844, 86, 930),
(8, 819, 111, 930),
(9, 837, 93, 930),
(10, 563, 49, 612),
(11, 757, 173, 930),
(12, 837, 93, 930),
(13, 799, 131, 930),
(14, 828, 102, 930),
(15, 823, 107, 930),
(16, 829, 101, 930),
(17, 458, 103, 561),
(18, 838, 92, 930);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD KEY `id_pantai` (`id_pantai`);

--
-- Indexes for table `pantai`
--
ALTER TABLE `pantai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`) USING BTREE;

--
-- Indexes for table `prokes`
--
ALTER TABLE `prokes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prokes_pantai`
--
ALTER TABLE `prokes_pantai`
  ADD KEY `id_pantai` (`id_pantai`) USING BTREE,
  ADD KEY `id_prokes` (`id_prokes`) USING BTREE;

--
-- Indexes for table `sentimen`
--
ALTER TABLE `sentimen`
  ADD UNIQUE KEY `id_pantai` (`id_pantai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pantai`
--
ALTER TABLE `pantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prokes`
--
ALTER TABLE `prokes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD CONSTRAINT `fuzzy_ibfk_1` FOREIGN KEY (`id_pantai`) REFERENCES `pantai` (`id`);

--
-- Constraints for table `pantai`
--
ALTER TABLE `pantai`
  ADD CONSTRAINT `pantai_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `covid` (`id`);

--
-- Constraints for table `prokes_pantai`
--
ALTER TABLE `prokes_pantai`
  ADD CONSTRAINT `prokes_pantai_ibfk_1` FOREIGN KEY (`id_prokes`) REFERENCES `prokes` (`id`),
  ADD CONSTRAINT `prokes_pantai_ibfk_2` FOREIGN KEY (`id_pantai`) REFERENCES `pantai` (`id`);

--
-- Constraints for table `sentimen`
--
ALTER TABLE `sentimen`
  ADD CONSTRAINT `sentimen_ibfk_1` FOREIGN KEY (`id_pantai`) REFERENCES `pantai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
