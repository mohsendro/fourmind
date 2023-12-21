-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 07:09 AM
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
-- Database: `fourmind`
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
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fm_workshops`
--

INSERT INTO `fm_workshops` (`ID`, `course_id`, `full_name`, `job`, `field`, `tel`, `email`, `questions`, `price`, `status`) VALUES
(2, 14, 'محسن دروگر', 'برنامه نویس', 'برنامه نویسی', '09214500936', 'mohsendro@gmail.com', 'textarea1textarea1textarea1textarea1', 500000, 1),
(4, 14, 'حسن صباح', '', '', '', '', '', 581107, 0),
(5, 14, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'در مورد چه چیزهایی سال‌ها خیلی اشتباه فکر می‌کردی؟', 556176, 0),
(6, 14, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', '', 10000, 0),
(7, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', '', 10000, 0),
(8, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', '', 600890, 0),
(9, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', '', 600890, 0),
(10, 18, 'asd', 'Wordpress Developer', 'asd', '09214500936', 'mohsendroo@yahoo.com', '', 10000, 0),
(11, 14, '', '', '', '', '', '', 0, 0),
(12, 14, '', '', '', '', '', '', 10000, 0),
(13, 14, 'محسن دروگر', 'Wordpress Developer', 'برنامه نویسی', '09214500936', 'mohsendroo@yahoo.com', '{\"US\":\"Washington\",\"UK\":\"London\",\"Spain\":\"Madrid\",\"Italy\":\"Rome\"}', 593838, 0),
(14, 14, '', '', '', '', '', 'a:3:{i:0;a:1:{s:22:\"عنوان سوال 1 \";s:0:\"\";}i:1;a:1:{s:22:\"عنوان سوال 2 \";s:0:\"\";}i:2;a:1:{s:21:\"عنوان سوال 3\";s:0:\"\";}}', 10000, 0),
(15, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:57:\"عنوان سوال اول خود را وارد کنید \";s:47:\"11111111111111111111111111111111111111111111111\";}i:1;a:1:{s:57:\"عنوان سوال دوم خود را وارد کنید \";s:31:\"2222222222222222222222222222222\";}i:2;a:1:{s:56:\"عنوان سوال سوم خود را وارد کنید\";s:36:\"333333333333333333333333333333333333\";}}', 876906, 0),
(16, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:57:\"عنوان سوال اول خود را وارد کنید \";s:4:\"1111\";}i:1;a:1:{s:57:\"عنوان سوال دوم خود را وارد کنید \";s:4:\"2222\";}i:2;a:1:{s:56:\"عنوان سوال سوم خود را وارد کنید\";s:4:\"3333\";}}', 1000000, 0),
(17, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:57:\"عنوان سوال اول خود را وارد کنید \";s:4:\"1111\";}i:1;a:1:{s:57:\"عنوان سوال دوم خود را وارد کنید \";s:4:\"2222\";}i:2;a:1:{s:56:\"عنوان سوال سوم خود را وارد کنید\";s:4:\"3333\";}}', 1000000, 0),
(18, 13, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:57:\"عنوان سوال اول خود را وارد کنید \";s:4:\"1111\";}i:1;a:1:{s:57:\"عنوان سوال دوم خود را وارد کنید \";s:4:\"2222\";}i:2;a:1:{s:56:\"عنوان سوال سوم خود را وارد کنید\";s:4:\"3333\";}}', 1000000, 0),
(19, 14, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:22:\"عنوان سوال 1 \";s:4:\"1111\";}i:1;a:1:{s:22:\"عنوان سوال 2 \";s:4:\"2222\";}i:2;a:1:{s:21:\"عنوان سوال 3\";s:4:\"3333\";}}', 1000000, 0),
(20, 14, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:22:\"عنوان سوال 1 \";s:0:\"\";}i:1;a:1:{s:22:\"عنوان سوال 2 \";s:0:\"\";}i:2;a:1:{s:21:\"عنوان سوال 3\";s:0:\"\";}}', 730158, 0),
(21, 18, 'dsadas', 'Wordpress Developer', 'adss', '09214500936', 'mohsendroo@yahoo.com', 'a:3:{i:0;a:1:{s:57:\"عنوان سوال اول خود را وارد کنید \";s:0:\"\";}i:1;a:1:{s:57:\"عنوان سوال دوم خود را وارد کنید \";s:0:\"\";}i:2;a:1:{s:56:\"عنوان سوال سوم خود را وارد کنید\";s:0:\"\";}}', 848414, 0);

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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
