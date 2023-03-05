-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 11:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbcal_email`
--

-- --------------------------------------------------------

--
-- Table structure for table `bbcal1`
--

CREATE TABLE `bbcal1` (
  `id` int(10) NOT NULL,
  `customername` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `testmachine` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `model` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serialnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `calidate` date NOT NULL,
  `nextcal` date NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `datealert` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bbcal1`
--

INSERT INTO `bbcal1` (`id`, `customername`, `testmachine`, `model`, `serialnum`, `brand`, `calidate`, `nextcal`, `email`, `status`, `datealert`) VALUES
(16, '42 Siam Medicare', 'disso', 'TDL-08L', '0606204', 'Electrolab', '0000-00-00', '2023-03-30', 'icezaza400@gmail.com', 'ยังไม่ได้ส่ง', '2023-02-28'),
(17, '42 Siam Medicare', 'disso', 'SR2-6F', 'SR2 BM', 'Hanson', '0000-00-00', '2023-04-26', 'icezaza400@gmail.com', 'ยังไม่ได้ส่ง', '2023-03-27'),
(18, 'Company 01', 'Machine 01', 'ATR-8G', 'SEF052', 'Koyota', '0000-00-00', '2023-05-01', 'icezaza400@gmail.com', 'ยังไม่ได้ส่ง', '2023-04-01'),
(19, 'Company 02', 'DEF-5', 'DE84D-DE', 'DE488', 'Ojook', '0000-00-00', '2023-03-30', 'icezaza400@gmail.com', '489448', '2023-02-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbcal1`
--
ALTER TABLE `bbcal1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbcal1`
--
ALTER TABLE `bbcal1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;