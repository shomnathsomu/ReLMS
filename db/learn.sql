-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 11:21 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, 'admin', 'shomnathcse22@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_order` int(11) NOT NULL,
  `top_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`, `category_image`, `category_order`, `top_category_id`) VALUES
(65, 'HTML5', 'html5.png', 1, 28),
(66, 'CSS3', 'css3.jpg', 2, 28),
(67, 'JavaScript', 'javascript.png', 3, 28),
(68, 'SQL', 'SQL.png', 1, 27),
(69, 'C programming', 'c-prog.png', 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `table_lecture`
--

CREATE TABLE `table_lecture` (
  `lecture_id` int(11) NOT NULL,
  `lecture_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lecture_order` int(11) NOT NULL,
  `lecture_sub_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_sub_category`
--

CREATE TABLE `table_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category_order` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_sub_category`
--

INSERT INTO `table_sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_order`, `category_id`) VALUES
(1, 'Lecture 1: Introduction to HTML', 1, 65),
(2, 'Lecture 2: HTML Editors', 2, 65),
(3, 'Lecture 3: HTML Basics', 3, 65),
(4, 'Lecture 1: Introduction to CSS', 1, 66),
(5, 'Lecture 2: CSS Syntax and Selectors', 2, 66),
(6, 'Lecture 3: CSS How To...', 3, 66),
(7, 'Lecture 1: Introduction to JavaScript', 1, 67),
(8, 'Lecture 2: JavaScript Where To', 2, 67),
(9, 'Lecture 3: JavaScript Output', 3, 67),
(10, 'Lecture 1: Introduction to SQL', 1, 68),
(11, 'Lecture 2: SQL Syntax', 2, 68),
(12, 'Lecture 3: SQL SELECT Statement', 3, 68),
(13, 'Lecture 1: What is C?', 1, 69),
(14, 'Lecture 2: Should you learn C programming?', 2, 69),
(15, 'Lecture 3: What will you gain if you learn C?', 3, 69);

-- --------------------------------------------------------

--
-- Table structure for table `table_top_category`
--

CREATE TABLE `table_top_category` (
  `top_category_id` int(11) NOT NULL,
  `top_category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `top_category_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_top_category`
--

INSERT INTO `table_top_category` (`top_category_id`, `top_category_name`, `top_category_order`) VALUES
(27, 'Database', 1),
(28, 'Website', 2),
(29, 'Programming', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_lecture`
--
ALTER TABLE `table_lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `table_top_category`
--
ALTER TABLE `table_top_category`
  ADD PRIMARY KEY (`top_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `table_lecture`
--
ALTER TABLE `table_lecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_top_category`
--
ALTER TABLE `table_top_category`
  MODIFY `top_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
