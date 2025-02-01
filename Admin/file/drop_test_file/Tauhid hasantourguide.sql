-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 03:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wanderway`
--

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `tg_id` int(11) NOT NULL,
  `tg_name` varchar(255) DEFAULT NULL,
  `tg_email` varchar(255) DEFAULT NULL,
  `tg_number` varchar(20) DEFAULT NULL,
  `tg_password` varchar(255) DEFAULT NULL,
  `tg_gender` varchar(10) DEFAULT NULL,
  `tg_DOB` date DEFAULT NULL,
  `tg_address` text DEFAULT NULL,
  `tg_exp` varchar(255) DEFAULT NULL,
  `tg_Spoken` text DEFAULT NULL,
  `tg_preTguid` int(11) NOT NULL,
  `tg_Dexp` date DEFAULT NULL,
  `tg_passNum` varchar(50) DEFAULT NULL,
  `tg_nationality` varchar(50) DEFAULT NULL,
  `tg_avai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourguide`
--

INSERT INTO `tourguide` (`tg_id`, `tg_name`, `tg_email`, `tg_number`, `tg_password`, `tg_gender`, `tg_DOB`, `tg_address`, `tg_exp`, `tg_Spoken`, `tg_preTguid`, `tg_Dexp`, `tg_passNum`, `tg_nationality`, `tg_avai`) VALUES
(5, 'Hello', 'rh@xyz.com', '012345678902', '1111@', 'male', '2025-01-27', 'dhaka', '3', 'eng', 0, '0000-00-00', '356', 'bd', 0),
(6, '', '', '', '', '', '0000-00-00', '', '', '', 0, '0000-00-00', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tourguide`
--
ALTER TABLE `tourguide`
  ADD PRIMARY KEY (`tg_id`),
  ADD UNIQUE KEY `tg_email` (`tg_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tourguide`
--
ALTER TABLE `tourguide`
  MODIFY `tg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
