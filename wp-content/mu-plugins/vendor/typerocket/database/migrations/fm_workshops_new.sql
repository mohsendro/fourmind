-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 12:01 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fourmind_acedemy2`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_workshops`
--

CREATE TABLE `fm_workshops` (
  `ID` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `full_name` text NOT NULL,
  `job` text NOT NULL,
  `field` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  `questions` text NOT NULL,
  `price` int(255) NOT NULL,
  `authority` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fm_workshops`
--
ALTER TABLE `fm_workshops`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fm_workshops`
--
ALTER TABLE `fm_workshops`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
