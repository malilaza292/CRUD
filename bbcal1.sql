-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 10:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `testmachine` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `model` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serialnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setupdate` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `calidate` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nextcal` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `califreq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bbcal1`
--

INSERT INTO `bbcal1` (`id`, `customername`, `testmachine`, `model`, `serialnum`, `brand`, `setupdate`, `calidate`, `nextcal`, `califreq`, `email`) VALUES
(2, 'Test Name', 'Test Name', 'Test Name', 'Test Name', 'Test Name', '2023-02-24', '2023-02-23', '2023-02-22', '6 Month', 'Test@email.com'),
(5, 'Test Name', 'Test Name', 'Test Name', 'Test Name', 'Test Name', '2023-02-01', '2023-02-15', '2023-02-20', '6 Month', 'Test@email.com'),
(6, '42 Siam medicare', 'Test Name', 'Test Name', 'Test Name', 'Test Name', '2023-02-11', '2023-02-22', '2023-02-22', '6 Month', 'Test@email.com'),
(7, '42 Siam medicare', 'Test Name', 'Test Name', 'Test Name', 'Test Name', '2023-02-22', '2023-02-23', '2023-02-23', '6 Month', 'Test@email.com'),
(8, 'Test', 'Test Name', 'Test Name', 'Test Name', 'Test Name', '2023-02-24', '2023-02-22', '2023-02-22', '6 Month', 'Test@email.com'),
(9, '42 Siam medicare', 'Test Name', 'Test Name', 'Test Name', 'Test Name', '2023-02-22', '2023-02-22', '2023-02-28', '6 Month', 'Test@email.com');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
