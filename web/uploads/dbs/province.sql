-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2015 at 05:33 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lc`
--

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `token`) VALUES
(1, 'Aceh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 'Sumatera Utara', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2'),
(3, 'Bengkulu', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(4, 'Jambi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4'),
(5, 'Riau', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5'),
(6, 'Sumatera Barat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '6'),
(7, 'Sumatera Selatan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '7'),
(8, 'Lampung', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '8'),
(9, 'Kepulauan Bangka Belitung', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '9'),
(10, 'Kepulauan Riau', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '10'),
(11, 'Banten', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '11'),
(12, 'Jawa Barat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12'),
(13, 'DKI Jakarta', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '13'),
(14, 'Jawa Tengah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '14'),
(15, 'Jawa Timur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '15'),
(16, 'Daerah Istimewa Yogyakarta', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '16'),
(17, 'Bali', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '17'),
(18, 'Nusa Tenggara Barat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '18'),
(19, 'Nusa Tenggara Timur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '19'),
(20, 'Kalimantan Barat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '20'),
(21, 'Kalimantan Selatan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '21'),
(22, 'Kalimantan Tengah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '22'),
(23, 'Kalimantan Timur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23'),
(24, 'Gorontalo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '24'),
(25, 'Sulawesi Selatan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '25'),
(26, 'Sulawesi Tenggara', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '26'),
(27, 'Sulawesi Tengah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '27'),
(28, 'Sulawesi Utara', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '28'),
(29, 'Sulawesi Barat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '29'),
(30, 'Maluku', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '30'),
(31, 'Maluku Utara', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '31'),
(32, 'Papua', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '32'),
(33, 'Papua Barat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `province`
--
ALTER TABLE `province`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_4ADAD40B5F37A13B` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
