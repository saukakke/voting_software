-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 07:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `sem` bigint(1) NOT NULL,
  `admission_no` int(10) NOT NULL,
  `position` varchar(50) NOT NULL,
  `election_year` varchar(20) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `course_name`, `sem`, `admission_no`, `position`, `election_year`, `image`) VALUES
(30, 'Abass Audu', 'BCA', 1, 2358, 'president', '2022/2023', '../imagesupload/WIN_20221221_10_41_55_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_name`) VALUES
('BCA'),
('BCA'),
('BCM'),
('MCA'),
('MCOM'),
('XXX');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `election_id` int(11) NOT NULL,
  `election_year` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_year`, `status`) VALUES
(15, '2022/2023', 'result-published');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `o_id` int(11) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `otp` bigint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`o_id`, `e_mail`, `otp`) VALUES
(34, 'vijinvj77@gmail.com', 7670),
(35, 'nath.vijay196@gmail.com', 5378),
(36, 'vijaynath580751@gmail.com', 9886);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position`, `description`) VALUES
('CHAIRMAN', 'chairman'),
('president', 'SRC');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `roll` bigint(3) NOT NULL,
  `sem` bigint(1) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `admission_no` int(10) NOT NULL,
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`name`, `course_name`, `roll`, `sem`, `gender`, `admission_no`, `e_mail`) VALUES
('SIDDARTH S', 'BCA', 41, 5, 'Male', 2234, 'collegeuniononlineelectionsyst@gmail.com'),
('SREEHARI', 'BCA', 40, 5, 'Male', 2244, 'vijaynath580751@gmail.com'),
('VIJAYANATH G', 'BCA', 43, 5, 'Male', 2893, 'nath.vijay196@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `admission_no` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`admission_no`, `password`) VALUES
(2244, 'VIJAY'),
(2893, 'vijay');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `admission_no` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `election_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`admission_no`, `id`, `position`, `election_year`) VALUES
(2234, 15, 'CLASS LEADER', '2023'),
(2234, 15, 'CLASS LEADER', '2020'),
(2893, 17, 'CLASS LEADER', '2019'),
(2893, 19, 'CLASS LEADER', '2021'),
(2893, 21, 'CLASS LEADER', '2020'),
(2234, 24, 'CHAIRMAN', '2020'),
(2893, 28, 'CHAIRMAN', '2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_name` (`course_name`),
  ADD KEY `position` (`position`),
  ADD KEY `election_year` (`election_year`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`election_id`),
  ADD UNIQUE KEY `election_year` (`election_year`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`admission_no`),
  ADD UNIQUE KEY `e_mail` (`e_mail`),
  ADD KEY `course_name` (`course_name`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD UNIQUE KEY `admission_no` (`admission_no`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD KEY `admission_no` (`admission_no`),
  ADD KEY `id` (`id`),
  ADD KEY `position` (`position`),
  ADD KEY `election_year` (`election_year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
